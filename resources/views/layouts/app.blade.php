<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}"><!-- CSRF Token -->
    <link rel="icon" href="{{ asset('public/images/icon.png') }}" type="image/x-icon">
    <title>@yield('title') | VDR Resale</title>
    <meta name="description" content="@yield('meta_description')">
    <meta name="author" content="@yield('meta_author', config('app.name'))">
	<meta name="google-site-verification" content="hrJuNci5qGGYiWPSZIeiOq-7WenUelMQIcVAeYPAwBc" />

    <!--Google crawlers-->
    <meta name="robots" content="allow">
    <meta name="googlebot" content="allow">

    @yield('meta')
    <link rel="stylesheet" type="text/css" href="{{asset('public/assets/css/bootstrap.css')}}" >


    <link rel="stylesheet" type="text/css" href="{{ asset('public/assets/css/colors/color1.css') }}">

    <link rel="stylesheet" type="text/css" href="{{ asset('public/assets/css/animate.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('public/assets/icon/favicon.png') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('public/assets/css/flexslider.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('public/assets/css/font-awesome.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('public/assets/css/magnific-popup.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('public/assets/css/owl.carousel.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('public/assets/css/revolution-slider.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('public/assets/css/shortcodes.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('public/assets/css/simple-line-icons.css') }}">



    <link rel="stylesheet" type="text/css" href="{{ asset('public/assets/css/slick.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('public/assets/css/style.css') }}">

    <link rel="stylesheet" type="text/css" href="{{ asset('public/assets/css/responsive.css') }}">

    <link rel="stylesheet" type="text/css" href="{{ asset('public/assets/css/notification.css') }}">
	<link rel="stylesheet" id="joinchat-css" href="{{ asset('public/assets/css/joinchat.min.css?ver=4.1.15') }}" type="text/css" media="all">
    <style id="joinchat-inline-css" type="text/css">
      .joinchat {
          --red: 37;
          --green: 211;
          --blue: 102;
      }
      
      p.form-group {
          color: #020202 !important;
          font-weight: 600 !important;
      }
  </style>
    <style>
        .header-v3 .header .header-wrap {
            background: rgba(255, 255, 255, 0.8);
        }
        .header-v3 #header.upscrolled .header-wrap {
            background: rgba(255, 255, 255, 0.9);
        }
        .page-title {
            padding: 150px 0 65px;
        }
      	.btn_w240{
      		width: 240px;
      	}
        .numb-word{
            display: inline-block;
            font-size: 40px;
            position: relative;
            line-height: 1;
            font-weight: bold;
            top: 3px;
            color: #fff;
        }
        .mobi_d_block{
                display: none;
            }
        @media only screen and (max-width: 991px) {
            .mobi_d_none {
                display: none;
            }
            .mobi_d_block{
                display: block;
            }
          	.fortune_popup{

              left: 1% !important;
              right: 1% !important;
              max-width: 90% !important;
            }
          	.tp-caption.sfl.title-slide {
              font-size: 36px !important;
            }
            .tp-caption.desc-slide {
              font-size: 19px !important;
            }
            .tp-caption.flat-button-slider{
              width: auto !important;
              top: 230px !important;
              font-size: 100% !important;
              padding: 18px 20px !important;
            }
          	.tp-caption.btn_sfr {
              left: 25% !important;
            }

        }
      	@media only screen and (max-width: 767px) {
            .tp-caption.desc-slide {
              font-size: 14px !important;
              top: 135px !important;
              line-height: 15px !important;
              word-break: break-word;
              white-space: normal;
              //font-size: 9px !important;
            }
          	.tp-caption.flat-button-slider {
              	top: 200px !important;
            }
          	.tp-caption.btn_sfr {
              left: 165px !important;
            }
          	.tp-caption.sfl.title-slide {
                font-size: 35px !important;
                line-height: 35px !important;
                word-break: break-word;
                white-space: normal;
            }
          	.tp-banner-container {
                position: relative;
                height: 300px;
            }
          	video#myVideo {
                height: 300px;
                width: auto;
            }


        }
        @media only screen and (min-width: 991px) {


        }
    </style>

    <script type="text/javascript">
    function callbackThen(response){
        // read HTTP status
        console.log(response.status);

        // read Promise object
        response.json().then(function(data){
            console.log(data);
        });
    }
    function callbackCatch(error){
        console.error('Error:', error)
    }
    </script>
    {!! htmlScriptTagJsApi([
        'callback_then' => 'callbackThen',
        'callback_catch' => 'callbackCatch'
    ]) !!}

    @yield('page-style')

    <!-- Global site tag (gtag.js) - Google Analytics -->
    <script async src="https://www.googletagmanager.com/gtag/js?id=UA-174593012-1"></script>
    <script>
        window.dataLayer = window.dataLayer || [];
        function gtag(){dataLayer.push(arguments);}
        gtag('js', new Date());
        gtag('config', 'UA-174593012-1');
     </script>
    
    <!-- Google Tag Manager -->
    <script>(function(w,d,s,l,i){w[l]=w[l]||[];w[l].push({'gtm.start':
      new Date().getTime(),event:'gtm.js'});var f=d.getElementsByTagName(s)[0],
      j=d.createElement(s),dl=l!='dataLayer'?'&l='+l:'';j.async=true;j.src=
      'https://www.googletagmanager.com/gtm.js?id='+i+dl;f.parentNode.insertBefore(j,f);
      })(window,document,'script','dataLayer','GTM-K339WZF');
    </script>
    <!-- End Google Tag Manager -->
  
  	@yield('schema')
  
</head>
<body class="header-sticky page-loading">
    <!-- Google Tag Manager (noscript) -->
    <noscript><iframe src="https://www.googletagmanager.com/ns.html?id=GTM-K339WZF"
    height="0" width="0" style="display:none;visibility:hidden"></iframe></noscript>
    <!-- End Google Tag Manager (noscript) -->
    @include('layouts.header')
    <main>
        @yield('content')
      
    </main>
      <!--<div class="joinchat joinchat--right" data-settings='{"telephone":"+447960252848","mobile_only":false,"button_delay":1,"whatsapp_web":true,"message_views":1,"message_delay":2,"message_badge":false,"message_send":"","message_hash":""}'>
          <div class="joinchat__button">
              <div class="joinchat__button__open"></div>
              <div class="joinchat__button__sendtext">Chat on Whatsapp</div>
              <div class="joinchat__tooltip">
                  <div>Hello</div>
              </div>
          </div>
          <svg height="0" width="0">
              <defs>
                  <clippath id="joinchat__message__peak">
                      <path
                          d="M17 25V0C17 12.877 6.082 14.9 1.031 15.91c-1.559.31-1.179 2.272.004 2.272C9.609 18.182 17 18.088 17 25z">
                      </path>
                  </clippath>
              </defs>
          </svg>
      </div>-->
    @include('layouts.footer')
    @include('layouts.script')
    @yield('page-script')
      <!--<script type="text/javascript" src="{{ asset('public/assets/js/joinchat.min.js?ver=4.1.15')}}" id="joinchat-js"></script>-->

</body>
</html>
