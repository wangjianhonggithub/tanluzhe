<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Model\Caty;
use App\Http\Requests\CatyPost;
class CatyController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = Caty::GetCatyAll();
        return view('/Admin/List/CatyList',[
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
        return view('/Admin/Add/CatyAdd');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CatyPost $request)
    {
        $Caty = New Caty;
        $Caty->pid = isset($request->pid) ? $request->pid : 0;
        $Caty->caty_name = $request->caty_name;
        if ($Caty->save()) {
           return redirect('/Admin/Caty')->with('info','创建成功');
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
        $data = Caty::GetCatyOne($id);
        return view('/Admin/Update/CatyUpdate',[
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
        $data['pid'] = isset($request->pid) ? $request->pid : 0;
        $data['caty_name'] = $request->caty_name;
        if (Caty::UpdateCaty($id,$data)) {
           return redirect('/Admin/Caty')->with('info','修改成功');
        }else{
           return back()->with('info','修改失败');
        }
    }
    /**
     * 删除操作
     */
    public function CatyDelete()
    {   
        $id = $_GET['id'];
        $res = Caty::DataDelete($id);
        if ($res) {
           echo json_encode(['code'=>1,'msg'=>'删除成功']);
        }else{
           echo json_encode(['code'=>0,'msg'=>'删除失败']);
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
        $res = Caty::DataDelete($id);
        if ($res) {
           return redirect('/Admin/Caty')->with('info','删除成功');
        }else{
           return back()->with('info','删除失败');
        }
    }
}
