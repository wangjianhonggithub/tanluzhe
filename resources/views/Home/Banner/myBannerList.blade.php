<!DOCTYPE html>
<html lang="en" style="font-size: 625%;">
<head>
    <meta charset="UTF-8">
    <title>探路者网络-- 我的广告位</title>
    <meta content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0;" name="viewport" />
    <link rel="stylesheet" href="/Home/css/bootstrap.min.css">
    <link rel="stylesheet" href="/Home/css/guanggaowei.css">
    <link rel="stylesheet" href="/Home/css/header.css">
    <link rel="stylesheet" href="/Home/css/footer.css">
    <link rel="stylesheet" href="/Home/css/personal-left.css">
    <script src="/Home/js/include.js"></script>
</head>
<body>

@include('Home.Public.header')

<div class="content">
    <div class="container">
        @include('Home.Public.CenterLeft')
        <div class="right">
            <div class="top">
                <img src="/Home/images/icon(4).png">
                <span>我的广告位（轮播图）</span>
            </div>
            <div class="con-con">
                <ul class="con-wz">
                    <li>
                        <p class="con-title">
                            <span>标题</span>
                            <span>操作</span>
                        </p>
                        @foreach($banList as $banList)
                        <p class="wz-con">
                            <a href="">
                                <span>{{$banList->title}}</span>

                            </a>
                            <span>
                                <a href="/Banner/addMyBanner/{{$banList->id}}">添加广告</a>
                                <a href="javascript:;">删除广告</a>
                            </span>
                        </p>
                            @endforeach
                    </li>
                </ul>
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