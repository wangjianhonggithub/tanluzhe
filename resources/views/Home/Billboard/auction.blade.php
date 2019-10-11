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
    <link rel="stylesheet" href="http://www.bootcss.com/p/buttons/css/buttons.css">
    <script src="/Home/js/include.js"></script>
    <style type="text/css">
        html{
            font-size: 100px;
        }
        .adpic{
            height:3rem;
        }
        .adpic img{
            height: 100%;
            width: 100%;
        }
        .adtitle{
            height: 0.8rem;
            line-height: 0.8rem;
            font-size: 0.16rem;
            color: #666;
        }
        .adheader{
            height: 0.7rem;
            line-height: 0.7rem;
            font-size: 0.20rem;
            color: #666;
            border-radius: 5px 5px 0 0;
            border:1px solid #bbb;
            padding-left:0.2rem;
        }
        .admain{
            border-right:1px solid #bbb;
            border-left:1px solid #bbb;
            border-bottom:1px solid #bbb;
            height: 4.4rem;
        }
        .mainone,.maintwo,.mainthree{
            height:0.8rem;
        }
        .mainone .oneleft{
            width: 30%;
            text-align: right;
            float: left;
            height:0.8rem;
            line-height: 0.8rem;
            font-size: 0.16rem;
            color: #666;
        }
        .mainone .oneright{
            width: 70%;
            float: right;
            height:0.8rem;
            line-height: 0.8rem;
            font-size: 0.16rem;
            color: #666;
        }
        .item-b{
            float: right;
        }
        .maintwo .twoleft{
            width: 30%;
            text-align: right;
            float: left;
            height:0.8rem;
            line-height: 0.8rem;
            font-size: 0.16rem;
            color: #666;
        }
        .maintwo .tworight{
            width: 70%;
            float: right;
            height:0.8rem;
            line-height: 0.8rem;
            font-size: 0.16rem;
            color: #666;
        }
        .tworight select{
            display: block;
            width: 100%;
            height: 0.6rem;
            margin-top: 0.1rem;
            border-radius: 0.05rem;
        }
        .mainthree .threeleft{
            width: 30%;
            text-align: right;
            float: left;
            height:0.8rem;
            line-height: 0.8rem;
            font-size: 0.16rem;
            color: #666;
        }
        .mainthree .threeright{
            width: 70%;
            float: right;
            height:0.8rem;
            line-height: 0.8rem;
            font-size: 0.16rem;
            color: #666;
        }
        .threeright input{
            display: block;
            width: 100%;
            height: 0.6rem;
            margin-top: 0.1rem;
            border-radius: 0.05rem;
        }
        .mainfour{
            height: 2rem;
            padding-top: 0.7rem;
        }
        .sub{
            cursor:pointer;
            width: 2.4rem;
            height: 0.6rem;
            border-radius: 0.06rem;
            background-color: dodgerblue;
            line-height: 0.6rem;
            text-align: center;
            margin: 0 auto;
            font-size: 0.18rem;
            color: #FFFFFF;
        }
        .adfoot{
            height: 2rem;
            line-height: 2rem;
            font-size: 0.16rem;
            color: red;
        }
        input{
            border:1px solid #bbbbbb;
        }
        .active{
            background: #2e8ded;
            height: 30px;
            border-radius: 5px;
            display: block;
            line-height: 30px;
            color: #fff;
            margin: 0px 10px;
        }
        .noactive{
            background: #ccc;
            height: 30px;
            border-radius: 5px;
            display: block;
            line-height: 30px;
            color: #000;
            margin: 0px 10px;
        }
        .item{
            display: block;
            width: 100%;
            height: 30px;
            color: #000;
            text-decoration: none;
            padding: 0 10px;
        }
    </style>
</head>
<body>

@include('Home.Public.header')

