@extends('HomePublic.Public')
@section('title','商城首页')
@section('home')

<!-- 广告 -->
<style>
    .gg{
        width:150px;
        height:510px;
        background-color:white;
        float:right;
    }
    .gg2{
        width:150px;
        height:510px;
        background-color:white;
        float:left;
    }
    .img{
        width:150px;
        height:450px;
        /*background-color:red; */
    }
</style>

@if (count($abs) == 1) 
<div class="gg">
  <a href="#" onclick="ads(this)" title="">X</a>
  <a href="{{$abs[0]->url}}"><img class="img" src="/uploads/add/{{$abs[0]->file}}"></a>
  <center><h2>广告位</h2></center> 
</div>
@elseif (count($abs) == 2)
<div class="gg">
  <a href="#" onclick="ads(this)" title="">X</a>
  <a href="{{$abs[0]->url}}"><img class="img" src="/uploads/add/{{$abs[0]->file}}"></a>
  <center><h2>广告位</h2></center> 
</div>
<div class="gg2">
  <a href="#" onclick="ads(this)" title="">X</a>
  <a href="{{$abs[1]->url}}"><img class="img" src="/uploads/add/{{$abs[1]->file}}"></a>
  <center><h2>广告位</h2></center>
</div>
@endif


<!-- <link rel="stylesheet" href="http://cdn.staticfile.org/twitter-bootstrap/3.3.7/css/bootstrap.min.css"> -->
<!-- 轮播 -->
<div id="myCarousel" class="carousel slide" style="width:1000px;margin: 0 auto;">
    <!-- 轮播（Carousel）指标 -->
    <ol class="carousel-indicators">
        <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
        <li data-target="#myCarousel" data-slide-to="1"></li>
        <li data-target="#myCarousel" data-slide-to="2"></li>
    </ol>   
    <!-- 轮播（Carousel）项目 -->
    <div class="carousel-inner" >
        <div class="item active">
            <img src="/uploads/carousel/{{$lunbo[0]->pic}}" style="width:1000px;margin: 0 auto;" alt="First slide">
        </div>
        <div class="item">
            <img src="/uploads/carousel/{{$lunbo[1]->pic}}" style="width:1000px;margin: 0 auto;" alt="First slide">
        </div>
        <div class="item">
            <img src="/uploads/carousel/{{$lunbo[2]->pic}}" style="width:1000px;margin: 0 auto;" alt="First slide">
        </div>
    </div>
    <!-- 轮播（Carousel）导航 -->
    <a class="left carousel-control" href="#myCarousel" role="button" data-slide="prev">
        <span class="" aria-hidden="true"></span>
        <span class="sr-only">Previous</span>
    </a>
    <a class="right carousel-control" href="#myCarousel" role="button" data-slide="next">
        <span class="" aria-hidden="true"></span>
        <span class="sr-only">Next</span>
    </a>
</div>

<!-- SECTION -->
<div class="section">
    <!-- container -->
    <div class="container">
        <!-- row -->
        <div class="row">
            <!-- section title -->
            <div class="col-md-12">
                <div class="section-title">
                     <h3 class="title">新品上市</h3>

                    <div class="section-nav">
                        <ul class="section-tab-nav tab-nav">
                            <li class="active"><a  href="/search">全部商品</a>
                            </li>
                            @foreach($brand as $v)
                            </li>
                            @endforeach
                        </ul>
                    </div>
                </div>
            </div>
            <!-- /section title -->
            <!-- Products tab & slick -->
            <div class="col-md-12">
                <div class="row">
                    <div class="products-tabs">
                        <!-- tab -->
                        <div id="tab1" class="tab-pane active">
                            <div class="products-slick" data-nav="#slick-nav-1">

