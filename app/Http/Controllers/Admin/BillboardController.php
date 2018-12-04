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
        $data['list'] = DB::table('billboards')->where('billboards_position','>=',0)->get();
        $data['list1'] = DB::table('billboards')->where('billboards_position','=',0)->get();
        return view('/Admin/Billboard/index',['data'=>$data,]);
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
        $dir = 'uploads/AdvImage';
        $billboards = new Billboards();
        $billboards->where('billboards_position',$data['billboards_position'])->update(['billboards_position'=>0]);
        $data['billboards_position_desc'] = Common::DirUpload('billboards_position_desc',$request,$dir);//默认图片
        $data['billboards_default_pic'] = Common::DirUpload('billboards_default_pic',$request,$dir);//默认位置说明
        dump($data);
        $res = DB::table('billboards')->insert($data);
        if($res){
            return redirect('/billboard')->with('status','新的广告位添加成功');
        }else{
            return redirect('error')->with('status','新的广告位添加失败');
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
        switch ($view){
            case "verify":
                $list = DB::table('user_auc_bill')->where(['status'=>1])->get();//审核中
                return view("/Admin/Billboard/$view",['data'=>$list]);
                break;
            case "adopt":
                $list= DB::table('user_auc_bill')->where(['status'=>2])->get();//审核通过
                return view("/Admin/Billboard/$view",['data'=>$list]);
                break;
            case "noadopt":
                $list = DB::table('user_auc_bill')->where(['status'=>0])->get();//审核未通过
                return view("/Admin/Billboard/$view",['data'=>$list]);
                break;
            case "expire":
                $list = DB::table('user_auc_bill')->where(['status'=>3])->get();//过期
                return view("/Admin/Billboard/$view",['data'=>$list]);
                break;
            case "overview"://结束用户展示的效果
                $billboards_position = $request->get('id');
                $this->overview($billboards_position);
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

        $data['errorinfo'] = $request->post('errorinfo');
        $data['status'] = $request->post('status');
        if(DB::table('user_auc_bill')->where('id',$request->post('id'))->update($data)){
            echo "<script>alert('审核完成');window.location.href='/billboard/verify';</script>";
        }else{
            echo "<script>alert('意外错误')</script>;";
            echo "<script>alert('意外错误，请刷新浏览器');window.history.back(-1);</script>";
            return 0;
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
//            ->where(['status'=>2])//状态是正在参与的
            ->orderBy('money', 'desc')
            ->first();
        $data['billboards_pic'] = $list->pic;
        $data['billboards_url'] = $list->url;
        $data['user_auc_bill_id'] = $list->id;
        $data['billboards_stime'] = date('Y-m-d H:i:s');
        $data['billboards_status'] = 3;
        $res = DB::table('billboards')
            ->where('billboards_position', $list->billboards_position)
            ->update($data);
        if($res){
            DB::table('user_auc_bill')
                ->where('id', $list->id)
                ->where('status', 1)
                ->update(['status'=>3]);
            return '广告成功替换成用户的广告';
        }else{
            return '广告没有成功替换成用户的广告';
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
            echo "<script>alert('结束用户展示成功，开始重新竞拍');window.location.href='/billboard';</script>";
        }else{
            echo "<script>alert('意外错误，请刷新浏览器');window.history.back(-1);</script>";
        }
    }
}
