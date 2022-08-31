@extends('layouts.app')
@section('title', 'Sell Cisco Access Points')
@section('meta_description', 'Sell Used Cisco Access Points with VDR Resale at the best market price. We will buy all your used Cisco Equipment. Get a Quote Online. ')

@section('meta')
    <meta property="og:title" content="Sell Your IT Equipment At The Right Price | VDR Resale">
    <meta property="og:site_name" content="VDR Resale">
    <meta property="og:url" content="https://vdrresale.com/">
    <meta property="og:description" content="Sell your used IT equipment at VDR Resale at the proper market price. We will buy all your IT equipment at VDR Resale. Get a Quote Online to Sell Your IT Equipment Fast.">
    <meta property="og:type" content="business.business">
    <meta property="og:image" content="https://www.vdrresale.com/public/assets/images/vdr-logo.png">
@stop

@section('content')

 <!-- Slider -->
 <div class="tp-banner-container">
    <div class="tp-banner" >
        <ul>
            <li data-transition="random-static" >
                <video class="col-side-imgges" autoplay loop muted id="myVideo" width="100%" playsinline>
                    <source src="{{ asset('public/assets/images/slides/ciscobanner3.mp4') }}">
                </video>
                <div class="tp-caption center" data-x="40" data-y="150" data-speed="1000" data-start="0" data-easing="Power3.easeInOut">
                  <h1 class="col-h1">Sell Cisco<br> Access Point</h1>
                </div>
            </li>
        </ul>
    </div>
</div>
<!--Mobile view-->
<!--<div class="tp-banner-container" id="responsive_show">-->
<!--    <div class="tp-banner" >-->
<!--        <ul>-->
<!--            <li data-transition="random-static" >-->
<!--                <video class="col-side-imgges" autoplay loop muted id="myVideo" width="100%" playsinline>-->
<!--                    <source src="{{ asset('public/assets/images/slides/cisco-mob.mp4') }}">-->
<!--                </video>-->
<!--                <div class="tp-caption sfl title-slide center" data-x="40" data-y="150" data-speed="1000" data-start="1000" data-easing="Power3.easeInOut">-->
<!--                 Sell Cisco<br> Access Point-->
<!--                </div>-->
<!--            </li>-->
<!--        </ul>-->
<!--    </div>-->
<!--</div>-->

<!-- Promobox -->
<div class="flat-row bg-scheme pad-top0px pad-bottom0px col-top">
    <div class="container">
        <div class="row">
            <div class="col-md-6">
                <div class="card"><br>
                    <div class="text-center" >
                        <h2 class="col-h2">SELL CISCO EQUIPMENT</h2>
                        <h3 class="col-h3">Sell Redundant Equipment</h3>
                        <a id="home_wa" style="font-size: 18px;" class="button lg btn_w240 text-center" data-toggle="modal" data-target="#modal_2">
                            SELL YOUR ITEMS
                        </a><hr>
                        <h2 class="col-h2">REQUEST A QUOTE</h2>
                        <h3 class="col-h3">Buy Discounted Hardware</h3>
                        <a id="home_wa" style="font-size: 18px; margin-bottom: 25px;" class="button lg btn_w240 text-center" data-toggle="modal" data-target="#modal_3">
                            REQUEST A QUOTE
                        </a><br>
                    </div>
                </div>
            </div>
            <div class="col-md-6">
                <div class="promobox style1 style2 clearfix">
                    <h2 class="promobox-title">Sell Your Cisco Access Point</h2>
                    <p class="promobox-title col-p">Sell your Cisco Access points, Servers & other redundant equipment. We are a family-owned IT asset recovery company. With over 40+ years of experience, we have never had one data breach. Now thats experience you can trust! We understand that retiring excess IT equipment while trying to stay compliant and eco-friendly can be quite challenging. Our<a class="col-a-color"href="https://www.vdrresale.com/about"> Technology Life Cycle Management Services</a> make the experience simple and secure. Sell Cisco Access Points & Equipment to VDR Resale and get the best price. </p>
                </div>
            </div><!-- /.col-md-12 -->
        </div><!-- /.row -->
    </div><!-- /.container -->
</div><!-- /.flat-row -->


