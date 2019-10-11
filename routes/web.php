<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});
/**
 * 登录页面
 */
Route::resource('/Admin/Login', 'Admin\LoginController');
/**
 * 后台路由组
 */
Route::group(['middleware'=>'CheckLogin'],function(){

		/**
		 * 侧边栏注册
		 */
		Route::resource('/Admin/Column', 'Admin\ColumnController');
		/**
		 * 后台管理员模块 administrator
		 */
        Route::get('/Admin/Administrator/delete', 'Admin\AdministratorController@admindelete');
		Route::get('/Admin/Administrator/UpdatePassword', 'Admin\AdministratorController@UpdatePassword');
		Route::post('/Admin/Administrator/DoUpdatePassword', 'Admin\AdministratorController@DoUpdatePassword');
		Route::resource('/Admin/Administrator', 'Admin\AdministratorController');

		/**
		 * 软件分类管理 Caty
		 */
		Route::get('/Admin/CatyDelete', 'Admin\CatyController@CatyDelete');

		Route::resource('/Admin/Caty', 'Admin\CatyController');

		//审核
		Route::post('/Admin/Up/status', 'Admin\UpController@status');
		Route::post('/Admin/Up/UNstatus', 'Admin\UpController@UNstatus');
		/**
		 * 	更改个性推荐
		 */
		Route::get('/Admin/Up/person/{id}', 'Admin\UpController@person');
		Route::get('/Admin/Up/UNperson/{id}', 'Admin\UpController@UNperson');
		/**
		 * 	更改个软件位推荐
		 */
		Route::get('/Admin/Up/shuff/{id}', 'Admin\UpController@shuff');
		Route::get('/Admin/Up/UNshuff/{id}', 'Admin\UpController@UNshuff');
		/**
		 * 	后台下载
		 */
		Route::get('/Admin/Up/down/{id}', 'Admin\UpController@down');
        Route::get('/Admin/Up/UNdelete', 'Admin\UpController@UNdelete');
		/**
		 * 软件分类管理 Caty
		 */
		Route::resource('/Admin/Up', 'Admin\UpController');

		/**
		 * 关于我们 administrator
		 */
		Route::resource('/Admin/About', 'Admin\AboutController');
		/**
		 * 网站配置
		 */
		Route::resource('/Admin/Conf', 'Admin\ConfController');
		/**
		 * 帮助中心
		 */
        Route::get('/Admin/Help/helpdelete', 'Admin\HelpController@helpdelete');
		Route::resource('/Admin/Help', 'Admin\HelpController');

		/**
		 * 广告位
		 */
		Route::resource('/Admin/Nav', 'Admin\NavController');
		/**
		 * 轮播图Encrypted
		 */
        Route::get('/Admin/Banner/bannerdelete', 'Admin\BannerController@bannerdelete');
		Route::resource('/Admin/Banner', 'Admin\BannerController');
		/**
		 * 单张广告图
		 */
		Route::resource('/Admin/AdvImage', 'Admin\AdvImageController');
		/**
		 * 删除密保问题
		 */
		Route::get('/Admin/EncryptedDelete', 'Admin\EncryptedController@EncryptedDelete');
		Route::resource('/Admin/Encrypted', 'Admin\EncryptedController');
		/**
		 * 会员信息列表
		 */
		Route::resource('/Admin/User', 'Admin\UserController');
		/**
		 * 平轮管理
		 */
		Route::resource('/Admin/Comment', 'Admin\CommentController');
        Route::get('/Admin/CommentDelete', 'Admin\CommentController@CommentDelete');
		/**
		 * 审核
		 */
		Route::get('/Admin/Cert/status', 'Admin\CertController@status');
		Route::get('/Admin/Cert/UnStatus', 'Admin\CertController@UnStatus');
		/**
		 * 认证消息
		 */
		Route::resource('/Admin/Cert', 'Admin\CertController');
        Route::get('/Admin/CertDelete', 'Admin\CertController@CertDelete');
});
/**
 * 首页
 */
Route::get('/', 'Home\IndexController@show');
/**
 * 首页的最新上传
 */
Route::get('/NewUpload','Home\IndexController@NewUpload');
/**
 * 首页的最热下载
 */
Route::get('/DownHot','Home\IndexController@DownHot');

Route::get('/DownHot','Home\IndexController@DownHot');


//支付宝
Route::get('/toPay','Home\PayController@index');
Route::get('/collback','Home\PayController@collback');

//微信支付
Route::get('/wxPay','Home\PayController@wxPay');
// Route::get('/notify2','Home\PayController@notify2');
Route::post('/notify','Home\Pay2Controller@notify2');
Route::get('/wx','Home\Pay2Controller@index');
Route::post('/huidiao','Home\PayController@huidiao');
/**
 * 登录页面 
 */
