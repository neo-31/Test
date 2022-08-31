@extends("admin.admin_app")
@section('title', 'Lead')

@section("content")
<div class="block-header">
    <div class="row clearfix">
        <div class="col-lg-4 col-md-12 col-sm-12">
            <h1>Lead</h1>
        </div>
        <div class="col-lg-8 col-md-12 col-sm-12 text-lg-right">
           <a href="{{URL('admin/addlead-applications')}}" class="btn btn-primary theme-bg gradient btn-round"><i class="fa fa-plus"></i> Add Lead</a>
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
                <h2>Lead</h2>
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
                                <th>Business Name</th>
                                <th>Interest</th>
                                <th>Status</th>
                                <th>Date</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tfoot>
                            <tr>
                                <th>ID</th>
                                <th>Name</th>
                                <th>Business Name</th>
                                <th>Interest</th>
                                <th>Status</th>
                                <th>Date</th>
                                <th>Action</th>
                            </tr>
                        </tfoot>
                        <tbody>
                        @foreach($alllead as $i => $lead)
                            <tr role="row" class="odd">
                                <td>{{ $lead->id }}</td>
                                <td>{{ $lead->contact_name }}</td>
                                <td>{{ $lead->business_name }}</td>
                                <td>{{ $lead->interest }}</td>
                                <td>{{ $lead->lead_status }}</td>
                                <td>{{date("d-m-Y", strtotime($lead->created_at))}}</td>
                                <td>
                                    <a href="{{url('admin/editlead-applications',$lead->id)}}" class="btn btn-outline-warning btn-sm"><i class="fa fa-edit" title="Edit"></i> Edit</a>&nbsp;
                                    <a href="{{url('admin/deletelead-applications',$lead->id)}}" class="btn btn-outline-danger btn-sm property_delete"><i class="fa fa-trash"></i> Delete</a>&nbsp;
                                    <a href="" id="{{$lead->id}}" data-toggle="modal" data-target="#lead_applications"  class="btn btn-outline-secondary btn-sm lead_application_view"><i class="fa fa-eye" title="view"></i> View</a>&nbsp;
                                    <!--<a href="" id="{{$lead->id}}" data-toggle="modal" data-target="#modal_2"  class="btn btn-outline-info btn-sm lead_response"><i class="fa fa-bars" title="view"></i> Response</a>&nbsp;-->
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

