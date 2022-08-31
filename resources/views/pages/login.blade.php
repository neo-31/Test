@extends('layouts.app')
@section('title', 'Login')
@section('meta_description', 'we will ensure you get the maximum value back for your hardware! Get a Quote Online to Sell your Networking Equipment: effortless, Secure, & Precious!')

@section('content')

        <!-- Page title -->
        {{-- <div class="page-title parallax parallax2">
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <div class="page-title-heading">
                            <h1>Login</h1>
                        </div>
                    </div>
                </div>
            </div>
        </div> --}}<!-- /.page-title -->

        {{-- <div class="page-breadcrumbs">
            <div class="container">
                <div class="row">
                    <div class="flat-wrapper">
                        <div class="breadcrumbs">
                            <h2 class="trail-browse">You are here:</h2>
                            <ul class="trail-items">
                                <li class="trail-item"><a href="{{url('/')}}">Home</a></li>
                                <li>Login</li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div> --}}<!-- /.page-breadcrumbs -->

        <div class="flat-row">
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <div class="tracking-form-div" style="margin-top: 6em;">
                            {{-- <p>Enter the order number you would like to track in the form below. Here are the demo order numbers : 001, 002, 003, 004</p> --}}
                            <div class="row">
                                <div class="col-md-offset-3 col-md-6">
                                    <h3 class="flat-title-section style mag-top0px">Log<span>In</span></h3>
                                    @if (count($errors) > 0)
                                    <div class="alert alert-danger alert-dismissible" role="alert">
                                        <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                        @foreach ($errors->all() as $error)
                                            <b>{{ $error }}</b><br>
                                        @endforeach
                                    </div>
                                    @endif

                                    {!! Form::open(array('url' => 'login','class'=>'','id'=>'loginform','role'=>'form')) !!}
                                    {{-- <form  method="post" action="{{ url('login') }}" class=""> --}}
                                        <div class="pure-control-group abs">
                                            <label>Email: </label>
                                            <input type="email" name="email" value="{{ old('email') }}" autocomplete="email" autofocus placeholder="Enter Email...">
                                        </div>
                                        <div class="pure-control-group abs">
                                            <label>Password: </label>
                                            <input type="password" name="password" placeholder="Enter Password..." style="widows: 100%">
                                        </div>
                                        <div class="flat-divider d30px"></div>
                                        <p>New User ?<a href="{{ url('signup') }}" class="btn btn-link"> Signup </a></p>
                                        <div class="text-center">
                                            <input type="submit" value="login">
                                        </div>
                                    {{-- </form> --}}
                                    {!! Form::close() !!}
                                </div>
                            </div>
                        </div><!-- /.tracking-form-div -->
                    </div><!-- /.col-md-12 -->
                </div><!-- /.row -->
            </div><!-- /.container -->
        </div><!-- /.flat-row -->

        @endsection

        @section('page-style')
        <style>
            .header-v3 .header .header-wrap{
                position: absolute;
            }
            input[type="password"] {
                width: 100%;
            }
        </style>

        @endsection

        @section('page-script')

        @endsection
