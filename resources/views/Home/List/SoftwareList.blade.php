<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>探路者网络--列表页</title>
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


<!--<div class="banner">
    <div class="container">
        <div class="top"><img src="{{$AdvImage->list_h}}"></div>
    </div>
</div>-->
<!--广告位-->
<div class="advertising">   
    <div class="container">
        <div class="banner-right">
            <div id="carousel-example-generic5" class="carousel slide" data-ride="carousel">
                <div class="carousel-inner" role="listbox">
                    @foreach($SoftwareBannerS as $SO)
                    <div class="item">
                        <a href="javascript:;">
                           <img src="{{$SO->banner_img}}">
                           <div class="carousel-caption">
                              <p>{{$SO->title}}</p>
                              <p>{{$SO->description}}</p>
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
        <div class="banner-left">
            <div class="img-div">
                <a href="{{$AdvImage[11]->billboards_url? $AdvImage[11]->billboards_url : $AdvImage[11]->billboards_default_url}}">
                    <img src="{{$AdvImage[11]->billboards_pic? $AdvImage[11]->billboards_pic : $AdvImage[11]->billboards_default_pic}}">
                </a>
            </div>
            <div class="img-div">
                <a href="{{$AdvImage[12]->billboards_url? $AdvImage[12]->billboards_url : $AdvImage[12]->billboards_default_url}}">
                    <img src="{{$AdvImage[12]->billboards_pic? $AdvImage[12]->billboards_pic : $AdvImage[12]->billboards_default_pic}}">
                </a>
            </div>
        </div>
    </div>
</div>
<!--广告位-->

