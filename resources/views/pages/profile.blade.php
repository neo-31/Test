@extends('layouts.app')
@section('title', 'Profile Setting')
@section('meta_description', 'we will ensure you get the maximum value back for your hardware! Get a Quote Online to Sell your Networking Equipment: effortless, Secure, & Precious!')

@section('content')

        <!-- Page title -->
        {{-- <div class="page-title parallax parallax2">
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <div class="page-title-heading">
                            <h1>Profile Setting</h1>
                        </div>
                    </div>
                </div>
            </div>
        </div> --}}<!-- /.page-title -->

        {{-- <div class="page-breadcrumbs">
            <div class="container">
                <div class="row">
                    <div class="flat-wrapper">
                        <div class="breadcrumbs">
                            <h2 class="trail-browse">You are here:</h2>
                            <ul class="trail-items">
                                <li class="trail-item"><a href="{{url('/')}}">Home</a></li>
                                <li>Profile Setting</li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div> --}}<!-- /.page-breadcrumbs -->

        <div class="flat-row">
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <div class="tracking-form-div" style="margin-top: 6em;">

                            <div class="row">
                                <div class="col-md-offset-3 col-md-6">
                                    <h3 class="flat-title-section style mag-top0px">Profile <span>Setting</span></h3>
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

                                    {!! Form::open(array('url' => 'myaccount/profile','class'=>'profile_form','id'=>'profile_form','role'=>'form')) !!}

                                        <div class="pure-control-group abs">
                                            <label>First Name</label>
                                            <input type="hidden" id="id" name="id" value="{{ Auth::user()->id }}">
                                            <input type="text" id="firstname" name="firstname" value="{{ Auth::user()->firstname }}"
                                            required placeholder="Enter First Name">
                                        </div>
                                        <div class="pure-control-group abs">
                                            <label>Last Name</label>
                                            <input type="text" id="lastname" name="lastname" value="{{ Auth::user()->lastname }}"
                                            required placeholder="Enter Last Name">
                                        </div>
                                        <div class="pure-control-group abs">
                                            <label>Business Name</label>
                                            <input type="text" id="business_name" name="business_name" value="{{ Auth::user()->business_name }}"
                                            placeholder="Enter Business Name">
                                        </div>

                                        <div class="pure-control-group abs">
                                            <label>Telephone 1</label>
                                            <input type="text" id="phone" name="phone" value="{{ Auth::user()->phone }}"
                                            required placeholder="Enter Telephone Number 1"  maxlength="10" onkeyup="numberOnly(this)">
                                        </div>
                                        <div class="pure-control-group abs">
                                            <label>Telephone 2</label>
                                            <input type="text" id="phone_2" name="phone_2" value="{{ Auth::user()->phone_2 }}"
                                            placeholder="Enter Telephone Number 2" maxlength="10" onkeyup="numberOnly(this)">
                                        </div>

                                        <div class="pure-control-group abs">
                                            <label>Email</label>
                                            <input type="email" id="email" name="email" value="{{ Auth::user()->email }}"
                                            required placeholder="Enter Email Id 1">
                                        </div>
                                        <div class="pure-control-group abs">
                                            <label>Email 2</label>
                                            <input type="email" id="email_2" name="email_2" value="{{ Auth::user()->email_2 }}"
                                            placeholder="Enter Email Id 2">
                                        </div>

                                        <div class="pure-control-group abs">
                                            <label>Shipping Address</label>
                                            <textarea id="shipping_address" name="shipping_address" required placeholder="Enter Shipping Address">{{ trim(Auth::user()->shipping_address) }}</textarea>
                                        </div>
                                        <div class="pure-control-group abs">
                                            <label>Delivery Address</label>
                                            <textarea id="delivery_address" name="delivery_address" required placeholder="Enter Delivery Address">{{ trim(Auth::user()->delivery_address) }}</textarea>
                                        </div>

                                        <div class="pure-control-group abs">
                                            <label>Postal Code</label>
                                            <input type="text" id="postal_code" name="postal_code" value="{{ Auth::user()->postal_code }}"
                                            placeholder="Enter Postal Code" maxlength="6" onkeyup="numberOnly(this)"  required>
                                        </div>
                                        <div class="pure-control-group abs">
                                            <label>Country</label>
                                            <select id="country" name="country" required>
                                                <option value=""> Select Country</option>
                                                @foreach ($allcountries as $country)
                                                    <option value="{{$country->id}}"  data-value="{{$country->country_name}}"
                                                        @if(isset(Auth::user()->country) && Auth::user()->country == $country->id) selected @else '' @endif >{{$country->country_name}}</option>
                                                @endforeach
                                                {{-- <option value="UK" @if(Auth::user()->country == "UK"){{"selected"}}@endif > UK</option>
                                                <option value="US" @if(Auth::user()->country == "US"){{"selected"}}@endif > US</option>
                                                <option value="SPAIN" @if(Auth::user()->country == "SPAIN"){{"selected"}}@endif > SPAIN</option> --}}
                                            </select>
                                        </div>

                                        <div class="pure-control-group abs">
                                            <label>Profile Photo</label>
                                            <input type="file" class="form-control" id="upload_image" data-iflag="0">
                                            <br>

                                            <input type="hidden" name="image_icon" id="image_icon" value="">
                                            @if(Auth::user()->image_icon != "default.png")
                                            <div id="uploaded_image">
                                                <img name="new_img" src="{{ url(Auth::user()->image_icon) }}" width="75" height="75" />
                                            </div>
                                            @else
                                            <div id="uploaded_image"></div>
                                            @endif

                                        </div>

                                        <div class="flat-divider d30px"></div>
                                        <div class="text-center">
                                            <input type="submit" value="Submit">
                                        </div>

                                    {!! Form::close() !!}
                                </div>
                            </div>
                        </div><!-- /.tracking-form-div -->
                    </div><!-- /.col-md-12 -->
                </div><!-- /.row -->
            </div><!-- /.container -->
        </div><!-- /.flat-row -->

        <div class="container">
            <div id="uploadimageModal" class="modal" role="dialog">
                <div class="modal-dialog modal-md">
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

        @section('page-style')
        <link rel="stylesheet" href="{{ asset('public/assets/crop-image/croppie.css') }}" />
        <style>
            .header-v3 .header .header-wrap{
                position: absolute;
            }
            input[type="password"] {
                width: 100%;
            }
            @media (min-width: 992px) {
                .modal-lg {
                max-width: 950px;
                width: 950px;
                }
            }
        </style>

        @endsection

        @section('page-script')
        <script src="{{ asset('public/assets/crop-image/croppie.js') }}"></script>
        <script>
            function numberOnly(input) {
                var regex = /[^0-9]/gi;
                input.value = input.value.replace(regex, "");
            }
        </script>
        <script>
            $(document).ready(function () {
                $image_crop = $('#image_demo').croppie({
                    enableExif: true,
                    viewport: {
                        width:140,
                        height:140,
                        format:'jpeg',
                        quality:0,
                        type:'round'
                    },
                    boundary:{
                        width:500,
                        height:500
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

        @endsection
