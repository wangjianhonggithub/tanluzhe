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
    <style type="text/css">
        html{
            font-size: 100px;
        }
        .conitem{
            height: 0.8rem;
        }
        .conitema{
            height: 3rem;
        }
        .itemleft{
            width:15% ;
            height: 0.8rem;
            text-align: right;
            color: #666;
            font-size: 0.16rem;
            float: left;
            line-height: 0.8rem;
            padding-right: 0.1rem;
        }
        .itemright{
            display: block;
            border: 1px solid #bbb;
            width:85% ;
            margin-top: 0.1rem;
            height: 0.6rem;
            font-size: 0.16rem;
            float: left;
        }
        .rightpic{
            height: 2.8rem;
            width: 3rem;
            border: 1px solid #CCCCCC;
        }
        .rightfile{
            display: block;
            border: 1px solid #bbb;
            width:85% ;
            margin-top: 0.1rem;
            height: 0.6rem;
            font-size: 0.16rem;
            float: left;
        }
        .rightfile input{
            display: block;
            margin-top: 0.15rem;
            height: 0.3rem;
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
            <form action="/Banner/doaddMyBanner" method="post">
                <input type='hidden' name='_token' value='{{ csrf_token() }}'>
            <div class="top">
                <img src="/Home/images/icon(4).png">
                <span>添加广告位</span>
            </div>
            <div class="con-con">
                <div class="conitem">
                    <div class="itemleft">标题</div>
                    <input class="itemright" type="text" name="" id="" value="" />
                </div>
                <div class="conitem">
                    <div class="itemleft">URL</div>
                    <input class="itemright" type="text" name="" id="" value="" />
                </div>
                <div class="conitem">
                    <div class="itemleft">描述</div>
                    <input class="itemright" type="text" name="" id="" value="" />
                </div>
                <div class="conitema">
                    <div class="itemleft">图片展示</div>
                    <img src="" class="rightpic"/>
                </div>
                <div class="conitem">
                    <div class="itemleft">上传轮播图</div>
                    <div class="rightfile">
                        <input  type="file" name="" id="" value="" />
                    </div>
                </div>
            </div>
            <button type="submit" style="width: 100px;height: 30px;text-align: center;
            display: block;line-height: 30px;margin: 0 auto;font-size: 20px;border-radius: 5px;background-color: #0b75cb;color: #ffffff">确认上传 </button>
            </form>
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