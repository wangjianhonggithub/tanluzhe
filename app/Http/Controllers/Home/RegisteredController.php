<?php

namespace App\Http\Controllers\Home;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Model\Conf;
use App\Model\User;
use App\Model\Encrypted;
use App\Http\Requests\UserPost;
use Illuminate\Support\Facades\Hash;
use App\Service\Common;
use Cookie;
class RegisteredController extends Controller
{
    public function Registered()
    {
    	$data = Conf::GetConfOne(1);
        $Encrypted = Encrypted::EncryptedAll();
        return view('/Home/User/Registered',[
        	'Registered'=>$data,
            'Encrypted'=>$Encrypted,
        ]);
    }

    public function DoRegistered(UserPost $request)
    {
    	$User = New User;
        $User->username = $request->username;
        $User->password = Hash::make($request->password);
        $User->email = $request->email;
        $User->mobile = $request->mobile;
        $User->encrypted = $request->encrypted;
        $User->answer = $request->answer;
        $User->header_pic = 'default.jpg';
        $User->nickname = $request->mobile;
        $User->is_cert = 0;
        if ($User->save()) {
           return redirect('/Login')->with('info','注册成功');
        }else{
           return back()->with('info','注册失败');
        }

    }

    public function SMSCheck()
    {
        $mobile = $_GET['mobile'];
        $result = Common::SmsValidation($mobile);
        echo json_encode($result);
    }
    /**
     * 检测验证码
     * @Author   CarLos(翟)
     * @DateTime 2018-03-30
     * @Email    carlos0608@163.com
     */
    public function CheckSMS()
    {
        $code = Cookie::get('code');
        $reCode = $_GET['reCode'];
        if ($code == $reCode) {
           echo json_encode(['code'=>'success']);
        }else{
           echo json_encode(['code'=>'error']);
        }
    }
}
