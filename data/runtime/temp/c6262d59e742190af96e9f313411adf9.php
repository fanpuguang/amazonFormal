<?php if (!defined('THINK_PATH')) exit(); /*a:6:{s:74:"/www/wwwroot/www.ldkjmy.com/aaaa/yamaxun/app/admin/view/news/news_add.html";i:1560499588;s:72:"/www/wwwroot/www.ldkjmy.com/aaaa/yamaxun/app/admin/view/public/base.html";i:1503645978;s:74:"/www/wwwroot/www.ldkjmy.com/aaaa/yamaxun/app/admin/view/public/header.html";i:1573695866;s:76:"/www/wwwroot/www.ldkjmy.com/aaaa/yamaxun/app/admin/view/public/left_nav.html";i:1575361026;s:76:"/www/wwwroot/www.ldkjmy.com/aaaa/yamaxun/app/admin/view/public/head_nav.html";i:1554196766;s:74:"/www/wwwroot/www.ldkjmy.com/aaaa/yamaxun/app/admin/view/public/footer.html";i:1575530481;}*/ ?>
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
					添加产品
				</small>
			</h1>
		</div>
		<div class="row">
			<div class="col-xs-12">
				<form class="form-horizontal ajaxForm2" name="form0" method="post" action="<?php echo url('admin/News/news_runadd'); ?>"  enctype="multipart/form-data">

					<!--<div class="form-group">
						<label class="col-sm-2 control-label no-padding-right" for="form-field-1"> 产品所属分类： </label>
						<div class="col-sm-10">
							<select name="news_columnid"  class="col-sm-3 selector" required>
								<option value="">请选择所属分类</option>
								<option value="">家居用品</option>-->
								<!--<?php if(is_array($menu) || $menu instanceof \think\Collection || $menu instanceof \think\Paginator): if( count($menu)==0 ) : echo "" ;else: foreach($menu as $key=>$vo): ?>
									<option value="<?php echo $vo['id']; ?>" <?php if($vo['id'] == $news_columnid): ?> selected <?php endif; if($vo['menu_type'] == 1): ?>disabled class="bgccc"<?php else: ?>class="bgc"<?php endif; ?>><?php echo $vo['lefthtml']; ?><?php echo $vo['menu_name']; ?>(<?php if($vo['menu_l'] == 'zh-cn'): ?>中<?php else: ?>英<?php endif; ?>) <?php if($vo['menu_type'] == 1): ?>(频道页)<?php endif; ?></option>
								<?php endforeach; endif; else: echo "" ;endif; ?>-->
							<!--</select>
						</div>
					</div>
					<div class="space-4"></div>-->
					
					<div class="form-group">
						<label class="col-sm-2 control-label no-padding-right" for="form-field-1"> 产品简称：  </label>
						<div class="col-sm-10">
							<!--<input type="text" name="news_title" id="news_title"  placeholder="必填：产品简称"  class="col-xs-10 col-sm-6" required/>-->
							<input type="text" name="news_titleshort" id="news_titleshort"  placeholder="产品简称，建议1~12字数"  class="col-xs-10 col-sm-4" style="margin-left:10px;" />
                                            <span class="help-inline col-xs-12 col-sm-7">
												<span class="middle" id="resone"></span>
											</span>
						</div>
					</div>
					<div class="space-4"></div>

					<div class="form-group">
						<label class="col-sm-2 control-label no-padding-right" for="form-field-1"> SKU：  </label>
						<div class="col-sm-10">
							<!--<input type="text" name="news_title" id="news_title"  placeholder="必填：产品简称"  class="col-xs-10 col-sm-6" required/>-->
							<input type="text" name="sku" id="sku"  placeholder="库存编码"  class="col-xs-10 col-sm-2" style="margin-left:10px;" />
							<span class="help-inline col-xs-12 col-sm-7">
												<span class="middle" id="resone"></span>
											</span>
						</div>
					</div>
					<div class="space-4"></div>





					<div class="form-group">
						<label class="col-sm-2 control-label no-padding-right" for="form-field-1"> 产品图集： </label>
						<div class="col-sm-10">
							<div class="radio" >
								<!--<label>
									<input name="news_pic_type" id="news_pic_list"  type="radio" class="ace" value="1"/>
									<span class="lbl"> 无图模式</span>
								</label>
								<label>
									<input name="news_pic_type" id="news_pic_qqlist" checked type="radio" class="ace" value="2"/>
									<span class="lbl"> 多图模式</span>
								</label>-->
							</div>
						</div>
					</div>
					<div class="space-4"></div>

					<!---------------------------------------              多图上传                ------------------------------------------------------->

					<!-- <link rel="stylesheet" type="text/css" href="__PUBLIC__/ace/tpsc/css/bootstrap.css">-->
                    <!--<link rel="stylesheet" type="text/css" href="__PUBLIC__/ace/tpsc/css/bootstrap-theme.min.css">
                    <link rel="stylesheet" type="text/css" href="__PUBLIC__/ace/tpsc/css/style.css">-->
                    <link rel="stylesheet" type="text/css" href="__PUBLIC__/ace/tpsc/css/demo.css">
                    <link rel="stylesheet" type="text/css" href="__PUBLIC__/ace/tpsc/webuploader-0.1.5/webuploader.css">
					<div class="page-container" style="width:1600px;">

						<div id="uploader" class="wu-example" style="width:1600px;">
							<div class="queueList">
								<div id="dndArea" class="placeholder">
									<div id="filePicker"></div>
									<p>或将照片拖到这里</p>
								</div>
							</div>
							<div class="statusBar" style="display:none">
								<div class="progress">
									<span class="text">0%</span>
									<span class="percentage"></span>
								</div>
								<div class="info"></div>
								<div class="btns">
									<div id="filePicker2"></div>
									<div class="uploadBtn">开始上传</div>
								</div>
							</div>
						</div>
					</div>

					<script type="text/javascript" src="__PUBLIC__/ace/tpsc/js/jquery.min.js"></script>
					<script type="text/javascript" src="__PUBLIC__/ace/tpsc/js/bootstrap.min.js"></script>
					<script type="text/javascript" src="__PUBLIC__/ace/tpsc/webuploader-0.1.5/webuploader.js"></script>
					<script type="text/javascript">
						window.webuploader = {
							config:{
								thumbWidth: 225, //缩略图宽度，可省略，默认为110
								thumbHeight: 225, //缩略图高度，可省略，默认为110
								wrapId: 'uploader', //必填
							},
							//处理客户端新文件上传时，需要调用后台处理的地址, 必填
							uploadUrl: "<?php echo url('admin/News/fileupload'); ?>",

							//处理客户端原有文件更新时的后台处理地址，必填
							updateUrl: "<?php echo url('admin/News/fileupdate'); ?>",
							//当客户端原有文件删除时的后台处理地址，必填
							removeUrl: "<?php echo url('admin/News/filedel'); ?>",
							//初始化客户端上传文件，从后台获取文件的地址, 可选，当此参数为空时，默认已上传的文件为空
							initUrl: "<?php echo url('admin/News/fileinit'); ?>",
						}
					</script>
					<script src="__PUBLIC__/ace/tpsc/webuploader-0.1.5/extend-webuploader.js" type="text/javascript"></script>


					<!---------------------------------------                     多图上传结束                        ------------------------------------------------------->
					<!-- 多图上传 -->
					<!--<link href="__PUBLIC__/ppy/css/fileinput.css" media="all" rel="stylesheet" type="text/css" />
					<script src="__PUBLIC__/ppy/js/fileinput.js" type="text/javascript"></script>
					<script src="__PUBLIC__/ppy/js/fileinput_locale_zh.js" type="text/javascript"></script>
					<div class="form-group" id="pic_list" style="display: block;">
						<div class="col-sm-10 col-sm-offset-2" style="padding-top:5px;">
							<input id="file-5" name="pic_all[]" type="file"  class="file"  multiple data-preview-file-type="any" data-upload-url="#" data-preview-file-icon=""><br />
							<textarea name="news_pic_content" class="col-xs-12 col-sm-12" id="news_pic_content"  placeholder="单次编辑或添加文章,选择多图时请一次性选择。多图对应文章说明，例如： 图片一说明 | 图片二说明 | 图片三说明    每个文字说明以 | 分割" ></textarea>
						</div>
					</div>-->
					<div class="space-4"></div>
					<div class="form-group">
						<label class="col-sm-2 control-label no-padding-right" for="form-field-1"> 是否审核： </label>
						<div class="col-sm-10" style="padding-top:5px;">
							<input name="news_open" id="news_open" value="1" class="ace ace-switch ace-switch-4 btn-flat" type="checkbox" />
							<span class="lbl">&nbsp;&nbsp;默认关闭</span>
						</div>
					</div>
					<div class="space-4"></div>

					<div class="form-group">
						<label class="col-sm-2 control-label no-padding-right" for="form-field-1"> 成本单价：  </label>
						<div class="col-sm-10">
							<input type="number" name="news_cpprice" id="news_cpprice" placeholder="成本单价" class="col-xs-10 col-sm-2" />

							<label class="col-sm-2 control-label no-padding-right" for="form-field-1"> 固定运费：  </label>
							<input type="number" name="fixed_shipping" id="fixed_shipping" placeholder="固定运费" class="col-xs-10 col-sm-2" />

						</div>


					</div>
					<div class="space-4"></div>
					<div class="form-group" style="">
						<label class="col-sm-2 control-label no-padding-right" for="form-field-1"> 产品材料：  </label>
						<div class="col-sm-10">
							<input type="text" name="product_material" id="product_material" placeholder="产品材料" class="col-xs-10 col-sm-2" />

							<label class="col-sm-2 control-label no-padding-right" for="form-field-1"> 库存：  </label>
							<input type="number" name="fixed_shipping" id="fixed_shipping" placeholder="库存" class="col-xs-10 col-sm-2" />
						</div>
					</div>
					<div class="space-4"></div>

					<div class="form-group">
						<label class="col-sm-2 control-label no-padding-right" for="form-field-1"> 产品来源：  </label>
						<div class="col-sm-10">
							<input type="text" name="news_source" id="news_source" placeholder="来源URL" class="col-xs-10 col-sm-6" />
							<input type="text" name="news_source" id="news_source" placeholder="备注（例如：天猫，京东，淘宝等）" class="col-xs-10 col-sm-3" />
							<span class="help-inline col-xs-12 col-sm-6">
								<span class="middle">正确格式：http:// 开头</span>
							</span>
						</div>
					</div>
					<div class="space-4"></div>

