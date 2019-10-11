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
    <script src="http://static.runoob.com/assets/jquery-validation-1.14.0/lib/jquery.js"></script>
    <script src="http://static.runoob.com/assets/jquery-validation-1.14.0/dist/jquery.validate.min.js"></script>
    <script src="http://static.runoob.com/assets/jquery-validation-1.14.0/dist/localization/messages_zh.js"></script>
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
<script>
    $.validator.setDefaults({
        submitHandler: function() {
            alert("提交事件!");
        }
    });

    $().ready(function() {
// 在键盘按下并释放及提交后验证提交表单
        $("#signupForm").validate({
            rules: {
                title: "required",
                lastname: "required",
            },
            messages: {
                firstname: "标题不能是空的",
                url: "url不能是空的",
            }
        });
    });

</script>
<div class="content">
    <div class="form-group">
        @if (count($errors) > 0)
            <div class="alert alert-danger">
                <ul style="color:red;">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
    </div>
    <div class="container">
        @include('Home.Public.CenterLeft')
        <div class="right">
            <form action="/adv/create" method="post" enctype="multipart/form-data">
                <input type='hidden' name='_token' value='{{ csrf_token() }}'>
                <input type='hidden' name='id' value='{{$id}}'>
                <div class="top">
                    <img src="/Home/images/icon(4).png">
                    <span>添加静态广告位</span>
                </div>
                <div class="con-con">
                    <div class="conitem">
                        <div class="itemleft">标题</div>
                        <label for="title"></label>
                        <input class="itemright" type="text" id="title" disabled="disabled" id="" value="
                        @switch($id)
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

                                " />
                    </div>
                    <div class="conitem">
                        <div class="itemleft">URL</div>
                        <label for="title" id="url "></label>
                        <input class="itemright" id="url" type="text" name="url" id="" value="" />
                    </div>
                    {{--                <div class="conitema">
                            <div class="itemleft">图片展示</div>
                            <img src="" class="rightpic"/>
                        </div>--}}
                    <div class="conitem">
                        <div class="itemleft">上传轮播图</div>
                        <div class="rightfile">
                            <input style="display: block" type="file" name="banner_img" id="" value="" />
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