<!-- modal -->
<div class="modal fade" id="lead_applications" tabindex="-1" role="dialog" aria-labelledby="createOrderTitle" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header" id="createOrderTitle">
                <div class="col text-center">
                    <h3>Lead Details</h3>
                </div>
                <button type="button" class="close absolute" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="row justify-content-center">
                    <div class="col-md-12 mx-auto">
                        <div class="tab-content">
                            <div class="tab-pane show active" id="CustomerDetails">
                                <div class="form-group row">
                                    <div class="col-md-6"><label><b>{{ __('Contact Name') }} :</b> </label></div>
                                    <div class="col-md-6"><label id="contact_name"></label></div>
                                </div>
                                <div class="form-group row">
                                    <div class="col-md-6"><label><b>{{ __('Email') }} :</b> </label></div>
                                    <div class="col-md-6"><label id="email"></label></div>
                                </div>
                                <div class="form-group row">
                                    <div class="col-md-6"><label><b>{{ __('Telephone') }} :</b> </label></div>
                                    <div class="col-md-6"><label id="telephone"></label></div>
                                </div>
                                <div class="form-group row">
                                    <div class="col-md-6"><label><b>{{ __('Website') }} :</b> </label></div>
                                    <div class="col-md-6"><label id="website"></label></div>
                                </div>
                                <div class="form-group row">
                                    <div class="col-md-6"><label><b>{{ __('Employee Size') }} :</b> </label></div>
                                    <div class="col-md-6"><label id="employee_size"></label></div>
                                </div>
                                <div class="form-group row">
                                    <div class="col-md-6"><label><b>{{ __('LinkedIn Company') }} :</b> </label></div>
                                    <div class="col-md-6"><label id="linkedIn_company"></label></div>
                                </div>
                                <div class="form-group row">
                                    <div class="col-md-6"><label><b>{{ __('Source') }} :</b> </label></div>
                                    <div class="col-md-6"><label id="source"></label></div>
                                </div>
                                <div class="form-group row">
                                    <div class="col-md-6"><label><b>{{ __('Lead status') }} :</b> </label></div>
                                    <div class="col-md-6"><label id="lead_status"></label></div>
                                </div>
                                <div class="form-group row">
                                    <div class="col-md-6"><label><b>{{ __('Business Name') }} :</b> </label></div>
                                    <div class="col-md-6"><label id="business_name"></label></div>
                                </div>
                                <div class="form-group row">
                                    <div class="col-md-6"><label><b>{{ __('Inquiry Notes') }} :</b> </label></div>
                                    <div class="col-md-6"><label id="comments"></label></div>
                                </div>
                                <form action="{{url('admin/update-response')}}" method="POST">
                                @csrf
                                    <div class="form-group row">
                                        <div class="col-md-6">
                                            <label> <b>Do you want to make an offer on this?</b> </label>
                                            <input type="hidden" id="id" name="id" value="" required>
                                            <select name="interest" id="interest" class="form-control">
                                                <option value="Not Updated"> No Answer </option>
                                                <option value="Wanted">Yes </option>
                                                <option value="Not-Wanted">No </option>
                                            </select>
                                        </div> 
                                        <div class="col-md-6">
                                            <label> <b>Would you like to subscribe this customer</b> </label>
                                            <select name="subscribe" id="subscribe" class="form-control">
                                                <option value="Not updated">Not updated</option>
                                                <option value="Yes">Yes</option>
                                                <option value="No">No</option>
                                                
                                            </select>
                                        </div> 
                                    </div>
                                     <div class="form-group row">
                                         <div class="col-md-12 text-center">
                                            <button type="submit" class="btn btn-primary theme-bg">Update</button>
                                        </div> 
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-12">
                        <div class="tab-content">
                            <form action="{{url('admin/lead-notes')}}" method="post">
                                @csrf
                                <div class="tab-pane show active">
                                    <input type="hidden" name="lead_id" id="lead_id" value="">
                                    <div class="form-group">
                                        <label><b>Notes</b></label>
                                        <textarea name="lead_note" rows="4" cols="50" class="form-control"></textarea>
                                    </div>
                                    <div class="form-group row">
                                        <div class="col-md-12 text-center">
                                            <button type="submit" class="btn btn-primary theme-bg">Create</button>
                                        </div> 
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                    <div class="col-md-12">
                        <div class="scrum-body">
                            <div class="scrum-board done" style="flex: 1;padding: 0 20px;">
                                <div class="scrum-board-column" id="lead_notes_add">
                                    <div class="scrum-task overflow">
                                        <div class="st-description">test one</div>
                                        <div class="d-flex justify-content-between align-items-center">
                                            <div class="st-date">Due 45/78/7888</div>
                                            <div class="st-assignee" style="text-align: right;">
                                                Create By : Test
                                            </div>
                                        </div>
                                    </div>
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
<!-- modal ends-->

<!-- modal -->
<!--<div class="modal fade" id="modal_2" tabindex="-1" role="dialog" aria-labelledby="createOrderTitle" aria-hidden="true">-->
<!--    <div class="modal-dialog modal-lg" role="document">-->
<!--        <div class="modal-content">-->
<!--            <div class="modal-header" id="createOrderTitle">-->
<!--                <div class="col text-center">-->
<!--                    <h3>Lead Applications Details</h3>-->
<!--                </div>-->
<!--                <button type="button" class="close absolute" data-dismiss="modal" aria-label="Close">-->
<!--                    <span aria-hidden="true">&times;</span>-->
<!--                </button>-->
<!--            </div>-->
           
