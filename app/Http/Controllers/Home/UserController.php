<?php

namespace App\Http\Controllers\Home;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Model\Conf;
use App\Model\User;
use Illuminate\Support\Facades\Hash;
use Cookie;
use App\Service\Common;
use App\Http\Requests\SoftWarePost;
use App\Model\Software;
use App\Model\Caty;
use DB;
use App\Model\Encrypted;
use App\Model\UserDown;
use Illuminate\Contracts\Routing\ResponseFactory;
use App\Http\Requests\UserUpdate;
use App\Model\UserComment;
use App\Model\Cert;
class UserController extends Controller
{

    public function UserMessage()
    {
        $UserId = Cookie::get('UserId');
        $data = DB::table('news')->where('uid',$UserId)->get();
        return view('/Home/UserCenter/UserMessage',[
            'MsgData'=>$data,
        ]);
    }


    public function MessageDelete()
    {
        $id = $_GET['id'];
        $res = DB::table('news')->where('news_id',$id)->delete();
        if ($res) {
            echo json_encode(['code'=>1,'meg'=>'删除成功']);
        }else{
            echo json_encode(['code'=>0,'meg'=>'删除失败']);
        }
    }
	/**
	 * 软件发布
	 * @Author   CarLos(翟)
	 * @DateTime 2018-03-30
	 * @Email    carlos0608@163.com
	 */
    public function SoftwareRelease()
    {
        $Caty = Caty::GetCatyHomeAll();
        $data = Conf::GetConfOne(1);
        return view('/Home/UserCenter/SoftwareRelease',[
            'CatySoftware'=>$Caty,
            'ConfSoftware'=>$data,
        ]);
    }
    /**
     * 执行软件上传
     */
    public function DoSoftwareRelease(SoftWarePost $request)
    {
        $software = New Software;
        $softwaredir = 'uploads/software';
        $dir = 'uploads/software_img';
        $cover = 'cover';
        $EffectOne = 'EffectOne';
        $EffectTwo = 'EffectTwo';
        $EffectThree = 'EffectThree';
        $EffectFour = 'EffectFour';
        $suffix = $request->file('software')->getClientOriginalExtension();
        $filesize = $request->file('software')->getClientSize();
        if ($suffix != 'zip' && $suffix != 'rar') {
            return back()->with('info','您上传的文件不正确,请选择zip,或者rar');
        }else if($filesize > 104857600){
            return back()->with('info','您上传的文件太大了,请重新选择上传'); 
        }else{
            $data = Common::software('software',$request,$softwaredir);
            $software->software = $data['DirPath'];
            $software->software_size = $data['filesize'];
        }
        $software->cover = Common::DirUpload($cover,$request,$dir);
        if (!empty($request->file($EffectOne))) {
            $software->EffectOne= Common::DirUpload($EffectOne,$request,$dir);
        }
        if (!empty($request->file($EffectTwo))) {
            $software->EffectTwo= Common::DirUpload($EffectTwo,$request,$dir);
        }
        if (!empty($request->file($EffectThree))) {
            $software->EffectThree= Common::DirUpload($EffectThree,$request,$dir);
        }
        if (!empty($request->file($EffectFour))) {
            $software->EffectFour= Common::DirUpload($EffectFour,$request,$dir);
        }
        $software->softwaretype = $request->softwaretype;
        $software->uid = Cookie::get('UserId');
        $software->softwarename = $request->softwarename;
        $software->platform = $request->platform;
        $software->charge = $request->charge;
        $software->description = $request->description;
        $software->is_status = 0;
        if ($software->save()) {
            return redirect('/UserUpLoad')->with('info',"上传成功");
        }else{
            return back()->with('info',"上传失败");
        }
    }
    /**
     * 显示修改
     * @Author   CarLos(翟)
     * @DateTime 2018-04-08
     * @Email    carlos0608@163.com
     * @param    [type]             $id [description]
     * @return   [type]                 [description]
     */
    public function softWareUpdate($id)
    {
        $Caty = Caty::GetCatyHomeAll();
        $data = Software::GetOne($id);
        return view('/Home/UserCenter/softWareUpdate',[
            'CatySoftware'=>$Caty,
            'SoftwareInfo'=>$data,
        ]);
    }


