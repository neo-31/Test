@extends('layouts.app')
@section('title', ' Sell Used Cisco Equipment')
@section('meta_description', 'Sell Used Cisco Equipment with VDR Resale at the best market price. We will buy all your used Cisco Equipment. Get a Quote Online.')

@section('meta')
    <meta property="og:title" content="Sell Your IT Equipment At The Right Price | VDR Resale">
    <meta property="og:site_name" content="VDR Resale">
    <meta property="og:url" content="https://vdrresale.com/">
    <meta property="og:description" content="Sell your used IT equipment at VDR Resale at the proper market price. We will buy all your IT equipment at VDR Resale. Get a Quote Online to Sell Your IT Equipment Fast.">
    <meta property="og:type" content="business.business">
    <meta property="og:image" content="https://www.vdrresale.com/public/assets/images/vdr-logo.png">
@stop

@section('content')

 <div class="tp-banner-container">
    <div class="tp-banner" >
        <ul>
            <li data-transition="random-static" >
                <video class="col-side-imgges" autoplay loop muted id="myVideo" width="100%" playsinline>
                    <source src="{{ asset('public/assets/images/slides/ciscobanner.mp4') }}">
                </video>
                <div class="tp-caption sfl title-slide center" data-x="40" data-y="150" data-speed="1000" data-start="1000" data-easing="Power3.easeInOut">
                  <h1 class="col-h1">Sell Used <br>Cisco Equipment</h1>
                </div>
            </li>
        </ul>
    </div>
</div>
<!-- Promobox -->
<div class="flat-row bg-scheme pad-top0px pad-bottom0px col-top">
    <div class="container">
        <div class="row">
            <div class="col-md-6">
                <div class="card"><br>
                    <div class="text-center" >
                        <h2 class="col-h2">Sell Used Cisco</h2>
                        <h3 class="col-h3">Maximise Value Back</h3>
                        <a id="home_wa" style="font-size: 18px;" class="button lg btn_w240 text-center" data-toggle="modal" data-target="#modal_2">
                            SELL YOUR ITEMS
                        </a><hr>
                        <h2 class="col-h2">REQUEST A QUOTE</h2>
                        <h3 class="col-h3">New & Refurbished Hardware</h3>
                        <a id="home_wa" style="font-size: 18px; margin-bottom: 25px;" class="button lg btn_w240 text-center" data-toggle="modal" data-target="#modal_3">
                            REQUEST A QUOTE
                        </a><br>
                    </div>
                </div>
            </div>
            <div class="col-md-6">
                <div class="promobox style1 style2 clearfix">
                    <h2 class="promobox-title">Sell Used Cisco Equipment Online</h2>
                    <p class="promobox-title col-p">We are a family-owned IT asset recovery company. Sell your used Cisco Equipment and get the Maximum Value Back. With over 40+ years of experience, we have never had one data breach. Now thats experience you can trust! We understand that retiring your old IT equipment while trying to stay compliant and eco-friendly can be quite the balancing act. Our <a href="https://www.vdrresale.com/services" class="col-a-color">Technology Life Cycle Management Services</a> make the experience simple and secure.</p>
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
                            <h4 class="widget-title">By casting a wider net and utilising our long-term partners, we can offer you the best price for your obsolete Cisco & other IT equipment.</h4>
                            <div class="col-md-12">
                                <div class="row">
                                    <div class="col-md-6">
                                        <ul>
                                        <li style="display: inline-flex;">
                                            <i class="fa fa-check my-3" style="margin: auto;margin-right: 5px;color: #30b530;"></i>Free Quotations
                                        </li><br>
                                        <li style="display: inline-flex;">
                                            <i class="fa fa-check my-3" style="margin: auto;margin-right: 5px;color: #30b530;"></i>Earth friendly
                                        </li>
                                        <li style="display: inline-flex;">
                                            <i class="fa fa-check my-3" style="margin: auto;margin-right: 5px;color: #30b530;"></i>Secure data destruction
                                        </li>
                                    </ul> 
                                    </div>
                                    <div class="col-md-6">
                                        <ul>
                                        <li style="display: inline-flex;">
                                            <i class="fa fa-check my-3" style="margin: auto;margin-right: 5px;color: #30b530;"></i>Faster Payments
                                        </li>
                                        <li style="display: inline-flex;">
                                            <i class="fa fa-check my-3" style="margin: auto;margin-right: 5px;color: #30b530;"></i>Recycle your Tech
                                        </li>
                                        <li style="display: inline-flex;">
                                            <i class="fa fa-check my-3" style="margin: auto;margin-right: 5px;color: #30b530;"></i>Maximise the value back
                                        </li>
                                    </ul>
                                    </div>
                                    <div class="col-md-12">
                                        <p>We are one of the UK's leading purchasers of used Cisco equipment and other IT Hardware. We buy back equipment every day from UK businesses.</p>
                                        <p>Our company are committed to 100% reuse and aim to impact the number of tech items sent to landfill in the UK.</p>
                                        <p>We provide a range of data destruction services to guarantee 100% data information security for your business.</p>
                                    </div>
                                    <div class="text-center">
                                        <img class="mt-4" src="{{asset('public/assets/images/slides/vdr_box1.jpeg')}}" alt="">
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

