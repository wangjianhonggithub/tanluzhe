<?php

namespace App\Http\Controllers\Home;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Cookie;

//我的软件
class SoftwareController extends Controller
{

    /**
     * 选择可以竞拍的广告位
     */
    public function getAuction($softwaretype)
    {
        /**$list = DB::table('software')->where(['softwaretype'=>$softwaretype])
            ->where('order', '>', 1)
            ->pluck('order');
		$list = array_flip($list->toArray());**/
		
		$list = [];
        $typeName = '';
		
		$typeName = db::table('caties')->where('id',$softwaretype)->value('caty_name');
        /**switch ($softwaretype) {
            case 1:
                $typeName = 'Windows';
                break;
            case 2:
                $typeName = 'Linux';
                break;
            case 3:
                $typeName = 'IOS';
                break;
            case 4:
                $typeName = 'Android';
                break;
            case 5:
                $typeName = '插件';
                break;
            case 6:
                $typeName = '小程序';
                break;
            
        }**/
		for ($i = 1; $i <= 30; $i++) {
            // echo $i;
            $list[$i]['id'] = $i;
			$list[$i]['type'] = $typeName;
			///结束时间
			$endTime = db::table('softTime')->where('typeId',$i)->where('type',$typeName)->value('endTime');
			if($endTime){
				$list[$i]['endTime'] = date("Y-m-d H:i",$endTime);
			}else{
				$list[$i]['endTime'] = '';
			}
			
			//最多金额
			$money = db::table('user_auc_bill')->where('software_order',$i)
												->where('software_type',$softwaretype)
												->where('status','2')
												->max('money');
			$list[$i]['money'] = $money;
			
			//判断竞拍时间
			$startTime = db::table('softTime')->where('typeId',$i)->where('type',$typeName)->value('startTime');
			$endTime = db::table('softTime')->where('typeId',$i)->where('type',$typeName)->value('endTime');
			if(time() >= $startTime && time() <= $endTime){
				$list[$i]['shijian'] = 1;

			}else{
				$list[$i]['shijian'] = 0;

			}
        }
		//if(Cookie::get('UserId') == 41){
			//var_dump($list);
		//}
		
		//var_dump($list);die();
        $wheres['softwaretype'] = $softwaretype;
        $wheres['uid'] = Cookie::get('UserId');
        $lists = DB::table('software')->where($wheres)->get()->toArray();
		
        //var_dump($lists);die();
        $softwaretypelist = DB::table('caties')->get();
        // var_dump($softwaretypelist);die;
        
		//var_dump($list);
        return view('/Home/Billboard/auction',['list'=>$list,'softwaretype'=>$softwaretype,'softwaretypelist'=>$softwaretypelist,'lists'=>$lists]);
    }



