<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use DB;
use App\Model\Software;
use App\Model\Caty;
class UpController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
		$information = db::table('information')->get();
        if (isset($_GET['is_status'])) {
            $where['software.is_status'] = $_GET['is_status'];
            $page['is_status'] = $_GET['is_status'];
        }else if(isset($_GET['softwaretype']) && isset($_GET['nickname']) && isset($_GET['softwarename'])){
            if (!empty($_GET['softwaretype']) && $_GET['softwaretype'] != 0) {
               $where['software.softwaretype'] = $_GET['softwaretype'];
               $page['softwaretype'] = $_GET['softwaretype'];
               $page['nickname'] = '';
               $page['softwarename'] = '';
            }else{
               $where = []; 
               $page['softwaretype'] = 0;
               $page['nickname'] = '';
               $page['softwarename'] = '';
            }
            if (!empty($_GET['nickname'])) {
                $where['users.nickname'] = $_GET['nickname'];
                $page['nickname'] = $_GET['nickname'];
                $page['softwarename'] = '';
                $page['softwaretype'] = 0;
            }
            if (!empty($_GET['softwarename'])) {
                $where['software.softwarename'] = $_GET['softwarename'];
                $page['softwarename'] = $_GET['softwarename'];
                $page['softwaretype'] = '0';
                $page['nickname'] ='';
            }
            if (empty($_GET['softwaretype']) && empty($_GET['nickname']) && empty($_GET['softwarename'])) {
                $where = [];
                $page['softwarename'] = '';
                $page['softwaretype'] = 0;
                $page['nickname'] ='';
            }
        }else{
            $where = [];
            $page = '';
        }
        $software = DB::table('software')
                    ->join('users', 'users.id', '=', 'software.uid')
                    ->join('caties', 'caties.id', '=', 'software.softwaretype')
                    ->select('software.*','users.nickname','caties.caty_name')
                    ->where($where)
                    ->orderBy('software.id','desc')
                    ->paginate(10);
        foreach ($software as $key => $value) 
        {
           $software[$key]->count = DB::table('user_downs')->where('sid','=',$value->id)->count();
           $software[$key]->comment = DB::table('user_comments')->where('sid','=',$value->id)->count();
        }
        $Caty = Caty::GetCatyHomeAll();
        return view('/Admin/List/SoftWareList',[
            'data'=>$software,
            'Caty'=>$Caty,
            'page'=>$page,
			'information'=>$information,
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
        $software = DB::table('software')
                    ->join('users', 'users.id', '=', 'software.uid')
                    ->join('caties', 'caties.id', '=', 'software.softwaretype')
                    ->select('software.*','users.nickname','users.username','caties.caty_name')
                    ->where('software.id','=',$id)
                    ->first();
        $software->count = DB::table('user_downs')->where('sid','=',$id)->count();
        $software->comment = DB::table('user_comments')->where('sid','=',$id)->count();
        return view('/Admin/Update/UpUpdate',[
                'data'=>$software,
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
        $data['is_status'] = $request->is_status;
        $result = Software::ChangeUpdate($id,$data);
        if ($result) {
           return redirect('/Admin/Up')->with('info','更改成功');
        }else{
           return back()->with('info','更改失败');
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
        $del = Software::GetOne($id);
        if (file_exists('.'.$del['software']) && !empty($del['software'])) {
          $delete_img = unlink('.'.$del['software']);
        }
        if (Software::DataDelete($id)) {
            return back()->with('info','删除成功');
        }else{
            return back()->with('info','删除失败');
        }
    }
	public function status(){
		$id = $_POST['id'];
		$data['is_status'] = 1;

		$re = db::table('software')->where('id',$id)->update($data);
		if ($re) {
			
			$uid = DB::table('software')->where('id',$_POST['id'])->value('uid');
			
			/*** 插入信息提示表*/
			$news['uid'] =$uid;  
			$news['msg'] = $_POST['msg'];
			$news['create_time'] = time();  
			$xinnews = DB::table('news')->insert($news);
           return redirect('/Admin/Up')->with('info','审核成功');
        }else{
           return back()->with('info','审核失败');
        }
	}
	public function UNstatus(){
		$id = $_POST['id'];
		$data['is_status'] = 0;

		$re = db::table('software')->where('id',$id)->update($data);
		if ($re) {
			
			$uid = DB::table('software')->where('id',$_POST['id'])->value('uid');
			
			/*** 插入信息提示表*/
			$news['uid'] =$uid;  
			$news['msg'] = $_POST['msg'];
			$news['create_time'] = time();  
			$xinnews = DB::table('news')->insert($news);
           return redirect('/Admin/Up')->with('info','审核成功');
        }else{
           return back()->with('info','审核失败');
        }
	}
	

    /**
     * 执行个性推荐
     * @Author   CarLos(翟)
     * @DateTime 2018-04-10
     * @Email    carlos0608@163.com
     * @param    [type]             $id [description]
     * @return   [type]                 [description]
     */
    public function person($id)
    {
		
        $data['is_person'] = 1;
        $data['recommen_time'] = time();
        $result = Software::ChangeUpdate($id,$data);
        if ($result) {
           return redirect('/Admin/Up')->with('info','更改成功');
        }else{
           return back()->with('info','更改失败');
        }
    }
    /**
     *  取消个性推荐
     * @Author   CarLos(翟)
     * @DateTime 2018-04-10
     * @Email    carlos0608@163.com
     * @param    [type]             $id [description]
     */
    public function UNperson($id)
    {
        $data['is_person'] = 0;
        $data['recommen_time'] = '';
        $result = Software::ChangeUpdate($id,$data);
        if ($result) {
           return redirect('/Admin/Up')->with('info','更改成功');
        }else{
           return back()->with('info','更改失败');
        }
    }


    public function shuff($id)
    {
        $data['is_shuff'] = 1;
        $data['shuff_time'] = time();
        $result = Software::ChangeUpdate($id,$data);
        if ($result) {
           return redirect('/Admin/Up')->with('info','更改成功');
        }else{
           return back()->with('info','更改失败');
        }
    }

    public function UNshuff($id)
    {
        $data['is_shuff'] = 0;
        $data['shuff_time'] = '';
        $result = Software::ChangeUpdate($id,$data);
        if ($result) {
           return redirect('/Admin/Up')->with('info','更改成功');
        }else{
           return back()->with('info','更改失败');
        }
    }

    public function down($id)
    {
        $data = Software::GetOne($id);
        $pathToFile = '.'.$data->software;
        return response()->download($pathToFile);
    }

    public function UNdelete()
    {
        $id = $_GET['id'];
        $del = Software::GetOne($id);
        if (file_exists('.'.$del['software']) && !empty($del['software'])) {
            $delete_img = unlink('.'.$del['software']);
        }

        if (Software::DataDelete($id)) {
            echo json_encode(['code'=>1,'msg'=>'删除成功']);
        }else{
            echo json_encode(['code'=>0,'msg'=>'删除失败']);
        }
    }
}