<!--                <div class="modal-body">-->
<!--                    <div class="row justify-content-center">-->
<!--                        <div class="col-md-10 mx-auto">-->
<!--                            <div class="tab-content">-->
<!--                                <div class="tab-pane show active" id="CustomerDetails">-->
<!--                                     <form action="{{url('admin/update-response')}}" method="POST">-->
<!--                                    @csrf-->
<!--                                    <div class="form-group row">-->
<!--                                        <div class="col-md-6">-->
<!--                                            <label> <b>Do you want to make an offer on this?</b> </label>-->
<!--                                            <input type="hidden" id="id" name="id" value="" required>-->
<!--                                            <select name="interest" id="interest" class="form-control">-->
<!--                                                <option value="Not Updated"> No Answer </option>-->
<!--                                                <option value="Wanted">Yes </option>-->
<!--                                                <option value="Not-Wanted">No </option>-->
<!--                                            </select>-->
<!--                                        </div> -->
<!--                                        <div class="col-md-6">-->
<!--                                            <label> <b>Would you like to subscribe this customer</b> </label>-->
<!--                                            <select name="subscribe" id="subscribe" class="form-control">-->
<!--                                                <option value="Yes">Yes</option>-->
<!--                                                <option value="No">No</option>-->
<!--                                                <option value="Not updated">Not updated</option>-->
<!--                                            </select>-->
<!--                                        </div> -->
<!--                                    </div>-->
                                    <!--<div class="form-group row">-->
                                    <!--    <div class="col-md-12"><label><b>{{ __('Comments') }} : </b></label></div>-->
                                    <!--    <div class="col-md-12"><label id="comments_response"></label></div>-->
                                    <!--</div>-->
<!--                                </div>-->
<!--                            </div>-->
<!--                        </div>-->
<!--                    </div>-->
<!--                </div>-->
<!--                <div class="modal-footer">-->
<!--                    <button type="submit" class="btn btn-primary theme-bg">Update</button>-->
<!--                    <input type="hidden" name="customer_id" id="customer_id" value="">-->
<!--                    <button type="button" class="btn btn-secondary" data-dismiss="modal">{{ __('Close') }}</button>-->
<!--                </div>-->
<!--            </form>-->
<!--        </div>-->
<!--    </div>-->
<!--</div>-->
<!-- modal ends-->
@endsection

@section('page-styles')
<link rel="stylesheet" href="{{ asset('public/admin_assets/vendor/jquery-datatable/dataTables.bootstrap4.min.css') }}">
<link rel="stylesheet" href="{{ asset('public/admin_assets/vendor/jquery-datatable/fixedeader/dataTables.fixedcolumns.bootstrap4.min.css') }}">
<link rel="stylesheet" href="{{ asset('public/admin_assets/vendor/jquery-datatable/fixedeader/dataTables.fixedheader.bootstrap4.min.css') }}">
<link rel="stylesheet" href="{{ asset('public/admin_assets/vendor/sweetalert/sweetalert.css') }}">
<link rel="stylesheet" href="{{ asset('public/admin_assets/vendor/toastr/toastr.min.css') }}">

