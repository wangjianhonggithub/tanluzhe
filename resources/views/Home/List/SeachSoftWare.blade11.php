<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>探路者网络--搜索结果页</title>
    <meta content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0" name="viewport" />
    <link rel="stylesheet" href="/Home/css/bootstrap.min.css">
    <link rel="stylesheet" href="/Home/css/swiper-4.2.0.min.css">
    <link rel="stylesheet" href="/Home/css/list.css">
    <link rel="stylesheet" href="/Home/css/footer.css">
    <link rel="stylesheet" href="/Home/css/header.css">
    <script src="/Home/js/include.js"></script>
    <!--[if lt IE 10]>
      <link rel="stylesheet" href="/Home/css/ie9.css">
    <![endif]-->
</head>
<body>

@include('Home.Public.header')

<div class="banner">
    <div class="container">
        <div class="top"><img src="{{$AdvImage->list_h}}"></div>
    </div>
</div>
<!--广告位-->
<div class="advertising">
    <div class="container">
        <div class="banner-right">
            <div id="carousel-example-generic5" class="carousel slide" data-ride="carousel">
                <div class="carousel-inner" role="listbox">
                    @foreach($SoftwareBannerS as $SO)
                    <div class="item">
                        <img src="{{$SO->banner_img}}">
                        <div class="carousel-caption">
                            <p>{{$SO->title}}</p>
                            <p>{{$SO->description}}</p>
                        </div>
                    </div>
                    @endforeach
                </div>
                <a class="left carousel-control" href="#carousel-example-generic5" role="button" data-slide="prev">
                    <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
                    <span class="sr-only">Previous</span>
                </a>
                <a class="right carousel-control" href="#carousel-example-generic5" role="button" data-slide="next">
                    <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
                    <span class="sr-only">Next</span>
                </a>
            </div>
        </div>
        <div class="banner-left">
            <img src="{{$AdvImage->list_s}}">
            <img src="{{$AdvImage->list_x}}">
        </div>
    </div>
</div>
<!--广告位-->

<!--最新上线-->
<div class="new">
    <div class="container">
        <div class="top">
            搜索结果 <span><a href="/SeachSoftWare?id={{$CatyNav->id}}&keyword={{$keyword}}">全部</a><a href="/SeachSoftWare?id={{$CatyNav->id}}&keyword={{$keyword}}&charge=0">付费</a><a href="/SeachSoftWare?id={{$CatyNav->id}}&keyword={{$keyword}}&charge=1">免费</a></span>
        </div>
        <div class="content">
            <div class="con-con">
                <ul class="active">
                    @foreach($SoftwareList as $SList)
                    <li>
                        <img src="{{$SList->cover}}">
                        <div class="nr">
                            <div class="nr-left">
                                <div class="nr-top">{{$SList->softwarename}}@if($SList->charge == 1)<span>免费</span>@else<span class="hot">付费</span>@endif</div>
                                <div class="nr-con">{{$SList->description}}</div>
                                <div class="nr-biao">
                                    <p>上传时间：{{$SList->created_at}}</p>
                                    <p>上传者：{{$SList->nickname}}</p>
                                    @if($SList->comment >= 5)
                                    <p><img src="/Home/images/star.png"><img src="/Home/images/star.png"><img src="/Home/images/star.png"><img src="/Home/images/star.png"><img src="/Home/images/star.png"></p>
                                    @elseif($SList->comment >= 4)
                                    <p><img src="/Home/images/star.png"><img src="/Home/images/star.png"><img src="/Home/images/star.png"><img src="/Home/images/star.png"><img src="/Home/images/star-h.png"></p>
                                    @elseif($SList->comment >= 3)
                                    <p><img src="/Home/images/star.png"><img src="/Home/images/star.png"><img src="/Home/images/star.png"><img src="/Home/images/star-h.png"><img src="/Home/images/star-h.png"></p>
                                    @elseif($SList->comment >= 2)
                                    <p><img src="/Home/images/star.png"><img src="/Home/images/star.png"><img src="/Home/images/star-h.png"><img src="/Home/images/star-h.png"><img src="/Home/images/star-h.png"></p>
                                    @elseif($SList->comment >= 1)
                                    <p><img src="/Home/images/star.png"><img src="/Home/images/star-h.png"><img src="/Home/images/star-h.png"><img src="/Home/images/star-h.png"><img src="/Home/images/star-h.png"></p>
                                    @else
                                    <p><img src="/Home/images/star-h.png"><img src="/Home/images/star-h.png"><img src="/Home/images/star-h.png"><img src="/Home/images/star-h.png"><img src="/Home/images/star-h.png"></p>
                                    @endif
                                    <p>软件大小:{{$SList->software_size}}</p>
                                </div>
                            </div>
                            <div class="nr-right">
                                <a href="javascript:;">下载次数：{{$SList->count}}</a>
                                <a href="/SoftwareInfo/{{$SList->id}}.html">点击查看详情</a>
                            </div>
                        </div>
                    </li>
                    @endforeach
                </ul>
            </div>
                {{ $SoftwareList->links() }}
        </div>
    </div>
