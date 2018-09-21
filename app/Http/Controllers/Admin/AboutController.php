<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Model\About;
use App\Service\Common;
use App\Http\Requests\AboutPost;
class AboutController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = About::GetAboutOne(1);
        return view('/Admin/Update/AboutUpdate',[
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
        return view('/Admin/Add/AboutAdd');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(AboutPost $request)
    {
        $About = New About;
        $About->title = $request->title;
        $About->content = $request->content;
        if ($About->save()) {
           return redirect('/Admin/About')->with('info','创建成功');
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

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        
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
        $data['content'] = $request->content;
        $up = About::UpdateAbout($id,$data);
        if ($up) {
           return redirect('/Admin/About')->with('info','更新成功');
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
        $up = About::DataDelete($id);
        if ($up) {
           return back()->with('info','删除成功');
        }else{
           return back()->with('info','删除失败');
        }
    }
}