    public function DosoftWareUpdate(Request $request)
    {
        $id = $request->id;
        $softwaredir = 'uploads/software';
        $dir = 'uploads/software_img';
        $cover = 'cover';
        $EffectOne = 'EffectOne';
        $EffectTwo = 'EffectTwo';
        $EffectThree = 'EffectThree';
        $EffectFour = 'EffectFour';
        $del = Software::GetOne($id);
        if ($request->file('software')) {
            $suffix = $request->file('software')->getClientOriginalExtension();
            $filesize = $request->file('software')->getClientSize();
            if ($suffix != 'zip' && $suffix != 'rar') {
                return back()->with('info','您上传的文件不正确,请选择zip,或者rar');
            }else if($filesize > 104857600){
                return back()->with('info','您上传的文件太大了,请重新选择上传'); 
            }else{
                Common::Del_Image($request,$del,'software');
                $datainfo = Common::software('software',$request,$softwaredir);
                $data['software'] = $datainfo['DirPath'];
                $data['software_size'] = $datainfo['filesize'];
            }
        }
        if (!empty($request->file($cover))) {
             Common::Del_Image($request,$del,$cover);
             $data['cover'] = Common::DirUpload($cover,$request,$dir);
        }
        if (!empty($request->file($EffectOne))) {
            Common::Del_Image($request,$del,$EffectOne);
            $data['EffectOne']= Common::DirUpload($EffectOne,$request,$dir);
        }
        if (!empty($request->file($EffectTwo))) {
            Common::Del_Image($request,$del,$EffectTwo);
            $data['EffectTwo']= Common::DirUpload($EffectTwo,$request,$dir);
        }
        if (!empty($request->file($EffectThree))) {
            Common::Del_Image($request,$del,$EffectThree);
            $data['EffectThree']= Common::DirUpload($EffectThree,$request,$dir);
        }
        if (!empty($request->file($EffectFour))) {
            Common::Del_Image($request,$del,$EffectFour);
            $data['EffectFour']= Common::DirUpload($EffectFour,$request,$dir);
        }
        $data['softwaretype']= $request->softwaretype;
        $data['uid'] = Cookie::get('UserId');
        $data['softwarename']= $request->softwarename;
        $data['platform'] = $request->platform;
        $data['charge'] = $request->charge;
        $data['description'] = $request->description;
        $data['is_status'] = $request->is_status;
        if (Software::ChangeUpdate($id,$data)) {
            return redirect('/UserUpLoad')->with('info',"更新成功");
        }else{
            return back()->with('info',"更新失败");
        }
    }
    /**
     * 软件删除
     * @Author   CarLos(翟)
     * @DateTime 2018-04-08
     * @Email    carlos0608@163.com
     * @param    [type]             $id [description]
     * @return   [type]                 [description]
     */
    public function softWareDelete($id)
    {
        $del = Software::GetOne($id);
        if (file_exists('.'.$del['software']) && !empty($del['software'])) {
          $delete_img = unlink('.'.$del['software']);
        }
        if (Software::DataDelete($id)) {
            return back()->with('info','删除成功');
        }else{
            return back()->with('info','删除失败');
        }
        
    }



