<?php if (!defined('THINK_PATH')) exit(); /*a:6:{s:78:"/www/wwwroot/www.ldkjmy.com/aaaa/yamaxun/app/admin/view/order/orderdetail.html";i:1578553887;s:72:"/www/wwwroot/www.ldkjmy.com/aaaa/yamaxun/app/admin/view/public/base.html";i:1578553890;s:74:"/www/wwwroot/www.ldkjmy.com/aaaa/yamaxun/app/admin/view/public/header.html";i:1578553891;s:76:"/www/wwwroot/www.ldkjmy.com/aaaa/yamaxun/app/admin/view/public/left_nav.html";i:1578553891;s:76:"/www/wwwroot/www.ldkjmy.com/aaaa/yamaxun/app/admin/view/public/head_nav.html";i:1578553891;s:74:"/www/wwwroot/www.ldkjmy.com/aaaa/yamaxun/app/admin/view/public/footer.html";i:1578970335;}*/ ?>
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
			
	<style type="text/css">
		 label {
		    font-weight: bold;
		}
		.details>span{
			margin-right: 10px;
		}
		.jijian_content>span{
		    display: inline-block;
		    margin-bottom: 6px;
		    width: 310px;
		}
		.jijian_content>label {
    display: inline-block;
    /* width: 108px; */
    line-height: 28px;
    color: #444;
    padding-left: 5px;
}
	</style>
	<form>
	<p>
		<span class="layui-breadcrumb1" style="visibility: visible;">
			<a>
				<cite>
					订单详情
				</cite>
			</a>
		</span>
	</p>
	<div class="form_item one">
		<div class="item">
			<div>
				<h4>
					基本信息
				</h4>
			</div>
			<div class="details">
				<span>
					<label for="">
						订单ID：
					</label>
					<span>
						<?php echo $detail['OrderId']; ?>
					</span>
				</span>
				<span>
					<label for="">
						店铺：
					</label>
					<span>
						崔建勤(<?php echo $detail['MarketplaceId']; ?>)
					</span>
				</span>
				<br>
				<span>
					<label for="">
						总数量：
					</label>
					<span>
						<?php echo $detail['GoodsNumber']; ?>
					</span>
				</span>
				<span>
					<label for="">
						总采购价（￥）：
					</label>
					<span>
						34.34
					</span>
				</span>
				<span>
					<label for="">
						订单状态：
					</label>
					<span>
						<?php echo $detail['OrderStatus']; ?>
					</span>
				</span>
				<span>
					<label for="">
						亚马逊单号：
					</label>
					<span>
						<?php echo $detail['AmazonOrderId']; ?>
					</span>
				</span>
				<span>
					<label for="">
						购买日期：
					</label>
					<span>
						<?php echo $detail['PurchaseDate']; ?>
					</span>
				</span>
				<!---->
				<!---->
			</div>
		</div>
	</div>
	<div class="form_item one">
		<div class="item">
			<div>
				<img src="<?php echo $detail['smallImage']; ?>"
				alt="" width="100%">
			</div>
			<div>
				<h4 style="margin-bottom: 20px;color: #444;font-weight: bold;font-size: 16px;">


					<?php if($detail['MarketplaceId'] == "A1F83G8C2ARO7P"): ?>
					<a href="https://www.amazon.co.uk//gp/product/<?php echo $detail['ASIN']; ?>" target="_blank">
						<?php echo $detail['GoodsTitle']; ?>
					</a>
					<?php elseif($detail['MarketplaceId'] == "A13V1IB3VIYZZH"): ?>
					<a href="https://www.amazon.fr//gp/product/<?php echo $detail['ASIN']; ?>" target="_blank">
						<?php echo $detail['GoodsTitle']; ?>
					</a>
					<?php elseif($detail['MarketplaceId'] == "A1PA6795UKMFR9"): ?>
					<a href="https://www.amazon.de//gp/product/<?php echo $detail['ASIN']; ?>" target="_blank">
						<?php echo $detail['GoodsTitle']; ?>
					</a>
					<?php elseif($detail['MarketplaceId'] == "A1RKKUPIHCS9HS"): ?>
					<a href="https://www.amazon.es//gp/product/<?php echo $detail['ASIN']; ?>" target="_blank">
						<?php echo $detail['GoodsTitle']; ?>
					</a>
					<?php elseif($detail['MarketplaceId'] == "APJ6JRA9NG5V4"): ?>
					<a href="https://www.amazon.it//gp/product/<?php echo $detail['ASIN']; ?>" target="_blank">
						<?php echo $detail['GoodsTitle']; ?>
					</a>
					<?php elseif($detail['MarketplaceId'] == "ATVPDKIKX0DER"): ?>
					<a href="https://www.amazon.com//gp/product/<?php echo $detail['ASIN']; ?>" target="_blank">
						<?php echo $detail['GoodsTitle']; ?>
					</a>
					<?php elseif($detail['MarketplaceId'] == "A1AM78C64UM0Y8"): ?>
					<a href="https://www.amazon.mx//gp/product/<?php echo $detail['ASIN']; ?>" target="_blank">
						<?php echo $detail['GoodsTitle']; ?>
					</a>
					<?php elseif($detail['MarketplaceId'] == "A2EUQ1WTGCTBG2"): ?>
					<a href="https://www.amazon.ca//gp/product/<?php echo $detail['ASIN']; ?>" target="_blank">
						<?php echo $detail['GoodsTitle']; ?>
					</a>
					<?php elseif($detail['MarketplaceId'] == "A1VC38T7YXB528"): ?>
					<a href="https://www.amazon.co.jp//gp/product/<?php echo $detail['ASIN']; ?>" target="_blank">
						<?php echo $detail['GoodsTitle']; ?>
					</a>
					<?php endif; ?>



				</h4>
				<!---->
				<span>
					<label for="">
						SKU：
					</label>
					<span lay-href="modules/product/detailsProduct1.html?id=10272845" layadmin-event="message"
					lay-text="产品详情" style="color: rgb(18, 172, 232); cursor: pointer;">
						<?php echo $detail['GoodsSku']; ?>
					</span>
				</span>
				<span>
					<label for="">
						ASIN：
					</label>
					<span>
						<?php echo $detail['ASIN']; ?>
					</span>
				</span>
				<br>
				<span>
					<label for="">
						数量：
					</label>
					<span>
						<?php echo $detail['GoodsNumber']; ?>
					</span>
				</span>
				<span>
					<label for="">
						金额：
					</label>
					<span>
						<?php echo $detail['GoodAmount']; ?>
					</span>
				</span>
			</div>
		</div>
		<div class="item">
			<div>
				<h4>
					国内物流
				</h4>
			</div>
			<div class="pro_inf chengben okEdit">
				<!---->
				<div>
					<span>
						<label for="">
							采购价(￥)：
						</label>
						<input type="text" id="purchase_price" <?php if(isset($DomesticLogistics['shipment_company'])): ?> value="<?php echo $DomesticLogistics['purchase_price']; ?>" <?php endif; ?>>
					</span>
					<span>
						<label for="">
							物流单号(￥)：
						</label>
						<a href="javascript:;" data-ok="true" class="logistics">
							<input data-ok="true" id="shipment_number" type="text" placeholder="物流单号"  <?php if(isset($DomesticLogistics['shipment_number'])): ?> value="<?php echo $DomesticLogistics['shipment_number']; ?>" <?php endif; ?>>
						</a>
					</span>
					<span>
						<label for="">
							物流公司：
						</label>
						<input type="text" id="shipment_company" <?php if(isset($DomesticLogistics['shipment_company'])): ?> value="<?php echo $DomesticLogistics['shipment_company']; ?>" <?php endif; ?>>
					</span>
					<span>
						<label for="">
							发货日期(￥)：
						</label>
						<input type="date" id="shipping_date"  <?php if(isset($DomesticLogistics['shipment_company'])): ?> value="<?php echo $DomesticLogistics['shipping_date']; ?>" placeholder="<?php echo $DomesticLogistics['shipping_date']; ?>" <?php endif; ?>> 
					</span>
					<div class="fr">
						<input type="hidden" id="OrderId" value="<?php echo $detail['OrderId']; ?>">
						<input type="button" value="修改" class="edit" id="editDomestic">
					</div>
				</div>
			</div>
		</div>
	</div>
	<div class="form_item">
		<div class="item">
			<div>
				<h4>
					寄件信息
				</h4>
			</div>
			<div class="pro_inf okEdit jijian">
				<div >
					<span>
						<label for="">
							收件人：
						</label>
						<input type="text" placeholder="建议填写" disabled="disabled" >
					</span>
					<span>
						<label for="">
							TEL：
						</label>
						<input type="text" placeholder="建议填写" disabled="disabled">
					</span>
					<span>
						<label for="">
							收件人国家：
						</label>
						<input type="text" placeholder="建议填写" disabled="disabled" value="<?php echo $detail['CountryCode']; ?>">
					</span>
					<span>
						<label for="">
							收件人国家(中文)：
						</label>
						<input type="text" placeholder="建议填写" disabled="disabled">
					</span>
					<span>
						<label for="">
							ZIP：
						</label>
						<input type="text" placeholder="建议填写" disabled="disabled">
					</span>
					<span>
						<label for="" style="width: 64px;">
							州：
						</label>
						<input type="text" placeholder="建议填写" disabled="disabled" value="<?php echo $detail['StateOrRegion']; ?>">
					</span>
					<span>
						<label for="" style="width: 47.8px;">
							市：
						</label>
						<input type="text" placeholder="建议填写" disabled="disabled" value="<?php echo $detail['City']; ?>">
					</span>
					<span>
						<label for="">
							街道：
						</label>
						<input type="text" placeholder="建议填写" disabled="disabled">
					</span>
					<br>
					<span>
						<label for="">
							详细地址：
						</label>
						<textarea disabled="disabled" style="width: 409px;height: 68px;vertical-align: text-top;">
							1153 Pitt Street
						</textarea>
					</span>
					<div class="fr">
						<input type="button" value="修改" class="edit">
					</div>
				</div>
			</div>
		</div>
	</div>
	<div class="form_item">
		<div class="item">
			<div>
				<h4>
					国际物流
				</h4>
			</div>
			<div class="pro_inf chengben">
				<p>
					<span style="color: rgb(0, 163, 232); cursor: pointer;">
						<!-- 添加 -->
					</span>
				</p>
				<div style="margin-bottom: 20px;" class="jijian_content">
					<span>
						<label for="" >
							国际物流单号：
						</label>
						<span>
							
							<input type="text" id="international_no" <?php if(isset($international['international_no'])): ?> value="<?php echo $international['international_no']; ?>" <?php endif; ?> >
						</span>
					</span>
					<span>
						<label for="" >
							国际跟踪号：
						</label>
						<span>
							<input type="text" name="" id="tracking_number" <?php if(isset($international['tracking_number'])): ?> value="<?php echo $international['tracking_number']; ?>" <?php endif; ?>>
						</span>
					</span>
					<span>
						<label for="" >
							国际运费：
						</label>
						<span>
							<input type="text" name="" id="freight" <?php if(isset($international['freight'])): ?> value="<?php echo $international['freight']; ?>" <?php endif; ?>>
						</span>
					</span>
					<br>
					<span>
						<label for="">
							线路：
						</label>
						<span>
							<input type="text" name="" id="line" <?php if(isset($international['line'])): ?> value="<?php echo $international['freight']; ?>" <?php endif; ?>>
						</span>
					</span>
					<span>
						<label for="">
							重量：
						</label>
						<span>
							<input type="text" name="" id="weight" <?php if(isset($international['weight'])): ?> value="<?php echo $international['weight']; ?>" <?php endif; ?>>
						</span>
					</span>
					<span>
						<label for="">
							发货时间：
						</label>
						<span>
							<input type="date" name="" id="international_date" <?php if(isset($international['shipping_date'])): ?> value="<?php echo $international['shipping_date']; ?>" <?php endif; ?>>
						</span>
					</span>
					<div class="fr">
						<!-- <span style="width: 110px; text-align: center; display: inline-block;">
							物流状态：未发货
						</span>
						<span style="width: 140px; text-align: center; display: inline-block;">
							2019-12-28 19:34:43
						</span>
						<p style="width: 60px; text-align: center;">
							<span href="javascript:;">
								已同步
							</span>
						</p> -->
						<p style="display: block;">
							<span style="color: rgb(0, 163, 232); cursor: pointer;" id="updateInternation">
								修改
							</span>
							<!---->
							<span style="color: rgb(0, 163, 232); cursor: pointer; margin: 0px 10px;">
								打印
							</span>
							<span style="color: rgb(0, 163, 232); cursor: pointer;">
								明细
							</span>
						</p>
					</div>
				</div>
			</div>
		</div>
	</div>
	<div class="form_item">
		<div class="item">
			<div>
				<h4>
					订单明细
				</h4>
			</div>
			<div class="details">
				<table>
					<tbody>
						<tr>
							<th>
							</th>
							<th>
								订单金额
								<span>
									（汇率 <?php echo $detail['currency']; ?>）
								</span>
							</th>
							<th>
								Amazon佣金
							</th>
							<th>
								到账金额
							</th>
							<th>
								采购价
							</th>
							<th>
								国际运费
							</th>
							<th>
								平台佣金
							</th>
							<th>
								退货费用
							</th>
							<th>
								利润
							</th>
							<th>
								利润率
							</th>
						</tr>
						<tr class="two">
							<th>
								国际币种
							</th>
							<td>
								<?php echo $detail['Amount']; ?>
							</td>
							<td>
								7.02
							</td>
							<td>
								39.75
							</td>
							<td>
								--
							</td>
							<td>
								--
							</td>
							<td>
								--
							</td>
							<td>
								--
							</td>
							<td>
								--
							</td>
							<td>
								--
							</td>
						</tr>
						<tr>
							<th>
								人民币
							</th>
							<td>
								<?php echo $detail['currency'] * $detail['Amount']; ?>
							</td>
							<td>
								37.39
							</td>
							<td>
								211.89
							</td>
							<td>
								34.34
							</td>
							<td>
							</td>
							<td>
							</td>
							<td>
							</td>
							<td>
							</td>
							<td>
							</td>
						</tr>
					</tbody>
				</table>
			</div>
		</div>
	</div>
	<div id="logisticsDiv" class="logisticsDiv" style="display: none;">
		<div>
			<p>
				<span style="color: rgb(102, 102, 102);">
					单号：
					<span>
					</span>
				</span>
			</p>
			<ul>
				<!---->
			</ul>
		</div>
	</div>
	<div id="addorder" class="addorder" style="display: none;">
		<h3>
			国际运单
		</h3>
		<div class="form_item one" style="box-shadow: transparent 0px 0px 0px;">
			<div class="item">
				<div>
					<img src="http://ecx.images-amazon.com/images/I/41FxFZNSSTL._SL500_.jpg"
					alt="">
				</div>
				<div>
					<p class="addDecP" style="font-weight: bold; font-size: 16px;">
						Knee Guards Protection Knee Self-Heating Magnet Kneepad Sports Knee Pads
						Warm Sports Protective Gear Black
					</p>
					<span>
						<label for="">
							SKU：
						</label>
						<span>
							LYTLD-LYTLD-10272845-LYT-1
						</span>
					</span>
					<span>
						<label for="">
							数量：
						</label>
						<span>
							1
						</span>
					</span>
					<br>
					<span>
						<label for="">
							运输数量：
						</label>
						<div class="el-select">
							<!---->
							<div class="el-input el-input--suffix">
								<!---->
								<input type="text" readonly="readonly" autocomplete="off" placeholder="请选择"
								class="el-input__inner">
								<!---->
								<span class="el-input__suffix">
									<span class="el-input__suffix-inner">
										<i class="el-select__caret el-input__icon el-icon-arrow-up">
										</i>
										<!---->
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
							<div class="el-select-dropdown el-popper" style="display: none;">
								<div class="el-scrollbar" style="">
									<div class="el-select-dropdown__wrap el-scrollbar__wrap" style="margin-bottom: -17px; margin-right: -17px;">
										<ul class="el-scrollbar__view el-select-dropdown__list">
											<!---->
											<li class="el-select-dropdown__item">
												<span>
													0
												</span>
											</li>
											<li class="el-select-dropdown__item selected">
												<span>
													1
												</span>
											</li>
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
								<!---->
							</div>
						</div>
					</span>
					<br>
				</div>
			</div>
			<div class="item">
				<div>
					<h4>
						运单信息
					</h4>
				</div>
				<div class="pro_inf">
					<span>
						<label for="">
							中文：
						</label>
						<input type="text" name="chineseName" placeholder="中文">
					</span>
					<span>
						<label for="">
							英文：
						</label>
						<input type="text" name="englishName" placeholder="英文">
					</span>
					<br>
					<span>
						<label for="">
							重量（kg）：
						</label>
						<input type="text" placeholder="重量（kg）">
					</span>
					<span style="width: 370px;">
						<label for="">
							体积（cm）：
						</label>
						<input type="text" placeholder="长（CM）" class="size_input">
						*
						<input type="text" placeholder="宽（CM）" class="size_input">
						*
						<input type="text" placeholder="高（CM）" class="size_input">
					</span>
					<br>
					<span style="width: auto;">
						<label for="">
							物流：
						</label>
						<div class="el-select">
							<!---->
							<div class="el-input el-input--suffix">
								<!---->
								<input type="text" readonly="readonly" autocomplete="off" placeholder="请选择"
								class="el-input__inner">
								<!---->
								<span class="el-input__suffix">
									<span class="el-input__suffix-inner">
										<i class="el-select__caret el-input__icon el-icon-arrow-up">
										</i>
										<!---->
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
							<div class="el-select-dropdown el-popper" style="display: none;">
								<div class="el-scrollbar" style="">
									<div class="el-select-dropdown__wrap el-scrollbar__wrap" style="margin-bottom: -17px; margin-right: -17px;">
										<ul class="el-scrollbar__view el-select-dropdown__list">
											<!---->
											<li class="el-select-dropdown__item">
												<span>
													云途小包
												</span>
											</li>
											<li class="el-select-dropdown__item">
												<span>
													三态大包
												</span>
											</li>
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
								<!---->
							</div>
						</div>
						<div class="el-select">
							<!---->
							<div class="el-input el-input--suffix">
								<!---->
								<input type="text" readonly="readonly" autocomplete="off" placeholder="请选择"
								class="el-input__inner">
								<!---->
								<span class="el-input__suffix">
									<span class="el-input__suffix-inner">
										<i class="el-select__caret el-input__icon el-icon-arrow-up">
										</i>
										<!---->
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
							<div class="el-select-dropdown el-popper" style="display: none;">
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
					<!---->
					<input type="button" value="生成运单号">
					<br>
					<span>
						<label for="">
							运单号：
						</label>
						<input type="text" placeholder="运单号" disabled="disabled">
					</span>
					<span>
						<label for="">
							追踪号：
						</label>
						<input type="text" placeholder="追踪号" disabled="disabled">
					</span>
				</div>
			</div>
		</div>
	</div>
	<div id="detailsorder" class="addorder" style="display: none;">
		<h3>
			国际运单
		</h3>
		<div class="form_item one" style="box-shadow: transparent 0px 0px 0px; margin: 0px;">
			<div class="item">
				<div>
					<h4>
						运单信息
					</h4>
				</div>
				<div class="pro_inf">
					<span>
						<label for="">
							运单状态：
						</label>
						<span style="color: rgb(0, 163, 232);">
						</span>
					</span>
					<br>
					<span>
						<label for="">
							中文：
						</label>
						<input type="text" placeholder="中文" disabled="disabled">
					</span>
					<span>
						<label for="">
							英文：
						</label>
						<input type="text" placeholder="英文" disabled="disabled">
					</span>
					<br>
					<span>
						<label for="">
							重量（kg）：
						</label>
						<input type="text" placeholder="重量（kg）" disabled="disabled">
					</span>
					<span style="width: 370px;">
						<label for="">
							体积（cm）：
						</label>
						<input type="text" placeholder="长（CM）" disabled="disabled" class="size_input">
						*
						<input type="text" placeholder="宽（CM）" disabled="disabled" class="size_input">
						*
						<input type="text" placeholder="高（CM）" disabled="disabled" class="size_input">
					</span>
					<br>
					<span style="width: auto;">
						<label for="">
							物流：
						</label>
						<!---->
						<!---->
						<span>
						</span>
					</span>
					<!---->
					<br>
					<span>
						<label for="">
							运单号：
						</label>
						<input type="text" placeholder="运单号" disabled="disabled">
					</span>
					<span>
						<label for="">
							追踪号：
						</label>
						<input type="text" placeholder="追踪号" disabled="disabled">
					</span>
				</div>
			</div>
		</div>
	</div>
	<div id="addWul" style="display: none;">
		<h3>
			添加国内物流
		</h3>
		<span>
			<label for="">
				采购价
			</label>
			<input type="text" placeholder="采购价" <?php if(isset($DomesticLogistics['purchase_price'])): ?> value="<?php echo $DomesticLogistics['purchase_price']; ?>" <?php endif; ?>>
		</span>
		<br>
		<span>
			<label for="">
				物流单号
			</label>
			<input type="text" placeholder="物流单号" <?php if(isset($DomesticLogistics['shipment_number'])): ?> value="<?php echo $DomesticLogistics['shipment_number']; ?>" <?php endif; ?>>
		</span>
		<br>
		<span>
			<label for="">
				物流公司
			</label>
			<input type="text" placeholder="物流公司" <?php if(isset($DomesticLogistics['shipment_company'])): ?> value="<?php echo $DomesticLogistics['shipment_company']; ?>" <?php endif; ?>>
		</span>
	</div>
