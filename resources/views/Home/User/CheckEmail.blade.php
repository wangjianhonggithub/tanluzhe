<!DOCTYPE html>
<html lang="en" style="font-size: 625%;">
<head>
    <meta charset="UTF-8">
    <title>探路者网络--邮箱找回</title>
    <meta content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0;" name="viewport" />
    <meta name="_token" content="{{ csrf_token() }}"/>
    <link rel="stylesheet" href="/Home/css/bootstrap.min.css">
    <link rel="stylesheet" href="/Home/css/shouji.css">
    <link rel="stylesheet" href="/layui/css/layui.css">
    <script src="/layui/layui.all.js"></script>
</head>
<body>
@include('Home.Public.LoginHeader')
<div class="content">
    <div class="container">
        <div class="big">
            <div class="top">
                <p>密码找回</p>
                <p>PASSWORD BACK</p>
            </div>
            <form>
                <label>
                    <span>用户名：</span>
                    <input type="text" name="username" placeholder="请输入用户名">
                </label>
                <label>
                    <span>邮箱：</span>
                    <input type="text" name="email" disabled placeholder="请输入邮箱">
                </label>
                <label class="lab">
                    <span>验证码：</span>
                    <input type="text" name="reCode" placeholder="请输入验证码" class="inp">
                    <div class="inp1 msgs CheckEmail">发送邮箱验证码</div>
                </label>
                <input type="hidden" name="nickname">
                <label>
                    <span>密码：</span>
                    <input type="password" name="password" placeholder="请输入密码">
                </label>
                <label>
                    <span>确认密码：</span>
                    <input type="password" name="repassword" placeholder="请输入密码">
                </label>
                <input type="button" class="tijiao CheckEmailSubmit" value="确认">
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
                $.get('/DoCheckUserNameEmail',{username:username},function(res){
                     var int=eval("("+res+")");
                     if (int.code==1) {
                        $("input[name='email']").val(int.data);
                        $("input[name='nickname']").val(int.nickname);
                     }else{
                        $("input[name='email']").val('');
                        $("input[name='nickname']").val('');
                        layer.msg(int.data, {icon: 5});
                        return false;
                     }
                })
           }else{
             layer.msg('嗨你好啊,要找回密码请先输入您的用户哦', {icon: 5});
           }
       })
        $('.CheckEmail').click(function(){
            var email = $("input[name='email']").val();
            var nickname = $("input[name='nickname']").val();
            if (email =='') {
                layer.msg('请输入您正确的用户名获取对的邮箱账号', {icon: 5});
                return false;
            }else{
                $.get('/DoCheckEmail',{email:email,nickname:nickname},function(res){
                   console.log(res);
                });
            }
        });
        $("input[name='reCode']").blur(function(){
            var reCode = $(this).val();
            $.get('/DoCheckUserNameEmailCode',{reCode:reCode},function(res){
                 var int=eval("("+res+")");
                 if (int.code == 'error') {
                      layer.msg('很抱歉您输入的验证码不正确', {icon: 5});
                      $("input[name='reCode']").val('');
                 }else{
                      layer.msg('恭喜验证码是正确的', {icon: 6});
                 }
            });
        });
        $('.CheckEmailSubmit').click(function(){
          var username  =  $("input[name='username']").val();
          var email  =  $("input[name='email']").val();
          var reCode  =  $("input[name='reCode']").val();
          var password  =  $("input[name='password']").val();
          var repassword  =  $("input[name='repassword']").val();
          if (username == '' || email == '' || reCode=='' || password == '' || repassword=='') {
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
    });
</script>
</body>
</html>