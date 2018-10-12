@extends('HomePublic.Public')
@section('title','商城首页')
@section('home')
<!-- SECTION -->
<div class="section">
    <!-- container -->
    <div class="container">
        <!-- row -->
        <div class="row">
            <!-- shop -->
            <div class="col-md-4 col-xs-6">
                <div class="shop">
                    <div class="shop-img">
                        <img src="/static/home/img//shop01.png" alt="">
                    </div>
                    <div class="shop-body">
                         <h3>笔记本专区<br>Collection</h3>
 <a href="#" class="cta-btn">点击前往<i class="fa fa-arrow-circle-right"></i></a>

                    </div>
                </div>
            </div>
            <!-- /shop -->
            <!-- shop -->
            <div class="col-md-4 col-xs-6">
                <div class="shop">
                    <div class="shop-img">
                        <img src="/static/home/img//shop03.png" alt="">
                    </div>
                    <div class="shop-body">
                         <h3>数码配件<br>Collection</h3>
 <a href="#" class="cta-btn">点击前往<i class="fa fa-arrow-circle-right"></i></a>

                    </div>
                </div>
            </div>
            <!-- /shop -->
            <!-- shop -->
            <div class="col-md-4 col-xs-6">
                <div class="shop">
                    <div class="shop-img">
                        <img src="/static/home/img//shop02.png" alt="">
                    </div>
                    <div class="shop-body">
                         <h3>相机<br>Collection</h3>
 <a href="#" class="cta-btn">点击前往<i class="fa fa-arrow-circle-right"></i></a>

                    </div>
                </div>
            </div>
            <!-- /shop -->
        </div>
        <!-- /row -->
    </div>
    <!-- /container -->
</div>
<!-- /SECTION -->
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
                            <li class="active"><a data-toggle="tab" href="#tab1">笔记本电脑</a>
                            </li>
                            <li><a data-toggle="tab" href="#tab1">智能手机</a>
                            </li>
                            <li><a data-toggle="tab" href="#tab1">数码相机</a>
                            </li>
                            <li><a data-toggle="tab" href="#tab1">周边配件</a>
                            </li>
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
                                    <div class="product-img">
                                        <img src="/uploads/{{$v->gpic}}" alt="">
                                        <div class="product-label"> <span class="sale">-30%</span>
 <span class="new">NEW</span>

                                        </div>
                                    </div>
                                    <div class="product-body">
                                        <p class="product-category"></p>
                                         <h3 class="product-name"><a href="#">{{$v->gname}}</a></h3>

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
                                        <input type="hidden" name="" value="{{$v->id}}">
                                        <button class="add-to-cart-btn " ><i class="fa fa-shopping-cart"></i> 加入购物车</button>
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
<div id="hot-deal" class="section">
    <!-- container -->
    <div class="container">
        <!-- row -->
        <div class="row">
            <div class="col-md-12">
                <div class="hot-deal">
                    <ul class="hot-deal-countdown">
                        <li>
                            <div>
                                 <h3>02</h3>
 <span>Days</span>

                            </div>
                        </li>
                        <li>
                            <div>
                                 <h3>10</h3>
 <span>Hours</span>

                            </div>
                        </li>
                        <li>
                            <div>
                                 <h3>34</h3>
 <span>Mins</span>

                            </div>
                        </li>
                        <li>
                            <div>
                                 <h3>60</h3>
 <span>Secs</span>

                            </div>
                        </li>
                    </ul>
                     <h2 class="text-uppercase">热门商品</h2>

                    <h3>最  高  可  享 50% 折  扣</h3> <a class="primary-btn cta-btn" href="#">现在购买</a>

                </div>
            </div>
        </div>
        <!-- /row -->
    </div>
    <!-- /container -->
</div>
<!-- /HOT DEAL SECTION -->
<!-- SECTION -->
<div class="section">
    <!-- container -->
    <div class="container">
        <!-- row -->
        <div class="row">
            <!-- section title -->
            <div class="col-md-12">
                <div class="section-title">
                     <h3 class="title">销量排行</h3>

                    <div class="section-nav">
                        <ul class="section-tab-nav tab-nav">
                            <li class="active"><a data-toggle="tab" href="#tab2">Laptops</a>
                            </li>
                            <li><a data-toggle="tab" href="#tab2">Smartphones</a>
                            </li>
                            <li><a data-toggle="tab" href="#tab2">Cameras</a>
                            </li>
                            <li><a data-toggle="tab" href="#tab2">Accessories</a>
                            </li>
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
                        <div id="tab2" class="tab-pane fade in active">
                            <div class="products-slick" data-nav="#slick-nav-2">
                                <!-- product -->
