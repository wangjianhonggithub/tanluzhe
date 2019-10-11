<?php
$LoginHeader = DB::table('confs')->where('id',1)->first();
?>
<div class="header">
    <div class="container">
        <a href="/"><img src="<?php echo e($LoginHeader->logo); ?>" alt="LOGO" class="logo"></a>
        <!-- <span><?php echo e($LoginHeader->logo_int); ?></span> -->
        <span><a href="/">返回首页</a></span>
    </div>
</div>	