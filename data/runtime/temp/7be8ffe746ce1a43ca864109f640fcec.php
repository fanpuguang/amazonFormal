<?php if (!defined('THINK_PATH')) exit(); /*a:6:{s:75:"/www/wwwroot/www.ldkjmy.com/aaaa/yamaxun/app/admin/view/sell/sell_list.html";i:1578909418;s:72:"/www/wwwroot/www.ldkjmy.com/aaaa/yamaxun/app/admin/view/public/base.html";i:1578553890;s:74:"/www/wwwroot/www.ldkjmy.com/aaaa/yamaxun/app/admin/view/public/header.html";i:1586171204;s:76:"/www/wwwroot/www.ldkjmy.com/aaaa/yamaxun/app/admin/view/public/left_nav.html";i:1578553891;s:76:"/www/wwwroot/www.ldkjmy.com/aaaa/yamaxun/app/admin/view/public/head_nav.html";i:1578553891;s:74:"/www/wwwroot/www.ldkjmy.com/aaaa/yamaxun/app/admin/view/public/footer.html";i:1578970335;}*/ ?>
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
			
<style>
.bootstrap-table .table {
    margin-bottom: 0!important;
    border-bottom: 1px solid #ddd;
    border-collapse: collapse!important;
    border-radius: 1px
}

.bootstrap-table .table,
.bootstrap-table .table>tbody>tr>td,
.bootstrap-table .table>tbody>tr>th,
.bootstrap-table .table>tfoot>tr>td,
.bootstrap-table .table>tfoot>tr>th,
.bootstrap-table .table>thead>tr>td {
    padding: 8px;
}

.bootstrap-table .table.table-no-bordered>tbody>tr>td,
.bootstrap-table .table.table-no-bordered>thead>tr>th {
    border-right: 2px solid transparent
}
.bootstrap-table .table>tbody>tr:hover{
    background: #f5f5f5;
}
.fixed-table-container {
    position: relative;
    clear: both;
    /*min-height: 240px;*/
    border: 1px solid #ddd;
    border-radius: 4px;
    -webkit-border-radius: 4px;
    -moz-border-radius: 4px
}

.fixed-table-container.table-no-bordered {
    border: 1px solid transparent
}

.fixed-table-footer,
.fixed-table-header {
    height: 37px;
    overflow: hidden;
    border-radius: 4px 4px 0 0;
    -webkit-border-radius: 4px 4px 0 0;
    -moz-border-radius: 4px 4px 0 0
}

.fixed-table-header {
    border-bottom: 1px solid #ddd
}

.fixed-table-footer {
    border-top: 1px solid #ddd
}

.fixed-table-body {
    overflow-x: auto;
    overflow-y: auto;
    height: 100%;
    min-height:185px;
    position: relative;
}

.fixed-table-container table {
    width: 100%
}

.fixed-table-container thead th {
    height: 0;
    padding: 0;
    margin: 0;
    border-left: 1px solid #ddd
}

.fixed-table-container thead th:first-child {
    border-left: none;
    border-top-left-radius: 4px;
    -webkit-border-top-left-radius: 4px;
    -moz-border-radius-topleft: 4px
}

.fixed-table-container thead th .th-inner {
    padding: 8px 0;
    line-height: 24px;
    vertical-align: top;
    overflow: hidden;
    text-overflow: ellipsis;
    white-space: nowrap
}

.fixed-table-container thead th .sortable {
    cursor: pointer;
    background-image: url('../../img/sort-default.png');
    background-position: right;
    background-repeat: no-repeat;
    padding-right: 30px
}

.fixed-table-container th.detail {
    width: 30px
}

.fixed-table-container tbody td {
    border-left: 1px solid #ddd
}

.fixed-table-container tbody tr:first-child td {
    border-top: none
}

.fixed-table-container tbody td:first-child {
    border-left: none
}

/*.fixed-table-container tbody .selected td {
    background-color: #f5f5f5
}*/

.fixed-table-container .bs-checkbox {
    text-align: center
}

.fixed-table-container .bs-checkbox .th-inner {
    padding: 8px 0
}

.fixed-table-container input[type=radio],
.fixed-table-container input[type=checkbox] {
    margin: 0 auto!important
}

.fixed-table-container .no-records-found {
    text-align: center
}

.fixed-table-pagination .pagination-detail,
.fixed-table-pagination div.pagination {
    margin-top: 10px;
    margin-bottom: 10px;
    position: relative;
    z-index: 100;
}

