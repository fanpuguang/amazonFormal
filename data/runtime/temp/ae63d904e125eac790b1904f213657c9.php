<?php if (!defined('THINK_PATH')) exit(); /*a:7:{s:81:"/www/wwwroot/www.ldkjmy.com/aaaa/yamaxun/app/admin/view/product/product_list.html";i:1578900915;s:72:"/www/wwwroot/www.ldkjmy.com/aaaa/yamaxun/app/admin/view/public/base.html";i:1578553890;s:74:"/www/wwwroot/www.ldkjmy.com/aaaa/yamaxun/app/admin/view/public/header.html";i:1586171204;s:76:"/www/wwwroot/www.ldkjmy.com/aaaa/yamaxun/app/admin/view/public/left_nav.html";i:1578553891;s:76:"/www/wwwroot/www.ldkjmy.com/aaaa/yamaxun/app/admin/view/public/head_nav.html";i:1578553891;s:86:"/www/wwwroot/www.ldkjmy.com/aaaa/yamaxun/app/admin/view/product/ajax_product_list.html";i:1578904659;s:74:"/www/wwwroot/www.ldkjmy.com/aaaa/yamaxun/app/admin/view/public/footer.html";i:1578970335;}*/ ?>
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
	.form-group>label[class*=col-] {
		margin-bottom: 4px;
		text-align: right;
	}
</style>
	<div class="page-content">
		<div class="col-xs-4 col-sm-2 margintop5">
			<a href="<?php echo url('admin/Product/product_add'); ?>">
				<button class="btn btn-sm btn-danger">
					<i class="ace-icon fa fa-bolt bigger-110"></i>
					添加原创产品
				</button>
			</a>
		</div>
		<br/>
		<link rel="stylesheet" type="text/css" media="all" href="__PUBLIC__/sldate/daterangepicker-bs3.css" />
		<form name="admin_list_sea" class="form-search form-horizontal" id="list-filter" method="post" action="<?php echo url('admin/Product/product_list'); ?>">
			<div class="row maintop">
				<div class="col-xs-12 col-sm-12 maintop">
					<small class="sl-left10">产品编号：</small>
					<small><input name="nid" id="nid" class="rule" placeholder=" ID" required=""></small>
					<small class="sl-left10">SKU：</small>
					<small><input name="sku" id="sku" class="rule" placeholder=" SKU" required=""></small>
					<small class="sl-left10">简称：</small>
					<small><input name="goodsTitle" id="goodsTitle" class="rule" placeholder="简称" required=""></small>
					<select name="class1" class="ajax_change" onchange="showclass2()" id="class1">
						<option value="">分类</option>
						<?php if(is_array($list_fenlei) || $list_fenlei instanceof \think\Collection || $list_fenlei instanceof \think\Paginator): if( count($list_fenlei)==0 ) : echo "" ;else: foreach($list_fenlei as $key=>$vo): if($vo['parentId'] == 0): ?>
							<option value="<?php echo $vo['categoryId']; ?>"><?php echo $vo['categoryName']; ?></option>
							<?php endif; endforeach; endif; else: echo "" ;endif; ?>
					</select>
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
					<select name="class2" onchange="showclass3()" id="class2" style="display:none;" class="ajax_change"></select>
					<select name="class3"  id="class3" style="display:none;" class="ajax_change"></select>
					<select name="goodsStaus" class="ajax_change">
						<option value="" selected="selected">状态</option>
						<option value="1" >已审</option>
						<option value="0" >未审</option>
					</select>




						<input type="text"  name="reservation" id="reservation" class="sl-date" value="" placeholder="点击选择日期范围"/>



				</div>




				<div class="col-xs-8 col-sm-4 btn-sespan" style="z-index:0">
					<div class="input-group">
									<span class="input-group-addon">
										<i class="ace-icon fa fa-check"></i>
									</span>
						<input type="text" name="key" id="key" class="form-control search-query admin_sea" value="" placeholder="输入需查询的关键字" />
						<span class="input-group-btn">
										<button type="submit" class="btn btn-xs btm-input btn-purple ajax-search-form">
											<span class="ace-icon fa fa-search icon-on-right bigger-110"></span>
											查询
										</button>
									</span>
					</div>
				</div>

				<div class="input-group-btn">
					<a href="<?php echo url('admin/Product/product_list'); ?>">
						<button type="button" class="btn btn-xs all-btn btn-purple ajax-display-all333">
							<span class="ace-icon fa fa-globe icon-on-right bigger-110"></span>
							刷新
						</button>
					</a>
						<button type="button" class="btn btn-xs all-btn btn-purple ajax-display-all333" style="margin-left: 10px;" id="batch_edit"  style="z-index:0">
							<span class="ace-icon fa fa-globe icon-on-right bigger-110"></span>
							批量修改
						</button>
				</div>
				<div class="input-group-btn">

				</div>

			</div>
		</form>



		<div class="row">
			<div class="col-xs-12">
				<div>
					<form id="alldel" name="alldel" method="post" action="<?php echo url('admin/Product/product_alldel'); ?>" >
						<input name="p" id="p" value="<?php echo input('p',1); ?>" type="hidden" />
						<div class="table-responsive">
							<table class="table table-striped table-bordered table-hover" id="dynamic-table">
								<!--<thead>
								<tr>
									<th class="hidden-xs center">
										<label class="pos-rel">
											<input type="checkbox" class="ace"  id='chkAll' onclick='CheckAll(this.form)' value="全选"/>
											<span class="lbl"></span>															</label>											</th>
									
									
									<th class="hidden-xs">ID</th>
									<th>产品图片</th>
									<th>产品价格</th>
									<th class="hidden-sm hidden-xs">简称</th>
									<th>产品本地类目</th>
									<th class="hidden-sm hidden-xs">SKU</th>

									<th class="hidden-xs">状态</th>
									<th class="hidden-xs">用户</th>
									<th class="hidden-xs">添加时间</th>

									<th style="border-right:#CCC solid 1px;">操作</th>
								</tr>
								</thead>-->

								<tbody id="ajax-data">
									<?php if(is_array($product) || $product instanceof \think\Collection || $product instanceof \think\Paginator): if( count($product)==0 ) : echo "" ;else: foreach($product as $key=>$v): ?>
