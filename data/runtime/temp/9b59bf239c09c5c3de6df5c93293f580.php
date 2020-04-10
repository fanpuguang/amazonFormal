<?php if (!defined('THINK_PATH')) exit(); /*a:6:{s:81:"/www/wwwroot/www.ldkjmy.com/aaaa/yamaxun/app/admin/view/product/edit_collect.html";i:1578553888;s:72:"/www/wwwroot/www.ldkjmy.com/aaaa/yamaxun/app/admin/view/public/base.html";i:1578553890;s:74:"/www/wwwroot/www.ldkjmy.com/aaaa/yamaxun/app/admin/view/public/header.html";i:1586171204;s:76:"/www/wwwroot/www.ldkjmy.com/aaaa/yamaxun/app/admin/view/public/left_nav.html";i:1578553891;s:76:"/www/wwwroot/www.ldkjmy.com/aaaa/yamaxun/app/admin/view/public/head_nav.html";i:1578553891;s:74:"/www/wwwroot/www.ldkjmy.com/aaaa/yamaxun/app/admin/view/public/footer.html";i:1578970335;}*/ ?>
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

	.pro_inf>span>p,

	.pro_inf>p{

		color: #ffa64c;

		font-size: 13px;

	}

	.check span input{

		margin-right: 8px;

		margin-left: 15px;

	}

	.check span:nth-child(1) input{

		margin-left: 0;

	}





	#fenleiTankuang div.con{

		display: flex;

		padding: 30px 10px 10px 10px;

		height: 320px;

	}

	#fenleiTankuang div.con>div{

		flex: 1;

		/*border: 1px solid #bbb;*/

		padding: 10px;

		margin-right: 10px;

		border-radius: 3px;

		box-shadow: 0 0 10px #ccc;

	}

	#fenleiTankuang div.con>div ul li{

		color: #555;

		padding: 5px;

		cursor: pointer;

		border-radius: 2px;

		border-bottom: 2px solid #f0f0f0;

	}

	#fenleiTankuang div.con>div ul li.active{

		/*color: #0f6ab4;*/

		background: #dbedf7;

	}

	#fenleiTankuang{

		display: none;

	}

	form>.fenleiCon{

		display: none;

	}

	.dingsClass{

		z-index:20000000!important;

	}

	.inner-content-div2{

		height: 270px;

		overflow-y: scroll;

	}