</div>
<!--最新上线-->
<!--广告位-->
<div class="guang">
    <div class="container">
        <div class="swiper-container">
            <div class="swiper-wrapper">
                @foreach($SoftwareBannerZ as $ZO)
                <div class="swiper-slide"><img src="{{$ZO->banner_img}}"></div>
                @endforeach
            </div>
            <!--<div class="swiper-button-prev"></div>-->
            <!--<div class="swiper-button-next"></div>-->
        </div>
    </div>
</div>
<!--广告位-->

<!--最热下载-->
<div class="hottest">
    <div class="container">
        <div class="top">
            个性推荐 <span>recommendation</span>
        </div>
        <div class="content">
            <div class="con-top">
                <ul>
                    @foreach($CatyList as $CV)
                    <li class="SoftwareRec" data-id='{{$CV->id}}'><a href="javascript:;">{{$CV->caty_name}}</a></li>
                    @endforeach
                </ul>
            </div>
            <div class="con-con">
                <ul class="active SoftRecom">
                    @foreach($SoftwareRecommended as $Recommended)
                    <li>
                        <!--<a href="javascript:;">-->
                        <img src="{{$Recommended->cover}}">
                        <div class="nr">
                            <div class="nr-left">
                                <div class="nr-top">{{$Recommended->softwarename}} @if($Recommended->charge == 1)<span>免费</span>@else<span class="hot">付费</span>@endif</div>
                                <div class="nr-con">{{$Recommended->description}}</div>
                                <div class="nr-biao">
                                    <p>上传时间：<?= substr($Recommended->created_at,0,10) ?></p>
                                    <p>上传者：{{$Recommended->nickname}}</p>
                                    @if($Recommended->comment >= 5)
                                    <p><img src="/Home/images/star.png"><img src="/Home/images/star.png"><img src="/Home/images/star.png"><img src="/Home/images/star.png"><img src="/Home/images/star.png"></p>
                                    @elseif($Recommended->comment >= 4)
                                    <p><img src="/Home/images/star.png"><img src="/Home/images/star.png"><img src="/Home/images/star.png"><img src="/Home/images/star.png"><img src="/Home/images/star-h.png"></p>
                                    @elseif($Recommended->comment >= 3)
                                    <p><img src="/Home/images/star.png"><img src="/Home/images/star.png"><img src="/Home/images/star.png"><img src="/Home/images/star-h.png"><img src="/Home/images/star-h.png"></p>
                                    @elseif($Recommended->comment >= 2)
                                    <p><img src="/Home/images/star.png"><img src="/Home/images/star.png"><img src="/Home/images/star-h.png"><img src="/Home/images/star-h.png"><img src="/Home/images/star-h.png"></p>
                                    @elseif($Recommended->comment >= 1)
                                    <p><img src="/Home/images/star.png"><img src="/Home/images/star-h.png"><img src="/Home/images/star-h.png"><img src="/Home/images/star-h.png"><img src="/Home/images/star-h.png"></p>
                                    @else
                                    <p><img src="/Home/images/star-h.png"><img src="/Home/images/star-h.png"><img src="/Home/images/star-h.png"><img src="/Home/images/star-h.png"><img src="/Home/images/star-h.png"></p>
                                    @endif
                                </div>
                                <div class="nr-biao">
                                    <p>软件大小：{{$Recommended->software_size}}</p>
                                    <p>下载次数：{{$Recommended->count}}</p>
                                    <p><a href="/SoftwareInfo/{{$Recommended->id}}.html">查看详情</a></p>
                                </div>
                            </div>
                        </div>
                        <!--</a>-->
                    </li>
                    @endforeach
                </ul>
            </div>
        </div>
    </div>
