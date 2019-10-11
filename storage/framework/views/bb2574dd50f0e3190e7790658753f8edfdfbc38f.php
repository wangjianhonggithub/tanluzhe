
<?php $__env->startSection('content'); ?>
<div class="panel">
  <!-- Panel heading -->
  <div class="panel-heading">
    <div class="panel-control">
     
    </div>
    <h3 class="panel-title">添加栏目</h3></div>
  <!-- Panel body -->
  <form id="demo-bv-errorcnt" class="form-horizontal bv-form" action="/Admin/Administrator/<?php echo e($data->id); ?>" method="POST" novalidate="novalidate">
    <button type="submit" class="bv-hidden-submit" style="display: none; width: 0px; height: 0px;"></button>
    <div class="panel-body">
      <div class="tab-content">
        <!--SHOWING ERRORS IN TOOLTIP-->
        <!--===================================================-->
        <div id="demo-tabs-box-1" class="tab-pane fade in active">
    			<?php if(count($errors) > 0): ?>
    			    <div class="alert alert-danger">
    			        <ul>
    			            <?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $error): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
    			                <li style="list-style: none"><?php echo e($error); ?></li>
    			            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    			        </ul>
    			    </div>
    			<?php endif; ?> 
          <?php echo e(method_field('PUT')); ?> 
          <?php echo e(csrf_field()); ?>      	
          <div class="form-group has-feedback">
            <label class="col-lg-3 control-label">用户名</label>
            <div class="col-lg-7">
              <input type="text" class="form-control" name="username" value="<?php echo e($data->username); ?>" placeholder="用户名" data-bv-field="name">
              <i class="form-control-feedback" data-bv-icon-for="name" style="display: none;"></i>
            </div>
          </div>
          <input type="hidden" name="password" value="<?php echo e($data->password); ?>">
          <div class="form-group has-feedback">
            <label class="col-lg-3 control-label">昵称</label>
            <div class="col-lg-7">
              <input type="email" class="form-control" name="nickname" value="<?php echo e($data->nickname); ?>" placeholder="昵称" data-bv-field="email">
              <i class="form-control-feedback" data-bv-icon-for="email" style="display: none;"></i>
            </div>
          </div>
          <div class="form-group has-feedback">
            <label class="col-lg-3 control-label">状态</label>
            <div class="col-lg-7">
              <input type="radio" name="status" value="1" <?php if($data->status==1): ?> checked="checked" <?php endif; ?>>启用
              <input type="radio" name="status" value="0" <?php if($data->status==0): ?> checked="checked" <?php endif; ?>>禁用
            </div>
          </div>
        </div>
       </div>
    </div>
    <div class="panel-footer clearfix">
      <div class="col-lg-7 col-lg-offset-3">
        <button type="submit" class="btn btn-mint" value="点击创建">点击创建</button></div>
    </div>
  </form>
</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('Admin.Base', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>