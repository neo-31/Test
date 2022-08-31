<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Support\Facades\Auth;
use App\Models\User;
use App\Models\Service;
use App\Models\Servicetab;
use App\Models\Categories;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Session;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class ServiceController extends Controller
{
    public function __construct()
    {
		$this->middleware('auth');
    }

    public function servicelist()
    {
    	$allservice = service::where('is_deleted','1')->orderBy('id')->get();
        return view('admin.pages.services',compact('allservice'));
    }
    public function  editservice($id)
    {
        if(Auth::User()->user_type!="Admin"){
            \Session::flash('flash_message', 'Access denied!');
            return redirect('admin/dashboard');
        }
        $service = Service::findOrFail($id);
        $category_list = Categories::where('is_status','1')->where('is_deleted','1')->where('category_assign', 'service')->orderBy('category_name')->get();
        return view('admin.pages.addeditservice',compact('service','category_list'));
    }
    public function addeditservice(){

        if(Auth::User()->user_type!="Admin"){
            \Session::flash('flash_message', 'Access denied!');
            return redirect('admin/dashboard');
        }
         $category_list = Categories::where('is_status','1')->where('is_deleted','1')->where('category_assign', 'service')->orderBy('category_name')->get();
        return view('admin.pages.addeditservice',compact('category_list'));
    }
    public function addnew(Request $request){

        $data =  \Request::except(array('_token')) ;
        $inputs = $request->all();
        $rule=array('service_name' => 'required','category_id'=>'required');
        $messages = array(
            'category_id.required'=>    'The category field is required.',
            'service_inner_image.required'=> 'Please choose inner image.'
        );

        $validator = \Validator::make($data,$rule,$messages);
        if ($validator->fails()){
            return redirect()->back()->withErrors($validator->messages());
        }
        if(!empty($inputs['id'])){
            $service = Service::findOrFail($inputs['id']);
        }else{
            $service = new Service;
        }
        if ($inputs['service_features_image'] != '') {
            $folderPath = 'public/upload/service/';
            $image_parts = explode(";base64,", $inputs['service_features_image']);
            $image_type_aux = explode("image/", $image_parts[0]);
            $image_type = $image_type_aux[1];
            $image_base64 = base64_decode($image_parts[1]);
            $imageName = uniqid() . '.png';
            $imageFullPath = $folderPath.$imageName;
            file_put_contents($imageFullPath, $image_base64);
            $service->features_image = $imageFullPath;
        }
        if ($inputs['service_inner_image'] != '') {
            $folderPath = 'public/upload/service/';
            $image_parts = explode(";base64,", $inputs['service_inner_image']);
            $image_type_aux = explode("image/", $image_parts[0]);
            $image_type = $image_type_aux[1];
            $image_base64 = base64_decode($image_parts[1]);
            $imageName = uniqid() . '.png';
            $imageFullPath = $folderPath.$imageName;
            file_put_contents($imageFullPath, $image_base64);
            $service->inner_image = $imageFullPath;
        }
        if ($inputs['service_inner_image1'] != '') {
            $folderPath = 'public/upload/service/';
            $image_parts = explode(";base64,", $inputs['service_inner_image1']);
            $image_type_aux = explode("image/", $image_parts[0]);
            $image_type = $image_type_aux[1];
            $image_base64 = base64_decode($image_parts[1]);
            $imageName = uniqid() . '.png';
            $imageFullPath = $folderPath.$imageName;
            file_put_contents($imageFullPath, $image_base64);
            $service->inner_image1 = $imageFullPath;
        }

        $service->service_name=$inputs['service_name'];
        $service->service_slug=Str::slug($inputs['service_name'], "-");
        $service->service_meta_tag=$inputs['service_meta_tag'];
        $service->service_meta_description=$inputs['service_meta_description'];
        $service->tab1_description=$inputs['tab1_description'];
        $service->tab2_description=$inputs['tab2_description'];
        $service->tab3_description=$inputs['tab3_description'];
        $service->tab1title=$inputs['tab1title'];
        $service->tab2title=$inputs['tab2title'];
        $service->tab3title=$inputs['tab3title'];
        $service->category_id=$inputs['category_id'];
        $service->service_description=$inputs['Description'];
        $service->sort_description=$inputs['sort_description'];
      	if ($request->post('frontend_view') != '') {
            $service->frontend_view = $inputs['frontend_view'];
        }else{
            $service->frontend_view = 'No';
        }
        $service->save();

        if(!empty($inputs['id'])){
            UserActivitiesLog('Updated', $service->id, 'Service');
            \Session::flash('flash_message', 'Service Updated Successfully');
            return \Redirect::back();
        }else{
            UserActivitiesLog('Created', $service->id, 'Service');
            \Session::flash('flash_message', 'Service Added Successfully');
            return \Redirect::back();
        }
    }

    public function delete($id){
        if(Auth::User()->user_type!="Admin"){
            \Session::flash('flash_message', 'Access denied!');
            return redirect('admin/dashboard');
        }
        $service = Service::findOrFail($id);
        $service->is_deleted='0';
        $service->save();
        UserActivitiesLog('Soft Delete', $service->id, 'Service');
        \Session::flash('flash_message', 'Deleted');
        return redirect()->back();
    }

    public function status($id)
    {
        $service = Service::findOrFail($id);
        if(Auth::User()->user_type!="Admin"){
            \Session::flash('flash_message', 'Access denied!');
            return redirect('admin/dashboard');
        }
		if($service->is_status==1){
			$service->is_status='0';
	   		$service->save();
            UserActivitiesLog('Deactive', $service->id, 'Service');
	   		\Session::flash('flash_message', 'Deactive');
		}else{
			$service->is_status='1';
	   		$service->save();
            UserActivitiesLog('Active', $service->id, 'Service');
	   		\Session::flash('flash_message', 'Active');
		}
        return redirect()->back();
    }

    public function servicelisttrash()
    {
    	$allservice_trash = Service::where('is_deleted','0')->orderBy('id')->get();
        return view('admin.pages.servicetrash',compact('allservice_trash'));
    }

   	public function restore_trash($id)
    {
    	if(Auth::User()->user_type!="Admin"){
            \Session::flash('flash_message', 'Access denied!');
            return redirect('admin/dashboard');
        }
        $service = Service::findOrFail($id);
        $service->is_deleted='1';
        $service->save();
        UserActivitiesLog('restore', $service->id, 'Service');
        \Session::flash('flash_message', 'restore');
        return redirect()->back();
    }
    public function permanent_trash($id)
    {
    	if(Auth::User()->user_type!="Admin"){
            \Session::flash('flash_message', 'Access denied!');
            return redirect('admin/dashboard');
        }
        $service = Service::findOrFail($id);
        $service->is_deleted='2';
        $service->save();
        UserActivitiesLog('Permanent Delete', $service->id, 'Service');
        \Session::flash('flash_message', 'Deleted');
        return redirect()->back();
    }


    public function tab()
    {
          if(Auth::User()->user_type!="Admin"){
            \Session::flash('flash_message', 'Access denied!');
            return redirect('admin/dashboard');
        }
        $servicetabs = Servicetab::where('is_deleted','1')->orderBy('id')->get();
       // print_r($servicetabs);die;
        return view('admin.pages.servicestab',compact('servicetabs'));

    }
     public function  editservicetab($id)
    {
        if(Auth::User()->user_type!="Admin"){
            \Session::flash('flash_message', 'Access denied!');
            return redirect('admin/dashboard');
        }
        $servicetab = Servicetab::findOrFail($id);
        return view('admin.pages.addeditservicetab',compact('servicetab'));
    }
     public function addnewtab(Request $request){

        $data =  \Request::except(array('_token')) ;
        $inputs = $request->all();
        $rule=array('tab_title' => 'required');
        $validator = \Validator::make($data,$rule);
        if ($validator->fails()){
            return redirect()->back()->withErrors($validator->messages());
        }
        if(!empty($inputs['id'])){
            $service = Service::findOrFail($inputs['id']);
        }else{
            $servicetab = new Servicetab;
        }

        //echo "<pre>";print_r($inputs);die;
        $servicetab->tab_title=$inputs['tab_title'];
        $servicetab->tab_description=$inputs['tab_description'];


        $servicetab->save();
        if(!empty($inputs['id'])){
            \Session::flash('flash_message', 'Updated Successfully');
            return \Redirect::back();
        }else{
            \Session::flash('flash_message', 'Added Successfully');
            return \Redirect::back();
        }


    }
}
