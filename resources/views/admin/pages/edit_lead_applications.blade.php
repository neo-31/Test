@extends("admin.admin_app")
@section('title', 'Edit Lead')

@section("content")

<div class="block-header">
    <div class="row clearfix">
        <div class="col-xl-5 col-md-5 col-sm-12">
            <h1>Edit Lead</h1>
            <span></span>
        </div>
        <div class="col-xl-7 col-md-7 col-sm-12 text-md-right">
            <a href="{{url('admin/lead-applications')}}" class="btn btn-primary theme-bg gradient btn-round"><i class="fa fa-sign-out"></i> Back To List</a>
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
        <!--<ul class="nav nav-tabs primary" id="myTab1" role="tablist">-->
        <!--    <li class="nav-item">-->
        <!--        <a class="nav-link active" href="#customer" role="tab" data-toggle="tab"><i class="fa fa-user"></i> Customer</a>-->
        <!--    </li>-->
        <!--    <li class="nav-item">-->
        <!--        <a class="nav-link" href="#notes" role="tab" data-toggle="tab"><i class="fa fa-sticky-note-o"></i> Notes</a>-->
        <!--    </li>-->
        <!--</ul>-->
        <div class="tab-content primary" id="myTabContent1">
            <div class="card planned_task tab-pane fade show active" id="customer">
                <div class="header">
                    <h2>Edit Lead Applications</h2>
                    <ul class="header-dropdown dropdown">
                        <li><a href="javascript:void(0);" class="full-screen"><i class="fa fa-expand"></i></a></li>

                    </ul>
                </div>
                <div class="body">
                    <form action="{{url('admin/editlead-applications',$lead->id)}}" method="POST">
                        @csrf
                        <div class="form-group row">
                            <div class="col-md-6">
                                <label>First Name</label>
                                <input type="text" name="firstname" value="{{$lead->firstname}}" class="form-control" required>
                            </div>  
                            <div class="col-md-6">
                                <label>Last Name</label>
                                <input type="text" name="lastname" value="{{$lead->lastname}}" class="form-control" required>
                            </div>
                        </div>
                        <div class="form-group row">
                            <div class="col-md-4">
                                <label>Email</label>
                                <input type="text" name="email" value="{{$lead->email}}" class="form-control" required>
                            </div>  
                            <div class="col-md-4">
                                <label>Telephone</label>
                                <input type="text" name="telephone" value="{{$lead->telephone}}" class="form-control" required>
                            </div>
                            <div class="col-md-4">
                                <label>Business Name</label>
                                <input type="text" name="business_name" value="{{$lead->business_name}}" class="form-control" required>
                            </div> 
                        </div>
                        <div class="form-group row">
                            <div class="col-md-4">
                                <label>Website</label>
                                <input type="text" name="website" value="{{$lead->website}}" class="form-control" required>
                            </div>
                            <div class="col-md-4">
                                <label>Employee Size</label>
                                <input type="text" name="employee_size" value="{{$lead->employee_size}}" class="form-control" required>
                            </div> 
                            <div class="col-md-4">
                                <label>LinkedIn Company</label>
                                <input type="text" name="linkedIn_company" value="{{$lead->linkedIn_company}}" class="form-control" required>
                            </div>
                        </div> 
                        <div class="form-group row">
                            <div class="col-md-4">
                                <label>Source</label>
                                <select name="source" class="form-control">
                                    {{-- <option value="{{$lead->source}}" @if($lead->source) selected @endif>{{$lead->source}}</option> --}}
                                    <option value="Google" @if($lead->source == 'Google') selected @endif>Google</option>
                                    <option value="AdWords" @if($lead->source == 'AdWords') selected @endif>AdWords</option>
                                    <option value="LinkedIn" @if($lead->source == 'LinkedIn') selected @endif>LinkedIn</option>
                                </select>
                            </div> 
                            <div class="col-md-4">
                                <label>Interest</label>
                                <select name="interest" class="form-control">
                                    {{-- <option value="{{$lead->interest}}" @if($lead->interest) selected @endif>{{$lead->interest}}</option> --}}
                                    <option value="Not Updated" @if($lead->interest == 'Not Updated') selected @endif> Not Updated</option>
                                    <option value="Wanted" @if($lead->interest == 'Wanted') selected @endif>Wanted</option>
                                    <option value="Not-Wanted" @if($lead->interest == 'Not-Wanted') selected @endif>Not-Wanted</option>
                                </select>
                            </div>
                            <div class="col-md-4">
                                <label>Lead Status</label>
                                <select name="lead_status" class="form-control">
                                    {{-- <option value="{{$lead->lead_status}}" @if($lead->lead_status) selected @endif>{{$lead->lead_status}}</option> --}}
                                    <option value="New Lead" @if($lead->lead_status == 'New Lead') selected @endif>New Lead</option>
                                    <option value="Working On" @if($lead->lead_status == 'Working On') selected @endif>Working On</option>
                                    <option value="Win" @if($lead->lead_status == 'Win') selected @endif>Win</option>
                                    <option value="Lost" @if($lead->lead_status == 'Lost') selected @endif>Lost</option>
                                    <option value="Dead" @if($lead->lead_status == 'Dead') selected @endif>Dead</option>
                                </select>
                            </div> 
                        </div>
                        <div class="form-group row">
                            <div class="col-md-12">
                                <label>Comments</label>
                                <textarea name="comments"  rows="4" cols="50" class="form-control">{{$lead->comments}}</textarea>
                            </div> 
                        </div>  
                        <div class="text-center">
                            <button type="submit" class="btn btn-primary theme-bg">Update</button>
                        </div>
                    </form>
                </div>
            </div>
            <!--<div class="card planned_task tab-pane fade" id="notes">-->
            <!--    <div class="header">-->
            <!--        <h2>Notes</h2>-->
            <!--        <ul class="header-dropdown dropdown">-->
            <!--            <li><a href="javascript:void(0);" class="full-screen"><i class="fa fa-expand"></i></a></li>-->
            <!--        </ul>-->
            <!--    </div>-->
            <!--    <div class="body">-->
            <!--        <div class="col-xl-12 col-md-12 col-sm-12 text-md-right">-->
            <!--            <a class="btn btn-primary theme-bg gradient btn-round" data-toggle="modal" data-target="#cerate_not" ><i class="fa fa-plus"></i> Create Note</a>-->
            <!--        </div>-->
            <!--        <div class="scrum-body">-->
            <!--            <div class="scrum-board done" style="flex: 1;padding: 0 20px;">-->
            <!--                <div class="scrum-board-column">-->
            <!--                    @foreach($lead_notes as $note)-->
            <!--                    <div class="scrum-task overflow">-->
            <!--                        @if(Auth::user()->id == '5')-->
            <!--                        {{-- <div class="d-flex justify-content-between align-items-center">-->
            <!--                            <div class="st-description">{{$note->lead_notes}}</div>-->
            <!--                            <div class="st-assignee pb-5">-->
            <!--                                <a href="" class="btn btn-outline-danger btn-sm property_delete"><i class="fa fa-trash"></i></a>-->
            <!--                            </div>-->
            <!--                        </div> --}}-->
            <!--                        @else-->
            <!--                        <div class="st-description">{{$note->lead_note}}</div>-->
            <!--                        @endif-->
            <!--                        <div class="d-flex justify-content-between align-items-center">-->
            <!--                            <div class="st-date">Due {{ date('d/m/yy', strtotime($note->updated_at)) }}</div>-->
            <!--                            <div class="st-assignee" style="text-align: right;">-->
            <!--                                Create By : @if(empty($note->created_by))@else{{ getUserInfo($note->created_by)->name }}@endif-->
            <!--                            </div>-->
            <!--                        </div>-->
            <!--                    </div>-->
            <!--                    @endforeach-->
            <!--                </div>-->
            <!--            </div>-->
            <!--        </div>-->
            <!--    </div>-->
            <!--</div>-->
        </div>    
    </div>
</div>

<!-- modal -->
<div class="modal fade" id="cerate_not" tabindex="-1" role="dialog" aria-labelledby="createOrderTitle" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header" id="createOrderTitle">
                <div class="col text-center">
                    <h3>Create Notes</h3>
                </div>
                <button type="button" class="close absolute" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
        <div class="modal-body">
            <div class="row justify-content-center">
                <div class="col-md-10 mx-auto">
                    <div class="tab-content">
                        <form action="{{url('admin/lead-notes')}}" method="post">
                            @csrf
                            <div class="tab-pane show active">
                                <input type="hidden" name="lead_id" value="{{ isset($lead->id) ? $lead->id : null }}">
                                <div class="form-group">
                                    <label>Short Description</label>
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
                </div>
            </div>
            <div class="modal-footer">
                <input type="hidden" name="customer_id" id="customer_id" value="">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">{{ __('Close') }}</button>
            </div>
        </div>
    </div>
</div>
@endsection

@section('page-styles')
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
<script src="{{ asset('public/admin_assets/vendor/ckeditor/ckeditor.js') }}"></script>
@stop

@section('page-script')
<script>
     $(function() {
        CKEDITOR.replace('comments');
    });
</script>
@stop
