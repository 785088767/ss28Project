<?php

namespace App\Http\Middleware;

use Closure;

class AdminLoginMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        // 检查是否存在session
        if($request->session()->has('id')){
            //4.用访问模块的控制器和方法 权限列表 对比
            //获取访问控制器的方法
            //获取访问模块方法名
            $action=$request->route()->getActionMethod();
            //获取访问模块控制器的名字
            $actions=explode('\\', \Route::current()->getActionName());
            //或$actions=explode('\\', \Route::currentRouteAction());
            $modelName=$actions[count($actions)-2]=='Controllers'?null:$actions[count($actions)-2];
            $func=explode('@', $actions[count($actions)-1]);
            //控制器名字
            $controller=$func[0];
            $actionName=$func[1];
            // echo $controller.":".$action;
            //获取权限信息
            $nodelist=session('nodelist');
            //和权限列表做对比
            if(empty($nodelist[$controller])||!in_array($action,$nodelist[$controller])){
                return redirect("/adminindex")->with('error',"抱歉,您没有权限访问该模块,请联系超级管理员");
            }
            return $next($request);
        }else{
            return redirect('/adminlogin');
        }
    }
}
