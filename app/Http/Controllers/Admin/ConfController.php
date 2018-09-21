<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Model\Conf;
use App\Service\Common;
class ConfController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
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
       
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data = Conf::GetConfOne($id);
        return view('/Admin/Update/ConfUpdate',[
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
        $uploadname_logo = 'logo';
        $uploadname_qr_code = 'qr_code';
        $uploadname_c_map = 'c_map';
        $dir = 'uploads/Conf';
        $del = Conf::GetConfOne($id);
        if (!empty($request->logo)) {
           if (file_exists('.'.$del['logo']) && !empty($del['logo'])) {
              $delete_img = unlink('.'.$del['logo']);
           }
           $data['logo'] = Common::DirUpload($uploadname_logo,$request,$dir);
        }
        if (!empty($request->qr_code)) {
           if (file_exists('.'.$del['qr_code']) && !empty($del['qr_code'])) {
              $delete_img = unlink('.'.$del['qr_code']);
           }
           $data['qr_code'] = Common::DirUpload($uploadname_qr_code,$request,$dir);
        }
        if (!empty($request->c_map)) {
           if (file_exists('.'.$del['c_map']) && !empty($del['c_map'])) {
              $delete_img = unlink('.'.$del['c_map']);
           }
           $data['c_map'] = Common::DirUpload($uploadname_c_map,$request,$dir);
        }
        $data['logo_int'] = $request->logo_int;
        $data['email'] = $request->email;
        $data['address'] = $request->address;
        $data['mobile'] = $request->mobile;
        $data['zip_code'] = $request->zip_code;
        $data['switchboard'] = $request->switchboard;
        $data['adv_mobile'] = $request->adv_mobile;
        $data['record'] = $request->record;
        $data['up_ins'] = $request->up_ins;
        $data['vip_ins'] = $request->vip_ins;
        $data['upload_rules'] = $request->upload_rules;
        if (Conf::UpdateConf($id,$data)) {
           return back()->with('info','更新成功');
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
        //
    }
}
