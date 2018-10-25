<?php

namespace App\Http\Controllers\Home;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

// 模型类
use App\Admin\Goods;
use App\Admin\Brand;
use App\Admin\Type;
use DB;


class HomeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
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
      $goods = Goods::where('display',0)->paginate(5);
      // 按销量排序的商品
      $sales = Goods::orderBy('salenum','desc')->paginate(5);
      
      // 品牌
      $brand = Brand::where('status',0)->get();

      //轮播图
      $lunbo = DB::table('admin_carousel')->get();
      //广告
      $abs=DB::table('admin_abs')->where('status','=',0)->get();
      //引入模板
      return view('Home.index',['goods'=>$goods,'brand'=>$brand,'sales'=>$sales,'lunbo'=>$lunbo,'abs'=>$abs]);
    }

    // 类别列表展示
    public function list(Request $request ,$id){
        // 获取全部商品
        $data = Goods::where('cid',$id)->orWhere('cpid', $id)->paginate(3);
        // dd($data);
        // 分类
        $cate=DB::table("home_type")->select(DB::raw('*,concat(path,id) as paths'))->where('display',0)->orderBy('paths')->get();
        // 品牌
        $brand = Brand::where('status',0)->get();
        $sales = Goods::orderBy('salenum','desc')->get();
        // dd($sales);
        return view('Home.store.index',['data'=>$data,'cate'=>$cate,'brand'=>$brand,'sales'=>$sales]);
    }

    // 品牌列表展示
    public function blist(Request $request ,$id){
        // 获取全部商品
        $data = Goods::where('bid',$id)->paginate(5);
        // dd($data);
        // 分类
        $cate=DB::table("home_type")->select(DB::raw('*,concat(path,id) as paths'))->where('display',0)->orderBy('paths')->get();
        // 品牌
        $brand = Brand::where('status',0)->get();
        // dd($brand);
        // 按销量排序的商品
        $sales = Goods::orderBy('salenum','desc')->paginate(5);
        // dd($sales);
        return view('Home.store.index',['data'=>$data,'cate'=>$cate,'brand'=>$brand,'sales'=>$sales]);
    }

    // 搜索结果
    public function search(Request $request){
        $key = $request->key;
        // dd($key);
        // 获取结果
        $data = Goods::where('gname','like','%'.$key.'%')->paginate(5);
        // 获取分类
        $cate = DB::table('home_type')->select(DB::raw('*,concat(path,id) as paths'))->where('display',0)->orderBy('paths')->get();
        // 品牌
        $brand = Brand::where('status',0)->get();
        $sales = Goods::orderBy('salenum','desc')->get();
        // dd($sales);
        return view('Home.store.index',['data'=>$data,'cate'=>$cate,'brand'=>$brand,'sales'=>$sales]);
    }

    // 公告
    public function gg($id){
      // dd($id);/
      $gg = DB::table('admin_article')->where('id',$id)->first();
      // dd($gg);
        //公告页面
        return view('Home.gg.index',['gg'=>$gg]);
    }
}
