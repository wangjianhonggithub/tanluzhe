@extends('Admin.Base')
@section('content')
<strong class="col-md-4 col-md-offset-4  alert-success">{{Session::get('info')}}</strong>
<div class="panel">
   <div class="panel-heading">
        <h3 class="panel-title">列表</h3>
    </div>

    <div id="demo-custom-toolbar2" class="table-toolbar-left">
        <a href="/Admin/Up?is_status=1" id="demo-dt-addrow-btn" class="btn btn-primary"> 审核通过</a>
        <a href="/Admin/Up?is_status=0" id="demo-dt-addrow-btn" class="btn btn-primary"> 审核未通过</a>
        <div class="col-m-5" style="float:right;margin-top: 7px;margin-left: 700px;">
        <!--Block Level buttons-->
        <!--===================================================-->
        <form action="/Admin/Up" method="get" accept-charset="utf-8">
            软件类型: <select name="softwaretype">
                    <option value="0">不限</option>
                    @foreach($Caty as $catylis)
                        <option value="{{$catylis->id}}">{{$catylis->caty_name}}</option>
                    @endforeach
                    </select>
            软件名称:<input type="text" name="softwarename">
            发布人:<input type="text" name="nickname">
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
                    <th class="min-tablet">软件分类名称</th>
                    <th class="min-tablet">软件名称</th>
                    <th class="min-tablet">发布人</th>
                    <th class="min-tablet">软件大小</th>
                    <th class="min-tablet">审核状态</th>
                    <th class="min-tablet">下载数</th>
                    <th class="min-tablet">个性推荐</th>
                    <th class="min-tablet">评论数</th>
                    <th class="min-tablet">软件位推荐</th>
                    <th class="min-tablet">上传时间</th>
                    <th class="min-desktop">操作</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($data as $val)
                <tr>
                    <td>{{$val->id}}</td>
                    <td>{{$val->caty_name}}</td>
                    <td>{{$val->softwarename}}</td>
                    <td>{{$val->nickname}}</td>
                    <td>{{$val->software_size}}</td>
                    @if($val->is_status == 1)
                    <td class="label label-table label-success">审核通过</td>
                    @else
                    <td class="label label-table label-danger">审核未通过</td>
                    @endif
                    <td>{{$val->count}}</td>
                    @if($val->is_person == 0)
                    <td class="label label-table label-danger">未个性推荐</td>
                    @else
                    <td class="label label-table label-success">已个性推荐</td>
                    @endif
                    <td>{{$val->comment}}</td>
                    @if($val->is_shuff == 0)
                    <td class="label label-table label-danger">未推荐</td>
                    @else
                    <td class="label label-table label-success">已推荐</td>
                    @endif
                    <td>{{$val->created_at}}</td>
                    <td>
                    	<a href="/Admin/Up/{{$val->id}}/edit" class="btn btn-xs btn-rounded btn-warning">查看信息</a>
                        <form action="/Admin/Up/{{$val->id}}" method="POST" style="display: inline;" accept-charset="utf-8">
                            {{ method_field('DELETE') }}
                            {{ csrf_field() }}
                           <button class="btn btn-xs btn-rounded btn-danger">删除</button>
                        </form>
                        @if($val->is_person == 1)
                            <a href="/Admin/Up/UNperson/{{$val->id}}" class="btn btn-xs btn-rounded btn-info">取消个性推荐</a>
                        @else
                            <a href="/Admin/Up/person/{{$val->id}}" class="btn btn-xs btn-rounded btn-info">个性推荐</a>
                        @endif
                       
                        @if($val->is_shuff == 1)
                        <a href="/Admin/Up/UNshuff/{{$val->id}}" class="btn btn-xs btn-rounded btn-mint">取消软件位推荐</a>
                        @else
                        <a href="/Admin/Up/shuff/{{$val->id}}" class="btn btn-xs btn-rounded btn-mint">软件位推荐</a>
                        @endif
                        <a href="/Admin/Up/down/{{$val->id}}" class="btn btn-xs btn-rounded btn-success">下载</a>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
         @if(is_array($page))
            @if(isset($page['is_status']))
              {{ $data->appends(['is_status' => $page['is_status']])->links() }}   
            @endif
            @if(isset($page['softwaretype']) && isset($page['nickname']) && isset($page['softwarename']))
              {{ $data->appends(['softwaretype' => $page['softwaretype'],'nickname' => $page['nickname'],'softwarename' => $page['softwarename']])->links() }}  
            @endif
        @else
            {{ $data->links() }}
        @endif
    </div> 
</div>
@endsection