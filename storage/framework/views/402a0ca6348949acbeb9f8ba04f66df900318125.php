<!DOCTYPE html>
<html lang="en" style="font-size: 625%;">
<head>
    <meta charset="UTF-8">
    <title>探路者网络--我的设置</title>
    <meta content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0;" name="viewport" />
    <link rel="stylesheet" href="/Home/css/bootstrap.min.css">
    <link rel="stylesheet" href="/Home/css/personal-shezhi.css">
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
                <img src="/Home/images/icon(5).png">
                <span>我的设置</span>
            </div>
            <?php if(count($errors) > 0): ?>
                    <div class="alert alert-danger">
                        <ul>
                            <?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $error): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <li style="list-style: none;"><?php echo e($error); ?></li>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </ul>
                    </div>
            <?php endif; ?>
            <div class="con-con">
                <ul class="title">
                    <li><a href="/UserConf">个人资料</a></li>
                    <li class="active"><a href="/UserUpdatePasswd">修改密码</a></li>
                </ul>
                  <strong class="col-md-4 col-md-offset-4" style='font-weight: normal; color:red;min-height: 0;font-size: 14px; background: rgba(255,255,255,0.8)'><?php echo e(Session::get('messages')); ?></strong>
                <ul class="con-wz">
                    <li class="active">
                        <form action="/DoUserUpdatePasswd" method="post">
                            <label class="lab">
                                <span>当前密码</span>
                                <input type="password" class="inp"  name="password" value="<?php echo e(old('password')); ?>">
                            </label>
                            <label class="lab">
                                <span>新密码</span>
                                <input type="password" class="inp"  name="newPassword" value="<?php echo e(old('newPassword')); ?>">
                            </label>
                            <label class="lab">
                                <span>确认密码</span>
                                <input type="password" class="inp"  name="rePassword" value="<?php echo e(old('rePassword')); ?>">
                            </label>
                            <?php echo e(csrf_field()); ?>

                            <input type="submit" value="保存" class="tijiao">
                        </form>
                    </li>
                    <li>

                    </li>
                </ul>
            </div>
        </div>
    </div>
</div>

<?php echo $__env->make('Home.Public.footer', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>

<script src="/Home/js/jquery-3.2.1.min.js"></script>
<script src="/Home/js/bootstrap.min.js"></script>
<script src="/Home/js/public.js"></script>
</body>
</html>