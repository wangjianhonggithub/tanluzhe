<?php $__env->startSection('content'); ?>
    <div class="panel">
        <div class="panel-heading">
            <h3 class="panel-title">轮播图列表</h3>
        </div>

        <div id="demo-custom-toolbar2" class="table-toolbar-left">
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
                                <a href="/Bidders/getresult/<?php echo e($val->id); ?>" class="btn btn-xs btn-rounded btn-warning">结束竞拍</a>
                            </td>
                        </tr>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </tbody>
                </table>
                <?php echo e($data->links()); ?>

            </div>
    </div>

    <div class="panel">
        <div class="panel-heading">
            <h3 class="panel-title">静态广告列表</h3>
        </div>

        <div id="demo-custom-toolbar2" class="table-toolbar-left">
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
                        <th>标题</th>
                        <th class="min-tablet">轮播图</th>
                        <th class="min-tablet">跳转链接</th>
                        <th class="min-tablet">状态</th>
                        <th class="min-tablet">添加时间</th>
                        <th class="min-tablet">结束竞拍</th>
                    </tr>
                    </thead>
                    <tbody>
                    <?php $__currentLoopData = $advList; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $k=>$advList): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <tr>
                            <td><?php echo e($advList['title']); ?></td>
                            <td><img src="<?php echo e($advList['img']); ?>" width="150" height="80" alt=""></td>
                            <td><?php echo e($advList['url']); ?></td>
                            <td><?php echo e($advList['status']); ?></td>
                            <td><?php echo e($advList['addtime']); ?></td>
                            <!-- 
                            <td><?php echo e($advList['title']); ?></td>
                            <td><img src="<?php echo e($advList['img']); ?>" width="150" height="80" alt=""></td>
                            <td><?php echo e($advList['url']); ?></td>
                            <td><?php echo e($advList['status']); ?></td>
                            <td><?php echo e($advList['addtime']); ?></td> -->
                            <td>
                                <a href="/Bidders/getresult/<?php echo e($advList['title']); ?>" class="btn btn-xs btn-rounded btn-warning">结束竞拍</a>
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