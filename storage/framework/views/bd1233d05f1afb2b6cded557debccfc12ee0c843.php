<!DOCTYPE html>
<html lang="en" style="font-size: 625%;">
<head>
    <meta charset="UTF-8">
    <title>探路者网络--下载记录</title>
    <meta content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0;" name="viewport" />
    <link rel="stylesheet" href="/Home/css/bootstrap.min.css">
    <link rel="stylesheet" href="/Home/css/personal-xiazai.css">
    <link rel="stylesheet" href="/Home/css/header.css">
    <link rel="stylesheet" href="/Home/css/footer.css">
    <link rel="stylesheet" href="/Home/css/personal-left.css">
    <style type="text/css">
        html{
            font-size: 100px;
        }
        .adpic{
            height:3rem;
        }
        .toppic{
            height:3rem;
            background: url(/Home/images/1537940392.jpg) no-repeat;
            background-size: cover;
        }
        .toppic .pictitle{
            text-align: center;
            font-size: 0.20rem;
            color: #FFFFFF;
            height: 0.6rem;
            line-height: 0.6rem;
            padding-top: 0.6rem;
        }
        .toppic .pictext{
            text-align: center;
            font-size: 0.14rem;
            color: #FFFFFF;
            height: 0.6rem;
            line-height: 0.6rem;
            padding-top: 0.6rem;
        }
        .adtitle{
            height: 0.8rem;
            line-height: 0.8rem;
            font-size: 0.14rem;
            color: #666;
            text-align: left;
        }
        .adcontent{
            padding: 0.5rem;
            border:1px solid #bbb ;
        }
        .backtitle{
            width: 60%;
            margin: 0 auto;
            color: #666;
            height: 0.6rem;
            line-height: 0.6rem;
            font-size: 0.14rem;
        }
        .backtitle span{
            width: 15%;
            display: block;
            float: left;
        }
        .backtitle input{
            width: 85%;
            height: 0.4rem;
            margin-top: 0.1rem;
            display: block;
            float: left;
            border:1px solid #bbbbbb;
        }
        .adtext{
            text-indent: 2em;
            line-height: 0.8rem;
            color: #666;
        }
        .backtext{
            width: 60%;
            margin: 0 auto;
        }
        .backtext textarea{
            width: 100%;
            resize: none;
            border:1px solid #bbbbbb;
        }
        .backtext input{
            width: 100%;
            height: 0.6rem;
            margin-top: 0.2rem;
            border:1px solid #bbbbbb;
        }
        .backtext button{
            width: 20%;
            height: 0.4rem;
            text-align: center;
            color: #FFFFFF;
            font-size: 0.16rem;
            background-color: #1E90FF;
            border: none;
            display: block;
            margin: 0.2rem auto;
        }

    </style>
    <script src="/Home/js/include.js"></script>
</head>
<body>

<?php echo $__env->make('Home.Public.header', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
<form action="/complaints" method="post">
<div class="container">
    <input type='hidden' name='_token' value='<?php echo e(csrf_token()); ?>'>
    <div class="row">
        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 adpic">
            <div class="toppic">
                <div class="pictitle">
                    用心服务，成就美好
                </div>
                <div class="pictext">
                    探路者在您和数以千万的成员的反馈帮助下，不断改善功能和服务，您的每一条意见我们都会查看，并用于改善用户体验
                </div>
            </div>

        </div>
    </div>
    <div class="row">
        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 text-left ">
            <div class="adtitle">
                您可以通过访问<a>[帮助中心]</a>查看热门问题。
            </div>
            <div class="adcontent">
                <div class="backtitle">
                    <span>反馈标题：</span><input name="title"  type="text" />
                </div>
                <div class="backtext">
                    <textarea name="content" rows="15" cols="" placeholder="请输入您在使用中出现的问题，我们将及时反馈"></textarea>
                </div>
                <div class="backtext">
                    <input name="contact" type="text" placeholder="留下您的联系方式（手机号，QQ，邮箱）" />
                </div>
                <div class="backtext">
                    <button type="submit">提交</button>
                </div>
            </div>
        </div>
    </div>
</div>
</form>
<?php echo $__env->make('Home.Public.footer', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>

<script src="/Home/js/jquery-3.2.1.min.js"></script>
<script src="/Home/js/bootstrap.min.js"></script>
<script src="/Home/js/personal.js"></script>
<script src="/Home/js/public.js"></script>
</body>
</html>