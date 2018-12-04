<div class="footer">
    <div class="container">
        <div class="top">
            <div class="left">
                <ul>
                    <?php
                        $HelpTitle = DB::table('helps')->orderBy('id', 'desc')->limit(3)->get();
                        $Confs = DB::table('confs')->where('id',1)->first();
                        $AboutList = DB::table('abouts')->get();
                    ?>
                    <li>
                        <a href="/AboutUs/1.html" class="title">关于我们</a>
                    </li>
                    <li>
                        <a href="/Help" class="title">帮助中心</a>
                     <!--    @foreach($HelpTitle as $HelpTitles)
                        <a href="/HelpInfo/{{$HelpTitles->id}}.html">{{$HelpTitles->title}}</a>
                        @endforeach -->
                    </li>
                    <li>
                        <a href="/ContactUs" class="title">联系我们</a>
                       <!--  <a href="javascript:;">联系我们</a>
                        <a href="javascript:;">公司简介</a>
                        <a href="javascript:;">怎么下载软件</a> -->
                    </li>
                     <li>
                        <a href="/complaints/create" class="title">投诉建议</a>
                    </li>
                    <li>
                        <a href="" class="title">广告投放</a>
                    </li>
                    <li>
                        <a href="/Banner/Advertising" class="title">轮播广告竞拍</a>
                    </li>
                    <li>
                        <a href="/auc" class="title">广告牌竞拍</a>
                        {{--<a href="/Banner/stAdvertising" class="title">静态广告竞拍</a>--}}
                    </li>
                    <li>
                        <a href="/Auction/myBiddersOfBanner" class="title">我参与的竞拍</a>
                    </li>

                </ul>
            </div>
            <div class="right">
                <div class="er">
                    <img src="{{$Confs->qr_code}}">
                   <!--  <p>二维码</p> -->
                </div>
                <div class="address">
                    <p><img src="/Home/images/icon(3).png" alt="">{{$Confs->address}}</p>
                    <p><img src="/Home/images/icon(2).png" alt="">{{$Confs->mobile}}</p>
                    <p><img src="/Home/images/icon(1).png" alt="">{{$Confs->email}}</p>
                </div>
            </div>
        </div>
    </div>
    <div class="bottom">
        <p>备案号：{{$Confs->record}}</p>  
        <p><a href="http://www.bjdingzhicheng.com/">技术支持：北京鼎智诚科技</a></p>
    </div>
</div>