<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/public/index.php/about', function(){  return Redirect::to('/about', 301); });
Route::get('/public/index.php/blog', function(){  return Redirect::to('/blog', 301); });
Route::get('/public/index.php/services', function(){  return Redirect::to('/services', 301); });
Route::get('/public/index.php/shop', function(){  return Redirect::to('/shop', 301); });
Route::get('/public/index.php/quote', function(){  return Redirect::to('/quote', 301); });
Route::get('/public/index.php/faq', function(){  return Redirect::to('/faq', 301); });
Route::get('/public/index.php/contact', function(){  return Redirect::to('/contact', 301); });
Route::get('/public/index.php/testimonials', function(){  return Redirect::to('/testimonials', 301); });
Route::get('/public/index.php/cart', function(){  return Redirect::to('/cart', 301); });
Route::get('/public/index.php/video', function(){  return Redirect::to('/video', 301); });
Route::get('/public/index.php/shop/manufacturer/avaya', function(){  return Redirect::to('/shop/manufacturer/avaya', 301); });
Route::get('/public/index.php/shop/category/headsets', function(){  return Redirect::to('/shop/category/headsets', 301); });
Route::get('/public/index.php/service/sell-it-equipment', function(){  return Redirect::to('/service/sell-it-equipment', 301); });
Route::get('/public/index.php/service/sell-mitel-equipment', function(){  return Redirect::to('/service/sell-mitel-equipment', 301); });
Route::get('/public/index.php/shop/manufacturer/e-metrotel', function(){  return Redirect::to('/shop/manufacturer/e-metrotel', 301); });
Route::get('/public/index.php/service/sell-used-phone-system', function(){  return Redirect::to('/service/sell-used-phone-system', 301); });
Route::get('/public/index.php/service/sell-your-mitel-phones-system', function(){  return Redirect::to('/service/sell-your-mitel-phones-system', 301); });
Route::get('/public/index.php/blog/what-is-technology-lifecycle-management', function(){  return Redirect::to('/blog/what-is-technology-lifecycle-management', 301); });
Route::get('/public/index.php/blog/learn-about-our-commitment-to-100-reuse', function(){  return Redirect::to('/blog/learn-about-our-commitment-to-100-reuse', 301); });
Route::get('/public/index.php/shop/cisco-ws-c2960x-48lps-l-new-628f5b35997d1', function(){  return Redirect::to('/shop/cisco-ws-c2960x-48lps-l-new-628f5b35997d1', 301); });
Route::get('/public/index.php/blog/explore-the-dark-side-of-e-waste-in-the-digital-age', function(){  return Redirect::to('/blog/explore-the-dark-side-of-e-waste-in-the-digital-age', 301); });

 /*Route::get('/', function () {
     return view('welcome');
 });*/

use App\Http\Controllers\IndexController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\CheckoutController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\UserController;

Route::get('/', [IndexController::class, 'index']);
Route::get('/blog',[IndexController::class,'blog']);
Route::get('/blog/{id}', [IndexController::class, 'singleblog']);
Route::get('/video/', [IndexController::class, 'video']);
Route::get('/about', [IndexController::class, 'about']);
Route::get('/services', [IndexController::class, 'services']);
Route::get('/service/{slug}', [IndexController::class, 'singleservice']);
Route::get('/quote', [IndexController::class, 'quote']);
Route::get('/contact', [IndexController::class, 'contact']);
Route::get('/shop', [IndexController::class, 'shop']);
Route::get('/shop/category/{slug}', [IndexController::class, 'categoryByproduct']);
Route::get('/shop/manufacturer/{slug}', [IndexController::class, 'manufacturerByproduct']);
Route::get('/shop/{id}', [IndexController::class, 'singleproduct']);
Route::post('/filterbycat',[IndexController::class,'filterbycategory']);
Route::post('/filterbyman',[IndexController::class,'filterbymanufacturer']);
Route::get('/testimonials', [IndexController::class, 'testimonials']);
Route::get('/faq', [IndexController::class, 'faq']);
Route::get('/thank-you', [IndexController::class, 'thank_you']);

