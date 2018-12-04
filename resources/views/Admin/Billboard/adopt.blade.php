@extends('Admin.Base')
@section('content')

    <!--Breadcrumb-->
    <!--~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~-->
    <!--~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~-->
    <!--End breadcrumb-->




    <!--Page content-->
    <!--===================================================-->
    <div id="page-content">


        <div class="panel">
            <div class="panel-heading">
                <h3 class="panel-title">通过的广告牌</h3>
            </div>

            <!--Data Table-->
            <!--===================================================-->
            <div class="panel-body">
                <div class="table-responsive">
                    <table class="table table-striped">
                        <thead>
                        <tr>
                            <th class="text-center">标题</th>
                            <th>位置</th>
                            <th>链接</th>
                            <th>广告图片</th>
                            <th width="20%">订单提交时间</th>

                        </tr>
                        </thead>
                        <tbody>
                        @foreach ($data as $value)
                            <tr>
                                <td><a class="btn-link" href="#">{{$value->title}}</a></td>
                                <td>{{$value->billboards_position}}</td>
                                <td><span class="text-muted">{{$value->url}}</span></td>
                                <td><img  width="200rem" src="{{$value->pic}}"></td>
                                <td><i class="demo-pli-clock"></i> {{$value->addtime}}</td>

                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
            <!--===================================================-->
            <!--End Data Table-->

        </div>


    </div>
    <!--===================================================-->

@endsection