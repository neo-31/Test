<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Support\Facades\Auth;
use App\Models\User;
use App\Models\Blog;
use App\Models\Categories;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Session;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class BlogController extends Controller
{
    public function __construct()
    {
		 $this->middleware('auth');
    }

    public function bloglist()
    {
    	$allblog = Blog::where('is_deleted','1')->where('is_status','1')->orderBy('id')->get();
        return view('admin.pages.blog',compact('allblog'));
    }

    public function addeditblog()
    {
        if(Auth::User()->user_type!="Admin"){
            \Session::flash('flash_message', 'Access denied!');
            return redirect('admin/dashboard');
        }
        $category_list = Categories::where('is_status','1')->where('category_assign', 'blog')->orderBy('category_name')->get();
        return view('admin.pages.addeditblog',compact('category_list'));
    }

    public function addnew(Request $request)
    {
    	$data =  \Request::except(array('_token')) ;
	    $inputs = $request->all();
        $rule=array( 'blog_title' => 'required');
	   	$validator = \Validator::make($data,$rule);

        if ($validator->fails()){
            return redirect()->back()->withErrors($validator->messages());
        }

		if(!empty($inputs['id'])){
            $blog = Blog::findOrFail($inputs['id']);
        }else{
            $blog = new Blog;
        }

        if ($inputs['blog_features_image'] != '') {
            $folderPath = 'public/upload/blog/';
            $image_parts = explode(";base64,", $inputs['blog_features_image']);
            $image_type_aux = explode("image/", $image_parts[0]);
            $image_type = $image_type_aux[1];
            $image_base64 = base64_decode($image_parts[1]);
            $imageName = uniqid() . '.png';
            $imageFullPath = $folderPath.$imageName;
            file_put_contents($imageFullPath, $image_base64);
            $blog->features_image = $imageFullPath;
        }
        if ($inputs['blog_inner_image'] != '') {
            $folderPath = 'public/upload/blog/';
            $image_parts = explode(";base64,", $inputs['blog_inner_image']);
            $image_type_aux = explode("image/", $image_parts[0]);
            $image_type = $image_type_aux[1];
            $image_base64 = base64_decode($image_parts[1]);
            $imageName = uniqid() . '.png';
            $imageFullPath = $folderPath.$imageName;
            file_put_contents($imageFullPath, $image_base64);
            $blog->inner_image = $imageFullPath;
        }
		$blog->blog_title = $inputs['blog_title'];
        $blog->blog_slug = Str::slug($inputs['blog_title'], "-");
		$blog->category_id = $inputs['category_id'];
		$blog->short_description = $inputs['short_description'];
		$blog->long_description = $inputs['long_description'];
	    $blog->save();

		if(!empty($inputs['id'])){
            UserActivitiesLog('Updated', $blog->id, 'Blog');
            \Session::flash('flash_message', 'Blog Updated Successfully');
            return \Redirect::back();
        }else{
            UserActivitiesLog('Created', $blog->id, 'Blog');
            \Session::flash('flash_message', 'Blog Added Successfully');
            return \Redirect::back();
        }
    }

    public function editblog($id)
    {
    	  if(Auth::User()->user_type!="Admin"){
            \Session::flash('flash_message', 'Access denied!');
            return redirect('admin/dashboard');
        }
          $blog = Blog::findOrFail($id);

          $category_list = Categories::where('is_status','1')->where('category_assign', 'blog')->orderBy('category_name')->get();
          return view('admin.pages.addeditblog',compact('category_list','blog'));
    }

    public function delete($id)
    {
    	if(Auth::User()->user_type!="Admin"){
            \Session::flash('flash_message', 'Access denied!');
            return redirect('admin/dashboard');
        }
        $blog = Blog::findOrFail($id);
        $blog->is_deleted='0';
        $blog->save();
        UserActivitiesLog('Soft Delete', $blog->id, 'Blog');
        \Session::flash('flash_message', 'Deleted');
        return redirect()->back();
    }

    public function status($id)
    {
        $blog = Blog::findOrFail($id);
       	if(Auth::User()->user_type!="Admin"){
            \Session::flash('flash_message', 'Access denied!');
            return redirect('admin/dashboard');
        }
		if($blog->is_status==1){
			$blog->is_status='0';
	   		$blog->save();
            UserActivitiesLog('Deactive', $blog->id, 'Blog');
	   		\Session::flash('flash_message', 'Deactive');
		}else{
			$blog->is_status='1';
	   		$blog->save();
            UserActivitiesLog('Active', $blog->id, 'Blog');
	   		\Session::flash('flash_message', 'Active');
		}
        return redirect()->back();
    }

    public function bloglisttrash()
    {
    	$allblog_trash = Blog::where('is_deleted','0')->orderBy('id')->get();
        return view('admin.pages.blogtrash',compact('allblog_trash'));
    }
  
   	public function restore_trash($id)
    {
    	if(Auth::User()->user_type!="Admin"){
            \Session::flash('flash_message', 'Access denied!');
            return redirect('admin/dashboard');
        }
        $blog = Blog::findOrFail($id);
        $blog->is_deleted='1';
        $blog->save();
        UserActivitiesLog('Restore', $blog->id, 'Blog');
        \Session::flash('flash_message', 'Restore');
        return redirect()->back();
    }

    public function permanent_trash($id)
    {
    	if(Auth::User()->user_type!="Admin"){
            \Session::flash('flash_message', 'Access denied!');
            return redirect('admin/dashboard');
        }
        $blog = Blog::findOrFail($id);
        $blog->is_deleted='2';
        $blog->save();
        UserActivitiesLog('Permanent Delete', $blog->id, 'Blog');
        \Session::flash('flash_message', 'Deleted');
        return redirect()->back();
    }
}
