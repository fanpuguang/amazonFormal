<?php if (!defined('THINK_PATH')) exit(); /*a:6:{s:74:"/www/wwwroot/www.ldkjmy.com/aaaa/yamaxun/app/admin/view/admin/profile.html";i:1578553882;s:72:"/www/wwwroot/www.ldkjmy.com/aaaa/yamaxun/app/admin/view/public/base.html";i:1578553890;s:74:"/www/wwwroot/www.ldkjmy.com/aaaa/yamaxun/app/admin/view/public/header.html";i:1586171204;s:76:"/www/wwwroot/www.ldkjmy.com/aaaa/yamaxun/app/admin/view/public/left_nav.html";i:1578553891;s:76:"/www/wwwroot/www.ldkjmy.com/aaaa/yamaxun/app/admin/view/public/head_nav.html";i:1578553891;s:74:"/www/wwwroot/www.ldkjmy.com/aaaa/yamaxun/app/admin/view/public/footer.html";i:1578970335;}*/ ?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
	<meta charset="utf-8" />
	<title>亚马逊后台管理</title>

	<meta name="description" content="" />
	<link rel="Bookmark" href="__ROOT__/favicon.ico" >
    <link rel="Shortcut Icon" href="__ROOT__/favicon.ico" />
	<!-- bootstrap & fontawesome必须的css -->
	<link rel="stylesheet" href="__PUBLIC__/ace/css/bootstrap.min.css" />
	<link rel="stylesheet" href="__PUBLIC__/ace/css/detailsProduct.css" />
	<link rel="stylesheet" href="__PUBLIC__/font-awesome/css/font-awesome.min.css" />
	<link rel="stylesheet" href="__PUBLIC__/datePicker/bootstrap-datepicker.css" />
	<link rel="stylesheet" href="__PUBLIC__/datetimepicker/bootstrap-datetimepicker.css" />
	<!-- 此页插件css -->

	<!-- ace的css -->
	<link rel="stylesheet" href="__PUBLIC__/ace/css/ace.min.css" class="ace-main-stylesheet" id="main-ace-style" />
	<!-- IE版本小于9的ace的css -->
	<!--[if lte IE 9]>
	<link rel="stylesheet" href="__PUBLIC__/ace/css/ace-part2.min.css" class="ace-main-stylesheet" />
	<![endif]-->

	<!--[if lte IE 9]>
	<link rel="stylesheet" href="__PUBLIC__/ace/css/ace-ie.css" />
	<![endif]-->

	<link rel="stylesheet" href="__PUBLIC__/yfcmf/yfcmf.css" />
	<!-- 此页相关css -->

	<!-- ace设置处理的js -->
	<script src="__PUBLIC__/ace/js/ace-extra.js"></script>
	<!--<script src="__PUBLIC__/date/date.js"></script>-->
	<!-- HTML5shiv and Respond.js for IE8 to support HTML5 elements and media queries -->

	<!--[if lte IE 8]>
	<script src="__PUBLIC__/others/html5shiv.min.js"></script>
	<script src="__PUBLIC__/others/respond.min.js"></script>
	<![endif]-->
    <!-- 引入基本的js -->
    <script type="text/javascript">
        var admin_ueditor_handle = "<?php echo url('admin/Ueditor/upload'); ?>";
        var admin_ueditor_lang ='zh-cn';
    </script>
    <!--[if !IE]> -->
    <script src="__PUBLIC__/others/jquery.min-2.2.1.js"></script>
    <!-- <![endif]-->
    <!-- 如果为IE,则引入jq1.12.1 -->
    <!--[if IE]>
    <script src="__PUBLIC__/others/jquery.min-1.12.1.js"></script>
    <![endif]-->

    <!-- 如果为触屏,则引入jquery.mobile -->
    <script type="text/javascript">
        if('ontouchstart' in document.documentElement) document.write("<script src='__PUBLIC__/others/jquery.mobile.custom.min.js'>"+"<"+"/script>");
    </script>
    <script src="__PUBLIC__/others/bootstrap.min.js"></script>
	<!--新增样式-->
	<link rel="stylesheet" href="__PUBLIC__/ace/css/layer.css" />

	<script src="__PUBLIC__/ace/js/top.js"></script>

	<script src="__PUBLIC__/ace/js/layer.js"></script>
	<script src="__PUBLIC__/ace/js/layui.js"></script>
	<script type="text/javascript" src="__PUBLIC__/ace/js/vue.min.js"></script>

</head>

