<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>后台管理系统</title>
    <!--Open Sans Font [ OPTIONAL ]-->
    <link href='https://fonts.googleapis.com/css?family=Open+Sans:400,300,600,700' rel='stylesheet' type='text/css'>
    <!--Bootstrap Stylesheet [ REQUIRED ]-->
    <link href="/Admin/css/bootstrap.min.css" rel="stylesheet">
    <!--Nifty Stylesheet [ REQUIRED ]-->
    <link href="/Admin/css/nifty.min.css" rel="stylesheet">
    <!--Nifty Premium Icon [ DEMONSTRATION ]-->
    <link href="/Admin/css/demo/nifty-demo-icons.min.css" rel="stylesheet">
 	<link href="/Admin/plugins/ionicons/css/ionicons.min.css" rel="stylesheet">
    <!--Demo [ DEMONSTRATION ]-->
    <link href="/Admin/css/demo/nifty-demo.min.css" rel="stylesheet">
    <!--Morris.js [ OPTIONAL ]-->
    <link href="/Admin/plugins/morris-js/morris.min.css" rel="stylesheet">
    <!--Magic Checkbox [ OPTIONAL ]-->
    <link href="/Admin/plugins/magic-check/css/magic-check.min.css" rel="stylesheet">
    <!--Pace - Page Load Progress Par [OPTIONAL]-->
    <link href="/Admin/plugins/pace/pace.min.css" rel="stylesheet">
    <script src="/Admin/plugins/pace/pace.min.js"></script>
    <!--jQuery [ REQUIRED ]-->
    <script src="/Admin/js/jquery-2.2.4.min.js"></script>
    <!--BootstrapJS [ RECOMMENDED ]-->
    <script src="/Admin/js/bootstrap.min.js"></script>
    <!--NiftyJS [ RECOMMENDED ]-->
    <script src="/Admin/js/nifty.min.js"></script>
    <script src="/Admin/js/demo/nifty-demo.min.js"></script>
    <!--Icons [ SAMPLE ]-->
    <script src="/Admin/js/demo/icons.js"></script>
    <!--=================================================-->
    <!--Demo script [ DEMONSTRATION ]-->
    <script src="/Admin/js/demo/nifty-demo.min.js"></script>
    <!--Morris.js [ OPTIONAL ]-->
    <script src="/Admin/plugins/morris-js/morris.min.js"></script>
	<script src="/Admin/plugins/morris-js/raphael-js/raphael.min.js"></script>
    <!--Sparkline [ OPTIONAL ]-->
    <script src="/Admin/plugins/sparkline/jquery.sparkline.min.js"></script>
    <!--Specify page [ SAMPLE ]-->
    <script src="/Admin/js/demo/dashboard.js"></script>
</head>

