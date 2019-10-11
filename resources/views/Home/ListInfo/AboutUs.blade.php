<!DOCTYPE html>
<html lang="en" style="font-size: 625%;">
<head>
    <meta charset="UTF-8">
    <title>探路者网络--帮助中心</title>
    <meta content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0;" name="viewport" />
    <link rel="stylesheet" href="/Home/css/bootstrap.min.css">
    <link rel="stylesheet" href="/Home/css/help.css">
    <link rel="stylesheet" href="/Home/css/footer.css">
    <link rel="stylesheet" href="/Home/css/header.css">
    <script src="/Home/js/include.js"></script>
</head>
<body>

@include('Home.Public.header')

<!--banner-->
@include('Home.Public.IntBanner')
<!--banner-->
<div class="content">
    <div class="container">
        <div class="con-con">
            <div class="text-xq"><?php echo htmlspecialchars_decode($AboutInfo->content) ?></div>
        </div>
    </div>
</div>
@include('Home.Public.footer')

<script src="/Home/js/jquery-3.2.1.min.js"></script>
<script src="/Home/js/bootstrap.min.js"></script>
<script src="/Home/js/index.js"></script>
<script src="/Home/js/IntBanner.js"></script>
<script src="/Home/js/public.js"></script>
</body>
</html>