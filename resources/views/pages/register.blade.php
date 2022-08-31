@extends('layouts.app')
@section('title', 'Signup')
@section('meta_description', 'We will help you to get the highest value out of your hardware. To sell your networking equipment, get a quote online: easy, secure and precious')

@section('content')

        <!-- Page title -->
        {{-- <div class="page-title parallax parallax2">
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <div class="page-title-heading">
                            <h1>Signup</h1>
                        </div>
                    </div>
                </div>
            </div>
        </div><!-- /.page-title --> --}}

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

        <div class="flat-row ">
            <div class="container">
                <div class="row">
                    <div class="col-md-12">

                        <div class="tracking-form-div" style="margin-top: 6em;">
                            {{-- <p>Enter the order number you would like to track in the form below. Here are the demo order numbers : 001, 002, 003, 004</p> --}}
                            <div class="row">
                                <div class="col-md-offset-3 col-md-6">
                                    <h3 class="flat-title-section style mag-top0px">Sign<span>Up</span></h3>
                                    @if (count($errors) > 0)
                                    <div class="alert alert-danger alert-dismissible" role="alert">
                                        <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                        @foreach ($errors->all() as $error)
                                            <b>{{ $error }}</b><br>
                                        @endforeach
                                    </div>
                                    @endif
                                    @if(Session::has('flash_message'))
                                    <div class="alert alert-success">
                                        <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                        {{ Session::get('flash_message') }}
                                    </div>
                                    @endif
                                    {!! Form::open(array('url' => 'signup','class'=>'','id'=>'signupform','role'=>'form')) !!}

                                        <div class="pure-control-group abs">
                                            <label>Firstname: </label>
                                            <input type="text" name="firstname" placeholder="Enter Firstname...">
                                        </div>
                                        <div class="pure-control-group abs">
                                            <label>Lastname: </label>
                                            <input type="text" name="lastname" placeholder="Enter Lastname...">
                                        </div>
                                        <div class="pure-control-group abs">
                                            <label>Email: </label>
                                            <input type="email" name="email" placeholder="Enter Email...">
                                        </div>
                                        <div class="pure-control-group abs">
                                            <label>Password: </label>
                                            <input type="password" name="password" id="password" placeholder="Enter Password..." >
                                        </div>
                                        <div class="pure-control-group abs">
                                            <label>Confirm Password: </label>
                                            <input type="password" name="confirmpassword" placeholder="Enter Confirm Password..." >
                                        </div>
                                        <div class="pure-control-group abs">
                                            <label>Mobile: </label>
                                            <input type="text" name="phone" placeholder="Enter Mobile Number...">
                                        </div>
                                        <div class="flat-divider d30px"></div>
                                        <p>Already Account ?<a href="{{ url('login') }}" class="btn btn-link"> Signin </a></p>
                                        <div class="text-center ">
                                            <input type="submit" value="Signup">
                                        </div>
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
            textarea, input[type="text"], input[type="email"], input[type="password"] {
                width: 100% !important;
            }
        </style>

        @endsection

        @section('page-script')
        <script>
            $(document).ready(function () {
                $('#signupform').validate({
                    rules: {
                        firstname: {
                            required: true,
                        },
                        lastname: {
                            required: true,
                        },
                        email: {
                            required: true,
                            email: true
                        },
                        password: {
                            required: true,
                            minlength: 8
                        },
                        confirmpassword: {
                            required: true,
                            equalTo: "#password"
                        },
                        phone: {
                            required: true,
                            digits: true
                        }

                    },
                    messages: {
                        firstname: "Please Enter Firstname",
                        lastname: "Please Enter Lastname",
                        email: {
                            required: 'Please Enter Email.',
                            email: "Please Enter a valid email address"
                        },
                        password: {
                            required: 'Please Enter Password.',
                            minlength: 'Password must be at least 8 characters long.',
                        },
                        confirmpassword: {
                            required: 'Please Enter Confirm Password.',
                            equalTo: 'Confirm Password do not match with Password.',
                        },
                        phone: {
                            required: 'Please Enter Phone Number.',
                            digits: "Please Enter a valid Phone Number"
                        }
                    }
                });
            });
        </script>
        @endsection
