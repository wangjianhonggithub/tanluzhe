
<?php $__env->startSection('content'); ?>
<strong class="col-md-4 col-md-offset-4  alert-success"><?php echo e(Session::get('info')); ?></strong>
<div class="panel">
    <div class="panel-heading">
        <h3 class="panel-title">列表</h3>
    </div>

    <div id="demo-custom-toolbar2" class="table-toolbar-left">
        <a href="/Admin/Cert?is_cert=1" id="demo-dt-addrow-btn" class="btn btn-primary">已认证</a> 
        <a href="/Admin/Cert?is_cert=0" id="demo-dt-addrow-btn" class="btn btn-primary">未认证</a> 
        <div class="col-m-5" style="float:right;margin-left:650px;margin-top: 10px;">
        <!--Block Level buttons-->
        <!--===================================================-->
        <form action="/Admin/Cert" method="get" accept-charset="utf-8">
            账号:<input type="text" name="username">
            昵称:<input type="text" name="nickname">
            手机号:<input type="text" name="mobile">
            邮箱:<input type="text" name="email">
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
                    <th class="min-tablet">申请人账号</th>
                    <th class="min-tablet">申请人昵称</th>
                    <th class="min-tablet">申请人电话</th>
                    <th class="min-tablet">申请人邮箱</th>
                    <th class="min-tablet">审核状态</th>
                    <th class="min-tablet">申请时间</th>
                    <th class="min-desktop">操作</th>
                </tr>
            </thead>
            <tbody>
                <?php $__currentLoopData = $data; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $val): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <tr>
                    <td><?php echo e($val->id); ?></td>
                    <td><?php echo e($val->username); ?></td>
                    <td><?php echo e($val->nickname); ?></td>
                    <td><?php echo e($val->mobile); ?></td>
                    <td><?php echo e($val->email); ?></td>
                    <?php if($val->is_status == 1 && $val->is_cert == 1): ?>
                    <td class="label label-table label-success">已通过</td>
                    <?php elseif($val->is_status == 2): ?>
                    <td class="label label-table label-success">审核中</td>
                    <?php else: ?>
                    <td class="label label-table label-danger">未通过</td>
                    <?php endif; ?>
                    <td><?php echo e($val->created_at); ?></td>
                    <td>
                        
                        <a href="javascript:;" data-id='<?php echo e($val->id); ?>' class="QueStatus btn btn-xs btn-rounded btn-success">审核通过</a>
                    	<a href="/Admin/Cert/<?php echo e($val->id); ?>/edit" class="btn btn-xs btn-rounded btn-warning">查看</a>
                        <form action="/Admin/Cert/<?php echo e($val->id); ?>" method="POST" style="display: inline;" accept-charset="utf-8">
                            <?php echo e(method_field('DELETE')); ?>

                            <?php echo e(csrf_field()); ?>

                           <button class="btn btn-xs btn-rounded btn-danger">删除</button>
                        </form>
                        <a href="javascript:;" data-id='<?php echo e($val->id); ?>'  class="UnStatus btn btn-xs btn-rounded btn-primary">取消通过</a>
                    </td>
                </tr>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </tbody>
        </table>
        <?php if(is_array($page)): ?>
            <?php if(isset($page['is_cert'])): ?>
            <?php echo e($data->appends(['is_cert' => $page['is_cert']])->links()); ?>

            <?php endif; ?>
        <?php else: ?>
            <?php echo e($data->links()); ?>

        <?php endif; ?>
    </div> 
</div>