    /**
     * 执行用户下载
     */
    public function UserDownLoad($id)
    {
        $data = Software::GetOne($id);
        $UserDown = New UserDown;
        $UserDown->sid = $id;
        if (!empty(Cookie::get('UserId'))) {
            $UserDown->uid = Cookie::get('UserId');
        }else{
            $UserDown->uid = 0;
        }
        $UserDown->save();
        $pathToFile = '.'.$data->software;
        return response()->download($pathToFile);
    }
    /**
     * 用户下载记录
     * @Author   CarLos(翟)
     * @DateTime 2018-04-02
     * @Email    carlos0608@163.com
     */
    public function DownloadRecord()
    {
        $UserId = Cookie::get('UserId');
        /**
         * 我的下载
         * @var [type]
         */
        $down =  DB::table('user_downs')
                ->join('software', 'software.id', '=', 'user_downs.sid')
                ->join('caties', 'caties.id', '=', 'software.softwaretype')
                ->where('user_downs.uid','=',$UserId)
                ->select('software.*', 'user_downs.created_at', 'caties.caty_name')
                ->orderBy('user_downs.id','desc')
                ->paginate(6);
    	return view('/Home/UserCenter/DownloadRecord',[
            'DownInfo'=>$down,
        ]);
    }

    public function UserBeDown()
    {
        /**
         * 用户被下载
         */
         $UserId = Cookie::get('UserId');
         $down =  DB::table('software')
                ->join('user_downs', 'software.id', '=', 'user_downs.sid')
                ->join('caties', 'caties.id', '=', 'software.softwaretype')
                ->join('users', 'users.id', '=', 'software.uid')
                ->where('software.uid','=',$UserId)
                ->select('software.*', 'user_downs.created_at', 'caties.caty_name','users.nickname')
                ->orderBy('software.id','desc')
                ->paginate(6);
        return view('/Home/UserCenter/UserBeDown',[
            'BeDown'=>$down,
        ]);
    }

    /**
     * 用户上传记录
     */
    public function UserUpLoad()
    {
        $UserId = Cookie::get('UserId');
        $UserUpLoadList = DB::table('software')
            ->join('caties', 'caties.id', '=', 'software.softwaretype')
            ->where("software.uid",'=',$UserId)
            ->select('software.*', 'caties.caty_name')
            ->paginate(8);
        return view('/Home/UserCenter/UserUpLoad',[
            'UserUpLoadList'=>$UserUpLoadList,
        ]);
    }
    /**
     * 用户评论
     */
    public function UserComments()
    {
        $UserId = Cookie::get('UserId');
        $comment =  DB::table('users')
                ->join('user_comments', 'users.id', '=', 'user_comments.uid')
                ->join('software', 'software.id', '=', 'user_comments.sid')
                ->select('software.softwarename','software.id','software.description','software.cover', 'user_comments.content','user_comments.created_at','users.nickname','users.header_pic')
                ->where('users.id','=',$UserId)
                ->orderBy('user_comments.id','desc')
                ->paginate(3);
        return view('/Home/UserCenter/UserComments',[
            'CommentInfo'=>$comment,
        ]);
    }
    /**
     * 用户设置 (修改信息)
     * @Author   CarLos(翟)
     * @DateTime 2018-04-02
     * @Email    carlos0608@163.com
     */
    public function UserConf()
    {
        $UserId = Cookie::get('UserId');
        $data = User::GetOne($UserId);
        /**
         * 密保问题
         * @var [type]
         */
        $Enc = Encrypted::EncryptedAll();
        return view('/Home/UserCenter/UserConf',[
            'User'=>$data,
            'Enc'=>$Enc,
        ]);
    }

    public function DoUserConf(UserUpdate $request)
    {
        $id = $request->id;
        $header_pic = 'header_pic';
        $dir = 'uploads/Conf';
        $del = User::GetOne($id);
        if (!empty($request->header_pic)) {
           if (file_exists('.'.$del['header_pic']) && !empty($del['header_pic']) && $del['header_pic']!='default.jpg') {
              $delete_img = unlink('.'.$del['header_pic']);
           }
           $data['header_pic'] = Common::DirUpload($header_pic,$request,$dir);
        }
        $data['nickname'] = $request->nickname;
        $data['mobile'] = $request->mobile;
        $data['email'] = $request->email;
        $data['encrypted'] = $request->encrypted;
        $data['answer'] = $request->answer;
        $data['nickname'] = $request->nickname;
        $user = User::ChangeUpdate($id,$data);
        if ($user) {
            return back()->with('info','更新成功');
        }else{
            return back()->with('info','更新失败');
        }
    }