<div class="content">
    <div class="container">
        <div class="row">
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 adpic">
                <img class="img-responsive" src="/Home/images/1537940392.jpg"/>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 text-left ">
                <div class="adtitle">
                    <span>赞助推荐竞拍</span><span>&gt;</span><span>资源位</span>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 text-left ">
                <div class="adheader">
                    <span>选择对应的赞助推荐</span>
                </div>
            </div>
        </div>
        <div class="row" style="height: 30px;margin: 20px 0px;">
            <div class="col-lg-2 col-md-2 col-sm-2 col-xs-2 " style="height: 30px">
                选择赞助推荐的位置：
            </div>
            <div class="col-lg-10 col-md-10 col-sm-10 col-xs-10">
                <ul class="row sel" style="list-style: none">
                    @foreach($softwaretypelist as $value) 
                    <li class="noactive" style="height: 30px;float: left;"><a href="/soft/auction/{{$value->id}}" class="item">{{$value->caty_name}}</a></li>
                    @endforeach
                   <!--  <li class="noactive" style="height: 30px;float: left;"><a href="/soft/auction/2" class="item">Linux</a></li>
                    <li class="noactive" style="height: 30px;float: left;"><a href="/soft/auction/3" class="item">IOS</a></li>
                    <li class="noactive" style="height: 30px;float: left;"><a href="/soft/auction/4" class="item">Android</a></li>
                    <li class="noactive" style="height: 30px;float: left;"><a href="/soft/auction/5" class="item">插件</a></li>
                    <li class="noactive" style="height: 30px;float: left;"><a href="/soft/auction/6" class="item">小程序</a></li>
                    <li class="noactive" style="height: 30px;float: left;"><a href="/soft/auction/7" class="item">小游戏</a></li> -->
                </ul>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <form action="/soft/auction" method="post">
                    <input type="hidden" name="software_type" value="{{$softwaretype}}">
                    {{ csrf_field() }}
                    <table class="table table-bordered .table-hover">
                        <thead></thead>
                        <tbody>
                        <tr>
                            <td class="text-center">
                                <div class="text-center">第5资源位</div>
                                <input type="radio" data-shijian='{{$list[5]['endTime']}}' data-money='{{$list[5]['money']}}' name="select" value="5" {{ $list[5]['shijian'] ==0 ? "disabled='disabled'" :"" }}/>
                            </td>
                            <td class="text-center">
                                <div class="text-center">第3资源位</div>
                                <input type="radio" data-shijian='{{$list[3]['endTime']}}' data-money='{{$list[3]['money']}}' name="select" value="3" {{ $list[3]['shijian'] ==0 ? "disabled='disabled'" :"" }}/>
                            </td>
                            <td class="text-center">
                                <div class="text-center">第1资源位</div>
                                <input type="radio" data-shijian='{{$list[1]['endTime']}}' data-money='{{$list[1]['money']}}' name="select" value="1" {{ $list[1]['shijian'] ==0 ? "disabled='disabled'" :"" }}/>
                            </td>
                            <td class="text-center">
                                <div class="text-center">第2资源位</div>
                                <input type="radio" data-shijian='{{$list[2]['endTime']}}' data-money='{{$list[2]['money']}}' name="select" value="2" {{ $list[2]['shijian'] ==0 ? "disabled='disabled'" :"" }}/>
                            </td>
                            <td class="text-center">
                                <div class="text-center">第4资源位</div>
                                <input type="radio" data-shijian='{{$list[4]['endTime']}}' data-money='{{$list[4]['money']}}' name="select" value="4" {{ $list[4]['shijian'] ==0 ? "disabled='disabled'" :"" }}/>
                            </td>
                            <td class="text-center">
                                <div class="text-center">第6资源位</div>
                                <input type="radio" data-shijian='{{$list[6]['endTime']}}' data-money='{{$list[6]['money']}}' name="select" value="6" {{ $list[6]['shijian'] ==0 ? "disabled='disabled'" :"" }}/>
                            </td>
                        </tr>
                        <tr>
                            <td class="text-center">
                                <div class="text-center">第11资源位</div>
                                <input type="radio" data-shijian='{{$list[11]['endTime']}}' data-money='{{$list[11]['money']}}' name="select" value="11" {{ $list[11]['shijian'] ==0 ? "disabled='disabled'" :"" }}/>

                            </td>
                            <td class="text-center">
                                <div class="text-center">第9资源位</div>
                                <input type="radio" data-shijian='{{$list[9]['endTime']}}' data-money='{{$list[9]['money']}}' name="select" value="9" {{ $list[9]['shijian'] ==0 ? "disabled='disabled'" :"" }}/>
                            </td>
                            <td class="text-center">
                                <div class="text-center">第7资源位</div>
                                <input type="radio" data-shijian='{{$list[7]['endTime']}}' data-money='{{$list[7]['money']}}' name="select" value="7" {{ $list[7]['shijian'] ==0 ? "disabled='disabled'" :"" }}/>
                            </td>
                            <td class="text-center">
                                <div class="text-center">第8资源位</div>
                                <input type="radio" data-shijian='{{$list[8]['endTime']}}' data-money='{{$list[8]['money']}}' name="select" value="8" {{ $list[8]['shijian'] ==0 ? "disabled='disabled'" :"" }}/>
                            </td>
                            <td class="text-center">
                                <div class="text-center">第10资源位</div>
                                <input type="radio" data-shijian='{{$list[10]['endTime']}}' data-money='{{$list[10]['money']}}' name="select" value="10" {{ $list[10]['shijian'] ==0 ? "disabled='disabled'" :"" }}/>
                            </td>
                            <td class="text-center">
                                <div class="text-center">第12资源位</div>
                                <input type="radio" data-shijian='{{$list[12]['endTime']}}' data-money='{{$list[12]['money']}}' name="select" value="12" {{ $list[12]['shijian'] ==0 ? "disabled='disabled'" :"" }}/>
                            </td>
                        </tr>
                        <tr>
                            <td class="text-center">
                                <div class="text-center">第17资源位</div>
                                <input type="radio" data-shijian='{{$list[17]['endTime']}}' data-money='{{$list[17]['money']}}' name="select" value="17" {{ $list[17]['shijian'] ==0 ? "disabled='disabled'" :"" }}/>
                            </td>
                            <td class="text-center">
                                <div class="text-center">第15资源位</div>
                                <input type="radio" data-shijian='{{$list[15]['endTime']}}' data-money='{{$list[15]['money']}}' name="select" value="15" {{ $list[15]['shijian'] ==0 ? "disabled='disabled'" :"" }}/>
                            </td>
                            <td class="text-center">
                                <div class="text-center">第13资源位</div>
                                <input type="radio" data-shijian='{{$list[13]['endTime']}}' data-money='{{$list[13]['money']}}' name="select" value="13" {{ $list[13]['shijian'] ==0 ? "disabled='disabled'" :"" }}/>
                            </td>
                            <td class="text-center">
                                <div class="text-center">第14资源位</div>
                                <input type="radio" data-shijian='{{$list[14]['endTime']}}' data-money='{{$list[14]['money']}}' name="select" value="14" {{ $list[14]['shijian'] ==0 ? "disabled='disabled'" :"" }}/>
                            </td>
                            <td class="text-center">
                                <div class="text-center">第16资源位</div>
                                <input type="radio" data-shijian='{{$list[16]['endTime']}}' data-money='{{$list[16]['money']}}' name="select" value="16" {{ $list[16]['shijian'] ==0 ? "disabled='disabled'" :"" }}/>
                            </td>
                            <td class="text-center">
                                <div class="text-center">第18资源位</div>
                                <input type="radio" data-shijian='{{$list[18]['endTime']}}' data-money='{{$list[18]['money']}}' name="select" value="18" {{ $list[18]['shijian'] ==0 ? "disabled='disabled'" :"" }}/>
                            </td>
                        </tr>
                        <tr>
                            <td class="text-center">
                                <div class="text-center">第23资源位</div>
                                <input type="radio" data-shijian='{{$list[23]['endTime']}}' data-money='{{$list[23]['money']}}' name="select" value="23" {{ $list[23]['shijian'] ==0 ? "disabled='disabled'" :"" }}/>
                            </td>
                            <td class="text-center">
                                <div class="text-center">第21资源位</div>
                                <input type="radio" data-shijian='{{$list[21]['endTime']}}' data-money='{{$list[21]['money']}}' name="select" value="21" {{ $list[21]['shijian'] ==0 ? "disabled='disabled'" :"" }}/>
                            </td>
                            <td class="text-center">
                                <div class="text-center">第19资源位</div>
                                <input type="radio" data-shijian='{{$list[19]['endTime']}}' data-money='{{$list[19]['money']}}' name="select" value="19" {{ $list[19]['shijian'] ==0 ? "disabled='disabled'" :"" }}/>
                            </td>
                            <td class="text-center">
                                <div class="text-center">第20资源位</div>
                                <input type="radio" data-shijian='{{$list[20]['endTime']}}' data-money='{{$list[20]['money']}}' name="select" value="20" {{ $list[20]['shijian'] ==0 ? "disabled='disabled'" :"" }}/>
                            </td>
                            <td class="text-center">
                                <div class="text-center">第22资源位</div>
                                <input type="radio" data-shijian='{{$list[22]['endTime']}}' data-money='{{$list[22]['money']}}' name="select" value="22" {{ $list[22]['shijian'] ==0 ? "disabled='disabled'" :"" }}/>
                            </td>
                            <td class="text-center">
                                <div class="text-center">第24资源位</div>
                                <input type="radio" data-shijian='{{$list[24]['endTime']}}' data-money='{{$list[24]['money']}}' name="select" value="24" {{ $list[24]['shijian'] ==0 ? "disabled='disabled'" :"" }} />
                            </td>
                        </tr>
                        <tr>
                            <td class="text-center">
                                <div class="text-center">第29资源位</div>
                                <input type="radio" data-shijian='{{$list[29]['endTime']}}' data-money='{{$list[29]['money']}}' name="select" value="29" {{ $list[29]['shijian'] ==0 ? "disabled='disabled'" :"" }}/>
                            </td>
                            <td class="text-center">
                                <div class="text-center">第27资源位</div>
                                <input type="radio" data-shijian='{{$list[27]['endTime']}}' data-money='{{$list[27]['money']}}' name="select" value="27" {{ $list[27]['shijian'] ==0 ? "disabled='disabled'" :"" }}/>
                            </td>
                            <td class="text-center">
                                <div class="text-center">第25资源位</div>
                                <input type="radio" data-shijian='{{$list[25]['endTime']}}' data-money='{{$list[25]['money']}}' name="select" value="25" {{ $list[25]['shijian'] ==0 ? "disabled='disabled'" :"" }}/>
                            </td>
                            <td class="text-center">
                                <div class="text-center">第26资源位</div>
                                <input type="radio" data-shijian='{{$list[26]['endTime']}}' data-money='{{$list[26]['money']}}' name="select" value="26" {{ $list[26]['shijian'] ==0 ? "disabled='disabled'" :"" }}/>
                            </td>
                            <td class="text-center">
                                <div class="text-center">第28资源位</div>
                                <input type="radio" data-shijian='{{$list[28]['endTime']}}' data-money='{{$list[28]['money']}}' name="select" value="28" {{ $list[28]['shijian'] ==0 ? "disabled='disabled'" :"" }}/>
                            </td>
                            <td class="text-center">
                                <div class="text-center">第30资源位</div>
                                <input type="radio" data-shijian='{{$list[30]['endTime']}}' data-money='{{$list[30]['money']}}' name="select" value="30" {{ $list[30]['shijian'] ==0 ? "disabled='disabled'" :"" }}/>
                            </td>
                        </tr>
                        </tbody>
                    </table>
                    填写竞拍金额:<input type="text" name="money" value="" />
                    <!--选择竞拍的软件的id:<input type="text" name="software_id" value="" /><br/>-->
					&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
					@if(empty($lists))
						<span>很抱歉，您还没有发布竞拍资源</span>
						
					@else
						选择竞拍的软件名字:
						<select name="software_id" id="test">
							@foreach($lists as $v)
								<option value = "{{$v->id}}">{{$v->softwarename}}</option>
							@endforeach
							
						</select>
					@endif
					&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
					<span class="tishiyu"></span>
					&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
					<span class="money"></span>
                    <br/>
                    <br/>
                    <button type="submit" style="margin: auto"  class="button button-block button-rounded button-primary button-large">确认竞拍</button>
                </form>

            </div>
        </div>
    </div>
