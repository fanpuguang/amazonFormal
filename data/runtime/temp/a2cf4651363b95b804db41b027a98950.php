<?php if (!defined('THINK_PATH')) exit(); /*a:6:{s:86:"/www/wwwroot/www.ldkjmy.com/aaaa/yamaxun/app/admin/view/productupload/smartupload.html";i:1578553890;s:72:"/www/wwwroot/www.ldkjmy.com/aaaa/yamaxun/app/admin/view/public/base.html";i:1578553890;s:74:"/www/wwwroot/www.ldkjmy.com/aaaa/yamaxun/app/admin/view/public/header.html";i:1578553891;s:76:"/www/wwwroot/www.ldkjmy.com/aaaa/yamaxun/app/admin/view/public/left_nav.html";i:1578553891;s:76:"/www/wwwroot/www.ldkjmy.com/aaaa/yamaxun/app/admin/view/public/head_nav.html";i:1578553891;s:74:"/www/wwwroot/www.ldkjmy.com/aaaa/yamaxun/app/admin/view/public/footer.html";i:1578970335;}*/ ?>
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
		<div class="input-group-btn">
			<button type="button" class="btn btn-xs all-btn btn-purple ajax-display-all333" style="margin-left: 10px;" id="batch_edit">
				<span class="ace-icon fa fa-globe icon-on-right bigger-110"></span>
				批量修改
			</button>
		</div>


		<div class="row">
			<div class="col-xs-12">
				<div>
					<form  method="post" action="<?php echo url('admin/productupload/daochu'); ?>" >
						<input name="p" id="p" value="<?php echo input('p',1); ?>" type="hidden" />
						
					<table class="table table-striped table-bordered table-hover" id="dynamic-table">
						<thead>
						<tr>
							<th class="hidden-xs center">
							<label class="pos-rel">
								<input type="checkbox" class="ace"  id='chkAll' onclick='CheckAll(this.form)' value="全选"/>
								<span class="lbl"></span>
							</label>
							</th>
							<th class="hidden-xs">ID</th>
							<th class="hidden-xs">产品图片</th>
							<th class="hidden-sm hidden-xs">简称</th>
							<th class="hidden-sm hidden-xs">类目</th>

							<th class="hidden-sm hidden-xs">父SKU</th>

							<th class="hidden-xs">导出状态</th>
							<th class="hidden-xs">产品信息状态</th>
							<th class="hidden-xs">用户</th>
							<th class="hidden-xs">采集时间</th>

							<th class="hidden-xs">
								操作
							</th>

						</tr>
						</thead>

						<tbody>
						<?php if(is_array($goods) || $goods instanceof \think\Collection || $goods instanceof \think\Paginator): if( count($goods)==0 ) : echo "" ;else: foreach($goods as $key=>$v): ?>
						<tr>
							<td class="hidden-xs" align="center">
								<label class="pos-rel">
									<input name='n_id[]' id="navid" class="ace sel"  type='checkbox' value='<?php echo $v['id']; ?>'>
									<span class="lbl"></span>
								</label>
							</td>
							<td class="hidden-xs" align="center"><?php echo $v['id']; ?></td>
							<td class="hidden-xs" align="center">
								<img style="width:50px;hieght:50px;" src="<?php foreach (explode('|',$v['PICTURE']) as $k1=>$v1){
									if($k1 == 0){
										echo $v1;
									}
								} ?>"/>
							</td>
							<td class="hidden-sm hidden-xs" style="color:green;">
								<?php echo $name; ?>
							</td>
							<td class="hidden-sm hidden-xs" style="color:green;">
								<?php if($v['CLASS1'] != ''): ?> <?php echo get_classname($v['CLASS1']); endif; if($v['CLASS2'] != ''): ?> /<?php echo get_classname($v['CLASS2']); endif; if($v['CLASS3'] != ''): ?> /<?php echo get_classname($v['CLASS3']); endif; ?>
							</td>
							<td class="hidden-xs hidden-sm"><?php echo $v['FSKU']; ?></td>
							<td class="hidden-xs hidden-sm">
								<?php if($v['DC_STATUS'] == 1): ?>
								<span style="color:green;">已导出</span>
								<?php else: ?>
								<span style="color:red;">未导出</span>
								<?php endif; ?>
							</td>


							<td class="hidden-xs">
								<?php if($v['P_STATUS'] == 1): ?> <span style="color:green;">价格计算完成</span><?php else: ?> <span style="color:red;">价格计算中</span> <?php endif; ?>&nbsp;&nbsp;
								<?php if($v['F_STATUS'] == 1): ?> <span style="color:green;">语言翻译完成</span><?php else: ?> <span style="color:red;">语言翻译中</span> <?php endif; ?>
							</td>
							<td class="hidden-xs"><?php echo get_name($v['UID']); ?></td>
							<td class="hidden-xs"><?php echo date("Y-m-d H:i:s",$v['TIME']); ?></td>

							<td>
								<div class="hidden-sm hidden-xs action-buttons">
									<?php if($v['DC_STATUS'] == 1): ?>
										<a class="green" href="<?php echo url('admin/Productupload/product_edit',array('goodsId'=>$v['id'])); ?>" data-toggle="tooltip" title="修改">
											<i class="ace-icon fa fa-pencil bigger-130"></i>
										</a>
									<?php else: ?>
										<span style="color:red;">未付款</span>
									<?php endif; ?>

									<!--<a class="red confirm-rst-url-btn" data-info="你确定要删除到回收站吗？" href="<?php echo url('admin/Productupload/product_del',array('goodsId'=>$v['id'],'p'=>input('p',1))); ?>" title="回收站" data-toggle="tooltip">
										<i class="ace-icon fa fa-trash-o bigger-130"></i>
									</a>-->
								</div>
								<div class="hidden-md hidden-lg">
									<div class="inline position-relative">
										<button class="btn btn-minier btn-primary dropdown-toggle" data-toggle="dropdown" data-position="auto">
											<i class="ace-icon fa fa-cog icon-only bigger-110"></i>
										</button>
										<ul class="dropdown-menu dropdown-only-icon dropdown-yellow dropdown-menu-right dropdown-caret dropdown-close">
											<li>
												<a href="<?php echo url('admin/Productupload/product_edit',array('goodsId'=>$v['id'])); ?>" class="tooltip-success" data-rel="tooltip" title="" data-original-title="修改">
											<span class="green">
												<i class="ace-icon fa fa-pencil-square-o bigger-120"></i>
											</span>
												</a>
											</li>


											<!--<li>
												<a href="<?php echo url('admin/Productupload/product_del',array('goodsId'=>$v['id'],'p'=>input('p',1))); ?>" data-info="你确定要删除到回收站吗？" class="tooltip-error confirm-rst-url-btn" data-rel="tooltip" title="回收站" data-original-title="回收站">
											<span class="red">
												<i class="ace-icon fa fa-trash-o bigger-120"></i>
											</span>
												</a>
											</li>-->
										</ul>
									</div>
								</div>
							</td>
						</tr>
						<?php endforeach; endif; else: echo "" ;endif; ?>
						<tr>
							<td align="left" class="hidden-xs center"><button id="btnsubmit" class="btn btn-white btn-yellow btn-sm hidden-xs">导出选中数据</button> </td>

							<td colspan="2" align="left"class="hidden-lg hidden-md hidden-sm"><?php echo $page; ?></td>
							<td align="left" class="hidden-xs center"><a href="<?php echo url('admin/productupload/daochu',array('addid'=>$addid,'shuju=>1')); ?>" class="btn btn-white btn-yellow btn-sm">导出全部数据</a><span style="color:red;">数据量大禁用</span></td>
							<td align="left" class="hidden-xs center" style="color:red;" colspan="1"><a id="ymx" class="btn btn-white btn-yellow btn-sm hidden-xs" onclick="pldc()">批量导出亚马逊模板</a></td>
							<td align="left" class="hidden-xs center" style="color:red;" colspan="1"><a id="sku" class="btn btn-white btn-yellow btn-sm hidden-xs">批量修改SKU</a></td>
							<td align="left" class="hidden-xs center" style="color:red;" colspan="1"><a id="upc" class="btn btn-white btn-yellow btn-sm hidden-xs">批量修改UPC</a></td>
							<td align="left" class="hidden-xs center" style="color:red;" colspan="1"><a id="plxg" class="btn btn-white btn-yellow btn-sm hidden-xs ">批量修改产品信息</a></td>
							<td colspan="8" align="right" class="hidden-xs"><?php echo $page; ?></td>
						</tr>
						</tbody>
					</table>
					</form>
				</div>
			</div>
		</div>
		<script>
			function pldc(){


				var chk_value =[];
				$('input[class="sel"]:checked').each(function(){
					chk_value.push($(this).val());
				});
				alert(chk_value);
			}


		</script>






		<!-- 显示修改模态框（Modal） -->
		<div class="modal fade in" id="myModaledit" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
			<div class="modal-backdrop fade in" id="gbbb" style="height: 100%;"></div>
			<form class="form-horizontal ajaxForm2" name="pro_runedit" method="post" action="<?php echo url('admin/Productupload/piliangxiugai'); ?>">
				<input type="hidden" name="yonghu_id" id="yonghu_id" value="" />
				<div class="modal-dialog">
					<div class="modal-content">
						<div class="modal-header">
							<button type="button" class="close" id="gb"  data-dismiss="modal"
									aria-hidden="true">×
							</button>
							<h4 class="modal-title" id="myModalLabel">
								批量修改产品信息
							</h4>
						</div>
						<div class="modal-body">


							<div class="row">
								<div class="col-xs-12">
									<div class="form-group">
										<label class="col-sm-2 control-label no-padding-right" for="form-field-1">总部账号金额：  </label>
										<div class="col-sm-10" style="margin-top: 8px;" id="zongqian" style="color:red;"></div>
									</div>
									<div class="space-4"></div>
									<div class="form-group">
										<label class="col-sm-2 control-label no-padding-right" for="form-field-1">分配金额：  </label>
										<div class="col-sm-10">
											<input type="number" name="money" id="money"  class="col-xs-10 col-sm-5"/>

										</div>
									</div>
									<div class="space-4"></div>

								</div>
							</div>




						</div>
						<div class="modal-footer">
							<button type="submit" class="btn btn-primary">
								提交分配
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

