<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Support\Facades\Auth;
use App\Models\User;
use App\Models\Manufacturers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Session;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class ManufacturersController extends Controller
{
    public function __construct()
    {
		$this->middleware('auth');
    }

    public function manufacturerlist()
    {

    	$allmanufacturers = Manufacturers::where('is_deleted','1')->where('is_status','1')->orderBy('id')->get();
        return view('admin.pages.manufacturers',compact('allmanufacturers'));
    }

    public function addeditmanufacturer()
    {

        if(Auth::User()->user_type!="Admin"){
            \Session::flash('flash_message', 'Access denied!');
            return redirect('admin/dashboard');
        }
        return view('admin.pages.addeditmanufacturer');
    }

    public function addnew(Request $request)
    {
    	$data =  \Request::except(array('_token')) ;
	    $inputs = $request->all();
	    $rule=array('manufacturers_name' => 'required');
	   	$validator = \Validator::make($data,$rule);

        if ($validator->fails()){
            return redirect()->back()->withErrors($validator->messages());
        }

		if(!empty($inputs['id'])){
            $manufacturer = Manufacturers::findOrFail($inputs['id']);
        }else{
            $manufacturer = new Manufacturers;
        }

		$manufacturer->manufacturers_name = $inputs['manufacturers_name'];
        $manufacturer->manufacturers_slug=Str::slug($inputs['manufacturers_name'], "-");
		$manufacturer->manufacturers_assign = $inputs['manufacturers_assign'];
	    $manufacturer->save();
		if(!empty($inputs['id'])){
            UserActivitiesLog('Updated', $manufacturer->id, 'Manufacturer');
            \Session::flash('flash_message', 'Manufacturer Updated Successfully');
            return \Redirect::back();
        }else{
            UserActivitiesLog('Created', $manufacturer->id, 'Manufacturer');
            \Session::flash('flash_message', 'Manufacturer Added Successfully');
            return \Redirect::back();
        }
    }

    public function editmanufacturer($id)
    {
        if(Auth::User()->user_type!="Admin"){
            \Session::flash('flash_message', 'Access denied!');
            return redirect('admin/dashboard');
        }
        $manufacturer = Manufacturers::findOrFail($id);
        return view('admin.pages.addeditmanufacturer',compact('manufacturer'));
    }

    public function delete($id)
    {
    	if(Auth::User()->user_type!="Admin"){
            \Session::flash('flash_message', 'Access denied!');
            return redirect('admin/dashboard');
        }
        $manufacturer = Manufacturers::findOrFail($id);
		$manufacturer->is_deleted='0';
        $manufacturer->save();
        UserActivitiesLog('Soft Delete', $manufacturer->id, 'Manufacturer');
        \Session::flash('flash_message', 'Deleted');
        return redirect()->back();
    }

    public function status($id)
    {
        $manufacturer = Manufacturers::findOrFail($id);
       	if(Auth::User()->user_type!="Admin"){
            \Session::flash('flash_message', 'Access denied!');
            return redirect('admin/dashboard');
        }
		if($manufacturer->is_status==1){
			$manufacturer->is_status='0';
	   		$manufacturer->save();
            UserActivitiesLog('Deactive', $manufacturer->id, 'Manufacturer');
	   		\Session::flash('flash_message', 'Deactive');
		}else{
			$manufacturer->is_status='1';
	   		$manufacturer->save();
            UserActivitiesLog('Active', $manufacturer->id, 'Manufacturer');
	   		\Session::flash('flash_message', 'Active');
		}
        return redirect()->back();
    }
}
