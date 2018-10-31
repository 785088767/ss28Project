<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
// 模型类
use App\Admin\Order;
// 订单详情类
use App\Admin\OrderInfo;
use DB;

class OrderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $k=$request->input("keywords");
        // 获取数据
        $info = Order::where("oid",'like',"%".$k."%")->paginate(5);
        // foreach($info as $v){
        //     dd($v->goods->gname);
        // }
        return view('Admin.Orders.ordersList',['data'=>$info,'request'=>$request->all()]);
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
        // 订单详情
        // dd($id);
        $data = OrderInfo::where('oid',$id)->get();
        // dd($data);
        return view('Admin.Orders.OrdersInfo',['data'=>$data]);
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

    // 未支付订单
    public function nopayList(Request $request){
        $k=$request->input("keywords");
        // 获取数据
        $info = Order::where([["oid",'like',"%".$k."%"],['status','=','0']])->paginate(5);
        return view('Admin.Orders.nopayList',['data'=>$info,'request'=>$request->all()]);
    }

    // 已完成订单
    public function doneList(Request $request){
        $k=$request->input("keywords");
        // 获取数据
        $info = Order::where("oid",'like',"%".$k."%")->whereIn('status', [3,5])->paginate(5);
        return view('Admin.Orders.doneList',['data'=>$info,'request'=>$request->all()]);
    }

    // 发货
    public function ajax(Request $request){
        $id = $request->input('a');
        // 查询原值
        $s = DB::table('admin_orders')->where('id',$id)->value('status');
        DB::table('admin_orders')->where('id',$id)->update(['status'=>$s+1]);
        $a = DB::table('admin_orders')->where('id',$id)->value('status');
        echo $a;
    }
}
