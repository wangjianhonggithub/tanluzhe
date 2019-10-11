<?php $__env->startSection('content'); ?>
<strong class="col-md-4 col-md-offset-4  alert-success"><?php echo e(Session::get('info')); ?></strong>
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
                    <?php $__currentLoopData = $Caty; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $catylis): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <option value="<?php echo e($catylis->id); ?>"><?php echo e($catylis->caty_name); ?></option>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </select>
            软件名称:<input type="text" name="softwarename">
            发布人:<input type="text" name="nickname">
            <input type="submit" name="" value="搜索">
        </form>
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
                <?php $__currentLoopData = $data; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $val): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <tr>
                    <td><?php echo e($val->id); ?></td>
                    <td><?php echo e($val->caty_name); ?></td>
                    <td><?php echo e($val->softwarename); ?></td>
                    <td><?php echo e($val->nickname); ?></td>
                    <td><?php echo e($val->software_size); ?></td>
                    <?php if($val->is_status == 1): ?>
                    <td class="label label-table label-success">审核通过</td>
                    <?php else: ?>
                    <td class="label label-table label-danger">审核未通过</td>
                    <?php endif; ?>
                    <td><?php echo e($val->count); ?></td>
                    <?php if($val->is_person == 0): ?>
                    <td class="label label-table label-danger">未个性推荐</td>
                    <?php else: ?>
                    <td class="label label-table label-success">已个性推荐</td>
                    <?php endif; ?>
                    <td><?php echo e($val->comment); ?></td>
                    <?php if($val->is_shuff == 0): ?>
                    <td class="label label-table label-danger">未推荐</td>
                    <?php else: ?>
                    <td class="label label-table label-success">已推荐</td>
                    <?php endif; ?>
                    <td><?php echo e($val->created_at); ?></td>
                    <td>
                    	<a href="/Admin/Up/<?php echo e($val->id); ?>/edit" class="btn btn-xs btn-rounded btn-warning">查看信息</a>
                        
                            
                            
                           
                        
						<!--审核按钮-->
                        <a href="javascript:;" data-id="<?php echo e($val->id); ?>" class="btn btn-xs Delete btn-rounded btn-danger">删除</a>
						
						<?php if($val->is_status == 1): ?>
                            <a href="javascript:void(0)" class="btn btn-xs btn-rounded btn-info" onclick="caozuo('is_status',<?php echo e($val->is_status); ?>,<?php echo e($val->id); ?>)">审核未通过</a>
                        <?php else: ?>
                            <a href="javascript:void(0)" class="btn btn-xs btn-rounded btn-info" onclick="caozuo('is_status',<?php echo e($val->is_status); ?>,<?php echo e($val->id); ?>)">审核通过</a>
                        <?php endif; ?>
						<!--个性推荐按钮-->
                        <?php if($val->is_person == 1): ?>
                            <a href="/Admin/Up/UNperson/<?php echo e($val->id); ?>" class="btn btn-xs btn-rounded btn-info" onclick="caozuo('is_person',<?php echo e($val->is_person); ?>,<?php echo e($val->id); ?>)">取消个性推荐</a>
                        <?php else: ?>
                            <a href="/Admin/Up/person/<?php echo e($val->id); ?>" class="btn btn-xs btn-rounded btn-info" onclick="caozuo('is_person',<?php echo e($val->is_person); ?>,<?php echo e($val->id); ?>)">个性推荐</a>
                        <?php endif; ?>
                        <!--软件位推荐按钮-->
                        <?php if($val->is_shuff == 1): ?>
                        <a href="/Admin/Up/UNshuff/<?php echo e($val->id); ?>" class="btn btn-xs btn-rounded btn-mint" onclick="caozuo('is_shuff',<?php echo e($val->is_shuff); ?>,<?php echo e($val->id); ?>)">取消软件位推荐</a>
                        <?php else: ?>
                        <a href="/Admin/Up/shuff/<?php echo e($val->id); ?>" class="btn btn-xs btn-rounded btn-mint" onclick="caozuo('is_shuff',<?php echo e($val->is_shuff); ?>,<?php echo e($val->id); ?>)">软件位推荐</a>
                        <?php endif; ?>
                        <a href="/Admin/Up/down/<?php echo e($val->id); ?>" class="btn btn-xs btn-rounded btn-success">下载</a>
                    </td>
                </tr>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </tbody>
        </table>
         <?php if(is_array($page)): ?>
            <?php if(isset($page['is_status'])): ?>
              <?php echo e($data->appends(['is_status' => $page['is_status']])->links()); ?>   
            <?php endif; ?>
            <?php if(isset($page['softwaretype']) && isset($page['nickname']) && isset($page['softwarename'])): ?>
              <?php echo e($data->appends(['softwaretype' => $page['softwaretype'],'nickname' => $page['nickname'],'softwarename' => $page['softwarename']])->links()); ?>  
            <?php endif; ?>
        <?php else: ?>
            <?php echo e($data->links()); ?>

        <?php endif; ?>
    </div> 
</div>
<div class="layui-layer layui-layer-page layui-layer-prompt" id="layui-layer2" type="page" times="2" showtime="0" contype="string" style="display:none;z-index: 19891016; top: 149.5px; left: 790px;">
	<div class="layui-layer-title" style="cursor: move;">请写出的原因</div>
	
	<div id="" class="layui-layer-content">
		<form action="" method="post" id="search_form">
			<input type="hidden" name="id">

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
function caozuo(m,n,id){
	
	//审核
	if(m=='is_status'){
		$('input[name="id"]').val(id)
		//提示框
		$('.layui-layer').show();
		//提示语
		if(n==0){
			$('.yes').show();
			$('.no').hide();
			$('.layui-layer-input').val($('.yes').val());
		}else{
			$('.yes').hide();
			$('.no').show();
			$('.layui-layer-input').val($('.no').val());
		}
		if(n==1){
			document.getElementById('search_form').action = "/Admin/Up/UNstatus";
		}else{
			document.getElementById('search_form').action = "/Admin/Up/status";
		}
	}
	//个性推荐按钮
	//if(m=='is_person'){
		
	//}
	//软件位推荐按钮
	//if(m=='is_shuff'){
		
	//}
}
$(function(){
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
	//提交
	$('.layui-layer-btn0').click(function(){

		document.getElementById('search_form').submit();

	})
	//关闭
	$('.layui-layer-ico,.layui-layer-btn1').click(function(){
		$('.layui-layer').hide();
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
                        url: '/Admin/Up/UNdelete',
                        data: {
                            id:id,
                        },
                        dataType: 'json',
                        success: function(res){
                            if (res.code == 1) {
                                layer.msg(res.msg, {icon: 6});
                                // alert(res.msg);
                                setTimeout(function(){//两秒后跳转5
                                    window.location.href='/Admin/Up';
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
<?php $__env->stopSection(); ?>
<?php echo $__env->make('Admin.Base', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>