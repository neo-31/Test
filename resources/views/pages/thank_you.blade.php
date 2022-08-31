<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    
    <!-- Google Tag Manager -->
<script>(function(w,d,s,l,i){w[l]=w[l]||[];w[l].push({'gtm.start':
new Date().getTime(),event:'gtm.js'});var f=d.getElementsByTagName(s)[0],
j=d.createElement(s),dl=l!='dataLayer'?'&l='+l:'';j.async=true;j.src=
'https://www.googletagmanager.com/gtm.js?id='+i+dl;f.parentNode.insertBefore(j,f);
})(window,document,'script','dataLayer','GTM-K339WZF');</script>
<!-- End Google Tag Manager -->
    
    <title>Thank You | Vdr</title>
    <link rel="icon" href="{{ asset('public/images/icon.png') }}" type="image/x-icon">
    <style>
        body,
        html {
            height: 100%;
            margin: 0;
        }
        .bgimg {
            background-image: url("{{ asset('public/assets/images/slides/WEEE.png') }}");
            height: 100%;
            background-position: center;
            background-size: cover;
            position: relative;
            color: black;
            font-family: "Montserrat";
            font-size: 25px;
        }
        .topleft {
            position: absolute;
            top: 0;
            left: 16px;
        }
        .bottomleft {
            position: absolute;
            bottom: 0;
            left: 16px;
        }
        .middle {
            position: absolute;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
            text-align: center;
        }
        hr {
            margin: auto;
            width: 40%;
        }
        a.button1 {
            display: inline-block;
            padding: 0.35em 1.2em;
            border: 0.1em solid #000000;
            margin: 0 0.3em 0.3em 0;
            border-radius: 0.12em;
            box-sizing: border-box;
            text-decoration: none;
            font-family: 'Roboto', sans-serif;
            font-weight: 300;
            color: #000000;
            text-align: center;
            transition: all 0.2s;
        }
        a.button1:hover {
            color: #000000;
            background-color: #FFFFFF;
        }
        a.button1 {
            display: block;
            margin: 0.4em auto;
        }
    </style>
</head>
<body>
    
    <!-- Google Tag Manager (noscript) -->
<noscript><iframe src="https://www.googletagmanager.com/ns.html?id=GTM-K339WZF"
height="0" width="0" style="display:none;visibility:hidden"></iframe></noscript>
<!-- End Google Tag Manager (noscript) -->

    <div class="bgimg">
        <div class="topleft">
            <p>
                <a href="{{ url('/') }}">
                    <img src="{{asset('public/assets/images/vdr-logo.png')}}" alt="vdr" width="100%" height="100%" />
                </a>
            </p>
        </div>
        <div class="middle">
            <h2 style="color: white">Thank you for contacting us!</h2>
            <hr>
            <br />
            <a href="{{ url('/') }}" class="button1">Back to website</a>
        </div>
    </div>
</body>

</html>
