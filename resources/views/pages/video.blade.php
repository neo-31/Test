@extends('layouts.app')
@section('title', 'Video')
@section('meta_description', 'Get all the latest Videos and Daily updates on IT Equipmensts, IT Disposal, and WEEE Recycling. Subscribe now for our Daily updates.')

@section('content')
<div class="page-title parallax-style parallax1">
    <div class="overlay"></div>
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="page-title-heading">
                    <h1>Video</h1>
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
                        <li class="trail-item"><a href="{{ url('/') }}">Home</a></li>
                        <li>video</li>
                    </ul>
                </div><!-- /.breadcrumbs -->
            </div><!-- /.flat-wrapper -->
        </div><!-- /.row -->
    </div><!-- /.container -->
</div><!-- /.page-breadcrumbs -->
<section id="news" class="news-section-details padding_bottom_half padding_top">
    <div class="container">
        <div class="row">

            @if(count($video_list) > 0)
            @foreach ($video_list as $data)
            <div class="col-md-4 col-sm-6 col-xs-12 heading_space">
                <div class="sim-lar-p">
                    <div class="image bottom20">
                        <a href="{{$data->youtube_url}}" target="_blank"><iframe width="100%" height="250px" src="{{$data->youtube_url}}" media="all and (max-width:350px)" autoplay="" mute="">
                        </iframe></a>
                    </div>
                    <div class="sim-lar-text">
                        <h3 class="bottom10 video_title"><a  href="{{$data->youtube_url}}" target="_blank">{{$data->video_title}}</a></h3>
                        <p><span>Date:</span> {{ date('M d, Y', strtotime($data->created_at)) }}</p>
                        <div class="bottom20 short_desc">
                            {!!html_entity_decode($data->description)!!}
                        </div>
                        <!--<a class="btn-more" href="#."></a>-->
                    </div>
                </div>
            </div>
            @endforeach
           @else
            <div class="col-md-12 text-center ">
                <h1 style="color: #e0c463;margin-top: 10%">Videos are coming soon...</h1>
            </div>
            @endif

            {{-- <div class="col-md-12 text-center">
                <a class="btn-blue  bg-yellow uppercase border_radius button" target="_blank"
                    href="">Subscribe Youtube Channel</a>
            </div> --}}
            <div class="col-md-12 text-center">
                <a class="btn-blue  bg-yellow uppercase border_radius button"
                    href="{{url('contact')}}">contact us</a>
            </div>
        </div>
    </div>
</section>
<!-- Agent-Profile End -->


@endsection

@section('page-style')
<style>
    .header-v3 .header .header-wrap{
        position: absolute;
    }
        
</style>
@endsection