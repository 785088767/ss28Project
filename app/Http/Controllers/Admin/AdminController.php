<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
// 哈希类
use Hash;
// DB类
use DB;
// 表单校验类
use App\Http\Requests\AdminInsert;
// 模型类
use App\Admin\AdminUser;


class AdminController extends Controller
{
    /**
     * Display a listing of the resource.
     * 后台首页
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('Admin.index');
    }

    /**
     * Show the form for creating a new resource.
     * 管理员添加模版
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('Admin.AdminUsers.add');
    }

    /**
     * Store a newly created resource in storage.
     * 执行添加
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(AdminInsert $request)
    {
        $data = $request->except('_token','repassword');
        $data['password']=Hash::make($data['password']);
        $data['status'] = 0;
        $data['token'] = str_random(50);
        // dd($data);
        if(AdminUser::create($data)){
            return redirect('/adminList')->with('success','添加成功');
        }else{
            return redirect('/admin/create')->with('error','添加失败');
        }
    }

    /**
     * Display the specified resource.
     * 管理员详情展示
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
     * 管理员修改模版
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $info = AdminUser::find($id);
        return view('Admin.AdminUsers.edit',['info'=>$info]);
    }

    /**
     * Update the specified resource in storage.
     * 修改操作
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
        // dd($request->all());
        $data = $request->except(['_token','_method','repassword']);
        $data['token'] = str_random(50);
        $data['status'] = '0';
        $oldpwd = AdminUser::where('id','=',$id)->value('password');
        // dd($oldpwd);
        if($data['password'] != $oldpwd){
          $data['password'] = Hash::make('password');
        }
        // dd($data);
        if(AdminUser::where('id','=',$id)->update($data)){
          return redirect('/adminList')->with('success','修改成功');
        }else{
          return redirect('/adminList')->with('error','修改失败');
        }
    }

    /**
     * Remove the specified resource from storage.
     * 删除
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    // 列表展示
    public function adminlist(Request $request){
        // echo '1';
        $k=$request->input("keywords");
        $user = AdminUser::where("username",'like',"%".$k."%")->paginate(3);
        // dd($user);
        return view('Admin.AdminUsers.list',['user'=>$user,'request'=>$request->all()]);
    }

    // ajax删除
    public function adminDel(Request $request){
        $id = $request->input('id');
        if(AdminUser::where('id','=',$id)->delete()){
            echo 1;
        }else{
            echo 0;
        }
    }
}
