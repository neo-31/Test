@extends('layouts.app')
@section('title', 'Testimonials')
@section('meta_description', 'Testimonials')

@section('content')

        <!-- Page title -->
        <div class="page-title parallax-style parallax1" style="background-position: 50% 2px;">
            <div class="overlay"></div>
            <div class="container">
                <div class="row">
                    <div class="col-md-12">                    
                        <div class="page-title-heading">
                            <h2>Testimonials</h2>
                        </div><!-- /.page-title-heading -->                        
                    </div><!-- /.col-md-12 -->  
                </div><!-- /.row -->  
            </div><!-- /.container -->                      
        </div><!-- /.page-title -->
        
        <div class="page-breadcrumbs">
            <div class="container">
                <div class="row">
                    <div class="flat-wrapper">
                        <div class="breadcrumbs">
                            <h2 class="trail-browse">You are here:</h2>
                            <ul class="trail-items">
                                <li class="trail-item"><a href="{{url('/')}}">Home</a></li>
                                <li>Testimonials</li>
                            </ul>
                        </div><!-- /.breadcrumbs -->
                    </div><!-- /.flat-wrapper -->
                </div><!-- /.row -->
            </div><!-- /.container -->
        </div><!-- /.page-breadcrumbs -->

        <div class="flat-row flat-general sidebar-right pad-bottom75px">
            <div class="container">
                <div class="row">
                    <div class="general">
                        <img src="{{asset('public/assets/images/clients2.jpg')}}" alt="images">
                        <div class="flat-divider d30px"></div>
                        <h3 class="flat-title-section style">What clients <span>say.</span></h3>
                        <div class="flat-divider d20px"></div>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="flat-testimonial">
                                    <div class="testimonial-meta">            
                                        <div class="testimonial-image">
                                            <img src="{{asset('public/assets/images/star.png')}}" alt="images">
                                        </div>
                                        <div class="testimonial-author">
                                            <strong class="author-name">Selina Van Laere</strong>
                                            <div class="author-info"></div>
                                        </div>
                                    </div>
                                    <div class="testimonial-content">
                                        <blockquote>
                                            Great experience. Offered us a competitive price and organised courier to collect items (Cisco Handsets). No quibble, no fuss. Would definitely use again next time we have equipment to sell on.
                                        </blockquote>
                                    </div>
                                </div><!-- /.testimonial -->

                                <!--<div class="flat-divider d40px"></div>-->

                                <!--<div class="flat-testimonial">-->
                                <!--    <div class="testimonial-meta">            -->
                                <!--        <div class="testimonial-image">-->
                                <!--            <img src="{{asset('public/assets/images/star.png')}}" alt="images">-->
                                <!--        </div>-->
                                <!--        <div class="testimonial-author">-->
                                <!--            <strong class="author-name">Jack Lane-Matthews</strong>-->
                                <!--            <div class="author-info"></div>-->
                                <!--        </div>-->
                                <!--    </div>-->
                                <!--    <div class="testimonial-content">-->
                                <!--        <blockquote>-->
                                <!--            Great service! Pick up was super fast and was by far the cheapest quote I received.-->
                                <!--        </blockquote>-->
                                <!--    </div>-->
                                <!--</div>--><!-- /.testimonial -->

                                <div class="flat-divider d40px"></div>

                                <div class="flat-testimonial">
                                    <div class="testimonial-meta">            
                                        <div class="testimonial-image">
                                            <img src="{{asset('public/assets/images/star.png')}}" alt="images">
                                        </div>
                                        <div class="testimonial-author">
                                            <strong class="author-name">James Etherington</strong>
                                            <div class="author-info"></div>
                                        </div>
                                    </div>
                                    <div class="testimonial-content">
                                        <blockquote>
                                           Great service. Quick quote. Free collections. Fast payments.
                                        </blockquote>
                                    </div>
                                </div><!-- /.testimonial -->
                            </div><!-- /.col-md-6 -->
							<div class="flat-divider d30px"></div>
                            <div class="col-md-6">
                                <div class="flat-testimonial">
                                    <div class="testimonial-meta">            
                                        <div class="testimonial-image">
                                            <img src="{{asset('public/assets/images/star.png')}}" alt="images">
                                        </div>
                                        <div class="testimonial-author">
                                            <strong class="author-name">Jack Lane-Matthews</strong>
                                            <div class="author-info"></div>
                                        </div>
                                    </div>
                                    <div class="testimonial-content">
                                        <blockquote>
                                            Great service! Pick up was super fast and was by far the cheapest quote I received.
                                        </blockquote>
                                    </div>
                                </div><!-- /.testimonial -->
                                
                                <div class="flat-divider d40px"></div>
        
                                <div class="flat-testimonial">
                                    <div class="testimonial-meta">            
                                        <div class="testimonial-image">
                                            <img src="{{asset('public/assets/images/star.png')}}" alt="images">
                                        </div>
                                        <div class="testimonial-author">
                                            <strong class="author-name">Angelo Hurshid</strong>
                                            <div class="author-info"></div>
                                        </div>
                                    </div>
                                    <div class="testimonial-content">
                                        <blockquote>
                                            Top notch, great service
                                        </blockquote>
                                    </div>
                                </div><!-- /.testimonial -->

                                <div class="flat-divider d40px"></div>

                                <!--<div class="flat-testimonial">-->
                                <!--    <div class="testimonial-meta">            -->
                                <!--        <div class="testimonial-image">-->
                                <!--            <img src="{{asset('public/assets/images/star.png')}}" alt="images">-->
                                <!--        </div>-->
                                <!--        <div class="testimonial-author">-->
                                <!--            <strong class="author-name">L M Garrington (Mrs)</strong>-->
                                <!--            <div class="author-info"></div>-->
                                <!--        </div>-->
                                <!--    </div>-->
                                <!--    <div class="testimonial-content">-->
                                <!--        <blockquote>-->
                                <!--            We have always found them to be highly professional and reliable, and have assisted us in delivering a high standard service to our customers. Canava have been a valuable supplier to Truflo and continue to be so.-->
                                <!--        </blockquote>-->
                                <!--    </div>-->
                                <!--</div>--><!-- /.testimonial -->

                                <div class="flat-divider d40px"></div>

                                <!--<div class="flat-testimonial">-->
                                <!--    <div class="testimonial-meta">            -->
                                <!--        <div class="testimonial-image">-->
                                <!--            <img src="{{asset('public/assets/images/star.png')}}" alt="images">-->
                                <!--        </div>-->
                                <!--        <div class="testimonial-author">-->
                                <!--            <strong class="author-name">Materials Control</strong>-->
                                <!--            <div class="author-info"></div>-->
                                <!--        </div>-->
                                <!--    </div>-->
                                <!--    <div class="testimonial-content">-->
                                <!--        <blockquote>-->
                                <!--            We have been doing business with Canava for many years and I would say the thing I like most about Canava is the staff. Whenever I get rates, request a load from dispatch or deal with sales, everyone is always courteous and quick to respond to our needs.-->
                                <!--        </blockquote>-->
                                <!--    </div>-->
                                <!--</div>--><!-- /.testimonial -->
                            </div><!-- /.col-md-6 -->
                        </div><!-- /.row -->
                    </div><!-- /.general -->

                    <div class="general-sidebars">
                        <div class="sidebar-wrap">
                            <div class="sidebar">
                                <div class="widget widget_nav_menu">
                                     <ul class="nav_menu">
                                        <li class="menu-item">
                                            <a class="active" href="{{url('quote')}}">REQUEST A QUOTE</a>
                                        </li>
                                        <li class="menu-item">
                                            <a href="{{url('about')}}">MEET THE TEAM</a>
                                        </li>
                                         <li class="menu-item">
                                            <a href="{{url('testimonials')}}">Testimonials</a>
                                        </li>
                                        <li class="menu-item">
                                            <a href="{{url('service/sell-it-equipment')}}">SELL EQUIPMENT</a>
                                        </li>
                                        <li class="menu-item">
                                            <a href="{{url('service/weee-recycling-services')}}">WEEE WASTE </a>
                                        </li>
                                        <li class="menu-item">
                                            <a href="{{url('')}}">DATA DESTRUCTION</a>
                                        </li>


                                    </ul>
                                </div><!-- /.widget_nav_menu -->

                                <div class="widget widget_recent_entries">
                                    <h4 class="widget-title">Company news</h4>
                                    <ul>
                                        <li>
                                            <a href="javascript:;">Explore the dark side of E-waste and why we are different</a>
                                            <span class="post-date">March 25, 2016</span>
                                        </li>
                                        <li>
                                            <a href="javascript:;">Simple solutions for IT asset recovery and data destruction</a>
                                            <span class="post-date">March 25, 2016</span>
                                        </li>
                                        <li>
                                            <a href="javascript:;">Follow our earth-friendly journey to ensure equipment avoids landfills</a>
                                            <span class="post-date">March 25, 2016</span>
                                        </li>
                                    </ul>
                                </div><!-- /.widget_recent_entries -->

                                <div class="widget widget_text">
                                    <div class="textwidget">
                                        <div class="content-text">
                                            <h4 class="title">We buy excess IT equipment</h4>
                                            <p>We offer the best market price by casting a wider net and utilising our long-term partners, we can offer you the best price for your obsolete IT & Telecoms equipment.</p>
                                            <a class="button white" href="{{url('contact')}}">Contact Us<i class="fa fa-chevron-right"></i></a>
                                        </div>
                                    </div><!-- /.textwidget -->
                                </div><!-- /.widget_text -->

                            </div><!-- /.sidebar -->
                        </div><!-- /.sidebar-wrap -->
                    </div><!-- /.general-sidebars -->
                </div><!-- /.row -->
            </div><!-- /.container -->
        </div><!-- /.blog -->

        @endsection

        @section('page-style')
        <style>
            .header-v3 .header .header-wrap{
                position: absolute;
            }
        </style>

        @endsection

        @section('page-script')

        @endsection
