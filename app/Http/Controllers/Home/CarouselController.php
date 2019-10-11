<?php

namespace App\Http\Controllers\Home;

use App\Model\Banner;
use App\Service\Common;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Cookie;
use Illuminate\Support\Facades\DB;

/**
 * Class CarouselController
 * @package App\Http\Controllers\Home
 */
class CarouselController extends Controller
{
    /**
     * Display a listing of the resource.
     * 展示所有的可选的轮播图广告位
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $banner = new Banner();
        $list = $banner->orderBy('c_id','asc')->paginate(10);
		//获取价格
		foreach($list as $k=>$v){
			$money = DB::table('user_auc_bill')->where(['banners_id'=>$v->id])->where(['status'=>2])->max('money');
			$list[$k]['money'] = $money;
		}
        return view('/Home/Carousel/index',['list'=>$list]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        return view('/Home/Carousel/createAuc',['id'=>$request->get('id')]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function add(Request $request)
    {
        $data = $request->post();
        $dir = 'uploads/AdvImage';
		$data['users_id'] = Cookie::get('UserId');
		//判断登录
		if (!$data['users_id']) {
            echo $str =  "<script>alert('账号异常，请重新登陆');window.location.href='/Login';</script>";
        }

		//判断时间是否是有效
		$banners = db::table('banners')->where('id',$request->post('banners_id'))->first();  

		if(time() < $banners->banner_stime){
		    echo "<script>alert('竞拍还未开始');window.history.back(-1);</script>";
		}
		if(time() > $banners->banner_etime){
			echo "<script>alert('竞拍已经结束');window.history.back(-1);</script>";
		}
        $data['pic'] = Common::DirUpload('pic',$request,$dir);

        //		判断图片尺寸是否相同
        $old_size = Common::Get_Image_Size($banners->banner_img);
        $new_size = Common::Get_Image_Size($data['pic']);
        if($old_size[0] != $new_size[0] && $old_size[1] != $new_size[1]) {
            echo "<script>alert('图片尺寸不合适，正确尺寸$old_size[0]X$old_size[1]');window.history.back(-1);</script>";
            return false;
        }

        if($request->post('money')<=0){

            echo "<script>alert('竞拍金额不得小于等于0');window.history.back(-1);</script>";
            return false;
        }
		
		//判断竞拍金额 必须大于当前审核通过金额
		$money = DB::table('user_auc_bill')->where(['banners_id'=>$request->post('banners_id')])->where(['status'=>2])->max('money');

		if($request->post('money')<=$money){
			
			 echo "<script>alert('您的竞拍金额小于当前金额');window.history.back(-1);</script>";
			 return false;
		}

        if(isset($this->__issetBil($data)[0])){
            echo "<script>alert('你已经竞拍过了，请选择你没有竞拍的广告位进行竞拍');window.location.href='/carousel';</script>";
        }else{	
            
            $res = CommonController::consumption_new($data['money']);
			
            if($res){
				
				//判断情况
				if($res['status']==1){
					$re = DB::table('user_auc_bill')->insert($data);
					if($re){
						  echo "<script>alert('竞拍成功，等待后台审核');window.location.href='/';</script>";
					}else{
						 echo "<script>alert('竞拍失败');window.history.back(-1);</script>";
					}
				}else{
					echo "<script>alert('".$res['msg']."');window.history.back(-1);</script>";
				}
				
               
                return 0;
            }else{
                echo "<script>alert('意外错误，请刷新浏览器');window.history.back(-1);</script>";
                return 0;
            }
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id,Request $request)
    {
        switch ($id)
        {
        case 'stAdvertising': //轮播图竞价页面，表单！提交竞价信息
            $balance = AccountsController::info();//获取用户余额信息
            return view('/Home/Carousel/stAdvertising',['id'=>$request->get('id'),'balance'=>$balance]);
        break;
        case 'createAuc';
            return view('');
        break;
            case 'test';
                $this->getresultAuc(33);
                break;
        default:
            echo "<scirpt> alert('没有跳转好对应的界面'); </scirpt>";
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,$id)
    {

        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    /**
     * 用户第二次加价
     * @param Request $request
     * @return bool
     */
    public function markup(Request $request)
    {
        //判断加价是否是最大价格，如果小于最大价格就返回错误信息
        $info = DB::table('user_auc_bill')->where(['id' => $request->get('id')])->first();


        $res = $this->getmaxMoney($info->billboards_position,($info->money+$request->get('money')));
		
        if($res != 0){
            $str =  "<script>alert('目前竞拍的最大金额是%d您竞拍的金额是%d');window.history.back(-1);</script>";
            $s = sprintf($str,$res,$info->money+$request->get('money'));
            echo $s;
            return false;
        }else{
            $res = CommonController::consumption_new($request->get('money'));
            if($res['status']!=1){

                $str = "<script>alert('%s');window.history.back(-1);</script>";
                $s = sprintf($str,$res['msg']);
                echo $s;
            }else{

                DB::table('user_auc_bill')->where(['id' => $request->get('id')])->increment('money',$request->get('money'));
				
				DB::table('accounts')->where('uid',Cookie::get('UserId'))->decrement('balance',$request->get('money'));
				
                $str = "<script>alert('加价成功');window.history.back(-1);</script>";
                echo $str;
            }
        }
    }

    /**
     * @param int $微信信息
     * @param 竞拍大金额
     * @return bool or maxMoney
     */
    protected function getmaxMoney($billboards_position,$money)
    {
        $where['status'] = 2;
        $where['billboards_position'] = $billboards_position;
        $maxMoney = DB::table('user_auc_bill')->where($where)->max('money');

        if($money<$maxMoney){
            return $maxMoney;
        }else{
            return 0;
        }
    }

    /**
     * 判断当前用户竞拍的广告位之前是否竞拍过？
     */
    protected function __issetBil($data)
    {
        $where['users_id'] = $data['users_id'];
        $where['banners_id'] =$data['banners_id'];
        $where['status'] =2;
        $list = DB::table('user_auc_bill')
            ->where($where)
            ->get();
        return $list;
    }

    /**
     * 获取竞拍的结果
     */
    public function getresultAuc($banners_id)
    {
        $list = DB::table('user_auc_bill')
            ->where(['banners_id'=>$banners_id])//位置
            ->where(['status'=>2])//状态是正在参与的
            ->orderBy('money', 'desc')
            ->first();
        $data['user_image'] = $list->pic;
        $data['user_url'] = $list->url;
        $data['user_auc_bill_id'] = $list->id;
        $data['banner_stime'] = date('Y-m-d H:i:s');
        $data['status'] = 2;
        $res = DB::table('banners')
            ->where('id', $list->banners_id)
            ->update($data);
        if($res){
            DB::table('user_auc_bill')->where('id', $list->id)->where('status', 2)->update(['status'=>3]);
            DB::table('user_auc_bill')->where('banners_id', $banners_id)->where('status',2)->update(['status'=>4]);
        }else{
            return '广告没有成功替换成用户的广告';
        }
    }
}
