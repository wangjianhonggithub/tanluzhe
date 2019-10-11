<?php $__env->startSection('content'); ?>
<div class="panel">
  <!-- Panel heading -->
  <div class="panel-heading">
		<div class="panel-control">
		 
		</div>
		<h3 class="panel-title">添加</h3>
	</div>
  <!-- Panel body -->
	<form id="demo-bv-errorcnt" class="form-horizontal bv-form" action="/Admin/Information/InformationAdd" method="POST" enctype="multipart/form-data" novalidate="novalidate">
	<?php echo e(csrf_field()); ?>

		<button type="submit" class="bv-hidden-submit" style="display: none; width: 0px; height: 0px;"></button>
		<div class="panel-body">
			<div class="tab-content">
				<!--SHOWING ERRORS IN TOOLTIP-->
				<!--===================================================-->
				<ul>

				</ul>
				<div id="demo-tabs-box-1" class="tab-pane fade in active">
					<?php if(!empty($error)): ?>
						<div class="alert alert-danger">
							<ul>
								<?php $__currentLoopData = $error; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $v): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
									<li style="list-style: none"><?php echo e($v['0']); ?></li>
								<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
							</ul>
						</div>
					<?php endif; ?>  
					<div class="form-group has-feedback">
						<label class="col-lg-3 control-label">留言内容</label>
						<div class="col-lg-7">
						  <input type="text" class="form-control" name="liuyan" placeholder="留言内容" data-bv-field="name">
						  <i class="form-control-feedback" data-bv-icon-for="name" style="display: none;"></i>
						</div>
					</div>
					<div class="form-group has-feedback">
						<label class="col-lg-3 control-label">分类</label>
						<div class="col-lg-7">
						  <select name="type" class="selectpicker col-lg-6" name="pid" data-live-search="true" data-width="100%" tabindex="-98">
							<option value="1">通过</option>
							<option value="2">未通过</option>
						  </select>
						</div>
					</div>
					
					
				</div>
		   </div>
		</div>
		<div class="panel-footer clearfix">
			<div class="col-lg-7 col-lg-offset-3">
				<button type="submit" class="btn btn-mint" value="点击创建">点击添加</button>
			</div>
		</div>
	</form>
</div>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('Admin.Base', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>