<?php

namespace App\Http\Middleware;

use Closure;

class AdminLogin
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
        // return $next($request);
        //如果用户已经登录
        if(session('user')){
            return $next($request);
        }else{
            return redirect('admin/login')->with('errors','请先登录!');
        }
    }
}
