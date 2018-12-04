<!DOCTYPE html>
<html lang="en" style="font-size: 625%;">
<head>
    <meta charset="UTF-8">
    <title>探路者网络--首页</title>
    <meta content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0" name="viewport" />
    <link rel="stylesheet" href="/Home/css/bootstrap.min.css">
    <link rel="stylesheet" href="/Home/css/index.css">
    <link rel="stylesheet" href="/Home/css/footer.css">
    <link rel="stylesheet" href="/Home/css/header.css">
    <script src="/Home/js/include.js"></script>
</head>
<body>
@include('Home.Public.header')
<!--banner-->
<div class="banner">
    <div class="container">
        <div id="carousel-example-generic" class="carousel slide banner-left" data-ride="carousel">
            <!-- Indicators -->

            <ol class="carousel-indicators">
                <?php foreach($BannerOne as $ok =>$oy){ ?>
                <li data-target="#carousel-example-generic" data-slide-to="{{$ok}}"></li>
                <?php } ?>
            </ol>

            <!-- Wrapper for slides -->
            {{--左上角广告位--}}
            <div class="carousel-inner" role="listbox">
                @foreach($BannerOne as $ov)
                <div class="item">
                    <a href="{{$ov->url}}">
                       <img src="{{$ov->banner_img}}">
                    </a>
                </div>
                @endforeach
            </div>
            {{--左上角广告位--}}
            <a class="left carousel-control" href="#carousel-example-generic" role="button" data-slide="prev">
                    <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"><img src="/Home/images/left-g.png" alt=""></span>
                    <span class="sr-only">Previous</span>
                </a>
                <a class="right carousel-control" href="#carousel-example-generic" role="button" data-slide="next">
                    <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"><img src="/Home/images/right-g.png" alt=""></span>
                    <span class="sr-only">Next</span>
                </a>
        </div>
        <div id="carousel-example-generic1" class="carousel slide banner-right" data-ride="carousel">
            <!-- Indicators -->
            <ol class="carousel-indicators">
                <?php foreach($BannerTwo as $tk =>$ty){ ?>
                <li data-target="#carousel-example-generic1" data-slide-to="{{$tk}}"></li>
                <?php } ?>
            </ol>

            <!-- Wrapper for slides -->
            {{--右上角广告位--}}
            <div class="carousel-inner" role="listbox">
                 @foreach($BannerTwo as $tv)
                <div class="item">
                    <a href="{{$tv->url}}">
                       <img src="{{$tv->banner_img}}">
                    </a>
                </div>
                @endforeach
            </div>
            {{--右上角广告位--}}
           <!--  <a class="left carousel-control" href="#carousel-example-generic1" role="button" data-slide="prev">
                <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
                <span class="sr-only">Previous</span>
            </a>
            <a class="right carousel-control" href="#carousel-example-generic1" role="button" data-slide="next">
                <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
                <span class="sr-only">Next</span>
            </a> -->
        </div>
    </div>
</div>
<!--banner-->

<!--广告位-->
<div class="advertising">
    <div class="container">
        {{--左下角广告位--}}
        <div class="banner-left">
            <div class="img-div">
                <a href="javascript:;">
                   <img src="{{$AdvImage[1]->billboards_pic? $AdvImage[1]->billboards_pic : $AdvImage[1]->billboards_default_pic}}">
                </a>
            </div>
            <div class="img-div">
                <a href="javascript:;">
                   <img src="{{$AdvImage[2]->billboards_pic? $AdvImage[2]->billboards_pic : $AdvImage[2]->billboards_default_pic}}">
                </a>
            </div>
        </div>
        {{--左下角广告位--}}
        {{--右下角广告位--}}
        <div class="banner-right">
            <div id="carousel-example-generic5" class="carousel slide" data-ride="carousel">
                <ol class="carousel-indicators">
                    <?php foreach($BannerOne as $ok =>$oy){ ?>
                    <li data-target="#carousel-example-generic5" data-slide-to="{{$ok}}"></li>
                    <?php } ?>
                </ol>
                <div class="carousel-inner" role="listbox">
                    @foreach($BannerThree as $sv)
                    <div class="item">
                        <a href="javascript:;">
                            <img src="{{$sv->banner_img}}">
                            <div class="carousel-caption">
                                <p>{{$sv->title}}</p>
                                <p>{{$sv->description}}</p>
                            </div>
                        </a>
                    </div>
                    @endforeach
                </div>
               <a class="left carousel-control" href="#carousel-example-generic5" role="button" data-slide="prev">
                    <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"><img src="/Home/images/left-g.png" alt=""></span>
                    <span class="sr-only">Previous</span>
                </a>
                <a class="right carousel-control" href="#carousel-example-generic5" role="button" data-slide="next">
                    <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"><img src="/Home/images/right-g.png" alt=""></span>
                    <span class="sr-only">Next</span>
                </a>
            </div>
        </div>
        {{--右下角广告位--}}
    </div>
