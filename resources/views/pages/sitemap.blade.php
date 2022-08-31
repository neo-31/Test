

<!doctype html>

<html lang="en">
<head>
	<meta charset="utf-8"/>
	<meta name="author" content="" />
	<title>VDR Sitemap</title>
	<meta name="description" content="A demo of SlickMap CSS, a simple stylesheet for displaying visual sitemaps." />
	<!--<link rel="stylesheet" type="text/css" media="screen, print" href="/css/slickmap/slickmap.css" />-->
	<!--[if lte IE 7]> <link rel="stylesheet" type="text/css" media="screen,print" href="/css/slickmap/slickmap-ie.css" /> <![endif]-->
	<!--[if lte IE 9]> <script src="https://html5shim.googlecode.com/svn/trunk/html5.js"></script> <![endif]-->
	<link rel="icon" href="{{asset('public/images/icon.png')}}" type="image/x-icon">
	<link rel="preconnect" href="https://fonts.gstatic.com">
<link href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">
	<script type="text/javascript"></script>
	<style>
	/* ------------------------------------------------------------
	Reset Styles (from meyerweb.com)
	------------------------------------------------------------ */

	html, body, div, span, applet, object, iframe,
	h1, h2, h3, h4, h5, h6, p, blockquote, pre,
	a, abbr, acronym, address, big, cite, code,
	del, dfn, em, font, img, ins, kbd, q, s, samp,
	small, strike, strong, sub, sup, tt, var,
	dl, dt, dd, ol, ul, li,
	fieldset, form, label, legend,
	table, caption, tbody, tfoot, thead, tr, th, td {
		margin: 0;
		padding: 0;
		border: 0;
		outline: 0;
		font-weight: inherit;
		font-style: inherit;
		font-size: 100%;
		font-family: "Poppins", sans-serif;
		vertical-align: baseline;
	}

	/* ------------------------------------------------------------
		NUMBER OF COLUMNS: Adjust #primaryNav li to set the number
		of columns required in your site map. The default is
		4 columns (25%). 5 columns would be 20%, 6 columns would
		be 16.6%, etc.
	------------------------------------------------------------ */

	#primaryNav li {
		width:25%;
	}

	#primaryNav li ul li {
		width:100% !important;
	}

	#primaryNav.col1 li { width:99.9%; }
	#primaryNav.col2 li { width:50.0%; }
	#primaryNav.col3 li { width:33.3%; }
	#primaryNav.col4 li { width:25.0%; }
	#primaryNav.col5 li { width:20.0%; }
	#primaryNav.col6 li { width:16.6%; }
	#primaryNav.col7 li { width:14.2%; }
	#primaryNav.col8 li { width:12.5%; }
	#primaryNav.col9 li { width:11.1%; }
	#primaryNav.col10 li { width:10.0%; }

	/* ------------------------------------------------------------
		General Styles
	------------------------------------------------------------ */

	body {
		background: white;
		color: black;
		padding: 40px;
		font-family: "Poppins", sans-serif;
		font-size: 18px;
		line-height: 1;
	}
	.sitemap {
		margin: 0 0 40px 0;
		float: left;
		width: 100%;
	}
	h1 {
		font-weight: bold;
		text-transform: uppercase;
		font-size: 20px;
		margin: 0 0 5px 0;
	}
	h2 {
		font-family: "Poppins", sans-serif;
		font-size: 16px;
		color: #777777;
		margin: 0 0 20px 0;
	}
	a {
		text-decoration: none;
	}
	ol, ul {
		list-style: none;
	}


	/* ------------------------------------------------------------
		Site Map Styles
	------------------------------------------------------------ */

	/* --------	Top Level --------- */

	#primaryNav {
		margin: 0;
		float: left;
		width: 100%;
	}
	#primaryNav #home {
		display: block;
		float: none;
		/* background: #ffffff url('/images/slickmap/L1-left.png') center bottom no-repeat; */
		position: relative;
		z-index: 2;
		padding: 0 0 30px 0;
	}
	#primaryNav li {
		float: left;
		/* background: url('/images/slickmap/L1-center.png') center top no-repeat; */
		padding: 30px 0;
		margin-top: -30px;
	}
	#primaryNav li a {
		margin: 0 20px 0 0;
		padding: 10px 0;
		display: block;
		font-size: 14px;
		font-weight: bold;
		text-align: center;
		color: black;
		background: #E0C463;
		/*border: 2px solid #000000;*/
		-moz-border-radius: 5px;
		-webkit-border-radius: 5px;
		-webkit-box-shadow: rgba(0,0,0,0.5) 2px 2px 2px;
		-moz-box-shadow: rgba(0,0,0,0.5) 2px 2px 2px; /* FF 3.5+ */
	}
	#primaryNav li a:hover {
		background-color: #e7f1d7;
		/*border-color: #000000;*/
	}
	#primaryNav li:last-child {
		/* background: url('/images/slickmap/L1-right.png') center top no-repeat; */
	}
	/*a:link:before,
	a:visited:before {
		content: " "attr(href)" ";
		display: block;
		text-transform: uppercase;
		font-size: 10px;
		margin-bottom: 5px;
		word-wrap: break-word;
	}*/
	#primaryNav li a:link:before,
	#primaryNav li a:visited:before {
		color: #ffffff;
	}

	/* --------	Second Level --------- */

	#primaryNav li li {
		width: 100%;
		clear: left;
		margin-top: 0;
		padding: 10px 0 0 0;
		/* background: url('/images/slickmap/vertical-line.png') center bottom repeat-y; */
	}
	#primaryNav li li a {
		background-color: #cee3ac;
		border-color: #b8da83;
	}
	#primaryNav li li a:hover {
		border-color: #94b75f;
		background-color: #e7f1d7;
	}
	#primaryNav li li:first-child {
		padding-top: 30px;
	}
	#primaryNav li li:last-child {
		/* background: url('/images/slickmap/vertical-line.png') center bottom repeat-y; */
	}
	#primaryNav li li a:link:before,
	#primaryNav li li a:visited:before {
		color: #8faf5c;
	}

	/* --------	Third Level --------- */

	#primaryNav li li ul {
		margin: 10px 0 0 0;
		width: 100%;
		float: right;
		padding: 9px 0 10px 0;
		/* background: #ffffff url('/images/slickmap/L3-ul-top.png') center top no-repeat; */
	}
	#primaryNav li li li {
		/* background: url('/images/slickmap/L3-center.png') left center no-repeat; */
		padding: 5px 0;
	}
	#primaryNav li li li a {
		background-color: #fff7aa;
		border-color: #e3ca4b;
		font-size: 12px;
		padding: 5px 0;
		width: 80%;
		float: right;
	}
	#primaryNav li li li a:hover {
		background-color: #fffce5;
		border-color: #d1b62c;
	}
	#primaryNav li li li:first-child {
		padding: 15px 0 5px 0;
		/* background: url('/images/slickmap/L3-li-top.png') left center no-repeat; */
	}
	#primaryNav li li li:last-child {
		/* background: url('/images/slickmap/L3-bottom.png') left center no-repeat; */
	}
	#primaryNav li li li a:link:before,
	#primaryNav li li li a:visited:before {
		color: #ccae14;
		font-size: 9px;
	}


	/* ------------------------------------------------------------
		Utility Navigation
	------------------------------------------------------------ */

	#utilityNav {
		float: right;
		max-width: 50%;
		margin-right: 10px;
	}
	#utilityNav li {
		float: left;
		margin-bottom: 10px;
	}
	#utilityNav li a {
		margin: 0 10px 0 0;
		padding: 5px 10px;
		display: block;
		border: 2px solid #e3ca4b;
		font-size: 12px;
		font-weight: bold;
		text-align: center;
		color: black;
		/* background: #fff7aa url('/images/slickmap/white-highlight.png') top left repeat-x; */
		-moz-border-radius: 5px;
		-webkit-border-radius: 5px;
		-webkit-box-shadow: rgba(0,0,0,0.5) 2px 2px 2px;
		-moz-box-shadow: rgba(0,0,0,0.5) 2px 2px 2px; /* FF 3.5+ */
	}
	#utilityNav li a:hover {
		background-color: #fffce5;
		border-color: #d1b62c;
	}
	#utilityNav li a:link:before,
	#utilityNav li a:visited:before {
		color: #ccae14;
		font-size: 9px;
		margin-bottom: 3px;
	}
	.notes p {
		font-family: Georgia, Times, serif;
		font-size: 13px;
	}
	.notes p a  {
		text-decoration: underline;
	}
	.notes p a:link:before,
	.notes p a:visited:before {
		content: "  ";
		display: none;
		text-transform: uppercase;
		font-size: 10px;
		margin-bottom: 5px;
		word-wrap: break-word;
	}
	</style>
