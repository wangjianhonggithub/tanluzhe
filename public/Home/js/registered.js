/**
 * Created by Administrator on 2018/3/28.
 */
$(function  () {
    //获取短信验证码
    var validCode=true;
    $(".msgs").click (function  () {
        var time=60;
        var code=$(this);
        if (validCode) {
            validCode=false;
            code.addClass("msgs1");
            var t=setInterval(function  () {
                time--;
                code.html(time+"秒");
                if (time==0) {
                    clearInterval(t);
                    code.html("重新获取");
                    validCode=true;
                    code.removeClass("msgs1");
                }
            },1000)
        }
    });

    $(".members").click(function(){
        $(".members-document").css({"display":"block"});
    });
    $(".members-document .d-close a").click(function(){
        $(".members-document").css({"display":"none"});
    });
});