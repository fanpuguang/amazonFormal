<?php if (!defined('THINK_PATH')) exit(); /*a:6:{s:80:"/www/wwwroot/www.ldkjmy.com/aaaa/yamaxun/app/admin/view/product/record_list.html";i:1578553889;s:72:"/www/wwwroot/www.ldkjmy.com/aaaa/yamaxun/app/admin/view/public/base.html";i:1578553890;s:74:"/www/wwwroot/www.ldkjmy.com/aaaa/yamaxun/app/admin/view/public/header.html";i:1586171204;s:76:"/www/wwwroot/www.ldkjmy.com/aaaa/yamaxun/app/admin/view/public/left_nav.html";i:1578553891;s:76:"/www/wwwroot/www.ldkjmy.com/aaaa/yamaxun/app/admin/view/public/head_nav.html";i:1578553891;s:74:"/www/wwwroot/www.ldkjmy.com/aaaa/yamaxun/app/admin/view/public/footer.html";i:1578970335;}*/ ?>
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

		<div class="row maintop">
			<div class="col-xs-5 col-sm-2  margintop5">

					<!--<button class="btn btn-sm btn-danger">
						<i class="ace-icon fa fa-bolt bigger-110"></i>
						<a style="color: #ffffff;" href="<?php echo url('admin/Productupload/myupload'); ?>">立即上传列表</a>
					</button>
					<button class="btn btn-sm btn-danger">
						<i class="ace-icon fa fa-bolt bigger-110"></i>
						<a style="color: #ffffff;"  href="<?php echo url('admin/Productupload/timing_upload'); ?>">定时上传列表</a>
					</button>-->
				<!--<button class="btn btn-sm btn-danger" style="background-color: #1dccaa;margin-right:0px;">
					<i class="ace-icon fa fa-bolt bigger-110"></i>
					<a style="color: #ffffff;"  href="<?php echo url('admin/Productupload/new_upload'); ?>">添加新上传</a>
				</button>-->
			</div>



		</div>
		<div class="row">
			<div class="col-xs-12">
				<div>
					<table class="table table-striped table-bordered table-hover" id="dynamic-table">
						<thead>
						<tr>
							<th>
								上传编号
							</th>
							<th>
								授权账户
							</th>
							<th>
								产品id
							</th>
							<th>
								产品
							</th>
							<th>
								关系
							</th>
							<th>
								图片
							</th>
							<th>
								库存
							</th>
							<th>
								价格
							</th>
<!--							<th>-->
<!--								一键上传-->

