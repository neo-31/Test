@extends("admin.admin_app")
@section('title', 'Shipping Charges ')

@section("content")
<div class="block-header">
    <div class="row clearfix">
        <div class="col-xl-5 col-md-5 col-sm-12">
            <h1>{{isset($shippingcharge->id)?'Edit':'Add'}} Shipping Charges</h1>
            <span></span>
        </div>
        <div class="col-xl-7 col-md-7 col-sm-12 text-md-right">
            <a href="{{url('admin/shipping-charges')}}" class="btn btn-primary theme-bg gradient btn-round"><i class="fa fa-sign-out"></i> Back To List</a>
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
                <h2>{{isset($shippingcharge->id)?'Edit: '.$shippingcharge->id:'Add'}} Shipping Charges</h2>
                <ul class="header-dropdown dropdown">
                    <li><a href="javascript:void(0);" class="full-screen"><i class="fa fa-expand"></i></a></li>

                </ul>
            </div>
            <div class="body">
                {!! Form::open(array('url' => array('admin/shipping-charges/add-shipping-charges'),
                'class'=>'','name'=>'shipping_form','id'=>'shipping_form',
                'role'=>'form','enctype' => 'multipart/form-data')) !!}
                    <input type="hidden" name="id" value="{{ isset($shippingcharge->id) ? $shippingcharge->id : null }}">

                    <div class="form-group row">
                        <div class="col-md-4">
                            <label>Country Type</label>
                            <select id="country_type" name="country_type" class="form-control">
                                <option value="">Select Country Type</option>
                                    <option value="1" @if(isset($shippingcharge->country_type) && $shippingcharge->country_type == 1) selected @else '' @endif >In UK</option>
                                    <option value="2" @if(isset($shippingcharge->country_type) && $shippingcharge->country_type == 2) selected @else '' @endif  >Rest of World</option>
                            </select>
                        </div>
                        <div class="col-md-4">
                            <label>Country</label>
                            <select id="country_id" name="country" class="form-control" >
                                <option value="">Select Country</option>
                                @foreach ($allcountries as $country)
                                    <option value="{{$country->id}}" @if(isset($shippingcharge->country_id) && $shippingcharge->country_id == $country->id) selected @else '' @endif >{{$country->country_name}}</option>
                                @endforeach

                            </select>
                        </div>
                        <div class="col-md-4">
                            <label>Parcel Type</label>
                            <select id="parcel_type" name="parcel_type" class="form-control" >
                                <option value="">Select Parcel</option>
                                    <option value="1" @if(isset($shippingcharge->parcel_type) && $shippingcharge->parcel_type == 1) selected @else '' @endif  >Small Parcel</option>
                                    <option value="2" @if(isset($shippingcharge->parcel_type) && $shippingcharge->parcel_type == 2) selected @else '' @endif  >Large Parcel</option>
                            </select>
                        </div>
                    </div>
                    @php
                        if(isset($shippingcharge->country_type) && $shippingcharge->country_type == 1){
                            $uk_display = "" ;
                        }
                        else{
                            $uk_display = "display: none;" ;
                        }
                    @endphp
                    <div class="form-group row uk_div" id="uk_div" style="{{ $uk_display }}">

                        <div class="col-md-12 mt-3">
                            <h6> UK Delivery Prices & Times</h6>
                        </div>

                        <div class="col-md-4 mt-3">
                            <label>State</label>
                            <select id="state_id" name="state" class="form-control">
                                <option value="">Select State</option>
                                @foreach ($allstates as $state)
                                <option value="{{$state->id}}" @if(isset($shippingcharge->state_id) && $shippingcharge->state_id == $state->id) selected @else '' @endif >{{$state->state_name}}</option>
                                @endforeach
                            </select>
                        </div>

                        <div class="col-md-4 mt-3">
                            <label>Next Day Delivery</label>
                            <input type="number" id="delivery_next_day" name="next_day_delivery"  step="0.01" min="0.00"
                            value="{{ isset($shippingcharge->delivery_next_day) ? $shippingcharge->delivery_next_day : "0.00" }}" class="form-control" >
                        </div>
                        <div class="col-md-4 mt-3">
                            <label>2-3 Days Delivery</label>
                            <input type="number" id="delivery_days_2_3" name="2_3_days_delivery"  step="0.01" min="0.00"
                            value="{{ isset($shippingcharge->delivery_days_2_3) ? $shippingcharge->delivery_days_2_3 : "0.00" }}" class="form-control" >
                        </div>
                        <div class="col-md-4 mt-3">
                            <label>3-4 Days Delivery</label>
                            <input type="number" id="delivery_days_3_4" name="3_4_days_delivery"  step="0.01" min="0.00"
                            value="{{ isset($shippingcharge->delivery_days_3_4) ? $shippingcharge->delivery_days_3_4 : "0.00" }}" class="form-control" >
                        </div>
                        <div class="col-md-4 mt-3">
                            <label>4-5 Days Delivery</label>
                            <input type="number" id="delivery_days_4_5" name="4_5_days_delivery"  step="0.01" min="0.00"
                            value="{{ isset($shippingcharge->delivery_days_4_5) ? $shippingcharge->delivery_days_4_5 : "0.00" }}" class="form-control" >
                        </div>
                    </div>
                    @php
                        if(isset($shippingcharge->country_type) && $shippingcharge->country_type == 2){
                            $world_display = "" ;
                        }
                        else{
                            $world_display = "display: none;" ;
                        }
                    @endphp
                    <div class="form-group row world_div" id="world_div" style="{{ $world_display }}">

                        <div class="col-md-12 mt-3">
                            <h6> Rest of World Delivery Prices & Times</h6>
                        </div>


                        <div class="col-md-6 mt-3">
                            <label>Delivery Time</label>
                            <input type="number" id="delivery_time" name="delivery_time"  step="1" min="1" max="7"
                            value="{{ isset($shippingcharge->delivery_time) ? $shippingcharge->delivery_time : '' }}" class="form-control"
                            oninvalid="this.setCustomValidity('Delivery Time should be minimum 1 and maximum 7.')" oninput="this.setCustomValidity('')"  >
                        </div>
                        <div class="col-md-6 mt-3">
                            <label>Delivery Price</label>
                            <input type="number" id="delivery_price" name="delivery_price"  step="0.01" min="0.00"
                            value="{{ isset($shippingcharge->delivery_price) ? $shippingcharge->delivery_price : "0.00" }}" class="form-control" >
                        </div>
                    </div>
                    <div class="form-group row">

                        <div class="col-md-12 mt-3">
                            <h6> Shipping Price on Weight</h6>
                        </div>


                        <div class="col-md-6 mt-3">
                            <label>Shipping Rate 10KG Under</label>
                            <input type="number" id="shipping_rate_under" name="shipping_rate_under"  step="0.01" min="0.00"
                            value="{{ isset($shippingcharge->shipping_rate_under) ? $shippingcharge->shipping_rate_under : "0.00" }}" class="form-control" >
                        </div>
                        <div class="col-md-6 mt-3">
                            <label>Shipping Rate 10KG Over</label>
                            <input type="number" id="shipping_rate_over" name="shipping_rate_over"  step="0.01" min="0.00"
                            value="{{ isset($shippingcharge->shipping_rate_over) ? $shippingcharge->shipping_rate_over : "0.00" }}" class="form-control" >
                        </div>
                    </div>


                    <div class="text-center">
                        <button type="submit"  class="btn btn-primary theme-bg">{{isset($shippingcharge->id)?'Update':'Create'}}</button>
                    </div>
                {!! Form::close() !!}
            </div>
        </div>
    </div>

</div>

@endsection

@section('page-script')
<script>
    $(document).ready(function () {
        $('#country_type').on('change', function(){
            var type_val = this.value;
            $("#uk_div").hide();
            $("#world_div").hide();
            if (type_val == 1) {
                $("#uk_div").show();
            }
            else if (type_val == 2) {
                $("#world_div").show();
            }
        });
    });
</script>
@stop
