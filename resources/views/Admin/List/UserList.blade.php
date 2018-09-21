@extends('Admin.Base')
@section('content')
<strong class="col-md-4 col-md-offset-4  alert-success">{{Session::get('info')}}</strong>
<div class="panel">
    <div class="panel-heading">
        <h3 class="panel-title">列表</h3>
    </div>
    <div id="demo-custom-toolbar2" class="table-toolbar-left">
        <a href="/Admin/User?is_cert=1" id="demo-dt-addrow-btn" class="btn btn-primary">已认证</a> 
        <a href="/Admin/User?is_cert=0" id="demo-dt-addrow-btn" class="btn btn-primary">未认证</a> 
        <a href="/Admin/User?is_freeze=1" id="demo-dt-addrow-btn" class="btn btn-primary">启用</a> 
        <a href="/Admin/User?is_freeze=0" id="demo-dt-addrow-btn" class="btn btn-primary">禁用</a> 
        <div class="col-m-5 col-offset-4" style="float: right;margin-left:950px;">
        <form action="/Admin/User" method="get" accept-charset="utf-8">
           账号:<input type="text" name="username">
           昵称:<input type="text" name="nickname">
           <input type="submit" name="" value="搜索">
        </form>
        </div>
    </div>
    <div class="panel-body">
        
        <table id="demo-dt-addrow" class="table table-striped table-bordered" cellspacing="0" width="100%">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>账号</th>
                    <th class="min-tablet">昵称</th>
                    <th class="min-tablet">头像</th>
                    <th class="min-desktop">认证状态</th>
                    <th class="min-desktop">时间</th>
                    <th class="min-desktop">状态</th>
                    <th class="min-desktop">操作</th>
                </tr>
            </thead>
            <tbody>
                @foreach($data as $v)
                <tr>
                    <td>{{$v->id}}</td>
                    <td>{{$v->username}}</td>
                    <td>{{$v->nickname}}</td>
                    <td><img src="{{$v->header_pic}}" width="60" height="60" alt=""></td>
                    @if($v->is_cert == 1)
                    <td class="label label-table label-success">已认证</td>
                    @else
                    <td class="label label-table label-danger">未认证</td>
                    @endif
                    <td>{{$v->created_at}}</td>
                    @if($v->is_freeze == 1)
                    <td class="label label-table label-success">启用</td>
                    @else
                    <td class="label label-table label-danger">禁用</td>
                    @endif
                    <td>
                    	<a href="/Admin/User/{{$v->id}}/edit" class="btn btn-xs btn-rounded btn-warning">查看信息</a>
                       <!--  <form action="/Admin/Nav/{{$v->id}}" method="POST" style="display: inline;" accept-charset="utf-8">
                            {{ method_field('DELETE') }}
                            {{ csrf_field() }}
                           <button class="btn btn-xs btn-rounded btn-danger">删除</button>
                        </form> -->
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
        @if(is_array($page))
            @if(isset($page['is_cert']))
            {{ $data->appends(['is_cert' => $page['is_cert']])->links() }}
            @endif
            @if(isset($page['is_freeze']))
            {{ $data->appends(['is_freeze' => $page['is_freeze']])->links() }}
            @endif
        @else
        {{ $data->links() }}
        @endif
    </div>
</div>
@endsection