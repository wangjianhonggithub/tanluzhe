<!DOCTYPE html>
<html lang="en" style="font-size: 625%;">
<head>
    <meta charset="UTF-8">
    <title>探路者网络--联系我们</title>
    <meta content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0;" name="viewport" />
    <link rel="stylesheet" href="/Home/css/bootstrap.min.css">
    <link rel="stylesheet" href="/Home/css/contact.css">
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
            <div class="title-xq">
                <p>联系我们</p>
                <p>CONTACT US</p>
            </div>
            <div class="text-xq">
                <div class="left">
                    <div class="dian">
                        <img src="/Home/images/dian.png">
                        <?php echo e($ContactUs->mobile); ?>

                    </div>
                    <div class="wz">
                        <p>地址：<?php echo e($ContactUs->address); ?></p>
                        <p>邮编：<?php echo e($ContactUs->zip_code); ?></p>
                        <p>公司总机：<?php echo e($ContactUs->switchboard); ?></p>
                        <p>广告服务：<?php echo e($ContactUs->adv_mobile); ?></p>
                        <p>邮箱：<?php echo e($ContactUs->email); ?></p>
                        <p>
                            <img src="<?php echo e($ContactUs->qr_code); ?>">
                        </p>
                        <p>扫描二维码关注我</p>
                    </div>
                </div>
                <div class="right"><img src="<?php echo e($ContactUs->c_map); ?>"></div>
            </div>
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