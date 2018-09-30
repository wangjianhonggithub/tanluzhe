<div class="left">
    <div class="center hidden-lg hidden-sm hidden-md">
        <a href="/UserCenter">下载记录</a>
        <a href="/UserUpLoad">我的上传</a>
        <a href="/UserComments">我的评论</a>
        <a href="/UserConf">我的设置</a>
        <a href="">消息中心 <div class="message">50</div></a>
    </div>
    <?php
        $UserId = Cookie::get('UserId');
        $UserInfo = DB::table('users')
                     ->where('id', '=', $UserId)
                     ->first();
        $MsgCount = DB::table('news')
                     ->where('uid', '=', $UserId)
                     ->count();
    ?>
    <div class="top">
        <img src="{{$UserInfo->header_pic}}" class="head">
        <div class="head-right">
            <p>{{$UserInfo->nickname}}</p>
            @if($UserInfo->is_cert == 1)
            <p><a href="/AppCert">开发人员认证：已认证</a></p>
            @else
            <p><a href="/AppCert">开发人员认证：未认证</a></p>
            @endif
        </div>
    </div>
    <div class="bottom hidden-xs">
        <ul>
            <li>
                <a href="/UserCenter">
                    <img src="/Home/images/icon(6).png">
                    <span>下载记录</span>
                </a>
            </li>
            <li>
                <a href="/UserUpLoad">
                    <img src="/Home/images/icon(4).png">
                    <span>我的上传</span>
                </a>
            </li>
            <li>
                <a href="/UserComments">
                    <img src="/Home/images/pin.png">
                    <span>我的评论</span>
                </a>
            </li>
            <li>
                <a href="/UserConf">
                    <img src="/Home/images/icon(5).png">
                    <span>我的设置</span>
                </a>
            </li>
            <li>
                <a href="/UserMessage">
                    <img src="/Home/images/icon(8).png">
                    <span>消息中心</span>
                    @if($MsgCount >= 1)
                    <div class="message">{{$MsgCount}}</div>
                    @endif
                </a>
            </li>
            <li>
                <a href="/Banner/myBannerList">
                    <img src="/Home/images/icon(6).png">
                    <span>我的广告位</span>
                </a>
            </li>
        </ul>
    </div>
</div>