<?php
/**
 * Created by PhpStorm.
 * User: 马黎
 * Date: 2018/9/26
 * Time: 10:19
 */

namespace App\Http\Controllers\Home;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Cookie;
use Illuminate\Support\Facades\DB;

/**
 * 账户中心
 * Class AccountsController
 * @package App\Http\Controllers\Home
 */
class AccountsController extends Controller
{
    /**
     * 获取用户余额数量
     */
    static public function info()
    {
        $res = DB::table('accounts')->where('uid',Cookie::get('UserId'))->first();
        if($res){
            return $res->balance;
        }else{
            return '您暂时没有余额信息';
        }
    }

    /**
     * 充值记录
     */
    public function Recharge()
    {
        
    }

    /**
     * 提现记录
     */
    public function extract()
    {
        
    }
}
