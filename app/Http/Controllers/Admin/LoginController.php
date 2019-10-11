<?php
namespace App\Http\Controllers\Admin;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Model\AdminUser;
use Hash;
use Cookie;
class LoginController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
      return view('Admin/Login');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
       $AdminUserId =Cookie::forget('AdminUserId');
       return redirect('/Admin/Login')->with('info',"退出成功")->withCookie($AdminUserId);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $username = $request->username;
        $password = $request->password;
        if (empty($username) || empty($password)) {
            return back()->with('info','请填写用户名和密码');
        }else{
            $AdminUser = AdminUser::where('username',$username)->first(); //读取数据库

            if (!$AdminUser) {
                return back()->with('info','账户错误！请检查后重新输入');
            }

            if(Hash::check($request->password, $AdminUser->password)) {//检测密码
                if ($AdminUser->status == 1) {
                    $AdminUserId = Cookie::make('AdminUserId', $AdminUser->id);
                    return redirect('/Admin/Administrator')->with('info',"登录成功")->withCookie($AdminUserId);
                }else{
                    return back()->with('info','您的账号已经被禁用');
                }
            }else{
                return back()->with('info','密码不正确');
            }
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
