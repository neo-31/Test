@extends('layouts.app')
@section('title', 'Sell Your IT Equipment At The Right Price')
@section('meta_description', 'Sell your used IT equipment at VDR Resale at the proper market price. We will buy all your IT equipment at VDR Resale. Get a Quote Online to Sell Your IT Equipment Fast.')

@section('meta')
    <meta property="og:title" content="Sell Your IT Equipment At The Right Price | VDR Resale">
    <meta property="og:site_name" content="VDR Resale">
    <meta property="og:url" content="https://vdrresale.com/">
    <meta property="og:description" content="Sell your used IT equipment at VDR Resale at the proper market price. We will buy all your IT equipment at VDR Resale. Get a Quote Online to Sell Your IT Equipment Fast.">
    <meta property="og:type" content="business.business">
    <meta property="og:image" content="https://www.vdrresale.com/public/assets/images/vdr-logo.png">
@stop

@section('schema')
<script type='application/ld+json'> 
{
  "@context": "http://www.schema.org",
  "@type": "Organization",
  "name": "VDR Resale",
  "url": "https://www.vdrresale.com/",
  "logo": "https://www.vdrresale.com/public/assets/images/vdr-logo.png",
  "image": "https://www.vdrresale.com/public/assets/images/vdr-logo.png",
  "description": "Sell your used IT equipment at VDR Resale at the proper market price. We will buy all your IT equipment at VDR Resale. Get a Quote Online to Sell Your IT Equipment Fast.",
  "address": {
    "@type": "PostalAddress",
    "streetAddress": "Stansted Distribution Centre, Start Hill ",
    "addressLocality": "Bishop's Stortford",
    "addressRegion": "Essex County",
    "postalCode": "CM22 7DG",
    "addressCountry": "United Kingdom"
  },
  "contactPoint": {
    "@type": "ContactPoint",
    "email": " info@vdrresale.com",
    "telephone": "0208 440 9908"
   },
   "aggregateRating": {
    "@type": "AggregateRating",
    "ratingValue" : "5",
    "ratingCount" : "50",
    "reviewCount" : "50",
    "bestRating" : "5"
  }
}
</script>
@stop

