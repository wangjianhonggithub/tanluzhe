<?php

namespace App\Http\Middleware\Admin;

use Closure;
use Cookie;
use App\Model\AdminUser;
class CheckLogin
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
        $Adminid = Cookie::get('AdminUserId');
        $res = AdminUser::GetOne($Adminid);
        if (!$res) {
            return redirect('Admin/Login');
        }else{
            return $next($request);
        }
    }
}