</div>
<!--最热下载-->

@include('Home.Public.footer')

<script src="/Home/js/jquery-3.2.1.min.js"></script>
<script src="/Home/js/bootstrap.min.js"></script>
<script src="/Home/js/swiper-4.2.0.min.js"></script>
<script src="/Home/js/index.js"></script>
<script src="/Home/js/public.js"></script>
<script>
    $(".advertising .container .banner-right .carousel-inner .item").eq(0).addClass("active");
    $(".hottest .container .content .con-top ul li").eq(0).addClass("active");
    var mySwiper = new Swiper ('.swiper-container', {
        slidesPerView : 5,
        autoplay:true,
        loop: true,
        navigation: {
            nextEl: '.swiper-button-next',
            prevEl: '.swiper-button-prev'
        }
    })
    $(function(){
        $('.SoftwareRec').click(function(){
            var CatyId = $(this).attr('data-id');
            $.get('/SoftRecom',{CatyId:CatyId},function(res){
                var SoftRecom = eval('('+res+')');
                $('.SoftRecom').html('');
                $.each(SoftRecom, function(idx, obj) {
                    var str = '<li><img src="'+obj.cover+'"><div class="nr"><div class="nr-left"><div class="nr-top">'+obj.softwarename+'';
                    if (obj.charge == 1) {
                        var str2 = '<span>免费</span></div>';
                    }else{
                        var str2 = '<span class="hot">付费</span></div>';
                    }
                    var str3 = '<div class="nr-con">'+obj.description+'</div><div class="nr-biao"><p>上传时间：'+obj.created_at.substring(0,10)+'</p><p>上传者：'+obj.nickname+'</p>'
                    if(obj.comment >= 5){
                        var str4  = '<p><img src="/Home/images/star.png"><img src="/Home/images/star.png"><img src="/Home/images/star.png"><img src="/Home/images/star.png"><img src="/Home/images/star.png"></p></div>';
                    }else if(obj.comment >= 4){
                         var str4  = '<p><img src="/Home/images/star.png"><img src="/Home/images/star.png"><img src="/Home/images/star.png"><img src="/Home/images/star.png"><img src="/Home/images/star-h.png"></p></div>';
                    }else if(obj.comment >= 3){
                        var str4 ='<p><img src="/Home/images/star.png"><img src="/Home/images/star.png"><img src="/Home/images/star.png"><img src="/Home/images/star-h.png"><img src="/Home/images/star-h.png"></p></div>';
                    }else if(obj.comment >= 2){
                        var str4 = '<p><img src="/Home/images/star.png"><img src="/Home/images/star.png"><img src="/Home/images/star-h.png"><img src="/Home/images/star-h.png"><img src="/Home/images/star-h.png"></p></div>';
                    }else if(obj.comment >= 1){
                        var str4 = '<p><img src="/Home/images/star.png"><img src="/Home/images/star-h.png"><img src="/Home/images/star-h.png"><img src="/Home/images/star-h.png"><img src="/Home/images/star-h.png"></p></div>';
                    }else{
                        var str4 = '<p><img src="/Home/images/star-h.png"><img src="/Home/images/star-h.png"><img src="/Home/images/star-h.png"><img src="/Home/images/star-h.png"><img src="/Home/images/star-h.png"></p></div>';
                    }
                    var str5  = '<div class="nr-biao"><p>软件大小：'+obj.software_size+'</p><p>下载次数：'+obj.count+'</p><p><a href="/SoftwareInfo/'+obj.id+'.html">查看详情</a></p></div>';
                    var strHtml = str+str2+str3+str4+str5;
                    $('.SoftRecom').append(strHtml);
                });
            });
        });
    });
</script>
</body>
</html>