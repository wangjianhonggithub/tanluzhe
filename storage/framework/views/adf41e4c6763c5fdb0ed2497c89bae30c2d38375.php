<?php $__env->startSection('content'); ?>
<div class="panel">
  <!-- Panel heading -->
  <div class="panel-heading">
    <div class="panel-control">
     
    </div>
    <h3 class="panel-title">查看</h3></div>
  <!-- Panel body -->
  <form id="demo-bv-errorcnt" class="form-horizontal bv-form" action="/Admin/Up/<?php echo e($data->id); ?>" method="POST" novalidate="novalidate">
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
            <label class="col-lg-3 control-label">手持身份证</label>
            <div class="col-lg-7">
              <img src="<?php echo e($data->id_card); ?>" alt="" width="600" height="400">
              <i class="form-control-feedback" data-bv-icon-for="name" style="display: none;"></i>
            </div>
          </div>
          <div class="form-group has-feedback">
            <label class="col-lg-3 control-label">公司执照</label>
            <div class="col-lg-7">
              <img src="<?php echo e($data->license); ?>" alt="" width="600" height="400">
              <i class="form-control-feedback" data-bv-icon-for="name" style="display: none;"></i>
            </div>
          </div>
        </div>
       </div>
    </div>
    <div class="panel-footer clearfix">
      <div class="col-lg-7 col-lg-offset-3">
       
    </div>
  </form>
</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('Admin.Base', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>