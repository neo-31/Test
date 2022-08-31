@extends('layouts.app')
@section('title'){{ ucWords($product->product_name) }}@endsection
@section('meta_description'){{ ucWords($product->product_name) }}@endsection

@section('content')
<div class="page-title parallax-style parallax1">
    <div class="overlay"></div>
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="page-title-heading">
                    <h1>{{ ucWords($product->product_name) }}</h1>
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
                        <li class="trail-item"><a href="{{ url('/') }}">Home</a></li>
                        <li class="trail-item"><a href="{{ url('shop') }}">Shop</a></li>
                        <li>{{ $product->product_name }}</li>
                    </ul>
                </div><!-- /.breadcrumbs -->
            </div><!-- /.flat-wrapper -->
        </div><!-- /.row -->
    </div><!-- /.container -->
</div><!-- /.page-breadcrumbs -->

<div class="flat-row flat-woocommerce flat-general sidebar-right">
    <div class="container">
        <div class="row">
            <div class="general">
                <div class="products-detail">
                    @if($product->product_price)
                    <div class="col-md-12">
                        <h4 class="text-left">£ {{$product->product_price}}</h4>
                    </div>
                    @endif
                    <div class="products-images col-md-12">
                        <div id="sync1" class="slider owl-carousel">
                            @if($product->product_image)
                            <div class="item">
                                <a class="popup-gallery" href="{{ url($product->product_image) }}"><img
                                                src="{{ url($product->product_image) }}  " alt="images"></a>
                            </div>
                            @endif
                            @if($product->product_images1)
                            <div class="item">
                                <a class="popup-gallery" href="{{ url($product->product_images1) }}"><img
                                                src="{{ url($product->product_images1) }}  " alt="images"></a>
                            </div>
                            @endif
                            @if($product->product_images2)
                            <div class="item">
                                <a class="popup-gallery" href="{{ url($product->product_images2) }}"><img
                                                src="{{ url($product->product_images2) }}  " alt="images"></a>
                            </div>
                            @endif
                            @if($product->product_images3)
                            <div class="item">
                                <a class="popup-gallery" href="{{ url($product->product_images3) }}"><img
                                                src="{{ url($product->product_images3) }}  " alt="images"></a>
                            </div>
                            @endif
                            @if($product->product_images4)
                            <div class="item">
                                <a class="popup-gallery" href="{{ url($product->product_images4) }}"><img
                                                src="{{ url($product->product_images4) }}  " alt="images"></a>
                            </div>
                            @endif
                        </div>
                        <div class="flat-divider d20px"></div>
                        <div id="sync2" class="navigation-thumbs owl-carousel mt-2">
                            @if($product->product_image)
                            <div class="item">
                                <img src="{{ url($product->product_image) }}  " alt="images"></a>
                            </div>
                            @endif
                            @if($product->product_images1)
                            <div class="item">
                                <img src="{{ url($product->product_images1) }}  " alt="images"></a>
                            </div>
                            @endif
                            @if($product->product_images2)
                            <div class="item">
                                <img src="{{ url($product->product_images2) }}  " alt="images"></a>
                            </div>
                            @endif
                            @if($product->product_images3)
                            <div class="item">
                                <img src="{{ url($product->product_images3) }}  " alt="images"></a>
                            </div>
                            @endif
                            @if($product->product_images4)
                            <div class="item">
                                <img src="{{ url($product->product_images4) }}  " alt="images"></a>
                            </div>
                            @endif
                        </div>
                        <br>
                        <!--<div class="general-slider services-slider">
                            <div class="flexslider">
                                <ul class="slides">
                                    @if($product->product_image)
                                        <li>
                                            <a class="popup-gallery" href="{{ url($product->product_image) }}"><img
                                                    src="{{ url($product->product_image) }}  " alt="images"></a>
                                        </li>
                                    @endif
                                    @if($product->product_images1)
                                        <li>
                                            <a class="popup-gallery" href="{{ url($product->product_images1) }}"><img
                                                    src="{{ url($product->product_images1) }}" alt="images"></a>
                                        </li>
                                    @endif
                                    @if($product->product_images2)
                                        <li>
                                            <a class="popup-gallery" href="{{ url($product->product_images2) }}"><img
                                                    src="{{ url($product->product_images1) }}" alt="images"></a>
                                        </li>
                                    @endif
                                    @if($product->product_images3)
                                        <li>
                                            <a class="popup-gallery" href="{{ url($product->product_images3) }}"><img
                                                    src="{{ url($product->product_images1) }}" alt="images"></a>
                                        </li>
                                    @endif
                                    @if($product->product_images4)
                                        <li>
                                            <a class="popup-gallery" href="{{ url($product->product_images4) }}"><img
                                                    src="{{ url($product->product_images1) }}" alt="images"></a>
                                        </li>
                                    @endif

                                </ul>
                            </div>
                        </div>
                         {{--<a class="popup-gallery"  href="{{ url('shop/'.$product->id) }}">
                            @if($product->product_image)
                                <img src="{{ url($product->product_image) }}" class="main_img" alt="images">
                            @else
                                <img src="" class="main_img" alt="images">
                            @endif
                        </a>--}}-->
                    </div>
                    <div class="summary col-md-12">
                        @if(session()->has('message'))
                            <span class="form-success sucessMessage">{{ session()->get('message') }}</span>
                        @endif
                        @if (\Session::has('error'))
                            <span class="form-failure failMessage">{!! \Session::get('error') !!}</span>
                        @endif
                        <a href="{{ $product->id }}">
                            <div class="productname">{{ $product->product_name }}</div>
                        </a>
                        <!--<div class="reference"> <label>Reference Number:&nbsp; </label>{{ $product->reference }}</div>-->
                        <div class="sort_description"> <b style="font-size: 18px;">Description: </b>{{ $product->sort_description }}</div>
                        {{-- <form class="cart" name="add_to_cart" method="POST" id="add_to_cart"> --}}
                        {!! Form::open(array('url' => '','class'=>'cart','name'=>'add_to_cart','id'=>'add_to_cart','role'=>'form','enctype' => 'multipart/form-data')) !!}
                            <div class="quantity">
                                {{ csrf_field() }}
                                <?php if (Auth::check()) { ?>
                                    <input type="hidden" name="user_id" value="{{base64_encode(Auth::user()->id)}}">
                                    <?php } else {
                                    $cookie_name = "advert";
                                    if (!isset($_COOKIE[$cookie_name])) {
                                        $guid = uniqid();
                                        $cookie_value = $guid;
                                        setcookie($cookie_name, $cookie_value, time() + (86400 * 30 * 999), "/"); ?>
                                        <input type="hidden" name="guest_user_id" value="{{$guid}}">
                                    <?php } else { $guid = $_COOKIE[$cookie_name]; ?>
                                        <input type="hidden" name="guest_user_id" value="{{$guid}}">
                                <?php } } ?>
                                <input type="hidden" name="product_id" value="{{ $product->id }}" />
                                <input type="hidden" id="cart_date" name="cart_date" value="{{ date('Y-m-d') }}" />
                                <input type="hidden" id="cart_time" name="cart_time" value="{{ date('H:i:s') }}" />

                                <input type="number" step="1" min="1" max="{{ isset($product->product_quantity) ? $product->product_quantity : null }}"
                                name="quantity" id="quantity" value="1" class="input-text qty text" required><br>
                                <label for="quantity" class="error"></label>
                            </div>
                            @if($product->product_price != null)
                            <button type="button" class="button"  onclick="return add_to_cart_submit()" data-title="{{ $product->product_name }}">Add to Cart</button>
                            @else
                             <div class="col-md-12"  style="padding-left: 0px;">
                            <button type="button" class="button quotepopup" data-toggle="modal"
                                data-target="#qoutemodel" data-title="{{ $product->product_name }}">Enquire Now
                                </button>
                              
                            </div>
                        @endif
                        {!! Form::close() !!}
                        {{-- </form> --}}
                        <div class="product_meta">
                            <!--<span class="posted_in" >Categories: @foreach($category_list as $category)<a href="#">{{ $category->category_name }},</a>etc.@endforeach </span>-->
                        </div>
                    </div>
                    <!-- /.summary -->
                    <div class="flat-tabs col-md-12" style="clear: left;">
                        <ul class="menu-tabs">
                            <li class="active"><a href="#">Product Details</a></li>
                        </ul>
                        <div class="content-tab">
                            <div class="content-inner active" style="display: block;">
                                {!!$product->description!!}
                            </div><!-- /.content-inner -->
                        </div><!-- /.content-tab -->
                    </div>

                </div><!-- /.woocommerce-page -->
            </div><!-- /.general -->

            <div class="general-sidebars">
                <div class="sidebar-wrap">
                    <div class="sidebar">
                        <div class="widget widget_product_categories">
                            <h4 class="widget-title">Categories</h4>
                             <div class="scrollbar" id="style-default">
                                 <div class="force-overflow">
                                    <ul class="product-categories">
                                        @foreach($category_list as $category)
                                            <li><a href="{{url('shop/category/'.$category->category_slug)}}">{{ $category->category_name }}</a></li>
                                        @endforeach
                                    </ul>
                                </div>
                            </div>

                        </div><!-- /.widget_product_categories -->
                    </div><!-- /.sidebar -->
                </div><!-- /.sidebar-wrap -->
                <div class="sidebar-wrap">
                    <div class="sidebar">
                        <div class="widget widget_product_categories">
                            <h4 class="widget-title">Manufacturer</h4>
                                <div class="scrollbar" id="style-default">
                                    <div class="force-overflow">
                                        <ul class="product-categories">
                                             @foreach($manufacturer_list as $manufacturer)
                                                <li><a href="{{url('shop/manufacturer/'.$manufacturer->manufacturers_slug)}}">{{ $manufacturer->manufacturers_name }}</a></li>
                                            @endforeach
                                        </ul>
                                    </div>
                                </div>
                        </div><!-- /.widget_product_categories -->
                    </div><!-- /.sidebar -->
                </div><!-- /.sidebar-wrap -->
            </div><!-- /.general-sidebars -->
        </div>

            <!--  <div class="row">
                @if($product->product_images1)
                            <img class="productimg img1" src="{{ url($product->product_images1) }}" style="margin-left:15px" alt="images" width="100">
                @endif
                @if($product->product_images2)
                            <img class="productimg img2" src="{{ url($product->product_images2) }}" alt="images" width="100">
                @endif
                @if($product->product_images3)
                            <img class="productimg img3" src="{{ url($product->product_images3) }}" alt="images" width="100">
                @endif
                @if($product->product_images4)
                            <img class="productimg img4" src="{{ url($product->product_images4) }}" alt="images" width="100">
                @endif
            </div>-->

    </div><!-- /.container -->