</head>

<body>

	<div class="sitemap">

		<h1 align="center" style="font-family: 'Poppins', sans-serif;">VDR Resale</h1>
		<h2 align="center" style="font-family: 'Poppins', sans-serif;">Preliminary Site Map &mdash; Version 1.0</h2>

		<ul id="utilityNav">
			<!--<li><a href="demo/register">Register</a></li>
			<li><a href="demo/login">Log In</a></li>
			<li><a href="demo/smap">Site Map</a></li>-->
		</ul>

		<ul id="primaryNav">
			<li ><a href="{{ URL::to('') }}">Home</a></li>
			<li><a href="{{ URL::to('services') }}">SELL TO US</a>
				<ul>
					<li><a href="{{ URL::to('service/sell-it-equipment') }}">Sell Excess IT Equipment</a></li>
					<li><a href="{{ URL::to('service/sell-used-mobile-phones') }}">Sell Phone Systems</a></li>
					<li><a href="{{ URL::to('service/sell-cisco-equipment') }}">Sell Cisco Equipment</a></li>
					<li><a href="{{ URL::to('service/sell-mitel-equipment') }}">Sell Mitel Equipment</a></li>
					<li><a href="{{ URL::to('service/sell-nortel-equipment') }}">Sell Nortel Equipment</a></li>
					<li><a href="{{ URL::to('service/sell-polycom-equipment') }}">Sell Polycom Equipment</a></li>
					<li><a href="{{ URL::to('service/sell-juniper-equipment') }}">Sell Juniper Equipment</a></li>
					<li><a href="{{ URL::to('service/sell-used-phone-system') }}">Sell a used Phone System</a></li>
					<li><a href="{{ URL::to('service/sell-ciena-equipment') }}">Sell Ciena Equipment</a></li>
					<li><a href="{{ URL::to('service/sell-voip-systems') }}">Sell VoIP Systems</a></li>
					<li><a href="{{ URL::to('service/sell-your-mitel-phones-system') }}">Sell Your Mitel Phones System</a></li>
					<li><a href="{{ URL::to('service/sell-used-voip-phones') }}">Sell Used VoIP Phones</a></li>
					<li><a href="{{ URL::to('service/sell-cisco-switches') }}">Sell Cisco Switches</a></li>
					{{-- <li><a href="{{ URL::to('service/sell-used-mobile-phones') }}">Sell Used Mobile Phones</a></li> --}}
				</ul>
			</li>
			<li><a href="{{ URL::to('services') }}">OUR SERVICES</a>
				<ul>
					<li><a href="{{ URL::to('service/sell-it-equipment') }}">Sell IT Equipment</a></li>
					<li><a href="{{ URL::to('service/data-centre-decommissioning') }}">Data Centre Decommissioning</a></li>
					<li><a href="{{ URL::to('service/weee-recycling-services') }}">WEEE RECYCLING</a></li>
				</ul>
			</li>
			<li><a href="{{ URL::to('about') }}">About</a></li>
			<li><a href="{{ URL::to('shop') }}">Shop</a></li>
			<li><a href="{{ URL::to('blog') }}">News</a></li>
			<li><a href="{{ URL::to('video') }}">video</a></li>
			<li><a href="{{ URL::to('quote') }}">Request a Quote</a></li>
			<li><a href="{{ URL::to('contact') }}">Contact</a></li>
			<li><a href="{{ URL::to('faq') }}">FAQ</a></li>
			<li><a href="{{ URL::to('testimonials') }}">Testimonials</a></li>
		</ul>

	</div>

	<div class="notes">

		<p align="center" style="font-family: 'Poppins', sans-serif;">Copyright © 2020 VDR Resale. <a href="{{asset('public/images/VDR-Privacy-Notice.pdf')}}" target="_blank"><font color="#aa762d">Privacy Policy</font></a>. All Rights Reserved. Powered by Progress H.</p>

	</div>

	<script>

	 var _gaq = _gaq || [];
	  _gaq.push(['_setAccount', 'UA-1180261-2']);
	  _gaq.push(['_trackPageview']);
	  (function() {
		var ga = document.createElement('script'); ga.type = 'text/javascript'; ga.async = true;
		ga.src = ('https:' == document.location.protocol ? 'https://ssl' : 'http://www') + '.google-analytics.com/ga.js';
		var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(ga, s);
	  })();

	</script>
</body>
</html>