</div>

@include('Home.Public.footer')

<script src="/Home/js/jquery-3.2.1.min.js"></script>
<script src="/Home/js/bootstrap.min.js"></script>
<script src="/Home/js/personal.js"></script>
<script src="/Home/js/public.js"></script>
<script type="text/javascript">
	$(function(){
		$('input[name="select"]').click(function(){
			var shijian = $(this).attr('data-shijian');
			var money = $(this).attr('data-money');
			$('.tishiyu').html('截止至'+shijian+'停止竞拍')
			if(money){
				$('.money').html('当前最高出价为'+money)
			}else{
				$('.money').html('暂时无人竞拍')
			}
			
		})
	})
    $(document).ready(function(){

        $('.sel ').find('li').eq({{$softwaretype-1}}).addClass('active').removeClass('noactive')
        $('.sel ').find('li').click(function(){
            $(this).addClass('active').removeClass('noactive').siblings().addClass('noactive')
        })
    })
    $("#test").change(function(){
        //要触发的事件
        var id = $(" #test ").val();

        $.ajax({
            type: 'get',
            url:'/soft/checking',
            data:{
                id:id,

            },
            success: function(data){
                var data= eval('('+data+')');
                if (data.code == 1) {
                    alert(data.msg);
                    return false;
                }else{
                    console.log(data.msg);
                }
            },
        });

    });
</script>
</body>
</html>