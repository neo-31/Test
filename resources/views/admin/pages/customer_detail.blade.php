@extends("admin.admin_app")
@section('title', 'Customer Detail')

@section("content")
<div class="block-header">
    <div class="row clearfix">
        <div class="col-lg-4 col-md-12 col-sm-12">
            <h1>Cutomer Detail</h1>
            <!-- <span>JustDo Page Blank,</span> -->
        </div>
        <div class="col-lg-8 col-md-12 col-sm-12 text-lg-right">
            <a href="{{URL::to('admin/customers')}}" class="btn btn-primary theme-bg gradient btn-round"><i class="fa fa-sign-out"></i> Back</a>
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
                <h2 class="text-">Customer ID: {{$user_data->id}}</h2>
                <ul class="header-dropdown dropdown">
                    <li><a href="javascript:void(0);" class="full-screen"><i class="fa fa-expand"></i></a></li>

                </ul>
            </div>
            <div class="body">
                <div class="row clearfix">
                    <div class="col-md-12 mb-2 text-center">
                    @if ($user_data->firstname != 'default.png')
                        @if ($user_data->image_icon != 'default.png')
                            <img src="{{ url($user_data->image_icon) }}" width="140px" style="border-radius: 50%;" >
                        @else
                            <img src="{{ asset('public/images/default.png') }}" width="140px" style="border-radius: 50%;" >
                        @endif

                    @endif
                    </div>
                    <div class="col-md-6 mb-2 row">
                        <div class="col-md-4"><b>First Name:</b></div>
                        <div class="col-md-8">{{$user_data->firstname}}<br></div>
                    </div>
                    <div class="col-md-6 mb-2 row">
                        <div class="col-md-4"><b>Last Name:</b></div>
                        <div class="col-md-8">{{$user_data->lastname}}<br></div>
                    </div>
                    <div class="col-md-6 mb-2 row">
                        <div class="col-md-4"><b>Email:</b></div>
                        <div class="col-md-8">{{$user_data->email}}<br></div>
                    </div>
                    <div class="col-md-6 mb-2 row">
                        <div class="col-md-4"><b>Email 2:</b></div>
                        <div class="col-md-8">{{$user_data->email_2}}<br></div>
                    </div>
                    <div class="col-md-6 mb-2 row">
                        <div class="col-md-4"><b>Telephone:</b></div>
                        <div class="col-md-8">{{$user_data->phone}}<br></div>
                    </div>
                    <div class="col-md-6 mb-2 row">
                        <div class="col-md-4"><b>Telephone 2:</b></div>
                        <div class="col-md-8">{{$user_data->phone_2}}<br></div>
                    </div>

                    <div class="col-md-6 mb-2 row">
                        <div class="col-md-4"><b>Shipping Address:</b></div>
                        <div class="col-md-8">
                                {{$user_data->shipping_address}}
                        </div>
                    </div>
                    <div class="col-md-6 mb-2 row">
                        <div class="col-md-4"><b>Delivery Address:</b></div>
                        <div class="col-md-8">
                                {{$user_data->delivery_address}}
                        </div>
                    </div>
                    <div class="col-md-6 mb-2 row">
                        <div class="col-md-4"><b>Postal Code:</b></div>
                        <div class="col-md-8">{{$user_data->postal_code}}<br></div>
                    </div>
                    <div class="col-md-6 mb-2 row">
                        <div class="col-md-2"><b>Country:</b></div>
                        <div class="col-md-9">{{$user_data->country}}<br></div>
                    </div>

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
