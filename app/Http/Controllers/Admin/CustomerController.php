<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Support\Facades\Auth;
use App\Models\User;
use App\Models\Product;
use App\Models\Categories;
use App\Models\Manufacturers;
use App\Models\Conversation;
use App\Models\Usersnote;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Session;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use Illuminate\Validation\ValidationException;

class CustomerController extends Controller
{
    public function __construct()
    {
		$this->middleware('auth');
    }

    public function customerslist(Request $request)
    {
        $customer_id = empty($request->customer_id) ? null : $request->customer_id;
        $cust_type = empty($request->cust_type) ? null : $request->cust_type;
        $date_sort_by = empty($request->date_sort_by) ? 1 : $request->date_sort_by;

        $user_query = User::where('user_type', 'Customer')->where('is_deleted', '1');

        if(!empty($customer_id))
        {
            $user_query->where('id', $customer_id);
        }
        if(!empty($cust_type))
        {
            $user_query->where('cust_type', $cust_type);
        }

        if($date_sort_by == '1'){
            $user_query->orderBy('created_at', 'DESC');
        }elseif($date_sort_by == '2'){
            $user_query->orderBy('created_at', 'ASC');
        }elseif($date_sort_by == '3'){
            $user_query->orderBy('updated_at', 'DESC');
        }elseif($date_sort_by == '4'){
            $user_query->orderBy('updated_at', 'ASC');
        }

      	$total_number_of_customer = $user_query->count();
        $user_data = $user_query->paginate(25);
        $allusers = User::where('user_type', 'Customer')->where('is_deleted', '1')->get();
        return view('admin.pages.customers',
               compact('user_data','allusers','customer_id','cust_type',
                       'date_sort_by','total_number_of_customer'));
    }

    public function customer_detail($id)
    {
        $user_data = User::where('user_type', 'Customer')->where('id', $id)->get()->first();
        return view('admin.pages.customer_detail',compact('user_data'));
    }

    public function addeditUser()
    {
        return view('admin.pages.addeditcustomer');
    }

    public function addnew(Request $request)
    {
    	$data =  \Request::except(array('_token')) ;
	    $inputs = $request->all();
	    $rule=array('firstname' => 'required','lastname' => 'required');
	   	$validator = \Validator::make($data,$rule);

        if ($validator->fails()){
            return redirect()->back()->withErrors($validator->messages());
        }
        $validate_error = array();
		if(!empty($inputs['id'])){
            //$user = User::findOrFail($inputs['id']);
            $user_exist = User::where('email', $inputs['email'])->where('is_deleted','1')->where('id', '!=', $inputs['id'])->get()->count();
            if($user_exist > 0){
                $validate_error['email'] = __('Email Id has been taken.');
            }
            if(count($validate_error) > 0){
                throw ValidationException::withMessages($validate_error);
            }else{
                $user = User::findOrFail($inputs['id']);
            }
        }else{
            $user_exist = User::where('email', $inputs['email'])->where('is_deleted','1')->get()->count();
            if($user_exist > 0){
                $validate_error['email'] = __('Email Id has been taken.');
            }
            if(count($validate_error) > 0){
                throw ValidationException::withMessages($validate_error);
            }else{
                $user = new User;
            }
        }
		$user->user_type = "Customer";
		$user->cust_type = $inputs['cust_type'];
		$user->name = $inputs['firstname'] ." ".$inputs['lastname'];
		$user->firstname = $inputs['firstname'];
		$user->lastname = $inputs['lastname'];
        $user->email = $inputs['email'];
        $user->email_2 = $inputs['email_2'];
        $user->phone = $inputs['phone'];
		$user->phone_2 = $inputs['phone_2'];
        $user->cust_note = $inputs['cust_note'];

		$user->shipping_address = $inputs['shipping_address'];
		$user->delivery_address = $inputs['delivery_address'];
		$user->postal_code = $inputs['postal_code'];
		$user->country = $inputs['country'];

		$user->business_name = $inputs['business_name'];
		$user->website = $inputs['website'];
		$user->company_linkedin = $inputs['company_linkedin'];
		$user->linkedin_profile = $inputs['linkedin_profile'];
		$user->facebook_page = $inputs['facebook_page'];

        if ($request->post('lead_source') != '') {
            $user->lead_source = $inputs['lead_source'];
        }else{
            $user->lead_source = Null;
        }
        if ($request->post('lead_interest') != '') {
            $user->lead_interest = $inputs['lead_interest'];
        }else{
            $user->lead_interest = Null;
        }

        if ($request->post('newsletters') != '') {
            $user->newsletters = $inputs['newsletters'];
        }else{
            $user->newsletters = 'No';
        }
      	$user->created_at = $inputs['created_at'];
	    $user->save();

		if(!empty($inputs['id'])){
            UserActivitiesLog('Updated', $user->id, 'Customer');
            \Session::flash('flash_message', 'Customer Updated Successfully');
            return \Redirect::back();
        }else{
            UserActivitiesLog('Created', $user->id, 'Customer');
            \Session::flash('flash_message', 'Customer Added Successfully');
            return \Redirect::back();
        }
    }

