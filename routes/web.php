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
		Route::get('/Admin/Administrator/UpdatePassword', 'Admin\AdministratorController@UpdatePassword');
		Route::post('/Admin/Administrator/DoUpdatePassword', 'Admin\AdministratorController@DoUpdatePassword');
		Route::resource('/Admin/Administrator', 'Admin\AdministratorController');
		/**
		 * 软件分类管理 Caty
		 */
		Route::get('/Admin/CatyDelete', 'Admin\CatyController@CatyDelete');
		Route::resource('/Admin/Caty', 'Admin\CatyController');
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
		Route::resource('/Admin/Help', 'Admin\HelpController');
		/**
		 * 广告位
		 */
		Route::resource('/Admin/Nav', 'Admin\NavController');
		/**
		 * 轮播图Encrypted
		 */
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
		/**
		 * 审核
		 */
		Route::get('/Admin/Cert/status', 'Admin\CertController@status');
		Route::get('/Admin/Cert/UnStatus', 'Admin\CertController@UnStatus');
		/**
		 * 认证消息
		 */
		Route::resource('/Admin/Cert', 'Admin\CertController');
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

/**
 * 广告列表
 */
Route::get('/banner/test', 'Home\BannerController@test');
