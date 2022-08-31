@extends("admin.admin_app")
@section('title', 'Custom Email Send')

@section("content")

<div class="block-header">
    <div class="row clearfix">
        <div class="col-lg-4 col-md-12 col-sm-12">
            <h1>{{ __('Custom Email Send') }}</h1>
            <!-- <span>JustDo Page Blank,</span> -->
        </div>
        <div class="col-lg-8 col-md-12 col-sm-12 text-lg-right">
            <a href="{{URL::to('admin/custom/send/email/create')}}" class="btn btn-primary theme-bg gradient btn-round"><i class="fa fa-plus"></i> {{ __('Create Custom Email Send') }}</a>
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
                {{-- <h2>{{ __('backend.applicant.applicants') }}</h2> --}}
                <ul class="header-dropdown dropdown">
                    <li><a href="javascript:void(0);" class="full-screen">
                        <i class="fa fa-expand"></i></a>
                    </li>
                </ul>
            </div>
            <div class="body">
                <div class="table-responsive">
                    <table class="table table-hover js-basic-example dataTable table-custom spacing5">
                        <thead>
                            <tr>
                                <th>Name</th>
                                <th>Date</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($custom_email_list as $i => $custom)
                            <tr>
                                <td>{{ $custom->subject }}</td>
                                <td>{{ date('M d, Y', strtotime($custom->created_at)) }}</td>
                                <td>
                                    <button type="button" name="view" id="{{ $custom->id }}" class="btn btn-outline-info btn-sm custom_email_view"><i class="fa fa-print"></i></button>
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

<!-- modal for Custom Send email view form -->
<div class="modal fade" id="custom_email_view" tabindex="-1" role="dialog"
	aria-labelledby="createOrderTitle" aria-hidden="true">
	<div class="modal-dialog modal-lg" role="document">
		<div class="modal-content">
			<div class="modal-header" id="createOrderTitle">
				<div class="col text-center">
					<h3>Custom Send Email View</h3>
				</div>
				<button type="button" class="close absolute" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<div class="modal-body">
                <div class="row">
                    <div class="col-lg-12 col-md-12 mt-2">
                        <div class="text-left mb-3">
                            <img src="{{ asset('public/email_signature/logo.png') }}" alt="">
                        </div>
                    </div>
                    <div class="col-lg-12 col-md-12 mt-2">
                        <div class="text-left mb-3">
                            <span id="custom_name"></span>,
                        </div>
                        <div class="text-left mb-3">
                            <p id="custom_desc"></p>
                        </div>
                    </div>
                </div>
			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
			</div>
		</div>
	</div>
</div>
<!-- modal for Custom Send email view form ends-->

@endsection

@section('page-styles')
<link rel="stylesheet" href="{{ asset('public/admin_assets/vendor/jquery-datatable/dataTables.bootstrap4.min.css') }}">
<link rel="stylesheet" href="{{ asset('public/admin_assets/vendor/jquery-datatable/fixedeader/dataTables.fixedcolumns.bootstrap4.min.css') }}">
<link rel="stylesheet" href="{{ asset('public/admin_assets/vendor/jquery-datatable/fixedeader/dataTables.fixedheader.bootstrap4.min.css') }}">
<style>
    #custom_desc img{
        width: 100% !important;
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
@stop

@section('page-script')
<script src="{{ asset('public/admin_assets/js/pages/tables/jquery-datatable.js') }}"></script>

<script>
    $(document).on('click', '.custom_email_view', function () {
        var id = $(this).attr("id");
        var ajax_url = "{{ url('admin/ajax/custom_send_email')}}/" + id;
        $.ajaxSetup({
            headers: { 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content') }
        });
        jQuery.ajax({
            url: ajax_url,
            method: 'get',
            data: {},
            success: function(result){
                $('#custom_email_view').modal('show');
                $('#custom_name').html(result.custom_email.subject);
                $('#custom_desc').html(result.custom_email.email_content);
            }
        });
    });
</script>

@stop
