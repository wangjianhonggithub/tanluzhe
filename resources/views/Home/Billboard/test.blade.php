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
        .active{
            background: #2e8ded;
            height: 30px;
            border-radius: 5px;
            display: block;
            line-height: 30px;
            color: #fff;
            margin: 0px 10px;
        }
        .noactive{
            background: #ccc;
            height: 30px;
            border-radius: 5px;
            display: block;
            line-height: 30px;
            color: #000;
            margin: 0px 10px;
        }
        .item{
            display: block;
            width: 100%;
            height: 30px;
            color: #000;
            text-decoration: none;
            padding: 0 10px;
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
                    <span>广告位竞拍</span><span>&gt;</span><span>广告牌</span>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 text-left ">
                <div class="adheader">
                    <span>选择对应的广告位</span>
                </div>
            </div>
        </div>
        <div class="row" style="height: 30px;margin: 20px 0px;">
            <div class="col-lg-2 col-md-2 col-sm-2 col-xs-2 " style="height: 30px">
                选择广告位的位置：
            </div>
            <div class="col-lg-10 col-md-10 col-sm-10 col-xs-10">
                <ul class="row sel" style="list-style: none">
                    <li class="noactive" style="height: 30px;float: left;"><a href="/soft/auction/1" class="item">Windows</a></li>
                    <li class="noactive" style="height: 30px;float: left;"><a href="/soft/auction/1" class="item">Linux</a></li>
                    <li class="noactive" style="height: 30px;float: left;"><a href="/soft/auction/1" class="item">IOS</a></li>
                    <li class="noactive" style="height: 30px;float: left;"><a href="/soft/auction/1" class="item">Android</a></li>
                    <li class="noactive" style="height: 30px;float: left;"><a href="/soft/auction/1" class="item">插件</a></li>
                    <li class="noactive" style="height: 30px;float: left;"><a href="/soft/auction/1" class="item">小程序</a></li>
                    <li class="noactive" style="height: 30px;float: left;"><a href="/soft/auction/1" class="item">软件发布</a></li>
                </ul>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <table class="table table-bordered .table-hover">
                    <thead></thead>
                    <tbody>
                        <tr>
                            <td class="text-center">
                                <div class="text-center">第5广告位</div>
                                <input type="radio" name="select" value="5" {{ isset($list[5]) ? "disabled='disabled'" :"" }}/>
                            </td>
                            <td class="text-center">
                                <div class="text-center">第3广告位</div>
                                <input type="radio" name="select" value="3" {{ isset($list[3]) ? "disabled='disabled'" :"" }}/>
                            </td>
                            <td class="text-center">
                                <div class="text-center">第1广告位</div>
                                <input type="radio" name="select" value="1" {{ isset($list[1]) ? "disabled='disabled'" :"" }}/>
                            </td>
                            <td class="text-center">
                                <div class="text-center">第2广告位</div>
                                <input type="radio" name="select" value="2" {{ isset($list[2]) ? "disabled='disabled'" :"" }}/>
                            </td>
                            <td class="text-center">
                                <div class="text-center">第4广告位</div>
                                <input type="radio" name="select" value="4" {{ isset($list[4]) ? "disabled='disabled'" :"" }}/>
                            </td>
                            <td class="text-center">
                                <div class="text-center">第6广告位</div>
                                <input type="radio" name="select" value="6" {{ isset($list[6]) ? "disabled='disabled'" :"" }}/>
                            </td>
                        </tr>
                        <tr>
                            <td class="text-center">
                                <div class="text-center">第11广告位</div>
                                <input type="radio" name="select" value="11" {{ isset($list[11]) ? "disabled='disabled'" :"" }}/>

                            </td>
                            <td class="text-center">
                                <div class="text-center">第9广告位</div>
                                <input type="radio" name="select" value="9" {{ isset($list[9]) ? "disabled='disabled'" :"" }}/>
                            </td>
                            <td class="text-center">
                                <div class="text-center">第7广告位</div>
                                <input type="radio" name="select" value="7" {{ isset($list[7]) ? "disabled='disabled'" :"" }}/>
                            </td>
                            <td class="text-center">
                                <div class="text-center">第8广告位</div>
                                <input type="radio" name="select" value="8"{{ isset($list[8]) ? "disabled='disabled'" :"" }}/>
                            </td>
                            <td class="text-center">
                                <div class="text-center">第10广告位</div>
                                <input type="radio" name="select" value="10"{{ isset($list[10]) ? "disabled='disabled'" :"" }}/>
                            </td>
                            <td class="text-center">
                                <div class="text-center">第12广告位</div>
                                <input type="radio" name="select" value="12"{{ isset($list[12]) ? "disabled='disabled'" :"" }}/>
                            </td>
                        </tr>
                        <tr>
                            <td class="text-center">
                                <div class="text-center">第17广告位</div>
                                <input type="radio" name="select" value="17" {{ isset($list[17]) ? "disabled='disabled'" :"" }}/>
                            </td>
                            <td class="text-center">
                                <div class="text-center">第15广告位</div>
                                <input type="radio" name="select" value="15" {{ isset($list[15]) ? "disabled='disabled'" :"" }}/>
                            </td>
                            <td class="text-center">
                                <div class="text-center">第13广告位</div>
                                <input type="radio" name="select" value="13" {{ isset($list[13]) ? "disabled='disabled'" :"" }}/>
                            </td>
                            <td class="text-center">
                                <div class="text-center">第14广告位</div>
                                <input type="radio" name="select" value="14" {{ isset($list[14]) ? "disabled='disabled'" :"" }}/>
                            </td>
                            <td class="text-center">
                                <div class="text-center">第16广告位</div>
                                <input type="radio" name="select" value="16" {{ isset($list[16]) ? "disabled='disabled'" :"" }}/>
                            </td>
                            <td class="text-center">
                                <div class="text-center">第18广告位</div>
                                <input type="radio" name="select" value="18" {{ isset($list[18]) ? "disabled='disabled'" :"" }}/>
                            </td>
                        </tr>
                        <tr>
                            <td class="text-center">
                                <div class="text-center">第23广告位</div>
                                <input type="radio" name="select" value="23" {{ isset($list[23]) ? "disabled='disabled'" :"" }}/>
                            </td>
                            <td class="text-center">
                                <div class="text-center">第21广告位</div>
                                <input type="radio" name="select" value="21" {{ isset($list[21]) ? "disabled='disabled'" :"" }}/>
                            </td>
                            <td class="text-center">
                                <div class="text-center">第19广告位</div>
                                <input type="radio" name="select" value="19" {{ isset($list[19]) ? "disabled='disabled'" :"" }}/>
                            </td>
                            <td class="text-center">
                                <div class="text-center">第20广告位</div>
                                <input type="radio" name="select" value="20" {{ isset($list[20]) ? "disabled='disabled'" :"" }}/>
                            </td>
                            <td class="text-center">
                                <div class="text-center">第22广告位</div>
                                <input type="radio" name="select" value="22" {{ isset($list[22]) ? "disabled='disabled'" :"" }}/>
                            </td>
                            <td class="text-center">
                                <div class="text-center">第24广告位</div>
                                <input type="radio" name="select" value="24" {{ isset($list[24]) ? "disabled='disabled'" :"" }} />
                            </td>
                        </tr>
                        <tr>
                            <td class="text-center">
                                <div class="text-center">第29广告位</div>
                                <input type="radio" name="select" value="29" {{ isset($list[29]) ? "disabled='disabled'" :"" }}/>
                            </td>
                            <td class="text-center">
                                <div class="text-center">第27广告位</div>
                                <input type="radio" name="select" value="27" {{ isset($list[27]) ? "disabled='disabled'" :"" }}/>
                            </td>
                            <td class="text-center">
                                <div class="text-center">第25广告位</div>
                                <input type="radio" name="select" value="25" {{ isset($list[25]) ? "disabled='disabled'" :"" }}/>
                            </td>
                            <td class="text-center">
                                <div class="text-center">第26广告位</div>
                                <input type="radio" name="select" value="26" {{ isset($list[26]) ? "disabled='disabled'" :"" }}/>
                            </td>
                            <td class="text-center">
                                <div class="text-center">第28广告位</div>
                                <input type="radio" name="select" value="28" {{ isset($list[28]) ? "disabled='disabled'" :"" }}/>
                            </td>
                            <td class="text-center">
                                <div class="text-center">第30广告位</div>
                                <input type="radio" name="select" value="30" {{ isset($list[30]) ? "disabled='disabled'" :"" }}/>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

@include('Home.Public.footer')

<script src="/Home/js/jquery-3.2.1.min.js"></script>
<script src="/Home/js/bootstrap.min.js"></script>
<script src="/Home/js/personal.js"></script>
<script src="/Home/js/public.js"></script>
<script type="text/javascript">
    $(document).ready(function(){
        $('.sel ').find('li').eq(0).addClass('active').removeClass('noactive')
        $('.sel ').find('li').click(function(){
            $(this).addClass('active').removeClass('noactive').siblings().addClass('noactive')
        })
    })
</script>
</body>
</html>