<?php

namespace App\Http\Middleware;

use Closure;
use Auth;
use Illuminate\Http\Request;

class CheckAdmin
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next)
    {   
        if (Auth::check()) {
            if (Auth::user()->role==1) {
                return $next($request);
            }else{
                return redirect()->route('home.logon')->with('er','Tài khoản của bạn không có quyền Admin hãy đăng nhập lại!');
            }
        }else{
            return redirect()->route('home.logon')->with('er','Bạn hãy đăng nhập tài khoản admin!');
        }
    }
}