<!--广告位-->
<div class="guang hidden-xs">
    <div class="container">
        <div class="swiper-container">
            <div class="swiper-wrapper">
                <div class="swiper-slide">
                    @foreach($SoftwareShuff['shuff1'] as $Shuff1)
                    <div class="big">
                        <a href="/SoftwareInfo/{{$Shuff1->id}}.html">
                            <div class="title">{{$Shuff1->softwarename ? $Shuff1->softwarename : '暂无数据'}}</div>
                            <div class="nr">
                                {{$Shuff1->description ? $Shuff1->description : '暂无数据'}}
                            </div>
                            <div class="shang">
                                <p>资源大小：{{$Shuff1->software_size?$Shuff1->software_size:'暂无'}}</p>
                                @if($Shuff1->comment >= 5)
                                    <p>
                                        <img src="/Home/images/star1.png">
                                        <img src="/Home/images/star1.png">
                                        <img src="/Home/images/star1.png">
                                        <img src="/Home/images/star1.png">
                                        <img src="/Home/images/star1.png">
                                    </p>
                                    @elseif($Shuff1->comment >= 4)
                                    <p>
                                        <img src="/Home/images/star1.png">
                                        <img src="/Home/images/star1.png">
                                        <img src="/Home/images/star1.png">
                                        <img src="/Home/images/star1.png">
                                        <img src="/Home/images/star1-h.png">
                                    </p>
                                    @elseif($Shuff1->comment >= 3)
                                    <p>
                                        <img src="/Home/images/star1.png">
                                        <img src="/Home/images/star1.png">
                                        <img src="/Home/images/star1.png">
                                        <img src="/Home/images/star1-h.png">
                                        <img src="/Home/images/star1-h.png">
                                    </p>
                                    @elseif($Shuff1->comment >= 2)
                                    <p>
                                        <img src="/Home/images/star1.png">
                                        <img src="/Home/images/star1.png">
                                        <img src="/Home/images/star1-h.png">
                                        <img src="/Home/images/star1-h.png">
                                        <img src="/Home/images/star1-h.png">
                                    </p>
                                    @elseif($Shuff1->comment >= 1)
                                    <p>
                                        <img src="/Home/images/star1.png">
                                        <img src="/Home/images/star1-h.png">
                                        <img src="/Home/images/star1-h.png">
                                        <img src="/Home/images/star1-h.png">
                                        <img src="/Home/images/star1-h.png">
                                    </p>
                                    @else
                                    <p>
                                        <img src="/Home/images/star1-h.png">
                                        <img src="/Home/images/star1-h.png">
                                        <img src="/Home/images/star1-h.png">
                                        <img src="/Home/images/star1-h.png">
                                        <img src="/Home/images/star1-h.png">
                                    </p>
                                    @endif
                            </div>
                        </a>
                    </div>
                    @endforeach
                </div>
                <div class="swiper-slide">
                    @foreach($SoftwareShuff['shuff2'] as $Shuff2) 
                    <div class="big">
                        <a href="/SoftwareInfo/{{$Shuff2->id}}.html">
                            <div class="title">{{$Shuff2->softwarename?$Shuff2->softwarename:'暂无数据'}}</div>
                            <div class="nr">
                                {{$Shuff2->description?$Shuff2->description:'暂无数据'}}
                            </div>
                            <div class="shang">
                                <p>资源大小：{{$Shuff2->software_size?$Shuff2->software_size:'暂无数据'}}</p>
                                @if($Shuff2->comment >= 5)
                                    <p>
                                        <img src="/Home/images/star1.png">
                                        <img src="/Home/images/star1.png">
                                        <img src="/Home/images/star1.png">
                                        <img src="/Home/images/star1.png">
                                        <img src="/Home/images/star1.png">
                                    </p>
                                    @elseif($Shuff2->comment >= 4)
                                    <p>
                                        <img src="/Home/images/star1.png">
                                        <img src="/Home/images/star1.png">
                                        <img src="/Home/images/star1.png">
                                        <img src="/Home/images/star1.png">
                                        <img src="/Home/images/star1-h.png">
                                    </p>
                                    @elseif($Shuff2->comment >= 3)
                                    <p>
                                        <img src="/Home/images/star1.png">
                                        <img src="/Home/images/star1.png">
                                        <img src="/Home/images/star1.png">
                                        <img src="/Home/images/star1-h.png">
                                        <img src="/Home/images/star1-h.png">
                                    </p>
                                    @elseif($Shuff2->comment >= 2)
                                    <p>
                                        <img src="/Home/images/star1.png">
                                        <img src="/Home/images/star1.png">
                                        <img src="/Home/images/star1-h.png">
                                        <img src="/Home/images/star1-h.png">
                                        <img src="/Home/images/star1-h.png">
                                    </p>
                                    @elseif($Shuff2->comment >= 1)
                                    <p>
                                        <img src="/Home/images/star1.png">
                                        <img src="/Home/images/star1-h.png">
                                        <img src="/Home/images/star1-h.png">
                                        <img src="/Home/images/star1-h.png">
                                        <img src="/Home/images/star1-h.png">
                                    </p>
                                    @else
                                    <p>
                                        <img src="/Home/images/star1-h.png">
                                        <img src="/Home/images/star1-h.png">
                                        <img src="/Home/images/star1-h.png">
                                        <img src="/Home/images/star1-h.png">
                                        <img src="/Home/images/star1-h.png">
                                    </p>
                                    @endif
                            </div>
                        </a>
                    </div>
                    @endforeach
                </div>
                <div class="swiper-slide">
                    @foreach($SoftwareShuff['shuff3'] as $Shuff3)
                    <div class="big">
                        <a href="/SoftwareInfo/{{$Shuff3->id}}.html">
                            <div class="title">{{$Shuff3->softwarename?$Shuff3->softwarename:'暂无数据'}}</div>
                            <div class="nr">
                                {{$Shuff3->description?$Shuff3->description:'暂无数据'}}
                            </div>
                            <div class="shang">
                                <p>资源大小：{{$Shuff3->software_size?$Shuff3->software_size:'暂无数据'}}</p>
                                @if($Shuff3->comment >= 5)
                                    <p>
                                        <img src="/Home/images/star1.png">
                                        <img src="/Home/images/star1.png">
                                        <img src="/Home/images/star1.png">
                                        <img src="/Home/images/star1.png">
                                        <img src="/Home/images/star1.png">
                                    </p>
                                    @elseif($Shuff3->comment >= 4)
                                    <p>
                                        <img src="/Home/images/star1.png">
                                        <img src="/Home/images/star1.png">
                                        <img src="/Home/images/star1.png">
                                        <img src="/Home/images/star1.png">
                                        <img src="/Home/images/star1-h.png">
                                    </p>
                                    @elseif($Shuff3->comment >= 3)
                                    <p>
                                        <img src="/Home/images/star1.png">
                                        <img src="/Home/images/star1.png">
                                        <img src="/Home/images/star1.png">
                                        <img src="/Home/images/star1-h.png">
                                        <img src="/Home/images/star1-h.png">
                                    </p>
                                    @elseif($Shuff3->comment >= 2)
                                    <p>
                                        <img src="/Home/images/star1.png">
                                        <img src="/Home/images/star1.png">
                                        <img src="/Home/images/star1-h.png">
                                        <img src="/Home/images/star1-h.png">
                                        <img src="/Home/images/star1-h.png">
                                    </p>
                                    @elseif($Shuff3->comment >= 1)
                                    <p>
                                        <img src="/Home/images/star1.png">
                                        <img src="/Home/images/star1-h.png">
                                        <img src="/Home/images/star1-h.png">
                                        <img src="/Home/images/star1-h.png">
                                        <img src="/Home/images/star1-h.png">
                                    </p>
                                    @else
                                    <p>
                                        <img src="/Home/images/star1-h.png">
                                        <img src="/Home/images/star1-h.png">
                                        <img src="/Home/images/star1-h.png">
                                        <img src="/Home/images/star1-h.png">
                                        <img src="/Home/images/star1-h.png">
                                    </p>
                                    @endif
                            </div>
                        </a>
                    </div>
                    @endforeach
                </div>
                <div class="swiper-slide">
                     @foreach($SoftwareShuff['shuff4'] as $Shuff4)
                    <div class="big">
                        <a href="/SoftwareInfo/{{$Shuff4->id}}.html">
                            <div class="title">{{$Shuff4->softwarename?$Shuff4->softwarename:'暂无数据'}}</div>
                            <div class="nr">
                                {{$Shuff4->description?$Shuff4->description:'暂无数据'}}
                            </div>
                            <div class="shang">
                                <p>资源大小：{{$Shuff4->software_size?$Shuff4->software_size:'暂无数据'}}</p>
                                @if($Shuff4->comment >= 5)
                                    <p>
                                        <img src="/Home/images/star1.png">
                                        <img src="/Home/images/star1.png">
                                        <img src="/Home/images/star1.png">
                                        <img src="/Home/images/star1.png">
                                        <img src="/Home/images/star1.png">
                                    </p>
                                    @elseif($Shuff4->comment >= 4)
                                    <p>
                                        <img src="/Home/images/star1.png">
                                        <img src="/Home/images/star1.png">
                                        <img src="/Home/images/star1.png">
                                        <img src="/Home/images/star1.png">
                                        <img src="/Home/images/star1-h.png">
                                    </p>
                                    @elseif($Shuff4->comment >= 3)
                                    <p>
                                        <img src="/Home/images/star1.png">
                                        <img src="/Home/images/star1.png">
                                        <img src="/Home/images/star1.png">
                                        <img src="/Home/images/star1-h.png">
                                        <img src="/Home/images/star1-h.png">
                                    </p>
                                    @elseif($Shuff4->comment >= 2)
                                    <p>
                                        <img src="/Home/images/star1.png">
                                        <img src="/Home/images/star1.png">
                                        <img src="/Home/images/star1-h.png">
                                        <img src="/Home/images/star1-h.png">
                                        <img src="/Home/images/star1-h.png">
                                    </p>
                                    @elseif($Shuff4->comment >= 1)
                                    <p>
                                        <img src="/Home/images/star1.png">
                                        <img src="/Home/images/star1-h.png">
                                        <img src="/Home/images/star1-h.png">
                                        <img src="/Home/images/star1-h.png">
                                        <img src="/Home/images/star1-h.png">
                                    </p>
                                    @else
                                    <p>
                                        <img src="/Home/images/star1-h.png">
                                        <img src="/Home/images/star1-h.png">
                                        <img src="/Home/images/star1-h.png">
                                        <img src="/Home/images/star1-h.png">
                                        <img src="/Home/images/star1-h.png">
                                    </p>
                                    @endif
                            </div>
                        </a>
                    </div>
                     @endforeach
                </div>
                <div class="swiper-slide">
                    @foreach($SoftwareShuff['shuff5'] as $Shuff5)
                    <div class="big">
                        <a href="/SoftwareInfo/{{$Shuff5->id}}.html">
                            <div class="title">{{$Shuff5->softwarename?$Shuff5->softwarename:'暂无数据'}}</div>
                            <div class="nr">
                                {{$Shuff5->description?$Shuff5->description:'暂无数据'}}
                            </div>
                            <div class="shang">
                                <p>资源大小：{{$Shuff5->software_size?$Shuff5->software_size:'暂无数据'}}</p>
                                @if($Shuff5->comment >= 5)
                                    <p>
                                        <img src="/Home/images/star1.png">
                                        <img src="/Home/images/star1.png">
                                        <img src="/Home/images/star1.png">
                                        <img src="/Home/images/star1.png">
                                        <img src="/Home/images/star1.png">
                                    </p>
                                    @elseif($Shuff5->comment >= 4)
                                    <p>
                                        <img src="/Home/images/star1.png">
                                        <img src="/Home/images/star1.png">
                                        <img src="/Home/images/star1.png">
                                        <img src="/Home/images/star1.png">
                                        <img src="/Home/images/star1-h.png">
                                    </p>
                                    @elseif($Shuff5->comment >= 3)
                                    <p>
                                        <img src="/Home/images/star1.png">
                                        <img src="/Home/images/star1.png">
                                        <img src="/Home/images/star1.png">
                                        <img src="/Home/images/star1-h.png">
                                        <img src="/Home/images/star1-h.png">
                                    </p>
                                    @elseif($Shuff5->comment >= 2)
                                    <p>
                                        <img src="/Home/images/star1.png">
                                        <img src="/Home/images/star1.png">
                                        <img src="/Home/images/star1-h.png">
                                        <img src="/Home/images/star1-h.png">
                                        <img src="/Home/images/star1-h.png">
                                    </p>
                                    @elseif($Shuff5->comment >= 1)
                                    <p>
                                        <img src="/Home/images/star1.png">
                                        <img src="/Home/images/star1-h.png">
                                        <img src="/Home/images/star1-h.png">
                                        <img src="/Home/images/star1-h.png">
                                        <img src="/Home/images/star1-h.png">
                                    </p>
                                    @else
                                    <p>
                                        <img src="/Home/images/star1-h.png">
                                        <img src="/Home/images/star1-h.png">
                                        <img src="/Home/images/star1-h.png">
                                        <img src="/Home/images/star1-h.png">
                                        <img src="/Home/images/star1-h.png">
                                    </p>
                                    @endif
                            </div>
                        </a>
                    </div>
                    @endforeach
                </div>
            </div>
        </div>
         <div class="swiper-button-prev"></div>
        <div class="swiper-button-next"></div>
        <div class="fixed-guang">
            <p>赞助推荐</p>
        </div>
    </div>
