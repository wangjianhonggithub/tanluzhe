<!--header-->
<nav class="navbar navbar-default">
    <div class="container-fluid">
        <div class="navbar-header">
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <?php 
        		$logo = DB::table('confs')->where('id',1)->first();
                $caties = DB::table('caties')->get();
        	?>
            <a class="navbar-brand" href="/"><img src="{{$logo->logo}}" alt="LOGO"></a>
        </div>
        <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
            <ul class="nav navbar-nav">
                <li><a href="/">首页</a></li>
                @foreach($caties as $nav)
                <li><a href="/SoftwareList/{{$nav->id}}.html">{{$nav->caty_name}}</a></li>
                @endforeach
                <li><a href="/SoftwareRelease">软件发布</a></li>
                <?php if(!empty(Cookie::get('UserId'))){?>
                <li><a href="/UserCenter">个人中心</a></li>
                <li><a href="/Home/loginOut">退出</a></li>
                <?php }else{ ?>
                <li><a href="/Login">登录</a></li>
                <li><a href="/Registered">注册</a></li>
                <?php }?>
            </ul>
        </div>
    </div>
</nav>
<!--header-->
<!--search-->
<div class="search">
    <div class="container">
        <form action="/SeachSoftWare" method="get">
            <img src="/Home/images/search.jpg">
            <input type="text" name="keyword" placeholder="请输入你想搜索的内容" class="search-k">
             <div class="search-select">
                <div class="li-frist active"><a href="javascript:;"><span class="spn">{{$caties[0]->caty_name}}</span><span class="jian">▼</span></a></div>
                <ul>
                @foreach($caties as $catiesinfo)
                    <li><a href="javascript:;"><span class="spn" data-id="{{$catiesinfo->id}}">{{$catiesinfo->caty_name}}</span></a></li>
                @endforeach
                </ul>
            </div>
			<input type="hidden" name="hot" value="">
            <!--<input type="hidden" name="id" value="{{$caties[0]->id}}" class="SeachSoleWareId">-->
            <!--<input type="submit" value="搜索" class="btn">-->
        </form>
    </div>
</div>
<!--search-->