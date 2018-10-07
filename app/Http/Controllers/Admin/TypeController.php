<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Admin\Type;

class TypeController extends Controller
{
    /**
     * Display a listing of the resource.
     * 分类展示
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        // 获取搜索内容
        $k=$request->input('keywords');
        $data = Type::where([
            ["name",'like',"%".$k."%"],
            ['pid', '=', '0'],
            ])->paginate(2);;
        return view('Admin.GoodsType.type',['data'=>$data,'request'=>$request->all()]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        return view('Admin.GoodsType.typeAdd',['request'=>$request]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // 获取id值
        $id = $request->input('id');
        // dd($id);
        if(empty($id)){
            $data = $request->except(['_token','id']);
            $data['pid'] = 0;
            $data['path'] = '0,';
            // dd($data);
            if(Type::create($data)){
                return redirect('/type')->with('success','主分类添加成功'); 
            }else{
                return redirect('/type/create')->with('error','主分类添加失败'); 
            }
        }else{
            $data = $request->except(['_token','id']);
            $path = Type::where('id',$id)->value('path');
            $data['pid'] = $id;
            $data['path'] = $path.$id.',';
            // dd($data);
            if(Type::create($data)){
                return redirect('/type')->with('success','子分类添加成功'); 
            }else{
                return redirect('/typeAdd')->with('error','子分类添加失败'); 
            }
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request, $id)
    {
        // 获取子分类
        $data = Type::where('pid','=',$id)->get();
        return view('Admin.GoodsType.typeChild',['data'=>$data,'request'=>$request]);
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

    // 子分类添加
    public function typeAdd($id){
        return view('Admin.GoodsType.typeAdd',['id'=>$id]);
    }

    // 分类删除
    public function typeDel(Request $request){
        $id = $request->input('id');
        if(Type::where('pid',$id)->value('id')){
            echo 2;
        }else{
            if(Type::where('id','=',$id)->delete()){
                echo 1;
            }else{
                echo 0;
            }
        }
    }
}
