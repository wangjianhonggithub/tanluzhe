@extends('Admin.Base')
@section('content')
<div class="panel">
    <div class="panel-heading">
        <h3 class="panel-title">列表</h3>
    </div>

    <div id="demo-custom-toolbar2" class="table-toolbar-left">
        <a href="/Admin/Administrator/create" id="demo-dt-addrow-btn" class="btn btn-primary"><i class="demo-pli-plus"></i> 添加</a> 
        <div class="col-m-5">
        <!--Block Level buttons-->
        <!--===================================================-->
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
    <strong class="col-md-4 col-md-offset-4  alert-success">{{Session::get('info')}}</strong>

        <!--===================================================-->
    <div class="panel-body">
        <table id="demo-dt-addrow" class="table table-striped table-bordered" cellspacing="0" width="100%">
            <thead>
                <tr>
                    <th>ID</th>
                    <th class="min-tablet">昵称</th>
                    <th class="min-tablet">账号</th>
                    <th class="min-tablet">状态</th>
                    <th class="min-tablet">创建时间</th>
                    <th class="min-tablet">修改时间</th>
                    <th class="min-desktop">操作</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($data as $val)
                <tr>
                    <td>{{$val->id}}</td>
                    <td>{{$val->nickname}}</td>
                    <td>{{$val->username}}</td>
                    @if($val->status == 1)
                    <td class="label label-table label-success">启用</td>
                    @else
                    <td class="label label-table label-danger">禁用</td>
                    @endif
                    <td>{{$val->created_at}}</td>
                    <td>{{$val->updated_at}}</td>
                    <td>
                    	<a href="/Admin/Administrator/{{$val->id}}/edit" class="btn btn-xs btn-rounded btn-warning">修改</a>
                        <form action="/Admin/Administrator/{{$val->id}}" method="POST" style="display: inline;" accept-charset="utf-8">
                            {{ method_field('DELETE') }}
                            {{ csrf_field() }}
                           <button class="btn btn-xs btn-rounded btn-danger">删除</button>
                        </form>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
        {{ $data->links() }}
    </div> 
</div>
@endsection