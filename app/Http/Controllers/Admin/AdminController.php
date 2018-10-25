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
     * 管理员列表
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {   
        // echo '1';
        $k=$request->input("keywords");
        $user = AdminUser::where("username",'like',"%".$k."%")->paginate(3);
        // dd($user);
        return view('Admin.AdminUsers.list',['user'=>$user,'request'=>$request->all()]);
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
        // dd($info);
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
        // dd($data);
        if($data['password'] != $oldpwd){
          $data['password'] = Hash::make($data['password']);
          dd($data);
          if(AdminUser::where('id','=',$id)->update($data)){
              return redirect('/adminList')->with('success','修改成功');
            }else{
              return redirect('/adminList')->with('error','修改失败');
            }
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


    // ajax删除
    public function adminDel(Request $request){
        $id = $request->input('id');
        if(AdminUser::where('id','=',$id)->delete()){
            echo 1;
        }else{
            echo 0;
        }
    }

    // 等级变更
    public function rolelist($id){
        // echo '角色变更';
        // 获取管理员用户信息
        $info = DB::table('admin_user')->where('id',$id)->first();
        // 所有等级信息
        $role = DB::table('role')->get();
        // 获取当前管理员已有角色信息
        $data = DB::table('user_role')->where('uid',$id)->get();
        // dd($info);
        if(count($data)){
            foreach($data as $v){
                $rid[]=$v->rid;
            }
            return view('Admin.AdminUsers.rolelist',['info'=>$info,'role'=>$role,'rids'=>$rid]);
        }else{
            return view('Admin.AdminUsers.rolelist',['info'=>$info,'role'=>$role,'rids'=>array()]);
        }
    }

    public function saverole(Request $request){
        // echo "这是保存角色操作";
        // 获取rids 参数 选中的角色id
        // dd($_POST);
        $rid=$request->input('rid');
        //获取id
        $uid=$request->input('uid');
        //删除当前用户已有的角色信息
        $data['rid']=$rid;
        $data['uid']=$uid;
        //执行修改
        DB::table("user_role")->where("uid",$uid)->update($data);
        return redirect("/admin")->with('success','角色分配成功');
    }

    // 账号状态修改
    public function sta(Request $request){
        // echo $request->input('a');
        $id = $request->input('a');
        $num = $request->input('num');
        DB::table('admin_user')->where('id',$id)->update(['status'=>$num]);
        $s = DB::table('admin_user')->where('id',$id)->value('status');
        echo $s;
    }
}