</div>

<div class="guang hidden-sm hidden-lg hidden-md">
    <div class="container">
        <div class="swiper-container">
            <div class="swiper-wrapper">
                <div class="swiper-slide">
                    @foreach($SoftwareMobile['mobile1'] as $mobile1)
                    <div class="big">
                        <a href="/SoftwareInfo/{{$mobile1->id}}.html">
                            <div class="title">{{$mobile1->softwarename}}</div>
                            <div class="nr">
                                {{$mobile1->description}}
                            </div>
                            <div class="shang">
                                <p>资源大小：{{$mobile1->software_size}}</p>
                                @if($mobile1->comment >= 5)
                                    <p>
                                        <img src="/Home/images/star1.png">
                                        <img src="/Home/images/star1.png">
                                        <img src="/Home/images/star1.png">
                                        <img src="/Home/images/star1.png">
                                        <img src="/Home/images/star1.png">
                                    </p>
                                    @elseif($mobile1->comment >= 4)
                                    <p>
                                        <img src="/Home/images/star1.png">
                                        <img src="/Home/images/star1.png">
                                        <img src="/Home/images/star1.png">
                                        <img src="/Home/images/star1.png">
                                        <img src="/Home/images/star1-h.png">
                                    </p>
                                    @elseif($mobile1->comment >= 3)
                                    <p>
                                        <img src="/Home/images/star1.png">
                                        <img src="/Home/images/star1.png">
                                        <img src="/Home/images/star1.png">
                                        <img src="/Home/images/star1-h.png">
                                        <img src="/Home/images/star1-h.png">
                                    </p>
                                    @elseif($mobile1->comment >= 2)
                                    <p>
                                        <img src="/Home/images/star1.png">
                                        <img src="/Home/images/star1.png">
                                        <img src="/Home/images/star1-h.png">
                                        <img src="/Home/images/star1-h.png">
                                        <img src="/Home/images/star1-h.png">
                                    </p>
                                    @elseif($mobile1->comment >= 1)
                                    <p>
                                        <img src="/Home/images/star1.png">
                                        <img src="/Home/images/star1-h.png">
                                        <img src="/Home/images/star1-h.png">
                                        <img src="/Home/images/star1-h.png">
                                        <img src="/Home/images/star1-h.png">
                                    </p>
                                    @else
                                    <p>
                                        <img src="/Home/images/star1-h.png">
                                        <img src="/Home/images/star1-h.png">
                                        <img src="/Home/images/star1-h.png">
                                        <img src="/Home/images/star1-h.png">
                                        <img src="/Home/images/star1-h.png">
                                    </p>
                                    @endif
                            </div>
                        </a>
                    </div>
                    @endforeach
                </div>
                <div class="swiper-slide">
                    @foreach($SoftwareMobile['mobile2'] as $mobile2)
                    <div class="big">
                        <a href="/SoftwareInfo/{{$mobile2->id}}.html">
                            <div class="title">{{$mobile2->softwarename}}</div>
                            <div class="nr">
                                {{$mobile2->description}}
                            </div>
                            <div class="shang">
                                <p>资源大小：{{$mobile2->software_size}}</p>
                                @if($mobile2->comment >= 5)
                                    <p>
                                        <img src="/Home/images/star1.png">
                                        <img src="/Home/images/star1.png">
                                        <img src="/Home/images/star1.png">
                                        <img src="/Home/images/star1.png">
                                        <img src="/Home/images/star1.png">
                                    </p>
                                    @elseif($mobile2->comment >= 4)
                                    <p>
                                        <img src="/Home/images/star1.png">
                                        <img src="/Home/images/star1.png">
                                        <img src="/Home/images/star1.png">
                                        <img src="/Home/images/star1.png">
                                        <img src="/Home/images/star1-h.png">
                                    </p>
                                    @elseif($mobile2->comment >= 3)
                                    <p>
                                        <img src="/Home/images/star1.png">
                                        <img src="/Home/images/star1.png">
                                        <img src="/Home/images/star1.png">
                                        <img src="/Home/images/star1-h.png">
                                        <img src="/Home/images/star1-h.png">
                                    </p>
                                    @elseif($mobile2->comment >= 2)
                                    <p>
                                        <img src="/Home/images/star1.png">
                                        <img src="/Home/images/star1.png">
                                        <img src="/Home/images/star1-h.png">
                                        <img src="/Home/images/star1-h.png">
                                        <img src="/Home/images/star1-h.png">
                                    </p>
                                    @elseif($mobile2->comment >= 1)
                                    <p>
                                        <img src="/Home/images/star1.png">
                                        <img src="/Home/images/star1-h.png">
                                        <img src="/Home/images/star1-h.png">
                                        <img src="/Home/images/star1-h.png">
                                        <img src="/Home/images/star1-h.png">
                                    </p>
                                    @else
                                    <p>
                                        <img src="/Home/images/star1-h.png">
                                        <img src="/Home/images/star1-h.png">
                                        <img src="/Home/images/star1-h.png">
                                        <img src="/Home/images/star1-h.png">
                                        <img src="/Home/images/star1-h.png">
                                    </p>
                                    @endif
                            </div>
                        </a>
                    </div>
                    @endforeach
                </div>
                <div class="swiper-slide">
                    @foreach($SoftwareMobile['mobile3'] as $mobile3)
                    <div class="big">
                        <a href="/SoftwareInfo/{{$mobile3->id}}.html">
                            <div class="title">{{$mobile3->softwarename}}</div>
                            <div class="nr">
                                {{$mobile3->description}}
                            </div>
                            <div class="shang">
                                <p>资源大小：{{$mobile3->software_size}}</p>
                                @if($mobile3->comment >= 5)
                                    <p>
                                        <img src="/Home/images/star1.png">
                                        <img src="/Home/images/star1.png">
                                        <img src="/Home/images/star1.png">
                                        <img src="/Home/images/star1.png">
                                        <img src="/Home/images/star1.png">
                                    </p>
                                    @elseif($mobile3->comment >= 4)
                                    <p>
                                        <img src="/Home/images/star1.png">
                                        <img src="/Home/images/star1.png">
                                        <img src="/Home/images/star1.png">
                                        <img src="/Home/images/star1.png">
                                        <img src="/Home/images/star1-h.png">
                                    </p>
                                    @elseif($mobile3->comment >= 3)
                                    <p>
                                        <img src="/Home/images/star1.png">
                                        <img src="/Home/images/star1.png">
                                        <img src="/Home/images/star1.png">
                                        <img src="/Home/images/star1-h.png">
                                        <img src="/Home/images/star1-h.png">
                                    </p>
                                    @elseif($mobile3->comment >= 2)
                                    <p>
                                        <img src="/Home/images/star1.png">
                                        <img src="/Home/images/star1.png">
                                        <img src="/Home/images/star1-h.png">
                                        <img src="/Home/images/star1-h.png">
                                        <img src="/Home/images/star1-h.png">
                                    </p>
                                    @elseif($mobile3->comment >= 1)
                                    <p>
                                        <img src="/Home/images/star1.png">
                                        <img src="/Home/images/star1-h.png">
                                        <img src="/Home/images/star1-h.png">
                                        <img src="/Home/images/star1-h.png">
                                        <img src="/Home/images/star1-h.png">
                                    </p>
                                    @else
                                    <p>
                                        <img src="/Home/images/star1-h.png">
                                        <img src="/Home/images/star1-h.png">
                                        <img src="/Home/images/star1-h.png">
                                        <img src="/Home/images/star1-h.png">
                                        <img src="/Home/images/star1-h.png">
                                    </p>
                                    @endif
                            </div>
                        </a>
                    </div>
                    @endforeach
                </div>
                <div class="swiper-slide">
                    @foreach($SoftwareMobile['mobile4'] as $mobile4)
                    <div class="big">
                        <a href="/SoftwareInfo/{{$mobile4->id}}.html">
                            <div class="title">{{$mobile4->softwarename}}</div>
                            <div class="nr">
                                {{$mobile4->description}}
                            </div>
                            <div class="shang">
                                <p>资源大小：{{$mobile4->software_size}}</p>
                                @if($mobile4->comment >= 5)
                                    <p>
                                        <img src="/Home/images/star1.png">
                                        <img src="/Home/images/star1.png">
                                        <img src="/Home/images/star1.png">
                                        <img src="/Home/images/star1.png">
                                        <img src="/Home/images/star1.png">
                                    </p>
                                    @elseif($mobile4->comment >= 4)
                                    <p>
                                        <img src="/Home/images/star1.png">
                                        <img src="/Home/images/star1.png">
                                        <img src="/Home/images/star1.png">
                                        <img src="/Home/images/star1.png">
                                        <img src="/Home/images/star1-h.png">
                                    </p>
                                    @elseif($mobile4->comment >= 3)
                                    <p>
                                        <img src="/Home/images/star1.png">
                                        <img src="/Home/images/star1.png">
                                        <img src="/Home/images/star1.png">
                                        <img src="/Home/images/star1-h.png">
                                        <img src="/Home/images/star1-h.png">
                                    </p>
                                    @elseif($mobile4->comment >= 2)
                                    <p>
                                        <img src="/Home/images/star1.png">
                                        <img src="/Home/images/star1.png">
                                        <img src="/Home/images/star1-h.png">
                                        <img src="/Home/images/star1-h.png">
                                        <img src="/Home/images/star1-h.png">
                                    </p>
                                    @elseif($mobile4->comment >= 1)
                                    <p>
                                        <img src="/Home/images/star1.png">
                                        <img src="/Home/images/star1-h.png">
                                        <img src="/Home/images/star1-h.png">
                                        <img src="/Home/images/star1-h.png">
                                        <img src="/Home/images/star1-h.png">
                                    </p>
                                    @else
                                    <p>
                                        <img src="/Home/images/star1-h.png">
                                        <img src="/Home/images/star1-h.png">
                                        <img src="/Home/images/star1-h.png">
                                        <img src="/Home/images/star1-h.png">
                                        <img src="/Home/images/star1-h.png">
                                    </p>
                                    @endif
                            </div>
                        </a>
                    </div>
                    @endforeach
                </div>
                <div class="swiper-slide">
                    @foreach($SoftwareMobile['mobile5'] as $mobile5)
                    <div class="big">
                        <a href="/SoftwareInfo/{{$mobile5->id}}.html">
                            <div class="title">{{$mobile5->softwarename}}</div>
                            <div class="nr">
                                {{$mobile5->description}}
                            </div>
                            <div class="shang">
                                <p>资源大小：{{$mobile5->software_size}}</p>
                                @if($mobile5->comment >= 5)
                                    <p>
                                        <img src="/Home/images/star1.png">
                                        <img src="/Home/images/star1.png">
                                        <img src="/Home/images/star1.png">
                                        <img src="/Home/images/star1.png">
                                        <img src="/Home/images/star1.png">
                                    </p>
                                    @elseif($mobile5->comment >= 4)
                                    <p>
                                        <img src="/Home/images/star1.png">
                                        <img src="/Home/images/star1.png">
                                        <img src="/Home/images/star1.png">
                                        <img src="/Home/images/star1.png">
                                        <img src="/Home/images/star1-h.png">
                                    </p>
                                    @elseif($mobile5->comment >= 3)
                                    <p>
                                        <img src="/Home/images/star1.png">
                                        <img src="/Home/images/star1.png">
                                        <img src="/Home/images/star1.png">
                                        <img src="/Home/images/star1-h.png">
                                        <img src="/Home/images/star1-h.png">
                                    </p>
                                    @elseif($mobile5->comment >= 2)
                                    <p>
                                        <img src="/Home/images/star1.png">
                                        <img src="/Home/images/star1.png">
                                        <img src="/Home/images/star1-h.png">
                                        <img src="/Home/images/star1-h.png">
                                        <img src="/Home/images/star1-h.png">
                                    </p>
                                    @elseif($mobile5->comment >= 1)
                                    <p>
                                        <img src="/Home/images/star1.png">
                                        <img src="/Home/images/star1-h.png">
                                        <img src="/Home/images/star1-h.png">
                                        <img src="/Home/images/star1-h.png">
                                        <img src="/Home/images/star1-h.png">
                                    </p>
                                    @else
                                    <p>
                                        <img src="/Home/images/star1-h.png">
                                        <img src="/Home/images/star1-h.png">
                                        <img src="/Home/images/star1-h.png">
                                        <img src="/Home/images/star1-h.png">
                                        <img src="/Home/images/star1-h.png">
                                    </p>
                                    @endif
                            </div>
                        </a>
                    </div>
                    @endforeach
                </div>
                <div class="swiper-slide">
                    @foreach($SoftwareMobile['mobile6'] as $mobile6)
                    <div class="big">
                        <a href="/SoftwareInfo/{{$mobile6->id}}.html">
                            <div class="title">{{$mobile6->softwarename}}</div>
                            <div class="nr">
                                {{$mobile6->description}}
                            </div>
                            <div class="shang">
                                <p>资源大小：{{$mobile6->software_size}}</p>
                                @if($mobile6->comment >= 5)
                                    <p>
                                        <img src="/Home/images/star1.png">
                                        <img src="/Home/images/star1.png">
                                        <img src="/Home/images/star1.png">
                                        <img src="/Home/images/star1.png">
                                        <img src="/Home/images/star1.png">
                                    </p>
                                    @elseif($mobile6->comment >= 4)
                                    <p>
                                        <img src="/Home/images/star1.png">
                                        <img src="/Home/images/star1.png">
                                        <img src="/Home/images/star1.png">
                                        <img src="/Home/images/star1.png">
                                        <img src="/Home/images/star1-h.png">
                                    </p>
                                    @elseif($mobile6->comment >= 3)
                                    <p>
                                        <img src="/Home/images/star1.png">
                                        <img src="/Home/images/star1.png">
                                        <img src="/Home/images/star1.png">
                                        <img src="/Home/images/star1-h.png">
                                        <img src="/Home/images/star1-h.png">
                                    </p>
                                    @elseif($mobile6->comment >= 2)
                                    <p>
                                        <img src="/Home/images/star1.png">
                                        <img src="/Home/images/star1.png">
                                        <img src="/Home/images/star1-h.png">
                                        <img src="/Home/images/star1-h.png">
                                        <img src="/Home/images/star1-h.png">
                                    </p>
                                    @elseif($mobile6->comment >= 1)
                                    <p>
                                        <img src="/Home/images/star1.png">
                                        <img src="/Home/images/star1-h.png">
                                        <img src="/Home/images/star1-h.png">
                                        <img src="/Home/images/star1-h.png">
                                        <img src="/Home/images/star1-h.png">
                                    </p>
                                    @else
                                    <p>
                                        <img src="/Home/images/star1-h.png">
                                        <img src="/Home/images/star1-h.png">
                                        <img src="/Home/images/star1-h.png">
                                        <img src="/Home/images/star1-h.png">
                                        <img src="/Home/images/star1-h.png">
                                    </p>
                                    @endif
                            </div>
                        </a>
                    </div>
                    @endforeach
                </div>
                <div class="swiper-slide">
                    @foreach($SoftwareMobile['mobile7'] as $mobile7)
                    <div class="big">
                        <a href="/SoftwareInfo/{{$mobile7->id}}.html">
                            <div class="title">{{$mobile7->softwarename}}</div>
                            <div class="nr">
                                {{$mobile7->description}}
                            </div>
                            <div class="shang">
                                <p>资源大小：{{$mobile7->software_size}}</p>
                                @if($mobile7->comment >= 5)
                                    <p>
                                        <img src="/Home/images/star1.png">
                                        <img src="/Home/images/star1.png">
                                        <img src="/Home/images/star1.png">
                                        <img src="/Home/images/star1.png">
                                        <img src="/Home/images/star1.png">
                                    </p>
                                    @elseif($mobile7->comment >= 4)
                                    <p>
                                        <img src="/Home/images/star1.png">
                                        <img src="/Home/images/star1.png">
                                        <img src="/Home/images/star1.png">
                                        <img src="/Home/images/star1.png">
                                        <img src="/Home/images/star1-h.png">
                                    </p>
                                    @elseif($mobile7->comment >= 3)
                                    <p>
                                        <img src="/Home/images/star1.png">
                                        <img src="/Home/images/star1.png">
                                        <img src="/Home/images/star1.png">
                                        <img src="/Home/images/star1-h.png">
                                        <img src="/Home/images/star1-h.png">
                                    </p>
                                    @elseif($mobile7->comment >= 2)
                                    <p>
                                        <img src="/Home/images/star1.png">
                                        <img src="/Home/images/star1.png">
                                        <img src="/Home/images/star1-h.png">
                                        <img src="/Home/images/star1-h.png">
                                        <img src="/Home/images/star1-h.png">
                                    </p>
                                    @elseif($mobile7->comment >= 1)
                                    <p>
                                        <img src="/Home/images/star1.png">
                                        <img src="/Home/images/star1-h.png">
                                        <img src="/Home/images/star1-h.png">
                                        <img src="/Home/images/star1-h.png">
                                        <img src="/Home/images/star1-h.png">
                                    </p>
                                    @else
                                    <p>
                                        <img src="/Home/images/star1-h.png">
                                        <img src="/Home/images/star1-h.png">
                                        <img src="/Home/images/star1-h.png">
                                        <img src="/Home/images/star1-h.png">
                                        <img src="/Home/images/star1-h.png">
                                    </p>
                                    @endif
                            </div>
                        </a>
                    </div>
                    @endforeach
                </div>
                <div class="swiper-slide">
                    @foreach($SoftwareMobile['mobile8'] as $mobile8)
                    <div class="big">
                        <a href="/SoftwareInfo/{{$mobile8->id}}.html">
                            <div class="title">{{$mobile8->softwarename}}</div>
                            <div class="nr">
                                {{$mobile8->description}}
                            </div>
                            <div class="shang">
                                <p>资源大小：{{$mobile8->software_size}}</p>
                                @if($mobile8->comment >= 5)
                                    <p>
                                        <img src="/Home/images/star1.png">
                                        <img src="/Home/images/star1.png">
                                        <img src="/Home/images/star1.png">
                                        <img src="/Home/images/star1.png">
                                        <img src="/Home/images/star1.png">
                                    </p>
                                    @elseif($mobile8->comment >= 4)
                                    <p>
                                        <img src="/Home/images/star1.png">
                                        <img src="/Home/images/star1.png">
                                        <img src="/Home/images/star1.png">
                                        <img src="/Home/images/star1.png">
                                        <img src="/Home/images/star1-h.png">
                                    </p>
                                    @elseif($mobile8->comment >= 3)
                                    <p>
                                        <img src="/Home/images/star1.png">
                                        <img src="/Home/images/star1.png">
                                        <img src="/Home/images/star1.png">
                                        <img src="/Home/images/star1-h.png">
                                        <img src="/Home/images/star1-h.png">
                                    </p>
                                    @elseif($mobile8->comment >= 2)
                                    <p>
                                        <img src="/Home/images/star1.png">
                                        <img src="/Home/images/star1.png">
                                        <img src="/Home/images/star1-h.png">
                                        <img src="/Home/images/star1-h.png">
                                        <img src="/Home/images/star1-h.png">
                                    </p>
                                    @elseif($mobile8->comment >= 1)
                                    <p>
                                        <img src="/Home/images/star1.png">
                                        <img src="/Home/images/star1-h.png">
                                        <img src="/Home/images/star1-h.png">
                                        <img src="/Home/images/star1-h.png">
                                        <img src="/Home/images/star1-h.png">
                                    </p>
                                    @else
                                    <p>
                                        <img src="/Home/images/star1-h.png">
                                        <img src="/Home/images/star1-h.png">
                                        <img src="/Home/images/star1-h.png">
                                        <img src="/Home/images/star1-h.png">
                                        <img src="/Home/images/star1-h.png">
                                    </p>
                                    @endif
                            </div>
                        </a>
                    </div>
                    @endforeach
                </div>
            </div>
        </div>
         <div class="swiper-button-prev"></div>
        <div class="swiper-button-next"></div>
        <div class="fixed-guang">
            <p>赞助推荐</p>
        </div>
    </div>
