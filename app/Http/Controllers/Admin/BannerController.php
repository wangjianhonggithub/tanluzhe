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
        if (!empty($request->banner_img)) {
           $delete_img = unlink('.'.$del['banner_img']);
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
}
