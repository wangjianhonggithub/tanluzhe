<?php
namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Validator;

class InformationController extends Controller
{
    public function index()
    {
		
		$data = DB::table('information')->orderBy('addtime','desc')->paginate(10);

		
		return view('Admin.Information.list',[
            'data'=>$data,
        ]);
		
    }
	
	public function create(){
		$error = array();
		return view('/Admin/Add/InformationAdd',[
			'error'=>$error,
		]);
	}
	//添加
	public function InformationAdd(Request $request){
		$error = '';
		$rules = [
			'liuyan' => 'required',
		]; 
		$messages = [
			'liuyan.required' => '留言信息是必填的',
		];
		$validator = Validator::make($request->all(), $rules, $messages); 
		if ($validator->fails()) { 
			$error = json_decode($validator->errors(),true);
			//echo count($validator->errors());die();
			//$error = $validator->errors();
			//return back()->with('error',$error);
			return view('/Admin/Add/InformationAdd',[
            'error'=>$error,
        ]);
			//return readdir('/Admin/Information/create')->with('error',$validator->errors);
			//$mse = json_decode($validator->errors(),true);
			//var_dump($error);die();
		}
		$data['liuyan'] = $request->input('liuyan'); 
		$data['type'] = $request->input('type');
		$data['addtime'] = time();
		$re = db::table('information')->insert($data);
		if($re){
			return redirect('/Information/list')->with('info','添加成功');
		}else{
			return back()->with('info','添加失败');
		}
	}
	//修改
	public function Information(){
		//echo $_GET['id'];die();
		$error = '';
		$id = $_GET['id'];
		$information = db::table('information')->where('id',$id)->first();
		//var_dump($information);
		return view('/Admin/Update/InformationUp',[
			'error'=>$error,
			'information'=>$information,
		]);
	}
	public function InformationUp(Request $request){
		$information = db::table('information')->where('id',$request->input('id'))->first();
		$error = '';
		$rules = [
			'liuyan' => 'required',
		]; 
		$messages = [
			'liuyan.required' => '留言信息是必填的',
		];

		$validator = Validator::make($request->all(), $rules, $messages); 
		if ($validator->fails()) { 
			$error = json_decode($validator->errors(),true);
			return view('/Admin/Update/InformationUp',[
				'error'=>$error,
				'information'=>$information,
			]);
		}
		$data['liuyan'] = $request->input('liuyan'); 
		$data['type'] = $request->input('type');
		$data['addtime'] = time();
		$re = db::table('information')->where('id',$request->input('id'))->update($data);
		if($re){
			return redirect('/Information/list')->with('info','修改成功');
		}else{
			return back()->with('info','修改失败');
		}
	}
	//删除
	public function InformationDel()
    {
        $id = $_GET['id'];
		$re = db::table('information')->where('id',$id)->delete();
		if($re){
            echo json_encode(['code'=>1,'msg'=>'删除成功']);
        }else{
            echo json_encode(['code'=>0,'msg'=>'删除失败']);
        }
	}

}
