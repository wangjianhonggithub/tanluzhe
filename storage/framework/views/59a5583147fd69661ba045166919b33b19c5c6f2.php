<!DOCTYPE html>
<html lang="en" style="font-size: 625%;">
<head>
    <meta charset="UTF-8">
    <title>探路者网络--下载记录</title>
    <meta content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0;" name="viewport" />
    <link rel="stylesheet" href="/Home/css/bootstrap.min.css">
    <link rel="stylesheet" href="/Home/css/personal-xiazai.css">
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
                <img src="/Home/images/icon(6).png">
                <span>我的上传</span>
            </div>
            <div class="con-con">
                <!-- <ul class="title">
                    <li class="active list"><a href="/UserCenter">我的下载</a></li>
                    <li class="list"><a href="/UserBeDown">被下载</a></li>
                </ul> -->
                <ul class="con-wz">
                    <li class="list active">
                        <p class="con-title">
                            <span>标题</span>
                            <span>类型</span>
                            <span>状态</span>
                            <span>时间</span>
                            <span>下载次数</span>
                            <span>操作</span>
                        </p>
                        <?php $__currentLoopData = $DownInfo; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $downInfo): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <p class="wz-con">
                            <a href="/SoftwareInfo/<?php echo e($downInfo->id); ?>.html">
                                <span><?php echo e($downInfo->softwarename); ?></span>
                                <span><?php echo e($downInfo->caty_name); ?></span>
                                <span><?php echo e($downInfo->software_size); ?></span>
                                <span><?php echo e($downInfo->created_at); ?></span>
                            </a>
                        </p>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        <?php echo e($DownInfo->links()); ?>

                    </li>
                </ul>

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