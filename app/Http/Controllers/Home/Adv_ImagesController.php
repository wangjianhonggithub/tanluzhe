<?php

namespace App\Http\Controllers\Home;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Cookie;
use App\Service\Common;

class Adv_ImagesController extends Controller
{
    public function test()
    {
        $list = CommonController::getAdvList();
        return view('Home.Banner.advList',['list'=>$list]);
    }

    /**
     * 用户列表
     * @return mixed
     */
    public function advList()
    {
        $list = CommonController::getAdvList();
        return view('Home.Banner.advList',['list'=>$list]);
    }

    /**
     * 跳转广告添加页面
     * @param $id
     * @return mixed
     */
    public function add($id)
    {
        return view('Home.Banner.addAdv',['id'=>$id]);
    }

    /**
     * 创建广告
     * @param Request $request
     */
    public function create(Request $request)
    {
        $uploadname = 'banner_img';
        $dir = 'uploads/imgpath';
        $img = Common::DirUpload($uploadname,$request,$dir);
        $url = $request->post('url');
        if($url!=null){
            DB::table('adv_images')->where('id','1')->update([$request->post('id')=>$img]);
        }
        DB::table('adv_images')->where('id','2')->update([$request->post('id')=>$url]);
        return redirect('/adv/advList');
    }
}