<!--							</th>-->
							<!-- <th>
								AMAZON类目
							</th>
							<th>
								分类类型
							</th> -->
							<th>
								添加时间
							</th>
							<th>
								更新时间
							</th>
							<th style="border-right:#CCC solid 1px;">操作</th>
						</tr>
						</thead>

						<tbody>
						<?php foreach($record as $k=>$v): ?>
						<tr>
							<td>
								<?php echo $v['id']; ?>
							</td>
							<td>
								<span style="color:green"><?php echo $name; ?></span>
								<?php if($v['store_id'] ==4): ?>
								德国
								<?php elseif($v['store_id'] ==5): ?>
								英国
								<?php elseif($v['store_id'] ==6): ?>
								意大利
								<?php elseif($v['store_id'] ==7): ?>
								法国
								<?php elseif($v['store_id'] ==8): ?>
								西班牙
								<?php elseif($v['store_id'] ==9): ?>
								美国
								<?php elseif($v['store_id'] ==10): ?>
								墨西哥
								<?php elseif($v['store_id'] ==11): ?>
								加拿大
								<?php elseif($v['store_id'] ==2): ?>
								日本
								<?php endif; ?>

							</td>
							<td>
							<span class='commodity_id'
								  style="display: inline-block; width: 80px; overflow: hidden; white-space: nowrap; text-overflow: ellipsis;">
								<?php echo $v['commodity_id']; ?>
							</span>
							</td>
							<td>
								<?php if($v['product_status'] == 0): ?>
								<a  class="feed" data-id=<?php echo $v['id']; ?> data-type='product'>上传</a>
								<?php elseif($v['product_status'] == 1): ?>
								<a  class="getList" data-id=<?php echo $v['id']; ?> data-type='product'>更新</a>
								<?php elseif($v['product_status'] == 2): ?>
								<a  class="getResult" data-id=<?php echo $v['id']; ?> data-type='product'>获取结果</a>
								<?php elseif($v['product_status'] == 3): ?>
								<a >上传成功</a>
								<?php elseif($v['product_status'] == 4): ?>
								<a  onclick="getError(<?php echo $v['product_submission']; ?>)">错误详情</a>
								<a >上传失败</a>
								<a  class="feed" data-id=<?php echo $v['id']; ?> data-type='product'>重新上传</a>
								<?php endif; ?>
							</td>
							<td>	
								<?php if($v['product_status'] == 3): if($v['relationships_status'] == 0): ?>
								<a  class="feed" data-id=<?php echo $v['id']; ?> data-type='relationships'>上传</a>
								<?php elseif($v['relationships_status'] == 1): ?>
								<a  class="getList" data-id=<?php echo $v['id']; ?> data-type='relationships'>更新</a>
								<?php elseif($v['relationships_status'] == 2): ?>
								<a  class="getResult" data-id=<?php echo $v['id']; ?> data-type='relationships'>获取结果</a>
								<?php elseif($v['relationships_status'] == 3): ?>
								<a >上传成功</a>
								<?php elseif($v['relationships_status'] == 4): ?>
								<a  onclick="getError(<?php echo $v['product_submission']; ?>)">错误详情</a>
								<a >上传失败</a>
								<a  class="feed" data-id=<?php echo $v['id']; ?> data-type='relationships'>重新上传</a>
								<?php endif; endif; ?>
							</td>
							<td>
								<?php if($v['product_status'] == 3): if($v['img_status'] == 0): ?>
								<a  class="feed" data-id=<?php echo $v['id']; ?> data-type='img'>上传</a>
								<?php elseif($v['img_status'] == 1): ?>
								<a  class="getList" data-id=<?php echo $v['id']; ?> data-type='img'>更新</a>
								<?php elseif($v['img_status'] == 2): ?>
								<a  class="getResult" data-id=<?php echo $v['id']; ?> data-type='img'>获取结果</a>
								<?php elseif($v['img_status'] == 3): ?>
								<a >上传成功</a>
								<?php elseif($v['img_status'] == 4): ?>
								<a  onclick="getError(<?php echo $v['product_submission']; ?>)">错误详情</a>
								<a >上传失败</a>
								<a  class="feed" data-id=<?php echo $v['id']; ?> data-type='img'>上传</a>
								<?php endif; endif; ?>
							</td>
							<td>
								<?php if($v['product_status'] == 3): if($v['inventory_status'] == 0): ?>
								<a  class="feed" data-id=<?php echo $v['id']; ?> data-type='inventory'>上传</a>
								<?php elseif($v['inventory_status'] == 1): ?>
								<a  class="getList" data-id=<?php echo $v['id']; ?> data-type='inventory'>更新</a>
								<?php elseif($v['inventory_status'] == 2): ?>
								<a  class="getResult" data-id=<?php echo $v['id']; ?> data-type='inventory'>获取结果</a>
								<?php elseif($v['inventory_status'] == 3): ?>
								<a >上传成功</a>
								<?php elseif($v['inventory_status'] == 4): ?>
								<a  onclick="getError(<?php echo $v['product_submission']; ?>)">错误详情</a>
								<a >上传失败</a>
								<a  class="feed" data-id=<?php echo $v['id']; ?> data-type='inventory'>上传</a>
								<?php endif; endif; ?>
							</td>
							<td>
								<?php if($v['product_status'] == 3): if($v['price_status'] == 0): ?>
								<a  class="feed" data-id=<?php echo $v['id']; ?> data-type='price'>上传</a>
								<?php elseif($v['price_status'] == 1): ?>
								<a  class="getList" data-id=<?php echo $v['id']; ?> data-type='price'>更新</a>
								<?php elseif($v['price_status'] == 2): ?>
								<a  class="getResult" data-id=<?php echo $v['id']; ?> data-type='price'>获取结果</a>
								<?php elseif($v['price_status'] == 3): ?>
								<a >上传成功</a>
								<?php elseif($v['price_status'] == 4): ?>
								<a  onclick="getError(<?php echo $v['product_submission']; ?>)">错误详情</a>
								<a >上传失败</a>
								<a  class="feed" data-id=<?php echo $v['id']; ?> data-type='price'>上传</a>
								<?php endif; endif; ?>
							</td>
