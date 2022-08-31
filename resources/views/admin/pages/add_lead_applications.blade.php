@extends("admin.admin_app")
@section('title', 'Add Lead')

@section("content")

<div class="block-header">
    <div class="row clearfix">
        <div class="col-xl-5 col-md-5 col-sm-12">
            <h1>Add Lead</h1>
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
        <div class="card planned_task">
            <div class="header">
                <h2>Add Lead</h2>
                <ul class="header-dropdown dropdown">
                    <li><a href="javascript:void(0);" class="full-screen"><i class="fa fa-expand"></i></a></li>

                </ul>
            </div>
            <div class="body">
                <form action="{{url('admin/addlead-applications')}}" method="POST">
                    @csrf
                    <div class="form-group row">
                        <div class="col-md-6">
                            <label>First Name</label>
                            <input type="text" name="firstname" class="form-control" required>
                        </div>  
                        <div class="col-md-6">
                            <label>Last Name</label>
                            <input type="text" name="lastname" class="form-control" required>
                        </div>
                    </div>
                    <div class="form-group row">
                        <div class="col-md-4">
                            <label>Email</label>
                            <input type="text" name="email" class="form-control" required>
                        </div>  
                        <div class="col-md-4">
                            <label>Telephone</label>
                            <input type="text" name="telephone" class="form-control" required>
                        </div>
                        <div class="col-md-4">
                            <label>Business Name</label>
                            <input type="text" name="business_name" class="form-control" required>
                        </div> 
                    </div>
                    <div class="form-group row">
                        <div class="col-md-4">
                            <label>Website</label>
                            <input type="text" name="website" class="form-control" required>
                        </div>
                        <div class="col-md-4">
                            <label>Employee Size</label>
                            <input type="text" name="employee_size" class="form-control" required>
                        </div> 
                        <div class="col-md-4">
                            <label>LinkedIn Company</label>
                            <input type="text" name="linkedIn_company" class="form-control" required>
                        </div>
                    </div> 
                    <div class="form-group row">
                        <div class="col-md-4">
                            <label>Source</label>
                            <select name="source" class="form-control">
                                <option selected disabled>Select option...</option>
                                <option value="Google">Google</option>
                                <option value="AdWords">AdWords</option>
                                <option value="LinkedIn">LinkedIn</option>
                            </select>
                        </div> 
                        <div class="col-md-4">
                            <label>Interest</label>
                            <select name="interest" class="form-control">
                                <option value="Not Updated" selected> Not Updated</option>
                                <option value="Wanted">Wanted</option>
                                <option value="Not-Wanted">Not-Wanted</option>
                            </select>
                        </div>
                        <div class="col-md-4">
                            <label>Lead Status</label>
                            <select name="lead_status" class="form-control">
                                <option selected disabled>Select option...</option>
                                <option value="New Lead">New Lead</option>
                                <option value="Working On">Working On</option>
                                <option value="Win">Win</option>
                                <option value="Lost">Lost</option>
                                <option value="Dead">Dead</option>
                            </select>
                        </div> 
                    </div>
                    <div class="form-group row">
                        <div class="col-md-12">
                            <label>Comments</label>
                            <textarea name="comments"  rows="4" cols="50" class="form-control"></textarea>
                        </div> 
                    </div>  
                    <div class="text-center">
                        <button type="submit" class="btn btn-primary theme-bg">Create</button>
                    </div>
                </form>
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