Route::get('/sitemap', [IndexController::class, 'sitemap']);

//Add to cart
Route::get('/cart', [CartController::class, 'view_cart']);
Route::post('add-to-cart', [CartController::class, 'add_to_cart']);
Route::post('cart_item_remove/{id}', [CartController::class, 'cart_item_remove']);
Route::post('cutomer/login', [IndexController::class, 'customerLogin']);

//checkout
Route::get('checkout', [CheckoutController::class, 'checkout']);
Route::post('/checkout', [CheckoutController::class, 'store'])->name('checkout.store');
// Ajax
Route::post('ajax/checkout/shippingcharges', [CheckoutController::class, 'ajaxshippingcharges'])->name('ajax.checkout.shippingcharges');

// login-logout
Route::get('/login', [IndexController::class, 'login']);
Route::post('/login', [IndexController::class, 'postlogin']);
Route::get('logout', [IndexController::class, 'logout']);

// signup
Route::get('/signup', [IndexController::class, 'signup']);
Route::post('/signup', [IndexController::class, 'postregister']);

// My Account
Route::get('/myaccount', [UserController::class, 'my_account']);
Route::get('myaccount/profile', [UserController::class, 'profile']);
Route::post('myaccount/profile', [UserController::class, 'updateprofile']);
Route::get('myaccount/reset-password', [UserController::class, 'reset_password']);
Route::post('myaccount/reset-password', [UserController::class, 'postResetpassword']);

Route::get('/signup', [IndexController::class, 'signup']);

Route::get('orders', [OrderController::class, 'order_list']);
Route::get('orders/view-order/{id}', [OrderController::class, 'vieworder']);

// Send-Mail
Route::post('/sendMail', [IndexController::class, 'sendMail'])->name('sendMail');
Route::post('/sendQuote', [IndexController::class, 'sendQuote'])->name('sendQuote');
Route::post('/serviceMail', [IndexController::class, 'serviceMail'])->name('serviceMail');
Route::post('/shopMail', [IndexController::class, 'shopMail'])->name('shopMail');
Route::post('/subscribeMail', [IndexController::class, 'subscribeMail'])->name('subscribeMail');

// Email Signature
Route::get('emailsign/alex-floredes', [IndexController::class, 'alex_floredes']);
Route::get('emailsign/julie-mahoney', [IndexController::class, 'julie_mahoney']);
Route::get('emailsign/kaan-best', [IndexController::class, 'kaan_best']);
Route::get('emailsign/mario-efstratiou', [IndexController::class, 'mario_efstratiou']);
Route::get('emailsign/matthew-efstratiou', [IndexController::class, 'matthew_efstratiou']);
Route::get('emailsign/terence-tahsin', [IndexController::class, 'terence_tahsin']);

//new pages
Route::get('/sell-used-cisco-equipment', [IndexController::class, 'cisco']);
Route::get('/sell-cisco-servers', [IndexController::class, 'sell_cisco_servers']);
Route::get('/sell-cisco-access-point', [IndexController::class, 'sell_cisco_access_point']);