</div>
<div class="modal fade" id="qoutemodel" role="dialog">
    <div class="modal-dialog">
        <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title">Request a Quote - <span class="qoutetitle"></span> </h4>
            </div>
            <div class="modal-body">
                <form id="contactform" method="POST" action="{{ route('shopMail') }}">
                    @honeypot
                    {{ csrf_field() }}
                    <input type="hidden" id="product_name" name="product_name" value="">
                    <div class="form-group row">
                        <div class="col-md-6">
                            <input type="text" name="name" value="" placeholder="Name*" class="form-control" required>
                        </div>
                        <div class="col-md-6">
                            <input type="email" name="email" value="" placeholder="Email*" class="form-control" required>
                        </div>
                    </div>
                    <div class="form-group row">
                        <div class="col-md-6">
                            <input type="tel" name="phone" value="" placeholder="Phone*" class="form-control" required>
                        </div>
                        <div class="col-md-6">
                            <input type="text" name="company" value="" placeholder="Company*" class="form-control" required>
                        </div>
                    </div>
                    <div class="form-group">
                        <textarea name="content_msg" class="qoutetextare"></textarea>
                    </div>
                    <div class="form-group">
                        {!! htmlFormSnippet() !!}
                        @error('g-recaptcha-response')
                            <span class="help-block">
                                <strong>{{ $message }}</strong>
                            </span>
                        @endif
                    </div>
                    <button type="submit" id="{{ $product->product_slug }}" class="button text-center">Submit</button>
                </form>
            </div>
            <!--<div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        </div>-->
        </div>

    </div>
