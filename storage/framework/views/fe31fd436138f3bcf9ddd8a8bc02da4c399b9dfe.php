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
<?php echo $__env->make('Home.Public.header', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
<!--banner-->
<div class="banner">
    <div class="container">
        <div id="carousel-example-generic" class="carousel slide banner-left" data-ride="carousel">
            <!-- Indicators -->

            <ol class="carousel-indicators">
                <?php foreach($BannerOne as $ok =>$oy){ ?>
                <li data-target="#carousel-example-generic" data-slide-to="<?php echo e($ok); ?>"></li>
                <?php } ?>
            </ol>

            <!-- Wrapper for slides -->
            
            <div class="carousel-inner" role="listbox">
                <?php $__currentLoopData = $BannerOne; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $ov): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <div class="item" style='height: 400px'>
                    <a style='height: 400px;display: block;' href="<?php echo e($ov->url); ?>">
                       <img style='height: 400px;display: block;' src="<?php echo e($ov->banner_img); ?>">
                    </a>
                </div>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </div>
            
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
                <li data-target="#carousel-example-generic1" data-slide-to="<?php echo e($tk); ?>"></li>
                <?php } ?>
            </ol>

            <!-- Wrapper for slides -->
            
            <div class="carousel-inner" role="listbox">
                 <?php $__currentLoopData = $BannerTwo; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $tk => $tv): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <div class="item">
                    <a href="<?php echo e($tv->url); ?>">
                       <img src="<?php echo e($tv->banner_img); ?>">
                    </a>
                </div>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </div>
            
             <a class="left carousel-control" href="#carousel-example-generic1" role="button" data-slide="prev">
                <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
                <span class="sr-only">Previous</span>
            </a>
            <a class="right carousel-control" href="#carousel-example-generic1" role="button" data-slide="next">
                <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
                <span class="sr-only">Next</span>
            </a>
        </div>
    </div>
</div>
<!--banner-->

