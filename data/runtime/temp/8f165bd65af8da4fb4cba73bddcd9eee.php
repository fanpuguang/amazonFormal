<?php if (!defined('THINK_PATH')) exit(); /*a:6:{s:78:"/www/wwwroot/www.ldkjmy.com/aaaa/yamaxun/app/admin/view/order/myorderlist.html";i:1578553887;s:72:"/www/wwwroot/www.ldkjmy.com/aaaa/yamaxun/app/admin/view/public/base.html";i:1578553890;s:74:"/www/wwwroot/www.ldkjmy.com/aaaa/yamaxun/app/admin/view/public/header.html";i:1586171204;s:76:"/www/wwwroot/www.ldkjmy.com/aaaa/yamaxun/app/admin/view/public/left_nav.html";i:1578553891;s:76:"/www/wwwroot/www.ldkjmy.com/aaaa/yamaxun/app/admin/view/public/head_nav.html";i:1578553891;s:74:"/www/wwwroot/www.ldkjmy.com/aaaa/yamaxun/app/admin/view/public/footer.html";i:1578970335;}*/ ?>
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

		<form name="admin_list_sea" class="form-search form-horizontal" id="list-filter" method="post" action="<?php echo url('admin/Order/myorderlist'); ?>">
			<div class="row maintop">
				<div class="col-xs-12 col-sm-12 maintop">
					<input type="text" placeholder="订单id">
					<input type="text" placeholder="亚马逊订单id">
					<input type="text" placeholder="关联产品id" class="sousuoAreaInput">
					<input type="text" placeholder="产品SKU">
					<input type="text" placeholder="产品asin码">
					<input type="text" placeholder="国内物流单号" class="sousuoAreaInput">
					<input type="text" placeholder="国际物流单号">
					<input name="reservation" id="reservation" class="sl-date" value="" placeholder="开始日期" name="" class="el-range-input">
					<span class="el-range-separator">-</span>
					<input name="reservation" id="reservation" class="sl-date" value="" placeholder="结束日期" name="" class="el-range-input">
					<button type="submit" class="btn btn-xs btm-input btn-purple ajax-search-form">
						<span class="ace-icon fa fa-search icon-on-right bigger-110"></span>
						查询
					</button>
				</div>
			</div>
		</form>
		<style>
			.screen{
				margin: 10px 0;
				background: rgba(255,255,255,.6);
				padding: 10px 15px;
				border-radius: 5px;
			}
			.screen>div{
				display: flex;
				margin: 6px 0;
				line-height: 25px;
			}
			.screen>div>span{
				color: #333;
				font-weight: bold;
			}
			.screen>div ul{
				flex: 1;
				margin: 0;
				padding: 0;
				/*display: flex;*/
			}
			.screen>div ul li{
				display: inline-block;
				/*width: 100px;*/
				margin-left: 20px;
				height: 25px;
				line-height: 25px;
				font-size: 13px;
				/*color: #444;*/
				padding: 0 10px;
				cursor: pointer;
				border-radius: 12.5px;
				font-weight: bold;
				/*border: 1px solid transparent;*/
			}
			.screen>div ul li span{
				font-weight: normal;
				color: #777;
			}
			.screen>div ul li.action{
				/*border: 1px solid #df4950;*/
				/*color: #ef5b13;*/

			}
			.screen>div ul li.action span{
				color: #e06f38;
			}

			 .layui-col-md3{
				 width: 20%;
			 }
			.stateBtn{
				display: inline-block;
				height: 32px;
				line-height: 35px;
				padding: 0 10px;
				margin-left: 10px;
				background: #00aee3;
				color: #fff;
				border-radius: 3px;
			}
			td:nth-child(18) span{
				display: inline-block;
				text-align: center;
				padding: 2px;
				border-radius: 3px;
				color: #fff;
				font-size: 13px;
				width: 70px;
				color: #fff!important;
			}


		</style>

		<div class="screen">
			<div class="audit">
        <span>
            订单状态
        </span>
				<ul class="zhuangtaiUl">
					<li class="red">
						全部
						<span>
                    (236)
                </span>
					</li>
					<li class="org1">
						待付款
						<span>
                    （3）
                </span>
					</li>
					<li class="blue1 action">
						已付款
						<span>
                    （1）
                </span>
					</li>
					<li class="org">
						虚发货
						<span>
                    （0）
                </span>
					</li>
					<li class="blue2">
						已采购
						<span>
                    （2）
                </span>
					</li>
					<li>
						已发货
						<span>
                    （5）
                </span>
					</li>
					<li class="blue4">
						仓库已入库
						<span>
                    （0）
                </span>
					</li>
					<li>
						仓库已出库
						<span>
                    （1）
                </span>
					</li>
					<li class="blue">
						国际已发货
						<span>
                    （224）
                </span>
					</li>
					<li>
						已完成
						<span>
                    （0）
                </span>
					</li>
				</ul>
			</div>
			<div class="audit">
        <span>
            异常状态
        </span>
				<ul class="yichangUl">
					<li class="red">
						全部
						<span>
                    (43)
                </span>
					</li>
					<li class="org1">
						缺货
						<span>
                    （0）
                </span>
					</li>
					<li class="green">
						补发
						<span>
                    （2）
                </span>
					</li>
					<li class="red action">
						问题
						<span>
                    （0）
                </span>
					</li>
					<li>
						退款
						<span>
                    （41）
                </span>
					</li>
					<li>
						国际物流异常
						<span>
                    （0）
                </span>
					</li>
					<li>
						国内物流异常
						<span>
                    （0）
                </span>
					</li>
				</ul>
			</div>
		</div>
		<div class="row maintop">
			<div class="col-xs-5 col-sm-2  margintop5">

					<button class="btn btn-sm btn-danger">
						<i class="ace-icon fa fa-bolt bigger-110"></i>
						手工录入订单
					</button>

			</div>
		</div>


		<div class="row">
			<div class="col-xs-12">
				<div>
					<table class="table table-striped table-bordered table-hover" id="dynamic-table">
						<thead>
						<tr>
							<th>
								<input type="checkbox">
							</th>
							<th>
								订单号
							</th>
							<th style="width: 100px;">
								下单时间
							</th>
							<th style="width: 130px;">
								公司名
							</th>
							<th>
								图片
							</th>
							<th>
								亚马逊单号
							</th>
							<th>
								订单金额
							</th>
							<th>
								Amazon佣金
							</th>
							<th>
								到账金额
							</th>
							<th>
								当天汇率
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
							<th>
								状态
							</th>
							<th>
								异常状态
							</th>
							<th class="hidden-sm hidden-xs">添加日期</th>

							<th style="border-right:#CCC solid 1px;">操作</th>
						</tr>
						</thead>

						<tbody>

							<tr class="">
								<td class="orderchenc">
									<input type="checkbox" value="">
								</td>
								<td>
									121917
									<br>
									<span class="brSpan">


			<span>
				<img src="../../statics/kuajing/img/yingg.jpg" alt="">
				英国
			</span>

		</span>
								</td>
								<td style="width: 100px; color: rgb(153, 153, 153);">
									2019-08-23 02:54:29
								</td>
								<td style="width: 130px;">
		<span style="font-size: 13px; color: rgb(102, 102, 102);">
			龙鼎科技贸易
		</span>
									<br>
									<span style="font-size: 13px; color: rgb(102, 102, 102);">
			操作人:刘杰
		</span>
								</td>
								<td class="imgtd">
									<img src="http://ecx.images-amazon.com/images/I/410UgajvWEL._SL500_.jpg"
										 alt="" width="50">
								</td>
								<!---->
								<td>
									<!---->
									<!---->
									<a lay-href="modules/order2/orderDetailsCG.html?orderid=121917page=1"
									   layadmin-event="message" lay-text="121917" style="cursor: pointer;">
										205-6302864-2779505
									</a>
									<br>
									<span class="brSpan">
			<img src="/cross_border/statics/kuajing/img/yamaxun.jpg" alt="">
			LZF(英国)

			<span>
				英国
			</span>

		</span>
								</td>
								<td>
									1
								</td>
								<td>
									39.09
									<span>
			(GBP)
		</span>
									<br>
									<span style="color: rgb(153, 153, 153);">
			¥ 333.22
		</span>
								</td>
								<td>
									5.86
									<span>
			(GBP)
		</span>
									<br>
									<span style="color: rgb(153, 153, 153);">
			¥ 49.98
		</span>
								</td>
								<td>
									33.23
									<span>
			(GBP)
		</span>
									<br>
									<span style="color: rgb(153, 153, 153);">
			¥ 283.24
		</span>
								</td>
								<td>
									8.5244
								</td>
								<td>
									76
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
								<td>
									<!---->
									<!---->
									<!---->
									<span class="bule2">
			已采购
		</span>
									<!---->
									<!---->
									<!---->
									<!---->
									<!---->
									<!---->
									<!---->
									<!---->
								</td>
								<td>
									<!---->
									<span>
		</span>
								</td>
								<td>
		<span style="color: rgb(0, 182, 229); font-size: 13px; cursor: pointer;">
			退款
		</span>
								</td>
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
