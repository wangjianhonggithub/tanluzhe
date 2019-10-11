<?php

namespace App\Http\Controllers\Admin;

use App\Model\Billboards;
use App\Service\Common;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use phpDocumentor\Reflection\Types\Null_;
use Psr\Log\NullLogger;

class BillboardController extends Controller
{
    /**
     * Display a listing of the resource.
     * 查看所有的静态广告位的列表
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data['list']  = DB::table('billboards')->where('billboards_position','>',0)->get();
        $data['list1'] = DB::table('billboards')->where('billboards_position','=',0)->get();

//        foreach ($data['list'] as $k=>$v)
//        {
//            $data['list'][$k]->time_diff = 2;
//            if($v->day != 0) {
//                $time = 24*60*60*$v->day;
//                $num = ($v->billboards_etime-$v->billboards_stime)/$time;
//
//
//                for ($i = 1;$i<=$num;$i++){
//                    $data['list'][$k]->zhouqi[$i] = $v->billboards_stime+$i*$v->day*24*60*60;
//                }
//                if(isset($data['list'][$k]->zhouqi)){
//                    foreach ($v->zhouqi as $key=>$val)
//                    {
//                        $now = time();
//                        if($val>$now){
//                            $timediff = $val-$now;
//                            $days = intval($timediff/86400);
//                            if($days<=0){
//                                //计算小时数
//                                $remain = $timediff%86400;
//                                $hours = intval($remain/3600);
//
//                                if ($hours<=3) {
//                                    $data['list'][$k]->time_diff = 1;//小于等于3小时周期结束
//                                    break;
//                                }else{
//                                    $data['list'][$k]->time_diff = 2;
//                                }
//                            }
//
//
//                        }
//
//                    }
//                }
//            }
//
//
//
//
//        }

        foreach ($data['list'] as $k=>$v) {
            $now = time();
            if($v->billboards_etime > $now){
                $timediff = $v->billboards_etime-$now;
                $remain = $timediff%86400;
                $days = intval($timediff/86400);
                $hours = intval($remain/3600);
                //计算分钟数
                $remain = $remain%3600;
                $mins = intval($remain/60);
                $data['list'][$k]->time_diff = $hours;
                $data['list'][$k]->day_diff = $days;
                $data['list'][$k]->mins_diff = $mins;
            }else{
                $data['list'][$k]->time_diff = '-2';
                $data['list'][$k]->day_diff = '-2';
                $data['list'][$k]->mins_diff = '-2';
            }
        }


        return view('/Admin/Billboard/index',['data'=>$data,]);
    }


    /**
     * 竞拍列表
     */
    public function AdvertisementList($type=0)
    {
        $data = [];
        $typeName = '';
		$typeName = db::table('caties')->where('id',$type)->first()->caty_name;
        /**switch ($type) {
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

        $image = '/uploads/software_img/152540309222086936.jpg';

        for ($i = 1; $i <= 30; $i++) {
            // echo $i;
            $data[$i]['id']    = $i;
            $data[$i]['title'] = '第'.$i.'号位置';
            $data[$i]['type']  = $typeName;
            $data[$i]['status']  = 0;

            $where = [];
            $where['software_id']   = $i;
            $where['software_type'] = $type;
            $where['status']        = 3;
            $data[$i]['image']      = $image;
            $pic = DB::table('user_auc_bill')->where($where)->value('pic');

            if ($pic) {
                $data[$i]['image']      = $pic;
                $data[$i]['status']     = 1;
            }

        }
		//var_dump($data);die();
		$softTime='';
		foreach($data as $k=>$v){
			$map = array();
			$map['typeId'] = $v['id'];
			$map['type'] = $v['type'];
			$startTime = db::table('softTime')->where($map)->value('startTime');
			if($startTime){
				$data[$k]['startTime'] = $startTime;
			}else{
				$data[$k]['startTime'] = 0;
			}
			$endTime = db::table('softTime')->where($map)->value('endTime');
			if($endTime){
				$data[$k]['endTime'] = $endTime;
			}else{
				$data[$k]['endTime'] = 0;
			}
			$day = db::table('softTime')->where($map)->value('day');
			if($day){
				$data[$k]['day'] = $day;
			}else{
				$data[$k]['day'] = 0;
			}
		}

//        foreach ($data as $k=>$v)
//        {
//            $data[$k]['time_diff'] = 2;
//            if($v['day'] != 0) {
//                $time = 24*60*60*$v['day'];
//                $num = ($v['endTime']-$v['startTime'])/$time;
//
//
//                for ($i = 1;$i<=$num;$i++){
//                    $data[$k]['zhouqi'][$i] = $v['startTime']+$i*$v['day']*24*60*60;
//                }
//                if(isset($data[$k]['zhouqi'])) {
//                    foreach ($data[$k]['zhouqi'] as $key=>$val)
//                    {
//                        $now = time();
//                        if($val>$now){
//                            $timediff = $val-$now;
//                            $days = intval($timediff/86400);
//                            if($days<=0){
//                                //计算小时数
//                                $remain = $timediff%86400;
//                                $hours = intval($remain/3600);
//
//                                if ($hours<=3) {
//                                    $data[$k]['time_diff'] = 1;//小于等于3小时周期结束
//                                    break;
//                                }else{
//                                    $data[$k]['time_diff'] = 2;
//                                }
//                            }
//
//
//                        }
//
//                    }
//                }
//            }
//
//
//
//
//        }

        foreach ($data as $k=>$v) {
            $now = time();
            if($v['endTime'] > $now){
                $timediff = $v['endTime']-$now;
                $remain = $timediff%86400;
                $days = intval($timediff/86400);
                $hours = intval($remain/3600);
                //计算分钟数
                $remain = $remain%3600;
                $mins = intval($remain/60);
                $data[$k]['time_diff'] = $hours;
                $data[$k]['day_diff'] = $days;
                $data[$k]['mins_diff'] = $mins;
            }else{
                $data[$k]['time_diff'] = '-2';
                $data[$k]['day_diff'] = '-2';
                $data[$k]['mins_diff'] = '-2';
            }
        }

        // var_dump(json_encode($data));die;
        return view('/Admin/Billboard/list',[
            "data"=>$data,'type'=>$type
        ]);
    }

    /**
     * 结束竞拍
     */
        /**
     * @param $billboards_position
     * @return string
     */
    public function getresultAdvertisement()
    {
        // 位置
        if (isset($_GET['id']) && $_GET['id']) {
            $order = $_GET['id'];
        } else {
            $order = 0;
        }

        // 类型
        if (isset($_GET['type']) && $_GET['type']) {
            $type = $_GET['type'];
        } else {
            $type = 0;
        }

        $where = [];
        $where['software_order']   = $order;
        // $where['order']         = $id;
        $where['software_type'] = $type;


        $list = DB::table('user_auc_bill')
            ->where($where)//位置 22
            ->where(['status'=>2]) //状态是正在参与的 并且审核通过的。
            ->orderBy('money', 'desc')
            ->first();
		
        if($list==null){
            echo "<script>alert('目前这个广告位没有人竞拍呢');window.history.back(-1)</script>";
            return false;
        }
        // $data['user_image']       = $list->pic;
        // $data['user_url']         = $list->url;
        // $data['user_auc_bill_id'] = $list->id;
        // $data['banner_stime']     = date('Y-m-d H:i:s');
        // $data['status'] = 3;
        $res = DB::table('software')
            ->where('id', $list->software_id)
            ->get();
        // $description = DB::table('banners')
        //     ->where('id', $list->banners_id)
        //     ->value('description');
        
        // $userInfo = [];

        // $userInfo['uid']         = $list->users_id;

        // $userInfo['status']      = 1;

        // $userInfo['banner_img']  = $list->pic;

        // $userInfo['url']         = $list->url;

        // $userInfo['c_id']        = $list->banners_id;

        // $userInfo['title']       = $list->title;

        // $userInfo['description'] = $description;

        // $userInfo['created_at']  = time();

        // var_dump($userInfo);die;

        // DB::table('banners_users')->insert($userInfo);
        DB::beginTransaction();
        try{
            if($res){


                DB::table('user_auc_bill')->where('id', $list->id)->where('status', 2)->update(['status'=>3]);

                //修改原先竞拍成功状态
                $map = [];
                $map['order'] = $order;
                $map['softwaretype'] = $type;
                $software_old = DB::table('software')->where($map)->get();

                if ($software_old) {
                    DB::table('software')->where($map)->update(['order'=>NULL]);
                }


                // 修改软件表位置 等信息
                DB::table('software')->where('id', $list->software_id)->update(['order'=>$list->software_order]);

                // 查询竞拍人信息 竞拍失败退款至原账户，增加记录 竞拍失败包括：审核成功的和审核未成功的。
                $list = DB::table('user_auc_bill')->where('software_type', $type)->where('software_order', $order)->where('status',2)->get();

                if($list) {
                    foreach ($list as $value) {

                            //改变状态
                            $res = DB::table('user_auc_bill')->where('id', $value->id)->update(['status'=>4]);

                            //退款操作
                            $money = $value->money;

                            $userMoney = DB::table('accounts')->where('uid', $value->users_id)->value('balance');

                            // var_dump($userMoney);die;
                            $newsMoney = $money + $userMoney;

                            // var_dump($newsMoney);die;
                            DB::table('accounts')->where('uid', $value->users_id)->update(['balance'=>$newsMoney]);

                            //生成 记录 存入表
                            $moneyFields = [];

                            $moneyFields['title']      = '退款记录';
                            $moneyFields['createTime'] = date('Y-m-d H:i:s',time());
                            $moneyFields['uid']        = $value->users_id;
                            $moneyFields['bannersId']  = $value->id;
                            $moneyFields['money']      = $money;

                            DB::table('money_logs')->insert($moneyFields);
                    }
                }
                DB::commit();
                // DB::table('user_auc_bill')->where('banners_id', $banners_id)->where('status',2)->update(['status'=>4]);
                //echo "<script>alert('广告成功替换成用户的广告，开始展示用户的广告');window.location.href='/Admin/Banner';</script>";
                echo "<script>alert('广告成功替换成用户的广告，开始展示用户的广告1');window.location.href='/AdvertisementList/".$type."';</script>";
            }else{
                return '广告没有成功替换成用户的广告';
            }
        }catch ( \Exception $e )
        {
            DB::rollBack();
            return '广告没有成功替换成用户的广告';
        }
    }



    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
       return view('/Admin/Billboard/create');
    }

