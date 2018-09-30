-- phpMyAdmin SQL Dump
-- version 4.6.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: 2018-09-29 02:42:36
-- 服务器版本： 5.7.14
-- PHP Version: 7.0.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `down`
--

-- --------------------------------------------------------

--
-- 表的结构 `abouts`
--

CREATE TABLE `abouts` (
  `id` int(10) UNSIGNED NOT NULL,
  `content` text NOT NULL COMMENT '内容',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- 转存表中的数据 `abouts`
--

INSERT INTO `abouts` (`id`, `content`, `created_at`, `updated_at`) VALUES
(1, '<p style="text-align: center;"><span style="color: rgb(0, 0, 0);"><strong><span style="font-size: 36px;">关于我们</span></strong></span></p><p><br/></p>', '2018-05-08 16:00:00', '2018-08-03 01:05:38');

-- --------------------------------------------------------

--
-- 表的结构 `accounts`
--

CREATE TABLE `accounts` (
  `uid` int(10) NOT NULL COMMENT '用户id',
  `balance` decimal(6,2) NOT NULL DEFAULT '0.00',
  `addtime` datetime DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COMMENT='用户账户中心';

--
-- 转存表中的数据 `accounts`
--

INSERT INTO `accounts` (`uid`, `balance`, `addtime`) VALUES
(4, '0.00', NULL),
(2, '197.00', '2018-09-26 13:37:17'),
(12, '0.00', NULL);

-- --------------------------------------------------------

--
-- 表的结构 `admin_users`
--

CREATE TABLE `admin_users` (
  `id` int(10) UNSIGNED NOT NULL,
  `username` varchar(255) NOT NULL COMMENT '后台用户名',
  `password` varchar(255) NOT NULL COMMENT '后台用户密码',
  `nickname` varchar(255) NOT NULL COMMENT '昵称',
  `status` int(11) NOT NULL DEFAULT '1' COMMENT '用户状态1为启用0为禁用',
  `column_role` varchar(255) DEFAULT NULL COMMENT '侧边栏的权限状态',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `action` varchar(255) DEFAULT NULL COMMENT '权限栏目',
  `ident` varchar(255) DEFAULT NULL COMMENT '身份 1 是超级管理员 2.普通管理员'
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- 转存表中的数据 `admin_users`
--

INSERT INTO `admin_users` (`id`, `username`, `password`, `nickname`, `status`, `column_role`, `created_at`, `updated_at`, `action`, `ident`) VALUES
(2, 'admin', '$2y$10$6dQbIO2iyPl7uVSrN9lfg.dAhgApxRjvlZe1vfo4Ut8oZ6yRm1Yfe', '超级管理员', 1, NULL, '2018-03-13 03:24:35', '2018-05-22 05:47:10', '1,3,4,9,8,10,11,12,14,15,17,19,20,21,22,23,24,25', '1'),
(4, 'Knight', '$2y$10$t.Czp5EB6nDEYZiEXK1vV.oh396v23hP2G.CTxXVaMb1JMnqsJYwW', '我做主', 1, NULL, '2018-03-13 07:28:43', '2018-04-09 07:08:33', '1,3,4,9,8,10,11,12,14,15,17,19,20,21,22,23,24,25', '1'),
(7, 'mali', '$2y$10$8qjZ9SQL0LZoGnOz6hmnlegLZzKckljUCWxRbg90S34SPSEK1JjtS', '后台开发人员', 1, NULL, '2018-09-28 05:39:53', '2018-09-28 05:39:53', NULL, NULL);

-- --------------------------------------------------------

--
-- 表的结构 `adv_images`
--

CREATE TABLE `adv_images` (
  `id` int(10) UNSIGNED NOT NULL,
  `ind_s` varchar(255) DEFAULT NULL COMMENT '首页banner上',
  `ind_x` varchar(255) DEFAULT NULL COMMENT '首页banner下',
  `ind_z` varchar(255) DEFAULT NULL COMMENT '首页中部',
  `list_h` varchar(255) DEFAULT NULL COMMENT '列表横幅',
  `list_s` varchar(255) DEFAULT NULL COMMENT '列表banner上',
  `list_x` varchar(255) DEFAULT NULL COMMENT '列表banner下',
  `info_bz` varchar(255) DEFAULT NULL COMMENT '详情banner左',
  `info_bc` varchar(255) DEFAULT NULL COMMENT '详情banner中左',
  `info_by` varchar(255) DEFAULT NULL COMMENT '详情banner右',
  `info_z` varchar(255) DEFAULT NULL COMMENT '详情中部',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `info_bcy` varchar(255) DEFAULT NULL COMMENT '详情banner中右'
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- 转存表中的数据 `adv_images`
--

INSERT INTO `adv_images` (`id`, `ind_s`, `ind_x`, `ind_z`, `list_h`, `list_s`, `list_x`, `info_bz`, `info_bc`, `info_by`, `info_z`, `created_at`, `updated_at`, `info_bcy`) VALUES
(1, '/uploads/AdvImage/152238400562397644.png', '/uploads/AdvImage/152238429742602478.png', '/uploads/AdvImage/153811866175836120.jpg', '/uploads/AdvImage/152238429733750244.png', '/uploads/AdvImage/15223842976948822.png', '/uploads/AdvImage/152238429778796936.png', '/uploads/AdvImage/152238429744381988.png', '/uploads/AdvImage/152283481048632873.png', '/uploads/AdvImage/152238429786020721.png', '/uploads/AdvImage/152238429741321472.png', NULL, '2018-09-28 07:11:01', '/uploads/AdvImage/152283485768521697.png'),
(2, '#', '#', '#', '#', '#', '#', '#', '#', '#', '#', NULL, NULL, '#');

-- --------------------------------------------------------

--
-- 表的结构 `auction`
--

CREATE TABLE `auction` (
  `auction_id` int(11) NOT NULL COMMENT '主键',
  `uid` int(11) NOT NULL COMMENT '参与竞价的用户id',
  `banners_id` int(11) NOT NULL DEFAULT '0' COMMENT '被竞价的广告',
  `adv_images` varchar(255) CHARACTER SET utf8 NOT NULL COMMENT '静态广告',
  `money` decimal(6,0) NOT NULL COMMENT '支付竞价的金额',
  `addtime` timestamp NOT NULL COMMENT '竞价的时间',
  `status` tinyint(4) NOT NULL DEFAULT '0' COMMENT '状态（0：竞拍中，1：结束竞价，2竞价无效）'
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COMMENT='竞价表';

--
-- 转存表中的数据 `auction`
--

INSERT INTO `auction` (`auction_id`, `uid`, `banners_id`, `adv_images`, `money`, `addtime`, `status`) VALUES
(14, 1, 33, '', '54', '2018-09-27 08:02:22', 0),
(15, 2, 34, '', '55', '2018-09-27 08:17:57', 0),
(16, 3, 34, '', '30', '2018-09-27 08:19:44', 0),
(17, 2, 33, '', '30', '2018-09-27 10:15:26', 0),
(18, 2, 0, 'ind_x', '20', '2018-09-28 08:23:24', 0),
(19, 2, 0, 'list_x', '60', '2018-09-28 08:23:47', 0);

-- --------------------------------------------------------

--
-- 表的结构 `banners`
--

CREATE TABLE `banners` (
  `id` int(10) UNSIGNED NOT NULL,
  `c_id` int(11) DEFAULT NULL,
  `banner_img` varchar(255) NOT NULL,
  `description` varchar(255) NOT NULL,
  `url` varchar(255) DEFAULT NULL COMMENT '轮播图地址',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `title` varchar(255) DEFAULT NULL COMMENT '标题'
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- 转存表中的数据 `banners`
--

INSERT INTO `banners` (`id`, `c_id`, `banner_img`, `description`, `url`, `created_at`, `updated_at`, `title`) VALUES
(33, 7, '/uploads/imgpath/153811683620239257.jpg', '列表页广告轮播中 一', '', '2018-09-28 06:40:36', '2018-09-28 06:40:36', '列表页广告轮播中 一'),
(34, 6, '/uploads/imgpath/153811694795241546.jpg', '列表页广告轮播上 一', '', '2018-09-28 06:42:27', '2018-09-28 06:42:27', '列表页广告轮播上 一'),
(35, 5, '/uploads/imgpath/15381169866876312.jpg', '公司信息页广告右 一', '', '2018-09-28 06:43:06', '2018-09-28 06:43:06', '公司信息页广告右 一'),
(37, 4, '/uploads/imgpath/153811729177700225.png', '公司信息页广告轮播左 一', '', '2018-09-28 06:48:11', '2018-09-28 06:48:11', '公司信息页广告轮播左 一'),
(38, 1, '/uploads/imgpath/15381174249018371.png', '首页广告轮播一', '', '2018-09-28 06:50:24', '2018-09-28 06:50:24', '首页广告轮播一'),
(39, 2, '/uploads/imgpath/15381175513731201.jpg', '首页广告轮播二', '', '2018-09-28 06:52:31', '2018-09-28 06:52:31', '首页广告轮播二'),
(40, 3, '/uploads/imgpath/153811793049143463.png', '首页广告轮播三', '', '2018-09-28 06:58:50', '2018-09-28 07:00:05', '首页广告轮播三'),
(32, 8, '/uploads/imgpath/153811677418701446.jpg', '详情页面广告轮播 一', '', '2018-09-28 06:39:34', '2018-09-28 06:46:29', '详情页面广告轮播 一');

-- --------------------------------------------------------

--
-- 表的结构 `caties`
--

CREATE TABLE `caties` (
  `id` int(10) UNSIGNED NOT NULL,
  `pid` int(11) NOT NULL,
  `caty_name` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- 转存表中的数据 `caties`
--

INSERT INTO `caties` (`id`, `pid`, `caty_name`, `created_at`, `updated_at`) VALUES
(1, 0, 'Windows', '2018-03-28 04:09:20', '2018-03-28 04:09:24'),
(2, 0, 'Linux', '2018-03-28 04:01:19', '2018-03-28 04:08:00'),
(3, 0, 'IOS', '2018-03-29 01:01:57', '2018-03-29 01:01:57'),
(4, 0, 'Android', '2018-03-29 01:02:28', '2018-03-29 01:02:28'),
(5, 0, '插件', '2018-03-29 01:02:35', '2018-03-29 01:02:35'),
(8, 0, '小程序', '2018-03-29 01:02:57', '2018-03-29 01:02:57');

-- --------------------------------------------------------

--
-- 表的结构 `certs`
--

CREATE TABLE `certs` (
  `id` int(10) UNSIGNED NOT NULL,
  `uid` int(11) NOT NULL COMMENT '申请认证的用户id',
  `id_card` varchar(255) DEFAULT NULL COMMENT '身份证照片',
  `license` varchar(255) DEFAULT NULL COMMENT '公司执照',
  `is_status` varchar(255) NOT NULL DEFAULT '0' COMMENT '审核状态',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `display` int(11) DEFAULT '1' COMMENT '软删除'
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- 转存表中的数据 `certs`
--

INSERT INTO `certs` (`id`, `uid`, `id_card`, `license`, `is_status`, `created_at`, `updated_at`, `display`) VALUES
(2, 2, '/uploads/Cert/152333047648838317.png', NULL, '1', '2018-04-10 03:21:16', '2018-08-25 15:21:33', 0),
(5, 4, '/uploads/Cert/153325437539413444.jpg', NULL, '1', '2018-08-02 23:59:35', '2018-08-03 00:00:31', 1);

-- --------------------------------------------------------

--
-- 表的结构 `column`
--

CREATE TABLE `column` (
  `id` int(10) UNSIGNED NOT NULL,
  `pid` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `url` varchar(255) NOT NULL,
  `icon` varchar(255) NOT NULL,
  `display` varchar(255) NOT NULL DEFAULT '1',
  `create_time` varchar(255) NOT NULL,
  `update_time` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- 转存表中的数据 `column`
--

INSERT INTO `column` (`id`, `pid`, `name`, `url`, `icon`, `display`, `create_time`, `update_time`, `created_at`, `updated_at`) VALUES
(1, 0, '模块管理', '#', '#', '1', '1520583525', '1520850363', NULL, '2018-03-12 10:26:03'),
(3, 1, '会员管理', '/Admin/User', 'ion-ios-people-outline', '1', '1520588155', '1520850278', NULL, '2018-03-12 10:24:38'),
(4, 1, '软件管理', '#', 'ion-ios-rose-outline', '1', '1520588180', '1521602723', NULL, '2018-03-21 03:25:23'),
(9, 4, '上传管理', '/Admin/Up', '#', '1', '1521602714', '1521602714', NULL, NULL),
(8, 1, '后台人员管理', '/Admin/Administrator', 'ion-help-buoy', '1', '1520907943', '1520908042', NULL, '2018-03-13 02:27:22'),
(10, 1, '网站管理', '#', 'ion-ios-cog-outline', '1', '1521603029', '1521603147', NULL, '2018-03-21 03:32:27'),
(11, 10, '关于我们', '/Admin/About', '#', '1', '1521603178', '1521603178', NULL, NULL),
(12, 10, '帮助中心', '/Admin/Help', '#', '1', '1521609268', '1522201178', NULL, '2018-03-28 01:39:38'),
(14, 10, '网站配置', '/Admin/Conf/1/edit', '#', '1', '1521609353', '1522142820', NULL, '2018-03-27 09:27:00'),
(15, 17, '广告轮播图', '/Admin/Banner', '#', '1', '1521610800', '1522203571', NULL, '2018-03-28 02:19:31'),
(17, 1, '广告管理', '#', 'ion-ios-calculator-outline', '1', '1521619921', '1521619921', NULL, NULL),
(19, 17, '单张广告图片', '/Admin/AdvImage/1/edit', '#', '1', '1522207828', '1522381693', NULL, '2018-03-30 03:48:13'),
(20, 4, '软件分类', '/Admin/Caty', '#', '1', '1522208550', '1522208550', NULL, NULL),
(21, 3, '密保问题', '/Admin/Encrypted', '#', '1', '1522303600', '1522303600', NULL, NULL),
(22, 3, '会员信息', '/Admin/User', '#', '1', '1523257775', '1523258380', NULL, '2018-04-09 07:19:40'),
(23, 3, '评论管理', '/Admin/Comment', '#', '1', '1523262641', '1523262641', NULL, NULL),
(24, 3, '开发人员认证', '/Admin/Cert', '#', '1', '1523330786', '1523330786', NULL, NULL),
(25, 3, '认证回收站', '/Admin/Recycle', '#', '1', '1526872298', '1526872298', NULL, NULL);

-- --------------------------------------------------------

--
-- 表的结构 `complaints`
--

CREATE TABLE `complaints` (
  `id` int(8) NOT NULL,
  `uid` int(8) NOT NULL,
  `title` varchar(255) CHARACTER SET utf8 DEFAULT NULL,
  `content` varchar(255) CHARACTER SET utf8 NOT NULL,
  `contact` varchar(50) CHARACTER SET utf8 DEFAULT NULL COMMENT '联系方式',
  `addtime` datetime NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COMMENT='投诉建议表';

--
-- 转存表中的数据 `complaints`
--

INSERT INTO `complaints` (`id`, `uid`, `title`, `content`, `contact`, `addtime`) VALUES
(1, 1, NULL, '浏览内容', NULL, '2018-09-26 16:39:40'),
(2, 2, NULL, '浏览内容', NULL, '2018-09-26 16:40:13'),
(3, 3, NULL, '浏览内容', NULL, '2018-09-26 16:40:38'),
(4, 4, NULL, '浏览内容', NULL, '2018-09-26 16:41:04'),
(5, 2, NULL, '浏览内容', NULL, '2018-09-26 16:42:46'),
(6, 3, NULL, '浏览内容', NULL, '2018-09-26 16:43:06'),
(7, 1, NULL, '浏览内容', NULL, '2018-09-26 16:43:13'),
(8, 1, NULL, '浏览内容', NULL, '2018-09-26 16:43:21'),
(9, 3, NULL, 'content', NULL, '2018-09-26 16:45:44'),
(10, 2, '11', '22', '333', '2018-09-27 11:29:04'),
(11, 2, '关于投诉建议', '关于投诉建议关于投诉建议关于投诉建议关于投诉建议', 'qq 626480208', '2018-09-27 11:30:42');

-- --------------------------------------------------------

--
-- 表的结构 `confs`
--

CREATE TABLE `confs` (
  `id` int(10) UNSIGNED NOT NULL,
  `qr_code` varchar(255) DEFAULT NULL COMMENT '二维码',
  `address` varchar(255) DEFAULT NULL COMMENT '公司地址',
  `email` varchar(255) DEFAULT NULL COMMENT '公司邮箱',
  `mobile` varchar(255) DEFAULT NULL COMMENT '电话',
  `zip_code` varchar(255) DEFAULT NULL COMMENT '邮编',
  `switchboard` varchar(255) DEFAULT NULL COMMENT '总机电话',
  `adv_mobile` varchar(255) DEFAULT NULL COMMENT '广告服务电话',
  `c_map` varchar(255) DEFAULT NULL COMMENT '公司地图',
  `record` varchar(255) DEFAULT NULL COMMENT '备案号',
  `up_ins` text COMMENT '上传须知',
  `logo` varchar(255) DEFAULT NULL COMMENT 'logo',
  `logo_int` varchar(255) DEFAULT NULL COMMENT 'logo导语',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `vip_ins` text,
  `upload_rules` text COMMENT '上传规则'
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- 转存表中的数据 `confs`
--

INSERT INTO `confs` (`id`, `qr_code`, `address`, `email`, `mobile`, `zip_code`, `switchboard`, `adv_mobile`, `c_map`, `record`, `up_ins`, `logo`, `logo_int`, `created_at`, `updated_at`, `vip_ins`, `upload_rules`) VALUES
(1, '/uploads/Conf/153360869034169424.jpg', '云南省双柏县鄂嘉镇嘉盛路100号', 'explorernetwork@163.com', '0878-7813222', '675107', '0878-7813222', '15125832849', '/uploads/Conf/153360848476852623.jpg', '滇ICP备18005533号', '<p><span style="font-size: 14px;">1. 上传的文件应为软件的安装包或压缩包。（如：exe、rar、zip等格式）；&nbsp; &nbsp; &nbsp; &nbsp;&nbsp;</span></p><p><span style="font-size: 14px;">2. 上传的资源大小不得大于512M；&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</span></p><p style="margin-top: 0px; padding: 0px; word-wrap: break-word; color: rgb(51, 51, 51); line-height: 1.7; font-family: Verdana, Arial, Helvetica, sans-serif; font-size: 14px; white-space: normal; background-color: rgb(255, 255, 255);"><br/></p><p><br/></p>', '/uploads/Conf/152228614929870971.png', 'Hi,欢迎来到双柏探路者网络有限公司', NULL, '2018-08-07 03:50:54', '<p style="text-align: left;"><span style="font-size: 14px;">1、用户名为用户在本站的唯一身份标识，一经注册则不可更改。</span></p><p style="text-align: left;"><span style="font-size: 14px;">2、请填写真实有效的电子邮件，以便网站及时与您取得联系，同时也是密码找回的重要途径。</span></p><p style="text-align: left;"><span style="font-size: 14px;">3、请务必填写真实有效的联系电话，以便网站及时与您取得联系，同时也是密码找回的重要途径。</span></p><p style="text-align: left;"><span style="font-size: 14px;">4、为保证账户安全，请妥善保管好个人的账户密码，不要轻易告诉他人。由于账户密码遗忘以及个人原因所造成的个人损失，本网站不负任何责任。</span></p><p style="text-align: left;"><span style="font-size: 14px;">5、本站昵称、邮箱、登陆密码、电话号码、密保问题及答案均可修改。</span></p><p><br/></p><p><br/></p>', '<p><span style="font-size: 14px;">软件和资料上传规则:<br/>&nbsp; &nbsp; a. 禁止上传任何反动、病毒、淫秽的内容.<br/>&nbsp; &nbsp; b. 禁止上传任何重复、加密、内容无关的软件.<br/>&nbsp; &nbsp; c. 上传软件和资料时最好进行分包压缩处理，严禁不经压缩直接上传软件和资料.<br/>&nbsp; &nbsp; d. 上传软件或资料名必须是原软件或资料名，不能以其它任何名代替.<br/>&nbsp; &nbsp; e. 对于违反上述内容、警告，情节严重，屡教不改的，网站将做封号处理.</span></p>');

-- --------------------------------------------------------

--
-- 表的结构 `encrypteds`
--

CREATE TABLE `encrypteds` (
  `id` int(10) UNSIGNED NOT NULL,
  `encry` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- 转存表中的数据 `encrypteds`
--

INSERT INTO `encrypteds` (`id`, `encry`, `created_at`, `updated_at`) VALUES
(6, '你的第一所小学叫什么名字', '2018-03-29 06:29:54', '2018-03-29 06:29:54'),
(3, '你父亲的名字', '2018-03-29 06:23:49', '2018-03-29 06:23:49'),
(4, '你母亲的名字', '2018-03-29 06:24:07', '2018-03-29 06:24:07'),
(5, '你爱人的名字', '2018-03-29 06:24:16', '2018-03-29 06:24:16'),
(7, '你最爱吃什么水果', '2018-03-29 06:30:24', '2018-03-29 06:30:24'),
(9, '你最喜欢的明星是？', '2018-05-11 07:58:28', '2018-05-11 07:58:28');

-- --------------------------------------------------------

--
-- 表的结构 `helps`
--

CREATE TABLE `helps` (
  `id` int(10) UNSIGNED NOT NULL,
  `title` varchar(255) NOT NULL COMMENT '帮助中心标题',
  `description` varchar(255) NOT NULL COMMENT '帮助中心描述',
  `content` text NOT NULL COMMENT '帮助中心内容',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- 表的结构 `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- 转存表中的数据 `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(3, '2018_03_08_102413_create_column_table', 1),
(4, '2018_03_13_100146_create_admin_users_table', 2),
(5, '2018_03_21_113451_create_abouts_table', 3),
(6, '2018_03_21_142011_create_banners_table', 4),
(7, '2018_03_22_160830_create_navs_table', 5),
(8, '2018_03_27_171655_create_confs_table', 6),
(9, '2018_03_28_094121_create_helps_table', 7),
(10, '2018_03_28_114358_create_caties_table', 8),
(11, '2018_03_29_131502_create_users_table', 9),
(12, '2018_03_29_141049_create_encrypteds_table', 10),
(13, '2018_03_30_112531_create_adv_images_table', 11),
(14, '2018_04_03_112543_create_software_table', 12),
(15, '2018_04_03_145515_create_user_downs_table', 13),
(16, '2018_04_03_145629_create_user_comments_table', 13),
(17, '2018_04_10_105837_create_certs_table', 14);

-- --------------------------------------------------------

--
-- 表的结构 `navs`
--

CREATE TABLE `navs` (
  `id` int(11) NOT NULL,
  `nav_name` varchar(255) NOT NULL,
  `created_at` varchar(255) NOT NULL,
  `updated_at` varchar(255) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- 转存表中的数据 `navs`
--

INSERT INTO `navs` (`id`, `nav_name`, `created_at`, `updated_at`) VALUES
(1, '首页广告位轮播一', '2018-03-28 11:34:25', '2018-03-28 11:34:25'),
(2, '首页广告位轮播二', '2018-03-28 11:34:37', '2018-03-28 11:34:37'),
(3, '首页广告位轮播三', '2018-03-28 11:34:51', '2018-03-28 11:34:51'),
(4, '公司信息页广告轮播左', '2018-03-28 11:35:05', '2018-03-28 11:35:05'),
(5, '公司信息页广告轮播右', '2018-03-28 11:35:27', '2018-03-28 11:35:27'),
(6, '列表页广告轮播上', '2018-03-28 11:35:35', '2018-03-28 11:35:35'),
(7, '列表页广告轮播中', '2018-03-28 11:35:44', '2018-03-28 11:35:44'),
(8, '详情页广告轮播', '2018-03-28 11:36:21', '2018-03-28 11:36:21');

-- --------------------------------------------------------

--
-- 表的结构 `news`
--

CREATE TABLE `news` (
  `news_id` int(11) NOT NULL,
  `uid` int(11) NOT NULL,
  `msg` text NOT NULL,
  `create_time` varchar(255) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- 转存表中的数据 `news`
--

INSERT INTO `news` (`news_id`, `uid`, `msg`, `create_time`) VALUES
(2, 3, '恭喜您,您的认证信息已经审核通过了', '1526612206'),
(8, 2, '恭喜您,您的认证信息已经审核通过了', '1535210493');

-- --------------------------------------------------------

--
-- 表的结构 `software`
--

CREATE TABLE `software` (
  `id` int(10) UNSIGNED NOT NULL,
  `uid` int(11) NOT NULL COMMENT '用户id',
  `software` varchar(255) NOT NULL COMMENT '软件路径',
  `cover` varchar(255) NOT NULL COMMENT '封面图',
  `softwarename` varchar(255) NOT NULL COMMENT '软件名称',
  `softwaretype` varchar(255) NOT NULL COMMENT '软件类型',
  `platform` varchar(255) NOT NULL COMMENT '使用平台',
  `charge` varchar(255) NOT NULL COMMENT '是否免费 1 为免费 0 为收费',
  `EffectOne` varchar(255) DEFAULT NULL COMMENT '图片展示1',
  `EffectTwo` varchar(255) DEFAULT NULL COMMENT '图片展示2',
  `EffectThree` varchar(255) DEFAULT NULL COMMENT '图片展示3',
  `EffectFour` varchar(255) DEFAULT NULL COMMENT '图片展示4',
  `software_size` varchar(255) NOT NULL COMMENT '软件大小',
  `description` text NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `is_status` int(11) DEFAULT '0',
  `recommen_time` varchar(255) DEFAULT NULL,
  `is_person` int(11) DEFAULT '0' COMMENT '是否个性推荐',
  `is_shuff` int(11) DEFAULT '0' COMMENT '是否轮播推荐',
  `shuff_time` varchar(255) DEFAULT NULL COMMENT '推荐轮播位的时间'
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- 转存表中的数据 `software`
--

INSERT INTO `software` (`id`, `uid`, `software`, `cover`, `softwarename`, `softwaretype`, `platform`, `charge`, `EffectOne`, `EffectTwo`, `EffectThree`, `EffectFour`, `software_size`, `description`, `created_at`, `updated_at`, `is_status`, `recommen_time`, `is_person`, `is_shuff`, `shuff_time`) VALUES
(4, 1, '/uploads/software/152317099974573242.zip', '/uploads/software_img/152317099988280609.png', '什么什么源码as', '7', 'windows', '0', '/uploads/software_img/152317099971086730.jpg', '/uploads/software_img/152317099982594635.jpg', '/uploads/software_img/152324051419731689.png', '/uploads/software_img/152317099951723602.jpg', '30.32 MB', 'asdasdas', '2018-04-08 07:03:19', '2018-04-13 03:40:53', 1, '1523519124', 1, 1, '1523590853'),
(7, 2, '/uploads/software/152539900940235200.zip', '/uploads/software_img/152539900919968980.jpg', '淘宝购物车', '1', 'windows', '1', '/uploads/software_img/152539900978034720.jpg', NULL, NULL, NULL, '144.22 KB', '淘宝购物车', '2018-05-04 01:56:49', '2018-05-18 01:09:42', 1, '1525836864', 1, 1, '1525836946'),
(6, 2, '/uploads/software/152350012174731273.zip', '/uploads/software_img/152350012160121427.jpg', '购物车as', '1', '火狐  谷歌   ie  360', '1', '/uploads/software_img/152350012296148420.jpg', '/uploads/software_img/152350012258174675.png', NULL, NULL, '287.51 KB', '购物车', '2018-04-12 02:28:42', '2018-05-09 03:35:47', 1, '1525836865', 1, 1, '1525836947'),
(8, 3, '/uploads/software/152540309272046198.zip', '/uploads/software_img/152540309222086936.jpg', '新型元素', '5', '新型元素', '1', '/uploads/software_img/152540309281583364.jpg', NULL, NULL, NULL, '3.58 MB', '新型元素', '2018-05-04 03:04:52', '2018-05-09 03:27:56', 1, '1525836424', 1, 1, '1525836476'),
(10, 3, '/uploads/software/152540309272046198.zip', '/uploads/software_img/152540309222086936.jpg', '新型元素', '5', '新型元素', '1', '/uploads/software_img/152540309281583364.jpg', NULL, NULL, NULL, '3.58 MB', '新型元素', '2018-05-04 03:04:52', '2018-05-09 03:27:56', 1, '1525836424', 1, 1, '1525836476'),
(11, 3, '/uploads/software/152540309272046198.zip', '/uploads/software_img/152540309222086936.jpg', '新型元素', '5', '新型元素', '1', '/uploads/software_img/152540309281583364.jpg', NULL, NULL, NULL, '3.58 MB', '新型元素', '2018-05-04 03:04:52', '2018-05-09 03:27:56', 1, '1525836424', 1, 1, '1525836476'),
(12, 3, '/uploads/software/152540309272046198.zip', '/uploads/software_img/152540309222086936.jpg', '新型元素', '5', '新型元素', '1', '/uploads/software_img/152540309281583364.jpg', NULL, NULL, NULL, '3.58 MB', '新型元素', '2018-05-04 03:04:52', '2018-05-09 03:27:56', 1, '1525836424', 1, 1, '1525836476'),
(13, 1, '/uploads/software/152540309272046198.zip', '/uploads/software_img/152540309222086936.jpg', '新型元素', '5', '新型元素', '1', '/uploads/software_img/152540309281583364.jpg', NULL, NULL, NULL, '3.58 MB', '新型元素', '2018-05-04 03:04:52', '2018-05-09 03:27:56', 1, '1525836424', 1, 1, '1525836476'),
(14, 2, '/uploads/software/152540309272046198.zip', '/uploads/software_img/152540309222086936.jpg', '新型元素', '5', '新型元素', '1', '/uploads/software_img/152540309281583364.jpg', NULL, NULL, NULL, '3.58 MB', '新型元素', '2018-05-04 03:04:52', '2018-05-09 03:27:56', 1, '1525836424', 1, 1, '1525836476'),
(15, 2, '/uploads/software/152540309272046198.zip', '/uploads/software_img/152540309222086936.jpg', '新型元素', '5', '新型元素', '1', '/uploads/software_img/152540309281583364.jpg', NULL, NULL, NULL, '3.58 MB', '新型元素', '2018-05-04 03:04:52', '2018-05-09 03:27:56', 1, '1525836424', 1, 1, '1525836476'),
(16, 1, '/uploads/software/152540309272046198.zip', '/uploads/software_img/152540309222086936.jpg', '新型元素', '5', '新型元素', '1', '/uploads/software_img/152540309281583364.jpg', NULL, NULL, NULL, '3.58 MB', '新型元素', '2018-05-04 03:04:52', '2018-05-09 03:27:56', 1, '1525836424', 1, 1, '1525836476'),
(17, 2, '/uploads/software/152540309272046198.zip', '/uploads/software_img/152540309222086936.jpg', '新型元素', '5', '新型元素', '1', '/uploads/software_img/152540309281583364.jpg', NULL, NULL, NULL, '3.58 MB', '新型元素', '2018-05-04 03:04:52', '2018-05-09 03:27:56', 1, '1525836424', 1, 1, '1525836476'),
(18, 1, '/uploads/software/152540309272046198.zip', '/uploads/software_img/152540309222086936.jpg', '新型元素', '5', '新型元素', '1', '/uploads/software_img/152540309281583364.jpg', NULL, NULL, NULL, '3.58 MB', '新型元素', '2018-05-04 03:04:52', '2018-05-09 03:27:56', 1, '1525836424', 1, 1, '1525836476'),
(19, 3, '/uploads/software/152540309272046198.zip', '/uploads/software_img/152540309222086936.jpg', '新型元素', '5', '新型元素', '1', '/uploads/software_img/152540309281583364.jpg', NULL, NULL, NULL, '3.58 MB', '新型元素', '2018-05-04 03:04:52', '2018-05-09 03:27:56', 1, '1525836424', 1, 1, '1525836476'),
(20, 3, '/uploads/software/152540309272046198.zip', '/uploads/software_img/152540309222086936.jpg', '新型元素', '5', '新型元素', '1', '/uploads/software_img/152540309281583364.jpg', NULL, NULL, NULL, '3.58 MB', '新型元素', '2018-05-04 03:04:52', '2018-05-09 03:27:56', 1, '1525836424', 1, 1, '1525836476'),
(21, 3, '/uploads/software/152540309272046198.zip', '/uploads/software_img/152540309222086936.jpg', '新型元素', '5', '新型元素', '1', '/uploads/software_img/152540309281583364.jpg', NULL, NULL, NULL, '3.58 MB', '新型元素', '2018-05-04 03:04:52', '2018-05-09 03:27:56', 1, '1525836424', 1, 1, '1525836476'),
(22, 1, '/uploads/software/152540309272046198.zip', '/uploads/software_img/152540309222086936.jpg', '新型元素', '5', '新型元素', '1', '/uploads/software_img/152540309281583364.jpg', NULL, NULL, NULL, '3.58 MB', '新型元素', '2018-05-04 03:04:52', '2018-05-09 03:27:56', 1, '1525836424', 1, 1, '1525836476'),
(23, 3, '/uploads/software/152540309272046198.zip', '/uploads/software_img/152540309222086936.jpg', '新型元素', '5', '新型元素', '1', '/uploads/software_img/152540309281583364.jpg', NULL, NULL, NULL, '3.58 MB', '新型元素', '2018-05-04 03:04:52', '2018-05-09 03:27:56', 1, '1525836424', 1, 1, '1525836476'),
(24, 3, '/uploads/software/152540309272046198.zip', '/uploads/software_img/152540309222086936.jpg', '新型元素', '5', '新型元素', '1', '/uploads/software_img/152540309281583364.jpg', NULL, NULL, NULL, '3.58 MB', '新型元素', '2018-05-04 03:04:52', '2018-05-09 03:27:56', 1, '1525836424', 1, 1, '1525836476'),
(25, 3, '/uploads/software/152540309272046198.zip', '/uploads/software_img/152540309222086936.jpg', '新型元素', '5', '新型元素', '1', '/uploads/software_img/152540309281583364.jpg', NULL, NULL, NULL, '3.58 MB', '新型元素', '2018-05-04 03:04:52', '2018-05-09 03:27:56', 1, '1525836424', 1, 1, '1525836476'),
(26, 3, '/uploads/software/152540309272046198.zip', '/uploads/software_img/152540309222086936.jpg', '新型元素', '5', '新型元素', '1', '/uploads/software_img/152540309281583364.jpg', NULL, NULL, NULL, '3.58 MB', '新型元素', '2018-05-04 03:04:52', '2018-05-09 03:27:56', 1, '1525836424', 1, 1, '1525836476'),
(27, 1, '/uploads/software/152540309272046198.zip', '/uploads/software_img/152540309222086936.jpg', '新型元素', '5', '新型元素', '1', '/uploads/software_img/152540309281583364.jpg', NULL, NULL, NULL, '3.58 MB', '新型元素', '2018-05-04 03:04:52', '2018-05-09 03:27:56', 1, '1525836424', 1, 1, '1525836476'),
(28, 3, '/uploads/software/152540309272046198.zip', '/uploads/software_img/152540309222086936.jpg', '新型元素', '4', '新型元素', '1', '/uploads/software_img/152540309281583364.jpg', NULL, NULL, NULL, '3.58 MB', '新型元素', '2018-05-04 03:04:52', '2018-05-09 03:27:56', 1, '1525836424', 1, 1, '1525836476'),
(29, 3, '/uploads/software/152540309272046198.zip', '/uploads/software_img/152540309222086936.jpg', '新型元素', '5', '新型元素', '1', '/uploads/software_img/152540309281583364.jpg', NULL, NULL, NULL, '3.58 MB', '新型元素', '2018-05-04 03:04:52', '2018-05-09 03:27:56', 1, '1525836424', 1, 1, '1525836476'),
(30, 3, '/uploads/software/152540309272046198.zip', '/uploads/software_img/152540309222086936.jpg', '石材厂', '3', '新型元素', '1', '/uploads/software_img/152540309281583364.jpg', NULL, NULL, NULL, '3.58 MB', '新型元素', '2018-05-04 03:04:52', '2018-05-09 03:27:56', 1, '1525836424', 1, 1, '1525836476'),
(31, 3, '/uploads/software/152540309272046198.zip', '/uploads/software_img/152540309222086936.jpg', '啊擦啊', '5', '新型元素', '1', '/uploads/software_img/152540309281583364.jpg', NULL, NULL, NULL, '3.58 MB', '新型元素', '2018-05-04 03:04:52', '2018-05-09 03:27:56', 1, '1525836424', 1, 1, '1525836476'),
(32, 3, '/uploads/software/152540309272046198.zip', '/uploads/software_img/152540309222086936.jpg', '新型元素', '1', '新型元素', '1', '/uploads/software_img/152540309281583364.jpg', NULL, NULL, NULL, '3.58 MB', '新型元素', '2018-05-04 03:04:52', '2018-05-09 03:27:56', 1, '1525836424', 1, 1, '1525836476'),
(33, 1, '/uploads/software/152540309272046198.zip', '/uploads/software_img/152540309222086936.jpg', '新型元素', '6', '新型元素', '1', '/uploads/software_img/152540309281583364.jpg', NULL, NULL, NULL, '3.58 MB', '新型元素', '2018-05-04 03:04:52', '2018-05-09 03:27:56', 1, '1525836424', 1, 1, '1525836476'),
(34, 3, '/uploads/software/152540309272046198.zip', '/uploads/software_img/152540309222086936.jpg', '新型元素', '2', '新型元素', '1', '/uploads/software_img/152540309281583364.jpg', NULL, NULL, NULL, '3.58 MB', '新型元素', '2018-05-04 03:04:52', '2018-05-09 03:27:56', 1, '1525836424', 1, 1, '1525836476'),
(35, 3, '/uploads/software/152540309272046198.zip', '/uploads/software_img/152540309222086936.jpg', '新型元素', '5', '新型元素', '1', '/uploads/software_img/152540309281583364.jpg', NULL, NULL, NULL, '3.58 MB', '新型元素', '2018-05-04 03:04:52', '2018-05-09 03:27:56', 1, '1525836424', 1, 1, '1525836476'),
(36, 3, '/uploads/software/152540309272046198.zip', '/uploads/software_img/152540309222086936.jpg', '爱上擦擦', '3', '新型元素', '1', '/uploads/software_img/152540309281583364.jpg', NULL, NULL, NULL, '3.58 MB', '新型元素', '2018-05-04 03:04:52', '2018-05-09 03:27:56', 1, '1525836424', 1, 1, '1525836476'),
(37, 3, '/uploads/software/152540309272046198.zip', '/uploads/software_img/152540309222086936.jpg', '新型元素', '5', '新型元素', '1', '/uploads/software_img/152540309281583364.jpg', NULL, NULL, NULL, '3.58 MB', '新型元素', '2018-05-04 03:04:52', '2018-05-09 03:27:56', 1, '1525836424', 1, 1, '1525836476'),
(38, 3, '/uploads/software/152540309272046198.zip', '/uploads/software_img/152540309222086936.jpg', '新型元素', '5', '新型元素', '1', '/uploads/software_img/152540309281583364.jpg', NULL, NULL, NULL, '3.58 MB', '新型元素', '2018-05-04 03:04:52', '2018-05-09 03:27:56', 1, '1525836424', 1, 1, '1525836476'),
(39, 3, '/uploads/software/152540309272046198.zip', '/uploads/software_img/152540309222086936.jpg', '新型元素', '5', '新型元素', '1', '/uploads/software_img/152540309281583364.jpg', NULL, NULL, NULL, '3.58 MB', '新型元素', '2018-05-04 03:04:52', '2018-05-09 03:27:56', 1, '1525836424', 1, 1, '1525836476'),
(40, 2, '/uploads/software/152540309272046198.zip', '/uploads/software_img/152540309222086936.jpg', '新型元素', '5', '新型元素', '1', '/uploads/software_img/152540309281583364.jpg', NULL, NULL, NULL, '3.58 MB', '新型元素', '2018-05-04 03:04:52', '2018-05-09 03:27:56', 1, '1525836424', 1, 1, '1525836476'),
(41, 3, '/uploads/software/152540309272046198.zip', '/uploads/software_img/152540309222086936.jpg', '新型元素', '5', '新型元素', '1', '/uploads/software_img/152540309281583364.jpg', NULL, NULL, NULL, '3.58 MB', '新型元素', '2018-05-04 03:04:52', '2018-05-09 03:27:56', 1, '1525836424', 1, 1, '1525836476'),
(42, 3, '/uploads/software/152540309272046198.zip', '/uploads/software_img/152540309222086936.jpg', '新型元素', '5', '新型元素', '1', '/uploads/software_img/152540309281583364.jpg', NULL, NULL, NULL, '3.58 MB', '新型元素', '2018-05-04 03:04:52', '2018-05-09 03:27:56', 1, '1525836424', 1, 1, '1525836476'),
(43, 3, '/uploads/software/152540309272046198.zip', '/uploads/software_img/152540309222086936.jpg', '新型元素', '5', '新型元素', '1', '/uploads/software_img/152540309281583364.jpg', NULL, NULL, NULL, '3.58 MB', '新型元素', '2018-05-04 03:04:52', '2018-05-09 03:27:56', 1, '1525836424', 1, 1, '1525836476'),
(44, 3, '/uploads/software/152540309272046198.zip', '/uploads/software_img/152540309222086936.jpg', '新型元素', '5', '新型元素', '1', '/uploads/software_img/152540309281583364.jpg', NULL, NULL, NULL, '3.58 MB', '新型元素', '2018-05-04 03:04:52', '2018-05-09 03:27:56', 1, '1525836424', 1, 1, '1525836476'),
(45, 3, '/uploads/software/152540309272046198.zip', '/uploads/software_img/152540309222086936.jpg', '新型元素', '5', '新型元素', '1', '/uploads/software_img/152540309281583364.jpg', NULL, NULL, NULL, '3.58 MB', '新型元素', '2018-05-04 03:04:52', '2018-05-09 03:27:56', 1, '1525836424', 1, 1, '1525836476'),
(46, 3, '/uploads/software/152540309272046198.zip', '/uploads/software_img/152540309222086936.jpg', '新型元素', '5', '新型元素', '1', '/uploads/software_img/152540309281583364.jpg', NULL, NULL, NULL, '3.58 MB', '新型元素', '2018-05-04 03:04:52', '2018-05-09 03:27:56', 1, '1525836424', 1, 1, '1525836476'),
(47, 2, '/uploads/software/152540309272046198.zip', '/uploads/software_img/152540309222086936.jpg', '新型元素', '5', '新型元素', '1', '/uploads/software_img/152540309281583364.jpg', NULL, NULL, NULL, '3.58 MB', '新型元素', '2018-05-04 03:04:52', '2018-05-09 03:27:56', 1, '1525836424', 1, 1, '1525836476'),
(48, 3, '/uploads/software/152540309272046198.zip', '/uploads/software_img/152540309222086936.jpg', '新型元素', '5', '新型元素', '1', '/uploads/software_img/152540309281583364.jpg', NULL, NULL, NULL, '3.58 MB', '新型元素', '2018-05-04 03:04:52', '2018-05-09 03:27:56', 1, '1525836424', 1, 1, '1525836476'),
(49, 3, '/uploads/software/152540309272046198.zip', '/uploads/software_img/152540309222086936.jpg', '新型元素', '5', '新型元素', '1', '/uploads/software_img/152540309281583364.jpg', NULL, NULL, NULL, '3.58 MB', '新型元素', '2018-05-04 03:04:52', '2018-05-09 03:27:56', 1, '1525836424', 1, 1, '1525836476'),
(50, 3, '/uploads/software/152540309272046198.zip', '/uploads/software_img/152540309222086936.jpg', '新型元素', '5', '新型元素', '1', '/uploads/software_img/152540309281583364.jpg', NULL, NULL, NULL, '3.58 MB', '新型元素', '2018-05-04 03:04:52', '2018-05-09 03:27:56', 1, '1525836424', 1, 1, '1525836476'),
(51, 3, '/uploads/software/152540309272046198.zip', '/uploads/software_img/152540309222086936.jpg', '新型元素', '5', '新型元素', '1', '/uploads/software_img/152540309281583364.jpg', NULL, NULL, NULL, '3.58 MB', '新型元素', '2018-05-04 03:04:52', '2018-05-09 03:27:56', 1, '1525836424', 1, 1, '1525836476'),
(52, 3, '/uploads/software/152540309272046198.zip', '/uploads/software_img/152540309222086936.jpg', '新型元素', '5', '新型元素', '1', '/uploads/software_img/152540309281583364.jpg', NULL, NULL, NULL, '3.58 MB', '新型元素', '2018-05-04 03:04:52', '2018-05-09 03:27:56', 1, '1525836424', 1, 1, '1525836476'),
(53, 2, '/uploads/software/152540309272046198.zip', '/uploads/software_img/152540309222086936.jpg', '新型元素', '5', '新型元素', '1', '/uploads/software_img/152540309281583364.jpg', NULL, NULL, NULL, '3.58 MB', '新型元素', '2018-05-04 03:04:52', '2018-05-09 03:27:56', 1, '1525836424', 1, 1, '1525836476'),
(54, 3, '/uploads/software/152540309272046198.zip', '/uploads/software_img/152540309222086936.jpg', '新型元素', '5', '新型元素', '1', '/uploads/software_img/152540309281583364.jpg', NULL, NULL, NULL, '3.58 MB', '新型元素', '2018-05-04 03:04:52', '2018-05-09 03:27:56', 1, '1525836424', 1, 1, '1525836476'),
(55, 3, '/uploads/software/152540309272046198.zip', '/uploads/software_img/152540309222086936.jpg', '新型元素', '5', '新型元素', '1', '/uploads/software_img/152540309281583364.jpg', NULL, NULL, NULL, '3.58 MB', '新型元素', '2018-05-04 03:04:52', '2018-05-09 03:27:56', 1, '1525836424', 1, 1, '1525836476'),
(56, 2, '/uploads/software/152540309272046198.zip', '/uploads/software_img/152540309222086936.jpg', '新型元素', '5', '新型元素', '1', '/uploads/software_img/152540309281583364.jpg', NULL, NULL, NULL, '3.58 MB', '新型元素', '2018-05-04 03:04:52', '2018-05-09 03:27:56', 1, '1525836424', 1, 1, '1525836476'),
(57, 3, '/uploads/software/152540309272046198.zip', '/uploads/software_img/152540309222086936.jpg', '新型元素', '5', '新型元素', '1', '/uploads/software_img/152540309281583364.jpg', NULL, NULL, NULL, '3.58 MB', '新型元素', '2018-05-04 03:04:52', '2018-05-09 03:27:56', 1, '1525836424', 1, 1, '1525836476'),
(58, 3, '/uploads/software/152540309272046198.zip', '/uploads/software_img/152540309222086936.jpg', '新型元素', '5', '新型元素', '1', '/uploads/software_img/152540309281583364.jpg', NULL, NULL, NULL, '3.58 MB', '新型元素', '2018-05-04 03:04:52', '2018-05-09 03:27:56', 1, '1525836424', 1, 1, '1525836476'),
(59, 3, '/uploads/software/152540309272046198.zip', '/uploads/software_img/152540309222086936.jpg', '新型元素', '5', '新型元素', '1', '/uploads/software_img/152540309281583364.jpg', NULL, NULL, NULL, '3.58 MB', '新型元素', '2018-05-04 03:04:52', '2018-05-09 03:27:56', 1, '1525836424', 1, 1, '1525836476'),
(60, 3, '/uploads/software/152540309272046198.zip', '/uploads/software_img/152540309222086936.jpg', '新型元素', '5', '新型元素', '1', '/uploads/software_img/152540309281583364.jpg', NULL, NULL, NULL, '3.58 MB', '新型元素', '2018-05-04 03:04:52', '2018-05-09 03:27:56', 1, '1525836424', 1, 1, '1525836476'),
(61, 3, '/uploads/software/152540309272046198.zip', '/uploads/software_img/152540309222086936.jpg', '新型元素', '5', '新型元素', '1', '/uploads/software_img/152540309281583364.jpg', NULL, NULL, NULL, '3.58 MB', '新型元素', '2018-05-04 03:04:52', '2018-05-09 03:27:56', 1, '1525836424', 1, 1, '1525836476'),
(62, 1, '/uploads/software/152540309272046198.zip', '/uploads/software_img/152540309222086936.jpg', '新型元素', '5', '新型元素', '1', '/uploads/software_img/152540309281583364.jpg', NULL, NULL, NULL, '3.58 MB', '新型元素', '2018-05-04 03:04:52', '2018-05-09 03:27:56', 1, '1525836424', 1, 1, '1525836476'),
(63, 3, '/uploads/software/152540309272046198.zip', '/uploads/software_img/152540309222086936.jpg', '新型元素', '5', '新型元素', '1', '/uploads/software_img/152540309281583364.jpg', NULL, NULL, NULL, '3.58 MB', '新型元素', '2018-05-04 03:04:52', '2018-05-09 03:27:56', 1, '1525836424', 1, 1, '1525836476'),
(64, 3, '/uploads/software/152540309272046198.zip', '/uploads/software_img/152540309222086936.jpg', '新型元素', '5', '新型元素', '1', '/uploads/software_img/152540309281583364.jpg', NULL, NULL, NULL, '3.58 MB', '新型元素', '2018-05-04 03:04:52', '2018-05-09 03:27:56', 1, '1525836424', 1, 1, '1525836476'),
(65, 3, '/uploads/software/152540309272046198.zip', '/uploads/software_img/152540309222086936.jpg', '新型元素', '5', '新型元素', '1', '/uploads/software_img/152540309281583364.jpg', NULL, NULL, NULL, '3.58 MB', '新型元素', '2018-05-04 03:04:52', '2018-05-09 03:27:56', 1, '1525836424', 1, 1, '1525836476'),
(66, 3, '/uploads/software/152540309272046198.zip', '/uploads/software_img/152540309222086936.jpg', '新型元素', '5', '新型元素', '1', '/uploads/software_img/152540309281583364.jpg', NULL, NULL, NULL, '3.58 MB', '新型元素', '2018-05-04 03:04:52', '2018-05-09 03:27:56', 1, '1525836424', 1, 1, '1525836476'),
(67, 2, '/uploads/software/152540309272046198.zip', '/uploads/software_img/152540309222086936.jpg', '新型元素', '5', '新型元素', '1', '/uploads/software_img/152540309281583364.jpg', NULL, NULL, NULL, '3.58 MB', '新型元素', '2018-05-04 03:04:52', '2018-05-09 03:27:56', 1, '1525836424', 1, 1, '1525836476'),
(68, 3, '/uploads/software/152540309272046198.zip', '/uploads/software_img/152540309222086936.jpg', '新型元素', '5', '新型元素', '1', '/uploads/software_img/152540309281583364.jpg', NULL, NULL, NULL, '3.58 MB', '新型元素', '2018-05-04 03:04:52', '2018-05-09 03:27:56', 1, '1525836424', 1, 1, '1525836476'),
(69, 3, '/uploads/software/152540309272046198.zip', '/uploads/software_img/152540309222086936.jpg', '新型元素', '5', '新型元素', '1', '/uploads/software_img/152540309281583364.jpg', NULL, NULL, NULL, '3.58 MB', '新型元素', '2018-05-04 03:04:52', '2018-05-09 03:27:56', 1, '1525836424', 1, 1, '1525836476'),
(70, 3, '/uploads/software/152540309272046198.zip', '/uploads/software_img/152540309222086936.jpg', '新型元素', '5', '新型元素', '1', '/uploads/software_img/152540309281583364.jpg', NULL, NULL, NULL, '3.58 MB', '新型元素', '2018-05-04 03:04:52', '2018-05-09 03:27:56', 1, '1525836424', 1, 1, '1525836476'),
(71, 1, '/uploads/software/152540309272046198.zip', '/uploads/software_img/152540309222086936.jpg', '新型元素', '5', '新型元素', '1', '/uploads/software_img/152540309281583364.jpg', NULL, NULL, NULL, '3.58 MB', '新型元素', '2018-05-04 03:04:52', '2018-05-09 03:27:56', 1, '1525836424', 1, 1, '1525836476'),
(72, 3, '/uploads/software/152540309272046198.zip', '/uploads/software_img/152540309222086936.jpg', '新型元素', '5', '新型元素', '1', '/uploads/software_img/152540309281583364.jpg', NULL, NULL, NULL, '3.58 MB', '新型元素', '2018-05-04 03:04:52', '2018-05-09 03:27:56', 1, '1525836424', 1, 1, '1525836476'),
(73, 3, '/uploads/software/152540309272046198.zip', '/uploads/software_img/152540309222086936.jpg', '新型元素', '5', '新型元素', '1', '/uploads/software_img/152540309281583364.jpg', NULL, NULL, NULL, '3.58 MB', '新型元素', '2018-05-04 03:04:52', '2018-05-09 03:27:56', 1, '1525836424', 1, 1, '1525836476'),
(74, 3, '/uploads/software/152540309272046198.zip', '/uploads/software_img/152540309222086936.jpg', '新型元素', '5', '新型元素', '1', '/uploads/software_img/152540309281583364.jpg', NULL, NULL, NULL, '3.58 MB', '新型元素', '2018-05-04 03:04:52', '2018-05-09 03:27:56', 1, '1525836424', 1, 1, '1525836476'),
(75, 3, '/uploads/software/152540309272046198.zip', '/uploads/software_img/152540309222086936.jpg', '新型元素', '5', '新型元素', '1', '/uploads/software_img/152540309281583364.jpg', NULL, NULL, NULL, '3.58 MB', '新型元素', '2018-05-04 03:04:52', '2018-05-09 03:27:56', 1, '1525836424', 1, 1, '1525836476'),
(76, 3, '/uploads/software/152540309272046198.zip', '/uploads/software_img/152540309222086936.jpg', '新型元素', '5', '新型元素', '1', '/uploads/software_img/152540309281583364.jpg', NULL, NULL, NULL, '3.58 MB', '新型元素', '2018-05-04 03:04:52', '2018-05-09 03:27:56', 1, '1525836424', 1, 1, '1525836476'),
(77, 3, '/uploads/software/152540309272046198.zip', '/uploads/software_img/152540309222086936.jpg', '新型元素', '5', '新型元素', '1', '/uploads/software_img/152540309281583364.jpg', NULL, NULL, NULL, '3.58 MB', '新型元素', '2018-05-04 03:04:52', '2018-05-09 03:27:56', 1, '1525836424', 1, 1, '1525836476'),
(78, 3, '/uploads/software/152540309272046198.zip', '/uploads/software_img/152540309222086936.jpg', '新型元素', '5', '新型元素', '1', '/uploads/software_img/152540309281583364.jpg', NULL, NULL, NULL, '3.58 MB', '新型元素', '2018-05-04 03:04:52', '2018-05-09 03:27:56', 1, '1525836424', 1, 1, '1525836476'),
(79, 3, '/uploads/software/152540309272046198.zip', '/uploads/software_img/152540309222086936.jpg', '新型元素', '5', '新型元素', '1', '/uploads/software_img/152540309281583364.jpg', NULL, NULL, NULL, '3.58 MB', '新型元素', '2018-05-04 03:04:52', '2018-05-09 03:27:56', 1, '1525836424', 1, 1, '1525836476'),
(80, 3, '/uploads/software/152540309272046198.zip', '/uploads/software_img/152540309222086936.jpg', '新型元素', '5', '新型元素', '1', '/uploads/software_img/152540309281583364.jpg', NULL, NULL, NULL, '3.58 MB', '新型元素', '2018-05-04 03:04:52', '2018-05-09 03:27:56', 1, '1525836424', 1, 1, '1525836476'),
(81, 4, '/uploads/software/153727563111367444.zip', '/uploads/software_img/153727563149662529.png', '原木材积计算器-1.0', '1', 'Windows all', '1', '/uploads/software_img/153727563189033302.jpg', '/uploads/software_img/153727563112234452.jpg', '/uploads/software_img/153727563171919989.jpg', NULL, '25.26 MB', '测试', '2018-09-18 13:00:31', '2018-09-18 13:29:41', 1, '1537277377', 1, 1, '1537277381');

-- --------------------------------------------------------

--
-- 表的结构 `transactions`
--

CREATE TABLE `transactions` (
  `id` int(11) NOT NULL,
  `uid` int(11) NOT NULL DEFAULT '0' COMMENT '用户id',
  `content` varchar(255) CHARACTER SET utf8mb4 DEFAULT NULL COMMENT '交易内容',
  `channel` tinyint(4) NOT NULL DEFAULT '0' COMMENT '交易渠道（0提现，1支付宝，2微信，3消费）',
  `total_amount` varchar(255) NOT NULL COMMENT '支付宝实际支付金额',
  `out_trade_no` varchar(255) NOT NULL COMMENT '唯一订单号',
  `status` int(11) NOT NULL DEFAULT '0' COMMENT '交易状态（1成功，2关闭，3失败）',
  `addtime` datetime NOT NULL COMMENT '交易时间'
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COMMENT='交易记录表';

--
-- 转存表中的数据 `transactions`
--

INSERT INTO `transactions` (`id`, `uid`, `content`, `channel`, `total_amount`, `out_trade_no`, `status`, `addtime`) VALUES
(1, 2, '充值', 1, '0.02', '20180926113334806420', 1, '2018-09-26 11:33:34'),
(2, 2, '充值', 0, '0.02', '20180926113432148367', 0, '2018-09-26 11:34:32'),
(3, 2, '充值', 0, '0.02', '20180926113558409539', 0, '2018-09-26 11:35:58');

-- --------------------------------------------------------

--
-- 表的结构 `users`
--

CREATE TABLE `users` (
  `id` int(10) UNSIGNED NOT NULL,
  `username` varchar(255) NOT NULL COMMENT '用户名',
  `password` varchar(255) NOT NULL COMMENT '密码',
  `mobile` varchar(255) NOT NULL COMMENT '手机号',
  `email` varchar(255) NOT NULL COMMENT '邮箱',
  `encrypted` int(11) NOT NULL COMMENT '密保',
  `answer` varchar(255) NOT NULL COMMENT '答案',
  `header_pic` varchar(255) NOT NULL DEFAULT 'default.jpg' COMMENT '头像',
  `nickname` varchar(255) DEFAULT NULL COMMENT '昵称',
  `is_cert` varchar(255) NOT NULL DEFAULT '0' COMMENT '是否认证开发人员,0是未认证,1已认证',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `is_freeze` int(11) NOT NULL DEFAULT '1' COMMENT '是否被冻结,1未被冻结 0已经冻结'
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- 转存表中的数据 `users`
--

INSERT INTO `users` (`id`, `username`, `password`, `mobile`, `email`, `encrypted`, `answer`, `header_pic`, `nickname`, `is_cert`, `created_at`, `updated_at`, `is_freeze`) VALUES
(1, 'asdsad', '$2y$10$6dQbIO2iyPl7uVSrN9lfg.dAhgApxRjvlZe1vfo4Ut8oZ6yRm1Yfe', '17778010681', 'sad@163.com', 4, '123', '/uploads/Conf/152316663344962066.png', '嘿嘿嘿', '1', '2018-03-30 01:55:56', '2018-04-08 06:42:03', 1),
(2, 'admin', '$2y$10$6dQbIO2iyPl7uVSrN9lfg.dAhgApxRjvlZe1vfo4Ut8oZ6yRm1Yfe', '18396861513', 'carlos0608@163.com', 7, '苹果', '/uploads/Conf/15235002989417020.jpg', 'Knight', '1', '2018-04-09 02:38:57', '2018-08-25 15:21:33', 1),
(3, '测试', '$2y$10$6dQbIO2iyPl7uVSrN9lfg.dAhgApxRjvlZe1vfo4Ut8oZ6yRm1Yfe', '15735719330', '1023093704@qq.com', 6, '春雷小学', '/uploads/Conf/152540263799148389.jpg', '测试111', '1', '2018-05-04 02:55:18', '2018-05-18 02:56:46', 1),
(4, 'hao532322', '$2y$10$6dQbIO2iyPl7uVSrN9lfg.dAhgApxRjvlZe1vfo4Ut8oZ6yRm1Yfe', '15125832849', 'explorernetwork@163.com', 6, '鄂嘉中心小学', '/uploads/Conf/152583291514652149.jpg', '星际远征', '1', '2018-05-09 02:16:37', '2018-08-07 03:19:50', 1);

-- --------------------------------------------------------

--
-- 表的结构 `user_banners`
--

CREATE TABLE `user_banners` (
  `id` int(10) NOT NULL,
  `uid` int(11) NOT NULL COMMENT '所属用户',
  `c_id` int(11) DEFAULT NULL,
  `status` tinyint(4) NOT NULL DEFAULT '0' COMMENT '0:已过期，1：正在使用，2等待使用',
  `banner_img` varchar(255) NOT NULL,
  `description` varchar(255) NOT NULL,
  `url` varchar(255) DEFAULT NULL COMMENT '轮播图地址',
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  `title` varchar(255) DEFAULT NULL COMMENT '标题'
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- 表的结构 `user_comments`
--

CREATE TABLE `user_comments` (
  `id` int(10) UNSIGNED NOT NULL,
  `sid` int(11) NOT NULL COMMENT '软件id',
  `content` text NOT NULL COMMENT '软件id',
  `uid` text NOT NULL COMMENT '评论的用户id',
  `star` varchar(255) NOT NULL COMMENT '评论的星星',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `is_code` int(11) DEFAULT NULL COMMENT '1为首次评论2为可评论',
  `display` int(11) DEFAULT '1' COMMENT '软删除'
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- 转存表中的数据 `user_comments`
--

INSERT INTO `user_comments` (`id`, `sid`, `content`, `uid`, `star`, `created_at`, `updated_at`, `is_code`, `display`) VALUES
(29, 7, 'DSAG', '4', '0', '2018-05-11 07:11:20', '2018-05-11 07:11:20', 2, 0),
(28, 7, '', '4', '5', '2018-05-11 07:11:05', '2018-05-11 07:11:05', 1, 0),
(27, 7, '测试第三条', '2', '0', '2018-05-10 09:47:57', '2018-05-10 09:47:57', 2, 0),
(30, 7, '', '4', '0', '2018-08-03 00:16:29', '2018-08-03 00:16:29', 2, 1);

-- --------------------------------------------------------

--
-- 表的结构 `user_downs`
--

CREATE TABLE `user_downs` (
  `id` int(10) UNSIGNED NOT NULL,
  `uid` int(11) NOT NULL COMMENT '用户id',
  `sid` int(11) NOT NULL COMMENT '软件id',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- 转存表中的数据 `user_downs`
--

INSERT INTO `user_downs` (`id`, `uid`, `sid`, `created_at`, `updated_at`) VALUES
(1, 1, 1, '2018-04-03 07:30:09', '2018-04-03 07:30:12'),
(2, 1, 3, '2018-04-04 03:25:03', '2018-04-04 03:25:22'),
(3, 2, 3, '2018-04-04 03:25:40', '2018-04-04 03:25:42'),
(4, 1, 3, '2018-04-04 09:19:54', '2018-04-04 09:19:54'),
(5, 1, 1, '2018-04-04 09:23:29', '2018-04-04 09:23:29'),
(6, 1, 1, '2018-04-04 09:23:34', '2018-04-04 09:23:34'),
(7, 1, 1, '2018-04-04 09:23:37', '2018-04-04 09:23:37'),
(8, 1, 1, '2018-04-08 00:56:49', '2018-04-08 00:56:49'),
(9, 1, 3, '2018-04-09 02:29:57', '2018-04-09 02:29:57'),
(10, 2, 4, '2018-04-11 09:21:44', '2018-04-11 09:21:44'),
(11, 2, 4, '2018-04-11 09:30:08', '2018-04-11 09:30:08'),
(12, 2, 4, '2018-04-12 01:12:58', '2018-04-12 01:12:58'),
(13, 2, 5, '2018-04-12 01:18:27', '2018-04-12 01:18:27'),
(14, 2, 7, '2018-05-04 02:01:42', '2018-05-04 02:01:42'),
(15, 3, 7, '2018-05-04 03:05:46', '2018-05-04 03:05:46'),
(16, 4, 7, '2018-05-09 02:21:56', '2018-05-09 02:21:56'),
(17, 0, 4, '2018-05-09 02:49:39', '2018-05-09 02:49:39'),
(18, 4, 7, '2018-05-09 03:16:07', '2018-05-09 03:16:07'),
(19, 4, 7, '2018-05-09 03:16:11', '2018-05-09 03:16:11'),
(20, 0, 7, '2018-05-09 03:47:07', '2018-05-09 03:47:07'),
(21, 0, 7, '2018-05-09 04:25:50', '2018-05-09 04:25:50'),
(22, 0, 7, '2018-09-08 13:19:20', '2018-09-08 13:19:20'),
(23, 0, 7, '2018-09-14 01:35:04', '2018-09-14 01:35:04'),
(24, 0, 6, '2018-09-18 03:05:10', '2018-09-18 03:05:10'),
(25, 0, 81, '2018-09-18 22:28:55', '2018-09-18 22:28:55'),
(26, 0, 40, '2018-09-18 23:02:15', '2018-09-18 23:02:15'),
(27, 0, 24, '2018-09-19 03:28:55', '2018-09-19 03:28:55'),
(28, 0, 8, '2018-09-21 04:02:08', '2018-09-21 04:02:08');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `abouts`
--
ALTER TABLE `abouts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `accounts`
--
ALTER TABLE `accounts`
  ADD UNIQUE KEY `uid` (`uid`);

--
-- Indexes for table `admin_users`
--
ALTER TABLE `admin_users`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `adv_images`
--
ALTER TABLE `adv_images`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `auction`
--
ALTER TABLE `auction`
  ADD PRIMARY KEY (`auction_id`);

--
-- Indexes for table `banners`
--
ALTER TABLE `banners`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `caties`
--
ALTER TABLE `caties`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `certs`
--
ALTER TABLE `certs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `column`
--
ALTER TABLE `column`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `complaints`
--
ALTER TABLE `complaints`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `confs`
--
ALTER TABLE `confs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `encrypteds`
--
ALTER TABLE `encrypteds`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `helps`
--
ALTER TABLE `helps`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `navs`
--
ALTER TABLE `navs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `news`
--
ALTER TABLE `news`
  ADD PRIMARY KEY (`news_id`);

--
-- Indexes for table `software`
--
ALTER TABLE `software`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `transactions`
--
ALTER TABLE `transactions`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user_banners`
--
ALTER TABLE `user_banners`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user_comments`
--
ALTER TABLE `user_comments`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user_downs`
--
ALTER TABLE `user_downs`
  ADD PRIMARY KEY (`id`);

--
-- 在导出的表使用AUTO_INCREMENT
--

--
-- 使用表AUTO_INCREMENT `abouts`
--
ALTER TABLE `abouts`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- 使用表AUTO_INCREMENT `admin_users`
--
ALTER TABLE `admin_users`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
--
-- 使用表AUTO_INCREMENT `adv_images`
--
ALTER TABLE `adv_images`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- 使用表AUTO_INCREMENT `auction`
--
ALTER TABLE `auction`
  MODIFY `auction_id` int(11) NOT NULL AUTO_INCREMENT COMMENT '主键', AUTO_INCREMENT=20;
--
-- 使用表AUTO_INCREMENT `banners`
--
ALTER TABLE `banners`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=41;
--
-- 使用表AUTO_INCREMENT `caties`
--
ALTER TABLE `caties`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
--
-- 使用表AUTO_INCREMENT `certs`
--
ALTER TABLE `certs`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- 使用表AUTO_INCREMENT `column`
--
ALTER TABLE `column`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;
--
-- 使用表AUTO_INCREMENT `complaints`
--
ALTER TABLE `complaints`
  MODIFY `id` int(8) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;
--
-- 使用表AUTO_INCREMENT `confs`
--
ALTER TABLE `confs`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- 使用表AUTO_INCREMENT `encrypteds`
--
ALTER TABLE `encrypteds`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
--
-- 使用表AUTO_INCREMENT `helps`
--
ALTER TABLE `helps`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
--
-- 使用表AUTO_INCREMENT `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;
--
-- 使用表AUTO_INCREMENT `navs`
--
ALTER TABLE `navs`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
--
-- 使用表AUTO_INCREMENT `news`
--
ALTER TABLE `news`
  MODIFY `news_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
--
-- 使用表AUTO_INCREMENT `software`
--
ALTER TABLE `software`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=82;
--
-- 使用表AUTO_INCREMENT `transactions`
--
ALTER TABLE `transactions`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- 使用表AUTO_INCREMENT `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- 使用表AUTO_INCREMENT `user_banners`
--
ALTER TABLE `user_banners`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- 使用表AUTO_INCREMENT `user_comments`
--
ALTER TABLE `user_comments`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;
--
-- 使用表AUTO_INCREMENT `user_downs`
--
ALTER TABLE `user_downs`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
