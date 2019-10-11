<?php $__env->startSection('content'); ?>
<div class="panel">
    <div class="panel-heading">
        <h3 class="panel-title">列表</h3>
    </div>

    <div id="demo-custom-toolbar2" class="table-toolbar-left">
        <a href="/Admin/Caty/create" id="demo-dt-addrow-btn" class="btn btn-primary"><i class="demo-pli-plus"></i> 添加</a> 
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
                    <th class="min-tablet">软件分类名称</th>
                    <th class="min-tablet">创建时间</th>
                    <th class="min-tablet">修改时间</th>
                    <th class="min-desktop">操作</th>
                </tr>
            </thead>
            <tbody>
                <?php $__currentLoopData = $data; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $val): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <tr>
                    <td><?php echo e($val->id); ?></td>
                    <td><?php echo e($val->caty_name); ?></td>
                    <td><?php echo e($val->created_at); ?></td>
                    <td><?php echo e($val->updated_at); ?></td>
                    <td>
                        <a href="/Admin/Caty/<?php echo e($val->id); ?>/edit" class="btn btn-xs btn-rounded btn-warning">修改</a>
                    	<a href="javasctipt:;" data-id='<?php echo e($val->id); ?>' class="btn Delete btn-xs btn-rounded btn-danger">删除</a>
                    </td>
                </tr>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </tbody>
        </table>
        <?php echo e($data->links()); ?>

    </div> 
</div>
<script src="/layui/layui.all.js"></script>
<script>
    $(function(){
        $('.Delete').click(function(){
            var id = $(this).attr('data-id');
            layer.msg('你确定要删除吗？', {
              time: 0 //不自动关闭
              ,btn: ['确认', '取消']
              ,yes: function(index){
                $.ajax({
                    type: 'GET',
                    url: '/Admin/CatyDelete',
                    data: {
                      id:id,
                    },
                    dataType: 'json',
                    success: function(res){
                        if (res.code == 1) {
                           layer.msg(res.msg, {icon: 6});
                           setTimeout(function(){//两秒后跳转  
                               window.location.href='/Admin/Caty';
                           },1500);
                        }else{
                            layer.msg(res.msg, {icon: 5});
                        }
                    },
                });
              }
            });
        });
    });
</script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('Admin.Base', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>