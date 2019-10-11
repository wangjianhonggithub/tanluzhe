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
                <span>我的广告位(静态广告)</span>
            </div>
            <div class="con-con">
                <ul class="con-wz">
                    <li>
                        <p class="con-title">
                            <span style='width: 33%;text-align: center;'>标题</span>
                            <!-- <span style='width: 33%;text-align: center;'>图片</span> -->
                            <span style='width: 33%;text-align: center;'>操作</span>
                        </p>
                        @foreach($list as $va)
                            <p class="wz-con">
                                <a href="">
                                    <span style='width: 33%;text-align: center;'>

                                        @switch($va)
                                        @case('ind_s')
                                            首轮播上
                                            @break

                                        @case('ind_x')
                                        首轮播下
                                        @break

                                        @case('ind_z')
                                        首页中部
                                        @break

                                        @case('list_h')
                                        列表横幅
                                        @break

                                        @case('list_s')
                                        表轮播上
                                        @break

                                        @case('list_x')
                                        列表轮播下
                                        @break

                                        @case('info_bz')
                                        详情轮播左
                                        @break

                                        @case('info_bc')
                                        详情轮播中
                                        @break

                                        @case('info_by')
                                        详情轮播右
                                        @break

                                        @case('info_z')
                                        详情中部
                                        @break

                                        @case('info_bcy')
                                        详情轮播中右
                                        @break

                                        @default
                                        Default case...
                                        @endswitch
                                    </span>
                                </a>
                           <!--  <span style='width: 33%;text-align: center;'>
                                <img style="width: 60px; height: 60px;" src="{{$va}}"></span>
                            </span> -->
                            <span style='width: 33%;text-align: center;'>
                                <a href="javascript:;">隐藏不展示</a>
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