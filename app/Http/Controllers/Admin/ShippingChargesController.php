<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Support\Facades\Auth;
use App\Models\User;
use App\Models\Countries;
use App\Models\States;
use App\Models\ShippingCharges;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Session;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class ShippingChargesController extends Controller
{
    public function __construct()
    {
		$this->middleware('auth');
    }

    public function shippingchargelist()
    {

    	$allshippingcharges = ShippingCharges::join('countries',  'countries.id', '=', 'shipping_charges.country_id')
        ->where('shipping_charges.is_deleted','1')->where('shipping_charges.is_status','1')->orderBy('shipping_charges.id')
        ->get(['shipping_charges.*', 'countries.country_name']);
        $allstates = States::where('is_deleted','1')->where('is_status','1')->orderBy('id')->get();
        return view('admin.pages.shipping_charges',compact('allshippingcharges','allstates'));
    }
    public function addshippingcharge()    {

        if(Auth::User()->user_type!="Admin"){
            \Session::flash('flash_message', 'Access denied!');
            return redirect('admin/dashboard');
        }
        $allcountries = Countries::where('is_deleted','1')->where('is_status','1')->orderBy('id')->get();
        $allstates = States::where('is_deleted','1')->where('is_status','1')->orderBy('id')->get();
        return view('admin.pages.addeditshippingcharge',compact('allcountries','allstates'));
    }
    public function addnew(Request $request)
    {
    	$data =  \Request::except(array('_token')) ;
	    $inputs = $request->all();
	    $rule=array('country_type' => 'required',
                    'parcel_type' => 'required',
                    'country' => 'required');
	   	$validator = \Validator::make($data,$rule);

        if ($validator->fails()){
            return redirect()->back()->withErrors($validator->messages());
        }

		if(!empty($inputs['id'])){
            $shippingcharge = ShippingCharges::findOrFail($inputs['id']);
        }else{
            $shippingcharge = new ShippingCharges;
        }

		$shippingcharge->country_type = $inputs['country_type'];
		$shippingcharge->country_id = $inputs['country'];
        $shippingcharge->parcel_type = $inputs['parcel_type'];
        $shippingcharge->state_id = $inputs['state'];
        $shippingcharge->delivery_next_day = $inputs['next_day_delivery'];
        $shippingcharge->delivery_days_2_3 = $inputs['2_3_days_delivery'];
        $shippingcharge->delivery_days_3_4 = $inputs['3_4_days_delivery'];
        $shippingcharge->delivery_days_4_5 = $inputs['4_5_days_delivery'];
        $shippingcharge->delivery_price = $inputs['delivery_price'];
        $shippingcharge->delivery_time = $inputs['delivery_time'];
        $shippingcharge->shipping_rate_under = $inputs['shipping_rate_under'];
        $shippingcharge->shipping_rate_over = $inputs['shipping_rate_over'];
	    $shippingcharge->save();
		if(!empty($inputs['id'])){
            UserActivitiesLog('Updated', $shippingcharge->id, 'Shipping Charges');
            \Session::flash('flash_message', 'Shipping Charges Updated Successfully');
            return \Redirect::back();
        }else{
            UserActivitiesLog('Created', $shippingcharge->id, 'Shipping Charges');
            \Session::flash('flash_message', 'Shipping Charges Added Successfully');
            return \Redirect::back();
        }
    }

    public function editshippingcharge($id)
    {
        if(Auth::User()->user_type!="Admin"){
            \Session::flash('flash_message', 'Access denied!');
            return redirect('admin/dashboard');
        }
        $shippingcharge = ShippingCharges::findOrFail($id);
        $allcountries = Countries::where('is_deleted','1')->where('is_status','1')->orderBy('id')->get();
        $allstates = States::where('is_deleted','1')->where('is_status','1')->orderBy('id')->get();
        return view('admin.pages.addeditshippingcharge',compact('shippingcharge','allcountries','allstates'));
    }

    public function delete($id)
    {
    	if(Auth::User()->user_type!="Admin"){
            \Session::flash('flash_message', 'Access denied!');
            return redirect('admin/dashboard');
        }
        $shippingcharge = ShippingCharges::findOrFail($id);
		$shippingcharge->is_deleted='0';
        $shippingcharge->save();
        UserActivitiesLog('Soft Delete', $shippingcharge->id, 'Shipping Charges');
        \Session::flash('flash_message', 'Deleted');
        return redirect()->back();
    }

}
