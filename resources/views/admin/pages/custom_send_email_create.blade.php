@extends("admin.admin_app")
@section('title', 'Custom Email Send')

@section("content")

<div class="block-header">
    <div class="row clearfix">
        <div class="col-lg-4 col-md-12 col-sm-12">
            <h1>{{ __('Custom Email Send') }} </h1>
            <!-- <span>JustDo Page Blank,</span> -->
        </div>
        <div class="col-lg-8 col-md-12 col-sm-12 text-lg-right">
            <a href="{{ URL::to('admin/custom/send/email') }}" class="btn btn-primary theme-bg gradient btn-round"><i class="fa fa-sign-out"></i> {{ __('Back To List') }}</a>
        </div>
    </div>
    <div class="row mt-3">
        <div class="col-lg-12 col-md-12 col-sm-12">
            @if(session()->has('message'))
                <span class="alert alert-success">{{ session()->get('message') }}</span>
            @endif
            @if (\Session::has('error'))
                <span class="alert alert-danger">{!! \Session::get('error') !!}</span>
            @endif
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
    <div class="col-lg-12 col-md-12 col-sm-12">
        <div class="card">
            <div class="header">
                <h2></h2>
                <ul class="header-dropdown dropdown">
                    <li><a href="javascript:void(0);" class="full-screen"><i class="fa fa-expand"></i></a></li>
                </ul>
            </div>
            <div class="body wizard_validation">
                <form id="wizard_with_validation" method="POST" action="{{ route('admin.custom.send_mail') }}">
                    {{ csrf_field() }}
                    <h3>{{ __('Email Information') }}</h3>
                    <fieldset>
                        <div class="row clearfix">
                            <div class="col-lg-12 col-md-12">
                                <div class="form-group">
                                    <div class="input-group demo-tagsinput-area">
                                        <input name="email" id="email" type="text" class="form-control" data-role="tagsinput" value="" placeholder="Email *" required>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-12 col-md-12">
                                <div class="form-group">
                                    <input type="text" name="subject" id="subject" value="" placeholder="Subject *" class="form-control" required>
                                </div>
                            </div>
                            <div class="col-lg-12 col-md-12">
                                <div class="form-group">
                                    <textarea name="email_content" id="email_content" cols="30" rows="3" placeholder="Message *" class="form-control no-resize" required></textarea>
                                </div>
                            </div>
                        </div>
                    </fieldset>
                    <h3>{{ __('Send Email View') }}</h3>
                    <fieldset>
                        <div class="row">
                            <div class="col-lg-12 col-md-12 mt-2">
                                <div class="text-left mb-3">
                                    <img src="{{ asset('public/email_signature/logo.png') }}" alt="">
                                </div>
                            </div>
                            <div class="col-lg-12 col-md-12 mt-2">
                                <div class="text-left mb-3">
                                    <span id="subject_name"></span>,
                                </div>
                                <div class="text-left mb-3">
                                    <p id="custom_desc"></p>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-lg-12 col-md-12 mt-5">
                                <center class="mb-2">
                                    <input type="submit" name="action" class="btn btn-primary btn-round" value="Send" />
                                </center>
                            </div>
                        </div>
                    </fieldset>
                </form>
            </div>
        </div>
    </div>
</div>

@endsection

@section('page-styles')
<link rel="stylesheet" href="{{ asset('public/admin_assets/vendor/jquery-steps/jquery.steps.css') }}">
<link rel="stylesheet" href="{{ asset('public/admin_assets/vendor/summernote/dist/summernote.css') }}" />
<link rel="stylesheet" href="{{ asset('public/admin_assets/vendor/summernote/dist/summernote-bs4.min.css') }}" />
<link rel="stylesheet" href="{{ asset('public/admin_assets/vendor/bootstrap-tagsinput/bootstrap-tagsinput.css') }}">
<style>
    .wizard .actions .disabled a {
        background: var(--font-ccc);
        color: #ffffff !important;
    }
    .wizard .steps .current a { background: #E0C463 !important; }

    .wizard .steps .done a { background: #E0C463 !important; }

    .wizard .content {
        overflow-y: auto;
        background-color: transparent;
        border: 1px solid var(--border-color);
        min-height: 500px !important;
        border-radius: 0;
    }
    .nav.nav-tabs4 { background: #E0C463 !important; width: 100%; padding: 5px; }
    .nav.nav-tabs4>li>a{ opacity: 1.5 !important; }
     a:focus, a:hover{ color: #fff !important; }

    .fancy-checkbox input[type="checkbox"]+span:before {
        border: 2px solid var(--border-color) !important;
        border-color: #f39e00 !important;
    }
    .wizard > .actions a{ background: #E0C463 !important; }
     #ans_data_2 > a:hover, .hov-green:hover{ color: #E0C463 !important; }
    .input-group.demo-tagsinput-area input[type="text"] { border: none; display: inline-flex; }

</style>
@stop

@section('vendor-script')
<script src="{{ asset('public/admin_assets/vendor/jquery-validation/jquery.validate.js') }}"></script>
<script src="{{ asset('public/admin_assets/vendor/jquery-steps/jquery.steps.js') }}"></script>
<script src="{{ asset('public/admin_assets/bundles/mainscripts.bundle.js') }}"></script>
<script src="{{ asset('public/admin_assets/js/pages/forms/form-wizard.js') }}"></script>
<script src="{{ asset('public/admin_assets/vendor/ckeditor/ckeditor.js') }}"></script>
<script src="{{ asset('public/admin_assets/vendor/summernote/dist/summernote-bs4.min.js') }}"></script>
<script src="{{ asset('public/admin_assets/vendor/bootstrap-tagsinput/bootstrap-tagsinput.js') }}"></script>
@stop

@section('page-script')
<script>

    $(document).ready(function() {
        $('#select_all_button').on('click', function () {
            if($(this).is(":checked")){
                $(".users_table_index_checkbox").each(function (index) {
                    $(this).prop('checked', true);
                });
            } else if($(this).is(":not(:checked)")){
                $(".users_table_index_checkbox").each(function (index) {
                    $(this).prop('checked', false);
                });
            }
        });
    });

    $(function() {
        CKEDITOR.replace('email_content');
    });

    $("body").on('change', '#subject', function () {
        $("#subject_name").html($(this).val())
    });

    $(function() {
        CKEDITOR.instances.email_content.on('change', function() {
            var desc_data = CKEDITOR.instances['email_content'].getData()
            $("#custom_desc").html(desc_data);
        });
    });

</script>
@stop