<body class="no-skin">
<!-- 导航栏开始 -->
<div id="navbar" class="navbar navbar-default navbar-fixed-top">
	<div class="navbar-container" id="navbar-container">
		<!-- 导航左侧按钮手机样式开始 -->
		<button type="button" class="navbar-toggle menu-toggler pull-left" id="menu-toggler" data-target="#sidebar">
			<span class="sr-only">Toggle sidebar</span>

			<span class="icon-bar"></span>

			<span class="icon-bar"></span>

			<span class="icon-bar"></span>
		</button><!-- 导航左侧按钮手机样式结束 -->
		<button data-target="#sidebar2" data-toggle="collapse" type="button" class="pull-left navbar-toggle collapsed">
			<span class="sr-only">Toggle sidebar</span>
			<i class="ace-icon fa fa-dashboard white bigger-125"></i>
		</button>
		<!-- 导航左侧正常样式开始 -->
		<div class="navbar-header pull-left">
			<!-- logo -->
			<a href="<?php echo url('admin/Index/index'); ?>" class="navbar-brand" title="管理后台首页">
				<small>
					<i class="fa fa-leaf"></i>
					龙鼎电子商务系统
				</small>
			</a>
		</div><!-- 导航左侧正常样式结束 -->
<style>
	#showtime{
		color: #FFF;
		display: block;
		line-height: inherit;
		text-align: center;
		height: 100%;
		width: auto;
		min-width: 50px;
		padding: 0 8px;
		position: relative;
	}
</style>
		<!-- 导航栏开始 -->

		<div class="navbar-buttons navbar-header pull-right" role="navigation" >
			<ul class="nav ace-nav">
				<li class="purple">
					<a>北京</a><a id="tbeijing">  </a>
				</li>
				<li class="grey">
					<a>美东</a><a id="teastus"></a>
				</li>
				<li class="purple">
					<a>美西</a><a id="twestus"></a>
				</li>
				<li class="grey">
					<a>英国</a><a id="tenglish"></a>
				</li>
				<li class="purple">
					<a>欧洲</a><a id="tfrance"></a>
				</li>
				<li class="grey">
					<a>日本</a><a id="tjapan"></a>
				</li>
				<li class="purple">
					<a data-info="确定要清理缓存吗？" class="confirm-rst-btn" href="<?php echo url('admin/Sys/clear'); ?>">
						清除缓存
					</a>
				</li>

				<?php if(config('lang_switch_on')): ?>
				<li class="grey">
					<?php switch($lang): case "zh-cn": ?><a href="<?php echo url('admin/Index/lang',['lang_s'=>'en']); ?>" class="rst-url-btn">ENGLISH</a><?php break; case "en-us": ?><a href="<?php echo url('admin/Index/lang',['lang_s'=>'cn']); ?>" class="rst-url-btn">简体中文</a><?php break; endswitch; ?>
				</li>
				<?php endif; ?>
				<!-- 用户菜单开始 -->
				<li class="light-blue dropdown-modal">
					<a data-toggle="dropdown" href="#" class="dropdown-toggle">
						<img class="nav-user-photo" src="<?php echo get_imgurl($admin_avatar,2); ?>" alt="<?php echo session('admin_auth.admin_username'); ?>" />
								<span class="user-info">
									<small>欢迎,</small>
									<?php echo session('admin_auth.admin_realname'); ?>
								</span>

						<i class="ace-icon fa fa-caret-down"></i>
					</a>

					<ul class="user-menu dropdown-menu-right dropdown-menu dropdown-yellow dropdown-caret dropdown-close">
						<li>
							<a href="<?php echo url('admin/Admin/profile'); ?>">
								<i class="ace-icon fa fa-user"></i>
								会员中心
							</a>
						</li>

						<li class="divider"></li>

						<li>
							<a href="<?php echo url('admin/Login/logout'); ?>"  data-info="你确定要退出吗？" class="confirm-btn">
								<i class="ace-icon fa fa-power-off"></i>
								注销
							</a>
						</li>
					</ul>
				</li><!-- 用户菜单结束 -->
			</ul>
		</div><!-- 导航栏结束 -->
	</div><!-- 导航栏容器结束 -->
</div><!-- 导航栏结束 -->


