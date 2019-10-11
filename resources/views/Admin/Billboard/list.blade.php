@extends('Admin.Base')
@section('content')
<div class="panel">
    <div class="panel-heading">
        <h3 class="panel-title">列表</h3>
    </div>

    <div id="demo-custom-toolbar2" class="table-toolbar-left">
        <!-- <a href="/Admin/Banner/create" id="demo-dt-addrow-btn" class="btn btn-primary"><i class="demo-pli-plus"></i> 添加</a> 
        -->
        <a href="javascript:void(0)" class="btn  btn-primary" onclick="xiugais('','','','')">统一设置开始结束时间</a>
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
                    <th class="min-tablet">展示图</th>
                    <th class="min-tablet">所属广告位</th>
                    <th class="min-tablet">类型</th>
					<th class="min-tablet">开始时间</th>
					<th class="min-tablet">结束时间</th>
					<th class="min-tablet">截止时间</th>

                    <th class="min-desktop">操作</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($data as $val)
                <tr>
                    <td>{{$val['id']}}</td>
                    <td><img src="{{$val['image']}}" width="150" height="80" alt=""></td>
                    <td>{{$val['title']}}</td>
                    <td>{{$val['type']}}</td>
					<td>{{$val['startTime'] == 0?'无':date('Y-m-d H:i',$val['startTime'])}}</td>
					<td>{{$val['endTime'] == 0?'无':date('Y-m-d H:i',$val['endTime'])}}</td>
                    @if($val['time_diff'] >=0 && $val['time_diff'] <=5 && $val['day_diff'] <=0)
                        @if($val['time_diff'] == 5 && $val['mins_diff'] >=0)
                            <td><p>{{$val['time_diff']}}小时{{$val['mins_diff']}}分钟后过期</p></td>
                        @else
                            <td><p style="color: red">{{$val['time_diff']}}小时{{$val['mins_diff']}}分钟后过期</p></td>
                        @endif

                    @elseif($val['day_diff'] < 0 && $val['time_diff'] < 0)
                        <td><p style="color: #ff9a06">已过期</p></td>
                    @elseif($val['day_diff'] >0 || $val['time_diff'] > 5)
                        <td>{{$val['day_diff']}}天{{$val['time_diff']}}小时{{$val['mins_diff']}}分钟后过期</td>
                    @endif
                    <td>
                        <!-- <a href="/Admin/Banner/{{$val['id']}}/edit" class="btn btn-xs btn-rounded btn-warning">修改</a> -->
                        <!-- <form action="/Admin/Banner/{{$val['id']}}" method="POST" style="display: inline;" accept-charset="utf-8">
                            {{ method_field('DELETE') }}
                            {{ csrf_field() }}
                           <button class="btn btn-xs btn-rounded btn-danger">删除</button>
                        </form> -->
                        @switch($val['status'])
                            @case(0)
                            <a href="/getresultAdvertisement?id={{$val['id']}}&type={{$type}}" class="btn btn-xs btn-rounded btn-mint">赛选竞拍结果</a>
                            @break

                            @case(3)
                            <a href="/getresultAdvertisement?id={{$val['id']}}" class="btn btn-xs btn-rounded btn-primary">重新竞拍</a>
                            @break

                            @default
                            <a href="/getresultAuc?id={{$val['id']}}" class="btn btn-xs btn-rounded btn-default">其他</a>
                        @endswitch
						<a href="javascript:void(0)" class="btn btn-xs btn-rounded btn-primary" onclick="xiugai('{{$val['id']}}','{{$val['startTime'] == 0?'':date('Y-m-d',$val['startTime'])}}','{{$val['startTime'] == 0?'':date('H:i',$val['startTime'])}}','{{$val['endTime'] == 0?'':date('Y-m-d',$val['endTime'])}}','{{$val['endTime'] == 0?'':date('H:i',$val['endTime'])}}','{{$val['type']}}','{{$val['day']}}')">修改结束时间</a>
                        <!--<a href="/Admin/Banner/{{$val['id']}}/edit" class="btn btn-xs btn-rounded btn-primary">结束竞拍</a>
                        <a href="/Admin/Banner/{{$val['id']}}/edit" class="btn btn-xs btn-rounded btn-mint">重新竞拍</a>-->
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div> 
</div>
<div class="layui-layer layui-layer-page layui-layer-prompt" id="layui-layer2" type="page" times="2" showtime="0" contype="string" style="display:none;z-index: 19891016; top: 149.5px; left: 790px;">
	<div class="layui-layer-title" style="cursor: move;">修改时间</div>
	
	<div id="" class="layui-layer-content">
		<form action="/AdvertisementList/xiugai" method="post" id="search_form">
			<input type="hidden" name="id">
			<input type="hidden" name="type">
			<input type="hidden" name="num">
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
function xiugai(id,starttime,startday,endtime,endday,type,day){
	$('.layui-layer').show();
	$('input[name="id"]').val(id)
	$('input[name="startTime"]').val(starttime)
	$('input[name="startDay"]').val(startday)
	
	
	
	$('input[name="endTime"]').val(endtime)
	$('input[name="endDay"]').val(endday)
	$('input[name="type"]').val(type)
	$('input[name="day"]').val(day)
	$('input[name="num"]').val('1')
}


function xiugais(starttime,startday,endtime,endday,type,day){
    $('.layui-layer').show();
    $('input[name="startTime"]').val(starttime)
    $('input[name="startDay"]').val(startday)


    $('input[name="type"]').val({{$type}})
    $('input[name="endTime"]').val(endtime)
    $('input[name="endDay"]').val(endday)
    $('input[name="day"]').val(day)
    $('input[name="num"]').val('30')
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

	
})

</script>
@endsection