<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use App\Models\User;
use Illuminate\Http\Request;

use App\Models\Categories;
use App\Models\Service;
use App\Models\Product;
use App\Models\Manufacturers;
use App\Models\Cart;
use App\Models\Order;
use App\Models\OrderDetail;
use App\Models\Countries;
use App\Models\States;
use App\Models\ShippingCharges;

use App\Http\Requests;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Mail;
use App\Http\Controllers\Controller;
use Carbon\Carbon;
use App\Helper\Reply;
use Illuminate\Support\Facades\Cookie;
use Illuminate\Validation\ValidationException;
use Session;
use Stripe;

class CheckoutController extends Controller
{
    public function checkout() {


        if (Auth::check()) {
            $user_id = Auth()->user()->id;
        }
        $cart_data = Cart::join('products', 'cart.product_id', '=', 'products.id')->where('cart.user_id', $user_id)
                    ->get(['cart.*', 'products.id as products_id', 'products.product_name', 'products.product_price', 'products.product_image']);
        $count_cart_data = Cart::join('products', 'cart.product_id', '=', 'products.id')->where('cart.user_id', $user_id)->count();
        $subtotal = 0;

        $shppingcharge = "0.00" ;
        $weight = 0 ;
        $total_quantity = 0 ;
        $total_weight = 0 ;
        $tax = "0.00" ;
        $main_total  = "0.00" ;
        $grandtotal  = "0.00" ;
        $subtotal_excl  = "0.00" ;

        if (count($cart_data) > 0) {
            foreach ($cart_data as $value) {
                $amt = $value->product_price*$value->quantity;
                $subtotal += $amt;
                $total_quantity += $value->quantity;
                
                $weight = $value->product_weight*$value->quantity;
                $total_weight += $weight;
            }

            if($subtotal < 100){
                $shppingcharge = "10.00" ;
                $main_total = $subtotal + $shppingcharge ;
            }
            else{
                $shppingcharge = "0.00" ;
                $main_total = $subtotal + $shppingcharge ;
            }

            $tax = "11.40" ;
            $subtotal_excl = $subtotal + $tax;
            $grandtotal = $main_total + $tax ;
        }
        $allcountries = Countries::where('is_deleted','1')->where('is_status','1')->orderBy('id')->get();
        $allstates = States::where('is_deleted','1')->where('is_status','1')->orderBy('id')->get();
        return view('pages.checkout',compact('allcountries','allstates','cart_data','count_cart_data',
        'total_quantity','total_weight','subtotal','shppingcharge','tax','subtotal_excl','main_total',
        'grandtotal'));
    }
    
