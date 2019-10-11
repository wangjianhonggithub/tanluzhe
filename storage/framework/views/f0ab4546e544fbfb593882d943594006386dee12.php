<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" style="font-size: 625%;">
    <title>探路者网络--详情页</title>
    <meta content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0" name="viewport" />
    <link rel="stylesheet" href="/Home/css/bootstrap.min.css">
    <link rel="stylesheet" href="/Home/css/details.css">
    <link rel="stylesheet" href="/Home/css/footer.css">
    <link rel="stylesheet" href="/Home/css/header.css">
    <style>
        .bdshare-button-style0-24 a, .bdshare-button-style0-24 .bds_more {
            float: none !important;
            font-size: 0.14rem !important;
            margin:0 !important;
            height: 0.35rem!important;
        }
        .bd_weixin_popup {
            width: 2.67rem !important;
            height: 3.1rem !important;
        }
    </style>
    <script src="/Home/js/include.js"></script>
</head>
<body>

<?php echo $__env->make('Home.Public.header', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>

<!--banner-->
<div class="banner">
    <div class="container">
        <div id="carousel-example-generic" class="carousel slide" data-ride="carousel">
            <!-- Indicators -->
            <ol class="carousel-indicators">
                <?php foreach($SoftwareBanner as $Zk =>$Zv){ ?>
                <li data-target="#carousel-example-generic" data-slide-to="<?php echo e($Zk); ?>"></li>
                <?php } ?>
            </ol>

            <!-- Wrapper for slides -->
            <div class="carousel-inner" role="listbox">
                <?php $__currentLoopData = $SoftwareBanner; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $SoV): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <div class="item" style="height: 400px;">
                    <img style='display: block;width: 100%;height: 100%' src="<?php echo e($SoV->banner_img); ?>">
                </div>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </div>
            <a class="left carousel-control" href="#carousel-example-generic" role="button" data-slide="prev">
                    <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"><img src="/Home/images/left-g.png" alt=""></span>
                </a>
                <a class="right carousel-control" href="#carousel-example-generic" role="button" data-slide="next">
                    <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"><img src="/Home/images/right-g.png" alt=""></span>
                </a>
        </div>
        <div class="guang">
            <ul>
                <li><a href="<?php echo e($AdvImage[21]->billboards_url? $AdvImage[21]->billboards_url : $AdvImage[21]->billboards_default_pic); ?>"><img src="<?php echo e($AdvImage[21]->billboards_pic? $AdvImage[21]->billboards_pic : $AdvImage[21]->billboards_default_pic); ?>"></a></li>
                <li><a href="<?php echo e($AdvImage[22]->billboards_url? $AdvImage[22]->billboards_url : $AdvImage[22]->billboards_default_pic); ?>"><img src="<?php echo e($AdvImage[22]->billboards_pic? $AdvImage[22]->billboards_pic : $AdvImage[22]->billboards_default_pic); ?>"></a></li>
                <li><a href="<?php echo e($AdvImage[23]->billboards_url? $AdvImage[23]->billboards_url : $AdvImage[23]->billboards_default_pic); ?>"><img src="<?php echo e($AdvImage[23]->billboards_pic? $AdvImage[23]->billboards_pic : $AdvImage[23]->billboards_default_pic); ?>"></a></li>
                <li><a href="<?php echo e($AdvImage[25]->billboards_url? $AdvImage[25]->billboards_url : $AdvImage[25]->billboards_default_pic); ?>"><img src="<?php echo e($AdvImage[25]->billboards_pic? $AdvImage[25]->billboards_pic : $AdvImage[25]->billboards_default_pic); ?>"></a></li>
            </ul>
        </div>
		
    </div>
</div>
<!--banner-->

