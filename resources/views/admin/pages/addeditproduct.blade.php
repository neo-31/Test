@extends("admin.admin_app")
@section('title', 'Product')

@section("content")

<div class="block-header">
    <div class="row clearfix">
        <div class="col-lg-4 col-md-12 col-sm-12">
            <h1>{{ isset($product->product_name) ? 'Edit' : 'Add' }} Product</h1>
        </div>
        <div class="col-lg-8 col-md-12 col-sm-12 text-lg-right">
            <a href="{{ URL::to('admin/shop') }}" class="btn btn-primary theme-bg gradient btn-round"><i class="fa fa-sign-out"></i> Back To List</a>
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
                <h2>{{ isset($product->product_name) ? 'Edit: '. $product->product_name : 'Add product' }}</h2>
                <ul class="header-dropdown dropdown">
                    <li><a href="javascript:void(0);" class="full-screen"><i class="fa fa-expand"></i></a></li>
                </ul>
            </div>
            <div class="body">
                {!! Form::open(array('url' => array('admin/product/addproduct'),'class'=>'','name'=>'product_form','id'=>'product_form','role'=>'form','enctype' => 'multipart/form-data')) !!}
                    <input type="hidden" name="id" value="{{ isset($product->id) ? $product->id : null }}">
                    <div class="form-group row">
                        <div class="col-md-6">
                            <label>Product Name</label>
                            <input type="text" name="product_name" value="{{ isset($product->product_name) ? $product->product_name : null }}" class="form-control" required>
                        </div>
                        <div class="col-md-6">
                            <label>Reference Number</label>
                            <input type="text" name="reference" value="{{ isset($product->reference) ? $product->reference : null }}" class="form-control" required>
                        </div>
                    </div>
                    <div class="form-group row">
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
                                    @endif
                                </select>
                                <div class="input-group-append">
                                    <a href="{{url('admin/categories/addcategories')}}" class="btn btn-outline-success" type="button"><i class="fa fa-plus"></i> Add</a>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <label>Manufacturer</label>
                            <div class="input-group">
                                <select id="manufacturer_id" name="manufacturer_id" class="form-control">
                                    @if(isset($product->manufacturer_id))
                                                @foreach($manufacturer_list as $manufacturer)
                                                <option value="{{$manufacturer->id}}" @if($product->manufacturer_id==$manufacturer->id) selected @endif>{{$manufacturer->manufacturers_name}}</option>
                                                @endforeach
                                            @else
                                                @foreach($manufacturer_list as $manufacturer)
                                                <option value="{{$manufacturer->id}}">{{$manufacturer->manufacturers_name}}</option>
                                                @endforeach
                                            @endif                                                            </select>
                                <div class="input-group-append">
                                    <a href="{{url('admin/manufacturers/addmanufacturers')}}" class="btn btn-outline-success" type="button"><i class="fa fa-plus"></i> Add</a>
                                </div>
                            </div>
                        </div>

                    </div>
                    <div class="form-group row">
                        <div class="col-md-6">
                            <label>Product Slug</label>
                            <input type="text" id="product_slug" name="product_slug" value="{{ isset($product->product_slug) ? $product->product_slug : null }}" class="form-control" >
                        </div>
                        <div class="col-md-3">
                            <label>Product Quantity</label>
                            <input type="number" id="product_quantity" name="product_quantity"  step="1" min="1"
                            value="{{ isset($product->product_quantity) ? $product->product_quantity : null }}" class="form-control"  required
                            oninvalid="this.setCustomValidity('Product Quantity should be minimum 1.')" oninput="this.setCustomValidity('')" >
                        </div>
                        <div class="col-md-3">
                            <label>Product Weight(KG)</label>
                            <input type="number" id="product_weight" name="product_weight"  step="1" min="0"
                            value="{{ isset($product->product_weight) ? $product->product_weight : null }}" class="form-control"  required>
                        </div>
                    </div>
                    <div class="form-group row">
                       <div class="col-md-3">
                            <label>Is Price Require</label>
                            <div class="input-group">
                                <select id="is_price" name="is_price" class="form-control" onchange="price()">
                                        <option value="" selected disabled>Select Option</option>
                                        <option value="1" @if(isset($product->is_price) && $product->is_price == "1") selected @else '' @endif>Yes</option>
                                        <option value="0" @if(isset($product->is_price) && $product->is_price == "0") selected @else '' @endif>No</option>                                                     
                                </select>
                            </div> 
                        </div>   
                        <div class="col-md-3">
                            <label>Product Price</label>
                            <input type="number" id="product_price" name="product_price"  step="0.01" min="1.00"
                            value="{{ isset($product->product_price) ? $product->product_price : null }}" class="form-control"
                            oninput="this.setCustomValidity('')" >
                        </div>
                        <div class="col-md-3">
                            <label>Discount</label>
                            <div class="input-group">
                                <input type="number" id="product_discount" value="{{ isset($product->product_discount) ? $product->product_discount : null }}" name="product_discount" class="form-control">
                                <div class="input-group-prepend">
                                    <select id="product_discount_pf" name="product_discount_pf" class="form-control">
                                        <option value="Percent" @if(isset($product->product_discount_pf) && $product->product_discount_pf == "Percent") selected @else '' @endif>Percent</option>
                                        <option value="Fixed" @if(isset($product->product_discount_pf) && $product->product_discount_pf == "Fixed") selected @else '' @endif>Fixed</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <label>Price after discount</label>
                            <p class="form-control-static" id="product_price_after_discount" style="font-size: 1.5rem">{{ isset($product->product_price_after_discount) ? '£ '.$product->product_price_after_discount : "--" }}</p>
                            <input type="hidden" name="hf_price_dicut" id="hf_price_dicut" value="{{ isset($product->product_price_after_discount) ? $product->product_price_after_discount : null }}">
                        </div>
                        {{-- <div class="col-md-3">
                            <label>&nbsp</label>
                            @if(isset($product->google_merchant))
                            <div class="fancy-checkbox">
                                <label><input @if($product->google_merchant == 'Yes') checked @endif name="google_merchant" type="checkbox" class="form-control" value="Yes"><span>{{ __('Google Merchant') }}</span></label>
                            </div>
                            @else
                            <div class="fancy-checkbox">
                                <label><input name="google_merchant" type="checkbox" class="form-control" value="Yes"><span>{{ __('Google Merchant') }}</span></label>
                            </div>
                            @endif
                        </div> --}}
                    </div>
                    <div class="form-group row">
                        <div class="col-md-12">
                            <label>Short Description</label>
                            <textarea name="sort_description" value="{{ isset($product->sort_description) ? $product->sort_description : null }}" rows="4" cols="50" class="form-control">{{ isset($product->sort_description) ? $product->sort_description : null }}</textarea>

                        </div>
                    </div>
                    <div class="form-group">
                        <label>Description</label>
                        <textarea name="long_description" value="{{ isset($product->description) ? $product->description : null }}" rows="4" cols="50" class="form-control">{{ isset($product->description) ? $product->description : null }}</textarea>
                    </div>

                    <div class="form-group row">
                        <label class="col-md-12">Featured Image</label>
                        <div class="input-group col-md-12">
                            <div class="custom-file">
                                <input type="file" class="custom-file-input" id="upload_image_1" data-iflag="0">
                                <label class="custom-file-label" for="upload_image_1">Choose file</label>
                            </div>
                            <div class="col-md-2 text-center">
                                <input type="hidden" name="product_features_image" id="product_features_image" value="">
                                @if(isset($product->product_image))
                                <div id="uploaded_image_1">
                                    <img name="new_img" src="{{ url($product->product_image) }}" width="75" height="75" />
                                </div>
                                @else
                                <div id="uploaded_image_1"></div>
                                @endif
                            </div>
                        </div>
                    </div>


                        <div class="form-group row">
                            <div class="col-md-6">
                            <label>Product Image 1</label>

                            <div class="input-group">
                                <div class="custom-file">
                                    <input type="file" class="custom-file-input upld" id="inputGroupFile04_5" data-iflag="5">
                                    <label class="custom-file-label" for="inputGroupFile04_5">Choose file</label>
                                </div>
                                <div class="text-center ml-2">
                                    <input type="hidden" name="product_img_5" id="product_img_5" value="">
                                    @if(isset($product->product_images1))
                                    <div id="uploaded_image_5">
                                        <img name="new_img" src="{{ url($product->product_images1) }}" width="75" height="75" />
                                    </div>
                                    @else
                                    <div id="uploaded_image_5"></div>
                                    @endif
                                </div>
                            </div>
                        </div>

                    <div class=" col-md-6">

                            <label>Product Image 2</label>
                            <div class="input-group">
                                <div class="custom-file">
                                    <input type="file" class="custom-file-input upld" id="inputGroupFile04_6" data-iflag="6">
                                    <label class="custom-file-label" for="inputGroupFile04_6">Choose file</label>
                                </div>
                                <div class="text-center ml-2">
                                    <input type="hidden" name="product_img_6" id="product_img_6" value="">
                                    @if(isset($product->product_images2))
                                    <div id="uploaded_image_6">
                                        <img name="new_img" src="{{ url($product->product_images2) }}" width="75" height="75" />
                                    </div>
                                    @else
                                    <div id="uploaded_image_6"></div>
                                    @endif
                                </div>

                        </div></div></div>
                         <div class="form-group row">
                             <div class="col-md-6">
                            <label>Product Image 3</label>
                            <div class="input-group">
                                <div class="custom-file">
                                    <input type="file" class="custom-file-input upld" id="inputGroupFile04_7" data-iflag="7">
                                    <label class="custom-file-label" for="inputGroupFile04_7">Choose file</label>
                                </div>
                                <div class="text-center ml-2">
                                    <input type="hidden" name="product_img_7" id="product_img_7" value="">
                                    @if(isset($product->product_images3))
                                    <div id="uploaded_image_7">
                                        <img name="new_img" src="{{ url($product->product_images3) }}" width="75" height="75" />
                                    </div>
                                    @else
                                    <div id="uploaded_image_7"></div>
                                    @endif
                                </div>
                            </div>
                        </div>
                         <div class="col-md-6">
                            <label>Product Image 4</label>
                            <div class="input-group">
                                <div class="custom-file">
                                    <input type="file" class="custom-file-input upld" id="inputGroupFile04_8" data-iflag="8">
                                    <label class="custom-file-label" for="inputGroupFile04_8">Choose file</label>
                                </div>
                                <div class="text-center ml-2">
                                    <input type="hidden" name="product_img_8" id="product_img_8" value="">
                                    @if(isset($product->product_images4))
                                    <div id="uploaded_image_8">
                                        <img name="new_img" src="{{ url($product->product_images4) }}" width="75" height="75" />
                                    </div>
                                    @else
                                    <div id="uploaded_image_8"></div>
                                    @endif
                                </div>
                            </div>
                        </div>
                    </div>



                    <div class="text-center">
                        <button type="submit" class="btn btn-primary theme-bg">{{ isset($product->id) ? 'Update' : 'Create' }}</button>
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
    $(document).ready(function () {
        $('#product_form').validate({
            rules: {
                product_quantity: {
                    number: true
                },
                product_price: {
                    number: true
                }
            },
            messages: {

                product_quantity: {
                    number: 'Please enter Valid numbers.'
                },
                product_price: {
                    number: 'Please enter Valid Price.'
                }
            },
            submitHandler: function (form) {
                form.submit();
            }
        });
    });