    /**
     * Store a newly created resource in storage.
     * 广告位添加
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data = $request->post();
		$data['billboards_stime'] = strtotime($_POST["startTime"].' '.$_POST["startDay"]);
		$data['billboards_etime'] = strtotime($_POST["endTime"].' '.$_POST["endDay"]);

		
		unset($data['startTime']);
		unset($data['startDay']);
		unset($data['endTime']);
		unset($data['endDay']);
        $dir = 'uploads/AdvImage';
        $billboards = new Billboards();
        $billboards->where('billboards_position',$_POST['billboards_position'])->update(['billboards_position'=>0]);
        $data['billboards_position_desc'] = Common::DirUpload('billboards_position_desc',$request,$dir);//默认图片
        $data['billboards_default_pic'] = Common::DirUpload('billboards_default_pic',$request,$dir);//默认位置说明
		
		
		//var_dump($data);die();
        $res = DB::table('billboards')->insert($data);
        if($res){
            return redirect('/billboard')->with('status','新的广告位添加成功');
        }else{
            return redirect('error')->with('status','新的广告位添加失败');
        }
    }
	public function xiugai(){
        $data['startTime'] = strtotime($_POST['startTime'].' '.$_POST['startDay']);
        $data['endTime'] = strtotime($_POST['endTime'].' '.$_POST['endDay']);
		if($_POST['num'] == 1){
            $where['typeId'] = $_POST['id'];
            $where['type'] = $_POST['type'];

            $data['typeId'] = $_POST['id'];
            $data['type'] = $_POST['type'];

            $data['addtime'] = time();
            $softTime = db::table('softTime')->where($where)->first();
            if($softTime){
                $res = DB::table('softTime')->where($where)->update($data);
            }else{
                $res = DB::table('softTime')->insert($data);
            }
            if($res){
                return back()->with('info','修改成功');
            }else{
                return back()->with('info','修改失败');
            }
        }else{
            $type = $_POST['type'];
            if($type ==1){
                $typename = 'Windows';
            }elseif ($type == 2){
                $typename = 'Linux';
            }elseif ($type == 3){
                $typename = 'IOS';
            }elseif ($type == 4){
                $typename = 'Android';
            }elseif ($type == 5){
                $typename = '插件';
            }elseif ($type == 6){
                $typename = '小程序';
            }elseif ($type == 7){
                $typename = '游戏';
            }

            $res = DB::table('softTime')->where('type',$typename)->update($data);
            if($res){
                return back()->with('info','修改成功');
            }else{
                return back()->with('info','修改失败');
            }
        }

	}

    /**
     * Display the specified resource.
     * 展示相广告牌审核的信息
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($view, Request $request)
    {
		//审核语言和
		$information = db::table('information')->get();
        switch ($view){
            case "verify":
                $list = DB::table('user_auc_bill')->where(['status'=>1])->orderBy('money','desc')->paginate(10);//审核中
                return view("/Admin/Billboard/$view",['data'=>$list,'information'=>$information]);
                break;
            case "adopt":
                $list= DB::table('user_auc_bill')->where(['status'=>2])->paginate(10);//审核通过
                return view("/Admin/Billboard/$view",['data'=>$list]);
                break;
            case "noadopt":
                $list = DB::table('user_auc_bill')->where(['status'=>0])->paginate(10);//审核未通过
                return view("/Admin/Billboard/$view",['data'=>$list]);
                break;
            case "expire":
                $list = DB::table('user_auc_bill')->where(['status'=>3])->paginate(10);//过期
                return view("/Admin/Billboard/$view",['data'=>$list]);
                break;
            case "overview"://结束用户展示的效果
                $billboards_position = $request->get('id');
                $this->overview($billboards_position);
                break;
            case 'getresultAdvertisement':
                $this->getresultAdvertisement($request->get('id'),$request->get('type'));
                break;
            default:
                return '没有选择对应的界面';
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
        if(!$id){
            return back()->with('info','数据错误');
        }
        $data = DB::table('billboards')->where('billboards_id',$id)->first();

        return view('/Admin/Billboard/update',['data'=>$data,]);

    }

    public function updatebillboards(Request $request)
    {
        $data = $request->post();
        $data['billboards_stime'] = strtotime($_POST["startTime"].' '.$_POST["startDay"]);
        $data['billboards_etime'] = strtotime($_POST["endTime"].' '.$_POST["endDay"]);

        unset($data['startTime']);
        unset($data['startDay']);
        unset($data['endTime']);
        unset($data['endDay']);
        $dir = 'uploads/AdvImage';
        $billboards = new Billboards();
        $billboards->where('billboards_position',$_POST['billboards_position'])->update(['billboards_position'=>0]);
//        $data['billboards_position_desc'] = Common::DirUpload('billboards_position_desc',$request,$dir);//默认图片
//        $data['billboards_default_pic'] = Common::DirUpload('billboards_default_pic',$request,$dir);//默认位置说明

        if (!empty($request->billboards_default_pic)) {
            $data['billboards_default_pic'] = Common::DirUpload('billboards_default_pic',$request,$dir);
        }
        if (!empty($request->billboards_position_desc)) {
            $data['billboards_position_desc'] = Common::DirUpload('billboards_position_desc',$request,$dir);
        }


        $res = DB::table('billboards')->where('billboards_id',$_POST["billboards_id"])->update($data);
        if($res){
            return redirect('/billboard')->with('status','修改成功');
        }else{
            return redirect('error')->with('status','修改失败');
        }
    }

    public function delete()
    {
        $id = $_GET['billboards_id'];
        $del = DB::table('billboards')->where('billboards_id',$id)->first();
        if($del->billboards_default_pic) {
            if (file_exists('.'.$del->billboards_default_pic))
            {
                $delete_img = unlink('.'.$del->billboards_default_pic);
            }
        }
        if($del->billboards_position_desc) {
            if (file_exists('.'.$del->billboards_position_desc))
            {
                $delete_img = unlink('.'.$del->billboards_position_desc);
            }
        }

        $res = DB::table('billboards')->where('billboards_id',$id)->delete();
        if ($res) {
            echo json_encode(['code'=>1,'msg'=>'删除成功']);
        }else{
            echo json_encode(['code'=>0,'msg'=>'删除失败']);
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
        $billboards = new Billboards();
        $billboards->where('billboards_status',1)->update(['billboards_status'=>0]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Billboards::find($id)->delete();
        return redirect('success')->with('status','删除成功');
    }

    /**
     * 竞拍的广告牌审核
     */
    public function doverify(Request $request)
    {

        $data['errorinfo'] = $request->post('msg');
		//通过2  不通过0
		if($request->post('type') == 1){
			$data['status'] = 2;
		}else{
			$data['status'] = 0;
		}
        //$data['status']    = $request->post('type');
        DB::beginTransaction();
		try{
            DB::table('user_auc_bill')->where('id',$request->post('id'))->update($data);

            $uid = DB::table('user_auc_bill')->where('id',$request->post('id'))->value('users_id');

            // 审核通过扣款
            if($request->post('type') == 1) {


                $money = DB::table('user_auc_bill')->where('id',$request->post('id'))->value('money');

                $userMoney = DB::table('accounts')->where('uid', $uid)->value('balance');

                // var_dump($userMoney);die;
                $newsMoney =  $userMoney - $money;

                // var_dump($newsMoney);die;
                DB::table('accounts')->where('uid', $uid)->update(['balance'=>$newsMoney]);

                //生成 记录 存入表
                $moneyFields = [];

                $moneyFields['title']      = '扣款记录';
                $moneyFields['createTime'] = date('Y-m-d H:i:s',time());
                $moneyFields['uid']        = $uid;
                $moneyFields['bannersId']  = $request->post('id');
                $moneyFields['money']      = $money;

                DB::table('money_logs')->insert($moneyFields);
            }
            /*** 插入信息提示表*/
            $news['uid'] =$uid;
            $news['msg'] = $request->post('msg');
            $news['create_time'] = time();
            $xinnews = DB::table('news')->insert($news);

            DB::commit();

            echo "<script>alert('审核完成');window.location.href='/billboard/verify';</script>";

        }catch ( \Exception $e )
        {
            DB::rollBack();
            echo "<script>alert('意外错误')</script>;";
            echo "<script>alert('意外错误，请刷新浏览器');window.history.back(-1);</script>";
        }



    }

