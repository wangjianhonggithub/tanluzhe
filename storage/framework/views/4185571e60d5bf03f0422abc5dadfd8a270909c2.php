<?php $__env->startSection('content'); ?>
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
    <?php if(count($errors) > 0): ?>
        <div class="alert alert-danger">
            <ul>
                <?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $error): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <li style="list-style: none"><?php echo e($error); ?></li>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </ul>
        </div>
    <?php endif; ?>
   
    <!--Block Level buttons-->
    <!--===================================================-->
    <strong class="col-md-4 col-md-offset-4  alert-success"><?php echo e(Session::get('info')); ?></strong>

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
                <?php $__currentLoopData = $data; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $val): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <tr>
                    <td><?php echo e($val['id']); ?></td>
                    <td><img src="<?php echo e($val['image']); ?>" width="150" height="80" alt=""></td>
                    <td><?php echo e($val['title']); ?></td>
                    <td><?php echo e($val['type']); ?></td>
					<td><?php echo e($val['startTime'] == 0?'无':date('Y-m-d H:i',$val['startTime'])); ?></td>
					<td><?php echo e($val['endTime'] == 0?'无':date('Y-m-d H:i',$val['endTime'])); ?></td>
                    <?php if($val['time_diff'] >=0 && $val['time_diff'] <=5 && $val['day_diff'] <=0): ?>
                        <?php if($val['time_diff'] == 5 && $val['mins_diff'] >=0): ?>
                            <td><p><?php echo e($val['time_diff']); ?>小时<?php echo e($val['mins_diff']); ?>分钟后过期</p></td>
                        <?php else: ?>
                            <td><p style="color: red"><?php echo e($val['time_diff']); ?>小时<?php echo e($val['mins_diff']); ?>分钟后过期</p></td>
                        <?php endif; ?>

                    <?php elseif($val['day_diff'] < 0 && $val['time_diff'] < 0): ?>
                        <td><p style="color: #ff9a06">已过期</p></td>
                    <?php elseif($val['day_diff'] >0 || $val['time_diff'] > 5): ?>
                        <td><?php echo e($val['day_diff']); ?>天<?php echo e($val['time_diff']); ?>小时<?php echo e($val['mins_diff']); ?>分钟后过期</td>
                    <?php endif; ?>
                    <td>
                        <!-- <a href="/Admin/Banner/<?php echo e($val['id']); ?>/edit" class="btn btn-xs btn-rounded btn-warning">修改</a> -->
                        <!-- <form action="/Admin/Banner/<?php echo e($val['id']); ?>" method="POST" style="display: inline;" accept-charset="utf-8">
                            <?php echo e(method_field('DELETE')); ?>

                            <?php echo e(csrf_field()); ?>

                           <button class="btn btn-xs btn-rounded btn-danger">删除</button>
                        </form> -->
                        <?php switch($val['status']):
                            case (0): ?>
                            <a href="/getresultAdvertisement?id=<?php echo e($val['id']); ?>&type=<?php echo e($type); ?>" class="btn btn-xs btn-rounded btn-mint">赛选竞拍结果</a>
                            <?php break; ?>

                            <?php case (3): ?>
                            <a href="/getresultAdvertisement?id=<?php echo e($val['id']); ?>" class="btn btn-xs btn-rounded btn-primary">重新竞拍</a>
                            <?php break; ?>

                            <?php default: ?>
                            <a href="/getresultAuc?id=<?php echo e($val['id']); ?>" class="btn btn-xs btn-rounded btn-default">其他</a>
                        <?php endswitch; ?>
						<a href="javascript:void(0)" class="btn btn-xs btn-rounded btn-primary" onclick="xiugai('<?php echo e($val['id']); ?>','<?php echo e($val['startTime'] == 0?'':date('Y-m-d',$val['startTime'])); ?>','<?php echo e($val['startTime'] == 0?'':date('H:i',$val['startTime'])); ?>','<?php echo e($val['endTime'] == 0?'':date('Y-m-d',$val['endTime'])); ?>','<?php echo e($val['endTime'] == 0?'':date('H:i',$val['endTime'])); ?>','<?php echo e($val['type']); ?>','<?php echo e($val['day']); ?>')">修改结束时间</a>
                        <!--<a href="/Admin/Banner/<?php echo e($val['id']); ?>/edit" class="btn btn-xs btn-rounded btn-primary">结束竞拍</a>
                        <a href="/Admin/Banner/<?php echo e($val['id']); ?>/edit" class="btn btn-xs btn-rounded btn-mint">重新竞拍</a>-->
                    </td>
                </tr>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
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


    $('input[name="type"]').val(<?php echo e($type); ?>)
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
<?php $__env->stopSection(); ?>
<?php echo $__env->make('Admin.Base', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>