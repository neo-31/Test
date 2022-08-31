@extends("admin.admin_app")
@section('title', 'Orders')

@section("content")
<div class="block-header">
    <div class="row clearfix">
        <div class="col-lg-4 col-md-12 col-sm-12">
            <h1>Orders</h1>
            <!-- <span>JustDo Page Blank,</span> -->
        </div>
        <div class="col-lg-8 col-md-12 col-sm-12 text-lg-right">
           {{-- <a href="#" class="btn btn-primary theme-bg gradient btn-round"><i class="fa fa-plus"></i> Create Order</a> --}}
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
                <h2>Orders Filter</h2>
                <ul class="header-dropdown dropdown">
                    <li><a href="javascript:void(0);" class="full-screen"><i class="fa fa-expand"></i></a></li>

                </ul>
            </div>
            <div class="body">

                <form method="GET" action="{{ route('admin.orders') }}">
                    <div class="form-group row">
                        <div class="col-md-3 mb-2">
                            <label>Date</label>
                            <input type="hidden" name="user_id" id="user_id" class="form-control"
                             value="{{ $user_id }}" >
                            <input type="text" name="date_filter" id="date_filter" class="form-control"
                            data-provide="datepicker" data-date-autoclose="true" value="{{ $date_filter }}" >
                        </div>
                        <div class="col-md-3 mb-2">
                            <label>Status</label>
                            <select class="form-control selectpicker" name="status_filter" id="status_filter"  data-live-search="true">
                                <option value="" {{ $status_filter == "null" ? 'selected' : '' }} >Select Status</option>
                                <option value="1" {{ $status_filter == "1" ? 'selected' : '' }} >New Order</option>
                                <option value="2" {{ $status_filter == "2" ? 'selected' : '' }} >In Proccess</option>
                                <option value="3" {{ $status_filter == "3" ? 'selected' : '' }} >Completed</option>
                                <option value="4" {{ $status_filter == "4" ? 'selected' : '' }} >Return Requested</option>
                                <!--<option value="5" {{ $status_filter == "5" ? 'selected' : '' }} >Canceled</option>-->
                            </select>
                        </div>
                        <div class="col-md-3 mb-2 mt-2">
                            <!-- <input type="submit" name="submit" class="btn btn-primary  mb-2 " value="Filter" > -->
                            <button type="submit" name="submit" class="btn btn-primary mb-2 mt-4">Search</button>
                            <a class="btn btn-default mb-2 mt-4" href="{{ URL::to('admin/orders') }}">Reset</a>
                        </div>
                    </div>

                </form>
            </div>
        </div>
    </div>
</div>
<div class="row clearfix">

    <div class="col-lg-12 col-md-12">
        <div class="card planned_task">
            <div class="header">
                <h2>Orders</h2>
                <ul class="header-dropdown dropdown">
                    <li><a href="javascript:void(0);" class="full-screen"><i class="fa fa-expand"></i></a></li>

                </ul>
            </div>
            <div class="body">

                <div class="table-responsive">
                    <table class="table table-hover js-basic-example dataTable table-custom spacing5">
                        <thead>
                            <tr>
                                <th>Order ID</th>
                                <th>Customer Name</th>
                                <th>Order Date</th>

                                <th>Status</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tfoot>
                            <tr>
                                <th>Order ID</th>
                                <th>Customer Name</th>
                                <th>Order Date</th>

                                <th>Status</th>
                                <th>Action</th>
                            </tr>
                        </tfoot>
                        <tbody>

                        @foreach ($order_data as $orders)

                            @php

                                if ($orders->is_status == "2") {
                                    $order_status = '<button class="btn btn-outline-info btn-sm">In Proccess</button>';
                                }
                                /* else if ($orders->is_status == "3") {
                                    $order_status = '<button  class="btn btn-outline-primary btn-sm">Approved</button>';
                                } */
                                else if ($orders->is_status == "3") {
                                    $order_status = '<button  class="btn btn-outline-success btn-sm">Completed</button>';
                                }
                                else if ($orders->is_status == "4") {
                                    $order_status = '<button  class="btn btn-outline-danger btn-sm">Return Requested</button>';
                                }
                                else{
                                    $order_status = '<button  class="btn btn-outline-warning btn-sm">New Order</button>';
                                }
                            @endphp

                            <tr role="row" class="odd">
                                <td class="sorting_1">{{$orders->id}}</td>
                                <td>{{$orders->name}}</td>
                                <td>{{$orders->created_at}}</td>
                                <td>
                                    {!! $order_status !!}
                                </td>
                                <td>
                                    <a href="{{ url('admin/orders/view-order/'.$orders->id) }}" class="btn btn-outline-secondary btn-sm"><i class="fa fa-edit" title="view"></i> View</a>&nbsp;
                                    <!-- <a href="#" class="btn btn-outline-danger btn-sm property_delete"><i class="fa fa-trash"></i> Delete</a>&nbsp; -->
                                </td>
                            </tr>

                        @endforeach

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
<link rel="stylesheet" href="{{ asset('public/admin_assetsassets/vendor/bootstrap-multiselect/bootstrap-multiselect.css') }}">
<link rel="stylesheet" href="{{ asset('public/admin_assetsassets/vendor/multi-select/css/multi-select.css') }}">
<link rel="stylesheet" href="{{ asset('public/admin_assets/vendor/bootstrap-datepicker/css/bootstrap-datepicker3.min.css') }}">
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
<script src="{{ asset('public/admin_assets/vendor/bootstrap-multiselect/bootstrap-multiselect.js') }}"></script>
<script src="{{ asset('public/admin_assets/vendor/bootstrap-datepicker/js/bootstrap-datepicker.min.js') }}"></script>
<script src="{{ asset('public/admin_assets/vendor/sweetalert/sweetalert.min.js') }}"></script>
<script src="{{ asset('public/admin_assets/vendor/toastr/toastr.js') }}"></script>
@stop

@section('page-script')
<script src="{{ asset('public/admin_assets/js/pages/tables/jquery-datatable.js') }}"></script>
@stop