<!--TIPS-->
<!--You may remove all ID or Class names which contain "demo-", they are only used for demonstration. -->
<body>
    <div id="container" class="effect aside-float aside-bright mainnav-lg">
        
        <!--NAVBAR-->
        <!--===================================================-->
        <header id="navbar">
            <div id="navbar-container" class="boxed">

                <!--Brand logo & name-->
                <!--================================-->
                <div class="navbar-header">
                    <a href="/Admin/index.html" class="navbar-brand">
                        <img src="/Admin/img/logo.png" alt="公司 Logo" title="公司LOGO" class="brand-icon">
                        <div class="brand-title">
                            <span class="brand-text">探路者网络</span>
                        </div>
                    </a>
                </div>
                <!--================================-->
                <!--End brand logo & name-->


                <!--Navbar Dropdown-->
                <!--================================-->
                <div class="navbar-content clearfix">
                    <ul class="nav navbar-top-links pull-left">

                        <!--Navigation toogle button-->
                        <!--~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~-->
                        <li class="tgl-menu-btn">
                            <a class="mainnav-toggle" href="/Admin/#">
                                <i class="demo-pli-view-list"></i>
                            </a>
                        </li>
                        <!--~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~-->
                        <!--End Navigation toogle button-->



                        <!--Notification dropdown-->
                        <!--~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~-->
                        
                        <!--~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~-->
                        <!--End notifications dropdown-->



                        <!--Mega dropdown-->
                        <!--~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~-->

                        <!--~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~-->
                        <!--End mega dropdown-->

                    </ul>
                </div>
                <!--================================-->
                <!--End Navbar Dropdown-->

            </div>
        </header>
        <!--===================================================-->
        <!--END NAVBAR-->

        <div class="boxed">

            <!--CONTENT CONTAINER-->
            <!--===================================================-->
            <div id="content-container">
                <div id="page-content">
                <?php $__env->startSection('content'); ?>

		        <?php echo $__env->yieldSection(); ?>
		    	</div>
            </div>
            <!--===================================================-->
            <!--END CONTENT CONTAINER-->


            
            <!--ASIDE-->
            <!--===================================================-->
            <aside id="aside-container">
                <div id="aside">
                    <div class="nano">
                        <div class="nano-content">
                            
                            <!--Nav tabs-->
                            <!--================================-->
                            <ul class="nav nav-tabs nav-justified">
                                <li class="active">
                                    <a href="/Admin/#demo-asd-tab-1" data-toggle="tab">
                                        <i class="demo-pli-speech-bubble-7"></i>
                                    </a>
                                </li>
                                <li>
                                    <a href="/Admin/#demo-asd-tab-2" data-toggle="tab">
                                        <i class="demo-pli-information icon-fw"></i> Report
                                    </a>
                                </li>
                                <li>
                                    <a href="/Admin/#demo-asd-tab-3" data-toggle="tab">
                                        <i class="demo-pli-wrench icon-fw"></i> Settings
                                    </a>
                                </li>
                            </ul>
                            <!--================================-->
                            <!--End nav tabs-->



                            <!-- Tabs Content -->
                            <!--================================-->
                        </div>
                    </div>
                </div>
            </aside>
            <!--===================================================-->
            <!--END ASIDE-->

            
            <!--MAIN NAVIGATION-->
            <!--===================================================-->
            <nav id="mainnav-container">
                <div id="mainnav">
    
                    <!--Menu-->
                    <!--================================-->
                    <div id="mainnav-menu-wrap">
                        <div class="nano">
                            <div class="nano-content">
                                <?php 
                                    $res = DB::table('column')->where('display',1)->get();
                                   
                                    function unlimitedForLayer($m,$name='child',$p_id = 0) {
                                        $arr = array();
                                        foreach ($m as $v) {
                                            if ($v->pid == $p_id) {
                                                $v->childs = unlimitedForLayer($m, $name, $v->id);
                                                $arr[] = $v;
                                            }
                                        }
                                        return $arr;
                                    }
                                     $column = unlimitedForLayer($res,$name='child',$p_id = 0);

                                 ?>
                                <!--Profile Widget-->
                                <!--================================-->
                                <div id="mainnav-profile" class="mainnav-profile">
                                    <div class="profile-wrap">
                                        <?php 
                                            $UserId = Cookie::get('AdminUserId');
                                            $AdminUserInfo = DB::table('admin_users')->find($UserId);
                                         ?>
                                        <div class="pad-btm">
                                            <img class="img-circle img-sm img-border" src="/Admin/img/profile-photos/1.png" title="管理员头像" alt="Profile Picture">
                                        </div>
                                        <a href="/Admin/#profile-nav" class="box-block" data-toggle="collapse" aria-expanded="false">
                                            <span class="pull-right dropdown-toggle">
                                                <i class="dropdown-caret"></i>
                                            </span>
                                            <p class="mnp-name"><?php echo e($AdminUserInfo->nickname); ?></p>
                                        </a>
                                    </div>
                                    <div id="profile-nav" class="collapse list-group bg-trans">
                                        <a href="/Admin/Administrator/UpdatePassword" class="list-group-item">
                                            <i class="ion-ios-gear icon-lg icon-fw"></i> 修改密码
                                        </a>
                                        <a href="/Admin/Login/create" class="list-group-item">
                                            <i class="demo-pli-unlock icon-lg icon-fw"></i> 退出
                                        </a>
                                    </div>
                                </div>

                                <ul id="mainnav-menu" class="list-group">
						            <!-- <li class="active-link">
                                        <a href="/Admin/Column">
                                            <i class="demo-psi-home"></i>
                                            <span class="menu-title">
                                                <strong>栏目管理</strong>
                                            </span>
                                        </a>
                                    </li> -->
                                    <?php $__currentLoopData = $column; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $val): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
						            <!--Category name-->
						            <li class="list-header"><?php echo e($val->name); ?></li>
						            <!--Menu list item-->
                                    <?php $__currentLoopData = $val->childs; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $cal): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
    						            <li>
    						                <a href="<?php echo e($cal->url); ?>">
    						                    <i class="<?php echo e($cal->icon); ?>"></i>
    						                    <span class="menu-title">
    												<strong><?php echo e($cal->name); ?></strong>
    											</span>
                                                <?php if(!empty($cal->childs)): ?>
    											<i class="arrow"></i>
                                                <?php endif; ?>
    						                </a>
    						                <!--Submenu-->
                                            <?php $__currentLoopData = $cal->childs; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $eal): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
    						                <ul class="collapse">
    						                    <li><a href="<?php echo e($eal->url); ?>"><?php echo e($eal->name); ?></a></li>
    						                </ul>
                                             <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?> 
    						            </li>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
						            <!--Menu list item-->
									<li>
										<a href="Admin/Information">
											<i class=""></i>
											<span class="menu-title">
												<strong>留言语句</strong>
											</span>
											<i class="arrow"></i>
										</a>
										<!--Submenu-->
										
										<ul class="collapse">
											<li><a href="/Information/list">留言管理</a></li>
										</ul>

									</li>
						        </ul>
                            </div>
                        </div>
                    </div>
                    <!--================================-->
                    <!--End menu-->


                </div>
            </nav>
            <!--===================================================-->
            <!--END MAIN NAVIGATION-->

        </div>

        

        <!-- FOOTER -->
        <!--===================================================-->
        <footer id="footer">

            <!-- Visible when footer positions are fixed -->
            <!-- ~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~ -->



            <!-- Visible when footer positions are static -->
            <!-- ~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~ -->
            <?php 
            	$time = time();
             ?>
            <div class="hide-fixed pull-right pad-rgt">
                <strong><?php echo date('Y-m-d',$time); ?></strong>
            </div>



            <!-- ~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~ -->
            <!-- Remove the class "show-fixed" and "hide-fixed" to make the content always appears. -->
            <!-- ~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~ -->

            <p class="pad-lft">&#0169; 技术支持-鼎智成科技发展有限公司</p>



        </footer>
        <!--===================================================-->
        <!-- END FOOTER -->


        <!-- SCROLL PAGE BUTTON -->
        <!--===================================================-->
        <button class="scroll-top btn">
            <i class="pci-chevron chevron-up"></i>
        </button>
        <!--===================================================-->



    </div>
    <!--===================================================-->
    <!-- END OF CONTAINER -->


    
        <!-- SETTINGS - DEMO PURPOSE ONLY -->
    <!--===================================================-->
    <div id="demo-set" class="demo-set">
        <div id="demo-set-body" class="demo-set-body collapse">
            <div id="demo-set-alert"></div>
            <div class="pad-hor bord-btm clearfix">
                <div class="pull-right pad-top">
                    <button id="demo-btn-close-settings" class="btn btn-trans">
                        <i class="pci-cross pci-circle icon-lg"></i>
                    </button>
                </div>
                <div class="media">
                    <div class="media-left">
                        <i class="demo-pli-gear icon-2x"></i>
                    </div>
                    <div class="media-body">
                        <span class="text-semibold text-lg text-main">Costomize</span>
                        <p class="text-muted text-sm">Customize Nifty's layout, sidebars, and color schemes.</p>
                    </div>
                </div>
            </div>
            <div class="demo-set-content clearfix">
                <div class="col-xs-6 col-md-3">
                    <div class="pad-all bg-gray-light">
                        <p class="text-semibold text-main text-lg">Layout</p>
                        <p class="text-semibold text-main">Boxed Layout</p>
                        <div class="pad-btm">
                            <div class="pull-right">
                                <input id="demo-box-lay" class="toggle-switch" type="checkbox">
                                <label for="demo-box-lay"></label>
                            </div>
                            Boxed Layout
                        </div>
                        <div class="pad-btm">
                            <div class="pull-right">
                                <button id="demo-box-img" class="btn btn-sm btn-trans" disabled><i class="pci-hor-dots"></i></button>
                            </div>
                            Background Images <span class="label label-primary">New</span>
                        </div>

                        <hr class="new-section-xs bord-no">
                        <p class="text-semibold text-main">Animations</p>
                        <div class="pad-btm">
                            <div class="pull-right">
                                <input id="demo-anim" class="toggle-switch" type="checkbox" checked>
                                <label for="demo-anim"></label>
                            </div>
                            Enable Animations
                        </div>
                        <div class="pad-btm">
                            <div class="select pull-right">
                                <select id="demo-ease">
                                    <option value="effect" selected>ease (Default)</option>
                                    <option value="easeInQuart">easeInQuart</option>
                                    <option value="easeOutQuart">easeOutQuart</option>
                                    <option value="easeInBack">easeInBack</option>
                                    <option value="easeOutBack">easeOutBack</option>
                                    <option value="easeInOutBack">easeInOutBack</option>
                                    <option value="steps">Steps</option>
                                    <option value="jumping">Jumping</option>
                                    <option value="rubber">Rubber</option>
                                </select>
                            </div>
                            Transitions
                        </div>

                        <hr class="new-section-xs bord-no">

                        <p class="text-semibold text-main text-lg">Header / Navbar</p>
                        <div>
                            <div class="pull-right">
                                <input id="demo-navbar-fixed" class="toggle-switch" type="checkbox">
                                <label for="demo-navbar-fixed"></label>
                            </div>
                            Fixed Position
                        </div>

                        <hr class="new-section-xs bord-no">

                        <p class="text-semibold text-main text-lg">Footer</p>
                        <div class="pad-btm">
                            <div class="pull-right">
                                <input id="demo-footer-fixed" class="toggle-switch" type="checkbox">
                                <label for="demo-footer-fixed"></label>
                            </div>
                            Fixed Position
                        </div>
                    </div>
                </div>
                <div class="col-lg-9 pos-rel">
                    <div class="row">
                        <div class="col-lg-4">
                            <div class="pad-all">
                                <p class="text-semibold text-main text-lg">Sidebars</p>
                                <p class="text-semibold text-main">Navigation</p>
                                <div class="mar-btm">
                                    <div class="pull-right">
                                        <input id="demo-nav-fixed" class="toggle-switch" type="checkbox">
                                        <label for="demo-nav-fixed"></label>
                                    </div>
                                    Fixed Position
                                </div>
                                <div class="mar-btm">
                                    <div class="pull-right">
                                        <input id="demo-nav-profile" class="toggle-switch" type="checkbox" checked>
                                        <label for="demo-nav-profile"></label>
                                    </div>
                                    Widget Profil <small class="label label-primary">New</small>
                                </div>
                                <div class="mar-btm">
                                    <div class="pull-right">
                                        <input id="demo-nav-shortcut" class="toggle-switch" type="checkbox" checked>
                                        <label for="demo-nav-shortcut"></label>
                                    </div>
                                    Shortcut Buttons
                                </div>
                                <div class="mar-btm">
                                    <div class="pull-right">
                                        <input id="demo-nav-coll" class="toggle-switch" type="checkbox">
                                        <label for="demo-nav-coll"></label>
                                    </div>
                                    Collapsed Mode
                                </div>

                                <div class="clearfix">
                                    <div class="select pad-btm pull-right">
                                        <select id="demo-nav-offcanvas">
                                            <option value="none" selected disabled="disabled">-- Select Mode --</option>
                                            <option value="push">Push</option>
                                            <option value="slide">Slide in on top</option>
                                            <option value="reveal">Reveal</option>
                                        </select>
                                    </div>
                                    Off-Canvas
                                </div>

                                <p class="text-semibold text-main">Aside</p>
                                <div class="mar-btm">
                                    <div class="pull-right">
                                        <input id="demo-asd-vis" class="toggle-switch" type="checkbox">
                                        <label for="demo-asd-vis"></label>
                                    </div>
                                    Visible
                                </div>
                                <div class="mar-btm">
                                    <div class="pull-right">
                                        <input id="demo-asd-fixed" class="toggle-switch" type="checkbox" checked>
                                        <label for="demo-asd-fixed"></label>
                                    </div>
                                    Fixed Position
                                </div>
                                <div class="mar-btm">
                                    <div class="pull-right">
                                        <input id="demo-asd-float" class="toggle-switch" type="checkbox" checked>
                                        <label for="demo-asd-float"></label>
                                    </div>
                                    Floating <span class="label label-primary">New</span>
                                </div>
                                <div class="mar-btm">
                                    <div class="pull-right">
                                        <input id="demo-asd-align" class="toggle-switch" type="checkbox">
                                        <label for="demo-asd-align"></label>
                                    </div>
                                    Left Side
                                </div>
                                <div>
                                    <div class="pull-right">
                                        <input id="demo-asd-themes" class="toggle-switch" type="checkbox">
                                        <label for="demo-asd-themes"></label>
                                    </div>
                                    Dark Version
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-8">
                            <div id="demo-theme">
                                <div class="row bg-gray-light pad-top">
                                    <p class="text-semibold text-main text-lg pad-lft">Color Schemes</p>
                                    <div class="demo-theme-btn col-md-4 pad-ver">
                                        <p class="text-semibold text-main">Header</p>
                                        <div class="demo-justify-theme">
                                            <a href="/Admin/#" class="demo-theme demo-a-light add-tooltip" data-theme="theme-light" data-type="a" data-title="(A). Light">
                                                <div class="demo-theme-brand"></div>
                                                <div class="demo-theme-head"></div>
                                                <div class="demo-theme-nav"></div>
                                            </a>
                                            <a href="/Admin/#" class="demo-theme demo-a-navy add-tooltip" data-theme="theme-navy" data-type="a" data-title="(A). Navy Blue">
                                                <div class="demo-theme-brand"></div>
                                                <div class="demo-theme-head"></div>
                                                <div class="demo-theme-nav"></div>
                                            </a>
                                            <a href="/Admin/#" class="demo-theme demo-a-ocean add-tooltip" data-theme="theme-ocean" data-type="a" data-title="(A). Ocean">
                                                <div class="demo-theme-brand"></div>
                                                <div class="demo-theme-head"></div>
                                                <div class="demo-theme-nav"></div>
                                            </a>
                                        </div>
                                        <div class="demo-justify-theme">
                                            <a href="/Admin/#" class="demo-theme demo-a-lime add-tooltip" data-theme="theme-lime" data-type="a" data-title="(A). Lime">
                                                <div class="demo-theme-brand"></div>
                                                <div class="demo-theme-head"></div>
                                                <div class="demo-theme-nav"></div>
                                            </a>
                                            <a href="/Admin/#" class="demo-theme demo-a-purple add-tooltip" data-theme="theme-purple" data-type="a" data-title="(A). Purple">
                                                <div class="demo-theme-brand"></div>
                                                <div class="demo-theme-head"></div>
                                                <div class="demo-theme-nav"></div>
                                            </a>
                                            <a href="/Admin/#" class="demo-theme demo-a-dust add-tooltip" data-theme="theme-dust" data-type="a" data-title="(A). Dust">
                                                <div class="demo-theme-brand"></div>
                                                <div class="demo-theme-head"></div>
                                                <div class="demo-theme-nav"></div>
                                            </a>
                                        </div>
                                        <div class="demo-justify-theme">
                                            <a href="/Admin/#" class="demo-theme demo-a-mint add-tooltip" data-theme="theme-mint" data-type="a" data-title="(A). Mint">
                                                <div class="demo-theme-brand"></div>
                                                <div class="demo-theme-head"></div>
                                                <div class="demo-theme-nav"></div>
                                            </a>
                                            <a href="/Admin/#" class="demo-theme demo-a-yellow add-tooltip" data-theme="theme-yellow" data-type="a" data-title="(A). Yellow">
                                                <div class="demo-theme-brand"></div>
                                                <div class="demo-theme-head"></div>
                                                <div class="demo-theme-nav"></div>
                                            </a>
                                            <a href="/Admin/#" class="demo-theme demo-a-well-red add-tooltip" data-theme="theme-well-red" data-type="a" data-title="(A). Well Red">
                                                <div class="demo-theme-brand"></div>
                                                <div class="demo-theme-head"></div>
                                                <div class="demo-theme-nav"></div>
                                            </a>
                                        </div>
                                        <div class="demo-justify-theme">
                                            <a href="/Admin/#" class="demo-theme demo-a-coffee add-tooltip" data-theme="theme-coffee" data-type="a" data-title="(A). Coffee">
                                                <div class="demo-theme-brand"></div>
                                                <div class="demo-theme-head"></div>
                                                <div class="demo-theme-nav"></div>
                                            </a>
                                            <a href="/Admin/#" class="demo-theme demo-a-prickly-pear add-tooltip" data-theme="theme-prickly-pear" data-type="a" data-title="(A). Prickly pear">
                                                <div class="demo-theme-brand"></div>
                                                <div class="demo-theme-head"></div>
                                                <div class="demo-theme-nav"></div>
                                            </a>
                                            <a href="/Admin/#" class="demo-theme demo-a-dark add-tooltip" data-theme="theme-dark" data-type="a" data-title="(A). Dark">
                                                <div class="demo-theme-brand"></div>
                                                <div class="demo-theme-head"></div>
                                                <div class="demo-theme-nav"></div>
                                            </a>
                                        </div>
                                    </div>
                                    <div class="demo-theme-btn col-md-4 pad-ver">
                                        <p class="text-semibold text-main">Brand</p>
                                        <div class="demo-justify-theme">
                                            <a href="/Admin/#" class="demo-theme demo-b-light add-tooltip" data-theme="theme-light" data-type="b" data-title="(B). Light">
                                                <div class="demo-theme-brand"></div>
                                                <div class="demo-theme-head"></div>
                                                <div class="demo-theme-nav"></div>
                                            </a>
                                            <a href="/Admin/#" class="demo-theme demo-b-navy add-tooltip" data-theme="theme-navy" data-type="b" data-title="(B). Navy Blue">
                                                <div class="demo-theme-brand"></div>
                                                <div class="demo-theme-head"></div>
                                                <div class="demo-theme-nav"></div>
                                            </a>
                                            <a href="/Admin/#" class="demo-theme demo-b-ocean add-tooltip" data-theme="theme-ocean" data-type="b" data-title="(B). Ocean">
                                                <div class="demo-theme-brand"></div>
                                                <div class="demo-theme-head"></div>
                                                <div class="demo-theme-nav"></div>
                                            </a>
                                        </div>
                                        <div class="demo-justify-theme">
                                            <a href="/Admin/#" class="demo-theme demo-b-lime add-tooltip" data-theme="theme-lime" data-type="b" data-title="(B). Lime">
                                                <div class="demo-theme-brand"></div>
                                                <div class="demo-theme-head"></div>
                                                <div class="demo-theme-nav"></div>
                                            </a>
                                            <a href="/Admin/#" class="demo-theme demo-b-purple add-tooltip" data-theme="theme-purple" data-type="b" data-title="(B). Purple">
                                                <div class="demo-theme-brand"></div>
                                                <div class="demo-theme-head"></div>
                                                <div class="demo-theme-nav"></div>
                                            </a>
                                            <a href="/Admin/#" class="demo-theme demo-b-dust add-tooltip" data-theme="theme-dust" data-type="b" data-title="(B). Dust">
                                                <div class="demo-theme-brand"></div>
                                                <div class="demo-theme-head"></div>
                                                <div class="demo-theme-nav"></div>
                                            </a>
                                        </div>
                                        <div class="demo-justify-theme">
                                            <a href="/Admin/#" class="demo-theme demo-b-mint add-tooltip" data-theme="theme-mint" data-type="b" data-title="(B). Mint">
                                                <div class="demo-theme-brand"></div>
                                                <div class="demo-theme-head"></div>
                                                <div class="demo-theme-nav"></div>
                                            </a>
                                            <a href="/Admin/#" class="demo-theme demo-b-yellow add-tooltip" data-theme="theme-yellow" data-type="b" data-title="(B). Yellow">
                                                <div class="demo-theme-brand"></div>
                                                <div class="demo-theme-head"></div>
                                                <div class="demo-theme-nav"></div>
                                            </a>
                                            <a href="/Admin/#" class="demo-theme demo-b-well-red add-tooltip" data-theme="theme-well-red" data-type="b" data-title="(B). Well red">
                                                <div class="demo-theme-brand"></div>
                                                <div class="demo-theme-head"></div>
                                                <div class="demo-theme-nav"></div>
                                            </a>
                                        </div>
                                        <div class="demo-justify-theme">
                                            <a href="/Admin/#" class="demo-theme demo-b-coffee add-tooltip" data-theme="theme-coffee" data-type="b" data-title="(B). Coofee">
                                                <div class="demo-theme-brand"></div>
                                                <div class="demo-theme-head"></div>
                                                <div class="demo-theme-nav"></div>
                                            </a>
                                            <a href="/Admin/#" class="demo-theme demo-b-prickly-pear add-tooltip" data-theme="theme-prickly-pear" data-type="b" data-title="(B). Prickly pear">
                                                <div class="demo-theme-brand"></div>
                                                <div class="demo-theme-head"></div>
                                                <div class="demo-theme-nav"></div>
                                            </a>
                                            <a href="/Admin/#" class="demo-theme demo-b-dark add-tooltip" data-theme="theme-dark" data-type="b" data-title="(B). Dark">
                                                <div class="demo-theme-brand"></div>
                                                <div class="demo-theme-head"></div>
                                                <div class="demo-theme-nav"></div>
                                            </a>
                                        </div>
                                    </div>
                                    <div class="demo-theme-btn col-md-4 pad-ver">
                                        <p class="text-semibold text-main">Navigation</p>
                                        <div class="demo-justify-theme">
                                            <a href="/Admin/#" class="demo-theme demo-c-light add-tooltip" data-theme="theme-light" data-type="c" data-title="(C). Light">
                                                <div class="demo-theme-brand"></div>
                                                <div class="demo-theme-head"></div>
                                                <div class="demo-theme-nav"></div>
                                            </a>
                                            <a href="/Admin/#" class="demo-theme demo-c-navy add-tooltip" data-theme="theme-navy" data-type="c" data-title="(C). Navy Blue">
                                                <div class="demo-theme-brand"></div>
                                                <div class="demo-theme-head"></div>
                                                <div class="demo-theme-nav"></div>
                                            </a>
                                            <a href="/Admin/#" class="demo-theme demo-c-ocean add-tooltip" data-theme="theme-ocean" data-type="c" data-title="(C). Ocean">
                                                <div class="demo-theme-brand"></div>
                                                <div class="demo-theme-head"></div>
                                                <div class="demo-theme-nav"></div>
                                            </a>
                                        </div>
                                        <div class="demo-justify-theme">
                                            <a href="/Admin/#" class="demo-theme demo-c-lime add-tooltip" data-theme="theme-lime" data-type="c" data-title="(C). Lime">
                                                <div class="demo-theme-brand"></div>
                                                <div class="demo-theme-head"></div>
                                                <div class="demo-theme-nav"></div>
                                            </a>
                                            <a href="/Admin/#" class="demo-theme demo-c-purple add-tooltip" data-theme="theme-purple" data-type="c" data-title="(C). Purple">
                                                <div class="demo-theme-brand"></div>
                                                <div class="demo-theme-head"></div>
                                                <div class="demo-theme-nav"></div>
                                            </a>
                                            <a href="/Admin/#" class="demo-theme demo-c-dust add-tooltip" data-theme="theme-dust" data-type="c" data-title="(C). Dust">
                                                <div class="demo-theme-brand"></div>
                                                <div class="demo-theme-head"></div>
                                                <div class="demo-theme-nav"></div>
                                            </a>
                                        </div>
                                        <div class="demo-justify-theme">
                                            <a href="/Admin/#" class="demo-theme demo-c-mint add-tooltip" data-theme="theme-mint" data-type="c" data-title="(C). Mint">
                                                <div class="demo-theme-brand"></div>
                                                <div class="demo-theme-head"></div>
                                                <div class="demo-theme-nav"></div>
                                            </a>
                                            <a href="/Admin/#" class="demo-theme demo-c-yellow add-tooltip" data-theme="theme-yellow" data-type="c" data-title="(C). Yellow">
                                                <div class="demo-theme-brand"></div>
                                                <div class="demo-theme-head"></div>
                                                <div class="demo-theme-nav"></div>
                                            </a>
                                            <a href="/Admin/#" class="demo-theme demo-c-well-red add-tooltip" data-theme="theme-well-red" data-type="c" data-title="(C). Well Red">
                                                <div class="demo-theme-brand"></div>
                                                <div class="demo-theme-head"></div>
                                                <div class="demo-theme-nav"></div>
                                            </a>
                                        </div>
                                        <div class="demo-justify-theme">
                                            <a href="/Admin/#" class="demo-theme demo-c-coffee add-tooltip" data-theme="theme-coffee" data-type="c" data-title="(C). Coffee">
                                                <div class="demo-theme-brand"></div>
                                                <div class="demo-theme-head"></div>
                                                <div class="demo-theme-nav"></div>
                                            </a>
                                            <a href="/Admin/#" class="demo-theme demo-c-prickly-pear add-tooltip" data-theme="theme-prickly-pear" data-type="c" data-title="(C). Prickly pear">
                                                <div class="demo-theme-brand"></div>
                                                <div class="demo-theme-head"></div>
                                                <div class="demo-theme-nav"></div>
                                            </a>
                                            <a href="/Admin/#" class="demo-theme demo-c-dark add-tooltip" data-theme="theme-dark" data-type="c" data-title="(C). Dark">
                                                <div class="demo-theme-brand"></div>
                                                <div class="demo-theme-head"></div>
                                                <div class="demo-theme-nav"></div>
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div id="demo-bg-boxed" class="demo-bg-boxed">
                        <div class="demo-bg-boxed-content">
                            <p class="text-semibold text-main text-lg mar-no">Background Images</p>
                            <p class="text-sm text-muted">Add an image to replace the solid background color</p>
                            <div class="row">
                                <div class="col-lg-4 text-justify">
                                    <p class="text-semibold text-main">Blurred</p>
                                    <div id="demo-blurred-bg" class="text-justify">
                                        <!--Blurred Backgrounds-->
                                    </div>
                                </div>
                                <div class="col-lg-4 text-justify">
                                    <p class="text-semibold text-main">Polygon &amp; Geometric</p>
                                    <div id="demo-polygon-bg" class="text-justify">
                                        <!--Polygon Backgrounds-->
                                    </div>
                                </div>
                                <div class="col-lg-4 text-justify">
                                    <p class="text-semibold text-main">Abstract</p>
                                    <div id="demo-abstract-bg" class="text-justify">
                                        <!--Abstract Backgrounds-->
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="demo-bg-boxed-footer">
                            <button id="demo-close-boxed-img" class="btn btn-primary">Close</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <button id="demo-set-btn" class="btn" data-toggle="collapse" data-target="#demo-set-body"><i class="demo-psi-gear icon-lg"></i></button>
    </div>
    <!--===================================================-->
    <!-- END SETTINGS -->


</body>
</html>