<div class="col-xs-6 col-sm-4 col-md-3" style="width: 16%;">
	<div class="thumbnail search-thumbnail">
		<span class="search-promotion label label-success arrowed-in arrowed-in-right"></span>
		<div style="height:300px;">
		<a href="<?php echo url('admin/Product/product_edit',array('goodsId'=>$v['goodsId'])); ?>" ><img class="media-object" data-src="holder.js/100px200?theme=gray"  style=" width: 100%; display: block;" src="<?php foreach (explode(',',$v['goodsImages']) as $k1=>$v1){
				if($k1 == 0){
					if($v1 == ''){
					echo '/timg.jpg';
					}else{
					echo $v1;
					}
				}
			} ?>" data-holder-rendered="true"/></a>
			
		</div>
		<div class="caption"  style="height:200px;">
			<div class="clearfix">
				<!--	<span class="pull-right label label-grey info-label"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;"><?php echo $v['goodsSku']; ?></font></font></span>-->

				<div class="pull-left bigger-110">
					<label class="pos-rel">
						<input name='goodsId[]' id="navid" class="ace"  type='checkbox' value='<?php echo $v['goodsId']; ?>'>
						<span class="lbl"></span>
					</label>产品编号：<?php echo $v['goodsId']; ?>
				</div>
			</div>
			SKU:<font style="vertical-align: inherit;"><font style="vertical-align: inherit;"><?php echo $v['goodsSku']; ?></font></font>
			<h3 class="search-title">
				<a href="#" class="blue"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">￥<?php echo $v['goodsBuyingPrice']; ?></font></font></a>

			</h3>
			<p style="text-overflow :ellipsis;"><font style="vertical-align: inherit;text-overflow :ellipsis;"><font style="vertical-align: inherit;text-overflow :ellipsis;"></font >标题：<?php echo mb_substr($v['TITLE'],0,50,'utf-8'); ?>...</font></p>
			<a href="#" class="blue"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">添加时间：<?php echo date("Y-m-d H:i:s",$v['add_time']); ?></font></font></a>
		</div>
	</div>
