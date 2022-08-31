<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use App\Models\User;

use Illuminate\Http\Request;
use App\Models\Blog;
use App\Models\Categories;
use App\Models\Videos;
use App\Models\Service;
use App\Models\Product;
use App\Models\Manufacturers;
use App\Models\Cart;
use App\Models\Countries;
use App\Models\States;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Validator;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;


class UserController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }

    public function profile()
    {
        $allcountries = Countries::where('is_deleted','1')->where('is_status','1')->orderBy('id')->get();
        $allstates = States::where('is_deleted','1')->where('is_status','1')->orderBy('id')->get();
        return view('pages.profile',compact('allcountries','allstates'));
    }
    public function updateprofile(Request $request)
    {
        $user_id = Auth::user()->id;
        // dd($user_id);
        $data =  \Request::except(array('_token'));
	    $inputs = $request->all();
	    $rule=array(
		        'email' => 'required|email|max:75|unique:users,email,'.$inputs['id'],
		        'firstname' => 'required',
		        'lastname' => 'required',
		        'phone' => 'required|max:10',
		        'phone_2' => 'max:10',
                'shipping_address' => 'required',
                'delivery_address' => 'required',
                'postal_code' => 'max:6',
                'country' => 'required'
		   		);
	   	$validator = \Validator::make($data,$rule);
        if ($validator->fails()){
            return redirect()->back()->withErrors($validator->messages());
        }

        $user = User::findOrFail($user_id);
        if ($inputs['image_icon'] != '') {
            $folderPath = 'public/upload/customer/';
            $image_parts = explode(";base64,", $inputs['image_icon']);
            $image_type_aux = explode("image/", $image_parts[0]);
            $image_type = $image_type_aux[1];
            $image_base64 = base64_decode($image_parts[1]);
            $imageName = uniqid() . '.png';
            $imageFullPath = $folderPath.$imageName;
            file_put_contents($imageFullPath, $image_base64);
            $user->image_icon = $imageFullPath;
        }
        $fullname = $inputs['firstname'].' '.$inputs['lastname'];
		$user->name = $fullname;
		$user->firstname = $inputs['firstname'];
		$user->lastname = $inputs['lastname'];
		$user->business_name = $inputs['business_name'];
		$user->email = $inputs['email'];
		$user->email_2 = $inputs['email_2'];
		$user->phone= $inputs['phone'];
		$user->phone_2= $inputs['phone_2'];
		$user->phone_2= $inputs['phone_2'];
        $user->shipping_address = $inputs['shipping_address'];
        $user->delivery_address = $inputs['delivery_address'];
        $user->postal_code = $inputs['postal_code'];
        $user->country = $inputs['country'];
	    $user->save();
        \Session::flash('flash_message', 'Profile Updated successfully....');
        return \Redirect::back();
    }

    public function reset_password()
    {
        return view('pages.reset_password');
    }
    public function postResetpassword(Request $request)
    {
        $data =  \Request::except(array('_token')) ;
        $rule  =  array(
                'password'       => 'required|min:8|confirmed',
                'password_confirmation'       => 'required') ;

        $validator = \Validator::make($data,$rule);
        if ($validator->fails())
        {
            return redirect()->back()->withErrors($validator->messages());
        }
        $credentials = $request->only('password', 'password_confirmation');
        $user = \Auth::user();
        $user->password = bcrypt($credentials['password']);
        // dd($user);
        $user->save();
	    \Session::flash('flash_message', 'Successfully updated!');
        return \Redirect::back();
        // return view('pages.reset_password');
    }

    public function my_account() { return view('pages.myaccount'); }

}
