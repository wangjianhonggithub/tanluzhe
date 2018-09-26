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
     * 广告列表
     * @return mixed
     */
    public function BannerList()
    {
        $banList =  DB::select("select *,CONCAT(id,c_id)  from banners order by CONCAT(c_id,id) asc");
        return $banList;
    }

    /*
     * 测试
     * */
    public function test()
    {
        echo Cookie::get('UserId');

    }

    
}
