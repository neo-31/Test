

    <div class="loading-overlay">

    </div>

    <!-- Boxed -->
    <div class="boxed">
        <div class="site-header  header-v3">
            <div class="flat-top mobi_d_none">
                <div class="container">
                    <div class="row">
                        <div class="flat-wrapper">
                            <div class="custom-info" style="color: white">
                            	<span>Have any questions?</span>
                            	<a id="header_email" href="mailto:info@vdrresale.com" style="color: white">
                            		<span><i class="fa fa-reply"></i>info@vdrresale.com </span>
                            	</a>
                            	<a id="header_location" style="color: white" target="_blank" href="https://www.google.co.in/maps/place/Stansted+Distribution+Centre,+Start+Hill,+Great+Hallingbury,+Bishop's+Stortford+CM22+7DG,+UK/@51.8700516,0.2103106,17z/data=!3m1!4b1!4m5!3m4!1s0x47d88fea5c857f61:0x55c47eb58be50f82!8m2!3d51.8700483!4d0.2124993">
                                    <span><i class="fa fa-map-marker"></i>Stansted Distribution Center, CM22 7DG, UK</span>
                                </a>
                            	<a id="header_phone" href="tel:0208 440 9908" style="color: white">
                            		<span><i class="fa fa-phone"></i>0208 440 9908</span>
                            	</a>
                            </div>

                            <div class="social-links">

                                <a id="header_fb" href="https://www.facebook.com/VDResale/">
                                    <i class="fa fa-facebook-official"></i>
                                </a>

                                <a id="header_linkedin" href="https://www.linkedin.com/uas/login?session_redirect=https%3A%2F%2Fwww.linkedin.com%2Fcompany%2Fvoice-data-resale%2Fabout">
                                    <i class="fa fa-linkedin"></i>
                                </a>
                            </div>
                        </div><!-- /.flat-wrapper -->
                    </div><!-- /.row -->
                </div><!-- /.container -->
            </div><!-- /.flat-top -->

            <header id="header" class="header">
                <div class="header-wrap">
                    <div id="logo" class="logo" style="display: -webkit-inline-box;">
                        <a href="{{url('/')}}">
                            <img   src="{{asset('public/assets/images/vdr-logo.png')}}" alt="images" class="logoimg">
                        </a>
                        <a href="{{ URL::to('quote') }}" class="button black ms mobi_d_block">Request Quote</a>


                    </div><!-- /.logo -->

                    <div class="btn-menu">
                        <span></span>
                    </div><!-- //mobile menu button -->

                    <div class="nav-wrap">
                        <nav id="mainnav" class="mainnav">
                            <!--<div class="menu-extra">
                                <ul>

                                </ul>

                            </div>--><!-- /.menu-extra -->
                            <ul class="menu" style="margin-right: 3%;">
                                <li class=" {{ (request()->is('/')) ? 'home' : '' }}">
                                    <a href="{{ URL::to('') }}">Home</a>
                                </li>
                                <li class="has-mega-menu {{ (request()->is('services')) ? 'home' : '' }}">
                                    <a class="has-mega" href="javascript:void();">Service</a>
                                    <div class="submenu mega-menu">
                                        <div class="row">
                                            <div class="container">
                                                <div class="col-md-4">
                                                    <div class="mega-title">
                                                         <h5 class="btn-mega">SELL TO US</h5>
                                                        </div>
                                                    <ul class="mega-menu-sub">
                                                      	<li><a href="{{ URL::to('services') }}">Explore all Services</a></li>
                                                        <li><a href="{{ URL::to('service/sell-it-equipment') }}">Sell Excess IT Equipment</a></li>
                                                        <li><a href="{{ URL::to('service/sell-used-phone-system') }}">Sell Phone Systems</a></li>
                                                        <li><a href="{{ URL::to('service/sell-cisco-equipment') }}">Sell Cisco Equipment</a></li>
                                                        <li><a href="{{ URL::to('service/sell-mitel-equipment') }}">Sell Mitel Equipment</a></li>
                                                        <li><a href="{{ URL::to('service/sell-nortel-equipment') }}">Sell Nortel Equipment</a></li>
                                                        <li><a href="{{ URL::to('service/sell-polycom-equipment') }}">Sell Polycom Equipment</a></li>

                                                    </ul>
                                                </div><!-- /.col-md-4 -->

                                                <div class="col-md-4">
                                                    <div class="widget widget_recent_entries">
                                                        <div class="mega-title">
                                                            <h5 class="btn-mega">OUR SERVICES</h5>
                                                        </div>
                                                        <ul class="mega-menu-sub">
                                                            <li>
                                                                <div class="entry-cover">
                                                                    <a href="{{ URL::to('service/sell-it-equipment') }}"><img src="{{url('public/assets/images/services/100-1.png')}}" alt="images" style="width:100px;height:100px;"></a>
                                                                </div>
                                                                <div class="entry-content">
                                                                    <a href="{{ URL::to('service/sell-it-equipment') }}">Sell IT Equipment </a>
                                                                    <p class="box-readmore">
                                                                        <a href="{{ URL::to('service/sell-it-equipment') }}">Learn more</a>
                                                                    </p>
                                                                </div>
                                                                <br>
                                                            </li>
                                                            <li>
                                                                <div class="entry-cover">
                                                                    <a href="{{ URL::to('service/data-centre-decommissioning') }}"><img src="{{url('public/assets/images/services/100-2.png')}}"  alt="images" style="width:100px;height:100px;"></a>
                                                                </div>
                                                                <div class="entry-content">
                                                                    <a href="{{ URL::to('service/data-centre-decommissioning') }}">Data Centre Decommissioning</a>
                                                                    <p class="box-readmore">
                                                                        <a href="{{ URL::to('service/data-centre-decommissioning') }}">Learn more</a>
                                                                    </p>
                                                                </div>
                                                            </li>
                                                        </ul>
                                                    </div><!-- /.widget_recent_entries -->
                                                </div><!-- /.col-md-4 -->

                                                <div class="col-md-4">
                                                    <div class="mega-title">
                                                        <h5 class="btn-mega">WEEE RECYCLING</h5>
                                                    </div>
                                                    <div class="mega-menu-sub">
                                                        <div class="flat-imagebox">
                                                            <div class="imagebox">
                                                                <div class="box-wrapper">
                                                                    <div class="box-image">
                                                                        <img src="{{url('public/assets/images/slides/box101.png')}}" alt="images">
                                                                    </div>
                                                                    <div class="box-header">
                                                                        <h5 class="box-title">
                                                                            <a href=""><!--The gallery of canava transport--></a>
                                                                        </h5>
                                                                    </div>
                                                                    <div class="box-content">
                                                                        <div class="box-desc"></div>
                                                                        <div class="box-button">
                                                                            <a class="button bg-scheme3" href="{{ URL::to('service/weee-recycling-services') }}">Learn more <i class="fa fa-chevron-right"></i></a>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div><!-- /.imagebox -->
                                                        </div>
                                                    </div>
                                                </div><!-- /.col-md-4 -->
                                            </div><!-- /.container -->
                                        </div><!-- /.row -->
                                    </div><!-- /.submenu -->
                                </li>
                                <li class=" {{ (request()->is('about')) ? 'home' : '' }}"><a href="{{ URL::to('about') }}">About</a>

                                </li>

                                <li class=" {{ (request()->is('shop')) ? 'home' : '' }}"><a href="{{ URL::to('shop') }}">Shop</a>

                                </li>

                              <!--  <li class=" {{ (request()->is('services')) ? 'home' : '' }}"><a href="{{ URL::to('services') }}"></a>
                                    <ul class="submenu ">
                                    <li><a href="">Sell IT Equipment</a></li>
                                    <li><a href="">Sell Hardware </a></li>
                                    <li><a href="services-detail.php">Sell Telecoms Equipment</a></li>
                                    <li><a href="services-detail.php">Datacenter decommissioning</a></li>
                                    <li><a href="services-detail.php">WEEE Waste Recycling</a></li>
                                     <li><a href="services-detail.php">Explore all Services</a></li>-->

                                     <!--   <li><a href="services-detail.html">Sell Cisco</a></li>
                                        <li><a href="services-detail-v2.html">Sell Mitel</a></li>
                                        <li><a href="services-detail-v3.html">Sell Avaya</a></li>
                                        <li><a href="services-detail-v4.html">Sell Polycom</a></li>
                                        <li><a href="services-detail-v5.html">Sell Nortel</a></li>
                                        <li><a href="services-detail-v6.html">Sell Your IT Equipment</a></li>
                                          <li><a href="services-detail-v6.html">Sell Telecoms Equipment</a></li>
                                            <li><a href="services-detail-v6.html">Sell Mobile Hardware</a></li>
                                              <li><a href="services-detail-v6.html">Data Center Decommissioning</a></li>
                                        <li><a href="services-detail-v6.html">WEEE Recycling Services</a></li>
                                        <li><a href="services-detail-v6.html">Sell IP Phones</a></li>
                                        <li><a href="services-detail-v6.html">Sell Phone Systems</a></li>-->
                                   <!-- </ul> /.submenu
                                </li>-->

                                <li class=" {{ (request()->is('blog')) ? 'home' : '' }}"><a href="{{ URL::to('blog') }}">News</a>

                                </li>
                                <li class=" {{ (request()->is('video')) ? 'home' : '' }}"><a href="{{ URL::to('video') }}">video</a>

                                </li>
                               <li class=" {{ (request()->is('quote')) ? 'home ' : '' }}"><a href="{{ URL::to('quote') }}">Request a Quote</a>
                                                                </li>
                               <!-- <li><a href="shop.html">Shop</a></li>-->
                                <li href="{{ (request()->is('contact')) ? 'home ' : '' }}"><a href="{{ URL::to('contact') }}">Contact</a></li>
                                @if(Auth::check())
                                <li>
                                    <a href="javascript:void();">
                                        <!-- Account Settings -->
                                        @if (Auth::user()->image_icon != 'default.png')
                                            <img src="{{ url(Auth::user()->image_icon) }}" width="35px" style="border-radius: 40px;" >
                                        @else
                                            <img src="{{ asset('public/images/default.png') }}" width="35px" style="border-radius: 40px;" >
                                        @endif

                                    </a>
                                    <ul class="submenu">

                                        <li><a href="{{ URL::to('myaccount') }}">My Account</a></li>
                                        <li><a href="{{ URL::to('orders') }}">My Orders</a></li>
                                        <li><a href="{{ url('myaccount/profile') }}">Profile Setting</a></li>
                                        <li><a href="{{ URL::to('logout') }}">Logout</a></li>
                                    </ul><!-- /.submenu -->
                                </li>
                                <li class=" {{ (request()->is('cart')) ? 'home ' : '' }}">
                                    <a href="{{ URL::to('cart') }}">
                                        <i class="fa fa-shopping-cart" title="Cart" style="font-size: 25px;"></i>
                                        <div class="cart_count" style="float: right; margin-top: -15px; color: #d7b854;" >
                                            <span>{{ getCartTotalQty() }}</span>
                                        </div>
                                    </a>
                                </li>
                                @else
                                    <li class=" {{ (request()->is('login')) ? 'home ' : '' }} "><a href="{{ URL::to('login') }}">Login</a></li>
                                    <li class=" {{ (request()->is('cart')) ? 'home ' : '' }}">
                                        <a href="{{ URL::to('cart') }}">
                                            <i class="fa fa-shopping-cart" title="Cart" style="font-size: 25px;"></i>
                                            <div class="cart_count" style="float: right; margin-top: -15px; color: #d7b854;" >
                                            <span>{{ getCartTotalQty() }}</span>
                                        </div>
                                        </a>
                                    </li>
                                @endif
                                <li>&nbsp;&nbsp;&nbsp;&nbsp;</li>
                            </ul><!-- /.menu -->
                        </nav><!-- /.mainnav -->
                    </div><!-- /.nav-wrap -->
                </div><!-- /.header-wrap -->
            </header><!-- /.header -->
        </div><!-- /.site-header -->
