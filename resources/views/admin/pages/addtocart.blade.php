@extends('layouts.app')
@section('title', 'Add to Cart')
@section('meta_description', 'we will ensure you get the maximum value back for your hardware! Get a Quote Online to Sell your Networking Equipment: effortless, Secure, & Precious!')

@section('content')

        <!-- Page title -->
        <div class="page-title parallax parallax2">
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <div class="page-title-heading">
                            <h1>Cart</h1>
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
                                <li>Cart</li>
                            </ul>
                        </div><!-- /.breadcrumbs -->
                    </div><!-- /.flat-wrapper -->
                </div><!-- /.row -->
            </div><!-- /.container -->
        </div><!-- /.page-breadcrumbs -->

        <div class="flat-row flat-general sidebar-right pad-bottom75px">
            <div class="container">
                <div class="row">
                    <div class="general"  id="refresh">
                        <table id="example" class="table table-striped table-bordered" style="width:100%">
                            <thead>
                                <tr>
                                    <th></th>
                                    <th>Item</th>
                                    <th>Price</th>
                                    <th>Qty</th>
                                    <th>Subtotal</th>
                                </tr>
                            </thead>
                            <tbody>
                                @if ($count_cart_data > 0)
                                    @foreach ($cart_data as $data)
                                    <tr>
                                        <td class="product-remove text-center">
                                            <a type="button" class="remove" onclick="return cart_item_remove({{$data->id}})"><span class="fa fa-times "></span></a>
                                        </td>
                                        <td>
                                            <img src="{{ url($data->product_image) }}" width="150" alt="images">
                                            &nbsp;
                                            <a href="{{url('shop/'.$data->product_slug)}}">
                                                {{$data->product_name}}
                                            </a>
                                        </td>
                                        <td>£{{$data->product_price}}</td>
                                        <td>{{$data->quantity}}</td>
                                        <td>£{{$data->product_price*$data->quantity}}</td>
                                    </tr>
                                    @endforeach
                                @else
                                    <tr>
                                        <td colspan="5"  class="text-center">
                                            <p>Cart is empty</p>
                                        </td>
                                    </tr>
                                @endif
                            </tbody>
                        </table>

                        <div class="flat-divider d20px"></div>
                        {{-- <div class="pull-right">
                            <a href="{{ URL::to('shop') }}"><button class=""> Update Shipping Basket</button></a>
                        </div> --}}

                    </div><!-- /.general -->

                    <div class="general-sidebars">
                        <div class="sidebar-wrap">
                            <div class="sidebar">
                                <div class="widget widget_product_categories" style="padding: 30px 19px;">
                                    <h4 class="widget-title">Summary</h4>
                                    <h6 style="margin-top: 20px;">Estimate Shipping and Tax</h6>
                                    <hr>
                                    <table id="subtotal_tbl" class="table table-borderless" border="0" style="width:100%">
                                        <tbody>
                                            <tr>
                                                <td>Subtotal(Excl. Tax)</td>
                                                <td>£{{ round($subtotal, 2) }}</td>
                                            </tr>
                                            <tr>
                                                <td>Subtotal(Incl. Tax)</td>
                                                <td>£{{ round($subtotal, 2) }}</td>
                                            </tr>
                                            <tr>
                                                <td>Subtotal(Shipping Method- Standard Delievry)</td>
                                                <td>£{{$shppingcharge}}</td>
                                            </tr>
                                            <tr class="tbl_border_top">
                                                <td>Tax</td>
                                                <td style="display: inherit;">
                                                    £{{$tax}}
                                                    <small>
                                                        {{-- <i class="fa fa-minus text-success" style="font-size: small;"></i> --}}
                                                        <i class="fa fa-plus text-success" style="font-size: small;"></i>
                                                    </small>
                                                </td>
                                            </tr>
                                            <tr class="tbl_border_top">
                                                <td><b>Order Total Incl. Tax</b></td>
                                                <td><b>£{{ round($main_total, 2) }}</b></td>
                                            </tr>
                                            <tr class="tbl_border_top">
                                                <td><b>Order Total Excl. Tax</b></td>
                                                <td><b>£{{ round($grandtotal, 2) }}</b></td>
                                            </tr>
                                            <tr class="tbl_border_top">
                                                <td colspan="2">
                                                @if(Auth::check())
                                                    <a href="{{url('checkout')}}"><button class=""> Proceed to checkout</button></a>
                                                @else
                                                    <a id="checkout"><button class=""> Proceed to checkout</button></a>
                                                @endif
                                                </td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div><!-- /.widget_product_categories -->
                            </div><!-- /.sidebar -->
                        </div><!-- /.sidebar-wrap -->
                    </div><!-- /.general-sidebars -->
                </div><!-- /.row -->

                <!-- Modal Popup -->
                <div id="MyPopup" class="modal fade" role="dialog">
                    <div class="modal-dialog">
                        <!-- Modal content-->
                        <div class="modal-content">
                            <div class="modal-header">
                                <button type="button" class="close" data-dismiss="modal">
                                    &times;</button>
                                <h4 class="modal-title">
                                    Calculate the Shipping Cost
                                </h4>
                            </div>
                            <div class="modal-body">
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="col-md-6">
                                            <h6 class="mag-top0px">Are you a New Customer ?</h6>
                                            <b>Calculate your shipping cost and track your order</b>
                                            {{-- <ul>
                                                <li>See  order and shipping Status</li>
                                                <li>Checkout Faster</li>
                                            </ul> --}}
                                        </div>
                                        <div class="col-md-6 text-center" style="line-height: 9;">
                                            <a href="{{url('signup')}}" class="button lg outline style1">Create an Account</a>
                                        </div>
                                    </div>
                                    <div class="col-md-12 text-center">
                                        {{-- <hr> --}}
                                        <h6 class="style"><span>OR</span></h6>
                                    </div>
                                    <div class="col-md-12">
                                        <h6 class="mag-top0px">Log in to checkout using your account</h6>
                                        {{-- <a href="{{url('login')}}" class="button lg outline style1">Login</a> --}}
                                        @if (count($errors) > 0)
                                        <div class="alert alert-danger alert-dismissible" role="alert">
                                            <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                            @foreach ($errors->all() as $error)
                                                <b>{{ $error }}</b><br>
                                            @endforeach
                                        </div>
                                        @endif
                                        {!! Form::open(array('url' => 'cutomer/login','class'=>'','id'=>'loginform','role'=>'form')) !!}
                                            <div class="form-group col-md-6">
                                                <input type="email" name="email" placeholder="Enter Email" required>
                                            </div>
                                            <div class="form-group col-md-6">
                                                <input type="password" name="password" placeholder="Enter password" required
                                                style="width: 100%">
                                            </div>
                                            <div class="form-group col-md-12 text-center">
                                                <input type="submit" class="button lg" name="login" value="Login">
                                            </div>
                                        {!! Form::close() !!}
                                    </div>
                                </div>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-danger" data-dismiss="modal">
                                    Close</button>
                            </div>
                        </div>
                    </div>
                </div>

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
