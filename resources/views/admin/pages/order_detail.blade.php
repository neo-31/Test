@extends("admin.admin_app")
@section('title', 'Order Detail')

@section("content")
<div class="block-header">
    <div class="row clearfix">
        <div class="col-lg-4 col-md-12 col-sm-12">
            <h1>Orders Detail</h1>
            <!-- <span>JustDo Page Blank,</span> -->
        </div>
        <div class="col-lg-8 col-md-12 col-sm-12 text-lg-right">
           <a href="{{URL::to('admin/orders')}}" class="btn btn-primary theme-bg gradient btn-round"><i class="fa fa-sign-out"></i> Back</a>
        </div>
    </div>
    <div class="row mt-3">
        <div class="col-lg-12 col-md-12 col-sm-12">
            @if (count($errors) > 0)
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
            @endif

            @if(Session::has('flash_message'))
            <div class="alert alert-success">
                <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                {{ Session::get('flash_message') }}
            </div>
            @endif
        </div>
    </div>
</div>

<div class="row clearfix">

    <div class="col-lg-12 col-md-12">
        <div class="card planned_task">
            <div class="header">
                <h2 class="text-">Order ID: {{$user_detail->id}}</h2>
                <ul class="header-dropdown dropdown">
                    <li><a href="javascript:void(0);" class="full-screen"><i class="fa fa-expand"></i></a></li>

                </ul>
            </div>
            <div class="body">
                <div class="row clearfix">
                    <div class="col-md-12 mb-2 row">
                        <div class="col-md-2"><b>Cutomer Name:</b></div>
                        <div class="col-md-9">{{$user_detail->name}}<br></div>
                    </div>
                    <div class="col-md-12 mb-2 row">
                        <div class="col-md-2"><b> Address:</b></div>
                        <div class="col-md-9">
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
                        <div class="col-md-2"><b>Order Status:</b></div>
                        @php

                            if ($user_detail->is_status == "2") {
                                $order_status = '<span class="badge badge-info">In Process</span>';
                            }
                            else if ($user_detail->is_status == "3") {
                                $order_status = '<span  class="badge badge-success">Completed</span>';
                            }
                            else if ($user_detail->is_status == "4") {
                                $order_status = '<span  class="badge badge-danger">Return Requested</span>';
                            }
                            else{
                                $order_status = '<span  class="badge badge-warning">New Order</span>';
                            }
                        @endphp
                        <div class="col-md-9">{!! $order_status !!}<br></div>
                    </div>
                    <div class="col-md-6 mb-2 row">
                        {!! Form::open(array('url' => array('admin/orders/view-order'),'class'=>'col-md-12 row','name'=>'order_status_form','id'=>'order_status_form','role'=>'form','enctype' => 'multipart/form-data')) !!}
                        {{-- <div class="col-md-3"><b>Change Order Status:</b></div> --}}

                        <input type="hidden" name="order_id" id="order_id" value="{{$user_detail->id}}">
                        <select class="form-control" name="order_status" id="order_status_by">
                            <option value="1" {{ $user_detail->is_status  == "1" ? 'selected' : '' }}>New Order</option>
                            <option value="2" {{ $user_detail->is_status == "2" ? 'selected' : '' }}>In Process</option>
                            <option value="3" {{ $user_detail->is_status == "3" ? 'selected' : '' }}>Completed</option>
                            <option value="4" {{ $user_detail->is_status == "4" ? 'selected' : '' }}>Return Requested</option>
                        </select>
                        @php
                        /*
                            if ($user_detail->is_status == "1") {
                                $order_status_btn = '<button class="btn btn-info">Change to Processing</button>
                                <input type="hidden" name="order_status" id="order_status" value="2">';
                            }
                            else if ($user_detail->is_status == "2") {
                                $order_status_btn = '<button  class="btn btn-success">Change to Completed</button>
                                <input type="hidden" name="order_status" id="order_status" value="3">';
                            }
                            else if ($user_detail->is_status == "3") {
                                $order_status_btn = '<button  class="btn btn-danger">Change to Return Requested</button>
                                <input type="hidden" name="order_status" id="order_status" value="4">';
                            }
                            else {
                                $order_status_btn = '';
                            }*/
                        @endphp
                        {{-- <div class="col-md-9">{!! $order_status_btn !!}<br></div> --}}
                        {!! Form::close() !!}
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
        </div>
    </div>

</div>@endsection

@section('page-styles')
<link rel="stylesheet" href="{{ asset('public/admin_assets/vendor/jquery-datatable/dataTables.bootstrap4.min.css') }}">
<link rel="stylesheet" href="{{ asset('public/admin_assets/vendor/jquery-datatable/fixedeader/dataTables.fixedcolumns.bootstrap4.min.css') }}">
<link rel="stylesheet" href="{{ asset('public/admin_assets/vendor/jquery-datatable/fixedeader/dataTables.fixedheader.bootstrap4.min.css') }}">
<link rel="stylesheet" href="{{ asset('public/admin_assets/vendor/sweetalert/sweetalert.css') }}">
<link rel="stylesheet" href="{{ asset('public/admin_assets/vendor/toastr/toastr.min.css') }}">
@stop

@section('vendor-script')
<script src="{{ asset('public/admin_assets/bundles/datatablescripts.bundle.js') }}"></script>
<script src="{{ asset('public/admin_assets/vendor/jquery-datatable/buttons/dataTables.buttons.min.js') }}"></script>
<script src="{{ asset('public/admin_assets/vendor/jquery-datatable/buttons/buttons.bootstrap4.min.js') }}"></script>
<script src="{{ asset('public/admin_assets/vendor/jquery-datatable/buttons/buttons.colVis.min.js') }}"></script>
<script src="{{ asset('public/admin_assets/vendor/jquery-datatable/buttons/buttons.html5.min.js') }}"></script>
<script src="{{ asset('public/admin_assets/vendor/jquery-datatable/buttons/buttons.print.min.js') }}"></script>
<script src="{{ asset('public/admin_assets/vendor/sweetalert/sweetalert.min.js') }}"></script>
<script src="{{ asset('public/admin_assets/vendor/toastr/toastr.js') }}"></script>
@stop

@section('page-script')
<script src="{{ asset('public/admin_assets/js/pages/tables/jquery-datatable.js') }}"></script>

<script>
    $('#order_status_by').on('change', function () {
        $("#order_status_form").submit();
    });
</script>
@stop