Route::get('/Login', 'Home\LoginController@Login');
/**
 * 执行登陆 
 */
Route::post('/DoLoginInt', 'Home\LoginController@DoLogin');
/**
 * 执行退出登录状态 
 */
Route::get('/Home/loginOut', 'Home\LoginController@LoginOut');
/**
 * 注册页面 
 */
Route::get('/Registered', 'Home\RegisteredController@Registered');
/**
 * 执行注册 
 */
Route::post('/DoRegistered', 'Home\RegisteredController@DoRegistered');
/**
 * 发送短信验证码 
 */
Route::get('/SMS', 'Home\RegisteredController@SMSCheck');
/**
 * 检测短信验证码 
 */
Route::get('/CheckSMS', 'Home\RegisteredController@CheckSMS');
/**
 * 密码找回 
 */
Route::get('/Forgot', 'Home\LoginController@Forgot');
/**
 * 检测手机号
 */
Route::get('/CheckMobile', 'Home\LoginController@CheckMobile');
/**
 * 执行检测手机号
 */
Route::get('/DoCheckMobile', 'Home\LoginController@DoCheckMobile');
/**
 * 执行发送短信验证码
 */
Route::get('/DoCheckReCode', 'Home\LoginController@DoCheckReCode');
/**
 * 执行发送短信验证码
 */
Route::get('/DoCheckReCodeInfo', 'Home\LoginController@DoCheckReCodeInfo');
/**
 * 执行密码修改
 */
Route::post('/DoCheckMobilePassword', 'Home\LoginController@DoCheckMobilePassword');
/**
 * 检测密保encrypted
 */
Route::get('/CheckEncrypted', 'Home\LoginController@CheckEncrypted');
/**
 * 检测
 */
Route::get('/DoCheckUserName', 'Home\LoginController@DoCheckUserName');
/**
 * 检测密保问题是否正确
 */
Route::get('/DoCheckEncrypted', 'Home\LoginController@DoCheckEncrypted');

/**
 * 检测邮箱
 */
Route::get('/CheckEmail', 'Home\LoginController@CheckEmail');

Route::get('/DoCheckUserNameEmail', 'Home\LoginController@DoCheckUserNameEmail');
Route::get('/DoCheckUserNameEmailCode', 'Home\LoginController@DoCheckUserNameEmailCode');

/**
 * 执行邮箱检测
 */
Route::get('/DoCheckEmail', 'Home\LoginController@DoCheckEmail');
/**
 * 软件搜索
 */
Route::get('/SeachSoftWare', 'Home\IndexController@SeachSoftWare');

/**
 * 开发人员认证
 */
/**
 * 用户执行下载
 */
Route::get('/UserDownLoad/{id}.py', 'Home\UserController@UserDownLoad');
/**
 * 需要登录之后才能进行的操作
 */
Route::group(['middleware'=>'CheckHomeLogin'],function(){

	/**
	 * 个人中心 消息记录
	 */
	Route::get('/UserMessage', 'Home\UserController@UserMessage');
	/**
	 * 删除消息
	 */
	Route::get('/MessageDelete', 'Home\UserController@MessageDelete');
	/**
	 * 个人中心 下载记录
	 */
	Route::get('/UserCenter', 'Home\UserController@DownloadRecord');
	/**
	 * 个人中心 下载记录
	 */
	Route::get('/UserBeDown', 'Home\UserController@UserBeDown');
	/**
	 * 个人中心 用户上传记录
	 */
	Route::get('/UserUpLoad', 'Home\UserController@UserUpLoad');
	/**
	 * 个人中心 用户评论记录
	 */
	Route::get('/UserComments', 'Home\UserController@UserComments');
	/**
	 *用户添加评论
	 */
	Route::post('/AddUserComments', 'Home\UserController@AddUserComments');
	/**
	 * 个人中心 用户设置
	 */
	Route::get('/UserConf', 'Home\UserController@UserConf');
	/**
	 * 个人中心 执行修改用户设置
	 */
	Route::post('/DoUserConf', 'Home\UserController@DoUserConf');
	/**
	 * 个人中心 修改密码
	 */
	Route::get('/UserUpdatePasswd', 'Home\UserController@UserUpdatePasswd');
	/**
	 * 个人中心 修改密码
	 */
	Route::post('/DoUserUpdatePasswd', 'Home\UserController@DoUserUpdatePasswd');
	/**
	 * 用户执行删除
	 */
	Route::get('/softWareDelete/{id}.py', 'Home\UserController@softWareDelete');
	/**
	 * 用户 ---- 显示软件修改
	 */
	Route::get('/softWareUpdate/{id}.py', 'Home\UserController@softWareUpdate');
	/**
	 * 用户 ---- 执行软件修改
	 */
	Route::post('/DosoftWareUpdate', 'Home\UserController@DosoftWareUpdate');
	/**
	 * 个人中心 开发人员认证
	 */
	Route::get('/AppCert', 'Home\UserController@AppCert');
	/**
	 * 个人中心 开发人员认证
	 */
	Route::post('/DoAppCert', 'Home\UserController@DoAppCert');

		Route::group(['middleware'=>'CheckSoftware'],function(){
		/**
		 * 软件发布software release
		 */
		Route::get('/SoftwareRelease', 'Home\UserController@SoftwareRelease');
		/**
		 * 执行软件发布
		 */
		Route::post('/DoSoftwareRelease', 'Home\UserController@DoSoftwareRelease');
	});
});
/**
 * 软件列表页 
 */
