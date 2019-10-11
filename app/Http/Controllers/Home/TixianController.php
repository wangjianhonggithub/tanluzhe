<?php

namespace App\Http\Controllers\Home;

use Illuminate\Http\Request;

use Validator;




use App\Http\Controllers\Controller;
use App\Model\Caty;
use App\Model\Help;
use App\Model\Banner;
use App\Model\AdvImage;
use DB;
use App\Service\Sorting;

use Cookie;
class TixianController extends Controller
{



    public function zhanghu()
    {
		
		$uid = Cookie::get('UserId');
		
		if(empty($uid)){
			return redirect('/Login')->withErrors(['请先登录']);
			//return back()->withErrors(['请输入金额']);
		}
		//$uid = '21';
		$accounts = db::table('accounts')->where('uid',$uid)->first();
		
		if(empty($accounts)){
			$accounts = array('balance'=>0);
			//$accounts = json_encode($accounts);
		}else{
			$accounts = array('balance'=>$accounts->balance);
		}
		
		//充值记录
		$transactions = db::table('transactions')->where('uid',$uid)->orderBy('addtime','desc')->paginate(15);
		//提现记录
		$tixian_arr = db::table('tixian')->where('uid',$uid)->orderBy('createTime','desc')->paginate(15);;
		
        // $data = Help::GetHomeHelpAll();
		$url = '/Home/Tixian/zhanghu';

        return view($url,[
            'tixian_arr'=>$tixian_arr,
			'accounts'=>$accounts,
			'transactions'=>$transactions,
        ])->with('info','');
    }

    // 充值记录
    public function logs($uid)
    {

    }

    public function tixian(Request $request)
    {
		/*$rules = [
			'bankName' => 'required',
			'cardNo'=>'required',
		]; 
		$messages = [
			'bankName.required' => '所属银行是必填的',
			'cardNo.required' => '银行卡号是必填的',
		];
		$validator = Validator::make($request->all(), $rules, $messages); 
		if ($validator->fails()) { 
			$mse = json_decode($validator->errors(),true);
			var_dump($mse);die();阿斯顿
		}*/
		
		
		
		//用户id
		$UserId = Cookie::get('UserId');
		$arr = db::table('accounts')->where('uid',$UserId)->first();
		
		try {
			if($arr){
				if($request->input('money') > $arr->balance){
					throw new \Exception('提现金额超出剩余金额');
				}
			}else{
				throw new \Exception('没有提现金额');
			}
			
			
			if($request->input('money')==null){
				throw new \Exception("提现金额是必填的");	# code...
			}
			if(!preg_match("/^[1-9]\d*$/",$request->input('money'))){
				throw new \Exception('提现金额不合法');
			}
			
			if($request->input('bankName')==null){
				throw new \Exception("所属银行是必填的");	# code...
			}
			if($request->input('cardNo')==null){
				throw new \Exception("卡号是必填的");	# code...
			}
			
			
			//$request->all(); // 
			$data['money'] = $request->input('money'); 
			$data['uid']= $UserId;
			$data['createTime']= time();
			$data['status']= 1;
			$data['handle']= 1;
			$data['bankName']= $request->input('bankName');
			$data['remark']= $request->input('remark');
			$data['cardNo']= $request->input('cardNo');
			$re = db::table('tixian')->insert($data);
			//$re = false;
			if($re){
				return json_encode(['meg'=>'申请成功']);
			}else{
				throw new \Exception('数据未找到');
			}
			
		} catch (\Exception $e) {
			return json_encode(['meg'=>$e->getMessage()]);
		}
		
    }

    // 提现记录
    public function tixianLogs()
    {
		
    }

}
