<?php

namespace App\Http\Middleware;

use Closure;
use Cookie;
use App\Model\User;
class CheckSoftware
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
        if ($res->is_cert != 1) {
            return redirect('/AppCert')->with('info','请先认证成为开发人员');
        }else{
            return $next($request);
        }
    }
}