<div class="flat-row flat-woocommerce flat-general sidebar-right">
    <div class="container">
        <div class="row">
            <div class="col-md-12"> 
                <h2 class="text-center margin-top">Sell Used Cisco <span class="scheme">Hardware Online</span></h2>
                <p class="text-center">Best prices paid. Earth friendly. Fast response times. </p>
                <div class="woocommerce">
                    <ul class="products">
                        <li>
                            <div class="product-inner">
                                <div class="product-thumbnail">
                                    <a href="shop-detail.html">
                                        <img class="col-img" src="{{asset('public/assets/images/Sell-Cisco-Equipment.jpg')}}" alt="images">
                                    </a>
                                </div>
                                <div class="product-info">
                                    <div class="product-info-wrap">
                                        <h3>Sell Cisco Equipment</h3>
                                        <p>If you are looking for the best price for your excess or redundant <a href="https://www.vdrresale.com/service/sell-cisco-equipment" class="col-a-color"> Cisco equipment</a> contact us today.</p>
                                        <a class="button" data-toggle="modal" data-target="#modal_2">sell cisco equipment</a>
                                    </div>
                                </div>
                            </div><!-- /.product-inner -->
                        </li>

                        <li>
                            <div class="product-inner">
                                <div class="product-thumbnail">
                                    <a href="shop-detail.html">
                                        <img class="col-img" src="{{asset('public/assets/images/Cisco-Switches.jpg')}}" alt="images">
                                    </a>
                                </div>
                                <div class="product-info">
                                    <div class="product-info-wrap">
                                        <h3>Cisco Switches</h3>
                                        <p>We buy all <a href="https://www.vdrresale.com/service/sell-cisco-switches" class="col-a-color">Cisco switches,</a> cards, and firewalls offering a fair market value with fast collection and removal.</p>
                                        <a class="button" data-toggle="modal" data-target="#modal_2">sell cisco switches</a>
                                    </div>
                                </div>
                            </div><!-- /.product-inner -->
                        </li>

                        <li>
                            <div class="product-inner">
                                <div class="product-thumbnail">
                                    <a href="shop-detail.html">
                                        <img class="col-img" src="{{asset('public/assets/images/Cisco-Router.png')}}" alt="images">
                                    </a>
                                </div>
                                <div class="product-info">
                                    <div class="product-info-wrap">
                                        <h3>Cisco Router</h3>
                                        <p>We buy redundant <a href="https://www.vdrresale.com/service/sell-cisco-routers" class="col-a-color"> Cisco routers</a> and have been trading new and used equipment for more than 40+ years.  </p>
                                        <a class="button" data-toggle="modal" data-target="#modal_2">sell cisco router</a>
                                    </div>
                                </div>
                            </div><!-- /.product-inner -->
                        </li>

                        <li>
                            <div class="product-inner">
                                <div class="product-thumbnail">
                                    <a href="shop-detail.html">
                                        <img class="col-img" src="{{asset('public/assets/images/Sell-Cisco-Phones.jpg')}}" alt="images">
                                    </a>
                                </div>
                                <div class="product-info">
                                    <div class="product-info-wrap">
                                        <h3>Sell Cisco Phones</h3>
                                        <p>Sell your redundant <a href="https://www.vdrresale.com/service/sell-used-cisco-phones" class="col-a-color">Cisco IP Phones </a> for the best price with VDR Resale. </p>
                                        <a class="button" data-toggle="modal" data-target="#modal_2">sell cisco used phones</a>
                                    </div>
                                </div>
                            </div><!-- /.product-inner -->
                        </li>

                        <li>
                            <div class="product-inner">
                                <div class="product-thumbnail">
                                    <a href="shop-detail.html">
                                        <img class="col-img" src="{{asset('public/assets/images/Sell-Cisco-Access-Points.webp')}}" alt="images">
                                    </a>
                                </div>
                                <div class="product-info">
                                    <div class="product-info-wrap">
                                        <h3>Sell Cisco Access Points</h3>
                                        <p>Sell your new & used<a href="https://www.vdrresale.com/sell-cisco-access-point" class="col-a-color"> Cisco access points. </a>Request a quote and get a same-day response.</p>
                                        <a class="button" data-toggle="modal" data-target="#modal_2">sell cisco access Points</a>
                                    </div>
                                </div>
                            </div><!-- /.product-inner -->
                        </li>

                        <li>
                            <div class="product-inner">
                                <div class="product-thumbnail">
                                    <a href="shop-detail.html">
                                        <img class="col-img" src="{{asset('public/assets/images/Sell-Cisco-Servers.jpg')}}" alt="images">
                                    </a>
                                </div>
                                <div class="product-info">
                                    <div class="product-info-wrap">
                                        <h3>Sell Cisco Servers</h3>
                                        <p>Turn <a href="https://www.vdrresale.com/sell-cisco-servers" class="col-a-color">used cisco server</a> and other networking gear into Cash! Discover the benefits of tech lifecycle management. </p>
                                        <a class="button" data-toggle="modal" data-target="#modal_2">Sell Cisco Servers</a>
                                    </div>
                                </div>
                            </div><!-- /.product-inner -->
                        </li>
                    </ul><!-- /.products -->
                    <div class="navigation paging-navigation numeric">
                        <div class="flat-pagination loop-pagination">
                            <span class="page-numbers current">1</span>
                            <a class="page-numbers" href="#">2</a>
                            <a class="page-numbers" href="#">&#8594;</a>
                        </div><!-- /.flat-pagination -->
                    </div><!-- /.navigation .paging-navigation .numeric -->
                </div><!-- /.woocommerce -->

            </div><!-- /.general -->
        </div><!-- /.row -->
    </div><!-- /.container -->
