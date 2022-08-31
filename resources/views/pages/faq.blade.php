@extends('layouts.app')
@section('title', 'FAQ')
@section('meta_description', 'Frequently Asked Questions')

@section('content')

        <!-- Page title -->
        <div class="page-title parallax parallax2">
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <div class="page-title-heading">
                            <h2>Frequently Asked Questions</h2>
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
                                <li>FAQ</li>
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
                        <img src="{{asset('public/assets/images/faq-1.jpg')}}" alt="images">
                        <div class="flat-divider d30px"></div>
                        <h3 class="flat-title-section style">Frequently Asked <span>Questions</span></h3>

                        <div><p>Below are some of the most frequently asked questions by our customers. If you cant find the answers you are looking for here then please do not hesitate to get in contact.</p></div>

                        <div class="flat-divider d30px"></div>

                        <div class="flat-accordion style1">
                            <div class="flat-toggle">
                                <h6 class="toggle-title">How is my equipment valued?</h6>
                                <div class="toggle-content">
                                    <p>Many factors affect the value of your equipment:</p>
                                    <ul class="dot mt-5">
                                        <li>The Condition  Is the equipment brand new sealed in boxes, new but opened, refurbished, or used?</li>
                                        <li>Age - How old is the equipment?</li>
                                        <li>Quantities - How many units are you selling us? </li>
                                        <li>Manufacturers, Brands and Part Numbers </li>
                                        <li>Connection types included – SATA, SAS, Fibre</li>
                                        <li>Size and Capacity of equipment</li>
                                        <li>Configuration and integrations</li>
                                        <li>Shipping from location</li>
                                    </ul>
                                </div>
                            </div><!-- /toggle -->
                            <div class="flat-toggle">
                                <h6 class="toggle-title">How is the data on my devices erased?</h6>
                                <div class="toggle-content">
                                    <p>The answer depends on the type equipment we are handling. </p>                               
                                    <p>Degaussers for example we are able to erase because they generate a magnetic field that is so powerful that it permanently and completely removes the magnetic memory from the iron oxide which removes the data pattern on the device. </p>                               
                                    <p>Depending on the type of equipment we are handling, different magnetic field strengths are required to completely destroy magnetic memory. Modern tapes and hard drives require a stronger magnetic strength to accurately destroy the data. It is our job to assess this and advise your accordingly.  </p>                               
                                    <p>Depending on the type of media your organization uses, we will use the appropriate degausser to safely and securely remove all the data from the device so that it can no longer be accessed. </p>                               
                                    <p>Hard drives are not reusable after they have been degaussed. </p>                               
                                    <p>Data Destruction Certificate provided at no charge to you. </p>                               
                                    <p>Overwrite and Reformatting devices. </p>                               
                                    <p>VDR Resale utilise proprietary and approved software and processes to ensure the proper data eradication from the equipment.</p>                               
                                    <p>Multiple pass reformats overwrites the functional storage media, hard drives, and other equipment that ensure the secure data destruction and reuse of equipment.</p>                               
                                    <p>All our Data Destruction methods include a Certificate provided at no charge.</p>                               
                                    <p>Please contact us with any data destruction questions you have about your equipment. </p>                               
                                </div>
                            </div><!-- /toggle -->

                            <div class="flat-toggle">
                                <h6 class="toggle-title">Do you have a minimum quantity for purchases?</h6>
                                <div class="toggle-content">
                                    <p>We have no minimum sale quantity. However the more units you have available to sell the better a price we can offer you. If you think you might have more equipment to sell in the future do not forget to tell us so we can offer you a price accordingly.</p>                               
                                </div>
                            </div><!-- /toggle -->

                            <div class="flat-toggle">
                                <h6 class="toggle-title">Do you purchase internationally?</h6>
                                <div class="toggle-content">
                                    <p>Yes we will purchase equipment from anywhere in the world.</p> 
                                </div>
                            </div><!-- /toggle -->
                            <div class="flat-toggle">
                                <h6 class="toggle-title">What is your privacy policy?</h6>
                                <div class="toggle-content">
                                    <p>Our privacy policy is included at the bottom of every page on our website and is updated regularly. </p>
                                </div>
                            </div><!-- /toggle -->
                            <div class="flat-toggle">
                                <h6 class="toggle-title">Do you provide on-site services?</h6>
                                <div class="toggle-content">
                                    <ul class="dot mt-5">
                                        <li>Yes, we offer a full suite of onsite services</li>
                                        <li>On-Site Data Destruction</li>
                                        <li>Physical Storage Media Destruction/Recycling services</li>
                                        <li>Data Center Decommissioning</li>
                                        <li>Large Equipment Removal</li>
                                    </ul>
                                </div>
                            </div><!-- /toggle -->                            
                        </div><!-- /.flat-accordion -->
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
                                            <a href="{{url('service/data-centre-decommissioning')}}">DATA DESTRUCTION</a>
                                        </li>


                                    </ul>
                                </div><!-- /.widget_nav_menu -->

                                <div class="widget widget_recent_entries">
                                    <h4 class="widget-title">Company news</h4>
                                    <ul>
                                        <li>
                                            <a href="javascript:;">Explore the dark side of E-waste and why we are different</a>
                                            <span class="post-date">March 25, 2016</span>
                                        </li>
                                        <li>
                                            <a href="javascript:;">Simple solutions for IT asset recovery and data destruction</a>
                                            <span class="post-date">March 25, 2016</span>
                                        </li>
                                        <li>
                                            <a href="javascript:;">Follow our earth-friendly journey to ensure equipment avoids landfills</a>
                                            <span class="post-date">March 25, 2016</span>
                                        </li>
                                    </ul>
                                </div><!-- /.widget_recent_entries -->

                                <div class="widget widget_text">
                                    <div class="textwidget">
                                        <div class="content-text">
                                            <h4 class="title">We buy excess IT equipment</h4>
                                            <p>We offer the best market price by casting a wider net and utilising our long-term partners, we can offer you the best price for your obsolete IT & Telecoms equipment.</p>
                                            <a class="button white" href="{{url('contact')}}">Contact Us<i class="fa fa-chevron-right"></i></a>
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
            p {
                margin-top: 0;
                margin-bottom: 0px !important;
                font-size: 18px;
            }
            .dot{
                margin-left: 5%;
            }
            .dot li::before {
              content: "\2022";
              /*color: red;*/
              font-weight: bold;
              display: inline-block; 
              width: 1em;
              margin-left: -1em;
            }
        </style>

        @endsection

        @section('page-script')

        @endsection
