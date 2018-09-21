/**
 * Created by lenovo on 2018/4/2.
 */
(function (doc_01, win_01) {
    var docEl_01 = doc_01.documentElement;
    var resizeEvt_01 = 'orientationchange' in window ? 'orientationchange' : 'resize';
    var recalc_01 = function () {
        var clientWidth_01 = docEl_01.clientWidth;
        var clientheight_01 = docEl_01.clientHeight;
        if (!clientWidth_01) return;
        if(clientWidth_01<641)
        {
            docEl_01.style.fontSize = (clientWidth_01/640*100).toFixed(1)+'px';
        }
        else
        {
            docEl_01.style.fontSize = 100+'px';
        }
    };
    recalc_01();
    if (!doc_01.addEventListener) return;
    win_01.addEventListener(resizeEvt_01, recalc_01, false);
})(document, window);

$(function(){
   $(".search .li-frist").click(function(){
       $(".search ul").toggle();
       $(".search .search-select .jian").html("▲")
   });
    $(".search ul li a").click(function(){
        var content=$(this).find(".spn").html();
        var dataid = $(this).find(".spn").attr("data-id");
        $(".SeachSoleWareId").val(dataid);
        $(".search .li-frist .spn").html(content);
        $(".search ul").toggle();
        $(".search .search-select .jian").html("▼")
    });
});