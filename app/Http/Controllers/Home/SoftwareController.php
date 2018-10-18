<?php

namespace App\Http\Controllers\Home;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Cookie;

//我的软件
class SoftwareController extends Controller
{
    /**
     * 测试
     */
    public function test()
    {

    }

    /**
     * 我的软件位的列表
     */
    public function Softwarelist()
    {
        $list = DB::table('software')->where('uid',Cookie::get('UserId'))->get();
    }


    /**
     * 执行竞价跳转
     */
    public function bidPrice()
    {

    }

    /**
     * @param $softwaretype 软件类型id
     * @param $order 排序
     */
    public function doBidPrice($softwaretype,$order)
    {

    }

    /**
     * 所有竞拍的广告列表
     * 只包含没有被竞价的
     * @return array
     */
    public function allList()
    {
        $list = DB::table('caties')->get();
        $ins = array();
        foreach ($list as $k=>$v){
            $ins[$v->id] = DB::table('software')
                ->where('softwaretype',$v->id)
                ->where('order','>=',0)
                ->get();
        }
        $inss = array();
        $in = $this->allSoft();
        foreach ($ins as $key=>$val){
            echo $key;
            foreach ($val as $k=>$v){
                $ss[$key][] =  $v->order;
            }
        }
        $newdata = array();
        foreach ($in as $k=>$v){
            if(isset($ss[$k])){
                $newdata[$k] = array_diff($v,$ss[$k]);
            }else{
                $newdata[$k] = $v;
            }
        }
        return $newdata;
    }

    /**
     * 所有的软件位,包含已经被竞价完的
     */
    public function allSoft()
    {
        $list = DB::table('caties')->get();
        $ss = $this->initData();
        foreach ($list as $k=>$v){
            $data[$v->id] = $ss;
        }

        return $data;
    }

    /**
     * 数据初始化，用来更新进行排位数据的初始
     * @return array
     */
    public function initData()
    {
        $ord = array();
        for($i=1;$i<=30;$i++){
            $num = $i%6;
            switch ($num){
                case 1:
                    $ord[$i] = $i+4;
                    break;
                case 2;
                    $ord[$i] = $i+1;
                    break;
                case 3;
                    $ord[$i] = $i-2;
                    break;
                case 4:
                    $ord[$i] = $i-2;
                    break;
                case 5:
                    $ord[$i] = $i-1;
                    break;
                case 0:
                    $ord[$i] = $i;
                    echo '<br/>';
            }
        }

        return $ord;
    }
}


