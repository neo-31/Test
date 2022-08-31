@extends('layouts.app')
@if (URL::current() == url('/shop'))
    @section('title', 'Shop')
    @section('meta_description', 'You can also sell your used electronics here. Recycling Your Business Batteries, Cables, Call Recording, Hard Drive, Phone System, Switches, Headset & Routers.')
@else
    @section('title'){{ ucWords($slug) }}@endsection
    @section('meta_description'){{ ucWords($slug) }}@endsection
@endif

@section('meta')
    <meta property="og:title" content="Shop | VDR Resale">
    <meta property="og:site_name" content="VDR Resale">
    <meta property="og:url" content="https://vdrresale.com/shop">
    <meta property="og:description" content="You can also sell your used electronics here. Recycling Your business.business Batteries, Cables, Call Recording, Hard Drive, Phone System, Switches, Headset & Routers.">
    <meta property="og:type" content="business.business">
    <meta property="og:image" content="https://www.vdrresale.com/public/assets/images/vdr-logo.png">erty="og:image" content="https://www.vdrresale.com/public/assets/images/vdr-logo.png">
@stop

@section('schema')
<script type='application/ld+json'> 
{
  "@context": "http://www.schema.org",
  "@type": "product",
  "name": "VDR Resale",
  "image": "https://www.vdrresale.com/public/assets/images/vdr-logo.png",
  "description": "You can also sell your used electronics here. Recycling Your Business Batteries, Cables, Call Recording, Hard Drive, Phone System, Switches, Headset & Routers.",
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
<meta name="csrf-token" content="{{ csrf_token() }}" />
      <div class="page-title parallax parallax3">
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <div class="page-title-heading">
                            <h1>Shop</h1>
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
                                <li>Shop</li>
                            </ul>
                        </div><!-- /.breadcrumbs -->
                    </div><!-- /.flat-wrapper -->
                </div><!-- /.row -->
            </div><!-- /.container -->
        </div><!-- /.page-breadcrumbs -->

       <div class="flat-row flat-woocommerce flat-general sidebar-right">
            <div class="container">
                <h2 class="title text-center" >Filter your results</h2>
                <div class="flat-tabs" style="clear: left;">

                                <ul class="menu-tabs">
                                    <li class="active"><a href="#">Categories</a></li>
                                    <li class=""><a href="#"> Manufacturers</a></li>
                                </ul>
                                <div class="content-tab">
                                  <div class="content-inner active" style="display: block;">

                                                   <div class="js-index-filter p-search-icon pra-icon">
                                                      <button class="button" id="searchbycat">Search</button>
                                                    </div>

                                      <div class="row">
                                      @foreach ($category_list as $category)
                                      <div class="col-md-3 categorys"><input type="checkbox" class="categoryfilter" id="{{$category->id}}" value="{{$category->category_name}}" name="categories[]">&nbsp;{{$category->category_name}}</div>
                                      @endforeach
                                    </div>
                                    <!-- <div class="js-index-filter p-search-icon pra-icon">
                                                        <i class="fa fa-search" aria-hidden="true"></i>
                                                    </div>-->
                                    </div>
                                    <div class="content-inner" style="display: none;">
                                          <div class="js-index-filter p-search-icon pra-icon">
                                                      <button class="button" id="searchbymanufacture">Search</button>
                                                    </div>
                                                 <!--   <div class="js-index-filter p-search-icon pra-icon">
                                                        <i class="fa fa-search" aria-hidden="true"></i>
                                                    </div>-->

                                       <div class="row">
                                      @foreach ($manufacturer_list as $manufacturer)
                                      <div class="col-md-3"><input type="checkbox"  class="manufacturerfilter" id="{{$manufacturer->id}}" value="{{$manufacturer->manufacturers_name}}" name="manufacturers[]">&nbsp;{{$manufacturer->manufacturers_name}}</div>
                                      @endforeach
                                    </div>


                                    </div><!-- /.content-inner -->
                                </div><!-- /.content-tab -->

                            </div>
                <div class="row">
                    <div class="general col-md-12">
                        <div class="woocommerce">
                            <ul class="products">
                            @foreach ($products as $product)
                                <li>
                                    <div class="product-inner">
                                        <div class="product-thumbnail">
                                            @if($product->product_image!='')
                                            <a href="{{url('shop/'.$product->product_slug)}}">
                                                <img src="{{ url($product->product_image) }}" alt="images">
                                            </a>
                                            @endif
                                        </div>
                                        <div class="product-info">
                                            <div class="product-info-wrap">
                                                {{-- <a href="{{url('shop/'.$product->product_slug)}}"><h3>{{$product->product_name}}</h3></a> --}}
                                              <div class="row">
                                                <div class="col-md-9 product_name">
                                                    <a href="{{url('shop/'.$product->product_slug)}}"><h3>{{$product->product_name}}</h3></a>
                                                </div>
                                                <div class="col-md-3 text-right">
                                                    <h3>£ {{$product->product_price}}</h3>
                                                </div>


                                                <div class="col-md-12">
                                                    <a class="button" href="{{url('shop/'.$product->product_slug)}}" >Details</a>
                                                </div>
                                            </div>
                                        </div>
                                    </div><!-- /.product-inner -->
                                </li>
                            @endforeach
                            </ul><!-- /.products -->
                            <div class="navigation paging-navigation numeric">
                                <div class="flat-pagination loop-pagination">
                                    <span class="page-numbers current">1</span>
                                    <a class="page-numbers" href="#">2</a>
                                    <a class="page-numbers" href="#">→</a>
                                </div><!-- /.flat-pagination -->
                            </div><!-- /.navigation .paging-navigation .numeric -->
                        </div><!-- /.woocommerce -->

                    </div><!-- /.general -->

                    <!--<div class="general-sidebars">
                        <div class="sidebar-wrap">
                            <div class="sidebar">

                                <div class="widget widget_product_categories">
                                    <h4 class="widget-title">Categories</h4>
                                    <ul class="product-categories">
                                        @foreach($category_list as $category)
                                        <li><a href="#">{{$category->category_name}}</a></li>
                                        @endforeach
                                    </ul>
                                </div><!-- /.widget_product_categories -->

                               <!-- <div class="widget widget_price_filter">
                                    <div class="price_filter">
                                        <form>
                                            <div class="price_slider_wrapper">
                                                <div class="price_slider ui-slider ui-slider-horizontal ui-widget ui-widget-content ui-corner-all"><div class="ui-slider-range ui-widget-header" style="left: 0%; width: 100%;"></div><a class="ui-slider-handle ui-state-default ui-corner-all" href="#" style="left: 0%;"><span class="shadow"></span></a><a class="ui-slider-handle ui-state-default ui-corner-all" href="#" style="left: 100%;"><span class="shadow"></span></a></div>
                                            </div>
                                        </form>
                                        <div class="price_slider_amount">
                                            <div class="price_label">
                                                <label>Price :</label>
                                                <input type="text">
                                            </div>
                                            <button class="button" type="submit">Filter</button>
                                        </div>
                                    </div>
                                </div>--><!-- /.widget_price_filter -->

                               <!-- <div class="widget widget_products">
                                    <h4 class="widget-title">Featured Products</h4>
                                    <ul class="product_list_widget">
                                        <li>
                                            <a href="shop-detail.html">
                                                <img src="images/products/f1.jpg" alt="images">
                                                <span class="product-title">Rigid industries RI series</span>
                                            </a>
                                            <span class="amount">£85.49</span>
                                        </li>
                                        <li>
                                            <a href="shop-detail.html">
                                                <img src="images/products/f2.jpg" alt="images">
                                                <span class="product-title">Rigid industries midnight</span>
                                            </a>
                                            <span class="amount">£189.99</span>
                                        </li>
                                        <li>
                                            <a href="shop-detail.html">
                                                <img src="images/products/f3.jpg" alt="images">
                                                <span class="product-title">Metro vac n' blo 500</span>
                                            </a>
                                            <span class="amount">£94.99</span>
                                        </li>
                                    </ul>
                                </div>--><!-- /.widget_products -->

                               <!-- <div class="widget widget_tag_cloud">
                                    <h4 class="widget-title">Product tags</h4>
                                    <div class="tagcloud">
                                        <a href="#">Blue</a>
                                        <a href="#">Hitch</a>
                                        <a href="#">Horn</a>
                                        <a href="#">Led</a>
                                        <a href="#">Metro</a>
                                        <a href="#">Smittybilt</a>
                                        <a href="#">Tow</a>
                                    </div>
                                </div>--><!-- /.widget_tag_cloud -->

                            <!--</div><!-- /.sidebar -->
                        <!--</div><!-- /.sidebar-wrap -->
                    <!--</div>--><!-- /.general-sidebars -->
                </div><!-- /.row -->
            </div><!-- /.container -->
        </div>
  <div class="modal fade" id="qoutemodel" role="dialog">
    <div class="modal-dialog">

      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">Request a Quote</h4>
        </div>
        <div class="modal-body">
         <form>
             <div class="form-group row">
                           <div class="col-md-6">
           <input type="text" name="name" value="" placeholder="Name*" class="form-control" required>
                    </div>
                     <div class="col-md-6">
           <input type="email" name="email" value="" placeholder="Email*" class="form-control" required>
                    </div>
                    </div>
                     <div class="form-group row">
                           <div class="col-md-6">
           <input type="tel" name="phone" value="" placeholder="Phone*" class="form-control" required>
                    </div>
                     <div class="col-md-6">
           <input type="text" name="company" value="" placeholder="Company*" class="form-control" required>
                    </div>
                    </div>
                    <div class="form-group">
                        <textarea class="qoutetextare"></textarea>
                    </div>

                   <button type="submit" class="button text-center">Submit</button>
         </form>
        </div>
        <!--<div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        </div>-->
      </div>

    </div>
  </div>
@endsection

@section('page-style')
<style>
    .flat-general .general{
        width:100%;
    }
    .header-v3 .header .header-wrap{
        position: absolute;
    }
    .product_name h3{
        height: 36px;
        overflow: hidden;
    }
</style>
@endsection

@section('page-script')
      <script>
        $(document).ready(function(){
              var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');
              $('#searchbymanufacture').click(function(){
                   var productman=[];
                 $('.manufacturerfilter').each(function () {
                     if (this.checked) {
                         productman.push($(this).attr('id'));
                     }
                 });
                $.ajax({
                    type: "POST",
                    url: "filterbyman",
                    data: {_token: CSRF_TOKEN,productmanufaturer:productman},
                    dataType: 'json',
                    success: function(data)
                    {
                        if(data){
                            var div = '';
                            $('.products').html('');
                            $.each(data, function (index, value) {
                                var slug=data[index].product_slug;
                                var href='{{url("shop/")}}/'+slug;
                                var productname=data[index].product_name;
                                var image=data[index].product_image;
                                div+='<li><div class="product-inner"><div class="product-thumbnail">'
                                    +'<a href="'+href+'">'
                                    +'<img src="'+image+'" alt="images">'
                                    +'</a>'
                                    +'</div>'
                                    +'<div class="product-info">'
                                    +'<div class="product-info-wrap">'
                                    +'<a href="'+href+'"><h3>'+productname+'</h3></a>'
                                    +'<div class="row"><div class="col-md-12"><a class="button" href="'+href+'" >Details</a></div></div></div></div></div></li>';
                            })
                            $('.products').append(div);
                        }
                    }
                });
              });
              $('#searchbycat').click(function(){
                   var productcat=[];
                    $('.categoryfilter').each(function () {
                        if (this.checked) {
                            productcat.push($(this).attr('id'));
                        }
                    });
                $.ajax({
                    type: "POST",
                    url: "filterbycat",
                    data: {_token: CSRF_TOKEN,productcategory:productcat},
                    dataType: 'json',
                    success: function(data)
                    {
                        if(data){
                            var div = '';
                            $('.products').html('');
                            $.each(data, function (index, value) {
                                var slug=data[index].product_slug;
                                var href='{{url("shop/")}}/'+slug;
                                var productname=data[index].product_name;
                                var image=data[index].product_image;
                                div+='<li><div class="product-inner"><div class="product-thumbnail">'
                                    +'<a href="'+href+'">'
                                    +'<img src="'+image+'" alt="images">'
                                    +'</a>'
                                    +'</div>'
                                    +'<div class="product-info">'
                                    +'<div class="product-info-wrap">'
                                    +'<a href="'+href+'"><h3>'+productname+'</h3></a>'
                                    +'<div class="row"><div class="col-md-12"><a class="button" href="'+href+'" >Details</a></div></div></div></div></div></li>';
                            })
                            $('.products').append(div);
                        }
                    }
                 });
              });
            $('.quotepopup').click(function(){
                var productname=$(this).attr('data-title');
                $('.qoutetextare').html("I would like to request a quote for the product -"+ productname);
            });
        });
    </script>
@endsection
