@extends("admin.admin_app")
@section('title', 'Service ')

@section("content")
<div class="block-header">
    <div class="row clearfix">
        <div class="col-xl-5 col-md-5 col-sm-12">
            <h1>{{isset($service->service_name)?'Edit':'Add'}}  Service</h1>
            <span></span>
        </div>
        <div class="col-xl-7 col-md-7 col-sm-12 text-md-right">
            <a href="{{url('admin/services')}}" class="btn btn-primary theme-bg gradient btn-round"><i class="fa fa-sign-out"></i> Back To List</a>
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
                <h2>{{isset($service->service_name)?'Edit '.$service->service_name:'Add'}}  Service</h2>
                <ul class="header-dropdown dropdown">
                    <li><a href="javascript:void(0);" class="full-screen"><i class="fa fa-expand"></i></a></li>

                </ul>
            </div>
            <div class="body">
                {!! Form::open(array('url' => array('admin/service/addservice'),
                'class'=>'','name'=>'service_form','id'=>'service_form',
                'role'=>'form','enctype' => 'multipart/form-data')) !!}

    <div class="form-group row">
        <div class="col-md-6" id="title">
            <label>Service Name</label>
            <input type="hidden" name="id" value="{{ isset($service->id) ? $service->id : null }}">
            <input type="text" id="service_name" name="service_name" value="{{isset($service->service_name)?$service->service_name:''}} " class="form-control" required="">
        </div>
        <div class="col-md-6">
            <label>Category</label>
            <div class="input-group">
                <select id="category_id" name="category_id" class="form-control">
                     @if(isset($product->category_id))
                                @foreach($category_list as $category)
                                <option value="{{$category->id}}" @if($product->category_id==$category->id) selected @endif>{{$category->category_name}}</option>
                                @endforeach
                            @else
                                @foreach($category_list as $category)
                                <option value="{{$category->id}}">{{$category->category_name}}</option>
                                @endforeach
                            @endif                                                            </select>
                <div class="input-group-append">
                    <a href="{{url('admin/categories/addcategories')}}" class="btn btn-outline-success" type="button"><i class="fa fa-plus"></i> Add</a>
                </div>
            </div>
        </div>
        <!--<div class="col-md-6">
            <label>Service Slug</label>
            <input type="text" id="service_slug" name="service_slug" value="{{isset($service->service_slug)?$service->service_slug:''}} " class="form-control" required="">
        </div>-->
    </div>
    <div class="form-group row">
        <div class="col-md-6">
            <label>Meta Tag</label>
            <textarea id="service_meta_tag" rows="5" cols="30" name="service_meta_tag"  class="form-control" required="">{{isset($service->service_meta_tag)?$service->service_meta_tag:''}} </textarea>
        </div>
        <div class="col-md-6">
            <label>Meta Description</label>
            <textarea id="service_meta_description" rows="5" cols="30" name="service_meta_description" class="form-control" required="">{{isset($service->service_meta_description)?$service->service_meta_description:''}} </textarea>
        </div>
    </div>
    <div class="form-group row">

        <div class="col-md-12">
             <label> Short Description</label>
        <textarea class="form-control" id="sort_description" name="sort_description" rows="5" cols="30" >{{isset($service->sort_description)?$service->sort_description:''}}</textarea>

            </div>
    </div>
    <!--<div class="form-group row" id="hide_service_price">
        <div class="col-md-4">
            <label>Price</label>
            <div class="input-group">
                <div class="input-group-prepend">
                    <span class="input-group-text">£</span>
                </div>
                <input type="number" id="service_price" value="0" name="service_price" class="form-control" aria-label="Amount (to the pound)">
                <div class="input-group-append">
                    <span class="input-group-text">,00</span>
                </div>
            </div>
        </div>-->
        <!--<div class="col-md-4">
            <label>Discount</label>
            <div class="input-group">
                <input type="number" id="service_discount" value="0" name="service_discount" class="form-control">
                <div class="input-group-prepend">
                    <select id="service_discount_pf" name="service_discount_pf" class="form-control">
                        <option value="Percent">Percent</option>
                        <option value="Fixed">Fixed</option>
                    </select>
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <label>Price after discount</label>
            <p class="form-control-static" id="service_price_after_discount"   style="font-size: 1.5rem">{{isset($service->service_price_after_discount)?$service->service_price_after_discount:''}}</p>
            <input type="hidden" name="hf_price_dicut" id="hf_price_dicut" value="0">
        </div>
    </div>-->
    <div class="form-group">
        <label>Description</label>
        <textarea class="form-control" id="Description" name="Description" rows="5" cols="30" required="">{{isset($service->service_description)?$service->service_description:''}}</textarea>
    </div>
    <div class="form-group row">
        <div class="col-md-4">
        <label>Tab1 Title</label>
        <input type="text" class="form-control" name="tab1title" id="tab1title" value="{{isset($service->tab1title)?$service->tab1title:''}}" >
        </div>
        <div class="col-md-4">
             <label>Tab 2 Title</label>
        <input type="text" class="form-control" name="tab2title" id="tab2title" value="{{isset($service->tab2title)?$service->tab2title:''}}">
       <!-- <textarea class="form-control" id="tab1_description" name="tab1_description" rows="5" cols="30" required="">{{isset($service->tab1_description)?$service->tab1_description:''}}</textarea>-->
    </div>
      <div class="col-md-4">
        <label>Tab3 Title</label>
        <input type="text" class="form-control" name="tab3title" id="tab3title" value="{{isset($service->tab3title)?$service->tab3title:''}}">
        </div></div>
         <div class="form-group row">
        <div class="col-md-4">
        <label>Tab1 Description</label>
        <textarea class="form-control" id="tab1_description" name="tab1_description" rows="5" cols="30" >{{isset($service->tab1_description)?$service->tab1_description:''}}</textarea>
        </div>
        <div class="col-md-4">
             <label>Tab 2 Description</label>
        <textarea class="form-control" id="tab1_description" name="tab2_description" rows="5" cols="30" >{{isset($service->tab2_description)?$service->tab2_description:''}}</textarea>
    </div>
      <div class="col-md-4">
        <label>Tab3 Description</label>
       <textarea class="form-control" id="tab1_description" name="tab3_description" rows="5" cols="30" >{{isset($service->tab3_description)?$service->tab3_description:''}}</textarea>
        </div></div>
    <div class="form-group row">
        <label class="col-md-12">Featured Image</label>
        <div class="input-group col-md-12">
            <div class="custom-file">
                <input type="file" class="custom-file-input" id="upload_image_1" data-iflag="0" accept="image/*">
                <label class="custom-file-label" for="upload_image_1">Choose file</label>
            </div>
            <div class="col-md-2 text-center">
                <input type="hidden" name="service_features_image" id="service_features_image" value="">
                @if(isset($service->features_image))
                <div id="uploaded_image_1">
                    <img name="new_img" src="{{ url($service->features_image) }}" width="75" height="75" />
                </div>
                @else
                <div id="uploaded_image_1"></div>
                @endif
            </div>
        </div>
    </div>
    <div class="form-group row">
        <label class="col-md-12">Inner Image 1</label><br>
        <div class="input-group col-md-12">
            <div class="custom-file">
                <input type="file" class="custom-file-input" id="upload_image_2"  data-iflag="1" accept="image/*">
                <label class="custom-file-label" for="upload_image_2">Choose file</label>
            </div>
            <div class="col-md-2 text-center">
                <input type="hidden" name="service_inner_image" id="service_inner_image" value="">
                @if(isset($service->inner_image))
                <div id="uploaded_image_2">
                    <img name="new_img" src="{{ url($service->inner_image) }}" width="75" height="75" />
                </div>
                @else
                <div id="uploaded_image_2"></div>
                @endif
            </div>
        </div>
    </div>
    <div class="form-group row">
        <label class="col-md-12">Inner Image 2</label><br>
        <div class="input-group col-md-12">
            <div class="custom-file">
                <input type="file" class="custom-file-input" id="upload_image_3"  data-iflag="2" accept="image/*">
                <label class="custom-file-label" for="upload_image_3">Choose file</label>
            </div>
            <div class="col-md-2 text-center">
                <input type="hidden" name="service_inner_image1" id="service_inner_image1" value="">
                @if(isset($service->inner_image1))
                <div id="uploaded_image_3">
                    <img name="new_img" src="{{ url($service->inner_image1) }}" width="75" height="75" />
                </div>
                @else
                <div id="uploaded_image_3"></div>
                @endif
            </div>
        </div>
    </div>
    <div class="form-group">
        <label class="bg-label">Frontend View</label>
        <select name="frontend_view" class="form-control">
            @if(isset($service->frontend_view))
            <option @if($service->frontend_view == 'No') selected @else '' @endif value="No">No</option>
            <option @if($service->frontend_view == 'Yes') selected @else '' @endif value="Yes">Yes</option>
            @else
            <option value="No">No</option>
            <option value="Yes">Yes</option>
            @endif
        </select>
    </div>
    <div class="text-center">
        <button type="submit"  class="btn btn-primary theme-bg">{{ isset($service->id) ? 'Update' : 'Create' }}</button>
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

    {{-- Model - 3 --}}
    <div id="uploadimageModal2" class="modal" role="dialog">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header" style="display: block;">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h4 class="modal-title">Upload & Crop Image</h4>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="col-md-12 text-center">
                            <div id="image_demo2" style="margin-top:30px"></div>
                        </div>
                        <div class="col-md-12  text-center" style="padding-top:30px;">
                            <input type="hidden" name="crop_iflag2" id="crop_iflag2">
                            <button class="btn btn-success crop_image2">Crop Image</button>
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
        CKEDITOR.replace('Description');
    });
