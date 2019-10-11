
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
            <label class="col-lg-3 control-label">软件名称</label>
            <div class="col-lg-7">
              <input type="text" class="form-control"  disabled value="<?php echo e($data->softwarename); ?>" placeholder="分类名称" data-bv-field="name">
              <i class="form-control-feedback" data-bv-icon-for="name" style="display: none;"></i>
            </div>
          </div>
          <div class="form-group has-feedback">
            <label class="col-lg-3 control-label">发布人账号</label>
            <div class="col-lg-7">
              <input type="text" class="form-control" disabled value="<?php echo e($data->username); ?>" placeholder="分类名称" data-bv-field="name">
              <i class="form-control-feedback" data-bv-icon-for="name" style="display: none;"></i>
            </div>
          </div>
          <div class="form-group has-feedback">
            <label class="col-lg-3 control-label">发布人昵称</label>
            <div class="col-lg-7">
              <input type="text" class="form-control"  disabled value="<?php echo e($data->nickname); ?>" placeholder="分类名称" data-bv-field="name">
              <i class="form-control-feedback" data-bv-icon-for="name" style="display: none;"></i>
            </div>
          </div>
          <div class="form-group has-feedback">
            <label class="col-lg-3 control-label">软件封面图片</label>
            <div class="col-lg-7">
              <img src="<?php echo e($data->cover); ?>" alt="" width="120" height="120">
              <i class="form-control-feedback" data-bv-icon-for="name" style="display: none;"></i>
            </div>
          </div>
          <div class="form-group has-feedback">
            <label class="col-lg-3 control-label">适用平台</label>
            <div class="col-lg-7">
              <input type="text" class="form-control"  disabled value="<?php echo e($data->platform); ?>" placeholder="分类名称" data-bv-field="name">
              <i class="form-control-feedback" data-bv-icon-for="name" style="display: none;"></i>
            </div>
          </div>
          <div class="form-group has-feedback">
            <label class="col-lg-3 control-label">分类</label>
            <div class="col-lg-7">
              <input type="text" class="form-control" disabled value="<?php echo e($data->caty_name); ?>" placeholder="分类名称" data-bv-field="name">
              <i class="form-control-feedback" data-bv-icon-for="name" style="display: none;"></i>
            </div>
          </div>
          <div class="form-group has-feedback">
            <label class="col-lg-3 control-label">软件大小</label>
            <div class="col-lg-7">
              <input type="text" class="form-control" disabled value="<?php echo e($data->software_size); ?>" placeholder="分类名称" data-bv-field="name">
              <i class="form-control-feedback" data-bv-icon-for="name" style="display: none;"></i>
            </div>
          </div>
          <div class="form-group has-feedback">
            <label class="col-lg-3 control-label">软件描述</label>
            <div class="col-lg-7">
              <textarea disabled style="width:950px;height:300px"><?php echo e($data->description); ?></textarea>
              <i class="form-control-feedback" data-bv-icon-for="name" style="display: none;"></i>
            </div>
          </div>
          <div class="form-group has-feedback">
            <label class="col-lg-3 control-label">是否收费</label>
            <div class="col-lg-7">
              <input type="text" class="form-control" disabled value="<?php if($data->charge == 1): ?>免费<?php else: ?>收费<?php endif; ?>" placeholder="分类名称" data-bv-field="name">
              <i class="form-control-feedback" data-bv-icon-for="name" style="display: none;"></i>
            </div>
          </div>
          <div class="form-group has-feedback">
            <label class="col-lg-3 control-label">创建时间</label>
            <div class="col-lg-7">
              <input type="text" class="form-control" disabled value="<?php echo e($data->created_at); ?>" placeholder="分类名称" data-bv-field="name">
              <i class="form-control-feedback" data-bv-icon-for="name" style="display: none;"></i>
            </div>
          </div>
          <div class="form-group has-feedback">
            <label class="col-lg-3 control-label">审核状态</label>
            <div class="col-lg-7">
              <input type="radio" value="1" <?php if($data->is_status == 1): ?> checked <?php endif; ?> name="is_status">审核通过
              <input type="radio" value="0" <?php if($data->is_status == 0): ?> checked <?php endif; ?> name="is_status">审核未通过
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