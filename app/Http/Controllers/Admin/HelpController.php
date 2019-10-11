<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Model\Help;
use App\Http\Requests\HelpPost;
class HelpController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
       $data = Help::GetHelpAll();
       return view('/Admin/List/HelpList',[
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
        return view('/Admin/Add/HelpAdd');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(HelpPost $request)
    {
        $Help = New Help;
        $Help->title = $request->title;
        $Help->description = $request->description;
        $Help->content = $request->content;
        if ($Help->save()) {
           return redirect('/Admin/Help')->with('info','创建成功');
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
        $data = Help::GetOne($id);
        return view('/Admin/Update/HelpUp',[
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
       $data['title'] = $request->title;
       $data['description'] = $request->description;
       $data['content'] = $request->content;
       if (Help::ChangeUpdate($id,$data)) {
           return redirect('/Admin/Help')->with('info','修改成功');
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
        if(Help::DataDelete($id)){
           return back()->with('info','删除成功');
        }else{
           return back()->with('info','删除失败');
        }
    }

    public function helpdelete()
    {
        $id = $_GET['id'];
        if(Help::DataDelete($id)){
            echo json_encode(['code'=>1,'msg'=>'删除成功']);
        }else{
            echo json_encode(['code'=>0,'msg'=>'删除失败']);
        }
    }
}