<!--软件详情-->
<div class="details">
    <div class="container">
        <div class="top">
            当前位置：<?php echo e($SoftwareInfo->caty_name); ?> > <?php echo e($SoftwareInfo->softwarename); ?>

        </div>
        <div class="content">
            <div class="con-top">
                <img src="<?php echo e($SoftwareInfo->cover); ?>" class="img-top">
                <div class="con-nr">
                    <div class="title"><?php echo e($SoftwareInfo->softwarename); ?></div>
                    <div class="fen">
                        <span>
                            评分：
                            <?php if($SoftwareInfo->comment >= 5): ?>
                            <img src="/Home/images/star.png"><img src="/Home/images/star.png"><img src="/Home/images/star.png"><img src="/Home/images/star.png"><img src="/Home/images/star.png">
                            <?php elseif($SoftwareInfo->comment >= 4): ?>
                            <img src="/Home/images/star.png"><img src="/Home/images/star.png"><img src="/Home/images/star.png"><img src="/Home/images/star.png"><img src="/Home/images/star-h.png">
                            <?php elseif($SoftwareInfo->comment >= 3): ?>
                            <img src="/Home/images/star.png"><img src="/Home/images/star.png"><img src="/Home/images/star.png"><img src="/Home/images/star-h.png"><img src="/Home/images/star-h.png">
                            <?php elseif($SoftwareInfo->comment >= 2): ?>
                            <img src="/Home/images/star.png"><img src="/Home/images/star.png"><img src="/Home/images/star-h.png"><img src="/Home/images/star-h.png"><img src="/Home/images/star-h.png">
                            <?php elseif($SoftwareInfo->comment >= 1): ?>
                            <img src="/Home/images/star.png"><img src="/Home/images/star-h.png"><img src="/Home/images/star-h.png"><img src="/Home/images/star-h.png"><img src="/Home/images/star-h.png">
                            <?php else: ?>
                            <img src="/Home/images/star-h.png"><img src="/Home/images/star-h.png"><img src="/Home/images/star-h.png"><img src="/Home/images/star-h.png"><img src="/Home/images/star-h.png">
                            <?php endif; ?>
                        </span>
                        <span>
                            上传时间:<?php echo e($SoftwareInfo->created_at); ?>

                        </span>
                        <span>文件大小:<?php echo e($SoftwareInfo->software_size); ?></span>
                        <span>适用平台/系统:<?php echo e($SoftwareInfo->platform); ?></span>
                    </div>
                    <div class="wz">
                        <?php echo e($SoftwareInfo->description); ?>

                    </div>
                </div>
            </div>
            <div class="jie">
                <div id="carousel-example-generic1" class="carousel slide" data-ride="carousel">
                    <!-- Indicators -->
                    <!-- Wrapper for slides -->
                    <div class="carousel-inner" role="listbox">
                        <?php if($SoftwareInfo->EffectOne != ''): ?>
                        <div class="item">
                            <img src="<?php echo e($SoftwareInfo->EffectOne); ?>">
                        </div>
                        <?php endif; ?>
                        <?php if($SoftwareInfo->EffectTwo != ''): ?>
                        <div class="item">
                            <img src="<?php echo e($SoftwareInfo->EffectTwo); ?>">
                        </div>
                        <?php endif; ?>
                        <?php if($SoftwareInfo->EffectThree != ''): ?>
                        <div class="item">
                            <img src="<?php echo e($SoftwareInfo->EffectThree); ?>">
                        </div>
                        <?php endif; ?>
                        <?php if($SoftwareInfo->EffectFour != ''): ?>
                        <div class="item">
                            <img src="<?php echo e($SoftwareInfo->EffectFour); ?>">
                        </div>
                        <?php endif; ?>
                    </div>
                    <!-- Controls -->
                    <a class="left carousel-control" href="#carousel-example-generic1" role="button" data-slide="prev">
                        <span class="glyphicon glyphicon-chevron-left1" aria-hidden="true"><img src="/Home/images/left-g.png" alt=""></span>
                    </a>
                    <a class="right carousel-control" href="#carousel-example-generic1" role="button" data-slide="next">
                        <span class="glyphicon glyphicon-chevron-right1" aria-hidden="true"><img src="/Home/images/right-g.png" alt=""></span>
                    </a>
                </div>
            </div>
            <div class="con-bottom bdsharebuttonbox">
                <span>下载次数：<?php echo e($SoftwareInfo->count); ?>次</span>
                <span><a href="javascript:;" style="background: none"><img src="/Home/images/pin.png">评论</a></span>
                 <span class="dnfjn">
                    <span class="gb_res_t"><span>分享到: </span><i></i></span>
                    <span class="spa"><a title="分享到微信" href="#" class="ast bds_weixin" data-cmd="weixin" ></a> 微信好友 </span>
                    <span class="spa"><a title="分享到QQ好友" href="#" class="ast bds_sqq" data-cmd="sqq" ></a> QQ好友 </span>
                    <span class="spa"><a title="分享到QQ空间" href="#" class="ast bds_qzone" data-cmd="qzone" ></a> QQ空间 </span>
                    <span class="spa"><a title="分享到新浪微博" href="#" class="ast bds_tsina" data-cmd="tsina" ></a> 新浪微博 </span>
                </span>
                <a href="/UserDownLoad/<?php echo e($SoftwareInfo->id); ?>.py" id="DownloadNow" data-id="<?php echo e($SoftwareInfo->id); ?>" class="clicktop" style="background: none">立即下载</a>
            </div>
        </div>
    </div>