.fixed-table-pagination div.pagination .pagination {
    margin: 0
}

.fixed-table-pagination .pagination a {
    padding: 6px 12px;
    color: #666;
    line-height: 1.428571429
}
.fixed-table-pagination .pagination li.active a,
.fixed-table-pagination .pagination li:hover a{
    color: #fff;
    background: #24b7ce;
    border-color: #24b7ce;
}
.fixed-table-pagination .pagination-info {
    line-height: 34px;
    margin-right: 5px
}

.fixed-table-pagination .btn-group {
    position: relative;
    display: inline-block;
    vertical-align: middle
}

.fixed-table-pagination .dropup .dropdown-menu {
    margin-bottom: 0
}

.fixed-table-pagination .page-list {
    display: inline-block
}

.fixed-table-toolbar .columns-left {
    margin-right: 5px
}

.fixed-table-toolbar .columns-right {
    margin-left: 5px
}

.fixed-table-toolbar .columns label {
    display: block;
    padding: 3px 20px;
    clear: both;
    font-weight: 400;
    line-height: 1.428571429
}

.fixed-table-toolbar .bars,
.fixed-table-toolbar .columns,
.fixed-table-toolbar .search {
    position: relative;
    margin-top: 10px;
    margin-bottom: 10px;
    line-height: 34px
}

.fixed-table-pagination li.disabled a {
    pointer-events: none;
    cursor: default
}

.fixed-table-loading {
    display: none;
    /*min-height: 200px;*/
    position: absolute;
    top: 37px;
    right: 0;
    bottom: 0;
    left: 0;
    z-index: 99;
    background-color: #fff;
    text-align: center;
/*    box-shadow: 3px 3px 3px #d2d2d2;*/
}
.cpc-main .fixed-table-loading{
    top: 60px;
}
.fixed-table-body .card-view .title {
    font-weight: 700;
    display: inline-block;
    min-width: 30%;
    text-align: left!important
}

.fixed-table-body thead th .th-inner {
    box-sizing: border-box
}

.table td,
.table th {
    vertical-align: middle;
    box-sizing: border-box
}

.fixed-table-toolbar .dropdown-menu {
    text-align: left;
    max-height: 300px;
    overflow: auto
}

.fixed-table-toolbar .btn-group>.btn-group {
    display: inline-block;
    margin-left: -1px!important
}

.fixed-table-toolbar .btn-group>.btn-group>.btn {
    border-radius: 0
}

.fixed-table-toolbar .btn-group>.btn-group:first-child>.btn {
    border-top-left-radius: 4px;
    border-bottom-left-radius: 4px
}

.fixed-table-toolbar .btn-group>.btn-group:last-child>.btn {
    border-top-right-radius: 4px;
    border-bottom-right-radius: 4px
}

.bootstrap-table .table>thead>tr>th {
    vertical-align: bottom;
    border-bottom: 2px solid #ddd
}

.bootstrap-table .table thead>tr>th {
    padding: 0;
    margin: 0
}

.pull-right .dropdown-menu {
    right: 0;
    left: auto
}

p.fixed-table-scroll-inner {
    width: 100%;
    height: 200px
}

div.fixed-table-scroll-outer {
    top: 0;
    left: 0;
    visibility: hidden;
    width: 200px;
    height: 150px;
    overflow: hidden
}