</style>

	<div class="page-content">



		<div class="row maintop">

			<!--<div class="col-xs-5 col-sm-2  margintop5">



					<button class="btn btn-sm btn-danger">

						<i class="ace-icon fa fa-bolt bigger-110"></i>

						<a style="color: #ffffff;" href="<?php echo url('admin/Productupload/myupload'); ?>">立即上传列表</a>

					</button>

					<button class="btn btn-sm btn-danger">

						<i class="ace-icon fa fa-bolt bigger-110"></i>

						<a style="color: #ffffff;"  href="<?php echo url('admin/Productupload/timing_upload'); ?>">定时上传列表</a>

					</button>



			</div>-->

			<div class="col-xs-5 col-sm-2  margintop5" style="width:50%;">

				<!--<button class="btn btn-info" >

					<i class="ace-icon fa fa-bolt bigger-110"></i>

					<a style="color: #ffffff;"  href="<?php echo url('admin/Productupload/new_upload'); ?>">添加新上传</a>

				</button>-->



				<button  class="btn btn-info" id="submit">

					<i class="ace-icon fa fa-check bigger-110"></i>

					修改

				</button>

			</div>



		</div>



		<div class="row">

			<div class="col-xs-12">

				<div id="step" class="box">

					<form method="post" action="<?php echo url('admin/feed/creatXml'); ?>" >

						<input type="hidden" name="recordId" id="recordId" value="<?php echo $record['id']; ?>">

						<div class="form_item">

							<div class="item">

								<div>

									<h4>

										添加产品

									</h4>

								</div>

								<div class="pro_inf daochu">

                    <span>

                        <label for="">

                            开始ID：

                        </label>

                        <input type="text" placeholder="建议填写" class="startId" required="required" value="<?php echo !empty($record['startId'])?$record['startId']:''; ?>" id="startId" <?php if(isset($record['textId'])): ?> disabled="disabled" <?php endif; ?>>

                        <p>

                            产品ID都是递增的，本次要导出产品起始ID

                        </p>

                    </span>

									&nbsp;&nbsp;&nbsp;&nbsp;

									<span>

                        <label for="">

                            结束ID：

                        </label>

                        <input type="text" placeholder="建议填写" class="endId" required="required" value="<?php echo !empty($record['endId'])?$record['endId']:''; ?>" id="endId" <?php if(isset($record['textId'])): ?> disabled="disabled" <?php endif; ?>>

                        <p>

                            要导出产品的结束ID，结束ID起始ID

                        </p>

                    </span>

								</div>

							</div>

						</div>



					<div class="form_item">

							<div class="item">

								<div>

									<h4>

										产品id

									</h4>

								</div>

								<div class="pro_inf daochu">

			                    <span>

			                        <textarea name="idText" id="idText" <?php if(isset($record['endId'])): ?> disabled="disabled" <?php endif; ?>><?php echo !empty($record['textId'])?$record['textId']:''; ?></textarea>

			                        <p>

			                            填写产品ID后（逗号隔开，逗号为英文逗号，不能有空格），将只上传填写的ID列表，不填写则上传其他条件筛选出的产品，标准格式：12,123,456,789

			                        </p>

			                    </span>

								</div>

							</div>

					</div>

					<div class="form-group">

		                    <div class="item">

								<div>

									<h4>

										所属分类：

									</h4>

								</div>

								<div class="pro_inf daochu">

			                    <span>

			                     <!--  <select name="type1" onchange="showclass2()" id="type1">

		                                <option value="">请选择一级分类</option>



		                                    <?php if(is_array($list_fenlei) || $list_fenlei instanceof \think\Collection || $list_fenlei instanceof \think\Paginator): if( count($list_fenlei)==0 ) : echo "" ;else: foreach($list_fenlei as $key=>$vo): if($vo['parentId'] == 0): ?>



		                                            <option value="<?php echo $vo['categoryId']; ?>"><?php echo $vo['categoryName']; ?></option>



		                                    <?php endif; endforeach; endif; else: echo "" ;endif; ?>

		                            </select>

		                            <select name="type2" onchange="showclass3()" id="type2" style="display:none;"></select>

		                            <select name="type3"  id="type3" style="display:none;"></select> -->

		                            <select name="class1" onchange="showclass2()" id="class1" >

                                <option value="">请选择一级分类</option>



                                    <?php if(is_array($list_fenlei) || $list_fenlei instanceof \think\Collection || $list_fenlei instanceof \think\Paginator): if( count($list_fenlei)==0 ) : echo "" ;else: foreach($list_fenlei as $key=>$vo): if($vo['parentId'] == 0): if($vo['categoryId'] == $record['class1']): ?>

												<option value="<?php echo $vo['categoryId']; ?>" selected><?php echo $vo['categoryName']; ?></option>

											<?php else: ?>

												<option value="<?php echo $vo['categoryId']; ?>"><?php echo $vo['categoryName']; ?></option>

											<?php endif; endif; endforeach; endif; else: echo "" ;endif; ?>

                            </select>

							<?php if($record['class2']!= ''): ?>

                            	<select name="class2" onchange="showclass3()" id="class2">

									<?php if(is_array($list_fenlei) || $list_fenlei instanceof \think\Collection || $list_fenlei instanceof \think\Paginator): if( count($list_fenlei)==0 ) : echo "" ;else: foreach($list_fenlei as $key=>$vo): if($vo['categoryId'] == $record['class2']): ?>

											<option value="<?php echo $vo['categoryId']; ?>" selected><?php echo $vo['categoryName']; ?></option>

										<?php else: ?>

											<option value="<?php echo $vo['categoryId']; ?>"><?php echo $vo['categoryName']; ?></option>

										<?php endif; endforeach; endif; else: echo "" ;endif; ?>

								</select>

							<?php else: ?>

	                            <select name="class2" onchange="showclass3()" id="class2" style="display:none;"></select>

							<?php endif; if($record['class3']!= ''): ?>

                            	<select name="class3"  id="class3">

									<?php if(is_array($list_fenlei) || $list_fenlei instanceof \think\Collection || $list_fenlei instanceof \think\Paginator): if( count($list_fenlei)==0 ) : echo "" ;else: foreach($list_fenlei as $key=>$vo): if($vo['categoryId'] == $record['class3']): ?>

											<option value="<?php echo $vo['categoryId']; ?>" selected><?php echo $vo['categoryName']; ?></option>

										<?php else: ?>

											<option value="<?php echo $vo['categoryId']; ?>"><?php echo $vo['categoryName']; ?></option>

										<?php endif; endforeach; endif; else: echo "" ;endif; ?>

								</select>

							<?php else: ?>

								<select name="class3"  id="class3" style="display:none;"></select>

							<?php endif; ?>

			                    </span>

												&nbsp;&nbsp;&nbsp;&nbsp;

								

								</div>

							</div>

	                    </div>

						<div class="form_item">

							<div class="item">

								<div>

									<h4>

										授权店铺

									</h4>

								</div>

								<div class="pro_inf">

									<div class="el-select">

										<!---->

										<div class="el-input el-input--suffix">

											<!---->



											<!---->

												<select name="goodsCate"  class="col-sm-5 selector" required id="test111" onchange="fenlei(this.value)" >

													<option value="">请选择店铺</option>

													<?php if(is_array($storeList) || $storeList instanceof \think\Collection || $storeList instanceof \think\Paginator): if( count($storeList)==0 ) : echo "" ;else: foreach($storeList as $key=>$v): if($v['plug_khqy'] == 1): ?>

													<option value="4" <?php if($record['store_id']==4): ?>selected='selected'<?php endif; ?>><?php echo $v['plug_dpbm']; ?>--德国</option>

													<option value="5" <?php if($record['store_id']==5): ?>selected='selected'<?php endif; ?>><?php echo $v['plug_dpbm']; ?>--英国</option>

													<option value="6" <?php if($record['store_id']==6): ?>selected='selected'<?php endif; ?>><?php echo $v['plug_dpbm']; ?>--意大利</option>

													<option value="7" <?php if($record['store_id']==7): ?>selected='selected'<?php endif; ?>><?php echo $v['plug_dpbm']; ?>--法国</option>

													<option value="8" <?php if($record['store_id']==8): ?>selected='selected'<?php endif; ?>><?php echo $v['plug_dpbm']; ?>--西班牙</option>

													<?php endif; if($v['plug_khqy'] == 0): ?>

													<option value="9" style="color:blue;" <?php if($record['store_id']==9): ?>selected='selected'<?php endif; ?>><?php echo $v['plug_dpbm']; ?>--美国</option>

													<option value="10" style="color:blue;" <?php if($record['store_id']==10): ?>selected='selected'<?php endif; ?>><?php echo $v['plug_dpbm']; ?>--墨西哥</option>

													<option value="11" style="color:blue;" <?php if($record['store_id']==11): ?>selected='selected'<?php endif; ?>><?php echo $v['plug_dpbm']; ?>--加拿大</option>

													<?php endif; if($v['plug_khqy'] == 2): ?>

													<option value="2" style="color:green;" <?php if($record['store_id']==2): ?>selected='selected'<?php endif; ?>><?php echo $v['plug_dpbm']; ?>--日本</option>

													<?php endif; endforeach; endif; else: echo "" ;endif; ?>

												</select>

                                                                <span class="el-input__suffix">

                                                    <span class="el-input__suffix-inner">

                                                        <i class="el-select__caret el-input__icon el-icon-arrow-up">

                                                        </i>



                                </span>

												<!---->

                            </span>

											<!---->

											<!---->

										</div>



									</div>

									<span>

                    </span>

								</div>

							</div>

						</div>



						<div class="form_item">

							<div class="item">

								<div class="select-res">

									<h4>

										选择分类

									</h4>

								</div>



								<!--/*********************************************************************/-->

								<div class="layui-layer layui-layer-page openClass layer-anim" id="layui-layer2" type="page" times="2" showtime="0" contype="object" style="z-index: 19891016; width: 800px; height: 400px;  left: 551.5px;display:none;" >

									<div id="" class="layui-layer-content" style="height: 347px;">

										<div id="fenleiTankuang" class="layui-layer-wrap" style="display: block;">

											<div class="con" id="fenleiContent">

												<div class="fenleiCon" style="display: none;" id="fenleiCon">

													<div style="width: 100%; margin: 0px auto;">

														<div class="inner-content-div2">

															<ul id="class1-1">



															</ul>

														</div>

													</div>

												</div>

