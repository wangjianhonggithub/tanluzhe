
<?php $__env->startSection('content'); ?>
<div class="panel">
    <div class="panel-heading">
        <h3 class="panel-title">列表</h3>
    </div>

    <div id="demo-custom-toolbar2" class="table-toolbar-left">
        <a href="/Admin/Banner/create" id="demo-dt-addrow-btn" class="btn btn-primary"><i class="demo-pli-plus"></i> 添加</a> 
        <div class="col-m-5">
        <!--Block Level buttons-->
        <!--===================================================-->
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
    <strong class="col-md-4 col-md-offset-4  alert-success"><?php echo e(Session::get('info')); ?></strong>

        <!--===================================================-->
    <div class="panel-body">
        <table id="demo-dt-addrow" class="table table-striped table-bordered" cellspacing="0" width="100%">
            <thead>
                <tr>
                    <th>ID</th>
                    <th class="min-tablet">轮播图</th>
                    <th class="min-tablet">标题</th>
                    <th class="min-tablet">描述</th>
                    <th class="min-tablet">所属广告位</th>
                    <th class="min-tablet">创建时间</th>
                    <th class="min-tablet">修改时间</th>
                    <th class="min-desktop">操作</th>
                </tr>
            </thead>
            <tbody>
                <?php $__currentLoopData = $data; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $val): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <tr>
                    <td><?php echo e($val->id); ?></td>
                    <td><img src="<?php echo e($val->banner_img); ?>" width="150" height="80" alt=""></td>
                    <td><?php echo e($val->title); ?></td>
                    <td><?php echo e($val->description); ?></td>
                    <td><?php echo e($val->nav_name); ?></td>
                    <td><?php echo e($val->created_at); ?></td>
                    <td><?php echo e($val->updated_at); ?></td>
                    <td>
                    	<a href="/Admin/Banner/<?php echo e($val->id); ?>/edit" class="btn btn-xs btn-rounded btn-warning">修改</a>
                        <form action="/Admin/Banner/<?php echo e($val->id); ?>" method="POST" style="display: inline;" accept-charset="utf-8">
                            <?php echo e(method_field('DELETE')); ?>

                            <?php echo e(csrf_field()); ?>

                           <button class="btn btn-xs btn-rounded btn-danger">删除</button>
                        </form>
                        <?php switch($val->status):
                            case (0): ?>
                            <a href="/acarousel/getresultAuc?id=<?php echo e($val->id); ?>" class="btn btn-xs btn-rounded btn-mint">赛选竞拍结果</a>
                            <?php break; ?>

                            <?php case (3): ?>
                            <a href="/Admin/acarousel/overview?id=<?php echo e($val->id); ?>" class="btn btn-xs btn-rounded btn-primary">重新竞拍</a>
                            <?php break; ?>

                            <?php default: ?>
                            <a href="/acarousel/getresultAuc?id=<?php echo e($val->id); ?>" class="btn btn-xs btn-rounded btn-default">其他</a>
                        <?php endswitch; ?>
					<!--<a href="/Admin/Banner/<?php echo e($val->id); ?>/edit" class="btn btn-xs btn-rounded btn-primary">结束竞拍</a>
                        <a href="/Admin/Banner/<?php echo e($val->id); ?>/edit" class="btn btn-xs btn-rounded btn-mint">重新竞拍</a>-->
                    </td>
                </tr>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </tbody>
        </table>
        <?php echo e($data->links()); ?>

    </div> 
</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('Admin.Base', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>