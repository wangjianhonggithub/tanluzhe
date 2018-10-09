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
        if(self::typingJudge($data)){
            //第二次竞拍
            self::typingSecond(self::typingJudge($data),$data);
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
     * 判断是第几次竞拍
     * @param $banners_id 参与竞拍的广告
     * @return bool
     */
    static function typingJudge($data)
    {
        $where['uid'] = Cookie::get('UserId');
        if(isset($data['banners_id'])){
            $where['banners_id'] = $data['banners_id'];
        }else{
            //如果没有 banners_id，就代表的是静态的广告（二开真难！！！！！！）
            $where['adv_images'] = $data['adv_images'];
        }
        $where['status'] = 0;
        $res = DB::table('auction')->where($where)->first();
        if($res){
           return $res->auction_id;
        }else{
            return false;
        }
    }


    /**
     * 查看用户参与的所有的竞拍
     */
    public function myBiddersOfBanner()
    {
        $list = DB::table('auction')->where('uid',Cookie::get('UserId'))->get();
        foreach ($list as $k=>$v){
            $list[$k]->title = 'ss';
            if($v->banners_id==0){

            }else{
                $list[$k]->title = DB::table('banners')->where('id',34)->first()->title;
            }
            if($list[$k]->adv_images==''){

            }else{
                $list[$k]->title = self::Initialization()['adv_images'][$v->adv_images];
            }
        }
        return view('Home.Banner.myBiddersOfBanner',['list'=>$list]);
    }

    /**
     * 初始化广告信息
     */
    static public function Initialization($id = 0){

        $list = DB::table('banners')->where('id',$id)->first();

        $data['adv_images'] = array(
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

        return $data;
    }

    /**
     *
     */

    /**
     * 查看竞价排名（轮播）
     */
    public function showAll()
    {
        return view('Home.Banner.Ranking',['banList'=>BannerController::BannerList()]);
    }

    /**
     * 查看竞价排名（静态）
     */
    public function stcshowAll()
    {
        return view('Home.Banner.StcRanking',['banList'=>BannerController::adv_imagesList()]);
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
     * 查看某一个的竞价排名(静态)
     */
    public function stCshowone($where)
    {

        $list = DB::table('auction')->where('adv_images',$where)->get();
        if($list->isEmpty()){
            $data['sta'] = 0;
            $data['msg'] = '暂时没有人来竞拍';
        }else{
            $data['sta'] = 1;
            $data['data'] = $list;
        }
        return $data;
    }

    
    public function test()
    {
        $list = $this->myBiddersOfBanner();
    }
}