<!--------------------------------------------运费模块开始---------------------------------------------------------------->
					<div class="form_item">
						<div class="item">
							<div>
								<h4>
									成本运费
								</h4>
							</div>
							<div class="pro_inf chengben">
            <span>
                <label for="">
                    采购价格(￥)：
                </label>
                <input type="text" placeholder="采购价格(￥)" onkeyup="this.value=this.value.replace(/[^\d.]/g,'');">
            </span>
			<span>
                <label for="">
                    国内运费(￥)：
                </label>
                <input type="text" placeholder="国内运费(￥)" onkeyup="this.value=this.value.replace(/[^\d.]/g,'');">
            </span
			<span>
                <label for="">
                    包装毛重(kg)：
                </label>
                <input type="text" placeholder="包装毛重(kg)" onkeyup="this.value=this.value.replace(/[^\d.]/g,'');">
            </span>
								<br>
								<span>
                <label for="">
                    包装尺寸(cm)：
                </label>
                <input type="text" placeholder="长" onkeyup="this.value=this.value.replace(/[^\d.]/g,'');"
					   class="size_input">
                *
                <input type="text" placeholder="宽" onkeyup="this.value=this.value.replace(/[^\d.]/g,'');"
					   class="size_input">
                *
                <input type="text" placeholder="高" onkeyup="this.value=this.value.replace(/[^\d.]/g,'');"
					   class="size_input">
            </span>
								<span>
                <label for="">
                    库存数量：
                </label>
                <input type="text" placeholder="库存数量" onkeyup="this.value=this.value.replace(/[^\d.]/g,'');">
            </span>
								<span>
                <label for="" >
                    预处理时间(天/现货填1)：
                </label>
                <input type="text" placeholder="预处理时间(天/现货填1)" onkeyup="this.value=this.value.replace(/[^\d.]/g,'');">
            </span>
								<table class="tableY">
									<tbody>
									<tr>
										<th style="color: rgb(243, 125, 13); font-size: 14px; font-weight: bold; cursor: pointer;">
											<i class="layui-icon layui-icon-refresh" style="font-size: 10px; cursor: pointer;">
											</i>
											获取利润
										</th>
										<th>
											美国
										</th>
										<th>
											加拿大
										</th>
										<th>
											墨西哥
										</th>
										<th>
											英国
										</th>
										<th>
											法国
										</th>
										<th>
											德国
										</th>
										<th>
											意大利
										</th>
										<th>
											西班牙
										</th>
										<th>
											日本
										</th>
										<th>
											澳大利亚
										</th>
									</tr>
									<tr>
										<th>
											运费（￥）
										</th>
										<td>
											0
										</td>
										<td>
											0
										</td>
										<td>
											0
										</td>
										<td>
											0
										</td>
										<td>
											0
										</td>
										<td>
											0
										</td>
										<td>
											0
										</td>
										<td>
											0
										</td>
										<td>
											0
										</td>
										<td>
											0
										</td>
									</tr>
									<tr>
										<th>
											售价（￥）
										</th>
										<td>
											0
										</td>
										<td>
											0
										</td>
										<td>
											0
										</td>
										<td>
											0
										</td>
										<td>
											0
										</td>
										<td>
											0
										</td>
										<td>
											0
										</td>
										<td>
											0
										</td>
										<td>
											0
										</td>
										<td>
											0
										</td>
									</tr>
									<tr>
										<th>
											外币
										</th>
										<td>
											0
										</td>
										<td>
											0
										</td>
										<td>
											0
										</td>
										<td>
											0
										</td>
										<td>
											0
										</td>
										<td>
											0
										</td>
										<td>
											0
										</td>
										<td>
											0
										</td>
										<td>
											0
										</td>
										<td>
											0
										</td>
									</tr>
									<tr>
										<th>
											优化
										</th>
										<td>
											0
										</td>
										<td>
											0
										</td>
										<td>
											0
										</td>
										<td>
											0
										</td>
										<td>
											0
										</td>
										<td>
											0
										</td>
										<td>
											0
										</td>
										<td>
											0
										</td>
										<td>
											0
										</td>
										<td>
											0
										</td>
									</tr>
									<tr>
										<th>
											最终售价
										</th>
										<td>
											<input type="text" onkeyup="this.value=this.value.replace(/[^\d.]/g,'');"
												   style="width: 90%;">
										</td>
										<td>
											<input type="text" onkeyup="this.value=this.value.replace(/[^\d.]/g,'');"
												   style="width: 90%;">
										</td>
										<td>
											<input type="text" onkeyup="this.value=this.value.replace(/[^\d.]/g,'');"
												   style="width: 90%;">
										</td>
										<td>
											<input type="text" onkeyup="this.value=this.value.replace(/[^\d.]/g,'');"
												   style="width: 90%;">
										</td>
										<td>
											<input type="text" onkeyup="this.value=this.value.replace(/[^\d.]/g,'');"
												   style="width: 90%;">
										</td>
										<td>
											<input type="text" onkeyup="this.value=this.value.replace(/[^\d.]/g,'');"
												   style="width: 90%;">
										</td>
										<td>
											<input type="text" onkeyup="this.value=this.value.replace(/[^\d.]/g,'');"
												   style="width: 90%;">
										</td>
										<td>
											<input type="text" onkeyup="this.value=this.value.replace(/[^\d.]/g,'');"
												   style="width: 90%;">
										</td>
										<td>
											<input type="text" onkeyup="this.value=this.value.replace(/[^\d.]/g,'');"
												   style="width: 90%;">
										</td>
										<td>
											<input type="text" onkeyup="this.value=this.value.replace(/[^\d.]/g,'');"
												   style="width: 90%;">
										</td>
									</tr>
									<tr>
										<th>
											利润（￥）
										</th>
										<td>
											0 (0.00%)
										</td>
										<td>
											0 (0.00%)
										</td>
										<td>
											0 (0.00%)
										</td>
										<td>
											0 (0.00%)
										</td>
										<td>
											0 (0.00%)
										</td>
										<td>
											0 (0.00%)
										</td>
										<td>
											0 (0.00%)
										</td>
										<td>
											0 (0.00%)
										</td>
										<td>
											0 (0.00%)
										</td>
										<td>
											0 (0.00%)
										</td>
									</tr>
									</tbody>
								</table>
							</div>
						</div>
					</div>
