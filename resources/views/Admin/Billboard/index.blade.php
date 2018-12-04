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
                    <h3 class="panel-title">广告牌列表</h3>
                </div>
                <!--Data Table-->
                <!--===================================================-->
                <div class="panel-body">
                    <div class="pad-btm form-inline">
                        <div class="row">
                            <div class="col-sm-6 table-toolbar-left">
                                <a href="/billboard/create"><button id="demo-btn-addrow" class="btn btn-purple"><i class="demo-pli-add"></i> 添加新的广告牌</button></a>
                            </div>
                        </div>
                    </div>
                    <div class="table-responsive">
                        <table class="table table-striped">
                            <thead>
                            <tr>
                                <th class="text-center">标题</th>
                                <th>位置</th>
                                <th>添加时间</th>
                                <th>广告默认图片</th>
                                <th>状态</th>
                                <th width="20%">广告牌默认链接</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach ($data['list'] as $value)
                            <tr>
                                <td><a class="btn-link" href="#">{{$value->billboards_title}}</a></td>
                                <td><img width="200rem" src="{{$value->billboards_position_desc}}"></td>
                                <td><span class="text-muted"><i class="demo-pli-clock"></i> {{$value->billboards_creation_date}}</span></td>
                                <td><img  width="200rem" src="{{$value->billboards_default_pic}}"></td>
                                <td>
                                    @switch($value->billboards_status)
                                        @case(1)
                                        <a href="/billboardAuc/{{$value->billboards_position}}" title="点击会结束竞拍"><div class="label label-table label-success">正在竞拍中</div></a>
                                        @break

                                        @case(3)
                                        <a href="/billboard/overview?id={{$value->billboards_position}}"><div class="label label-table label-default" title="用户正在展示，点击结束用户展示，从新回复竞拍">用户展示中</div></a>
                                        @break

                                        @default
                                        Default case...
                                    @endswitch
                                </td>
                                <td><a href="{{$value->billboards_url}}">{{$value->billboards_default_url}}</a></td>
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