</div>
<!--软件详情-->

<!--评论-->
<div class="comments">
    <div class="container">
        <div class="pinjia">
            <p class="top">用户评价（<?php echo e($UserCommentCount); ?>）</p>
            <ul>
                <?php $__currentLoopData = $UserCommentInfo; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $CommentInfo): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <li>
                    <img src="<?php echo e($CommentInfo->header_pic); ?>" class="img-top">
                    <div class="li-right">
                        <p>
                            <span><?php echo e($CommentInfo->nickname); ?></span>
                            <span><?php echo e($CommentInfo->created_at); ?></span>
                        <span>
                            <?php if($CommentInfo->star == 5): ?>
                            <img src="/Home/images/star.png">
                            <img src="/Home/images/star.png">
                            <img src="/Home/images/star.png">
                            <img src="/Home/images/star.png">
                            <img src="/Home/images/star.png">
                            <?php elseif($CommentInfo->star == 4): ?>
                            <img src="/Home/images/star.png">
                            <img src="/Home/images/star.png">
                            <img src="/Home/images/star.png">
                            <img src="/Home/images/star.png">
                            <img src="/Home/images/star-h.png">
                            <?php elseif($CommentInfo->star == 3): ?>
                            <img src="/Home/images/star.png">
                            <img src="/Home/images/star.png">
                            <img src="/Home/images/star.png">
                            <img src="/Home/images/star-h.png">
                            <img src="/Home/images/star-h.png">
                            <?php elseif($CommentInfo->star == 2): ?>
                            <img src="/Home/images/star.png">
                            <img src="/Home/images/star.png">
                            <img src="/Home/images/star-h.png">
                            <img src="/Home/images/star-h.png">
                            <img src="/Home/images/star-h.png">
                            <?php elseif($CommentInfo->star == 1): ?>
                            <img src="/Home/images/star.png">
                            <img src="/Home/images/star-h.png">
                            <img src="/Home/images/star-h.png">
                            <img src="/Home/images/star-h.png">
                            <img src="/Home/images/star-h.png">
                            <?php else: ?>
                            
                            <?php endif; ?>

                        </span>
                        </p>
                        <p>
                            <?php echo e($CommentInfo->content); ?>

                        </p>
                    </div>
                </li>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </ul>

        </div>
        <?php echo e($UserCommentInfo->links()); ?>

        <!--未登录时-->
        <?php if(empty(Cookie::get('UserId'))){?>
        <div class="w-denglu">
            登录后才可以评价……
        </div>
        <?php }else{ ?>
        <!--登录后-->
        <strong class="col-md-4 col-md-offset-4" style='font-weight: normal; color:green;min-height: 0;font-size: 18px; background: rgba(255,255,255,0.8)'><?php echo e(Session::get('info')); ?></strong>
        <div class="denglu">
            <form action="/AddUserComments" method="post">
                <?php echo e(csrf_field()); ?>

                <textarea rows="8" name="content" placeholder="请填写您的评价……"></textarea>
                <input type="hidden" name="sid" value="<?php echo e($SoftwareInfo->id); ?>">
                <input type="hidden" name="star">
                <?php if($CommentCount < 1): ?>
                <div class="star">
                    <div class="big">
                        <p>评分：</p>
                        <div id="star2"></div>
                        <div id="result2"></div>
                    </div>
                </div>
                <?php endif; ?>
                <button>提交</button>
            </form>
        </div>
        <?php } ?>
    </div>
