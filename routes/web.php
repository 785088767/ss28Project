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


// 后台路由组(中间件)
// Route::group(['middleware'=>'AdminLogin'],function(){
  // 后台主页
  Route::resource('/admin','Admin\AdminController');
  // 管理员展示
  Route::get('adminList','Admin\AdminController@adminList');
  // 管理员删除
  Route::get('adminDel','Admin\AdminController@adminDel');

  // 分类控制器
  Route::resource('/type','Admin\TypeController');
  Route::get('/typeAdd/{id}','Admin\TypeController@typeAdd');
  Route::get('/typeDel','Admin\TypeController@typeDel');

  // 会员控制器
  Route::resource('/usersList','Admin\UsersController');
  Route::get('/usersDel','Admin\UsersController@usersDel');

  // 后台商品管理
  Route::resource('/goodsList','Admin\GoodsController');
  Route::get('/goodsDel','Admin\GoodsController@goodsDel');

  Route::resource('/orderList','Admin\OrderController');
// });


// 商城主页
Route::get('/', 'Home\HomeController@init');


// 商城路由组
Route::group([],function(){
  // 商城主页控制器
  Route::resource('Home','Home\HomeController');
});