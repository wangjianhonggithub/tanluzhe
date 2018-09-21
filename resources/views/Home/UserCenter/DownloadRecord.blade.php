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
    <script src="/Home/js/include.js"></script>
</head>
<body>

@include('Home.Public.header')

<div class="content">
    <div class="container">
       @include('Home.Public.CenterLeft')
        <div class="right">
            <div class="top">
                <img src="/Home/images/icon(6).png">
                <span>下载记录</span>
            </div>
            <div class="con-con">
                <!-- <ul class="title">
                    <li class="active list"><a href="/UserCenter">我的下载</a></li>
                    <li class="list"><a href="/UserBeDown">被下载</a></li>
                </ul> -->
                <ul class="con-wz">
                    <li class="list active">
                        <p class="con-title">
                            <span>标题</span>
                            <span>类型</span>
                            <span>大小</span>
                            <span>操作时间</span>
                        </p>
                        @foreach($DownInfo as $downInfo)
                        <p class="wz-con">
                            <a href="/SoftwareInfo/{{$downInfo->id}}.html">
                                <span>{{$downInfo->softwarename}}</span>
                                <span>{{$downInfo->caty_name}}</span>
                                <span>{{$downInfo->software_size}}</span>
                                <span>{{$downInfo->created_at}}</span>
                            </a>
                        </p>
                        @endforeach
                         {{ $DownInfo->links() }}
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