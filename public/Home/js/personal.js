/**
 * Created by Administrator on 2018/3/29.
 */
$(function(){
   $(".content .right .con-con .title li").click(function(){
       $(this).addClass("active").siblings().removeClass("active");
       var a = $(this).index();
       $(".content .right .con-con .con-wz li").eq(a).addClass("active").siblings().removeClass("active");
   });
});