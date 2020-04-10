<?php if (!defined('THINK_PATH')) exit(); /*a:6:{s:70:"D:\php\PHPTutorial\WWW\qiyetp5/app/admin\view\sys\admin_rule_list.html";i:1503645978;s:62:"D:\php\PHPTutorial\WWW\qiyetp5/app/admin\view\public\base.html";i:1503645978;s:64:"D:\php\PHPTutorial\WWW\qiyetp5/app/admin\view\public\header.html";i:1557369556;s:66:"D:\php\PHPTutorial\WWW\qiyetp5/app/admin\view\public\left_nav.html";i:1554623680;s:66:"D:\php\PHPTutorial\WWW\qiyetp5/app/admin\view\public\head_nav.html";i:1554196764;s:64:"D:\php\PHPTutorial\WWW\qiyetp5/app/admin\view\public\footer.html";i:1554272461;}*/ ?>
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
		<div class="row maintop">
			<div style="margin:10px 0;" id="rule-add">
				<form class="form-horizontal ajaxForm2" name="admin_rule_add" method="post" action="<?php echo url('admin/Sys/admin_rule_runadd'); ?>">
					<div class="col-xs-12 col-sm-12">
						<small>检测：</small>
						<small>
							<select name="notcheck">
								<option value="0">检测</option>
								<option value="1">不检测</option>
							</select>
						</small>
						<small>状态：</small>
						<small>
							<select name="status">
								<option value="1">显示</option>
								<option value="0">不显示</option>
							</select>
						</small>
						<small class="sl-left10">父级：</small>
						<small>
							<select name="pid" required>
								<option value="0">--默认顶级--</option>
								<?php if(is_array($admin_rule_all) || $admin_rule_all instanceof \think\Collection || $admin_rule_all instanceof \think\Paginator): if( count($admin_rule_all)==0 ) : echo "" ;else: foreach($admin_rule_all as $key=>$v): ?>
									<option value="<?php echo $v['id']; ?>" style="margin-left:55px;"><?php echo $v['lefthtml']; ?><?php echo $v['title']; ?></option>
								<?php endforeach; endif; else: echo "" ;endif; ?>
							</select>
						</small>
						<small class="sl-left10">名称：</small>
						<small><input name="title" id="title" class="rule"  placeholder=" 输入名称" required/></small>
						<small class="sl-left10">控/方：</small>
						<small><input name="name" id="name" class="rule"  placeholder=" 输入控制器/方法" required/></small>
						<small class="sl-left10">css：</small>
						<small><input name="css" id="css" class="wh50"  placeholder=" css样式" /></small>
						<small class="sl-left10">排序：</small>
						<small><input name="sort" id="sort" class="wh30" value="50"/></small>
						<small>
							<button class="btn btn-xs btn-danger ruleadd">
								添加权限
							</button>
						</small>
					</div>
				</form>
			</div>
			<div class="col-xs-12 col-sm-12 rule-top alert alert-info top10">
				<button type="button" class="close" data-dismiss="alert">
					<i class="ace-icon fa fa-times"></i>
				</button>
				1、《控/方》：意思是 控制器/方法; 例如 Sys/sys_list<br />
				2、菜单name检测规则：一级菜单=>控制器名，二级菜单=>不限制，但建议控制器/方法(选择默认的方法)，三级、四级菜单=>控制器/方法<br />
				3、css为控制左侧导航顶级栏目前图标样式(仅一级菜单有效)，具体可查看FontAwesome图标CSS样式
			</div>
			<div class="row">
				<div class="col-xs-12">
					<div>
						<form class="ajaxForm" name="ruleorder" method="post" action="<?php echo url('admin/Sys/admin_rule_order'); ?>" >
							<table class="table table-striped table-bordered table-hover" id="dynamic-table">
								<thead>
								<tr>
									<th>ID</th>
									<th></th>
									<th class="hidden-xs">权限名称</th>
									<th>控制器/方法</th>
									<th>不检测</th>
									<th>显示</th>
									<th class="hidden-sm hidden-xs">级别</th>
									<th class="hidden-sm hidden-xs">添加时间</th>
									<th class="hidden-sm hidden-xs">排序</th>
									<th>操作</th>
								</tr>
								</thead>
								<tbody>
								<?php if(is_array($admin_rule) || $admin_rule instanceof \think\Collection || $admin_rule instanceof \think\Paginator): if( count($admin_rule)==0 ) : echo "" ;else: foreach($admin_rule as $key=>$v): ?>
									<tr id="<?php echo $pid; ?>-<?php echo $v['id']; ?>">
										<td height="28"><?php echo $v['id']; ?></td>
										<td><a data-id="<?php echo $v['id']; ?>" data-level="<?php echo $v['level']; ?>" href="<?php echo url('admin/Sys/admin_rule_list'); ?>" style="cursor:pointer;" class="rule-list"><span class="fa fa-plus blue"></span></a></td>
										<td class="hidden-xs" style='padding-left:<?php if($v['leftpin'] != 0): ?><?php echo $v['leftpin']; ?>px<?php endif; ?>' ><?php echo $v['lefthtml']; ?><?php echo $v['title']; ?></td>
										<td><?php echo $v['name']; ?></td>
										<td>
											<?php if($v['notcheck'] == 1): ?>
											<a class="red notcheck-btn" href="<?php echo url('admin/Sys/admin_rule_notcheck'); ?>" data-id="<?php echo $v['id']; ?>" title="不检测">
												<div id="zt<?php echo $v['id']; ?>"><button class="btn btn-minier btn-danger">不检测</button></div>
											</a>
											<?php else: ?>
											<a class="red notcheck-btn" href="<?php echo url('admin/Sys/admin_rule_notcheck'); ?>" data-id="<?php echo $v['id']; ?>" title="检测">
												<div id="zt<?php echo $v['id']; ?>"><button class="btn btn-minier btn-yellow">检测</button></div>
											</a>
											<?php endif; ?>
										</td>
										<td>
											<?php if($v['status'] == 1): ?>
												<a class="red display-btn" href="<?php echo url('admin/Sys/admin_rule_state'); ?>" data-id="<?php echo $v['id']; ?>" title="已显示">
													<div id="zt<?php echo $v['id']; ?>"><button class="btn btn-minier btn-yellow">显示</button></div>
												</a>
												<?php else: ?>
												<a class="red display-btn" href="<?php echo url('admin/Sys/admin_rule_state'); ?>" data-id="<?php echo $v['id']; ?>" title="已隐藏">
													<div id="zt<?php echo $v['id']; ?>"><button class="btn btn-minier btn-danger">隐藏</button></div>
												</a>
											<?php endif; ?>
										</td>
										<td class="hidden-sm hidden-xs"><?php echo $v['level']; ?>级</td>
										<td class="hidden-sm hidden-xs"><?php echo date('Y-m-d',$v['addtime']); ?></td>
										<td class="hidden-sm hidden-xs"><input name="<?php echo $v['id']; ?>" value="<?php echo $v['sort']; ?>" class="list_order center"/></td>
										<td>
											<div class="hidden-sm hidden-xs action-buttons">
												<a class="blue" href="<?php echo url('admin/Sys/admin_rule_add',array('pid'=>$v['id'])); ?>"  title="添加子类">
													<i class="ace-icon fa fa-plus-circle bigger-130"></i>
												</a>
												<a class="green" href="<?php echo url('admin/Sys/admin_rule_edit',array('id'=>$v['id'])); ?>" title="修改">
													<i class="ace-icon fa fa-pencil bigger-130"></i>
												</a>
												<a class="green" href="<?php echo url('admin/Sys/admin_rule_copy',array('id'=>$v['id'])); ?>" title="复制">
													<i class="ace-icon fa fa-exchange bigger-130"></i>
												</a>
												<a class="red confirm-rst-url-btn" href="<?php echo url('admin/Sys/admin_rule_del',array('id'=>$v['id'])); ?>" data-info="你确定要删除吗？" title="删除">
													<i class="ace-icon fa fa-trash-o bigger-130"></i>							</a>
											</div>
											<div class="hidden-md hidden-lg">
												<div class="inline position-relative">
													<button class="btn btn-minier btn-primary dropdown-toggle" data-toggle="dropdown" data-position="auto">
														<i class="ace-icon fa fa-cog icon-only bigger-110"></i>
													</button>
													<ul class="dropdown-menu dropdown-only-icon dropdown-yellow dropdown-menu-right dropdown-caret dropdown-close">
														<li>	
															<a href="<?php echo url('admin/Sys/admin_rule_add',array('pid'=>$v['id'])); ?>"  class="tooltip-success" data-rel="tooltip" title="" data-original-title="添加子类">
																		<span class="green">
																			<i class="ace-icon fa fa-plus-circle bigger-120"></i>
																		</span>
															</a>						
														</li>
														<li>
															<a href="<?php echo url('admin/Sys/admin_rule_edit',array('id'=>$v['id'])); ?>" class="tooltip-success" data-rel="tooltip" title="" data-original-title="修改">
																			<span class="green">
																				<i class="ace-icon fa fa-pencil-square-o bigger-120"></i>
																			</span>
															</a>
														</li>
														<li>
															<a href="<?php echo url('admin/Sys/admin_rule_copy',array('id'=>$v['id'])); ?>" class="tooltip-success" data-rel="tooltip" title="" data-original-title="复制">
																			<span class="green">
																				<i class="ace-icon fa fa-exchange bigger-120"></i>
																			</span>
															</a>
														</li>
														<li>
															<a href="<?php echo url('admin/Sys/admin_rule_del',array('id'=>$v['id'])); ?>"  data-info="你确定要删除吗？" class="tooltip-error confirm-rst-url-btn" data-rel="tooltip" title="" data-original-title="删除">
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
									<td colspan="9" align="left"><button type="submit"  id="btnorder" class="btn btn-white btn-yellow btn-sm">排序</button></td>
								</tr>
								</tbody>
							</table>
						</form>
					</div>
				</div>
			</div>
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
