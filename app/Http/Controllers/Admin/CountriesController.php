<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Support\Facades\Auth;
use App\Models\User;
use App\Models\Countries;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Session;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class CountriesController extends Controller
{
    public function __construct()
    {
		$this->middleware('auth');
    }

    public function countrylist()
    {

    	$allcountries = Countries::where('is_deleted','1')->where('is_status','1')->orderBy('id')->get();
        return view('admin.pages.countries',compact('allcountries'));
    }
    public function addcountry()
    {

        if(Auth::User()->user_type!="Admin"){
            \Session::flash('flash_message', 'Access denied!');
            return redirect('admin/dashboard');
        }
        return view('admin.pages.addeditcountry');
    }
    public function addnew(Request $request)
    {
    	$data =  \Request::except(array('_token')) ;
	    $inputs = $request->all();
	    $rule=array('country_name' => 'required');
	   	$validator = \Validator::make($data,$rule);

        if ($validator->fails()){
            return redirect()->back()->withErrors($validator->messages());
        }

		if(!empty($inputs['id'])){
            $country = Countries::findOrFail($inputs['id']);
        }else{
            $country = new Countries;
        }

		$country->country_name = $inputs['country_name'];
	    $country->save();
		if(!empty($inputs['id'])){
            UserActivitiesLog('Updated', $country->id, 'Country');
            \Session::flash('flash_message', 'Country Updated Successfully');
            return \Redirect::back();
        }else{
            UserActivitiesLog('Created', $country->id, 'country');
            \Session::flash('flash_message', 'Country Added Successfully');
            return \Redirect::back();
        }
    }

    public function editcountry($id)
    {
        if(Auth::User()->user_type!="Admin"){
            \Session::flash('flash_message', 'Access denied!');
            return redirect('admin/dashboard');
        }
        $country = Countries::findOrFail($id);
        //echo "<pre>";print_r($country);die;
        return view('admin.pages.addeditcountry',compact('country'));
    }

    public function delete($id)
    {
    	if(Auth::User()->user_type!="Admin"){
            \Session::flash('flash_message', 'Access denied!');
            return redirect('admin/dashboard');
        }
        $country = Countries::findOrFail($id);
		$country->is_deleted='0';
        $country->save();
        UserActivitiesLog('Soft Delete', $country->id, 'Country');
        \Session::flash('flash_message', 'Deleted');
        return redirect()->back();
    }

}
