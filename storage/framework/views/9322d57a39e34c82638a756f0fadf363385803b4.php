<!DOCTYPE html>
<html lang="en" style="font-size: 625%;">
<head>
    <meta charset="UTF-8">
    <title>探路者网络--登录</title>
    <meta content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0;" name="viewport" />
    <link rel="stylesheet" href="/Home/css/bootstrap.min.css">
    <link rel="stylesheet" href="/Home/css/login.css">
</head>
<body>
<?php echo $__env->make('Home.Public.LoginHeader', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
<div class="content">
    <div class="container">
        <div class="big">
            <strong class="col-md-4 col-md-offset-4" style='font-weight: normal; color:red;min-height: 0;font-size: 14px; background: rgba(255,255,255,0.8)'><?php echo e(Session::get('info')); ?></strong>
            <div class="top">
                <p>登录</p>
                <p>PLEASE LOGIN</p>
            </div>
            <form action="/DoLoginInt" method="post">
                <label>
                    <span>用户名：</span>
                    <input type="text" name="username" placeholder="请输入用户名">
                </label>
                <label>
                    <span>密码：</span>
                    <input type="password" name="password" placeholder="请输入密码">
                </label>
                 <?php echo e(csrf_field()); ?>

                <p>
                    <span>还没有账号？立即 <a href="/Registered">注册</a></span>
                    <span><a href="/Forgot">忘记密码</a></span>
                </p>
                <input type="submit" class="tijiao" value="登录">
            </form>
        </div>
    </div>
</div>

<script src="/Home/js/jquery-3.2.1.min.js"></script>
<script src="/Home/js/bootstrap.min.js"></script>
<script src="/Home/js/public.js"></script>
</body>
</html>