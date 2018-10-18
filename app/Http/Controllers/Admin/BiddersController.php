<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Home\AuctionController;
use App\Http\Controllers\Home\CommonController;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;


class BiddersController extends Controller
{
    public function test()
    {
        $list = $this->advList();
    }

    /**
     * 查看被竞拍的广告列表
     */
    public function BiddersList()
    {
        $data = DB::table('banners')
            ->where('status',0)//竞拍中的广告
            ->join('navs', 'navs.id', '=', 'banners.c_id')
            ->select('banners.*', 'navs.nav_name')
            ->orderBy('banners.id','desc')
            ->paginate(10);
        $advList = $this->advList();
        //用来初始化数据
        $advs = array(
            'ind_s'=>'首轮播上',
            'ind_x'=>'首轮播下',
            'ind_z'=>'首页中部',
            'list_h'=>'列表横幅',
            'list_s'=>'表轮播上',
            'list_x'=>'列表轮播下',
            'info_bz'=>'详情轮播左',
            'info_bc'=>'详情轮播中',
            'info_by'=>'详情轮播右',
            'info_z'=>'详情中部',
            'info_bcy'=>'详情轮播中右',
            ''=>''
        );
        foreach ($advList as $key=>$val){
            $advList[$key]['title'] = $advs[$val["title"]];
        }
        return view('/Admin/List/BiddersList',[
            "data"=>$data,
            "advList"=>$advList
        ]);
    }

    /**
     * 获取轮播图结果
     * @param $id
     */
    public function getresult($id)
    {
        if(intval($id)>0){
            $res = AuctionController::ban_results($id);
        }else{
            $res = AuctionController::adv_results($id);
        }
        if($res['status']>0){
            return $res['msg'];
        }else{
            echo '竞拍成功结束';
        }
    }

    /**
     * 静态广告列表
     * @return array
     */
    public function advList()
    {
        $array = array();
        for ($i=0;$i<=4;$i++){
            $array[$i] = $this->Initialization($i);
        }
        $data = array();
        $i = 0;
        foreach ($array[0] as $k=>$v){
            $data[$i]['title'] = $k;
            $i++;
        }

        $i = 0;
        foreach ($array[0] as $k=>$v){
            $data[$i]['img'] = $v;
            $i++;
        }

        $i = 0;
        foreach ($array[1] as $k=>$v){
            $data[$i]['url'] = $v;
            $i++;
        }

        $i = 0;
        foreach ($array[2] as $k=>$v){
            $data[$i]['uid'] = $v;
            $i++;
        }

        $i = 0;
        foreach ($array[3] as $k=>$v){
            $data[$i]['status'] = $v;
            $i++;
        }

        $i = 0;
        foreach ($array[4] as $k=>$v){
            $data[$i]['addtime'] = $v;
            $i++;
        }

        return $data;
    }

    public function Initialization($status)
    {
        $list = DB::table('adv_images')->get();
        $newlist = CommonController::toArr($list[$status]);
        unset($newlist['id']);
        unset($newlist['created_at']);
        unset($newlist['updated_at']);
        return $newlist;
    }
    
    
}