<div id="batch_content" class="layui-layer layui-layer-page openClass layer-anim"  type="page" times="9" showtime="0" contype="object" style="margin-top:100px;z-index: 1;left:50%; width: 500px; height: 150px; top: 23.5px;margin-left: -250px; display: none">
	<span class="layui-layer-setwin close" style="position: fixed">
		<a class="layui-layer-ico layui-layer-close layui-layer-close2 selectCancle" href="javascript:;"></a>
	</span>

		<div class="form-group" style="height:30px;clear: both;margin-top: 30px">
			<label class="col-sm-2 control-label no-padding-right" for="form-field-1"> SKU修正： </label>
			<div class="col-sm-10">
				<input type="text" name="correctSku" id="correctSku" placeholder="SKU修正,建议两位英文字母" class="col-xs-10 col-sm-4" style="margin-left:10px;">
				<span class="help-inline col-xs-12 col-sm-7">
				<span class="btn btn-sm btn-danger" id="reloadSku">修正</span>
			</span>
			</div>
		</div>
		<div class="form-group" style="height:30px;clear: both;">
			<label class="col-sm-2 control-label no-padding-right" for="form-field-1"> EAN修正： </label>
			<div class="col-sm-10">
			<span class="help-inline col-xs-12 col-sm-7">
				<span class="btn btn-sm btn-danger" id="reloadEan">修正</span>
			</span>
			</div>
		</div>
</div>
<script>
	//批量修改
	$('#batch_edit').click(function(){
		var ids = getIds()
		if(ids==""){
			alert('请勾选要修改的产品')
			return false;
		}
		$('#ids').val(ids)
		$('#batch_content').show()
	})
	//修正ean
	$('#reloadEan').click(function(){
		var ids = getIds()
		$.post("<?php echo url('admin/Productupload/batch_edit_ean'); ?>",{ids:ids},function(data){
			alert('已修改')
		});
	})
	//修正sku
	$('#reloadSku').click(function(){
		var ids = getIds()
		var correctSku = $('#correctSku').val()
		$.post("<?php echo url('admin/Productupload/batch_edit_sku'); ?>",{ids:ids,correctSku:correctSku},function(data){
			alert('已修改')
		});
	})
	//获取id
	function getIds(){
		var ids = "";
		$("input[name='n_id[]']:checked").each(function (index, item) {
			ids += $(this).val()+",";
		});
		return ids;
	}
	//关闭弹出
	$('.close').click(function(){
		$('#ids').val('')
		$('#batch_content').hide()
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