<div class="flat-row flat-general sidebar-right pad-bottom70px">
    <div class="container">
        <div class="row">
            <div class="col-md-6">
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
                        <h2 class="flat-title-section style3">Contact us</h2>
                        <div class="row">
                            <div class="col-md-12">
                                <input type="text" value="{{ old('name') }}" name="name" placeholder="Full Name*" required>
                                  @error('name')
                            <span class="help-block">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                            </div>

                        </div><!-- /.row -->

                        <div class="row">
                            <div class="col-md-6">
                            <input type="text" value="{{ old('email') }}" placeholder="Email Address*"  name="email" required>
                            @error('email')
                            <span class="help-block">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                            </div>
                            <div class="col-md-6">
                            <input type="text" value="{{ old('phone') }}" placeholder="Telephone*"  name="phone" required>
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
                                <input type="text" value="{{ old('city') }}" placeholder="City*"  name="city" required>
                                @error('city')
                                <span class="help-block">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                            <div class="col-md-6">
                                <input type="text" value="{{ old('country') }}" placeholder="Country*"  name="country" required>
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

            <div class="col-md-6">
                <div class="sidebar-wrap">
                    <div class="sidebar">
                        <div class="widget widget_text">
                        </div><!-- /.widget_text -->

                        <div class="widget widget_recent_entries">
                            <h4 class="widget-title">By casting a wider net and utilising our long-term partners, we can offer you the best price for your obsolete Cisco Equipment.</h4>
                            <div class="col-md-12">
                                <div class="row">
                                    <div class="col-md-6">
                                        <ul>
                                        <li style="display: inline-flex;">
                                            <i class="fa fa-check my-3" style="margin: auto;margin-right: 5px;color: #30b530;"></i>Free Evaluations
                                        </li><br>
                                        <li style="display: inline-flex;">
                                            <i class="fa fa-check my-3" style="margin: auto;margin-right: 5px;color: #30b530;"></i>Eco Friendly
                                        </li>
                                        <li style="display: inline-flex;">
                                            <i class="fa fa-check my-3" style="margin: auto;margin-right: 5px;color: #30b530;"></i>Secure data destruction
                                        </li>
                                    </ul> 
                                    </div>
                                    <div class="col-md-6">
                                        <ul>
                                        <li style="display: inline-flex;">
                                            <i class="fa fa-check my-3" style="margin: auto;margin-right: 5px;color: #30b530;"></i>Secure Payments
                                        </li>
                                        <li style="display: inline-flex;">
                                            <i class="fa fa-check my-3" style="margin: auto;margin-right: 5px;color: #30b530;"></i>Recycle technology
                                        </li>
                                        <li style="display: inline-flex;">
                                            <i class="fa fa-check my-3" style="margin: auto;margin-right: 5px;color: #30b530;"></i>Maximise the value back
                                        </li>
                                    </ul>
                                    </div>
                                    <div class="col-md-12">
                                        <p>We are one of the UK's leading purchasers of excess Cisco & other IT equipment. Typically payments are made on the same day.</p>
                                        <p>Our company are committed to 100% reuse and aim to impact the number of tech items sent to landfill in the UK.</p>
                                        <p>We provide a range of data destruction services to guarantee 100% data security for your technology refresh.</p>
                                    </div>
                                    <div class="text-center">
                                        <img class="col-img" src="{{asset('public/assets/images/slides/vdr_box1.jpeg')}}" alt="">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div><!-- /.sidebar -->
                </div><!-- /.sidebar-wrap -->
            </div><!-- /.general-sidebars -->
        </div><!-- /.row -->
    </div><!-- /.container -->
</div><!-- /.flat-row -->

