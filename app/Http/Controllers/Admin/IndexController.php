<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Support\Facades\Auth;
use App\Models\User;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class IndexController extends Controller
{
    public function index()
    {
    	if (Auth::check()) {
            return redirect('admin/dashboard');
        }
        return view('admin.index');
    }

    public function postLogin(Request $request)
    {
        $this->validate($request, ['email' => 'required|email', 'password' => 'required']);
        $credentials = $request->only('email', 'password');
        if (Auth::attempt($credentials, $request->has('remember'))) {
            if(Auth::user()->user_type=='banned'){
                \Auth::logout();
                return array("errors" => 'You account has been banned!');
            }
            return $this->handleUserWasAuthenticated($request);
        }
       return redirect('/admin')->withErrors('The email or the password is invalid. Please try again.');
    }

    protected function handleUserWasAuthenticated(Request $request)
    {
        if (method_exists($this, 'authenticated')) {
            return $this->authenticated($request, Auth::user());
        }
        UserActivitiesLog('Logged in', Auth::user()->id, 'User');
        return redirect('admin/dashboard');
    }

    public function register()
    {
    	if (Auth::check()) {
            return redirect('admin/dashboard');
        }
        return view('admin.register');
    }

    public function postRegister(Request $request)
    {
    	$data =  \Request::except(array('_token'));
	    $inputs = $request->all();
	    $rule=array(
		        'name' => 'required',
		        'email' => 'required|email|max:75|unique:users',
		        'password' => 'required|min:3|confirmed'
		   		);
	   	 $validator = \Validator::make($data,$rule);
        if ($validator->fails()){
            return redirect()->back()->withErrors($validator->messages());
        }
        $user = new User;
		$user->user_type = $inputs['user_type'];
		$user->name = $inputs['name'];
		$user->email = $inputs['email'];
		$user->password= bcrypt($inputs['password']);
		$user->phone= $inputs['phone'];
	    $user->save();

        \Session::flash('flash_message', 'Register successfully....');
        return \Redirect::back();
    }

    public function logout()
    {
        Auth::logout();
        return redirect('/');
    }

}

