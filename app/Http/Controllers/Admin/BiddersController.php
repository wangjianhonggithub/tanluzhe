<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Home\AuctionController;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;


class BiddersController extends Controller
{
    public function test()
    {

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
        return view('/Admin/List/BiddersList',[
            "data"=>$data,
        ]);
    }

    /**
     * 获取轮播图结果
     * @param $id
     */
    public function getresult($id)
    {
        $res = AuctionController::ban_results($id);
        if($res['status']>0){
            return $res['msg'];
        }else{
            echo '已经结束竞拍';
        }
    }
    
    
}
