<?php $__env->startSection('content'); ?>
<strong class="col-md-4 col-md-offset-4  alert-success"><?php echo e(Session::get('info')); ?></strong>
<div class="panel">
    <div class="panel-heading">
        <h3 class="panel-title">列表</h3>
    </div>

    <div id="demo-custom-toolbar2" class="table-toolbar-left">
        <div class="col-m-5" style="margin-left: 1100px">
        <!--Block Level buttons-->
        <!--===================================================-->
        <form action="/Admin/Comment" method="get" accept-charset="utf-8">
            用户昵称<input type="text" name="nickname">
            软件名称<input type="text" name="softwarename">
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
                    <th class="min-tablet">评论的用户</th>
                    <th class="min-tablet">评论的软件名</th>
                    <th class="min-tablet">时间</th>
                    <th class="min-desktop">操作</th>
                </tr>
            </thead>
            <tbody>
                <?php $__currentLoopData = $data; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $val): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <tr>
                    <td><?php echo e($val->id); ?></td>
                    <td><?php echo e($val->nickname); ?></td>
                    <td><?php echo e($val->softwarename); ?></td>
                    <td><?php echo e($val->created_at); ?></td>
                    <td>
                    	<a href="/Admin/Comment/<?php echo e($val->id); ?>/edit" class="btn btn-xs btn-rounded btn-warning">查看详情</a>
                        <a href="javascript:;" data-id="<?php echo e($val->id); ?>" class="btn btn-xs Delete btn-rounded btn-danger">删除</a>
                        
                            
                            
                           
                        
                    </td>
                </tr>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </tbody>
        </table>
        <?php if(is_array($softwarePage)): ?>
            <?php echo e($data->appends(['nickname' => $softwarePage['nickname'],'softwarename'=> $softwarePage['softwarename']])->links()); ?>

        <?php else: ?>
            <?php echo e($data->links()); ?>

        <?php endif; ?>
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
                    //假设 id 的 class  是 getId
                    //然后发送ajax;
                    $.ajax({
                        type: 'GET',
                        url: '/Admin/CommentDelete',
                        data: {
                            id:id,
                        },
                        dataType: 'json',
                        success: function(res){
                            if (res.code == 1) {
                                layer.msg(res.msg, {icon: 6});
                                setTimeout(function(){//两秒后跳转
                                    window.location.href='/Admin/Comment';
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