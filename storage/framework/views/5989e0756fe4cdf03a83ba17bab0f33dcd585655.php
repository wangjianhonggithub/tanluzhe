<!DOCTYPE html>
<html lang="en" style="font-size: 625%;">
<head>
    <meta charset="UTF-8">
    <title>探路者网络--我的评论</title>
    <meta content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0" name="viewport" />
    <link rel="stylesheet" href="/Home/css/bootstrap.min.css">
    <link rel="stylesheet" href="/Home/css/personal-pinglun.css">
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
                <img src="/Home/images/pin.png">
                <span>我的评论</span>
            </div>
            <div class="con-con">
                <ul>
                    <?php $__currentLoopData = $CommentInfo; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $comment): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <li>
                        <img src="<?php echo e($comment->header_pic); ?>" class="head">
                        <div class="nr">
                            <div class="title">
                                <p>我评论 <span><?php echo e($comment->softwarename); ?></span> 说：</p>
                                <p><?= substr($comment->created_at,0,10)?></p>
                            </div>
                            <div class="nr-con">
                                <?php echo e($comment->content); ?>

                            </div>
                            <div class="con-bottom">
                                <a href="/SoftwareInfo/<?php echo e($comment->id); ?>.html" title="">
                                    <div class="img-left"><img src="<?php echo e($comment->cover); ?>"></div>
                                    <div class="nr-right">
                                        <p><?php echo e($comment->softwarename); ?></p>
                                        <p>
                                            <?php echo e($comment->description); ?>

                                        </p>
                                    </div>
                                </a>
                            </div>
                        </div>
                    </li>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </ul>
            </div>
              <?php echo e($CommentInfo->links()); ?>

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