@extends('layouts.app')
@section('title'){{ $blog->blog_title }}@endsection
@section('meta_description'){{ $blog->blog_title }}@endsection

@section('content')
<div class="page-title parallax-style parallax1">
    <div class="overlay"></div>
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="page-title-heading">
                    <h1>{{ ucwords($blog->blog_title) }}</h1>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="page-breadcrumbs">
    <div class="container">
        <div class="row">
            <div class="flat-wrapper">
                <div class="breadcrumbs">
                    <h2 class="trail-browse">You are here:</h2>
                    <ul class="trail-items">
                        <li class="trail-item"><a href="{{url('/')}}">Home</a></li>
                        <li class="trail-item"><a href="{{url('/blog')}}">News</a></li>
                        <li>{{ ucwords($blog->blog_title) }}</li>
                    </ul>
                </div><!-- /.breadcrumbs -->
            </div><!-- /.flat-wrapper -->
        </div><!-- /.row -->
    </div><!-- /.container -->
</div><!-- /.page-breadcrumbs -->



<!-- News Details Start -->
<div class="blog">

    <div class="container">

        <div class="row heading_space">
            <div class="col-md-8">
                <div class="row">
                    <div class="news-1-box clearfix">
                        <div class="col-md-12 col-sm-12 col-xs-12">
                            <img src="../{{ $blog->inner_image }}" alt="image" class="img-responsive" />
                        </div>
                        <div class="col-md-12 col-sm-12 col-xs-12 top30">
                            <div class="news-details bottom10">
                                <span><i class="icon-icons228"></i> {{ date('M d, Y', strtotime($blog->created_at)) }}</span>
                            </div>
                            <h3>{{ ucwords($blog->blog_title) }}</h3>
                            <br>
                            <p class="bottom30">@if($blog->long_description) {!!html_entity_decode($blog->long_description)!!} @else {{$blog->short_description}}@endif</p>
                        </div>
                    </div>
                </div>
                <hr>
                <div class="row">
                    <div class="col-md-12 col-sm-12 col-xs-12">
                        <!--<p>To speak to a representative please complete the form below. </p>-->
                        <div class="flat-divider d10px"></div>
                        @if(session()->has('message'))
                            <span class="form-success sucessMessage">{{ session()->get('message') }}</span>
                        @endif
                        @if(\Session::has('error'))
                            <span class="form-failure failMessage">{!! \Session::get('error') !!}</span>
                        @endif
                        <form id="contactform" method="POST" action="{{ route('sendMail') }}">
                            @honeypot
                            {{ csrf_field() }}
                            <div class="row">
                                <div class="col-md-6">
                                    <p>
                                        <input name="name" type="text" value="{{ old('name') }}"
                                            placeholder="Name">
                                        @error('name')
                                            <span class="help-block">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </p>
                                    <p>
                                        <input name="email" type="email" value="{{ old('email') }}"
                                            placeholder="Email">
                                        @error('email')
                                            <span class="help-block">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </p>
                                    <p>
                                        <input name="phone" type="text" value="{{ old('phone') }}"
                                            placeholder="Phone Number">
                                        @error('phone')
                                            <span class="help-block">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </p>
                                </div>
                                <div class="col-md-6">
                                    <p>
                                        <textarea name="content_msg" rows="3"
                                            placeholder="Comment">{{ old('content_msg') }}</textarea>
                                        @error('content_msg')
                                            <span class="help-block">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </p>
                                </div>
                                <div class="col-md-12">
                                    <select name="subject" class="wpcf7-form-control wpcf7-select valid">
                                        <option value="Choose you option">Choose you option</option>
                                        <option value="Sell Your IT Equipment">Sell Your IT Equipment</option>
                                        <option value="Data Decommissioning">Data Decommissioning</option>
                                        <option value="General Enquiry">General Enquiry</option>
                                    </select>
                                </div>
                                <div class="form-group col-md-12">
                                    {!! htmlFormSnippet() !!}
                                    @error('g-recaptcha-response')
                                        <span class="help-block">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @endif
                                </div>
                                <div class="col-md-12">
                                    <span class="form-submit">
                                        <input name="submit" type="submit" id="submit" class="submit" value="Send Mail">
                                    </span>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>

            <aside class="col-md-4 col-xs-12">
                <div class="row">
                    <div class="col-md-12">
                        <h3 class="bottom40 margin40">Latest Blogs</h3>
                    </div>
                </div>
                @if(count($latest_blog) > 0)
                @foreach($latest_blog as $data)
                    <div class="row bottom20">
                        <a href="{{url('/blog/'.$data->blog_slug)}}">
                            <div class="col-md-4 col-sm-4 col-xs-6 p-image">
                                <img src="../{{ $data->features_image }}" alt="image" />
                            </div>
                            <div class="col-md-8 col-sm-8 col-xs-6">
                                <div class="feature-p-text">
                                    <span>{{ $data->blog_title }}</span>
                                </div>
                            </div>
                        </a>
                    </div>
                @endforeach
            @endif

                {{-- <div class="row">
                    <div class="col-md-12">
                        <h3 class="margin40 bottom20">Latest Videos</h3>
                    </div>
                    <div class="col-md-12">
                        <div id="agent-2-slider" class="owl-carousel">
                            <div class="item">
                                <div class="property_item heading_space">
                                    <div class="image">
                                        <video autoplay loop muted id="myVideo" width="100%">
                                            <source
                                                src="{{ asset('public/skin/video/Bank Owned Spanish Village Apartments.mp4') }}"
                                                type="video/mp4" />
                                        </video>
                                    </div>
                                </div>
                            </div>
                            <div class="item">
                                <div class="property_item heading_space">
                                    <div class="image">
                                        <video autoplay loop muted id="myVideo" width="100%">
                                            <source
                                                src="{{ asset('public/skin/video/Bank Owned Spanish Village Apartments.mp4') }}"
                                                type="video/mp4" />
                                        </video>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div> --}}

            </aside>

        </div>

    </div>
</div>
<!-- News Details End -->

@endsection

@section('page-style')
<style>
    .header-v3 .header .header-wrap{
        position: absolute;
    }

</style>
@endsection

@section('page-script')
<script>
    $(document).ready(function(){
        $('#contactform input').on("cut copy paste",function(e) {
            e.preventDefault();
        });
        $('#contactform textarea').on("cut copy paste",function(e) {
            e.preventDefault();
        });
    });
</script>
@endsection
