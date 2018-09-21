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
                <span>我的上传</span>
            </div>
            <strong class="col-md-4 col-md-offset-4" style='font-weight: normal; color:red;min-height: 0;font-size: 14px; background: rgba(255,255,255,0.8)'>{{Session::get('info')}}</strong>
            <div class="con-con">
                <ul class="con-wz">
                    <li>
                        <p class="con-title">
                            <span>标题</span>
                            <span>类型</span>
                            <span>状态</span>
                            <span>时间</span>
                            <span>下载次数</span>
                            <span>操作</span>
                        </p>
                        @foreach($UserUpLoadList as $List)
                        <p class="wz-con">
                            <a href="/SoftwareInfo/{{$List->id}}.html">
                                <span>{{$List->softwarename}}</span>
                                <span>{{$List->caty_name}}</span>
                                @if ($List->is_status === 0)
                                <span>审核中</span>
                                @elseif ($List->is_status === 1)
                                <span>已通过</span>
                                @else
                                <span>未通过</span>
                                @endif
                                <span>{{$List->created_at}}</span>
                                <span>111次</span>
                            </a>
                            <span>
                                <a href="/softWareUpdate/{{$List->id}}.py">编辑</a>
                                <a href="/softWareDelete/{{$List->id}}.py">删除</a>
                            </span>
                        </p>
                        @endforeach
                    </li>
                </ul>
                {{ $UserUpLoadList->links() }}
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