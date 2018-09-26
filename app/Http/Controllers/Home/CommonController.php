<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2018/9/26
 * Time: 10:06
 */

namespace App\Http\Controllers\Home;


class CommonController
{
    /**
     * 返回首页广告列表
     * @return mixed
     */
    public function Lits()
    {
        $BannerOne = Banner::GetBannerSelect(1);
        $BannerTwo = Banner::GetBannerSelect(2);
        $BannerThree = Banner::GetBannerSelect(3);
        $AdvImage = AdvImage::GetAdvImageOne(1);
        $Caty = Caty::GetCatyHomeAll();
        $software = DB::table('software')->join('users', 'users.id', '=', 'software.uid')->where('software.softwaretype','=',$Caty[0]->id)->where('software.is_status','=',1)->select('software.*','users.nickname')->orderBy('software.id','desc')->limit(9)->get();
        foreach ($software as $key => $value) {
            $software[$key]->count = DB::table('user_downs')->where('sid','=',$value->id)->count();
            $software[$key]->comment = DB::table('user_comments')->where('is_code',1)->where('sid','=',$value->id)->avg('star');
        }
        $SoftwareHotDown = DB::table('software')->join('users', 'users.id', '=', 'software.uid')->where('softwaretype','=',$Caty[0]->id)->where('software.is_status','=',1)->select('software.*','users.nickname')->orderBy('software.id','desc')->limit(6)->get();
        foreach ($SoftwareHotDown as $k => $v) {
            $SoftwareHotDown[$k]->count = DB::table('user_downs')->where('sid','=',$v->id)->count();
            $SoftwareHotDown[$k]->comment = DB::table('user_comments')->where('is_code',1)->where('sid','=',$v->id)->avg('star');
        }
        $data = Sorting::GetLimitLiShi($SoftwareHotDown);
        $result['BannerOne'] = $BannerOne;
        $result['BannerTwo'] = $BannerTwo;
        $result['BannerThree'] = $BannerThree;
        $result['AdvImage'] = $AdvImage;
        $result['CatyInd'] = $Caty;
        $result['Software'] = $software;
        $result['SoftwareHotDown'] = $data;
        return $result;
    }
}