<!-----------------------------------------运费模块结尾------------------------------------------------------------------->
<!----------------------------------------变体模块开始------------------------------------------------------------------->
					<div class="form_item">
						<div class="item">
							<div>
								<h4>
									规格变体
								</h4>
							</div>
							<div class="pro_inf">
                            <span>
                                <label for="">
                                    变体参数：
                                </label>
                                <input type="button" value="添加">
                            </span>
								<div class="variantName">
								</div>
								<!---->
							</div>
						</div>
					</div>
					<div id="proStation" class="tankuang" style="display: none;">
						<h3>
							产品回收站
						</h3>
						<div class="some-content-related-div" style="width: 100%; margin: 0px auto;">
							<div class="slimScrollDiv" style="position: relative; overflow: hidden; width: auto; height: 400px;">
								<div class="inner-content-div2" style="overflow: hidden; width: auto; height: 400px;">
									<ul class="proStationUl">
									</ul>
								</div>
								<div class="slimScrollBar" style="background: rgb(40, 149, 229); width: 4px; position: absolute; top: 0px; opacity: 0.4; display: block; border-radius: 7px; z-index: 99; right: 1px;">
								</div>
								<div class="slimScrollRail" style="width: 4px; height: 100%; position: absolute; top: 0px; display: none; border-radius: 7px; background: rgb(4, 254, 233); opacity: 0.2; z-index: 90; right: 1px;">
								</div>
							</div>
						</div>
					</div>
					<div id="selImg" class="tankuang" style="display: none; position: relative;">
						<h3>
							产品相册
						</h3>
						<div class="some-content-related-div" style="width: 100%; margin: 0px auto;">
							<div class="slimScrollDiv" style="position: relative; overflow: hidden; width: auto; height: 400px;">
								<div class="inner-content-div2" style="overflow: hidden; width: auto; height: 400px;">
									<ul class="proStationUl">
									</ul>
								</div>
								<div class="slimScrollBar" style="background: rgb(40, 149, 229); width: 4px; position: absolute; top: 0px; opacity: 0.4; display: block; border-radius: 7px; z-index: 99; right: 1px;">
								</div>
								<div class="slimScrollRail" style="width: 4px; height: 100%; position: absolute; top: 0px; display: none; border-radius: 7px; background: rgb(4, 254, 233); opacity: 0.2; z-index: 90; right: 1px;">
								</div>
							</div>
						</div>
					</div>
					<div id="addVariant" class="tankuang" style="display: none;">
						<h3>
							添加变体
						</h3>
						<div>
							<label for="">
								变体名称
							</label>
							<select name="" id="variantName" placeholder="变体名称">
								<option value="0">
									颜色（color）
								</option>
								<option value="1">
									尺寸（sizeNam）
								</option>
							</select>
						</div>
						<div>
							<label for="">
								变体值:(多个值用逗号隔开如:red,white,black)
							</label>
							<textarea name="" id="variantType" placeholder="变体名称" class="variantType">
                        </textarea>
						</div>
						<div>
							<label for="">
								推荐：
							</label>
							<span data-val="Beige">
                            米色
                        </span>
							<span data-val="Black">
                            黑色
                        </span>
							<span data-val="Blue">
                            蓝色
                        </span>
							<span data-val="Bronze">
                            青铜
                        </span>
							<span data-val="Brown">
                            棕色
                        </span>
							<span data-val="Clear">
                            明确
                        </span>
							<span data-val="Copper">
                            铜
                        </span>
							<span data-val="Cream">
                            奶油
                        </span>
							<span data-val="Gold">
                            金
                        </span>
							<span data-val="Green">
                            绿色
                        </span>
							<span data-val="Grey">
                            灰色
                        </span>
							<span data-val="Metallic">
                            金属
                        </span>
							<span data-val="Multi-colored">
                            多色
                        </span>
							<span data-val="Orange">
                            橙子
                        </span>
							<span data-val="Pink">
                            粉
                        </span>
							<span data-val="Purple">
                            紫色
                        </span>
							<span data-val="Red">
                            红
                        </span>
							<span data-val="Silver">
                            银
                        </span>
							<span data-val="White">
                            白色
                        </span>
							<span data-val="Yellow">
                            黄色
                        </span>
							<!---->
							<!---->
							<!---->
							<!---->
							<!---->
							<!---->
							<!---->
							<!---->
							<!---->
							<!---->
						</div>
					</div>
					<div id="upVariant" class="tankuang" style="display: block;">
						<h3>
							添加变体
						</h3>
						<div>
							<label for="">
								变体名称
							</label>
							<select name="" id="variantName1" placeholder="变体名称" disabled="disabled">
								<option value="0">
									颜色（color）
								</option>
								<option value="1">
									尺寸（sizeNam）
								</option>
							</select>
						</div>
						<div>
							<label for="">
								变体值:(多个值用逗号隔开如:red,white,black)
							</label>
							<textarea name="" id="variantType1" placeholder="变体名称" class="variantType">
                        </textarea>
						</div>
						<div>
							<label for="">
								推荐：
							</label>
							<span data-val="Beige">
                            米色
                        </span>
							<span data-val="Black">
                            黑色
                        </span>
							<span data-val="Blue">
                            蓝色
                        </span>
							<span data-val="Bronze">
                            青铜
                        </span>
							<span data-val="Brown">
                            棕色
                        </span>
							<span data-val="Clear">
                            明确
                        </span>
							<span data-val="Copper">
                            铜
                        </span>
							<span data-val="Cream">
                            奶油
                        </span>
							<span data-val="Gold">
                            金
                        </span>
							<span data-val="Green">
                            绿色
                        </span>
							<span data-val="Grey">
                            灰色
                        </span>
							<span data-val="Metallic">
                            金属
                        </span>
							<span data-val="Multi-colored">
                            多色
                        </span>
							<span data-val="Orange">
                            橙子
                        </span>
							<span data-val="Pink">
                            粉
                        </span>
							<span data-val="Purple">
                            紫色
                        </span>
							<span data-val="Red">
                            红
                        </span>
							<span data-val="Silver">
                            银
                        </span>
							<span data-val="White">
                            白色
                        </span>
							<span data-val="Yellow">
                            黄色
                        </span>
							<br>
							<!---->
							<!---->
							<!---->
							<!---->
							<!---->
							<!---->
							<!---->
							<!---->
							<!---->
							<!---->
						</div>
					</div>
					<style>
						.ul1 {
							width: 100%;
							position: relative;
							/*margin: 10px auto;*/
							/*overflow: hidden;*/
							/*height: 100px;*/
						}

						.ul1 li {
							width: 50px;
							height: 50px;
							float: left;
							/*overflow: hidden;*/
							list-style: none;
							margin: 10px;
							position: relative;
						}
						.ul1 li img{
							width: 100%;
							max-height: 100%;
							box-shadow: 0 0 10px #ddd;
						}
						.ul1 li i{
							position: absolute;
							top: -15px;
							left: 45px;
							color: #00a3e8;
							cursor: pointer;
							display: none;
						}

						.ul1 li:hover {
							border-color: #9a9fa4;
							box-shadow: 0 0 6px 0 rgba(0, 0, 0, 0.85);
						}

						.ul1 .active {
							border: 1px dashed red;
						}
						form .item div:nth-child(2) .imgDiv>div:hover{
							/*border: 2px solid #00a3e8;*/
							box-shadow: 0 0 10px #888;
						}
						form .item div:nth-child(2) .imgDiv>div.active{
							border: 2px solid #00a3e8;
							box-shadow: 0 0 10px #888;
						}
						#demo>form:nth-child(2){
							display: none;
						}
						#moveSelected1{
							position:absolute;
							background-color: #89d2ff;
							opacity:0.3;
							border:1px dashed #d9d9d9;
							top:0;
							left:0;
						}

					</style>
