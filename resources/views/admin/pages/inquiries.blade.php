@extends("admin.admin_app")
@section('title', 'General Inquires')

@section("content")

<div class="block-header">
    <div class="row clearfix">
        <div class="col-lg-4 col-md-12 col-sm-12">
            <h1>General Inquires</h1>
        </div>
        <div class="col-lg-8 col-md-12 col-sm-12 text-lg-right">

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
                <h2>General Inquires</h2>
                <ul class="header-dropdown dropdown">
                    <li><a href="javascript:void(0);" class="full-screen"><i class="fa fa-expand"></i></a></li>
                </ul>
            </div>
            <div class="body">
                <div class="table-responsive">
                    <table class="table table-hover js-basic-example dataTable table-custom spacing5">
                        <thead>
                            <tr>
                                <th>{{ __('Name') }}</th>
                                <th>{{ __('Phone') }}</th>
                                <th>{{ __('Email') }}</th>
                              	<th>{{ __('Customer') }}</th>
                                <th>{{ __('Date') }}</th>
                                <th>{{ __('Action') }}</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($allinquiry as $i => $inquiry)
                            <tr>
                                <td>{{ $inquiry->name }}</td>
                                <td>{{ $inquiry->phone }}</td>
                                <td>{{ $inquiry->email }}</td>
                              	<td>
                                    @if (getCustomerDetails($inquiry->email) == 1)
                                        <span class="badge badge-success"><i class="fa fa-check-circle pl-2 pr-2 pt-1 pb-1"></i></span>
                                    @endif
                                </td>
                                
                               <td>{{ date('M d, Y', strtotime($inquiry->created_at)) }}</td>
                                <td>
                                  @if (getCustomerDetails($inquiry->email) != 1)
                                    {{-- <a href="{{ url('admin/inquiries/assigntocustomer/'.$inquiry->id) }}" class="btn btn-outline-warning btn-sm"><i class="fa fa-user"></i> {{ __('Assign To') }}</a>&nbsp; --}}
                                    <button type="button" name="view" id="{{ $inquiry->id }}" class="btn btn-outline-warning btn-sm customer_view"><i class="fa fa-user"></i> {{ __('Assign To') }}</button>&nbsp;
                                  @endif
                                  	<a href="{{ url('admin/inquiries/delete/'.$inquiry->id) }}" class="btn btn-outline-danger btn-sm"><i class="fa fa-trash"></i> {{ __('Delete') }}</a>&nbsp;
                                    <button type="button" name="view" id="{{ $inquiry->id }}" class="btn btn-outline-info btn-sm inquiry_view"><i class="fa fa-eye"></i> {{ __('View') }}</button>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
                <div class="row">
                    <div class="col-12 mt-3">
                        {{ $allinquiry->links() }}
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>


<div class="block-header">
    <div class="row clearfix">
        <div class="col-lg-4 col-md-12 col-sm-12">
            <h1>{{ __('Inquires Logs') }}</h1>
        </div>
        <div class="col-lg-8 col-md-12 col-sm-12 text-lg-right">
        </div>
    </div>
</div>

<div class="row clearfix">
    <div class="col-lg-12 col-md-12">
        <div class="card planned_task">
            <div class="header">
                <h2>{{ __('Inquires Logs') }}</h2>
                <ul class="header-dropdown dropdown">
                    <li><a href="javascript:void(0);" class="full-screen"><i class="fa fa-expand"></i></a></li>
                </ul>
            </div>
            <div class="body">
                <div class="table-responsive">
                    <table class="table table-hover js-basic-example dataTable table-custom spacing5" id="dataTable">
                        <thead>
                            <tr>
                                <th>{{ __('Admin') }}</th>
                                <th>{{ __('Name') }}</th>
                                <th>{{ __('Phone') }}</th>
                                <th>{{ __('Email') }}</th>
                                <th>{{ __('Date') }}</th>
                                <th>{{ __('Action') }}</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($inquiry_log as $i => $data)
                            <tr>
                                <td>
                                    @if(empty($data->updated_by))@else{{ getUserInfo($data->updated_by)->name }}@endif
                                </td>
                                <td>{{ $data->name }}</td>
                                <td>{{ $data->phone }}</td>
                                <td>{{ $data->email }}</td>
                                <td>{{ date('M d, Y', strtotime($data->created_at)) }}</td>
                                <td>
                                    @if($data->is_status == "0")
                                        <span class="btn btn-warning btn-round btn-sm">{{ __('Assign To Customer') }}</span>
                                    @else
                                        <span class="btn btn-danger btn-round btn-sm">{{ __('Deleted Inquiry') }}</span>
                                    @endif
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
               {{-- <div class="row">
                    <div class="col-12 mt-3">
                        {{ $inquiry_log->links() }}
                    </div>
                </div> --}}
            </div>
        </div>
    </div>
</div>