    public function editUser($id)
    {
        $user = User::findOrFail($id);
        $user_notes = Usersnote::where('user_id', $id)->where('is_deleted','1')->orderBy('updated_at', 'desc')->get();
        $user_conversations = Conversation::where('user_id', $id)->where('is_deleted','1')->orderBy('updated_at', 'desc')->get();
        return view('admin.pages.addeditcustomer', compact('user','user_notes','user_conversations'));
    }

    public function GetUserInfo($id)
    {
        return User::findOrFail($id);
    }
  
  	// Customer Note Generator Start
    public function addcustomernote(Request $request)
    {
    	$data =  \Request::except(array('_token')) ;
	    $inputs = $request->all();
	    $rule=array('user_note' => 'required');
	   	$validator = \Validator::make($data,$rule);

        if ($validator->fails()){
            return redirect()->back()->withErrors($validator->messages());
        }

        $user_note = new Usersnote;
		$user_note->user_id = $inputs['user_id'];
		$user_note->user_note = $inputs['user_note'];
		$user_note->created_by = Auth::user()->id;
        $user_note->save();

        UserActivitiesLog('Customer Note', $user_note->id, 'Customer');
        \Session::flash('flash_message', 'Created Customer Note');
        return \Redirect::back();

    }

    public function delete_notes($id)
    {
        $user_note = Usersnote::findOrFail($id);
        $user_note->is_deleted='0';
        $user_note->save();

        UserActivitiesLog('Customer Note Soft Delete', $user_note->id, 'Customer');
        \Session::flash('flash_message', 'Customer Note Soft Delete');
        return redirect()->back();
    }
    // Customer Note Generator Ends

    // Customer Conversation Generator Start
    public function addconversation(Request $request)
    {
    	$data =  \Request::except(array('_token')) ;
	    $inputs = $request->all();
	    $rule=array('conversation' => 'required');
	   	$validator = \Validator::make($data,$rule);

        if ($validator->fails()){
            return redirect()->back()->withErrors($validator->messages());
        }

        $conversation = new Conversation;
		$conversation->user_id = $inputs['user_id'];
		$conversation->conversation = $inputs['conversation'];
		$conversation->created_by = Auth::user()->id;
        $conversation->save();

        UserActivitiesLog('Conversation', $conversation->id, 'Customer');
        \Session::flash('flash_message', 'Created Customer Conversation');
        return \Redirect::back();

    }

    public function delete_conversation($id)
    {
        $conversation = Conversation::findOrFail($id);
        $conversation->is_deleted='0';
        $conversation->save();

        UserActivitiesLog('Conversation Soft Delete', $conversation->id, 'Customer');
        \Session::flash('flash_message', 'Customer Conversation Soft Delete');
        return redirect()->back();
    }
    // Customer Conversation Generator Ends

}
