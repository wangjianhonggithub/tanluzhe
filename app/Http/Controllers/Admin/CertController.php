<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use DB;
use App\Model\Cert;
use App\Model\User;
class CertController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if (isset($_GET['is_cert'])) {
            $where['users.is_cert'] = $_GET['is_cert'];
            $page['is_cert'] = $_GET['is_cert'];
        }else if(isset($_GET['username']) && isset($_GET['nickname']) && isset($_GET['mobile']) && isset($_GET['email'])){
            if (!empty($_GET['username'])) {
                $where['users.username'] = $_GET['username'];
            }
            if (!empty($_GET['nickname'])) {
                $where['users.nickname'] = $_GET['nickname'];
            }
            if (!empty($_GET['mobile'])) {
                $where['users.mobile'] = $_GET['mobile'];
            }
            if (!empty($_GET['email'])) {
                $where['users.email'] = $_GET['email'];
            }
            if (empty($_GET['username']) && empty($_GET['nickname']) && empty($_GET['mobile']) && empty($_GET['email'])) {
                $where = [];
            }
            $page = '';
        }else{
            $where = [];
            $page = '';
        }
        $Certs = DB::table('certs')->join('users', 'users.id', '=', 'certs.uid')->where($where)->select('certs.*','users.nickname','users.username','users.mobile','users.email','users.is_cert')->orderBy('certs.id','desc')->paginate(15);
        return view('/Admin/List/CertList',[
            'data'=>$Certs,
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
        $data = Cert::GetCertOne($id);
        return view('/Admin/Update/CertShow',[
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
        //
    }

    /**
     * 审核通过
     */
    public function status()
    {
        $id = $_GET['id'];
        $GetOne = Cert::GetCertOne($id);
        $data['is_status'] = 1;
        if (Cert::UpdateCert($id,$data)) {
            $res['is_cert'] = 1;
            if (User::ChangeUpdate($GetOne->uid,$res)) {
                /**
                 * 插入信息提示表
                 */
                $news['uid'] =$GetOne->uid;  
                $news['msg'] = '恭喜您,您的认证信息已经审核通过了';
                $news['create_time'] = time();
                $xinnews = DB::table('news')->insert($news);
                if ($xinnews) {
                    echo json_encode(['code'=>1,'meg'=>'更新成功']);
                }else{
                    echo json_encode(['code'=>0,'meg'=>'更新失败']);
                }
            }else{
                echo json_encode(['code'=>0,'meg'=>'更新失败']);
            }
        }else{
            echo json_encode(['code'=>2,'meg'=>'状态更改失败,或者已认证完毕']);
        }
    }

    public function UnStatus()
    {   
        $id = $_GET['id'];
        $GetOne = Cert::GetCertOne($id);
        $data['is_status'] = 0;
        if (Cert::UpdateCert($id,$data)) {
            $res['is_cert'] = 0;
            if (User::ChangeUpdate($GetOne->uid,$res)) {
                /**
                 * 插入信息提示表
                 */
                $news['uid'] =$GetOne->uid;  
                $news['msg'] = '很遗憾您的认证信息审核未通过,原因是:'.$_GET['msg'];
                $news['create_time'] = time();  
                $xinnews = DB::table('news')->insert($news);
                if ($xinnews) {
                    echo json_encode(['code'=>1,'meg'=>'更新成功']);
                }else{
                    echo json_encode(['code'=>0,'meg'=>'更新失败']);
                }
            }else{
                echo json_encode(['code'=>0,'meg'=>'更新失败']);
            }
        }else{
            echo json_encode(['code'=>2,'meg'=>'状态更改失败,或者已认证完毕']);
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
        $res = Cert::DataDelete($id);
        if ($res) {
           return redirect('/Admin/Cert')->with('info','删除成功');
        }else{
           return back()->with('info','删除失败');
        }
    }
}
