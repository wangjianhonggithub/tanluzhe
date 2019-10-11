<!DOCTYPE html>
<html lang="en" style="font-size: 625%;">
<head>
    <meta charset="UTF-8">
    <title>探路者网络--密码找回</title>
    <meta content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0;" name="viewport" />
    <link rel="stylesheet" href="/Home/css/bootstrap.min.css">
    <link rel="stylesheet" href="/Home/css/Forgot%20password.css">
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
            <p class="choose">请选择找回密码</p>
            <ul>
                <li>
                    <a href="/CheckMobile">手机找回</a>
                </li>
                <li>
                    <a href="/CheckEncrypted">密保问题找回</a>
                </li>
                <li>
                    <a href="/CheckEmail">邮箱找回</a>
                </li>
            </ul>
        </div>
    </div>
</div>
<script src="public/js/jquery-3.2.1.min.js"></script>
<script src="public/js/bootstrap.min.js"></script>
<script src="/Home/js/public.js"></script>
</body>
</html>