</script>
<script>
    $(document).ready(function () {
        $image_crop = $('#image_demo').croppie({
            enableExif: true,
            viewport: {
                width:200,
                height:200,
                format:'jpeg',
                quality:0,
                type:'square'
            },
            boundary:{
                width:520,
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
                    $('#service_features_image').val(response);
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
                width:758,
                height:407,
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
                    $('#service_inner_image').val(response);
                    $('#uploaded_image_2').html('<img name="new_img" src="' + response + '" width="75" height="75" />');
                    $('#upload_image_2').next('.custom-file-label').html('');
                    var fileName = $('#upload_image_2').val().split('\\').pop();
                    $('#upload_image_2').next('.custom-file-label').html(fileName);
                    
                }
            })
        });
    });
</script>
<script>
    $(document).ready(function () {
        $image_crop2 = $('#image_demo2').croppie({
            enableExif: true,
            viewport: {
                width:758,
                height:407,
                format:'jpeg',
                quality:0,
                type:'square'
            },
            boundary:{
                width:850,
                height:520
            }
        });
        $('#upload_image_3').on('change', function(){
            var reader = new FileReader();
            reader.onload = function (event) {
              $image_crop2.croppie('bind', {
                url: event.target.result
              }).then(function(){
                console.log('jQuery bind complete');
              });
            }
            var iflag = $(this).data("iflag");
            $('#crop_iflag2').val(iflag);
            reader.readAsDataURL(this.files[0]);
            $('#uploadimageModal2').modal('show');
        });
        $('.crop_image2').click(function(event){
            $image_crop2.croppie('result', {
                type: 'canvas',
                size: 'viewport'
            }).then(function(response){
                $('#uploadimageModal2').modal('hide');
                var crop_iflag = $('#crop_iflag2').val();
                if(crop_iflag == '2'){
                    $('#service_inner_image1').val(response);
                    $('#uploaded_image_3').html('<img name="new_img" src="' + response + '" width="75" height="75" />');
                    $('#upload_image_3').next('.custom-file-label').html('');
                    var fileName = $('#upload_image_3').val().split('\\').pop();
                    $('#upload_image_3').next('.custom-file-label').html(fileName);
                    
                }
            })
        });
    });
</script>
@stop

