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

use App\Http\Requests;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use App\Http\Controllers\Controller;


class CartController extends Controller
{
    public function view_cart(){
        if (Auth::check()) {
            $user_id = Auth()->user()->id;
            $clauses = ['cart.user_id' => $user_id];
        } else {
            $cookie_name = "advert";
            if (!isset($_COOKIE[$cookie_name])) {
                //$guid = com_create_guid();
                $guid = uniqid();
                $cookie_value = $guid;
                setcookie($cookie_name, $cookie_value, time() + (86400 * 30 * 999), "/");
                $clauses = ['cart.guest_user_id' => $guid];
            } else {
                $guid = $_COOKIE[$cookie_name];
                $clauses = ['cart.guest_user_id' => $guid];
            }

        }
        $cart_data = Cart::join('products', 'cart.product_id', '=', 'products.id')->where($clauses)
                    ->get(['cart.*', 'products.id as products_id', 'products.product_name', 'products.product_price', 'products.product_slug', 'products.product_image']);
        $count_cart_data = Cart::join('products', 'cart.product_id', '=', 'products.id')->where($clauses)->count();
        $subtotal = 0;

        $shppingcharge = "0.00" ;
        $tax = "0.00" ;
        $main_total  = "0.00" ;
        $grandtotal  = "0.00" ;
        $subtotal_excl = "0.00" ;

        if (count($cart_data) > 0) {
            foreach ($cart_data as $value) {
                $amt = $value->product_price*$value->quantity;
                $subtotal += $amt;
            }
            // dd($subtotal);
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
        return view('pages.addtocart',compact('cart_data','count_cart_data','subtotal','shppingcharge','tax','subtotal_excl','main_total','grandtotal'));
    }

    //Ajax Controller
    public function add_to_cart(Request $request)
    {

        // $data =  \Request::except(array('_token')) ;
	    $inputs = $request->all();
        // dd($inputs);
        if (!empty($inputs['guest_user_id'])) {
            $guest_user_id = $inputs['guest_user_id'];
        } else {
            $guest_user_id = null;
        }

        if (!empty($inputs['user_id'])) {
            $user_id = base64_decode($inputs['user_id']);
        } else {
            $user_id = null;
        }

        if (!empty($inputs['product_id'])) {
            $product_id = $inputs['product_id'];
        } else {
            $product_id = null;
        }
        if (!empty($inputs['quantity'])) {
            $quantity = $inputs['quantity'];
        } else {
            $quantity = null;
        }

        //product check in cart
        if (!empty($guest_user_id)) {
            $cartid = Cart::select('id')->where('guest_user_id', $guest_user_id)
            ->where('product_id',$product_id)->get()->first();
            $countproduct = Cart::select('*')->where('guest_user_id', $guest_user_id)
            ->where('product_id',$product_id)->get()->count();
        } else if (!empty($user_id)) {
            $cartid = Cart::select('id')->where('user_id', $user_id)
            ->where('product_id',$product_id)->get()->first();
            $countproduct = Cart::select('*')->where('user_id', $user_id)
            ->where('product_id',$product_id)->count();

        }
        // dd($countproduct);
        if($countproduct > 0){
            /* $cart_data1 = Cart::findOrFail($cartid);
             */
            $cart_data = Cart::where('id', $cartid->id)->update(["quantity" => $quantity ]);
            // dd($cartid->id);
            $response['code'] = 0;
            $response['status'] = 'failed';
            $response['message'] = 'This Item is Already in your Cart.';
        }
        else {
            $cart_data = new Cart;
            $cart_data->guest_user_id = $guest_user_id;
            $cart_data->user_id = $user_id;
            $cart_data->product_id = $product_id;
            $cart_data->quantity = $inputs['quantity'];
            $cart_data->cart_date = $inputs['cart_date'];
            $cart_data->cart_time = $inputs['cart_time'];
            $cart_data->save();
            $cart_id = $cart_data->id;
            if ($cart_id != '') {
                $response['code'] = 1;
                $response['status'] = 'success';
                $response['message'] = 'Add to Cart success';
            } else {
                $response['code'] = 2;
                $response['status'] = 'failed';
                $response['message'] = 'Please try gain.';
            }

        }
        echo json_encode($response);


    }
    public function cart_item_remove($id)
    {
        return Cart::where('id', $id)->delete();
    }


}