</script>
<script>
    $(document).ready(function () {
        $image_crop = $('#image_demo').croppie({
            enableExif: true,
            viewport: {
                width:345,
                height:292,
                format:'jpeg',
                quality:0,
                type:'square'
            },
            boundary:{
                width:520,
                height:420
            }
        });
          $('.upld').on('change', function(){
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

                    $('#product_features_image').val(response);
                    $('#uploaded_image_1').html('<img name="new_img" src="' + response + '" width="75" height="75" />');
                }
                 else if(crop_iflag == '5'){
                         $('#product_img_5').val(response);
                          $('#uploaded_image_5').html('<img name="new_img_5" src="' + response + '" width="75" height="75" />');
                      }
                      else if(crop_iflag == '6'){
                         $('#product_img_6').val(response);
                          $('#uploaded_image_6').html('<img name="new_img_5" src="' + response + '" width="75" height="75" />');
                      }
                      else if(crop_iflag == '7'){
                         $('#product_img_7').val(response);
                          $('#uploaded_image_7').html('<img name="new_img_5" src="' + response + '" width="75" height="75" />');
                      }
                      else if(crop_iflag == '8'){
                         $('#product_img_8').val(response);
                          $('#uploaded_image_8').html('<img name="new_img_5" src="' + response + '" width="75" height="75" />');
                      }

            })
        });
    });
