
<?php $__env->startSection('content'); ?>
<strong class="col-md-4 col-md-offset-4  alert-success"><?php echo e(Session::get('info')); ?></strong>
<div class="panel">
    <div class="panel-heading">
        <h3 class="panel-title">列表</h3>
    </div>
    <div id="demo-custom-toolbar2" class="table-toolbar-left">
        <a href="/Admin/User?is_cert=1" id="demo-dt-addrow-btn" class="btn btn-primary">已认证</a> 
        <a href="/Admin/User?is_cert=0" id="demo-dt-addrow-btn" class="btn btn-primary">未认证</a> 
        <a href="/Admin/User?is_freeze=1" id="demo-dt-addrow-btn" class="btn btn-primary">启用</a> 
        <a href="/Admin/User?is_freeze=0" id="demo-dt-addrow-btn" class="btn btn-primary">禁用</a> 
        <div class="col-m-5 col-offset-4" style="float: right;margin-left:950px;">
        <form action="/Admin/User" method="get" accept-charset="utf-8">
           账号:<input type="text" name="username">
           昵称:<input type="text" name="nickname">
           <input type="submit" name="" value="搜索">
        </form>
        </div>
    </div>
    <div class="panel-body">
        
        <table id="demo-dt-addrow" class="table table-striped table-bordered" cellspacing="0" width="100%">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>账号</th>
                    <th class="min-tablet">昵称</th>
                    <th class="min-tablet">头像</th>
                    <th class="min-desktop">认证状态</th>
                    <th class="min-desktop">时间</th>
                    <th class="min-desktop">状态</th>
                    <th class="min-desktop">操作</th>
                </tr>
            </thead>
            <tbody>
                <?php $__currentLoopData = $data; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $v): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <tr>
                    <td><?php echo e($v->id); ?></td>
                    <td><?php echo e($v->username); ?></td>
                    <td><?php echo e($v->nickname); ?></td>
                    <td><img src="<?php echo e($v->header_pic); ?>" width="60" height="60" alt=""></td>
                    <?php if($v->is_cert == 1): ?>
                    <td class="label label-table label-success">已认证</td>
                    <?php else: ?>
                    <td class="label label-table label-danger">未认证</td>
                    <?php endif; ?>
                    <td><?php echo e($v->created_at); ?></td>
                    <?php if($v->is_freeze == 1): ?>
                    <td class="label label-table label-success">启用</td>
                    <?php else: ?>
                    <td class="label label-table label-danger">禁用</td>
                    <?php endif; ?>
                    <td>
                    	<a href="/Admin/User/<?php echo e($v->id); ?>/edit" class="btn btn-xs btn-rounded btn-warning">查看信息</a>
                       <!--  <form action="/Admin/Nav/<?php echo e($v->id); ?>" method="POST" style="display: inline;" accept-charset="utf-8">
                            <?php echo e(method_field('DELETE')); ?>

                            <?php echo e(csrf_field()); ?>

                           <button class="btn btn-xs btn-rounded btn-danger">删除</button>
                        </form> -->
                    </td>
                </tr>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </tbody>
        </table>
        <?php if(is_array($page)): ?>
            <?php if(isset($page['is_cert'])): ?>
            <?php echo e($data->appends(['is_cert' => $page['is_cert']])->links()); ?>

            <?php endif; ?>
            <?php if(isset($page['is_freeze'])): ?>
            <?php echo e($data->appends(['is_freeze' => $page['is_freeze']])->links()); ?>

            <?php endif; ?>
        <?php else: ?>
        <?php echo e($data->links()); ?>

        <?php endif; ?>
    </div>
</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('Admin.Base', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>