<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
// 哈希类
use Hash;
// DB类
use DB;
// 表单校验类
use App\Http\Requests\UserInsert;
// 模型类
use App\Admin\Users;

class UsersController extends Controller
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
        $user = Users::where("loginname",'like',"%".$k."%")->paginate(5);
        // 会员展示
        return view('Admin.Users.usersList',['user'=>$user,'request'=>$request->all()]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('Admin.Users.usersAdd');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(UserInsert $request)
    {
        //
        $data = $request->except('_token','repassword');
        $data['password']=Hash::make($data['password']);
        $data['status'] = 0;
        $data['token'] = str_random(50);
        // dd($data);
        if(Users::create($data)){
            return redirect('/usersList')->with('success','添加成功');
        }else{
            return redirect('/usersList/create')->with('error','添加失败');
        }
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
        $info=Users::find($id);
        // dd($info);
        return view('Admin.Users.usersEdit',['info'=>$info]);
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
        // dd($request->all());
        $data = $request->except(['_token','_method','repassword']);
        $data['token'] = str_random(50);
        // $data['status'] = '0';
        $oldpwd = Users::where('id','=',$id)->value('password');
        // dd($oldpwd);
        // if(Hash::check($data['password'],$oldpwd)){
        //     echo 1;exit;
        // }else{
        //     echo 2;exit;
        // }
        if($data['password'] != $oldpwd){
          $data['password'] = Hash::make($data['password']);
        }else{
          $data['password'] = $oldpwd;
        }
        if(Users::where('id','=',$id)->update($data)){
          return redirect('/usersList')->with('success','修改成功');
        }else{
          return redirect('/usersEdit/$id')->with('error','修改失败');
        }
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

    // ajax删除
    public function usersDel(Request $request){
        $id = $request->input('id');
        if(Users::where('id','=',$id)->delete()){
            echo 1;
        }else{
            echo 0;
        }
    }

    public function sta(Request $request){
        $a = $request->input('a');
        $num = $request->input('num');
        DB::table('home_user')->where('id',$a)->update(['status'=>$num]);
        $status = DB::table('home_user')->where('id',$a)->value('status');
        echo $status;
    }
}
