<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Model\AdvImage;
use App\Service\Common;
class AdvImageController extends Controller
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
        $data = AdvImage::GetAdvImageOne($id);
        return view('/Admin/Update/AdvImageUpdate',[
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
        $dir = 'uploads/AdvImage';
        $uploadname_inds = 'ind_s';
        $uploadname_indx = 'ind_x';
        $uploadname_indz = 'ind_z';
        $uploadname_listh = 'list_h';
        $uploadname_lists = 'list_s';
        $uploadname_listx = 'list_x';
        $uploadname_infobz = 'info_bz';
        $uploadname_infobc = 'info_bc';
        $uploadname_infoby = 'info_by';
        $uploadname_infobcy = 'info_bcy';
        $uploadname_infoz = 'info_z';
        $del = AdvImage::GetAdvImageOne($id);
        if (!empty($request->ind_s)) {
           Common::Del_Image($request,$del,$uploadname_inds);
           $data['ind_s'] = Common::DirUpload($uploadname_inds,$request,$dir);
        }
        if (!empty($request->ind_x)) {
           Common::Del_Image($request,$del,$uploadname_indx);
           $data['ind_x'] = Common::DirUpload($uploadname_indx,$request,$dir);
        }
        if (!empty($request->ind_z)) {
           Common::Del_Image($request,$del,$uploadname_indz);
           $data['ind_z'] = Common::DirUpload($uploadname_indz,$request,$dir);
        }
        if (!empty($request->list_h)) {
           Common::Del_Image($request,$del,$uploadname_listh);
           $data['list_h'] = Common::DirUpload($uploadname_listh,$request,$dir);
        }
        if (!empty($request->list_s)) {
           Common::Del_Image($request,$del,$uploadname_lists);
           $data['list_s'] = Common::DirUpload($uploadname_lists,$request,$dir);
        }
        if (!empty($request->list_x)) {
           Common::Del_Image($request,$del,$uploadname_listx);
           $data['list_x'] = Common::DirUpload($uploadname_listx,$request,$dir);
        }
        if (!empty($request->info_bz)) {
           Common::Del_Image($request,$del,$uploadname_infobz);
           $data['info_bz'] = Common::DirUpload($uploadname_infobz,$request,$dir);
        }
        if (!empty($request->info_bc)) {
           Common::Del_Image($request,$del,$uploadname_infobc);
           $data['info_bc'] = Common::DirUpload($uploadname_infobc,$request,$dir);
        }
        if (!empty($request->info_by)) {
           Common::Del_Image($request,$del,$uploadname_infoby);
           $data['info_by'] = Common::DirUpload($uploadname_infoby,$request,$dir);
        }
        if (!empty($request->info_z)) {
           Common::Del_Image($request,$del,$uploadname_infoz);
           $data['info_z'] = Common::DirUpload($uploadname_infoz,$request,$dir);
        }
        if (!empty($request->info_bcy)) {
           Common::Del_Image($request,$del,$uploadname_infobcy);
           $data['info_bcy'] = Common::DirUpload($uploadname_infobcy,$request,$dir);
        }
        if (AdvImage::UpdateAdvImage($id,$data)) {
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
