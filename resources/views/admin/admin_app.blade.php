<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
	<head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <title>@yield('title') | {{ config('app.name') }}</title>
        <meta name="description" content="@yield('meta_description', config('app.name'))">
        <meta name="author" content="@yield('meta_author', config('app.name'))">
        <!-- Favicon-->
        <link rel="icon" href="{{ asset('public/images/icon.png') }}" type="image/x-icon">

        <link rel="stylesheet" href="{{ asset('public/admin_assets/vendor/bootstrap/css/bootstrap.min.css') }}">
        <link rel="stylesheet" href="{{ asset('public/admin_assets/vendor/font-awesome/css/font-awesome.min.css') }}">
        <link rel="stylesheet" href="{{ asset('public/admin_assets/vendor/animate-css/vivify.min.css') }}">

        @yield('page-styles')
        <link rel="stylesheet" href="{{ asset('public/admin_assets/css/mooli.min.css') }}">
        <link rel="stylesheet" href="{{asset('public/admin_assets/css/style.css')}}">
        <style>
            .metismenu a{ color: #fff; }
            .metismenu ul a { color: #fff; }
            .user-account { color: #fff; }
            ::selection { background: #E0C463 !important; }
        </style>
</head>

<body id="body" class="theme-cyan">

    <div class="page-loader-wrapper">
        <div class="loader">
            <div class="m-t-30"><img src="{{ asset('public/admin_assets/images/logo.png') }}" width="100" height="auto" alt="Mercers"></div>
            <p>Please wait...</p>
        </div>
    </div>

    <div class="overlay"></div>
    <div id="wrapper">
        @include("admin.topbar")
        @include("admin.sidebar")
        <div id="main-content">
            <div class="container-fluid">
                @yield("content")
            </div>
        </div>
    </div>

    <script src="{{ asset('public/admin_assets/bundles/libscripts.bundle.js') }}"></script>
    <script src="{{ asset('public/admin_assets/bundles/vendorscripts.bundle.js') }}"></script>

    @yield('vendor-script')

    <script src="{{ asset('public/admin_assets/bundles/mainscripts.bundle.js') }}"></script>

    @yield('page-script')

    <script type="text/javascript">
        var Tawk_API=Tawk_API||{}, Tawk_LoadStart=new Date();
        (function(){
        var s1=document.createElement("script"),s0=document.getElementsByTagName("script")[0];
        s1.async=true;
        s1.src='https://embed.tawk.to/5e44175da89cda5a188591ec/1e0t1qduj';
        s1.charset='UTF-8';
        s1.setAttribute('crossorigin','*');
        s0.parentNode.insertBefore(s1,s0);
        })();
    </script>

</body>
</html>

