<?php

namespace App\Http\Controllers\Home;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Model\Banner;
use App\Model\AdvImage;
use App\Model\Caty;
use DB;
use App\Service\Sorting;
class IndexController extends Controller
{
    public function show()
    {
    	$BannerOne = Banner::GetBannerSelect(1);
    	$BannerTwo = Banner::GetBannerSelect(2);
    	$BannerThree = Banner::GetBannerSelect(3);
        $AdvImage = AdvImage::GetAdvImageOne(1);
        $Caty = Caty::GetCatyHomeAll();
        $software = DB::table('software')->join('users', 'users.id', '=', 'software.uid')->where('software.softwaretype','=',$Caty[0]->id)->where('software.is_status','=',1)->select('software.*','users.nickname')->orderBy('software.id','desc')->limit(9)->get();
        foreach ($software as $key => $value) {
           $software[$key]->count = DB::table('user_downs')->where('sid','=',$value->id)->count();
           $software[$key]->comment = DB::table('user_comments')->where('is_code',1)->where('sid','=',$value->id)->avg('star');
        }
        $SoftwareHotDown = DB::table('software')->join('users', 'users.id', '=', 'software.uid')->where('softwaretype','=',$Caty[0]->id)->where('software.is_status','=',1)->select('software.*','users.nickname')->orderBy('software.id','desc')->limit(6)->get();
        foreach ($SoftwareHotDown as $k => $v) {
           $SoftwareHotDown[$k]->count = DB::table('user_downs')->where('sid','=',$v->id)->count();
           $SoftwareHotDown[$k]->comment = DB::table('user_comments')->where('is_code',1)->where('sid','=',$v->id)->avg('star');
        }
        $data = Sorting::GetLimitLiShi($SoftwareHotDown);
        return view('/Home/Index/Index',[
        	'BannerOne'=>$BannerOne,
        	'BannerTwo'=>$BannerTwo,
            'BannerThree'=>$BannerThree,
            'AdvImage'=>$AdvImage,
        	'CatyInd'=>$Caty,
            'Software'=>$software,
            'SoftwareHotDown'=>$data,
        ]);
    }
    /**
     * 最新上传
     * @Author   CarLos(翟)
     * @DateTime 2018-04-03
     * @Email    carlos0608@163.com
     */
    public function NewUpload()
    {
        $catyId = $_GET['catyId'];
        $software = DB::table('software')->join('users', 'users.id', '=', 'software.uid')->where('software.softwaretype','=',$catyId)->where('software.is_status','=',1)->select('software.*','users.nickname')->orderBy('software.id','desc')->limit(9)->get();
        foreach ($software as $key => $value) {
           $software[$key]->count = DB::table('user_downs')->where('sid','=',$value->id)->count();
           $software[$key]->comment = DB::table('user_comments')->where('is_code',1)->where('sid','=',$value->id)->avg('star');
        }
        echo json_encode($software);
    }
    /**
     * 最热下载
     * @Author   CarLos(翟)
     * @DateTime 2018-04-03
     * @Email    carlos0608@163.com
     */
    public function DownHot()
    {
        $catyId = $_GET['catyId'];
        $SoftwareHotDown = DB::table('software')->join('users', 'users.id', '=', 'software.uid')->where('softwaretype','=',$catyId)->where('software.is_status','=',1)->select('software.*','users.nickname')->orderBy('software.id','desc')->limit(6)->get();
        foreach ($SoftwareHotDown as $k => $v) {
           $SoftwareHotDown[$k]->count = DB::table('user_downs')->where('sid','=',$v->id)->count();
           $SoftwareHotDown[$k]->comment = DB::table('user_comments')->where('is_code',1)->where('sid','=',$v->id)->avg('star');
        }
        $data = Sorting::GetLimitLiShi($SoftwareHotDown);
        echo json_encode($data);
    }

    public function SeachSoftWare()
    {
        $CatyList = Caty::GetCatyHomeAll();
        $id = isset($_GET['id'])?$_GET['id'] : $CatyList[0]->id;
        $keyword = !empty($_GET['keyword'])?$_GET['keyword'] : '暂无';
        $BannerS = Banner::GetBannerSelect(6);
        $BannerZ = Banner::GetBannerSelect(7);
        $AdvImage = AdvImage::GetAdvImageOne(1);
        $Caty = Caty::GetCatyOne($id);
        if (isset($_GET['charge'])) {
            $software = DB::table('software')->join('users', 'users.id', '=', 'software.uid')->where('software.softwaretype','=',$id)->where('charge','=',$_GET['charge'])->where('software.is_status','=',1)->where('software.softwarename','like','%'.$keyword.'%')->select('software.*','users.nickname')->paginate(6);
            foreach ($software as $key => $value) {
               $software[$key]->count = DB::table('user_downs')->where('sid','=',$value->id)->count();
               $software[$key]->comment = DB::table('user_comments')->where('is_code',1)->where('sid','=',$value->id)->avg('star');
            }
        }else{
            $software = DB::table('software')->join('users', 'users.id', '=', 'software.uid')->where('software.softwarename','like','%'.$keyword.'%')->where('software.softwaretype','=',$id)->where('software.is_status','=',1)->select('software.*','users.nickname')->paginate(6);
            foreach ($software as $key => $value) {
               $software[$key]->count = DB::table('user_downs')->where('sid','=',$value->id)->count();
               $software[$key]->comment = DB::table('user_comments')->where('is_code',1)->where('sid','=',$value->id)->avg('star');
            }
        }
        $SoftwareRecommended = DB::table('software')->join('users', 'users.id', '=', 'software.uid')->where('software.softwaretype','=',$CatyList[0]->id)->where('software.is_status','=',1)->where('software.is_person','=',1)->select('software.*','users.nickname')->orderBy('software.recommen_time','desc')->limit(6)->get();
        foreach ($SoftwareRecommended as $k => $v) {
           $SoftwareRecommended[$k]->count = DB::table('user_downs')->where('sid','=',$v->id)->count();
           $SoftwareRecommended[$k]->comment = DB::table('user_comments')->where('is_code',1)->where('sid','=',$v->id)->avg('star');
        }
        $SoftwareShuff = DB::table('software')->join('users', 'users.id', '=', 'software.uid')->where('software.is_status','=',1)->where('software.is_shuff','=',1)->select('software.*','users.nickname')->orderBy('software.shuff_time','desc')->get();
        foreach ($SoftwareShuff as $k => $v) {
           $SoftwareShuff[$k]->count = DB::table('user_downs')->where('sid','=',$v->id)->count();
           $SoftwareShuff[$k]->comment = DB::table('user_comments')->where('is_code',1)->where('sid','=',$v->id)->avg('star');
        }
        return view('/Home/List/SeachSoftWare',[
            'keyword'=>$keyword,
            'CatyNav'=>$Caty,
            'SoftwareBannerS'=>$BannerS,
            'SoftwareBannerZ'=>$BannerZ,
            'AdvImage'=>$AdvImage,
            'CatyList'=>$CatyList,
            'SoftwareList'=>$software,
            'SoftwareRecommended'=>$SoftwareRecommended,
            'SoftwareShuff'=>$SoftwareShuff,
        ]);
    }

}