</script>
<script>
    $(document).ready(function () {
        $('body').on("keyup", '#product_discount', function () {
            var product_price = $('#product_price').val();
            var product_discount = $(this).val();
            var product_discount_pf = $('#product_discount_pf').val();
            if(product_discount_pf == 'Percent'){
                var price_after_discount = parseFloat(product_price) - ((parseFloat(product_price) * parseFloat(product_discount))/100);
            }else{
                var price_after_discount = parseFloat(product_price) - parseFloat(product_discount);
            }
            $('#product_price_after_discount').html(price_after_discount ? "£"+price_after_discount : 0);
            $('#hf_price_dicut').val(price_after_discount);
        });
    });

    $(document).ready(function () {
        $('body').on("keyup", '#product_price', function () {
            var product_discount = $('#product_discount').val();
            var product_price = $(this).val();
            var product_discount_pf = $('#product_discount_pf').val();
            if(product_discount_pf == 'Percent'){
                var price_after_discount = parseFloat(product_price) - ((parseFloat(product_price) * parseFloat(product_discount))/100);
            }else{
                var price_after_discount = parseFloat(product_price) - parseFloat(product_discount);
            }
            $('#product_price_after_discount').html(price_after_discount ? "£"+price_after_discount : 0);
            $('#hf_price_dicut').val(price_after_discount);
        });
    });
    $(document).ready(function () {
        $('body').on("change", '#product_discount_pf', function () {

            var product_discount = $('#product_discount').val();
            var product_price = $('#product_price').val();
            var product_discount_pf = $(this).val();
            if(product_discount_pf == 'Percent'){
                var price_after_discount = parseFloat(product_price) - ((parseFloat(product_price) * parseFloat(product_discount))/100);
            }else{
                var price_after_discount = parseFloat(product_price) - parseFloat(product_discount);
            }
            $('#product_price_after_discount').html(price_after_discount ? "£"+price_after_discount : 0);
            $('#hf_price_dicut').val(price_after_discount);
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

        $('.crop_image1').click(function(event){
            $image_crop1.croppie('result', {
                type: 'canvas',
                size: 'viewport'
            }).then(function(response){
                $('#uploadimageModal1').modal('hide');
                var crop_iflag = $('#crop_iflag1').val();
                if(crop_iflag == '1'){
                    $('#product_inner_image').val(response);
                   // $('#uploaded_image_2').html('<img name="new_img" src="' + response + '" width="75" height="75" />');
                }
            })
        });
    });
  
   $(document).ready(function () {
            $('#is_price').change(function(){
                var price =$(this).val();

                if(price=='1')
                {
                    $('#product_price').attr('required','true');
                    $('#product_discount').attr('required','true');
                  
                }
                if(price=='0')
                {
                    $('#product_price').removeAttr('required');
                     $('#product_discount').removeAttr('required');
                  
                }
            });
    });   
</script>
@stop
