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
                <span>我的竞价（轮播图）</span>
            </div>
            <div class="con-con">
                <div class="con-wz">
                    <table class="table table-bordered">
                        <thead>
                            <th>广告标题</th>
                            <th>广告图片</th>
                            <th>广告地址</th>
                            <th>广告位置</th>
							<th>当前最高金额</th>
                            <th>竞价金额</th>
                            <th>审核信息回复</th>
                            <th>审核状态</th>
                            <th>竞价时间</th>
                        </thead>
                        <tbody>
                        @foreach($data as $value)
                            <tr>
                                <td class="text-center">{{$value->title}}</td>
                                <td class="text-center"><img width="100px" src="{{$value->pic}}"></td>
                                <td class="text-center" style="white-space: normal;word-break: break-word;">{{$value->url}}</td>
                                <td class="text-center">{{$value->billboards_position}}</td>
								<td class="text-center">{{$value->money_max}}</td>
                                <td class="text-center">{{$value->money}}</td>
                                <td class="text-center">{{$value->errorinfo}}</td>
                                <td class="text-center">
                                    @switch($value->status)
                                        @case(1)
                                        <span style="color: #2e8ded">未审核</span>
                                        @break

                                        @case(2)
                                        <span style="color: green">审核通过</span>
                                        <a href="/auc/stAdvertising?id={{$value->id}}"><button>加价</button></a>
                                        @break

                                        @case(0)
                                        <span style="color: red">审核没有通过</span>
                                        @break

                                        @case(3)
                                        <span style="color: #dddddd">竞拍成功</span>
                                        @break
                                        @default
										时间已经过期
                                        <!--Default case...-->
                                    @endswitch
                                </td>
                                <td class="text-center">{{$value->addtime}}</td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
            </div>

        </div>
        <div class="right">
            <div class="top">
                <img src="/Home/images/icon(4).png">
                <span>我的竞价（广告牌）</span>
            </div>
            <div class="con-con">
                <div class="con-wz">
                    <table class="table table-bordered">
                        <thead>
                        <th>广告标题</th>
                        <th>广告图片</th>
                        <th>广告地址</th>
                        <th>广告位置</th>
						<th>当前最高金额</th>
                        <th>竞价金额</th>
                        <th>审核信息回复</th>
                        <th>审核状态</th>
                        <th>竞价时间</th>
                        </thead>
                        <tbody>
                        @foreach($data1 as $value)
                            <tr>
                                <td class="text-center">{{$value->title}}</td>
                                <td class="text-center"><img width="100px" src="{{$value->pic}}"></td>
                                <td class="text-center" style="white-space: normal;word-break: break-word;">{{$value->url}}</td>
                                <td class="text-center">{{$value->billboards_position}}</td>
                                <td class="text-center">{{$value->money_max}}</td>
                                <td class="text-center">{{$value->money}}</td>
                                <td class="text-center">{{$value->errorinfo}}</td>
                                <td class="text-center">
                                    @switch($value->status)
                                        @case(1)
                                        <span style="color: #2e8ded">未审核</span>
                                        @break

                                        @case(2)
                                        <span style="color: green">审核通过</span>
                                        <a href="/carousel/stAdvertising?id={{$value->id}}"><button>加价</button></a>
                                        @break

                                        @case(0)
                                        <span style="color: red">审核没有通过</span>
                                        @break

                                        @case(3)
                                        <span style="color: #dddddd">竞拍成功</span>
                                        @break
                                        @default
										时间已经过期
                                        <!--Default case...-->
                                    @endswitch
                                </td>
                                <td class="text-center">{{$value->addtime}}</td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
            </div>

        </div>

        <div class="right">
            <div class="top">
                <img src="/Home/images/icon(4).png">
                <span>我的竞价（赞助推荐）</span>
            </div>
            <div class="con-con">
                <div class="con-wz">
                    <table class="table table-bordered">
                        <thead>
                            <th>广告标题</th>
                            <th>广告图片</th>
                            <th>广告地址</th>
                            <th>广告位置</th>
							<th>当前最高金额</th>
                            <th>竞价金额</th>
                            <th>审核信息回复</th>
                            <th>审核状态</th>
                            <th>竞价时间</th>
                        </thead>
                        <tbody>
                        @foreach($data2 as $value)
                            <tr>
                                <td class="text-center">{{$value->title}}</td>
                                <td class="text-center"><img width="100px" src="{{$value->pic}}"></td>
                                <td class="text-center" style="white-space: normal;word-break: break-word;">{{$value->url}}</td>
                                <td class="text-center"></td>
								<td class="text-center">{{$value->money_max}}</td>
                                <td class="text-center">{{$value->money}}</td>
                                <td class="text-center">{{$value->errorinfo}}</td>
                                <td class="text-center">
                                    @switch($value->status)
                                        @case(1)
                                        <span style="color: #2e8ded">未审核</span>
                                        @break

                                        @case(2)
                                        <span style="color: green">审核通过</span>
                                        <a href="/auc/stAdvertising?id={{$value->id}}"><button>加价</button></a>
                                        @break

                                        @case(0)
                                        <span style="color: red">审核没有通过</span>
                                        @break

                                        @case(3)
                                        <span style="color: #dddddd">竞拍成功</span>
                                        @break
                                        @default
										时间已经过期
                                        <!--Default case...-->
                                    @endswitch
                                </td>
                                <td class="text-center">{{$value->addtime}}</td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
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
