@extends('layouts.app')
@section('title', 'Quote')
@section('meta_description', 'Get a Quote online for all your IT equipment, IT Disposal and WEEE Recycling Queries.')

@section('content')

    <div class="page-title parallax-style parallax1">
            <div class="overlay"></div>
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <div class="page-title-heading">
                            <h1>Quote</h1>
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
                                <li>Request a quote</li>
                            </ul>
                        </div><!-- /.breadcrumbs -->
                    </div><!-- /.flat-wrapper -->
                </div><!-- /.row -->
            </div><!-- /.container -->
        </div><!-- /.page-breadcrumbs -->

        <div class="flat-row flat-general sidebar-right pad-bottom70px">
            <div class="container">
                <div class="row">
                    <div class="general">
                        <h3 class="flat-title-section style mag-top0px">Get a quick quote from <span> VDR Resale</span></h3>

                        <p>Fill out the contact form below or give us a call on <a href="tel: 02084409908" >0208 440 9908</a>. A member of our team will get back to you with a valuation of the resale value of your equipment and offer a price to buy your equipment or help you sell it through our network of partners. </p>
                         @if(session()->has('message'))
                    <span class="form-success sucessMessage">{{ session()->get('message') }}</span>
                @endif
                @if(\Session::has('error'))
                    <span class="form-failure failMessage">{!! \Session::get('error') !!}</span>
                @endif
                        <form id="contactform1" action="{{ route('sendQuote') }}" method="POST">
                            @honeypot
                            {{ csrf_field() }}
                            <div class="quick-form">
                                <h5 class="flat-title-section style3">Contact Information</h5>
                                <div class="row">
                                    <div class="col-md-12">
                                        <input type="text" value="{{ old('name') }}" name="name" placeholder="Full Name*" >
                                          @error('name')
                                    <span class="help-block">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                                    </div>

                                </div><!-- /.row -->

                                <div class="row">
                                    <div class="col-md-6">
                                        <input type="text" value="{{ old('email') }}" placeholder="Email Address*"  name="email">
                                          @error('email')
                                    <span class="help-block">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                                    </div>
                                    <div class="col-md-6">

                                        <input type="text" value="{{ old('phone') }}" placeholder="Telephone"  name="phone">
                                          @error('phone')
                                    <span class="help-block">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-12">
                                       Tell us what equipment you have for sale<textarea name="message1">Type your answer</textarea>
                                         @error('messagge1')
                                    <span class="help-block">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                                      <!--  <input type="text" value="" placeholder="Fax" required="required">-->
                                    </div>
                                </div><!-- /.row -->

                               <!-- <div class="row">
                                    <div class="col-md-12">
                                        <input type="text" value="" placeholder="Email*" required="required">
                                    </div>
                                </div>--><!-- /.row -->

                                <h5 class="flat-title-section style3">Equipment Details</h5>

                                <div class="row">
                                    <div class="col-md-12">
                                       Tell us what condition the equipment is in? <textarea name="message2">Type your answer </textarea>
                                       </div>
                                       <div class=" col-md-12">
                                                <label>To give you the best price, will you have more items to sell in the future?</label>
                                                <br>
                                                <label class="fancy-radio">
                                                    <input type="radio" name="choose" value="yes"  data-parsley-errors-container="#error-radio" data-parsley-multiple="gender">
                                                    <span><i></i>Yes</span>

                                                </label><br>
                                                <label class="fancy-radio">
                                                    <input type="radio" name="choose" value="no" data-parsley-multiple="gender">
                                                    <span><i></i>No</span>
                                                </label>
                                                  @error('choose')
                                    <span class="help-block">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                                                <p id="error-radio"></p>
                                            </div><br>
                                             <div class=" col-md-12" style="display: none;">
                                                <label>Do you require WEEE Waste services?</label>
                                                <br>
                                                <label class="fancy-radio">
                                                    <input type="radio" name="choose2" value="yes"  data-parsley-errors-container="#error-radio" data-parsley-multiple="gender">
                                                    <span><i></i>Yes</span>
                                                </label><br>
                                                <label class="fancy-radio">
                                                    <input type="radio" name="choose2" value="no" data-parsley-multiple="gender">
                                                    <span><i></i>No</span>
                                                </label>
                                                  @error('choose2')
                                    <span class="help-block">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                                                <p id="error-radio"></p>
                                            </div>


                                </div><!-- /.row -->

                                <h5 class="flat-title-section style3">Equipment Location</h5>



                                <div class="row">
                                    <div class="col-md-6">
                                        <input type="text" value="{{ old('city') }}" placeholder="City*"  name="city">
                                        @error('city')
                                    <span class="help-block">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror

                                    </div>
                                    <div class="col-md-6">
                                        <input type="text" value="{{ old('country') }}" placeholder="Country*"  name="country">
                                        @error('country')
                                    <span class="help-block">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror

                                    </div>
                                </div><!-- /.row -->
                              	<div class="row">
                                   <div class="form-group col-md-12">
                                    {!! htmlFormSnippet() !!}
                                    @error('g-recaptcha-response')
                                        <span class="help-block">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @endif
                                  </div>
                              </div>

                                    <div class="row">
                                    <div class="col-md-12">
                                        <input type="submit"  value="Send Us" id="rq_su">
                                    </div>
                                </div>

                            </div><!-- /.quick-form -->
                        </form>
                    </div><!-- /.general -->

                    <div class="general-sidebars">
                        <div class="sidebar-wrap">
                            <div class="sidebar">
                                <div class="widget widget_text">
                                    <div class="textwidget">
                                        <div class="content-text">
                                            <h4 class="title">Why choose us?</h4>
                                            <ul>
                                                <li><i class="fa fa-arrow-circle-right"></i>30 years experience <!--Over 20 years experience--></li>
                                                <li><i class="fa fa-arrow-circle-right"></i>Earth-friendly  <!--Well over 100 Trucks--></li>
                                                <li><i class="fa fa-arrow-circle-right"></i>Secure payments <!--Reliable Service--></li>
                                                <li><i class="fa fa-arrow-circle-right"></i>Professional team  <!--On Time Deliveries--></li>
                                                <li><i class="fa fa-arrow-circle-right"></i>Excellent customer service <!-- Professional Drivers--></li>
                                                <li><i class="fa fa-arrow-circle-right"></i>On-time collections <!--Excellent Customer Service--></li>
                                            </ul>
                                        </div>
                                    </div><!-- /.textwidget -->
                                </div><!-- /.widget_text -->

                                <div class="widget widget_text">
                                    <div class="textwidget">
                                        <!--<a class="button lg bg-scheme2 download" href="#">Download Brochure <i class="fa fa-download"></i></a>-->
                                        <!--<a class="button lg outline download" href="#">Ask Our Experts <i class="fa fa-question-circle"></i></a>-->
                                    </div><!-- /.textwidget -->
                                </div><!-- /.widget_text -->

                                <div class="widget widget_recent_entries">
                                    <h4 class="widget-title">Want to speak to someone? Give us a call.</h4>
                                    <ul>
                                        <li style="display: inline-flex;">
                                            <i class="fa fa-phone my-3" style="margin: auto;margin-right: 5px;color: #E0C463;"></i><a href="tel: 0208 440 9908" >0208 440 9908</a>
                                        </li>
                                    </ul>
                                </div>

                                {{-- <div class="widget widget_recent_entries">
                                    <h4 class="widget-title">Recent news</h4>
                                    <ul>
                                         @foreach ($latest_blog as $blog)
                                <li>
                                    <a href="{{url('blog'.'/'.$blog->blog_slug)}}">{{$blog->blog_title}}</a>
                                    <span class="post-date">{{date('d-M-Y',strtotime($blog->created_at))}}</span>
                                </li>
                                @endforeach
                                    </ul>
                                </div> --}}
                            </div><!-- /.sidebar -->
                        </div><!-- /.sidebar-wrap -->
                    </div><!-- /.general-sidebars -->
                </div><!-- /.row -->
            </div><!-- /.container -->
        </div><!-- /.flat-row -->

@endsection

@section('page-style')
<style>
    .header-v3 .header .header-wrap{ position: absolute; }
</style>
@endsection

@section('page-script')
<script>
    $(document).ready(function(){
        $('#contactform1 input').on("cut copy paste",function(e) {
            e.preventDefault();
        });
        $('#contactform1 textarea').on("cut copy paste",function(e) {
            e.preventDefault();
        });
    });
</script>
@endsection
