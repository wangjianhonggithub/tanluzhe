<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;

class CarouselController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        echo 'index';
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
                $this->getresultAuc($request->get('id'));
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



    /**
     * @param $billboards_position
     * @return string
     */
    public function getresultAuc($banners_id)
    {
        $list = DB::table('user_auc_bill')
            ->where(['banners_id'=>$banners_id])//位置 22
            ->where(['status'=>2]) //状态是正在参与的 并且审核通过的。
            ->orderBy('money', 'desc')
            ->first();
			
        if($list==null){
            echo "<script>alert('目前这个广告位没有人竞拍呢');window.history.back(-1)</script>";
            return false;
        }
        $data['user_image']       = $list->pic;
        $data['user_url']         = $list->url;
        $data['user_auc_bill_id'] = $list->id;

        $data['status'] = 3;

        DB::beginTransaction();
        try{
            $res = DB::table('banners')
                ->where('id', $list->banners_id)
                ->update($data);

            $description = DB::table('banners')
                ->where('id', $list->banners_id)
                ->value('description');

            $userInfo = [];

            $userInfo['uid']         = $list->users_id;

            $userInfo['status']      = 1;

            $userInfo['banner_img']  = $list->pic;

            $userInfo['url']         = $list->url;

            $userInfo['c_id']        = $list->banners_id;

            $userInfo['title']       = $list->title;

            $userInfo['description'] = $description;

            $userInfo['created_at']  = time();



            DB::table('banners_users')->insert($userInfo);


                DB::table('user_auc_bill')->where('id', $list->id)->where('status', 2)->update(['status'=>3]);

                // 查询竞拍人信息 竞拍失败退款至原账户，增加记录 竞拍失败包括：审核成功的和审核未成功的。

                $list = DB::table('user_auc_bill')->where('banners_id', $banners_id)->where('status',2)->get();
                // var_dump($list);die;
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
                echo "<script>alert('广告成功替换成用户的广告，开始展示用户的广告');window.location.href='/Admin/Banner';</script>";

        }catch ( \Exception $e )
        {
            DB::rollBack();
            return '广告没有成功替换成用户的广告';
        }
    }
	/**
     * 结束用户展示
     */
    public function overview()
    {
		$banners_id = $_GET['id'];

		$data['status'] = 0;
		$re = DB::table('banners')->where(['id'=>$banners_id])->update($data);
		
		
		
		if($re){
		    DB::table('banners_users')->where(['c_id'=>$banners_id])->update(['status'=>2]);
			
			
			DB::table('user_auc_bill')->where(['banners_id'=>$banners_id])->update(['status'=>4]);
            echo "<script>alert('结束用户展示成功，开始重新竞拍');window.location.href='/Admin/Banner';</script>";
        }else{
            echo "<script>alert('意外错误，请刷新浏览器');window.history.back(-1);</script>";
        }
    }
}