<!--							<td>-->
<!--								<?php if($v['product_status'] == 0): ?>-->
<!--								<a  class="feed" data-id=<?php echo $v['id']; ?> data-type='all'>上传</a>-->
<!--								<?php endif; ?>-->
<!--							</td>-->
						<!-- 	<td>
								<?php echo $v['category']; ?>
							</td>
							<td>
								<?php echo $v['template']; ?>
							</td> -->
							<td>
								<?php echo $v['add_time']; ?>
							</td>
							<td>
								<?php echo $v['time']; ?>
							</td>

							<td>
							<a href="<?php echo url('admin/product/editRecord',array('id'=>$v['id'])); ?>" class="tooltip-success" data-rel="tooltip" title="" data-original-title="修改">
											<span class="green">
												<i class="ace-icon fa fa-pencil-square-o bigger-120"></i>
											</span>
							</a>
								&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
							<a href="<?php echo url('admin/Productupload/ymxdc',array('recordId'=>$v['id'])); ?>" >
										导出
							</a>
								&nbsp;&nbsp;&nbsp;&nbsp;
							<a href="<?php echo url('admin/Product/deleteReocrd',array('id'=>$v['id'])); ?>" data-info="你确定要删除吗？" class="tooltip-error confirm-rst-url-btn" data-rel="tooltip" title="删除" data-original-title="删除">
											<span class="red">
												<i class="ace-icon fa fa-trash-o bigger-120"></i>
											</span>
							</a>
						</td>
						</tr>
						<?php endforeach; ?>
						<tr>
								<td height="50" colspan="11" align="left"><?php echo $page; ?></td>
							</tr>
						</tbody>
					</table>

				</div>
			</div>
		</div>
		<!--添加到后台menu-->
		<div class="modal fade in" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
			<div class="modal-backdrop fade in" id="gbbb" style="height: 100%;"></div>
			<form class="form-horizontal ajaxForm2" name="model_addmenu" method="post" action="<?php echo url('admin/Model/model_addmenu'); ?>">
				<input type="hidden" name="model_id" id="model_id" value="" />
				<div class="modal-dialog">
					<div class="modal-content">
						<div class="modal-header">
							<button type="button" class="close" id="gb" data-dismiss="modal"
									aria-hidden="true">×
							</button>
							<h4 class="modal-title" id="myModalLabel">
								添加到后台菜单
							</h4>
						</div>
						<div class="modal-body">
							<div class="row">
								<div class="col-xs-12">

									<div class="space-4"></div>
									<div class="form-group">
										<label class="col-sm-3 control-label no-padding-right" for="form-field-1"> 导航标题：  </label>
										<div class="col-sm-9">
											<input type="text" name="menu_name" id="menu_name"  class="col-xs-10 col-sm-5" required/>
											<span class="lbl">&nbsp;&nbsp;<span class="red"></span>后台菜单名</span>
										</div>
									</div>
									<div class="space-4"></div>

									<div class="form-group">
										<label class="col-sm-3 control-label no-padding-right" for="form-field-1"> 样式名称：  </label>
										<div class="col-sm-9">
											<input type="text" name="css" id="css" class="col-xs-10 col-sm-3"/>
											<span class="lbl">&nbsp;&nbsp;<span class="red">*</span>样式图标样式</span>
										</div>
										<span class="col-sm-3"></span><span class="col-sm-9" style="font-size:12px; color:#999; margin-top:5px;">预留样式：fa-tachometer ， fa-folder ， fa-list ， fa-list-alt ， fa-calendar</span>
									</div>
									<div class="space-4"></div>
									<div class="form-group">
										<label class="col-sm-3 control-label no-padding-right" for="form-field-1"> 排序（从小到大）： </label>
										<div class="col-sm-9">
											<input type="text" name="sort" id="sort"  value="50" class="col-xs-10 col-sm-3" />
											<span class="lbl">&nbsp;&nbsp;<span class="red"></span>越小越靠前</span>
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
							<button type="button" class="btn btn-default" id="gbb" data-dismiss="modal"
									aria-hidden="true">关闭
							</button>
						</div>
					</div>
				</div>
			</form>
		</div><!--修改-->
	</div><!-- /.page-content -->
	<div class="modal-backdrop fade in" id="backgroundBlack" style="height: 100%;display: none"></div>

	<div class="modal-dialog" style="position: absolute;left:50%;margin-left: -600px;top:100px;width: 1200px;display: none" id="resultList">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close closeResult"  data-dismiss="modal" aria-hidden="true">×
				</button>
				<h4 class="modal-title" id="">
					上传结果
				</h4>
			</div>
			<div class="modal-body">
				<table>	
					<tr id="thead">	
						<th>类型</th>
						<th>代码</th>
						<th>详情</th>
						<th>SKU</th>
						<th>解决方案</th>
					</tr>
				</table>
			</div>
		</div>
	</div>
	<div class="modal-dialog" style="position: absolute;left:50%;margin-left: -400px;top:200px;width: 800px;display: none" id="errorReason">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close closeError"  data-dismiss="modal" aria-hidden="true">×
				</button>
				<h4 class="modal-title" id="">
					解决方案
				</h4>
			</div>
			<div class="modal-body" id="scheme">
				
			</div>
		</div>
	</div>
	<script type="text/javascript">
		$(".commodity_id").hover(function(){
		    $(this).attr("title",$(this).html());
		});
		$('.feed').click(function(){
			var id = $(this).attr('data-id')
			var type = $(this).attr('data-type')
			var parent = $(this).parent()
			$(this).remove()
			parent.html('上传中')
			$.ajax({
					url:'<?php echo url('admin/Product/createLcoalXml'); ?>',
					data:{recordId:id,type:type},
					type:'post',
					dataType: 'json',
					success:function(result){
						if(result.status=='success'){
							location.reload();
						}else{
							alert(result.msg)
						}
					}
				},'json');
		})
		$('.getList').click(function(){
			var id = $(this).attr('data-id')
			var type = $(this).attr('data-type')
			var parent = $(this).parent()
			$(this).remove()
			parent.html('更新中')
			$.ajax({
					url:'<?php echo url('admin/Product/getFeedSubmissionList'); ?>',
					data:{recordId:id,type:type},
					type:'post',
					dataType: 'json',
					success:function(result){
						if(result.status=='success'){
							alert(result.msg)
							location.reload();
						}else{
							alert(result.msg)
							location.reload();
						}
					}
				},'json');
		})
		$('.getResult').click(function(){
			var id = $(this).attr('data-id')
			var type = $(this).attr('data-type')
			var parent = $(this).parent()
			$(this).remove()
			parent.html('获取中请稍后')
			$.ajax({
					url:'<?php echo url('admin/Product/GetFeedSubmissionResult'); ?>',
					data:{recordId:id,type:type},
					type:'post',
					dataType: 'json',
					success:function(result){
						location.reload();
					}
				},'json');	
		})
		//查看错误原因
		function getError(submission){
			$.ajax({
					url:'<?php echo url('admin/Product/GetError'); ?>',
					data:{TransactionID:submission},
					type:'post',
					dataType: 'json',
					success:function(result){
						$('#thead').nextAll().remove()
						if(result.msg== 'success'){
							$("#resultList").css('display','block');
							$("#backgroundBlack").css('display','block');
							var html = "";
							for (var i = result.data.length - 1; i >= 0; i--) {
								var sku = result.data[i]['SKU']
								var url = "<?php echo url('admin/Product/skuGetGoods'); ?>"
								html += "<tr>"	
								html +=	"<th>"+result.data[i]['ResultCode']+"</th>"
								html +=	"<th>"+result.data[i]['ResultMessageCode']+"</th>"
								html +=	"<th>"+result.data[i]['ResultDescription']+"</th>"
								html +=	"<th><a href="+url+"?sku="+sku+">"+result.data[i]['SKU']+"</a></th>"
								html +=	"<th><a data-id="+result.data[i]['ResultMessageCode']+" class='errorCode'>查看</a></th>"
								html +=	"</tr>"
							}
							$('#thead').after(html)
						}else{
							alert('系统原因请重新上传')
						}
					}
				},'json');	
		}
		//关闭报错
		$('.closeResult').click(function(){
			$("#resultList").css('display','none');
			$("#backgroundBlack").css('display','none');
			$("#errorReason").css('display','none');
		})
		//关闭解决方案
		$('.closeError').click(function(){
			$("#errorReason").css('display','none');
		})
		//查看解决方案
		$("#resultList").on("click",".errorCode",function(){
			var errorId = $(this).attr('data-id')
			$.ajax({
					url:'<?php echo url('admin/Feed/errorReason'); ?>',
					data:{errorId:errorId},
					type:'post',
					dataType: 'json',
					success:function(result){
						if(result.msg=='success'){
							$('#errorReason').css('display','block');
							$('#scheme').html(result.data.scheme)
						}else{
							alert('暂无未解决方案')
						}
					}
				},'json');	
		})
	</script>

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