<!-----------------------------------------变体模块结尾------------------------------------------------------------------->

					<ul class="nav nav-tabs" id="myTab" style="width: 76%;margin: 0 auto;">
						<li class="active">
							<a data-toggle="tab" href="#zh">
								中文
							</a>
						</li>

						<li>
							<a data-toggle="tab" href="#en">
								英语
							</a>
						</li>

						<li>
							<a data-toggle="tab" href="#fr">
								法语
							</a>
						</li>
						<li>
							<a data-toggle="tab" href="#dy">
								德语
							</a>
						</li>
						<li>
							<a data-toggle="tab" href="#ydl">
								意大利语
							</a>
						</li>
						<li>
							<a data-toggle="tab" href="#xby">
								西班牙语
							</a>
						</li>
						<li>
							<a data-toggle="tab" href="#ry">
								日语
							</a>
						</li>
					</ul>

					<div class="space-4"></div>
					<div class="space-4"></div>
					<style>
						.fade {
							display:none;
						}
						.active {
							display:block;
						}
					</style>
					<script type="text/javascript">
						//首字母大写
						function titleCase(str) {
							var temp=[];
							str =  $('#title_zh').val();

							str=str.toLowerCase();//全部转换为小写
							temp=str.split(" ");//分割存入数组
							for(var i=0;i<temp.length;i++){
								var str_temp=temp[i].charAt(0);//获取首字母
								str_temp=str_temp.toUpperCase();//转换为大写
								temp[i]=temp[i].replace(temp[i].charAt(0),str_temp);//将首字母变换
							}
							str=temp.join(" ");
							$('#title_zh').val(str);
							//return str;
						}

					</script>
					<script>
						window.onload = function () {
							//获取文本内容和长度函数
							function txtCount(el) {
								var val = el.value;
								var eLen = val.length;
								return eLen;
							}

							var el = document.getElementById('title_zh');
							el.addEventListener('input',function () {
								var len =  txtCount(this); //   调用函数
								document.getElementById('textCount').innerHTML = len;
							});
							var el = document.getElementById('keyword_zh');
							el.addEventListener('input',function () {
								var len =  txtCount(this); //   调用函数
								document.getElementById('textCount_gjc').innerHTML = len;
							});

							/*
							//兼容ie
							el.addEventListener('propertychange',function () {
								var len =  txtCount(this);
								document.getElementById('textCount').innerHTML = len;
							});*/
						}

					</script>
				<div id="zh" class="tab-pane fade in active">
					<button class="btn btn-info" type="button" style="margin-left:200px;margin-bottom: 20px;" onclick="titleCase('title_zh')">

						首字母大写
					</button>
					<button class="btn btn-info" type="button" style="margin-left:20px;margin-bottom: 20px;" onclick="fanyi()">

						一键翻译
					</button>
					<div class="form-group">
						<label class="col-sm-2 control-label no-padding-right" for="form-field-1">  </label><div class="col-sm-10"> 标题：(<span id="textCount">0</span>/<span style="color:red;">200</span>) </div>
					</div>
					<div class="form-group">
						<label class="col-sm-2 control-label no-padding-right" for="form-field-1">  </label>
						<div class="col-sm-10">

							<textarea name="title_zh" cols="20" rows="2" maxlength="200o" class="col-xs-10 col-sm-8 limitedone" id="title_zh" style="margin: 0px; height: 80px; width: 800px;" placeholder="标题"></textarea>
						</div>
					</div>
					<div class="space-4"></div>
					<div class="form-group">
						<label class="col-sm-2 control-label no-padding-right" for="form-field-1">  </label><div class="col-sm-10"> 关键字：(<span id="textCount_gjc">0</span>/<span style="color:red;">250</span>) </div>
					</div>
					<div class="form-group">
						<label class="col-sm-2 control-label no-padding-right" for="form-field-1">  </label>
						<div class="col-sm-10">

							<textarea name="keyword_zh" cols="20" rows="2" class="col-xs-10 col-sm-8 limitedone" id="keyword_zh" style="margin: 0px; height: 100px; width: 800px;" placeholder="关键字"></textarea>
						</div>
					</div>
					<div class="space-4"></div>
					<div class="form-group">
						<label class="col-sm-2 control-label no-padding-right" for="form-field-1">  </label><div class="col-sm-10"> 要点： </div>
					</div>
					<div class="form-group">
						<label class="col-sm-2 control-label no-padding-right" for="form-field-1">  </label>
						<div class="col-sm-10">

							<textarea name="keypotins_zh" cols="20" rows="2" class="col-xs-10 col-sm-8 limitedone" id="keypotins_zh" style="margin: 0px; height: 100px; width: 800px;" placeholder="要点说明不超过5行"></textarea>
						</div>
					</div>
					<div class="space-4"></div>
					<div class="form-group">
						<label class="col-sm-2 control-label no-padding-right" for="form-field-1">  </label><div class="col-sm-10">描述： </div>
					</div>
					<div class="form-group">
						<label class="col-sm-2 control-label no-padding-right" for="form-field-1">  </label>
						<div class="col-sm-10">

							<textarea name="description_zh" cols="20" rows="2" class="col-xs-10 col-sm-8 limitedone" id="description_zh" style="margin: 0px; height: 100px; width: 800px;" placeholder="描述"></textarea>
						</div>
					</div>
					<div class="space-4"></div>
				</div>


				<div id="en" class="tab-pane fade">
					<div class="form-group">
						<label class="col-sm-2 control-label no-padding-right" for="form-field-1">  </label><div class="col-sm-10"> 标题2：(0/<span style="color:red;">200</span>) </div>
					</div>
					<div class="form-group">
						<label class="col-sm-2 control-label no-padding-right" for="form-field-1">  </label>
						<div class="col-sm-10">

							<textarea name="title_zh" cols="20" rows="2" class="col-xs-10 col-sm-8 limitedone" id="form-field-10" style="margin: 0px; height: 80px; width: 800px;" placeholder="标题"></textarea>
						</div>
					</div>
					<div class="space-4"></div>
					<div class="form-group">
						<label class="col-sm-2 control-label no-padding-right" for="form-field-1">  </label><div class="col-sm-10"> 关键字：(0/<span style="color:red;">250</span>) </div>
					</div>
					<div class="form-group">
						<label class="col-sm-2 control-label no-padding-right" for="form-field-1">  </label>
						<div class="col-sm-10">

							<textarea name="keyword_zh" cols="20" rows="2" class="col-xs-10 col-sm-8 limitedone" id="form-field-10" style="margin: 0px; height: 100px; width: 800px;" placeholder="关键字"></textarea>
						</div>
					</div>
					<div class="space-4"></div>
					<div class="form-group">
						<label class="col-sm-2 control-label no-padding-right" for="form-field-1">  </label><div class="col-sm-10"> 要点： </div>
					</div>
					<div class="form-group">
						<label class="col-sm-2 control-label no-padding-right" for="form-field-1">  </label>
						<div class="col-sm-10">

							<textarea name="keypotins_zh" cols="20" rows="2" class="col-xs-10 col-sm-8 limitedone" id="form-field-10" style="margin: 0px; height: 100px; width: 800px;" placeholder="要点说明不超过5行"></textarea>
						</div>
					</div>
					<div class="space-4"></div>
					<div class="form-group">
						<label class="col-sm-2 control-label no-padding-right" for="form-field-1">  </label><div class="col-sm-10">描述： </div>
					</div>
					<div class="form-group">
						<label class="col-sm-2 control-label no-padding-right" for="form-field-1">  </label>
						<div class="col-sm-10">

							<textarea name="description_zh" cols="20" rows="2" class="col-xs-10 col-sm-8 limitedone" id="form-field-10" style="margin: 0px; height: 100px; width: 800px;" placeholder="描述"></textarea>
						</div>
					</div>
					<div class="space-4"></div>
				</div>




				<div id="fr" class="tab-pane fade">
					<div class="form-group">
						<label class="col-sm-2 control-label no-padding-right" for="form-field-1">  </label><div class="col-sm-10"> 标题3：(0/<span style="color:red;">200</span>) </div>
					</div>
					<div class="form-group">
						<label class="col-sm-2 control-label no-padding-right" for="form-field-1">  </label>
						<div class="col-sm-10">

							<textarea name="title_zh" cols="20" rows="2" class="col-xs-10 col-sm-8 limitedone" id="form-field-10" style="margin: 0px; height: 80px; width: 800px;" placeholder="标题"></textarea>
						</div>
					</div>
					<div class="space-4"></div>
					<div class="form-group">
						<label class="col-sm-2 control-label no-padding-right" for="form-field-1">  </label><div class="col-sm-10"> 关键字：(0/<span style="color:red;">250</span>) </div>
					</div>
					<div class="form-group">
						<label class="col-sm-2 control-label no-padding-right" for="form-field-1">  </label>
						<div class="col-sm-10">

							<textarea name="keyword_zh" cols="20" rows="2" class="col-xs-10 col-sm-8 limitedone" id="form-field-10" style="margin: 0px; height: 100px; width: 800px;" placeholder="关键字"></textarea>
						</div>
					</div>
					<div class="space-4"></div>
					<div class="form-group">
						<label class="col-sm-2 control-label no-padding-right" for="form-field-1">  </label><div class="col-sm-10"> 要点： </div>
					</div>
					<div class="form-group">
						<label class="col-sm-2 control-label no-padding-right" for="form-field-1">  </label>
						<div class="col-sm-10">

							<textarea name="keypotins_zh" cols="20" rows="2" class="col-xs-10 col-sm-8 limitedone" id="form-field-10" style="margin: 0px; height: 100px; width: 800px;" placeholder="要点说明不超过5行"></textarea>
						</div>
					</div>
					<div class="space-4"></div>
					<div class="form-group">
						<label class="col-sm-2 control-label no-padding-right" for="form-field-1">  </label><div class="col-sm-10">描述： </div>
					</div>
					<div class="form-group">
						<label class="col-sm-2 control-label no-padding-right" for="form-field-1">  </label>
						<div class="col-sm-10">

							<textarea name="description_zh" cols="20" rows="2" class="col-xs-10 col-sm-8 limitedone" id="form-field-10" style="margin: 0px; height: 100px; width: 800px;" placeholder="描述"></textarea>
						</div>
					</div>
					<div class="space-4"></div>
				</div>




				<div id="dy" class="tab-pane fade">
					<div class="form-group">
						<label class="col-sm-2 control-label no-padding-right" for="form-field-1">  </label><div class="col-sm-10"> 标题4：(0/<span style="color:red;">200</span>) </div>
					</div>
					<div class="form-group">
						<label class="col-sm-2 control-label no-padding-right" for="form-field-1">  </label>
						<div class="col-sm-10">

							<textarea name="title_zh" cols="20" rows="2" class="col-xs-10 col-sm-8 limitedone" id="form-field-10" style="margin: 0px; height: 80px; width: 800px;" placeholder="标题"></textarea>
						</div>
					</div>
					<div class="space-4"></div>
					<div class="form-group">
						<label class="col-sm-2 control-label no-padding-right" for="form-field-1">  </label><div class="col-sm-10"> 关键字：(0/<span style="color:red;">250</span>) </div>
					</div>
					<div class="form-group">
						<label class="col-sm-2 control-label no-padding-right" for="form-field-1">  </label>
						<div class="col-sm-10">

							<textarea name="keyword_zh" cols="20" rows="2" class="col-xs-10 col-sm-8 limitedone" id="form-field-10" style="margin: 0px; height: 100px; width: 800px;" placeholder="关键字"></textarea>
						</div>
					</div>
					<div class="space-4"></div>
					<div class="form-group">
						<label class="col-sm-2 control-label no-padding-right" for="form-field-1">  </label><div class="col-sm-10"> 要点： </div>
					</div>
					<div class="form-group">
						<label class="col-sm-2 control-label no-padding-right" for="form-field-1">  </label>
						<div class="col-sm-10">

							<textarea name="keypotins_zh" cols="20" rows="2" class="col-xs-10 col-sm-8 limitedone" id="form-field-10" style="margin: 0px; height: 100px; width: 800px;" placeholder="要点说明不超过5行"></textarea>
						</div>
					</div>
					<div class="space-4"></div>
					<div class="form-group">
						<label class="col-sm-2 control-label no-padding-right" for="form-field-1">  </label><div class="col-sm-10">描述： </div>
					</div>
					<div class="form-group">
						<label class="col-sm-2 control-label no-padding-right" for="form-field-1">  </label>
						<div class="col-sm-10">

							<textarea name="description_zh" cols="20" rows="2" class="col-xs-10 col-sm-8 limitedone" id="form-field-10" style="margin: 0px; height: 100px; width: 800px;" placeholder="描述"></textarea>
						</div>
					</div>
					<div class="space-4"></div>
				</div>



				<div id="ydl" class="tab-pane fade">
					<div class="form-group">
						<label class="col-sm-2 control-label no-padding-right" for="form-field-1">  </label><div class="col-sm-10"> 标题5：(0/<span style="color:red;">200</span>) </div>
					</div>
					<div class="form-group">
						<label class="col-sm-2 control-label no-padding-right" for="form-field-1">  </label>
						<div class="col-sm-10">

							<textarea name="title_zh" cols="20" rows="2" class="col-xs-10 col-sm-8 limitedone" id="form-field-10" style="margin: 0px; height: 80px; width: 800px;" placeholder="标题"></textarea>
						</div>
					</div>
					<div class="space-4"></div>
					<div class="form-group">
						<label class="col-sm-2 control-label no-padding-right" for="form-field-1">  </label><div class="col-sm-10"> 关键字：(0/<span style="color:red;">250</span>) </div>
					</div>
					<div class="form-group">
						<label class="col-sm-2 control-label no-padding-right" for="form-field-1">  </label>
						<div class="col-sm-10">

							<textarea name="keyword_zh" cols="20" rows="2" class="col-xs-10 col-sm-8 limitedone" id="form-field-10" style="margin: 0px; height: 100px; width: 800px;" placeholder="关键字"></textarea>
						</div>
					</div>
					<div class="space-4"></div>
					<div class="form-group">
						<label class="col-sm-2 control-label no-padding-right" for="form-field-1">  </label><div class="col-sm-10"> 要点： </div>
					</div>
					<div class="form-group">
						<label class="col-sm-2 control-label no-padding-right" for="form-field-1">  </label>
						<div class="col-sm-10">

							<textarea name="keypotins_zh" cols="20" rows="2" class="col-xs-10 col-sm-8 limitedone" id="form-field-10" style="margin: 0px; height: 100px; width: 800px;" placeholder="要点说明不超过5行"></textarea>
						</div>
					</div>
					<div class="space-4"></div>
					<div class="form-group">
						<label class="col-sm-2 control-label no-padding-right" for="form-field-1">  </label><div class="col-sm-10">描述： </div>
					</div>
					<div class="form-group">
						<label class="col-sm-2 control-label no-padding-right" for="form-field-1">  </label>
						<div class="col-sm-10">

							<textarea name="description_zh" cols="20" rows="2" class="col-xs-10 col-sm-8 limitedone" id="form-field-10" style="margin: 0px; height: 100px; width: 800px;" placeholder="描述"></textarea>
						</div>
					</div>
					<div class="space-4"></div>
				</div>




				<div id="xby" class="tab-pane fade">
					<div class="form-group">
						<label class="col-sm-2 control-label no-padding-right" for="form-field-1">  </label><div class="col-sm-10"> 标题6：(0/<span style="color:red;">200</span>) </div>
					</div>
					<div class="form-group">
						<label class="col-sm-2 control-label no-padding-right" for="form-field-1">  </label>
						<div class="col-sm-10">

							<textarea name="title_zh" cols="20" rows="2" class="col-xs-10 col-sm-8 limitedone" id="form-field-10" style="margin: 0px; height: 80px; width: 800px;" placeholder="标题"></textarea>
						</div>
					</div>
					<div class="space-4"></div>
					<div class="form-group">
						<label class="col-sm-2 control-label no-padding-right" for="form-field-1">  </label><div class="col-sm-10"> 关键字：(0/<span style="color:red;">250</span>) </div>
					</div>
					<div class="form-group">
						<label class="col-sm-2 control-label no-padding-right" for="form-field-1">  </label>
						<div class="col-sm-10">

							<textarea name="keyword_zh" cols="20" rows="2" class="col-xs-10 col-sm-8 limitedone" id="form-field-10" style="margin: 0px; height: 100px; width: 800px;" placeholder="关键字"></textarea>
						</div>
					</div>
					<div class="space-4"></div>
					<div class="form-group">
						<label class="col-sm-2 control-label no-padding-right" for="form-field-1">  </label><div class="col-sm-10"> 要点： </div>
					</div>
					<div class="form-group">
						<label class="col-sm-2 control-label no-padding-right" for="form-field-1">  </label>
						<div class="col-sm-10">

							<textarea name="keypotins_zh" cols="20" rows="2" class="col-xs-10 col-sm-8 limitedone" id="form-field-10" style="margin: 0px; height: 100px; width: 800px;" placeholder="要点说明不超过5行"></textarea>
						</div>
					</div>
					<div class="space-4"></div>
					<div class="form-group">
						<label class="col-sm-2 control-label no-padding-right" for="form-field-1">  </label><div class="col-sm-10">描述： </div>
					</div>
					<div class="form-group">
						<label class="col-sm-2 control-label no-padding-right" for="form-field-1">  </label>
						<div class="col-sm-10">

							<textarea name="description_zh" cols="20" rows="2" class="col-xs-10 col-sm-8 limitedone" id="form-field-10" style="margin: 0px; height: 100px; width: 800px;" placeholder="描述"></textarea>
						</div>
					</div>
					<div class="space-4"></div>
				</div>




				<div id="ry" class="tab-pane fade">
					<div class="form-group">
						<label class="col-sm-2 control-label no-padding-right" for="form-field-1">  </label><div class="col-sm-10"> 标题7：(0/<span style="color:red;">200</span>) </div>
					</div>
					<div class="form-group">
						<label class="col-sm-2 control-label no-padding-right" for="form-field-1">  </label>
						<div class="col-sm-10">

							<textarea name="title_zh" cols="20" rows="2" class="col-xs-10 col-sm-8 limitedone" id="form-field-10" style="margin: 0px; height: 80px; width: 800px;" placeholder="标题"></textarea>
						</div>
					</div>
					<div class="space-4"></div>
					<div class="form-group">
						<label class="col-sm-2 control-label no-padding-right" for="form-field-1">  </label><div class="col-sm-10"> 关键字：(0/<span style="color:red;">250</span>) </div>
					</div>
					<div class="form-group">
						<label class="col-sm-2 control-label no-padding-right" for="form-field-1">  </label>
						<div class="col-sm-10">

							<textarea name="keyword_zh" cols="20" rows="2" class="col-xs-10 col-sm-8 limitedone" id="form-field-10" style="margin: 0px; height: 100px; width: 800px;" placeholder="关键字"></textarea>
						</div>
					</div>
					<div class="space-4"></div>
					<div class="form-group">
						<label class="col-sm-2 control-label no-padding-right" for="form-field-1">  </label><div class="col-sm-10"> 要点： </div>
					</div>
					<div class="form-group">
						<label class="col-sm-2 control-label no-padding-right" for="form-field-1">  </label>
						<div class="col-sm-10">

							<textarea name="keypotins_zh" cols="20" rows="2" class="col-xs-10 col-sm-8 limitedone" id="form-field-10" style="margin: 0px; height: 100px; width: 800px;" placeholder="要点说明不超过5行"></textarea>
						</div>
					</div>
					<div class="space-4"></div>
					<div class="form-group">
						<label class="col-sm-2 control-label no-padding-right" for="form-field-1">  </label><div class="col-sm-10">描述： </div>
					</div>
					<div class="form-group">
						<label class="col-sm-2 control-label no-padding-right" for="form-field-1">  </label>
						<div class="col-sm-10">

							<textarea name="description_zh" cols="20" rows="2" class="col-xs-10 col-sm-8 limitedone" id="form-field-10" style="margin: 0px; height: 100px; width: 800px;" placeholder="描述"></textarea>
						</div>
					</div>
					<div class="space-4"></div>
				</div>





					
					<!--<div class="form-group">
						<label class="col-sm-2 control-label no-padding-right" for="form-field-1"> 文章属性：  </label>
						<div class="checkbox">
							<?php if(is_array($diyflag) || $diyflag instanceof \think\Collection || $diyflag instanceof \think\Paginator): if( count($diyflag)==0 ) : echo "" ;else: foreach($diyflag as $key=>$diyflag): ?>
								<label id="news_flag_<?php echo $diyflag['diyflag_value']; ?>">
									<input class="ace ace-checkbox-2" name="news_flag[]" type="checkbox" id="news_flag_va<?php echo $diyflag['diyflag_value']; ?>" value="<?php echo $diyflag['diyflag_value']; ?>" />
									<span class="lbl"> <?php echo $diyflag['diyflag_name']; ?></span>
								</label>
							<?php endforeach; endif; else: echo "" ;endif; ?>
						</div>
					</div>
					<div class="space-4"></div>

					<div class="form-group" id="pptaddress">
						<label class="col-sm-2 control-label no-padding-right" for="form-field-1"> 跳转地址：  </label>
						<div class="col-sm-10">
							<input type="text" name="news_zaddress" id="news_zaddress" placeholder="跳转地址" class="col-xs-10 col-sm-6" />
                                            <span class="help-inline col-xs-12 col-sm-6">
												<span class="middle">正确格式：http:// 开头</span>
											</span>
						</div>
					</div>










					<div class="form-group">
						<label class="col-sm-2 control-label no-padding-right" for="form-field-1"> 排序（从小到大）： </label>
						<div class="col-sm-10">
							<input type="text" name="listorder" value="50" class="col-xs-10 col-sm-1" />
						</div>
					</div>
					<div class="space-4"></div>

					<div class="form-group">
						<label class="col-sm-2 control-label no-padding-right" for="form-field-1"> 显示日期：  </label>
						<div class="col-sm-10">
							<input name="showdate" class="date-picker col-xs-10 col-sm-6" value="<?php $time = time();