Route::get('/SoftwareList/{id}.html', 'Home\ListController@SoftwareList');
/**
 * 个性推荐
 */
Route::get('/SoftRecom','Home\ListController@SoftRecom');
/**
 * 帮助中心 
 */
Route::get('/Help', 'Home\ListController@Help');
/**
 * 联系我们 
 */
Route::get('/ContactUs', 'Home\ListInfoController@ContactUs');
/**
 * 关于我们 
 */
Route::get('/AboutUs/{id}.html', 'Home\ListInfoController@AboutUs');
/**
 * 帮助中心详情
 */
Route::get('/HelpInfo/{id}.html', 'Home\ListInfoController@HelpInfo');
/**
 * 软件详情中心 
 */
Route::get('/SoftwareInfo/{id}.html', 'Home\ListInfoController@SoftwareInfo');

//---------------------------------------------二次功能添加---------------------------------------
//前台新加功能

Route::resource('/Admin/Banner', 'Admin\BannerController');

//后台新加功能
/**
 * 广告列表
 */
Route::get('/Bidders/test', 'Admin\BiddersController@test');
Route::get('/Bidders/BiddersList', 'Admin\BiddersController@BiddersList');//竞拍列表
Route::get('/Bidders/getresult/{id}', 'Admin\BiddersController@getresult');//结束轮播图广告竞拍


Route::get('/complaints/create', 'Home\ComplaintsController@create');//投诉
Route::post('/complaints', 'Home\ComplaintsController@doComplaints');//投诉动作
Route::get('/complaintsList', 'Home\ComplaintsController@getList');//投诉列表 返回的是json数据


//广告
Route::any('/Banner/Advertising', 'Home\BannerController@Advertising');//广告竞拍界面 轮播图
Route::any('/Banner/stAdvertising', 'Home\BannerController@stAdvertising');//广告竞拍界面 静态
Route::any('/Banner/RuleAds', 'Home\BannerController@RuleAds');//广告投放规则
Route::get('/Banner/myBannerList', 'Home\BannerController@myBannerList');//加载用户自己拥有的广告位
Route::get('/Banner/addMyBanner/{id}', 'Home\BannerController@addMyBanner');//为自己的广告位添加广告
Route::post('/Banner/doaddMyBanner', 'Home\BannerController@doaddMyBanner');//执行添加动作
Route::get('/Banner/delMyBanner/{id}', 'Home\BannerController@delMyBanner');//将自己的广告位上的广告位删除
Route::get('/Banner/addAdv/{id}', 'Home\BannerController@addAdv');//跳转到广告位添加页面
Route::any('/Banner/doAddAdv', 'Home\BannerController@doAddAdv');//执行广告添加动作
Route::get('/Banner/test', 'Home\BannerController@test');//测试

Route::resource('/carousel', 'Home\CarouselController');
Route::post('/carousel/add', 'Home\CarouselController@add');
Route::post('/carousel/markup', 'Home\CarouselController@markup');//我的广告牌

Route::get('/adv/test', 'Home\Adv_ImagesController@test');//测试
Route::get('/adv/advList', 'Home\Adv_ImagesController@advList');//静态广告列表
Route::get('/adv/add/{id}', 'Home\Adv_ImagesController@add');//跳转添加页面
Route::post('/adv/create', 'Home\Adv_ImagesController@create');//执行广告添加动作

/*
 * 竞价
 * */
Route::get('/Auction/showAll/{id}', 'Home\AuctionController@showAll');//查看竞价(轮播)
Route::get('/Auction/stcshowAll/{id}', 'Home\AuctionController@stcshowAll');//查看竞价(静态)
Route::any('/Auction/showone/{id}', 'Home\AuctionController@showone');//查看指定的竞价（轮播）
Route::get('/Auction/stcshowone/{where}', 'Home\AuctionController@stCshowone');//查看指定的竞价(静态)
Route::any('/Auction/typing', 'Home\AuctionController@typing');//执行用户的竞价动作 （轮播广告）
Route::post('/Auction/stcTyping', 'Home\AuctionController@stcTyping');//执行用户的竞价动作 （静态）
Route::get('/Auction/myBiddersOfBanner', 'Home\AuctionController@myBiddersOfBanner');//我参与的竞价
Route::any('/Auction/test', 'Home\AuctionController@test');//测试