<div class="flat-row flat-general sidebar-right">
    <div class="container">
        <div class="row">
            <div class="col-md-6">
                <img src="{{asset('public/assets/images/about/about5.png')}}" alt="images">
           </div><!-- /.general -->
            <div class="col-md-6">
                <div class="sidebar-wrap">
                    <div class="sidebar">
                        <div class=" widget_text">
                        </div><!-- /.widget_text -->
                        <div class="widget widget_recent_entries">
                            <div class="col-md-12">
                                <h2> How to Sell Cisco Access Points</h2>
                                <p>As many as 56% of businesses do not use a professional service to recycle their old Cisco Access points and <a style="color:#E0C463;display: contents;" href="https://www.vdrresale.com/service/sell-cisco-equipment">servers.</a> Did you know that only the physical destruction of a hard drive truly ensures the data is 100% destroyed? We provide secure, on-site hard drive destruction services, nationwide across the UK. We provide data destruction certificates to ensure your business is compliant while remaining eco-friendly. </p>
                            </div>
                        </div>
                    </div><!-- /.sidebar -->
                </div><!-- /.sidebar-wrap -->
            </div><!-- /.general-sidebars -->
        </div><!-- /.row -->
    </div><!-- /.container -->
</div><!-- /.flat-row -->

<div class="flat-row flat-general sidebar-right">
    <div class="container">
        <div class="row">
            <h2 class="text-center margin-top-h2">Best Place to <span class="scheme">Sell Cisco Access Point & Equipments Online</span></h2>
            <div class="col-md-2"></div>
            <div class="col-md-8">
                <div class="sidebar-wrap">
                    <div class="sidebar">
                        <div class="widget_text">
                        </div><!-- /.widget_text -->
                        <div class="widget widget_recent_entries">
                            <div class="col-md-12">
                                <p>We are the best place to safely sell your Cisco Access Points and other redundant telecoms equipment. </p>
                                <h3>All Equipment Wanted</h3>
                                <div class="row">
                                  <div class="col-md-6">
                                        <p class="margin-bottom-p"><a href="https://vdr.rsjinfotech.com/sell-cisco-servers"><i class="fa fa-check my-3" style="margin: auto;margin-right: 5px;color: #30b530;"></i><b>Sell Cisco Servers</b></a></p>
                                        <p class="margin-bottom-p"><i class="fa fa-check my-3" style="margin: auto;margin-right: 5px;color: #30b530;"></i><b>Sell Cisco Switches</b></p>
                                        <p class="margin-bottom-p"><a href="https://www.vdrresale.com/service/sell-used-phone-system"><i class="fa fa-check my-3" style="margin: auto;margin-right: 5px;color: #30b530;"></i><b>Sell Cisco Phones</b></a></p>
                                    </div>
                                    <div class="col-md-6">
                                        <p class="margin-bottom-p"><i class="fa fa-check my-3" style="margin: auto;margin-right: 5px;color: #30b530;"></i><b>Sell Cisco Access Points</b></p>
                                        <p class="margin-bottom-p"><a href="https://www.vdrresale.com/service/sell-cisco-switches"><i class="fa fa-check my-3" style="margin: auto;margin-right: 5px;color: #30b530;"></i><b>Sell Cisco Switches</b></a></p>
                                        <p class="margin-bottom-p"><a href="https://www.vdrresale.com/service/sell-it-equipment"><i class="fa fa-check my-3" style="margin: auto;margin-right: 5px;color: #30b530;"></i><b>Sell Redundant IT Equipment</b></a></p>
                                    </div>
                                </div><br>
                            </div>
                        </div>
                    </div><!-- /.sidebar -->
                </div><!-- /.sidebar-wrap -->
            </div><!-- /.general-sidebars -->
            <div class="col-md-2"></div>
        </div><!-- /.row -->
    </div><!-- /.container -->
</div><!-- /.flat-row -->