    /**
     * 修改密码
     * @Author   CarLos(翟)
     * @DateTime 2018-04-02
     * @Email    carlos0608@163.com
     */
    public function UserUpdatePasswd()
    {
        return view('/Home/UserCenter/UserUpdatePasswd');
    }

    public function DoUserUpdatePasswd(Request $request)
    {

        if ($request->password == '') {
          return back()->with('messages','原密码为空');
        }
        if ($request->newPassword == '') {
          return back()->with('messages','新密码为空');
        }
        if ($request->rePassword == '') {
          return back()->with('messages','确认密码为空');
        }
        $UserId = Cookie::get('UserId');
        $User= User::where('id',$UserId)->first(); //读取数据库
        if ($User) {
            if(Hash::check($request->password, $User->password)) {//检测密码
                if ($request->newPassword == $request->rePassword) {
                    $data['password'] = Hash::make($request->newPassword);
                     $userupdate = User::ChangeUpdate($UserId,$data);
                     if ($userupdate) {
                           $Userid = Cookie::forget('UserId');
                           return redirect('/Login')->with('info',"修改密码成功")->withCookie($Userid);
                     }else{
                           return back()->with('messages','修改失败');
                     }
                }else{
                    return back()->with('messages','两次密码不一致');
                }
            }else{
                return back()->with('messages','密码不正确');
            }
        }else{
            return back()->with('messages','用户不存在');
        }
    }
    /**
     * 开发人员认证
     * @Author   CarLos(翟)
     * @DateTime 2018-04-04
     * @Email    carlos0608@163.com
     */
    public function AppCert()
    {
        return view('/Home/UserCenter/AppCert');
    }
    /**
     * 执行开发人员认证
     * @Author   CarLos(翟)
     * @DateTime 2018-04-10
     * @Email    carlos0608@163.com
     */
    public function DoAppCert(Request $request)
    {
       $dir = 'uploads/Cert';
       $id_card = 'id_card';
       $license = 'license';
       $UserId = Cookie::get('UserId');
       $Cert = New Cert;
       if (empty($request->file($id_card)) && empty($request->file($license))) {
         return back()->with('info','请至少选择一种身份上传');
       }
       if (!empty($request->file($id_card))) {
            $Cert->id_card= Common::DirUpload($id_card,$request,$dir);
       }
       if (!empty($request->file($license))) {
            $Cert->license= Common::DirUpload($license,$request,$dir);
       }
       $Cert->uid = $UserId;
       $Cert->is_status = 2;
       if ($Cert->save()) {
            return back()->with('info',"提交申请成功,请等待管理员的审核");
        }else{
            return back()->with('info',"提交申请失败");
        }
    }
    /**
     * 用户添加评论
     * @Author   CarLos(翟)
     * @DateTime 2018-04-09
     * @Email    carlos0608@163.com
     */
    public function AddUserComments(Request $request)
    {

      $UserComment = New UserComment;
      $UserComment->content = empty($request->content) ? '' : $request->content;
      $UserComment->star = empty($request->star) ? 0 : $request->star;
      $UserComment->sid = $request->sid;
      $UserComment->uid = Cookie::get('UserId');
      $is_code = DB::table('user_comments')->where('uid',Cookie::get('UserId'))->count('id');
      if ($is_code >= 1) {
          $UserComment->is_code =2;
      }else{
          $UserComment->is_code =1;  
      }
      if ($UserComment->save()) {
        return back()->with('info','评论成功');
      }else{
        return back()->with('info','评论失败');
      }
    }
}