</div>
<!--评论-->

<!--广告位-->
<div class="guang">
    <div class="container">
        <a href="<?php echo e($AdvImage[25]->billboards_url? $AdvImage[25]->billboards_url : $AdvImage[25]->billboards_default_pic); ?>"><img src="<?php echo e($AdvImage[25]->billboards_pic? $AdvImage[25]->billboards_pic : $AdvImage[25]->billboards_default_pic); ?>"></a>
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
                    <?php $__currentLoopData = $SoftwareCaty; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $SoftwareCatyS): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <li class="SoftwareRec" data-id='<?php echo e($SoftwareCatyS->id); ?>'><a href="javascript:;"><?php echo e($SoftwareCatyS->caty_name); ?></a></li>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </ul>
            </div>
            <div class="con-con">
                <ul class="active SoftRecom">
                    <?php $__currentLoopData = $SoftwareRecommended; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $Recommend): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <li>
                        <a href="/SoftwareInfo/<?php echo e($Recommend->id); ?>.html">
                        <img src="<?php echo e($Recommend->cover); ?>">
                        </a>
                        <div class="nr">
                            <div class="nr-left">
                                <div class="nr-top"><?php echo e($Recommend->softwarename); ?> <?php if($Recommend->charge == 1): ?><span>免费</span><?php else: ?><span class="hot">付费</span><?php endif; ?></div>
                                <div class="nr-con"><?= substr($Recommend->description,0,27) ?></div>
                                <div class="nr-biao">
                                    <p>上传时间：<?=substr($Recommend->created_at,0,10); ?></p>
                                    <p>上传者：<?= substr($Recommend->nickname,0,8) ?></p></p>
                                    <?php if($Recommend->comment >= 5): ?>
                                    <p><img src="/Home/images/star.png"><img src="/Home/images/star.png"><img src="/Home/images/star.png"><img src="/Home/images/star.png"><img src="/Home/images/star.png"></p>
                                    <?php elseif($Recommend->comment >= 4): ?>
                                    <p><img src="/Home/images/star.png"><img src="/Home/images/star.png"><img src="/Home/images/star.png"><img src="/Home/images/star.png"><img src="/Home/images/star-h.png"></p>
                                    <?php elseif($Recommend->comment >= 3): ?>
                                    <p><img src="/Home/images/star.png"><img src="/Home/images/star.png"><img src="/Home/images/star.png"><img src="/Home/images/star-h.png"><img src="/Home/images/star-h.png"></p>
                                    <?php elseif($Recommend->comment >= 2): ?>
                                    <p><img src="/Home/images/star.png"><img src="/Home/images/star.png"><img src="/Home/images/star-h.png"><img src="/Home/images/star-h.png"><img src="/Home/images/star-h.png"></p>
                                    <?php elseif($Recommend->comment >= 1): ?>
                                    <p><img src="/Home/images/star.png"><img src="/Home/images/star-h.png"><img src="/Home/images/star-h.png"><img src="/Home/images/star-h.png"><img src="/Home/images/star-h.png"></p>
                                    <?php else: ?>
                                    <p><img src="/Home/images/star-h.png"><img src="/Home/images/star-h.png"><img src="/Home/images/star-h.png"><img src="/Home/images/star-h.png"><img src="/Home/images/star-h.png"></p>
                                    <?php endif; ?>
                                </div>
                                <div class="nr-biao">
                                    <p>软件大小：<?php echo e($Recommend->software_size); ?></p>
                                    <p>下载次数：<?php echo e($Recommend->count); ?></p>
                                    <p><a href="/SoftwareInfo/<?php echo e($Recommend->id); ?>.html">查看详情</a></p>
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
<script src="/Home/js/star.js" type="text/javascript"></script>
<script src="/Home/js/index.js"></script>
<script src="/Home/js/public.js"></script>
<script type="text/javascript">

    $(".banner .container #carousel-example-generic .carousel-indicators li").eq(0).addClass("active");
    $(".banner .container #carousel-example-generic .carousel-inner .item").eq(0).addClass("active");
    $(".details .container .content .jie .carousel .carousel-inner .item").eq(0).addClass("active");
    $(".hottest .content .con-top ul li").eq(0).addClass("active");
    rat('star2','result2',1);
    function rat(star,result,m){
        star= '#' + star;
        result= '#' + result;
        $(result).show();//将结果DIV隐藏
        $(star).raty({
            hints: ['1','2','3','4','5'],
            path: "/Home/images",
            starOff: 'star-h.png',
            starOn: 'star.png',
            size: 24,
            start: 40,
            showHalf: true,
            target: result,
            targetKeep : true,
            click: function (score, evt) {
                 $("input[name='star']").val(score*m);
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
                    var str3 = '<div class="nr-con">'+obj.description.substring(0,27)+'</div><div class="nr-biao"><p>上传时间：'+obj.created_at.substring(0,10)+'</p><p>上传者：'+obj.nickname.substring(0,8)+'</p>'
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

        // $('#DownloadNow').click(function(){
        //     var id = $('#DownloadNow').attr('data-id');
        //     $.get('/UserDownLoad',{id:id},function(res){
        //         console.log(res);
        //     })  
        // });
    });
</script>
<script type="text/javascript">
    //全局变量，动态的文章ID
    var ShareURL = "";
    //绑定所有分享按钮所在A标签的鼠标移入事件，从而获取动态ID
    $(function () {
        $(".bdsharebuttonbox .spa .ast").mouseover(function () {
            ShareURL = $(this).attr("data-url");
        });
    });

    /*
     * 动态设置百度分享URL的函数,具体参数
     * cmd为分享目标id,此id指的是插件中分析按钮的ID
     *，我们自己的文章ID要通过全局变量获取
     * config为当前设置，返回值为更新后的设置。
     */
    function SetShareUrl(cmd, config) {
        if (ShareURL) {
            config.bdUrl = ShareURL;
        }
        return config;
    }

    //插件的配置部分，注意要记得设置onBeforeClick事件，主要用于获取动态的文章ID
    window._bd_share_config = {
        "common": {
            onBeforeClick: SetShareUrl, "bdSnsKey": {}, "bdText": ""
            , "bdMini": "2", "bdMiniList": false, "bdPic": "http://www.lanrenzhijia.com/demos/34/3426/1.jpg", "bdStyle": "0", "bdSize": "24"
        }, "share": {}
    };
    //插件的JS加载部分
    with (document) 0[(getElementsByTagName('head')[0] || body)
            .appendChild(createElement('script'))
            .src = 'http://bdimg.share.baidu.com/static/api/js/share.js?v=89860593.js?cdnversion='
            + ~(-new Date() / 36e5)];
</script>
</body>
</html>