<?php
$IntBannerZ = DB::table('banners')->where('c_id',4)->get();
$IntBannerY = DB::table('banners')->where('c_id',5)->get();
?>
<div class="banner">
    <div class="container">
        <div id="carousel-example-generic" class="carousel slide banner-left" data-ride="carousel">
            <!-- Indicators -->
            <ol class="carousel-indicators">
                <?php foreach($IntBannerZ as $Zk =>$Zv){ ?>
                <li data-target="#carousel-example-generic" data-slide-to="<?php echo e($Zk); ?>"></li>
                <?php } ?>
            </ol>

            <!-- Wrapper for slides -->
            <div class="carousel-inner" role="listbox">
                <?php $__currentLoopData = $IntBannerZ; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $BannerZ): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <div class="item">
                    <a href="javascript:;">
                        <img src="<?php echo e($BannerZ->banner_img); ?>">
                    </a>
                </div>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </div>
            <a class="left carousel-control" href="#carousel-example-generic" role="button" data-slide="prev">
                <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
                <span class="sr-only">Previous</span>
            </a>
            <a class="right carousel-control" href="#carousel-example-generic" role="button" data-slide="next">
                <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
                <span class="sr-only">Next</span>
            </a>
        </div>
        <div id="carousel-example-generic1" class="carousel slide banner-right" data-ride="carousel">
            <!-- Indicators -->
            <ol class="carousel-indicators">
                <?php foreach($IntBannerY as $Yk =>$Yv){ ?>
                <li data-target="#carousel-example-generic1" data-slide-to="<?php echo e($Yk); ?>"></li>
                <?php } ?>
            </ol>

            <!-- Wrapper for slides -->
            <div class="carousel-inner" role="listbox">
                <?php $__currentLoopData = $IntBannerY; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $BannerY): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <div class="item">
                    <a href="javascript:;">
                       <img src="<?php echo e($BannerY->banner_img); ?>">
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