</div><!-- /.blog -->

<!-- Promobox -->
<div class="flat-row pad-top20px pad-bottom40px">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <h2 class="flat-title-section style w90 mag-bottom0px col-cerasol">We Buy Equipment <span class="scheme">From All Manufacturers!</span></h2>
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
                 <img src="{{asset('public/assets/images/harddrive-wipe.jpg')}}" alt="images">
            </div><!-- /.general -->

            <div class="col-md-6">
                <div class="sidebar-wrap">
                    <div class="sidebar">
                        <div class="widget widget_text">
                        </div><!-- /.widget_text -->
                        <div class="widget widget_recent_entries">
                            <div class="col-md-12">
                                <h2>Sell Used Cisco Equipment Safely</h2>
                                <p>As many as 56% of UK businesses do not use a professional service sell used Cisco and other IT hardware. Did you know that only the physical destruction of a hard drive truly ensures the data is 100% destroyed? We provide secure, on-site hard drive destruction services, nationwide across the UK. Avoid large fines and ensure your data is secure when hard drives or storage devices are replaced by using VDR Resales Technology Lifecycle Management services. </p>
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
                <h2 class="text-center col-cerasol">Why Choose <span class="scheme">VDR Resale</span></h2>
            </div>    
            <div class="content-wrap">
                <div class="main-content">
                    <div class="main-content-wrap">
                        <div class="content-inner clearfix">
                            <div class="col-md-2 col-width">
                                <div class="entry-wrapper">
                                    <div class="entry-header text-center">                                                
                                        <div class="entry-header-content col-font">
                                            <i class="fa fa-gbp font-size"></i>
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
                                    <div class="entry-header text-center">                                                
                                        <div class="entry-header-content col-font">
                                            <i class="fa fa-tags font-size"></i>
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
                                    <div class="entry-header text-center">                                                
                                        <div class="entry-header-content col-font">
                                            <i class="fa fa-clock-o font-size"></i>
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
                                    <div class="entry-header text-center">                                                
                                        <div class="entry-header-content col-font">
                                            <i class="fa fa-industry font-size"></i>
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
                                    <div class="entry-header text-center">                                                
                                        <div class="entry-header-content col-font">
                                            <i class="fa fa-leaf font-size"></i>
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
                <h2 class="text-center margin-top">Send us a <span style="color: #E0C463">Message</span> </h2>
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
                        
                            @error('g-recaptcha-response')
                                <span class="help-block">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @endif
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
                       
                            @error('g-recaptcha-response')
                                <span class="help-block">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @endif
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
    .text-light{
        color:#fff !important;
    }
    .col-img{
        width: 390px;
        height: 260px;
}
  .col-a-color{
    color:#b58d00;
  }
    .col-h1{
        color: #fff;
    	font-size: 4rem;
  }
   .col-p{
    font-size: 18px;
    font-weight: 600;
    font-family: "Poppins", sans-serif;
  }
  .mt-4{
    margin-top: 30px;
  }
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
}
@media only screen and (max-width: 767px){
video#myVideo {
    height: 620px;
    width: 605px;
    margin-left: -180px;
    }
     .col-width {
        width: 100%;
        padding: 8px 16px;
    }
  	.col-h1 {
        color: #fff;
        font-size: 3rem;
        margin-top: 28px;
	}
  	.margin-top{
      	margin-top: -30px;
  	}
  	.col-cerasol{
        width: 100% !important;
    	margin-top: -15px;
  	}
  	.entry-wrapper {
        background-color: #E0C463;
        padding: 10px;
        color: #fff;
        text-align: inherit;
        height: fit-content;
  	}
  	.font-size{
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
@endsection