@section('content')

 <!-- Slider -->
 <div class="tp-banner-container">
    <div class="tp-banner" >
        <ul>
            <li data-transition="slidedown" data-slotamount="7" data-masterspeed="1000" data-saveperformance="on">
                <video autoplay loop muted id="myVideo" width="100%" playsinline>
                    <source src="{{ asset('public/assets/images/slides/video.mp4') }}">
                </video>
                <div class="tp-caption sfl title-slide center" data-x="40" data-y="150" data-speed="1000" data-start="1000" data-easing="Power3.easeInOut">
                    Sell New & Used IT Equipment
                </div>
                <div class="tp-caption sfr desc-slide center " data-x="40" data-y="240" data-speed="1000" data-start="1500" data-easing="Power3.easeInOut">
                    Maximise your return and improve the cycle of technology with VDR Resale
                </div>
                <div class="tp-caption sfl flat-button-slider bg-button-slider-32bfc0" data-x="40" data-y="370" data-speed="1000" data-start="2000" data-easing="Power3.easeInOut"><a id="banner_1_lm" href="{{url('service/sell-it-equipment')}}">LEARN MORE</a>&nbsp;&nbsp;&nbsp;&nbsp;<i class="fa fa-chevron-right"></i></div>

                <div class="tp-caption sfr flat-button-slider btn_sfr" data-x="225" data-y="370" data-speed="1000" data-start="2000" data-easing="Power3.easeInOut"><a id="banner_1_q" href="{{url('quote')}}">REQUEST QUOTE</a>&nbsp;&nbsp;&nbsp;&nbsp;<i class="fa fa-chevron-right"></i></div>
            </li>
            <li data-transition="random-static" data-slotamount="7" data-masterspeed="1000" data-saveperformance="on">

                <img src="{{asset('public/assets/images/slides/WEEE.png')}}" alt="slider-image" />
                <div class="tp-caption sfl title-slide center" data-x="40" data-y="150" data-speed="1000" data-start="1000" data-easing="Power3.easeInOut">
                    Earth Friendly WEEE Waste Recycling
                </div>
                <div class="tp-caption sfr desc-slide center" data-x="40" data-y="240" data-speed="1000" data-start="1500" data-easing="Power3.easeInOut">
                    Environmentally friendly and compliant WEEE waste disposal services.
                </div>
                <div class="tp-caption sfl flat-button-slider bg-button-slider-32bfc0" data-x="40" data-y="370" data-speed="1000" data-start="2000" data-easing="Power3.easeInOut"><a id="banner_2_lm" href="{{url('service/weee-recycling-services')}}">LEARN MORE</a>&nbsp;&nbsp;&nbsp;&nbsp;<i class="fa fa-chevron-right"></i></div>

                <div class="tp-caption sfr flat-button-slider btn_sfr" data-x="225" data-y="370" data-speed="1000" data-start="2000" data-easing="Power3.easeInOut"><a id="banner_2_q" href="{{url('quote')}}">REQUEST QUOTE</a>&nbsp;&nbsp;&nbsp;&nbsp;<i class="fa fa-chevron-right"></i></div>
            </li>

            <li data-transition="random-static" data-slotamount="7" data-masterspeed="1000" data-saveperformance="on">
                <img src="{{asset('public/assets/images/slides/datanew.png')}}" alt="slider-image" />
                <div class="tp-caption sfl title-slide center" data-x="40" data-y="150" data-speed="1000" data-start="1000"         data-easing="Power3.easeInOut">
                 Data Center Decommissioning

                </div>
                <div class="tp-caption sfr desc-slide center" data-x="40" data-y="240" data-speed="1000" data-start="1500" data-easing="Power3.easeInOut">
                    On-site services including Data Destruction & Recommissioning
                </div>
                <div class="tp-caption sfl flat-button-slider bg-button-slider-32bfc0" data-x="40" data-y="370" data-speed="1000" data-start="2000" data-easing="Power3.easeInOut"><a id="banner_3_lm" href="{{url('service/data-centre-decommissioning')}}">LEARN MORE</a>&nbsp;&nbsp;&nbsp;&nbsp;<i class="fa fa-chevron-right"></i></div>

                <div class="tp-caption sfr flat-button-slider btn_sfr" data-x="225" data-y="370" data-speed="1000" data-start="2000" data-easing="Power3.easeInOut"><a id="banner_3_q" href="{{url('quote')}}">REQUEST QUOTE</a>&nbsp;&nbsp;&nbsp;&nbsp;<i class="fa fa-chevron-right"></i></div>
            </li>
            <li data-transition="random-static" data-slotamount="7" data-masterspeed="1000" data-saveperformance="on">
                <img src="{{asset('public/assets/images/slides/BuyBack1.jpg')}}" alt="slider-image" />
                <div class="tp-caption sfl title-slide center" data-x="40" data-y="150" data-speed="1000" data-start="1000" data-easing="Power3.easeInOut">
                    Buy-Back Solutions
                </div>
                <div class="tp-caption sfr desc-slide center" data-x="40" data-y="240" data-speed="1000" data-start="1500" data-easing="Power3.easeInOut">
                    Leading purchasers of surplus IT Equipment at the best market prices.
                </div>
                <div class="tp-caption sfl flat-button-slider bg-button-slider-32bfc0" data-x="40" data-y="370" data-speed="1000" data-start="2000" data-easing="Power3.easeInOut"><a id="banner_4_lm" href="{{url('service/sell-your-mitel-phones-system')}}">LEARN MORE</a>&nbsp;&nbsp;&nbsp;&nbsp;<i class="fa fa-chevron-right"></i></div>

                <div class="tp-caption sfr flat-button-slider btn_sfr" data-x="225" data-y="370" data-speed="1000" data-start="2000" data-easing="Power3.easeInOut"><a id="banner_4_q" href="{{url('quote')}}">REQUEST QUOTE</a>&nbsp;&nbsp;&nbsp;&nbsp;<i class="fa fa-chevron-right"></i></div>
            </li>


        </ul>
    </div>
