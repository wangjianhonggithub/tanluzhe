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
    	$BannerOne = BannerController::displayBanner(1);
    	$BannerTwo = BannerController::displayBanner(2);
    	$BannerThree = BannerController::displayBanner(3);
		
		
	
        $list = DB::table('billboards')->where('billboards_position','>',0)->get();
        if($list) {
            foreach ($list as $key=>$val){
                $AdvImage[$val->billboards_position] = $val;
            }
        }
        if (!isset($AdvImage)){
            $AdvImage = [];
        }
//        $AdvImage = AdvImage::GetAdvImageOne(1); 广告牌第一次设计展示（表没有删除）

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
        $keyword = !empty($_GET['keyword'])?$_GET['keyword'] : '';
        $BannerS = Banner::GetBannerSelect(6);
        $BannerZ = Banner::GetBannerSelect(7);
        $AdvImage = AdvImage::GetAdvImageOne(1);
        $Caty = Caty::GetCatyOne($id);
		
		

		
		if (isset($_GET['charge']) && isset($_GET['hot']) && $_GET['hot'] == 1) {
			//最新  ->  付费/免费
            $software = DB::table('software')->join('users', 'users.id', '=', 'software.uid')
											->where('software.charge','=',$_GET['charge'])
											->where('software.is_status','=',1)
											->where('software.softwarename','like','%'.$keyword.'%')
											->select('software.*','users.nickname')
											->orderBy('created_at','desc')
											->paginate(6);
            foreach ($software as $key => $value) {
               $software[$key]->count = DB::table('user_downs')->where('sid','=',$value->id)->count();
               $software[$key]->comment = DB::table('user_comments')->where('is_code',1)->where('sid','=',$value->id)->avg('star');
            }

        }else if(isset($_GET['charge']) && isset($_GET['hot']) && $_GET['hot'] == 2){
			//最热  ->  付费/免费
            $software = DB::table('software')->join('users', 'users.id', '=', 'software.uid')
											->where('software.softwarename','like','%'.$keyword.'%')
											->where('software.charge','=',$_GET['charge'])
											->where('software.softwaretype','=',$id)
											->where('software.is_status','=',1)
											->select('software.*','users.nickname')
											->orderBy('software.id','desc')
											->paginate(6);
            foreach ($software as $key => $value) {
               $software[$key]->count = DB::table('user_downs')->where('sid','=',$value->id)->count();
               $software[$key]->comment = DB::table('user_comments')->where('is_code',1)->where('sid','=',$value->id)->avg('star');
            }

        }else{
			//全部
             $software = DB::table('software')->join('users', 'users.id', '=', 'software.uid')
											->where('software.softwarename','like','%'.$keyword.'%')
											->where('software.softwaretype','=',$id)
											->where('software.is_status','=',1)
											->select('software.*','users.nickname')
											->orderBy('software.id','desc')
											->paginate(6);
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
		 $data['shuff1'] =self::Shuff(0,6,$id);
        //var_dump($data['shuff1']);
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

        return view('/Home/List/SeachSoftWare',[
            'keyword'=>$keyword,
            'CatyNav'=>$Caty,
            'SoftwareBannerS'=>$BannerS,
            'SoftwareBannerZ'=>$BannerZ,
            'AdvImage'=>$AdvImage,
            'CatyList'=>$CatyList,
            'SoftwareList'=>$software,
            'SoftwareRecommended'=>$SoftwareRecommended,
            'SoftwareShuff'=>$data,
        ]);
    }
	public function Shuff($low,$hit,$id)
    {
        $SoftwareShuff = DB::table('software')->join('users', 'users.id', '=', 'software.uid')
            ->where('software.is_status','=',1)->where('software.is_shuff','=',1)
            ->where('software.softwaretype','=',$id)->select('software.*','users.nickname')
            ->where('software.order','>',$low)
            ->where('software.order','<=',($low+$hit))
            ->orderBy('software.order')
            ->limit(6)->get();

     
        foreach ($SoftwareShuff as $k => $v) {
            $SoftwareShuff[$k]->count = DB::table('user_downs')->where('sid','=',$v->id)->count();
            $SoftwareShuff[$k]->comment = DB::table('user_comments')->where('is_code',1)->where('sid','=',$v->id)->avg('star');
        }
        $newdata = array();
        foreach ($SoftwareShuff as $ke=>$val){
            $newdata[$val->order] = $val;
        }


        for($i=1;$i<=31;$i++){
            if(empty($newdata[$i])){
                $newdata[$i] = new class{};
                $newdata[$i]->id = 32;
                $newdata[$i]->uid = '/uploads/software/152540309272046198.zip';
                $newdata[$i]->software = '/uploads/software_img/152540309222086936.jpg';
                $newdata[$i]->cover = '';
                $newdata[$i]->order = '';
                $newdata[$i]->softwarename = '';
                $newdata[$i]->softwaretype = '';
                $newdata[$i]->platform = '';
                $newdata[$i]->charge = '';
                $newdata[$i]->EffectOne = '';
                $newdata[$i]->EffectTwo = '';
                $newdata[$i]->EffectThree = '';
                $newdata[$i]->EffectFour = '';
                $newdata[$i]->software_size = '';
                $newdata[$i]->description = '';
                $newdata[$i]->created_at = '';
                $newdata[$i]->updated_at = '';
                $newdata[$i]->is_status = '';
                $newdata[$i]->recommen_time = '';
                $newdata[$i]->is_person = '';
                $newdata[$i]->is_shuff = '';
                $newdata[$i]->shuff_time = '';
                $newdata[$i]->nickname = '';
                $newdata[$i]->count = '';
                $newdata[$i]->comment = '';
            }
        }

        ksort($newdata);
        $newdata = array_slice($newdata,$low,6);
        return $newdata;
    }

}