</div>
<!--广告位-->

<!--最新上线-->
<div class="new">
    <div class="container">
        <div class="top">
            最新上线 <span>The latest upload</span>
        </div>
        <div class="content">
            <div class="con-top">
                <ul>
                    @foreach($CatyInd as $CatyInds)
                    <li data-id='{{$CatyInds->id}}' class="CatyNavNew"><a href="javascript:;">{{$CatyInds->caty_name}}</a></li>
                    @endforeach
                </ul>
            </div>
            <div class="con-con">
                <ul class="active UpNew">
                    @foreach($Software as $SList)
                    <li>
                        <a href="/SoftwareInfo/{{$SList->id}}.html">
                           <img src="{{$SList->cover}}">
                        </a>
                        <div class="nr">
                            <div class="nr-left">
                                <div class="nr-top">{{$SList->softwarename}}@if($SList->charge == 1)<span>免费</span>@else<span class="hot">付费</span>@endif</div>
                                <div class="nr-con">{{$SList->description}}</div>
                                <div class="nr-biao">
                                    <p>上传时间：<?= substr($SList->created_at,0,10) ?></p>
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
                                <a href="javascript:;">下载次数:{{$SList->count}}</a>
                                <a href="/SoftwareInfo/{{$SList->id}}.html">点击查看详情</a>
                            </div>
                        </div>
                    </li>
                    @endforeach
                </ul>
            </div>
            <div class="more">
                <a id="softwareAll" href="/SoftwareList/{{$CatyInd[0]->id}}.html"><img src="/Home/images/more.png">点击查看全部</a>
            </div>
        </div>
    </div>
</div>
<!--最新上线-->

<!--中间广告位-->
<div class="guang">
    <div class="container">
        <a href="javascript:;">
            {{--<img src="{{$AdvImage[3]->billboards_default_pic}}">--}}
            <img src="{{$AdvImage[3]->billboards_pic? $AdvImage[3]->billboards_pic : $AdvImage[3]->billboards_default_pic}}">
        </a>
    </div>
</div>
<!--中间广告位-->

<!--最热下载-->
<div class="hottest">
    <div class="container">
        <div class="top">
            最热下载 <span>The hottest download</span>
        </div>
        <div class="content">
            <div class="con-top">
                <ul>
                    @foreach($CatyInd as $CatyIndsh)
                    <li data-id='{{$CatyIndsh->id}}' class="DownHotCaty"><a href="javascript:;">{{$CatyIndsh->caty_name}}</a></li>
                    @endforeach
                </ul>
            </div>
            {{--最热下载--}}
            <div class="con-con">
                <ul class="active DownHot">
                    @foreach($SoftwareHotDown as $down)
                    <li>
                        <a href="/SoftwareInfo/{{$down->id}}.html">
                           <img src="{{$down->cover}}">
                        </a>
                        <div class="nr">
                            <div class="nr-left">
                                <div class="nr-top">{{$down->softwarename}}@if($down->charge == 1)<span>免费</span>@else<span class="hot">付费</span>@endif</div>
                                <div class="nr-con">{{$down->description}}</div>
                                <div class="nr-biao">
                                    <p>上传时间：<?= substr($down->created_at,0,10) ?></p>
                                    <p>上传者：{{$down->nickname}}</p>
                                    @if($down->comment >= 5)
                                    <p><img src="/Home/images/star.png"><img src="/Home/images/star.png"><img src="/Home/images/star.png"><img src="/Home/images/star.png"><img src="/Home/images/star.png"></p>
                                    @elseif($down->comment >= 4)
                                    <p><img src="/Home/images/star.png"><img src="/Home/images/star.png"><img src="/Home/images/star.png"><img src="/Home/images/star.png"><img src="/Home/images/star-h.png"></p>
                                    @elseif($down->comment >= 3)
                                    <p><img src="/Home/images/star.png"><img src="/Home/images/star.png"><img src="/Home/images/star.png"><img src="/Home/images/star-h.png"><img src="/Home/images/star-h.png"></p>
                                    @elseif($down->comment >= 2)
                                    <p><img src="/Home/images/star.png"><img src="/Home/images/star.png"><img src="/Home/images/star-h.png"><img src="/Home/images/star-h.png"><img src="/Home/images/star-h.png"></p>
                                    @elseif($down->comment >= 1)
                                    <p><img src="/Home/images/star.png"><img src="/Home/images/star-h.png"><img src="/Home/images/star-h.png"><img src="/Home/images/star-h.png"><img src="/Home/images/star-h.png"></p>
                                    @else
                                    <p><img src="/Home/images/star-h.png"><img src="/Home/images/star-h.png"><img src="/Home/images/star-h.png"><img src="/Home/images/star-h.png"><img src="/Home/images/star-h.png"></p>
                                    @endif
                                </div>
                                <div class="nr-biao">
                                    <p>软件大小：{{$down->software_size}}</p>
                                    <p>下载次数：{{$down->count}}</p>
                                    <p><a href="/SoftwareInfo/{{$down->id}}.html">查看详情</a></p>
                                </div>
                            </div>
                        </div>
                    </li>
                    @endforeach
                </ul>
            </div>
            {{--最热下载--}}
        </div>
    </div>
