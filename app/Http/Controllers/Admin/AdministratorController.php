<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Model\AdminUser;
use App\Http\Requests\AdminUserPost;
use Illuminate\Support\Facades\Hash;
use Cookie;
class AdministratorController extends Controller
{
    /**
     * 显示管理员列表
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $result = AdminUser::GetData();
        return view('Admin/List/AdministratorList',[
                'data'=>$result,
            ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('Admin/Add/AdministratorAdd',[
            ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(AdminUserPost $request)
    {
        $result = New AdminUser;
        $result->username = $request->username;
        $result->password = Hash::make($request->password);
        $result->nickname = $request->nickname;
        $result->status = $request->status;
        $res =$result->save();
        if ($res) {
           return redirect('/Admin/Administrator')->with('info','创建成功');
        }else{
           return back()->with('info','创建失败');
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
        $result = AdminUser::GetOne($id);
         return view('Admin/Update/AdministratorUpdate',[
            'data'=>$result,
            ]);
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
        $data['username'] = $request->username;
        $data['password'] = $request->password;
        $data['nickname'] = $request->nickname;
        $data['status'] = $request->status;
        $res = AdminUser::ChangeUpdate($id,$data);
        if ($res) {
           return redirect('/Admin/Administrator')->with('info','修改成功');
        }else{
           return back()->with('info','修改失败');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $res = AdminUser::DataDelete($id);
        if ($res) {
           return back()->with('info','删除成功');
        }else{
           return back()->with('info','删除失败');
        }
    }

    public function UpdatePassword()
    {
        return view('/Admin/Update/AdmminUserUpdatePasswd');
    }

    /**
     * 执行修改密码
     */
    public function DoUpdatePassword(Request $request)
    {
        $id = Cookie::get('AdminUserId');
        if ($request->password == '' && $request->repassword == '') {
            return back()->with('info','请全部填写完成');
        }else if($request->password != $request->repassword){
            return back()->with('info','两次密码不一致');
        }else{
            $data['password'] = Hash::make($request->password);
            if(AdminUser::ChangeUpdate($id,$data)){
                $AdminUserId =Cookie::forget('AdminUserId');
                return redirect('/Admin/Login')->with('info',"修改成功")->withCookie($AdminUserId);
            }else{
                return back()->with('info','修改失败');
            }
        }
    }

    public function admindelete()
    {
        $id = $_GET['id'];
        $res = AdminUser::DataDelete($id);

        if ($res) {
            echo json_encode(['code'=>1,'msg'=>'删除成功']);
        }else{
            echo json_encode(['code'=>0,'msg'=>'删除失败']);
        }
    }
}
