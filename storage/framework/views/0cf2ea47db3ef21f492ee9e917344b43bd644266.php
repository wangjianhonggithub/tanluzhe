<!--header-->
<nav class="navbar navbar-default">
    <div class="container-fluid">
        <div class="navbar-header">
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <?php 
        		$logo = DB::table('confs')->where('id',1)->first();
                $caties = DB::table('caties')->get();
        	?>
            <a class="navbar-brand" href="/"><img src="<?php echo e($logo->logo); ?>" alt="LOGO"></a>
        </div>
        <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
            <ul class="nav navbar-nav">
                <li><a href="/">首页</a></li>
                <?php $__currentLoopData = $caties; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $nav): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <li><a href="/SoftwareList/<?php echo e($nav->id); ?>.html"><?php echo e($nav->caty_name); ?></a></li>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                <li><a href="/SoftwareRelease">软件发布</a></li>
                <?php if(!empty(Cookie::get('UserId'))){?>
                <li><a href="/UserCenter">个人中心</a></li>
                <li><a href="/Home/loginOut">退出</a></li>
                <?php }else{ ?>
                <li><a href="/Login">登录</a></li>
                <li><a href="/Registered">注册</a></li>
                <?php }?>
            </ul>
        </div>
    </div>
</nav>
<!--header-->
<!--search-->
<div class="search">
    <div class="container">
        <form action="/SeachSoftWare" method="get">
            <img src="/Home/images/search.jpg">
            <input type="text" name="keyword" placeholder="请输入你想搜索的内容" class="search-k">
             <div class="search-select">
                <div class="li-frist active"><a href="javascript:;"><span class="spn"><?php echo e($caties[0]->caty_name); ?></span><span class="jian">▼</span></a></div>
                <ul>
                <?php $__currentLoopData = $caties; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $catiesinfo): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <li><a href="javascript:;"><span class="spn" data-id="<?php echo e($catiesinfo->id); ?>"><?php echo e($catiesinfo->caty_name); ?></span></a></li>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </ul>
            </div>
			<input type="hidden" name="hot" value="">
            <!--<input type="hidden" name="id" value="<?php echo e($caties[0]->id); ?>" class="SeachSoleWareId">-->
            <!--<input type="submit" value="搜索" class="btn">-->
        </form>
    </div>
</div>
<!--search-->