<!-- 整个页面内容开始 -->
<div class="main-container" id="main-container">
	<!-- 菜单栏开始 -->
	<div id="sidebar" class="sidebar responsive sidebar-fixed ace-save-state">
	<script type="text/javascript">
		try{ace.settings.loadState('sidebar')}catch(e){}
	</script>
	<div class="sidebar-shortcuts" id="sidebar-shortcuts">
		<!--左侧顶端按钮-->
		<div class="sidebar-shortcuts-large" id="sidebar-shortcuts-large">
			<a class="btn btn-success" href="<?php echo url('admin/Product/product_list'); ?>" role="button" title="产品列表"><i class="ace-icon fa fa-signal"></i></a>
			<a class="btn btn-info" href="<?php echo url('admin/Product/product_add'); ?>" role="button" title="添加产品"><i class="ace-icon fa fa-pencil"></i></a>
			<a class="btn btn-warning" href="<?php echo url('admin/Admin/profile'); ?>" role="button" title="个人中心"><i class="ace-icon fa fa-users"></i></a>
			<a class="btn btn-danger" href="<?php echo url('admin/Productupload/smartuploads'); ?>" role="button" title="采集产品"><i class="ace-icon fa fa-cogs"></i></a>
		</div>
		<!--左侧顶端按钮（手机）-->
		<div class="sidebar-shortcuts-mini" id="sidebar-shortcuts-mini">
			<a class="btn btn-success" href="<?php echo url('admin/Product/product_list'); ?>" role="button" title="产品列表"></a>
			<a class="btn btn-info" href="<?php echo url('admin/Product/product_add'); ?>" role="button" title="添加产品"></a>
			<a class="btn btn-warning" href="<?php echo url('admin/Admin/profile'); ?>" role="button" title="个人中心"></a>
			<a class="btn btn-danger" href="<?php echo url('admin/Productupload/smartuploads'); ?>" role="button" title="采集产品"></a>
		</div>
	</div>
	<!-- 菜单列表开始 -->
	<ul class="nav nav-list">
		<!--一级菜单遍历开始-->
		<?php if(is_array($menus) || $menus instanceof \think\Collection || $menus instanceof \think\Paginator): if( count($menus)==0 ) : echo "" ;else: foreach($menus as $key=>$v): if(!empty($v['_child'])): ?>
				<li class="<?php if((count($menus_curr) >= 1) AND ($menus_curr[0] == $v['id'])): ?>open<?php endif; ?>">
			<a href="javascript:void(0);" class="dropdown-toggle">
				<i class="menu-icon fa <?php echo $v['css']; ?>"></i>
				<span class="menu-text"><?php echo $v['title']; ?></span>
				<b class="arrow fa fa-angle-down"></b>
			</a>
			<ul class="submenu">
				<!--二级菜单遍历开始-->
				<?php if(is_array($v['_child']) || $v['_child'] instanceof \think\Collection || $v['_child'] instanceof \think\Paginator): if( count($v['_child'])==0 ) : echo "" ;else: foreach($v['_child'] as $key=>$vv): if(!empty($vv['_child'])): ?>
						<li class="<?php if((count($menus_curr) >= 2) AND ($menus_curr[1] == $vv['id'])): ?>active open<?php endif; ?>">
					<a href="javascript:void(0);" class="dropdown-toggle">
						<i class="menu-icon fa fa-caret-right"></i>
						<?php echo $vv['title']; ?>
						<b class="arrow fa fa-angle-down"></b>
					</a>
					<b class="arrow"></b>
					<ul class="submenu">
						<!--三级菜单遍历开始-->
						<?php if(is_array($vv['_child']) || $vv['_child'] instanceof \think\Collection || $vv['_child'] instanceof \think\Paginator): if( count($vv['_child'])==0 ) : echo "" ;else: foreach($vv['_child'] as $key=>$vvv): ?>
							<li class="<?php if((count($menus_curr) >= 3) AND ($menus_curr[2] == $vvv['id'])): ?>active<?php endif; ?>">
							<a href="<?php echo url($vvv['name']); ?>">
								<i class="menu-icon fa fa-caret-right"></i>
								<?php echo $vvv['title']; ?>
							</a>
							<b class="arrow"></b>
							</li>
						<?php endforeach; endif; else: echo "" ;endif; ?><!--三级菜单遍历结束-->
					</ul>
					</li>
					<?php else: ?>
					<li class="<?php if((count($menus_curr) >= 2) AND ($menus_curr[1] == $vv['id'])): ?>active<?php endif; ?>">
					<a href="<?php echo url($vv['name']); ?>">
						<i class="menu-icon fa fa-caret-right"></i>
						<?php echo $vv['title']; ?>
					</a>
					<b class="arrow"></b>
					</li>
					<?php endif; endforeach; endif; else: echo "" ;endif; ?><!--二级菜单遍历结束-->
			</ul>
			</li>
			<?php else: ?>
			<li class="<?php if((count($menus_curr) >= 1) AND ($menus_curr[0] == $v['id'])): ?>active<?php endif; ?>">
			<a href="<?php echo url($v['name']); ?>">
				<i class="menu-icon fa fa-caret-right"></i>
				<?php echo $v['title']; ?>
			</a>
			<b class="arrow"></b>
			</li>
			<?php endif; endforeach; endif; else: echo "" ;endif; ?><!--一级菜单遍历结束-->
	</ul><!-- 菜单列表结束 -->

	<!-- 菜单栏缩进开始 -->
	<div class="sidebar-toggle sidebar-collapse" id="sidebar-collapse">
		<i id="sidebar-toggle-icon" class="ace-icon fa fa-angle-double-left ace-save-state" data-icon1="ace-icon fa fa-angle-double-left" data-icon2="ace-icon fa fa-angle-double-right"></i>
	</div><!-- 菜单栏缩进结束 -->
