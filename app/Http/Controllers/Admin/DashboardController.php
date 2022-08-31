<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Support\Facades\Auth;
use App\Models\User;
use App\Models\Categories;
use App\Models\Blog;
use App\Models\Videos;
use App\Models\Service;
use App\Models\Product;
use App\Models\Activities;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;


class DashboardController extends Controller
{
	public function __construct()
    {
		 $this->middleware('auth');
    }

    public function index()
    {
        if(Auth::User()->user_type!="Admin"){
            \Session::flash('flash_message', 'Access denied!');
            return redirect('admin/dashboard');
        }
        $blog = Blog::where('is_deleted','1')->where('is_status','1')->count();
        $video = Videos::where('is_deleted','1')->where('is_status','1')->count();
        $service = service::where('is_deleted','1')->where('is_status','1')->count();
        $product = Product::where('is_deleted','1')->where('is_status','1')->count();
        $activities_list = Activities::where('is_status','1')->orderBy('id', 'desc')->take(25)->get();
        return view('admin.pages.dashboard',compact('blog','service','product','video','activities_list'));
    }
}
