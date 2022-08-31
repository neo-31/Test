@extends("admin.admin_app")
@section('title', 'Profile')
@section("content")

<div class="block-header">
    <div class="row clearfix">
        <div class="col-lg-4 col-md-12 col-sm-12">
            <h1>Edit Profile : {{ ucwords(Auth::user()->name) }}</h1>
        </div>
        <div class="col-lg-8 col-md-12 col-sm-12 text-lg-right">
            <a href="{{ URL::to('admin/dashboard') }}" class="btn btn-primary theme-bg gradient btn-round"><i class="fa fa-sign-out"></i> Back To Dashboard</a>
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
    <div class="col-12">
        <div class="d-lg-flex justify-content-between">
            <ul class="nav nav-tabs4 page-header-tab">
                <li class="nav-item"><a class="nav-link active show" data-toggle="tab" href="#account">Account</a></li>
                <li class="nav-item"><a class="nav-link" data-toggle="tab" href="#ac_password">Password</a></li>
            </ul>
        </div>
        <div class="tab-content">
            <div class="tab-pane active show" id="account">
                <div class="card">
                    <div class="card-header">Profile Settings</div>
                    <div class="card-body">
                        {!! Form::open(array('url' => 'admin/profile','class'=>'','name'=>'account_form','id'=>'account_form','role'=>'form','enctype' => 'multipart/form-data')) !!}
                            <div class="row">
                                @if(Session::has('profile_tab'))
                                    <input type="hidden" name="profile_tab" id="profile_tab" value="{{ Session::get('profile_tab') }}" class="form-control">

                                @endif
                                <div class="col-md-6 col-sm-12">
                                    <div class="form-group">
                                        <label>Name <span class="text-danger">*</span></label>
                                        <input type="text" name="name" value="{{ Auth::user()->name }}" class="form-control">
                                    </div>
                                </div>
                                <div class="col-md-6 col-sm-12">
                                    <div class="form-group">
                                        <label>Email <span class="text-danger">*</span></label>
                                        <div class="input-group">
                                            <input type="email" name="email" value="{{ Auth::user()->email }}" class="form-control">
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6 col-sm-12">
                                    <div class="form-group">
                                        <label>Mobile Number</label>
                                        <input type="text" name="phone" value="{{ Auth::user()->phone }}" class="form-control">
                                    </div>
                                </div>
                                <div class="col-md-6 col-sm-12">
                                    <div class="form-group">
                                        <label>Fax</label>
                                        <input type="text" name="fax" value="{{ Auth::user()->fax }}" class="form-control">
                                    </div>
                                </div>
                                <div class="col-sm-12">
                                    <div class="form-group">
                                        <label>Profile Picture</label>
                                        <div class="input-group">
                                            <div class="custom-file">
                                                <input type="file" class="custom-file-input" id="upload_image" data-iflag="0">
                                                <label class="custom-file-label" for="upload_image">Choose file</label>
                                            </div>
                                            <div class="col-md-2 text-center">
                                                <input type="hidden" name="image_icon" id="image_icon" value="">
                                                @if(Auth::user()->image_icon != "default.png")
                                                <div id="uploaded_image">
                                                    <img name="new_img" src="{{ url(Auth::user()->image_icon) }}" width="75" height="75" />
                                                </div>
                                                @else
                                                <div id="uploaded_image"></div>
                                                @endif
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-sm-12 text-left m-t-20">
                                    <button type="submit" class="btn btn-primary theme-bg gradient">Save Changes</button>
                                </div>
                            </div>
                        {!! Form::close() !!}
                    </div>
                </div>
            </div>
            <div class="tab-pane" id="ac_password">
                <div class="card">
                    <div class="card-header">
                        Change Password
                    </div>
                    <div class="card-body">
                        {!! Form::open(array('url' => 'admin/profile_pass','class'=>'','name'=>'pass_form','id'=>'pass_form','role'=>'form')) !!}
                            <div class="row">
                                <div class="col-md-12 col-sm-12">
                                    <div class="form-group">
                                        <label>New Password</label>
                                        <input type="password" name="password" value="" class="form-control" value="">
                                    </div>
                                </div>
                                <div class="col-md-12 col-sm-12">
                                    <div class="form-group">
                                        <label>Confirm Password</label>
                                        <input type="password" name="password_confirmation" value="" class="form-control" value="">
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-sm-12 text-left m-t-20">
                                    <button type="submit" class="btn btn-primary theme-bg gradient">Save Changes</button>
                                </div>
                            </div>
                        {!! Form::close() !!}
                    </div>
                </div>
            </div>
        </div>
    </div>

</div>

<div class="container">
    <div id="uploadimageModal" class="modal" role="dialog">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header" style="display: block;">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h4 class="modal-title">Upload & Crop Image</h4>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="col-md-12 text-center">
                            <div id="image_demo" style=" margin-top:30px"></div>
                        </div>
                        <div class="col-md-12  text-center" style="padding-top:30px;">
                            <input type="hidden" name="crop_iflag" id="crop_iflag">
                            <button class="btn btn-success crop_image">Crop Image</button>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection

@section('page-styles')
<link rel="stylesheet" href="{{ asset('public/admin_assets/crop-image/croppie.css') }}" />
<style type="text/css">
    @media (min-width: 992px) {
        .modal-lg {
        max-width: 950px;
        width: 950px;
        }
    }
</style>
@stop

@section('vendor-script')
<script src="{{ asset('public/admin_assets/crop-image/croppie.js') }}"></script>
@stop

@section('page-script')
<script>
    $(document).ready(function () {
        $image_crop = $('#image_demo').croppie({
            enableExif: true,
            viewport: {
                width:140,
                height:140,
                format:'jpeg',
                quality:0,
                type:'square'
            },
            boundary:{
                width:300,
                height:300
            }
        });
        $('#upload_image').on('change', function(){
            var reader = new FileReader();
            reader.onload = function (event) {
              $image_crop.croppie('bind', {
                url: event.target.result
              }).then(function(){
                console.log('jQuery bind complete');
              });
            }
            var iflag = $(this).data("iflag");
            $('#crop_iflag').val(iflag);
            reader.readAsDataURL(this.files[0]);
            $('#uploadimageModal').modal('show');
        });
        $('.crop_image').click(function(event){
            $image_crop.croppie('result', {
                type: 'canvas',
                size: 'viewport'
            }).then(function(response){
                $('#uploadimageModal').modal('hide');
                var crop_iflag = $('#crop_iflag').val();
                if(crop_iflag == '0'){
                    $('#image_icon').val(response);
                    $('#uploaded_image').html('<img name="new_img" src="' + response + '" width="75" height="75" />');
                }
            })
        });
    });
</script>
<script>
    $(document).ready(function(){

        $str = $("#profile_tab").val();

            switch ($str) {
            case "1" :
                        // $('#clientSitetab').addClass("active show");
                        $('[href="#account"]').click();
                        break;
            case "2" :
                    //   $('#boilderDatatab').addClass("active show");
                        $('[href="#ac_password"]').click();
                        break;
            default:
                    //   $('#clientSitetab').addClass("active show");
                    $('[href="#account"]').click();
            }
        });
</script>
@stop
