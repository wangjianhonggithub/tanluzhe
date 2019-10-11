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
use PDO;

class AuctionController extends Controller
{
    public function test()
    {
        $res = $this->adv_results('ind_x');
        dump($res);
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
     * 查看竞价排名（轮播）
     */
    public function showAll($id)
    {   

        $id   = $id;
		//echo $id;die();
        $data = BannerController::BannerList();

         // $resData = DB::table('user_auc_bill')
         //                ->join('users', 'users.id', '=', 'user_auc_bill.users_id')
         //                ->join('banners', 'banners.id', '=', 'user_auc_bill.banners_id')
         //                ->where('user_auc_bill.banners_id','=',$id)
         //                ->where('user_auc_bill.status','=',2)
         //                ->select('user_auc_bill.*', 'users.username','banners.title')
         //                ->orderBy('user_auc_bill.money','desc')
         //                ->paginate(10);

        if ($data) {
        
            $resData = DB::table('user_auc_bill')
                        ->join('users', 'users.id', '=', 'user_auc_bill.users_id')
                        ->join('banners', 'banners.id', '=', 'user_auc_bill.banners_id')
                        ->where('user_auc_bill.banners_id','=',$id)
                        ->where('user_auc_bill.status','=',2)
                        ->select('user_auc_bill.*', 'users.username','banners.title')
                        ->orderBy('user_auc_bill.money','desc')
                        ->paginate(10);


            if ($resData) {
                foreach ($resData as $key => $value) {
                    $resData[$key]->key = $key+1;
                }
            }


        }
        // var_dump();die;
        return view('Home.Banner.Ranking',['banList'=>$data,'resData'=>$resData,'id'=>$id]);
    }

    /**
     * 查看竞价排名（静态）
     */
    public function stcshowAll($id)
    {
        $id   = $id;

        $data = BillboardController::BillBoardList();
        
        if ($data) {
        
            $resData = DB::table('user_auc_bill')
                        ->join('users', 'users.id', '=', 'user_auc_bill.users_id')
                        ->join('billboards', 'billboards.billboards_position', '=', 'user_auc_bill.billboards_position')
                        ->where('billboards.billboards_position','=',$id)
                        ->where('user_auc_bill.status','=',2)
                        ->select('user_auc_bill.*', 'users.username','billboards.billboards_title')
                        ->orderBy('user_auc_bill.money','desc')
                        ->paginate(10);


            if ($resData) {
                foreach ($resData as $key => $value) {
                    $resData[$key]->key = $key+1;
                }
            }


        }
        // var_dump();die;
        return view('Home.Banner.StcRanking',['banList'=>$data,'resData'=>$resData,'id'=>$id]);

        // return view('Home.Banner.StcRanking',['banList'=>BannerController::adv_imagesList()]);
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

    /**
     * @param $banners_id 被竞拍轮播的id
     * @return mixed
     */
    static public function ban_results($banners_id)
    {
        $money = DB::table('auction')->where('banners_id',$banners_id)->where('status',0)->max('money');//获取竞拍最高价格
        if($money==null){
            return array('status'=>1,'msg'=>'没有找到用户竞拍的记录');
        }
        $data = DB::table('auction')->where('status',0)->where('money',$money)->first();//获取被竞拍到的最高价格的人
        $list = DB::table('banners')->where('id',$data->banners_id)->first();
        $list = CommonController::toArr($list); //将对象转换成数组
        $list['created_at'] = date('Y-m-d H:i:s');
        $list['uid'] = $data->uid;
        $list['status'] = 1;
        $res = DB::table('banners_users')->insert($list);//将广告赋予竞拍成功的人
        if($res){
            //如果广告竞拍成功，将竞拍成功的问和竞拍失败的订单状态进行修改
            DB::table('auction')->where('status',0)->where('money',$money)->where('banners_id',$banners_id)->update(['status'=>3]);
            DB::table('auction')->where('status',0)->where('banners_id',$banners_id)->update(['status'=>2]);
            DB::table('banners')->where('id',$banners_id)->update(['status'=>1]);
            self::backMoney();
        }

    }

    //------------------------------------- 结束静态广告竞拍star

    static public function adv_results($adv_images)
    {
        $money = DB::table('auction')->where('status','0')->where('adv_images',$adv_images)->max('money');
        if($money==null){
            return array('status'=>1,'msg'=>'没有找到用户竞拍的记录');
        }
        $data = DB::table('auction')->where('status','0')->where('adv_images',$adv_images)->where('money',$money)->first();//获取被竞拍到的最高价格的人
        //将用户的uid，赋给静态广告的id
        $res = DB::table('adv_images')->where('id',3)->update([$adv_images=>$data->uid]);
        if($res){
            // 如果修改成功
            DB::table('auction')->where('status',0)->where('adv_images',$adv_images)->update(['status'=>2]);
            DB::table('auction')->where('status',2)->where('money',$money)->update(['status'=>3]);
            DB::table('adv_images')->where('id',4)->update([$adv_images=>1]);
            DB::table('adv_images')->where('id',5)->update([$adv_images=>date('Y-m-d H:i:s')]);
            self::backMoney();
            return array('status'=>0,'msg'=>'广告竞拍成功结束');
        }else{
            return array('status'=>2,'msg'=>'用户没有改变');
        }

    }

    //------------------------------------- 结束静态广告竞拍end
    
    /**
     * 将金额返还给未能竞拍成功的用户
     */
    static public function backMoney()
    {
        $list = DB::table('auction')->where('status',2)->get();
        foreach ($list as $key=>$val){
            CommonController::isSetUserAccounts($val->uid);//判断用户是否存在，不存在就创建个新的账户
            $res = DB::table('auction')->where('auction_id',$val->auction_id)->update(['status'=>4]);
            if($res){
                DB::table('accounts')->where('uid',$val->uid)->increment('balance',$val->money);
            }
        }
    }



}
