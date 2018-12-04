<?php

namespace App\Http\Controllers\Home;

use Illuminate\Http\Request;
use App\Service\Common;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Cookie;
use Illuminate\Support\Facades\DB;

class BillboardController extends Controller
{
    /**
     * 查看可以竞拍的广告牌
     */
    public function show()
    {
        $list = DB::table('billboards')
            ->where('billboards_position','>',0)
            ->where('billboards_status','=',1)
            ->get();
        return view('/Home/Billboard/show',[
            'list'=>$list,
        ]);
    }

    /**
     * 选择广告牌并且进行竞拍
     */
    public function auction(Request $request)
    {
        $data = $request->post();
        $dir = 'uploads/AdvImage';
        $data['pic'] = Common::DirUpload('pic',$request,$dir);
        $data['users_id'] = Cookie::get('UserId');

        if(isset($this->__issetBil($data)[0])){
            echo "<script>alert('你已经竞拍过了，请选择你没有竞拍的广告位进行竞拍');window.location.href='/auc';</script>";
        }else{
            $res = DB::table('user_auc_bill')->insert($data);
            $res = CommonController::consumption($data['money']);
            if($res){
                echo "<script>alert('竞拍成功，等待后台审核');window.location.href='/';</script>";
                return 0;
            }else{
                echo "<script>alert('意外错误，请刷新浏览器');window.history.back(-1);</script>";
                return 0;
            }
        }

    }

    public function createAuc($id)
    {
        return view('/Home/Billboard/createAuc',[
            'billboards_position'=>$id,
        ]);
    }

    /**
     * 我的广告牌列表
     */
    public function list(Request $request,$view)
    {
        switch ($view){
            case "alllist":
                $list = DB::table('user_auc_bill')->where(['users_id'=>Cookie::get('UserId')])->get();//所有的广告牌的列表
                foreach ($list as $key=>$value){
                  $list[$key]->billboards_position =  DB::table("billboards")->where('billboards_position',$value->billboards_position)->value('billboards_title');
                }
                return view("/Home/Billboard/$view",['data'=>$list]);
                break;
            case "stAdvertising":
                $balance = AccountsController::info();//获取用户余额信息
                return view('Home.Billboard.stAdvertising',['id'=>$request->get('id'),'balance'=>$balance]);
            case "ranking":
                $this->ranking();
                break;
            default:
                return '没有选择对应的界面';
                break;
        }
    }

    public function markup(Request $request)
    {
        //判断加价是否是最大价格，如果小于最大价格就返回错误信息
        $info = DB::table('user_auc_bill')->where(['id' => $request->get('id')])->first();
        $res = $this->getmaxMoney($info->billboards_position,($info->money+$request->get('money')));
        if($res != 0){
            $str =  "<script>alert('目前竞拍的最大金额是%d您竞拍的金额是%d');window.history.back(-1);</script>";
            $s = sprintf($str,$res,$info->money+$request->get('money'));
            echo $s;
            return false;
        }else{
            echo "扣除金额";
            $res = CommonController::consumption($request->get('money'));
            if($res['status']!=1){
                $str = "<script>alert('%s');window.history.back(-1);</script>";
                $s = sprintf($str,$res['msg']);
                echo $s;
            }else{
                DB::table('user_auc_bill')->where(['id' => $request->get('id')])->increment('money',$request->get('money'));
            }

        }

    }

    /**
     * @param int $微信信息
     * @param 竞拍大金额
     * @return bool or maxMoney
     */
    protected function getmaxMoney($billboards_position,$money)
    {
        $where['status'] = 2;
        $where['billboards_position'] = $billboards_position;
        $maxMoney = DB::table('user_auc_bill')->where($where)->max('money');
        if($money<$maxMoney){
            return $maxMoney;
        }else{
            dump($money>$maxMoney);
            return 0;
        }
    }

    /**
     * @param $position 位置
     * @param $status 状态
     */
    public function ranking($position,$status)
    {
        $where['users_id'] = Cookie::get('UserId');
        $list = DB::table('user_auc_bill')
            ->where(['billboards_position'=>$position])//位置
            ->where(['status'=>$status])//状态是正在参与的
            ->orderBy('money', 'desc')
            ->get();
        $myselforder = 0;
        $i = 1;
        $newlist = array();
        foreach ($list as $key=>$val){
            $newlist[$i] = $val;
            $newlist[$i]->orderby = $key+1;
            if($val->users_id==$where['users_id']){
                $myselforder = $key+1;
            }
            $i++;
        }
        if($myselforder<6){
            $whestart = 0;
        }else{
            $whestart = $myselforder -5;
        }
        $data['data'] = array_slice($newlist,$whestart,10,true);
        $data['myselforder'] = $myselforder;
        $data = \GuzzleHttp\json_encode($data);
        return  $data;
    }

    /**
     * 判断当前用户竞拍的广告位之前是否竞拍过？
     */
    protected function __issetBil($data)
    {
        $where['users_id'] = $data['users_id'];
        $where['billboards_position'] =$data['billboards_position'];
        $where['status'] =1;
        return DB::table('user_auc_bill')
            ->where($where)
            ->orWhere('status',2)
            ->get();
    }
}