<style>
@media only screen and (min-device-width: 360px) and (max-device-width: 740px){
    .block-header{
            margin-top: 85px !important;
    }
}
</style>
<style>
    /* notes */
    .scrum-body{display:flex;flex-direction:row;}
 .scrum-bod .scrum-board{ flex: 1 !important; padding: 0 20px !important;}
 .scrum-body .scrum-board-column{margin-top:15px;min-height:200px;height:100%;}
 .scrum-body .scrum-board.done .scrum-task{border-left-color: #b3a76f;}
 .scrum-body .scrum-task{   
     background-color: #ffffff;
     border: 1px solid #eeeeee;
     border-left: 2px solid #b3a76f);
     position: relative;
     display: block;
     margin-bottom: 10px;
     padding: 10px;
     cursor: all-scroll;
 }
 .scrum-body .st-description:not(:empty){margin-top:10px;margin-bottom:15px;}  
 .scrum-body .st-date:not(:empty){color:var(--font-777);display:inline-block;font-size:12px}  
 .scrum-body .st-assignee:not(:empty){text-align:right;}              
 .add_notes { background-color:#b3a76f; }
 /* notes */
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

<script>
    $(document).on('click', '.lead_application_view', function () {

       var id = $(this).attr("id");
       $('#lead_id').val(id);
       var ajax_url = "{{ url('admin/ajax/lead-applications')}}/" + id;
       $.ajaxSetup({
           headers: { 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content') }
       });
       jQuery.ajax({
           url: ajax_url,
           method: 'get',
           data: {},
           success: function(result){
             //alert(result.lead.contact_name);
            //    $('#lead_applications').modal('show');
               $('#contact_name').html(result.lead.contact_name);
               $('#email').html(result.lead.email);
               $('#telephone').html(result.lead.telephone);
               $('#website').html(result.lead.website);
               $('#employee_size').html(result.lead.employee_size);
               $('#linkedIn_company').html(result.lead.linkedIn_company);
               $('#source').html(result.lead.source);
               $('#lead_status').html(result.lead.lead_status);
               $('#business_name').html(result.lead.business_name);
               $('#comments').html(result.lead.comments);
               $('#interest').val(result.lead.interest);
               $('#id').val(result.lead.id);
            //   $('#subscribe').val(result.lead.subscribe);
         
             if(result.lead.subscribe ==  null)
                {
                    // alert(result.lead.subscribe);
                        $('#subscribe').val('1');
                }
                else
                {
                    // alert(result.lead.subscribe);
                        $('#subscribe').val(result.lead.subscribe);
                }
                $('#lead_notes_add').html(null);
                $.each(JSON.parse(result.lead_notes), function(key, value) {
                    
                     // alert(result.lead_notes);
                        var lead_notes_add='<div class="scrum-task overflow">'
                                                +'<div class="st-description">'+value.lead_note+'</div>'
                                                    +'<div class="d-flex justify-content-between align-items-center">'
                                                        +'<div class="st-date">Due '+value.updated_at+'</div>'
                                                        +'<div class="st-assignee" id="created_by_'+value.id+'" style="text-align: right;">Create By : '+value.created_by+' </div>'   
                                                    +'</div>'
                                            '</div>';
                        $('#lead_notes_add').append(lead_notes_add);
                        
                });
                $.each(result.created_by_info, function(index) {
                        //$('#due_'+result.created_by_info[index].id).html("Due : " + date('d/m/yy', strtotime(result.created_by_info[index].updated_at)) );
                        // $('#due_'+result.created_by_info[index].id).html("Due : " + date('d/m/yy', strtotime(result.created_by_info[index].updated_at)) );

                        $('#created_by_'+result.created_by_info[index].id).html("Created By : " +result.created_by_info[index].created_by );
                });
           }
       });
   });
</script>

{{-- <script>
    $(document).on('click', '.lead_response', function () {
       var id = $(this).attr("id");
       $('#id').val(id);
   });
</script> --}}

<!--<script>-->
<!--    $(document).on('click', '.lead_response', function () {-->
<!--       var id = $(this).attr("id");-->
<!--       var ajax_url = "{{ url('admin/ajax/lead-applications')}}/" + id;-->
<!--       $.ajaxSetup({-->
<!--           headers: { 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content') }-->
<!--       });-->
<!--       jQuery.ajax({-->
<!--           url: ajax_url,-->
<!--           method: 'get',-->
<!--           data: {},-->
<!--           success: function(result){-->
<!--               $('#interest').val(result.interest);-->
<!--               $('#id').val(result.id);-->
<!--               $('#subscribe').val(result.subscribe);-->
<!--               $('#comments_response').html(result.comments);-->
<!--           }-->
<!--       });-->
<!--   });-->
<!--</script>-->

@stop 
