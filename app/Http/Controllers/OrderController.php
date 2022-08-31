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

use App\Http\Requests;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use App\Http\Controllers\Controller;


class OrderController extends Controller
{
    public function order_list() {
        if (Auth::check()) {
            $user_id = Auth()->user()->id;
        }
        $order = Order::where('user_id', $user_id)->get();
        $order_count = Order::where('user_id', $user_id)->count();

        return view('pages.orders',compact('order','order_count'));
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
        return view('pages.order_details', compact('order_data','user_detail'));
    }

}
