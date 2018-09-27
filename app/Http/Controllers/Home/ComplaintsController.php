<?php
/**
 * 投诉建
 * Created by PhpStorm.
 * User: 马黎
 * Date: 2018/9/26
 * Time: 15:05
 */

namespace App\Http\Controllers\Home;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Cookie;

class ComplaintsController extends Controller
{
    /**
     * 获取自己投诉建议列表
     */
    public function getList()
    {
        $list = DB::table('complaints')
            ->join('users', 'users.id', '=', 'complaints.uid')
            ->select('users.username','users.header_pic','complaints.content','complaints.addtime','complaints.id','complaints.title','complaints.contact')
            ->latest('complaints.addtime')
            ->get();
        return $list;
    }


    /**
     * 跳转到留言表
     * @return mixed
     * 
     */
    public function create()
    {
        return view('Home.UserCenter.Complaint');
    }

    /**
     * 执行投诉建议动作
     */
    public function doComplaints(Request $request)
    {
        $data['uid'] = Cookie::get('UserId');
        $data['content'] = $request->input('content');
        $data['title'] = $request->input('title');
        $data['contact'] = $request->input('contact');
        $data['addtime'] = date('Y-m-d H:i:s');
        $res = DB::table('complaints')->insert($data);
        if($res){
            $result['msg'] = '留言成功';
            $result['status'] = 1;
        }else{
            $result['msg'] = '意外错误，请稍后再试';
            $result['status'] = 0;
        }

        return view('Home.UserCenter.Complaint');
    }
}
