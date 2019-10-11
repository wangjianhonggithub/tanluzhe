<!DOCTYPE html>
<html lang="en" style="font-size: 625%;">
<head>
    <meta charset="UTF-8">
    <title>探路者网络--下载记录</title>
    <meta content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0;" name="viewport" />
    <link rel="stylesheet" href="/Home/css/bootstrap.min.css">
    <link rel="stylesheet" href="/Home/css/personal-xiazai.css">
    <link rel="stylesheet" href="/Home/css/header.css">
    <link rel="stylesheet" href="/Home/css/footer.css">
    <link rel="stylesheet" href="/Home/css/personal-left.css">
    <script src="/Home/js/include.js"></script>
	    <link rel="stylesheet" href="/layui/css/layui.css">
    <script src="/layui/layui.all.js"></script>
</head>
<body>

<?php echo $__env->make('Home.Public.header', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>

<div class="content">
    <div class="container">
       <?php echo $__env->make('Home.Public.CenterLeft', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
        <div class="right">
	        
			<ul id="taba" class="row" style="list-style: none;margin-top: 3em">
				<li style="height: 40px;" class="col-md-3 text-center">
					<button type="button" class="btn " onclick="window.location.href='/Tixian/zhanghu?type=1'" <?php if($_GET['type'] == 1): ?> style="background-color:#3f51b5;color:#fff;" <?php endif; ?>>充值</button>
				</li>
				<li style="height: 40px;" class="col-md-3 text-center">
					<button type="button" class="btn " onclick="window.location.href='/Tixian/zhanghu?type=2'" <?php if($_GET['type'] == 2): ?> style="background-color:#3f51b5;color:#fff;" <?php endif; ?>>充值记录</button>
				</li>
				<li  style="height: 40px;" class="col-md-3 text-center">
					<button type="button" class="btn " onclick="window.location.href='/Tixian/zhanghu?type=3'" <?php if($_GET['type'] == 3): ?> style="background-color:#3f51b5;color:#fff;" <?php endif; ?>>提现</button>
				</li>
				<li  style="height: 40px;" class="col-md-3 text-center">
					<button type="button" class="btn " onclick="window.location.href='/Tixian/zhanghu?type=4'" <?php if($_GET['type'] == 4): ?> style="background-color:#3f51b5;color:#fff;" <?php endif; ?>>提现记录</button>
				</li>
			</ul>

			<ul id="tabb" class="row" style="list-style: none;">
				<?php if($_GET['type'] == 1): ?>
				<li class="col-md-12" style='margin-top: 50px'>
					<?php if(count($errors) > 0): ?> 
						<div class="alert alert-danger"> 
							<ul style="color:#fff;"> 
								<?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $error): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?> 
								<li><?php echo e($error); ?></li> 
								<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?> 
							</ul> 
						</div> 
					<?php endif; ?>

					<form action="/doRecharge" method="post" class="form-horizontal" >
					<?php echo e(csrf_field()); ?>

						<div class="row">
							<div style="height: 40px;line-height: 40px;font-size: 18px;" class="col-md-4 text-center">
								余额：￥<?php echo e($accounts['balance']); ?>

							</div>	
							<div class=" col-md-2 text-center">
								<input type="text" name="money" class="form-control"  placeholder="请输入金额">
							</div>
							<div class=" col-md-2 text-center" style="width:20%;">
								微信<input type="radio" name="type" value="1" checked />
								支付宝<input type="radio" name="type" value="2" />
							</div>
							<div class="col-md-1 text-center">
								<button type="submit" class="btn btn-success">充值</button>
							</div>
						</div>
					<form>
				</li>
				<?php endif; ?>
				<?php if($_GET['type'] == 2): ?>
				<li class="col-md-12" style='margin-top: 10px'>
					<table>
						<table class="table table-striped">
							<th class="row">
								<td class="col-md-4 text-center"><strong>金额</strong></td>
								<td class="col-md-4 text-center"><strong>时间</strong></td>
								<td class="col-md-4 text-center"><strong>状态</strong></td>
							</th>
							<?php $__currentLoopData = $transactions; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $v): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
							<tr class="row">
								<td class="col-md-4 text-center"><?php echo e($v->total_amount); ?></td>
								<td class="col-md-4 text-center"><?php echo e($v->addtime); ?></td>
								<td class="col-md-4 text-center">
									<?php if($v->status == 1): ?>
										成功
									<?php elseif($v->status == 2): ?>
										关闭
									<?php else: ?>
										失败
									<?php endif; ?>
								</td>
							</tr>
							<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
							
						</table>
					</table>
				</li>
				<?php endif; ?>
				<?php if($_GET['type'] == 3): ?>
				<li class="col-md-12" style='margin-top: 50px'>
					<form action="" method="post" class="form-horizontal" >
						  <div class="form-group">
							<label for="inputEmail3" class="col-md-2 control-label">金额</label>
							<div class="col-md-8">
							  <input type="number" name="money" step="0.01" value="0.00" class="form-control" id="inputEmail3" placeholder="金额">
							</div>
						  </div>
						  <div class="form-group">
							<label for="inputPassword3" class="col-md-2 control-label">方式</label>
							<div class="col-md-8">
							  <!--<input type="text" class="form-control" id="inputPassword3" placeholder="方式:支付宝/微信">-->
							  支付宝<input type="radio" name="type" value="1">
							  微信<input type="radio" name="type" value="2">
							  银行卡<input type="radio" name="type" value="3">
							  其他<input type="radio" name="type" value="4">
							</div>
						  </div>
						  <div class="form-group">
							<label for="inputPassword3" class="col-md-2 control-label">卡号</label>
							<div class="col-md-8">
							  <input type="text" name="cardNo" class="form-control" id="inputPassword3" placeholder="卡号">
							</div>
						  </div>
					  
						  <div class="form-group">
							<label for="inputPassword3" class="col-md-2 control-label">所属银行</label>
							<div class="col-md-8">
							  <input type="text" name="bankName" class="form-control" id="inputPassword3" placeholder="所属银行">
							</div>
						  </div>
					  
						  <div class="form-group">
							<label for="inputPassword3" class="col-md-2 control-label">备注</label>
							<div class="col-md-8">
							  <input type="text" name="remark" class="form-control" id="inputPassword3" placeholder="备注">
							</div>
						  </div>
						  <div class="form-group">
							<div class=" col-md-12 text-center">
							  <button type="button" class="btn btn-primary checkMobileSubmit">提交</button>
							</div>
						  </div>
					</form>
				</li>
				<?php endif; ?>
				<?php if($_GET['type'] == 4): ?>
				<li class="col-md-12" style='margin-top: 10px'>
					<table>
						<table class="table table-striped">
							<th class="row">
								<td class="col-md-4 text-center"><strong>金额</strong></td>
								<td class="col-md-4 text-center"><strong>时间</strong></td>
								<td class="col-md-4 text-center"><strong>状态</strong></td>
							</th>
							
							<?php $__currentLoopData = $tixian_arr; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $v): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
								<tr class="row">
									<td class="col-md-4 text-center"><?php echo e($v->money); ?></td>
									<td class="col-md-4 text-center"><?php echo e(date("Y-m-d",$v->createTime)); ?></td>
									<td class="col-md-4 text-center">
										<?php if($v->status == 1): ?>
										    待审核
										<?php elseif($v->status == 2): ?>
										   已通过
										<?php else: ?>
											已拒绝
										<?php endif; ?>
									</td>
								</tr>
							<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>	
						</table>
						<?php echo e($tixian_arr->appends(['type'=>4]) -> links()); ?>

					</table>
				</li>
				<?php endif; ?>
			</ul>
        </div>
    </div>