</div>
<?php endforeach; endif; else: echo "" ;endif; ?>
<style>
	.col-md-3 {
		width: 20%;

	}

</style>
<div style="clear: both;"></div>
<?php echo $page; ?>



								</tbody>
							</table>
						</div>
					</form>
				</div>
			</div>
		</div>
	</div><!-- /.page-content -->
<!--变体模块结尾-->
<div id="batch_content" class="layui-layer layui-layer-page openClass layer-anim"  type="page" times="9" showtime="0" contype="object" style="margin-top:100px;z-index: 1; width: 1000px; height: 600px; top: 23.5px; left: 450px;display: none">
	<span class="layui-layer-setwin close" style="position: fixed">
		<a class="layui-layer-ico layui-layer-close layui-layer-close2 selectCancle" href="javascript:;"></a>
	</span>
	<form action="<?php echo url('admin/Product/product_batch_edit'); ?>" method="post" class="form-horizontal ajaxForm2">
		<input type="hidden" id="batch_id">
	<div class="form-group" style="height:30px;clear: both;">
		<label class="col-sm-2 control-label no-padding-right" for="form-field-1"> 厂商名称： </label>
		<div class="col-sm-10">
			<input type="hidden" name="ids" id="ids">
			<input type="text" name="goodsTradeNames" id="goodsTradeNames" placeholder="厂商名称" class="col-xs-10 col-sm-4" style="margin-left:10px;" >
			<span class="help-inline col-xs-12 col-sm-7">
                                                <span class="middle" id="resone"></span>
                                            </span>
		</div>
	</div>
	<div class="form-group" style="height:30px;clear: both;">
		<label class="col-sm-2 control-label no-padding-right" for="form-field-1"> 品牌名称： </label>
		<div class="col-sm-10">

			<input type="text" name="goodsBrandName" id="goodsBrandName" placeholder="品牌名称" class="col-xs-10 col-sm-4" style="margin-left:10px;">
			<span class="help-inline col-xs-12 col-sm-7">
                                                <span class="middle" id="resone"></span>
                                            </span>
		</div>
	</div>
	<div class="form-group" style="height:30px;clear: both;">
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
	<div style="clear: both"></div>
	<ul class="nav nav-tabs" id="myTab" style="width: 76%;margin: 20px auto;">
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
		display: none;
	}

	.active {
		display: block;
	}
</style>
<script type="text/javascript">
	//首字母大写
	function titleCase(str) {
		var temp = [];
		str = $('#title_zh').val();

		str = str.toLowerCase();//全部转换为小写
		temp = str.split(" ");//分割存入数组
		for (var i = 0; i < temp.length; i++) {
			var str_temp = temp[i].charAt(0);//获取首字母
			str_temp = str_temp.toUpperCase();//转换为大写
			temp[i] = temp[i].replace(temp[i].charAt(0), str_temp);//将首字母变换
		}
		str = temp.join(" ");
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

		// var el = document.getElementById('title_zh');
		// el.addEventListener('input', function () {
		// 	var len = txtCount(this); //   调用函数
		// 	document.getElementById('textCount').innerHTML = len;
		// });

		var el = document.getElementById('keyword_zh');
		el.addEventListener('input', function () {
			var len = txtCount(this); //   调用函数
			document.getElementById('textCount_gjc').innerHTML = len;
		});


	}