</div>

<!-- Promobox -->
<div class="flat-row bg-scheme pad-top0px pad-bottom0px">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="promobox style1 style2 clearfix">
                    <h5 class="promobox-title pull-left">Contact Us to get a free quote</h5>
                    <a id="home_wa" style="font-size: 18px;" class="button lg btn_w240 pull-right text-center" href="{{url('contact')}}" target="_blank">
                    	Contact Us
                    </a>
                </div>
            </div><!-- /.col-md-12 -->
        </div><!-- /.row -->
    </div><!-- /.container -->
</div><!-- /.flat-row -->

<!-- Flat imagebox -->
<div class="flat-row parallax-style parallax1">
    <div class="overlay bg-scheme1"></div>
    <div class="container">
        <div class="row">
            <div class="flat-wrapper">
                <div class="flat-imagebox clearfix">
                    <div class="flat-item item-three-column">
                        <div class="imagebox">
                            <div class="box-wrapper">
                                <div class="box-image">
                                    <img src="{{asset('public/assets/images/slides/vdr_box1.jpeg')}}" alt="images" style="width: -webkit-fill-available;height: max-content;">
                                </div>
                                <div class="box-header">
                                    <h5 class="box-title">
                                        <a href="{{ URL::to('services') }}">We buy Excess IT, Telecoms Equipment & Mobiles</a>
                                    </h5>
                                </div>
                                <div class="box-content">
                                    <div class="box-desc">We buy all used IT, Telecoms & Mobiles hardware offering the best market prices and secure payments.</div>
                                    <div class="box-button">
                                        <a class="button bg-scheme3 bg-black" href="{{url('service/sell-it-equipment')}}">read more <i class="fa fa-chevron-right"></i></a>
                                    </div>
                                </div>
                            </div>
                        </div><!-- /.imagebox -->
                    </div><!-- /.item-three-column -->

                    <div class="flat-item item-three-column">
                        <div class="imagebox">
                            <div class="box-wrapper">
                                <div class="box-image">
                                   <img src="{{asset('public/assets/images/slides/box2.png')}}" alt="images" style="width: -webkit-fill-available;height: max-content;">
                               </div>
                               <div class="box-header">
                                <h5 class="box-title">
                                    <a href="{{ URL::to('services') }}">Commercial WEEE & E-Waste Recycling Services</a>
                                </h5>
                            </div>
                            <div class="box-content">
                                <div class="box-desc">With our e-waste capabilities and channel relationships, create a periodic WEEE Recycling solution for your business.</div>
                                <div class="box-button">
                                    <a class="button bg-scheme3 bg-black" href="{{url('service/weee-recycling-services')}}">read more <i class="fa fa-chevron-right"></i></a>
                                </div>
                            </div>
                        </div>
                    </div><!-- /.imagebox -->
                </div><!-- /.item-three-column -->

                <div class="flat-item item-three-column">
                    <div class="imagebox">
                        <div class="box-wrapper">
                            <div class="box-image">
                                <img src="{{asset('public/assets/images/slides/box3.png')}}" alt="images" style="width: -webkit-fill-available;height: max-content;">
                            </div>
                            <div class="box-header">
                                <h5 class="box-title">
                                    <a href="{{ URL::to('services') }}">Wide range of compliant data destruction services</a>
                                </h5>
                            </div>
                            <div class="box-content">
                                <div class="box-desc">Our services ensure all data is destroyed, following the industry standards and including a full audit. </div>
                                <div class="box-button">
                                    <a class="button bg-scheme3 bg-black" href="{{url('service/data-centre-decommissioning')}}">read more <i class="fa fa-chevron-right"></i></a>
                                </div>
                            </div>
                        </div>
                    </div><!-- /.imagebox -->
                </div><!-- /.item-three-column -->
            </div><!-- /.flat-imagebox -->
        </div><!-- /.flat-wrapper -->
    </div><!-- /.row -->
