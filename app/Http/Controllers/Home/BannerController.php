<?php

namespace App\Http\Controllers\Home;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Model\Banner;
use App\Model\AdvImage;
use App\Model\Caty;
use DB;
use App\Service\Sorting;
use Cookie;

class BannerController extends Controller
{

    
    
    /**
     * 加载用户自己拥有的广告位
     */
    public function myBannerList()
    {
        return view('Home.Banner.myBannerList',['banList'=>DB::table('banners_users')->where('uid',Cookie::get('UserId'))->get()]);
    }


    /**
     * 为广告位添加广告
     * @param $id
     */
    public function addMyBanner($id)
    {
        return view('Home.Banner.addMyBanner');
    }

    public function doaddMyBanner(Request $request)
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
     * 删除广告
     * @param $id
     */
    public function delMyBanner($id)
    {
        $data['banner_img'] = '';
        $data['description'] = '';
        $data['url'] = '';
        $result['sta'] = DB::table('banners_users')->where('id',$id)->update($data);
        if($result['sta']){
            $result['msg'] = '删除成功';
        }else{
            $result['msg'] = '删除有误,或者此广告位没有广告';
        }

        return $result;
    }


    /**
     * 投放广告（轮播图）
     */
    public function Advertising()
    {
        $balance = AccountsController::info();//获取用户余额信息
        return view('Home.Banner.Advertising',['banList'=>self::BannerList(),'balance'=>$balance]);
    }

    /**
     * 投放广告 (静态0)
     */
    public function stAdvertising()
    {
        $balance = AccountsController::info();//获取用户余额信息
        return view('Home.Banner.stAdvertising',['banList'=>self::adv_imagesList(),'balance'=>$balance]);
    }
    
    /**
     * 广告列表(轮播图)
     * @return mixed
     */
    static public function BannerList()
    {
        $banList =  DB::select("select *,CONCAT(id,c_id)  from banners order by CONCAT(c_id,id) asc");
        return $banList;
    }

    /**
     * 广告列表(静态广告)
     * @return mixed
     */
    static public function adv_imagesList()
    {
       return $list = DB::table('adv_images')->get();

    }
    
    /*
     * 广告投放规则
     * */
    public function RuleAds()
    {
        return view('Home.Banner.RuleAds');
    }

    //-------------------------------------------------------------------------------
    /**
     * 跳转到广告位添加页面
     * @param $id
     */
    public function addAdv($id)
    {

    }

    /**
     * 执行广告添加动作
     */
    public function doAddAdv()
    {
        
    }


    /*
     * 测试
     * */
    public function test()
    {
        dump($this->adv_imagesList());

    }

    
}
