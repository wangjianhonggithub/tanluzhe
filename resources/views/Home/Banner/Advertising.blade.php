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
    <style type="text/css">
        html{
            font-size: 100px;
        }
        .adpic{
            height:3rem;
        }
        .adpic img{
            height: 100%;
            width: 100%;
        }
        .adtitle{
            height: 0.8rem;
            line-height: 0.8rem;
            font-size: 0.16rem;
            color: #666;
        }
        .adheader{
            height: 0.7rem;
            line-height: 0.7rem;
            font-size: 0.20rem;
            color: #666;
            border-radius: 5px 5px 0 0;
            border:1px solid #bbb;
            padding-left:0.2rem;
        }
        .admain{
            border-right:1px solid #bbb;
            border-left:1px solid #bbb;
            border-bottom:1px solid #bbb;
            height: 4.4rem;
        }
        .mainone,.maintwo,.mainthree{
            height:0.8rem;
        }
        .mainone .oneleft{
            width: 30%;
            text-align: right;
            float: left;
            height:0.8rem;
            line-height: 0.8rem;
            font-size: 0.16rem;
            color: #666;
        }
        .mainone .oneright{
            width: 70%;
            float: right;
            height:0.8rem;
            line-height: 0.8rem;
            font-size: 0.16rem;
            color: #666;
        }
        .item-b{
            float: right;
        }
        .maintwo .twoleft{
            width: 30%;
            text-align: right;
            float: left;
            height:0.8rem;
            line-height: 0.8rem;
            font-size: 0.16rem;
            color: #666;
        }
        .maintwo .tworight{
            width: 70%;
            float: right;
            height:0.8rem;
            line-height: 0.8rem;
            font-size: 0.16rem;
            color: #666;
        }
        .tworight select{
            display: block;
            width: 100%;
            height: 0.6rem;
            margin-top: 0.1rem;
            border-radius: 0.05rem;
        }
        .mainthree .threeleft{
            width: 30%;
            text-align: right;
            float: left;
            height:0.8rem;
            line-height: 0.8rem;
            font-size: 0.16rem;
            color: #666;
        }
        .mainthree .threeright{
            width: 70%;
            float: right;
            height:0.8rem;
            line-height: 0.8rem;
            font-size: 0.16rem;
            color: #666;
        }
        .threeright input{
            display: block;
            width: 100%;
            height: 0.6rem;
            margin-top: 0.1rem;
            border-radius: 0.05rem;
        }
        .mainfour{
            height: 2rem;
            padding-top: 0.7rem;
        }
        .sub{
            cursor:pointer;
            width: 2.4rem;
            height: 0.6rem;
            border-radius: 0.06rem;
            background-color: dodgerblue;
            line-height: 0.6rem;
            text-align: center;
            margin: 0 auto;
            font-size: 0.18rem;
            color: #FFFFFF;
        }
        .adfoot{
            height: 2rem;
            line-height: 2rem;
            font-size: 0.16rem;
            color: red;
        }
        input{
            border:1px solid #bbbbbb;
        }
    </style>
</head>
<body>

@include('Home.Public.header')

<div class="content">
    <div class="container">
        <div class="row">
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 adpic">
                <img class="img-responsive" src="/Home/images/1537940392.jpg"/>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 text-left ">
                <div class="adtitle">
                    <span>广告投放</span><span>&gt;</span><span>广告位竞价</span>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 text-left ">
                <div class="adheader">
                    <span>广告位竞价</span>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <form action="/Auction/typing" method="post">
                    <input type='hidden' name='_token' value='{{ csrf_token() }}'>
                    <div class="admain">
                    <div class="col-lg-8 col-lg-offset-2 col-md-8 col-md-offset-2  col-sm-10 col-sm-offset-1  col-xs-10 col-xs-offset-1 ">
                        <div class="mainone">
                            <div class="oneleft">当前余额：</div>
                            <div class="oneright">
                                <span class="item-a">{{$balance}}</span>
                                <span class="item-b">余额不足？立即<a href="#">充值</a></span>
                            </div>
                        </div>
                        <div class="maintwo">
                            <div class="twoleft">请选择投放的广告位：</div>
                            <div class="tworight">

                                <select name="banners_id">
                                    @foreach($banList as $banList)
                                    <option value="{{$banList->id}}">{{$banList->title}}</option>
                                    @endforeach
                                </select>

                            </div>
                        </div>
                        <div class="mainthree">
                            <div class="threeleft">请填写您竞价的价格：</div>
                            <div class="threeright">
                                <input type="text" name="money" id="" value="" />
                            </div>
                        </div>
                        <div class="mainfour">
                            <button style="display: block" class="sub" type="submit">
                                确认支付
                            </button>
                        </div>
                    </div>
                </div>
                </form>
                <div class="adfoot">
                    想知道当前竞价排名？请点击这里查看<a href="/Auction/showAll">[竞价排名]</a>
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