<!-- modal for customer view form -->
<div class="modal fade" id="inquiry_view" tabindex="-1" role="dialog"
	aria-labelledby="createOrderTitle" aria-hidden="true">
	<div class="modal-dialog modal-lg" role="document">
		<div class="modal-content">
			<div class="modal-header" id="createOrderTitle">
				<div class="col text-center">
					<h3>{{ __('Inquiry Detail') }}</h3>
				</div>
				<button type="button" class="close absolute" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<div class="modal-body">
				<div class="row justify-content-center">
					<div class="col-md-10 mx-auto">
						<div class="form-group row">
							<div class="col-md-6"><label>{{ __('Name') }} : </label></div>
							<div class="col-md-6"><label id="lbl_cust_name"></label></div>
						</div>
                        <div class="form-group row">
							<div class="col-md-6"><label>{{ __('Email') }} : </label></div>
							<div class="col-md-6"><label id="lbl_cust_email"></label></div>
						</div>
                        <div class="form-group row">
							<div class="col-md-6"><label>{{ __('Phone') }} : </label></div>
							<div class="col-md-6"><label id="lbl_cust_phone"></label></div>
						</div>
                        <div class="form-group row">
							<div class="col-md-6"><label>{{ __('Date') }} : </label></div>
							<div class="col-md-6"><label id="lbl_cust_date"></label></div>
						</div>
                        <div class="form-group row">
							<div class="col-md-6"><label>{{ __('Message') }} : </label></div>
							<div class="col-md-6"><label id="lbl_cust_note"></label></div>
						</div>
					</div>
				</div>
			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-secondary" data-dismiss="modal">{{ __('Close') }}</button>
			</div>
		</div>
	</div>
</div>
<!-- modal for customer view form ends-->


<!-- modal for Featured create form -->
<div class="modal fade" id="customer_view" tabindex="-1" role="dialog" aria-labelledby="createOrderTitle" aria-hidden="true">
	<div class="modal-dialog modal-lg" role="document">
		<div class="modal-content" id="refresh">
			<div class="modal-header" id="createOrderTitle">
				<div class="col text-center">
					<h5 class="mt-4">{{ __('Assign To Customer') }}</h5>
				</div>
				<button type="button" class="close absolute reset_model" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
			{!! Form::open(array('url' => array('admin/inquiries/assigntocustomer'),'class'=>'','name'=>'assigned_form','id'=>'assigned_form','role'=>'form','enctype' => 'multipart/form-data')) !!}
				<div class="modal-body">
					<div class="row justify-content-center">
						<div class="col-md-10 mx-auto">
							<div class="row">
                                <input type="hidden" id="inquiry_id" name="inquiry_id" value="">
								<div class="form-group col-lg-6 col-md-6">
									<label>{{ __('Customer Type') }}</label>
									<select id="customer_type" name="cust_type" class="form-control">
                                        <option value="Buyers">Buyers</option>
                                        <option value="Vendors">Vendors</option>
                                        <option value="Opps">Opps</option>
                                    </select>
								</div>
                                <div class="form-group col-lg-6 col-md-6">
									<label>{{ __('Newsletters') }}</label>
									<select id="newsletters" name="newsletters" class="form-control">
                                        <option value="Yes">Yes</option>
                                        <option value="No">No</option>
                                    </select>
								</div>
							</div>
						</div>
					</div>
				</div>
				<div class="modal-footer">
					<button type="button" class="btn btn-secondary reset_model" data-dismiss="modal">{{ __('Close') }}</button>
					<input type="submit" name="action" id="action" class="btn btn-success" value="{{ __('Submit') }}" />
				</div>
            {!! Form::close() !!}
		</div>
	</div>
</div>
<!-- modal for Featured create form ends-->
@endsection

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
{{--<script src="{{ asset('public/admin_assets/js/pages/tables/jquery-datatable.js') }}"></script>--}}
<script type="text/javascript">
    // $(document).ready(function () {
    //     $('.dataTable').DataTable({
    //         destroy: true,
    //         order:[[4,"desc"]]
    //     });
    // });
</script>
<script>
    $(document).on('click', '.inquiry_view', function () {
        var id = $(this).attr("id");
        var ajax_url = "{{ url('admin/ajax/inquiries')}}/" + id;
        $.ajaxSetup({
            headers: { 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content') }
        });
        jQuery.ajax({
            url: ajax_url,
            method: 'get',
            data: {},
            success: function(result){
                $('#inquiry_view').modal('show');
                $('#lbl_cust_name').html(result.name);
                $('#lbl_cust_email').html(result.email);
                $('#lbl_cust_phone').html(result.phone);
                $('#lbl_cust_note').html(result.message);
                $('#lbl_cust_date').html(result.created_at);
            }
        });
    });
</script>
<script>
    $(document).ready(function () {
       $('#dataTable').DataTable({
            "order": [[5, "desc"]],
            "columnDefs": [
                {
                    "targets": [0], //first column / numbering column
                    "orderable": false, //set not orderable
                    "visible": false,
                },
            ]
        });
    });
</script>
<script>
    $(document).on('click', '.customer_view', function () {
        var id = $(this).attr("id");
        $('#customer_view').modal('show');
        $('#inquiry_id').val(id);
    });
</script>
@stop
