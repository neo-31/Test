<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Support\Facades\Auth;
use App\Models\User;
use App\Models\Categories;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Session;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class CategoriesController extends Controller
{
    public function __construct()
    {
		$this->middleware('auth');
    }

    public function categorylist()
    {

    	$allcategories = Categories::where('is_deleted','1')->where('is_status','1')->orderBy('id')->get();
        return view('admin.pages.categories',compact('allcategories'));
    }

    public function addeditcategory()
    {

        if(Auth::User()->user_type!="Admin"){
            \Session::flash('flash_message', 'Access denied!');
            return redirect('admin/dashboard');
        }
        return view('admin.pages.addeditcategory');
    }

    public function addnew(Request $request)
    {
    	$data =  \Request::except(array('_token')) ;
	    $inputs = $request->all();
	    $rule=array('category_name' => 'required');
	   	$validator = \Validator::make($data,$rule);

        if ($validator->fails()){
            return redirect()->back()->withErrors($validator->messages());
        }

		if(!empty($inputs['id'])){
            $category = Categories::findOrFail($inputs['id']);
        }else{
            $category = new Categories;
        }

		$category->category_name = $inputs['category_name'];
       $category->category_slug=Str::slug($inputs['category_name'], "-");
		$category->category_assign = $inputs['category_assign'];
	    $category->save();
		if(!empty($inputs['id'])){
            UserActivitiesLog('Updated', $category->id, 'Category');
            \Session::flash('flash_message', 'Category Updated Successfully');
            return \Redirect::back();
        }else{
            UserActivitiesLog('Created', $category->id, 'Category');
            \Session::flash('flash_message', 'Category Added Successfully');
            return \Redirect::back();
        }
    }

    public function editcategory($id)
    {
        if(Auth::User()->user_type!="Admin"){
            \Session::flash('flash_message', 'Access denied!');
            return redirect('admin/dashboard');
        }
        $category = Categories::findOrFail($id);
        //echo "<pre>";print_r($category);die;
        return view('admin.pages.addeditcategory',compact('category'));
    }

    public function delete($id)
    {
    	if(Auth::User()->user_type!="Admin"){
            \Session::flash('flash_message', 'Access denied!');
            return redirect('admin/dashboard');
        }
        $category = Categories::findOrFail($id);
		$category->is_deleted='0';
        $category->save();
        UserActivitiesLog('Soft Delete', $category->id, 'Category');
        \Session::flash('flash_message', 'Deleted');
        return redirect()->back();
    }

    public function status($id)
    {
        $category = Categories::findOrFail($id);
       	if(Auth::User()->user_type!="Admin"){
            \Session::flash('flash_message', 'Access denied!');
            return redirect('admin/dashboard');
        }
		if($category->is_status==1){
			$category->is_status='0';
	   		$category->save();
            UserActivitiesLog('Deactive', $category->id, 'Category');
	   		\Session::flash('flash_message', 'Deactive');
		}else{
			$category->is_status='1';
	   		$category->save();
            UserActivitiesLog('Active', $category->id, 'Category');
	   		\Session::flash('flash_message', 'Active');
		}
        return redirect()->back();
    }
}
