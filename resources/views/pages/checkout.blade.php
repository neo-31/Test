@extends('layouts.app')
@section('title', 'Checkout')
@section('meta_description', 'we will ensure you get the maximum value back for your hardware! Get a Quote Online to Sell your Networking Equipment: effortless, Secure, & Precious!')

@section('content')

        <!-- Page title -->
        <div class="page-title parallax parallax2">
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <div class="page-title-heading">
                            <h1>Checkout</h1>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- /.page-title -->
        <div class="page-breadcrumbs">
            <div class="container">
                <div class="row">
                    <div class="flat-wrapper">
                        <div class="breadcrumbs">
                            <h2 class="trail-browse">You are here:</h2>
                            <ul class="trail-items">
                                <li class="trail-item"><a href="{{url('/')}}">Home</a></li>
                                <li>Checkout</li>
                            </ul>
                        </div><!-- /.breadcrumbs -->
                    </div><!-- /.flat-wrapper -->
                </div><!-- /.row -->
            </div><!-- /.container -->
        </div><!-- /.page-breadcrumbs -->

        <div class="flat-row flat-general sidebar-right pad-bottom75px">
            <div class="container">
                <div class="row">
                    <div class="general">
                        <div class="registercontpage">
                            <div class="stepwizard col-md-offset-3">
                                <div class="stepwizard-row setup-panel">
                                    <div class="stepwizard-step">
                                        <a href="#step-1" type="button" class="btn btn-circle btn-default1 btn-primary">1</a>
                                        <p>Step 1</p>
                                    </div>

                                    <div class="stepwizard-step">
                                        <a href="#step-2" type="button" class="btn btn-default1 btn-circle" disabled="disabled">2</a>
                                        <p>Step 2</p>
                                    </div>

                                </div>
                            </div>

                            @if (count($errors) > 0)
                            <div class="alert alert-danger alert-dismissible" role="alert">
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                @foreach ($errors->all() as $error)
                                    <b>{{ $error }}</b><br>
                                @endforeach
                            </div>
                            @endif

                            @if(Session::has('flash_message'))
                            <div class="alert alert-success">
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                {{ Session::get('flash_message') }}
                            </div>
                            @endif
                            <form method="POST" action="{{ route('checkout.store') }}" id="checkout_form" class="checkout_form" aria-label="{{ __('checkout') }}">
                                @csrf

                                <div class="row setup-content" id="step-1" style="display: block;">
                                    <div class="col-md-12" >
                                        <h3 style="padding-left: 30px;">Shipping Address</h3>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="col-md-12">
                                            <input type="hidden" name="actual_price" value="{{ round($grandtotal, 2) }}">
                                            <input type="hidden" name="total_quantity" value="{{$total_quantity}}">
                                            <div class="form-group field ">
                                                <label class="control-label main col-md-4">First Name<span style="color:red;">* </span>:</label>
                                                <div class="col-md-8">

                                                    <input maxlength="100" minlength="3" type="text" id="reg_fname" name="firstname" value="{{ Auth::user()->firstname }}"
                                                        required="required" placeholder="Enter First Name"  data-error="Minimum 3 character required">
                                                    <div class="help-block with-errors"></div>
                                                </div>
                                            </div>

                                            <div class="form-group field ">
                                                <label class="control-label main col-md-4">Last Name<span style="color:red;">* </span>:</label>
                                                <div class="col-md-8">
                                                    <input maxlength="100" minlength="3" type="text" id="reg_lname" name="lastname" value="{{ Auth::user()->lastname }}"
                                                        required="required" placeholder="Enter Last Name" data-error="Enter your Lastname">
                                                    <div class="help-block with-errors"></div>
                                                </div>
                                            </div>
                                            <div class="form-group field ">
                                                <label class="control-label main col-md-4">Business Name :</label>
                                                <div class="col-md-8">
                                                    <input maxlength="100" minlength="3" type="text" id="reg_business_name" name="business_name" value="{{ Auth::user()->business_name }}"
                                                        placeholder="Enter Business Name" data-error="Enter your Lastname">
                                                    <div class="help-block with-errors"></div>
                                                </div>
                                            </div>

                                            {{-- <div class="form-group field ">
                                                <label class="control-label main col-md-4">Telephone<span style="color:red;">* </span>:</label>
                                                <div class="col-md-8">
                                                    <input type="text" placeholder="Telephone Number" onkeyup="numberOnly(this)"
                                                        required="required" id="usr_telephone" name="usr_telephone" maxlength="10">
                                                </div>
                                            </div> --}}

                                            <div class="form-group field ">
                                                <label class="control-label main col-md-4">Telephone 1 :</label>
                                                <div class="col-md-8">
                                                    <input type="text" placeholder="Enter Telephone Number 1"  value="{{ Auth::user()->phone }}"
                                                        onkeyup="numberOnly(this)"  id="reg_mobile" name="phone" maxlength="10" data-error="enter your Telephone number 1" >
                                                </div>
                                            </div>
                                            <div class="form-group field ">
                                                <label class="control-label main col-md-4">Telephone 2 :</label>
                                                <div class="col-md-8">
                                                    <input type="text" placeholder="Enter Telephone Number 2"  value="{{ Auth::user()->phone_2 }}"
                                                        onkeyup="numberOnly(this)"  id="reg_mobile_2" name="phone_2" maxlength="10" data-error="enter your Telephone number 1" >
                                                </div>
                                            </div>

                                            <div class="form-group field ">
                                                <label class="control-label main col-md-4">Email <span style="color:red;">* </span></label>
                                                <div class="col-md-8">
                                                    <input type="email" placeholder="Enter email id" id="usr_regemail" name="email"
                                                        value="{{ Auth::user()->email }}" readonly  required>
                                                </div>
                                            </div>
                                            <div class="form-group field ">
                                                <label class="control-label main col-md-4">Email 2 :</label>
                                                <div class="col-md-8">
                                                    <input type="email" placeholder="Enter email id 2" id="usr_regemail2" name="email_2"
                                                        value="{{ Auth::user()->email_2 }}">
                                                </div>
                                            </div>

                                            <div class="form-group field ">
                                                <label class="control-label main col-md-4">Shipping Address <span style="color:red;">* </span>:</label>
                                                <div class="col-md-8">
                                                    <textarea placeholder="Enter Shipping Address" id="shipping_address" name="shipping_address"
                                                    required="required">{{ trim(Auth::user()->shipping_address) }}</textarea>
                                                </div>
                                            </div>
                                            <div class="form-group field ">
                                                <label class="control-label main col-md-4">Delivery Address <span style="color:red;">* </span>:</label>
                                                <div class="col-md-8">
                                                    <textarea placeholder="Enter Delivery Address" id="delivery_address" name="delivery_address"
                                                    required="required">{{ trim(Auth::user()->delivery_address) }}</textarea>
                                                </div>
                                            </div>

                                            <div class="form-group field ">
                                                <label class="control-label main col-md-4">Postal Code <span style="color:red;">* </span>:</label></label>
                                                <div class="col-md-8">
                                                    <input type="text" placeholder="Postal Code"  value="{{ Auth::user()->postal_code }}" required="required"
                                                        onkeyup="numberOnly(this)"  id="reg_mobile" name="postal_code" maxlength="6" data-error="enter your Postal Code" >
                                                </div>
                                            </div>
                                            <div class="form-group field ">
                                                <label class="control-label main col-md-4">Country <span style="color:red;">* </span>:</label></label>
                                                <div class="col-md-8">
                                                    <select id="country" name="country" required="required">
                                                        <option value=""> Select Country</option>
                                                        @foreach ($allcountries as $country)
                                                            <option value="{{$country->id}}"  data-value="{{$country->country_name}}"
                                                                 @if(isset(Auth::user()->country) && Auth::user()->country == $country->id) selected @else '' @endif >{{$country->country_name}}</option>
                                                        @endforeach
                                                    </select>

                                                </div>

                                            </div>

                                            <button class="btn btn-warning nextBtn btn-lg pull-right" type="button">Next</button>

                                        </div>
                                    </div>

                                </div>
                                <div class="row setup-content" id="step-2" style="display: none;">
                                    <div class="col-md-12" >
                                        <h3 style="padding-left: 30px;">Payment Process</h3>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="col-md-12">
                                            <div class="form-group field">
                                                <ul class="wc_payment_methods">
                                                    {{-- <li class="wc_payment_method payment_method_cheque">
                                                        <div class="form-group form-group--check m-t-0 m-b-47">
                                                            <input class="au-checkbox" type="checkbox" checked="checked" id="cre2">
                                                            <label for="cre2">Check payment</label>
                                                        </div>
                                                        <div class="payment_box payment_method_cheque">
                                                            <p>Please send a check to Store Name, Store Street, Store Town, Store State / County, Store Postcode.</p>
                                                        </div>
                                                    </li> --}}

                                                    <li class="wc_payment_method payment_method_paypal">
                                                        <div class="form-group form-group--check m-t-0 m-b-47">
                                                            <input class="au-checkbox" type="checkbox" checked id="cre3">
                                                            <label for="cre3">Stripe</label>
                                                        </div>
                                                        <span class="payment_desc">
                                                            <!--<img src="{{ asset('public/skin/images/icon/paypal.png') }}" alt="Paypal">-->
                                                            <i class="fa fa-cc-stripe" style="font-size:30px"></i>
                                                            <a href="#">What is Stripe?</a>
                                                        </span>
                                                    </li>

                                                </ul>
                                                <div class="form-group field ">
                                                    <label class="ideal-radiocheck-label" onclick="">
                                                    <input type="checkbox" name="term_condition"  checked id="termscondition" value="Agreed" required> I Agree <a href="#">Terms &amp; Conditions</a></label>
                                                    <br><label for="term_condition" class="error"></label>
                                                </div>

                                            </div>

                                            <div class="col-md-offset-4 col-md-8">
                                                <label class="ideal-radiocheck-label" onclick="">
                                            </div>
                                            @php
                                                $cookie_total = round($grandtotal, 2);
                                                /* if (isset($_COOKIE['total'])) {
                                                    // header('Refresh: 0; url=?setcookie=done');
                                                    $cookie_total = $_COOKIE['total'];
                                                } else {
                                                    $cookie_total = "0";
                                                } */

                                            @endphp
                                            @if ($count_cart_data > 0)
                                            <div class="form-group field">
                                                <script type="text/javascript"
                                                    src="https://checkout.stripe.com/checkout.js"
                                                    class="stripe-button"
                                                    data-key="pk_test_51JMqdHDs0GriRjr56qgjDtm7DMNgeAGoqVCmCyoEhuaohwUNxafbwysRaaadRNYgG1A5yxSLnMxgVbkYE1SSCCRL00WV797JyT"
                                                    data-amount="<?php echo $cookie_total * 100;  ?>"
                                                    data-name="VDR Resale"
                                                    data-description="Sell Your IT Equipment At The Right Price"
                                                    data-currency="GBP">
                                                </script>
                                                <style>
                                                    .stripe-button-el span{
                                                        background: linear-gradient( to right, #d7b854 0%, #d7b854 50%, #d7b854 100% ) !important;
                                                        color: black !important;
                                                        padding: 11px 32px !important;
                                                        text-align: center !important;
                                                        text-decoration: none !important;
                                                        display: inline-block !important;
                                                        font-size: 16px !important;
                                                        margin: -1px !important; cursor: pointer !important;
                                                        height: auto;
                                                    }
                                                </style>
                                                {{-- <a class="au-btn au-btn--solid au-btn-lg" href="#">Place order</a> --}}
                                                {{-- <button type="submit" class="au-btn au-btn--solid au-btn-lg">{{ __('Place Order') }}</button> --}}
                                            </div>
                                            @endif


                                        {{-- <button id="finalsubmit" class="btn btn-warning  btn-lg pull-right" type="submit">Order Now</button> --}}

                                    </div>
                                </div>

                            </form>

                        </div>
                        </div>
                        {{-- <div class="flat-divider d20px"></div> --}}
                        {{-- <div class="pull-right">
                            <a href="{{ URL::to('shop') }}"><button class=""> Update Shipping Basket</button></a>
                        </div> --}}

                    </div><!-- /.general -->

                    <div class="general-sidebars">
                        <div class="sidebar-wrap">
                            <div class="sidebar">
                                <div class="widget widget_product_categories" style="padding: 30px 19px;">
                                    <h4 class="widget-title">Order Summary</h4>
                                    <h6 style="margin-top: 20px;">Item in Busket</h6>
                                    <hr>
                                    <table id="subtotal_tbl" class="table table-borderless" border="0" style="width:100%">
                                        <tbody>
                                            @foreach ($cart_data as $data)
                                            <tr>
                                                <td>
                                                    <img src="{{ url($data->product_image) }}" width="100" alt="images">
                                                </td>
                                                <td>
                                                    <p><b>{{$data->product_name}}</b></p>
                                                    <p>Qty: {{$data->quantity}}</p>
                                                </td>
                                                <td>
                                                    <p><b>£{{$data->product_price*$data->quantity}}</b></p>
                                                    {{-- <small>Excl. VAT $xx</small> --}}
                                                </td>

                                            </tr>
                                            @endforeach

                                            <tr class="tbl_border_top">
                                                <td  colspan="2"><b>Subtotal</b></td>
                                                <td>£{{ round($subtotal, 2) }}</td>
                                            </tr>
                                            <tr>
                                                <td  colspan="2"><b>Tax(VAT)</b></td>
                                                <td  style="display: inherit;"> £{{$tax}}
                                                    <small>
                                                        <i class="fa fa-plus text-success" style="font-size: small;"></i>
                                                        {{-- <i class="fa fa-minus text-success" style="font-size: small;"></i> --}}
                                                    </small>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td  colspan="2"><b>Shipping Charge</b></td>
                                                <td>£{{$shppingcharge}}</td>
                                            </tr>
                                            <tr>
                                                <td  colspan="2"><b>Standard Shipping Charge</b></td>
                                                <td id="standard_charge">£0.00</td>
                                            </tr>
                                            <!--<tr>
                                                <td  colspan="2"><b>Weight Shipping Charge</b></td>
                                                <td id="weight_charge">£0.00</td>
                                            </tr>-->
                                            <tr class="tbl_border_top">
                                                <td  colspan="2"><b>Total</b></td>
                                                <td id="grandtotal">£{{ round($grandtotal, 2) }}</td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div><!-- /.widget_product_categories -->
                            </div><!-- /.sidebar -->
                        </div><!-- /.sidebar-wrap -->
                    </div><!-- /.general-sidebars -->
                </div><!-- /.row -->
            </div><!-- /.container -->
        </div><!-- /.blog -->

        @endsection

        @section('page-style')
        {{-- <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.2/css/bootstrap.css"> --}}
        <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.11.1/css/dataTables.bootstrap4.min.css">
        <style>
            .header-v3 .header .header-wrap{
                position: absolute;
            }
            table.table-bordered.dataTable tbody th, table.table-bordered.dataTable tbody td {
                vertical-align: baseline;
            }
            #subtotal_tbl .table > thead > tr > th, .table > tbody > tr > th, .table > tfoot > tr > th, .table > thead > tr > td, .table > tbody > tr > td, .table > tfoot > tr > td{
                border-top: 0px solid #ddd;
            }
            .tbl_border_top{
                border-top: 1px solid #ddd;
            }
            @media only screen and (min-width: 991px){
                .flat-general .general {
                    width: 60%;
                }
                .flat-general .general-sidebars {
                    width: 40%;
                }
            }
        </style>
        <style>
            /* step form css */
            .registercontpage {
                position: relative;
                z-index: 0;
                background: #fff;
                padding-top: 15px;
                padding-bottom: 15px;
            }
            .btn-circle {
                width: 30px;
                height: 30px;
                text-align: center;
                padding: 10px;
                font-size: 12px;
                border-radius: 50px;
            }
            .btn-circle{
                background:#000;
            }
            .btn-default[disabled]{
                    background-color: #FFFFFF;
                    border-color: #cccccc;
            }
            .stepwizard-step p {
                margin-top: 10px;
            }
            .stepwizard-row {
                display: table-row;
            }
            .stepwizard {
                display: table;
                width: 50%;
                position: relative;
            }
            .stepwizard-step button[disabled] {
                opacity: 1 !important;
                filter: alpha(opacity=100) !important;
            }
            .stepwizard-row:before {
                top: 14px;
                bottom: 0;
                position: absolute;
                content: " ";
                width: 100%;
                height: 1px;
                background-color: #ccc;
                z-order: 0;
            }
            .stepwizard-step {
                display: table-cell;
                text-align: center;
                position: relative;
            }
            .btn-circle {
                width: 30px;
                height: 30px;
                text-align: center;
                padding: 6px 0;
                font-size: 12px;
                line-height: 1.428571429;
                border-radius: 15px;
            }
            .field {
                position: relative;
                float: left;
                clear: both;
                margin: .35em 0;
                width: 100%;
            }
            .btn-default {
                color: #E0C463;
            }
            .btn-primary {
                color: #ffffff;
            }

            /* .form-control {
                display: block;
                width: 100%;
                height: 38px;
                padding: 6px 12px;
                font-size: 14px;
                line-height: 1.42857143;
                color: #555;
                background-color: #fff;
                background-image: none;
                border: 1px solid #ccc;
                border-radius: 4px;
                -webkit-box-shadow: inset 0 1px 1px rgba(0,0,0,.075);
                box-shadow: inset 0 1px 1px rgba(0,0,0,.075);
                -webkit-transition: border-color ease-in-out .15s,-webkit-box-shadow ease-in-out .15s;
                -o-transition: border-color ease-in-out .15s,box-shadow ease-in-out .15s;
                transition: border-color ease-in-out .15s,box-shadow ease-in-out .15s;
            } */
            .help-block {
                margin-top: 0px !important;
            }
        </style>

        @endsection

        @section('page-script')
        <script type="text/javascript" src="https://js.stripe.com/v2/"></script>
        {{-- <script src="https://js.stripe.com/v3/"></script> --}}
        <script src="http://ajax.aspnetcdn.com/ajax/jquery.validate/1.11.1/jquery.validate.js"></script>
        <script>
            $(document).ready(function() {
                $.cookie("total", null);
                $.cookie("total", {{ $grandtotal }});
                // alert($.cookie('total'));
                $('#country').change(function(){
                    getShippingCharges();
                }).trigger("change");


                /* $('#example').DataTable({
                    "searching": false
                }); */
            } );
            function getShippingCharges(){

                    var country = $('#country').val();
                    var state = $('#state_id').val();
                    var delivery_days = $('#delivery_days').val();
                    var subtotal = {{$subtotal}};
                    var totalweight = {{$total_weight}};

                    var ajax_url = "{{ url('ajax/checkout/shippingcharges')}}";
                    var _token = $("input[name='_token']").val();

                    $.ajaxSetup({
                        headers: {
                            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                        }
                    });
                    jQuery.ajax({

                        url: ajax_url,
                        method: 'post',
                        cache: false,
                        crossDomain: true,
                        dataType: 'JSON',
                        xhrFields: {
                            withCredentials: true
                        },
                        data: {_token:_token, country:country, state:state, delivery_days:delivery_days, subtotal:subtotal, totalweight:totalweight},
                        success: function(result){
                            debugger;
                            //alert(result.main_total);
                            //return false;
                            var shipping_charge = result.shipping_charge;
                            var standard_charge = result.standard_charge;
                            var weight_charge = result.weight_shippingcharge;
                            var subtotal_excl = result.subtotal_excl;
                            var main_total = result.main_total;
                            var grandtotal = result.grandtotal;
                            var stripe_grandtotal = result.grandtotal*100;
                            var tax = result.tax;


                            // alert(result.subtotal);
                            // $("#tax").html('£'+ tax);
                            // $("#shppingcharge").html('£'+ shipping_charge);
                            // $("#standard_charge").html('£'+ standard_charge);
                            // $("#grandtotal").html('£'+ grandtotal);
                            // $("#weight_charge").html('£'+ weight_charge);
                            // $("#weight_shippingcharge").val(weight_charge);
                            // $("#stripe_amt").val(stripe_grandtotal);

                            // $.removeCookie("total");
                            // alert($.cookie('total'));
                            // $.cookie("total", grandtotal);
                            // var totals = $.cookie("total", grandtotal);
                            
                            // $('#refresh_inputs').load(document.URL + ' #refresh_inputs');


                            // alert($.cookie('total'));
                            //console.log({{Cookie::get('grand_total')}});

                            /* $('.stripe-button').attr('data-amount', stripe_grandtotal);
                            $(".stripe-button").data("amount", stripe_grandtotal);
                            var stripe_payment = $(".stripe-button").attr("data-amount");
                            alert(stripe_payment); */
                        }
                    });
                }
        </script>
        <script>
            function numberOnly(input) {
                var regex = /[^0-9]/gi;
                input.value = input.value.replace(regex, "");
            }

            $(document).ready(function() {
                $('#checkout_form').validate({
                    rules: {
                        firstname: {
                            required: true,
                        },
                        lastname: {
                            required: true,
                        },
                        phone: {
                            required: true,
                            digits: true
                        },
                        phone_2: {
                            digits: true
                        },
                        email: {
                            required: true,
                            email: true
                        },
                        email_2: {
                            email: true
                        },
                        shipping_address: {
                            required: true,
                        },
                        delivery_address: {
                            required: true,
                        },
                        postal_code: {
                            required: true,
                            digits: true
                        },
                        country: {
                            required: true,
                        },
                        term_condition: {
                            required: true,
                        }
                    },
                    messages: {
                        firstname: "Please Enter Firstname Please enter at least 3 characters.",
                        lastname: "Please Enter Lastname. Please enter at least 3 characters.",
                        phone: {
                            required: 'Please Enter Telenumber.',
                            digits: "Please Enter a valid Telenumber"
                        },
                        phone_2: {
                            digits: "Please Enter a valid Telenumber 2"
                        },
                        email: {
                            required: 'Please Enter Email.',
                            email: "Please Enter a valid email address"
                        },
                        email_2: {
                            email: "Please Enter a valid email address"
                        },
                        postal_code: {
                            required: 'Please Enter Poatal Code.',
                            digits: "Please Enter a valid Poatal Code"
                        },
                        shipping_address: "Please Enter Shipping Address",
                        delivery_address: "Please Enter Delivery Address",
                        country: "Please Select Country",
                        term_condition: "Please Accept terms & conditions"
                    }
                });
                var navListItems = $('div.setup-panel div a'),
                    allWells = $('.setup-content'),
                    allNextBtn = $('.nextBtn');

                allWells.hide();

                navListItems.click(function(e) {
                    e.preventDefault();
                    var $target = $($(this).attr('href')),
                    $item = $(this);
                    if (!$item.hasClass('disabled')) {
                    navListItems.removeClass('btn-primary').addClass('btn-default');
                    $item.addClass('btn-primary');
                    allWells.hide();
                    $target.show();
                    $target.find('input:eq(0)').focus();
                    }
                });

                allNextBtn.click(function() {
                    // alert("Hii");
                    var curStep = $(this).closest(".setup-content"),
                    curStepBtn = curStep.attr("id"),
                    nextStepWizard = $('div.setup-panel div a[href="#' + curStepBtn + '"]').parent().next().children("a"),
                    curInputs = curStep.find("input[type='text'],input[type='url'],textarea[textarea]"),
                    isValid = true;
                    console.log(curStepBtn);
                    $(".form-group").removeClass("has-error");
                    if ((!$('#checkout_form').valid())) {
                        isValid = false;
                    }
                    else{
                        isValid = true;
                    }
                    /*for (var i = 0; i < curInputs.length; i++) {
                        console.log(curInputs);
                        if (!curInputs[i].validity.valid) {
                            isValid = false;
                            $(curInputs[i]).closest(".form-group").addClass("has-error");
                        }
                    }*/

                    if (isValid)
                    nextStepWizard.removeAttr('disabled').trigger('click');
                });
                $('.stripe-button-el').click(function() {
                    if ((!$('#checkout_form').valid())) {
                        return false;
                    }
                });
                $('div.setup-panel div a.btn-primary').trigger('click');
            });
        </script>
        @endsection