</div>
<!--最热下载-->


@include('Home.Public.footer')

<script src="/Home/js/jquery-3.2.1.min.js"></script>
<script src="/Home/js/bootstrap.min.js"></script>
<script src="/Home/js/index.js"></script>
<script src="/Home/js/public.js"></script>
<script>
    $(".banner .banner-left .carousel-indicators li").eq(0).addClass("active");
    $(".banner .banner-left .carousel-inner .item").eq(0).addClass("active");
    $(".banner .banner-right .carousel-indicators li").eq(0).addClass("active");
    $(".banner .banner-right .carousel-inner .item").eq(0).addClass("active");
    $(".advertising .banner-right .carousel-inner .item").eq(0).addClass("active");
     $(".advertising .banner-right .carousel-indicators li").eq(0).addClass("active");
    $(".new .container .content ul li").eq(0).addClass("active");
    $(".hottest .container .content ul li").eq(0).addClass("active");
    $(function(){
        $('.CatyNavNew').click(function(){
            var catyId = $(this).attr('data-id');
            var StrSoftAll = '/SoftwareList/'+catyId+'.html';
            $('#softwareAll').attr('href',StrSoftAll)
            $.get('/NewUpload',{catyId:catyId},function(res){
                var UpNew = eval('('+res+')');
                  $('.UpNew').html('');
                  $.each(UpNew, function(idx, obj) {
                        var str = '<li><img src="'+obj.cover+'"><div class="nr"><div class="nr-left"><div class="nr-top">'+obj.softwarename+'';
                        if (obj.charge == 1) {
                            var str2 = '<span>免费</span></div>';
                        }else{
                            var str2 = '<span class="hot">付费</span></div>';
                        }
                        var str3 = '<div class="nr-con">'+obj.description+'</div><div class="nr-biao"><p>上传时间：'+obj.created_at.substring(0,10)+'</p><p>上传者：'+obj.nickname+'</p>'
                        if(obj.comment >= 5){
                            var str4  = '<p><img src="/Home/images/star.png"><img src="/Home/images/star.png"><img src="/Home/images/star.png"><img src="/Home/images/star.png"><img src="/Home/images/star.png"></p>';
                        }else if(obj.comment >= 4){
                             var str4  = '<p><img src="/Home/images/star.png"><img src="/Home/images/star.png"><img src="/Home/images/star.png"><img src="/Home/images/star.png"><img src="/Home/images/star-h.png"></p>';
                        }else if(obj.comment >= 3){
                            var str4 ='<p><img src="/Home/images/star.png"><img src="/Home/images/star.png"><img src="/Home/images/star.png"><img src="/Home/images/star-h.png"><img src="/Home/images/star-h.png"></p>';
                        }else if(obj.comment >= 2){
                            var str4 = '<p><img src="/Home/images/star.png"><img src="/Home/images/star.png"><img src="/Home/images/star-h.png"><img src="/Home/images/star-h.png"><img src="/Home/images/star-h.png"></p>';
                        }else if(obj.comment >= 1){
                            var str4 = '<p><img src="/Home/images/star.png"><img src="/Home/images/star-h.png"><img src="/Home/images/star-h.png"><img src="/Home/images/star-h.png"><img src="/Home/images/star-h.png"></p>';
                        }else{
                            var str4 = '<p><img src="/Home/images/star-h.png"><img src="/Home/images/star-h.png"><img src="/Home/images/star-h.png"><img src="/Home/images/star-h.png"><img src="/Home/images/star-h.png"></p>';
                        }

                        var str5  = '<p>软件大小：'+obj.software_size+'</p></div></div><div class="nr-right"><a href="javascript:;">下载次数：'+obj.count+'</a><a href="/SoftwareInfo/'+obj.id+'.html">点击查看详情</a></div></div></li>';
                        var strHtml = str+str2+str3+str4+str5;
                    $('.UpNew').append(strHtml);
                  });
            });
        });
        $('.DownHotCaty').click(function(){
              var catyId = $(this).attr('data-id');
                $.get('/NewUpload',{catyId:catyId},function(res){
                var DownHot = eval('('+res+')');
                  $('.DownHot').html('');
                  $.each(DownHot, function(idx, obj) {
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
                    $('.DownHot').append(strHtml);
                  });
            });
        });
    });
</script>
</body>
</html>