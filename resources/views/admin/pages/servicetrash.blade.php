@extends("admin.admin_app")
@section('title', 'Services')

@section("content")
<div class="block-header">
    <div class="row clearfix">
        <div class="col-lg-4 col-md-12 col-sm-12">
            <h1>Service</h1>
        </div>
        <div class="col-lg-8 col-md-12 col-sm-12 text-lg-right">
           {{-- <a href="{{URL::to('admin/service/addservice')}}" class="btn btn-primary theme-bg gradient btn-round"><i class="fa fa-plus"></i> Add Service</a> --}}
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
                <h2>Service</h2>
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
                                <th>Service Image</th>
                                <th>Service Name</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tfoot>
                            <tr>
                                <th>ID</th>
                                <th>Service Image</th>
                                <th>Service Name</th>
                                <th>Action</th>
                            </tr>
                        </tfoot>
                        <tbody>
                            @foreach ($allservice_trash as $service)
                            <tr role="row" class="odd">
                                <td class="sorting_1">{{$service->id}}</td>
                                <td>@if($service->features_image!='')<img src="{{url($service->features_image)}}" width="50px">@endif</td>
                                <td>{{$service->service_name}}</td>
                                <td>
                                    <a href="{{ url('admin/service/trash/restore/'.$service->id) }}" class="btn btn-outline-warning btn-sm"><i class="fa fa-edit" title="Edit"></i> Restore</a>&nbsp;
                                    <a href="{{ url('admin/service/trash/delete/'.$service->id) }}" class="btn btn-outline-danger btn-sm property_delete"><i class="fa fa-trash"></i> Delete</a>&nbsp;
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
@stop