Route::group(['namespace' => 'App\Http\Controllers\Admin', 'prefix' => 'admin'], function () {

    Route::get('/', [ 'as' => 'login', 'uses' => 'IndexController@index']);
	Route::post('login', 'IndexController@postLogin');
	Route::get('logout', 'IndexController@logout');

    Route::get('dashboard', 'DashboardController@index');
	Route::get('profile', 'AdminController@profile');
	Route::post('profile', 'AdminController@updateProfile');
	Route::post('profile_pass', 'AdminController@updatePassword');
    Route::get('settings', 'SettingController@index');

    Route::get('categories', 'CategoriesController@categorylist');
	Route::get('categories/addcategories', 'CategoriesController@addeditcategory');
	Route::post('categories/addcategories', 'CategoriesController@addnew');
	Route::get('categories/addcategories/{id}', 'CategoriesController@editcategory');
	Route::get('categories/delete/{id}', 'CategoriesController@delete');
	Route::get('categories/status/{id}', 'CategoriesController@status');

	Route::get('manufacturers', 'ManufacturersController@manufacturerlist');
	Route::get('manufacturers/addmanufacturers', 'ManufacturersController@addeditmanufacturer');
	Route::post('manufacturers/addmanufacturers', 'ManufacturersController@addnew');
	Route::get('manufacturers/addmanufacturers/{id}', 'ManufacturersController@editmanufacturer');
	Route::get('manufacturers/delete/{id}', 'ManufacturersController@delete');
	Route::get('manufacturers/status/{id}', 'ManufacturersController@status');

    Route::get('services', 'ServiceController@servicelist');
    Route::get('service/addservice', 'ServiceController@addeditservice');
    Route::post('service/addservice', 'ServiceController@addnew');
    Route::get('service/addservice/{id}', 'ServiceController@editservice');
    Route::get('service/delete/{id}', 'ServiceController@delete');
    Route::get('service/status/{id}', 'ServiceController@status');
    Route::get('service/trash', 'ServiceController@servicelisttrash');
    Route::get('service/trash/restore/{id}', 'ServiceController@restore_trash');
    Route::get('service/trash/delete/{id}', 'ServiceController@permanent_trash');

    Route::get('servicetab','ServiceController@tab');
    Route::get('service/addservicetab/{id}', 'ServiceController@editservicetab');
    Route::post('service/addservicetab', 'ServiceController@addnewtab');
    Route::get('service/addservicetab/{id}', 'ServiceController@editservicetab');
    Route::get('service/tabdelete/{id}', 'ServiceController@deletetab');

    Route::get('shop','ShopController@productlist');
    Route::get('product/addproduct', 'ShopController@addeditproduct');
    Route::post('product/addproduct', 'ShopController@addnew');
    Route::get('product/addproduct/{id}', 'ShopController@editproduct');
    Route::get('product/delete/{id}', 'ShopController@delete');
    Route::get('product/status/{id}', 'ShopController@status');
    Route::get('product/trash', 'ShopController@productlisttrash');
    Route::get('product/trash/restore/{id}', 'ShopController@restore_trash');
    Route::get('product/trash/delete/{id}', 'ShopController@permanent_trash');

    Route::get('blog', 'BlogController@bloglist');
	Route::get('blog/addblog', 'BlogController@addeditblog');
	Route::post('blog/addblog', 'BlogController@addnew');
	Route::get('blog/addblog/{id}', 'BlogController@editblog');
	Route::get('blog/delete/{id}', 'BlogController@delete');
	Route::get('blog/status/{id}', 'BlogController@status');
    Route::get('blog/trash', 'BlogController@bloglisttrash');
    Route::get('blog/trash/restore/{id}', 'BlogController@restore_trash');
    Route::get('blog/trash/delete/{id}', 'BlogController@permanent_trash');

    Route::get('videos', 'VideosController@videoslist');
	Route::get('videos/addvideos', 'VideosController@addeditvideos');
	Route::post('videos/addvideos', 'VideosController@addnew');
	Route::get('videos/addvideos/{id}', 'VideosController@editvideos');
	Route::get('videos/delete/{id}', 'VideosController@delete');
	Route::get('videos/status/{id}', 'VideosController@status');
    Route::get('videos/trash', 'VideosController@videoslisttrash');
     Route::get('videos/trash/restore/{id}', 'VideosController@restore_trash');
    Route::get('videos/trash/delete/{id}', 'VideosController@permanent_trash');

    // Orders
    Route::get('orders', 'OrderController@orderlist')->name('admin.orders');
    Route::get('orders/view-order/{id}', 'OrderController@vieworder');
    Route::post('orders/view-order', 'OrderController@change_order_status');

  	// Customer
    Route::get('customers', 'CustomerController@customerslist')->name('admin.customers');
    Route::get('customers/view-customer/{id}', 'CustomerController@customer_detail');
    Route::get('customers/addcustomer', 'CustomerController@addeditUser');
	Route::post('customers/addcustomer', 'CustomerController@addnew');
	Route::get('customers/addcustomer/{id}', 'CustomerController@editUser');
    Route::get('ajax/customers/{id}', 'CustomerController@GetUserInfo');
    // Customer Note Generator
    Route::post('customers/addcustomernote', 'CustomerController@addcustomernote');
    Route::get('customers/notes/delete/{id}', 'CustomerController@delete_notes');
    // Customer Conversation Generator
    Route::post('customers/addconversation', 'CustomerController@addconversation');
    Route::get('customers/conversation/delete/{id}', 'CustomerController@delete_conversation');


    // Countries
    Route::get('countries', 'CountriesController@countrylist');
	Route::get('countries/addcountries', 'CountriesController@addcountry');
    Route::post('countries/addcountries', 'CountriesController@addnew');
    Route::get('countries/addcountries/{id}', 'CountriesController@editcountry');
    Route::get('countries/delete/{id}', 'CountriesController@delete');

    // States
    Route::get('states', 'StatesController@statelist');
	Route::get('states/addstates', 'StatesController@addstate');
    Route::post('states/addstates', 'StatesController@addnew');
    Route::get('states/addstates/{id}', 'StatesController@editstate');
    Route::get('states/delete/{id}', 'StatesController@delete');

    // Shipping Charges
    Route::get('shipping-charges', 'ShippingChargesController@shippingchargelist');
	Route::get('shipping-charges/add-shipping-charges', 'ShippingChargesController@addshippingcharge');
    Route::post('shipping-charges/add-shipping-charges', 'ShippingChargesController@addnew');
    Route::get('shipping-charges/add-shipping-charges/{id}', 'ShippingChargesController@editshippingcharge');
    Route::get('shipping-charges/delete/{id}', 'ShippingChargesController@delete');

  	// General Inquires
    Route::get('inquiries', 'InquiriesController@inquirieslist');
    Route::get('inquiries/delete/{id}', 'InquiriesController@delete');
    //Route::get('inquiries/assigntocustomer/{id}', 'InquiriesController@assigntocustomer');
  	Route::post('inquiries/assigntocustomer', 'InquiriesController@assigntocustomer');
    Route::get('ajax/inquiries/{id}', 'InquiriesController@GetinquiryInfo');

    //Custom Send Mail
    Route::get('custom/send/email', 'CustomSendMailController@custom_send_email')->name('admin.custom.send.email');
    Route::get('custom/send/email/create', 'CustomSendMailController@custom_send_email_create')->name('admin.custom.send.email.create');
    Route::post('custom/send/send_email', 'CustomSendMailController@custom_send_mail')->name('admin.custom.send_mail');
    Route::get('ajax/custom_send_email/{id}', 'CustomSendMailController@GetCustomEmailInfo');

  	// leads
    Route::get('lead-applications', 'LeadController@index');
    Route::get('addlead-applications', 'LeadController@create');
    Route::post('addlead-applications', 'LeadController@addlead');
    Route::get('editlead-applications/{id}', 'LeadController@edit');
    Route::post('editlead-applications/{id}', 'LeadController@updatelead');
    Route::get('deletelead-applications/{id}', 'LeadController@delete');
    Route::get('ajax/lead-applications/{id}', 'LeadController@GetLeadAppInfo');
    Route::post('update-response', 'LeadController@update_response');

    Route::get('lead-applications/trash','LeadController@recycle_bin_lead');
    Route::get('restore-lead/{id}','LeadController@restore_lead');
    Route::get('hard-delete-lead/{id}','LeadController@hard_delete_lead');
    
    Route::post('/lead-notes', 'LeadController@lead_notes');
});

