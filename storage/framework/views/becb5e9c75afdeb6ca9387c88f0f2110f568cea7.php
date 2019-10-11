<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>探路者网络--帮助中心</title>
    <meta content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0;" name="viewport" />
    <link rel="stylesheet" href="/Home/css/bootstrap.min.css">
    <link rel="stylesheet" href="/Home/css/help.css">
    <link rel="stylesheet" href="/Home/css/footer.css">
    <link rel="stylesheet" href="/Home/css/header.css">
    <script src="/Home/js/include.js"></script>
</head>
<body>

<?php echo $__env->make('Home.Public.header', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
<!--banner-->
<?php echo $__env->make('Home.Public.IntBanner', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
<!--banner-->
<div class="content">
    <div class="container">
        <div class="con-con">
            <div class="top">
                <p>帮助中心</p>
                <p>HELP CENTER</p>
            </div>
            <ul>
                <?php $__currentLoopData = $Help; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $Helps): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <li>
                    <a href="/HelpInfo/<?php echo e($Helps->id); ?>.html">
                        <div class="title"><?php echo e($Helps->title); ?></div>
                        <div class="text"><?php echo e($Helps->description); ?></div>
                    </a>
                </li>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </ul>
            <?php echo e($Help->links()); ?>

        </div>
    </div>
</div>
<?php echo $__env->make('Home.Public.footer', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
<script src="/Home/js/jquery-3.2.1.min.js"></script>
<script src="/Home/js/bootstrap.min.js"></script>
<script src="/Home/js/index.js"></script>
<script src="/Home/js/IntBanner.js"></script>
<script src="/Home/js/public.js"></script>
</body>
</html>