<!-- Promobox -->
<div class="flat-row pad-top20px pad-bottom40px">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <h2 class="flat-title-section style w90 mag-bottom0px margin-top-h2">We Buy Equipment <span class="scheme">From All Manufacturers!</span></h2>
            </div><!-- /.col-md-12 -->
        </div><!-- /.row -->

        <div class="flat-divider d48px"></div>
        <section class="customer-logos slider">
      <div class="slide"><img src="{{asset('public/assets/images/icons/alcatel.jpeg')}}" alt="Image"></div>
      <div class="slide"><img src="{{asset('public/assets/images/icons/avaya.jpeg')}}" alt="Image"></div>
      <div class="slide"><img src="{{asset('public/assets/images/icons/cisco.jpeg')}}" alt="Image"></div>
      <div class="slide"><img src="{{asset('public/assets/images/icons/hp.jpeg')}}" alt="Image"></div>
      <div class="slide"><img src="{{asset('public/assets/images/icons/mitel.jpeg')}}" alt="Image"></div>
      <div class="slide"><img src="{{asset('public/assets/images/icons/ericsson_1.jpeg')}}" alt="Image"></div>
      <div class="slide"><img src="{{asset('public/assets/images/icons/polycom.jpeg')}}" alt="Image"></div>
      <div class="slide"><img src="{{asset('public/assets/images/icons/Brocade.jpeg')}}" alt="Image"></div>
      <div class="slide"><img src="{{asset('public/assets/images/icons/sennheiser.jpeg')}}" alt="Image"></div>
      <div class="slide"><img src="{{asset('public/assets/images/icons/plantronics.jpeg')}}" alt="Image"></div>
      <div class="slide"><img src="{{asset('public/assets/images/icons/jabra.jpeg')}}" alt="Image"></div>
      <div class="slide"><img src="{{asset('public/assets/images/icons/nortel.jpeg')}}" alt="Image"></div>
      <div class="slide"><img src="{{asset('public/assets/images/icons/juniper.jpeg')}}" alt="Image"></div>
      <div class="slide"><img src="{{asset('public/assets/images/icons/dell.jpeg')}}" alt="Image"></div>
   </section>
         </div><!-- /.container -->
</div>
<!-- /.flat-row -->

