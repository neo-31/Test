@extends('layouts.app')
@section('title', 'IT Equipment Blog')
@section('meta_description', 'Get all the latest blogs and news on IT Equipmensts, IT Disposal, and WEEE Recycling')

@section('content')
<div class="page-title parallax-style parallax1">
    <div class="overlay"></div>
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="page-title-heading">
                    <h1>Blog</h1>
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
                        <li>News</li>
                    </ul>
                </div><!-- /.breadcrumbs -->
            </div><!-- /.flat-wrapper -->
        </div><!-- /.row -->
    </div><!-- /.container -->
</div><!-- /.page-breadcrumbs -->

<div class="blog">
    <div class="container">
        <div class="row">
            <div class="content-wrap">
                <div class="main-content">
                    <div class="main-content-wrap">
                        <div class="content-inner">
                            @foreach ($blogs as $blog)
                            <article class="blog-post">
                                <div class="entry-wrapper">
                                    <div class="entry-cover">
                                        <a href="{{url('blog')."/".$blog->blog_slug}}">
                                            <img src="{{$blog->inner_image}}" alt="images">
                                        </a>
                                    </div><!-- /.entry-cover -->
                                    <h4 class="entry-time">
                                        <span class="entry-month">{{date('d',strtotime($blog->created_at))}}</span>
                                        <span class="entry-day">{{date('M',strtotime($blog->created_at))}}</span>
                                    </h4>

                                    <div class="entry-header">
                                        <div class="entry-header-content">
                                            <h4 class="entry-title">
                                                <a href="{{url('blog').'/'.$blog->blog_slug}}">{{$blog->blog_title}}</a>
                                            </h4>
                                            <!--<div class="entry-meta">
                                                <i class="fa fa-user"></i>
                                                <span class="entry-author"><a href="#">admin</a></span>
                                                <i class="fa fa-folder-open"></i>
                                                <span class="entry-categories"><a href="#">Warehouse</a></span>
                                                <i class="fa fa-comment"></i>
                                                <span class="entry-comments-link"><a href="#">0 Comment</a></span>
                                            </div>-->
                                        </div><!-- /.entry-header-content -->
                                    </div><!-- /.entry-header -->

                                    <div class="entry-content">
                                        <p>{{$blog->short_description}}</p>
                                        <div class="readmore"><a href="{{url('blog'.'/'.$blog->blog_slug)}}" class="more-link">Read more</a></div>
                                    </div><!-- /.entry-content -->
                                </div><!-- /.entry-wrapper -->
                            </article><!-- /.blog-post -->
                            @endforeach




                            <div class="navigation paging-navigation numeric">
                                <div class="flat-pagination loop-pagination">
                                    <span class="page-numbers current">1</span>
                                    <a class="page-numbers" href="#">2</a>
                                </div><!-- /.flat-pagination -->
                            </div><!-- /.navigation .paging-navigation .numeric -->
                        </div><!-- /.content-inner -->

                    </div><!-- /.main-content-wrap -->
                </div><!-- /.main-content -->

                <div class="sidebars">
                    <div class="sidebars-wrap">
                        <div class="sidebar">
                            <div class="widget widget_recent_entries">
                                <h4 class="widget-title">Recent news</h4>
                                <ul>
                                    @foreach ($blogs as $blog )
                                    <li>
                                        <a href="{{url('blog'.'/'.$blog->blog_slug)}}">{{$blog->blog_title}}</a>
                                        <span class="post-date">{{date('d-M-Y',strtotime($blog->created_at))}}</span>
                                    </li>
                                    @endforeach


                                </ul>
                            </div><!-- /.widget_recent_entries -->

                            <!--<div class="widget widget_categories">-->
                            <!--    <h4 class="widget-title">Blog Categories</h4>-->
                            <!--    <ul>-->
                            <!--        @foreach ($category_list as $category )-->
                            <!--        <li><a href="">{{$category->category_name}}</a></li>-->
                            <!--        @endforeach-->

                            <!--    </ul>-->
                            <!--</div>-->
                            <!-- /.widget_categories -->

                            <div class="widget widget_text">
                                <div class="textwidget">
                                    <div class="content-text">
                                        <h4 class="title">We buy excess IT equipment</h4>
                                        <p>We offer the best market price by casting a wider net and utilising our long-term partners, we can offer you the best price for your obsolete IT & Telecoms equipment.</p>
                                        <a class="button white" href="{{url('contact')}}">Contact us<i class="fa fa-chevron-right"></i></a>
                                    </div>
                                </div><!-- /.textwidget -->
                            </div><!-- /.widget_text -->

                            <!--<div class="widget widget_tag_cloud">-->
                            <!--    <h4 class="widget-title">Tag clound</h4>-->
                            <!--    <div class="tagcloud">-->
                            <!--        <a href="">Sell Equipment<!--Committee--</a>-->
                            <!--        <a href="">WEEE Waste <!--Grow--</a>-->
                            <!--        <a href="">Data Center<!--Huge--</a>-->
                            <!--        <a href="">Data Destruction<!--Jobs--</a>-->
                            <!--        <a href="">Mobile Hardware<!--Logistic--</a>-->
                            <!--        <a href="">Cisco<!--Manager--</a>-->
                            <!--        <a href="">Mitel<!--Recruit--</a>-->
                            <!--        <a href="">Avaya<!--Tip--</a>-->
                            <!--        <a href="">Polycom<!--Transport--</a>-->
                            <!--        <a href="">Distribution<!--Trick--</a>-->
                            <!--        <a href="">Warehousing<!--Warehouse--</a>-->
                            <!--        <a href="">Refurbish<!--Warehouse--</a>-->
                            <!--        <a href="">Technology Lifecycle<!--Warehouse--</a>-->
                            <!--    </div>-->
                            <!--</div>-->
                        </div><!-- /.sidebar -->
                    </div><!-- /.sidebars-wrap -->
                </div><!-- /.sidebars -->
            </div><!-- /.content-wrap  -->
        </div><!-- /.row -->
    </div><!-- /.container -->
</div><!-- /.blog -->
@endsection

@section('page-style')
<style>
    .header-v3 .header .header-wrap{
        position: absolute;
    }
    @media only screen and (max-width: 768px) {
        .entry-cover a img {
            height: auto !important;
            width: 100%;
        }
    }
        
</style>
@endsection

@section('page-script')

@endsection
