<div id="left-sidebar" class="sidebar" style="background-color: #f39e00;">
    <a href="#" class="menu_toggle"><i class="fa fa-angle-left"></i></a>
    <div class="navbar-brand">
        <a href="javascript:void(0);"><img src="{{ asset('public/admin_assets/images/logo.png') }}" alt="Mercers" class="img-fluid logo" style="width: 100%;"></a>
        <button type="button" class="btn-toggle-offcanvas btn btn-sm float-right"><i class="lnr lnr-menu fa fa-chevron-circle-left"></i></button>
    </div>
    <div class="sidebar-scroll">
        <div class="user-account">
            <div class="user_div">
                @if(Auth::user()->image_icon != "default.png")
                <img src="{{ url(Auth::user()->image_icon) }}" class="user-photo" alt="User Profile">
                @else
                <img src="{{ asset('public/admin_assets/images/user.png') }}" class="user-photo" alt="User Profile">
                @endif
            </div>
            <div class="dropdown">
                <span>Welcome,</span>
                <a href="{{ URL::to('admin/profile') }}" class="dropdown-toggle user-name" data-toggle="dropdown">
                    <strong>{{ ucwords(Auth::user()->name) }}</strong>
                </a>
                <ul class="dropdown-menu dropdown-menu-right account vivify flipInY">
                    <li><a href="{{ URL::to('admin/profile') }}"><i class="fa fa-user"></i>My Profile</a></li>
                    <li class="divider"></li>
                    <li><a href="{{ URL::to('admin/logout') }}"><i class="fa fa-power-off"></i>Logout</a></li>
                </ul>
            </div>
        </div>
        <nav id="left-sidebar-nav" class="sidebar-nav">
            <ul id="main-menu" class="metismenu animation-li-delay">

                <li class="{{classActivePath('dashboard')}}"><a href="{{ URL::to('admin/dashboard') }}"><i class="fa fa-dashboard"></i> <span>Dashboard</span></a></li>
                <li class="{{classActivePath('categories')}}"><a href="{{ URL::to('admin/categories') }}"><i class="fa fa-list-alt"></i> <span>Categories</span></a></li>
                 <li class="{{classActivePath('manufacturers')}}"><a href="{{ URL::to('admin/manufacturers') }}"><i class="fa fa-industry"></i> <span>Manufacturers</span></a></li>
                <li class="{{classActivePath('services')}}"><a href="{{ URL::to('admin/services') }}"><i class="fa fa-wrench"></i> <span>Services</span></a></li>
                <li class="{{classActivePath('blog')}}"><a href="{{ URL::to('admin/blog') }}"><i class="fa fa-globe"></i> <span>News</span></a></li>
                <li class="{{classActivePath('videos')}}"><a href="{{ URL::to('admin/videos') }}"><i class="fa fa-video-camera"></i> <span>Videos</span></a></li>
                <li class="{{classActivePath('shop')}}"><a href="{{ URL::to('admin/shop') }}"><i class="fa fa-shopping-bag"></i> <span>Products</span></a></li>
                <li class="{{classActivePath('orders')}}"><a href="{{ URL::to('admin/orders') }}"><i class="fa fa-shopping-cart"></i> <span>Orders</span></a></li>
               <li class="{{classActivePath('lead-applications')}}"><a href="{{ URL::to('admin/lead-applications') }}"><i class="fa fa-lightbulb-o" style="font-size: 18px"></i> <span>Leads</span></a></li>
              	<li>
                    <a href="#forms" class="has-arrow"><i class="fa fa-users"></i> <span>Customers</span></a>
                    <ul>
                        <li><a href="{{ URL::to('admin/customers') }}"><span>Customers</span></a></li>
                        <li><a href="{{ URL::to('admin/inquiries') }}"><span>General Inquires</span></a></li>
                    </ul>
                </li>
              	<li>
                    <a href="#Tables" class="has-arrow"><i class="fa fa-envelope"></i> <span>{{ __('Marketing Email') }}</span></a>
                    <ul>
                        <li><a href="{{ URL::to('admin/custom/send/email') }}"><span>{{ __('Custom Send Email') }}</span></a></li>
                    </ul>
                </li>
                <li>
                    <a href="#Tables" class="has-arrow"><i class="fa fa-money"></i><span>Shipping Management</span></a>
                    <ul>
                        <li class="{{classActivePath('shipping-charges')}}"><a href="{{ URL::to('admin/countries') }}">Countries</a></li>
                        <li><a href="{{ URL::to('admin/states') }}">States</a></li>
                        <li><a href="{{ URL::to('admin/shipping-charges') }}">Shipping Charges</a></li>
                    </ul>
                </li>
                <li>
                    <a href="#uiElements" class="has-arrow"><i class="fa fa-trash"></i> <span>Terminated</span></a>
                    <ul>
                        <li><a href="{{ URL::to('admin/blog/trash') }}"><span>Blogs</span></a></li>
                        <li><a href="{{ URL::to('admin/videos/trash') }}"><span>Videos</span></a></li>
                        <li><a href="{{ URL::to('admin/service/trash') }}"><span>Services</span></a></li>
                        <li><a href="{{ URL::to('admin/product/trash') }}"><span>Products</span></a></li>
                        <li><a href="{{ URL::to('admin/lead-applications/trash') }}"><span>Lead</span></a></li>
                    </ul>
                </li>
                <li class="{{classActivePath('settings')}}"><a href="{{ URL::to('admin/profile') }}"><i class="fa fa-cog"></i> <span>Settings</span></a></li>
            </ul>
        </nav>
    </div>
</div>
