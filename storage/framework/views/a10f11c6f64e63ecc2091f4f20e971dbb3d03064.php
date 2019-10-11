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
    <script src="https://cdn.bootcss.com/vue/2.4.2/vue.min.js"></script>
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
        .adbox{
            /*border: 1px solid #bbb;*/
            padding: 0.3rem;
        }
        .boxtitle{
            height: 0.8rem;
            line-height: 0.8rem;
            text-align: center;
            font-size: 0.2rem;
        }
        .boxone{
            height: 0.8rem;
            line-height: 0.8rem;
            font-size: 0.16rem;
        }
        .oneleft{
            float: left;
            height: 0.8rem;
            line-height: 0.8rem;
            font-size: 0.16rem;
        }
        .boxone select{
            float: left;
            display: block;
            width: 2rem;
            height: 0.6rem;
            margin-top: 0.1rem;
            border-radius: 0.05rem;
            border: 1px solid #bbbbbb;
        }
        .twoheader{
            height: 0.8rem;
        }
        .twoh{
            float: left;
            width: 25%;
            height: 0.8rem;
            line-height: 0.8rem;
            text-align: center;
            font-size: 0.18rem;
            color: #666;
            border-bottom: 1px solid #bbb;
        }
        .twocontent{
            height: 80px;
        }
        .twoc{
            float: left;
            width: 25%;
            text-align: center;
            font-size: 0.16rem;
            color: #666;
            border-bottom: 1px dashed #bbb;
            height: 0.6rem;
            line-height: 0.6rem;
        }
        .adfoot{
            height: 1.4rem;
            line-height: 1.4rem;
            font-size: 0.16rem;
            color: red;
        }
    </style>
</head>
<body>

<?php echo $__env->make('Home.Public.header', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>

<div class="container">
    <div class="row">
        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 adpic">
            <img class="img-responsive" src="/Home/images/1537940392.jpg"/>
        </div>
    </div>
    <div class="row">
        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 text-left ">
            <div class="adbox">
                <div class="boxtitle">
                    当前广告位竞价排名
                </div>
                <div class="boxone">
                    <div class="oneleft">
                        请选择您要查看的广告位排名：
                    </div>
                    <select onchange="list()" id="list" name="">
                        <?php $__currentLoopData = $banList; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $banList): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <!-- <a href="/Auction/showAll/{$banList->id}" > -->
                                    <option  value="<?php echo e($banList->id); ?>" <?php echo e($banList->id == $id ?  'selected' : ''); ?>><?php echo e($banList->title); ?></option>
                                <!-- </a> -->
                            
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </select>
                </div>
                <div id="box" class="boxtwo">
                    <div class="twoheader">
                        <div class="twoh">
                            广告位位置
                        </div>
                        <div class="twoh">
                            用户名
                        </div>
                        <div class="twoh">
                            价格
                        </div>
                        <div class="twoh">
                            当前排名
                        </div>
                    </div>
                    <?php $__currentLoopData = $resData; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $banList): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <div class="twocontent">
                        <div class="twoc">
                           <?php echo e($banList->title); ?>

                        </div>
                        <div class="twoc">
                            <?php echo e($banList->username); ?>

                        </div>
                        <div class="twoc">
                            <?php echo e($banList->money); ?>

                        </div>
                        <div class="twoc">
                            <?php echo e($banList->key); ?>

                        </div>
                    </div>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </div>
            </div>
            <div class="adfoot">
                想知道广告投放规则？请点击这里查看<a href="/Banner/RuleAds">《广告投放规则》</a>
            </div>
        </div>
    </div>

</div>

<?php echo $__env->make('Home.Public.footer', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>

<script src="/Home/js/jquery-3.2.1.min.js"></script>
<script src="/Home/js/bootstrap.min.js"></script>
<script src="/Home/js/personal.js"></script>
<script src="/Home/js/public.js"></script>
<script>

   function list(){
        // var re = $.get("/Auction/showone/"+id,
        //         function(data){
        //             console.log(data);
        //             $('.twocontent').remove()// 删除标签
        //             if(data.sta==1){
        //                 var ht = '';
        //                 $.each(data.data, function(i,val){
        //                     ht +='<div class="twocontent"><div class="twoc">'+'zhangsan'
        //                     ht +='</div><div class="twoc">'+'zhangsan'
        //                     ht +='</div><div class="twoc">'+'zhangsan'
        //                     ht +='</div><div class="twoc">'+'zhangsan'
        //                     ht += '</div>'
        //                 });
        //                 $(".boxtwo").append(ht);//追加标签
        //             }else{
        //                 alert(data.msg);
        //             }
        //         });
        var val=$('#list').val()        
        window.location.href= '/Auction/showAll/'+val;
    }
</script>
</body>
</html>