<!-- 遍历 -->
                                <!-- product -->
                                @foreach($goods as $v)
                                <div class="product">
                                    <a href="/detailss/{{$v->id}}" title="">
                                    <div class="product-img">
                                        <img src="/uploads/goods/{{$v->gpic}}" alt="">
                                        <div class="product-label"> <span class="sale">-30%</span>
 <span class="new">NEW</span>

                                        </div>
                                    </div>
                                    </a>
                                    <div class="product-body">
                                        <p class="product-category"></p>
                                         <h3 class="product-name"><a href="/detailss/{{$v->id}}">{{$v->gname}}</a></h3>

                                         <h4 class="product-price">{{$v->price}} <del class="product-old-price">$990.00</del></h4>

                                        <div class="product-rating"> <i class="fa fa-star"></i>
 <i class="fa fa-star"></i>
 <i class="fa fa-star"></i>
 <i class="fa fa-star"></i>
 <i class="fa fa-star"></i>

                                        </div>
                                        <div class="product-btns">
                                            <button class="add-to-wishlist"><i class="fa fa-heart-o"></i><span class="tooltipp">加入收藏</span>
                                            </button>
                                            <button class="add-to-compare"><i class="fa fa-exchange"></i><span class="tooltipp">比较</span>
                                            </button>
                                            <button class="quick-view"><a href="/detailss/{{$v->id}}" title=""><i class="fa fa-eye"></i></a><span class="tooltipp">查看详情</span>
                                            </button>
                                        </div>
                                    </div>
                                   <div class="add-to-cart">
                                        <form action="/homecart" method="post">
                                          {{csrf_field()}}
                                         <input type="hidden" name="id" value="{{$v->id}}">
                                        <button class="add-to-cart-btn " ><i class="fa fa-shopping-cart"></i> 加入购物车</button>
                                        </form>
                                    </div>
                                </div>
                                @endforeach
                                <!-- /product -->
                            </div>
                            <div id="slick-nav-1" class="products-slick-nav"></div>
                        </div>
                        <!-- /tab -->
                    </div>
                </div>
            </div>
            <!-- Products tab & slick -->
        </div>
        <!-- /row -->
    </div>
    <!-- /container -->
</div>
<!-- /SECTION -->
<!-- HOT DEAL SECTION -->


<!-- SECTION -->
<div class="section">
    <!-- container -->
    <div class="container">
        <!-- row -->
        <div class="row">
            <div class="col-md-4 col-xs-6">
                <div class="section-title">
                     <h4 class="title">人气</h4>

                    <div class="section-nav">
                        <div id="slick-nav-3" class="products-slick-nav"></div>
                    </div>
                </div>
                <div class="products-widget-slick" data-nav="#slick-nav-3">
                    <div>
<!-- 遍历 -->
                        <!-- product widget -->
                        @foreach($goods as $v)
                        <a href="/detailss/{{$v->id}}" title="">
                        <div class="product-widget">
                            <div class="product-img">
                                <img src="/uploads/goods/{{$v->gpic}}" alt="">
                            </div>
                            <div class="product-body">
                                <p class="product-category"></p>
                                 <h3 class="product-name"><a href="/detailss/{{$v->id}}">{{$v->gname}}</a></h3>

                                 <h4 class="product-price">$980.00 <del class="product-old-price">$990.00</del></h4>

                            </div>
                        </div>
                        </a>
                        @endforeach
                        <!-- /product widget -->
                        
                    </div>
                </div>
            </div>



            <div class="col-md-4 col-xs-6">
                <div class="section-title">
                     <h4 class="title">销量排行</h4>

                    <div class="section-nav">
                        <div id="slick-nav-4" class="products-slick-nav"></div>
                    </div>
                </div>
                <div class="products-widget-slick" data-nav="#slick-nav-4">
                    <div>
<!-- 遍历 -->
                        <!-- product widget -->
                        @foreach($sales as $v)
                        <a href="/detailss/{{$v->id}}" title="">
                        <div class="product-widget">
                            <div class="product-img">
                                <img src="/uploads/goods/{{$v->gpic}}" alt="">
                            </div>
                            <div class="product-body">
                                <p class="product-category"></p>
                                 <h3 class="product-name"><a href="/detailss/{{$v->id}}">{{$v->gname}}</a></h3>

                                 <h4 class="product-price">$980.00 <del class="product-old-price">$990.00</del></h4>

                            </div>
                        </div>
                        </a>
                        @endforeach
                        <!-- /product widget -->
                        
                    </div>
                </div>
            </div>


            <div class="clearfix visible-sm visible-xs"></div>
            <div class="col-md-4 col-xs-6">
                <div class="section-title">
                     <h4 class="title">好评</h4>

                    <div class="section-nav">
                        <div id="slick-nav-5" class="products-slick-nav"></div>
                    </div>
                </div>
                <div class="products-widget-slick" data-nav="#slick-nav-5">
                    <div>
<!-- 遍历 -->
                        <!-- product widget -->
                        @foreach($goods as $v)
                        <a href="/detailss/{{$v->id}}" title="">
                        <div class="product-widget">
                            <div class="product-img">
                                <img src="/uploads/goods/{{$v->gpic}}" alt="">
                            </div>
                            <div class="product-body">
                                <p class="product-category"></p>
                                 <h3 class="product-name"><a href="/detailss/{{$v->id}}">{{$v->gname}}</a></h3>

                                 <h4 class="product-price">$980.00 <del class="product-old-price">$990.00</del></h4>

                            </div>
                        </div>
                        </a>
                        @endforeach
                        <!-- /product widget -->
                        
                    </div>
                </div>
            </div>
        </div>
        <!-- /row -->
    </div>
    <!-- /container -->
</div>
<script type="text/javascript">
  function ads(obj){
    // alert('123');
    $(obj).parent().hide();
  }
</script>
@endsection