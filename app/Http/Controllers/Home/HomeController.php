<?php

namespace App\Http\Controllers\Home;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

// 模型类
use App\Home\Goods;
use App\Home\GoodsType;
use DB;


class HomeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    // 商城主页
    public function init(){
      // 商品
      $goods = Goods::get();
      // dd($goods);
      return view('Home.index',['goods'=>$goods]);
    }

    // 添加购物车
    public function addShop(Request $request){
        $id = $request->input('id');
        $goods = Goods::where('id',$id)->first()->toArray();
        // 重复添加
        if ($request->session()->has('cart')) {
            $cart = session('cart');
            foreach($cart as $k=>$v){
                if($v['id'] == $id){
                    $goods['num'] += $v['num'];
                    $request->session()->pull('key');
                    $request->session()->push('cart', $goods);
                }else{
                    $goods['num'] = 1;
                    $request->session()->push('cart', $goods);
                }
            }
            echo 1;
        }else{
            $goods['num'] = 1;
            $request->session()->push('cart', $goods);
            echo 1;
        }
        
    }

    // 购物车展示
    public function cart(Request $request){
        // 获取session数据判断是否登录
        if($request->session()->has('login')){
            // 获取数据库购物车数据
        }else{
            // 获取本地session数据 
            $data = session('cart');
            // dd($data);
            return view('Home.cart.cart',['data'=>$data]);
        }
    }
}
