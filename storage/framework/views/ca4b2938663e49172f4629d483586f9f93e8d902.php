<?php $__env->startSection('content'); ?>
<div class="panel">
    <div class="panel-heading">
        <h3 class="panel-title">列表</h3>
    </div>

    <div id="demo-custom-toolbar2" class="table-toolbar-left">
        <!-- <a href="/Admin/Nav/create" id="demo-dt-addrow-btn" class="btn btn-primary"><i class="demo-pli-plus"></i> 添加</a>  -->
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
                    <th class="min-tablet">用户名称</th>
                    <th class="min-tablet">提现金额</th>
                    <th class="min-tablet">提现方式</th>
                    <th class="min-tablet">账户</th>
                    <th class="min-tablet">备注</th>
                    <th class="min-tablet">创建时间</th>
                    <th class="min-tablet">状态</th>
                    <th class="min-desktop">操作</th>
                </tr>
            </thead>
            <tbody>
                <?php $__currentLoopData = $data; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $val): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <tr>
                    <td><?php echo e($val->id); ?></td>
                    <td><?php echo e($val->userName); ?></td>
                    <td><?php echo e($val->money); ?></td>
                    <td><?php echo e($val->tixianType); ?></td>
                    <td><?php echo e($val->cardNo); ?></td>
                    <td><?php echo e($val->remark); ?></td>
                    <td><?php echo e($val->createTime); ?></td>
                    <td style="color:red;"><?php echo e($val->handleStatus); ?></td>
                    <?php if($val->status == 1): ?>
                    <td>
                        <form class="form-inline" action="/Tixian/DoHandle" method="get">
                            <div class="form-group">
								<select id="yes_<?php echo e($val->id); ?>">
								<?php $__currentLoopData = $information; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $v): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
									<?php if($v->type ==1): ?>
										<option><?php echo e($v->liuyan); ?></option>
									<?php endif; ?>
								<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
								</select>
								<select id="no_<?php echo e($val->id); ?>">
									<?php $__currentLoopData = $information; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $v): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
									<?php if($v->type ==2): ?>
										<option><?php echo e($v->liuyan); ?></option>
									<?php endif; ?>
								<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
								</select>
                                <label for="demo-inline-inputmail<?php echo e($val->id); ?>" class="sr-only">填写失败信息</label>
                                <input type="text" name="errorinfo" placeholder="填写失败信息" id="demo-inline-inputmail<?php echo e($val->id); ?>" class="form-control">
                            </div>
                            <input name="id" type="hidden" value="<?php echo e($val->id); ?>" />
                            <div class="radio" id="dianji_<?php echo e($val->id); ?>">
                                <input name="status" value="2" type="radio" id="demo-remember-me<?php echo e($val->id); ?>" class="magic-radio" checked />
                                <label for="demo-remember-me<?php echo e($val->id); ?>">通过</label>
                                <input name="status" value="3" type="radio" id="demo-remember-me1<?php echo e($val->id); ?>" class="magic-radio" />
                                <label for="demo-remember-me1<?php echo e($val->id); ?>">不通过</label>
                            </div>
                            <button class="btn btn-primary" type="submit">提交</button>
                        </form>
                    </td>
					<script>
						$(function(){
							$('#no_<?php echo e($val->id); ?>').hide();
							$('#dianji_<?php echo e($val->id); ?>').find('input').click(function(){
								var v = $(this).val();
								var id = '<?php echo e($val->id); ?>'
								if(v == 2){
									$('#no_<?php echo e($val->id); ?>').hide();
									$('#yes_<?php echo e($val->id); ?>').show();
                                    $('#demo-inline-inputmail<?php echo e($val->id); ?>').val($('#yes_<?php echo e($val->id); ?>').val());
								}else{
									$('#no_<?php echo e($val->id); ?>').show();
									$('#yes_<?php echo e($val->id); ?>').hide();
                                    $('#demo-inline-inputmail<?php echo e($val->id); ?>').val($('#no_<?php echo e($val->id); ?>').val());
								}
								//alert(v)
							})

                            $('#yes_<?php echo e($val->id); ?>').change(function(){
                                var options=$("#yes_<?php echo e($val->id); ?> option:selected");
                                $('#demo-inline-inputmail<?php echo e($val->id); ?>').val(options.val());
                            })
                            $('#no_<?php echo e($val->id); ?>').change(function(){
                                var options=$("#no_<?php echo e($val->id); ?> option:selected");
                                $('#demo-inline-inputmail<?php echo e($val->id); ?>').val(options.val());
                            })


						})
					</script>
                    <?php endif; ?>

                    <?php if($val->status == 3 ): ?>

                        <td>
                            <form class="form-inline" action="/Tixian/DoHandle" method="get">
                                <div class="form-group">
                                    <label for="demo-inline-inputmail<?php echo e($val->id); ?>" class="sr-only">填写失败信息</label>
                                    <input type="text" value="<?php echo e($val->errorinfo); ?>" name="errorinfo" placeholder="填写失败信息" id="demo-inline-inputmail<?php echo e($val->id); ?>" class="form-control">
                                </div>
                                <div class="radio">
                                <input name="status" value="3" type="radio" checked id="demo-remember-me1<?php echo e($val->id); ?>" class="magic-radio" />
                                <label for="demo-remember-me1<?php echo e($val->id); ?>">未通过</label>
                            </div>

                            </form>
                        </td>

                    <?php endif; ?>
<!-- 
                    <td>
                        <a href="/Tixian/DoHandle/<?php echo e($val->id); ?>" class="btn btn-xs btn-rounded btn-warning">处理</a>
                        <form action="/Tixian/DoDelete/<?php echo e($val->id); ?>" method="POST" style="display: inline;" accept-charset="utf-8">
                           <button class="btn btn-xs btn-rounded btn-danger">删除</button>
                        </form>
                    </td> -->
                </tr>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </tbody>
        </table>
        <?php echo e($data->links()); ?>

    </div> 
</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('Admin.Base', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>