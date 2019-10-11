<?php

namespace App\Http\Controllers\Home;

use Illuminate\Http\Request;
use App\Service\Common;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Cookie;
use Illuminate\Support\Facades\DB;

class BillboardController extends Controller
{
    /**
     * 查看可以竞拍的广告牌
     */
    public function show()
    {
        $list = DB::table('billboards')
            ->where('billboards_position','>',0)
            ->where('billboards_status','=',1)
            ->get();
		

		//获取价格
		foreach($list as $k=>$v){
			$money = DB::table('user_auc_bill')->where(['billboards_position'=>$v->billboards_position])->where(['status'=>2])->max('money');
			$list[$k]->money = $money;
		}
        return view('/Home/Billboard/show',[
            'list'=>$list,
        ]);
    }


    /**
     * 选择广告牌并且进行竞拍
     */
    public function auction(Request $request)
    {
		
        $data = $request->post();
        $dir = 'uploads/AdvImage';
		$data['users_id'] = Cookie::get('UserId');
		//判断登录
		if (!$data['users_id']) {
            echo $str =  "<script>alert('账号异常，请重新登陆');window.location.href='/Login';</script>";
        }
		//判断时间是否是有效
		$billboards = db::table('billboards')->where('billboards_position',$request->post('billboards_position'))->first();  

		if(time() < $billboards->billboards_stime){
		    echo "<script>alert('竞拍还未开始');window.history.back(-1);</script>";
		}
		if(time() > $billboards->billboards_etime){
			echo "<script>alert('竞拍已经结束');window.history.back(-1);</script>";
		}
        $data['pic'] = Common::DirUpload('pic',$request,$dir);

//		判断图片尺寸是否相同
        $old_size = Common::Get_Image_Size($billboards->billboards_default_pic);
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
		$money = DB::table('user_auc_bill')->where(['billboards_position'=>$request->post('billboards_position')])->where(['status'=>2])->max('money');

		if($request->post('money')<=$money){
			
			 echo "<script>alert('您的竞拍金额小于当前金额');window.history.back(-1);</script>";
			 return false;
		}
        
        // var_dump($data);exit;
        if(isset($this->__issetBil($data)[0])){
            echo "<script>alert('你已经竞拍过了，请选择你没有竞拍的广告位进行竞拍');window.location.href='/auc';</script>";
        }else{
            //
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

    public function createAuc($id)
    {
        return view('/Home/Billboard/createAuc',[
            'billboards_position'=>$id,
        ]);
    }

    /**
     * 我的广告牌列表
     */
    public function list(Request $request,$view)
    {
        switch ($view){
            case "alllist":
                if (!Cookie::get('UserId')) {
                    echo $str =  "<script>alert('账号异常，请重新登陆');window.location.href='/Login';</script>";
                }
				//所有的广告牌的列表
                $list = DB::table('user_auc_bill')
                    ->where(['users_id'=>Cookie::get('UserId')])
                    ->where('banners_id','>',0)
					->where('status', '!=' , 4)
                    ->get();
				foreach ($list as $key=>$value){
                    $list[$key]->billboards_position =  DB::table("billboards")->where('billboards_position',$value->banners_id)->value('billboards_title');
				    
					//获取价格
					$money = DB::table('user_auc_bill')->where(['banners_id'=>$value->banners_id])->where(['status'=>2])->max('money');
					if($money){
						$list[$key]->money_max = $money;
					}else{
						$list[$key]->money_max = '暂时没人竞拍';
					}

                }
				
				
				//所有的轮播广告牌的列表
                $list1 = DB::table('user_auc_bill')
                    ->where(['users_id'=>Cookie::get('UserId')])
                    ->where('billboards_position','>',0)
					->where('status', '!=' , 4)
                    ->get();
				
                foreach ($list1 as $key=>$value){

					//获取价格
					$money = DB::table('user_auc_bill')->where(['billboards_position'=>$value->billboards_position])->where(['status'=>2])->max('money');
					$list1[$key]->money_max  = $money;
					if($money){
						$list1[$key]->money_max  = $money;
					}else{
						$list1[$key]->money_max  = '暂时没人竞拍';
					}
                    $list1[$key]->billboards_position =  DB::table("billboards")->where('billboards_position',$value->billboards_position)->value('billboards_title');

                }
		        $list2 = DB::table('user_auc_bill')->where('status','!=','4')
                        ->where('billboards_position','=',0)
                        ->where('banners_id','=',0)
						->where(['users_id'=>Cookie::get('UserId')])
                        ->orderBy('software_order', 'asc')
                        ->orderBy('status', 'asc')
                        ->get();

                foreach ($list2 as $key=>$value){

                    //获取价格
                    $money = DB::table('user_auc_bill')->where(['title'=>$value->title])->where(['status'=>2])->max('money');
                    $list2[$key]->money_max  = $money;
                    if($money){
                        $list2[$key]->money_max  = $money;
                    }else{
                        $list2[$key]->money_max  = '暂时没人竞拍';
                    }
                }
		        //var_dump($list2);	

                return view("/Home/Billboard/$view",['data'=>$list,'data1'=>$list1,'data2'=>$list2]);
                break;
            case "stAdvertising":
                $balance = AccountsController::info();//获取用户余额信息
                return view('Home.Billboard.stAdvertising',['id'=>$request->get('id'),'balance'=>$balance]);
            case "ranking":
                $this->ranking();
                break;
            default:
                return '没有选择对应的界面';
                break;
        }
    }
	public function stAdvertising()
    {
		$balance = AccountsController::info();//获取用户余额信息
		return view('Home.Billboard.stAdvertising',['id'=>$_GET['id'],'balance'=>$balance]);
	}
	
	
    public function markup(Request $request)
    {
        //判断加价是否是最大价格，如果小于最大价格就返回错误信息
        $info = DB::table('user_auc_bill')->where(['id' => $request->get('id')])->first();
        if(empty($info->banners_id)){
//            软件位
            $res = $this->getsoftmaxMoney(($info->money+$request->get('money')),$info->software_type,$info->software_order);
        }else{
//            广告
            $res = $this->getmaxMoney($info->banners_id,($info->money+$request->get('money')));
        }

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
    protected function getmaxMoney($banners_id,$money)
    {
        $where['status'] = 2;

        $where['banners_id'] = $banners_id;



        $maxMoney = DB::table('user_auc_bill')->where($where)->max('money');
        if($money<$maxMoney){
            return $maxMoney;
        }else{
            dump($money>$maxMoney);
            return 0;
        }
    }

    /**
     * @param int $微信信息
     * @param 软件位竞拍大金额
     * @return bool or maxMoney
     */
    protected function getsoftmaxMoney($money,$software_type,$software_order)
    {
        $where['status'] = 2;

        $where['software_type'] = $software_type;
        $where['software_order'] = $software_order;

        $maxMoney = DB::table('user_auc_bill')->where($where)->max('money');
        if($money<$maxMoney){
            return $maxMoney;
        }else{
            dump($money>$maxMoney);
            return 0;
        }
    }


    /**
     * @param $position 位置
     * @param $status 状态
     */
    public function ranking($position,$status)
    {
        $where['users_id'] = Cookie::get('UserId');
        $list = DB::table('user_auc_bill')
            ->where(['billboards_position'=>$position])//位置
            ->where(['status'=>$status])//状态是正在参与的
            ->orderBy('money', 'desc')
            ->get();
        $myselforder = 0;
        $i = 1;
        $newlist = array();
        foreach ($list as $key=>$val){
            $newlist[$i] = $val;
            $newlist[$i]->orderby = $key+1;
            if($val->users_id==$where['users_id']){
                $myselforder = $key+1;
            }
            $i++;
        }
        if($myselforder<6){
            $whestart = 0;
        }else{
            $whestart = $myselforder -5;
        }
        $data['data'] = array_slice($newlist,$whestart,10,true);
        $data['myselforder'] = $myselforder;
        $data = \GuzzleHttp\json_encode($data);
        return  $data;
    }

    /**
     * 判断当前用户竞拍的广告位之前是否竞拍过？
     */
    protected function __issetBil($data)
    {
        $where['users_id'] = $data['users_id'];

        if (isset($data['billboards_position']) && $data['billboards_position']) {
            $where['billboards_position'] =$data['billboards_position'];
            return DB::table('user_auc_bill')
            ->where($where)
            ->Where('status',2)
            ->get();
        }
        // $where['status'] =1;
        // var_dump($where);exit;
        return true;
    }

    /**
     * 广告列表(轮播图)
     * @return mixed
     */
    static public function BillBoardList()
    {
        $banList =  DB::select("select * from billboards where billboards_position > 0 and billboards_status = 1 order by billboards_position asc");
        return $banList;
    }


}
