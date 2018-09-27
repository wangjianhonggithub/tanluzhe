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
        html {
            font-size: 100px;
        }
        .right{
            padding: 0.3rem;
        }
        .right .top {
            padding: 0.15rem 0;
            border-bottom: 1px solid #bbb;
        }

        .right .top span {
            margin-left: 0.08rem;
            font-size: 0.18rem;
        }

        .btns {
            height: 1.2rem;
        }

        .btnitem {
            height: 0.8rem;
            width: 20%;
            text-align: center;
            border-radius: 0.06rem;
            line-height: 0.8rem;
            margin-top: 0.2rem;
            border: 1px solid #bbb;
            color: #BBBBBB;
            background-color: #FFFFFF;
            font-size: 0.16rem;
        }
        .twoheader{
            height: 0.8rem;
        }
        .twoh{
            float: left;
            width: 33%;
            height: 0.8rem;
            line-height: 0.8rem;
            text-align: center;
            font-size: 0.18rem;
            color: #666;
            border-bottom: 1px solid #bbb;
        }
        .twocontent{
            height: 0.6rem;
        }
        .twoc{
            float: left;
            width: 33%;
            text-align: center;
            font-size: 0.16rem;
            color: #666;
            border-bottom: 1px solid #bbb;
            height: 0.6rem;
            line-height: 0.6rem;
        }
    </style>
    <script src="/Home/js/include.js"></script>
</head>
<body>

@include('Home.Public.header')

<div class="content">
    <div class="container">
       @include('Home.Public.CenterLeft')
        <div class="right">
            <div class="top">
                <img src="/Home/images/20180927111311.png" />
                <span>我的账户</span>
            </div>
            <div class="btns">
                <button class="btnitem">我的账户</button>
                <button class="btnitem">充值记录</button>
                <button class="btnitem">提现记录</button>
            </div>
            <div class="boxtwo">
                <div class="twoheader">
                    <div class="twoh">
                        充值方式
                    </div>
                    <div class="twoh">
                        充值时间
                    </div>

                    <div class="twoh">
                        充值金额
                    </div>
                </div>
                <div class="twocontent">
                    <div class="twoc">
                        微信
                    </div>

                    <div class="twoc">
                        2018-03-02&nbsp;&nbsp;13:25
                    </div>
                    <div class="twoc">
                        50.00
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@include('Home.Public.footer')

<script src="/Home/js/jquery-3.2.1.min.js"></script>
<script src="/Home/js/bootstrap.min.js"></script>
<script src="/Home/js/personal.js"></script>
<script src="/Home/js/public.js"></script>
</body>
</html>