<!--广告位-->
<div class="advertising">
    <div class="container">
        
        <div class="banner-left">
            <div class="img-div">
                <?php if(isset($AdvImage[1])): ?>
                <a href="<?php echo e($AdvImage[1]->billboards_url? $AdvImage[1]->billboards_url : $AdvImage[1]->billboards_default_url); ?>">
                   <img src="<?php echo e($AdvImage[1]->billboards_pic? $AdvImage[1]->billboards_pic : $AdvImage[1]->billboards_default_pic); ?>">
                </a>
                <?php endif; ?>
            </div>
            <div class="img-div">
                <?php if(isset($AdvImage[2])): ?>
                <a href="<?php echo e($AdvImage[2]->billboards_url? $AdvImage[2]->billboards_url : $AdvImage[2]->billboards_default_url); ?>">
                   <img src="<?php echo e($AdvImage[2]->billboards_pic? $AdvImage[2]->billboards_pic : $AdvImage[2]->billboards_default_pic); ?>">
                </a>
                <?php endif; ?>
            </div>
        </div>
        
        
        <div class="banner-right">
            <div id="carousel-example-generic2" class="carousel slide" data-ride="carousel">
                <ol class="carousel-indicators">
                    <?php foreach($BannerOne as $ok =>$oy){ ?>
                    <li data-target="#carousel-example-generic5" data-slide-to="<?php echo e($ok); ?>"></li>
                    <?php } ?>
                </ol>
                <div class="carousel-inner" role="listbox">
                    <?php $__currentLoopData = $BannerThree; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $sv): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <div class="item">
                        <a href="javascript:;">
                            <img src="<?php echo e($sv->banner_img); ?>">
                            <div class="carousel-caption">
                                <p><?php echo e($sv->title); ?></p>
                                <p><?php echo e($sv->description); ?></p>
                            </div>
                        </a>
                    </div>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </div>
               <a class="left carousel-control" href="#carousel-example-generic2" role="button" data-slide="prev">
                    <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"><img src="/Home/images/left-g.png" alt=""></span>
                    <span class="sr-only">Previous</span>
                </a>
                <a class="right carousel-control" href="#carousel-example-generic2" role="button" data-slide="next">
                    <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"><img src="/Home/images/right-g.png" alt=""></span>
                    <span class="sr-only">Next</span>
                </a>
            </div>
        </div>
        
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
                    <?php $__currentLoopData = $CatyInd; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $CatyInds): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <li data-id='<?php echo e($CatyInds->id); ?>' class="CatyNavNew"><a href="javascript:;"><?php echo e($CatyInds->caty_name); ?></a></li>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </ul>
            </div>
            <div class="con-con">
                <ul class="active UpNew">
                    <?php $__currentLoopData = $Software; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $SList): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <li>
                        <a href="/SoftwareInfo/<?php echo e($SList->id); ?>.html">
                           <img src="<?php echo e($SList->cover); ?>">
                        </a>
                        <div class="nr">
                            <div class="nr-left">
                                <div class="nr-top"><?php echo e($SList->softwarename); ?><?php if($SList->charge == 1): ?><span>免费</span><?php else: ?><span class="hot">付费</span><?php endif; ?></div>
                                <div class="nr-con"><?php echo e($SList->description); ?></div>
                                <div class="nr-biao">
                                    <p>上传时间：<?= substr($SList->created_at,0,10) ?></p>
                                    <p>上传者：<?php echo e($SList->nickname); ?></p>
                                    <?php if($SList->comment >= 5): ?>
                                    <p><img src="/Home/images/star.png"><img src="/Home/images/star.png"><img src="/Home/images/star.png"><img src="/Home/images/star.png"><img src="/Home/images/star.png"></p>
                                    <?php elseif($SList->comment >= 4): ?>
                                    <p><img src="/Home/images/star.png"><img src="/Home/images/star.png"><img src="/Home/images/star.png"><img src="/Home/images/star.png"><img src="/Home/images/star-h.png"></p>
                                    <?php elseif($SList->comment >= 3): ?>
                                    <p><img src="/Home/images/star.png"><img src="/Home/images/star.png"><img src="/Home/images/star.png"><img src="/Home/images/star-h.png"><img src="/Home/images/star-h.png"></p>
                                    <?php elseif($SList->comment >= 2): ?>
                                    <p><img src="/Home/images/star.png"><img src="/Home/images/star.png"><img src="/Home/images/star-h.png"><img src="/Home/images/star-h.png"><img src="/Home/images/star-h.png"></p>
                                    <?php elseif($SList->comment >= 1): ?>
                                    <p><img src="/Home/images/star.png"><img src="/Home/images/star-h.png"><img src="/Home/images/star-h.png"><img src="/Home/images/star-h.png"><img src="/Home/images/star-h.png"></p>
                                    <?php else: ?>
                                    <p><img src="/Home/images/star-h.png"><img src="/Home/images/star-h.png"><img src="/Home/images/star-h.png"><img src="/Home/images/star-h.png"><img src="/Home/images/star-h.png"></p>
                                    <?php endif; ?>
                                    <p>软件大小:<?php echo e($SList->software_size); ?></p>
                                </div>
                            </div>
                            <div class="nr-right">
                                <a href="javascript:;">下载次数:<?php echo e($SList->count); ?></a>
                                <a href="/SoftwareInfo/<?php echo e($SList->id); ?>.html">点击查看详情</a>
                            </div>
                        </div>
                    </li>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </ul>
            </div>
            <div class="more">
                <a id="softwareAll" href="/SoftwareList/<?php echo e($CatyInd[0]->id); ?>.html"><img src="/Home/images/more.png">点击查看全部</a>
            </div>
        </div>
    </div>
</div>
<!--最新上线-->

