<?php
/**
 * 投诉建
 * Created by PhpStorm.
 * User: 马黎
 * Date: 2018/9/27
 * Time: 11:57
 */

//竞价表
namespace App\Http\Controllers\Home;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Cookie;
use Illuminate\Support\Facades\DB;

class AuctionController extends Controller
{
    /**
     * 查看竞价排名
     */
    public function showAll()
    {
        return view('Home.Banner.Ranking',['banList'=>BannerController::BannerList()]);
    }

    /**
     * 查看某一个的竞价排名
     */
    public function showone($id)
    {
        $list = DB::table('auction')->where('banners_id',$id)->get();
        if($list->isEmpty()){
            $data['sta'] = 0;
            $data['msg'] = '暂时没有人来竞拍';
        }else{
            $data['sta'] = 1;
            $data['data'] = $list;
        }
        return $data;
    }
    
    /**
     * 录入竞价信息
     */
    public function typing(Request $request)
    {
        $data =  $request->all();
        $data['uid'] = Cookie::get('UserId');
        $data['addtime'] = date('Y-m-d H:i:s');
        $data['status'] = 0;
        unset($data['_token']);
        //判断是第几次竞拍
        if(self::typingJudge($data['banners_id'])){
            //第二次竞拍
            self::typingSecond(self::typingJudge($data['banners_id']),$data);
          }else{
            //第一次竞拍
            self::typingFirst($data);
        }

    }

    //第一次竞拍
    static public function typingFirst($data)
    {
        $res = CommonController::consumption($data['money']);
        if($res==1){
            $res = DB::table('auction')->insert($data);
            if($res){
                echo '竞拍信息已经录入';
            }else{
                echo '竞拍失败';
            }
        }else{
            echo '意外错误';
        }
    }

    /**
     * 第二次竞拍
     */
   static public function typingSecond($auction_id,$data)
    {
        //第二次竞拍
        $res = CommonController::consumption($data['money']);
        if($res==1){
            DB::table('auction')->where('auction_id',$auction_id)->increment('money',$data['money']);
            if($res){
                echo '第二次竞拍金额已经累加';
            }else{
                echo '竞拍失败';
            }
        }else{
            echo '意外错误';
        }
    }

    /**
     * @param $banners_id 参与竞拍的广告
     * @return bool
     */
    static function typingJudge($banners_id)
    {
        $where['uid'] = Cookie::get('UserId');
        $where['banners_id'] = $banners_id;
        $where['status'] = 0;
        $res = DB::table('auction')->where($where)->first();
        if($res){
           return $res->auction_id;
        }else{
            return false;
        }
    }

    public function test()
    {
        $this->typingtow();
    }
}
