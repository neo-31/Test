<?php
use App\Models\User;
use App\Models\Blog;
use App\Models\Categories;
use App\Models\Manufacturers;
use App\Models\Activities;
use App\Models\Cart;
use App\Models\Product;
use App\Models\Order;
use App\Models\OrderDetail;
use App\Models\Countries;
use App\Models\States;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

if (!function_exists('classActivePath')) {
    function classActivePath($path)
    {
        $path = explode('.', $path);
        $segment = 2;
        foreach($path as $p) {
            if((request()->segment($segment) == $p) == false) {
                return '';
            }
            $segment++;
        }
        return ' active';
    }
}

if (!function_exists('classActivePathPublic')) {
    function classActivePathPublic($path)
    {
        $path = explode('.', $path);
        $segment = 1;
        foreach($path as $p) {
            if((request()->segment($segment) == $p) == false) {
                return '';
            }
            $segment++;
        }
        return ' active';
    }
}

if (! function_exists('getUserInfo')) {
	function getUserInfo($id)
	{
		return User::find($id);
	}
}

if (! function_exists('GetBlogList')) {
	function GetBlogList()
	{
		return Blog::where('is_status','1')->where('is_deleted','1')->orderBy('id', 'desc')->take(2)->get();
	}
}

if (! function_exists('getCategoriesId')) {
	function getCategoriesId($slug)
	{
		return Categories::where('category_slug',$slug)->first();
	}
}

if (! function_exists('getManufacturersId')) {
	function getManufacturersId($slug)
	{
		return Manufacturers::where('manufacturers_slug',$slug)->first();
	}
}


if (! function_exists('UserActivitiesLog')) {
	function UserActivitiesLog($activity_type , $subject_id, $subject_type)
	{
        $activity = new Activities;
        $activity->user_id = Auth::user()->id;
        $activity->activity_type = $activity_type;
        $activity->subject_id = $subject_id;
        $activity->subject_type = $subject_type;
        $activity->ip_address = $_SERVER['REMOTE_ADDR'];
        $activity->save();
	}
}
if (! function_exists('getCartTotalQty')) {
	function getCartTotalQty()
	{
        $count_cart_qty = 0;
		if (Auth::check()) {
            $user_id = Auth()->user()->id;
            $clauses = ['cart.user_id' => $user_id];
        }
        else {
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

        if (count($cart_data) > 0) {
            foreach ($cart_data as $value) : $count_cart_qty += $value->quantity;
            endforeach;
        }

        return $count_cart_qty;
	}
}
if (! function_exists('getOrderDetails')) {
    function getOrderDetails($id)
	{
        return Order::find($id);
	}
}
if (! function_exists('getOrderProductDetails')) {
    function getOrderProductDetails($id)
	{
        return OrderDetail::where('order_id', $id)->get();
	}
}
if (! function_exists('getProductDetails')) {
    function getProductDetails($id)
	{
        return Product::find($id);
	}
}

if (! function_exists('getCustomerDetails')) {
    function getCustomerDetails($email)
	{
        $custmore = User::where('email',$email)->first();
        if(!empty($custmore))
        {
            return 1;
        }
	}
}