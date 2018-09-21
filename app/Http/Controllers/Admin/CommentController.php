<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use DB;
use App\Model\UserComment;
class CommentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if (isset($_GET['nickname']) && isset($_GET['softwarename'])) {
           if (!empty($_GET['nickname'])) {
              $userid = DB::table('users')->where('nickname',$_GET['nickname'])->first();
              if ($userid) {
                  $where['user_comments.uid'] = $userid->id;
                  $page['nickname'] = $_GET['nickname'];
                  $page['softwarename'] = '';
              }else{
                  $where = [];
                  $page['nickname'] = '';
                  $page['softwarename'] = '';
              }
           }
           if (!empty($_GET['softwarename'])) {
              $softid = DB::table('software')->where('softwarename',$_GET['softwarename'])->first();
              if ($softid) {
                  $where['user_comments.sid'] = $softid->id;
                  $page['softwarename'] = $_GET['softwarename'];
                  $page['nickname'] = '';
              }else{
                  $where = [];  
                  $page['softwarename'] = '';
                  $page['nickname'] = '';
              }
           }
           if (empty($_GET['softwarename']) && empty($_GET['nickname'])) {
               $where = [];  
               $page['softwarename'] = '';
               $page['nickname'] = '';
           }
        }else{
            $where = [];
            $page = '';
        }
        $comment =  DB::table('user_comments')
                ->join('users', 'users.id', '=', 'user_comments.uid')
                ->join('software', 'software.id', '=', 'user_comments.sid')
                ->where($where)
                ->select('software.softwarename','user_comments.id','software.description','software.cover', 'user_comments.content','user_comments.created_at','users.nickname','users.header_pic')
                ->orderBy('user_comments.id','desc')
                ->paginate(10);
        return view('/Admin/List/CommentList',[
            'data'=>$comment,
            'softwarePage'=>$page,
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
       
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data = UserComment::GetUserCommentOne($id);
        return view('/Admin/Update/CommentInfo',[
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
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        if (UserComment::DataDelete($id)) {
            return back()->with('info','删除成功');
        }else{
            return back()->with('info','删除失败');
        }
    }
}