</div><!-- /.container -->
</div><!-- /.flat-row -->

<!-- Promobox -->
<div class="flat-row pad-top20px pad-bottom40px">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <h2 class="flat-title-section style w90 mag-bottom0px">We buy equipment <span class="scheme">from all manufacturers!</span></h2>
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

<div class="flat-row parallax parallax4 pad-top120px pad-bottom120px">
    <div class="overlay bg-scheme1"></div>
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="make-quote">
                    <h1 class="title">Sell your equipment at the right price.</h1>
                    <h5 class="desc">By casting a wider net and utilising our long-term partners, we can offer you the best price for your obsolete equipment.</h5>
                    <div class="group-btn">
                        <a id="home_cu" class="button lg btn_w240" href="{{url('quote')}}">REQUEST A QUOTE <i class="fa fa-chevron-right"></i></a>
                        <!--<a class="button lg outline style1" href="{{url('contact')}}">contact us <i class="fa fa-chevron-right"></i></a>-->
                        <a id="home_rq" class="button lg btn_w240" href="{{url('contact')}}">contact us <i class="fa fa-chevron-right"></i></a>
                    </div>
                </div><!-- /.make-quote -->
            </div><!-- /.col-md-12 -->
        </div><!-- /.row -->
    </div><!-- /.container -->
</div><!-- /.flat-row -->

<!-- Flat iconbox style -->
<div class="flat-row pad-top60px pad-bottom10px">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <!--<h2 class="flat-title-section style">Get the job done <span class="scheme"> right!</span></h2>-->
                <h2 class="flat-title-section style">Earth friendly asset <span class="scheme"> recovery!</span></h2>
            </div><!-- /.col-md-12 -->
        </div><!-- /.row -->
        <div class="flat-divider d40px"></div>
        <div class="row">
            <div class="flat-wrapper">
                <div class="flat-iconbox-style clearfix">
                    <div class="flat-item item-three-column">
                        <div class="iconbox style1">
                            <div class="box-header">
                                <div class="box-icon"><i class="fa fa-lock"></i></div>
                                <h5 class="box-title">Secure payments</h5>
                            </div>
                            <div class="box-content">
                                We are one of the UKs leading purchasers of IT equipment and typically make payments on the same day.
                            </div>
                        </div>
                    </div><!-- /.item-three-column -->

                    <div class="flat-item item-three-column">
                        <div class="iconbox style1">
                            <div class="box-header">
                                <div class="box-icon"><i class="fa fa-recycle"></i></div>
                                <h5 class="box-title">Recycle & Refurbish</h5>
                            </div>
                            <div class="box-content">
                                VDR is constantly enhancing our resources, capabilities, and compliance to ensure equipment is recycleded responsibly.
                            </div>
                        </div>
                    </div><!-- /.item-three-column -->

                    <div class="flat-item item-three-column">
                        <div class="iconbox style1">
                            <div class="box-header">
                                <div class="box-icon"><i class="fa fa-globe"></i></div>
                                <h5 class="box-title">Environmentally Friendly</h5>
                            </div>
                            <div class="box-content">
                                Our company are committed to 100% reuse and aim to impact the number of tech items sent to landfill in the UK.
                            </div>
                        </div>
                    </div><!-- /.item-three-column -->
                </div>
            </div>
        </div>
        <div class="row">
            <div class="flat-wrapper">
                <div class="flat-iconbox-style clearfix">

                    <div class="flat-item item-three-column">
                        <div class="iconbox style1">
                            <div class="box-header">
                                <div class="box-icon"><i class="fa fa-building"></i></div>
                                <h5 class="box-title">Warehousing & Distribution</h5>
                            </div>
                            <div class="box-content">
                                We can offer the best market prices by maintaining our own warehouse and distribution facility.
                            </div>
                        </div>
                    </div><!-- /.item-three-column -->

                    <div class="flat-item item-three-column">
                        <div class="iconbox style1">
                            <div class="box-header">
                                <div class="box-icon"><i class="fa fa-user"></i></div>
                                <h5 class="box-title">On-site services</h5>
                            </div>
                            <div class="box-content">
                                We provide a range of data destruction services to guarantee 100% data information security for your business.
                            </div>
                        </div>
                    </div><!-- /.item-three-column -->

                    <div class="flat-item item-three-column">
                        <div class="iconbox style1">
                            <div class="box-header">
                                <div class="box-icon"><i class="fa fa-money"></i></div>
                                <h5 class="box-title">Quick quotations</h5>
                            </div>
                            <div class="box-content">
                                Get a quote in minutes! – We offer the best prices for used, redundant, nearly new or new IT, Telecoms & Mobiles equipment.
                            </div>
                        </div>
                    </div><!-- /.item-three-column -->
                </div><!-- /.flat-iconbox-style -->
            </div><!-- /.flat-wrapper -->
        </div><!-- /.row -->
    </div><!-- /.container -->
