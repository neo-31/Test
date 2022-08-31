@extends('layouts.app')
@section('title', 'About Us')
@section('meta_description', 'We offer a complete service for End of Life IT Recycling. We buy back and securely destroy data tapes, and we also sell IT equipment.')

@section('meta')
    <meta property="og:title" content="About Us | VDR Resale">
    <meta property="og:site_name" content="VDR Resale">
    <meta property="og:url" content="https://vdrresale.com/about">
    <meta property="og:description" content="we will ensure you get the maximum value back for your hardware! Get a Quote Online to Sell your Networking Equipment: effortless, Secure, & Precious!">
    <meta property="og:type" content="business.business">
    <meta property="og:image" content="https://www.vdrresale.com/public/assets/images/about/about4.png">
@stop

@section('schema')
<script type='application/ld+json'> 
{
  "@context": "http://www.schema.org",
  "@type": "Organization",
  "name": "VDR Resale",
  "url": "https://www.vdrresale.com/",
  "logo": "https://www.vdrresale.com/public/assets/images/vdr-logo.png",
  "image": "https://www.vdrresale.com/public/assets/images/about/about4.png",
  "description": "we will ensure you get the maximum value back for your hardware! Get a Quote Online to Sell your Networking Equipment: effortless, Secure, & Precious!",
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

        <!-- Page title -->
        <div class="page-title parallax parallax2">
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <div class="page-title-heading">
                            <h1>About Us</h1>
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
                                <li>About us</li>
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
                        <div class="general-slider about-slider">
                            <div class="flexslider">
                                <ul class="slides">
                                    <li>
                                        <a class="popup-gallery" href=""><img src="{{asset('public/assets/images/about/about4.png')}}" alt="images"></a>
                                    </li>
                                     <li>
                                        <a class="popup-gallery" href=""><img src="{{asset('public/assets/images/about/about5.png')}}" alt="images"></a>
                                    </li>
                                    <li>
                                        <a class="popup-gallery" href=""><img src="{{asset('public/assets/images/about/about1.png')}}" alt="images"></a>
                                    </li>
                                    <li>
                                        <a class="popup-gallery" href=""><img src="{{asset('public/assets/images/about/about2.png')}}" alt="images"></a>
                                    </li>
                                    <li>
                                        <a class="popup-gallery" href=""><img src="{{asset('public/assets/images/about/about3.png')}}" alt="images"></a>
                                    </li>
                                    
                                   
                                </ul>
                            </div>
                        </div><!-- /.about-slider -->

                        <div class="flat-divider d30px"></div>

                        <h3 class="flat-title-section style mag-top10px">Company <span>overview</span></h3>
                        <p>We are a family-owned IT asset recovery company. With over 40 years of experience, we have never had one data breach. Now that’s experience you can trust!</p>
                        <p>We understand that retiring your old IT equipment while trying to stay compliant and eco-friendly can be quite the balancing act. Our Technology Life Cycle Management Services make the experience simple and secure.
</p>
                        <p>VDR Resale offer several methods of data destruction, hard drive disposal, and electronics recycling.
</p>
                        <p>VDR Resale takes an earth-friendly approach to E-Waste by properly disposing of, recycling, or refurbishing excess technology equipment.
</p>
<p>Equipment that has value will be refurbished and resold to businesses that can truly benefit from the tech. This extends the lifecycle of the equipment. For equipment that has little value, we responsibly recycle as the need dictates. We offer cash buyback and asset liquidation programs, removals, secure shipping, and storage for all your IT asset needs.

</p>

                        <div class="promobox">
                            <h5 class="promobox-title mag-top0px">Get a Quick Quote for your excess IT, Telecoms & Mobile Hardware today! </h5>
                            <div class="group-btn">
                                <a id="about_contact_2" class="button black" href="{{url('contact')}}">contact us <i class="fa fa-chevron-right"></i></a>
                                <a id="about_vs" class="button black" href="{{url('services')}}">view services <i class="fa fa-chevron-right"></i></a>
                              	<!-- <a class="button outline" href="{{url('services')}}">view services <i class="fa fa-chevron-right"></i></a> -->
                            </div>
                        </div><!-- /.promobox -->

                        <div class="row">
                            <div class="col-md-7">
                                <div class="flat-tabs">
                                    <ul class="menu-tabs">
                                        <li class="active"><a href="#">Compliant</a></li>
                                        <li><a href="#">Environmentally&nbsp;friendly</a></li>
                                    </ul>
                                    <div class="content-tab">
                                        <div class="content-inner">
                                            <p>VDR Resale is an approved WEEE recycling company that can take care of all of the computer & IT disposal for your business. Our e-waste collections service will pick up your old equipment and make sure they are cleared of any sensitive data and delivered to approved recycling centres.

</P><P>WEEE Disposal Registration Number: CBDU336628</p>
                                        </div><!-- /.content-inner -->

                                        <div class="content-inner">
                                            <p>When it comes to WEEE disposal, IT recycling can be one of the biggest problems for both commercial and domestic users. </p>
                                            <p>If your IT equipment can’t be re-homed or is damaged beyond repair, then you need to look into the correct ways to dispose of it. This can be difficult, as only approved centres can properly recycle IT & telecommunications equipment.</p>
                                        </div><!-- /.content-inner -->
                                    </div><!-- /.content-tab -->
                                </div><!-- /.flat-tabs -->
                            </div><!-- /.col-md-6 -->

                            <div class="col-md-5">
                                <img src="{{asset('public/assets/images/slides/box1.png')}}" alt="images">
                                <div class="flat-divider d30px"></div>
                                <img src="{{asset('public/assets/images/slides/box2.png')}}" alt="images">
                            </div><!-- /.col-md-6 -->
                        </div><!-- /.row -->
                    </div><!-- /.general -->

                    <div class="general-sidebars">
                        <div class="sidebar-wrap">
                            <div class="sidebar">
                                <div class="widget widget_nav_menu">
                                    <ul class="nav_menu">
                                        <li class="menu-item">
                                            <a class="active" href="{{url('quote')}}">REQUEST A QUOTE</a>
                                        </li>
                                        <li class="menu-item">
                                            <a href="{{url('about')}}">MEET THE TEAM</a>
                                        </li>
                                         <li class="menu-item">
                                            <a href="{{url('testimonials')}}">Testimonials</a>
                                        </li>
                                        <li class="menu-item">
                                            <a href="{{url('service/sell-it-equipment')}}">SELL EQUIPMENT</a>
                                        </li>
                                        <li class="menu-item">
                                            <a href="{{url('service/weee-recycling-services')}}">WEEE WASTE </a>
                                        </li>
                                        <li class="menu-item">
                                            <a href="{{url('service/data-centre-decommissioning')}}">Data Center Decommissioning</a>
                                        </li>


                                    </ul>
                                </div><!-- /.widget_nav_menu -->

                                <div class="widget widget_recent_entries">
                                    <h4 class="widget-title">Company news</h4>
                                    <ul>
                                          @foreach ($latest_blog as $blog)
                                <li>
                                    <a href="{{url('blog'.'/'.$blog->blog_slug)}}">{{$blog->blog_title}}</a>
                                    <span class="post-date">{{date('d-M-Y',strtotime($blog->created_at))}}</span>
                                </li>
                                @endforeach
                                    </ul>
                                </div><!-- /.widget_recent_entries -->

                                <div class="widget widget_text">
                                    <div class="textwidget">
                                        <div class="content-text">
                                            <h4 class="title">We buy excess IT equipment</h4>
                                            <p>We offer the best market price by casting a wider net and utilising our long-term partners, we can offer you the best price for your obsolete IT & Telecoms equipment.</p>
                                            <a id="about_contact_1" class="button white" href="{{url('contact')}}">Contact Us<i class="fa fa-chevron-right"></i></a>
                                        </div>
                                    </div><!-- /.textwidget -->
                                </div><!-- /.widget_text -->

                            </div><!-- /.sidebar -->
                        </div><!-- /.sidebar-wrap -->
                    </div><!-- /.general-sidebars -->
                </div><!-- /.row -->
            </div><!-- /.container -->
        </div><!-- /.blog -->

        @endsection

        @section('page-style')
        <style>
            .header-v3 .header .header-wrap{
                position: absolute;
            }
        </style>

        @endsection

        @section('page-script')

        @endsection
