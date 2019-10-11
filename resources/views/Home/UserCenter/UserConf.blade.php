<!DOCTYPE html>
<html lang="en" style="font-size: 625%;">
<head>
    <meta charset="UTF-8">
    <title>探路者网络--我的设置</title>
    <meta content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0;" name="viewport" />
    <link rel="stylesheet" href="/Home/css/bootstrap.min.css">
    <link rel="stylesheet" href="/Home/css/personal-shezhi.css">
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
                <img src="/Home/images/icon(5).png">
                <span>我的设置</span>
            </div>
            <div class="con-con">
                <ul class="title">
                    <li class="active"><a href="/UserConf">个人资料</a></li>
                    <li><a href="/UserUpdatePasswd">修改密码</a></li>
                </ul>
                @if (count($errors) > 0)
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li style="list-style: none;">{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif
                <ul class="con-wz">
                    <li class="active">

                        <form action="/DoUserConf" method="post" enctype="multipart/form-data">
                            <div class="lab">
                                <span>头像</span>
                                <div class="section con-right">
                                    <div class="article">
                                        <div class="item">
                                            <img class="icon addImg" onclick="clickImg(this);" src="{{$User->header_pic}}" />
                                            <input name="header_pic" type="file" class="upload_input" onchange="change(this)"/>
                                            <div class="preBlock">
                                                <img class="preview" alt="" name="pic" width="100" height="100" />
                                            </div>
                                            <img class="delete" onclick="deleteImg(this)" src="/Home/images/delete.png"/>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <input type="hidden" name="id" value="{{$User->id}}">
                            <label class="lab">
                                <span>昵称</span>
                                <input type="text" name="nickname" value="{{$User->nickname}}" class="inp">
                            </label>
                            <label class="lab">
                                <span>手机号</span>
                                <input type="text" name="mobile" value="{{$User->mobile}}" class="inp" maxlength="11">
                            </label>
                            <label class="lab">
                                <span>邮箱</span>
                                <input type="text" name="email" value="{{$User->email}}" class="inp">
                            </label>
                            <label class="lab">
                                <span>密保问题</span>
                                <select class="inp" name="encrypted">
                                    @foreach($Enc as $EncInfo)
                                    <option value="{{$EncInfo->id}}" @if($EncInfo->id == $User->encrypted) selected @endif>{{$EncInfo->encry}}</option>
                                    @endforeach
                                </select>
                            </label>
                            {{ csrf_field() }} 
                            <label class="lab">
                                <span>答案</span>
                                <input type="text" name="answer" value="{{$User->answer}}" class="inp">
                            </label>
                            <input type="submit" value="保存" class="tijiao">
                        </form>
                    </li>
                    <li>

                    </li>
                </ul>
            </div>
        </div>
    </div>
</div>

@include('Home.Public.footer')

<script src="/Home/js/jquery-3.2.1.min.js"></script>
<script src="/Home/js/bootstrap.min.js"></script>
<script src="/Home/js/public.js"></script>
<script type="text/javascript">
    //点击
    var clickImg = function(obj){
        $(obj).parent().find('.upload_input').click();
    }
    //删除
    var deleteImg = function(obj){
        $(obj).parent().find('input').val('');
        $(obj).parent().find('img.preview').attr("src","");
        //IE9以下
        $(obj).parent().find('img.preview').css("filter","");
        $(obj).hide();
        $(obj).parent().find('.addImg').show();
    };
    //选择图片
    function change(file) {
        //预览
        var pic = $(file).parent().find(".preview");
        //添加按钮
        var addImg = $(file).parent().find(".addImg");
        //删除按钮
        var deleteImg = $(file).parent().find(".delete");

        var ext=file.value.substring(file.value.lastIndexOf(".")+1).toLowerCase();

        // gif在IE浏览器暂时无法显示
        if(ext!='png'&&ext!='jpg'&&ext!='jpeg'){
            if (ext != '') {
                alert("图片的格式必须为png或者jpg或者jpeg格式！");
            }
            return;
        }
        //判断IE版本
        var isIE = navigator.userAgent.match(/MSIE/)!= null,
                isIE6 = navigator.userAgent.match(/MSIE 6.0/)!= null;
        isIE10 = navigator.userAgent.match(/MSIE 10.0/)!= null;
        if(isIE && !isIE10) {
            file.select();
            var reallocalpath = document.selection.createRange().text;
            // IE6浏览器设置img的src为本地路径可以直接显示图片
            if (isIE6) {
                pic.attr("src",reallocalpath);
            }else{
                // 非IE6版本的IE由于安全问题直接设置img的src无法显示本地图片，但是可以通过滤镜来实现
                pic.css("filter","progid:DXImageTransform.Microsoft.AlphaImageLoader(sizingMethod='scale',src=\"" + reallocalpath + "\")");
                // 设置img的src为base64编码的透明图片 取消显示浏览器默认图片
                pic.attr('src','data:image/gif;base64,R0lGODlhAQABAIAAAP///wAAACH5BAEAAAAALAAAAAABAAEAAAICRAEAOw==');
            }
            addImg.hide();
            deleteImg.show();
        }else {
            html5Reader(file,pic,addImg,deleteImg);
        }
    }
    //H5渲染
    function html5Reader(file,pic,addImg,deleteImg){
        var file = file.files[0];
        var reader = new FileReader();
        reader.readAsDataURL(file);
        reader.onload = function(e){
            pic.attr("src",this.result);
        };
        addImg.hide();
        deleteImg.show();
    }
</script>
</body>
</html>