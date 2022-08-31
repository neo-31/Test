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
                        <table id="example" class="table table-striped table-bordered" style="width:100%">
                            <thead>
                                <tr>
                                    <th>Order Id</th>
                                    <th>Total Quantity</th>
                                    <th>Total Price</th>
                                    <th>Order Date</th>
                                    <th>Order Status</th>
                                    <th>Order View</th>
                                </tr>
                            </thead>
                            <tbody>
                                @if ($order_count > 0)
                                    @foreach ($order as $data)
                                    @php

                                        if ($data->is_status == "2") {
                                            $order_status = '<button class="btn btn-info btn-sm">Processing</button>';
                                        }
                                        /* else if ($data->is_status == "3") {
                                            $order_status = '<button  class="btn btn-primary btn-sm">Approved</button>';
                                        } */
                                        else if ($data->is_status == "3") {
                                            $order_status = '<button  class="btn btn-success btn-sm">Completed</button>';
                                        }
                                        else if ($data->is_status == "4") {
                                            $order_status = '<button  class="btn btn-danger btn-sm">Return Requested</button>';
                                        }
                                        else{
                                            $order_status = '<button  class="btn btn-warning btn-sm">New Order</button>';
                                        }
                                    @endphp
                                    <tr>
                                        <td class="product-remove text-center">
                                            {{$data->id}}
                                        </td>
                                        <td>
                                            {{$data->total_qty}}
                                        </td>
                                        <td>£{{$data->actual_price}}</td>
                                        <td>{{$data->created_at}}</td>
                                        <td>{!! html_entity_decode($order_status) !!}</td>
                                        <td class="text-center">
                                            <a href="{{ url('orders/view-order/'.$data->id) }}">
                                                <i class="fa fa-eye"></i>
                                            </a>
                                        </td>
                                    </tr>
                                    @endforeach
                                @else
                                    <tr>
                                        <td colspan="5"  class="text-center">
                                            <p>There is no order</p>
                                        </td>
                                    </tr>
                                @endif
                            </tbody>
                        </table>

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
                // $('#example').DataTable({
                //     "searching": false
                // });
                $('#checkout').click(function () {
                    @if(Auth::check())
                     alert("auth Hii")
                    @endif
                    $("#MyPopup").modal("show");
                });
            } );
            function cart_item_remove(id) {
                $.ajax({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    },
                    url: "{{ url('cart_item_remove') }}/"+ id,
                    cache: false,
                    processData: false,
                    contentType: false,
                    type: 'POST',
                    success: function(response) {
                        alert("1 item removed from cart");
                        location.reload();
                    }
                });
            }
        </script>
        @endsection
