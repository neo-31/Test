<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Support\Facades\Auth;
use App\Models\User;
use App\Models\Countries;
use App\Models\States;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Session;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class StatesController extends Controller
{
    public function __construct()
    {
		$this->middleware('auth');
    }

    public function statelist()
    {

    	$allstates = States::join('countries',  'countries.id', '=', 'states.country_id')
        ->where('states.is_deleted','1')->where('states.is_status','1')->orderBy('states.id')
        ->get(['states.*', 'countries.country_name']);
        return view('admin.pages.states',compact('allstates'));
    }
    public function addstate()
    {

        if(Auth::User()->user_type!="Admin"){
            \Session::flash('flash_message', 'Access denied!');
            return redirect('admin/dashboard');
        }
        $allcountries = Countries::where('is_deleted','1')->where('is_status','1')->orderBy('id')->get();
        return view('admin.pages.addeditstate',compact('allcountries'));
    }
    public function addnew(Request $request)
    {
    	$data =  \Request::except(array('_token')) ;
	    $inputs = $request->all();
	    $rule=array('state_name' => 'required',
                    'country' => 'required');
	   	$validator = \Validator::make($data,$rule);

        if ($validator->fails()){
            return redirect()->back()->withErrors($validator->messages());
        }

		if(!empty($inputs['id'])){
            $state = States::findOrFail($inputs['id']);
        }else{
            $state = new States;
        }

		$state->state_name = $inputs['state_name'];
		$state->country_id = $inputs['country'];
	    $state->save();
		if(!empty($inputs['id'])){
            UserActivitiesLog('Updated', $state->id, 'State');
            \Session::flash('flash_message', 'State Updated Successfully');
            return \Redirect::back();
        }else{
            UserActivitiesLog('Created', $state->id, 'State');
            \Session::flash('flash_message', 'State Added Successfully');
            return \Redirect::back();
        }
    }

    public function editstate($id)
    {
        if(Auth::User()->user_type!="Admin"){
            \Session::flash('flash_message', 'Access denied!');
            return redirect('admin/dashboard');
        }
        $state = States::findOrFail($id);
        $allcountries = Countries::where('is_deleted','1')->where('is_status','1')->orderBy('id')->get();
        //echo "<pre>";print_r($state);die;
        return view('admin.pages.addeditstate',compact('state','allcountries'));
    }

    public function delete($id)
    {
    	if(Auth::User()->user_type!="Admin"){
            \Session::flash('flash_message', 'Access denied!');
            return redirect('admin/dashboard');
        }
        $state = States::findOrFail($id);
		$state->is_deleted='0';
        $state->save();
        UserActivitiesLog('Soft Delete', $state->id, 'State');
        \Session::flash('flash_message', 'Deleted');
        return redirect()->back();
    }

}
