

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta name="csrf-token" content="BNKlfedk0tA8kjB1LmBS8UWcC1wB6YY35synjgqw">
    <link rel="icon" href="public/assets/images/favicon.png" type="image/x-icon"> <!-- Favicon-->
    <title>Admin Login - Vdr</title>
    <meta name="description" content="Vdr">
    <meta name="author" content="Vdr">
    
        <link rel="stylesheet" href="public/assets/vendor/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="public/assets/vendor/font-awesome/css/font-awesome.min.css">
    
    
    
    <!-- Custom Css -->
    <link rel="stylesheet" href="public/assets/css/mooli.min.css">
    <link rel="stylesheet" href="public/assets/css/style.css">

</head>

<body class="theme-cyan">

    <div class="auth-main">
        <div class="auth_div vivify fadeIn">
            <div class="auth_brand">
                <a class="navbar-brand" href="#"><img src="public/assets/images/logo1.png" class="d-inline-block align-top mr-2" alt=""></a>
            </div>
            <div class="card">
                <div class="header">
                    <p class="lead"{{ __('Login') }}>Login to your account</p>
                </div>
                <div class="body">
                    <div class="flash-message">
                                            </div>
                                            <form method="POST" action="{{ route('login') }}">
                        @csrf

                        <div class="form-group row">
                            <label for="email" class=" col-form-label text-md-right">{{ __('E-Mail Address') }}</label>

                            <div class="col-md-12">
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="password" class=" col-form-label text-md-right">{{ __('Password') }}</label>

                            <div class="col-md-12">
                                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">

                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <div class="col-md-6 ">
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>

                                    <label class="form-check-label" for="remember">
                                        {{ __('Remember Me') }}
                                    </label>
                                </div>
                            </div>
                        </div>

                        <div class="form-group row mb-0">
                            <div class="col-md-8 offset-md-2">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Login') }}
                                </button>

                                @if (Route::has('password.request'))
                                    <a class="btn btn-link" href="{{ route('password.request') }}">
                                        {{ __('Forgot Your Password?') }}
                                    </a>
                                @endif
                            </div>
                        </div>
                    </form>
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
  <script src="public/assets/admin_assets/bundles/libscripts.bundle.js"></script>
 <script src="public/assets/assets/bundles/vendorscripts.bundle.js"></script>
 
 </body>
</html>