<div class="flat-row pad-bottom70px bg-f2f4f8">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <h2 class="flat-title-section style w90 mag-bottom0px"><span class="scheme">Testimonial</span></h2>
            </div><!-- /.col-md-12 -->
        </div><!-- /.row -->

        <div class="flat-divider d48px"></div>

        <div class="row">
            <div class="col-md-12">
                <div class="flat-testimonial-owl">
                    <div class="flat-testimonial">
                        <div class="testimonial-meta">
                            <div class="testimonial-image">
                                <img src="{{asset('public/assets/images/testimonials/star.png')}}" alt="images">
                            </div>
                            <div class="testimonial-author">
                                <strong class="author-name">Michael Henson</strong>
                                <div class="author-info"></div>
                            </div>
                        </div>
                        <div class="testimonial-content">
                            <blockquote>
                                Great experience. Offered us a competitive price and organised a courier to collect items (Cisco Handsets). No quibble, no fuss. We will definitely use again.<br><br>
                            </blockquote>
                        </div>
                    </div><!-- /.testimonial -->

                    <div class="flat-testimonial">
                        <div class="testimonial-meta">
                            <div class="testimonial-image">
                                <img src="{{asset('public/assets/images/testimonials/star.png')}}" alt="images">
                            </div>
                            <div class="testimonial-author">
                                <strong class="author-name">Kevin Manson</strong>
                                <div class="author-info"></div>
                            </div>
                        </div>
                        <div class="testimonial-content">
                            <blockquote>
                                Great service! Pick-up was super fast. They gave me a great price for the kit. The collection was the next day and it didn't cost us a penny. I highly recommend.
                            </blockquote>
                        </div>
                    </div><!-- /.testimonial -->

                    <div class="flat-testimonial">
                        <div class="testimonial-meta">
                            <div class="testimonial-image">
                                <img src="{{asset('public/assets/images/testimonials/star.png')}}" alt="images">
                            </div>
                            <div class="testimonial-author">
                                <strong class="author-name">Mike Bennet</strong>
                                <div class="author-info"></div>
                            </div>
                        </div>
                        <div class="testimonial-content">
                            <blockquote>
                                We were offered a great price. Once agreed the collection was made next day. I'm happy knowing the items went to a new home and we made a little profit as well!
                            </blockquote>
                        </div>
                    </div><!-- /.testimonial -->
                     <div class="flat-testimonial">
                        <div class="testimonial-meta">
                            <div class="testimonial-image">
                                <img src="{{asset('public/assets/images/testimonials/star.png')}}" alt="images">
                            </div>
                            <div class="testimonial-author">
                                <strong class="author-name">Kumar Vakil</strong>
                                <div class="author-info"></div>
                            </div>
                        </div>
                        <div class="testimonial-content">
                            <blockquote>
                                Extremely professional and quick response time. Been a pleasure dealing with Matthew. Kept me updated throughtout the process and also helped with some extra. All The Best and Thanks
                            </blockquote>
                        </div>
                    </div><!-- /.testimonial -->
                    <div class="flat-testimonial">
                        <div class="testimonial-meta">
                            <div class="testimonial-image">
                                <img src="{{asset('public/assets/images/testimonials/star.png')}}" alt="images">
                            </div>
                            <div class="testimonial-author">
                                <strong class="author-name">Chris Hill</strong>
                                <div class="author-info"></div>
                            </div>
                        </div>
                        <div class="testimonial-content">
                            <blockquote>
                               Great service from Mario, called when he promised and reasonable prices. I would definitely recommend
                            </blockquote>
                        </div>
                    </div><!-- /.testimonial -->
                    <div class="flat-testimonial">
                        <div class="testimonial-meta">
                            <div class="testimonial-image">
                                <img src="{{asset('public/assets/images/testimonials/star.png')}}" alt="images">
                            </div>
                            <div class="testimonial-author">
                                <strong class="author-name">Knox Samsung</strong>
                                <div class="author-info"></div>
                            </div>
                        </div>
                        <div class="testimonial-content">
                            <blockquote>
                               Fantastic service and great comms throughout.Competitive quote, quick collection and fast payment.What else can you ask for?Happily use again and recommend to others.
                            </blockquote>
                        </div>
                    </div><!-- /.testimonial -->
                    <div class="flat-testimonial">
                        <div class="testimonial-meta">
                            <div class="testimonial-image">
                                <img src="{{asset('public/assets/images/testimonials/star.png')}}" alt="images">
                            </div>
                            <div class="testimonial-author">
                                <strong class="author-name">Simon Edwards</strong>
                                <div class="author-info"></div>
                            </div>
                        </div>
                        <div class="testimonial-content">
                            <blockquote>
                               VDR have proven to be a very professional and honest Technology equipment collection and recycling company. They have collected from my various company UK based locations over the years and also received equipment from Europe. All equipment is securely handled and processed with an appropriate value given against equipment that is honest and fair. I would not hesitate in using VDR again in the future.
                            </blockquote>
                        </div>
                    </div><!-- /.testimonial -->
                    <div class="flat-testimonial">
                        <div class="testimonial-meta">
                            <div class="testimonial-image">
                                <img src="{{asset('public/assets/images/testimonials/star.png')}}" alt="images">
                            </div>
                            <div class="testimonial-author">
                                <strong class="author-name">Niks Ordodary</strong>
                                <div class="author-info"></div>
                            </div>
                        </div>
                        <div class="testimonial-content">
                            <blockquote>
                                Matthew and his team are a very efficient and accommodating. Communication was prompt and the team was very easy to work with. Thoroughly enjoyed the experienced and highly recommend.                            
                            </blockquote>
                        </div>
                    </div><!-- /.testimonial -->
                </div><!-- /.flat-testimonial -->
            </div><!-- /.col-md-12 -->
        </div><!-- /.row -->
    </div><!-- /.container -->
</div><!-- /.flat-row -->

<div class="flat-row flat-general sidebar-right pad-bottom70px">
    <div class="container">
        <div class="row">
            <div class="col-md-6">
                 <img src="{{asset('public/assets/images/harddrive_wipe.jpg')}}" alt="images">
            </div><!-- /.general -->

            <div class="col-md-6">
                <div class="sidebar-wrap">
                    <div class="sidebar">
                        <div class="widget widget_text">
                        </div><!-- /.widget_text -->
                        <div class="widget widget_recent_entries">
                            <div class="col-md-12">
                                <h2>Approved WEEE Recycling Company</h2>
                                <p>VDR Resale is an approved WEEE recycling company that can take care of all of the computer & IT disposal compliantly. Our e-waste collections service will collect your old equipment and make sure they are cleared of any sensitive data.</p>
                                <p>WEEE Disposal Registration Number: CBDU336628</p>
                            </div>
                        </div>
                    </div><!-- /.sidebar -->
                </div><!-- /.sidebar-wrap -->
            </div><!-- /.general-sidebars -->
        </div><!-- /.row -->
    </div><!-- /.container -->
</div><!-- /.flat-row -->


