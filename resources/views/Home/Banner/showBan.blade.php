<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Title</title>
    <script src="https://code.jquery.com/jquery.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/vue/dist/vue.js"></script>

    <!-- HTML5 Shiv 和 Respond.js 用于让 IE8 支持 HTML5元素和媒体查询 -->
    <!-- 注意： 如果通过 file://  引入 Respond.js 文件，则该文件无法起效果 -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
    <script src="https://oss.maxcdn.com/libs/respond.js/1.3.0/respond.min.js"></script>
    <![endif]-->
</head>
<body id="body">

<form>
    <select id="vfor">
        <option v-for="name in names">sss</option>
    </select>
</form>
<script type="text/javascript">

    /*定义的数据 使用for循环去获取*/


    htmlobj =$.ajax({url:"/banner/banlist",async:false});
    alert(htmlobj.toJSONString())
</script>

---------------------

<!-- jQuery (Bootstrap 的 JavaScript 插件需要引入 jQuery) -->
</body>

</html>