</script>
<div id="zh" class="tab-pane fade in active">
	<!--<button class="btn btn-info" type="button" style="margin-left:200px;margin-bottom: 20px;" onclick="titleCase('title_zh')">

        首字母大写
    </button>-->
	<!---中文内容-->
	<div id="loading"></div>
	<style>
		#loading {
			text-align: center;
			position: absolute;
			left: 50%;
			top: 50%;
			transform: translate(-50%, -50%);
		}
	</style>
	<div class="space-4"></div>
	<div class="form-group">
		<label class="col-sm-2 control-label no-padding-right" for="form-field-1"> </label>
		<div class="col-sm-10"> 关键字：(<span id="textCount_gjc">0</span>/<span
				style="color:red;">250</span>)
		</div>
	</div>
	<div class="form-group">
		<label class="col-sm-2 control-label no-padding-right" for="form-field-1">
			<button class="btn btn-info" type="button" style="margin-left:20px;margin-bottom: 20px;"
					onclick="fanyi('zhkey')">一键翻译
			</button>
		</label>
		<div class="col-sm-10">

                            <textarea name="keyword_zh" cols="20" rows="2" class="col-xs-10 col-sm-8 limitedone"
									  id="keyword_zh"  style="margin: 0px; height: 200px; width: 800px;"
									  placeholder="关键字"></textarea>
		</div>
	</div>
</div>

<!---英文内容-->
<div id="en" class="tab-pane fade">
	<div class="space-4"></div>
	<div class="form-group">
		<label class="col-sm-2 control-label no-padding-right" for="form-field-1"> </label>
		<div class="col-sm-10"> 关键字：(<span id="textCount_gjc_en">0</span>/<span
				style="color:red;">250</span>)
		</div>
	</div>
	<div class="form-group">
		<label class="col-sm-2 control-label no-padding-right" for="form-field-1">
			<button class="btn btn-info" type="button" style="margin-left:20px;margin-bottom: 20px;"
					onclick="fanyi('enkey')">一键翻译
			</button>
		</label>
		<div class="col-sm-10">

                            <textarea name="keyword_en" cols="20" rows="2" class="col-xs-10 col-sm-8 limitedone"
									  id="keyword_en"  style="margin: 0px; height: 200px; width: 800px;"
									  placeholder="关键字"></textarea>
		</div>
	</div>

</div>


<div id="fr" class="tab-pane fade">

	<div class="form-group">
		<label class="col-sm-2 control-label no-padding-right" for="form-field-1"> </label>
		<div class="col-sm-10"> 关键字：(<span id="textCount_gjc_fra">0</span>/<span
				style="color:red;">250</span>)
		</div>
	</div>
	<div class="form-group">
		<label class="col-sm-2 control-label no-padding-right" for="form-field-1"> </label>
		<div class="col-sm-10">

                            <textarea name="keyword_fra" cols="20" rows="2" class="col-xs-10 col-sm-8 limitedone"
									  id="keyword_fra"  style="margin: 0px; height: 200px; width: 800px;"
									  placeholder="关键字"></textarea>
		</div>
	</div>

</div>


<div id="dy" class="tab-pane fade">

	<div class="space-4"></div>
	<div class="form-group">
		<label class="col-sm-2 control-label no-padding-right" for="form-field-1"> </label>
		<div class="col-sm-10"> 关键字：(<span id="textCount_gjc_de">0</span>/<span
				style="color:red;">250</span>)
		</div>
	</div>
	<div class="form-group">
		<label class="col-sm-2 control-label no-padding-right" for="form-field-1"> </label>
		<div class="col-sm-10">

                            <textarea name="keyword_de" cols="20" rows="2" class="col-xs-10 col-sm-8 limitedone"
									  id="keyword_de"  style="margin: 0px; height: 200px; width: 800px;"
									  placeholder="关键字"></textarea>
		</div>
	</div>

</div>

<div id="ydl" class="tab-pane fade">

	<div class="space-4"></div>
	<div class="form-group">
		<label class="col-sm-2 control-label no-padding-right" for="form-field-1"> </label>
		<div class="col-sm-10"> 关键字：(<span id="textCount_gjc_it">0</span>/<span
				style="color:red;">250</span>)
		</div>
	</div>
	<div class="form-group">
		<label class="col-sm-2 control-label no-padding-right" for="form-field-1"> </label>
		<div class="col-sm-10">

                            <textarea name="keyword_it" cols="20" rows="2" class="col-xs-10 col-sm-8 limitedone"
									  id="keyword_it"  style="margin: 0px; height: 200px; width: 800px;"
									  placeholder="关键字"></textarea>
		</div>
	</div>

