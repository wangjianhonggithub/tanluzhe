<!DOCTYPE html>
<meta name="csrf-token" content="{{ csrf_token() }}" />
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

@include('Home.Public.header')


	<div class="modal fade" id="qrcode" tabindex="-1" role="dialog" aria-hidden="show">
        <div class="modal-dialog modal-sm" role="document">
            <div class="modal-content bg-transparent" style="border:none">
                <div class="modal-body align-items-center text-center">
                    <p class="modal-title" id="exampleModalLabel" style="color:red">微信扫码支付</p>
                    <!--<p class="modal-title" id="exampleModalLabel" style="color:red">order_sn {{$data['order_sn']}}</p>
                    <p class="modal-title" id="exampleModalLabel" style="color:red">code {{$data['code']}}</p>-->
                    <br>
                    {{--生成的二维码会放在这里--}}
                    <div id="qrcode2">{!! $data['html'] !!}</div>
                </div>
            </div>
        </div>
    </div>


@include('Home.Public.footer')

<script src="/Home/js/jquery-3.2.1.min.js"></script>
<script src="/Home/js/bootstrap.min.js"></script>
<script src="/Home/js/personal.js"></script>
<script src="/Home/js/public.js"></script>
<script>

$('#qrcode').modal('show');

$(function(){
    setInterval(function(){
		var out_trade_no = "{{$data['order_sn']}}";
		$.ajax({
          type: 'POST',
          url: '/huidiao',
          data: {out_trade_no:out_trade_no,},
		  headers: {
			'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
			},
          success: function(aa){
              if(aa == 1){
				  window.location.href='Tixian/zhanghu?type=2';
			  }
          }
        });
	},1500);
});
</script>



</body>
</html>