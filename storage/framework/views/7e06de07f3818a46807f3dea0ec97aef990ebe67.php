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
    <script src="/Home/js/include.js"></script>
</head>
<body>

<?php echo $__env->make('Home.Public.header', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>

<div class="content">
    <div class="container">
        <?php echo $__env->make('Home.Public.CenterLeft', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
        <div class="right">
            <div class="top">
                <img src="/Home/images/icon(4).png">
                <span>我的竞价（轮播图）</span>
            </div>
            <div class="con-con">
                <div class="con-wz">
                    <table class="table table-bordered">
                        <thead>
                            <th>广告标题</th>
                            <th>广告图片</th>
                            <th>广告地址</th>
                            <th>广告位置</th>
							<th>当前最高金额</th>
                            <th>竞价金额</th>
                            <th>审核信息回复</th>
                            <th>审核状态</th>
                            <th>竞价时间</th>
                        </thead>
                        <tbody>
                        <?php $__currentLoopData = $data; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <tr>
                                <td class="text-center"><?php echo e($value->title); ?></td>
                                <td class="text-center"><img width="100px" src="<?php echo e($value->pic); ?>"></td>
                                <td class="text-center" style="white-space: normal;word-break: break-word;"><?php echo e($value->url); ?></td>
                                <td class="text-center"><?php echo e($value->billboards_position); ?></td>
								<td class="text-center"><?php echo e($value->money_max); ?></td>
                                <td class="text-center"><?php echo e($value->money); ?></td>
                                <td class="text-center"><?php echo e($value->errorinfo); ?></td>
                                <td class="text-center">
                                    <?php switch($value->status):
                                        case (1): ?>
                                        <span style="color: #2e8ded">未审核</span>
                                        <?php break; ?>

                                        <?php case (2): ?>
                                        <span style="color: green">审核通过</span>
                                        <a href="/auc/stAdvertising?id=<?php echo e($value->id); ?>"><button>加价</button></a>
                                        <?php break; ?>

                                        <?php case (0): ?>
                                        <span style="color: red">审核没有通过</span>
                                        <?php break; ?>

                                        <?php case (3): ?>
                                        <span style="color: #dddddd">竞拍成功</span>
                                        <?php break; ?>
                                        <?php default: ?>
										时间已经过期
                                        <!--Default case...-->
                                    <?php endswitch; ?>
                                </td>
                                <td class="text-center"><?php echo e($value->addtime); ?></td>
                            </tr>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </tbody>
                    </table>
                </div>
            </div>

        </div>
        <div class="right">
            <div class="top">
                <img src="/Home/images/icon(4).png">
                <span>我的竞价（广告牌）</span>
            </div>
            <div class="con-con">
                <div class="con-wz">
                    <table class="table table-bordered">
                        <thead>
                        <th>广告标题</th>
                        <th>广告图片</th>
                        <th>广告地址</th>
                        <th>广告位置</th>
						<th>当前最高金额</th>
                        <th>竞价金额</th>
                        <th>审核信息回复</th>
                        <th>审核状态</th>
                        <th>竞价时间</th>
                        </thead>
                        <tbody>
                        <?php $__currentLoopData = $data1; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <tr>
                                <td class="text-center"><?php echo e($value->title); ?></td>
                                <td class="text-center"><img width="100px" src="<?php echo e($value->pic); ?>"></td>
                                <td class="text-center" style="white-space: normal;word-break: break-word;"><?php echo e($value->url); ?></td>
                                <td class="text-center"><?php echo e($value->billboards_position); ?></td>
                                <td class="text-center"><?php echo e($value->money_max); ?></td>
                                <td class="text-center"><?php echo e($value->money); ?></td>
                                <td class="text-center"><?php echo e($value->errorinfo); ?></td>
                                <td class="text-center">
                                    <?php switch($value->status):
                                        case (1): ?>
                                        <span style="color: #2e8ded">未审核</span>
                                        <?php break; ?>

                                        <?php case (2): ?>
                                        <span style="color: green">审核通过</span>
                                        <a href="/carousel/stAdvertising?id=<?php echo e($value->id); ?>"><button>加价</button></a>
                                        <?php break; ?>

                                        <?php case (0): ?>
                                        <span style="color: red">审核没有通过</span>
                                        <?php break; ?>

                                        <?php case (3): ?>
                                        <span style="color: #dddddd">竞拍成功</span>
                                        <?php break; ?>
                                        <?php default: ?>
										时间已经过期
                                        <!--Default case...-->
                                    <?php endswitch; ?>
                                </td>
                                <td class="text-center"><?php echo e($value->addtime); ?></td>
                            </tr>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </tbody>
                    </table>
                </div>
            </div>

        </div>

        <div class="right">
            <div class="top">
                <img src="/Home/images/icon(4).png">
                <span>我的竞价（赞助推荐）</span>
            </div>
            <div class="con-con">
                <div class="con-wz">
                    <table class="table table-bordered">
                        <thead>
                            <th>广告标题</th>
                            <th>广告图片</th>
                            <th>广告地址</th>
                            <th>广告位置</th>
							<th>当前最高金额</th>
                            <th>竞价金额</th>
                            <th>审核信息回复</th>
                            <th>审核状态</th>
                            <th>竞价时间</th>
                        </thead>
                        <tbody>
                        <?php $__currentLoopData = $data2; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <tr>
                                <td class="text-center"><?php echo e($value->title); ?></td>
                                <td class="text-center"><img width="100px" src="<?php echo e($value->pic); ?>"></td>
                                <td class="text-center" style="white-space: normal;word-break: break-word;"><?php echo e($value->url); ?></td>
                                <td class="text-center"></td>
								<td class="text-center"><?php echo e($value->money_max); ?></td>
                                <td class="text-center"><?php echo e($value->money); ?></td>
                                <td class="text-center"><?php echo e($value->errorinfo); ?></td>
                                <td class="text-center">
                                    <?php switch($value->status):
                                        case (1): ?>
                                        <span style="color: #2e8ded">未审核</span>
                                        <?php break; ?>

                                        <?php case (2): ?>
                                        <span style="color: green">审核通过</span>
                                        <a href="/auc/stAdvertising?id=<?php echo e($value->id); ?>"><button>加价</button></a>
                                        <?php break; ?>

                                        <?php case (0): ?>
                                        <span style="color: red">审核没有通过</span>
                                        <?php break; ?>

                                        <?php case (3): ?>
                                        <span style="color: #dddddd">竞拍成功</span>
                                        <?php break; ?>
                                        <?php default: ?>
										时间已经过期
                                        <!--Default case...-->
                                    <?php endswitch; ?>
                                </td>
                                <td class="text-center"><?php echo e($value->addtime); ?></td>
                            </tr>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </tbody>
                    </table>
                </div>
            </div>

        </div>



    </div>
</div>

<?php echo $__env->make('Home.Public.footer', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>

<script src="/Home/js/jquery-3.2.1.min.js"></script>
<script src="/Home/js/bootstrap.min.js"></script>
<script src="/Home/js/personal.js"></script>
<script src="/Home/js/public.js"></script>
</body>
</html>
