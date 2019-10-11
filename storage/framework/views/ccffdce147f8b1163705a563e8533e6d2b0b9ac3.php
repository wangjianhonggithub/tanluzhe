<!DOCTYPE html>
<html lang="en" style="font-size: 625%;">
<head>
    <meta charset="UTF-8">
    <title>探路者网络--开发人员认证</title>
    <meta content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0;" name="viewport" />
    <link rel="stylesheet" href="/Home/css/bootstrap.min.css">
    <link rel="stylesheet" href="/Home/css/apply.css">
    <link rel="stylesheet" href="/Home/css/header.css">
    <link rel="stylesheet" href="/Home/css/footer.css">
    <link rel="stylesheet" href="/Home/css/personal-left.css">
    <script src="/Home/js/include.js"></script>
</head>
<body>

<?php echo $__env->make('Home.Public.header', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>

<div class="content">
    <div class="container">
        <?php echo $__env->make('Home.Public.CenterLeft', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
        <div class="right">
            <div class="top">
                <img src="/Home/images/icon(7).png">
                <span>开发人员认证</span>
            </div>
            <strong class="col-md-6 col-md-offset-3" style='font-weight: normal; color:green;min-height: 0;font-size: 14px; background: rgba(255,255,255,0.8)'><?php echo e(Session::get('info')); ?></strong>
            <div class="con-con">
                <p class="title">请选择其中的一种身份上传，至少一种</p>
                <form action="/DoAppCert" method="post" enctype="multipart/form-data">
                    <div class="lab">
                        <span>个人开发人员认证：</span>
                        <div class="section con-right">
                            <div class="article">
                                <div class="item">
                                    <img class="icon addImg" onclick="clickImg(this);" src="/Home/images/shen.jpg" />
                                    <input name="id_card" type="file" class="upload_input" onchange="change(this)"/>
                                    <div class="preBlock">
                                        <img class="preview" alt="" name="pic" width="275" height="150" />
                                    </div>
                                    <img class="delete" onclick="deleteImg(this)" src="/Home/images/delete.png"/>
                                </div>
                            </div>
                        </div>
                        <div class="cl"></div>
                        <div class="zhu">（个人开发人员认证请上传本人手持身份证照片，照片清晰，能辨识本人及证件详情）</div>
                    </div>
                    <?php echo e(csrf_field()); ?>

                    <div class="lab">
                        <span>企业开发人员认证：</span>
                        <div class="section con-right">
                            <div class="article">
                                <div class="item">
                                    <img class="icon addImg" onclick="clickImg(this);" src="/Home/images/fen.jpg" />
                                    <input name="license" type="file" class="upload_input" onchange="change(this)"/>
                                    <div class="preBlock">
                                        <img class="preview" alt="" name="pic" width="275" height="150" />
                                    </div>
                                    <img class="delete" onclick="deleteImg(this)" src="/Home/images/delete.png"/>
                                </div>
                            </div>
                        </div>
                        <div class="cl"></div>
                        <div class="zhu">（企业开发人员认证请上传企业营业执照，照片清晰，能清楚辨识证件详情）</div>
                    </div>
                    <input type="submit" value="提交" class="tijiao">
                </form>
            </div>
        </div>
    </div>
</div>

<?php echo $__env->make('Home.Public.footer', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>

<script src="/Home/js/jquery-3.2.1.min.js"></script>
<script src="/Home/js/bootstrap.min.js"></script>
<script src="/Home/js/public.js"></script>
<script type="text/javascript">
    //点击
    var clickImg = function(obj){
        $(obj).parent().find('.upload_input').click();
    };
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