</div><!-- /.flat-row -->



<!-- Promobox -->
<div class="flat-row bg-scheme1 pad-top0px pad-bottom0px">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="promobox style1 style2 clearfix">
                    @if(session()->has('message'))
                        <span class="form-success sucessMessage">{{ session()->get('message') }}</span>
                    @endif
                    @if (\Session::has('error'))
                        <span class="form-failure failMessage">{!! \Session::get('error') !!}</span>
                    @endif
                    <form method="POST" action="{{ route('subscribeMail') }}">
                    @honeypot
                    {{ csrf_field() }}
                    <div class="subscribe-form">
                        <div class="row">
                            <div class="col-md-4 mag-top10px" style="color:#fff;font-size:25px;">
                               Subscribe and stay in touch!
                            </div>

                            <div class="col-md-5 mag-top10px ">
                                <input type="email" name="email" placeholder="Your email address" required="" style="border:2px solid #E0C463;">
                            </div><!-- /.col-md-8 -->
                            <div class="col-md-3 mag-top10px pad-bottom10px">
                                <input type="submit" class="" value="Subscribe" id="home_subscribe">
                            </div>
                        </div><!-- /.row -->
                    </div><!-- /.subscribe-form -->
                    </form>
                </div>
            </div><!-- /.col-md-12 -->
        </div><!-- /.row -->
    </div><!-- /.container -->
</div><!-- /.flat-row -->

<div class="flat-row blog-shortcode blog-home pad-top60px pad-bottom0px">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <h2 class="flat-title-section style mag-bottom0px">Latest <span class="scheme">news</span></h2>
            </div><!-- /.col-md-12 -->
        </div><!-- /.row -->

        <div class="row">
            <div class="content-wrap">
                <div class="main-content">
                    <div class="main-content-wrap">
                        <div class="content-inner clearfix">
                            @foreach ($newss as $news )

                            <article class="flat-item item-three-column blog-post">
                                <div class="entry-wrapper">
                                    <div class="entry-cover">
                                        <a href="{{url('blog/'.$news->blog_slug)}}">
                                            <img src="{{$news->features_image}}" alt="images">
                                        </a>
                                    </div><!-- /.entry-cover -->
                                    <div class="entry-header">
                                        <div class="entry-header-content">
                                            <h4 class="entry-time">
                                                <span class="entry-day">{{date('d',strtotime($news->created_at))}}</span>
                                                <span class="entry-month">{{date('M',strtotime($news->created_at))}}</span>
                                            </h4>
                                            <h4 class="entry-title">
                                                <a href="{{url('blog')."/".$news->blog_slug}}">{{$news->blog_title}}</a>
                                            </h4>
                                        </div><!-- /.entry-header-content -->
                                    </div><!-- /.entry-header -->

                                    <div class="entry-content">
                                        <p>{{$news->short_description}}</p>
                                    </div><!-- /.entry-content -->

                                </div><!-- /.entry-wrapper -->
                            </article><!-- /.blog-post -->
                            @endforeach



                        </div><!-- /.content-inner -->
                    </div><!-- /.main-content-wrap -->
                </div><!-- /.main-content -->
            </div><!-- /.content-wrap  -->
        </div><!-- /.row -->
    </div><!-- /.container -->
