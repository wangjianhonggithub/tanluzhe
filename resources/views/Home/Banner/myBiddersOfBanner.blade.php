<!DOCTYPE html>
<html lang="en" style="font-size: 625%;">
<head>
    <meta charset="UTF-8">
    <title>探路者网络--我的上传</title>
    <meta content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0;" name="viewport" />
    <link rel="stylesheet" href="/Home/css/bootstrap.min.css">
    <link rel="stylesheet" href="/Home/css/personal-shangchuan.css">
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
                <span>我参与的竞拍</span>
            </div>
            <strong class="col-md-4 col-md-offset-4" style='font-weight: normal; color:red;min-height: 0;font-size: 14px; background: rgba(255,255,255,0.8)'>{{Session::get('info')}}</strong>
            <div class="con-con">
                <ul class="con-wz">
                    <li>
                        <p class="con-title">
                            <span>标题</span>
                            <span>状态</span>
                            <span>金额</span>
                            <span>时间</span>
                        </p>
                        @foreach($list as $list)
                            <p class="wz-con">

                                    <span>{{$list->title}}</span>
                                    <span>
                                        @switch($list->status)
                                            @case(0)
                                                竞拍中
                                            @break
                                            @case(1)
                                               竞拍结束
                                            @break
                                            @case(1)
                                                竞拍无效
                                            @break
                                        @endswitch
                                    </span>
                                    <span>{{$list->money}}</span>
                                    <span>{{$list->addtime}}</span>


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