<div class="blog-shortcode">
    <div class="container">
        <div class="row">
             <div class="col-md-12"> 
                <h2 class="text-center margin-top-h2">Why Choose<span class="scheme"> VDR Resale</span></h2>
            </div>    
            <div class="content-wrap">
                <div class="main-content">
                    <div class="main-content-wrap">
                        <div class="content-inner clearfix">
                            <div class="col-md-2 col-width">
                                <div class="entry-wrapper">
                                    <div class="entry-header">                                                
                                        <div class="entry-header-content col-font text-center">
                                            <i class="fa fa-gbp icon-font"></i>
                                        </div><!-- /.entry-header-content -->
                                    </div><!-- /.entry-header -->

                                    <div class="entry-content">
                                        <h4 class="text-light text-center">Best Prices in the Market</h4>
                                        <p class="text-center">Best prices paid for redundant equipment.</p>
                                    </div><!-- /.entry-content -->
                                </div><!-- /.entry-wrapper -->
                            </div><!-- /.blog-post -->
                            <div class="col-md-2 col-width">
                                <div class="entry-wrapper">
                                    <div class="entry-header">                                                
                                        <div class="entry-header-content col-font text-center">
                                            <i class="fa fa-tags icon-font"></i>
                                        </div><!-- /.entry-header-content -->
                                    </div><!-- /.entry-header -->

                                    <div class="entry-content">
                                        <h4 class="text-light text-center">We Accept All Brands</h4>
                                        <p class="text-center">All manufacturers and brands wanted.</p>
                                    </div><!-- /.entry-content -->
                                </div><!-- /.entry-wrapper -->
                            </div><!-- /.blog-post -->
                            <div class="col-md-2 col-width">
                                <div class="entry-wrapper">
                                    <div class="entry-header">                                                
                                        <div class="entry-header-content col-font text-center">
                                            <i class="fa fa-clock-o icon-font"></i>
                                        </div><!-- /.entry-header-content -->
                                    </div><!-- /.entry-header -->

                                    <div class="entry-content">
                                        <h4 class="text-light text-center">Same Day Quote & Quick Payments</h4>
                                        <p class="text-center">Fast quotes and secure payments.</p>
                                    </div><!-- /.entry-content -->
                                </div><!-- /.entry-wrapper -->
                            </div><!-- /.blog-post -->
                            <div class="col-md-2 col-width">
                                <div class="entry-wrapper">
                                    <div class="entry-header">                                                
                                        <div class="entry-header-content col-font text-center">
                                            <i class="fa fa-industry icon-font"></i>
                                        </div><!-- /.entry-header-content -->
                                    </div><!-- /.entry-header -->

                                    <div class="entry-content">
                                        <h4 class="text-light text-center">Industry Leader</h4>
                                        <p class="text-center">40+ years of experience in tech lifecycle management.</p>
                                    </div><!-- /.entry-content -->
                                </div><!-- /.entry-wrapper -->
                            </div><!-- /.blog-post -->
                            <div class="col-md-2 col-width">
                                <div class="entry-wrapper">
                                    <div class="entry-header">                                                
                                        <div class="entry-header-content col-font text-center">
                                            <i class="fa fa-leaf icon-font"></i>
                                        </div><!-- /.entry-header-content -->
                                    </div><!-- /.entry-header -->

                                    <div class="entry-content">
                                        <h4 class="text-light text-center">Environment Friendly</h4>
                                        <p class="text-center">Earth friendly. Help improve the cycle of technology.</p>
                                    </div><!-- /.entry-content -->
                                </div><!-- /.entry-wrapper -->
                            </div><!-- /.blog-post -->
                        </div><!-- /.content-inner -->                                
                    </div><!-- /.main-content-wrap -->
                </div><!-- /.main-content -->
            </div><!-- /.content-wrap  -->
        </div><!-- /.row -->
    </div><!-- /.container -->
</div><!-- /.blog -->