</div><!-- /.flat-row -->

<div class="flat-row pad-bottom70px bg-f2f4f8">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <h2 class="flat-title-section style w90 mag-bottom0px"><span class="scheme">What our clients say</span></h2>
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
                                <strong class="author-name">James Etherington</strong>
                                <div class="author-info"></div>
                            </div>
                        </div>
                        <div class="testimonial-content">
                            <blockquote>
                                Mario and the team are knowledgeable and efficient at their work. They give us fair prices for our technology equipment and make the process simple.
                            </blockquote>
                        </div>
                    </div><!-- /.testimonial -->

                    <div class="flat-testimonial">
                        <div class="testimonial-meta">
                            <div class="testimonial-image">
                                <img src="{{asset('public/assets/images/testimonials/star.png')}}" alt="images">
                            </div>
                            <div class="testimonial-author">
                                <strong class="author-name">Spencer Hudson</strong>
                                <div class="author-info"></div>
                            </div>
                        </div>
                        <div class="testimonial-content">
                            <blockquote>
                                I tried many companies in the past and always get my best quote from VDR Resale. The collections are free and the guys always pick up the phone when I call.
                            </blockquote>
                        </div>
                    </div><!-- /.testimonial -->

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
                </div><!-- /.flat-testimonial -->
            </div><!-- /.col-md-12 -->
        </div><!-- /.row -->
    </div><!-- /.container -->
</div><!-- /.flat-row -->