</div>

<?php echo $__env->make('Home.Public.footer', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>

<script src="/Home/js/jquery-3.2.1.min.js"></script>
<script src="/Home/js/bootstrap.min.js"></script>
<script src="/Home/js/personal.js"></script>
<script src="/Home/js/public.js"></script>
<script type="text/javascript">
	//$('#taba li').eq(0).find('button').addClass('btn-primary')
	//$('#tabb li').eq(0).show().siblings().hide()
	//$('#taba li').each(function(index){
		//$('#taba li').eq(index).find('button').click(function(){
			//$(this).addClass('btn-primary')
			//$('#taba li').eq(index).siblings().find('button').removeClass('btn-primary')
			//$('#tabb li').eq(index).show().siblings().hide()
		//})	
	//})
	
	
	
	
</script>

<script>
	$(function(){
		$('.checkMobileSubmit').click(function(){
			var money  =  $("input[name='money']").val();
			
			var cardNo  =  $("input[name='cardNo']").val();
			var bankName  =  $("input[name='bankName']").val();
			var remark  =  $("input[name='remark']").val();
			//alert(remark);
			$.ajax({
				type: 'POST',
				url: '/Tixian/tixian',
				data: {money:money,cardNo:cardNo,bankName:bankName,remark:remark},
				dataType: 'json',
				
				success: function(data){
					//alert(data.data)
					layer.msg(data.meg, {icon: 6});
				},
			});
		})
	})
</script>
</body>
</html>