</style>
	<div class="page-content">

		<div class="row maintop">
			<div class="col-xs-12 col-sm-1">
				<!-- 点击添加模态框（Modal） -->
				<button class="btn btn-sm btn-danger" data-toggle="modal" data-target="#myModal">
					<i class="ace-icon fa fa-bolt bigger-110"></i>
					创建跟卖
				</button>

			</div>

		</div>

		<div class="row">
			<div class="col-xs-12">
				<div>
					<form class="ajaxForm" name="source_order" method="post" action="" >
						<table class="table table-striped table-bordered table-hover" id="dynamic-table">
							<thead>
							<tr>
								<th>序号</th>
								<th>商品信息</th>
								<th>售价</th>
								<th>跟卖时设置库存</th>
								<th>跟卖时间</th>

								<th>状态</th>
								<th>操作</th>
							
							</tr>
							</thead>

							<tbody>

							<?php if(is_array($fwq) || $fwq instanceof \think\Collection || $fwq instanceof \think\Paginator): if( count($fwq)==0 ) : echo "" ;else: foreach($fwq as $k=>$v): ?>
								<tr>
									<td height="28" ><?php echo $k+1; ?></td>
									<td style="text-align: center; vertical-align: middle; width: 300px; ">
									    <div class="fl ml20 mr10 mt10">
									        <a href="http://www.amazon.de/dp/B07B6MDY26" target="_blank">
									            <img width="48" src="http://ecx.images-amazon.com/images/I/61p5SMHMGHL._SL900_.jpg">
									        </a>
									       
									    </div>
									    <div class="fl tl" style="width:70%;">
									        <span class="ml0 ques-tips ques-tips-sm js-quetion">
									            <i class="icon-flag flag-DE" data-name="DE">
									            </i>
									            <b class="cont flag-cont" style="width: 40px;">
									                德国
									            </b>
									        </span>
									        「
									        <a href="http://www.amazon.de/gp/aag/main?seller=A22MV3GXUGEVAL" class="_blue"
									        target="_blank">
									            刘栋哄_DE
									        </a>
									        」
									        <p class="mt5 mb5">
									            Klopfer,Tür griff kupfer verarbeiten Chinesisch zu behandeln Schranktür
									            messing antik griff möbelbeschläge griff Face plate schraube schrankeinbau
									            22cm-L
									        </p>
									        <p>
									            ASIN：
									            <span class="cont-copy J_copy">
									                <span class="copy-btn" data-clipboard-action="copy" data-clipboard-target="#asin0">
									                    复制
									                </span>
									                <b class="cont" id="asin0">
									                    <a href="http://www.amazon.de/dp/B07B6MDY26" class="_blue" target="_blank">
									                        B07B6MDY26
									                    </a>
									                </b>
									            </span>
									            <span class="ques-tips ques-tips-sm js-quetion">
									                <i class="icon icon-M pointer">
									                </i>
									                <b class="cont">
									                    卖家自发货
									                </b>
									            </span>
									        </p>
									        <p>
									            SKU：
									            <span class="cont-copy J_copy">
									                <span class="copy-btn" data-clipboard-action="copy" data-clipboard-target="#sku0">
									                    复制
									                </span>
									                <b class="cont" id="sku0">
									                    test1383471-11
									                </b>
									            </span>
									        </p>
									    </div>
									</td>
									<td><?php echo $v['fwq_ip']; ?></td>
									<td>administrator</td>
									<td><?php echo $v['fwq_password']; ?></td>

									<td><?php echo $v['dq_time']; ?></td>
								

									<td>
										<div class="hidden-sm hidden-xs action-buttons">
											<a class="green fwqedit-btn"  href="<?php echo url('admin/Fwq/fwq_edit'); ?>" data-id="<?php echo $v['fwq_id']; ?>"  title="修改">
												<i class="ace-icon fa fa-pencil bigger-130"></i>
											</a>
											<a class="red confirm-rst-url-btn" data-info="你确定要删除吗？" href="<?php echo url('admin/Fwq/fwq_del',array('fwq_id'=>$v['fwq_id'],'p'=>input('p',1))); ?>" title="删除">
												<i class="ace-icon fa fa-trash-o bigger-130"></i>
											</a>
										</div>
										<div class="hidden-md hidden-lg">
											<div class="inline position-relative">
												<button class="btn btn-minier btn-primary dropdown-toggle" data-toggle="dropdown" data-position="auto">
													<i class="ace-icon fa fa-cog icon-only bigger-110"></i>
												</button>
												<ul class="dropdown-menu dropdown-only-icon dropdown-yellow dropdown-menu-right dropdown-caret dropdown-close">
													<li>
														<a href="<?php echo url('admin/Fwq/fwq_edit'); ?>" data-id="<?php echo $v['fwq_id']; ?>" class="tooltip-success sourceedit-btn" data-rel="tooltip" title="" data-original-title="修改">
																	<span class="green">
																		<i class="ace-icon fa fa-pencil-square-o bigger-120"></i>
																	</span>
														</a>
													</li>

													<li>
														<a href="<?php echo url('admin/Fwq/fwq_del',array('fwq_id'=>$v['fwq_id'],'p'=>input('p',1))); ?>"  class="tooltip-error confirm-rst-url-btn" data-rel="tooltip" title="" data-info="你确定要删除吗？" data-original-title="删除">
																	<span class="red">
																		<i class="ace-icon fa fa-trash-o bigger-120"></i>
																	</span>
														</a>
													</li>
												</ul>
											</div>
										</div>
									</td>
								</tr>
							<?php endforeach; endif; else: echo "" ;endif; ?>
							<tr>
								<!--<td height="50" align="left"><button  id="btnorder" class="btn btn-white btn-yellow btn-sm">排序</button></td>-->
								<td height="50" colspan="10" align="right"><?php echo $page; ?></td>
							</tr>
							</tbody>
						</table>
					</form>
				</div>
			</div>
		</div>

		<!-- 显示添加模态框（Modal） -->
		<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
			<form class="form-horizontal ajaxForm2" name="fwq_add" method="post" action="<?php echo url('admin/Fwq/fwq_runadd'); ?>">
				<div class="modal-dialog">
					<div class="modal-content">
						<div class="modal-header">
							<button type="button" class="close" data-dismiss="modal"
									aria-hidden="true">×
							</button>
							<h4 class="modal-title" id="myModalLabel">
								创建跟卖
							</h4>
						</div>
						<div class="modal-body">


							<div class="row">
								<div class="col-xs-12">

									<div class="form-group">
										<label class="col-sm-2 control-label no-padding-right" for="form-field-1">营业执照法人：  </label>
										<div class="col-sm-10">
											<input type="text" name="yyzzfr" id="yyzzfr" placeholder="输入营业执照法人" class="col-xs-10 col-sm-5" required/>

										</div>
									</div>
									<div class="space-4"></div>

									<div class="form-group">
										<label class="col-sm-2 control-label no-padding-right" for="form-field-1"> 服务器IP：  </label>
										<div class="col-sm-10">
											<input type="text" name="fwq_ip" id="fwq_ip" placeholder="输入服务器IP地址" class="col-xs-10 col-sm-5" required/>
										</div>
									</div>
									<div class="space-4"></div>

									<div class="form-group">
										<label class="col-sm-2 control-label no-padding-right" for="form-field-1"> 账号：  </label>
										<div class="col-sm-10">
											<input type="text" name="fwq_name" id="fwq_name" placeholder="输入账号名称" class="col-xs-10 col-sm-5" required/>

										</div>
									</div>
									<div class="space-4"></div>

									<div class="form-group">
										<label class="col-sm-2 control-label no-padding-right" for="form-field-1"> 密码：  </label>
										<div class="col-sm-10">
											<input type="text" name="fwq_password" id="fwq_password" placeholder="输入账号密码" class="col-xs-10 col-sm-5" required/>

										</div>
									</div>
									<div class="space-4"></div>

									<div class="form-group">
										<label class="col-sm-2 control-label no-padding-right" for="form-field-1"> 购买时间：  </label>
										<div class="col-sm-10">
											<input type="date" name="gm_time" id="gm_time" class="col-xs-10 col-sm-5" required/>

										</div>
									</div>
									<div class="space-4"></div>

									<div class="form-group">
										<label class="col-sm-2 control-label no-padding-right" for="form-field-1"> 到期时间：  </label>
										<div class="col-sm-10">
											<input type="date" name="dq_time" id="dq_time" class="col-xs-10 col-sm-5" required/>

										</div>
									</div>
									<div class="space-4"></div>

									<div class="form-group">
										<label class="col-sm-2 control-label no-padding-right" for="form-field-1">服务器供应商：  </label>
										<div class="col-sm-10">
											<input type="text" name="fwq_gys" id="fwq_gys" placeholder="输入服务器供应商" class="col-xs-10 col-sm-5" required/>

										</div>
									</div>
									<div class="space-4"></div>

									<div class="form-group">
										<label class="col-sm-2 control-label no-padding-right" for="form-field-1">管理者：  </label>
										<div class="col-sm-10">
											<input type="text" name="fwq_glz" id="fwq_glz" placeholder="输入服务器管理者" class="col-xs-10 col-sm-5" required/>

										</div>
									</div>
									<div class="space-4"></div>

									<div class="form-group">
										<label class="col-sm-2 control-label no-padding-right" for="form-field-1">对应软件账号：  </label>
										<div class="col-sm-10">
											<input type="text" name="fwq_dyctzh" id="fwq_dyctzh" placeholder="输入对应软件账号" class="col-xs-10 col-sm-5" required/>

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
							<button class="btn btn-info" type="reset">
								重置
							</button>
							<button type="button" class="btn btn-default" data-dismiss="modal">
								关闭
							</button>
						</div>
					</div><!-- /.modal-content -->
				</div><!-- /.modal-dialog -->
			</form>
		</div><!-- /.modal -->






		<!-- 显示修改模态框（Modal） -->
		<div class="modal fade in" id="myModaledit" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
			<div class="modal-backdrop fade in" id="gbbb" style="height: 100%;"></div>
			<form class="form-horizontal ajaxForm2" name="fwq_runedit" method="post" action="<?php echo url('admin/Fwq/fwq_runedit'); ?>">
				<input type="hidden" name="fwq_id" id="editfwq_id" value="" />
				<div class="modal-dialog">
					<div class="modal-content">
						<div class="modal-header">
							<button type="button" class="close" id="gb"  data-dismiss="modal"
									aria-hidden="true">×
							</button>
							<h4 class="modal-title" id="myModalLabel">
								修改服务器
							</h4>
						</div>
						<div class="modal-body">


							<div class="row">
								<div class="col-xs-12">

									<div class="form-group">
										<label class="col-sm-2 control-label no-padding-right" for="form-field-1">营业执照法人：  </label>
										<div class="col-sm-10">
											<input type="text" name="yyzzfr" id="edit_yyzzfr" placeholder="输入营业执照法人" class="col-xs-10 col-sm-5"/>

										</div>
									</div>
									<div class="space-4"></div>

									<div class="form-group">
										<label class="col-sm-2 control-label no-padding-right" for="form-field-1"> 服务器IP：  </label>
										<div class="col-sm-10">
											<input type="text" name="fwq_ip" id="edit_fwq_ip"  class="col-xs-10 col-sm-5"  required/>
										</div>
									</div>
									<div class="space-4"></div>

									<div class="form-group">
										<label class="col-sm-2 control-label no-padding-right" for="form-field-1"> 账号：  </label>
										<div class="col-sm-10">
											<input type="text" name="fwq_name" id="edit_fwq_name" class="col-xs-10 col-sm-5"/>

										</div>
									</div>
									<div class="space-4"></div>

									<div class="form-group">
										<label class="col-sm-2 control-label no-padding-right" for="form-field-1"> 密码：  </label>
										<div class="col-sm-10">
											<input type="text" name="fwq_password" id="edit_fwq_password" placeholder="输入账号密码" class="col-xs-10 col-sm-5" required/>

										</div>
									</div>
									<div class="space-4"></div>

									<div class="form-group">
										<label class="col-sm-2 control-label no-padding-right" for="form-field-1"> 购买时间：  </label>
										<div class="col-sm-10">
											<input type="date" name="gm_time" id="edit_gm_time" class="col-xs-10 col-sm-5"/>

										</div>
									</div>
									<div class="space-4"></div>

									<div class="form-group">
										<label class="col-sm-2 control-label no-padding-right" for="form-field-1"> 到期时间：  </label>
										<div class="col-sm-10">
											<input type="date" name="dq_time" id="edit_dq_time" class="col-xs-10 col-sm-5" />

										</div>
									</div>
									<div class="space-4"></div>

									<div class="form-group">
										<label class="col-sm-2 control-label no-padding-right" for="form-field-1">服务器供应商：  </label>
										<div class="col-sm-10">
											<input type="text" name="fwq_gys" id="edit_fwq_gys" placeholder="输入服务器供应商" class="col-xs-10 col-sm-5" required/>

										</div>
									</div>
									<div class="space-4"></div>

									<div class="form-group">
										<label class="col-sm-2 control-label no-padding-right" for="form-field-1">管理者：  </label>
										<div class="col-sm-10">
											<input type="text" name="fwq_glz" id="edit_fwq_glz" placeholder="输入服务器管理者" class="col-xs-10 col-sm-5"/>

										</div>
									</div>
									<div class="space-4"></div>

									<div class="form-group">
										<label class="col-sm-2 control-label no-padding-right" for="form-field-1">对应软件账号：  </label>
										<div class="col-sm-10">
											<input type="text" name="fwq_dyctzh" id="edit_fwq_dyctzh" placeholder="输入对应软件账号" class="col-xs-10 col-sm-5" />

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
							<button type="button" class="btn btn-default"  id="gbb" >
								关闭
							</button>
						</div>
					</div><!-- /.modal-content -->
				</div><!-- /.modal-dialog -->
			</form>
		</div><!-- /.modal -->

	</div><!-- /.page-content -->

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