<!-- Promobox -->
<!--<div class="flat-row bg-scheme pad-top20px pad-bottom20px">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <h2 class="flat-title-section style w90 mag-bottom0px"><span class="scheme">We buy equipment from all manufacturers!</span></h2>
            </div>
        </div>

        <div class="flat-divider d48px"></div>
        <div class="row">
            <div class="col-md-2">
                <div class="clients-image style">
                    <div class="item-img">
                        <img src="{{asset('public/assets/images/icons/alcatel.jpeg')}}" alt="images">
                    </div>
                    <p class="tooltip">alcatel</p>
                </div>
            </div>

            <div class="col-md-2">
                <div class="clients-image style">
                    <div class="item-img">
                        <img src="{{asset('public/assets/images/icons/avaya.jpeg')}}" alt="images">
                    </div>
                    <p class="tooltip">avaya</p>
                </div>
            </div>

            <div class="col-md-2">
                <div class="clients-image style">
                    <div class="item-img">
                     <img src="{{asset('public/assets/images/icons/cisco.jpeg')}}" alt="images">
                 </div>
                 <p class="tooltip">cisco</p>
             </div>
         </div>

         <div class="col-md-2">
            <div class="clients-image style">
                <div class="item-img">
                    <img src="{{asset('public/assets/images/icons/hp.jpeg')}}" alt="images">
                </div>
                <p class="tooltip">hp</p>
            </div>
        </div>

        <div class="col-md-2">
            <div class="clients-image style">
                <div class="item-img">
                 <img src="{{asset('public/assets/images/icons/mitel.jpeg')}}" alt="images">
             </div>
             <p class="tooltip">mitel</p>
         </div>
     </div>

                    <div class="col-md-2">
                        <div class="clients-image style">
                            <div class="item-img">
                                   <img src="images/icons/ericsson_1.jpeg" alt="images">
                            </div>
                            <p class="tooltip">ericsson_1</p>
                        </div>
                    </div>
                    <div class="col-md-2">
                        <div class="clients-image style">
                            <div class="item-img">
                                   <img src="images/icons/polycom.jpeg" alt="images">
                            </div>
                            <p class="tooltip">polycom</p>
                        </div>
                    </div><div class="col-md-2">
                        <div class="clients-image style">
                            <div class="item-img">
                                   <img src="images/icons/Brocade.jpeg" alt="images">
                            </div>
                            <p class="tooltip">Brocade</p>
                        </div>
                    </div><div class="col-md-2">
                        <div class="clients-image style">
                            <div class="item-img">
                                   <img src="images/icons/sennheiser.jpeg" alt="images">
                            </div>
                            <p class="tooltip">sennheiser</p>
                        </div>
                    </div><div class="col-md-2">
                        <div class="clients-image style">
                            <div class="item-img">
                                   <img src="images/icons/plantronics.jpeg" alt="images">
                            </div>
                            <p class="tooltip">plantronics</p>
                        </div>
                    </div><div class="col-md-2">
                        <div class="clients-image style">
                            <div class="item-img">
                                   <img src="images/icons/jabra.jpeg" alt="images">
                            </div>
                            <p class="tooltip">jabra</p>
                        </div>
                    </div><div class="col-md-2">
                        <div class="clients-image style">
                            <div class="item-img">
                                   <img src="images/icons/nortel.jpeg" alt="images">
                            </div>
                            <p class="tooltip">nortel</p>
                        </div>
                    </div><div class="col-md-2">
                        <div class="clients-image style">
                            <div class="item-img">
                                   <img src="images/icons/juniper.jpeg" alt="images">
                            </div>
                            <p class="tooltip">juniper</p>
                        </div>
                    </div><div class="col-md-2">
                        <div class="clients-image style">
                            <div class="item-img">
                             <img src="{{asset('public/assets/images/icons/dell.jpeg')}}" alt="images">
                         </div>
                         <p class="tooltip">dell</p>
                     </div>
                 </div>
             </div>
    </div>
 </div>--><!-- /.flat-row -->

     <!--<div class="flat-row pad-top0px pad-bottom30px">
        <div class="container" style="width:100%;padding:0">
            <div class="row">
                <div class="col-md-12 ">
                    <iframe id="gmap_canvas" width="100%" height="80%" src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d2463.502014445146!2d0.2103106153154688!3d51.8700482796964!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x47d88fea5c857f61%3A0x55c47eb58be50f82!2sStansted%20Distribution%20Centre%2C%20Start%20Hill%2C%20Great%20Hallingbury%2C%20Bishop's%20Stortford Hertfordshire%20CM22%207DG%2C%20UK!5e0!3m2!1sen!2sin!4v1597839378832!5m2!1sen!2sin" frameborder="0" scrolling="no" marginheight="0" marginwidth="0"></iframe>

                </div>
            </div>
        </div>
    </div>  -->

    <div class="flat-row pad-top65px pad-bottom80px">
        <div class="container">
            <div class="row">
                <div class="col-md-8 col-md-offset-2">
                    <h2 class="flat-title-section title-center">Request a quick quote.</h2>
                    <p class="text-center">
                        We understand that retiring your old IT equipment while trying to stay compliant and eco-friendly can be quite the balancing act. Our Technology Life Cycle Management Services make the experience simple and secure.
                    </p>
                    <div class="flat-divider d20px"></div>
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
                                    <input name="name" type="text" value="{{ old('name') }}" placeholder="Name">
                                    @error('name')
                                        <span class="help-block">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </p>
                                <p>
                                    <input name="email" type="email" value="{{ old('email') }}" placeholder="Email">
                                    @error('email')
                                        <span class="help-block">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </p>
                                <p>
                                    <input name="phone" type="text" value="{{ old('phone') }}" placeholder="Phone Number">
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
                                    <input name="submit" type="submit" id="submit home_sm" class="submit" value="Send Mail">
                                </span>
                            </div>
                        </div><!-- /.row -->
                    </form>
                </div><!-- /.col-md-8 -->
            </div><!-- /.row -->
        </div><!-- /.container -->
    </div><!-- /.flat-row -->

@endsection

@section('page-style')
<style>
    .icons{
        color: #fff;
        font-size: 30px;
        text-align: center;
        vertical-align: middle;
        font-weight: bold;
	    margin: 0 5px 0 0;
    }
    .bg-black { color: #000 }
    .bg-black:hover { color: #000; }
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
