@extends('Admin.Base')
@section('content')
<strong class="col-md-4 col-md-offset-4  alert-success">{{Session::get('info')}}</strong>
<div class="panel">
    <div class="panel-heading">
        <h3 class="panel-title">列表</h3>
    </div>

    <div id="demo-custom-toolbar2" class="table-toolbar-left">
        <div class="col-m-5" style="margin-left: 1100px">
        <!--Block Level buttons-->
        <!--===================================================-->
        <form action="/Admin/Comment" method="get" accept-charset="utf-8">
            用户昵称<input type="text" name="nickname">
            软件名称<input type="text" name="softwarename">
            <input type="submit" name="" value="搜索">
        </form>
        <!--===================================================-->
        </div>
    </div>
    @if (count($errors) > 0)
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li style="list-style: none">{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
    <!--Block Level buttons-->
    <!--===================================================-->
    

        <!--===================================================-->
    <div class="panel-body">
        <table id="demo-dt-addrow" class="table table-striped table-bordered" cellspacing="0" width="100%">
            <thead>
                <tr>
                    <th>ID</th>
                    <th class="min-tablet">评论的用户</th>
                    <th class="min-tablet">评论的软件名</th>
                    <th class="min-tablet">时间</th>
                    <th class="min-desktop">操作</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($data as $val)
                <tr>
                    <td>{{$val->id}}</td>
                    <td>{{$val->nickname}}</td>
                    <td>{{$val->softwarename}}</td>
                    <td>{{$val->created_at}}</td>
                    <td>
                    	<a href="/Admin/Comment/{{$val->id}}/edit" class="btn btn-xs btn-rounded btn-warning">查看详情</a>
                        <form action="/Admin/Comment/{{$val->id}}" method="POST" style="display: inline;" accept-charset="utf-8">
                            {{ method_field('DELETE') }}
                            {{ csrf_field() }}
                           <button class="btn btn-xs btn-rounded btn-danger">删除</button>
                        </form>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
        @if(is_array($softwarePage))
            {{ $data->appends(['nickname' => $softwarePage['nickname'],'softwarename'=> $softwarePage['softwarename']])->links() }}
        @else
            {{ $data->links() }}
        @endif
    </div> 
</div>
@endsection