<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Model\Nav;
use App\Http\Requests\NavPost;
class NavController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = Nav::GetNavAll();
        return view('/Admin/List/NavList',[
            'data'=>$data,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
       return view('/Admin/Add/NavAdd');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(NavPost $request)
    {
        $Nav = New Nav;
        $Nav->nav_name = $request->nav_name;
        if ($Nav->save()) {
           return redirect('/Admin/Nav')->with('info','创建成功');
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
        $result = Nav::GetNavOne($id);
        return view('/Admin/Update/NavUpdate',[
            'Nav'=>$result,
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
        $data['nav_name'] = $request->nav_name;
        $res = Nav::UpdateNav($id,$data);
        if ($res) {
           return redirect('/Admin/Nav')->with('info','更新成功');
        }else{
           return back()->with('info','更新失败');
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
        $res = Nav::DataDelete($id);
        if ($res) {
           return back()->with('info','删除成功');
        }else{
           return back()->with('info','删除失败');
        }
    }
}
