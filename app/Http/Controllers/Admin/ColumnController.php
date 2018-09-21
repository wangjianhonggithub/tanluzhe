<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\StoreColumnPost;
use App\Model\Column;
use App\Service\Common;
class ColumnController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = Column::GetColumnAll();
        $tree = Common::tree($data);
        return view('Admin/List/ColumnList',[
                'data'=>$tree,
                ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {   
       $data = Column::GetColumnAll();
       $tree = Common::tree($data);
       return view('Admin/Add/ColumnAdd',[
                'data'=>$tree,
                ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreColumnPost $request)
    {
        $data['name'] = $request->name;
        $data['url'] = $request->url;
        $data['pid'] = $request->pid;
        $data['icon'] = $request->icon;
        $data['create_time'] = time();
        $data['update_time'] = time();
        $res = Column::AddColumn($data);
        if ($res) {
           return redirect('/Admin/Column')->with('info','创建成功');
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
        $result['Update'] = Column::GetOne($id);
        $data = Column::GetColumnAll();
        $result['tree'] = Common::tree($data);
        return view('/Admin/Update/ColumnUpdate',$result);
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
        $data['name'] = $request->name;
        $data['url'] = $request->url;
        $data['pid'] = $request->pid;
        $data['icon'] = $request->icon;
        $data['update_time'] = time();
        $res = Column::ChangeUpdate($id,$data);
        if ($res) {
           return redirect('/Admin/Column')->with('info','修改成功');
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
        $res = Column::DataDelete($id);
        if ($res) {
           return redirect('/Admin/Column')->with('info','删除成功');
        }else{
           return back()->with('info','删除失败');
        }
    }
    
}
