
<?php $__env->startSection('content'); ?>

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
                            <th>价格</th>
                            <th>链接</th>
                            <th>广告图片</th>
                            <th width="20%">订单提交时间</th>
                            <th width="20%">操作</th>
                        </tr>
                        </thead>
                        <tbody>
                        <?php $__currentLoopData = $data; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <tr>
                                <td><a class="btn-link" href="#"><?php echo e($value->title); ?></a></td>
                                <td><?php echo e($value->money); ?></td>
                                <td><span class="text-muted"><?php echo e($value->url); ?></span></td>
                                <td><img  width="200rem" src="<?php echo e($value->pic); ?>"></td>
                                <td><i class="demo-pli-clock"></i> <?php echo e($value->addtime); ?></td>
                                <td>
									<a href="javascript:;" data-id='<?php echo e($value->id); ?>' class="QueStatus btn btn-xs btn-rounded btn-success">审核通过</a>
									<a href="javascript:;" data-id='<?php echo e($value->id); ?>'  class="UnStatus btn btn-xs btn-rounded btn-primary">审核不通过</a>
                                    <!--<form class="form-inline" action="/billboard/verify" method="post">
                                        <div class="form-group">
                                            <label for="demo-inline-inputmail<?php echo e($value->id); ?>" class="sr-only">填写失败信息</label>
                                            <input type="text" name="errorinfo" placeholder="填写失败信息" id="demo-inline-inputmail<?php echo e($value->id); ?>" class="form-control">
                                        </div>
                                        <input name="id" type="hidden" value="<?php echo e($value->id); ?>" />
                                        <div class="radio">
                                            <input name="status" value="2" type="radio" id="demo-remember-me<?php echo e($value->id); ?>" class="magic-radio" />
                                            <label for="demo-remember-me<?php echo e($value->id); ?>">通过</label>
                                            <input name="status" value="0" type="radio" id="demo-remember-me1<?php echo e($value->id); ?>" class="magic-radio" />
                                            <label for="demo-remember-me1<?php echo e($value->id); ?>">不通过</label>
                                        </div>
                                        <button class="btn btn-primary" type="submit">提交审核</button>
                                    </form>-->
                                </td>
                            </tr>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </tbody>
                    </table>
                    <?php echo e($data->links()); ?>

                </div>
            </div>
            <!--===================================================-->
            <!--End Data Table-->

        </div>


    </div>
    <!--===================================================-->
<div class="layui-layer layui-layer-page layui-layer-prompt" id="layui-layer2" type="page" times="2" showtime="0" contype="string" style="display:none;z-index: 19891016; top: 149.5px; left: 790px;">
	<div class="layui-layer-title" style="cursor: move;">请写出的原因</div>
	
	<div id="" class="layui-layer-content">
		<form action="/billboard/verify" method="post" id="search_form">
			<input type="hidden" name="id">
			<input type="hidden" name="type">
			<select class="yes" >
			<?php $__currentLoopData = $information; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $v): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
			<?php if($v->type ==1): ?>
			<option value="<?php echo e($v->liuyan); ?>"><?php echo e($v->liuyan); ?></option>
			<?php endif; ?>
			<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
			</select>
			<select class="no" >
			<?php $__currentLoopData = $information; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $v): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
			<?php if($v->type ==2): ?>
			<option value="<?php echo e($v->liuyan); ?>"><?php echo e($v->liuyan); ?></option>
			<?php endif; ?>
			<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
			</select>
			<textarea class="layui-layer-input" name="msg"></textarea>
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
$(function(){
	//通过

	$('.QueStatus').click(function(){
		var id = $(this).attr('data-id');
		$('input[name="id"]').val(id)
		$('input[name="type"]').val(1)
		$('.layui-layer-input').val($('.yes').val());
		$('.layui-layer').show();
		$('.yes').show();
		$('.no').hide();
	})

	//未通过

	$('.UnStatus').click(function(){
		var id = $(this).attr('data-id');
		$('input[name="id"]').val(id)
		$('input[name="type"]').val(2)
		$('.layui-layer-input').val($('.no').val());
		$('.layui-layer').show();
		$('.yes').hide();
		$('.no').show();
	})
	//提示语
	$('.yes').change(function(){
		var options=$(".yes option:selected").val();
		//alert(options)
		$('.layui-layer-input').val(options);
	})
	$('.no').change(function(){
		var options=$(".no option:selected").val();
		//alert(options)
		$('.layui-layer-input').val(options);
	})
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