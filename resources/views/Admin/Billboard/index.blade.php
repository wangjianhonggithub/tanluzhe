@extends('Admin.Base')
@section('content')

        <!--Breadcrumb-->
        <!--~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~-->
        <!--~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~-->
        <!--End breadcrumb-->




        <!--Page content-->



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
                                <a href="javascript:void(0)" class="btn  btn-primary" onclick="xiugai('','','','','')">统一设置开始结束时间</a>
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
                                
                                <th width="20%">广告牌默认链接</th>
                                <th>开始时间</th>
                                <th>结束时间</th>
                                <th>截止时间</th>
                                <th>操作</th>

								<th>状态</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach ($data['list'] as $value)
                            <tr>
                                <td><a class="btn-link" href="#">{{$value->billboards_title}}</a></td>
                                <td><img width="200rem" src="{{$value->billboards_position_desc}}"></td>
                                <td><span class="text-muted"><i class="demo-pli-clock"></i> {{$value->billboards_creation_date}}</span></td>
                                <td><img  width="200rem" src="{{$value->billboards_default_pic}}"></td>
                                

                                <td><a href="{{$value->billboards_default_url}}">{{$value->billboards_default_url}}</a></td>
                                <td><span class="text-muted"><i class="demo-pli-clock"></i> {{date('Y-m-d H:i',$value->billboards_stime)}}</span></td>
                                <td><span class="text-muted"><i class="demo-pli-clock"></i> {{date('Y-m-d H:i',$value->billboards_etime)}}</span></td>
                                @if($value->time_diff >=0 && $value->time_diff<=5 && $value->day_diff <=0)
                                    @if($value->time_diff == 5 && $value->mins_diff >=0)
                                        <td><p style="color: red">{{$value->time_diff}}小时{{$value->mins_diff}}分钟后过期</p></td>
                                    @else
                                        <td><p style="color: red">{{$value->time_diff}}小时{{$value->mins_diff}}分钟后过期</p></td>
                                    @endif

                                @elseif($value->day_diff<0 && $value->time_diff < 0)
                                    <td><p style="color: #ff9a06">已过期</p></td>
                                @elseif($value->day_diff >0 || $value->time_diff > 5)
                                    <td>{{$value->day_diff}}天{{$value->time_diff}}小时{{$value->mins_diff}}分钟后过期</td>
                                @endif
                                <td>
                                 <a href="/Admin/billboards/edit/{{ $value->billboards_id }}" class="btn btn-xs btn-rounded btn-warning">修改</a>
                                 {{--<form action="/Admin/billboards/delete" method="POST" style="display: inline;" accept-charset="utf-8">--}}
                                    {{--{{ method_field('DELETE') }}--}}
                                    {{--{{ csrf_field() }}--}}
                                     {{--<input type="hidden" name="billboards_id" value="{{$value->billboards_id}}">--}}
                                        {{--<button class="btn btn-xs btn-rounded btn-danger">删除</button>--}}
                                     {{--</form>--}}
                                {{--</td>--}}
                                <a href="javasctipt:;" data-id='{{$value->billboards_id}}' class="btn Delete btn-xs btn-rounded btn-danger">删除</a>
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
                            </tr>	                                                          
                            @endforeach
                            </tbody>
                        </table>
                        {{--{{ $data->links() }}--}}
                    </div>
                </div>
                <!--===================================================-->
                <!--End Data Table-->

            </div>


        </div>
        <!--===================================================-->
        <div class="layui-layer layui-layer-page layui-layer-prompt" id="layui-layer2" type="page" times="2" showtime="0" contype="string" style="display:none;z-index: 19891016; top: 149.5px; left: 790px;">
            <div class="layui-layer-title" style="cursor: move;">修改时间</div>

            <div id="" class="layui-layer-content">
                <form action="/AdvertisementList/bannertime" method="post" id="search_form">
                    <input type="hidden" name="type" value="2">
                    开始时间：<input type="date" name="startTime" value="" /><input type="time" name="startDay" value="" /><br /><br />
                    截止时间：<input type="date" name="endTime" value="" /><input type="time" name="endDay" value="" /><br /><br />


                    <form>
            </div>

            <span class="layui-layer-setwin"><a class="layui-layer-ico layui-layer-close layui-layer-close1" href="javascript:;"></a></span>
            <div class="layui-layer-btn layui-layer-btn-">
                <a class="layui-layer-btn0">确定</a>
                <a class="layui-layer-btn1">取消</a>
            </div>
        </div>
        <script src="/layui/layui.all.js"></script>
        <script>
            function xiugai(starttime,startday,endtime,endday,type,day){
                $('.layui-layer').show();
                $('input[name="startTime"]').val(starttime)
                $('input[name="startDay"]').val(startday)



                $('input[name="endTime"]').val(endtime)
                $('input[name="endDay"]').val(endday)
            }
            $(function(){
                //关闭
                $('.layui-layer-ico,.layui-layer-btn1').click(function(){
                    $('.layui-layer').hide();
                })
                //提交
                $('.layui-layer-btn0').click(function(){
                    document.getElementById('search_form').submit();

                })

                $('.Delete').click(function(){
                    var id = $(this).attr('data-id');
                    layer.msg('你确定要删除吗？', {
                        time: 0 //不自动关闭
                        ,btn: ['确认', '取消']
                        ,yes: function(index){
                            //假设 id 的 class  是 getId
                            //然后发送ajax;
                            $.ajax({
                                type: 'GET',
                                url: '/Admin/billboards/delete',
                                data: {
                                    billboards_id:id,
                                },
                                dataType: 'json',
                                success: function(res){
                                    if (res.code == 1) {
                                        layer.msg(res.msg, {icon: 6});
                                        setTimeout(function(){//两秒后跳转
                                            window.location.href='/billboard';
                                        },1500);
                                    }else{
                                        layer.msg(res.msg, {icon: 5});
                                    }
                                },
                            });
                        }
                    });
                });

            })
        </script>
@endsection