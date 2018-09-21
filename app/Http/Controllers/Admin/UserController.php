<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Model\User;
class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if (isset($_GET['is_cert'])) {
            $where['is_cert'] = $_GET['is_cert'];
            $page['is_cert'] = $_GET['is_cert'];
        }else if(isset($_GET['is_freeze'])){
            $where['is_freeze'] = $_GET['is_freeze'];
            $page['is_freeze'] = $_GET['is_freeze'];
        }else if(isset($_GET['username']) && isset($_GET['nickname'])){
            if (!empty($_GET['username'])) {
                $where['username'] = $_GET['username'];
                $page='';
            }
            if (!empty($_GET['nickname'])) {
                $where['nickname'] = $_GET['nickname'];
                $page='';
            }
        }else{
            $where = [];
            $page='';
        }
        $data = User::GetSearchUserAll($where);
        return view('/Admin/List/UserList',[
            'data'=>$data,
            'page'=>$page,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
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
        $data = User::GetOne($id);
        return view('/Admin/Update/UserUpdate',[
            'data'=>$data,
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
       $data['is_freeze'] = $request->is_freeze;
       $res = User::ChangeUpdate($id,$data);
       if ($res) {
           return redirect('/Admin/User')->with('info','修改成功');
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
        //
    }
}