</div>
@endsection

@section('page-style')
<link rel="stylesheet" type="text/css" href="https://cdn.bootcss.com/OwlCarousel2/2.2.1/assets/owl.carousel.css">
<link rel="stylesheet" type="text/css" href="https://cdn.bootcss.com/OwlCarousel2/2.2.1/assets/owl.theme.default.css">
<style>
    .header-v3 .header .header-wrap {
        position: absolute;
    }

    .flex-direction-nav {
        float: right;
        position: absolute;
        right: 0;
        bottom: 0;
        display: inline-flex;
    }

    .flex-direction-nav .flex-prev {
        right: 20px;
    }

    /*.flex-direction-nav a {
        border: 2px solid #000;
        color: #000;
    }*/


            #info
            {
            	font-size: 18px;
            	color: #555;
            	text-align: center;
            	margin-bottom: 25px;
            }

            a{
            	color: #074E8C;
            }

            .scrollbar
            {
            	margin-top: 55px;
            	/*float: left;*/
            	height: 190px;
            	width: 100%;
            	/*background: #F5F5F5;*/
            	overflow-y: scroll;
            	/*margin-bottom: 25px;*/
            }

            .force-overflow
            {
            	min-height: 450px;
            }

            #wrapper
            {
            	text-align: center;
            	width: 500px;
            	margin: auto;
            }

            /*
             *  STYLE 1
             */

            #style-1::-webkit-scrollbar-track
            {
            	-webkit-box-shadow: inset 0 0 6px rgba(0,0,0,0.3);
            	border-radius: 10px;
            	background-color: #F5F5F5;
            }

            #style-1::-webkit-scrollbar
            {
            	width: 12px;
            	background-color: #F5F5F5;
            }

            #style-1::-webkit-scrollbar-thumb
            {
            	border-radius: 10px;
            	-webkit-box-shadow: inset 0 0 6px rgba(0,0,0,.3);
            	background-color: #555;
            }

            /*
             *  STYLE 2
             */

            #style-2::-webkit-scrollbar-track
            {
            	-webkit-box-shadow: inset 0 0 6px rgba(0,0,0,0.3);
            	border-radius: 10px;
            	background-color: #F5F5F5;
            }

            #style-2::-webkit-scrollbar
            {
            	width: 12px;
            	background-color: #F5F5F5;
            }

            #style-2::-webkit-scrollbar-thumb
            {
            	border-radius: 10px;
            	-webkit-box-shadow: inset 0 0 6px rgba(0,0,0,.3);
            	background-color: #D62929;
            }

            /*
             *  STYLE 3
             */

            #style-3::-webkit-scrollbar-track
            {
            	-webkit-box-shadow: inset 0 0 6px rgba(0,0,0,0.3);
            	background-color: #F5F5F5;
            }

            #style-3::-webkit-scrollbar
            {
            	width: 6px;
            	background-color: #F5F5F5;
            }

            #style-3::-webkit-scrollbar-thumb
            {
            	background-color: #000000;
            }

            /*
             *  STYLE 4
             */

            #style-4::-webkit-scrollbar-track
            {
            	-webkit-box-shadow: inset 0 0 6px rgba(0,0,0,0.3);
            	background-color: #F5F5F5;
            }

            #style-4::-webkit-scrollbar
            {
            	width: 10px;
            	background-color: #F5F5F5;
            }

            #style-4::-webkit-scrollbar-thumb
            {
            	background-color: #000000;
            	border: 2px solid #555555;
            }


            /*
             *  STYLE 5
             */

            #style-5::-webkit-scrollbar-track
            {
            	-webkit-box-shadow: inset 0 0 6px rgba(0,0,0,0.3);
            	background-color: #F5F5F5;
            }

            #style-5::-webkit-scrollbar
            {
            	width: 10px;
            	background-color: #F5F5F5;
            }

            #style-5::-webkit-scrollbar-thumb
            {
            	background-color: #0ae;

            	background-image: -webkit-gradient(linear, 0 0, 0 100%,
            	                   color-stop(.5, rgba(255, 255, 255, .2)),
            					   color-stop(.5, transparent), to(transparent));
            }


            /*
             *  STYLE 6
             */

            #style-6::-webkit-scrollbar-track
            {
            	-webkit-box-shadow: inset 0 0 6px rgba(0,0,0,0.3);
            	background-color: #F5F5F5;
            }

            #style-6::-webkit-scrollbar
            {
            	width: 10px;
            	background-color: #F5F5F5;
            }

            #style-6::-webkit-scrollbar-thumb
            {
            	background-color: #F90;
            	background-image: -webkit-linear-gradient(45deg,
            	                                          rgba(255, 255, 255, .2) 25%,
            											  transparent 25%,
            											  transparent 50%,
            											  rgba(255, 255, 255, .2) 50%,
            											  rgba(255, 255, 255, .2) 75%,
            											  transparent 75%,
            											  transparent)
            }


            /*
             *  STYLE 7
             */

            #style-7::-webkit-scrollbar-track
            {
            	-webkit-box-shadow: inset 0 0 6px rgba(0,0,0,0.3);
            	background-color: #F5F5F5;
            	border-radius: 10px;
            }

            #style-7::-webkit-scrollbar
            {
            	width: 10px;
            	background-color: #F5F5F5;
            }

            #style-7::-webkit-scrollbar-thumb
            {
            	border-radius: 10px;
            	background-image: -webkit-gradient(linear,
            									   left bottom,
            									   left top,
            									   color-stop(0.44, rgb(122,153,217)),
            									   color-stop(0.72, rgb(73,125,189)),
            									   color-stop(0.86, rgb(28,58,148)));
            }

            /*
             *  STYLE 8
             */

            #style-8::-webkit-scrollbar-track
            {
            	border: 1px solid black;
            	background-color: #F5F5F5;
            }

            #style-8::-webkit-scrollbar
            {
            	width: 10px;
            	background-color: #F5F5F5;
            }

            #style-8::-webkit-scrollbar-thumb
            {
            	background-color: #000000;
            }


            /*
             *  STYLE 9
             */

            #style-9::-webkit-scrollbar-track
            {
            	-webkit-box-shadow: inset 0 0 6px rgba(0,0,0,0.3);
            	background-color: #F5F5F5;
            }

            #style-9::-webkit-scrollbar
            {
            	width: 10px;
            	background-color: #F5F5F5;
            }

            #style-9::-webkit-scrollbar-thumb
            {
            	background-color: #F90;
            	background-image: -webkit-linear-gradient(90deg,
            	                                          rgba(255, 255, 255, .2) 25%,
            											  transparent 25%,
            											  transparent 50%,
            											  rgba(255, 255, 255, .2) 50%,
            											  rgba(255, 255, 255, .2) 75%,
            											  transparent 75%,
            											  transparent)
            }


            /*
             *  STYLE 10
             */

            #style-10::-webkit-scrollbar-track
            {
            	-webkit-box-shadow: inset 0 0 6px rgba(0,0,0,0.3);
            	background-color: #F5F5F5;
            	border-radius: 10px;
            }

            #style-10::-webkit-scrollbar
            {
            	width: 10px;
            	background-color: #F5F5F5;
            }

            #style-10::-webkit-scrollbar-thumb
            {
            	background-color: #AAA;
            	border-radius: 10px;
            	background-image: -webkit-linear-gradient(90deg,
            	                                          rgba(0, 0, 0, .2) 25%,
            											  transparent 25%,
            											  transparent 50%,
            											  rgba(0, 0, 0, .2) 50%,
            											  rgba(0, 0, 0, .2) 75%,
            											  transparent 75%,
            											  transparent)
            }


            /*
             *  STYLE 11
             */

            #style-11::-webkit-scrollbar-track
            {
            	-webkit-box-shadow: inset 0 0 6px rgba(0,0,0,0.3);
            	background-color: #F5F5F5;
            	border-radius: 10px;
            }

            #style-11::-webkit-scrollbar
            {
            	width: 10px;
            	background-color: #F5F5F5;
            }

            #style-11::-webkit-scrollbar-thumb
            {
            	background-color: #3366FF;
            	border-radius: 10px;
            	background-image: -webkit-linear-gradient(0deg,
            	                                          rgba(255, 255, 255, 0.5) 25%,
            											  transparent 25%,
            											  transparent 50%,
            											  rgba(255, 255, 255, 0.5) 50%,
            											  rgba(255, 255, 255, 0.5) 75%,
            											  transparent 75%,
            											  transparent)
            }

            /*
             *  STYLE 12
             */

            #style-12::-webkit-scrollbar-track
            {
            	-webkit-box-shadow: inset 0 0 6px rgba(0,0,0,0.9);
            	border-radius: 10px;
            	background-color: #444444;
            }

            #style-12::-webkit-scrollbar
            {
            	width: 12px;
            	background-color: #F5F5F5;
            }

            #style-12::-webkit-scrollbar-thumb
            {
            	border-radius: 10px;
            	background-color: #D62929;
            	background-image: -webkit-linear-gradient(90deg,
            											  transparent,
            											  rgba(0, 0, 0, 0.4) 50%,
            											  transparent,
            											  transparent)
            }

            /*
             *  STYLE 13
             */

            #style-13::-webkit-scrollbar-track
            {
            	-webkit-box-shadow: inset 0 0 6px rgba(0,0,0,0.9);
            	border-radius: 10px;
            	background-color: #CCCCCC;
            }

            #style-13::-webkit-scrollbar
            {
            	width: 12px;
            	background-color: #F5F5F5;
            }

            #style-13::-webkit-scrollbar-thumb
            {
            	border-radius: 10px;
            	background-color: #D62929;
            	background-image: -webkit-linear-gradient(90deg,
            											  transparent,
            											  rgba(0, 0, 0, 0.4) 50%,
            											  transparent,
            											  transparent)
            }

            /*
             *  STYLE 14
             */

            #style-14::-webkit-scrollbar-track
            {
            	-webkit-box-shadow: inset 0 0 6px rgba(0,0,0,0.6);
            	background-color: #CCCCCC;
            }

            #style-14::-webkit-scrollbar
            {
            	width: 10px;
            	background-color: #F5F5F5;
            }

            #style-14::-webkit-scrollbar-thumb
            {
            	background-color: #FFF;
            	background-image: -webkit-linear-gradient(90deg,
            	                                          rgba(0, 0, 0, 1) 0%,
            											  rgba(0, 0, 0, 1) 25%,
            											  transparent 100%,
            											  rgba(0, 0, 0, 1) 75%,
            											  transparent)
            }

            /*
             *  STYLE 15
             */

            #style-15::-webkit-scrollbar-track
            {
            	-webkit-box-shadow: inset 0 0 6px rgba(0,0,0,0.1);
            	background-color: #F5F5F5;
            	border-radius: 10px;
            }

            #style-15::-webkit-scrollbar
            {
            	width: 10px;
            	background-color: #F5F5F5;
            }

            #style-15::-webkit-scrollbar-thumb
            {
            	border-radius: 10px;
            	background-color: #FFF;
            	background-image: -webkit-gradient(linear,
            									   40% 0%,
            									   75% 84%,
            									   from(#4D9C41),
            									   to(#19911D),
            									   color-stop(.6,#54DE5D))
            }

            /*
             *  STYLE 16
             */

            #style-16::-webkit-scrollbar-track
            {
            	-webkit-box-shadow: inset 0 0 6px rgba(0,0,0,0.1);
            	background-color: #F5F5F5;
            	border-radius: 10px;
            }

            #style-16::-webkit-scrollbar
            {
            	width: 10px;
            	background-color: #F5F5F5;
            }

            #style-16::-webkit-scrollbar-thumb
            {
            	border-radius: 10px;
            	background-color: #FFF;
            	background-image: -webkit-linear-gradient(top,
            											  #e4f5fc 0%,
            											  #bfe8f9 50%,
            											  #9fd8ef 51%,
            											  #2ab0ed 100%);
            }


</style>
@endsection

@section('page-script')
<script>
    $(document).ready(function () {
        $('.quotepopup').click(function () {
            var productname = $(this).attr('data-title');
            $("#product_name").val(productname);
            $('.qoutetextare').html("I would like to request a quote for the product -" + productname);
            $('.qoutetitle').html(productname);
        });

        $('.img1').click(function () {
            var img1 = $(this).attr('src');
            $('.main_img').attr('src', img1);

        });
        $('.img2').click(function () {
            var img1 = $(this).attr('src');
            $('.main_img').attr('src', img1);

        });
        $('.img3').click(function () {
            var img1 = $(this).attr('src');
            $('.main_img').attr('src', img1);

        });
        $('.img4').click(function () {
            var img1 = $(this).attr('src');
            $('.main_img').attr('src', img1);

        });
    });
    function add_to_cart_submit() {
        // debugger;
        if ((!$('#add_to_cart').valid())) {
            return false;
        }

        var data = document.getElementById('add_to_cart');
        var form_data = new FormData(data);

        $.ajax({

            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            url: "{{ url('add-to-cart') }}",
            data: form_data,
            cache: false,
            processData: false,
            contentType: false,
            type: 'POST',
            success: function(response) {
                /* alert(response);
                return false; */
                var data = jQuery.parseJSON(response);
                if(data.code === 2){
                    alert('Please complete your from current shop, then you can add.');
                    location.reload();
                } else if (data.code === 1) {
                    alert('Item added  to the Cart.');
                    location.reload();
                } else {
                    alert('Item is Already Exists.');
                    location.reload();
                }
            }
        });
    }

</script>
<script src="https://cdn.bootcss.com/OwlCarousel2/2.2.1/owl.carousel.js"></script>
<script>
    var sync1 = $(".slider");
    var sync2 = $(".navigation-thumbs");

    var thumbnailItemClass = '.owl-item';

    var slides = sync1.owlCarousel({
    	video:true,
      startPosition: 12,
      items:1,
      loop:true,
      margin:10,
      autoplay:true,
      autoplayTimeout:4000,
      autoplayHoverPause:false,
      nav: false,
      dots: true,
      responsiveRefreshRate: 200
    }).on('changed.owl.carousel', syncPosition);

    function syncPosition(el) {
      $owl_slider = $(this).data('owl.carousel');
      var loop = $owl_slider.options.loop;

      if(loop){
        var count = el.item.count-1;
        var current = Math.round(el.item.index - (el.item.count/2) - .5);
        if(current < 0) {
            current = count;
        }
        if(current > count) {
            current = 0;
        }
      }else{
        var current = el.item.index;
      }

      var owl_thumbnail = sync2.data('owl.carousel');
      var itemClass = "." + owl_thumbnail.options.itemClass;


      var thumbnailCurrentItem = sync2
      .find(itemClass)
      .removeClass("synced")
      .eq(current);

      thumbnailCurrentItem.addClass('synced');

      if (!thumbnailCurrentItem.hasClass('active')) {
        var duration = 300;
        sync2.trigger('to.owl.carousel',[current, duration, true]);
      }
    }
    var thumbs = sync2.owlCarousel({
      startPosition: 12,
      items:4,
      loop:false,
      margin:10,
      autoplay:false,
      nav: false,
      dots: false,
      onInitialized: function (e) {
        var thumbnailCurrentItem =  $(e.target).find(thumbnailItemClass).eq(this._current);
        thumbnailCurrentItem.addClass('synced');
      },
    })
    .on('click', thumbnailItemClass, function(e) {
        e.preventDefault();
        var duration = 300;
        var itemIndex =  $(e.target).parents(thumbnailItemClass).index();
        sync1.trigger('to.owl.carousel',[itemIndex, duration, true]);
    }).on("changed.owl.carousel", function (el) {
      var number = el.item.index;
      $owl_slider = sync1.data('owl.carousel');
      $owl_slider.to(number, 100, true);
    });

</script>

<script>
    $(document).ready(function(){
        $('#contactform input').on("cut copy paste",function(e) {
            e.preventDefault();
        });
        $('#contactform textarea').on("cut copy paste",function(e) {
            e.preventDefault();
        });
    });
</script>
@endsection
