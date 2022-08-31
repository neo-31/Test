@extends('layouts.app')
@section('title', 'Technology Lifecycle Management Services')
@section('meta_description', 'We understand that recycling or reselling your old IT equipment, while trying to stay compliant and eco-friendly can be quite the balancing act. Our Technology Life Cycle Management Services make the experience simple and secure for your business. We pay the best prices for repurposed equipment.')

@section('content')

<div class="page-title parallax parallax3">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="page-title-heading">
                    <h1>Technology Lifecycle Management Services</h1>
                </div><!-- /.page-title-heading -->
            </div><!-- /.col-md-12 -->
        </div><!-- /.row -->
    </div><!-- /.container -->
</div><!-- /.page-title -->

<div class="page-breadcrumbs">
    <div class="container">
        <div class="row">
            <div class="flat-wrapper">
                <div class="breadcrumbs">
                    <h2 class="trail-browse">You are here:</h2>
                    <ul class="trail-items">
                        <li class="trail-item"><a href="{{url('/')}}">Home</a></li>
                        <li>Services</li>
                    </ul>
                </div><!-- /.breadcrumbs -->
            </div><!-- /.flat-wrapper -->
        </div><!-- /.row -->
    </div><!-- /.container -->
</div><!-- /.page-breadcrumbs -->

<div class="flat-row pad-bottom60px">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <h3 class="flat-title-section style1 style2">Leaders in Technology Lifecycle Management.<br>  <span class="scheme"> Recycle </span>,<span class="scheme"> Refurbish </span> & <span class="scheme"> Redeploy </span> with VDR Resale.</h3>
                <p>We understand that recycling or reselling your old IT equipment, while trying to stay compliant and eco-friendly can be quite the balancing act. Our Technology Life Cycle Management Services make the experience simple and secure for your business. We pay the best prices for repurposed equipment.</p>
            </div><!-- /.col-md-12 -->
        </div><!-- /.row -->
        <div class="flat-divider d20px"></div>
        <div class="row">
            @foreach ($services as $service )
            <div class="col-md-6">
                <div class="flat-iconbox ">
                    <div class="box-header">
                        <div class="box-icon"><img src="{{asset($service->features_image)}}" alt="images"  height='120' width="120"></div>
                        <h5 class="box-title"><a href="{{url('service/'.$service->service_slug)}}">{{$service->service_name}}</a></h5>
                    </div>
                    <div class="box-content">
                        <!--{!!$service->sort_description!!}-->
                        {!!html_entity_decode(\Illuminate\Support\Str::limit($service->sort_description, 100, $end='...'))!!}
                        <p class="box-readmore">
                            <a href="{{url('service/'.$service->service_slug)}}">Read more</a>
                        </p>
                    </div>
                </div><!-- /.flat-iconbox -->
            </div>
            @endforeach
            <!-- /.col-md-6 -->
        </div><!-- /.row -->
    </div><!-- /.container -->
</div><!-- /.blog -->
@endsection

@section('page-style')
<style>
    .header-v3 .header .header-wrap{
        position: absolute;
    }
  	.flat-iconbox .box-content {
        overflow: hidden;
        height: 135px;
    }
</style>
@endsection

@section('page-script')

@endsection
