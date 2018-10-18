@extends('Admin.Base')
@section('content')
    <div class="panel">
        <div class="panel-heading">
            <h3 class="panel-title">轮播图列表</h3>
        </div>

        <div id="demo-custom-toolbar2" class="table-toolbar-left">
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

    <div class="panel">
        <div class="panel-heading">
            <h3 class="panel-title">静态广告列表</h3>
        </div>

        <div id="demo-custom-toolbar2" class="table-toolbar-left">
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
                        <th class="min-tablet">跳转链接</th>
                        <th class="min-tablet">状态</th>
                        <th class="min-tablet">添加时间</th>
                        <th class="min-tablet">结束竞拍</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach ($advList as $k=>$advList)
                        <tr>
                            <td>{{$advList['title']}}</td>
                            <td><img src="{{$advList['img']}}" width="150" height="80" alt=""></td>
                            <td>{{$advList['url']}}</td>
                            <td>{{$advList['status']}}</td>
                            <td>{{$advList['addtime']}}</td>
                            <td>
                                <a href="/Bidders/getresult/{{$advList['title']}}" class="btn btn-xs btn-rounded btn-warning">结束竞拍</a>
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
                {{ $data->links() }}
            </div>
    </div>
@endsection