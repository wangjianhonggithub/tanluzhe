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
                <span>我的广告位（轮播图）</span>
            </div>
            <div class="con-con">
                <ul class="con-wz">
                    <li>
                        <p class="con-title">
                            <!-- 标题   位置  链接  广告图片    订单提交时间 -->
                            <span style='width: 25%;text-align: center;'>位置</span>
                            <span style='width: 25%;text-align: center;'>广告图片</span>
                            <span style='width: 25%;text-align: center;'>链接</span>
                            <!--<span style='width: 25%;text-align: center;'>操作</span>-->
                        </p>
                        @foreach($banList as $banList)
                        <p class="wz-con">
                            
                                <span style='width: 25%;text-align: center;'>{{$banList->description}}</span>
                                <span style='width: 25%;text-align: center;'><img style="width: 60px; height: 60px;" src="{{$banList->banner_img}}"></span>
                                <span style='width: 25%;text-align: center;'>{{$banList->url}}</span>
                            
                            <!--<span style='width: 25%;text-align: center;'>
                                 <a href="/Banner/addMyBanner/{{$banList->id}}">添加广告</a> 
                                <a href="javascript:;" class="MsgDelete" data-id='{{$banList->id}}'>删除广告</a>
                            </span>-->
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
<script>
    $(function(){
        $('.MsgDelete').click(function(){
            var id = $(this).attr('data-id');
            $.ajax({
                type: 'GET',
                url: '/Banner/delMyBanner',
                data: {
                  id:id,
                },
                dataType: 'json',
                success: function(data){
                   if (data.code == 1) {
                        layer.msg(data.meg, function(){
                        });
                        setTimeout(function(){//两秒后跳转  
                         window.location.href='/UserMessage';
                        },2000);  
                        return false;
                    }else{
                        layer.msg(data.meg, function(){
                          //关闭后的操作
                        });
                        return false;
                    }
                },
            });
        })
    })
</script>
</body>
</html>