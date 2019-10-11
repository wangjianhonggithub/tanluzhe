<?php $__env->startSection('content'); ?>
    <div id="page-content">

        <div class="row">
            <div class="col-lg-6">
                <div class="panel">
                    <div class="panel-heading">
                        <h3 class="panel-title">修改广告</h3>
                    </div>


                    <!-- BASIC FORM ELEMENTS -->
                    <!--===================================================-->
                    <form class="panel-body form-horizontal form-padding" action="/Admin/billboards/update" method="post" enctype="multipart/form-data">

                        <!--Text Input-->
                        <div class="form-group">
                            <label class="col-md-3 control-label" for="demo-text-input">广告标题</label>
                            <div class="col-md-9">
                                <input type="text" value="<?php echo e($data->billboards_title); ?>" id="demo-text-input" name="billboards_title" class="form-control" placeholder="广告牌标题">
                            </div>
                        </div>

                        <!--Email Input-->
                        <div class="form-group">
                            <label class="col-md-3 control-label" for="demo-email-input">默认广告链接</label>
                            <div class="col-md-9">
                                <input type="text" value="<?php echo e($data->billboards_default_url); ?>"  class="form-control" placeholder="url" name="billboards_default_url">
                            </div>
                        </div>

                        <!--Textarea-->
                        <div class="form-group">
                            <label class="col-md-3 control-label">广告图片</label>
                            <div class="col-md-9">
                                <img style="width: 100px" src="<?php echo e($data->billboards_default_pic); ?>" alt="">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-md-3 control-label">广告图片</label>
                            <div class="col-md-9">
					                        <span class="pull-left btn btn-primary btn-file">
					                        选择图片... <input type="file" name="billboards_default_pic">
					                        </span>
                            </div>
                        </div>

                        <div class="form-group pad-ver">
                            <label class="col-md-3 control-label">广告位置</label>
                            <div class="col-md-9">
                                <div class="radio">

                                    <!-- Inline radio buttons -->
                                    <input  id="demo-inline-form-radio-1" class="magic-radio" type="radio" name="billboards_position" <?php if($data->billboards_position == 1){echo 'checked';} ?> value="1">
                                    <label for="demo-inline-form-radio-1">首页广告牌一</label>

                                    <input id="demo-inline-form-radio-2" class="magic-radio" type="radio" name="billboards_position" <?php if($data->billboards_position == 2){echo 'checked';} ?> value="2">
                                    <label for="demo-inline-form-radio-2">首页广告牌二</label>

                                    <input id="demo-inline-form-radio-3" class="magic-radio" type="radio" name="billboards_position" <?php if($data->billboards_position == 3){echo 'checked';} ?> value="3">
                                    <label for="demo-inline-form-radio-3">首页广告牌三</label>

                                    <hr/>
                                    <input id="demo-inline-form-radio-11" class="magic-radio" type="radio" name="billboards_position" <?php if($data->billboards_position == 11){echo 'checked';} ?>  value="11">
                                    <label for="demo-inline-form-radio-11">分类 广告牌一</label>

                                    <input id="demo-inline-form-radio-12" class="magic-radio" type="radio" name="billboards_position" <?php if($data->billboards_position == 12){echo 'checked';} ?> value="12">
                                    <label for="demo-inline-form-radio-12">分类 广告牌二</label>

                                    <hr/>
                                    <input id="demo-inline-form-radio-21" class="magic-radio" type="radio" name="billboards_position" <?php if($data->billboards_position == 21){echo 'checked';} ?> value="21">
                                    <label for="demo-inline-form-radio-21">商品详情广告牌一</label>

                                    <input id="demo-inline-form-radio-22" class="magic-radio" type="radio" name="billboards_position" <?php if($data->billboards_position == 22){echo 'checked';} ?> value="22">
                                    <label for="demo-inline-form-radio-22">商品详情广告牌二</label>

                                    <input id="demo-inline-form-radio-23" class="magic-radio" type="radio" name="billboards_position" <?php if($data->billboards_position == 23){echo 'checked';} ?> value="23">
                                    <label for="demo-inline-form-radio-23">商品详情广告牌三</label>

                                    <input id="demo-inline-form-radio-24" class="magic-radio" type="radio" name="billboards_position" <?php if($data->billboards_position == 24){echo 'checked';} ?> value="24">
                                    <label for="demo-inline-form-radio-24">商品详情广告牌四</label>

                                    <input id="demo-inline-form-radio-25" class="magic-radio" type="radio" name="billboards_position" <?php if($data->billboards_position == 25){echo 'checked';} ?> value="25">
                                    <label for="demo-inline-form-radio-25">商品详情广告牌五</label>


                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-md-3 control-label">位置简介</label>
                            <div class="col-md-9">
                                <img style="width: 100px" src="<?php echo e($data->billboards_position_desc); ?>" alt="">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-md-3 control-label">位置简介</label>
                            <div class="col-md-9">
					                        <span class="pull-left btn btn-primary btn-file">
					                        选择图片... <input type="file" name="billboards_position_desc">
					                        </span>
                            </div>
                        </div>
						
						<div class="form-group">
                            <label class="col-md-3 control-label">开始时间</label>
                            <input type="date" name="startTime" value="<?php echo e(date('Y-m-d',$data->billboards_stime)); ?>">
							<input type="time" name="startDay" value="<?php echo e(date('H:i',$data->billboards_stime)); ?>">
                        </div>
						<div class="form-group">
                            <label class="col-md-3 control-label">结束时间</label>
                            <input type="date" name="endTime" value="<?php echo e(date('Y-m-d',$data->billboards_etime)); ?>">
							<input type="time" name="endDay" value="<?php echo e(date('H:i',$data->billboards_etime)); ?>">
                        </div>

                        <input type="hidden" name="billboards_id" value="<?php echo e($data->billboards_id); ?>">
						
                        <input type="hidden" name="billboards_last_update" value="<?php echo e(date("Y-m-d H-i-s")); ?>">
                        <input type="submit" class="pull-right" value="提交">
                    </form>
                    <!--===================================================-->
                    <!-- END BASIC FORM ELEMENTS -->


                </div>
            </div>
        </div>


    </div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('Admin.Base', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>