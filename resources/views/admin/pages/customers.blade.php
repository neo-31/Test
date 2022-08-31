@extends("admin.admin_app")
@section('title', 'Customers')

@section("content")
<div class="block-header">
    <div class="row clearfix">
        <div class="col-lg-4 col-md-12 col-sm-12">
            <h1>Customers</h1>
        </div>
        <div class="col-lg-8 col-md-12 col-sm-12 text-lg-right">
           <a href="{{URL::to('admin/customers/addcustomer')}}" class="btn btn-primary theme-bg gradient btn-round"><i class="fa fa-plus"></i> Add Customer</a>
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
                <h2>Customers Filter</h2>
                <ul class="header-dropdown dropdown">
                    <li><a href="javascript:void(0);" class="full-screen"><i class="fa fa-expand"></i></a></li>
                </ul>
            </div>
            <div class="body">
                <form method="GET" action="{{ route('admin.customers') }}">
                    <div class="form-group row">
                        <div class="col-lg-3">
                            <select class="selectpicker form-control" name="customer_id" id="customer_id" data-live-search="true">
                                <option value="" {{ empty($customer_id) ? 'selected' : '' }}>Please Select Customers</option>
                                @foreach($allusers as  $user)
                                    <option value="{{ $user->id }}" {{ $customer_id == $user->id ? 'selected' : '' }}>{{ $user->name }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="col-lg-3 mb-2">
                            <select id="cust_type" name="cust_type" class="selectpicker form-control" data-live-search="true">
                                <option {{ empty($cust_type) ? 'selected' : '' }} value="">{{ __('All Customers Type') }}</option>
                                <option {{ $cust_type == "Buyers" ? 'selected' : '' }} value="Buyers">Buyers</option>
                                <option {{ $cust_type == "Vendors" ? 'selected' : '' }} value="Vendors">Vendors</option>
                                <option {{ $cust_type == "Prospects" ? 'selected' : '' }} value="Prospects">Prospects</option>
                            </select>
                        </div>
                        <div class="col-lg-3 mb-2">
                            <select id="date_sort_by" name="date_sort_by" class="selectpicker form-control" data-live-search="true">
                                <option {{ $date_sort_by == "1" ? 'selected' : '' }} value="1">Newest Created</option>
                                <option {{ $date_sort_by == "2" ? 'selected' : '' }} value="2">Oldest Created</option>
                                <option {{ $date_sort_by == "3" ? 'selected' : '' }} value="3">Newest Updated</option>
                                <option {{ $date_sort_by == "4" ? 'selected' : '' }} value="4">Oldest Updated</option>
                            </select>
                        </div>
                        <div class="col-lg-3 mb-2">
                            <button type="submit" name="submit" class="btn btn-primary">Search</button>
                            <a class="btn btn-default" href="{{ URL::to('admin/customers') }}">Reset</a>
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
                <h2>Customers (Total customers = {{ $total_number_of_customer }})</h2>
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
                                <th>Name</th>
                                <th>Email ID</th>
                                <th>Customer Type</th>
                                <th>Added Date</th>
                                <th>Updated Date</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($user_data as $users)
                            <tr role="row" class="odd">
                                <td class="sorting_1">{{$users->id}}</td>
                                <td>{{$users->name}}</td>
                                <td>{{$users->email}}</td>
                                <td>{{$users->cust_type}}</td>
                                <td>{{ date('M d, Y', strtotime($users->created_at)) }}</td>
                                <td>{{ date('M d, Y', strtotime($users->updated_at)) }}</td>
                                <td>
                                    <a href="{{ url('admin/customers/addcustomer/'.$users->id) }}" class="btn btn-outline-warning btn-sm"><i class="fa fa-edit" title="Edit"></i> {{ __('Edit') }}</a>&nbsp;
                                    <button type="button" name="view" id="{{ $users->id }}" class="btn btn-outline-secondary btn-sm customer_view"><i class="fa fa-eye" title="view"></i> {{ __('View') }}</button>
                                    {{-- <a href="{{ url('admin/customers/view-customer/'.$users->id) }}" class="btn btn-outline-secondary btn-sm"><i class="fa fa-edit" title="view"></i> View</a>&nbsp; --}}
                                    <a href="{{ url('admin/orders?user_id='.$users->id) }}" class="btn btn-outline-info btn-sm"><i class="fa fa-eye" title="view"></i> View Orders</a>&nbsp;
                                    <!-- <a href="{{ url('admin/orders?user_id='.$users->id) }}" class="btn btn-outline-info btn-sm"><i class="fa fa-eye" title="view"></i> View Orders</a>&nbsp; -->
                                    <!-- <a href="#" class="btn btn-outline-danger btn-sm property_delete"><i class="fa fa-trash"></i> Delete</a>&nbsp; -->
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
                <div class="row">
                    <div class="col-12 mt-3">
                        {{ $user_data->appends(['customer_id' => $customer_id, 'cust_type' => $cust_type,'date_sort_by' => $date_sort_by])->links() }}
                    </div>
                </div>
            </div>
        </div>
    </div>


<!-- modal for customer view form -->
<div class="modal fade" id="customer_view" tabindex="-1" role="dialog" aria-labelledby="createOrderTitle" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header" id="createOrderTitle">
                <div class="col text-center">
                    <h3>{{ __('Customer') }} : <span id="main_cust_name"></span></h3>
                </div>
                <button type="button" class="close absolute" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="row justify-content-center">
                    <div class="col-md-10 mx-auto">
                        <ul class="nav nav-tabs">
                            <li class="nav-item"><a class="nav-link active show" data-toggle="tab" href="#CustomerDetails"><i class="fa fa-user"></i>  {{ __('Customer Details') }}</a></li>
                            <li class="nav-item"><a class="nav-link" data-toggle="tab" href="#Address"><i class="fa fa-home"></i> {{ __('Address') }}</a></li>
                            <li class="nav-item"><a class="nav-link" data-toggle="tab" href="#BusinessDetails"><i class="fa fa-file"></i> {{ __('Business Details') }}</a></li>
                            <li class="nav-item"><a class="nav-link" data-toggle="tab" href="#Notification"><i class="fa fa-vcard"></i> {{ __('Notification') }}</a></li>
                        </ul>
                        <div class="tab-content">
                            <div class="tab-pane show active" id="CustomerDetails">
                                <div class="form-group row">
                                    <div class="col-md-6"><label>{{ __('Customer Type') }} : </label></div>
                                    <div class="col-md-6"><label id="lbl_cust_type"></label></div>
                                </div>
                                <div class="form-group row">
                                    <div class="col-md-6"><label>{{ __('Lead Source') }} : </label></div>
                                    <div class="col-md-6"><label id="lbl_lead_source"></label></div>
                                </div>
                                <div class="form-group row">
                                    <div class="col-md-6"><label>{{ __('Lead Interest') }} : </label></div>
                                    <div class="col-md-6"><label id="lbl_lead_interest"></label></div>
                                </div>
                                <div class="form-group row">
                                    <div class="col-md-6"><label>{{ __('Name') }} : </label></div>
                                    <div class="col-md-6"><label id="lbl_cust_name"></label></div>
                                </div>
                                <div class="form-group row">
                                    <div class="col-md-6"><label>{{ __('Email') }} 1 : </label></div>
                                    <div class="col-md-6"><label id="lbl_cust_email1"></label></div>
                                </div>
                                <div class="form-group row">
                                    <div class="col-md-6"><label>{{ __('Email') }} 2 : </label></div>
                                    <div class="col-md-6"><label id="lbl_cust_email_2"></label></div>
                                </div>
                                <div class="form-group row">
                                    <div class="col-md-6"><label>{{ __('Home Telephone') }} : </label></div>
                                    <div class="col-md-6"><label id="lbl_cust_phone"></label></div>
                                </div>
                                <div class="form-group row">
                                    <div class="col-md-6"><label>{{ __('Mobile Telephone') }} : </label></div>
                                    <div class="col-md-6"><label id="lbl_cust_phone_2"></label></div>
                                </div>
                                <div class="form-group row">
                                    <div class="col-md-6"><label>{{ __('Notes') }}: </label></div>
                                    <div class="col-md-6"><label id="lbl_cust_note"></label></div>
                                </div>
                            </div>
                            <div class="tab-pane" id="Address">
                                <div class="form-group row">
                                    <div class="col-md-6"><label>{{ __('Shipping Address') }} : </label></div>
                                    <div class="col-md-6"><label id="lbl_cust_shipping_address"></label></div>
                                </div>
                                <div class="form-group row">
                                    <div class="col-md-6"><label>{{ __('Delivery Address') }} : </label></div>
                                    <div class="col-md-6"><label id="lbl_cust_delivery_address"></label></div>
                                </div>
                                <div class="form-group row">
                                    <div class="col-md-6"><label>{{ __('Postal Code') }} : </label></div>
                                    <div class="col-md-6"><label id="lbl_cust_postal_code"></label></div>
                                </div>
                                <div class="form-group row">
                                    <div class="col-md-6"><label>{{ __('Country') }} : </label></div>
                                    <div class="col-md-6"><label id="lbl_cust_country"></label></div>
                                </div>
                            </div>
                            <div class="tab-pane" id="BusinessDetails">
                                <div class="form-group row">
                                    <div class="col-md-6"><label>{{ __('Business Name') }}: </label></div>
                                    <div class="col-md-6"><label id="lbl_cust_business_name"></label></div>
                                </div>
                                <div class="form-group row">
                                    <div class="col-md-6"><label>{{ __('Website') }}: </label></div>
                                    <div class="col-md-6"><label id="lbl_cust_website"></label></div>
                                </div>
                                <div class="form-group row">
                                    <div class="col-md-6"><label>{{ __('Company Linkedin') }}: </label></div>
                                    <div class="col-md-6"><label id="lbl_cust_company_linkedin"></label></div>
                                </div>
                                <div class="form-group row">
                                    <div class="col-md-6"><label>{{ __('User Linkedin') }}: </label></div>
                                    <div class="col-md-6"><label id="lbl_cust_linkedin_profile"></label></div>
                                </div>
                                <div class="form-group row">
                                    <div class="col-md-6"><label>{{ __('Facebook Page Link') }}: </label></div>
                                    <div class="col-md-6"><label id="lbl_cust_facebook_page"></label></div>
                                </div>
                            </div>
                            <div class="tab-pane" id="Notification">
                                <div class="form-group row">
                                    <div class="col-md-6"><label>{{ __('Newsletters') }} : </label></div>
                                    <div class="col-md-6"><label id="lbl_cust_newsletters"></label></div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <input type="hidden" name="customer_id" id="customer_id" value="">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">{{ __('Close') }}</button>
            </div>
        </div>
    </div>
</div>
<!-- modal for customer view form ends-->

</div>@endsection

@section('page-styles')
<link rel="stylesheet" href="{{ asset('public/admin_assets/vendor/jquery-datatable/dataTables.bootstrap4.min.css') }}">
<link rel="stylesheet" href="{{ asset('public/admin_assets/vendor/jquery-datatable/fixedeader/dataTables.fixedcolumns.bootstrap4.min.css') }}">
<link rel="stylesheet" href="{{ asset('public/admin_assets/vendor/jquery-datatable/fixedeader/dataTables.fixedheader.bootstrap4.min.css') }}">
<link rel="stylesheet" href="{{ asset('public/admin_assets/vendor/sweetalert/sweetalert.css') }}">
<link rel="stylesheet" href="{{ asset('public/admin_assets/vendor/toastr/toastr.min.css') }}">
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-select@1.13.14/dist/css/bootstrap-select.min.css">
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
<script src="https://cdn.jsdelivr.net/npm/bootstrap-select@1.13.14/dist/js/bootstrap-select.min.js"></script>
@stop

@section('page-script')
{{-- <script src="{{ asset('public/admin_assets/js/pages/tables/jquery-datatable.js') }}"></script> --}}

<script>
     $(document).on('click', '.customer_view', function () {
        var id = $(this).attr("id");
        var ajax_url = "{{ url('admin/ajax/customers')}}/" + id;
        $.ajaxSetup({
            headers: { 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content') }
        });
        jQuery.ajax({
            url: ajax_url,
            method: 'get',
            data: {},
            success: function(result){
                $('#customer_view').modal('show');
                $('#main_cust_name').html(result.name);
                $('#lbl_cust_type').html(result.cust_type);
                $('#lbl_lead_source').html(result.lead_source);
                $('#lbl_lead_interest').html(result.lead_interest);
                $('#lbl_cust_name').html(result.name);
                $('#lbl_cust_email1').html(result.email);
                $('#lbl_cust_email_2').html(result.email_2);
                $('#lbl_cust_phone').html(result.phone);
                $('#lbl_cust_phone_2').html(result.phone_2);
                $('#lbl_cust_note').html(result.cust_note);
                $('#lbl_cust_shipping_address').html(result.shipping_address);
                $('#lbl_cust_delivery_address').html(result.delivery_address);
                $('#lbl_cust_country').html(result.country);
                $('#lbl_cust_business_name').html(result.business_name);
                $('#lbl_cust_website').html(result.website);
                $('#lbl_cust_company_linkedin').html(result.company_linkedin);
                $('#lbl_cust_linkedin_profile').html(result.linkedin_profile);
                $('#lbl_cust_facebook_page').html(result.facebook_page);
                $('#lbl_cust_newsletters').html(result.newsletters);
            }
        });
    });
</script>
@stop
