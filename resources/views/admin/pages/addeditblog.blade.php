@extends("admin.admin_app")
@section('title', 'News')

@section("content")

<div class="block-header">
    <div class="row clearfix">
        <div class="col-lg-4 col-md-12 col-sm-12">
            <h1>{{ isset($blog->blog_title) ? 'Edit' : 'Add' }} News</h1>
        </div>
        <div class="col-lg-8 col-md-12 col-sm-12 text-lg-right">
            <a href="{{ URL::to('admin/blog') }}" class="btn btn-primary theme-bg gradient btn-round"><i class="fa fa-sign-out"></i> Back To List</a>
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
                <h2>{{ isset($blog->blog_title) ? 'Edit: '. $blog->blog_title : 'Add News' }}</h2>
                <ul class="header-dropdown dropdown">
                    <li><a href="javascript:void(0);" class="full-screen"><i class="fa fa-expand"></i></a></li>
                </ul>
            </div>
            <div class="body">
                {!! Form::open(array('url' => array('admin/blog/addblog'),'class'=>'','name'=>'blog_form','id'=>'blog_form','role'=>'form','enctype' => 'multipart/form-data')) !!}
                    <input type="hidden" name="id" value="{{ isset($blog->id) ? $blog->id : null }}">
                    <div class="form-group">
                        <label>News Title</label>
                        <input type="text" name="blog_title" value="{{ isset($blog->blog_title) ? $blog->blog_title : null }}" class="form-control" required>
                    </div>
                    <div class="form-group">
                        <label>Category</label>
                        <select name="category_id" class="form-control">
                            @if(isset($blog->category_id))
                                @foreach($category_list as $category)
                                <option value="{{$category->id}}" @if($blog->category_id==$category->id) selected @endif>{{$category->category_name}}</option>
                                @endforeach
                            @else
                                @foreach($category_list as $category)
                                <option value="{{$category->id}}">{{$category->category_name}}</option>
                                @endforeach
                            @endif
                        </select>
                    </div>
                    <div class="form-group">
                        <label>Short Description</label>
                        <textarea name="short_description" value="{{ isset($blog->short_description) ? $blog->short_description : null }}" rows="4" cols="50" class="form-control">{{ isset($blog->short_description) ? $blog->short_description : null }}</textarea>
                    </div>
                    <div class="form-group">
                        <label>Description</label>
                        <textarea name="long_description" value="{{ isset($blog->long_description) ? $blog->long_description : null }}" class="form-control">{{ isset($blog->long_description) ? $blog->long_description : null }}</textarea>
                    </div>
                    <div class="form-group row">
                        <label class="col-md-12">Featured Image</label>
                        <div class="input-group col-md-12">
                            <div class="custom-file">
                                <input type="file" class="custom-file-input" id="upload_image_1" data-iflag="0" accept="image/*">
                                <label class="custom-file-label" for="upload_image_1">Choose file</label>
                            </div>
                            <div class="col-md-2 text-center">
                                <input type="hidden" name="blog_features_image" id="blog_features_image" value="">
                                @if(isset($blog->features_image))
                                <div id="uploaded_image_1">
                                    <img name="new_img" src="{{ url($blog->features_image) }}" width="75" height="75" />
                                </div>
                                @else
                                <div id="uploaded_image_1"></div>
                                @endif
                            </div>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-md-12">Inner Image</label><br>
                        <div class="input-group col-md-12">
                            <div class="custom-file">
                                <input type="file" class="custom-file-input" id="upload_image_2"  data-iflag="1" accept="image/*">
                                <label class="custom-file-label" for="upload_image_2">Choose file</label>
                            </div>
                            <div class="col-md-2 text-center">
                                <input type="hidden" name="blog_inner_image" id="blog_inner_image" value="">
                                @if(isset($blog->inner_image))
                                <div id="uploaded_image_2">
                                    <img name="new_img" src="{{ url($blog->inner_image) }}" width="75" height="75" />
                                </div>
                                @else
                                <div id="uploaded_image_2"></div>
                                @endif
                            </div>
                        </div>
                    </div>
                    <div class="text-center">
                        <button type="submit" class="btn btn-primary theme-bg">{{ isset($blog->id) ? 'Update' : 'Create' }}</button>
                    </div>
                {!! Form::close() !!}
            </div>
        </div>
    </div>
</div>

<div class="container">
    {{-- Model - 1 --}}
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

    {{-- Model - 2 --}}
    <div id="uploadimageModal1" class="modal" role="dialog">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header" style="display: block;">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h4 class="modal-title">Upload & Crop Image</h4>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="col-md-12 text-center">
                            <div id="image_demo1" style="margin-top:30px"></div>
                        </div>
                        <div class="col-md-12  text-center" style="padding-top:30px;">
                            <input type="hidden" name="crop_iflag1" id="crop_iflag1">
                            <button class="btn btn-success crop_image1">Crop Image</button>
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
<script src="{{ asset('public/admin_assets/vendor/ckeditor/ckeditor.js') }}"></script>
<script src="{{ asset('public/admin_assets/crop-image/croppie.js') }}"></script>
@stop

@section('page-script')
<script>
    $(function() {
        CKEDITOR.replace('long_description');
    });
</script>
<script>
    $(document).ready(function () {
        $image_crop = $('#image_demo').croppie({
            enableExif: true,
            viewport: {
                width:364,
                height:308,
                format:'jpeg',
                quality:0,
                type:'square'
            },
            boundary:{
                width:850,
                height:520
            }
        });
        $('#upload_image_1').on('change', function(){
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
                    $('#blog_features_image').val(response);
                    $('#uploaded_image_1').html('<img name="new_img" src="' + response + '" width="75" height="75" />');
                
                    $('#upload_image_1').next('.custom-file-label').html('');
                    var fileName = $('#upload_image_1').val().split('\\').pop();
                    $('#upload_image_1').next('.custom-file-label').html(fileName);
                }
            })
        });
    });
</script>
<script>
    $(document).ready(function () {
        $image_crop1 = $('#image_demo1').croppie({
            enableExif: true,
            viewport: {
                width:768,
                height:412,
                format:'jpeg',
                quality:0,
                type:'square'
            },
            boundary:{
                width:850,
                height:520
            }
        });
        $('#upload_image_2').on('change', function(){
            var reader = new FileReader();
            reader.onload = function (event) {
              $image_crop1.croppie('bind', {
                url: event.target.result
              }).then(function(){
                console.log('jQuery bind complete');
              });
            }
            var iflag = $(this).data("iflag");
            $('#crop_iflag1').val(iflag);
            reader.readAsDataURL(this.files[0]);
            $('#uploadimageModal1').modal('show');
        });
        $('.crop_image1').click(function(event){
            $image_crop1.croppie('result', {
                type: 'canvas',
                size: 'viewport'
            }).then(function(response){
                $('#uploadimageModal1').modal('hide');
                var crop_iflag = $('#crop_iflag1').val();
                if(crop_iflag == '1'){
                    $('#blog_inner_image').val(response);
                    $('#uploaded_image_2').html('<img name="new_img" src="' + response + '" width="75" height="75" />');
                
                    $('#upload_image_2').next('.custom-file-label').html('');
                    var fileName = $('#upload_image_2').val().split('\\').pop();
                    $('#upload_image_2').next('.custom-file-label').html(fileName);
                }
            })
        });
    });
</script>
@stop
