<?php

namespace App\Http\Controllers\Home;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Model\Banner;
use App\Model\AdvImage;
use App\Service\Common;
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
        $where = [];

        $where['uid'] = Cookie::get('UserId');
        // $where['status']   = 1;

        // user_auc_bill
        // return view('Home.Banner.myBannerList',['banList'=>DB::table('banners_users')->where('uid',Cookie::get('UserId'))->get()]);
        return view('Home.Banner.myBannerList',['banList'=>DB::table('banners_users')->where($where)->get()]);
    }


    /**
     * 为广告位添加广告
     * @param $id
     */
    public function addMyBanner($id)
    {
        return view('Home.Banner.addMyBanner',['id'=>$id]);
    }

    public function doaddMyBanner(Request $request)
    {
        $uploadname = 'banner_img';
        $dir = 'uploads/imgpath';
        $id = $request->id;
        $data['c_id'] = isset($request->c_id) ? $request->c_id :1;
        $data['url'] = isset($request->url) ? $request->url :'';
        $data['description'] = $request->description;
        $data['title'] = $request->title;
        if($data['title']==null){
            return back()->withErrors(['标题不能为空！']);
        }
        $data['banner_img'] = Common::DirUpload($uploadname,$request,$dir);
  
        if(DB::table('banners_users')->where('id',$id)->update($data)){
            return redirect('/Banner/myBannerList');
        }else{
            return back()->withErrors(['广告添加失败！']);
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


    /**
     * 展示轮播图，优先展示用户的轮播图，如果用户的没有被拍卖，就展示管理员默认的广告
     * @param int $c_id 分类
     * @return array
     */
    static public function displayBanners($c_id=0)
    {
        $ban = DB::table('banners')->get();
        $ban_users = DB::table('banners_users')->where('status',1)->get();
        foreach ($ban as $k=>$v){
            $banners[$v->id] = $v;
        }
        foreach ($ban_users as $k=>$v){
            $banners_users[$v->c_id] = $v;
        }
        foreach ($banners as $k=>$v){
            if(isset($banners_users[$k])){
                $banners[$k] = $banners_users[$k];
            }
            $banners_users[$k] = $v;
        }
        $data = array();
        if($c_id==0){
            $data =  $banners;
        }else{
            foreach ($banners as $key=>$val){
                if($val->c_id==$c_id){
                    $data[] = $val;
                }
            }
        }
// var_dump($data);die;
        return $data;
    }
	
	static public function displayBanner($c_id)
    {	
        $ban = DB::table('banners')->where('c_id',$c_id)->get();
        //$ban_users = DB::table('banners_users')->where('status',1)->get();
		
		
		//$data = DB::table('banners')
        //    ->join('banners_users', 'banners_users.c_id', '=', 'banners.id')
        //    ->where('banners.c_id','=',$c_id)
        //    ->where('banners_users.status','=',1)
         //   ->select('banners.*', 'banners_users.status','banners_users.c_id')
         //   ->get();
		$data = [];
		
		if(isset($ban) && $ban){
                foreach($ban as &$v){
					$nan = DB::table('banners_users')->where(['c_id'=>$v->id,'status'=>1])->first();
					
					if (isset($nan) && $nan) {
						$v->banner_img = $nan->banner_img;
					} else {
						$v->banner_img = $v->position;
					}
					
				}
            }
		
		
		
		
        return $ban;
    }

}
