<?php if (!defined('THINK_PATH')) exit(); /*a:6:{s:71:"/www/wwwroot/www.ldkjmy.com/aaaa/yamaxun/app/admin/view/sys/paysys.html";i:1503645978;s:72:"/www/wwwroot/www.ldkjmy.com/aaaa/yamaxun/app/admin/view/public/base.html";i:1503645978;s:74:"/www/wwwroot/www.ldkjmy.com/aaaa/yamaxun/app/admin/view/public/header.html";i:1557369558;s:76:"/www/wwwroot/www.ldkjmy.com/aaaa/yamaxun/app/admin/view/public/left_nav.html";i:1554623682;s:76:"/www/wwwroot/www.ldkjmy.com/aaaa/yamaxun/app/admin/view/public/head_nav.html";i:1554196766;s:74:"/www/wwwroot/www.ldkjmy.com/aaaa/yamaxun/app/admin/view/public/footer.html";i:1554272462;}*/ ?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
	<meta charset="utf-8" />
	<title>亚马逊后台管理</title>

	<meta name="description" content="" />
	<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0" />
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
					亚马逊电子商务系统
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
									<?php echo session('admin_auth.admin_username'); ?>
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
			<a class="btn btn-success" href="<?php echo url('admin/News/news_list'); ?>" role="button" title="产品列表"><i class="ace-icon fa fa-signal"></i></a>
			<a class="btn btn-info" href="<?php echo url('admin/News/news_add'); ?>" role="button" title="添加产品"><i class="ace-icon fa fa-pencil"></i></a>
			<a class="btn btn-warning" href="<?php echo url('admin/Member/member_list'); ?>" role="button" title="用户列表"><i class="ace-icon fa fa-users"></i></a>
			<a class="btn btn-danger" href="<?php echo url('admin/Sys/sys'); ?>" role="button" title="站点设置"><i class="ace-icon fa fa-cogs"></i></a>
		</div>
		<!--左侧顶端按钮（手机）-->
		<div class="sidebar-shortcuts-mini" id="sidebar-shortcuts-mini">
			<a class="btn btn-success" href="<?php echo url('admin/News/news_list'); ?>" role="button" title="产品列表"></a>
			<a class="btn btn-info" href="<?php echo url('admin/News/news_add'); ?>" role="button" title="添加产品"></a>
			<a class="btn btn-warning" href="<?php echo url('admin/Member/member_list'); ?>" role="button" title="用户列表"></a>
			<a class="btn btn-danger" href="<?php echo url('admin/Sys/sys'); ?>" role="button" title="站点设置"></a>
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
					支付配置
				</small>
			</h1>
		</div>
		<div class="row">

            <div class="tabbable">
                <ul class="nav nav-tabs" id="myTab">
                    <li class="active">
                        <a data-toggle="tab" href="#alipay">
                            支付宝收银
                        </a>
                    </li>
                    <li>
                        <a data-toggle="tab" href="#aliwappay">
                            支付宝手机
                        </a>
                    </li>
                    <li>
                        <a data-toggle="tab" href="#wxqrcode">
                            微信扫码支付
                        </a>
                    </li> 
                    <li>
                        <a data-toggle="tab" href="#wxjspi">
                            微信JSAPI支付
                        </a>
                    </li>                   
                    <li>
                        <a data-toggle="tab" href="#tenpay">
                            腾讯财富通
                        </a>
                    </li>
                    <li>
                        <a data-toggle="tab" href="#palpay">
                            Paypal支付
                        </a>
                    </li>
                    <li>
                        <a data-toggle="tab" href="#unionpay">
                            银联支付
                        </a>
                    </li>
                </ul>               
                    <fieldset>
                    <form class="form-horizontal ajaxForm2" name="paysys" method="post" action="<?php echo url('admin/Sys/runpaysys'); ?>">
                        <div class="tab-content">                       
                        <div id="alipay" class="tab-pane fade in active">                           
                                <div class="form-group">
                                    <label class="col-sm-3 control-label no-padding-right" for="form-field-1"> 签约账户 </label>
                                    <div class="col-sm-9">
                                        <input type="text" name="config[alipay][account]" placeholder="签约账户" value="<?php echo $payment['alipay']['account']; ?>"  class="col-xs-10 col-sm-5">
                                <span class="help-inline col-xs-12 col-sm-7">
                                    <span class="middle">*xxxx@alipay.com</span>
                                </span>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-sm-3 control-label no-padding-right" for="form-field-1"> 账户名称 </label>
                                    <div class="col-sm-9">
                                        <input type="text" name="config[alipay][account_name]" placeholder="签约名称" value="<?php echo $payment['alipay']['account_name']; ?>"  class="col-xs-10 col-sm-5">
                                <span class="help-inline col-xs-12 col-sm-7">
                                    <span class="middle">*</span>
                                </span>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-sm-3 control-label no-padding-right" for="form-field-1"> partner </label>
                                    <div class="col-sm-9">
                                       <input type="text" name="config[alipay][partner]" value="<?php echo $payment['alipay']['partner']; ?>" placeholder="partner"  class="col-xs-10 col-sm-5">
                                    <span class="help-inline col-xs-12 col-sm-7">
                                   <span class="middle">*</span></span>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-sm-3 control-label no-padding-right" for="form-field-1"> MD5密钥 </label>
                                    <div class="col-sm-9">
                                       <input type="password" name="config[alipay][md5_key]" value="<?php echo $payment['alipay']['md5_key']; ?>" placeholder="MD5密钥"  class="col-xs-10 col-sm-5">
                                    <span class="help-inline col-xs-12 col-sm-7">
                                   <span class="middle">*</span></span>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-sm-3 control-label no-padding-right" for="form-field-1"> 开发者应用私钥 </label>
                                    <div class="col-sm-9">
                                       <input type="text" name="config[alipay][rsa_private_key]" value="<?php echo $payment['alipay']['rsa_private_key']; ?>" placeholder="开发者应用私钥"  class="col-xs-10 col-sm-5">
                                    <span class="help-inline col-xs-12 col-sm-7">
                                   <span class="middle">*开发者应用私钥(完整路径)</span></span>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-sm-3 control-label no-padding-right" for="form-field-1"> 支付异步通知 </label>
                                    <div class="col-sm-9">
                                       <input type="url" name="config[alipay][notify_url]" value="<?php echo $payment['alipay']['notify_url']; ?>" placeholder="支付通知地址"  class="col-xs-10 col-sm-5">
                                    <span class="help-inline col-xs-12 col-sm-7">
                                   <span class="middle">*https://api.xx.com/receive_notify.html</span></span>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-sm-3 control-label no-padding-right" for="form-field-1"> 成功跳转 </label>
                                    <div class="col-sm-9">
                                       <input type="url" name="config[alipay][return_url]" value="<?php echo $payment['alipay']['return_url']; ?>" placeholder="成功跳转地址"  class="col-xs-10 col-sm-5">
                                       <input type="text" hidden="" name="config[alipay][time_expire]" value="14"  class="col-xs-10 col-sm-5">
                                    <span class="help-inline col-xs-12 col-sm-7">
                                   <span class="middle">*https://api.xx.com/receive_return.html</span></span>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-sm-3 control-label no-padding-right" for="form-field-1"> 签名方式 </label>
                                    <div class="col-sm-9">
                                <select name="config[alipay][sign_type]" class="col-sm-4" required="">
                                <option value="MD5" <?php if($payment['alipay']['sign_type'] == 'MD5'): ?>selected<?php endif; ?>>MD5</option>
                                <option value="RSA" <?php if($payment['alipay']['sign_type'] == 'RSA'): ?>selected<?php endif; ?>>RSA</option>                         
                                </select>
                                    <span class="help-inline col-xs-12 col-sm-7">
                                   <span class="middle">*目前支持:RSA   MD5</span></span>
                                    </div>
                                </div>
                                
                                <div class="space-4"></div>
                                <div class="form-group">
                                    <label class="col-sm-3 control-label no-padding-right" for="form-field-1"> 是否开启： </label>
                                    <div class="col-sm-9" style="padding-top:5px;">                                                              
                                    <input name="config[alipay][display]"  <?php if(!empty($payment['alipay']['display']) == 1): ?>checked<?php endif; ?> value="1" class="ace ace-switch ace-switch-4 btn-flat col-xs-10 col-sm-5" type="checkbox" />
                                    <span class="lbl middle help-inline" >&nbsp;&nbsp;* 默认关闭</span>
                                    </div>
                                </div>
                        </div>
                        <!--支付宝配置结束-->
                        <div id="aliwappay" class="tab-pane fade">                           
                              <div class="form-group">
                                    <label class="col-sm-3 control-label no-padding-right" for="form-field-1"> 签约账户 </label>
                                    <div class="col-sm-9">
                                        <input type="text" name="config[aliwappay][account]" placeholder="签约账户" value="<?php echo $payment['aliwappay']['account']; ?>"  class="col-xs-10 col-sm-5">
                                <span class="help-inline col-xs-12 col-sm-7">
                                    <span class="middle">*xxxx@aliwappay.com</span>
                                </span>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-sm-3 control-label no-padding-right" for="form-field-1"> 账户名称 </label>
                                    <div class="col-sm-9">
                                        <input type="text" name="config[aliwappay][account_name]" placeholder="签约名称" value="<?php echo $payment['aliwappay']['account_name']; ?>"  class="col-xs-10 col-sm-5">
                                <span class="help-inline col-xs-12 col-sm-7">
                                    <span class="middle">*</span>
                                </span>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-sm-3 control-label no-padding-right" for="form-field-1"> partner </label>
                                    <div class="col-sm-9">
                                       <input type="text" name="config[aliwappay][partner]" value="<?php echo $payment['aliwappay']['partner']; ?>" placeholder="partner"  class="col-xs-10 col-sm-5">
                                    <span class="help-inline col-xs-12 col-sm-7">
                                   <span class="middle">*</span></span>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-sm-3 control-label no-padding-right" for="form-field-1"> MD5密钥 </label>
                                    <div class="col-sm-9">
                                       <input type="password" name="config[aliwappay][md5_key]" value="<?php echo $payment['aliwappay']['md5_key']; ?>" placeholder="MD5密钥"  class="col-xs-10 col-sm-5">
                                    <span class="help-inline col-xs-12 col-sm-7">
                                   <span class="middle">*</span></span>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-sm-3 control-label no-padding-right" for="form-field-1"> 开发者应用私钥 </label>
                                    <div class="col-sm-9">
                                       <input type="text" name="config[aliwappay][rsa_private_key]" value="<?php echo $payment['aliwappay']['rsa_private_key']; ?>" placeholder="开发者应用私钥"  class="col-xs-10 col-sm-5">
                                    <span class="help-inline col-xs-12 col-sm-7">
                                   <span class="middle">*开发者应用私钥(完整路径)</span></span>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-sm-3 control-label no-padding-right" for="form-field-1"> 支付异步通知 </label>
                                    <div class="col-sm-9">
                                       <input type="url" name="config[aliwappay][notify_url]" value="<?php echo $payment['aliwappay']['notify_url']; ?>" placeholder="支付通知地址"  class="col-xs-10 col-sm-5">
                                    <span class="help-inline col-xs-12 col-sm-7">
                                   <span class="middle">*https://api.xx.com/receive_notify.html</span></span>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-sm-3 control-label no-padding-right" for="form-field-1"> 成功跳转 </label>
                                    <div class="col-sm-9">
                                       <input type="url" name="config[aliwappay][return_url]" value="<?php echo $payment['aliwappay']['return_url']; ?>" placeholder="成功跳转地址"  class="col-xs-10 col-sm-5">
                                       <input type="text" hidden="" name="config[aliwappay][time_expire]" value="14"  class="col-xs-10 col-sm-5">
                                    <span class="help-inline col-xs-12 col-sm-7">
                                   <span class="middle">*https://api.xx.com/receive_return.html</span></span>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-sm-3 control-label no-padding-right" for="form-field-1"> 签名方式 </label>
                                    <div class="col-sm-9">
                                <select name="config[aliwappay][sign_type]" class="col-sm-4" required="">
                                <option value="MD5" <?php if($payment['aliwappay']['sign_type'] == 'MD5'): ?>selected<?php endif; ?>>MD5</option>
                                <option value="RSA" <?php if($payment['aliwappay']['sign_type'] == 'RSA'): ?>selected<?php endif; ?>>RSA</option>                         
                                </select>
                                    <span class="help-inline col-xs-12 col-sm-7">
                                   <span class="middle">*目前支持:RSA   MD5</span></span>
                                    </div>
                                </div>
                                
                                <div class="space-4"></div>
                                <div class="form-group">
                                    <label class="col-sm-3 control-label no-padding-right" for="form-field-1"> 是否开启： </label>
                                    <div class="col-sm-9" style="padding-top:5px;">                                                              
                                    <input name="config[aliwappay][display]"  <?php if(!empty($payment['aliwappay']['display']) == 1): ?>checked<?php endif; ?> value="1" class="ace ace-switch ace-switch-4 btn-flat col-xs-10 col-sm-5" type="checkbox" />
                                    <span class="lbl middle help-inline" >&nbsp;&nbsp;* 默认关闭</span>
                                    </div>
                                </div>
                        </div>
                        <!--支付宝手机支付配置结束-->
                        <div id="wxqrcode" class="tab-pane fade">                           
                               <div class="form-group">
                                    <label class="col-sm-3 control-label no-padding-right" for="form-field-1"> 身份标识(appid) </label>
                                    <div class="col-sm-9">
                                        <input type="text" name="config[wxpayqrcode][app_id]" placeholder="身份标识(appid)" value="<?php echo $payment['wxpayqrcode']['app_id']; ?>"  class="col-xs-10 col-sm-5">
                                <span class="help-inline col-xs-12 col-sm-7">
                                    <span class="middle">*</span>
                                </span>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-sm-3 control-label no-padding-right" for="form-field-1"> 身份密钥(md5_key) </label>
                                    <div class="col-sm-9">
                                       <input type="password" name="config[wxpayqrcode][md5_key]" value="<?php echo $payment['wxpayqrcode']['md5_key']; ?>" placeholder="身份密钥(appsecret)"  class="col-xs-10 col-sm-5">
                                    <span class="help-inline col-xs-12 col-sm-7">
                                   <span class="middle" >*</span></span>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-sm-3 control-label no-padding-right" for="form-field-1"> 微信商户号(mchid) </label>
                                    <div class="col-sm-9">
                                       <input type="text" name="config[wxpayqrcode][mch_id]" value="<?php echo $payment['wxpayqrcode']['mch_id']; ?>" placeholder="微信商户号(mchid)"  class="col-xs-10 col-sm-5">
                                    <span class="help-inline col-xs-12 col-sm-7">
                                   <span class="middle">*</span></span>
                                    </div>
                                </div>
                                <div class="space-4"></div>
                                <div class="form-group">
                                    <label class="col-sm-3 control-label no-padding-right" for="form-field-1"> 微信通知地址 </label>
                                    <div class="col-sm-9">
                                       <input type="url" name="config[wxpayqrcode][notify_url]" value="<?php echo $payment['wxpayqrcode']['notify_url']; ?>" placeholder="微信通知地址"  class="col-xs-10 col-sm-5">
                                        <input type="text" hidden="" name="config[wxpayqrcode][time_expire]" value="14"  class="col-xs-10 col-sm-5">
                                    <span class="help-inline col-xs-12 col-sm-7">
                                   <span class="middle" >*</span></span>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-sm-3 control-label no-padding-right" for="form-field-1"> cert_path </label>
                                    <div class="col-sm-9">
                                       <input type="text" name="config[wxpayqrcode][cert_path]" value="<?php echo $payment['wxpayqrcode']['cert_path']; ?>" placeholder="cert_path"  class="col-xs-10 col-sm-5">
                                    <span class="help-inline col-xs-12 col-sm-7">
                                   <span class="middle">*</span></span>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-sm-3 control-label no-padding-right" for="form-field-1"> key_path </label>
                                    <div class="col-sm-9">
                                       <input type="text" name="config[wxpayqrcode][key_path]" value="<?php echo $payment['wxpayqrcode']['key_path']; ?>" placeholder="key_path"  class="col-xs-10 col-sm-5">
                                    <span class="help-inline col-xs-12 col-sm-7">
                                   <span class="middle">*</span></span>
                                    </div>
                                </div>

                                <div class="space-4"></div>
                                <div class="form-group">
                                    <label class="col-sm-3 control-label no-padding-right" for="form-field-1"> 是否开启： </label>
                                    <div class="col-sm-9" style="padding-top:5px;">                                 
                                    <input name="config[wxpayqrcode][display]"  <?php if(!empty($payment['wxpayqrcode']['display']) == 1): ?>checked<?php endif; ?> value="1" class="ace ace-switch ace-switch-4 btn-flat col-xs-10 col-sm-5" type="checkbox" />
                                    <span class="lbl middle help-inline" >&nbsp;&nbsp;* 默认关闭</span>
                                    </div>
                                </div>
                        </div>
                        <!--微信QRCODE支付配置结束-->
                        <div id="wxjspi" class="tab-pane fade">                           
                               <div class="form-group">
                                    <label class="col-sm-3 control-label no-padding-right" for="form-field-1"> 身份标识(appid) </label>
                                    <div class="col-sm-9">
                                        <input type="text" name="config[wxpaypub][app_id]" placeholder="身份标识(appid)" value="<?php echo $payment['wxpaypub']['app_id']; ?>"  class="col-xs-10 col-sm-5">
                                <span class="help-inline col-xs-12 col-sm-7">
                                    <span class="middle">*</span>
                                </span>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-sm-3 control-label no-padding-right" for="form-field-1"> 身份密钥(md5_key) </label>
                                    <div class="col-sm-9">
                                       <input type="password" name="config[wxpaypub][md5_key]" value="<?php echo $payment['wxpaypub']['md5_key']; ?>" placeholder="身份密钥(appsecret)"  class="col-xs-10 col-sm-5">
                                    <span class="help-inline col-xs-12 col-sm-7">
                                   <span class="middle" >*</span></span>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-sm-3 control-label no-padding-right" for="form-field-1"> 微信商户号(mchid) </label>
                                    <div class="col-sm-9">
                                       <input type="text" name="config[wxpaypub][mch_id]" value="<?php echo $payment['wxpaypub']['mch_id']; ?>" placeholder="微信商户号(mchid)"  class="col-xs-10 col-sm-5">
                                    <span class="help-inline col-xs-12 col-sm-7">
                                   <span class="middle">*</span></span>
                                    </div>
                                </div>
                                <div class="space-4"></div>
                                <div class="form-group">
                                    <label class="col-sm-3 control-label no-padding-right" for="form-field-1"> 微信通知地址 </label>
                                    <div class="col-sm-9">
                                       <input type="url" name="config[wxpaypub][notify_url]" value="<?php echo $payment['wxpaypub']['notify_url']; ?>" placeholder="微信通知地址"  class="col-xs-10 col-sm-5">
                                        <input type="text" hidden="" name="config[wxqrcode][time_expire]" value="14"  class="col-xs-10 col-sm-5">
                                    <span class="help-inline col-xs-12 col-sm-7">
                                   <span class="middle" >*</span></span>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-sm-3 control-label no-padding-right" for="form-field-1"> cert_path </label>
                                    <div class="col-sm-9">
                                       <input type="text" name="config[wxpaypub][cert_path]" value="<?php echo $payment['wxpaypub']['cert_path']; ?>" placeholder="cert_path"  class="col-xs-10 col-sm-5">
                                    <span class="help-inline col-xs-12 col-sm-7">
                                   <span class="middle">*</span></span>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-sm-3 control-label no-padding-right" for="form-field-1"> key_path </label>
                                    <div class="col-sm-9">
                                       <input type="text" name="config[wxpaypub][key_path]" value="<?php echo $payment['wxpaypub']['key_path']; ?>" placeholder="key_path"  class="col-xs-10 col-sm-5">
                                    <span class="help-inline col-xs-12 col-sm-7">
                                   <span class="middle">*</span></span>
                                    </div>
                                </div>

                                <div class="space-4"></div>
                                <div class="form-group">
                                    <label class="col-sm-3 control-label no-padding-right" for="form-field-1"> 是否开启： </label>
                                    <div class="col-sm-9" style="padding-top:5px;">                                 
                                    <input name="config[wxpaypub][display]"  <?php if(!empty($payment['wxpaypub']['display']) == 1): ?>checked<?php endif; ?> value="1" class="ace ace-switch ace-switch-4 btn-flat col-xs-10 col-sm-5" type="checkbox" />
                                    <span class="lbl middle help-inline" >&nbsp;&nbsp;* 默认关闭</span>
                                    </div>
                                </div>
                        </div>
                        <!--微信JSAPI支付配置结束-->
                        
                        <div id="tenpay" class="tab-pane fade">                                                  
                                <div class="form-group">
                                    <label class="col-sm-3 control-label no-padding-right" for="form-field-1"> 签约密钥 </label>
                                    <div class="col-sm-9">
                                       <input type="password" name="config[tenpay][key]" value="<?php echo $payment['tenpay']['key']; ?>" placeholder="签约密钥"  class="col-xs-10 col-sm-5">
                                    <span class="help-inline col-xs-12 col-sm-7">
                                   <span class="middle" >*</span></span>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-sm-3 control-label no-padding-right" for="form-field-1"> partner </label>
                                    <div class="col-sm-9">
                                       <input type="text" name="config[tenpay][partner]" value="<?php echo $payment['tenpay']['partner']; ?>" placeholder="partner"  class="col-xs-10 col-sm-5">
                                    <span class="help-inline col-xs-12 col-sm-7">
                                   <span class="middle" >*</span></span>
                                    </div>
                                </div>
                                <div class="space-4"></div>
                                <div class="form-group">
                                    <label class="col-sm-3 control-label no-padding-right" for="form-field-1"> 是否开启： </label>
                                    <div class="col-sm-9" style="padding-top:5px;">
                                    <input name="config[tenpay][display]"  <?php if(!empty($payment['tenpay']['display']) == 1): ?>checked<?php endif; ?> value="1" class="ace ace-switch ace-switch-4 btn-flat col-xs-10 col-sm-5" type="checkbox" />
                                    <span class="lbl middle help-inline" >&nbsp;&nbsp;* 默认关闭</span>
                                    </div>
                                </div>
                        </div>
                        <!--财富通配置结束-->
                        <div id="unionpay" class="tab-pane fade">                                                  
                                <div class="form-group">
                                    <label class="col-sm-3 control-label no-padding-right" for="form-field-1"> 签约密钥 </label>
                                    <div class="col-sm-9">
                                       <input type="password" name="config[unionpay][key]" value="<?php echo $payment['unionpay']['key']; ?>" placeholder="签约密钥"  class="col-xs-10 col-sm-5">
                                    <span class="help-inline col-xs-12 col-sm-7">
                                   <span class="middle" >*</span></span>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-sm-3 control-label no-padding-right" for="form-field-1"> partner </label>
                                    <div class="col-sm-9">
                                       <input type="text" name="config[unionpay][partner]" value="<?php echo $payment['unionpay']['partner']; ?>" placeholder="partner"  class="col-xs-10 col-sm-5">
                                    <span class="help-inline col-xs-12 col-sm-7">
                                   <span class="middle" >*</span></span>
                                    </div>
                                </div>
                                <div class="space-4"></div>
                                <div class="form-group">
                                    <label class="col-sm-3 control-label no-padding-right" for="form-field-1"> 是否开启： </label>
                                    <div class="col-sm-9" style="padding-top:5px;">                                    
                                    <input name="config[unionpay][display]"  <?php if(!empty($payment['unionpay']['display']) == 1): ?>checked<?php endif; ?> value="1" class="ace ace-switch ace-switch-4 btn-flat col-xs-10 col-sm-5" type="checkbox" />
                                    <span class="lbl middle help-inline" >&nbsp;&nbsp;* 默认关闭</span>
                                    </div>
                                </div>
                        </div>
                        <!--财富通配置结束-->
                        <div id="palpay" class="tab-pane fade">                           
                                <div class="form-group">
                                    <label class="col-sm-3 control-label no-padding-right" for="form-field-1"> 签约账户 </label>
                                    <div class="col-sm-9">
                                        <input type="text" name="config[palpay][business]" placeholder="签约账户" id="site_host" value="<?php echo $payment['palpay']['business']; ?>"  class="col-xs-10 col-sm-5" >
                                <span class="help-inline col-xs-12 col-sm-7">
                                    <span class="middle" id="restwo">* Paypal business为email收款账户 </span>
                                </span>
                                    </div>
                                </div>
                                <div class="space-4"></div>
                                <div class="form-group">
                                    <label class="col-sm-3 control-label no-padding-right" for="form-field-1"> 是否开启： </label>
                                    <div class="col-sm-9" style="padding-top:5px;">                                   
                                    <input name="config[palpay][display]" id="payment_open" <?php if(!empty($payment['palpay']['display']) == 1): ?>checked<?php endif; ?> value="1" class="ace ace-switch ace-switch-4 btn-flat col-xs-10 col-sm-5" type="checkbox" />  
                                    <span class="lbl middle help-inline" >&nbsp;&nbsp;* 默认关闭</span>
                                    </div>
                                </div>
                        </div>
                        <!--Paypal配置结束-->

                            <div class="clearfix form-actions">
                            <div class="col-sm-offset-3 col-sm-9">
                            <input type="hidden" name="name" value="payment"></input>
                                <button class="btn btn-info" type="submit"><i class="ace-icon fa fa-check bigger-110"></i>保存</button>
                                &nbsp; &nbsp; &nbsp;
                                <button class="btn" type="reset"><i class="ace-icon fa fa-undo bigger-110"></i>重置</button>
                            </div>
                            </div>
                            
                        </div>
                        </form>    
                        <div class="space-4"></div>            
                            
                        </div>
                      
                  
            </div>
             </fieldset>
        </div>


	</div><!-- /.page-content -->

			<!-- 右侧下主要内容结束 -->
		</div>
	</div><!-- 主要内容结束 -->
	<!-- 页脚开始 -->
	<div class="footer">
	<div class="footer-inner">
		<div class="footer-content">
			<span class="bigger-120">
				<span class="blue bolder"><a href="http://www.rainfer.cn" target="_ablank">亚马逊</a></span>
				后台管理系统 &copy; 2019-<?php echo date('Y'); ?>
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
