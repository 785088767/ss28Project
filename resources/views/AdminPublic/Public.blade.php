<!DOCTYPE html>
<!--[if lt IE 7]> <html class="lt-ie9 lt-ie8 lt-ie7" lang="en"> <![endif]-->
<!--[if IE 7]>    <html class="lt-ie9 lt-ie8" lang="en"> <![endif]-->
<!--[if IE 8]>    <html class="lt-ie9" lang="en"> <![endif]-->
<!--[if gt IE 8]><!-->
<html lang="en">
 <!--<![endif]-->
 <head> 
  <meta charset="utf-8" /> 
  <!-- Viewport Metatag --> 
  <meta name="viewport" content="width=device-width,initial-scale=1.0" /> 
  <!-- Plugin Stylesheets first to ease overrides --> 
  <link rel="stylesheet" type="text/css" href="/static/admins/plugins/colorpicker/colorpicker.css" media="screen" /> 
  <link rel="stylesheet" type="text/css" href="/static/admins/custom-plugins/wizard/wizard.css" media="screen" /> 
  <!-- Required Stylesheets --> 
  <link rel="stylesheet" type="text/css" href="/static/admins/bootstrap/css/bootstrap.min.css" media="screen" /> 
  <link rel="stylesheet" type="text/css" href="/static/admins/css/fonts/ptsans/stylesheet.css" media="screen" /> 
  <link rel="stylesheet" type="text/css" href="/static/admins/css/fonts/icomoon/style.css" media="screen" /> 
  <link rel="stylesheet" type="text/css" href="/static/admins/css/mws-style.css" media="screen" /> 
  <link rel="stylesheet" type="text/css" href="/static/admins/css/icons/icol16.css" media="screen" /> 
  <link rel="stylesheet" type="text/css" href="/static/admins/css/icons/icol32.css" media="screen" /> 
  <!-- Demo Stylesheet --> 
  <link rel="stylesheet" type="text/css" href="/static/admins/css/demo.css" media="screen" /> 
  <!-- jQuery-UI Stylesheet --> 
  <link rel="stylesheet" type="text/css" href="/static/admins/jui/css/jquery.ui.all.css" media="screen" /> 
  <link rel="stylesheet" type="text/css" href="/static/admins/jui/jquery-ui.custom.css" media="screen" /> 
  <!-- Theme Stylesheet --> 
  <link rel="stylesheet" type="text/css" href="/static/admins/css/mws-theme.css" media="screen" /> 
  <link rel="stylesheet" type="text/css" href="/static/admins/css/themer.css" media="screen" /> 
  <link rel="stylesheet" type="text/css" href="/static/admins/css/my.css" media="screen" /> 
  <script src="/static/admins/js/libs/jquery-1.8.3.min.js"></script> 
  <title>@yield('title')</title> 
 </head> 
 <body> 
  <!-- Header --> 
  <div id="mws-header" class="clearfix"> 
   <!-- Logo Container --> 
   <div id="mws-logo-container"> 
    <!-- Logo Wrapper, images put within this wrapper will always be vertically centered --> 
    <div id="mws-logo-wrap"> 
     <img src="/static/admins/images/mws-logo.png" alt="mws admin" /> 
    </div> 
   </div> 
   <!-- User Tools (notifications, logout, profile, change password) --> 
   <div id="mws-user-tools" class="clearfix"> 
    <!-- Notifications --> 
    
    <!-- Messages --> 
    
    <!-- User Information and functions section --> 
    <div id="mws-user-info" class="mws-inset"> 
     <!-- User Photo --> 
     <div id="mws-user-photo"> 
      <img src="/static/admins/example/profile.jpg" alt="User Photo" /> 
     </div> 
     <!-- Username and Functions --> 
     <div id="mws-user-functions"> 
      <div id="mws-username">
        Hello, {{session('name')}}
      </div> 
      <ul> 
       <li><a href="/adminlogin">退出</a></li> 
      </ul> 
     </div> 
    </div> 
   </div> 
  </div> 
  <!-- Start Main Wrapper --> 
  <div id="mws-wrapper"> 
   <!-- Necessary markup, do not remove --> 
   <div id="mws-sidebar-stitch"></div> 
   <div id="mws-sidebar-bg"></div> 
   <!-- Sidebar Wrapper --> 
   <div id="mws-sidebar"> 
    <!-- Hidden Nav Collapse Button --> 
    <div id="mws-nav-collapse"> 
     <span></span> 
     <span></span> 
     <span></span> 
    </div> 
    <!-- Searchbox --> 
    <div id="mws-searchbox" class="mws-inset"> 
     <form action="typography.html"> 
      <input type="text" class="mws-search-input" placeholder="Search..." /> 
      <button type="submit" class="mws-search-submit"><i class="icon-search"></i></button> 
     </form> 
    </div> 
    <!-- Main Navigation --> 
    <div id="mws-navigation"> 
     <ul> 
      <li> <a href="#"><i class="icon-user"></i> 管理员账户管理</a> 
       <ul class="closed"> 
        <li><a href="/admin/create">管理员添加</a></li> 
        <li><a href="/admin">管理员列表</a></li> 
        <li><a href="/adminrolelist">角色列表</a></li> 
       </ul> </li> 
      <li> <a href="#"><i class="icon-users"></i> 会员账户</a> 
       <ul class="closed"> 
        <!-- <li><a href="/usersList/create">会员添加</a></li>  -->
        <li><a href="/usersList">会员列表</a></li> 
       </ul> </li> 
      <li> <a href="#"><i class="icon-th-list"></i> 分类管理</a> 
       <ul class="closed"> 
        <li><a href="/type/create">分类添加</a></li> 
        <li><a href="/type">分类列表</a></li> 
       </ul> </li> 
       <li> <a href="#"><i class="icon-flag"></i> 品牌管理</a> 
       <ul class="closed"> 
        <li><a href="/brandList/create">品牌添加</a></li> 
        <li><a href="/brandList">品牌列表</a></li> 
       </ul> </li> 
      <li> <a href="#"><i class="icon-tag"></i> 商品管理</a> 
       <ul class="closed"> 
        <li><a href="/goodsList/create">商品添加</a></li> 
        <li><a href="/goodsList">商品列表</a></li> 
       </ul> </li> 
      <li> <a href="#"><i class="icon-list-2"></i> 订单管理</a> 
       <ul class="closed"> 
        <li><a href="/orderList">全部订单</a></li>
        <li><a href="/nopayList">未支付订单</a></li>
        <li><a href="/doneList">已完成订单</a></li>
       </ul> </li> 
       <li> <a href="#"><i class="icon-bars"></i> 轮播图管理</a> 
       <ul class="closed"> 
        <li><a href="/carousel">轮播图列表</a></li> 
        <li><a href="/carousel/create">轮播图添加</a></li> 
       </ul> </li> 
       <li> <a href="#"><i class="icon-direction"></i> 公告管理</a> 
       <ul class="closed"> 
       <li><a href="/article">公告列表</a></li> 
        <li><a href="/article/create">公告添加</a></li>
       </ul> </li> 
       <li> <a href="#"><i class="icon-fire"></i> 友情链接</a> 
       <ul class="closed"> 
        <li><a href="/link">全部</a></li>
        <li><a href="/link/create">添加</a></li>
       </ul> </li> 
       <li> <a href="#"><i class="icon-planet"></i> 广告</a> 
       <ul class="closed"> 
        <li><a href="/add3">全部</a></li>
        <li><a href="/add3/create">添加</a></li>
       </ul> </li> 
     </ul> 
    </div> 
   </div> 
   <!-- Main Container Start --> 
   <div id="mws-container" class="clearfix"> 
    <div class="container">
       
        @if(session('success'))
           <div class="mws-form-message success">
             {{session('success')}}
          </div>
        @endif
      
        @if(session('error'))
          <div class="mws-form-message warning">
             {{session('error')}}
          </div>
        @endif 
        @section('admin')
        @show
     <!-- Panels End --> 
    </div> 
    <!-- footer --> 
    <div id="mws-footer">
      Copyright Your Website 2012. All Rights Reserved. 
    </div> 
   </div> 
   <!-- Main Container End --> 
  </div> 
  <!-- JavaScript Plugins --> 
  <script src="/static/admins/js/libs/jquery.mousewheel.min.js"></script> 
  <script src="/static/admins/js/libs/jquery.placeholder.min.js"></script> 
  <script src="/static/admins/custom-plugins/fileinput.js"></script> 
  <!-- jQuery-UI Dependent Scripts --> 
  <script src="/static/admins/jui/js/jquery-ui-1.9.2.min.js"></script> 
  <script src="/static/admins/jui/jquery-ui.custom.min.js"></script> 
  <script src="/static/admins/jui/js/jquery.ui.touch-punch.js"></script> 
  <!-- Plugin Scripts --> 
  <script src="/static/admins/plugins/datatables/jquery.dataTables.min.js"></script> 
  <!--[if lt IE 9]>
    <script src="js/libs/excanvas.min.js"></script>
    <![endif]--> 
  <script src="/static/admins/plugins/flot/jquery.flot.min.js"></script> 
  <script src="/static/admins/plugins/flot/plugins/jquery.flot.tooltip.min.js"></script> 
  <script src="/static/admins/plugins/flot/plugins/jquery.flot.pie.min.js"></script> 
  <script src="/static/admins/plugins/flot/plugins/jquery.flot.stack.min.js"></script> 
  <script src="/static/admins/plugins/flot/plugins/jquery.flot.resize.min.js"></script> 
  <script src="/static/admins/plugins/colorpicker/colorpicker-min.js"></script> 
  <script src="/static/admins/plugins/validate/jquery.validate-min.js"></script> 
  <script src="/static/admins/custom-plugins/wizard/wizard.min.js"></script> 
  <!-- Core Script --> 
  <script src="/static/admins/bootstrap/js/bootstrap.min.js"></script> 
  <script src="/static/admins/js/core/mws.js"></script> 
  <!-- Themer Script (Remove if not needed) --> 
  <script src="/static/admins/js/core/themer.js"></script> 
  <!-- Demo Scripts (remove if not needed) --> 
  <script src="/static/admins/js/demo/demo.dashboard.js"></script>  
 </body>
</html>