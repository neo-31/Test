@extends("admin.admin_app")
@section('title', 'Shipping Charges')

@section("content")

<div class="block-header">
    <div class="row clearfix">
        <div class="col-lg-4 col-md-12 col-sm-12">
            <h1>Shipping Charges</h1>
        </div>
        <div class="col-lg-8 col-md-12 col-sm-12 text-lg-right">
           <a href="{{URL::to('admin/shipping-charges/add-shipping-charges')}}" class="btn btn-primary theme-bg gradient btn-round"><i class="fa fa-plus"></i> Add Shipping Charges</a>
        </div>
    </div>
    @if(Session::has('flash_message'))
    <div class="row mt-3">
        <div class="col-lg-12 col-md-12 col-sm-12">
            <div class="alert alert-success">
                <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                {{ Session::get('flash_message') }}
            </div>
        </div>
    </div>
    @endif
</div>


<div class="row clearfix">
    <div class="col-lg-12 col-md-12">
        <div class="card planned_task">
            <div class="header">
                <h2>Shipping Charges</h2>
                <ul class="header-dropdown dropdown">
                    <li><a href="javascript:void(0);" class="full-screen"><i class="fa fa-expand"></i></a></li>
                </ul>
            </div>
            <div class="body">
                <div class="table-responsive">
                    <table class="table table-hover js-basic-example dataTable table-custom spacing5">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Country Type</th>
                                <th>Country</th>
                                <th>State</th>
                                <th>Shipping Rate 10KG Under</th>
                                <th>Shipping Rate 10KG Over</th>
                                <th>Parcel Type</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($allshippingcharges as $i => $shippingcharge)
                            <tr>

                                <td>{{ $shippingcharge->id }}</td>
                                <td>
                                    @php
                                        $country_type = "";

                                        if ($shippingcharge->country_type == 1) {
                                            $country_type = "In UK";
                                        }
                                        elseif ($shippingcharge->country_type == 2) {
                                            $country_type = "Rest of World";
                                        }

                                    @endphp
                                    {{ $country_type }}
                                </td>
                                <td>{{ $shippingcharge->country_name }}</td>
                                <td>
                                    @php
                                        $state_name = "";
                                        foreach ($allstates as $state){
                                            if ($state->id == $shippingcharge->state_id) {
                                                $state_name = $state->state_name;
                                            }
                                        }
                                    @endphp
                                    {{ $state_name }}
                                </td>
                                <td>{{ $shippingcharge->shipping_rate_under }}</td>
                                <td>{{ $shippingcharge->shipping_rate_over }}</td>
                                <td>
                                    @php
                                        $parcel_type = "";

                                        if ($shippingcharge->parcel_type == 1) {
                                            $parcel_type = "Small Parcel";
                                        }
                                        elseif ($shippingcharge->parcel_type == 2) {
                                            $parcel_type = "Large Parcel";
                                        }

                                    @endphp
                                    {{ $parcel_type }}
                                </td>
                                <td>
                                    <a href="{{ url('admin/shipping-charges/add-shipping-charges/'.$shippingcharge->id) }}" class="btn btn-outline-warning btn-sm"><i class="fa fa-edit" title="Edit"></i> Edit</a>&nbsp;
                                    <a href="{{ url('admin/shipping-charges/delete/'.$shippingcharge->id) }}" class="btn btn-outline-danger btn-sm property_delete"><i class="fa fa-trash" title="Delete"></i> </a>&nbsp;
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@section('page-styles')
<link rel="stylesheet" href="{{ asset('public/admin_assets/vendor/jquery-datatable/dataTables.bootstrap4.min.css') }}">
<link rel="stylesheet" href="{{ asset('public/admin_assets/vendor/jquery-datatable/fixedeader/dataTables.fixedcolumns.bootstrap4.min.css') }}">
<link rel="stylesheet" href="{{ asset('public/admin_assets/vendor/jquery-datatable/fixedeader/dataTables.fixedheader.bootstrap4.min.css') }}">
<link rel="stylesheet" href="{{ asset('public/admin_assets/vendor/sweetalert/sweetalert.css') }}">
<link rel="stylesheet" href="{{ asset('public/admin_assets/vendor/toastr/toastr.min.css') }}">
<style>
    table.dataTable thead>tr>th.sorting_asc, table.dataTable thead>tr>th.sorting_desc,
    table.dataTable thead>tr>th.sorting, table.dataTable thead>tr>td.sorting_asc,
    table.dataTable thead>tr>td.sorting_desc, table.dataTable thead>tr>td.sorting {
        white-space: break-spaces;
    }
</style>
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
@stop