    /**
     * 执行竞拍以及录入信息
     */
    public function postAuction(Request $request)
    {
       $caty_name = DB::table('caties')->where('id',$request->post('software_type'))->first()->caty_name;
       $res = $this->issetSoftWarea($request->post('software_id'));



       if($res==null){
           echo "<script>alert('您还没有发布竞拍资源');window.history.back(-1);</script>";
       }else{

           $order = DB::table('software')->where('id',$request->post('software_id'))->value('order');
           if($order){
               echo "<script>alert('此软件已有资源位置,请重新选择');window.history.back(-1);</script>";
           }

		   if(empty($request->post('select'))){
			   echo "<script>alert('您还没有选择资源位');window.history.back(-1);</script>";
		   }
		   $softTime = db::table('softTime')->where('typeId',$request->post('select'))->where('type',$caty_name)->first();
		   
		   //判断时间是否是有效
		   
		   if(time() < $softTime->startTime){
			   echo "<script>alert('竞拍还未开始');window.history.back(-1);</script>";
		   }
		   if(time() > $softTime->endTime){
			   echo "<script>alert('竞拍已经结束');window.history.back(-1);</script>";
		   }
           if($request->post('money')<=0){

               echo "<script>alert('竞拍金额不得小于等于0');window.history.back(-1);</script>";
               return false;
           }
		    //判断竞拍金额 必须大于当前审核通过金额
			$money = db::table('user_auc_bill')->where('software_order',$request->post('select'))
												->where('software_type',$request->post('software_type'))
												->where('status','2')
												->max('money');

			if($request->post('money')<=$money){
				
				 echo "<script>alert('您的竞拍金额小于当前金额');window.history.back(-1);</script>";
				 return false;
			}
			
           $data = array(
               "title" => "{$caty_name}软件类型第{$request->post('select')}个广告位",
               "software_type" => $request->post('software_type'),
               "software_order" => $request->post('select'),
               "money" => $request->post('money'),
               "software_id" => $request->post('software_id'),
               "errorinfo" => '软件位竞价，不需要审核',
               "addtime" => date('Y-m-d H:i:s'),
               "status" => 2,
           );
           $data['users_id'] = Cookie::get('UserId');

           if(isset($this->__issetBil($data)[0])){
               echo "<script>alert('你已经竞拍过了，请选择你没有竞拍的广告位进行竞拍');window.history.back(-1);</script>";
           }else{

			    $res = CommonController::consumption_new($data['money']);
			    if($res){
					//判断情况
					if($res['status']==1){
						$re = DB::table('user_auc_bill')->insert($data);
						if($re){
							DB::table('accounts')->where('uid',Cookie::get('UserId'))->decrement('balance',$data['money']);
							echo "<script>alert('竞拍成功，等待后台审核');window.location.href='/';</script>";
						}else{
							echo "<script>alert('竞拍失败');window.location.href='/';</script>";
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

    }

    /**
     * 判断当前用户竞拍的广告位之前是否竞拍过？
     */
    protected function __issetBil($data)
    {
        $where['users_id'] = $data['users_id'];//41
        $where['software_order'] =$data['software_order'];//1
        $where['software_type'] =$data['software_type'];//1
        $where['status'] =2;
        return DB::table('user_auc_bill')
            ->where($where)
            ->get();
    }

    /**
     * 判断用户填写的广告的id是否存在
     */
    public function issetSoftWarea($id)
    {
        $where['id'] = $id;
        $where['uid'] = Cookie::get('UserId');
        $list = DB::table('software')->where('id',$id)->first();
        return $list;
    }

    public function test()
    {

    }

    /**
     * 我的软件位的列表
     */
    public function Softwarelist()
    {
        $list = DB::table('software')->where('uid',Cookie::get('UserId'))->get();
    }


    /**
     * 执行竞价跳转
     */
    public function bidPrice()
    {

    }

    /**
     * @param $softwaretype 软件类型id
     * @param $order 排序
     */
    public function doBidPrice($softwaretype,$order)
    {

    }

    /**
     * 所有竞拍的广告列表
     * 只包含没有被竞价的
     * @return array
     */
    public function allList()
    {
        $list = DB::table('caties')->get();
        $ins = array();
        foreach ($list as $k=>$v){
            $ins[$v->id] = DB::table('software')
                ->where('softwaretype',$v->id)
                ->where('order','>=',0)
                ->get();
        }
        $inss = array();
        $in = $this->allSoft();
        foreach ($ins as $key=>$val){
            echo $key;
            foreach ($val as $k=>$v){
                $ss[$key][] =  $v->order;
            }
        }
        $newdata = array();
        foreach ($in as $k=>$v){
            if(isset($ss[$k])){
                $newdata[$k] = array_diff($v,$ss[$k]);
            }else{
                $newdata[$k] = $v;
            }
        }
        return $newdata;
    }

    /**
     * 所有的软件位,包含已经被竞价完的
     */
    public function allSoft()
    {
        $list = DB::table('caties')->get();
        $ss = $this->initData();
        foreach ($list as $k=>$v){
            $data[$v->id] = $ss;
        }

        return $data;
    }

    /**
     * 数据初始化，用来更新进行排位数据的初始
     * @return array
     */
    public function initData()
    {
        $ord = array();
        for($i=1;$i<=30;$i++){
            $num = $i%6;
            switch ($num){
                case 1:
                    $ord[$i] = $i+4;
                    break;
                case 2;
                    $ord[$i] = $i+1;
                    break;
                case 3;
                    $ord[$i] = $i-2;
                    break;
                case 4:
                    $ord[$i] = $i-2;
                    break;
                case 5:
                    $ord[$i] = $i-1;
                    break;
                case 0:
                    $ord[$i] = $i;
                    echo '<br/>';
            }
        }

        return $ord;
    }

    public function softCheck(Request $request)
    {
        $id = $request->get('id');
        if (empty($id)) {
            echo json_encode(["code"=>1,"msg"=>"数据错误"]);
        }

        $order = DB::table('software')->where('id',$id)->value('order');
        if($order){
            echo json_encode(["code"=>1,"msg"=>"此软件已有资源位置,请重新选择"]);
        }else{
            echo json_encode(["code"=>0,"msg"=>"正常使用"]);
        }

    }


}


