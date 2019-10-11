<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Model\Banner;
use App\Service\Common;
use App\Http\Requests\BannerPost;
use App\Model\Nav;
use Illuminate\Support\Facades\DB;
class BannerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = DB::table('banners')
                ->join('navs', 'navs.id', '=', 'banners.c_id')
                ->select('banners.*', 'navs.nav_name')
                ->orderBy('banners.id','desc')
                ->paginate(10);
//        foreach ($data as $k=>$v)
//        {
//            $data[$k]->time_diff = 2;
//            if($v->day != 0) {
//                $time = 24*60*60*$v->day;
//                $num = ($v->banner_etime-$v->banner_stime)/$time;
//
//
//                for ($i = 1;$i<=$num;$i++){
//                    $data[$k]->zhouqi[$i] = $v->banner_stime+$i*$v->day*24*60*60;
//                }
//                if(isset($data[$k]->zhouqi)) {
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
//                                    $data[$k]->time_diff = 1;//小于等于3小时周期结束
//                                    break;
//                                }else{
//                                    $data[$k]->time_diff = 2;
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
            if($v->banner_etime > $now){
                $timediff = $v->banner_etime-$now;
                $remain = $timediff%86400;
                $days = intval($timediff/86400);
                $hours = intval($remain/3600);
                //计算分钟数
                $remain = $remain%3600;
                $mins = intval($remain/60);

                $data[$k]->time_diff = $hours;
                $data[$k]->day_diff = $days;
                $data[$k]->mins_diff = $mins;
            }else{
                $data[$k]->time_diff = '-2';
                $data[$k]->day_diff = '-2';
                $data[$k]->mins_diff = '-2';
            }
        }


        return view('/Admin/List/BannerList',[
            "data"=>$data,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
       $data = Nav::GetNavAll();
       return view('/Admin/Add/BannerAdd',[
            'Pro'=>$data,
       ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(BannerPost $request)
    {
        $Banner = New Banner;
        $uploadname = 'banner_img';
        $dir = 'uploads/imgpath';
        $Banner->c_id = isset($request->c_id) ? $request->c_id :1;
        $Banner->url = isset($request->url) ? $request->url :'';
        $Banner->description = $request->description;
        $Banner->title = $request->title;
		$Banner->banner_stime = strtotime($request->startTime.' '.$request->startDay);
		$Banner->banner_etime = strtotime($request->endTime.' '.$request->endDay);
        $Banner->banner_img = Common::DirUpload($uploadname,$request,$dir);
        if ($Banner->save()) {
           return redirect('/Admin/Banner')->with('info','创建成功');
        }else{
           return back()->with('info','创建失败');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
       $banner = Banner::GetBannerOne($id);
       $data = Nav::GetNavAll();
       return view('/Admin/Update/BannerUpdate',[
            'Banner'=>$banner,
            'Pro'=>$data,
       ]);
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
		
        $Banner = New Banner;
        $uploadname = 'banner_img';
        $dir = 'uploads/imgpath';
        $del = Banner::GetBannerOne($id);
        $data['c_id'] = isset($request->c_id) ? $request->c_id :1;
        $data['url'] = isset($request->url) ? $request->url :'';
        $data['description'] = $request->description;
        $data['title'] = $request->title;
		$data['banner_stime'] = strtotime($request->startTime.' '.$request->startDay);
		$data['banner_etime'] = strtotime($request->endTime.' '.$request->endDay);
        if (!empty($request->banner_img)) {
           // $delete_img = unlink('.'.$del['banner_img']);
           $data['banner_img'] = Common::DirUpload($uploadname,$request,$dir);
        }
        $update = Banner::UpdateBanner($id,$data);
        if ($update) {
            return redirect('/Admin/Banner')->with('info','更新成功');
        }else{
            return back()->with('info','更新失败');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
       $del = Banner::GetBannerOne($id);
       if (file_exists('.'.$del['banner_img'])) 
       {
         $delete_img = unlink('.'.$del['banner_img']);
       }
       $res = Banner::DataDelete($id);
       if ($res) {
           return back()->with('info','删除成功');
       }else{
           return back()->with('info','删除失败');
       }
    }

    public function bannerdelete()
    {
        $id = $_GET['id'];
        $del = Banner::GetBannerOne($id);
//        if (file_exists('.'.$del['banner_img']))
//        {
//            $delete_img = unlink('.'.$del['banner_img']);
//        }
        $res = Banner::DataDelete($id);
        if ($res) {
            echo json_encode(['code'=>1,'msg'=>'删除成功']);
        }else{
            echo json_encode(['code'=>0,'msg'=>'删除失败']);
        }
    }
}