    /**
     * @param int $position //广告的位置id
     * 获取竞拍结果
     */
    public function getresultAuc($billboards_position=0)
    {
		
        $list = DB::table('user_auc_bill')
            ->where(['billboards_position'=>$billboards_position])//位置
            ->where(['status'=>2])//状态是正在参与的
            ->orderBy('money', 'desc')
            ->first();
		
        if ($list) {
            //var_dump($list);exit;
            $data['billboards_pic'] = $list->pic;
            $data['billboards_url'] = $list->url;
            $data['user_auc_bill_id'] = $list->id;
            //$data['billboards_stime'] = date('Y-m-d H:i:s');
            $data['billboards_status'] = 3;
			
            $res = DB::table('billboards')
                ->where('billboards_position', $list->billboards_position)
                ->update($data);
            if($res){
                DB::table('user_auc_bill')->where('id', $list->id)->update(['status'=>3]);
				/////////////////////
				// 查询竞拍人信息 竞拍失败退款至原账户，增加记录 竞拍失败包括：审核成功的和审核未成功的。
				$list_tui = DB::table('user_auc_bill')->where(['billboards_position'=>$billboards_position])->where('status',2)->get();
				if($list_tui) {
					foreach ($list_tui as $value) {

							//改变状态
							$res = DB::table('user_auc_bill')->where('id', $value->id)->update(['status'=>4]);
							
							//退款操作 
							$money = $value->money;

							$userMoney = DB::table('accounts')->where('uid', $value->users_id)->value('balance');
							
							// var_dump($userMoney);die;
							$newsMoney = $money + $userMoney;

							// var_dump($newsMoney);die;
							DB::table('accounts')->where('uid', $value->users_id)->update(['balance'=>$newsMoney]);

							//生成 记录 存入表
							$moneyFields = [];

							$moneyFields['title']      = '退款记录';
							$moneyFields['createTime'] = date('Y-m-d H:i:s',time());
							$moneyFields['uid']        = $value->users_id;
							$moneyFields['bannersId']  = $value->id;
							$moneyFields['money']      = $money;
							
							DB::table('money_logs')->insert($moneyFields);
					}
				}
                //return '广告成功替换成用户的广告';
				echo "<script>alert('广告成功替换成用户的广告');window.location.href='/billboard';</script>";
            }else{
                //return '广告没有成功替换成用户的广告';
				echo "<script>alert('广告没有成功替换成用户的广告');window.history.back(-1);</script>";
            }
        } else {
            //return '暂时无人竞拍！';
			echo "<script>alert('暂时无人竞拍！');window.history.back(-1);</script>";
        }


    }