/**
 * 软件竞价
 */
Route::post('/soft/test', 'Home\SoftwareController@test');//软件
Route::get('/soft/auction/{softwaretype}', 'Home\SoftwareController@getAuction');//软件
Route::post('/soft/auction', 'Home\SoftwareController@postAuction');//软件
Route::get('/soft/Softwarelist', 'Home\SoftwareController@Softwarelist');//我的软件位的竞价列表
Route::get('/soft/bidPrice', 'Home\SoftwareController@bidPrice');//我的软件位的竞价列表
Route::get('/soft/allList', 'Home\SoftwareController@allList');//没有被竞拍的软件位，
Route::get('/soft/allSoft', 'Home\SoftwareController@allSoft');//所有的软件位
Route::get('/soft/bidPrice', 'Home\SoftwareController@bidPrice');//跳转竞价页面
Route::get('/soft/doBidPrice/{softwaretype}/{order}', 'Home\SoftwareController@doBidPrice');//执行竞价动作
Route::resource('/billboard','Admin\BillboardController');
Route::get('/billboard/verify','Admin\BillboardController@verify');
Route::get('/Admin/Billboard/{id}','Admin\BillboardController@edit');
Route::post('/Admin/Billboard/update','Admin\BillboardController@update');
Route::post('/billboard/verify','Admin\BillboardController@doverify');
Route::get('/billboardAuc/{billboards_position}', 'Admin\BillboardController@getresultAuc');//结束竞拍

Route::resource('/acarousel', 'Admin\CarouselController');//后台轮播广告
Route::get('/acarousel/getresultAuc', 'Admin\CarouselController@getresultAuc');//结束竞拍
Route::get('/Admin/acarousel/overview', 'Admin\CarouselController@overview');

Route::get('/soft/checking','Home\SoftwareController@softCheck');

/**
 * 广告牌竞拍
 */
Route::get('/auc', 'Home\BillboardController@show');
Route::get('/createauc/{id}', 'Home\BillboardController@createAuc');
Route::post('/auc', 'Home\BillboardController@auction');
Route::get('/auc/list/{swf_viewport(xmin, xmax, ymin, ymax)}', 'Home\BillboardController@list'); //我的广告牌


Route::get('/auc/stAdvertising', 'Home\BillboardController@stAdvertising');


Route::post('/auc/markup', 'Home\BillboardController@markup');

Route::get('/auc/list/alllist/{alllist}', 'Home\BillboardController@list'); //我参与的竞拍

/**
 * 我竞拍到的广告位
 */
Route::get('/myAdvertisement', 'Home\BillboardController@show');

/**
 * 后台 竞拍中的软件位列表
 */
Route::get('/AdvertisementList/{id}', 'Admin\BillboardController@AdvertisementList');
Route::post('/AdvertisementList/xiugai', 'Admin\BillboardController@xiugai');
Route::post('/AdvertisementList/bannertime', 'Admin\BillboardController@bannertime');
/**
 * 结束竞拍
 */
Route::get('/getresultAdvertisement', 'Admin\BillboardController@getresultAdvertisement');//结束竞拍

Route::resource('/Tixian/list', 'Admin\TixianController');

Route::get('/Tixian/DoHandle', 'Admin\TixianController@DoHandle');
//留言管理
Route::resource('/Information/list', 'Admin\InformationController');
Route::get('Admin/Information/create', 'Admin\InformationController@create');
Route::post('Admin/Information/InformationAdd', 'Admin\InformationController@InformationAdd');
Route::get('Admin/Information/Information', 'Admin\InformationController@Information');
Route::post('Admin/Information/InformationUp', 'Admin\InformationController@InformationUp');
Route::get('Admin/Information/InformationDel', 'Admin\InformationController@InformationDel');

/**我的账户**/

Route::get('/Tixian/zhanghu', 'Home\TixianController@zhanghu'); //我的账户
Route::post('/Tixian/tixian', 'Home\TixianController@tixian'); //体现表单
Route::any('/doRecharge', 'Home\transactionsController@doRecharge'); //体现表单


Route::get('Admin/billboards/edit/{id}','Admin\BillboardController@edit');
Route::get('/Admin/billboards/delete','Admin\BillboardController@delete');
Route::post('/Admin/billboards/update','Admin\BillboardController@updatebillboards');