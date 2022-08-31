<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Models\Blog;
use App\Models\Categories;
use App\Models\Videos;
use App\Models\Service;
use App\Models\Product;
use App\Models\Manufacturers;
use App\Models\User;
use App\Models\Inquiry;
use App\Models\Cart;

use Illuminate\Support\Facades\Validator;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;
use App\Http\Requests;



class IndexController extends Controller
{
    public function index()
    {
        $newss=Blog::where('is_deleted','1')->orderBy('id')->get();
        return view('pages.home',compact('newss'));
    }

    // Customer Login (Main Login page)
    public function login()
    {
        if (Auth::check()) {
            return redirect('myaccount');
        }
        return view('pages.login');
    }

    public function postlogin(Request $request)
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
        //    return redirect('login')->withErrors('The email or the password is invalid. Please try again.');
       return redirect()->back()->withErrors('The email or the password is invalid. Please try again.');
    }

    protected function handleUserWasAuthenticated(Request $request)
    {
        if (method_exists($this, 'authenticated')) {
            return $this->authenticated($request, Auth::user());
        }
        $cookie_name = "advert";
        if (isset($_COOKIE[$cookie_name])) {
           $this->cart_update($_COOKIE[$cookie_name]);
        }
        /* $cookie_name = "advert";
        if (isset($_COOKIE[$cookie_name])) {
            // dd($_COOKIE[$cookie_name]);
            $this->cart_update($_COOKIE[$cookie_name]);
            return redirect()->intended('/');
        } */


        return redirect('myaccount');
    }

    // Customer Register (Main Register page)
    public function signup() {
        if (Auth::check()) {
            return redirect('myaccount');
        }
        return view('pages.register');
    }

    public function postregister(Request $request)
    {
        $data =  \Request::except(array('_token'));
	    $inputs = $request->all();
	    $rule=array(
		        'email' => 'required|email|max:75|unique:users',
		        'password' => 'required'
		   		);
	   	$validator = \Validator::make($data,$rule);
        if ($validator->fails()){
            return redirect()->back()->withErrors($validator->messages());
        }
        $fullname = $inputs['firstname'].' '.$inputs['lastname'];
        $user = new User;
		$user->user_type = 'Customer';
		$user->cust_type = 'Buyers';
		$user->name = $fullname;
		$user->firstname = $inputs['firstname'];
		$user->lastname = $inputs['lastname'];
		$user->email = $inputs['email'];
		$user->password= bcrypt($inputs['password']);
		$user->phone= $inputs['phone'];
	    $user->save();
        $id = $user->id;
        Auth::loginUsingId($id, TRUE);

        $data['name'] = $fullname;
        $data['email'] = $inputs['email'];
        $data['subject'] = "VDR Signup";
        $data['emails_to'] = ['info@vdrresale.com'];

        Mail::send(['html' => 'emails.signup_mail'],
                array(
                    'name' => $data['name'],
                    'email' => $data['email'],
                    'subject' => $data['subject'],
                ), function ($message) use ($data) {
                    //$message->from($data['emails_to']);
                    //$message->replyTo($data['emails_to']);
                    $message->to($data['email']);
                    $message->subject('VDR Signup');
        });

        $cookie_name = "advert";
        if (isset($_COOKIE[$cookie_name])) {
            // $result = $this->cart_update_signup($_COOKIE[$cookie_name], $id);
            $result = $this->cart_update($_COOKIE[$cookie_name]);
            if($result == "0"){
                return redirect()->intended('myaccount');
            }
            else{
                return redirect()->intended('checkout');
            }
        }


        \Session::flash('flash_message', 'Register successfully....');
        return \Redirect::back();
    }

    // Customer Login (When checkout from cart)
    public function customerLogin(Request $request)
    {
        //Error messages
       $messages = [
           "email.required" => "Email Id is required",
           "email.email" => "Email Id is not valid",
           "email.exists" => "Email Id doesn't exists",
           "password.required" => "Password is required",
           "password.min" => "Password must be at least 6 characters"
       ];

       $validator = Validator::make($request->all(), [
           'email'   => 'required|email||exists:users,email',
           'password' => 'required|min:6'
       ], $messages);

        if ($validator->fails()) {
            return back()->withErrors($validator)->withInput();
        } else {
            /* if (method_exists($this, 'authenticated')) {
                return $this->authenticated($request, Auth::user());
            } */
            if (Auth::guard('web')->attempt(['email' => $request->email, 'password' => $request->password], $request->get('remember'))) {
                $cookie_name = "advert";
                if (isset($_COOKIE[$cookie_name])) {
                    $result = $this->cart_update($_COOKIE[$cookie_name]);
                    if($result == "0"){
                        return redirect()->intended('myaccount');
                    }
                    else{
                        return redirect()->intended('checkout');
                    }
                }
                return redirect()->intended('/checkout');
            }
        }
        return redirect()->back()->withInput($request->only('email', 'remember'))->withErrors([
            'password' => 'Wrong password.',
            'approve' => 'this account not approved yet.',
        ]);
    }

    public function logout()
    {
        Auth::logout();
        return redirect('login');
    }

    public function cart_update($id)
    {
        $cart_data = Cart::select('id','product_id','quantity')->where('guest_user_id', $id)->get()->toArray();
        // $cart_data = Cart::where('guest_user_id', $id)->get()->toArray();

        if (count($cart_data) > 0) {

            foreach ($cart_data as $val) {

                $update['guest_user_id'] = Null;
                $update['user_id'] = auth()->user()->id;

                $find_product = Cart::where('user_id', auth()->user()->id)->where('product_id', $val['product_id'])->get()->first();
                // dd($find_product->id);
                if (!empty($find_product->id)) {
                    // dd($find_product->id);
                    $update['guest_user_id'] = Null;
                    $update['user_id'] = auth()->user()->id;
                    // $update['quantity'] = $val['quantity'];
                    $result = Cart::where('id', $val['id'])->update($update);
                    Cart::where('id', $find_product->id)->delete();
                }
                else{
                    // dd($update);
                    $result = Cart::where('id', $val['id'])->update($update);
                }
                // $result = DB::table('cart')->whereid($val)->update($update);


            }
        } else {
            $result = 0;
        }
        return $result;
    }

    public function blog()
    {
        $blogs=Blog::where('is_deleted','1')->orderBy('id')->get();
        $category_list = Categories::where('is_status','1')->where('category_assign', 'blog')->orderBy('category_name')->get();
        return view('pages.blog',compact('blogs','category_list'));
    }

    public function singleblog($slug)
    {
        $blog=Blog::where('is_deleted','1')->where('blog_slug',$slug)->orderBy('id')->first();
        $latest_blog=Blog::where('is_deleted','1')->orderBy('id')->get();
       if($blog){
            return view('pages.singleblog',compact('blog','latest_blog'));
        }else{
            abort('404');
        }
    }

    public function quote()
    {
        $latest_blog=Blog::where('is_deleted','1')->orderBy('id')->get();
        return view('pages.qoute',compact('latest_blog'));
    }

    public function about()
    {
        $latest_blog=Blog::where('is_deleted','1')->orderBy('id')->get();
        return view('pages.about',compact('latest_blog'));
    }

    public function contact(){ return view('pages.contact'); }
    public function testimonials(){ return view('pages.testimonials'); }
    public function faq(){ return view('pages.faq'); }

    public function video()
    {
        $video_list=Videos::where('is_deleted','1')->where('is_status','1')->get();
        return view('pages.video',compact('video_list'));
    }

    public function services()
    {
        $services=Service::where('is_status','1')->where('frontend_view','Yes')->where('is_deleted','1')->get();
        return view('pages.services',compact('services'));
    }

    public function singleservice($slug)
    {
        $services=Service::where('is_status','1')->where('is_deleted','1')->where('service_slug',$slug)->first();
        $latest_blog=Blog::where('is_deleted','1')->orderBy('id')->get();
        $similer_service = Service::where('service_slug', '!=', $slug)->where('is_status','1')->where('is_deleted','1')->orderBy('id')->get();
        if($services){
            return view('pages.singleservice',compact('services','latest_blog','similer_service'));
        }else{
            abort('404');
        }
    }

    public function categoryByproduct($slug)
    {
        $cat_id = getCategoriesId($slug)->id;
        $products = Product::where('category_id' , $cat_id)->where('is_status','1')->where('is_deleted','1')->get();
        $category_list = Categories::where('is_status','1')->where('is_deleted','1')->where('category_assign', 'product')->orderBy('category_name')->get();
        $manufacturer_list = Manufacturers::where('is_status','1')->where('is_deleted','1')->where('manufacturers_assign', 'product')->orderBy('manufacturers_name')->get();
        return view('pages.shop',compact('products','category_list','manufacturer_list','slug'));
    }

    public function manufacturerByproduct($slug)
    {
        $manctr_id = getManufacturersId($slug)->id;
        $products = Product::where('manufacturer_id' , $manctr_id)->where('is_status','1')->where('is_deleted','1')->get();
        $category_list = Categories::where('is_status','1')->where('is_deleted','1')->where('category_assign', 'product')->orderBy('category_name')->get();
        $manufacturer_list = Manufacturers::where('is_status','1')->where('is_deleted','1')->where('manufacturers_assign', 'product')->orderBy('manufacturers_name')->get();
        return view('pages.shop',compact('products','category_list','manufacturer_list','slug'));
    }

    public function shop()
    {
        $products=Product::where('is_status','1')->where('is_deleted','1')->get();
        $category_list = Categories::where('is_status','1')->where('is_deleted','1')->where('category_assign', 'product')->orderBy('category_name')->get();
        $manufacturer_list = Manufacturers::where('is_status','1')->where('is_deleted','1')->where('manufacturers_assign', 'product')->orderBy('manufacturers_name')->get();
        return view('pages.shop',compact('products','category_list','manufacturer_list'));
    }

    public function singleproduct($slug)
    {
        $product=Product::where('is_status','1')->where('is_deleted','1')->where('product_slug',$slug)->first();
        $category_list = Categories::where('is_status','1')->where('is_deleted','1')->where('category_assign', 'product')->orderBy('category_name')->get();
        $manufacturer_list = Manufacturers::where('is_status','1')->where('is_deleted','1')->where('manufacturers_assign', 'product')->orderBy('manufacturers_name')->get();
        return view('pages.singleproduct',compact('product','category_list','manufacturer_list'));
    }

    public function filterbymanufacturer()
    {
        $productmanufaturer=$_REQUEST['productmanufaturer'];
        foreach ($productmanufaturer as $field) {
            $conditions[] = ['manufacturer_id', 'like', '%' . $field . '%','or'];
        }
        $product = Product::where($conditions)->where('is_status','1')->where('is_deleted','1')->get();
        return json_encode($product);
    }

    public function filterbycategory()
    {
        $productcategory=$_REQUEST['productcategory'];
        foreach ($productcategory as $field) {
            $conditions[] = ['category_id', 'like', '%' . $field . '%','or' ];
        }
        $product = Product::where($conditions)->where('is_status','1')->where('is_deleted','1')->get();
        return json_encode($product);
    }

    public function subscribeMail(Request $request)
    {
        $validation_array = ['email' => 'required|email|max:255'];
        $request->validate($validation_array);
        $data['email'] = $request->input('email');

        $data['emails_to'] = ['info@vdrresale.com', 'mario@vdrresale.com', 'Kaan@vdrresale.com', 'Matthew@vdrresale.com', 'Alex@vdrresale.com'];

        // Admin Send main
        Mail::send(['html' => 'emails.subscribe_mail'],
            array(
                'email' => $data['email'],
            ), function ($message) use ($data) {
                //$message->from($data['email']);
                //$message->replyTo($data['email']);
                $message->to($data['emails_to']);
                $message->subject('Subscription Added!!!');
        });
      
        // customer send mail
        Mail::send(['html' => 'emails.subscribe_thankyou'],
            array(
                'email' => $data['email'],
            ),
            function ($message) use ($data) {
                $message->from('info@vdrresale.com' , 'VDR-Resale');
                $message->to($data['email']);
                $message->subject('Thank you for subscribe us....!!!!');
        });

        return redirect()->intended('/thank-you');
        //return redirect()->back()->with('message', 'Successfully!');
    }

    public function sendMail(Request $request)
    {
        $validation_array = [
            'name' => 'required|string|max:255',
            'phone' => 'required|numeric|',
            'email' => 'required|email|max:255',
            'content_msg' => 'required',
            'g-recaptcha-response' => 'required|recaptcha',
        ];
        $request->validate($validation_array);
        $data['name'] = $request->input('name');
        $data['email'] = $request->input('email');
        $data['phone'] = $request->input('phone');
        $data['subject'] = $request->input('subject');
        $data['content_msg'] = $request->input('content_msg');

        $inquiry = new Inquiry;
        $inquiry->name = $data['name'];
        $inquiry->email = $data['email'];
        $inquiry->phone = $data['phone'];
        $inquiry->message = $data['content_msg'];
        $inquiry->save();

        $data['emails_to'] = ['info@vdrresale.com', 'mario@vdrresale.com', 'Kaan@vdrresale.com', 'Matthew@vdrresale.com', 'Alex@vdrresale.com'];

        // Admin Send main
        Mail::send(['html' => 'emails.contact_mail'],
                array(
                    'name' => $data['name'],
                    'email' => $data['email'],
                    'phone' => $data['phone'],
                    'subject' => $data['subject'],
                    'content_msg' => $data['content_msg'],
                ), function ($message) use ($data) {
                    //$message->from($data['email'], $data['name']);
                    //$message->replyTo($data['email'], $data['name']);
                    $message->to($data['emails_to']);
                    $message->subject('Contact US');
        });

        // customer send mail
        Mail::send(['html' => 'emails.contact_thankyou'],
            array(
                'name' => $data['name'],
                'email' => $data['email'],
            ),
            function ($message) use ($data) {
                $message->from('info@vdrresale.com' , 'VDR-Resale');
                $message->to($data['email']);
                $message->subject('Thank you for Contact US');
        });

        return redirect()->intended('/thank-you');
        //return redirect()->back()->with('message', 'Successfully!');
    }

    public function sendQuote(Request $request)
    {
         $validation_array = [
            'name' => 'required|string|max:255',
            'phone' => 'required|numeric|',
            'email' => 'required|email|max:255',
            'g-recaptcha-response' => 'required|recaptcha',
        ];
         $request->validate($validation_array);
        $data['name'] = $request->input('name');
        $data['email'] = $request->input('email');
        $data['phone'] = $request->input('phone');
        $data['message1']=$request->input('message1');
        $data['message2']=$request->input('message2');
        $data['choose']=$request->input('choose');
        $data['choose2']=$request->input('choose2');
        $data['city']=$request->input('city');
        $data['country']=$request['country'];

        $data['emails_to'] = ['info@vdrresale.com', 'mario@vdrresale.com', 'Kaan@vdrresale.com', 'Matthew@vdrresale.com', 'Alex@vdrresale.com'];

        // Admin Send main
        Mail::send(['html' => 'emails.quote_mail'],
                array(
                    'name' => $data['name'],
                    'email' => $data['email'],
                    'phone' => $data['phone'],
                    'message1' =>$data['message1'],
                    'message2' =>$data['message2'],
                    'choose' =>$data['choose'],
                    'choose2'=>$data['choose2'],
                    'city'=>$data['city'],
                    'country'=>$data['country']

                ), function ($message) use ($data) {
                    //$message->from($data['email'], $data['name']);
                    //$message->replyTo($data['email'], $data['name']);
                    $message->to($data['emails_to']);
                    $message->subject('Get a Quick Quote');
        });

        // customer send mail
        Mail::send(['html' => 'emails.quote_thankyou'],
            array(
                'name' => $data['name'],
                'email' => $data['email'],
            ),
            function ($message) use ($data) {
                $message->from('info@vdrresale.com' , 'VDR-Resale');
                $message->to($data['email']);
                $message->subject('Thank you for Get a Quick Quote from VDR Resale');
        });

        return redirect()->intended('/thank-you');
        //return redirect()->back()->with('message', 'Successfully!');
    }

    public function serviceMail(Request $request)
    {
        $validation_array = [
            'name' => 'required|string|max:255',
            'phone' => 'required|numeric|',
            'email' => 'required|email|max:255',
            'content_msg' => 'required',
            'g-recaptcha-response' => 'required|recaptcha',
        ];
        $request->validate($validation_array);
        $data['name'] = $request->input('name');
        $data['email'] = $request->input('email');
        $data['phone'] = $request->input('phone');
        $data['service_name'] = $request->input('service_name');
        $data['content_msg'] = $request->input('content_msg');

        $inquiry = new Inquiry;
        $inquiry->name = $data['name'];
        $inquiry->email = $data['email'];
        $inquiry->phone = $data['phone'];
        $inquiry->message = $data['content_msg'];
        $inquiry->save();

        $data['emails_to'] = ['info@vdrresale.com', 'mario@vdrresale.com', 'Kaan@vdrresale.com', 'Matthew@vdrresale.com', 'Alex@vdrresale.com'];

        // Admin Send main
        Mail::send(['html' => 'emails.service_mail'],
                array(
                    'name' => $data['name'],
                    'email' => $data['email'],
                    'phone' => $data['phone'],
                    'service_name' => $data['service_name'],
                    'content_msg' => $data['content_msg'],
                ), function ($message) use ($data) {
                    //$message->from($data['email'], $data['name']);
                    //$message->replyTo($data['email'], $data['name']);
                    $message->to($data['emails_to']);
                    $message->subject('Service Inquiry - ', $data['service_name']);
        });

        // customer send mail
        Mail::send(['html' => 'emails.service_thankyou'],
            array(
                'name' => $data['name'],
                'email' => $data['email'],
                'service_name' => $data['service_name'],
            ),
            function ($message) use ($data) {
                $message->from('info@vdrresale.com' , 'VDR-Resale');
                $message->to($data['email']);
                $message->subject('Thank you for ', $data['service_name']  ,' Service from VDR Resale');
        });

        return redirect()->intended('/thank-you');
        //return redirect()->back()->with('message', 'Successfully!');
    }

    public function shopMail(Request $request)
    {
        $validation_array = [
            'name' => 'required|string|max:255',
            'phone' => 'required|numeric|',
            'email' => 'required|email|max:255',
            'content_msg' => 'required',
            'g-recaptcha-response' => 'required|recaptcha',
        ];
        $request->validate($validation_array);
        $data['name'] = $request->input('name');
        $data['email'] = $request->input('email');
        $data['phone'] = $request->input('phone');
        $data['company'] = $request->input('company');
        $data['product_name'] = $request->input('product_name');
        $data['content_msg'] = $request->input('content_msg');

        $inquiry = new Inquiry;
        $inquiry->name = $data['name'];
        $inquiry->email = $data['email'];
        $inquiry->phone = $data['phone'];
        $inquiry->message = $data['content_msg'];
        $inquiry->save();

        $data['emails_to'] = ['info@vdrresale.com', 'mario@vdrresale.com', 'Kaan@vdrresale.com', 'Matthew@vdrresale.com', 'Alex@vdrresale.com'];

      	$inquiry = new Inquiry;
        $inquiry->name = $data['name'];
        $inquiry->email = $data['email'];
        $inquiry->phone = $data['phone'];
        $inquiry->message = $data['content_msg'];
        $inquiry->save();

        // Admin Send main
        Mail::send(['html' => 'emails.shop_mail'],
                array(
                    'name' => $data['name'],
                    'email' => $data['email'],
                    'phone' => $data['phone'],
                    'company' => $data['company'],
                    'product_name' => $data['product_name'],
                    'content_msg' => $data['content_msg'],
                ), function ($message) use ($data) {
                    //$message->from($data['email'], $data['name']);
                    //$message->replyTo($data['email'], $data['name']);
                    $message->to($data['emails_to']);
                    $message->subject('Product Order Inquiry - ', $data['product_name']);
        });

        // customer send mail
        Mail::send(['html' => 'emails.shop_thankyou'],
            array(
                'name' => $data['name'],
                'email' => $data['email'],
                'product_name' => $data['product_name'],
            ),
            function ($message) use ($data) {
                $message->from('info@vdrresale.com' , 'VDR-Resale');
                $message->to($data['email']);
                $message->subject('Thank you for ', $data['product_name']  ,' Product Order from VDR Resale');
        });

        return redirect()->intended('/thank-you');
        //return redirect()->back()->with('message', 'Successfully!');
    }

    public function thank_you() { return view('pages.thank_you'); }

    public function sitemap() { return view('pages.sitemap'); }


    // Email Signature
    public function alex_floredes() { return view('email_signature.alex_floredes'); }
    public function julie_mahoney() { return view('email_signature.julie_mahoney'); }
    public function kaan_best() { return view('email_signature.kaan_best'); }
    public function mario_efstratiou() { return view('email_signature.mario_efstratiou'); }
    public function matthew_efstratiou() { return view('email_signature.matthew_efstratiou'); }
    public function terence_tahsin() { return view('email_signature.terence_tahsin'); }

    //new page 
    public function cisco()
    {
        return view('pages.cisco');
    }
    
       public function sell_cisco_servers()
    {
        return view('pages.sell_cisco_servers');
    }

    public function sell_cisco_access_point()
    {
        return view('pages.sell_cisco_access_point');
    }


}
