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
                <h3 class="panel-title">用户等待审核的广告牌</h3>
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
                            <th width="20%">操作</th>
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
                                <td>
                                    <form class="form-inline" action="/billboard/verify" method="post">
                                        <div class="form-group">
                                            <label for="demo-inline-inputmail{{$value->id}}" class="sr-only">填写失败信息</label>
                                            <input type="text" name="errorinfo" placeholder="填写失败信息" id="demo-inline-inputmail{{$value->id}}" class="form-control">
                                        </div>
                                        <input name="id" type="hidden" value="{{$value->id}}" />
                                        <div class="radio">
                                            <input name="status" value="2" type="radio" id="demo-remember-me{{$value->id}}" class="magic-radio" />
                                            <label for="demo-remember-me{{$value->id}}">通过</label>
                                            <input name="status" value="0" type="radio" id="demo-remember-me1{{$value->id}}" class="magic-radio" />
                                            <label for="demo-remember-me1{{$value->id}}">不通过</label>
                                        </div>
                                        <button class="btn btn-primary" type="submit">提交审核</button>
                                    </form>
                                </td>
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