<?php $__env->startSection('content'); ?>
<div class="panel">
    <div class="panel-heading">
        <h3 class="panel-title">列表</h3>
    </div>

    <div id="demo-custom-toolbar2" class="table-toolbar-left">
        <a href="/Admin/Banner/create" id="demo-dt-addrow-btn" class="btn btn-primary"><i class="demo-pli-plus"></i> 添加</a>
        <a href="javascript:void(0)" class="btn  btn-primary" onclick="xiugai('','','','')">统一设置开始结束时间</a>

        <div class="col-m-5">
        <!--Block Level buttons-->
        <!--===================================================-->
        <!--===================================================-->
    </div>
    </div>
    <?php if(count($errors) > 0): ?>
        <div class="alert alert-danger">
            <ul>
                <?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $error): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <li style="list-style: none"><?php echo e($error); ?></li>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </ul>
        </div>
    <?php endif; ?>
   
    <!--Block Level buttons-->
    <!--===================================================-->
    <strong class="col-md-4 col-md-offset-4  alert-success"><?php echo e(Session::get('info')); ?></strong>

        <!--===================================================-->
    <div class="panel-body">
        <table id="demo-dt-addrow" class="table table-striped table-bordered" cellspacing="0" width="100%">
            <thead>
                <tr>
                    <th>ID</th>
                    <th class="min-tablet">轮播图</th>
                    <th class="min-tablet">标题</th>
                    <th class="min-tablet">描述</th>
                    <th class="min-tablet">所属广告位</th>
                    <th class="min-tablet">开始时间</th>
                    <th class="min-tablet">结束时间</th>
                    <th class="min-tablet">截止时间</th>
                    <th class="min-tablet">创建时间</th>
                    <th class="min-tablet">修改时间</th>
                    <th class="min-desktop">操作</th>
                </tr>
            </thead>
            <tbody>
                <?php $__currentLoopData = $data; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $val): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <tr>
                    <td><?php echo e($val->id); ?></td>
                    <td><img src="<?php echo e($val->banner_img); ?>" width="150" height="80" alt=""></td>
                    <td><?php echo e($val->title); ?></td>
                    <td><?php echo e($val->description); ?></td>
                    <td><?php echo e($val->nav_name); ?></td>
                    <td><?php echo e(date("Y-m-d H:i",$val->banner_stime)); ?></td>
                    <td><?php echo e(date("Y-m-d H:i",$val->banner_etime)); ?></td>
                    <?php if($val->time_diff >=0 && $val->time_diff<=5 && $val->day_diff <=0): ?>
                        <?php if($val->time_diff == 5 && $val->mins_diff >=0): ?>
                            <td><p ><?php echo e($val->time_diff); ?>小时<?php echo e($val->mins_diff); ?>分钟后过期</p></td>
                        <?php else: ?>
                            <td><p style="color: red"><?php echo e($val->time_diff); ?>小时<?php echo e($val->mins_diff); ?>分钟后过期</p></td>
                        <?php endif; ?>

                    <?php elseif($val->day_diff<0 && $val->time_diff < 0): ?>
                        <td><p style="color: #ff9a06">已过期</p></td>
                    <?php elseif($val->day_diff >0 || $val->time_diff > 5): ?>
                        <td><?php echo e($val->day_diff); ?>天<?php echo e($val->time_diff); ?>小时<?php echo e($val->mins_diff); ?>分钟后过期</td>
                    <?php endif; ?>

                    <td><?php echo e($val->created_at); ?></td>
                    <td><?php echo e($val->updated_at); ?></td>
                    <td>
                    	<a href="/Admin/Banner/<?php echo e($val->id); ?>/edit" class="btn btn-xs btn-rounded btn-warning">修改</a>
                        
                            
                            
                           
                        
                        <a href="javasctipt:;" data-id='<?php echo e($val->id); ?>' class="btn Delete btn-xs btn-rounded btn-danger">删除</a>
                        <?php switch($val->status):
                            case (0): ?>
                            <a href="/acarousel/getresultAuc?id=<?php echo e($val->id); ?>" class="btn btn-xs btn-rounded btn-mint">赛选竞拍结果</a>
                            <?php break; ?>

                            <?php case (3): ?>
                            <a href="/Admin/acarousel/overview?id=<?php echo e($val->id); ?>" class="btn btn-xs btn-rounded btn-primary">重新竞拍</a>
                            <?php break; ?>

                            <?php default: ?>
                            <a href="/acarousel/getresultAuc?id=<?php echo e($val->id); ?>" class="btn btn-xs btn-rounded btn-default">其他</a>
                        <?php endswitch; ?>
					<!--<a href="/Admin/Banner/<?php echo e($val->id); ?>/edit" class="btn btn-xs btn-rounded btn-primary">结束竞拍</a>
                        <a href="/Admin/Banner/<?php echo e($val->id); ?>/edit" class="btn btn-xs btn-rounded btn-mint">重新竞拍</a>-->
                    </td>
                </tr>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </tbody>
        </table>
        <?php echo e($data->links()); ?>

    </div> 
</div>
<div class="layui-layer layui-layer-page layui-layer-prompt" id="layui-layer2" type="page" times="2" showtime="0" contype="string" style="display:none;z-index: 19891016; top: 149.5px; left: 790px;">
    <div class="layui-layer-title" style="cursor: move;">修改时间</div>

    <div id="" class="layui-layer-content">
        <form action="/AdvertisementList/bannertime" method="post" id="search_form">
            <input type="hidden" name="type" value="1">
            开始时间：<input type="date" name="startTime" value="" /><input type="time" name="startDay" value="" /><br /><br />
            截止时间：<input type="date" name="endTime" value="" /><input type="time" name="endDay" value="" /><br /><br />


            <form>
    </div>

    <span class="layui-layer-setwin"><a class="layui-layer-ico layui-layer-close layui-layer-close1" href="javascript:;"></a></span>
    <div class="layui-layer-btn layui-layer-btn-">
        <a class="layui-layer-btn0">确定</a>
        <a class="layui-layer-btn1">取消</a>
    </div>
</div>
<script src="/layui/layui.all.js"></script>
<script>
    function xiugai(starttime,startday,endtime,endday){
        $('.layui-layer').show();
        $('input[name="startTime"]').val(starttime)
        $('input[name="startDay"]').val(startday)



        $('input[name="endTime"]').val(endtime)
        $('input[name="endDay"]').val(endday)
    }
    $(function(){
        //关闭
        $('.layui-layer-ico,.layui-layer-btn1').click(function(){
            $('.layui-layer').hide();
        })
        //提交
        $('.layui-layer-btn0').click(function(){
            document.getElementById('search_form').submit();

        })

        $('.Delete').click(function(){
            var id = $(this).attr('data-id');
            layer.msg('你确定要删除吗？', {
                time: 0 //不自动关闭
                ,btn: ['确认', '取消']
                ,yes: function(index){
                    //假设 id 的 class  是 getId
                    //然后发送ajax;
                    $.ajax({
                        type: 'GET',
                        url: '/Admin/Banner/bannerdelete',
                        data: {
                            id:id,
                        },
                        dataType: 'json',
                        success: function(res){
                            if (res.code == 1) {
                                layer.msg(res.msg, {icon: 6});
                                setTimeout(function(){//两秒后跳转
                                    window.location.href='/Admin/Banner';
                                },1500);
                            }else{
                                layer.msg(res.msg, {icon: 5});
                            }
                        },
                    });
                }
            });
        });

    })
</script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('Admin.Base', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>