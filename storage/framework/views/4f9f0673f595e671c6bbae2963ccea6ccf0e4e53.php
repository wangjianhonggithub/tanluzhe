<?php $__env->startSection('content'); ?>

        <!--Breadcrumb-->
        <!--~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~-->
        <!--~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~-->
        <!--End breadcrumb-->




        <!--Page content-->



            <div class="panel">
                <div class="panel-heading">
                    <h3 class="panel-title">广告牌列表</h3>
                </div>
                <!--Data Table-->
                <!--===================================================-->
                <div class="panel-body">
                    <div class="pad-btm form-inline">
                        <div class="row">
                            <div class="col-sm-6 table-toolbar-left">
                                <a href="/billboard/create"><button id="demo-btn-addrow" class="btn btn-purple"><i class="demo-pli-add"></i> 添加新的广告牌</button></a>
                                <a href="javascript:void(0)" class="btn  btn-primary" onclick="xiugai('','','','','')">统一设置开始结束时间</a>
                            </div>
                        </div>
                    </div>



                    <div class="table-responsive">
                        <table class="table table-striped">
                            <thead>
                            <tr>
                                <th class="text-center">标题</th>
                                <th>位置</th>
                                <th>添加时间</th>
                                <th>广告默认图片</th>
                                
                                <th width="20%">广告牌默认链接</th>
                                <th>开始时间</th>
                                <th>结束时间</th>
                                <th>截止时间</th>
                                <th>操作</th>

								<th>状态</th>
                            </tr>
                            </thead>
                            <tbody>
                            <?php $__currentLoopData = $data['list']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <tr>
                                <td><a class="btn-link" href="#"><?php echo e($value->billboards_title); ?></a></td>
                                <td><img width="200rem" src="<?php echo e($value->billboards_position_desc); ?>"></td>
                                <td><span class="text-muted"><i class="demo-pli-clock"></i> <?php echo e($value->billboards_creation_date); ?></span></td>
                                <td><img  width="200rem" src="<?php echo e($value->billboards_default_pic); ?>"></td>
                                

                                <td><a href="<?php echo e($value->billboards_default_url); ?>"><?php echo e($value->billboards_default_url); ?></a></td>
                                <td><span class="text-muted"><i class="demo-pli-clock"></i> <?php echo e(date('Y-m-d H:i',$value->billboards_stime)); ?></span></td>
                                <td><span class="text-muted"><i class="demo-pli-clock"></i> <?php echo e(date('Y-m-d H:i',$value->billboards_etime)); ?></span></td>
                                <?php if($value->time_diff >=0 && $value->time_diff<=5 && $value->day_diff <=0): ?>
                                    <?php if($value->time_diff == 5 && $value->mins_diff >=0): ?>
                                        <td><p style="color: red"><?php echo e($value->time_diff); ?>小时<?php echo e($value->mins_diff); ?>分钟后过期</p></td>
                                    <?php else: ?>
                                        <td><p style="color: red"><?php echo e($value->time_diff); ?>小时<?php echo e($value->mins_diff); ?>分钟后过期</p></td>
                                    <?php endif; ?>

                                <?php elseif($value->day_diff<0 && $value->time_diff < 0): ?>
                                    <td><p style="color: #ff9a06">已过期</p></td>
                                <?php elseif($value->day_diff >0 || $value->time_diff > 5): ?>
                                    <td><?php echo e($value->day_diff); ?>天<?php echo e($value->time_diff); ?>小时<?php echo e($value->mins_diff); ?>分钟后过期</td>
                                <?php endif; ?>
                                <td>
                                 <a href="/Admin/billboards/edit/<?php echo e($value->billboards_id); ?>" class="btn btn-xs btn-rounded btn-warning">修改</a>
                                 
                                    
                                    
                                     
                                        
                                     
                                
                                <a href="javasctipt:;" data-id='<?php echo e($value->billboards_id); ?>' class="btn Delete btn-xs btn-rounded btn-danger">删除</a>
                                <td>
                                    <?php switch($value->billboards_status):
                                        case (1): ?>
                                        <a href="/billboardAuc/<?php echo e($value->billboards_position); ?>" title="点击会结束竞拍"><div class="label label-table label-success">正在竞拍中</div></a>
                                        <?php break; ?>

                                        <?php case (3): ?>
                                        <a href="/billboard/overview?id=<?php echo e($value->billboards_position); ?>"><div class="label label-table label-default" title="用户正在展示，点击结束用户展示，从新回复竞拍">用户展示中</div></a>
                                        <?php break; ?>

                                        <?php default: ?>
                                        Default case...
                                    <?php endswitch; ?>
                                </td>
                            </tr>	                                                          
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </tbody>
                        </table>
                        
                    </div>
                </div>
                <!--===================================================-->
                <!--End Data Table-->

            </div>


        </div>
        <!--===================================================-->
        <div class="layui-layer layui-layer-page layui-layer-prompt" id="layui-layer2" type="page" times="2" showtime="0" contype="string" style="display:none;z-index: 19891016; top: 149.5px; left: 790px;">
            <div class="layui-layer-title" style="cursor: move;">修改时间</div>

            <div id="" class="layui-layer-content">
                <form action="/AdvertisementList/bannertime" method="post" id="search_form">
                    <input type="hidden" name="type" value="2">
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
            function xiugai(starttime,startday,endtime,endday,type,day){
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
                                url: '/Admin/billboards/delete',
                                data: {
                                    billboards_id:id,
                                },
                                dataType: 'json',
                                success: function(res){
                                    if (res.code == 1) {
                                        layer.msg(res.msg, {icon: 6});
                                        setTimeout(function(){//两秒后跳转
                                            window.location.href='/billboard';
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