</form>
<script type="text/javascript">
	$('#editDomestic').click(function(){
		var purchase_price = $('#purchase_price').val()
		var shipment_company = $('#shipment_company').val()
		var shipment_number = $('#shipment_number').val()
		var shipping_date = $('#shipping_date').val()
		var OrderId = $('#OrderId').val()
		$.ajax({
			url:'<?php echo url('admin/Order/updateDomestic'); ?>',
			data:{purchase_price:purchase_price,shipment_company:shipment_company,shipment_number:shipment_number,shipping_date:shipping_date,OrderId:OrderId},
			type:'post',
			dataType: 'json',
			success:function(result){
				alert(result.msg)
			}
		},'json');
	})
	$('#updateInternation').click(function(){
		var international_no = $('#international_no').val()
		var tracking_number = $('#tracking_number').val()
		var freight = $('#freight').val()
		var line = $('#line').val()
		var weight = $('#weight').val()
		var shipping_date = $('#international_date').val()
		var OrderId = $('#OrderId').val()
		$.ajax({
			url:'<?php echo url('admin/Order/updateInternation'); ?>',
			data:{international_no:international_no,tracking_number:tracking_number,freight:freight,line:line,weight:weight,shipping_date:shipping_date,OrderId:OrderId},
			type:'post',
			dataType: 'json',
			success:function(result){
				alert(result.msg)
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
