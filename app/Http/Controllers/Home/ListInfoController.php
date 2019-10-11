<?php

namespace App\Http\Controllers\Home;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Model\Caty;
use App\Model\Help;
use App\Model\About;
use App\Model\Conf;
use App\Model\AdvImage;
use App\Model\Banner;
use DB;
use Cookie;
class ListInfoController extends Controller
{
	/**
	 * 帮助中心详情
	 * @Author   CarLos(翟)
	 * @DateTime 2018-03-29
	 * @Email    carlos0608@163.com
	 * @param    [type]             $id [description]
	 */
    public function HelpInfo($id)
    {
    	$data = Help::GetOne($id);
    	return view('/Home/ListInfo/HelpInfo',[
    		'HelpInfo'=>$data,
    	]);
    }
   
    public function ContactUs()
    {
        $data = Conf::GetConfOne(1);
    	return view('/Home/ListInfo/ContactUs',[
            'ContactUs'=>$data,
        ]);
    }

    public function AboutUs($id)
    {
    	$data = About::GetAboutOne($id);
    	return view('/Home/ListInfo/AboutUs',[
    		'AboutInfo'=>$data,
    	]);
    }

    public function SoftwareInfo($id)
    {
        $BannerI = Banner::GetBannerSelect(8);
        $AdvImage = AdvImage::GetAdvImageOne(1);
        $CatyList = Caty::GetCatyHomeAll();
        $list = DB::table('billboards')->where('billboards_position','>',0)->get();
        foreach ($list as $key=>$val){
            $AdvImage[$val->billboards_position] = $val;
        }
        $SoftwareInfo = DB::table('software')
            ->join('caties', 'caties.id', '=', 'software.softwaretype')
            ->where('software.id','=',$id)
            ->where('is_status','=',1)
            ->select('software.*', 'caties.caty_name')
            ->first();
        if (empty($SoftwareInfo)) {
           return back()->with('info','审核还未通过不予发布');
        }else{
            $SoftwareInfo->count = DB::table('user_downs')->where('sid','=',$SoftwareInfo->id)->count();
            $SoftwareInfo->comment = DB::table('user_comments')->where('is_code',1)->where('sid','=',$SoftwareInfo->id)->avg('star');
        }
        $SoftwareRecommended = DB::table('software')->join('users', 'users.id', '=', 'software.uid')->where('softwaretype','=',$CatyList[0]->id)->where('software.is_person','=',1)->where('is_status','=',1)->select('software.*','users.nickname')->orderBy('software.recommen_time','desc')->limit(6)->get();
        foreach ($SoftwareRecommended as $k => $v) {
           $SoftwareRecommended[$k]->count = DB::table('user_downs')->where('sid','=',$v->id)->count();
           $SoftwareRecommended[$k]->comment = DB::table('user_comments')->where('sid','=',$v->id)->where('is_code',1)->avg('star');
        }
        $UserCommentInfo = DB::table('user_comments')->join('users', 'users.id', '=', 'user_comments.uid')->where('user_comments.sid','=',$id)->orderBy('user_comments.id','desc')->select('users.nickname','users.header_pic','user_comments.*')->paginate(10);
        $UserCommentCount = DB::table('user_comments')->join('users', 'users.id', '=', 'user_comments.uid')->where('user_comments.sid','=',$id)->count();
        $is_code = DB::table('user_comments')->where('uid',Cookie::get('UserId'))->where('sid',$id)->count('id');

        return view('/Home/ListInfo/SoftwareInfo',[
            'SoftwareCaty'=>$CatyList,
            'AdvImage'=>$AdvImage,
            'SoftwareBanner'=>$BannerI,
            'SoftwareInfo'=>$SoftwareInfo,
            'SoftwareRecommended'=>$SoftwareRecommended,
            'UserCommentInfo'=>$UserCommentInfo,
            'UserCommentCount'=>$UserCommentCount,
            'CommentCount'=>$is_code
        ]);
    }
}
