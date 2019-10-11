
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
                    <h3 class="panel-title">广告牌列表</h3>
                </div>
                <!--Data Table-->
                <!--===================================================-->
                <div class="panel-body">
                    <div class="pad-btm form-inline">
                        <div class="row">
                            <div class="col-sm-6 table-toolbar-left">
                                <a href="/billboard/create"><button id="demo-btn-addrow" class="btn btn-purple"><i class="demo-pli-add"></i> 添加新的广告牌</button></a>
                            </div>
                        </div>
                    </div>
                    <div class="table-responsive">
                        <table class="table table-striped">
                            <thead>
                            <tr>
                                <th class="text-center">标题</th>
                                <th>位置</th>
                                <th>添加时间</th>
                                <th>广告默认图片</th>
                                
								<th>结束时间</th>
                                <th width="20%">广告牌默认链接</th>
								<th>状态</th>
                            </tr>
                            </thead>
                            <tbody>
                            <?php $__currentLoopData = $data['list']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <tr>
                                <td><a class="btn-link" href="#"><?php echo e($value->billboards_title); ?></a></td>
                                <td><img width="200rem" src="<?php echo e($value->billboards_position_desc); ?>"></td>
                                <td><span class="text-muted"><i class="demo-pli-clock"></i> <?php echo e($value->billboards_creation_date); ?></span></td>
                                <td><img  width="200rem" src="<?php echo e($value->billboards_default_pic); ?>"></td>
                                
								<td><span class="text-muted"><i class="demo-pli-clock"></i> <?php echo e(date('Y-m-d H:i',$value->billboards_etime)); ?></span></td>
                                <td><a href="<?php echo e($value->billboards_url); ?>"><?php echo e($value->billboards_default_url); ?></a></td>
								<td>
                                    <?php switch($value->billboards_status):
                                        case (1): ?>
                                        <a href="/billboardAuc/<?php echo e($value->billboards_position); ?>" title="点击会结束竞拍"><div class="label label-table label-success">正在竞拍中</div></a>
                                        <?php break; ?>

                                        <?php case (3): ?>
                                        <a href="/billboard/overview?id=<?php echo e($value->billboards_position); ?>"><div class="label label-table label-default" title="用户正在展示，点击结束用户展示，从新回复竞拍">用户展示中</div></a>
                                        <?php break; ?>

                                        <?php default: ?>
                                        Default case...
                                    <?php endswitch; ?>
                                </td>
                            </tr>	                                                          
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </tbody>
                        </table>
                        
                    </div>
                </div>
                <!--===================================================-->
                <!--End Data Table-->

            </div>


        </div>
        <!--===================================================-->

<?php $__env->stopSection(); ?>
<?php echo $__env->make('Admin.Base', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>