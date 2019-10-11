<!DOCTYPE html>
<html lang="en" style="font-size: 625%;">
<head>
    <meta charset="UTF-8">
    <title>探路者网络--手机找回</title>
    <meta content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0;" name="viewport" />
    <meta name="_token" content="<?php echo e(csrf_token()); ?>"/>
    <link rel="stylesheet" href="/Home/css/bootstrap.min.css">
    <link rel="stylesheet" href="/Home/css/shouji.css">
    <link rel="stylesheet" href="/layui/css/layui.css">
    <script src="/layui/layui.all.js"></script>
</head>
<body>
<?php echo $__env->make('Home.Public.LoginHeader', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
<div class="content">
    <div class="container">
        <div class="big">
            <div class="top">
                <p>密码找回</p>
                <p>PASSWORD BACK</p>
            </div>
            <form autocomplete="off">
                <label>
                    <span>用户名：</span>
                    <input type="text" name="username" autocomplete="off" placeholder="请输入用户名">
                </label>
                <label>
                    <span>手机号：</span>
                    <input type="text" name="mobile" disabled autocomplete="off" placeholder="请输入手机号">
                </label>
                <label class="lab">
                    <span>验证码：</span>
                    <input type="text" name="reCode" placeholder="请输入验证码" autocomplete="off" class="inp">
                    <div class="inp1 msgs checkReCode">获取验证码</div>
                </label>
                <label>
                    <span>密码：</span>
                    <input name="password" type="password" autocomplete="off" placeholder="请输入密码">
                </label>
                <label>
                    <span>确认密码：</span>
                    <input name="repassword" type="password" autocomplete="off" placeholder="请输入密码">
                </label>
                <input type="button" class="tijiao checkMobileSubmit" value="确认">
            </form>
        </div>
    </div>
</div>

<script src="/Home/js/jquery-3.2.1.min.js"></script>
<script src="/Home/js/bootstrap.min.js"></script>
<script src="/Home/js/registered.js"></script>
<script src="/Home/js/public.js"></script>
<script type="text/javascript">
    $(function(){
       $("input[name='username']").blur(function(){
           var username =  $(this).val();
           if (username != '') {
                $.get('/DoCheckMobile',{username:username},function(res){
                     var int=eval("("+res+")");
                     if (int.code==1) {
                        $("input[name='mobile']").val(int.data);
                     }else{
                        $("input[name='mobile']").val('');
                        layer.msg(int.data, {icon: 5});
                        return false;
                     }
                })
           }else{
             layer.msg('嗨你好啊,要找回密码请先输入您的用户哦', {icon: 5});
           }
       })
       $('.checkReCode').click(function(){
            var mobile = $("input[name='mobile']").val();
            if (mobile =='') {
                layer.msg('请输入您正确的用户名获取对的手机号', {icon: 5});
                return false;
            }else{
                $.get('/DoCheckReCode',{mobile:mobile},function(res){
                });
            }
       });
       $("input[name='reCode']").blur(function(){
            var reCode = $(this).val();
            $.get('/CheckSMS',{reCode:reCode},function(res){
                 var int=eval("("+res+")");
                 if (int.code == 'error') {
                      layer.msg('很抱歉您输入的验证码不正确', {icon: 5});
                      $("input[name='reCode']").val('');
                 }else{
                      layer.msg('恭喜验证码是正确的', {icon: 6});
                 }
            });
        });
       $('.checkMobileSubmit').click(function(){
          var username  =  $("input[name='username']").val();
          var mobile  =  $("input[name='mobile']").val();
          var reCode  =  $("input[name='reCode']").val();
          var password  =  $("input[name='password']").val();
          var repassword  =  $("input[name='repassword']").val();
          if (username == '' || mobile == '' || reCode=='' || password == '' || repassword=='') {
               layer.msg('请检测有错的步骤或漏掉的部分', {icon: 5});
          }else if(password != repassword){
               layer.msg('两次密码不一致', {icon: 5});
          }else{
            $.ajax({
                type: 'POST',
                url: '/DoCheckMobilePassword',
                data: {username:username,password:password},
                dataType: 'json',
                headers: {
                'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')
                },
                success: function(data){
                    if (data == 1) {
                        layer.msg('密码重置成功,可以去登录了', {icon: 6});
                    }else{
                        layer.msg('密码重置失败', {icon: 5});
                    }
                },
            });
          }
       });
    })
</script>
</body>
</html>