<?php

namespace App\Http\Middleware;

use Closure;
use App\Model\User;
use Cookie;
class CheckHomeLogin
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
        $Adminid = Cookie::get('UserId');
        $res = User::GetOne($Adminid);
        if (!$res) {
            return redirect('/Login')->with('info','请先登录');
        }else{
            return $next($request);
        }
    }
}
