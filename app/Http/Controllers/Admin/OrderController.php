<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Support\Facades\Auth;
use App\Models\User;
use App\Models\Product;
use App\Models\Categories;
use App\Models\Manufacturers;
use App\Models\Order;
use App\Models\OrderDetail;

use Illuminate\Support\Facades\Mail;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Session;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class OrderController extends Controller
{
    public function __construct()
    {
		$this->middleware('auth');
    }

    public function orderlist(Request $request)
    {
        /* $order_data = Order::join('users','order.user_id', '=', 'users.id')
        ->get(['order.*','users.name']); */
        $order_query = Order::join('users','order.user_id', '=', 'users.id');

        $user_id = empty($request->user_id) ? null : $request->user_id;
        $status_filter = empty($request->status_filter) ? null : $request->status_filter;
        $date_filter = empty($request->date_filter) ? null : $request->date_filter;

        if(!empty($user_id))
        {
            $order_query->where('order.user_id', $user_id);
        }
        if(!empty($status_filter))
        {
            $order_query->where('order.is_status', $status_filter);
        }
        if(!empty($date_filter))
        {
            $date = strtotime($date_filter);
            $new_date = date('Y-m-d', $date);
            $order_query->whereDate('order.created_at', $new_date);


        }

        $order_data = $order_query->get(['order.*','users.name']);
        // dd($order_query);
        return view('admin.pages.orders', compact('order_data','user_id','status_filter','date_filter'));
    }

    public function vieworder($id)
    {
        $user_detail = Order::join('users','order.user_id', '=', 'users.id')->where('order.id', $id)
        ->get(['order.*','users.name','users.name','users.shipping_address','users.postal_code','users.country'])->first();

        $order_data = Order::join('users','order.user_id', '=', 'users.id')
        ->join('order_detail','order.id', '=', 'order_detail.order_id')
        ->join('products','order_detail.product_id', '=', 'products.id')
        ->where('order_detail.order_id', $id)
        ->get(['order.*','order_detail.quantity','order_detail.total_price', 'products.id as products_id', 'products.product_name', 'products.product_price', 'products.product_image']);
        // dd($user_detail);
        return view('admin.pages.order_detail', compact('order_data','user_detail'));
    }

    public function change_order_status(Request $request){
        $data =  \Request::except(array('_token')) ;
	    $inputs = $request->all();
        $rule=array( 'order_id' => 'required', 'order_status' => 'required');

        if(!empty($inputs['order_id'])){
            $order = Order::findOrFail($inputs['order_id']);
        }else{
            $order = new Order;
        }

        $data['order_id'] = $inputs['order_id'];
        $order->is_status = $inputs['order_status'];
        $order->save();
        
         if($inputs['order_status'] == "2"){
            $order_detail = getOrderDetails($inputs['order_id']);
            $user_details = getUserInfo($order_detail->user_id);
            $data['name'] = $user_details->name;
            $data['email'] = $user_details->email;
            $data['subject'] = "Order Completed | VDR";
            $data['subject_feedback'] = "Order Feedback | VDR";
            //$data['emails_to'] = ['info@vdrresale.com', 'mario@vdrresale.com', 'Kaan@vdrresale.com', 'Matthew@vdrresale.com'];
            $data['emails_to'] = ['palomaph1987@gmail.com'];

            Mail::send(['html' => 'emails.order_progress_mail'],
                    array(
                        'order_id' => $data['order_id'],
                        'name' => $data['name'],
                        'email' => $data['email'],
                        'subject' => $data['subject'],
                    ), function ($message) use ($data) {
                        $message->from($data['emails_to']);
                        $message->replyTo($data['emails_to']);
                        $message->to($data['email']);
                        $message->subject('Order Progress | VDR');
            });
        }

        if($inputs['order_status'] == "3"){
            $order_detail = getOrderDetails($inputs['order_id']);
            $user_details = getUserInfo($order_detail->user_id);
            $data['name'] = $user_details->name;
            $data['email'] = $user_details->email;
            $data['subject'] = "Order Completed | VDR";
            $data['subject_feedback'] = "Order Feedback | VDR";
            //$data['emails_to'] = ['info@vdrresale.com', 'mario@vdrresale.com', 'Kaan@vdrresale.com', 'Matthew@vdrresale.com'];
            $data['emails_to'] = ['palomaph1987@gmail.com'];

            Mail::send(['html' => 'emails.order_complete_mail'],
                    array(
                        'order_id' => $data['order_id'],
                        'name' => $data['name'],
                        'email' => $data['email'],
                        'subject' => $data['subject'],
                    ), function ($message) use ($data) {
                        $message->from($data['emails_to']);
                        $message->replyTo($data['emails_to']);
                        $message->to($data['email']);
                        $message->subject('Order Completed | VDR');
            });
            Mail::send(['html' => 'emails.feedback_mail'],
                    array(
                        'order_id' => $data['order_id'],
                        'name' => $data['name'],
                        'email' => $data['email'],
                        'subject_feedback' => $data['subject_feedback'],
                    ), function ($message) use ($data) {
                        $message->from($data['emails_to']);
                        $message->replyTo($data['emails_to']);
                        $message->to($data['email']);
                        $message->subject('Order Feedback | VDR');
            });
        }

        if(!empty($inputs['order_id'])){
            UserActivitiesLog('Updated', $order->id, 'Order');
            \Session::flash('flash_message', 'Order status updated');
            return \Redirect::back();
        }

    }

}