    /**
     * 结束用户展示
     */
    public function overview($billboards_position=0)
    {
        $data['billboards_pic'] = null;
        $data['billboards_url'] = null;
        $data['user_auc_bill_id'] = null;
        $data['billboards_status'] = 1;

        $res = DB::table('billboards')->where(['billboards_position'=>$billboards_position])->update($data);
        if($res){
			DB::table('user_auc_bill')->where(['billboards_position'=>$billboards_position])->update(['status'=>4]);
            echo "<script>alert('结束用户展示成功，开始重新竞拍');window.location.href='/billboard';</script>";
        }else{
            echo "<script>alert('意外错误，请刷新浏览器');window.history.back(-1);</script>";
        }
    }
//    统一设置时间
    public function bannertime(){

        $type = $_POST['type'];//1轮播图2静态广告
        $start = strtotime($_POST['startTime'].' '.$_POST['startDay']);
        $end = strtotime($_POST['endTime'].' '.$_POST['endDay']);

        if($type == 1) {
            $res = DB::table('banners')->update(['banner_stime'=>$start,'banner_etime'=>$end]);
        }elseif ($type == 2) {
            $res = DB::table('billboards')->update(['billboards_stime'=>$start,'billboards_etime'=>$end]);
        }

        if($res){
            return back()->with('info','修改成功');
        }else{
            return back()->with('info','修改失败');
        }
    }
}