</div>
<!--广告位-->

<!--最新上线-->
<div class="new">
    <div class="container">
        <div class="top">
            {{$CatyNav->caty_name}} 
			<span class="radiochecked" data-id="{{$CatyNav->id}}">
				<input type="radio" name="radio" value="1" checked="checked" id="NEWSLIST"> 最新 &nbsp;&nbsp;&nbsp;&nbsp;
				<input type="radio" id="HOTLIST" name="radio" value="2"> 最热
				<a href="/SoftwareList/{{$CatyNav->id}}.html">全部</a>
				<a class="fufei" href="/SoftwareList/{{$CatyNav->id}}.html?charge=0&hot=1">付费</a>
				<a class="mianfei" href="/SoftwareList/{{$CatyNav->id}}.html?charge=1&hot=1">免费</a>
			</span>
        </div>

        <div class="content">
            <div class="con-con">
                <ul class="active">
                    @foreach($SoftwareList as $SList)
                    <li>
                        <a href="/SoftwareInfo/{{$SList->id}}.html"><img src="{{$SList->cover}}"></a>
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
                                <a href="javascript:;">下载次数：{{$SList->count}}</a>
                                <a href="/SoftwareInfo/{{$SList->id}}.html">点击查看详情</a>
                            </div>
                        </div>
                    </li>
                    @endforeach
                </ul>
            </div>
            @if (!is_array($SoftwareList))
                @if(empty($ListPage['charge']) || empty($ListPage['hot']))
                    {{ $SoftwareList->links() }}
                @else
                 {{ $SoftwareList->appends(['charge' => $ListPage['charge'],'hot'=>$ListPage['hot']])->links() }}
                @endif
            @else

            @endif
           
        </div>
    </div>
