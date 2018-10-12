@extends('Admin.Base')
@section('content')
    <div class="panel">
        <div class="panel-heading">
            <h3 class="panel-title">列表</h3>
        </div>

        <div id="demo-custom-toolbar2" class="table-toolbar-left">
            <a href="/Admin/Banner/create" id="demo-dt-addrow-btn" class="btn btn-primary"><i class="demo-pli-plus"></i> 添加</a>
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
                        <th class="min-tablet">轮播图</th>
                        <th class="min-tablet">标题</th>
                        <th class="min-tablet">描述</th>
                        <th class="min-tablet">所属广告位</th>
                        <th class="min-tablet">创建时间</th>
                        <th class="min-tablet">修改时间</th>
                        <th class="min-desktop">操作</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach ($data as $val)
                        <tr>
                            <td>{{$val->id}}</td>
                            <td><img src="{{$val->banner_img}}" width="150" height="80" alt=""></td>
                            <td>{{$val->title}}</td>
                            <td>{{$val->description}}</td>
                            <td>{{$val->nav_name}}</td>
                            <td>{{$val->created_at}}</td>
                            <td>{{$val->updated_at}}</td>
                            <td>
                                <a href="/Bidders/getresult/{{$val->id}}" class="btn btn-xs btn-rounded btn-warning">结束竞拍</a>
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
                {{ $data->links() }}
            </div>
    </div>
@endsection