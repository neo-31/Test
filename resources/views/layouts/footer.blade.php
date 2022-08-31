<footer class="footer">
    <div class="content-bottom-widgets">
        <div class="container">
            <div class="row">
                <div class="flat-wrapper">
                    <div class="ft-wrapper clearfix">
                        <div class="footer-50">
                            <div class="row">
                                <div class="col-md-4">
                                    <div class="counter">
                                        <div class="counter-image"><i class="fa fa-building-o"></i></div>
                                        <div class="numb-count" data-to="1M" data-speed="3000" data-waypoint-active="yes">1</div><div class="numb-word">M+</div>
                                        <div class="counter-title">
                                            Equipment Purchased
                                        </div>
                                    </div>
                                </div><!-- /.col-md-4 -->

                                <div class="col-md-4">
                                    <div class="counter ft-style1">
                                        <div class="counter-image"><i class="fa fa-group"></i></div>
                                        <div class="numb-count" data-to="40" data-speed="3000" data-waypoint-active="yes">40</div><div class="numb-word">+</div>
                                        <div class="counter-title">
                                            Years Experience
                                        </div>
                                    </div>
                                </div><!-- /.col-md-4 -->

                                <div class="col-md-4">
                                    <div class="counter ft-style2">
                                        <div class="counter-image"><i class="fa fa-globe"></i></div>
                                        <div class="numb-count" data-to="15" data-speed="3000" data-waypoint-active="yes">15</div><div class="numb-word">+</div>
                                        <div class="counter-title">
                                            Countries covered
                                        </div>
                                    </div>
                                </div><!-- /.col-md-4 -->
                            </div><!-- /.row -->
                        </div><!-- /.footer-50 -->

                        <div class="footer-50">
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
                                    <div class="col-md-8">
                                        <input type="email" name="email" placeholder="Your email address" required="">
                                    </div>
                                    <div class="col-md-4">
                                        <input type="submit" value="Subscribe" id="footer_subscribe">
                                    </div>
                                </div>
                            </div>
                            </form>
                        </div>
                    </div><!-- /.ft-wrapper -->
                </div><!-- /.flat-wrapper -->
            </div><!-- /.row -->
        </div><!-- /.container -->
    </div><!-- /.footer-widgets -->

    <div class="footer-widgets">
        <div class="container">
            <div class="row">
                <div class="col-md-3">
                    <div class="widge widget_text" style="text-align: center;">
                        <div class="textwidget">
                           <!-- <h2>canava - business, transport, logistic &amp; warehouse.</h2>-->
                           <a href="{{url('/')}}"><img src="{{asset('public/assets/images/vdr-white-logo.png')}}" alt="images"></a>
                           <p style="margin-top: 9%;color: #ccc;">Maximise your return and improve the cycle of technology with VDR resale.</p>
                        </div>
                    </div><!-- /.widget_text -->
                </div><!-- /.col-md-3 -->

                <div class="col-md-3">
                    <div class="widget widget_recent_entries">
                        <h4 class="widget-title">Recent News</h4>
                        <?php $footer_blog = GetBlogList(); ?>
                        <ul>
                            @foreach($footer_blog as $i => $blog)
                            <li>
                                <a href="{{url('blog'.'/'.$blog->blog_slug)}}">{{$blog->blog_title}}</a>
                                <span class="post-date">{{date('d-M-Y',strtotime($blog->created_at))}}</span>
                            </li>
                            @endforeach
                        </ul>
                    </div><!-- /.widget_recent_entries -->
                </div><!-- /.col-md-3 -->

                <div class="col-md-3">
                    <div class="widget widget_nav_menu">
                        <h3 class="widget-title">Information</h3>
                        <div class="menu-footer-menu-container">
                            <ul class="menu-footer-menu">
                                <li><a href="{{ URL::to('services') }}">All Services</a></li>
                                <li><a href="{{ URL::to('shop') }}">Shop</a></li>
                                <li><a href="{{url('quote')}}">Get a quote</a></li>
                                <li><a href="{{url('service/weee-recycling-services')}}">WEEE Recycling</a></li>
                                <li><a href="{{ URL::to('about') }}">About us</a></li>
                                <li><a href="{{ URL::to('blog') }}">News</a></li>
                                <li><a href="{{ URL::to('faq') }}">FAQ</a></li>
                                <li><a href="{{ URL::to('testimonials') }}">Testimonials</a></li>
                                <li><a href="{{url('service/data-centre-decommissioning')}}">Data Centre Decommissioning</a></li>
                                <li><a href="{{url('sitemap')}}">Sitemap</a></li>
                            </ul>
                        </div>
                    </div>
                </div><!-- /.col-md-3 -->

                <div class="col-md-3">
                    <div class="widget widget_text information">
                        <h3 class="widget-title">Contact Us</h3>
                        <div class="textwidget">
                            <p>
                                <a id="footer_location" target="_blank" href="https://www.google.com/maps/place/48+Warwick+St,+London+W1B+5AW/@51.5110529,-0.1403761,17z/data=!3m1!4b1!4m5!3m4!1s0x487604d5b575ebf9:0x740c63a3bec48788!8m2!3d51.5110496!4d-0.1381874">
                                <strong style="color:#666e70;">48 Warwick St, London W1B 5AW, UK</strong>
                                </a>
                            </p>
                            <p>
                                <i class="fa fa-phone"></i> <strong><a id="footer_p_1" href="tel: 07840589677" >07840 589677</a></strong><br>
                                 <i class="fa fa-phone"></i> <strong><a id="footer_p_2" href="tel: 0208 440 9908" >0208 440 9908</a></strong><br>
                                <i class="fa fa-envelope"></i> <strong><a id="footer_email" href="mailto:info@vdrresale.com" >info@vdrresale.com</a></strong>
                            </p>
                          <!--  <p>
                                <i class="fa fa-phone"></i>  007-123-456-7890<br>
                                <i class="fa fa-envelope"></i>themesflat@gmail.com
                            </p>-->
                        </div>
                    </div>
                </div><!-- /.col-md-3 -->
            </div><!-- /.row -->
        </div><!-- /.container -->
    </div><!-- /.footer-content -->

    <div class="footer-content">
        <div class="container">
            <div class="row">
                <div class="flat-wrapper">
                    <div class="ft-wrap clearfix">
                        <div class="social-links">
                            <!-- <a href="#"><i class="fa fa-twitter"></i></a> -->
                            <a href="https://www.facebook.com/VDResale/"><i class="fa fa-facebook-official"></i></a>
                            <!-- <a href="#"><i class="fa fa-google-plus"></i></a> -->
                            <a href="https://www.linkedin.com/uas/login?session_redirect=https%3A%2F%2Fwww.linkedin.com%2Fcompany%2Fvoice-data-resale%2Fabout"><i class="fa fa-linkedin"></i></a>
                        </div>
                        <div class="copyright">
                            <div class="copyright-content">
                             Copyright  2020 VDR Resale. <a href="{{asset('public/images/VDR-Privacy-Notice.pdf')}}" target="_blank"><font color="#aa762d">Privacy Policy</font></a>. All Rights Reserved. Powered by Progress H.
                            </div>
                        </div>
                    </div><!-- /.ft-wrap -->
                </div><!-- /.flat-wrapper -->
            </div><!-- /.row -->
        </div><!-- /.container -->
    </div><!-- /.footer-content -->
</footer>

<!-- Go Top -->
<a class="go-top">
    <i class="fa fa-chevron-up"></i>
</a>

</div>

<script type="text/javascript">
  window._mfq = window._mfq || [];
  (function() {
    var mf = document.createElement("script");
    mf.type = "text/javascript"; mf.defer = true;
    mf.src = "//cdn.mouseflow.com/projects/be6c3513-97e2-4eb9-8c8a-28a29be7454b.js";
    document.getElementsByTagName("head")[0].appendChild(mf);
  })();
</script>


</body>
</html>
