<!DOCTYPE html>
<html lang="en" style="font-size: 625%;">
<head>
    <meta charset="UTF-8">
    <title>探路者网络--注册</title>
    <meta content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0;" name="viewport" />
    <meta name="_token" content="{{ csrf_token() }}"/>
    <link rel="stylesheet" href="/Home/css/bootstrap.min.css">
    <link rel="stylesheet" href="/Home/css/registered.css">
    <link rel="stylesheet" href="/layui/css/layui.css">
    <script src="/layui/layui.all.js"></script>
</head>
<body>
@include('Home.Public.LoginHeader')
<div class="content">
    <div class="container">
        <div class="big">
            @if (count($errors) > 0)
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li style="list-style: none">{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
            <div class="top">
                <p>注册</p>
                <p>REGISTERED MEMBERS</p>
            </div>
            <form action="/DoRegistered" method="POST">
                <label>
                    <span>用户名：</span>
                    <input type="text" name="username" value="{{ old('username') }}" placeholder="请输入用户名">
                </label>
                <label>
                    <span>手机号：</span>
                    <input type="text" name="mobile" value="{{ old('mobile') }}" placeholder="请输入手机号">
                </label>
                <label class="lab">
                    <span>验证码：</span>
                    <input type="text" name="checkCode" value="{{ old('checkCode') }}" placeholder="请输入验证码" class="inp checkCode">
                    <div class="inp1 msgs VerCode">获取验证码</div>
                </label>
                <label>
                    <span>密码：</span>
                    <input type="password" name="password" placeholder="请输入密码">
                </label>
                <label>
                    <span>确认密码：</span>
                    <input type="password" name="password_confirmation" placeholder="请输入密码">
                </label>
                <label>
                    <span>邮箱：</span>
                    <input type="text" name="email" value="{{ old('email') }}" placeholder="请输入邮箱">
                </label>
                <label>
                    <span>密保问题：</span>
                    <select name="encrypted">
                        @foreach($Encrypted as $Encrypteds)
                        <option value="{{$Encrypteds->id}}">{{$Encrypteds->encry}}</option>
                        @endforeach
                    </select>
                </label>
                {{ csrf_field() }}
                <input type="hidden" name="verCode">
                <label>
                    <span>密保答案：</span>
                    <input type="text" name="answer" value="{{ old('answer') }}" placeholder="请输入密保答案">
                </label>
                <p>
                    <span><a href="javascript:;" class="members"><input type="checkbox" name="events"> 注册会员须知</a></span>
                    <span>已有账号？立即<a href="/Login">登录</a></span>
                </p>
                <input type="submit" class="tijiao" value="登录">
            </form>
        </div>
    </div>
</div>

<div class="members-document">
    <p class="d-close"><a href="javascript:;">关闭</a></p>
    <div class="document">
        注册会员须知 <br> <br>
        <?php echo htmlspecialchars_decode($Registered->vip_ins) ?>
    </div>
</div>

<script src="/Home/js/jquery-3.2.1.min.js"></script>
<script src="/Home/js/bootstrap.min.js"></script>
<script src="/Home/js/registered.js"></script>
<script src="/Home/js/public.js"></script>
<script type="text/javascript">
    $(function(){
        $('.VerCode').click(function(){
            var mobile = $("input[name='mobile']").val();
            $.get('/SMS',{mobile:mobile},function(res){
                console.log(res);
            });
        });
        $('.checkCode').blur(function(){
            var reCode = $(this).val();
            $.get('/CheckSMS',{reCode:reCode},function(res){
                 var int=eval("("+res+")");
                 if (int.code == 'error') {
                      layer.msg('很抱歉您输入的验证码不正确', {icon: 5});
                 }else{
                      $("input[name='verCode']").val(int.code);  
                 }
            });
        });
    });
</script>
</body>
</html>