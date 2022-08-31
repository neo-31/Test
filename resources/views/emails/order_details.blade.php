@extends('layouts.app')
@section('title', 'Order')
@section('meta_description', 'we will ensure you get the maximum value back for your hardware! Get a Quote Online to Sell your Networking Equipment: effortless, Secure, & Precious!')

@section('content')

        <!-- Page title -->
        <div class="page-title parallax parallax2">
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <div class="page-title-heading">
                            <h1>My Orders</h1>
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
                                <li class="trail-item"><a href="{{url('/')}}">My Account</a></li>
                                <li>Orders</li>
                            </ul>
                        </div><!-- /.breadcrumbs -->
                    </div><!-- /.flat-wrapper -->
                </div><!-- /.row -->
            </div><!-- /.container -->
        </div><!-- /.page-breadcrumbs -->

        <div class="flat-row flat-general sidebar-left pad-bottom75px">
            <div class="container">
                <div class="row">
                    <div class="general"  id="refresh">
                        <div class="col-md-12">
                            <h4 class="text-">Order ID: {{$user_detail->id}}</h4>
                        </div>
                        <div class="col-md-12">
                            <div class="row clearfix">
                                {{-- <div class="col-md-12 mb-2 row">
                                    <div class="col-md-2"><b>Cutomer Name:</b></div>
                                    <div class="col-md-9">{{$user_detail->name}}<br></div>
                                </div> --}}
                                <div class="col-md-12 mb-2 row">
                                    <div class="col-md-3"><b>Shipping Address:</b></div>
                                    <div class="col-md-8">
                                        @if (!empty($user_detail->shipping_address))
                                            {{$user_detail->shipping_address}},
                                        @endif
                                        @if (!empty($user_detail->postal_code))
                                            {{$user_detail->postal_code}},
                                        @endif
                                        @if (!empty($user_detail->country))
                                            {{$user_detail->country}}<br>
                                        @endif
                                    </div>
                                </div>
                                <div class="col-md-12 mb-2 row">
                                    <div class="col-md-3"><b>Order Status:</b></div>
                                    @php

                                         if ($user_detail->is_status == "2") {
                                            $order_status = '<span class="label label-info">Processing</span>';
                                        }
                                        /* else if ($user_detail->is_status == "3") {
                                            $order_status = '<span  class="label label-primary">Approved</span>';
                                        } */
                                        else if ($user_detail->is_status == "3") {
                                            $user_detail = '<span  class="label label-success">Completed</span>';
                                        }
                                        else if ($user_detail->is_status == "4") {
                                            $order_status = '<span  class="label label-danger">Return Requested</span>';
                                        }
                                        else{
                                            $order_status = '<span  class="label label-warning">New Order</span>';
                                        }
                                    @endphp
                                    <div class="col-md-8">{!! $order_status !!}<br></div>
                                </div>
                            </div>
                            <div class="table-responsive">
                                <h5 class="mt-4">Product Detail</h5>
                                <table class="table table-hover table-custom spacing5">
                                    <thead>
                                        <tr>
                                            <th>Product ID</th>
                                            <th>Product Image</th>
                                            <th>Product Name</th>
                                            <th>Product Quantity</th>
                                            <th>Subtotal</th>
                                        </tr>
                                    </thead>

                                    <tbody>

                                    @foreach ($order_data as $orders )


                                        <tr role="row" class="odd">
                                            <td class="sorting_1">{{$orders->products_id}}</td>
                                            <td>
                                                <img src="{{ url($orders->product_image) }}" width="100" alt="images">
                                            </td>
                                            <td>{{$orders->product_name}}</td>
                                            <td>{{$orders->quantity}}</td>

                                            <td>
                                                <p><b>£{{$orders->product_price*$orders->quantity}}</b></p>
                                                {{-- <small>Excl. VAT $xx</small> --}}
                                            </td>
                                        </tr>
                                    @endforeach
                                        <tr>
                                            <td class="text-right" colspan="4"><b>Total(With including shipping charge & VAT)</b></td>
                                            <td><b>£{{$user_detail->actual_price}}</b></td>
                                        </tr>

                                    </tbody>
                                </table>
                            </div>
                        </div>
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
                                                <li><a class="dis_inline" href="">Address Book <i class="fa fa-arrow-circle-right pull-right mag-top10px"></i></a></li>
                                                <li><a class="dis_inline" href="">Account Information <i class="fa fa-arrow-circle-right pull-right mag-top10px"></i></a></li>
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
            .table > thead > tr > th, .table > tbody > tr > th, .table > tfoot > tr > th, .table > thead > tr > td, .table > tbody > tr > td, .table > tfoot > tr > td {
                vertical-align: baseline;
            }
            #subtotal_tbl .table > thead > tr > th, .table > tbody > tr > th, .table > tfoot > tr > th, .table > thead > tr > td, .table > tbody > tr > td, .table > tfoot > tr > td{
                border-top: 0px solid #ddd;
            }
            .tbl_border_top{
                border-top: 1px solid #ddd;
            }
        </style>

        @endsection

        @section('page-script')
        {{-- <script src="https://code.jquery.com/jquery-3.5.1.js"></script> --}}
        <script src="https://cdn.datatables.net/1.11.1/js/jquery.dataTables.min.js"></script>
        <script src="https://cdn.datatables.net/1.11.1/js/dataTables.bootstrap4.min.js"></script>
        <script>
            $(document).ready(function() {

            } );

        </script>
        @endsection