</div>
<!--最新上线-->


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
                        <a href="/SoftwareInfo/{{$Recommended->id}}.html">
                        <img src="{{$Recommended->cover}}">
                        </a>
                        <div class="nr">
                            <div class="nr-left">
                                <div class="nr-top">{{$Recommended->softwarename}} @if($Recommended->charge == 1)<span>免费</span>@else<span class="hot">付费</span>@endif</div>
                                <div class="nr-con">{{$Recommended->description}}</div>
                                <div class="nr-biao">
                                    <p>上传时间：<?= substr($Recommended->created_at,0,10) ?></p>
                                    <p>上传者：<?= substr($Recommended->nickname,0,8) ?></p>
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
    var hotUrl = getQueryString('hot');
    if (hotUrl != null) {
        if (hotUrl == 1) {
            $('#NEWSLIST').attr('checked','checked');
        }else{
            $('#HOTLIST').attr('checked','checked');
        }
    }else{
        $('#NEWSLIST').attr('checked','checked');
    }
    $('.radiochecked').click(function(){
        var hot = $('input[name="radio"]:checked').val();
        var id = $(this).attr('data-id');
        if (hot == 1) {
            $('.fufei').attr('href','/SoftwareList/'+id+'.html?charge=0&hot=1');
            $('.mianfei').attr('href','/SoftwareList/'+id+'.html?charge=1&hot=1');
        }else{
            $('.fufei').attr('href','/SoftwareList/'+id+'.html?charge=0&hot=2');
            $('.mianfei').attr('href','/SoftwareList/'+id+'.html?charge=1&hot=2');
        }
    })
    $(function(){
        $(".guang .swiper-slide a").mouseover(function(){
            $(this).css({"background":"linear-gradient(#576a1d,#8d983b)","transition":"all 1s"});
        }).mouseout(function(){
            $(this).css({"background":"rgba(203,50,50,0)","transition":"all 1s"});
        });
    });


    function getQueryString(name) {
    var reg = new RegExp('(^|&)' + name + '=([^&]*)(&|$)', 'i');
        var r = window.location.search.substr(1).match(reg);
        if (r != null) {
            return unescape(r[2]);
        }
        return null;
    }


    var mySwiper = new Swiper ('.swiper-container', {
        autoplay:true,
        loop: true,
        navigation: {
            nextEl: '.swiper-button-next',
            prevEl: '.swiper-button-prev'
        }
    });
    var conwidth = $(window).width();
    if(conwidth < 768){
        var mySwiper = new Swiper ('.swiper-container', {
            autoplay:true,
            loop: true,
            navigation: {
                nextEl: '.swiper-button-next',
                prevEl: '.swiper-button-prev'
            }
        });
    }
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
                    
                    if(obj.nickname.length>8){
						var str3 = '<div class="nr-con">'+obj.description+'</div><div class="nr-biao"><p>上传时间：'+obj.created_at.substring(0,10)+'</p><p>上传者：'+obj.nickname.substring(0,8)+'</p>'
						//var str3 = '<div class="nr-con">'+obj.description.substring(0,24)+'...</div><div class="nr-biao"><p>上传时间：'+obj.created_at.substring(0,10)+'</p><p>上传者：'+obj.nickname.substring(0,8)+'</p>'
					}else{
						var str3 = '<div class="nr-con">'+obj.description+'</div><div class="nr-biao"><p>上传时间：'+obj.created_at.substring(0,10)+'</p><p>上传者：'+obj.nickname+'</p>'
					}
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