<!--中间广告位-->
<div class="guang">
    <div class="container">
        <a href="javascript:;">
            
            <?php if(isset($AdvImage[3])): ?>
            <img src="<?php echo e($AdvImage[3]->billboards_pic? $AdvImage[3]->billboards_pic : $AdvImage[3]->billboards_default_pic); ?>">
            <?php endif; ?>
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
                    <?php $__currentLoopData = $CatyInd; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $CatyIndsh): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <li data-id='<?php echo e($CatyIndsh->id); ?>' class="DownHotCaty"><a href="javascript:;"><?php echo e($CatyIndsh->caty_name); ?></a></li>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </ul>
            </div>
            
            <div class="con-con">
                <ul class="active DownHot">
                    <?php $__currentLoopData = $SoftwareHotDown; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $down): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <li>
                        <a href="/SoftwareInfo/<?php echo e($down->id); ?>.html">
                           <img src="<?php echo e($down->cover); ?>">
                        </a>
                        <div class="nr">
                            <div class="nr-left">
                                <div class="nr-top"><?php echo e($down->softwarename); ?><?php if($down->charge == 1): ?><span>免费</span><?php else: ?><span class="hot">付费</span><?php endif; ?></div>
                                <div class="nr-con"><?php echo e($down->description); ?></div>
                                <div class="nr-biao">
                                    <p>上传时间：<?= substr($down->created_at,0,10) ?></p>
                                    <p>上传者：<?= substr($down->nickname,0,8) ?></p>
                                    <?php if($down->comment >= 5): ?>
                                    <p><img src="/Home/images/star.png"><img src="/Home/images/star.png"><img src="/Home/images/star.png"><img src="/Home/images/star.png"><img src="/Home/images/star.png"></p>
                                    <?php elseif($down->comment >= 4): ?>
                                    <p><img src="/Home/images/star.png"><img src="/Home/images/star.png"><img src="/Home/images/star.png"><img src="/Home/images/star.png"><img src="/Home/images/star-h.png"></p>
                                    <?php elseif($down->comment >= 3): ?>
                                    <p><img src="/Home/images/star.png"><img src="/Home/images/star.png"><img src="/Home/images/star.png"><img src="/Home/images/star-h.png"><img src="/Home/images/star-h.png"></p>
                                    <?php elseif($down->comment >= 2): ?>
                                    <p><img src="/Home/images/star.png"><img src="/Home/images/star.png"><img src="/Home/images/star-h.png"><img src="/Home/images/star-h.png"><img src="/Home/images/star-h.png"></p>
                                    <?php elseif($down->comment >= 1): ?>
                                    <p><img src="/Home/images/star.png"><img src="/Home/images/star-h.png"><img src="/Home/images/star-h.png"><img src="/Home/images/star-h.png"><img src="/Home/images/star-h.png"></p>
                                    <?php else: ?>
                                    <p><img src="/Home/images/star-h.png"><img src="/Home/images/star-h.png"><img src="/Home/images/star-h.png"><img src="/Home/images/star-h.png"><img src="/Home/images/star-h.png"></p>
                                    <?php endif; ?>
                                </div>
                                <div class="nr-biao">
                                    <p>软件大小：<?php echo e($down->software_size); ?></p>
                                    <p>下载次数：<?php echo e($down->count); ?></p>
                                    <p><a href="/SoftwareInfo/<?php echo e($down->id); ?>.html">查看详情</a></p>
                                </div>
                            </div>
                        </div>
                    </li>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </ul>
            </div>
            
        </div>
    </div>
</div>
<!--最热下载-->


<?php echo $__env->make('Home.Public.footer', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>

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
						
						if(obj.description.length>26){
							var str3 = '<div class="nr-con">'+obj.description.substring(0,24)+'...</div><div class="nr-biao"><p>上传时间：'+obj.created_at.substring(0,10)+'</p><p>上传者：'+obj.nickname.substring(0,8)+'</p>'
						}else{
							var str3 = '<div class="nr-con">'+obj.description+'</div><div class="nr-biao"><p>上传时间：'+obj.created_at.substring(0,10)+'</p><p>上传者：'+obj.nickname.substring(0,8)+'</p>'
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
                    $('.DownHot').append(strHtml);
                  });
            });
        });
    });
</script>
</body>
</html>