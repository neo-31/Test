<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Support\Facades\Auth;
use App\Models\User;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Session;
use Illuminate\Support\Str;

class AdminController extends Controller
{
	public function __construct()
    {
		 $this->middleware('auth');
    }

	public function profile()
    {
        return view('admin.pages.profile');
    }

    public function updateProfile(Request $request)
    {
        \Session::flash('profile_tab', '1');
    	$user = User::findOrFail(Auth::user()->id);
	    $data =  \Request::except(array('_token')) ;

	    $rule=array(
		        'name' => 'required',
		        'email' => 'required|email|max:75|unique:users,id'
		   		 );

	   	$validator = \Validator::make($data,$rule);
        if ($validator->fails())
        {
            return redirect()->back()->withErrors($validator->messages());
        }

	    $inputs = $request->all();
		if ($inputs['image_icon'] != '') {
            $folderPath = 'public/upload/members/';
            $image_parts = explode(";base64,", $inputs['image_icon']);
            $image_type_aux = explode("image/", $image_parts[0]);
            $image_type = $image_type_aux[1];
            $image_base64 = base64_decode($image_parts[1]);
            $imageName = uniqid() . '.png';
            $imageFullPath = $folderPath.$imageName;
            file_put_contents($imageFullPath, $image_base64);
            $user->image_icon = $imageFullPath;
        }
		$user->name = $inputs['name'];
		$user->email = $inputs['email'];
		$user->phone = $inputs['phone'];
		$user->fax = $inputs['fax'];
	    $user->save();

	    Session::flash('flash_message', 'Successfully updated!');
        return redirect()->back();
    }

    public function updatePassword(Request $request)
    {
        \Session::flash('profile_tab', '2');
        $data =  \Request::except(array('_token')) ;
        $rule  =  array(
                'password'       => 'required|confirmed',
                'password_confirmation'       => 'required') ;

        $validator = \Validator::make($data,$rule);
        if ($validator->fails())
        {
            return redirect()->back()->withErrors($validator->messages());
        }
	    $credentials = $request->only('password', 'password_confirmation');
        $user = \Auth::user();
        $user->password = bcrypt($credentials['password']);
        $user->save();
	    Session::flash('flash_message', 'Successfully updated!');
        return redirect()->back();
    }


}
