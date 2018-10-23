<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/


// 后台登录页
Route::resource("/adminlogin","Admin\LoginController");
// 验证码
Route::get('/code','Admin\LoginController@code');

// 后台路由组(中间件)
// Route::group(['middleware'=>'AdminLogin'],function(){
  // 后台主页
  Route::resource('/adminindex','Admin\AdminIndexController');
  // 管理员模块
  Route::resource('/admin','Admin\AdminController');
  // 管理员删除
  Route::get('adminDel','Admin\AdminController@adminDel');
  // 管理员等级设置
  Route::get("/adminrole/{id}","Admin\AdminController@rolelist");
  Route::post("/adminsaverole","Admin\AdminController@saverole");
  // 角色列表
  Route::resource("/adminrolelist","Admin\RolelistController");
  // 分配权限
  Route::get("/adminauth/{id}","Admin\RolelistController@auth");
  // 保存权限
  Route::post("/saveauth","Admin\RolelistController@saveauth");

  // 分类模块
  Route::resource('/type','Admin\TypeController');
  Route::get('/typeAdd/{id}','Admin\TypeController@typeAdd');
  Route::get('/typeDel','Admin\TypeController@typeDel');

  // 品牌模块
  Route::resource('/brandList','Admin\BrandController');
  Route::get('/brandDel','Admin\BrandController@brandDel');

  // 会员模块
  Route::resource('/usersList','Admin\UsersController');
  Route::get('/usersDel','Admin\UsersController@usersDel');

  // 后台商品模块
  Route::resource('/goodsList','Admin\GoodsController');
  Route::get('/goodsDel','Admin\GoodsController@goodsDel');

  // 订单模块
  Route::resource('/orderList','Admin\OrderController');
  Route::get('/nopayList','Admin\OrderController@nopayList');
  Route::get('/doneList','Admin\OrderController@doneList');

  //后台公告模块
  Route::resource("/article","Admin\ArticleController");
  Route::get("/dels","Admin\ArticleController@del");

  // 友链模块
  Route::resource("/link","Admin\LinkController");
  Route::get('/doneList','Admin\OrderController@doneList');

  // 广告模块
  //广告添加
  Route::resource('/add2',"Admin\AseController");
  //广告列表
  Route::resource('/add3',"Admin\AbeaController");

  // 轮播图控制模块
  Route::resource("/carousel","Admin\CarouselController");
  Route::get("/carouseldel","Admin\CarouselController@del");
// });


// 商城主页
Route::get('/', 'Home\HomeController@init');
//登录
Route::resource('/index_login',"Home\LoginController");
// 滑动验证码
// Route::get('/yz',"Home\LoginController@yz");
//登录Ajax检测用户密码
Route::get('/index_chaxun',"Home\LoginController@chaxun");
//注册
Route::resource('/index_zhuce',"Home\zhuceController");
//ajax查询用户
Route::get('/index_yonghu',"Home\zhuceController@yonghu");
//ajax获取验证码
Route::get('/yanzheng',"Home\zhuceController@huoqu");
//ajax对比验证码
Route::get('/duibi',"Home\zhuceController@duibi");

//前台购物车
Route::resource("/homecart","Home\CartController");
//购物车减
Route::get("/updatee/{id}","Home\CartController@updatee");
//购物车加
Route::get("/updatees/{id}","Home\CartController@updatees");
//删除
Route::get("/del/{id}","Home\CartController@del");

// 分类商品列表
Route::get("/list/{id}",'Home\HomeController@list');
// 品牌商品列表
Route::get("/blist/{id}",'Home\HomeController@blist');
// 搜索列表
Route::get("/search",'Home\HomeController@search');

//详情
Route::resource("/details","Home\DetailsController");
Route::get("/detailss/{id}","Home\DetailsController@details");


// 商城路由组
Route::group([],function(){
  
  // 商城主页控制器
  Route::resource('/Home','Home\HomeController');
  //个人中心
  Route::resource('/index_gr',"Home\GrController");
  //个人订单
  Route::get('/index_dd',"Home\GrController@dd");
  //ajax分页
  Route::get('/index_ajax',"Home\GrController@ajax");

  //订单详情
  Route::get('/index_dd/{id}',"Home\GrController@ddxq");
  // 支付
  Route::post("/pay","Home\CartController@pay");

});