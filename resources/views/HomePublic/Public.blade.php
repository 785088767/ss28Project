<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
     <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->

    <title>@yield('title')</title>

    <!-- Google font -->
    <!-- <link href="https://fonts.googleapis.com/css?family=Montserrat:400,500,700" rel="stylesheet"> -->

    <!-- Bootstrap -->
    <link type="text/css" rel="stylesheet" href="/static/home/css/bootstrap.min.css"/>

    <!-- Slick -->
    <link type="text/css" rel="stylesheet" href="/static/home/css/slick.css"/>
    <link type="text/css" rel="stylesheet" href="/static/home/css/slick-theme.css"/>

    <!-- nouislider -->
    <link type="text/css" rel="stylesheet" href="/static/home/css/nouislider.min.css"/>

    <!-- Font Awesome Icon -->
    <link rel="stylesheet" href="/static/home/css/font-awesome.min.css">

    <!-- Custom stlylesheet -->
    <link type="text/css" rel="stylesheet" href="/static/home/css/style.css"/>

    <!-- jq -->
    <script type="text/javascript" src="/static/jquery-1.8.3.min.js"></script>
<!-- 导航栏 hover -->
    <style type="text/css">
      .dropdown:hover .dropdown-menu {
          display: block;
       }
    </style>

    </head>
  <body>
    <!-- HEADER -->
    <header>
      <!-- TOP HEADER -->
      <div id="top-header">
        <div class="container">
          <ul class="header-links pull-left">
            <!-- <li><a href="#"><i class="fa fa-phone"></i> +021-95-51-84</a></li>
            <li><a href="#"><i class="fa fa-envelope-o"></i> email@email.com</a></li>
            <li><a href="#"><i class="fa fa-map-marker"></i> 1734 Stonecoal Road</a></li> -->
          </ul>
          <ul class="header-links pull-right">
          @if(session('denglu'))
          @foreach(session('denglu') as $v)
            <li><a href="#"><i class="fa fa-user-o"></i> 欢迎, {{$v->loginname}}</a></li>
          @endforeach
            <li><a href="/index_gr"><i class="fa fa-dollar"></i> 个人中心</a></li>
            <li><a href="/index_login"><i class="fa "></i> 退出</a></li>
          @else
            <li><a href="/index_zhuce/create"><i class="fa fa-dollar"></i> 注册</a></li>
            <li><a href="/index_login/create"><i class="fa fa-dollar"></i> 登录</a></li>
          @endif
          </ul>
        </div>
      </div>
      <!-- /TOP HEADER -->

      <!-- MAIN HEADER -->
      <div id="header">
        <!-- container -->
        <div class="container">
          <!-- row -->
          <div class="row">
            <!-- LOGO -->
            <div class="col-md-3">
              <div class="header-logo">
                <a href="/" class="logo">
                  <img src="/static/home/img/logo.png" alt="">
                </a>
              </div>
            </div>
            <!-- /LOGO -->

            <!-- SEARCH BAR -->
            <div class="col-md-6">
              <div class="header-search">
                <!-- <form action="/search" method="get">
                  <input type="text" class="input" name="key" placeholder="查找内容" style="">
                  <button type="submit" class="search-btn">查找</button>
                </form> -->
                <form action="/search" method="post" target="_blank">
                  <!--
                    将两个元素整合为一体需要下面两步~
                    1.将div的Class属性改变成form-inline 可以让下面的两个input并排显示-->
                  <div class="form-inline input-group">
                      <!--UTF-8编码-->
                      <input name=ie type=HIDDEN value=utf-8/>
                      <input name=tn type=HIDDEN value=baidu/>
                  <!--2.利用span标签的 input-group-btn 属性包裹一个input元素-->
                      <span class="input-group-btn">
                          <!-- baiduSug: 
                              当设置baiduSug=1时，用户选中sug词条时默认执行表单提交动作；
                              当设置baiduSug=2时，用户选中sug词条时不执行表单提交动作。

                              style :     "width:260px;" 调整搜索框长度
                          -->
                          <input id="kw" type="text" class="form-control" placeholder="搜你想搜的" name="key" size="30" baiduSug="1" style="width:240px;">
                         <!--提交按钮-->
                          <input type="submit"  class="btn btn-default"  value="查找"/>
                      </span>
                  </div>
                </form>
              </div>
            </div>
            <!-- /SEARCH BAR -->

            <!-- ACCOUNT -->
            <div class="col-md-3 clearfix">
              <div class="header-ctn">
                <!-- Wishlist -->
                <div>
                  <a href="/index_gr">
                    <!-- <i class="fa fa-heart-o"></i> -->
                    <!-- <span>个人中心</span> -->
                  </a>
                </div>
                <!-- /Wishlist -->

                <!-- Cart -->
                <div class="dropdown">
                  <a class="/dropdown-toggle"  href="/homecart">
                    <i class="fa fa-shopping-cart"></i>
                    <span>购物车</span>
                  </a>
                </div>
                <!-- /Cart -->

                <!-- Menu Toogle -->
                <div class="menu-toggle">
                  <a href="#">
                    <i class="fa fa-bars"></i>
                    <span>Menu</span>
                  </a>
                </div>
                <!-- /Menu Toogle -->
              </div>
            </div>
            <!-- /ACCOUNT -->
          </div>
          <!-- row -->
        </div>
        <!-- container -->
      </div>
      <!-- /MAIN HEADER -->
    </header>
    <!-- /HEADER -->

    <!-- NAVIGATION -->
    <nav id="navigation">
      <!-- container -->
      <div class="container">
        <!-- responsive-nav -->
        <div id="responsive-nav">
          <!-- NAV -->
          <ul class="main-nav nav navbar-nav">
            <li class="active"><a href="/">首页</a></li>
            @if($navi)
              @foreach($navi as $v)
                <li class="dropdown">
                  <a href="/list/{{$v->id}}" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false" style="width:50px;">{{$v->name}}</a>
                  @if(count($v->dev))
                    <ul class="dropdown-menu" role="menu">
                      @foreach($v->dev as $vs)
                        <li><a href="/list/{{$vs->id}}">{{$vs->name}}</a></li>
                      @endforeach
                    </ul>
                  @endif
                </li>
              @endforeach
            @else
            <li><a href="#">nothing</a></li>
            @endif
          </ul>
          <!-- /NAV -->
        </div>
        <!-- /responsive-nav -->
      </div>
      <!-- /container -->
    </nav>
    <!-- /NAVIGATION -->

    <!-- SECTION -->
    @section('home')
    @show
    <!-- /SECTION -->

    <!-- FOOTER -->
    <footer id="footer">
      <!-- top footer -->
      <div class="section">
        <!-- container -->
        <div class="container">
          <!-- row -->
          <div class="row">
            <div class="col-md-3 col-xs-6">
              <div class="footer">
                <h3 class="footer-title">关于我们</h3>
                <p>测试 Github785088767</p>
                <ul class="footer-links">
                  <li><a href="#"><i class="fa fa-map-marker"></i>1734 Stonecoal Road</a></li>
                  <li><a href="#"><i class="fa fa-phone"></i>+021-95-51-84</a></li>
                  <li><a href="#"><i class="fa fa-envelope-o"></i>785088767@qq.com</a></li>
                </ul>
              </div>
            </div>

            <div class="clearfix visible-xs"></div>

            <div class="col-md-3 col-xs-6">
              <div class="footer">
                <h3 class="footer-title">信息</h3>
                <ul class="footer-links">
                  <li><a href="#">关于我们</a></li>
                  <li><a href="#">联系我们</a></li>
                  <li><a href="#">隐私政策</a></li>
                  <li><a href="#">订单和退货</a></li>
                  <li><a href="#">条款和条件</a></li>
                </ul>
              </div>
            </div>

            <div class="col-md-3 col-xs-6">
             
              <div class="footer">
                <h3 class="footer-title">商城公告</h3>
                <ul class="footer-links"> 
                  @foreach($g as $row)
                  <li><a href="/gg/{{$row->id}}">{{$row->title}}</a></li> 
                   @endforeach
                </ul>
              </div>
            </div>

            <div class="col-md-3 col-xs-6">
              <div class="footer">
                <h3 class="footer-title">友情链接</h3>
                <ul class="footer-links">
                  @foreach($a as $v)
                  <li><a href="http://{{$v->url}}">{{$v->name}}</a></li>
                  @endforeach
                </ul>
              </div>
            </div>
          </div>
          <!-- /row -->
        </div>
        <!-- /container -->
      </div>
      <!-- /top footer -->

      <!-- bottom footer -->
      <div id="bottom-footer" class="section">
        <div class="container">
          <!-- row -->
          <div class="row">
            <div class="col-md-12 text-center">
              <ul class="footer-payments">
                <li><a href="#"><i class="fa fa-cc-visa"></i></a></li>
                <li><a href="#"><i class="fa fa-credit-card"></i></a></li>
                <li><a href="#"><i class="fa fa-cc-paypal"></i></a></li>
                <li><a href="#"><i class="fa fa-cc-mastercard"></i></a></li>
                <li><a href="#"><i class="fa fa-cc-discover"></i></a></li>
                <li><a href="#"><i class="fa fa-cc-amex"></i></a></li>
              </ul>
              <span class="copyright">
                
                Copyright &copy;<script>document.write(new Date().getFullYear());</script> All rights reserved | This template is made with <i class="fa fa-heart-o" aria-hidden="true"></i> by Colorlib  -  More Templates 
              
              </span>
            </div>
          </div>
            <!-- /row -->
        </div>
        <!-- /container -->
      </div>
      <!-- /bottom footer -->
    </footer>
    <!-- /FOOTER -->

    <!-- jQuery Plugins -->
    <script src="/static/home/js/jquery.min.js"></script>
    <script src="/static/home/js/bootstrap.min.js"></script>
    <script src="/static/home/js/slick.min.js"></script>
    <script src="/static/home/js/nouislider.min.js"></script>
    <script src="/static/home/js/jquery.zoom.min.js"></script>
    <script src="/static/home/js/main.js"></script>
    <script>
      // 获取购物车按钮
      $('.add-to-cart-btn').click(function(){
          // 获取商品id
          id=$(this).prev().attr('value');
          // alert(id);
          // ajax
          $.get("/addShop",{id:id},function(data){
          // alert(data);
          if(data==1){
            alert("添加成功");
          }else{
            alert('失败');
          }
        });

      })
    </script>

  </body>
</html>