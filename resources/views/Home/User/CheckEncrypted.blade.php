<!DOCTYPE html>
<html lang="en" style="font-size: 625%;">
<head>
    <meta charset="UTF-8">
    <title>探路者网络--密保问题找回</title>
    <meta content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0" name="viewport" />
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
                    <span>密保问题：</span>
                    <input type="text" name="encrypted" disabled placeholder="密保问题">
                </label>
                <label>
                    <span>密保答案：</span>
                    <input type="text" name="answer" placeholder="请输入密保答案">
                </label>
                <label>
                    <span>密码：</span>
                    <input type="password" name="password" placeholder="请输入密码">
                </label>
                <label>
                    <span>确认密码：</span>
                    <input type="password" name="repassword" placeholder="请输入密码">
                </label>
                <input type="button" class="tijiao checkEncryptedSubmit" value="确认">
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
                $.get('/DoCheckUserName',{username:username},function(res){
                     var int=eval("("+res+")");
                     if (int.code==1) {
                        $("input[name='encrypted']").val(int.data.encry);
                     }else{
                        $("input[name='encrypted']").val('');
                        layer.msg(int.data, {icon: 5});
                        return false;
                     }
                })
           }else{
             layer.msg('嗨你好啊,要找回密码请先输入您的用户哦', {icon: 5});
           }
       });
       $("input[name='answer']").blur(function(){
           var answer =  $(this).val();
           var username = $("input[name='username']").val();
           if (answer == '') {
                layer.msg('请填写密保答案', {icon: 5});
                return false;
           }else if(username == ''){
                layer.msg('用户名不在了哦', {icon: 5});
                return false;
           }else{
                $.get('/DoCheckEncrypted',{username:username,answer:answer},function(res){
                     var int=eval("("+res+")");
                     if (int.code==1) {
                        layer.msg(int.data, {icon: 6});
                     }else{
                        $("input[name='answer']").val('');
                        layer.msg(int.data, {icon: 5});
                        return false;
                     }
                })
           }
       });
       /**
        * 执行修改密码
        */
       $('.checkEncryptedSubmit').click(function(res){
            var username = $("input[name='username']").val();
            var encrypted = $("input[name='encrypted']").val();
            var answer = $("input[name='answer']").val();
            var password = $("input[name='password']").val();
            var repassword = $("input[name='repassword']").val();
            if (username == '' || encrypted == '' || answer=='' || password == '' || repassword=='') {
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