<div class="layui-layer layui-layer-page layui-layer-prompt" id="layui-layer2" type="page" times="2" showtime="0" contype="string" style="display:none;z-index: 19891016; top: 149.5px; left: 790px;">
	<div class="layui-layer-title" style="cursor: move;">请写出的原因</div>
	
	<div id="" class="layui-layer-content">
		<form action="" method="get">
			<input type="hidden" name="id">
			<input type="hidden" name="type">
			<select class="yes" name="msg">
			<?php $__currentLoopData = $information; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $v): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
			<?php if($v->type ==1): ?>
			<option value="<?php echo e($v->liuyan); ?>"><?php echo e($v->liuyan); ?></option>
			<?php endif; ?>
			<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
			</select>
			<select class="no" name="msg">
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
	});
	//不通过
	$('.UnStatus').click(function(){
		var id = $(this).attr('data-id');
		$('input[name="id"]').val(id)
		$('input[name="type"]').val(2)
		$('.layui-layer-input').val($('.no').val());
		$('.layui-layer').show();
		$('.yes').hide();
		$('.no').show();
	});
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
		var id = $('input[name="id"]').val()
		var msg  = $('textarea[name="msg"]').val()
		if($('input[name="type"]').val() == 1){
			$.ajax({
				type: 'GET',
				url: '/Admin/Cert/status',
				data: {
					id:id,
					msg:msg,
				},
				dataType: 'json',
				success: function(data){
				   if (data.code == 1) {
						layer.msg(data.meg, function(){
						  //关闭后的操作
						});
						setTimeout(function(){//两秒后跳转  
						 window.location.href='/Admin/Cert';
						},2000);  
						return false;
					}else if(data.code == 0){
						layer.msg(data.meg, function(){
						  //关闭后的操作
						});
						return false;
					}else{
						layer.msg(data.meg, function(){
						  //关闭后的操作
						});
						return false;
					}
				},
			});
		}else{
			$.ajax({
				type: 'GET',
				url: '/Admin/Cert/UnStatus',
				data: {
				  id:id,
				  msg:msg,
				},
				dataType: 'json',
				success: function(data){
				   if (data.code == 1) {
						layer.msg(data.meg, function(){
						  //关闭后的操作
						});
						setTimeout(function(){//两秒后跳转  
						 window.location.href='/Admin/Cert';
						},2000);  
						return false;
					}else if(data.code == 0){
						layer.msg(data.meg, function(){
						  //关闭后的操作
						});
						return false;
					}else{
						layer.msg(data.meg, function(){
						  //关闭后的操作
						});
						return false;
					}
				},
			});
		}
		
	})
})





    /*$(function(){
        $('.QueStatus').click(function(){
                var id = $(this).attr('data-id');
                $.ajax({
                type: 'GET',
                url: '/Admin/Cert/status',
                data: {
                  id:id,
                },
                dataType: 'json',
                success: function(res){
                   if (res.code == 1) {
                        layer.msg(res.meg, function(){
                          //关闭后的操作
                        });
                        setTimeout(function(){//两秒后跳转  
                         window.location.href='/Admin/Cert';
                        },2000);  
                        return false;
                    }else if(res.code == 0){
                        layer.msg(res.meg, function(){
                          //关闭后的操作
                        });
                        return false;
                    }else{
                        ayer.msg(res.meg, function(){
                          //关闭后的操作
                        });
                        return false;
                    }
                },
            });
        });
        $('.UnStatus').click(function(){
            var id = $(this).attr('data-id');
            layer.prompt({title: '请写出审核不通过的原因', formType:2}, function(text, index){
                $.ajax({
                    type: 'GET',
                    url: '/Admin/Cert/UnStatus',
                    data: {
                      id:id,
                      msg:text,
                    },
                    dataType: 'json',
                    success: function(data){
                       if (data.code == 1) {
                            layer.msg(data.meg, function(){
                              //关闭后的操作
                            });
                            setTimeout(function(){//两秒后跳转  
                             window.location.href='/Admin/Cert';
                            },2000);  
                            return false;
                        }else if(data.code == 0){
                            layer.msg(data.meg, function(){
                              //关闭后的操作
                            });
                            return false;
                        }else{
                            layer.msg(data.meg, function(){
                              //关闭后的操作
                            });
                            return false;
                        }
                    },
                });
            });
        });
        // layer.prompt({title: '请写出审核不通过的原因', formType:2}, function(text, index){
        //     layer.close(index);
        //     console.log(text);
        // });
    });



  */
</script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('Admin.Base', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>