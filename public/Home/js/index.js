/**
 * Created by Administrator on 2018/3/21.
 */
$(function(){
    $(".new .con-top li").click(function(){
        $(this).addClass("active").siblings().removeClass("active");
        var a =$(this).index();
        $(".new .con-con ul").eq(a).addClass("active").siblings().removeClass("active");
    });
    $(".hottest .con-top li").click(function(){
        $(this).addClass("active").siblings().removeClass("active");
        var a =$(this).index();
        $(".hottest .con-con ul").eq(a).addClass("active").siblings().removeClass("active");
    });

    $(".advertising .banner-left .img-div").mouseover(function(){
        $(this).find("img").css({"transform":"scale(1.2)","transition":"all 500ms linear"});
    }).mouseleave(function(){
        $(this).find("img").css({"transform":"scale(1.0)","transition":"all 500ms linear"});
    });

    $(".banner .guang ul li").mouseover(function(){
        $(this).find("img").css({"transform":"scale(1.2)","transition":"all 500ms linear"})
    }).mouseleave(function(){
        $(this).find("img").css({"transform":"scale(1.0)","transition":"all 500ms linear"});
    });
});