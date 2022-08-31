<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Support\Facades\Auth;
use App\Models\User;
use App\Models\Product;
use App\Models\Categories;
use App\Models\Manufacturers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Session;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class ShopController extends Controller
{
    public function __construct()
    {
		$this->middleware('auth');
    }

    public function productlist()
    {

    	$products = Product::where('is_deleted','1')->orderBy('id')->get();
        return view('admin.pages.shop',compact('products'));
    }

    public function addeditproduct()
    {
        if(Auth::User()->user_type!="Admin"){
            \Session::flash('flash_message', 'Access denied!');
            return redirect('admin/dashboard');
        }
       $category_list = Categories::where('is_status','1')->where('is_deleted','1')->where('category_assign', 'product')->orderBy('category_name')->get();
       $manufacturer_list = Manufacturers::where('is_status','1')->where('is_deleted','1')->where('manufacturers_assign', 'product')->orderBy('manufacturers_name')->get();
        return view('admin.pages.addeditproduct',compact('category_list','manufacturer_list'));
    }

    public function addnew(Request $request)
    {
    	$data =  \Request::except(array('_token')) ;
	    $inputs = $request->all();
        $rule=array( 'product_name' => 'required');

	   	$validator = \Validator::make($data,$rule);

        if ($validator->fails()){
            return redirect()->back()->withErrors($validator->messages());
        }

		if(!empty($inputs['id'])){
            $product = Product::findOrFail($inputs['id']);
        }else{
            $product = new Product;
        }

        if ($inputs['product_features_image'] != '') {
            $folderPath = 'public/upload/product/';
            $image_parts = explode(";base64,", $inputs['product_features_image']);
            $image_type_aux = explode("image/", $image_parts[0]);
            $image_type = $image_type_aux[1];
            $image_base64 = base64_decode($image_parts[1]);
            $imageName = uniqid() . '.png';
            $imageFullPath = $folderPath.$imageName;
            file_put_contents($imageFullPath, $image_base64);
            $product->product_image = $imageFullPath;
        }
        if ($inputs['product_img_5'] != '') {
            $folderPath = 'public/upload/product/';
            $image_parts = explode(";base64,", $inputs['product_img_5']);
            $image_type_aux = explode("image/", $image_parts[0]);
            $image_type = $image_type_aux[1];
            $image_base64 = base64_decode($image_parts[1]);
            $imageName = uniqid() . '.png';
            $imageFullPath = $folderPath.$imageName;
            file_put_contents($imageFullPath, $image_base64);
            $product->product_images1 = $imageFullPath;
        }
		//product image 2
		if ($inputs['product_img_6'] != '') {
            $folderPath = 'public/upload/product/';
            $image_parts = explode(";base64,", $inputs['product_img_6']);
            $image_type_aux = explode("image/", $image_parts[0]);
            $image_type = $image_type_aux[1];
            $image_base64 = base64_decode($image_parts[1]);
            $imageName = uniqid() . '.png';
            $imageFullPath = $folderPath.$imageName;
            file_put_contents($imageFullPath, $image_base64);
            $product->product_images2 = $imageFullPath;
        }
		//product image 3
		if ($inputs['product_img_7'] != '') {
            $folderPath = 'public/upload/product/';
            $image_parts = explode(";base64,", $inputs['product_img_7']);
            $image_type_aux = explode("image/", $image_parts[0]);
            $image_type = $image_type_aux[1];
            $image_base64 = base64_decode($image_parts[1]);
            $imageName = uniqid() . '.png';
            $imageFullPath = $folderPath.$imageName;
            file_put_contents($imageFullPath, $image_base64);
            $product->product_images3 = $imageFullPath;
        }
		//product image 4
		if ($inputs['product_img_8'] != '') {
            $folderPath = 'public/upload/product/';
            $image_parts = explode(";base64,", $inputs['product_img_8']);
            $image_type_aux = explode("image/", $image_parts[0]);
            $image_type = $image_type_aux[1];
            $image_base64 = base64_decode($image_parts[1]);
            $imageName = uniqid() . '.png';
            $imageFullPath = $folderPath.$imageName;
            file_put_contents($imageFullPath, $image_base64);
            $product->product_images4 = $imageFullPath;
        }

        if(!empty($inputs['id'])){
            $product->product_slug = Str::slug($inputs['product_slug'], "-");
        }else{
            $product->product_slug  = Str::slug($inputs['product_name']."-".uniqid(), "-");
        }
        if ($request->post('google_merchant') != '') {
            $product->google_merchant = $inputs['google_merchant'];
        }else{
            $product->google_merchant = 'No';
        }

		$product->product_name = $inputs['product_name'];
		$product->reference=$inputs['reference'];
		$product->category_id=$inputs['category_id'];
		$product->manufacturer_id=$inputs['manufacturer_id'];
		$product->product_quantity = $inputs['product_quantity'];
		$product->product_weight = $inputs['product_weight'];
        $product->is_price = $inputs['is_price'];
		$product->product_price = $inputs['product_price'];
		$product->product_discount = $inputs['product_discount'];
		$product->product_discount_pf = $inputs['product_discount_pf'];
      
	    if($inputs['product_price'] != null && $inputs['product_discount_pf'] != null)
        {
           
            $product->product_price_after_discount = $inputs['hf_price_dicut'];
        }
        else
        {
            $product->product_price_after_discount =null;
        }
      
		$product->sort_description = $inputs['sort_description'];
		$product->description = $inputs['long_description'];
	    $product->save();

		if(!empty($inputs['id'])){
            UserActivitiesLog('Updated', $product->id, 'Product');
            \Session::flash('flash_message', 'Product Updated Successfully');
            return \Redirect::back();
        }else{
            UserActivitiesLog('Created', $product->id, 'Product');
            \Session::flash('flash_message', 'Product Added Successfully');
            return \Redirect::back();
        }
    }
    public function editproduct($id)
    {
    	  if(Auth::User()->user_type!="Admin"){
            \Session::flash('flash_message', 'Access denied!');
            return redirect('admin/dashboard');
        }
        $product = Product::findOrFail($id);
        $category_list = Categories::where('is_status','1')->where('is_deleted','1')->where('category_assign', 'product')->orderBy('category_name')->get();
        $manufacturer_list = Manufacturers::where('is_status','1')->where('is_deleted','1')->where('manufacturers_assign', 'product')->orderBy('manufacturers_name')->get();
        return view('admin.pages.addeditproduct',compact('product','category_list','manufacturer_list'));
    }

    public function delete($id)
    {
        if(Auth::User()->user_type!="Admin"){
            \Session::flash('flash_message', 'Access denied!');
            return redirect('admin/dashboard');
        }
        $product = Product::findOrFail($id);
        $product->is_deleted='0';
        $product->save();
        UserActivitiesLog('Soft Delete', $product->id, 'Product');
        \Session::flash('flash_message', 'Deleted');
        return redirect()->back();
    }

    public function status($id)
    {
        $product = Product::findOrFail($id);
        if(Auth::User()->user_type!="Admin"){
            \Session::flash('flash_message', 'Access denied!');
            return redirect('admin/dashboard');
        }
		if($product->is_status==1){
			$product->is_status='0';
	   		$product->save();
            UserActivitiesLog('Deactive', $product->id, 'Product');
	   		\Session::flash('flash_message', 'Deactive');
		}else{
			$product->is_status='1';
	   		$product->save();
            UserActivitiesLog('Active', $product->id, 'Product');
	   		\Session::flash('flash_message', 'Active');
		}
        return redirect()->back();
    }

    public function productlisttrash()
    {
    	$allproduct_trash = Product::where('is_deleted','0')->orderBy('id')->get();
        return view('admin.pages.shoptrash',compact('allproduct_trash'));
    }

  	 public function restore_trash($id)
    {
    	if(Auth::User()->user_type!="Admin"){
            \Session::flash('flash_message', 'Access denied!');
            return redirect('admin/dashboard');
        }
        $product = Product::findOrFail($id);
        $product->is_deleted='1';
        $product->save();
        UserActivitiesLog('restore', $product->id, 'Product');
        \Session::flash('flash_message', 'restore');
        return redirect()->back();
    }
  
    public function permanent_trash($id)
    {
    	if(Auth::User()->user_type!="Admin"){
            \Session::flash('flash_message', 'Access denied!');
            return redirect('admin/dashboard');
        }
        $product = Product::findOrFail($id);
        $product->is_deleted='2';
        $product->save();
        UserActivitiesLog('Permanent Delete', $product->id, 'Product');
        \Session::flash('flash_message', ' Video Deleted');
        return redirect()->back();
    }
}
