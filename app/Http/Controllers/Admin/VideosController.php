<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Support\Facades\Auth;
use App\Models\User;
use App\Models\Videos;
use App\Models\Categories;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Session;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class VideosController extends Controller
{
    public function __construct()
    {
		 $this->middleware('auth');
    }

    public function videoslist()
    {
    	$allvideos = Videos::where('is_deleted','1')->orderBy('id')->get();
        return view('admin.pages.videos',compact('allvideos'));
    }

    public function addeditvideos()
    {
        if(Auth::User()->user_type!="Admin"){
            \Session::flash('flash_message', 'Access denied!');
            return redirect('admin/dashboard');
        }
        $category_list = Categories::where('is_status','1')->where('category_assign', 'video')->orderBy('category_name')->get();
        return view('admin.pages.addeditvideos',compact('category_list'));
    }

    public function addnew(Request $request)
    {
    	$data =  \Request::except(array('_token')) ;
	    $inputs = $request->all();
	    $rule=array('video_title' => 'required', 'video_youtube_url' => 'required');
	   	$validator = \Validator::make($data,$rule);

        if ($validator->fails()){
            return redirect()->back()->withErrors($validator->messages());
        }

		if(!empty($inputs['id'])){
            $videos = Videos::findOrFail($inputs['id']);
        }else{
            $videos = new Videos;
        }

		$videos->category_id = $inputs['category_id'];
		$videos->video_title = $inputs['video_title'];
		$videos->description = $inputs['video_description'];
		$videos->youtube_url = $inputs['video_youtube_url'];
	    $videos->save();

		if(!empty($inputs['id'])){
            UserActivitiesLog('Updated', $videos->id, 'Video');
            \Session::flash('flash_message', 'Video Updated Successfully');
            return \Redirect::back();
        }else{
            UserActivitiesLog('Created', $videos->id, 'Video');
            \Session::flash('flash_message', 'Video Added Successfully');
            return \Redirect::back();
        }
    }

    public function editvideos($id)
    {
    	  if(Auth::User()->user_type!="Admin"){
            \Session::flash('flash_message', 'Access denied!');
            return redirect('admin/dashboard');
        }
          $video = Videos::findOrFail($id);
          $category_list = Categories::where('is_status','1')->where('category_assign', 'video')->orderBy('category_name')->get();
          return view('admin.pages.addeditvideos',compact('category_list','video'));
    }

    public function delete($id)
    {
    	if(Auth::User()->user_type!="Admin"){
            \Session::flash('flash_message', 'Access denied!');
            return redirect('admin/dashboard');
        }
        $videos = Videos::findOrFail($id);
        $videos->is_deleted='0';
        $videos->save();
        UserActivitiesLog('Soft Delete', $videos->id, 'Video');
        \Session::flash('flash_message', 'Deleted');
        return redirect()->back();
    }

    public function status($id)
    {
        $videos = Videos::findOrFail($id);

       	if(Auth::User()->user_type!="Admin"){
            \Session::flash('flash_message', 'Access denied!');
            return redirect('admin/dashboard');
        }

		if($videos->is_status==1){
			$videos->is_status='0';
	   		$videos->save();
            UserActivitiesLog('Deactive', $videos->id, 'Video');
	   		\Session::flash('flash_message', 'Deactive');
		}else{
			$videos->is_status='1';
	   		$videos->save();
            UserActivitiesLog('Active', $videos->id, 'Video');
	   		\Session::flash('flash_message', 'Active');
		}
        return redirect()->back();
    }

    public function videoslisttrash()
    {
    	$allvideos_trash = Videos::where('is_deleted','0')->orderBy('id')->get();
        return view('admin.pages.videostrash',compact('allvideos_trash'));
    }
  
 	public function restore_trash($id)
    {
    	if(Auth::User()->user_type!="Admin"){
            \Session::flash('flash_message', 'Access denied!');
            return redirect('admin/dashboard');
        }
        $videos = Videos::findOrFail($id);
        $videos->is_deleted='1';
        $videos->save();
        UserActivitiesLog('Restore', $videos->id, 'Video');
        \Session::flash('flash_message', 'Restore');
        return redirect()->back();
    }

    public function permanent_trash($id)
    {
    	if(Auth::User()->user_type!="Admin"){
            \Session::flash('flash_message', 'Access denied!');
            return redirect('admin/dashboard');
        }
        $videos = Videos::findOrFail($id);
        $videos->is_deleted='2';
        $videos->save();
        UserActivitiesLog('Permanent Delete', $videos->id, 'Video');
        \Session::flash('flash_message', 'Deleted');
        return redirect()->back();
    }
}
