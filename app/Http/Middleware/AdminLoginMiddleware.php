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
            return $next($request);
        }else{
            return redirect('/AdminLogin');
        }
    }
}
