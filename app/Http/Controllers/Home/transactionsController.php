<?php
/**
 * Created by PhpStorm.
 * User: 马黎
 * Date: 2018/9/26
 * Time: 10:33
 */


namespace App\Http\Controllers\Home;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Cookie;
use Illuminate\Support\Facades\DB;

class transactionsController extends Controller
{
    /**
     * 进行充值动作
     */
    public function doRecharge()
    {
        $transactions['uid'] = Cookie::get('UserId');
        $transactions['content'] = '充值';
        $transactions['addtime'] =date('Y-m-d H:i:s');
        $transactions['out_trade_no'] =date('YmdHis').rand(100000,999999);
        $transactions['total_amount'] =0.02;
        DB::table('transactions')->insert($transactions);
        //拼接支付宝参数
        $order['out_trade_no'] = $transactions['out_trade_no'];
        $order['total_amount'] = $transactions['total_amount'];
        $order['subject'] = '探路者网络充值';
        $p = new PayController();
        $p->toPay($order);
    }

    public function test()
    {
        $this->notify();
    }

    /**
     * 支付宝充值回调函数
     * @param $out_trade_no 充值订单号
     */
    public function notify($out_trade_no=20180926113334806420)
    {
        $data['channel'] = 1;
        $data['status'] = 1;
        $id = Cookie::get('UserId');
        $this->isSetUser();//判断用户是否存在账户，不存在创建！
        $total_amount = DB::table('transactions')
            ->where('out_trade_no',$out_trade_no)
            ->where('status',0)
            ->first();
        if(empty($total_amount)){
            $total_amount=0;
        }else{
            $total_amount = $total_amount->total_amount;
        }
        $res1 = DB::table('transactions')->where('out_trade_no',$out_trade_no)->update($data);
        $res2 = DB::table('accounts')->where('uid',$id)->increment('balance',$total_amount);

    }

    /**
     * 判断用户是存在账号中心表
     * 存在跳过，不存在创建
     */
    protected function isSetUser()
    {
        $id = Cookie::get('UserId');
        $result = DB::table('accounts')->where('uid',$id)->first();
        if(empty($result)) {
            $data['uid'] = $id;
            $data['balance'] = 0;
            $data['addtime'] = date('Y-m-d H:i:s');
            DB::table('accounts')->insert($data);
        }

    }
}
