<!DOCTYPE html>
<html lang="en" style="font-size: 625%;">
<head>
    <meta charset="UTF-8">
    <title>探路者网络--我的上传</title>
    <meta content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0;" name="viewport" />
    <link rel="stylesheet" href="/Home/css/bootstrap.min.css">
    <link rel="stylesheet" href="/Home/css/personal-shangchuan.css">
    <link rel="stylesheet" href="/Home/css/header.css">
    <link rel="stylesheet" href="/Home/css/footer.css">
    <link rel="stylesheet" href="/Home/css/personal-left.css">
    <script src="/Home/js/include.js"></script>
</head>
<body>
<?php echo $__env->make('Home.Public.header', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
<div class="content">
    <div class="container">
        <?php echo $__env->make('Home.Public.CenterLeft', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
        <div class="right">
            <div class="top">
                <img src="/Home/images/icon(4).png">
                <span>我的上传</span>
            </div>
            <strong class="col-md-4 col-md-offset-4" style='font-weight: normal; color:red;min-height: 0;font-size: 14px; background: rgba(255,255,255,0.8)'><?php echo e(Session::get('info')); ?></strong>
            <div class="con-con">
                <ul class="con-wz">
                    <li>
                        <p class="con-title">
                            <span style='width: 14%;text-align: center;'>ID</span>
                            <span style='width: 14%;text-align: center;'>标题</span>
                            <span style='width: 14%;text-align: center;'>类型</span>
                            <span style='width: 14%;text-align: center;'>状态</span>
                            <span style='width: 14%;text-align: center;'>时间</span>
                            <span style='width: 14%;text-align: center;'>下载次数</span>
                            <span style='width: 14%;text-align: center;'>操作</span>
                        </p>
                        <?php $__currentLoopData = $UserUpLoadList; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $List): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <p class="wz-con">
                            <a href="/SoftwareInfo/<?php echo e($List->id); ?>.html">
                                <span style='width: 14%;text-align: center;'><?php echo e($List->id); ?></span>
                                <span style='width: 14%;text-align: center;'><?php echo e($List->softwarename); ?></span>
                                <span style='width: 14%;text-align: center;'><?php echo e($List->caty_name); ?></span>
                                <?php if($List->is_status === 0): ?>
                                <span style='width: 14%;text-align: center;'>审核中</span>
                                <?php elseif($List->is_status === 1): ?>
                                <span style='width: 14%;text-align: center;'>已通过</span>
                                <?php else: ?>
                                <span style='width: 14%;text-align: center;'>未通过</span>
                                <?php endif; ?>
                                <span style='width: 14%;text-align: center;'><?php echo e($List->created_at); ?></span>
                                <span style='width: 14%;text-align: center;'>111次</span>
                            </a>
                            <span style='width: 14%;text-align: center;'>
                                <a href="/softWareUpdate/<?php echo e($List->id); ?>.py">编辑</a>
                                <a href="/softWareDelete/<?php echo e($List->id); ?>.py">删除</a>
                            </span>
                        </p>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </li>
                </ul>
                <?php echo e($UserUpLoadList->links()); ?>

            </div>
        </div>
    </div>
</div>

<?php echo $__env->make('Home.Public.footer', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>

<script src="/Home/js/jquery-3.2.1.min.js"></script>
<script src="/Home/js/bootstrap.min.js"></script>
<script src="/Home/js/personal.js"></script>
<script src="/Home/js/public.js"></script>
</body>
</html>