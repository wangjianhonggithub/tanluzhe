
<?php $__env->startSection('content'); ?>

    <!--Breadcrumb-->
    <!--~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~-->
    <!--~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~-->
    <!--End breadcrumb-->




    <!--Page content-->
    <!--===================================================-->
    <div id="page-content">


        <div class="panel">
            <div class="panel-heading">
                <h3 class="panel-title">通过的广告牌</h3>
            </div>

            <!--Data Table-->
            <!--===================================================-->
            <div class="panel-body">
                <div class="table-responsive">
                    <table class="table table-striped">
                        <thead>
                        <tr>
                            <th class="text-center">标题</th>
                            <th>位置</th>
                            <th>链接</th>
                            <th>广告图片</th>
                            <th width="20%">订单提交时间</th>

                        </tr>
                        </thead>
                        <tbody>
                        <?php $__currentLoopData = $data; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <tr>
                                <td><a class="btn-link" href="#"><?php echo e($value->title); ?></a></td>
                                <td><?php echo e($value->billboards_position); ?></td>
                                <td><span class="text-muted"><?php echo e($value->url); ?></span></td>
                                <td><img  width="200rem" src="<?php echo e($value->pic); ?>"></td>
                                <td><i class="demo-pli-clock"></i> <?php echo e($value->addtime); ?></td>
                            </tr>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </tbody>
                    </table>
                    <?php echo e($data->links()); ?>

                </div>
            </div>
            <!--===================================================-->
            <!--End Data Table-->

        </div>


    </div>
    <!--===================================================-->

<?php $__env->stopSection(); ?>
<?php echo $__env->make('Admin.Base', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>