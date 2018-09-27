<?php

namespace App\Http\Controllers\Home;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Model\Banner;
use App\Model\AdvImage;
use App\Model\Caty;
use DB;
use App\Service\Sorting;
use Cookie;

class BannerController extends Controller
{

    /**
     * 投放广告
     */
    public function Advertising()
    {
        $balance = AccountsController::info();
        return view('Home.Banner.Advertising',['banList'=>self::BannerList(),'balance'=>$balance]);
    }
    
    /**
     * 广告列表
     * @return mixed
     */
    static public function BannerList()
    {
        $banList =  DB::select("select *,CONCAT(id,c_id)  from banners order by CONCAT(c_id,id) asc");
        return $banList;
    }

    /*
     * 广告投放规则
     * */
    public function RuleAds()
    {
        return view('Home.Banner.RuleAds');
    }
    
    
    /*
     * 测试
     * */
    public function test()
    {
        echo Cookie::get('UserId');

    }

    
}
