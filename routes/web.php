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
// 添加购物车
Route::get('/addShop','Home\HomeController@addShop');
// 跳转购物车
Route::get('/cart','Home\HomeController@cart');
//详情
Route::resource("/details","Home\DetailsController");
Route::get("/detailss/{id}","Home\DetailsController@details");


// 商城路由组
Route::group([],function(){
  // 商城主页控制器
  Route::resource('/Home','Home\HomeController');
});