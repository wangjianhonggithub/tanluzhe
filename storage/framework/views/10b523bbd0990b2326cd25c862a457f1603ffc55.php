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

<?php echo $__env->make('Home.Public.header', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>

<!-- <div class="banner">
    <div class="container">
        <div class="top"><img src="<?php echo e($AdvImage->list_h); ?>"></div>
    </div>
</div> -->
<!--广告位-->
<div class="advertising">
    <div class="container">
        <div class="banner-right">
            <div id="carousel-example-generic5" class="carousel slide" data-ride="carousel">
                <div class="carousel-inner" role="listbox">
                    <?php $__currentLoopData = $SoftwareBannerS; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $SO): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <div class="item">
                        <a href="javascript:;">
                            <img src="<?php echo e($SO->banner_img); ?>">
                        <div class="carousel-caption">
                            <p><?php echo e($SO->title); ?></p>
                            <p><?php echo e($SO->description); ?></p>
                        </div>
                        </a>
                    </div>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
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
                <a href="">
                    <img src="<?php echo e($AdvImage->list_s); ?>">
                </a>
            </div>
            <div class="img-div">
                <a href="">
                   <img src="<?php echo e($AdvImage->list_x); ?>">
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
                    <?php $__currentLoopData = $SoftwareShuff['shuff1']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $Shuff1): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <div class="big">
                        <a href="/SoftwareInfo/<?php echo e($Shuff1->id); ?>.html">
                            <div class="title"><?php echo e($Shuff1->softwarename ? $Shuff1->softwarename : '暂无数据'); ?></div>
                            <div class="nr">
                                <?php echo e($Shuff1->description ? $Shuff1->description : '暂无数据'); ?>

                            </div>
                            <div class="shang">
                                <p>资源大小：<?php echo e($Shuff1->software_size?$Shuff1->software_size:'暂无'); ?></p>
                                <?php if($Shuff1->comment >= 5): ?>
                                    <p>
                                        <img src="/Home/images/star1.png">
                                        <img src="/Home/images/star1.png">
                                        <img src="/Home/images/star1.png">
                                        <img src="/Home/images/star1.png">
                                        <img src="/Home/images/star1.png">
                                    </p>
                                    <?php elseif($Shuff1->comment >= 4): ?>
                                    <p>
                                        <img src="/Home/images/star1.png">
                                        <img src="/Home/images/star1.png">
                                        <img src="/Home/images/star1.png">
                                        <img src="/Home/images/star1.png">
                                        <img src="/Home/images/star1-h.png">
                                    </p>
                                    <?php elseif($Shuff1->comment >= 3): ?>
                                    <p>
                                        <img src="/Home/images/star1.png">
                                        <img src="/Home/images/star1.png">
                                        <img src="/Home/images/star1.png">
                                        <img src="/Home/images/star1-h.png">
                                        <img src="/Home/images/star1-h.png">
                                    </p>
                                    <?php elseif($Shuff1->comment >= 2): ?>
                                    <p>
                                        <img src="/Home/images/star1.png">
                                        <img src="/Home/images/star1.png">
                                        <img src="/Home/images/star1-h.png">
                                        <img src="/Home/images/star1-h.png">
                                        <img src="/Home/images/star1-h.png">
                                    </p>
                                    <?php elseif($Shuff1->comment >= 1): ?>
                                    <p>
                                        <img src="/Home/images/star1.png">
                                        <img src="/Home/images/star1-h.png">
                                        <img src="/Home/images/star1-h.png">
                                        <img src="/Home/images/star1-h.png">
                                        <img src="/Home/images/star1-h.png">
                                    </p>
                                    <?php else: ?>
                                    <p>
                                        <img src="/Home/images/star1-h.png">
                                        <img src="/Home/images/star1-h.png">
                                        <img src="/Home/images/star1-h.png">
                                        <img src="/Home/images/star1-h.png">
                                        <img src="/Home/images/star1-h.png">
                                    </p>
                                    <?php endif; ?>
                            </div>
                        </a>
                    </div>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </div>
                <div class="swiper-slide">
                    <?php $__currentLoopData = $SoftwareShuff['shuff2']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $Shuff2): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?> 
                    <div class="big">
                        <a href="/SoftwareInfo/<?php echo e($Shuff2->id); ?>.html">
                            <div class="title"><?php echo e($Shuff2->softwarename?$Shuff2->softwarename:'暂无数据'); ?></div>
                            <div class="nr">
                                <?php echo e($Shuff2->description?$Shuff2->description:'暂无数据'); ?>

                            </div>
                            <div class="shang">
                                <p>资源大小：<?php echo e($Shuff2->software_size?$Shuff2->software_size:'暂无数据'); ?></p>
                                <?php if($Shuff2->comment >= 5): ?>
                                    <p>
                                        <img src="/Home/images/star1.png">
                                        <img src="/Home/images/star1.png">
                                        <img src="/Home/images/star1.png">
                                        <img src="/Home/images/star1.png">
                                        <img src="/Home/images/star1.png">
                                    </p>
                                    <?php elseif($Shuff2->comment >= 4): ?>
                                    <p>
                                        <img src="/Home/images/star1.png">
                                        <img src="/Home/images/star1.png">
                                        <img src="/Home/images/star1.png">
                                        <img src="/Home/images/star1.png">
                                        <img src="/Home/images/star1-h.png">
                                    </p>
                                    <?php elseif($Shuff2->comment >= 3): ?>
                                    <p>
                                        <img src="/Home/images/star1.png">
                                        <img src="/Home/images/star1.png">
                                        <img src="/Home/images/star1.png">
                                        <img src="/Home/images/star1-h.png">
                                        <img src="/Home/images/star1-h.png">
                                    </p>
                                    <?php elseif($Shuff2->comment >= 2): ?>
                                    <p>
                                        <img src="/Home/images/star1.png">
                                        <img src="/Home/images/star1.png">
                                        <img src="/Home/images/star1-h.png">
                                        <img src="/Home/images/star1-h.png">
                                        <img src="/Home/images/star1-h.png">
                                    </p>
                                    <?php elseif($Shuff2->comment >= 1): ?>
                                    <p>
                                        <img src="/Home/images/star1.png">
                                        <img src="/Home/images/star1-h.png">
                                        <img src="/Home/images/star1-h.png">
                                        <img src="/Home/images/star1-h.png">
                                        <img src="/Home/images/star1-h.png">
                                    </p>
                                    <?php else: ?>
                                    <p>
                                        <img src="/Home/images/star1-h.png">
                                        <img src="/Home/images/star1-h.png">
                                        <img src="/Home/images/star1-h.png">
                                        <img src="/Home/images/star1-h.png">
                                        <img src="/Home/images/star1-h.png">
                                    </p>
                                    <?php endif; ?>
                            </div>
                        </a>
                    </div>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </div>
                <div class="swiper-slide">
                    <?php $__currentLoopData = $SoftwareShuff['shuff3']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $Shuff3): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <div class="big">
                        <a href="/SoftwareInfo/<?php echo e($Shuff3->id); ?>.html">
                            <div class="title"><?php echo e($Shuff3->softwarename?$Shuff3->softwarename:'暂无数据'); ?></div>
                            <div class="nr">
                                <?php echo e($Shuff3->description?$Shuff3->description:'暂无数据'); ?>

                            </div>
                            <div class="shang">
                                <p>资源大小：<?php echo e($Shuff3->software_size?$Shuff3->software_size:'暂无数据'); ?></p>
                                <?php if($Shuff3->comment >= 5): ?>
                                    <p>
                                        <img src="/Home/images/star1.png">
                                        <img src="/Home/images/star1.png">
                                        <img src="/Home/images/star1.png">
                                        <img src="/Home/images/star1.png">
                                        <img src="/Home/images/star1.png">
                                    </p>
                                    <?php elseif($Shuff3->comment >= 4): ?>
                                    <p>
                                        <img src="/Home/images/star1.png">
                                        <img src="/Home/images/star1.png">
                                        <img src="/Home/images/star1.png">
                                        <img src="/Home/images/star1.png">
                                        <img src="/Home/images/star1-h.png">
                                    </p>
                                    <?php elseif($Shuff3->comment >= 3): ?>
                                    <p>
                                        <img src="/Home/images/star1.png">
                                        <img src="/Home/images/star1.png">
                                        <img src="/Home/images/star1.png">
                                        <img src="/Home/images/star1-h.png">
                                        <img src="/Home/images/star1-h.png">
                                    </p>
                                    <?php elseif($Shuff3->comment >= 2): ?>
                                    <p>
                                        <img src="/Home/images/star1.png">
                                        <img src="/Home/images/star1.png">
                                        <img src="/Home/images/star1-h.png">
                                        <img src="/Home/images/star1-h.png">
                                        <img src="/Home/images/star1-h.png">
                                    </p>
                                    <?php elseif($Shuff3->comment >= 1): ?>
                                    <p>
                                        <img src="/Home/images/star1.png">
                                        <img src="/Home/images/star1-h.png">
                                        <img src="/Home/images/star1-h.png">
                                        <img src="/Home/images/star1-h.png">
                                        <img src="/Home/images/star1-h.png">
                                    </p>
                                    <?php else: ?>
                                    <p>
                                        <img src="/Home/images/star1-h.png">
                                        <img src="/Home/images/star1-h.png">
                                        <img src="/Home/images/star1-h.png">
                                        <img src="/Home/images/star1-h.png">
                                        <img src="/Home/images/star1-h.png">
                                    </p>
                                    <?php endif; ?>
                            </div>
                        </a>
                    </div>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </div>
                <div class="swiper-slide">
                     <?php $__currentLoopData = $SoftwareShuff['shuff4']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $Shuff4): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <div class="big">
                        <a href="/SoftwareInfo/<?php echo e($Shuff4->id); ?>.html">
                            <div class="title"><?php echo e($Shuff4->softwarename?$Shuff4->softwarename:'暂无数据'); ?></div>
                            <div class="nr">
                                <?php echo e($Shuff4->description?$Shuff4->description:'暂无数据'); ?>

                            </div>
                            <div class="shang">
                                <p>资源大小：<?php echo e($Shuff4->software_size?$Shuff4->software_size:'暂无数据'); ?></p>
                                <?php if($Shuff4->comment >= 5): ?>
                                    <p>
                                        <img src="/Home/images/star1.png">
                                        <img src="/Home/images/star1.png">
                                        <img src="/Home/images/star1.png">
                                        <img src="/Home/images/star1.png">
                                        <img src="/Home/images/star1.png">
                                    </p>
                                    <?php elseif($Shuff4->comment >= 4): ?>
                                    <p>
                                        <img src="/Home/images/star1.png">
                                        <img src="/Home/images/star1.png">
                                        <img src="/Home/images/star1.png">
                                        <img src="/Home/images/star1.png">
                                        <img src="/Home/images/star1-h.png">
                                    </p>
                                    <?php elseif($Shuff4->comment >= 3): ?>
                                    <p>
                                        <img src="/Home/images/star1.png">
                                        <img src="/Home/images/star1.png">
                                        <img src="/Home/images/star1.png">
                                        <img src="/Home/images/star1-h.png">
                                        <img src="/Home/images/star1-h.png">
                                    </p>
                                    <?php elseif($Shuff4->comment >= 2): ?>
                                    <p>
                                        <img src="/Home/images/star1.png">
                                        <img src="/Home/images/star1.png">
                                        <img src="/Home/images/star1-h.png">
                                        <img src="/Home/images/star1-h.png">
                                        <img src="/Home/images/star1-h.png">
                                    </p>
                                    <?php elseif($Shuff4->comment >= 1): ?>
                                    <p>
                                        <img src="/Home/images/star1.png">
                                        <img src="/Home/images/star1-h.png">
                                        <img src="/Home/images/star1-h.png">
                                        <img src="/Home/images/star1-h.png">
                                        <img src="/Home/images/star1-h.png">
                                    </p>
                                    <?php else: ?>
                                    <p>
                                        <img src="/Home/images/star1-h.png">
                                        <img src="/Home/images/star1-h.png">
                                        <img src="/Home/images/star1-h.png">
                                        <img src="/Home/images/star1-h.png">
                                        <img src="/Home/images/star1-h.png">
                                    </p>
                                    <?php endif; ?>
                            </div>
                        </a>
                    </div>
                     <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </div>
                <div class="swiper-slide">
                    <?php $__currentLoopData = $SoftwareShuff['shuff5']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $Shuff5): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <div class="big">
                        <a href="/SoftwareInfo/<?php echo e($Shuff5->id); ?>.html">
                            <div class="title"><?php echo e($Shuff5->softwarename?$Shuff5->softwarename:'暂无数据'); ?></div>
                            <div class="nr">
                                <?php echo e($Shuff5->description?$Shuff5->description:'暂无数据'); ?>

                            </div>
                            <div class="shang">
                                <p>资源大小：<?php echo e($Shuff5->software_size?$Shuff5->software_size:'暂无数据'); ?></p>
                                <?php if($Shuff5->comment >= 5): ?>
                                    <p>
                                        <img src="/Home/images/star1.png">
                                        <img src="/Home/images/star1.png">
                                        <img src="/Home/images/star1.png">
                                        <img src="/Home/images/star1.png">
                                        <img src="/Home/images/star1.png">
                                    </p>
                                    <?php elseif($Shuff5->comment >= 4): ?>
                                    <p>
                                        <img src="/Home/images/star1.png">
                                        <img src="/Home/images/star1.png">
                                        <img src="/Home/images/star1.png">
                                        <img src="/Home/images/star1.png">
                                        <img src="/Home/images/star1-h.png">
                                    </p>
                                    <?php elseif($Shuff5->comment >= 3): ?>
                                    <p>
                                        <img src="/Home/images/star1.png">
                                        <img src="/Home/images/star1.png">
                                        <img src="/Home/images/star1.png">
                                        <img src="/Home/images/star1-h.png">
                                        <img src="/Home/images/star1-h.png">
                                    </p>
                                    <?php elseif($Shuff5->comment >= 2): ?>
                                    <p>
                                        <img src="/Home/images/star1.png">
                                        <img src="/Home/images/star1.png">
                                        <img src="/Home/images/star1-h.png">
                                        <img src="/Home/images/star1-h.png">
                                        <img src="/Home/images/star1-h.png">
                                    </p>
                                    <?php elseif($Shuff5->comment >= 1): ?>
                                    <p>
                                        <img src="/Home/images/star1.png">
                                        <img src="/Home/images/star1-h.png">
                                        <img src="/Home/images/star1-h.png">
                                        <img src="/Home/images/star1-h.png">
                                        <img src="/Home/images/star1-h.png">
                                    </p>
                                    <?php else: ?>
                                    <p>
                                        <img src="/Home/images/star1-h.png">
                                        <img src="/Home/images/star1-h.png">
                                        <img src="/Home/images/star1-h.png">
                                        <img src="/Home/images/star1-h.png">
                                        <img src="/Home/images/star1-h.png">
                                    </p>
                                    <?php endif; ?>
                            </div>
                        </a>
                    </div>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
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
            搜索结果 
			<span  class="radiochecked" data-id="<?php echo e($CatyNav->id); ?>">
				<input type="radio" name="radio" value="1" checked="checked" id="NEWSLIST"> 最新 &nbsp;&nbsp;&nbsp;&nbsp;
				<input type="radio" name="radio" value="2" id="HOTLIST"> 最热
				<a href="/SeachSoftWare?id=<?php echo e($CatyNav->id); ?>&keyword=<?php echo e($keyword); ?>&hot=''">全部</a>
				<a class="fufei" href="/SeachSoftWare?id=<?php echo e($CatyNav->id); ?>&keyword=<?php echo e($keyword); ?>&charge=0">付费</a>
				<a class="mianfei" href="/SeachSoftWare?id=<?php echo e($CatyNav->id); ?>&keyword=<?php echo e($keyword); ?>&charge=1">免费</a>
			</span>
        </div>
        <div class="content">
            <div class="con-con">
                <ul class="active">
                    <?php $__currentLoopData = $SoftwareList; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $SList): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <li>
                       <a href="/SoftwareInfo/<?php echo e($SList->id); ?>.html"><img src="<?php echo e($SList->cover); ?>"></a>
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
                                <a href="javascript:;">下载次数：<?php echo e($SList->count); ?></a>
                                <a href="/SoftwareInfo/<?php echo e($SList->id); ?>.html">点击查看详情</a>
                            </div>
                        </div>
                    </li>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </ul>
            </div>
                <?php echo e($SoftwareList->links()); ?>

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
                    <?php $__currentLoopData = $CatyList; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $CV): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <li class="SoftwareRec" data-id='<?php echo e($CV->id); ?>'><a href="javascript:;"><?php echo e($CV->caty_name); ?></a></li>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </ul>
            </div>
            <div class="con-con">
                <ul class="active SoftRecom">
                    <?php $__currentLoopData = $SoftwareRecommended; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $Recommended): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <li>
                        <a href="/SoftwareInfo/<?php echo e($Recommended->id); ?>.html">
                        <img src="<?php echo e($Recommended->cover); ?>">
                        </a>
                        <div class="nr">
                            <div class="nr-left">
                                <div class="nr-top"><?php echo e($Recommended->softwarename); ?> <?php if($Recommended->charge == 1): ?><span>免费</span><?php else: ?><span class="hot">付费</span><?php endif; ?></div>
                                <div class="nr-con"><?php echo e($Recommended->description); ?></div>
                                <div class="nr-biao">
                                    <p>上传时间：<?= substr($Recommended->created_at,0,10) ?></p>
                                    <p>上传者：<?= substr($Recommended->nickname,0,10) ?></p>
                                    <?php if($Recommended->comment >= 5): ?>
                                    <p><img src="/Home/images/star.png"><img src="/Home/images/star.png"><img src="/Home/images/star.png"><img src="/Home/images/star.png"><img src="/Home/images/star.png"></p>
                                    <?php elseif($Recommended->comment >= 4): ?>
                                    <p><img src="/Home/images/star.png"><img src="/Home/images/star.png"><img src="/Home/images/star.png"><img src="/Home/images/star.png"><img src="/Home/images/star-h.png"></p>
                                    <?php elseif($Recommended->comment >= 3): ?>
                                    <p><img src="/Home/images/star.png"><img src="/Home/images/star.png"><img src="/Home/images/star.png"><img src="/Home/images/star-h.png"><img src="/Home/images/star-h.png"></p>
                                    <?php elseif($Recommended->comment >= 2): ?>
                                    <p><img src="/Home/images/star.png"><img src="/Home/images/star.png"><img src="/Home/images/star-h.png"><img src="/Home/images/star-h.png"><img src="/Home/images/star-h.png"></p>
                                    <?php elseif($Recommended->comment >= 1): ?>
                                    <p><img src="/Home/images/star.png"><img src="/Home/images/star-h.png"><img src="/Home/images/star-h.png"><img src="/Home/images/star-h.png"><img src="/Home/images/star-h.png"></p>
                                    <?php else: ?>
                                    <p><img src="/Home/images/star-h.png"><img src="/Home/images/star-h.png"><img src="/Home/images/star-h.png"><img src="/Home/images/star-h.png"><img src="/Home/images/star-h.png"></p>
                                    <?php endif; ?>
                                </div>
                                <div class="nr-biao">
                                    <p>软件大小：<?php echo e($Recommended->software_size); ?></p>
                                    <p>下载次数：<?php echo e($Recommended->count); ?></p>
                                    <p><a href="/SoftwareInfo/<?php echo e($Recommended->id); ?>.html">查看详情</a></p>
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
<script src="/Home/js/swiper-4.2.0.min.js"></script>
<script src="/Home/js/index.js"></script>
<script src="/Home/js/public.js"></script>
<script>
    $(".advertising .container .banner-right .carousel-inner .item").eq(0).addClass("active");
    $(".hottest .container .content .con-top ul li").eq(0).addClass("active");
	
	$('.radiochecked').click(function(){
        var hot = $('input[name="radio"]:checked').val();
        var id = $(this).attr('data-id');
		var keyword = "<?php echo e($keyword); ?>";
        if (hot == 1) {
            $('.fufei').attr('href','/SeachSoftWare?id='+id+'&charge=0&keyword='+keyword+'&hot=1');
            $('.mianfei').attr('href','/SeachSoftWare?id='+id+'&charge=1&keyword='+keyword+'&hot=1');
        }else{
            $('.fufei').attr('href','/SeachSoftWare?id='+id+'&charge=0&keyword='+keyword+'&hot=2');
            $('.mianfei').attr('href','/SeachSoftWare?id='+id+'&charge=1&keyword='+keyword+'&hot=2');
        }
    })
	$(function(){
		var hotUrl = "<?php echo e($_GET['hot']); ?>";
		 if (hotUrl != null) {
			if (hotUrl == 1) {
				$('#NEWSLIST').attr('checked','checked');
			}else{
				$('#HOTLIST').attr('checked','checked');
			}
		}else{
			$('#NEWSLIST').attr('checked','checked');
		}
	})
   
	

	
    var mySwiper = new Swiper ('.swiper-container', {

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
                    var str3 = '<div class="nr-con">'+obj.description+'</div><div class="nr-biao"><p>上传时间：'+obj.created_at.substring(0,10)+'</p><p>上传者：'+obj.nickname.substring(0,10)+'</p>'
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