@extends('layouts.app')
@section('title', 'My Acoount')
@section('meta_description', 'we will ensure you get the maximum value back for your hardware! Get a Quote Online to Sell your Networking Equipment: effortless, Secure, & Precious!')

@section('content')

        <!-- Page title -->
        <div class="page-title parallax parallax2">
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <div class="page-title-heading">
                            <h1>My Acoount</h1>
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
                                <li>My Account</li>
                            </ul>
                        </div><!-- /.breadcrumbs -->
                    </div><!-- /.flat-wrapper -->
                </div><!-- /.row -->
            </div><!-- /.container -->
        </div><!-- /.page-breadcrumbs -->

        <div class="flat-row flat-general sidebar-left pad-bottom75px">
            <div class="container">
                <div class="row">
                    <div class="general">
                        <div class="row">
                            <div class="col-md-12">
                                <h5 class="flat-title-section style mag-top0px">Account <span>Information</span></h5>
                            </div>
                            <div class="col-md-6">
                                <div class="flat-tabs">
                                    <ul class="menu-tabs">
                                        <li class="active"><a href="#">Contact Information</a></li>
                                        {{-- <li><a href="#">Security</a></li> --}}
                                    </ul>
                                    <div class="content-tab">
                                        <div class="content-inner">

                                                <p>{{ Auth::user()->name }}</p>
                                                <p>{{ Auth::user()->email }}</p>

                                            <p class="border_top bg-grey">
                                                <span class="pull-left">
                                                    <a class="btn btn-link" href="{{ url('myaccount/profile') }}">Edit</a>
                                                </span>
                                                <span class="pull-right">
                                                    <a class="btn btn-link" href="{{ url('myaccount/reset-password') }}">Reset Password</a>
                                                </span>
                                            </p>
                                        </div><!-- /.content-inner -->
                                    </div><!-- /.content-tab -->

                                </div><!-- /.flat-tabs -->
                            </div><!-- /.col-md-6 -->

                            <div class="col-md-6">
                                <div class="flat-tabs">
                                    <ul class="menu-tabs">
                                        <li class="active"><a href="#">Checkout</a></li>
                                        {{-- <li><a href="#">Security</a></li> --}}
                                    </ul>
                                    <div class="content-tab">
                                        <div class="content-inner">
                                            <p>Update Checkout Detail</p>
                                        </div><!-- /.content-inner -->


                                    </div><!-- /.content-tab -->
                                </div><!-- /.flat-tabs -->
                            </div><!-- /.col-md-6 -->

                            <div class="col-md-12">
                                <h5 class="flat-title-section style ">Address <span>Book</span></h5>
                            </div>
                            <div class="col-md-6">
                                <div class="flat-tabs">
                                    <ul class="menu-tabs">
                                        <li class="active"><a href="#">Shipping Billing Address</a></li>
                                        {{-- <li><a href="#">Security</a></li> --}}
                                    </ul>
                                    <div class="content-tab">
                                        <div class="content-inner">
                                            @if (Auth::user()->shipping_address)
                                                <p>{{Auth::user()->shipping_address}}</p>
                                            @else
                                                <p>Your default shipping address is not set</p>
                                            @endif
                                        </div><!-- /.content-inner -->
                                    </div><!-- /.content-tab -->
                                </div><!-- /.flat-tabs -->
                            </div><!-- /.col-md-6 -->

                            <div class="col-md-6">
                                <div class="flat-tabs">
                                    <ul class="menu-tabs">
                                        <li class="active"><a href="#">Delivery Address</a></li>
                                        {{-- <li><a href="#">Security</a></li> --}}
                                    </ul>
                                    <div class="content-tab">
                                        <div class="content-inner">
                                            @if (Auth::user()->delivery_address)
                                                <p>{{Auth::user()->delivery_address}}</p>
                                            @else
                                                <p>Your Delivery address is not set</p>
                                            @endif

                                        </div><!-- /.content-inner -->
                                    </div><!-- /.content-tab -->
                                </div><!-- /.flat-tabs -->
                            </div><!-- /.col-md-6 -->
                        </div><!-- /.row -->

                        <div class="flat-divider d20px"></div>


                    </div><!-- /.general -->

                    <div class="general-sidebars">
                        <div class="sidebar-wrap">
                            <div class="sidebar">
                                <div class="widget widget_product_categories" style="padding: 30px 19px;">
                                    <h4 class="widget-title">My Account</h4>
                                    <div class="textwidget">
                                        <div class="content-text">

                                            <ul>
                                                <li><a class="dis_inline" href="{{ url('myaccount') }}">My Account <i class="fa fa-arrow-circle-right pull-right mag-top10px"></i></a></li>
                                                <li><a class="dis_inline" href="{{ url('orders') }}">My Orders <i class="fa fa-arrow-circle-right pull-right mag-top10px"></i></a></li>
                                                <li><a class="dis_inline" href="{{ url('myaccount/profile') }}">Address Book <i class="fa fa-arrow-circle-right pull-right mag-top10px"></i></a></li>
                                                <li><a class="dis_inline" href="{{ url('myaccount') }}">Account Information <i class="fa fa-arrow-circle-right pull-right mag-top10px"></i></a></li>
                                            </ul>
                                        </div>
                                    </div><!-- /.textwidget -->
                                    <hr>
                                    <h4 class="widget-title">Contact Forms</h4>
                                    <div class="textwidget">
                                        <div class="content-text">

                                            <ul>
                                                <li><a class="dis_inline" href="{{url('quote')}}">Request a Quote <i class="fa fa-arrow-circle-right pull-right mag-top10px"></i></a></li>
                                            </ul>
                                        </div>
                                    </div><!-- /.textwidget -->

                                </div><!-- /.widget_product_categories -->
                            </div><!-- /.sidebar -->
                        </div><!-- /.sidebar-wrap -->
                    </div><!-- /.general-sidebars -->
                </div><!-- /.row -->
            </div><!-- /.container -->
        </div><!-- /.blog -->

        @endsection

        @section('page-style')
        {{-- <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.2/css/bootstrap.css"> --}}
        <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.11.1/css/dataTables.bootstrap4.min.css">
        <style>
            .header-v3 .header .header-wrap{
                position: absolute;
            }
            table.table-bordered.dataTable tbody th, table.table-bordered.dataTable tbody td {
                vertical-align: baseline;
            }
            #subtotal_tbl .table > thead > tr > th, .table > tbody > tr > th, .table > tfoot > tr > th, .table > thead > tr > td, .table > tbody > tr > td, .table > tfoot > tr > td{
                border-top: 0px solid #ddd;
            }
            .border_top{
                border-top: 1px solid #ddd;
            }
            .bg-grey{
                background-color: rgb(238, 238, 238);
            }
        </style>

        @endsection

        @section('page-script')
        {{-- <script src="https://code.jquery.com/jquery-3.5.1.js"></script> --}}
        <script src="https://cdn.datatables.net/1.11.1/js/jquery.dataTables.min.js"></script>
        <script src="https://cdn.datatables.net/1.11.1/js/dataTables.bootstrap4.min.js"></script>
        <script>
            $(document).ready(function() {
                $('#example').DataTable({
                    "searching": false
                });
            } );
        </script>
        @endsection