</div>


<div id="xby" class="tab-pane fade">

	<div class="space-4"></div>
	<div class="form-group">
		<label class="col-sm-2 control-label no-padding-right" for="form-field-1"> </label>
		<div class="col-sm-10"> 关键字：(<span id="textCount_gjc_es">0</span>/<span
				style="color:red;">250</span>)
		</div>
	</div>
	<div class="form-group">
		<label class="col-sm-2 control-label no-padding-right" for="form-field-1"> </label>
		<div class="col-sm-10">

                            <textarea name="keyword_es" cols="20" rows="2" class="col-xs-10 col-sm-8 limitedone"
									  id="keyword_es"  style="margin: 0px; height: 200px; width: 800px;"
									  placeholder="关键字"></textarea>
		</div>
	</div>

</div>


<div id="ry" class="tab-pane fade">

	<div class="space-4"></div>
	<div class="form-group">
		<label class="col-sm-2 control-label no-padding-right" for="form-field-1"> </label>
		<div class="col-sm-10"> 关键字：(<span id="textCount_gjc_jp">0</span>/<span
				style="color:red;">250</span>)
		</div>
	</div>
	<div class="form-group">
		<label class="col-sm-2 control-label no-padding-right" for="form-field-1"> </label>
		<div class="col-sm-10">

                            <textarea name="keyword_jp" cols="20" rows="2" class="col-xs-10 col-sm-8 limitedone"
									  id="keyword_jp"  style="margin: 0px; height: 200px; width: 800px;"
									  placeholder="关键字"></textarea>
		</div>
	</div>

</div>


<div class="clearfix form-actions">
	<div class="col-md-offset-3 col-md-9">
		<!--<input class="ace ace-checkbox-2" name="continue" type="checkbox" value="1">
        <span class="lbl"> 发布后继续</span>-->
		<button class="btn btn-info" type="submit">
			<i class="ace-icon fa fa-check bigger-110"></i>
			保存
		</button>

	</div>
