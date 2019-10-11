
<?php $__env->startSection('content'); ?>
<div class="panel">
  <!-- Panel heading -->
  <div class="panel-heading">
    <div class="panel-control">
     
    </div>
    <h3 class="panel-title">添加栏目</h3></div>
  <!-- Panel body -->
  <form id="demo-bv-errorcnt" class="form-horizontal bv-form" action="/Admin/User/<?php echo e($data->id); ?>" method="POST" novalidate="novalidate">
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
          <?php echo e(csrf_field()); ?>

          <?php echo e(method_field('PUT')); ?> 
          <div class="form-group has-feedback">
            <label class="col-lg-3 control-label">用户昵称</label>
            <div class="col-lg-7">
              <input type="text" class="form-control" name="nickname" disabled value="<?php echo e($data->nickname); ?>" placeholder="分类名称" data-bv-field="name">
              <i class="form-control-feedback" data-bv-icon-for="name" style="display: none;"></i>
            </div>
          </div>
          <div class="form-group has-feedback">
            <label class="col-lg-3 control-label">用户账号</label>
            <div class="col-lg-7">
              <input type="text" class="form-control" name="username" disabled value="<?php echo e($data->username); ?>" placeholder="分类名称" data-bv-field="name">
              <i class="form-control-feedback" data-bv-icon-for="name" style="display: none;"></i>
            </div>
          </div>
          <div class="form-group has-feedback">
            <label class="col-lg-3 control-label">用户手机号</label>
            <div class="col-lg-7">
              <input type="text" class="form-control" name="mobile" disabled value="<?php echo e($data->mobile); ?>" placeholder="分类名称" data-bv-field="name">
              <i class="form-control-feedback" data-bv-icon-for="name" style="display: none;"></i>
            </div>
          </div>
          <div class="form-group has-feedback">
            <label class="col-lg-3 control-label">用户邮箱</label>
            <div class="col-lg-7">
              <input type="text" class="form-control" name="email" disabled value="<?php echo e($data->email); ?>" placeholder="分类名称" data-bv-field="name">
              <i class="form-control-feedback" data-bv-icon-for="name" style="display: none;"></i>
            </div>
          </div>
          <div class="form-group has-feedback">
            <label class="col-lg-3 control-label">密保答案</label>
            <div class="col-lg-7">
              <input type="text" class="form-control" name="answer" disabled value="<?php echo e($data->answer); ?>" placeholder="分类名称" data-bv-field="name">
              <i class="form-control-feedback" data-bv-icon-for="name" style="display: none;"></i>
            </div>
          </div>
          <div class="form-group has-feedback">
            <label class="col-lg-3 control-label">注册时间</label>
            <div class="col-lg-7">
              <input type="text" class="form-control" disabled value="<?php echo e($data->created_at); ?>" placeholder="分类名称" data-bv-field="name">
              <i class="form-control-feedback" data-bv-icon-for="name" style="display: none;"></i>
            </div>
          </div>
          <div class="form-group has-feedback">
            <label class="col-lg-3 control-label">冻结状态</label>
            <div class="col-lg-7">
              <input type="radio" value="1" <?php if($data->is_freeze == 1): ?> checked <?php endif; ?> name="is_freeze">启用
              <input type="radio" value="0" <?php if($data->is_freeze == 0): ?> checked <?php endif; ?> name="is_freeze">禁用
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