<!-- 遍历 -->
                                @foreach($goods as $v)
                                <div class="product">
                                    <div class="product-img">
                                        <img src="/uploads/{{$v->gpic}}" alt="">
                                        <div class="product-label"> <span class="sale">-30%</span>
 <span class="new">NEW</span>

                                        </div>
                                    </div>
                                    <div class="product-body">
                                        <p class="product-category"></p>
                                         <h3 class="product-name"><a href="#">{{$v->gname}}</a></h3>

                                         <h4 class="product-price">${{$v->price}} <del class="product-old-price">$990.00</del></h4>

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
                                            <button class="quick-view"><i class="fa fa-eye"></i><span class="tooltipp">查看详情</span>
                                            </button>
                                        </div>
                                    </div>
                                    <div class="add-to-cart">
                                        <button class="add-to-cart-btn"><i class="fa fa-shopping-cart"></i> 加入购物车</button>
                                    </div>
                                </div>
                                <!-- /product -->
                                @endforeach
                            </div>
                            <div id="slick-nav-2" class="products-slick-nav"></div>
                        </div>
                        <!-- /tab -->
                    </div>
                </div>
            </div>
            <!-- /Products tab & slick -->
        </div>
        <!-- /row -->
    </div>
    <!-- /container -->
</div>
<!-- /SECTION -->
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
                        <div class="product-widget">
                            <div class="product-img">
                                <img src="/uploads/{{$v->gpic}}" alt="">
                            </div>
                            <div class="product-body">
                                <p class="product-category"></p>
                                 <h3 class="product-name"><a href="#">{{$v->gname}}</a></h3>

                                 <h4 class="product-price">$980.00 <del class="product-old-price">$990.00</del></h4>

                            </div>
                        </div>
                        @endforeach
                        <!-- /product widget -->
                        
                    </div>
                </div>
            </div>



            <div class="col-md-4 col-xs-6">
                <div class="section-title">
                     <h4 class="title">销量</h4>

                    <div class="section-nav">
                        <div id="slick-nav-4" class="products-slick-nav"></div>
                    </div>
                </div>
                <div class="products-widget-slick" data-nav="#slick-nav-4">
                    <div>
<!-- 遍历 -->
                        <!-- product widget -->
                        <div class="product-widget">
                            <div class="product-img">
                                <img src="/static/home/img//product04.png" alt="">
                            </div>
                            <div class="product-body">
                                <p class="product-category">Category</p>
                                 <h3 class="product-name"><a href="#">product name goes here</a></h3>

                                 <h4 class="product-price">$980.00 <del class="product-old-price">$990.00</del></h4>

                            </div>
                        </div>
                        <!-- /product widget -->
                        
                    </div>
                </div>
            </div>


            <div class="clearfix visible-sm visible-xs"></div>
            <div class="col-md-4 col-xs-6">
                <div class="section-title">
                     <h4 class="title">评价</h4>

                    <div class="section-nav">
                        <div id="slick-nav-5" class="products-slick-nav"></div>
                    </div>
                </div>
                <div class="products-widget-slick" data-nav="#slick-nav-5">
                    <div>
<!-- 遍历 -->
                        <!-- product widget -->
                        <div class="product-widget">
                            <div class="product-img">
                                <img src="/static/home/img//product01.png" alt="">
                            </div>
                            <div class="product-body">
                                <p class="product-category">Category</p>
                                 <h3 class="product-name"><a href="#">product name goes here</a></h3>

                                 <h4 class="product-price">$980.00 <del class="product-old-price">$990.00</del></h4>

                            </div>
                        </div>
                        <!-- /product widget -->
                        
                    </div>
                </div>
            </div>
        </div>
        <!-- /row -->
    </div>
    <!-- /container -->
</div>

@endsection