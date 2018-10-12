<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2018/9/26
 * Time: 10:06
 */

namespace App\Http\Controllers\Home;


use Illuminate\Support\Facades\DB;
use Cookie;
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

    /**
     * @param $num 被扣除的金额
     */
    static public function consumption($num)
    {
        $res = DB::table('accounts')->where('uid',Cookie::get('UserId'))->first();
        if($res){
            if($res->balance>=$num){
                return DB::table('accounts')->where('uid',Cookie::get('UserId'))->decrement('balance',$num);
            }else{
                $result['status'] = 3;
                $result['msg'] = '账户余额不足';
            }
        }else{
            $result['status'] = 2;
            $result['msg'] = '暂时没有您的账户';
        }

        return $result;
    }

    /**
     * @return array
     */
    static public function getAdvList()
    {
        $list = DB::table('adv_images')->get();
        unset($list[2]->id);
        $data = array();
        foreach ($list[2] as $k=>$v){
            if($v == Cookie::get('UserId')){
                $data[] = $k;
            }
        }
        return $data;
    }

    /**
     * @param $uid 用户id
     * 判断某个用户的账户是否存在，不存在就创建
     */
    static public function isSetUserAccounts($uid)
    {
        $result = DB::table('accounts')->where('uid',$uid)->first();
        if(empty($result)) {
            $data['uid'] = $uid;
            $data['balance'] = 0;
            $data['addtime'] = date('Y-m-d H:i:s');
            DB::table('accounts')->insert($data);
        }

    }

    /**
     * 对象转换成数组
     */
    static public function toArr($object)
    {
        $new  = array();
        foreach ($object as $k=>$v){
            $new[$k] = $v;
        }

        return $new;
    }
}