</div>
	</form>
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

	<script type="text/javascript" src="__PUBLIC__/sldate/moment.js"></script>
	<script type="text/javascript" src="__PUBLIC__/sldate/daterangepicker.js"></script>
    <script type="text/javascript">
        $('#reservation').daterangepicker(null, function (start, end, label) {
            console.log(start.toISOString(), end.toISOString(), label);
        });
    </script>
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
			$.post("<?php echo url('admin/Product/batch_edit_ean'); ?>",{ids:ids},function(data){
				alert('已修改')
			});
		})
		//修正sku
		$('#reloadSku').click(function(){
			var ids = getIds()
			var correctSku = $('#correctSku').val()
			$.post("<?php echo url('admin/Product/batch_edit_sku'); ?>",{ids:ids,correctSku:correctSku},function(data){
				alert('已修改')
			});
		})
		//获取id
		function getIds(){
			var ids = "";
			$("input[name='goodsId[]']:checked").each(function (index, item) {
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
<script>
	function fanyi(obj) {

		if (obj == 'zhtitle') {
			var title = $("#title_zh").val();
			if(title == ''){
				layer.msg('请输入要翻译的内容');
				return false;
			}
			var yuzhong = 'zh';
			var zhi = 1;
			var language = 'zh-CN';
		}
		if (obj == 'entitle') {
			var title = $("#title_en").val();
			if(title == ''){
				layer.msg('请输入要翻译的内容');
				return false;
			}
			var yuzhong = 'en';
			var zhi = 1;
			var language = 'en';
		}
		if (obj == 'zhkey') {
			var keyword = $("#keyword_zh").val();
			if(keyword == ''){
				layer.msg('请输入要翻译的内容');
				return false;
			}
			var yuzhong = 'zh';
			var zhi = 2;
			var language = 'zh-CN';
		}
		if (obj == 'enkey') {
			var keyword = $("#keyword_en").val();
			if(keyword == ''){
				layer.msg('请输入要翻译的内容');
				return false;
			}
			var yuzhong = 'en';
			var zhi = 2;
			var language = 'en';
		}
		if (obj == 'zhpot') {
			var keypotins = $("#keypotins_zh").val();
			if(keypotins == ''){
				layer.msg('请输入要翻译的内容');
				return false;
			}
			var yuzhong = 'zh';
			var zhi = 3;
			var language = 'zh-CN';
		}
		if (obj == 'enpot') {
			var keypotins = $("#keypotins_en").val();
			if(keypotins == ''){
				layer.msg('请输入要翻译的内容');
				return false;
			}
			var yuzhong = 'en';
			var zhi = 3;
			var language = 'en';
		}
		if (obj == 'zhdes') {
			var description = $("#description_zh").val();
			if(description == ''){
				layer.msg('请输入要翻译的内容');
				return false;
			}
			var yuzhong = 'zh';
			var zhi = 4;
			var language = 'zh-CN';
		}
		if (obj == 'endes') {
			var description = $("#description_en").val();
			if(description == ''){
				layer.msg('请输入要翻译的内容');
				return false;
			}
			var yuzhong = 'en';
			var zhi = 4;
			var language = 'en';
		}
		var index1 = layer.load(1, {
			shade: [0.1,'#fff'] //0.1透明度的白色背景
		});
		$.ajax({
			url: "<?php echo url('admin/Product/product_translationguge'); ?>",
			type: 'post',
			data: {
				title: title,
				keyword: keyword,
				keypotins: keypotins,
				description: description,
				language: language,
				yuzhong: yuzhong,
				zhi: zhi
			},
			dataType: 'json',
			beforeSend: function (XMLHttpRequest) {

			},
			success: function (result) {

				if (result) {
					layer.close(index1);
					layer.msg('翻译成功');
					if (result.lx == 1) {


						$("#title_en").html(result.en);
						$("#textCount_en").html(result.en.length);

						$("#title_fra").html(result.fr);
						$("#textCount_fra").html(result.fr.length);

						$("#title_de").html(result.de);
						$("#textCount_de").html(result.de.length);

						$("#title_it").html(result.it);
						$("#textCount_it").html(result.it.length);

						$("#title_es").html(result.es);
						$("#textCount_es").html(result.es.length);

						$("#title_jp").html(result.ja);
						$("#textCount_jp").html(result.ja.length);
					}
					if (result.lx == 2) {


						$("#keyword_en").html(result.en);
						$("#textCount_gjc_en").html(result.en.length);

						$("#keyword_fra").html(result.fr);
						$("#textCount_gjc_fra").html(result.fr.length);

						$("#keyword_de").html(result.de);
						$("#textCount_gjc_de").html(result.de.length);

						$("#keyword_it").html(result.it);
						$("#textCount_gjc_it").html(result.it.length);

						$("#keyword_es").html(result.es);
						$("#textCount_gjc_es").html(result.es.length);

						$("#keyword_jp").html(result.ja);
						$("#textCount_gjc_jp").html(result.ja.length);
					}
					if (result.lx == 3) {
						$("#keypotins_en").html(result.en);
						$("#keypotins_fra").html(result.fr);
						$("#keypotins_de").html(result.de);
						$("#keypotins_it").html(result.it);
						$("#keypotins_es").html(result.es);
						$("#keypotins_jp").html(result.ja);
					}
					if (result.lx == 4) {
						$("#description_en").html(result.en);
						$("#description_fra").html(result.fr);
						$("#description_de").html(result.de);
						$("#description_it").html(result.it);
						$("#description_es").html(result.es);
						$("#description_jp").html(result.ja);
					}



				}

			}

		},"josn")
	}

</script>

<!-- 与此页相关的js -->
</body>
</html>