    // Ajax Shipping Charges
    public function ajaxshippingcharges(Request $request){

        $data =  \Request::except(array('_token')) ;

        $country_id = $request->country;
        $state_id = $request->state;
        $delivery_days = $request->delivery_days;
        $subtotal = $request->subtotal;
        $totalweight = $request->totalweight;

        if(!empty($country_id) && !empty($state_id) ){
            $shippingcharges = ShippingCharges::join('countries',  'countries.id', '=', 'shipping_charges.country_id')
            ->join('states',  'states.id', '=', 'shipping_charges.state_id')
            ->where('shipping_charges.is_deleted','1')->where('shipping_charges.is_status','1')
            ->where('shipping_charges.country_id',$country_id)->orderBy('shipping_charges.id')
            ->get(['shipping_charges.*', 'countries.country_name'])->first();
        }
        if(!empty($country_id)){
            $shippingcharges = ShippingCharges::join('countries',  'countries.id', '=', 'shipping_charges.country_id')
            ->where('shipping_charges.is_deleted','1')->where('shipping_charges.is_status','1')
            ->where('shipping_charges.country_id',$country_id)->orderBy('shipping_charges.id')
            ->get(['shipping_charges.*', 'countries.country_name'])->first();
        }

            if($shippingcharges->country_name == "UK"){
                // UK
                if ($delivery_days == 1) {
                    $shipping_charge = $shippingcharges->delivery_next_day;
                    $sub_shipping_total = $subtotal + $shipping_charge;
                }
                elseif ($delivery_days == 2) {
                    $shipping_charge = $shippingcharges->delivery_days_2_3;
                    $sub_shipping_total = $subtotal + $shipping_charge;
                }
                elseif ($delivery_days == 3) {
                    $shipping_charge = $shippingcharges->delivery_days_3_4;
                    $sub_shipping_total = $subtotal + $shipping_charge;
                }
                else {
                    $shipping_charge = $shippingcharges->delivery_days_4_5;
                    $sub_shipping_total = $subtotal + $shipping_charge;
                }


            }
            else{
                // world
                $shipping_charge = $shippingcharges->delivery_price;
                $sub_shipping_total = $subtotal + $shipping_charge;
            }
            $main_total = 0.00;
                if($sub_shipping_total < 100){
                    $shppingcharge = "10.00" ;
                    $main_total = $sub_shipping_total + $shppingcharge ;
                }
                else{
                    $shppingcharge = "0.00" ;
                    $main_total = $sub_shipping_total + $shppingcharge ;
                }

                if($totalweight > 10){
                    $weight_shippingcharge = $shippingcharges->shipping_rate_over;
                    $main_total = $main_total + $weight_shippingcharge ;
                }
                else{
                    $weight_shippingcharge = $shippingcharges->shipping_rate_under;
                    $main_total = $main_total + $weight_shippingcharge ;
                }

            $tax = "11.40" ;
            $subtotal_excl = $subtotal + $tax;
            $grandtotal = $main_total + $tax ;


            $return_arr = array('subtotal'=>$subtotal,'sub_shipping_total'=>$sub_shipping_total,'shipping_charge'=>$shppingcharge,'standard_charge'=>$shipping_charge,'weight_shippingcharge'=>$weight_shippingcharge,'subtotal_excl'=>$subtotal_excl, "main_total"=>$main_total, "grandtotal"=>$grandtotal, "tax"=>$tax);

            Cookie::queue('grand_total', $grandtotal);
            // Cookie::make('grand_total', $grandtotal);
            Cookie::get('grand_total');

            //dd($grandtotal);

        // return json_encode($return_arr);
        return response(json_encode($return_arr))->withCookie('grand_total');
    }
    public function store(Request $request)
    {
        // dd($request);
        Stripe\Stripe::setApiKey('sk_test_51JMqdHDs0GriRjr5AvSzaBo9AAZQlnay33hsVqsrVF9caaqEtDlOkAJKEHippkdZ6OzDdvKxXLuvFucLruveo3PB00VYzBbtYm');
        $data = Stripe\Charge::create ([
                 "amount" => $request['actual_price'] * 100,
                 "currency" => "GBP",
                 "source" => $request->stripeToken,
                 "description" => "VDR Resale"
         ]);

        $result =  $data['outcome']['seller_message'];

        if ($result == "Payment complete.") {
            $data =  \Request::except(array('_token'));
            $inputs = $request->all();

            if (Auth::check()) {
                $user_id = Auth()->user()->id;
            }
            if(!empty($user_id)){
                $user = User::findOrFail($user_id);
            }
            $fullname = $inputs['firstname'].' '.$inputs['lastname'];
            $user->name = $fullname;
            $user->firstname = $inputs['firstname'];
            $user->lastname = $inputs['lastname'];
            $user->business_name = $inputs['business_name'];
            $user->email = $inputs['email'];
            $user->email_2 = $inputs['email_2'];
            $user->phone = $inputs['phone'];
            $user->phone_2 = $inputs['phone_2'];
            $user->shipping_address = $inputs['shipping_address'];
            $user->delivery_address = $inputs['delivery_address'];
            $user->postal_code = $inputs['postal_code'];
            $user->country = $inputs['country'];
            $user->save();

            $cart_data = Cart::join('products', 'cart.product_id', '=', 'products.id')->where('cart.user_id',$user_id)
                        ->get(['cart.*', 'products.id as products_id', 'products.product_name', 'products.product_price', 'products.product_image', 'products.product_quantity']);

            if (count($cart_data) > 0) {
                $order = new Order;
                $order->user_id = $user_id;
                $order->total_qty = $inputs['total_quantity'];
                $order->actual_price = $inputs['actual_price'];
                $order->save();
                $last_order_id = $order->id;

                foreach ($cart_data as $value) {
                    $total_price = $value->quantity*$value->product_price;
                    $order_data = new OrderDetail;
                    $order_data->order_id = $last_order_id;
                    $order_data->product_id = $value->products_id;
                    $order_data->order_date = $value->cart_date;
                    $order_data->order_time = $value->cart_time;
                    $order_data->quantity = $value->quantity;
                    $order_data->price_for_one = $value->product_price;
                    $order_data->total_price = $total_price;
                    $order_data->save();

                    $manage_qty = $value->product_quantity-$value->quantity;
                    $product = Product::findOrFail($value->products_id);
                    $product->product_quantity = $manage_qty;
                    $product->save();

                    Cart::where('id', $value->id)->delete();
                }
                $data['order_id'] = $last_order_id;
                $data['name'] = $fullname;
                $data['email'] = $inputs['email'];
                $data['subject'] = "Order placed | VDR";
                $data['emails_to'] = ['palomaph1987@gmail.com', 'paloma19se@gmail.com'];

                Mail::send(['html' => 'emails.order_places_mail'],
                        array(
                            'order_id' => $data['order_id'],
                            'name' => $data['name'],
                            'email' => $data['email'],
                            'subject' => $data['subject'],
                        ), function ($message) use ($data) {
                            $message->from($data['emails_to']);
                            $message->replyTo($data['emails_to']);
                            $message->to($data['email']);
                            $message->subject('Order placed | VDR');
                });
                if(!empty($last_order_id)){

                    \Session::flash('flash_message', 'Your Order is Placed');
                    return redirect()->intended('orders');
                }else{
                    return redirect()->intended('cart');
                }
            }
        }
    }

}
