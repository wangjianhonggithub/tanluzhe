<!DOCTYPE html>
<html lang="en" style="font-size: 625%;">
<head>
    <meta charset="UTF-8">
    <title>探路者网络--消息中心</title>
    <meta content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0;" name="viewport" />
    <link rel="stylesheet" href="/Home/css/bootstrap.min.css">
    <link rel="stylesheet" href="/Home/css/personal-message.css">
    <link rel="stylesheet" href="/Home/css/header.css">
    <link rel="stylesheet" href="/Home/css/footer.css">
    <link rel="stylesheet" href="/Home/css/personal-left.css">
    <link rel="stylesheet" href="/layui/css/layui.css">
    <script src="/Home/js/include.js"></script>
</head>
<body>

<?php echo $__env->make('Home.Public.header', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>

<div class="content">
    <div class="container">
        <?php echo $__env->make('Home.Public.CenterLeft', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
        <div class="right">
            <div class="top">
                <img src="/Home/images/icon(8).png">
                <span>消息中心</span>
            </div>
            <div class="con-con">

                <ul>
                    <?php $__currentLoopData = $MsgData; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $MsgVal): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <li>
                        <div class="title">通知消息</div>
                        <div class="message">
                            <?php echo e($MsgVal->msg); ?>

                        </div>
                        <div class="time">
                            <span class="text-left"><?php echo date('Y-m-d H:i',$MsgVal->create_time)?></span>
                            <span class="text-right"><a href="javascript:;" class="MsgDelete" data-id='<?php echo e($MsgVal->news_id); ?>'>删除</a></span>
                        </div>
                    </li>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
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
<script src="/layui/layui.all.js"></script>
<script>
    $(function(){
        $('.MsgDelete').click(function(){
            var id = $(this).attr('data-id');
            $.ajax({
                type: 'GET',
                url: '/MessageDelete',
                data: {
                  id:id,
                },
                dataType: 'json',
                success: function(data){
                   if (data.code == 1) {
                        layer.msg(data.meg, function(){
                        });
                        setTimeout(function(){//两秒后跳转  
                         window.location.href='/UserMessage';
                        },2000);  
                        return false;
                    }else{
                        layer.msg(data.meg, function(){
                          //关闭后的操作
                        });
                        return false;
                    }
                },
            });
        })
    })
</script>
</body>
</html>