</div>
	<!-- 菜单栏结束 -->

	<!-- 主要内容开始 -->
	<div class="main-content">
		<div class="main-content-inner">
			<!-- 右侧主要内容页顶部标题栏开始 -->
			<div id="sidebar2" class="sidebar h-sidebar navbar-collapse collapse breadcrumbs-fixed" data-sidebar="true" data-sidebar-scroll="true" data-sidebar-hover="true">
	<div class="nav-wrap-up pos-rel">
		<div class="nav-wrap">
			<ul class="nav nav-list">
				<?php if(($id_curr != '') AND (!empty($menus_child))): if(is_array($menus_child) || $menus_child instanceof \think\Collection || $menus_child instanceof \think\Paginator): if( count($menus_child)==0 ) : echo "" ;else: foreach($menus_child as $key=>$k): ?>
					<li>
						<a href="<?php echo url(''.$k['name'].''); ?>">
						<o class="font12 <?php if($id_curr == $k['id']): ?>rigbg<?php endif; ?>"><?php echo $k['title']; ?></o>
						</a>
						<b class="arrow"></b>
					</li>
					<?php endforeach; endif; else: echo "" ;endif; else: ?>
					<li>
						<a href="<?php echo url('admin/Index/index'); ?>">
							<o class="font12">欢迎使用亚马逊后台系统管理</o>
						</a>
						<b class="arrow"></b>
					</li>
				<?php endif; ?>
			</ul>
		</div>
	</div><!-- /.nav-list -->