<div class="flat-row pad-bottom40px">
    <div class="container">
        <div class="row">
            <div class="col-md-2"></div>
            <div class="col-md-8">
                <h2 class="text-center margin-top-h2">Speak to <span style="color: #E0C463">our Team</span> </h2>
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
                                    placeholder="Name" required>
                                @error('name')
                                    <span class="help-block">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </p>
                            <p>
                                <input name="email" type="email" value="{{ old('email') }}"
                                    placeholder="Email" required>
                                @error('email')
                                    <span class="help-block">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </p>
                            <p>
                                <input name="phone" type="text" value="{{ old('phone') }}"
                                    placeholder="Phone Number" required>
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
                                <input name="submit" type="submit" id="submit contact_sm" class="submit" value="Send Mail">
                            </span>
                        </div>
                    </div>
                </form>
            </div>
            <div class="col-md-2"></div>
        </div>
    </div><!-- /.container -->
</div><!-- /.flat-row -->

<!-- Modal -->
<div class="modal fade" id="modal_2" tabindex="-1" role="dialog" aria-labelledby="modal_1" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
              <button type="button" class="close col-close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
            <div class="modal-header">
              
            </div>
        <div class="modal-body">
            <div class="row justify-content-center">
                <div class="col-lg-12 text-center py-4">
                    <div class="table-responsive">
                        <h4>Request a quick quote for your equipment</h4>
                        <p>Best Prices Paid, Fast Response</p>
                         @if(session()->has('message'))
                    <span class="form-success sucessMessage">{{ session()->get('message') }}</span>
                @endif
                @if(\Session::has('error'))
                    <span class="form-failure failMessage">{!! \Session::get('error') !!}</span>
                @endif
                <form id="contactform" method="POST" action="{{ route('sendMail') }}">
                    @honeypot
                    {{ csrf_field() }}
                    <div class="col-md-12">
                    <div class="row">
                        <div class="col-md-12">
                            <p>
                                <input name="name" type="text" value="{{ old('name') }}"
                                    placeholder="Full name" required>
                                @error('name')
                                    <span class="help-block">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </p>
                        </div>
                        <div class="col-md-6">
                            <p>
                                <input name="email" type="email" value="{{ old('email') }}"
                                    placeholder="Email" required>
                                @error('email')
                                    <span class="help-block">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </p>
                        </div>
                        <div class="col-md-6">
                            <p>
                                <input name="phone" type="text" value="{{ old('phone') }}"
                                    placeholder="Telephone" required>
                                @error('phone')
                                    <span class="help-block">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </p>
                        </div>
                        <div class="col-md-12">
                            <p>
                                <textarea name="content_msg" rows="3"
                                    placeholder="Tell us what equipment you have for sale">{{ old('content_msg') }}</textarea>
                                @error('content_msg')
                                    <span class="help-block">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </p>
                        </div>
                        <div class="form-group col-md-12">
                           {!! htmlFormSnippet() !!}
                           @error('g-recaptcha-response')
                           <span class="help-block">
                             <strong>{{ $message }}</strong>
                           </span>
                           @endif
                        </div>
                        <div class="col-md-4">
                            <span class="form-submit">
                                <input name="submit" type="submit" id="submit contact_sm" class="submit" value="Send Mail">
                            </span>
                        </div>
                    </div>
                    </div>
                </form>  
                    </div>
                </div>
            </div>
        </div>
        </div>
    </div>
</div>