echo date("Y-m-d",$time) ?>" type="text" data-date-format="yyyy-mm-dd">
						</div>
					</div>
					<div class="space-4"></div>
					
					<div class="form-group">
						<label class="col-sm-2 control-label no-padding-right" for="form-field-1"> 文章简介： </label>
						<div class="col-sm-9">
							<input type="text" name="news_scontent" id="news_scontent" class="col-xs-10 col-sm-10"  maxlength="100" />
							<label class="input_last">已限制在100个字以内</label>
						</div>
					</div>
					<div class="space-4"></div>

					<div class="form-group">
						<label class="col-sm-2 control-label no-padding-right" for="form-field-1"> 文章主内容 </label>
						<div class="col-sm-10">
							<script src="__PUBLIC__/ueditor/ueditor.config.js" type="text/javascript"></script>
							<script src="__PUBLIC__/ueditor/ueditor.all.js" type="text/javascript"></script>
							<textarea name="news_content" rows="100%" style="width:100%" id="myEditor"></textarea>
							<script type="text/javascript">
								var editor = new UE.ui.Editor();
								editor.render("myEditor");
							</script>
						</div>
					</div>
					<div class="space-4"></div>-->

					<div class="clearfix form-actions">
						<div class="col-md-offset-3 col-md-9">
							<input class="ace ace-checkbox-2" name="continue" type="checkbox" value="1">
							<span class="lbl"> 发布后继续</span>
							<button class="btn btn-info" type="submit">
								<i class="ace-icon fa fa-check bigger-110"></i>
								保存
							</button>

							&nbsp; &nbsp; &nbsp;
							<button class="btn" type="reset">
								<i class="ace-icon fa fa-undo bigger-110"></i>
								重置
							</button>
						</div>
					</div>
				</form>
			</div>
		</div>

	</div><!-- /.page-content -->

			<!-- 右侧下主要内容结束 -->
		</div>
	</div><!-- 主要内容结束 -->
	<!-- 页脚开始 -->
	<div class="footer">
	<div class="footer-inner">
		<div class="footer-content" style="position: fixed;background-color: #438EB9;color:#ffff;">
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

	<script>
		function fanyi() {

			var title = $("#title_zh").val();
			var keyword = $("#keyword_zh").val();
			var keypotins = $("#keypotins_zh").val();
			var description = $("#description_zh").val();

			$.ajax({

				url:"<?php echo url('admin/News/news_translation'); ?>",
				type:'post',
				data:{title:title,keyword:keyword,keypotins:keypotins,description:description},
				dataType:'json',
				success:function(result){

					if(result)
					{
						$("#city_goods li").remove();

						$.each(result, function(i, item) {

							$("#city_goods").append("<a href='/Search/details.html?id=" + item.id + "' target='_blank'> <li>" + item.companyName + " <div style='float:right;color:#fff;background:#337AB7;border-radius: 10px;'>" + item.Reason + "</div></li></a>");

						});
					}

				}

			})
		}

	</script>
	<script>
			//多图设置
			//$("#pic_list").hide();
			$("#news_pic_list").click(function(){
				$("#pic_list").hide();
			});
			$("#news_pic_qqlist").click(function(){
				$("#pic_list").show();
			});
			//跳转额外属性
			$("#pptaddress").hide();
			$("#news_flag_vaj").click(function(){
				$("#pptaddress").toggle(400);
			});
			$("#cpprice").hide();
			$("#news_flag_vacp").click(function(){
				$("#cpprice").toggle(400);
			});
			$('.date-picker').datepicker({
					autoclose: true,
					todayHighlight: true,
					language:'zh-CN',
				})


			//鼠标的移入移出
			$(".header").mouseover(function (){
				$(".content").show();
			}).mouseout(function (){
				$(".content").hide();
			});
	</script>

<!-- 与此页相关的js -->
</body>
</html>