</div>
			<!-- 右侧主要内容页顶部标题栏结束 -->
			<!-- 右侧下主要内容开始 -->
			
            <div class="page-content">
                <!--主题-->
                <div class="page-header">
                    <h1>
                        您当前操作
                        <small>
                            <i class="ace-icon fa fa-angle-double-right"></i>
                            个人中心
                        </small>
                    </h1>
                </div>
                <div>
                    <div id="user-profile-1" class="user-profile row">
                        <div class="col-xs-12 col-sm-3 center">
                            <div>
                                <!-- #section:pages/profile.picture -->
								<span class="profile-picture">
									<a href="#">
                                        <img id="avatar" class="editable" src="<?php echo get_imgurl($admin['admin_avatar'],2); ?>" width="150"  data-toggle="modal" data-target="#myModal" />
                                    </a>
								</span>

                                <!-- /section:pages/profile.picture -->
                                <div class="space-4"></div>
                                <div class="width-80 label label-info label-xlg arrowed-in arrowed-in-right">
                                    <div class="inline position-relative">
                                        <a href="<?php echo url('admin/Admin/admin_group_access',array('id'=>$admin['id'])); ?>" class="user-title-label" title="配置权限">
                                            <i class="ace-icon fa fa-circle light-green"></i>
                                            &nbsp;
                                            <span class="white"><?php echo $admin['title']; ?></span>
                                        </a>
                                    </div>
                                </div>
                            </div>

                            <div class="space-6"></div>

                            <!-- #section:pages/profile.contact -->
                            <div class="profile-contact-info">
                                <div class="profile-contact-links align-left">
                                    <span id="edit" class="btn btn-link" data-toggle="modal" data-target="#myModaledit">
                                        <i class="ace-icon fa fa-pencil bigger-120 green"></i>
                                        修改个人信息
                                    </span>
								</div>
                                <div class="space-6"></div>
                            </div>

                            <!-- /section:pages/profile.contact -->
                            <div class="hr hr12 dotted"></div>

                            <!-- #section:custom/extra.grid -->
                            <div class="clearfix">
                                <div class="grid2">
                                    <span class="bigger-175 blue"><?php echo $admin['admin_hits']; ?></span>

                                    <br />
                                    登录次数												</div>

                                <div class="grid2">
                                    <a href="<?php echo url('admin/Product/product_list'); ?>">
                                        <span class="bigger-175 blue"><?php echo $admin['product_count']; ?></span>
                                    </a>
                                    <br />
                                    产品数												</div>
                            </div>

                            <!-- /section:custom/extra.grid -->
                            <div class="hr hr16 dotted"></div>
                        </div>

                        <div class="col-xs-12 col-sm-9">

                            <!-- #section:pages/profile.info -->
                            <div class="profile-user-info profile-user-info-striped">
                                <div class="profile-info-row">
                                    <div class="profile-info-name"> 用户名 </div>

                                    <div class="profile-info-value">
                                        <span class="editable" id="username"><?php echo $admin['admin_username']; ?></span>													</div>
                                </div>

                                <div class="profile-info-row">
                                    <div class="profile-info-name"> 联系电话 </div>

                                    <div class="profile-info-value">
                                        <span class="editable" id="tel"><?php echo (isset($admin['admin_tel']) && ($admin['admin_tel'] !== '')?$admin['admin_tel']:'未设置'); ?></span>													</div>
                                </div>

                                <div class="profile-info-row">
                                    <div class="profile-info-name"> 真实姓名 </div>

                                    <div class="profile-info-value">
                                        <span class="editable" id="realname"><?php echo (isset($admin['admin_realname']) && ($admin['admin_realname'] !== '')?$admin['admin_realname']:'未设置'); ?></span>													</div>
                                </div>
                                <div class="profile-info-row">
                                    <div class="profile-info-name"> 英文名称 </div>

                                    <div class="profile-info-value">
                                        <span class="editable" id="en_name"><?php echo $admin['en_name']; ?></span>													</div>
                                </div>
                                <div class="profile-info-row">
                                    <div class="profile-info-name"> 英文品牌 </div>

                                    <div class="profile-info-value">
                                        <span class="editable" id="en_brand"><?php echo $admin['en_brand']; ?></span>													</div>
                                </div>
                                <div class="profile-info-row">
                                    <div class="profile-info-name"> 账户余额 </div>

                                    <div class="profile-info-value">
                                        <span class="editable" id="money" style="color:red;"><?php echo $admin['money']; ?></span>								</div>
                                </div>

                                <div class="profile-info-row">
                                    <div class="profile-info-name"> 上次登录时间 </div>

                                    <div class="profile-info-value">
                                        <span class="editable" id="lasttime"><?php if($admin['admin_last_time'] == ''): ?>未登陆过<?php else: ?><?php echo date("Y-m-d H:i:s",$admin['admin_last_time']); endif; ?></span>													</div>
                                </div>
                                <div class="profile-info-row">
                                    <div class="profile-info-name"> 上次登录IP </div>

                                    <div class="profile-info-value">
                                        <span class="editable" id="lastip"><?php if($admin['admin_ip'] == ''): ?>未登陆过<?php else: ?><?php echo $admin['admin_ip']; endif; ?></span>													</div>
                                </div>
                                <div class="profile-info-row">
                                    <div class="profile-info-name"> 本次登录IP </div>

                                    <div class="profile-info-value">
                                        <span class="editable" id="loginip"><?php echo $admin['admin_ip']; ?></span>													</div>
                                </div>
                            </div>

                            <!-- /section:pages/profile.info -->
                            <div class="space-20"></div>

                            <div class="widget-box transparent">


                                <div class="widget-body">
                                    <div class="widget-main padding-8">
                                        <!-- #section:pages/profile.feed -->
                                        <div id="profile-feed-1" class="profile-feed">

                                            <!-- /section:pages/profile.feed -->
                                        </div>
                                    </div>
                                </div>

                            </div>
                        </div>
                    </div>

                </div>
                <link href="__PUBLIC__/shearphoto/css/ShearPhoto.css" rel="stylesheet" type="text/css" media="all">
                <script  type="text/javascript" src="__PUBLIC__/shearphoto/js/ShearPhoto.js" ></script>
                <script  type="text/javascript"  src="__PUBLIC__/shearphoto/js/alloyimage.js" ></script>
                <script  type="text/javascript"  src="__PUBLIC__/shearphoto/js/handle.js" ></script>
                <script type="text/javascript">
                    var SHEAR = {
                        PATH_RES: '__PUBLIC__',
                        PATH_AVATAR: '__ROOT__/data/upload/avatar',
                        URL:"<?php echo url('admin/Admin/avatar'); ?>",
                    };
                </script>
                <!-- 显示模态框（Modal） -->
                <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                    <div class="modal-dialog" style="width:70%;">
                        <div class="modal-content"  style="min-width:450px;">
                            <div class="modal-header">
                                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×
                                </button>
                                <h4 class="modal-title" id="myModalLabel">
                                    会员头像
                                </h4>
                            </div>
                            <div class="modal-body">
                                <div class="row">
                                    <div class="col-xs-12">
                                        <div id="shearphoto_loading">程序加载中......</div><!--这是2.2版本加入的缓冲效果，JS方法加载前显示的等待效果-->
                                        <div id="shearphoto_main">
                                            <!--效果开始.............如果你不要特效，可以直接删了........-->
                                            <div class="Effects" id="shearphoto_Effects" autocomplete="off">
                                                <strong class="EffectsStrong">截图效果</strong>
                                                <a href="javascript:;" StrEvent="原图" class="Aclick"><img src="__PUBLIC__/shearphoto/images/Effects/e0.jpg"/>原图</a>
                                                <a href="javascript:;" StrEvent="美肤"><img src="__PUBLIC__/shearphoto/images/Effects/e1.jpg"/>美肤效果</a>
                                                <a href="javascript:;" StrEvent="素描"><img src="__PUBLIC__/shearphoto/images/Effects/e2.jpg"/>素描效果</a>
                                                <a href="javascript:;" StrEvent="自然增强"><img src="__PUBLIC__/shearphoto/images/Effects/e3.jpg" />自然增强</a>
                                                <a href="javascript:;" StrEvent="紫调"><img src="__PUBLIC__/shearphoto/images/Effects/e4.jpg" />紫调效果</a>
                                                <a href="javascript:;" StrEvent="柔焦"><img src="__PUBLIC__/shearphoto/images/Effects/e5.jpg"/>柔焦效果</a>
                                                <a href="javascript:;" StrEvent="复古"><img src="__PUBLIC__/shearphoto/images/Effects/e6.jpg"/>复古效果</a>
                                                <a href="javascript:;" StrEvent="黑白"><img src="__PUBLIC__/shearphoto/images/Effects/e7.jpg"/>黑白效果</a>
                                                <a href="javascript:;" StrEvent="仿lomo"><img src="__PUBLIC__/shearphoto/images/Effects/e8.jpg"/>仿lomo</a>
                                                <a href="javascript:;" StrEvent="亮白增强"><img src="__PUBLIC__/shearphoto/images/Effects/e9.jpg"/>亮白增强</a>
                                                <a href="javascript:;" StrEvent="灰白"><img src="__PUBLIC__/shearphoto/images/Effects/e10.jpg"/>灰白效果</a>
                                                <a href="javascript:;" StrEvent="灰色"><img src="__PUBLIC__/shearphoto/images/Effects/e11.jpg"/>灰色效果</a>
                                                <a href="javascript:;" StrEvent="暖秋"><img src="__PUBLIC__/shearphoto/images/Effects/e12.jpg"/>暖秋效果</a>
                                                <a href="javascript:;" StrEvent="木雕"><img src="__PUBLIC__/shearphoto/images/Effects/e13.jpg"/>木雕效果</a>
                                                <a href="javascript:;" StrEvent="粗糙"><img src="__PUBLIC__/shearphoto/images/Effects/e14.jpg"/>粗糙效果</a>
                                            </div>
                                            <!--效果结束...........................如果你不要特效，可以直接删了.....................................................-->
                                            <!--primary范围开始-->
                                            <div class="primary">
                                                <!--main范围开始-->
                                                <div id="main">
                                                    <div class="point">
                                                    </div>
                                                    <!--选择加载图片方式开始-->

                                                    <div id="SelectBox">
                                                        <form id="ShearPhotoForm" enctype="multipart/form-data" method="post"  target="POSTiframe">
                                                            <input name="shearphoto" type="hidden" value="123" autocomplete="off">
                                                            <a href="javascript:;" id="selectImage"><input type="file"  name="UpFile" autocomplete="off"/></a>
                                                        </form>
                                                        <a href="javascript:;" id="PhotoLoading"></a>
                                                    </div>
                                                    <!--选择加载图片方式结束--->
                                                    <div id="relat">
                                                        <div id="black">
                                                        </div>
                                                        <div id="movebox">
                                                            <div id="smallbox">
                                                                <img src="__PUBLIC__/shearphoto/images/default.gif" class="MoveImg" /><!--截框上的小图-->
                                                            </div>
                                                            <!--动态边框开始-->
                                                            <i id="borderTop">
                                                            </i>

                                                            <i id="borderLeft">
                                                            </i>

                                                            <i id="borderRight">
                                                            </i>

                                                            <i id="borderBottom">
                                                            </i>
                                                            <!--动态边框结束-->
                                                            <i id="BottomRight">
                                                            </i>
                                                            <i id="TopRight">
                                                            </i>
                                                            <i id="Bottomleft">
                                                            </i>
                                                            <i id="Topleft">
                                                            </i>
                                                            <i id="Topmiddle">
                                                            </i>
                                                            <i id="leftmiddle">
                                                            </i>
                                                            <i id="Rightmiddle">
                                                            </i>
                                                            <i id="Bottommiddle">
                                                            </i>
                                                        </div>
                                                        <img src="__PUBLIC__/shearphoto/images/default.gif" class="BigImg" /><!--MAIN上的大图-->
                                                    </div>
                                                </div>
                                                <!--main范围结束-->
                                                <div style="clear: both"></div>
                                                <!--工具条开始-->
                                                <div id="Shearbar">
                                                    <a id="LeftRotate" href="javascript:;">
                                                        <em>
                                                        </em>
                                                        向左旋转
                                                    </a>
                                                    <em class="hint L">
                                                    </em>
                                                    <div class="ZoomDist" id="ZoomDist">
                                                        <div id="Zoomcentre">
                                                        </div>
                                                        <div id="ZoomBar">
                                                        </div>
                        <span class="progress">
                        </span>
                                                    </div>
                                                    <em class="hint R">
                                                    </em>
                                                    <a id="RightRotate" href="javascript:;">
                                                        向右旋转
                                                        <em>
                                                        </em>
                                                    </a>
                                                    <p class="Psava">
                                                        <a id="againIMG"  href="javascript:;">重新选择</a>
                                                        <a id="saveShear" href="javascript:;">保存截图</a>
                                                    </p>
                                                </div>
                                                <!--工具条结束-->
                                            </div>
                                            <!--primary范围结束-->
                                            <div style="clear: both"></div>
                                        </div>
                                        <!--shearphoto_main范围结束-->

                                        <!--主功能部份 主功能部份的标签请勿随意删除，除非你对shearphoto的原理了如指掌，否则JS找不到DOM对象，会给你抱出错误-->
                                        <!--相册-->
                                        <div id="photoalbum"><!--假如你不要这个相册功能。把相册标签删除了，JS会抱出一个console.log()给你，注意查收，console.log的内容是告诉，某个DOM对象找不到-->
                                            <h1>请从相册中选择</h1>
                                            <i id="close"></i>
                                            <ul>
                                                <li><img src="__PUBLIC__/shearphoto/file/photo/1.jpg" serveUrl="file/photo/1.jpg" /></li>
                                                <li><img src="__PUBLIC__/shearphoto/file/photo/2.jpg" serveUrl="file/photo/2.jpg" /></li>
                                                <li><img src="__PUBLIC__/shearphoto/file/photo/3.jpg" serveUrl="file/photo/3.jpg" /></li>
                                                <li><img src="__PUBLIC__/shearphoto/file/photo/4.jpg" serveUrl="file/photo/4.jpg" /></li>
                                            </ul>
                                        </div>
                                        <!--相册-->
                                    </div>
                                </div>
                            </div>

                        </div><!-- /.modal-content -->
                    </div><!-- /.modal-dialog -->
                </div><!-- /.modal -->

                <!-- 显示修改资料模态框（Modal） -->
                <div class="modal fade in" id="myModaledit" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                    <form class="form-horizontal ajaxForm2" name="admin_runedit" method="post" action="<?php echo url('admin/Admin/admin_runedit2'); ?>">
                        <input type="hidden" name="admin_id" value="<?php echo $admin['admin_id']; ?>" />
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <button type="button" class="close" id="gb"  data-dismiss="modal"
                                            aria-hidden="true">×
                                    </button>
                                    <h4 class="modal-title" id="myModalLabel2">
                                        修改用户信息
                                    </h4>
                                </div>
                                <div class="modal-body">


                                    <div class="row">
                                        <div class="col-xs-12">


                                            <div class="form-group">
                                                <label class="col-sm-2 control-label no-padding-right" for="form-field-1"> 用户邮箱：  </label>
                                                <div class="col-sm-10">
                                                    <input type="email" name="admin_email" id="admin_email" value="<?php echo $admin['admin_email']; ?>" class="col-xs-10 col-sm-5" required/>
                                                    <span class="lbl col-xs-12 col-sm-7"><span class="red">*</span>用于密码找回，请认真填写</span>
                                                </div>
                                            </div>
                                            <div class="space-4"></div>
                                            <div class="form-group">
                                                <label class="col-sm-2 control-label no-padding-right" for="form-field-1"> 登录密码：  </label>
                                                <div class="col-sm-10">
                                                    <input type="text" name="admin_pwd" id="admin_pwd" maxlength="15" minlength="6" placeholder="为空不修改密码" class="col-xs-10 col-sm-5" />
                                                    <span class="lbl col-xs-12 col-sm-7"><span class="red">*</span>密码必须大于6位，小于15位</span>
                                                </div>
                                            </div>
                                            <div class="space-4"></div>
                                            <div class="form-group">
                                                <label class="col-sm-2 control-label no-padding-right" for="form-field-1"> 手机号码：  </label>
                                                <div class="col-sm-10">
                                                    <input type="number" name="admin_tel" id="admin_tel" value="<?php echo $admin['admin_tel']; ?>" class="col-xs-10 col-sm-5" required/>
                                                    <span class="lbl col-xs-12 col-sm-7"><span class="red">*</span>只能填写数字</span>
                                                </div>
                                            </div>
                                            <div class="space-4"></div>
                                            <div class="form-group">
                                                <label class="col-sm-2 control-label no-padding-right" for="form-field-1"> 昵称：  </label>
                                                <div class="col-sm-10">
                                                    <input type="text" name="admin_realname" id="admin_realname" value="<?php echo $admin['admin_realname']; ?>"  class="col-xs-10 col-sm-5" required/>
                                                    <span class="lbl col-xs-12 col-sm-7"><span class="red">*</span>用户昵称</span>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label class="col-sm-2 control-label no-padding-right" for="form-field-1"> 英文名称：  </label>
                                                <div class="col-sm-10">
                                                    <input type="text" name="en_name" id="en_name" value="<?php echo $admin['en_name']; ?>"  class="col-xs-10 col-sm-5" required/>
                                                    <span class="lbl col-xs-12 col-sm-7"><span class="red">*</span>用于生产SKU</span>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label class="col-sm-2 control-label no-padding-right" for="form-field-1"> 英文品牌：  </label>
                                                <div class="col-sm-10">
                                                    <input type="text" name="en_brand" id="en_brand" value="<?php echo $admin['en_brand']; ?>"  class="col-xs-10 col-sm-5" required/>
                                                    <span class="lbl col-xs-12 col-sm-7"><span class="red">*</span>用于生产SKU，全大写英文，不能有空格</span>
                                                </div>
                                            </div>
                                            <div class="space-4"></div>
                                            
                                        </div>
                                    </div>
                                </div>
                                <div class="modal-footer">
                                    <button type="submit" class="btn btn-primary">
                                        提交保存
                                    </button>
                                    <button type="button" class="btn btn-default" data-dismiss="modal">
                                        关闭
                                    </button>
                                </div>
                            </div><!-- /.modal-content -->
                        </div><!-- /.modal-dialog -->
                    </form>
                </div><!-- /.modal -->
            </div>

			<!-- 右侧下主要内容结束 -->
		</div>
	</div><!-- 主要内容结束 -->
	<!-- 页脚开始 -->
	<div class="footer">
	<div class="footer-inner">
		<div class="footer-content" style="position: fixed;background-color: #438EB9;color:#ffff;line-height:16px;">
			<span class="bigger-120">
				<!--<span class="blue bolder"><a href="http://www.rainfer.cn" target="_ablank">亚马逊</a></span>
				后台管理系统 &copy; 2019-<?php echo date('Y'); ?>-->
				当日货币汇率 --
				<?php if(is_array($huilv) || $huilv instanceof \think\Collection || $huilv instanceof \think\Paginator): if( count($huilv)==0 ) : echo "" ;else: foreach($huilv as $key=>$v): ?>
				<span><?php echo $v['currency']; ?>:<?php echo $v['exchange_rate']; ?></span>&nbsp;&nbsp;
				<?php endforeach; endif; else: echo "" ;endif; ?>
			</span>
		</div>
	</div>
