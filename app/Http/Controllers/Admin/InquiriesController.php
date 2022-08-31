<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Support\Facades\Auth;
use App\Models\User;
use App\Models\Inquiry;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Session;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use Illuminate\Validation\ValidationException;

class InquiriesController extends Controller
{
    public function __construct()
    {
		 $this->middleware('auth');
    }

    public function inquirieslist()
    {
    	$allinquiry = Inquiry::where('is_status','1')->where('is_deleted','1')->orderBy('created_at', 'DESC')->paginate(10);
    	$inquiry_log = Inquiry::orWhere('is_status','0')->orWhere('is_deleted','0')->orderBy('created_at','DESC')->get();
        return view('admin.pages.inquiries',compact('allinquiry','inquiry_log'));
    }

    public function delete($id)
    {
    	if(Auth::User()->user_type!="Admin"){
            \Session::flash('flash_message', 'Access denied!');
            return redirect('admin/dashboard');
        }
        $inquiry = Inquiry::findOrFail($id);
        $inquiry->is_deleted='0';
        $inquiry->updated_by=Auth::User()->id;
        $inquiry->save();
        UserActivitiesLog('Deleted', $inquiry->id, 'Inquiry');
        \Session::flash('flash_message', 'Deleted');
        return redirect()->back();
    }

    public function assigntocustomer($id)
    {
        $inputs = $request->all();
        $inquiry = Inquiry::findOrFail($request->inquiry_id);

        $user = new User;
        $user->user_type = "Customer";
        $user->cust_type = $inputs['cust_type'];
        $user->name = $inquiry->name;
        $user->firstname = $inquiry->name;
        $user->email = $inquiry->email;
        $user->phone = $inquiry->phone;
        $user->cust_note = $inquiry->message;
        $user->newsletters = $inputs['newsletters'];
        $user->save();

        $inquiry->is_status='0';
        $inquiry->updated_by=Auth::User()->id;
        $inquiry->save();

        UserActivitiesLog('Inquiry Assign To Customer', $inquiry->id, 'Inquiry');
        \Session::flash('flash_message', 'Assign To Customer');
        return redirect()->back();

    }

    public function GetinquiryInfo($id)
    {
        return Inquiry::findOrFail($id);
    }
}
