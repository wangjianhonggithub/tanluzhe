<?php

namespace App\Http\Controllers\Home;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Model\Caty;
use App\Model\Help;
use App\Model\Banner;
use App\Model\AdvImage;
use DB;
use App\Service\Sorting;
class ListController extends Controller
{
	/**
	 * 软件列表页
	 * @Author   CarLos(翟)
	 * @DateTime 2018-03-29
	 * @Email    carlos0608@163.com
	 * @param    [type]             $id [description]
	 */
    public function SoftwareList($id)
    {
        $BannerS = Banner::GetBannerSelect(6);
        $BannerZ = Banner::GetBannerSelect(7);
        $AdvImage = AdvImage::GetAdvImageOne(1);
        $Caty = Caty::GetCatyOne($id);
    	$CatyList = Caty::GetCatyHomeAll();
        if (isset($_GET['charge']) && isset($_GET['hot']) && $_GET['hot'] == 1) {
                $software = DB::table('software')->join('users', 'users.id', '=', 'software.uid')->where('software.softwaretype','=',$id)->where('charge','=',$_GET['charge'])->where('software.is_status','=',1)->select('software.*','users.nickname')->orderBy('software.id','desc')->paginate(6);
                foreach ($software as $key => $value) {
                   $software[$key]->count = DB::table('user_downs')->where('sid','=',$value->id)->count();
                   $software[$key]->comment = DB::table('user_comments')->where('is_code',1)->where('sid','=',$value->id)->avg('star');
                }
                $ListPage['charge'] = $_GET['charge'];
                $ListPage['hot'] = $_GET['hot'];
        }else if(isset($_GET['charge']) && isset($_GET['hot']) && $_GET['hot'] == 2){
            $software = DB::table('software')
            ->join('users', 'users.id', '=', 'software.uid')
            ->where('softwaretype','=',$id)
            ->where('software.is_status','=',1)
            ->where('charge','=',$_GET['charge'])
            ->select('software.*','users.nickname')
            ->orderBy('software.id','desc')
            ->get();
            foreach ($software as $k => $v) {
               $software[$k]->count = DB::table('user_downs')->where('sid','=',$v->id)->count();
               $software[$k]->comment = DB::table('user_comments')->where('is_code',1)->where('sid','=',$v->id)->avg('star');
            }
            $software = Sorting::GetLimitLiShi($software);
            $ListPage['charge'] = $_GET['charge'];
            $ListPage['hot'] = $_GET['hot'];
        }else{
            $software = DB::table('software')->join('users', 'users.id', '=', 'software.uid')->where('software.softwaretype','=',$id)->where('software.is_status','=',1)->select('software.*','users.nickname')->paginate(6);
            foreach ($software as $key => $value) {
               $software[$key]->count = DB::table('user_downs')->where('sid','=',$value->id)->count();
               $software[$key]->comment = DB::table('user_comments')->where('is_code',1)->where('sid','=',$value->id)->avg('star');
            }
            $ListPage['charge'] = '';
            $ListPage['hot'] = '';
        }
        $SoftwareRecommended = DB::table('software')->join('users', 'users.id', '=', 'software.uid')->where('software.softwaretype','=',$CatyList[0]->id)->where('software.is_status','=',1)->where('software.is_person','=',1)->select('software.*','users.nickname')->orderBy('software.recommen_time','desc')->limit(6)->get();
        foreach ($SoftwareRecommended as $k => $v) {
           $SoftwareRecommended[$k]->count = DB::table('user_downs')->where('sid','=',$v->id)->count();
           $SoftwareRecommended[$k]->comment = DB::table('user_comments')->where('is_code',1)->where('sid','=',$v->id)->avg('star');
        }
        $data['shuff1'] =self::Shuff(0,6,$id);
        $data['shuff2'] =self::Shuff(6,6,$id);
        $data['shuff3'] =self::Shuff(12,6,$id);
        $data['shuff4'] =self::Shuff(18,6,$id);
        $data['shuff5'] =self::Shuff(24,6,$id);
        $SoftwareMobile['mobile1'] = self::Shuff(0,4,$id);
        $SoftwareMobile['mobile2'] = self::Shuff(4,4,$id);
        $SoftwareMobile['mobile3'] = self::Shuff(8,4,$id);
        $SoftwareMobile['mobile4'] = self::Shuff(12,4,$id);
        $SoftwareMobile['mobile5'] = self::Shuff(16,4,$id);
        $SoftwareMobile['mobile6'] = self::Shuff(20,4,$id);
        $SoftwareMobile['mobile7'] = self::Shuff(24,4,$id);
        $SoftwareMobile['mobile8'] = self::Shuff(28,2,$id);
        return view('/Home/List/SoftwareList',[
            'CatyNav'=>$Caty,
            'SoftwareBannerS'=>$BannerS,
            'SoftwareBannerZ'=>$BannerZ,
            'AdvImage'=>$AdvImage,
            'CatyList'=>$CatyList,
            'SoftwareList'=>$software,
            'SoftwareRecommended'=>$SoftwareRecommended,
        	'SoftwareShuff'=>$data,
            'SoftwareMobile'=>$SoftwareMobile,
            'ListPage'=>$ListPage,
        ]);
    }

    public function Shuff($low,$hit,$id)
    {
        $SoftwareShuff = DB::table('software')->join('users', 'users.id', '=', 'software.uid')->where('software.is_status','=',1)->where('software.is_shuff','=',1)->where('software.softwaretype','=',$id)->select('software.*','users.nickname')->orderBy('software.shuff_time','desc')->offset($low)->limit($hit)->get();
        foreach ($SoftwareShuff as $k => $v) {
           $SoftwareShuff[$k]->count = DB::table('user_downs')->where('sid','=',$v->id)->count();
           $SoftwareShuff[$k]->comment = DB::table('user_comments')->where('is_code',1)->where('sid','=',$v->id)->avg('star');
        }
        return $SoftwareShuff;
    }


    public function SoftRecom()
    {
        $id = $_GET['CatyId'];
        $SoftwareRecommended = DB::table('software')->join('users', 'users.id', '=', 'software.uid')->where('software.softwaretype','=',$id)->where('software.is_status','=',1)->where('software.is_person','=',1)->select('software.*','users.nickname')->orderBy('software.recommen_time','desc')->limit(6)->get();
        foreach ($SoftwareRecommended as $k => $v) {
           $SoftwareRecommended[$k]->count = DB::table('user_downs')->where('sid','=',$v->id)->count();
           $SoftwareRecommended[$k]->comment = DB::table('user_comments')->where('is_code',1)->where('sid','=',$v->id)->avg('star');
        }
        echo json_encode($SoftwareRecommended);
    }
    /**
     * 帮助中心
     * @Author   CarLos(翟)
     * @DateTime 2018-03-29
     * @Email    carlos0608@163.com
     */
    public function Help()
    {
    	$data = Help::GetHomeHelpAll();
    	return view('/Home/List/HelpList',[
    		'Help'=>$data,
    	]);
    }
}
