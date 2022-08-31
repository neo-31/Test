@extends('layouts.app')
@section('title', 'Contact Us')
@section('meta_description', 'There are multiple ways you can contact VDR resale. Feel free to contact us via our forms or your preferred system of communications.')

@section('meta')
    <meta property="og:title" content="Contact Us | VDR Resale">
<meta property="og:site_name" content="VDR Resale">
<meta property="og:url" content="https://vdrresale.com/contact">
<meta property="og:description" content="There are multiple ways you can contact VDR resale. Feel free to contact us via our forms or your preferred system of communications.">
<meta property="og:type" content="article">
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
  "description": "There are multiple ways you can contact VDR resale. Feel free to contact us via our forms or your preferred system of communications.",
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

<div class="page-title parallax-style parallax1">
    <div class="overlay"></div>
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="page-title-heading">
                    <h1>Contact Us</h1>
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
                        <li>Contact us</li>
                    </ul>
                </div><!-- /.breadcrumbs -->
            </div><!-- /.flat-wrapper -->
        </div><!-- /.row -->
    </div><!-- /.container -->
</div><!-- /.page-breadcrumbs -->
<div class="flat-row pad-bottom40px">
    <div class="container">
        <div class="row">
            <div class="col-md-4">
                <div class="flat-contact-us">
                    <h4 class="flat-title-section style mag-top0px">Contact <span>us</span></h4>
                    <p>Our team are ready to answer your questions.</p>
              		<p>
                        <i class="fa fa-phone"></i> <a id="contact_phone_1" href="tel: 07840589677" >07840 589677</a><br>
                        <i class="fa fa-phone"></i><a id="contact_phone_2" href="tel: 0208 440 9908" >0208 440 9908</a><br>
                        <i class="fa fa-envelope"></i><a id="contact_email" href="mailto:info@vdrresale.com" >info@vdrresale.com</a>
                    </p>
                </div>
                <div class="flat-divider d20px"></div>
                <ul class="iconlist">
                    <li><i class="fa fa-clock-o"></i> <strong>Monday:</strong> 08:00 a.m  06:00 p.m</li>
                    <li><i class="fa fa-clock-o"></i> <strong>Tuesday:</strong> 08:00 a.m – 06:00 p.m</li>
                    <li><i class="fa fa-clock-o"></i> <strong>Wednesday:</strong> 08:00 a.m – 06:00 p.m</li>
                    <li><i class="fa fa-clock-o"></i> <strong>Thursday:</strong> 08:00 a.m  06:00 p.m</li>
                    <li><i class="fa fa-clock-o"></i> <strong>Friday:</strong> 08:00 a.m  06:00 p.m</li>
                    <li><i class="fa fa-clock-o"></i> <strong>Saturday – Sunday:</strong> Closed</li>
                </ul>

                <div class="flat-divider d20px"></div>
            </div><!-- /.col-md-4 -->

            <div class="col-md-8">
                <p>To speak to a representative please complete the form below. </p>
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
                                <input name="submit" type="submit" id="submit contact_sm" class="submit" value="Send Mail">
                            </span>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div><!-- /.container -->
</div><!-- /.flat-row -->


<div class="flat-row pad-top0px pad-bottom30px">
    <div class="container">
        <div class="row">
            <div class="col-md-6">
                <iframe id="gmap_canvas" width="100%" height="100%"
                    src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d2463.502014445146!2d0.2103106153154688!3d51.8700482796964!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x47d88fea5c857f61%3A0x55c47eb58be50f82!2sStansted%20Distribution%20Centre%2C%20Start%20Hill%2C%20Great%20Hallingbury%2C%20Bishop's%20Stortford Hertfordshire%20CM22%207DG%2C%20UK!5e0!3m2!1sen!2sin!4v1597839378832!5m2!1sen!2sin"
                    frameborder="0" scrolling="no" marginheight="0" marginwidth="0"></iframe>
            </div>
           <!-- <div class="col-md-4">
                <iframe id="gmap_canvas" width="100%" height="100%"
                    src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d2477.740817261928!2d-0.13674378489976116!3d51.609637411044794!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x48761970a763f9bd%3A0x2e8257c812e97e56!2s12%20Gateway%20Mews%2C%20London%20N11%202UT%2C%20UK!5e0!3m2!1sen!2sin!4v1625048635125!5m2!1sen!2sin"
                    frameborder="0" scrolling="no" marginheight="0" marginwidth="0"></iframe>
            </div> -->
            <div class="col-md-6">
                <iframe id="gmap_canvas" width="100%" height="100%"
                    src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d2483.118083677078!2d-0.14037608422987757!3d51.511049579635625!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x487604d5b575ebf9%3A0x740c63a3bec48788!2s48%20Warwick%20St%2C%20London%20W1B%205AW%2C%20UK!5e0!3m2!1sen!2sin!4v1643641802432!5m2!1sen!2sin"
                    frameborder="0" scrolling="no" marginheight="0" marginwidth="0"></iframe>
            </div>
        </div>
    </div>
</div>


@endsection

@section('page-style')
<style>
    .header-v3 .header .header-wrap {
        position: absolute;
    }
   .flat-contact-us p i {
        color: #E0C463;
        margin-right: 13px;
    }
  .fa fa-clock-o strong {
    /* color: #E0C463; */
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
