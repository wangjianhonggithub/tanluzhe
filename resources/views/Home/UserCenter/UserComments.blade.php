<!DOCTYPE html>
<html lang="en" style="font-size: 625%;">
<head>
    <meta charset="UTF-8">
    <title>探路者网络--我的评论</title>
    <meta content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0" name="viewport" />
    <link rel="stylesheet" href="/Home/css/bootstrap.min.css">
    <link rel="stylesheet" href="/Home/css/personal-pinglun.css">
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
                <img src="/Home/images/pin.png">
                <span>我的评论</span>
            </div>
            <div class="con-con">
                <ul>
                    @foreach($CommentInfo as $comment)
                    <li>
                        <img src="{{$comment->header_pic}}" class="head">
                        <div class="nr">
                            <div class="title">
                                <p>我评论 <span>{{$comment->softwarename}}</span> 说：</p>
                                <p><?= substr($comment->created_at,0,10)?></p>
                            </div>
                            <div class="nr-con">
                                {{$comment->content}}
                            </div>
                            <div class="con-bottom">
                                <a href="/SoftwareInfo/{{$comment->id}}.html" title="">
                                    <div class="img-left"><img src="{{$comment->cover}}"></div>
                                    <div class="nr-right">
                                        <p>{{$comment->softwarename}}</p>
                                        <p>
                                            {{$comment->description}}
                                        </p>
                                    </div>
                                </a>
                            </div>
                        </div>
                    </li>
                    @endforeach
                </ul>
            </div>
              {{ $CommentInfo->links() }}
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