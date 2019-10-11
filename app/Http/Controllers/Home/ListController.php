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
        $list = DB::table('billboards')->where('billboards_position','>',0)->get();
        foreach ($list as $key=>$val){
            $AdvImage[$val->billboards_position] = $val;
        }
        if (isset($_GET['charge']) && isset($_GET['hot']) && $_GET['hot'] == 1) {
			//最新  ->  付费/免费
            $software = DB::table('software')->join('users', 'users.id', '=', 'software.uid')
											->where('software.softwaretype','=',$id)
											->where('charge','=',$_GET['charge'])
											->where('software.is_status','=',1)
											->select('software.*','users.nickname')
											->orderBy('created_at','desc')
											->paginate(6);
            foreach ($software as $key => $value) {
                $software[$key]->count = DB::table('user_downs')->where('sid','=',$value->id)->count();
                $software[$key]->comment = DB::table('user_comments')->where('is_code',1)->where('sid','=',$value->id)->avg('star');
            }
            $ListPage['charge'] = $_GET['charge'];
            $ListPage['hot'] = $_GET['hot'];
        }else if(isset($_GET['charge']) && isset($_GET['hot']) && $_GET['hot'] == 2){
			//最热  ->  付费/免费
            $software = DB::table('software')->join('users', 'users.id', '=', 'software.uid')
											->where('softwaretype','=',$id)
											->where('software.is_status','=',1)
											->where('charge','=',$_GET['charge'])
											->select('software.*','users.nickname')
											->orderBy('software.id','desc')
											->get();;
            foreach ($software as $k => $v) {
                $software[$k]->count = DB::table('user_downs')->where('sid','=',$v->id)->count();
                $software[$k]->comment = DB::table('user_comments')->where('is_code',1)->where('sid','=',$v->id)->avg('star');
            }
            $software = Sorting::GetLimitLiShi($software);
            $ListPage['charge'] = $_GET['charge'];
            $ListPage['hot'] = $_GET['hot'];
        }else{
			//全部
            $software = DB::table('software')->join('users', 'users.id', '=', 'software.uid')
											->where('software.softwaretype','=',$id)
											->where('software.is_status','=',1)
											->select('software.*','users.nickname')
											->orderBy('software.id','desc')
											->paginate(6);
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
            $a = $data['shuff1'][0];
            $b = $data['shuff1'][1];
            $c = $data['shuff1'][2];
            $d = $data['shuff1'][3];
            $e = $data['shuff1'][4];
            $f = $data['shuff1'][5];
            $data['shuff1'][0] = $e;
            $data['shuff1'][1] = $c;
            $data['shuff1'][2] = $a;
            $data['shuff1'][3] = $b;
            $data['shuff1'][4] = $d;
            $data['shuff1'][5] = $f;
        $data['shuff2'] =self::Shuff(6,6,$id);
            $a = $data['shuff2'][0];
            $b = $data['shuff2'][1];
            $c = $data['shuff2'][2];
            $d = $data['shuff2'][3];
            $e = $data['shuff2'][4];
            $f = $data['shuff2'][5];
            $data['shuff2'][0] = $e;
            $data['shuff2'][1] = $c;
            $data['shuff2'][2] = $a;
            $data['shuff2'][3] = $b;
            $data['shuff2'][4] = $d;
            $data['shuff2'][5] = $f;
        $data['shuff3'] =self::Shuff(12,6,$id);
            $a = $data['shuff3'][0];
            $b = $data['shuff3'][1];
            $c = $data['shuff3'][2];
            $d = $data['shuff3'][3];
            $e = $data['shuff3'][4];
            $f = $data['shuff3'][5];
            $data['shuff3'][0] = $e;
            $data['shuff3'][1] = $c;
            $data['shuff3'][2] = $a;
            $data['shuff3'][3] = $b;
            $data['shuff3'][4] = $d;
            $data['shuff3'][5] = $f;
        $data['shuff4'] =self::Shuff(18,6,$id);
            $a = $data['shuff4'][0];
            $b = $data['shuff4'][1];
            $c = $data['shuff4'][2];
            $d = $data['shuff4'][3];
            $e = $data['shuff4'][4];
            $f = $data['shuff4'][5];
            $data['shuff4'][0] = $e;
            $data['shuff4'][1] = $c;
            $data['shuff4'][2] = $a;
            $data['shuff4'][3] = $b;
            $data['shuff4'][4] = $d;
            $data['shuff4'][5] = $f;
        $data['shuff5'] =self::Shuff(24,6,$id);
            $a = $data['shuff5'][0];
            $b = $data['shuff5'][1];
            $c = $data['shuff5'][2];
            $d = $data['shuff5'][3];
            $e = $data['shuff5'][4];
            $f = $data['shuff5'][5];
            $data['shuff5'][0] = $e;
            $data['shuff5'][1] = $c;
            $data['shuff5'][2] = $a;
            $data['shuff5'][3] = $b;
            $data['shuff5'][4] = $d;
            $data['shuff5'][5] = $f;
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
