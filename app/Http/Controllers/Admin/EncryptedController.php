<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Model\Encrypted;
use App\Http\Requests\EncryptedPost;
class EncryptedController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
       $data = Encrypted::GetEncryptedAll();
       return view('/Admin/List/EncryptedList',[
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
        return view('/Admin/Add/EncryptedAdd');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(EncryptedPost $request)
    {
        $Encrypted = New Encrypted;
        $Encrypted->encry = $request->encry;
        if ($Encrypted->save()) {
           return redirect('/Admin/Encrypted')->with('info','创建成功');
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
        $data = Encrypted::GetEncryptedOne($id);
        return view('/Admin/Update/EncryptedUp',[
            'Update'=>$data,
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
        $data['encry'] = $request->encry;
        if (Encrypted::UpdateEncrypted($id,$data)) {
           return redirect('/Admin/Encrypted')->with('info','修改成功');
        }else{
           return back()->with('info','修改失败');
        }
    }

    public function EncryptedDelete()
    {   
        $id = $_GET['id'];
        $res = Encrypted::DataDelete($id);
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
        $res = Encrypted::DataDelete($id);
        if ($res) {
           return redirect('/Admin/Encrypted')->with('info','删除成功');
        }else{
           return back()->with('info','删除失败');
        }
    }
}