<!-- Modal 2 -->
<div class="modal fade" id="modal_3" tabindex="-1" role="dialog" aria-labelledby="modal_1" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
              <button type="button" class="close col-close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
            <div class="modal-header">
              
            </div>
        <div class="modal-body">
            <div class="row justify-content-center">
                <div class="col-lg-12 text-center py-4">
                    <div class="table-responsive">
                        <h4>Request a quote for New & Refurbished Equipment</h4>
                @if(session()->has('message'))
                    <span class="form-success sucessMessage">{{ session()->get('message') }}</span>
                @endif
                @if(\Session::has('error'))
                    <span class="form-failure failMessage">{!! \Session::get('error') !!}</span>
                @endif
                <form id="contactform" method="POST" action="{{ route('sendMail') }}">
                    @honeypot
                    {{ csrf_field() }}
                    <div class="col-md-12">
                    <div class="row">
                        <div class="col-md-12">
                            <p>
                                <input name="name" type="text" value="{{ old('name') }}"
                                    placeholder="Full name" required>
                                @error('name')
                                    <span class="help-block">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </p>
                        </div>
                        <div class="col-md-6">
                            <p>
                                <input name="email" type="email" value="{{ old('email') }}"
                                    placeholder="Email" required>
                                @error('email')
                                    <span class="help-block">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </p>
                        </div>
                        <div class="col-md-6">
                            <p>
                                <input name="phone" type="text" value="{{ old('phone') }}"
                                    placeholder="Telephone" required>
                                @error('phone')
                                    <span class="help-block">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </p>
                        </div>
                        <div class="col-md-12">
                            <p>
                                <textarea name="content_msg" rows="3"
                                    placeholder="Tell us what equipment you are looking for:">{{ old('content_msg') }}</textarea>
                                @error('content_msg')
                                    <span class="help-block">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </p>
                        </div>
                        <div class="form-group col-md-12">
                           {!! htmlFormSnippet() !!}
                           @error('g-recaptcha-response')
                           <span class="help-block">
                             <strong>{{ $message }}</strong>
                           </span>
                           @endif
                        </div>
                        <div class="col-md-4">
                            <span class="form-submit">
                                <input name="submit" type="submit" id="submit contact_sm" class="submit" value="Send Mail">
                            </span>
                        </div>
                    </div>
                    </div>
                </form>  
                    </div>
                </div>
            </div>
        </div>
        </div>
    </div>
</div>
@endsection

@section('page-style')

<style>
    .col-h2{
        font-size: 28px;
        font-weight: 600;
        text-transform: uppercase;
    }
    .col-h3{
        font-size: 22px;
        font-weight: 300;
        font-style: italic;
        margin-bottom: 15px;
    }
    .card{
        background-color: #fff; 
        margin-bottom: 40px;
        width: 100%;
    }
    .col-width{
        width: 19.666667%;
    }
    .entry-wrapper{
        background-color: #E0C463;
        padding: 10px;
        color: #fff;
        text-align: inherit;
        height: 365px;

    }
    .col-font{
        font-size: 56px;
    }
    .col-side-imgges{
        margin-top: -175px;
    }
    .col-close{
        border: solid !important;
        border-color: #000 !important;
        width: 50px;
        height: 30px;

    }
     .col-img-top{
        margin-top: 70px;
    }
      .text-light{
        color:#fff !important;
    }
    .col-h1{
        color: #fff;
    font-size: 4rem;
  }
   .col-a-color{
    color:#b58d00;
  }
  .col-p{
    font-size: 18px;
    font-weight: 600;
    font-family: "Poppins", sans-serif;
  }
   .col-img{
        margin-top: 35px;
  }
@media screen and (max-width: 600px) {
    video#myVideo {
        height: 593px;
        width: inherit;
    }
    .col-width {
    width: 100%;
    padding: 8px 16px;
    }
    .col-top{
        margin-top: -70px;
    }
    h2 {
        font-size: 30px;
    }
  	.col-h1 {
        color: #fff;
        font-size: 3rem;
        margin-top: -20px;
        width: 255px;
	}
 
  .margin-top-h2{
        margin-top: -15px;
  }
  .margin-bottom-p{
    	margin-bottom: 0px !important;
  }
  .entry-wrapper {
      background-color: #E0C463;
      padding: 10px;
      color: #fff;
      text-align: inherit;
      height: fit-content;
  }
  .icon-font{
       font-size: 75px;
  }
}
</style>
@endsection

@section('page-script')
<script>
    $(document).ready(function(){
    $('.customer-logos').slick({
        slidesToShow: 5,
        slidesToScroll: 1,
        autoplay: true,
        autoplaySpeed: 1500,
        arrows: false,
        dots: false,
        pauseOnHover: false,
        responsive: [{
            breakpoint: 769,
            settings: {
                slidesToShow: 3
            }
        }, {
            breakpoint: 520,
            settings: {
                slidesToShow: 2
            }
        }]
    });

});
</script>
<script>
    $(document).ready(function () {

        if (window.matchMedia('(max-width: 667px)').matches)
        {
            $('#responsive_hide').hide();
			$('#responsive_show').show();
        }
        else
        {
            $('#responsive_show').hide();
	        $('#responsive_hide').show();
        }
    });

</script>
@endsection