<!--												<div class="fenleiCon" style="display: none;" id="class2">-->

<!--													<div style="width: 100%; margin: 0px auto;">-->

<!--														<div class="inner-content-div2">-->

<!--															<ul id="class2-2">-->



<!--															</ul>-->

<!--														</div>-->

<!--													</div>-->

<!--												</div>-->

<!--												<div class="fenleiCon"  style="display: none;" id="class3">-->

<!--													<div style="width: 100%; margin: 0px auto;">-->

<!--														<div class="inner-content-div2">-->

<!--															<ul id="class3-3">-->



<!--															</ul>-->

<!--														</div>-->

<!--													</div>-->

<!--												</div>-->

											</div>

										</div>

									</div>

									<span class="layui-layer-setwin">

                        <a class="layui-layer-ico layui-layer-close layui-layer-close2" onclick="guanbi()">

                        </a>

                    </span>

									<div class="layui-layer-btn layui-layer-btn-">
										<input type="hidden" id="categoryName" value="<?php echo $record['category_name']; ?>">
										<a class="layui-layer-btn0" id="confirmNodeid">

											确定

										</a>

										<a class="layui-layer-btn1" onclick="guanbi()">

											取消

										</a>

									</div>

									<span class="layui-layer-resize">

                    </span>

								</div>

								<script>

					function showclass2(){

						id = $('#class1').val();

						if(id!=''){

							$.post("<?php echo url('admin/Productclass/showclass22'); ?>",{id:id},function(data){

								if(data!=""){

									$("#class2").html(data);

									$("#class2").show();

									$("#class3").hide();

								}else{

									$("#class2").hide();

								}

							});



						}



					}

					function showclass3(){

						id = $('#class2').val();

						if(id!=''){

							$.post("<?php echo url('admin/Productclass/showclass33'); ?>",{id:id},function(data){

								$("#class3").html(data);

								$("#class3").show();

							});

						}

					}

				</script>
				<script type="text/javascript">

									$(document).ready(function(){ 

										var country = $('#test111').val()

										$.ajax({

											url:'<?php echo url('admin/Feed/firstClass'); ?>',

											data:{country:country},

											type:'post',

											dataType: 'json',

											success:function(result){

												$("#fenleiCon").show();

												$("#class1-1").html("")

												if(result.msg == 'success'){

													$.each(result.data, function(i, item) {

														$("#class1-1").append("<li data-index=\"0\" data-nodeid='" + item.cid + "' data-id='" + item.nodeId + "' class=' typelist'>" + item.displayName +"/"+ item.categoryName+ "</li>");

													});

												}



											}

										},'json');

									}); 

								</script>
								<script>

									 $('#startId').blur(function(){

				                    	if($('#startId').val()>0 || $('#endId').val()>0){	                    	

				                    		$('#idText').text('')

					                    	$('#idText').attr("disabled","disabled");

				                    	}else{

				                    		$('#idText').removeAttr("disabled");

				                    	}

				                    })

				                     $('#endId').blur(function(){

				                     	if($('#endId').val()>0 || $('#endId').val()>0){	

					                    	$('#idText').text('')

					                    	$('#idText').attr("disabled","disabled");

				                    	}else{

				                    		$('#idText').removeAttr("disabled");

				                    	}

				                    })

				                     $('#idText').blur(function(){

				                     	if($('#idText').val()!=""){

				                     		$('#endId').val('')

				                    		$('#startId').val('')

				                    		$('#startId').attr("disabled","disabled");

				                    		$('#endId').attr("disabled","disabled");

				                     	}else{

				                     		$('#endId').removeAttr("disabled");

				                     		$('#startId').removeAttr("disabled");

				                     	}

				                    	

				                    })

									//关闭分类

									function guanbi(){

										$('#layui-layer2').hide();



									}

									//点击更改背景



									$("#class1-1").on("click","li",function(){

										$("#class1-1 li").removeClass("active");

										$(this).addClass("active");

									});

									$("#class2-2").on("click","li",function(){

										$("#class2-2 li").removeClass("active");

										$(this).addClass("active");

									});

									$("#class3-3").on("click","li",function(){

										$("#class3-3 li").removeClass("active");

										$(this).addClass("active");

									});

									//显示分类

									function xianshi(){



										zhi = $('#test111').val();//选中的值

										if(zhi == ''){

											layer.alert('请选择店铺', {icon: 5});

										}else{

											$('#layui-layer2').show();

										}





									}

									//遍历展示一级分类

									// function fenlei(obj) {
									// 	$("#class1").nextAll().remove();

									// 	$('#showNode').val('')

									// 	$('#nodeId').val('')

									// 	$.ajax({

									// 		url:'<?php echo url('admin/Feed/firstClass'); ?>',

									// 		data:{country:obj},

									// 		type:'post',

									// 		dataType: 'json',

									// 		success:function(result){

									// 			$("#class1").show();

									// 			$("#class1-1").html("")

									// 			if(result.msg == 'success'){

									// 				$.each(result.data, function(i, item) {
									// 					console.log(item)
									// 					$("#class1-1").append("<li data-index=\"0\" data-nodeid='" + item.cid + "' class=' typelist'>" + item.displayName + "</li>");

									// 				});

									// 			}



									// 		}

									// 	},'json');

									// }
									//遍历展示一级分类

									function fenlei(obj) {

										$("#fenleiCon").nextAll().remove();

										$('#showNode').val('')

										$('#nodeId').val('')

										$.ajax({

											url:'<?php echo url('admin/Feed/firstClass'); ?>',

											data:{country:obj},

											type:'post',

											dataType: 'json',

											success:function(result){

												$("#fenleiCon").show();

												$("#class1-1").html("")

												if(result.msg == 'success'){

													$.each(result.data, function(i, item) {

														$("#class1-1").append("<li data-index=\"0\" data-nodeid='" + item.cid + "' data-id='"  + item.nodeId + "' data-categoryname='" + item.categoryName + "' class=' typelist'>" + item.displayName +"/"+ item.categoryName+ "</li>");

													});

												}



											}

										},'json');

									}


									$("#fenleiTankuang").on("click",".typelist",function(){

										$(this).addClass('active').siblings().removeClass('active')

										$(this).parent().parent().parent().parent().nextAll().remove();

										$('#confirmNodeid').attr("node-id",$(this).attr('data-id'));

										$('#confirmNodeid').attr("text",$(this).html());
										$('#confirmNodeid').attr("category-name",$(this).attr('data-categoryname'));

										var country = $('#test111').val()

										var id = $(this).attr('data-nodeid')

										$.ajax({

											url:'<?php echo url('admin/Feed/childClass'); ?>',

											data:{country:country,parent:id},

											type:'post',

											dataType: 'json',

											success:function(result){

													if(result.msg == 'success'){

														var html = "<div class='fenleiCon'>"

														html+="<div style='width: 100%; margin: 0px auto;'>"

														html+="<div class='inner-content-div2'>"

														html+="<ul>"

														$.each(result.data, function(i, item) {

															html+= "<li data-index='0' data-nodeid='" + item.cid + "' data-id='"  + item.nodeId + "' data-categoryname='" + item.categoryName + "' class='typelist'>" + item.displayName +"/"+ item.categoryName+ "</li>"

															// $("#class1-1").append("<li data-index=\"0\" data-nodeid='" + item.cid + "' class='typelist'>" + item.displayName + "</li>");

														});

														html+="</ul>"

														html+="</div>"

														html+="</div>"

														html+="</div>"

													$('#fenleiContent').append(html)

													}

												}

										},'json');

									})

									$('#confirmNodeid').click(function(){

										$('#layui-layer2').hide()

										$('#nodeId').val($(this).attr('node-id'))

										$('#showNode').val($(this).attr('text'))
										$("#categoryName").val($(this).attr('category-name'))
										var categoryDetail = ""
										$('#fenleiTankuang .active').each(function(index,e){
											categoryDetail += $(this).html()+"/"
										})
										$('#categoryDetail').html(categoryDetail)
									})

									$("#submit").click(function(){

										var startId = $(".startId").val()

										var endId = $(".endId").val()

										var idText = $('#idText').val()
										var categoryName = $("#categoryName").val()

										if(startId == '' && endId == '' && idText == ''){

											alert('id不能为空')

											return false;

										}

										if(idText == ''){

											if(startId == ''){

												alert('开始id不能为空')

												return false;

											}

											if(endId == ''){

												alert('结束id不能为空')

												return false;

											}

										}

										

										var goodsCate = $("#test111").val()

										var nodeId = $("#nodeId").val()

										var templateType = $("#templateType").val()

										var category = $('#showNode').val();

										var class1 = $('#class1').val()

										var class2 = $('#class2').val()

										var class3 = $('#class3').val()

										var id = $('#recordId').val()
										var categoryDetail = $("#categoryDetail").html()
										if(showNode == ''){

											alert('请选择分类')

											return false;

										}





										$.ajax({

											url:'<?php echo url('admin/product/updateRecord'); ?>',

											data:{startId:startId,endId:endId,goodsCate:goodsCate,nodeId:nodeId,templateType:templateType,category:category,id:id,idText:idText,class1:class1,class2:class2,class3:class3,categoryName:categoryName,categoryDetail:categoryDetail},

											type:'post',

											dataType: 'json',

											success:function(result){

												// if(result.status=='error'){}

												alert(result.msg);

												if(result.status=="success"){

												window.location.href = "<?php echo url('admin/product/record_list'); ?>";

												}

											}

										},'json');

									})

								</script>

								<script type="text/javascript">

									$(document).ready(function(){ 

										var country = $('#test111').val()

										$.ajax({

											url:'<?php echo url('admin/Feed/firstClass'); ?>',

											data:{country:country},

											type:'post',

											dataType: 'json',

											success:function(result){

												$("#class1").show();

												$("#class1-1").html("")

												if(result.msg == 'success'){

													$.each(result.data, function(i, item) {

														$("#class1-1").append("<li data-index=\"0\" data-nodeid='" + item.cid + "' data-id='" + item.nodeId + "' data-categoryname='" + item.categoryName + "'  class=' typelist'>" + item.displayName + "</li>");

													});

												}



											}

										},'json');

									}); 

								</script>

								<!-- *********************************************************************/ -->

								<div class="pro_inf">

                    <span>

                        <input type="text" placeholder="--请选择--" class="changeType" style="width: 350px;" onclick="xianshi()" id="showNode" value="<?php echo $record['category']; ?>">

                    </span>

									<input type="text" placeholder="分类节点id" id="nodeId" name="itemType" value="<?php echo $record['node_id']; ?>">

									<!--<input type="button" value="历史选择">-->

									<p id="categoryDetail">
										<?php if(isset($record['category_detail'])): ?>
										<?php echo $record['category_detail']; endif; ?>
									</p>
									<input type="text" id="searchCategory" placeholder="输入分类搜索" >
									<a class="btn btn-info" id="submitSearch">搜索</a>
									<select  id="searchResult" style="display: none"></select>
								</div>

							</div>

							<div class="item">

								<div>

									<h4>

										分类模板

									</h4>

								</div>

								<div class="pro_inf">

                    <span>

                        <div class="el-select">

                            <!---->

                            <div class="el-input el-input--suffix">

                                <!---->



								<select name="templateType"  class="col-sm-3 selector" id="templateType">
									<option value="Home/BedAndBath" <?php if($record['template'] == 'Home/BedAndBath'): ?>selected="selected"<?php endif; ?>>家--床和浴室</option>
									<option value="Home/FurnitureAndDecor" <?php if($record['template'] == 'Home/FurnitureAndDecor'): ?>selected="selected"<?php endif; ?>>家--家具和装饰</option>
									<option value="Home/Kitchen" <?php if($record['template'] == 'Home/Kitchen'): ?>selected="selected"<?php endif; ?>>家--厨房</option>
									<option value="Home/OutdoorLiving" <?php if($record['template'] == 'Home/OutdoorLiving'): ?>selected="selected"<?php endif; ?>>家--户外生活</option>
									<option value="Home/SeedsAndPlants" <?php if($record['template'] == 'Home/SeedsAndPlants'): ?>selected="selected"<?php endif; ?>>家--种子和植物</option>
									<option value="Home/Art" <?php if($record['template'] == 'Home/Art'): ?>selected="selected"<?php endif; ?>>家--艺术</option>
									<option value="Home/Fabric" <?php if($record['template'] == 'Home/Fabric'): ?>selected="selected"<?php endif; ?>>家--布</option>
									<option value="Home/VacuumCleaner" <?php if($record['template'] == 'Home/VacuumCleaner'): ?>selected="selected"<?php endif; ?>>家--吸尘器</option>
									<option value="Home/Mattress" <?php if($record['template'] == 'Home/Mattress'): ?>selected="selected"<?php endif; ?>>家--床垫</option>
									<option value="Home/Headboard" <?php if($record['template'] == 'Home/Headboard'): ?>selected="selected"<?php endif; ?>>家--床头板</option>
									<option value="Home/Dresser" <?php if($record['template'] == 'Home/Dresser'): ?>selected="selected"<?php endif; ?>>家--梳妆台</option>
									<option value="Home/Cabinet" <?php if($record['template'] == 'Home/Cabinet'): ?>selected="selected"<?php endif; ?>>家--内阁</option>
									<option value="Home/Chair" <?php if($record['template'] == 'Home/Chair'): ?>selected="selected"<?php endif; ?>>家--椅子</option>
									<option value="Home/Table" <?php if($record['template'] == 'Home/Table'): ?>selected="selected"<?php endif; ?>>家--桌子</option>
									<option value="Home/Bench" <?php if($record['template'] == 'Home/Bench'): ?>selected="selected"<?php endif; ?>>家--板凳</option>
									<option value="Home/Sofa" <?php if($record['template'] == 'Home/Sofa'): ?>selected="selected"<?php endif; ?>>家--沙发</option>
									<option value="Home/Desk" <?php if($record['template'] == 'Home/Desk'): ?>selected="selected"<?php endif; ?>>家--书桌</option>
									<option value="Home/FloorCover" <?php if($record['template'] == 'Home/FloorCover'): ?>selected="selected"<?php endif; ?>>家--地板盖</option>
									<option value="Home/Bakeware" <?php if($record['template'] == 'Home/Bakeware'): ?>selected="selected"<?php endif; ?>>家--烤盘</option>
									<option value="Home/Cookware" <?php if($record['template'] == 'Home/Cookware'): ?>selected="selected"<?php endif; ?>>家--炊具</option>
									<option value="Home/Cutlery" <?php if($record['template'] == 'Home/Cutlery'): ?>selected="selected"<?php endif; ?>>家--刀具</option>
									<option value="Home/Dinnerware" <?php if($record['template'] == 'Home/Dinnerware'): ?>selected="selected"<?php endif; ?>>家--餐具</option>
									<option value="Home/Serveware" <?php if($record['template'] == 'Home/Serveware'): ?>selected="selected"<?php endif; ?>>家--Serveware</option>
									<option value="Home/KitchenTools" <?php if($record['template'] == 'Home/KitchenTools'): ?>selected="selected"<?php endif; ?>>家--厨房用具</option>
									<option value="Home/SmallHomeAppliances" <?php if($record['template'] == 'Home/SmallHomeAppliances'): ?>selected="selected"<?php endif; ?>>家--小型家电</option>
									<option value="Health/HealthMisc" <?php if($record['template'] == 'Health/HealthMisc'): ?>selected="selected"<?php endif; ?>>健康--健康杂项</option>
									<option value="Health/PersonalCareAppliances" <?php if($record['template'] == 'Health/PersonalCareAppliances'): ?>selected="selected"<?php endif; ?>>健康--个人护理用具</option>
									<option value="Health/MedicalSupplies" <?php if($record['template'] == 'Health/MedicalSupplies'): ?>selected="selected"<?php endif; ?>>健康--医疗用品</option>

								</select>



								<!---->

                                <span class="el-input__suffix">

                                    <span class="el-input__suffix-inner">

                                        <i class="el-select__caret el-input__icon el-icon-arrow-up">

                                        </i>



                                    </span>

									<!---->

                                </span>



                            </div>

                            <div class="el-select-dropdown el-popper" style="display: none; min-width: 260px;">

                                <div class="el-scrollbar" style="display: none;">

                                    <div class="el-select-dropdown__wrap el-scrollbar__wrap" style="margin-bottom: -17px; margin-right: -17px;">

                                        <ul class="el-scrollbar__view el-select-dropdown__list">

                                        </ul>

                                    </div>

                                    <div class="el-scrollbar__bar is-horizontal">

                                        <div class="el-scrollbar__thumb" style="transform: translateX(0%);">

                                        </div>

                                    </div>

                                    <div class="el-scrollbar__bar is-vertical">

                                        <div class="el-scrollbar__thumb" style="transform: translateY(0%);">

                                        </div>

                                    </div>

                                </div>

                                <p class="el-select-dropdown__empty">

                                    无数据

                                </p>

                            </div>

                        </div>

                    </span>

								</div>

							</div>

							<!---->

						</div>

						<div id="fenleiTankuang">

							<div class="con" id="fenleiContent">

							</div>

						</div>

						<div id="timeUp" style="display: none;">

							<h3>

								定时上传

							</h3>

							<span>

                <label for="">

                    国家

                </label>

                <span>

                </span>

            </span>

							<br>

							<span>

                <label for="">

                    选择时间

                </label>

                <div class="el-date-editor el-input el-input--prefix el-input--suffix el-date-editor--datetime">

                    <!---->

                    <input type="text" autocomplete="off" name="" placeholder="选择日期时间" class="el-input__inner">

                    <span class="el-input__prefix">

                        <i class="el-input__icon el-icon-time">

                        </i>

						<!---->

                    </span>

                    <span class="el-input__suffix">

                        <span class="el-input__suffix-inner">

                            <i class="el-input__icon">

                            </i>

							<!---->

							<!---->

							<!---->

							<!---->

                        </span>

						<!---->

                    </span>

					<!---->

					<!---->

                </div>

            </span>

							<span style="color: rgb(0, 163, 232); cursor: pointer;">

                <i class="layui-icon layui-icon-fonts-code">

                </i>

                转换

            </span>

							<p>

							</p>

						</div>

					</form>

					<div id="lishi" style="display: none;">

						<h3>

							历史选择

						</h3>

						<div class="some-content-related-div" style="width: 100%; margin: 0px auto;">

							<div class="inner-content-div2">

								<ul>

								</ul>

							</div>

						</div>

					</div>

				</div>



			</div>

		</div>


		<script>
			//搜索分类
			$('#submitSearch').click(function(){
				var store = $('#test111').val()
				if(store==""){
					alert("请先选择店铺")
					return false;
				}
				var search = $('#searchCategory').val()
				$("#searchResult").html('')
				$.ajax({
					url:'<?php echo url('admin/Product/searchCategory'); ?>',
					data:{search:search,store:store},
					type:'post',
					dataType: 'json',
					success:function(result){
						console.log(result)
						if(result.msg == 'success'){
							$('#searchResult').show()
							$.each(result.data, function(i, item) {
								$("#searchResult").append("<option  data-nodeid='" + item.cid + "'  data-id='"  + item.nodeId + "' data-categoryname='" + item.categoryName + "' class='searchList'>" + item.displayName + "/"+item.categoryName+"</option>");
							});
						}else{
							alert('未查到相关数据')
						}

					}
				},'json');
				// }
			})
			//搜索结果选中
			$('#searchResult').click(function(){
				var nodeId = $('#searchResult').find("option:selected").attr("data-id")
				var showNode = $('#searchResult').find("option:selected").val()
				var categoryName = $('#searchResult').find("option:selected").attr("data-categoryname")
				$('#nodeId').val(nodeId)
				$('#showNode').val(showNode)
				$("#categoryName").val(categoryName)
				$('#categoryDetail').html('')
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
