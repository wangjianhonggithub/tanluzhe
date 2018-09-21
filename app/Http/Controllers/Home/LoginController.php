<?php

namespace App\Http\Controllers\Home;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Model\Conf;
use App\Model\User;
use Illuminate\Support\Facades\Hash;
use Cookie;
use DB;
use App\Service\Common;
use App\Service\CarLosMailer;
class LoginController extends Controller
{
    public function Login()
    {
    	$data = Conf::GetConfOne(1);
        return view('/Home/User/Login',[
        	'Login'=>$data,
        ]);
    }

    public function DoLogin(Request $request)
    {
    	$username = $request->username;
        $password = $request->password;
        if (empty($username)&&empty($password)) {
            return back()->with('info','请填写用户名和密码');
        }else{
            $User= User::where('username',$username)->first(); //读取数据库
            if ($User) {
            	if(Hash::check($request->password, $User->password)) {//检测密码
	                if ($User->is_freeze == 1) {
	                    $UserId = Cookie::make('UserId', $User->id);
	                    return redirect('/UserCenter')->with('info',"登录成功")->withCookie($UserId);
	                }else{
	                    return back()->with('info','您的账号已经被禁用');
	                }
	            }else{
	                return back()->with('info','密码不正确');
	            }
            }else{
            	return back()->with('info','账号不正确');
            }
        }
    }
    /**
     * 执行退出登录
     * @Author   CarLos(翟)
     * @DateTime 2018-05-04
     * @Email    carlos0608@163.com
     * @return   [type]             [description]
     */
    public function LoginOut()
    {
       $UserId =Cookie::forget('UserId');
       return redirect('/')->with('info',"退出成功")->withCookie($UserId);
    }

    public function Forgot()
    {
        return view('/Home/User/Forgot');
    }

    /**
     * 检测手机
     */
    public function CheckMobile()
    {
        return view('/Home/User/CheckMobile');
    }
    /**
     * 执行检测手机号找回密码
     * @Author   CarLos(翟)
     * @DateTime 2018-04-09
     * @Email    carlos0608@163.com
     */
    public function DoCheckMobile()
    {
        $username = $_GET['username'];
        $user = DB::table('users')->where('username','=',$username)->first();
        if ($user) {
            echo json_encode(['code'=>1,'data'=>$user->mobile]);
        }else{
            echo json_encode(['code'=>0,'data'=>'用户名不存在!!!']);
        } 
    }
    /**
     * 执行发送验证码
     * @Author   CarLos(翟)
     * @DateTime 2018-04-09
     * @Email    carlos0608@163.com
     */
    public function DoCheckReCode()
    {
        $mobile = $_GET['mobile'];
        $result = Common::SmsValidation($mobile);
        echo json_encode($result);
    }
    /**
     * 执行检测验证码是否正确
     * @Author   CarLos(翟)
     * @DateTime 2018-04-09
     * @Email    carlos0608@163.com
     */
    public function DoCheckReCodeInfo()
    {
        $code = Cookie::get('code');
        $reCode = $_GET['reCode'];
        if ($code == $reCode) {
           echo json_encode(['code'=>'success']);
        }else{
           echo json_encode(['code'=>'error']);
        }
    }

    public function DoCheckMobilePassword(Request $request)
    {
        $username = $request->username;
        $password = Hash::make($request->password);
        $res = DB::table('users')
                ->where('username','=',$username)
                ->update(['password'=>$password]);
        if ($res) {
            echo 1;
        }else{
            echo 0;
        }
    }
    /**
     * 检测密保
     */
    public function CheckEncrypted()
    {
        return view('/Home/User/CheckEncrypted');
    }
    /**
     * 检测用户名
     * @Author   CarLos(翟)
     * @DateTime 2018-04-09
     * @Email    carlos0608@163.com
     */
    public function DoCheckUserName()
    {
        $username = $_GET['username'];
        $user = DB::table('users')->where('username','=',$username)->first();
        if ($user) {
            $encrypted = DB::table('users')->join('encrypteds', 'encrypteds.id', '=', 'users.encrypted')->where('username','=',$username)->select('encrypteds.*')->first();
            if ($encrypted) {
                echo json_encode(['code'=>1,'data'=>$encrypted]);
            }else{
                echo json_encode(['code'=>2,'data'=>'运营方出错!!!']);
            }
        }else{
            echo json_encode(['code'=>0,'data'=>'用户名不存在!!!']);
        } 
    }

    /**
     * 检测密保答案是否正确
     * @Author   CarLos(翟)
     * @DateTime 2018-04-09
     * @Email    carlos0608@163.com
     */
    public function DoCheckEncrypted()
    {
        $username = $_GET['username'];
        $answer = $_GET['answer'];
        $user = DB::table('users')->where('username','=',$username)->first();
        if ($answer == $user->answer) {
             echo json_encode(['code'=>1,'data'=>'你的密保答案是正确的']);
        }else{
             echo json_encode(['code'=>0,'data'=>'很遗憾您的密保答案是错误的']);
        }
    }
    /**
     * 检测邮箱CheckEmail
     */
    public function CheckEmail()
    {
        return view('/Home/User/CheckEmail');
    }

    public function DoCheckUserNameEmail()
    {
        $username = $_GET['username'];
        $user = DB::table('users')->where('username','=',$username)->first();
        if ($user) {
            echo json_encode(['code'=>1,'data'=>$user->email,'nickname'=>$user->nickname]);
        }else{
            echo json_encode(['code'=>0,'data'=>'用户名不存在!!!']);
        }
    }



    public function DoCheckUserNameEmailCode()
    {
        $code = Cookie::get('EmailCode');
        $reCode = $_GET['reCode'];
        if ($code == $reCode) {
           echo json_encode(['code'=>'success']);
        }else{
           echo json_encode(['code'=>'error']);
        }
    }
    /**
     * 邮件发接口
     * @Author   CarLos(翟)
     * @DateTime 2018-04-10
     * @Email    carlos0608@163.com
     */
    public function DoCheckEmail()
    {
        $toMail = $_GET['email'];
        $code = rand(1000,9999);
        $nickname = $_GET['nickname'];
        $data = CarLosMailer::SendEmail($toMail,$code,$nickname);
        echo $data;
    }


}
