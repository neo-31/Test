<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link rel="icon" href="{{ asset('public/images/icon.png') }}" type="image/x-icon"> <!-- Favicon-->
    <title>Admin Login - {{ config('app.name') }}</title>
    <meta name="description" content="@yield('meta_description', config('app.name'))">
    <meta name="author" content="@yield('meta_author', config('app.name'))">
    @yield('meta')

    @stack('before-styles')
    <link rel="stylesheet" href="{{ asset('public/admin_assets/vendor/bootstrap/css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('public/admin_assets/vendor/font-awesome/css/font-awesome.min.css') }}">
    <link rel="stylesheet" href="{{ asset('public/admin_assets/vendor/animate-css/vivify.min.css') }}">
    @stack('after-styles')

    @if (trim($__env->yieldContent('page-styles')))
        @yield('page-styles')
    @endif

    <!-- Custom Css -->
    <link rel="stylesheet" href="{{ asset('public/admin_assets/css/mooli.min.css') }}">
    <link rel="stylesheet" href="{{ asset('public/admin_assets/css/style.css') }}">
</head>

<body class="theme-cyan">

    <div class="auth-main">
        <div class="auth_div vivify fadeIn">
            <div class="auth_brand">
                <a class="navbar-brand" href="#"><img src="{{ asset('public/images/logo.png') }}" class="d-inline-block align-top mr-2" alt=""></a>
            </div>
            <div class="card">
                <div class="header">
                    <p class="lead">Login to your account</p>
                </div>
                <div class="body">
                    <div class="flash-message">
                        @if (count($errors) > 0)
                            <div class="alert alert-danger">
                                @foreach ($errors->all() as $error)
                                    <b>{{ $error }}</b>
                                @endforeach
                            </div>
                        @endif
                    </div>
                    {!! Form::open(array('url' => 'admin/login','class'=>'form-auth-small','id'=>'loginform','role'=>'form')) !!}
                        <div class="form-group c_form_group">
                            <label>{{ __('Email address') }}</label>
                            <input id="email" type="email" placeholder="Enter your email address" class="form-control" name="email" value="{{ old('email') }}" autocomplete="email" autofocus>
                        </div>
                        <div class="form-group c_form_group">
                            <label>Password</label>
                            <input id="password" type="password" placeholder="Enter your password" class="form-control " name="password" autocomplete="current-password">
                        </div>
                        <div class="form-group clearfix">
                            <label class="fancy-checkbox element-left">
                                <input class="custom-control-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>
                                <span>{{ __('Remember Me') }}</span>
                            </label>
                        </div>
                        <button type="submit" class="btn btn-dark btn-lg btn-block">{{ __('LOGIN') }}</button>
                        <div class="bottom">
                            {{-- @if (Route::has('password.request'))
                            <span class="helper-text m-b-10"><i class="fa fa-lock"></i>
                                <a href="{{ route('password.request') }}">{{ __('Forgot Password?') }}</a>
                            </span>
                            @endif --}}
                            <span class="helper-text m-b-10">
                                <a href="{{ url('/') }}">{{ __('Back To Home') }} <i class="fa fa-sign-out"></i></a>
                            </span>
                        </div>
                    {!! Form::close() !!}
                </div>
            </div>
        </div>
        <div class="animate_lines">
            <div class="line"></div>
            <div class="line"></div>
            <div class="line"></div>
            <div class="line"></div>
            <div class="line"></div>
            <div class="line"></div>
        </div>
    </div>

 <!-- Scripts -->
 @stack('before-scripts')
 <script src="{{ asset('public/admin_assets/bundles/libscripts.bundle.js') }}"></script>
 <script src="{{ asset('public/assets/bundles/vendorscripts.bundle.js') }}"></script>
 @stack('after-scripts')

 @if (trim($__env->yieldContent('page-script')))
     @yield('page-script')
 @endif
</body>
</html>
