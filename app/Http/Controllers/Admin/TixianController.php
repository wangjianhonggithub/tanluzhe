<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\AboutPost;
use App\Model\Nav;
use Illuminate\Support\Facades\DB;

class TixianController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
		//留言信息
		$information = DB::table('information')->get();
    	// $data = Nav::GetNavAll();
    	$data = DB::table('tixian')->paginate(10);

    	if ($data) {
    		foreach ($data as $key => $value) {
    			$data[$key]->userName = DB::table('users')->where('id',$value->uid)->value('username');// $value->money;
    			switch ($value->type) {
    				case 1:
    					$data[$key]->tixianType = '支付宝';
    					break;
    				case 2:
    					$data[$key]->tixianType = '微信';
    					break;
    				case 3:
    					$data[$key]->tixianType = '银行卡';
    					break;
    				case 4:
    					$data[$key]->tixianType = '其他';
    					break;
    			}
    			switch ($value->handle) {
    				case 1:
    					$value->handleStatus = '待处理';
    					break;
    				case 2:
    					$value->handleStatus = '已处理';
    					break;
    			}
    			$data[$key]->createTime = date('Y-m-d H:i:s',$value->createTime);

    		}
    	}
        return view('/Admin/Tixian/list',[
            'data'=>$data,
			'information'=>$information,
        ]);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function DoHandle()
    {
        $where           = [];
        $where['status'] = 1;
        $data            = [];

        if (isset($_GET['id']) && $_GET['id']) {
            $id          = $_GET['id'];
            $where['id'] = $id;
        } else {
            echo "<script>alert('操作失败，缺少参数');window.location.href='/Tixian/list';</script>";
        }

        if (isset($_GET['status']) && $_GET['status']) {
            $status         = $_GET['status'];
            $data['status'] = $status;
        } else {
            echo "<script>alert('操作失败，缺少参数');window.location.href='/Tixian/list';</script>";
        }

        if (isset($_GET['errorinfo']) && $_GET['errorinfo']) {
            $errorinfo         = $_GET['errorinfo'];
            $data['errorinfo'] = $errorinfo;
        } else {
            if($data['status'] == 3)
            echo "<script>alert('操作失败，缺少参数');window.location.href='/Tixian/list';</script>";
        }

        $uid = DB::table('tixian')->where($where)->value('uid');
        $money = DB::table('tixian')->where($where)->value('money');
        if (!$uid) {
            echo "<script>alert('操作失败，信息不存在');window.location.href='/Tixian/list';</script>";
        }
        //  修改表状态 扣除余额表中数据
        
        $data['handle'] = 2;

        $resource = DB::table('tixian')->where($where)->update($data);

        if ($resource) {
			/*** 插入信息提示表*/
			$news['uid'] =$uid;  
			$news['msg'] = $_GET['errorinfo'];
			$news['create_time'] = time();  
			DB::table('news')->insert($news);
			
            $money = $money;

            $moneyInfo = DB::table('accounts')->where(['uid'=>$uid])->value('balance');

            $newsMoney = $moneyInfo - $money;

            $res       = DB::table('accounts')->where(['uid'=>$uid])->update(['balance'=>$newsMoney]);

            echo "<script>alert('操作成功');window.location.href='/Tixian/list';</script>";
   
        }

        

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        echo  'create';
        //
    }

    /**
     * Store a newly created resource in storage.
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        echo 'store';
        //
    }

    /**
     * Display the specified resource.
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id,Request $request)
    {
        
        switch ($id){
            case 'getresultAuc':
                $this->msg_queue_exists(key)($request->get('id'));
                break;
            default:
                return '没有选择对应的界面';
                break;
        }
        //
    }

    /**
     * Show the form for editing the specified resource.
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        echo 'edit';
        //
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
        echo 'update';
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
        echo 'destroy';
        //
    }

}