</div>

	<!-- 页脚结束 -->
	<!-- 返回顶端开始 -->
	<a href="#" id="btn-scroll-up" class="btn-scroll-up btn btn-sm btn-inverse">
		<i class="ace-icon fa fa-angle-double-up icon-only bigger-110"></i>
	</a>
	<!-- 返回顶端结束 -->
</div><!-- 整个页面内结束 -->

<!-- ace的js,可以通过打包生成,避免引入文件数多 -->
<script src="__PUBLIC__/ace/js/ace.js"></script>
<script src="__PUBLIC__/ace/js/ace.min.js"></script>
<!-- jquery.form、layer、yfcmf的js -->
<script src="__PUBLIC__/others/jquery.form.js"></script>
<script src="__PUBLIC__/others/maxlength.js"></script>
<script src="__PUBLIC__/layer/layer_zh-cn.js"></script>
<script src="__PUBLIC__/datePicker/bootstrap-datepicker.js"></script>
<script src="__PUBLIC__/datetimepicker/bootstrap-datetimepicker.js"></script>
<script src="__PUBLIC__/datetimepicker/locales/bootstrap-datetimepicker.zh-CN.js"></script>
<script src="__PUBLIC__/yfcmf/yfcmf.js?<?php echo time(); ?>"></script>
<!-- 此页相关插件js -->

<!-- 与此页相关的js -->
</body>
</html>
