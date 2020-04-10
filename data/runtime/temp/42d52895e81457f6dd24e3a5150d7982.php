<?php if (!defined('THINK_PATH')) exit(); /*a:6:{s:81:"/www/wwwroot/www.ldkjmy.com/aaaa/yamaxun/app/admin/view/product/product_edit.html";i:1586252990;s:72:"/www/wwwroot/www.ldkjmy.com/aaaa/yamaxun/app/admin/view/public/base.html";i:1578553890;s:74:"/www/wwwroot/www.ldkjmy.com/aaaa/yamaxun/app/admin/view/public/header.html";i:1586171204;s:76:"/www/wwwroot/www.ldkjmy.com/aaaa/yamaxun/app/admin/view/public/left_nav.html";i:1578553891;s:76:"/www/wwwroot/www.ldkjmy.com/aaaa/yamaxun/app/admin/view/public/head_nav.html";i:1578553891;s:74:"/www/wwwroot/www.ldkjmy.com/aaaa/yamaxun/app/admin/view/public/footer.html";i:1578970335;}*/ ?>
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
			
<style type="text/css">
	.string { color: green; }
	.number { color: darkorange; }
	.boolean { color: blue; }
	.null { color: magenta; }
	.key { color: red; }
	body{
		padding: 1rem;
	}
	pre{
		background-color: #f7f7f9;
		border: 1px solid #e1e1e8;
		padding: 5px 10px;
		margin: 0;
		border-radius: 8px;
		min-height: 20px;
	}
	xmp{
		margin: 0;
		padding: 0;
	}
	#upload_duixiang{
		display: inline-block;
		margin-bottom: 5px;
		color: #fff;
		background-color: #337ab7;
		border-color: #2e6da4;
		padding: 5px 10px;
		font-size: 12px;
		line-height: 1.5;
		border-radius: 3px;
		cursor: pointer;
	}

	ul li img:hover{
		/*transform: scale(4.16);*/
	}

	.ul li span {
		position: absolute;
		top: -15px;
		left: 45px;
		width:15px;
		height: 10px;
		/*color: #00a3e8;*/
		cursor: pointer;
		z-index: 11;
		/*display: none;*/
	}
	.ul li{
		position: relative;
		margin-right: 5px;
	}
</style>

<script>
	window.onload = function() {
		var elements = document.querySelectorAll( '.demo-image' );
		Intense( elements );
	}
</script>
<div id="bg" style="width: 100%;height: 100%;position: absolute;background: black;z-index: 11;opacity: 0.3;display: none"></div>
<div class="page-content">
	<!--主题-->
	<div class="page-header">
		<h1>
			您当前操作
			<small>
				<i class="ace-icon fa fa-angle-double-right"></i>
				修改产品
			</small>

			<script>
			function zhi() {
				goodsTitle = $('#goodsTitle').val();
				goodsEnglishabbreviation = $('#goodsEnglishabbreviation').val();
				goodsTradeNames = $('#goodsTradeNames').val();
				goodsBrandName = $('#goodsBrandName').val();
				goodsSizec = $('#goodsSizec').val();
				goodsSizek = $('#goodsSizek').val();
				goodsSizeg = $('#goodsSizeg').val();
				keyword_en = $('#keyword_en').val();
				keyword_fra = $('#keyword_fra').val();
				keyword_de = $('#keyword_de').val();
				keyword_it = $('#keyword_it').val();
				keyword_es = $('#keyword_es').val();
				keyword_jp = $('#keyword_jp').val();
				class1 = $('#class1s').val();
				class2 = $('#class2s').val();
				class3 = $('#class3s').val();

				$.ajax({
					url: "<?php echo url('admin/Product/product_fuzhi'); ?>",
					type: 'post',
					data: {
						goodsTitle: goodsTitle,
						goodsEnglishabbreviation: goodsEnglishabbreviation,
						goodsTradeNames: goodsTradeNames,
						goodsBrandName: goodsBrandName,
						goodsSizec: goodsSizec,
						goodsSizek: goodsSizek,
						goodsSizeg: goodsSizeg,
						keyword_en: keyword_en,
						keyword_fra: keyword_fra,
						keyword_de: keyword_de,
						keyword_it: keyword_it,
						keyword_es: keyword_es,
						class1: class1,
						class2: class2,
						class3: class3,
						keyword_jp: keyword_jp
					},
					dataType: 'json',
					beforeSend: function (XMLHttpRequest) {

					},
					success: function (result) {

						if (result) {
							alert('复制成功！');
							window.location.href ="<?php echo url('admin/Product/product_edit'); ?>?goodsId="+result;
						}else{
							alert('复制失败！');
						}
					}

				},"josn")

			}


			</script>
		</h1>
	</div>
	<div class="row">
		<div class="col-xs-12">
			<form class="form-horizontal ajaxForm2" name="form0" method="post" action="<?php echo url('admin/Product/product_runedit'); ?>"  enctype="multipart/form-data" >
				<div style="margin-left: 1180px;float: right;margin-top: -90px;position: fixed;z-index:9999;">
					<a class="btn btn-info" href="javascript:history.go(-1)">返回</a>
					<a class="btn btn-info" onclick="zhi()">复制该产品</a>
					<button class="btn btn-info" type="submit" id="aa">
						保存
					</button>
					<a  class="btn btn-info" id="submit">
						立即上传亚马逊
					</a>
				</div>
                <input type="hidden" name="childType" id="childType" value="<?php echo $goods_extra['childType']; ?>">
				<input type="hidden" id="imagepath" name="goodsImages" value="<?php echo $goods_extra['goods_Images']; ?>">  <!-- 保存的图片id 用于表单提交 -->
				<input type="hidden" value="<?php echo $goods_extra['goodsId']; ?>" name="goodsId" id="goodsId">
				<span id="upload_duixiang">上传产品图片</span><!-- 上传按钮 -->
				<div class="show">

				</div> <!-- 输出图片 -->

				<link rel="stylesheet" type="text/css" href="__PUBLIC__/ace/dtsc/FraUpload.css">

				<!-- 图片排序 -->
				<script src="__PUBLIC__/ace/dtsc/Sortable/Sortable.js"></script>
				<script type="text/javascript" src="__PUBLIC__/ace/dtsc/MD5.js"></script>
				<script type="text/javascript" src="__PUBLIC__/ace/dtsc/FraEdit.js"></script>
				<script type="text/javascript">

					// 商品图片上传
					a = $("#upload_duixiang").FraUpload({
						view        : ".show",      // 视图输出位置
						url         : "<?php echo url('admin/Product/fileupload'); ?>", // 上传接口
						fetch       : "img",   // 视图现在只支持img
						debug       : false,    // 是否开启调试模式
						/* 外部获得的回调接口 */
						onLoad: function(e){                    // 选择文件的回调方法

							console.log("外部: 初始化完成...");
						},
						breforePort: function (e) {         // 发送前触发
							console.log("文件发送之前触发");
						},
						successPort: function (e) {         // 发送成功触发
							console.log("文件发送成功");
							add_img(e)
						},
						errorPort: function (e) {       // 发送失败触发
							console.log("文件发送失败");
							onload_image()
						},
						deletePost: function(e){    // 删除文件触发
							// console.log("删除文件");
							// alert('删除了'+e.filename)
							delete_img(e)
						},
						sort: function(e){      // 排序触发
							console.log("排序");
							onload_image()
						},
					});
					function removeChars(source, chars) {
						var reg = new RegExp(chars,'gi');
						var result = source.replace(reg,"");
						return result;
					}

					// 获取图片上传信息
					function onload_image(){
						var path = '';
						$('#view_ul').children('li').each(function(i,dom){
							if(i==$('#view_ul').children('li').length-1){
								path+= $(this).attr("data-md5")
								//alert(path);
							}else{
								path+= $(this).attr("data-md5")+","
							}

						})
						//alert(path);
						var ids1 = path.toString();

						ids = ids1.replace(/\ +/g,"");
						ids = ids.replace(/[\r\n]/g,"");
						ids = ids.replace('fromquery', '');
						var path = removeChars(ids,'fromquery');
						console.log(path)
						// var path = $("#imagepath").val()+","+ids;
						$("#imagepath").val(path);
					}
					$("#view_ul").on("click","li>img",function(){
						console.log($(this).attr('src'))
						var src = $(this).attr('src')
						$('#imgShow').show()
						$('#bg').show()
						$('#imgDetail').attr('src',src)
					})
					$('#bg').click(function(){
						$('#imgShow').hide()
						$('#bg').hide()
					})

					function add_img(img){
						console.log(img)
						var lasImg = img
						lastImg = lasImg.toString();
						lastImg = lastImg.replace(/\ +/g,"");
						lastImg = lastImg.replace(/[\r\n]/g,"");
						lastImg = lastImg.replace('fromquery', '');
						var lastImg = removeChars(lastImg,'fromquery');
						$('#view_ul>li:last-child').attr('data-md5',lastImg)
						$('#view_ul>li:last-child>img').attr('src',lastImg)
						path = $("#imagepath").val()
						if(path.length==0){
							path = img;
						}else{
							path = $("#imagepath").val()+","+img
						}
						var ids1 = path.toString();
						ids = ids1.replace(/\ +/g,"");
						ids = ids.replace(/[\r\n]/g,"");
						ids = ids.replace('fromquery', '');
						// console.log(11)
						// console.log(ids)
						// console.log(22)
						var path = removeChars(ids,'fromquery');
						$("#imagepath").val(path);
					}
					function delete_img(index){
						array = $("#imagepath").val().split(',')
						console.log(array)
						var path = "";
						for(var i=0;i<array.length;i++){
							if(i==index){
								continue
							}else{
								if(i<array.length-1){
									path+= array[i]+","
								}else{
									path+= array[i]
								}
							}
						}
						var last = path.substr(path.length-1,1)
						if(last == ","){
							path = path.slice(0,path.length-1)
						}
						$("#imagepath").val(path);
					}
					/**
					 * 判断变量是否为空
					 */
					function empty(value) {
						if(value=="" || value==undefined || value==null || value==false || value==[] || value=={}){
							return true;
						}else{
							return false;
						}
					}
				</script>
				<!---------------------------------------                     多图上传结束                        ------------------------------------------------------->
				<div class="form-group">
					<label class="col-sm-2 control-label no-padding-right" for="form-field-1"> 所属分类：</label>
					<div class="col-sm-6">
                        <span>
                            <select name="class1" onchange="showclass22()" id="class1s">
                                <option>请选择一级分类</option>

                                    <?php if(is_array($list_fenlei) || $list_fenlei instanceof \think\Collection || $list_fenlei instanceof \think\Paginator): if( count($list_fenlei)==0 ) : echo "" ;else: foreach($list_fenlei as $key=>$vo): if($vo['parentId'] == 0): if($vo['categoryId'] == $goods_extra['class1']): ?>
												<option value="<?php echo $vo['categoryId']; ?>" selected><?php echo $vo['categoryName']; ?></option>
											<?php else: ?>
												<option value="<?php echo $vo['categoryId']; ?>"><?php echo $vo['categoryName']; ?></option>
											<?php endif; endif; endforeach; endif; else: echo "" ;endif; ?>
                            </select>
							<?php if($goods_extra['class2']!= ''): ?>
                            	<select name="class2" onchange="showclass33()" id="class2s">
									<?php if(is_array($list_fenlei) || $list_fenlei instanceof \think\Collection || $list_fenlei instanceof \think\Paginator): if( count($list_fenlei)==0 ) : echo "" ;else: foreach($list_fenlei as $key=>$vo): if($vo['categoryId'] == $goods_extra['class2']): ?>
											<option value="<?php echo $vo['categoryId']; ?>" selected><?php echo $vo['categoryName']; ?></option>
										<?php else: ?>
											<option value="<?php echo $vo['categoryId']; ?>"><?php echo $vo['categoryName']; ?></option>
										<?php endif; endforeach; endif; else: echo "" ;endif; ?>
								</select>
							<?php else: ?>
	                            <select name="class2" onchange="showclass33()" id="class2s" style="display:none;"></select>
							<?php endif; if($goods_extra['class3']!= ''): ?>
                            	<select name="class3"  id="class3s">
									<?php if(is_array($list_fenlei) || $list_fenlei instanceof \think\Collection || $list_fenlei instanceof \think\Paginator): if( count($list_fenlei)==0 ) : echo "" ;else: foreach($list_fenlei as $key=>$vo): if($vo['categoryId'] == $goods_extra['class3']): ?>
											<option value="<?php echo $vo['categoryId']; ?>" selected><?php echo $vo['categoryName']; ?></option>
										<?php else: ?>
											<option value="<?php echo $vo['categoryId']; ?>"><?php echo $vo['categoryName']; ?></option>
										<?php endif; endforeach; endif; else: echo "" ;endif; ?>
								</select>
							<?php else: ?>
								<select name="class3"  id="class3s" style="display:none;"></select>
							<?php endif; ?>

                        </span>
					</div>
				</div>
				<script>
					function showclass22(){
						id = $('#class1s').val();
						if(id!=''){
							$.post("<?php echo url('admin/Productclass/showclass22'); ?>",{id:id},function(data){
								if(data!=""){
									$("#class2s").html(data);
									$("#class2s").show();
									$("#class3s").hide();
								}else{
									$("#class2s").hide();
								}
							});

						}

					}
					function showclass33(){
						id = $('#class2s').val();
						if(id!=''){
							$.post("<?php echo url('admin/Productclass/showclass33'); ?>",{id:id},function(data){
								$("#class3s").html(data);
								$("#class3s").show();
							});
						}
					}
				</script>
				<div class="space-4"></div>
				<div class="form-group">
					<label class="col-sm-2 control-label no-padding-right" for="form-field-1"> 产品简称：  </label>
					<div class="col-sm-10">

						<input type="text" name="goodsTitle" id="goodsTitle"  placeholder="产品简称，建议1~12字数"  class="col-xs-10 col-sm-4" style="margin-left:10px;" value="<?php echo $goods_extra['goodsTitle']; ?>" />
						<span class="help-inline col-xs-12 col-sm-7">
												<span class="middle" id="resone"></span>
											</span>
					</div>
				</div>
				<div class="space-4"></div>
				<div class="form-group">
					<label class="col-sm-2 control-label no-padding-right" for="form-field-1"> 英文简称：  </label>
					<div class="col-sm-10">

						<input type="text" name="goodsEnglishabbreviation" id="goodsEnglishabbreviation"  placeholder="产品简称，建议1~12字数"  class="col-xs-10 col-sm-4" style="margin-left:10px;" value="<?php echo $goods_extra['goodsEnglishabbreviation']; ?>" />
						<span class="help-inline col-xs-12 col-sm-7">
												<span class="middle" id="resone"></span>
											</span>
					</div>
				</div>
				<div class="space-4"></div>

				<div class="form-group">
					<label class="col-sm-2 control-label no-padding-right" for="form-field-1"> 厂商名称：  </label>
					<div class="col-sm-10">

						<input type="text" name="goodsTradeNames" id="goodsTradeNames"  placeholder="厂商名称"  class="col-xs-10 col-sm-4" style="margin-left:10px;" value="<?php echo $goods_extra['goodsTradeNames']; ?>" />
						<span class="help-inline col-xs-12 col-sm-7">
												<span class="middle" id="resone"></span>
											</span>
					</div>
				</div>
				<div class="space-4"></div>

				<div class="form-group" style="">
					<label class="col-sm-2 control-label no-padding-right" for="form-field-1"> 品牌名称：  </label>
					<div class="col-sm-10">

						<input type="text" name="goodsBrandName" id="goodsBrandName"  placeholder="品牌名称"  class="col-xs-10 col-sm-4 input-icon-right" style="margin-left:10px;" value="<?php echo $goods_extra['goodsBrandName']; ?>"/>
						<span class="help-inline col-xs-12 col-sm-7">
												<span class="middle" id="resone"></span>
											</span>
					</div>
				</div>
				<div class="space-4"></div>

				<div class="form-group">
					<label class="col-sm-2 control-label no-padding-right" for="form-field-1"> SKU：  </label>
					<div class="col-sm-10">

						<input type="text" name="goodsSku" id="goodsSku"  placeholder="SKU编码"   class="col-xs-10 col-sm-2" style="margin-left:10px;" value="<?php echo $goods_extra['goodsSku']; ?>" />
						<input type="text" name="correctSku" id="correctSku"  placeholder="SKU修正,建议两位英文字母"   class="col-xs-10 col-sm-2" style="margin-left:10px;"/>
						<span class="help-inline col-xs-12 col-sm-7">
							<span class="btn btn-sm btn-danger" id="reloadSku">修正</span>
												<span class="middle" id="resone"></span>
											</span>
					</div>
				</div>
				<div class="space-4"></div>
				<div class="form-group">
					<label class="col-sm-2 control-label no-padding-right" for="form-field-1"> EAN：  </label>
					<div class="col-sm-10">

						<input type="text" name="goodsEan" id="goodsEan"  placeholder="EAN编码"   class="col-xs-10 col-sm-2" style="margin-left:10px;" value="<?php echo $goods_extra['upc']; ?>" />

						<span class="help-inline col-xs-12 col-sm-7">
												<span class="btn btn-sm btn-danger" id="reloadEan">修正</span>
											</span>
					</div>
				</div>
				<div class="space-4"></div>


				<div class="space-4"></div>
				<div class="form-group">
					<label class="col-sm-2 control-label no-padding-right" for="form-field-1"> 是否审核： </label>
					<div class="col-sm-10" style="padding-top:5px;">

						<input name='goodsStaus' id='goodsStaus' <?php if($goods_extra['goodsStaus'] == 1): ?>checked<?php endif; ?>  value='1' class='ace ace-switch ace-switch-4 btn-flat' type='checkbox' />
						<span class="lbl">&nbsp;&nbsp;默认关闭</span>
					</div>
				</div>
				<div class="space-4"></div>

				<div class="form-group">
					<label class="col-sm-2 control-label no-padding-right" for="form-field-1"> 产品来源：  </label>
					<div class="col-sm-10">
						<input type="text" name="goodsUrl" id="goodsUrl" placeholder="来源URL" class="col-xs-10 col-sm-6" value="<?php echo $goods_extra['goodsUrl']; ?>"/>
						<a class="btn btn-sm btn-danger" href="<?php echo $goods_extra['goodsUrl']; ?>" target="_blank" >

							访问
						</a>

						<span >
								<span class="middle">正确格式：http:// 开头</span>
							</span>
					</div>
				</div>
				<div class="space-4"></div>
				
				<div class="form-group">
                    <label class="col-sm-2 control-label no-padding-right" for="form-field-1"> 亚马逊产品地址： </label>
                    <div class="col-sm-10">
                        <input type="url" name="caijiUrl" id="caijiUrl" placeholder="亚马逊产品地址" class="col-xs-10 col-sm-6" value="<?php echo $goods_extra['caijiUrl']; ?>"/>

                      <a class="btn btn-sm btn-danger" href="<?php echo $goods_extra['caijiUrl']; ?>" target="_blank" >

							访问
						</a>
                    </div>
                </div>

				<div class="form-group">
					<label class="col-sm-2 control-label no-padding-right" for="form-field-1"> 产品备注： </label>
					<div class="col-sm-8">
						<textarea type="text" name="bezhu" id="bezhu" class="col-xs-10 col-sm-6"/> <?php echo $goods_extra['bezhu']; ?></textarea>
					</div>
				</div>
				<!--------------------------------------------运费模块开始---------------------------------------------------------------->

				<script>

					$(function(){
						//售价、运费计算
						$(document).ready(function(){
							countPrice()
							$('.input').blur(function () {
								countPrices()

						})
							})
						function countPrice(){
							goodsBuyingPrice = $('#goodsBuyingPrice').val();
							goodsWeight = $('#goodsWeight').val();
							goodsSizec = $('#goodsSizec').val();
							goodsSizek = $('#goodsSizek').val();
							goodsSizeg = $('#goodsSizeg').val();
							if(goodsBuyingPrice != 0 && goodsWeight!= '' && goodsSizec!='' && goodsSizek!='' && goodsSizeg!= ''){
								$.post('<?php echo url('admin/Product/product_price'); ?>',{goodsBuyingPrice:goodsBuyingPrice,goodsWeight:goodsWeight,goodsSizec:goodsSizec,goodsSizek:goodsSizek,goodsSizeg:goodsSizeg},function(data){
									//运费赋值
									$("#usyf").html(data.Freight.us_Freight);
									$("#cayf").html(data.Freight.ca_Freight);
									$("#mxyf").html(data.Freight.mx_Freight);
									$("#ukyf").html(data.Freight.uk_Freight);
									$("#fryf").html(data.Freight.fr_Freight);
									$("#deyf").html(data.Freight.de_Freight);
									$("#ityf").html(data.Freight.it_Freight);
									$("#esyf").html(data.Freight.es_Freight);
									$("#jpyf").html(data.Freight.jp_Freight);
									$("#auyf").html(data.Freight.au_Freight);
									//售价赋值
									$("#ussj").html(data.Price.us_Price);
									$("#casj").html(data.Price.ca_Price);
									$("#mxsj").html(data.Price.mx_Price);
									$("#uksj").html(data.Price.uk_Price);
									$("#frsj").html(data.Price.fr_Price);
									$("#desj").html(data.Price.de_Price);
									$("#itsj").html(data.Price.it_Price);
									$("#essj").html(data.Price.es_Price);
									$("#jpsj").html(data.Price.jp_Price);
									$("#ausj").html(data.Price.au_Price);
									//外币赋值
									$("#uswb").html(data.Foreign.us_Price);
									$("#cawb").html(data.Foreign.ca_Price);
									$("#mxwb").html(data.Foreign.mx_Price);
									$("#ukwb").html(data.Foreign.uk_Price);
									$("#frwb").html(data.Foreign.fr_Price);
									$("#dewb").html(data.Foreign.de_Price);
									$("#itwb").html(data.Foreign.it_Price);
									$("#eswb").html(data.Foreign.es_Price);
									$("#jpwb").html(data.Foreign.jp_Price);
									$("#auwb").html(data.Foreign.au_Price);


									//利润赋值
									$("#uslr").html(data.Profit.us_Price);
									$("#calr").html(data.Profit.ca_Price);
									$("#mxlr").html(data.Profit.mx_Price);
									$("#uklr").html(data.Profit.uk_Price);
									$("#frlr").html(data.Profit.fr_Price);
									$("#delr").html(data.Profit.de_Price);
									$("#itlr").html(data.Profit.it_Price);
									$("#eslr").html(data.Profit.es_Price);
									$("#jplr").html(data.Profit.jp_Price);
									$("#aulr").html(data.Profit.au_Price);

								});
							}
						}

						function countPrices(){
							goodsBuyingPrice = $('#goodsBuyingPrice').val();
							goodsWeight = $('#goodsWeight').val();
							goodsSizec = $('#goodsSizec').val();
							goodsSizek = $('#goodsSizek').val();
							goodsSizeg = $('#goodsSizeg').val();
							if(goodsBuyingPrice != 0 && goodsWeight!= '' && goodsSizec!='' && goodsSizek!='' && goodsSizeg!= ''){
								$.post('<?php echo url('admin/Product/product_price'); ?>',{goodsBuyingPrice:goodsBuyingPrice,goodsWeight:goodsWeight,goodsSizec:goodsSizec,goodsSizek:goodsSizek,goodsSizeg:goodsSizeg},function(data){
									//运费赋值
									$("#usyf").html(data.Freight.us_Freight);
									$("#cayf").html(data.Freight.ca_Freight);
									$("#mxyf").html(data.Freight.mx_Freight);
									$("#ukyf").html(data.Freight.uk_Freight);
									$("#fryf").html(data.Freight.fr_Freight);
									$("#deyf").html(data.Freight.de_Freight);
									$("#ityf").html(data.Freight.it_Freight);
									$("#esyf").html(data.Freight.es_Freight);
									$("#jpyf").html(data.Freight.jp_Freight);
									$("#auyf").html(data.Freight.au_Freight);
									//售价赋值
									$("#ussj").html(data.Price.us_Price);
									$("#casj").html(data.Price.ca_Price);
									$("#mxsj").html(data.Price.mx_Price);
									$("#uksj").html(data.Price.uk_Price);
									$("#frsj").html(data.Price.fr_Price);
									$("#desj").html(data.Price.de_Price);
									$("#itsj").html(data.Price.it_Price);
									$("#essj").html(data.Price.es_Price);
									$("#jpsj").html(data.Price.jp_Price);
									$("#ausj").html(data.Price.au_Price);
									//外币赋值
									$("#uswb").html(data.Foreign.us_Price);
									$("#cawb").html(data.Foreign.ca_Price);
									$("#mxwb").html(data.Foreign.mx_Price);
									$("#ukwb").html(data.Foreign.uk_Price);
									$("#frwb").html(data.Foreign.fr_Price);
									$("#dewb").html(data.Foreign.de_Price);
									$("#itwb").html(data.Foreign.it_Price);
									$("#eswb").html(data.Foreign.es_Price);
									$("#jpwb").html(data.Foreign.jp_Price);
									$("#auwb").html(data.Foreign.au_Price);

									//最终售价赋值
									$("#uszzsj").val(data.Foreign.us_Price);
									$("#cazzsj").val(data.Foreign.ca_Price);
									$("#mxzzsj").val(data.Foreign.mx_Price);
									$("#ukzzsj").val(data.Foreign.uk_Price);
									$("#frzzsj").val(data.Foreign.fr_Price);
									$("#dezzsj").val(data.Foreign.de_Price);
									$("#itzzsj").val(data.Foreign.it_Price);
									$("#eszzsj").val(data.Foreign.es_Price);
									$("#jpzzsj").val(data.Foreign.jp_Price);
									$("#auzzsj").val(data.Foreign.au_Price);

									//利润赋值
									$("#uslr").html(data.Profit.us_Price);
									$("#calr").html(data.Profit.ca_Price);
									$("#mxlr").html(data.Profit.mx_Price);
									$("#uklr").html(data.Profit.uk_Price);
									$("#frlr").html(data.Profit.fr_Price);
									$("#delr").html(data.Profit.de_Price);
									$("#itlr").html(data.Profit.it_Price);
									$("#eslr").html(data.Profit.es_Price);
									$("#jplr").html(data.Profit.jp_Price);
									$("#aulr").html(data.Profit.au_Price);

								});
							}
						}






					})





				</script>
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
                <input type="text" placeholder="采购价格(￥)" value="<?php echo $goods_extra['goodsBuyingPrice']; ?>" name="goodsBuyingPrice" id="goodsBuyingPrice" onkeyup="this.value=this.value.replace(/[^\d.]/g,'');" class="input">
            </span>

							<!--<span>
                                <label for="">
                                    国内运费(￥)：
                                </label>
                                <input type="text" placeholder="国内运费(￥)" name="goodsFreight" id="goodsFreight" value="15" onkeyup="this.value=this.value.replace(/[^\d.]/g,'');">
                            </span>!-->
							<span>
                <label for="">
                    包装毛重(kg)：
                </label>
                <input type="text" placeholder="包装毛重(kg)"  value="<?php echo $goods_extra['goodsWeight']; ?>" name="goodsWeight" id="goodsWeight" onkeyup="this.value=this.value.replace(/[^\d.]/g,'');" class="input">
            </span>
							<br>
							<span>
                <label for="">
                    包装尺寸(cm)：
                </label>
                <input type="text" value="<?php echo $goods_extra['goodsSize']['goodsSizec']; ?>" placeholder="长" name="goodsSizec" id="goodsSizec" onkeyup="this.value=this.value.replace(/[^\d.]/g,'');" class="size_input" class="input">
                *
                <input type="text" value="<?php echo $goods_extra['goodsSize']['goodsSizek']; ?>" placeholder="宽" name="goodsSizek" id="goodsSizek" onkeyup="this.value=this.value.replace(/[^\d.]/g,'');" class="size_input" class="input">
                *
                <input type="text" value="<?php echo $goods_extra['goodsSize']['goodsSizeg']; ?>" placeholder="高" name="goodsSizeg" id="goodsSizeg" onkeyup="this.value=this.value.replace(/[^\d.]/g,'');" class="size_input" class="input">
            </span>
							<span>
                <label for="">
                    库存数量：
                </label>
                <input type="text" placeholder="库存数量"  name="goodsInventory" id="goodsInventory"  onkeyup="this.value=this.value.replace(/[^\d.]/g,'');" value="<?php echo $goods_extra['goodsInventory']; ?>" class="input">
            </span>
							<span>
                <label for="">
                    厂商编号：
                </label>
                <input type="text" placeholder="厂商编号" name="manufacturernumber" id="manufacturernumber"
					   onkeyup="this.value=this.value.replace(/[^\d.]/g,'');" value="<?php echo $goods_extra['manufacturernumber']; ?>" >

            </span>
							<span>
                <label for="">
                    材质：
                </label>
                <input type="text" placeholder="材质" name="material" id="material" value="<?php echo $goods_extra['material']; ?>">

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
									<td id="usyf">
										0
									</td>
									<td id="cayf">
										0
									</td>
									<td id="mxyf">
										0
									</td>
									<td id="ukyf">
										0
									</td>
									<td id="fryf">
										0
									</td>
									<td id="deyf">
										0
									</td>
									<td id="ityf">
										0
									</td>
									<td id="esyf">
										0
									</td>
									<td id="jpyf">
										0
									</td>
									<td id="auyf">
										0
									</td>
								</tr>
								<tr>
									<th>
										售价（￥）
									</th>
									<td  id="ussj">
										0
									</td>
									<td id="casj">
										0
									</td>
									<td id="mxsj">
										0
									</td>
									<td id="uksj">
										0
									</td>
									<td id="frsj">
										0
									</td>
									<td id="desj">
										0
									</td>
									<td id="itsj">
										0
									</td>
									<td id="essj">
										0
									</td>
									<td id="jpsj">
										0
									</td>
									<td id="ausj">
										0
									</td>
								</tr>
								<tr>
									<th>
										外币
									</th>
									<td  id="uswb">
										0
									</td>
									<td id="cawb">
										0
									</td>
									<td id="mxwb">
										0
									</td>
									<td id="ukwb">
										0
									</td>
									<td id="frwb">
										0
									</td>
									<td id="dewb">
										0
									</td>
									<td id="itwb">
										0
									</td>
									<td id="eswb">
										0
									</td>
									<td id="jpwb">
										0
									</td>
									<td id="auwb">
										0
									</td>
								</tr>

								<tr>
									<th>
										最终售价
									</th>
									<td>
										<input id="uszzsj" type="text"  value="<?php echo $goods_extra['usa_price']; ?>" onkeyup="this.value=this.value.replace(/[^\d.]/g,'');"
											   style="width: 90%;" name="goodsPrice_en">
									</td>
									<td>
										<input id="cazzsj" type="text"  value="<?php echo $goods_extra['canada_price']; ?>" onkeyup="this.value=this.value.replace(/[^\d.]/g,'');"
											   style="width: 90%;" name="goodsPrice_jnd">
									</td>
									<td>
										<input  id="mxzzsj" type="text"  value="<?php echo $goods_extra['mexico_price']; ?>" onkeyup="this.value=this.value.replace(/[^\d.]/g,'');"
												style="width: 90%;" name="goodsPrice_mxg">
									</td>
									<td>
										<input id="ukzzsj" type="text"  value="<?php echo $goods_extra['britain_price']; ?>" onkeyup="this.value=this.value.replace(/[^\d.]/g,'');"
											   style="width: 90%;" name="goodsPrice_yg">
									</td>
									<td>
										<input id="frzzsj" type="text"  value="<?php echo $goods_extra['france_price']; ?>" onkeyup="this.value=this.value.replace(/[^\d.]/g,'');"
											   style="width: 90%;" name="goodsPrice_fg">
									</td>
									<td>
										<input id="dezzsj" type="text"   value="<?php echo $goods_extra['germany_price']; ?>" onkeyup="this.value=this.value.replace(/[^\d.]/g,'');"
											   style="width: 90%;" name="goodsPrice_dg">
									</td>
									<td>
										<input id="itzzsj" type="text"  value="<?php echo $goods_extra['italy_price']; ?>" onkeyup="this.value=this.value.replace(/[^\d.]/g,'');"
											   style="width: 90%;" name="goodsPrice_ydl">
									</td>
									<td>
										<input id="eszzsj" type="text"  value="<?php echo $goods_extra['spain_price']; ?>" onkeyup="this.value=this.value.replace(/[^\d.]/g,'');"
											   style="width: 90%;" name="goodsPrice_xby">
									</td>
									<td>
										<input id="jpzzsj" type="text"  value="<?php echo $goods_extra['japan_price']; ?>" onkeyup="this.value=this.value.replace(/[^\d.]/g,'');"
											   style="width: 90%;" name="goodsPrice_rb">
									</td>
									<td>
										<input id="auzzsj" type="text"  value="<?php echo $goods_extra['australia_price']; ?>" onkeyup="this.value=this.value.replace(/[^\d.]/g,'');"
											   style="width: 90%;" name="goodsPrice_adly">
									</td>
								</tr>
								<tr>
									<th>
										利润（￥）
									</th>
									<td id="uslr">
										0 (0.00%)
									</td>
									<td id="calr">
										0 (0.00%)
									</td>
									<td id="mxlr">
										0 (0.00%)
									</td>
									<td id="uklr">
										0 (0.00%)
									</td>
									<td id="frlr">
										0 (0.00%)
									</td>
									<td id="delr">
										0 (0.00%)
									</td>
									<td id="itlr">
										0 (0.00%)
									</td>
									<td id="eslr">
										0 (0.00%)
									</td>
									<td id="jplr">
										0 (0.00%)
									</td>
									<td id="aulr">
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
                                <input type="button" value="添加" id="addVariant">
                            </span>
							<div class="variantName">

							</div>
							<table class="tableY" style="display:block" id="specifica">
								<tbody id="specif_content">

								<?php if(isset($variant)): ?>
								<tr>
									<th>
										变体组合
									</th>
									<th>
										SKU修正
									</th>
									<th>
										加价（人民币）
									</th>
									<th>
										库存
									</th>
									<th>
										UPC/EAN
									</th>
									<th>
										操作
									</th>
									<th width="20%">
										选择图片
									</th>
									<th>
										已选图片
									</th>
								</tr>
								<?php foreach($variant as $k=>$v): ?>
								<tr>
									<th>
										<?php if($v['type']==1): ?>
										<?php echo $v['color']; ?>

										<input type="hidden" name="variant_combination[<?php echo $k; ?>]" value="<?php echo $v['color']; ?>" class="variant_id">
										<?php elseif($v['type']==2): ?>
										<?php echo $v['size']; ?>
										<input type="hidden" name="variant_combination[<?php echo $k; ?>]" value="<?php echo $v['size']; ?>" class="variant_id">
										<?php elseif($v['type']==3): ?>
										<input type="hidden" name="variant_combination[<?php echo $k; ?>]" value="<?php echo $v['color']; ?>-<?php echo $v['size']; ?>" class="variant_id">
										<?php echo $v['color']; ?>-<?php echo $v['size']; endif; ?>
										<input type="hidden" name="variant_id[<?php echo $k; ?>]" value="<?php echo $v['id']; ?>" class="variant_id">
									</th> 
									<td>   <input name="sku[<?php echo $k; ?>]" type="text" style="width: 90%;" value="<?php echo $v['SKU']; ?>" class="skuInput">  </td>
									<td> <input name="markup[<?php echo $k; ?>]" type="text" style="width: 90%;" value="<?php echo $v['markup']; ?>"> </td>
									<td>  <input name="stock[<?php echo $k; ?>]" type="text" style="width: 90%;" value="<?php echo $v['stock']; ?>">
									</td> <td><input name="upc[<?php echo $k; ?>]" type="text" style="width: 90%;" value="<?php echo $v['UPC']; ?>" class="eanInput"> </td>
									<td> <input type="button" data-index="0" value="删除" class="del" name="del" data-id=<?php echo $v['id']; ?> style="outline: none"> </td>
									<td> <input type="button" value="选择图片" class="chan"> <input type="button" value="一键添加" class="all">
										<?php if(!empty($v['imgs'])): ?>
										<input type="hidden" value=<?php echo $v['imgs']; ?> class="imgAction" name="imgs[<?php echo $k; ?>]">
										<?php else: ?>
										<input type="hidden"  class="imgAction" name="imgs[<?php echo $k; ?>]">
										<?php endif; ?>
									</td>
									<td>
										<ul class="ul">
											<?php if(isset($v['imgarray'])): foreach($v['imgarray'] as $keys=>$value): ?>
											<li  data-url="<?php echo $value; ?>" data-index="<?php echo $keys; ?>" style="list-style: none;float: left">
												<?php if($value): ?>
												<a class="aa" href="<?php echo $value; ?>"><img src="<?php echo $value; ?>" data-url="<?php echo $value; ?>" style="width: 50px;height: 50px"></a>
												<?php endif; ?>
<!--												<i class="layui-icon layui-icon-close-fill"></i>-->
												<span class='delete_img'>x</span>
											</li>
											<?php endforeach; endif; ?>
										</ul>
									</td>
								</tr>
								<?php endforeach; endif; ?>
								</tbody>
							</table>
							<!---->
						</div>
					</div>
				</div>
				<div class="layui-layer layui-layer-page openClass layer-anim" id="imgAdd" type="page" times="9" showtime="0" contype="object" style="z-index: 19891023; width: 800px; height: 500px; top: 23.5px; left: 450px;display:none">
					<div id="" class="layui-layer-content" style="height: 447px;">
						<div id="selImg" class="tankuang layui-layer-wrap" style="">
							<h3>产品相册</h3> <div class="some-content-related-div" style="width: 100%; margin: 0px auto;">
							<div class="slimScrollDiv" style="position: relative; overflow: hidden; width: auto; ">
								<div class="inner-content-div2" style="overflow: hidden; width: auto; ">
									<ul class="proStationUl">
										<li data-url="http://39.105.120.226/images/2019/10/29/10334744/8fc425cf4fa14072b3a303f2d11f5234.jpg"><img src="http://39.105.120.226/images/2019/10/29/10334744/8fc425cf4fa14072b3a303f2d11f5234.jpg" alt="">
										</li>
									</ul>
								</div>
								<div class="slimScrollBar" style="background: rgb(40, 149, 229); width: 4px; position: absolute; top: 0px; opacity: 0.4; display: none; border-radius: 7px; z-index: 99; right: 1px; height: 400px;">

								</div>
								<div class="slimScrollRail" style="width: 4px; height: 100%; position: absolute; top: 0px; display: none; border-radius: 7px; background: rgb(4, 254, 233); opacity: 0.2; z-index: 90; right: 1px;">
								</div>
							</div>
						</div>
						</div>
					</div>
					<span class="layui-layer-setwin">
                        <a class="layui-layer-ico layui-layer-close layui-layer-close2 selectCancle" href="javascript:;"></a>
                    </span>
					<div class="layui-layer-btn layui-layer-btn-">
						<a class="layui-layer-btn0" id="selectAdd">确定</a>
						<a class="layui-layer-btn1 selectCancle" >取消</a>
					</div>
					<span class="layui-layer-resize"></span>
				</div>
				<div class="layui-layer layui-layer-page openClass layer-anim" id="imgShow" type="page" times="9" showtime="0" contype="object" style="z-index: 19891023; width: 800px; height: 500px; top: 23.5px; left: 450px;display:none">
					<img src="" id="imgDetail" style="width: 100%">
					<span class="layui-layer-resize"></span>
				</div>
				<!-- <script type="text/javascript">
					$(function(){
				　　　　　　$(document).bind("click",function(e){
				  　　　　　　  var target  = $(e.target);
				  　　　　　  　if(target.closest("#imgShow").length > 0){
				      　　　　　　   $("#imgShow").hide();
				 　　　　　　     }　　　　
				 　　　　　　})
				　　　　})
				</script> -->
				<script>
					var countAdd =0;
					$("#specif_content").on("click",".del",function(){
						// console.log()
						var ms = confirm('确认删除吗')
						if(ms){
							var id = $(this).attr('data-id')
							$(this).parents('tr').remove()
							var left = $('#specif_content').children('tr').length;
	                       if(left == 1){
	                        $('#childType').val('0')
	                       }
	                       $.ajax({
									url: "<?php echo url('admin/Product/variant_del'); ?>",
									type: 'post',
									data: {
										variant_id: id
									},
									dataType: 'json',
									success: function (result) {}
								})
						}
					})
					function changeVarType() {
						$aa = $("#variantType").val();
						return $aa;
					}
					$('#addVariant').on('click', function(){
						layer.open({
							type: 1,
							area: ['700px', '500px'],
							shadeClose: true, //点击遮罩关闭
							btn: ['添加', '取消']
							, yes: function (index, layero) {

								countAdd++
								var appendHtml = '';
								aa = changeVarType();
								arr = aa.split(",");
								if(arr[0]==""){
									alert('请选择变体')
									return false;
								}
								qq = $('#variantName').val();
								if(qq == 0){
									textArr =arr;
								}
								if(qq == 2){
									textArr1 =arr;
								}
								if(textArr.length<1 && textArr1.length<1){
									alert("变体值不能为空");
									return;
								}
								//删除变体
								var variant_id = ''
								for(var i=0;i<$('.variant_id').length;i++){
									variant_id += $('.variant_id').eq(i).val() +","
								}
								$.ajax({
									url: "<?php echo url('admin/Product/variant_del'); ?>",
									type: 'post',
									data: {
										variant_id: variant_id
									},
									dataType: 'json',
									success: function (result) {}
								})
								if(textArr.length>0 && textArr1.length<1){
                                    $('#childType').val(1)
									appendHtml += "<tr> <th>变体组合</th><th>SKU修正 </th> <th>加价（人民币）</th><th>库存</th><th>UPC/EAN</th><th>操作 </th> <th width='20%'> 选择图片</th><th>已选图片 </th></tr>"
									for(var i=0;i<textArr.length;i++){
										appendHtml += "<tr>"
										appendHtml += "<th>"+textArr[i]+"</th> <input type='hidden' value='"+textArr[i]+"' name='variant_combination["+i+"] '>"
										appendHtml +="<td>";
										// appendHtml +="   <input name='sku["+i+"]' value="+$goods_extra.goodsSku+" type='text' style='width: 90%;'>"
										appendHtml +="   <input name='sku["+i+"]' value='<?php echo $goods_extra['goodsSku']; ?>-"+i+"'type='text' style='width: 90%;' class='skuInput'>"
										appendHtml +="  </td>"
										appendHtml +=" <td>"
										appendHtml +=" <input name='markup["+i+"]'  type='text'  style='width: 90%;'>"
										appendHtml +=" </td>"
										appendHtml +=" <td >"
										appendHtml +="  <input name='stock["+i+"]' type='text'  style='width: 90%;' value="+Math.round(Math.random()*150+50) +">"
										appendHtml +=" </td>"
										appendHtml +=" <td>"
										appendHtml +="<input name='upc["+i+"]'  type='text'  style='width: 90%;' class='eanInput'>"
										appendHtml +=" </td>"
										appendHtml +=" <td>"
										appendHtml +=" <input type='button' data-index='0' value='删除' class='del' name='del' style='outline: none'>"
										appendHtml +=" </td>"
										appendHtml +=" <td >"
										appendHtml +=" <input type='button' value='选择图片' class='chan'>"
										appendHtml +=" <input type='button' value='一键添加' class='all'>"
										appendHtml +=" <input type='hidden' value='' class='imgAction' name='imgs["+i+"]'>"
										appendHtml +=" </td>"
										appendHtml +="<td > <ul class='ul'></ul>"
										appendHtml +=" </td>"
										appendHtml +=" </tr>"
									}
								}
								if(textArr.length<1 && textArr1.length>0){
                                    $('#childType').val(2)
									appendHtml += "<tr> <th>变体组合</th><th>SKU修正 </th> <th>加价（人民币）</th><th>库存</th><th>UPC/EAN</th><th>操作 </th> <th width='20%'> 选择图片</th><th>已选图片 </th></tr>"
									for(var i=0;i<textArr1.length;i++){
										appendHtml += "<tr>"
										appendHtml += "<th>"+textArr1[i]+"</th><input type='hidden' value='"+textArr1[i]+"' name='variant_combination["+i+"] '>"
										appendHtml +="<td>";
										appendHtml +="   <input name='sku["+i+"]' value='<?php echo $goods_extra['goodsSku']; ?>-"+i+"' type='text' style='width: 90%;' class='skuInput'>"
										appendHtml +="  </td>"
										appendHtml +=" <td>"
										appendHtml +=" <input name='markup["+i+"]'  type='text'  style='width: 90%;'>"
										appendHtml +=" </td>"
										appendHtml +=" <td >"
										appendHtml +="   <input name='stock["+i+"]' type='text'  style='width: 90%;' value="+Math.round(Math.random()*150+50)+">"
										appendHtml +=" </td>"
										appendHtml +=" <td>"
										appendHtml +=" <input name='upc["+i+"]' type='text'  style='width: 90%;' class='eanInput'>"
										appendHtml +=" </td>"
										appendHtml +=" <td>"
										appendHtml +=" <input type='button' data-index='0' value='删除' class='del' name='del' style='outline: none'>"
										appendHtml +=" </td>"
										appendHtml +=" <td >"
										appendHtml +=" <input type='button' value='选择图片' class='chan'>"
										appendHtml +=" <input type='button' value='一键添加' class='all'>"
										appendHtml +=" <input type='hidden' value='' class='imgAction' name='imgs["+i+"]'>"
										appendHtml +=" </td>"
										appendHtml +="<td ><ul class='ul'></ul>"
										appendHtml +=" </td>"
										appendHtml +=" </tr>"
									}
								}
								if(textArr.length>0 && textArr1.length>0){

                                    $('#childType').val(3)
                                    var count = Number(0);
									$('#specif_content').html('')
									appendHtml += "<tr> <th>变体组合</th><th>SKU修正 </th> <th>加价（人民币）</th><th>库存</th><th>UPC/EAN</th><th>操作 </th> <th width='20%'> 选择图片</th><th>已选图片 </th></tr>"
									for(var i=0;i<textArr.length;i++){
										for(var j=0;j<textArr1.length;j++){
											appendHtml += "<tr>"
											appendHtml += "<th>"+textArr[i]+"-"+textArr1[j]+"</th><input type='hidden' value='"+textArr[i]+"-"+textArr1[j]+"' name='variant_combination["+i+j+"] '>"
											appendHtml +="<td>";
											appendHtml +="   <input name='sku["+i+j+"]' value='<?php echo $goods_extra['goodsSku']; ?>-"+count+"'  type='text' style='width: 90%;' class='skuInput'>"
											appendHtml +="  </td>"
											appendHtml +=" <td>"
											appendHtml +=" <input name='markup["+i+j+"]'  type='text'  style='width: 90%;'>"
											appendHtml +=" </td>"
											appendHtml +=" <td >"
											appendHtml +="   <input name='stock["+i+j+"]' type='text'  style='width: 90%;' value="+Math.round(Math.random()*150+50) +">"
											appendHtml +=" </td>"
											appendHtml +=" <td>"
											appendHtml +=" <input name='upc["+i+j+"]' type='text'  style='width: 90%;' class='eanInput'>"
											appendHtml +=" </td>"
											appendHtml +=" <td>"
											appendHtml +=" <input type='button' data-index='0' value='删除' class='del' name='del' style='outline: none'>"
											appendHtml +=" </td>"
											appendHtml +=" <td >"
											appendHtml +=" <input type='button' value='选择图片' class='chan'>"
											appendHtml +=" <input type='button' value='一键添加' class='all'>"
											appendHtml +=" <input type='hidden' value='' class='imgAction' name='imgs["+i+j+"]'>"
											appendHtml +=" </td>"
											appendHtml +="<td ><ul class='ul'></ul>"
											appendHtml +=" </td>"
											appendHtml +=" </tr>"
											 count++;
										}

									}
								}
								if(countAdd>0){
									$('#specif_content').html('')
								}
								$('#specif_content').append(appendHtml)
								$('#specifica').attr('style','display:block');
								// var size = $("#size").val();
								// if (size == 1) {
								//     var html = '<span style="margin-bottom: 0px;" id="color"><a href="javascript:;" data-id="0" onmouseover="showClose(\'#colorClose\')" onmouseout="hiddenClose(\'#colorClose\')">颜色（color）</a><i\n' +
								//         '                                        class="fa fa-times-circle-o" id="colorClose"  aria-hidden="true" style="visibility:hidden;"></i></span>';
								//     $('.variantName').append(html);
								// } else {
								//     var html = '<span style="margin-bottom: 0px;" id="size"><a href="javascript:;" data-id="0" onmouseover="showClose(\'#sizeClose\')" onmouseout="hiddenClose(\'#sizeClose\')">尺寸（sizeNam）</a><i\n' +
								//         '                                        class="fa fa-times-circle-o" id="sizeClose"  aria-hidden="true" style="visibility:hidden;"></i></span>';
								//     $('.variantName').append(html);
								// }
								layer.closeAll();

							},
							content: '<div id="addVariant" class="tankuang" style="display: show;">\n' +
									'<h3>\n' +
									'添加变体\n' +
									'</h3>\n' +
									'<div>\n' +
									'<label for="">\n' +
									'变体名称\n' +
									'</label>\n' +
									'<select name="" id="variantName" placeholder="变体名称" onchange="gai()">\n' +
									'<option id ="color" value="0">\n' +
									'颜色（color）\n' +
									'</option>\n' +
									'<option id ="size" value="1">\n' +
									'尺寸（sizeNam）\n' +
									'</option>\n' +
									'</select>\n' +
									'</div>\n' +
									'<div>\n' +
									'<label for="">\n' +
									'变体值:(多个值用逗号隔开如:red,white,black)\n' +
									'</label>\n' +
									'<textarea name="" id="variantType" placeholder="变体名称" class="variantType" onchange="changeVarType()">\n' +
									'</textarea>\n' +
									'</div>\n' +
									'<div>\n' +
									'<label for="">\n' +
									'推荐：\n' +
									'</label>\n' +
									'<div id="tihuan">' +
									'<span data-val="Beige" onclick="addText(\'Beige\',1);">\n' +
									'米色\n' +
									'</span>\n' +
									'<span data-val="Black" onclick="addText(\'Black\',1);">\n' +
									'黑色\n' +
									'</span>\n' +
									'\<span data-val="Blue" onclick="addText(\'Blue\',1);">\n' +
									'蓝色\n' +
									'</span>\n' +
									'<span data-val="Bronze" onclick="addText(\'Bronze\',1);">\n' +
									'青铜\n' +
									'</span>\n' +
									'<span data-val="Brown" onclick="addText(\'Brown\',1);">\n' +
									'棕色\n' +
									'</span>\n' +
									'<span data-val="Clear" onclick="addText(\'Clear\',1);">\n' +
									'明确\n' +
									'</span>\n' +
									'<span data-val="Copper" onclick="addText(\'Copper\',1);">\n' +
									'铜\n' +
									'</span>\n' +
									'<span data-val="Cream" onclick="addText(\'Cream\',1);">\n' +
									'奶油\n' +
									'</span>\n' +
									'<span data-val="Gold" onclick="addText(\'Gold\',1);">\n' +
									'金\n' +
									'</span>\n' +
									'<span data-val="Green" onclick="addText(\'Green\',1);">\n' +
									'绿色\n' +
									'</span>\n' +
									'<span data-val="Grey" onclick="addText(\'Grey\',1);">\n' +
									'灰色\n' +
									'</span>\n' +
									'<span data-val="Metallic" onclick="addText(\'Grey\',1);">\n' +
									'金属\n' +
									'</span>\n' +
									'<span data-val="Multi-colored" onclick="addText(\'Multi-colored\',1);">\n' +
									'多色\n' +
									'</span>\n' +
									'<span data-val="Orange" onclick="addText(\'Orange\',1);">\n' +
									'橙子\n' +
									'</span>\n' +
									'<span data-val="Pink" onclick="addText(\'Pink\',1);">\n' +
									'粉\n' +
									'</span>\n' +
									'<span data-val="Purple" onclick="addText(\'Purple\',1);">\n' +
									'紫色\n' +
									'</span>\n' +
									'<span data-val="Red" onclick="addText(\'Red\',1);">\n' +
									'红\n' +
									'</span>\n' +
									'<span data-val="Silver" onclick="addText(\'Silver\',1);">\n' +
									'银\n' +
									'</span>\n' +
									'<span data-val="White" onclick="addText(\'White\',1);">\n' +
									' 白色\n' +
									'</span>\n' +
									'<span data-val="Yellow" onclick="addText(\'Yellow\',1);">\n' +
									'黄色\n' +
									'</span>\n' +
									'\n' +
									'</div>\n' +
									'</div>'

						});
					});


					function gai() {
						var size = $("#size").val();
						// textArr = [];
						$('#variantType').text('');
						if (size == 1) {
							var size = $("#size").val(2);
							$("#tihuan").html(
									'<span data-val="OneSize" onclick="addText(\'OneSize\',2);">\n' +
									'均码\n' +
									'</span>\n' +
									'<span data-val="S" onclick="addText(\'S\',2);">\n' +
									'S\n' +
									'</span>\n' +
									'<span data-val="M" onclick="addText(\'M\',2);">\n' +
									'M\n' +
									'</span>\n' +
									'<span data-val="L" onclick="addText(\'L\',2);">\n' +
									'L\n' +
									'</span>\n' +
									'\<span data-val="XL" onclick="addText(\'XL\',2);">\n' +
									'XL\n' +
									'</span>\n' +
									'<span data-val="XXL" onclick="addText(\'XXL\',2);">\n' +
									'XXL\n' +
									'</span>\n' +
									'<span data-val="XXXL" onclick="addText(\'XXXL\',2);">\n' +
									'XXXL\n' +
									'</span>\n' +
									'<span data-val="XXXXL" onclick="addText(\'XXXXL\',2);">\n' +
									'XXXXL\n' +
									'</span>\n')
						} else {
							var size = $("#size").val(1);
							$("#tihuan").html(
									'<span data-val="Beige" onclick="addText(\'Beige\',1);">\n' +
									'米色\n' +
									'</span>\n' +
									'<span data-val="Black" onclick="addText(\'Black\',1);">\n' +
									'黑色\n' +
									'</span>\n' +
									'\<span data-val="Blue" onclick="addText(\'Blue\',1);">\n' +
									'蓝色\n' +
									'</span>\n' +
									'<span data-val="Bronze" onclick="addText(\'Bronze\',1);">\n' +
									'青铜\n' +
									'</span>\n' +
									'<span data-val="Brown" onclick="addText(\'Brown\',1);">\n' +
									'棕色\n' +
									'</span>\n' +
									'<span data-val="Clear" onclick="addText(\'Clear\',1);">\n' +
									'明确\n' +
									'</span>\n' +
									'<span data-val="Copper" onclick="addText(\'Copper\',1);">\n' +
									'铜\n' +
									'</span>\n' +
									'<span data-val="Cream" onclick="addText(\'Cream\',1);">\n' +
									'奶油\n' +
									'</span>\n' +
									'<span data-val="Gold" onclick="addText(\'Gold\',1);">\n' +
									'金\n' +
									'</span>\n' +
									'<span data-val="Green" onclick="addText(\'Green\',1);">\n' +
									'绿色\n' +
									'</span>\n' +
									'<span data-val="Grey" onclick="addText(\'Grey\',1);">\n' +
									'灰色\n' +
									'</span>\n' +
									'<span data-val="Metallic" onclick="addText(\'Grey\',1);">\n' +
									'金属\n' +
									'</span>\n' +
									'<span data-val="Multi-colored" onclick="addText(\'Multi-colored\',1);">\n' +
									'多色\n' +
									'</span>\n' +
									'<span data-val="Orange" onclick="addText(\'Orange\',1);">\n' +
									'橙子\n' +
									'</span>\n' +
									'<span data-val="Pink" onclick="addText(\'Pink\',1);">\n' +
									'粉\n' +
									'</span>\n' +
									'<span data-val="Purple" onclick="addText(\'Purple\',1);">\n' +
									'紫色\n' +
									'</span>\n' +
									'<span data-val="Red" onclick="addText(\'Red\',1);">\n' +
									'红\n' +
									'</span>\n' +
									'<span data-val="Silver" onclick="addText(\'Silver\',1);">\n' +
									'银\n' +
									'</span>\n' +
									'<span data-val="White" onclick="addText(\'White\',1);">\n' +
									' 白色\n' +
									'</span>\n' +
									'<span data-val="Yellow" onclick="addText(\'Yellow\',1);">\n' +
									'黄色\n' +
									'</span>\n')
						}


					}
					// 点击添加变体信息

					$(function() {
						$("#tihuan span [data-val='1']").css('backgroundColor:red');

					});
					var textArr = [];
					var textArr1 = [];
					function addText(value,type) {
						if(type == 1){
							textArr.push(value);
							var textString = textArr.join(',');
						}else{
							textArr1.push(value);
							var textString = textArr1.join(',');
						}
						$('#variantType').text(textString);
					}
					$('#tihuan').on('click', function(){
						console.log($(event.target).text());

						var _text = $('textarea.variantType').eq(1).val();
						if(_text != ''){
							_text += ','+$(event.target).attr('data-val');
						}else {
							_text += $(event.target).attr('data-val');
						}
						$('textarea.variantType').val(_text);
					})
					// 选择图片
					$("#specif_content").on("click",".chan",function(){
						$(this).parent().parent().addClass("select").siblings().removeClass("select");
						var imgPath = [];
						var imagepath = $('#imagepath').val()
						if(typeof imagepath == "undefined" || imagepath == null || imagepath == ""){
							alert('请先上传产品图片');
							return;
						}
						$('#imgAdd').show()
						imgPath = imagepath.split(',')
						var imgHtml = '';
						$('.proStationUl').html('')
						for(var i=0;i<imgPath.length;i++){
							imgHtml+="<li class='imgLi' data-url="+imgPath[i]+">"
							imgHtml+= " <img src="+imgPath[i]+">"
							imgHtml+= "</li>";
						}
						$('.proStationUl').html(imgHtml)
						// console.log(imgPath)
					})
					//选中图片
					$('.proStationUl').on("click",".imgLi",function(){
						$(this).toggleClass("action");
					})
					//确定添加图片
					$("#selectAdd").click(function(){
						
						$('#imgAdd').hide()
						//获取选中图片
						var action = $("li").hasClass('action')
						var imgAction = '';
						var imgUl ="";
						$("li.action").each(function(){
							imgAction+=$(this).attr('data-url')+",";
							$('tr.select').find(".imgAction").val(imgAction)
							imgUl+="<li data-url="+$(this).attr('data-url')+" data-index='0' style='list-style: none;float: left'>"
							imgUl+="<img src="+$(this).attr('data-url')+" data-url="+$(this).attr('data-url')+" style='width: 50px;height: 50px'>"
							imgUl+="<span class='delete_img'>x</span>"
							// imgUl+="<i class='layui-icon layui-icon-close-fill'></i>"
							imgUl+="</li>"
						});
						$('tr.select').find(".ul").html('')
						$('tr.select').find(".ul").html(imgUl)

					})
					//一键添加图片
					$("#specif_content").on("click",".all",function(){
						$(this).parent().parent().addClass("select").siblings().removeClass("select");
						var imagepath = $('#imagepath').val()
						if(typeof imagepath == "undefined" || imagepath == null || imagepath == ""){
							alert('请先上传产品图片');
							return;
						}
						var imagepath = $('#imagepath').val()
						imgArray = imagepath.split(',')
						var imgUl ="";
						var imgAction = '';
						console.log(imgArray)
						for(var i=0;i<imgArray.length;i++){
							// imgAction+=imgArray[i]+",";
							// imgUl+="<li data-url="+imgArray[i]+" data-index='0' style='list-style: none;float: left'>"
							// imgUl+="<img src="+imgArray[i]+" data-url="+imgArray[i]+" style='width: 50px;height: 50px'>"
							// // imgUl+="<i class='layui-icon layui-icon-close-fill'></i>"
							// imgUl+="<span class='delete_img'>x</span>"

							// imgUl+="</li>"
							imgAction+=imgArray[i]+",";
							imgUl+="<li data-url="+imgArray[i]+" data-index='0' style='list-style: none;float: left'>"
							imgUl+="<a class='aa' href="+imgArray[i]+">"
							imgUl+="<img src="+imgArray[i]+" data-url="+imgArray[i]+" style='width: 50px;height: 50px'>"
							imgUl+="</a>"
							// imgUl+="<i class='layui-icon layui-icon-close-fill'></i>"
							imgUl+="<span class='delete_img'>x</span>"

							imgUl+="</li>"
						}
						$('tr.select').find(".imgAction").val(imgAction)
						$(this).parent().parent().find(".ul").html('')
						$(this).parent().parent().find(".ul").html(imgUl)
					})
					//取消添加图片
					$('.selectCancle').click(function(){
						$('#imgAdd').hide()
					})
					//修正ean
					$('#reloadEan').click(function(){
						var length = $('#specif_content').children('tr').length
						$.ajax({
							url:'<?php echo url('admin/Product/reloadEan'); ?>',
							data:{length:length},
							type:'post',
							dataType: 'json',
							success:function(result){
								if(result.status=='success'){
									$('#goodsEan').val(result.data[0]['bianma'])
									$('.eanInput').each(function(i,dom){
										var k = i+1
										$(this).val(result.data[k]['bianma'])

									})
								}else{
									alert('更换失败')
								}
							}
						},'json');
					})
					//修正sku
					$('#reloadSku').click(function(){
						// var length = $('#specif_content').children('tr').length
						// $.ajax({
						// 	url:'<?php echo url('admin/Product/reloadSku'); ?>',
						// 	data:{length:length},
						// 	type:'post',
						// 	dataType: 'json',
						// 	success:function(result){
						// 		if(result.status=='success'){
						// 			$('#goodsSku').val(result.data[0]['sku'])
						// 			$('.skuInput').each(function(i,dom){
						// 				var k = i+1
						// 				$(this).val(result.data[k]['sku'])
						//
						// 			})
						// 		}else{
						// 			alert('更换失败')
						// 		}
						// 	}
						// },'json');
						var correctSku = $('#correctSku').val()
						//主体原sku
						var goodsSku =  $('#goodsSku').val()
						var newSku = goodsSku+"-"+correctSku
						//修改主体sku
						$('#goodsSku').val(newSku)
						var len = $('.skuInput').length
						$.each($('.skuInput'),function(i,val){
							newSku = $(this).val()+"-"+correctSku
							$(this).val(newSku)
						})
					})
				</script>
				<script>
					$(function(){
						$("ul li .aa").hover(function(){
							$(this).append("<p id='pic'><img src='"+this.href+"' id='pic1'></p>");
							$("ul li").mousemove(function(e){
								$("#pic").css({
									/*"top":(e.pageY-1900)+"px",
									"left":(e.pageX-2300)+"px"*/
									"margin-left":"-460px"
								}).fadeIn("fast");
								// $("#pic").fadeIn("fast");
							});
						},function(){
							$("#pic").remove();
						});
					});
				</script>
				<style>
					img{cursor: pointer;z-index:999;}
					#pic{position: absolute; display: none;z-index:999;}
					#pic1{ z-index:999;width: 400px; height: 400px; border-radius: 5px; -webkit-box-shadow: 5px 5px 5px 5px hsla(0,0%,5%,1.00); box-shadow: 5px 5px 5px 0px hsla(0,0%,5%,0.3); }
				</style>
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
					<li >
						<a data-toggle="tab" href="#zh">
							中文
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
					$(function() {
						//售价、运费计算
						$(document).ready(function () {

							//获取文本内容和长度函数
							function txtCount(el) {
								var val = el.value;
								var eLen = val.length;
								return eLen;
							}

							var el = document.getElementById('title_en');
							el.addEventListener('input', function () {
								var len = txtCount(this); //   调用函数
								document.getElementById('textCount_en').innerHTML = len;
							});
							var el = document.getElementById('title_fra');
							el.addEventListener('input', function () {
								var len = txtCount(this); //   调用函数
								document.getElementById('textCount_fra').innerHTML = len;
							});
							var el = document.getElementById('title_de');
							el.addEventListener('input', function () {
								var len = txtCount(this); //   调用函数
								document.getElementById('textCount_de').innerHTML = len;
							});
							var el = document.getElementById('title_it');
							el.addEventListener('input', function () {
								var len = txtCount(this); //   调用函数
								document.getElementById('textCount_it').innerHTML = len;
							});
							var el = document.getElementById('title_es');
							el.addEventListener('input', function () {
								var len = txtCount(this); //   调用函数
								document.getElementById('textCount_es').innerHTML = len;
							});
							var el = document.getElementById('title_jp');
							el.addEventListener('input', function () {
								var len = txtCount(this); //   调用函数
								document.getElementById('textCount_jp').innerHTML = len;
							});
							var el = document.getElementById('title_zh');
							el.addEventListener('input', function () {
								var len = txtCount(this); //   调用函数
								document.getElementById('textCount').innerHTML = len;
							});


							var el = document.getElementById('keyword_en');
							el.addEventListener('input', function () {
								var len = txtCount(this); //   调用函数
								document.getElementById('textCount_gjc_en').innerHTML = len;
							});
							var el = document.getElementById('keyword_fra');
							el.addEventListener('input', function () {
								var len = txtCount(this); //   调用函数
								document.getElementById('textCount_gjc_fra').innerHTML = len;
							});
							var el = document.getElementById('keyword_de');
							el.addEventListener('input', function () {
								var len = txtCount(this); //   调用函数
								document.getElementById('textCount_gjc_de').innerHTML = len;
							});
							var el = document.getElementById('keyword_it');
							el.addEventListener('input', function () {
								var len = txtCount(this); //   调用函数
								document.getElementById('textCount_gjc_it').innerHTML = len;
							});
							var el = document.getElementById('keyword_jp');
							el.addEventListener('input', function () {
								var len = txtCount(this); //   调用函数
								document.getElementById('textCount_gjc_jp').innerHTML = len;
							});
							var el = document.getElementById('keyword_zh');
							el.addEventListener('input', function () {
								var len = txtCount(this); //   调用函数
								document.getElementById('textCount_gjc').innerHTML = len;
							});


						})
					})

				</script>


				<!---英文内容-->
				<div id="en" class="tab-pane fade  in active">

						<input type="hidden" name="id_en" value="<?php echo $language['0']['id']; ?>">
					<div class="form-group">
						<label class="col-sm-2 control-label no-padding-right" for="form-field-1">  </label><div class="col-sm-10"> 标题：(<span id="textCount_en"><?php echo strlen($language['0']['TITLE']); ?></span>/<span style="color:red;">200</span>) </div>
					</div>
					<div class="form-group">
						<label class="col-sm-2 control-label no-padding-right" for="form-field-1"> <button class="btn btn-info" type="button" style="margin-left:20px;margin-bottom: 20px;" onclick="fanyi('entitle')">一键翻译</button> </label>
						<div class="col-sm-10">

							<textarea name="title_en" cols="20" rows="2" class="col-xs-10 col-sm-8 limitedone" id="title_en"  style="margin: 0px; height: 80px; width: 800px;" placeholder="标题"><?php echo $language['0']['TITLE']; ?></textarea>
						</div>
					</div>
					<div class="space-4"></div>
					<div class="form-group">
						<label class="col-sm-2 control-label no-padding-right" for="form-field-1">  </label><div class="col-sm-10"> 关键字：(<span id="textCount_gjc_en"><?php echo strlen($language['0']['key_words']); ?></span>/<span style="color:red;">250</span>) </div>
					</div>
					<div class="form-group">
						<label class="col-sm-2 control-label no-padding-right" for="form-field-1"> <button class="btn btn-info" type="button" style="margin-left:20px;margin-bottom: 20px;" onclick="fanyi('enkey')">一键翻译</button> </label>
						<div class="col-sm-10">

							<textarea name="keyword_en" cols="20" rows="2" class="col-xs-10 col-sm-8 limitedone" id="keyword_en"  style="margin: 0px; height: 200px; width: 800px;" placeholder="关键字" ><?php echo $language['0']['key_words']; ?></textarea>
						</div>
					</div>
					<div class="space-4"></div>
					<div class="form-group">
						<label class="col-sm-2 control-label no-padding-right" for="form-field-1">  </label><div class="col-sm-10"> 要点： </div>
					</div>
					<div class="form-group">
						<label class="col-sm-2 control-label no-padding-right" for="form-field-1"> <button class="btn btn-info" type="button" style="margin-left:20px;margin-bottom: 20px;" onclick="fanyi('enpot')">一键翻译</button> </label>
						<div class="col-sm-10">

							<textarea name="keypotins_en" cols="20" rows="2" class="col-xs-10 col-sm-8 limitedone" id="keypotins_en"  style="margin: 0px; height: 200px; width: 800px;" placeholder="要点说明不超过5行"><?php echo $language['0']['MAIN_POINTS']; ?></textarea>
						</div>
					</div>
					<div class="space-4"></div>
					<div class="form-group">
						<label class="col-sm-2 control-label no-padding-right" for="form-field-1">  </label><div class="col-sm-10">描述： </div>
					</div>
					<div class="form-group">
						<label class="col-sm-2 control-label no-padding-right" for="form-field-1"> <button class="btn btn-info" type="button" style="margin-left:20px;margin-bottom: 20px;" onclick="fanyi('endes')">一键翻译</button> </label>
						<div class="col-sm-10">

							<textarea name="description_en" cols="20" rows="2"  class="col-xs-10 col-sm-8 limitedone" id="description_en"  style="margin: 0px; height: 200px; width: 800px;" placeholder="描述"><?php echo $language['0']['DESCRIPTION']; ?></textarea>
						</div>
					</div>
					<div class="space-4"></div>
				</div>




				<div id="fr" class="tab-pane fade">

						<input type="hidden" name="id_fra" value="<?php echo $language['1']['id']; ?>">
					<div class="form-group">
						<label class="col-sm-2 control-label no-padding-right" for="form-field-1">  </label><div class="col-sm-10"> 标题：(<span id="textCount_fra"><?php echo strlen($language['1']['TITLE']); ?></span>/<span style="color:red;">200</span>) </div>
					</div>
					<div class="form-group">
						<label class="col-sm-2 control-label no-padding-right" for="form-field-1">  </label>
						<div class="col-sm-10">

							<textarea name="title_fra" cols="20" rows="2"   class="col-xs-10 col-sm-8 limitedone" id="title_fra"  style="margin: 0px; height: 80px; width: 800px;" placeholder="标题"><?php echo $language['1']['TITLE']; ?></textarea>
						</div>
					</div>
					<div class="space-4"></div>
					<div class="form-group">
						<label class="col-sm-2 control-label no-padding-right" for="form-field-1">  </label><div class="col-sm-10"> 关键字：(<span id="textCount_gjc_fra"><?php echo strlen($language['1']['key_words']); ?></span>/<span style="color:red;">250</span>) </div>
					</div>
					<div class="form-group">
						<label class="col-sm-2 control-label no-padding-right" for="form-field-1">  </label>
						<div class="col-sm-10">

							<textarea name="keyword_fra" cols="20" rows="2"  class="col-xs-10 col-sm-8 limitedone" id="keyword_fra"  style="margin: 0px; height: 200px; width: 800px;" placeholder="关键字"><?php echo $language['1']['key_words']; ?></textarea>
						</div>
					</div>
					<div class="space-4"></div>
					<div class="form-group">
						<label class="col-sm-2 control-label no-padding-right" for="form-field-1">  </label><div class="col-sm-10"> 要点： </div>
					</div>
					<div class="form-group">
						<label class="col-sm-2 control-label no-padding-right" for="form-field-1">  </label>
						<div class="col-sm-10">

							<textarea name="keypotins_fra" cols="20" rows="2"  class="col-xs-10 col-sm-8 limitedone" id="keypotins_fra"  style="margin: 0px; height: 200px; width: 800px;" placeholder="要点说明不超过5行"><?php echo $language['1']['MAIN_POINTS']; ?></textarea>
						</div>
					</div>
					<div class="space-4"></div>
					<div class="form-group">
						<label class="col-sm-2 control-label no-padding-right" for="form-field-1">  </label><div class="col-sm-10">描述： </div>
					</div>
					<div class="form-group">
						<label class="col-sm-2 control-label no-padding-right" for="form-field-1">  </label>
						<div class="col-sm-10">

							<textarea name="description_fra" cols="20" rows="2"  class="col-xs-10 col-sm-8 limitedone" id="description_fra"  style="margin: 0px; height: 200px; width: 800px;" placeholder="描述"><?php echo $language['1']['DESCRIPTION']; ?></textarea>
						</div>
					</div>
					<div class="space-4"></div>
				</div>


				<div id="dy" class="tab-pane fade">

						<input type="hidden" name="id_de" value="<?php echo $language['2']['id']; ?>">
					<div class="form-group">
						<label class="col-sm-2 control-label no-padding-right" for="form-field-1">  </label><div class="col-sm-10"> 标题：(<span id="textCount_de"><?php echo strlen($language['2']['TITLE']); ?></span>/<span style="color:red;">200</span>) </div>
					</div>

						<input type="hidden" name="id_de" value="<?php echo $language['2']['id']; ?>">
					<div class="form-group">
						<label class="col-sm-2 control-label no-padding-right" for="form-field-1">  </label>
						<div class="col-sm-10">

							<textarea name="title_de" id="title_de"  cols="20" rows="2" class="col-xs-10 col-sm-8 limitedone"  style="margin: 0px; height: 80px; width: 800px;" placeholder="标题"><?php echo $language['2']['TITLE']; ?></textarea>
						</div>
					</div>
					<div class="space-4"></div>
					<div class="form-group">
						<label class="col-sm-2 control-label no-padding-right" for="form-field-1">  </label><div class="col-sm-10"> 关键字：(<span id="textCount_gjc_de"><?php echo strlen($language['2']['key_words']); ?></span>/<span style="color:red;">250</span>) </div>
					</div>
					<div class="form-group">
						<label class="col-sm-2 control-label no-padding-right" for="form-field-1">  </label>
						<div class="col-sm-10">

							<textarea name="keyword_de" cols="20" rows="2" class="col-xs-10 col-sm-8 limitedone" id="keyword_de"  style="margin: 0px; height: 200px; width: 800px;" placeholder="关键字"><?php echo $language['2']['key_words']; ?></textarea>
						</div>
					</div>
					<div class="space-4"></div>
					<div class="form-group">
						<label class="col-sm-2 control-label no-padding-right" for="form-field-1">  </label><div class="col-sm-10"> 要点： </div>
					</div>
					<div class="form-group">
						<label class="col-sm-2 control-label no-padding-right" for="form-field-1">  </label>
						<div class="col-sm-10">

							<textarea name="keypotins_de" cols="20" rows="2" class="col-xs-10 col-sm-8 limitedone" id="keypotins_de"  style="margin: 0px; height: 200px; width: 800px;" placeholder="要点说明不超过5行"><?php echo $language['2']['MAIN_POINTS']; ?></textarea>
						</div>
					</div>
					<div class="space-4"></div>
					<div class="form-group">
						<label class="col-sm-2 control-label no-padding-right" for="form-field-1">  </label><div class="col-sm-10">描述： </div>
					</div>
					<div class="form-group">
						<label class="col-sm-2 control-label no-padding-right" for="form-field-1">  </label>
						<div class="col-sm-10">

							<textarea name="description_de" cols="20" rows="2" class="col-xs-10 col-sm-8 limitedone" id="description_de"  style="margin: 0px; height: 200px; width: 800px;" placeholder="描述"><?php echo $language['2']['DESCRIPTION']; ?></textarea>
						</div>
					</div>
					<div class="space-4"></div>
				</div>

				<div id="ydl" class="tab-pane fade">

						<input type="hidden" name="id_it" value="<?php echo $language['4']['id']; ?>">
					<div class="form-group">
						<label class="col-sm-2 control-label no-padding-right" for="form-field-1">  </label><div class="col-sm-10"> 标题：(<span id="textCount_it"><?php echo strlen($language['4']['TITLE']); ?></span>/<span style="color:red;">200</span>) </div>
					</div>
					<div class="form-group">
						<label class="col-sm-2 control-label no-padding-right" for="form-field-1">  </label>
						<div class="col-sm-10">

							<textarea name="title_it" cols="20" rows="2" class="col-xs-10 col-sm-8 limitedone"  id="title_it"  style="margin: 0px; height: 80px; width: 800px;" placeholder="标题"><?php echo $language['4']['TITLE']; ?></textarea>
						</div>
					</div>
					<div class="space-4"></div>
					<div class="form-group">
						<label class="col-sm-2 control-label no-padding-right" for="form-field-1">  </label><div class="col-sm-10"> 关键字：(<span id="textCount_gjc_it"><?php echo strlen($language['4']['key_words']); ?></span>/<span style="color:red;">250</span>) </div>
					</div>
					<div class="form-group">
						<label class="col-sm-2 control-label no-padding-right" for="form-field-1">  </label>
						<div class="col-sm-10">

							<textarea name="keyword_it" cols="20" rows="2" class="col-xs-10 col-sm-8 limitedone" id="keyword_it"  style="margin: 0px; height: 200px; width: 800px;" placeholder="关键字"><?php echo $language['4']['key_words']; ?></textarea>
						</div>
					</div>
					<div class="space-4"></div>
					<div class="form-group">
						<label class="col-sm-2 control-label no-padding-right" for="form-field-1">  </label><div class="col-sm-10"> 要点： </div>
					</div>
					<div class="form-group">
						<label class="col-sm-2 control-label no-padding-right" for="form-field-1">  </label>
						<div class="col-sm-10">

							<textarea name="keypotins_it" cols="20" rows="2" class="col-xs-10 col-sm-8 limitedone" id="keypotins_it"  style="margin: 0px; height: 200px; width: 800px;" placeholder="要点说明不超过5行"><?php echo $language['4']['MAIN_POINTS']; ?></textarea>
						</div>
					</div>
					<div class="space-4"></div>
					<div class="form-group">
						<label class="col-sm-2 control-label no-padding-right" for="form-field-1">  </label><div class="col-sm-10">描述： </div>
					</div>
					<div class="form-group">
						<label class="col-sm-2 control-label no-padding-right" for="form-field-1">  </label>
						<div class="col-sm-10">

							<textarea name="description_it" cols="20" rows="2" class="col-xs-10 col-sm-8 limitedone" id="description_it"  style="margin: 0px; height: 200px; width: 800px;" placeholder="描述"><?php echo $language['4']['DESCRIPTION']; ?></textarea>
						</div>
					</div>
					<div class="space-4"></div>
				</div>


				<div id="xby" class="tab-pane fade">

						<input type="hidden" name="id_es" value="<?php echo $language['3']['id']; ?>">
					<div class="form-group">
						<label class="col-sm-2 control-label no-padding-right" for="form-field-1">  </label><div class="col-sm-10"> 标题：(<span id="textCount_es"><?php echo strlen($language['3']['TITLE']); ?></span>/<span style="color:red;">200</span>) </div>
					</div>
					<div class="form-group">
						<label class="col-sm-2 control-label no-padding-right" for="form-field-1">  </label>
						<div class="col-sm-10">

							<textarea name="title_es" cols="20" rows="2" class="col-xs-10 col-sm-8 limitedone"  id="title_es"  style="margin: 0px; height: 80px; width: 800px;" placeholder="标题"><?php echo $language['3']['TITLE']; ?></textarea>
						</div>
					</div>
					<div class="space-4"></div>
					<div class="form-group">
						<label class="col-sm-2 control-label no-padding-right" for="form-field-1">  </label><div class="col-sm-10"> 关键字：(<span id="textCount_gjc_es"><?php echo strlen($language['3']['key_words']); ?></span>/<span style="color:red;">250</span>) </div>
					</div>
					<div class="form-group">
						<label class="col-sm-2 control-label no-padding-right" for="form-field-1">  </label>
						<div class="col-sm-10">

							<textarea name="keyword_es" cols="20" rows="2" class="col-xs-10 col-sm-8 limitedone" id="keyword_es"  style="margin: 0px; height: 200px; width: 800px;" placeholder="关键字"><?php echo $language['3']['key_words']; ?></textarea>
						</div>
					</div>
					<div class="space-4"></div>
					<div class="form-group">
						<label class="col-sm-2 control-label no-padding-right" for="form-field-1">  </label><div class="col-sm-10"> 要点： </div>
					</div>
					<div class="form-group">
						<label class="col-sm-2 control-label no-padding-right" for="form-field-1">  </label>
						<div class="col-sm-10">

							<textarea name="keypotins_es" cols="20" rows="2" class="col-xs-10 col-sm-8 limitedone" id="keypotins_es"  style="margin: 0px; height: 200px; width: 800px;" placeholder="要点说明不超过5行"><?php echo $language['3']['MAIN_POINTS']; ?></textarea>
						</div>
					</div>
					<div class="space-4"></div>
					<div class="form-group">
						<label class="col-sm-2 control-label no-padding-right" for="form-field-1">  </label><div class="col-sm-10">描述： </div>
					</div>
					<div class="form-group">
						<label class="col-sm-2 control-label no-padding-right" for="form-field-1">  </label>
						<div class="col-sm-10">

							<textarea name="description_es" cols="20" rows="2" class="col-xs-10 col-sm-8 limitedone" id="description_es"  style="margin: 0px; height: 200px; width: 800px;" placeholder="描述"><?php echo $language['3']['DESCRIPTION']; ?></textarea>
						</div>
					</div>
					<div class="space-4"></div>
				</div>




				<div id="ry" class="tab-pane fade">

						<input type="hidden" name="id_jp" value="<?php echo $language['5']['id']; ?>">
					<div class="form-group">
						<label class="col-sm-2 control-label no-padding-right" for="form-field-1">  </label><div class="col-sm-10"> 标题：(<span id="textCount_jp"><?php echo strlen($language['5']['TITLE']); ?></span>/<span style="color:red;">100</span>) </div>
					</div>
					<div class="form-group">
						<label class="col-sm-2 control-label no-padding-right" for="form-field-1">  </label>
						<div class="col-sm-10">

							<textarea name="title_jp" cols="20" rows="2" class="col-xs-10 col-sm-8 limitedone"  id="title_jp"  style="margin: 0px; height: 80px; width: 800px;" placeholder="标题"><?php echo $language['5']['TITLE']; ?></textarea>
						</div>
					</div>
					<div class="space-4"></div>
					<div class="form-group">
						<label class="col-sm-2 control-label no-padding-right" for="form-field-1">  </label><div class="col-sm-10"> 关键字：(<span id="textCount_gjc_jp"><?php echo strlen($language['5']['key_words']); ?></span>/<span style="color:red;">80</span>) </div>
					</div>
					<div class="form-group">
						<label class="col-sm-2 control-label no-padding-right" for="form-field-1">  </label>
						<div class="col-sm-10">

							<textarea name="keyword_jp" cols="20" rows="2" class="col-xs-10 col-sm-8 limitedone" id="keyword_jp"  style="margin: 0px; height: 200px; width: 800px;" placeholder="关键字"><?php echo $language['5']['key_words']; ?></textarea>
						</div>
					</div>
					<div class="space-4"></div>
					<div class="form-group">
						<label class="col-sm-2 control-label no-padding-right" for="form-field-1">  </label><div class="col-sm-10"> 要点： </div>
					</div>
					<div class="form-group">
						<label class="col-sm-2 control-label no-padding-right" for="form-field-1">  </label>
						<div class="col-sm-10">

							<textarea name="keypotins_jp" cols="20" rows="2" class="col-xs-10 col-sm-8 limitedone" id="keypotins_jp"  style="margin: 0px; height: 200px; width: 800px;" placeholder="要点说明不超过5行"><?php echo $language['5']['MAIN_POINTS']; ?></textarea>
						</div>
					</div>
					<div class="space-4"></div>
					<div class="form-group">
						<label class="col-sm-2 control-label no-padding-right" for="form-field-1">  </label><div class="col-sm-10">描述： </div>
					</div>
					<div class="form-group">
						<label class="col-sm-2 control-label no-padding-right" for="form-field-1">  </label>
						<div class="col-sm-10">

							<textarea name="description_jp" cols="20" rows="2" class="col-xs-10 col-sm-8 limitedone" id="description_jp"  style="margin: 0px; height: 200px; width: 800px;" placeholder="描述"><?php echo $language['5']['DESCRIPTION']; ?></textarea>
						</div>
					</div>
					<div class="space-4"></div>
				</div>

				<div id="zh" class="tab-pane fade">
					<!--<button class="btn btn-info" type="button" style="margin-left:200px;margin-bottom: 20px;" onclick="titleCase('title_zh')">

						首字母大写
					</button>-->
					<!---中文内容-->
					<div id="loading" ></div>
					<style>
						#loading{
							text-align: center;
							position: absolute;
							left: 50%;
							top: 50%;
							transform: translate(-50%, -50%);
						}
					</style>
					<div class="form-group">
						<label class="col-sm-2 control-label no-padding-right" for="form-field-1">  </label><div class="col-sm-10"> 标题：(<span id="textCount"><?php echo strlen($language['6']['TITLE']); ?></span>/<span style="color:red;">200</span>) </div>
					</div>

					<div class="form-group">
						<input type="hidden" name="id_zh" value="<?php echo $language['6']['id']; ?>">
						<label class="col-sm-2 control-label no-padding-right" for="form-field-1"><button class="btn btn-info" type="button" style="margin-left:20px;margin-bottom: 20px;" onclick="fanyi('zhtitle')">一键翻译</button>  </label>
						<div class="col-sm-10">

							<textarea name="title_zh" cols="20" rows="2" maxlength="200o" class="col-xs-10 col-sm-8 limitedone" id="title_zh" style="margin: 0px; height: 80px; width: 800px;" placeholder="标题"><?php echo $language['6']['TITLE']; ?></textarea>
						</div>
					</div>
					<div class="space-4"></div>
					<div class="form-group">
						<label class="col-sm-2 control-label no-padding-right" for="form-field-1">  </label>
						<div class="col-sm-10"> 关键字：(<span id="textCount_gjc"><?php echo strlen($language['6']['key_words']); ?></span>/<span style="color:red;">250</span>) </div>
					</div>
					<div class="form-group">
						<label class="col-sm-2 control-label no-padding-right" for="form-field-1"> <button class="btn btn-info" type="button" style="margin-left:20px;margin-bottom: 20px;" onclick="fanyi('zhkey')">一键翻译</button> </label>
						<div class="col-sm-10">

							<textarea name="keyword_zh" cols="20" rows="2" class="col-xs-10 col-sm-8 limitedone" id="keyword_zh"  style="margin: 0px; height: 200px; width: 800px;" placeholder="关键字"><?php echo $language['6']['key_words']; ?></textarea>
						</div>
					</div>
					<div class="space-4"></div>
					<div class="form-group">
						<label class="col-sm-2 control-label no-padding-right" for="form-field-1">  </label><div class="col-sm-10"> 要点： </div>
					</div>
					<div class="form-group">
						<label class="col-sm-2 control-label no-padding-right" for="form-field-1"> <button class="btn btn-info" type="button" style="margin-left:20px;margin-bottom: 20px;" onclick="fanyi('zhpot')">一键翻译</button> </label>
						<div class="col-sm-10">

							<textarea name="keypotins_zh" cols="20" rows="2" class="col-xs-10 col-sm-8 limitedone" id="keypotins_zh"  style="margin: 0px; height: 200px; width: 800px;" placeholder="要点说明不超过5行"><?php echo $language['6']['MAIN_POINTS']; ?></textarea>
						</div>
					</div>
					<div class="space-4"></div>
					<div class="form-group">
						<label class="col-sm-2 control-label no-padding-right" for="form-field-1">  </label><div class="col-sm-10">描述： </div>
					</div>
					<div class="form-group">
						<label class="col-sm-2 control-label no-padding-right" for="form-field-1"> <button class="btn btn-info" type="button" style="margin-left:20px;margin-bottom: 20px;" onclick="fanyi('zhdes')">一键翻译</button> </label>
						<div class="col-sm-10">

							<textarea name="description_zh" cols="20" rows="2" class="col-xs-10 col-sm-8 limitedone" id="description_zh"  style="margin: 0px; height: 200px; width: 800px;" placeholder="描述"><?php echo $language['6']['DESCRIPTION']; ?></textarea>
						</div>
					</div>
					<div class="space-4"></div>
				</div>

				<!--<div class="clearfix form-actions">
					<div class="col-md-offset-3 col-md-9">
						<input class="ace ace-checkbox-2" name="continue" type="checkbox" value="1">
						<span class="lbl"> 发布后继续</span>
						<button class="btn btn-info" type="submit">
							<i class="ace-icon fa fa-check bigger-110"></i>
							保存
						</button>
						
					</div>
				</div>-->
			</form>

			<!---------------------------------------------------------亚马逊上传开始----------------------------------------------------------------->

			<form method="post" action="<?php echo url('admin/feed/creatXml'); ?>" >


				<script>
					function showclass2(){
						id = $('#type1').val();
						if(id!=''){
							$.post("<?php echo url('admin/Productclass/showclass22'); ?>",{id:id},function(data){
								if(data!=""){
									$("#type2").html(data);
									$("#type3").html('');
									$("#type2").show();
									$("#type3").hide();
								}else{
									$("#type2").hide();
								}
							});

						}

					}
					function showclass3(){
						id = $('#type2').val();
						if(id!=''){
							$.post("<?php echo url('admin/Productclass/showclass33'); ?>",{id:id},function(data){
								$("#type3").html(data);
								$("#type3").show();
							});
						}
					}
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
				</script>
				<input type="hidden" class="startId" required="required" id="startId"  value="" >
				<input type="hidden"  class="endId" required="required" id="endId" value="">
				<input type="hidden"  class="idText" required="required" id="idText" value="<?php echo $n_id; ?>">
				<input type="hidden"  class="type1" required="required" id="type1" value="">
				<input type="hidden"  class="type2" required="required" id="type2" value="">
				<input type="hidden"  class="type3" required="required" id="type3" value="">
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
										<option value="4"><?php echo $v['plug_dpbm']; ?>--德国</option>
										<option value="5"><?php echo $v['plug_dpbm']; ?>--英国</option>
										<option value="6"><?php echo $v['plug_dpbm']; ?>--意大利</option>
										<option value="7"><?php echo $v['plug_dpbm']; ?>--法国</option>
										<option value="8"><?php echo $v['plug_dpbm']; ?>--西班牙</option>
										<?php endif; if($v['plug_khqy'] == 0): ?>
										<option value="9" style="color:blue;"><?php echo $v['plug_dpbm']; ?>--美国</option>
										<option value="10" style="color:blue;"><?php echo $v['plug_dpbm']; ?>--墨西哥</option>
										<option value="11" style="color:blue;"><?php echo $v['plug_dpbm']; ?>--加拿大</option>
										<?php endif; if($v['plug_khqy'] == 2): ?>
										<option value="2" style="color:green;"><?php echo $v['plug_dpbm']; ?>--日本</option>
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
										<div class="fenleiCon" style="display: none;" id="class1">
											<div style="width: 100%; margin: 0px auto;">
												<div class="inner-content-div2">
													<ul id="class1-1">

													</ul>
												</div>
											</div>
										</div>

									</div>
								</div>
							</div>
							<span class="layui-layer-setwin">
                        <a class="layui-layer-ico layui-layer-close layui-layer-close2" onclick="guanbi()">
                        </a>
                    </span> <input type="hidden" id="categoryName">
							<div class="layui-layer-btn layui-layer-btn-">
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
							//历史选择
							function history() {
								$("#histroy").empty();
								$('#layui-layer333').show('')
								obj1 = jQuery("#test111  option:selected").val();
								$.ajax({
									url:'<?php echo url('admin/Product/historyClass'); ?>',
									data:{country:obj1},
									type:'post',
									dataType: 'json',
									success:function(result){
										if(result.msg == 'success'){
											$.each(result.data, function(i, item) {
												$("#histroy").append("<li onclick='fuzhi("  + item.id + ")' data-index=\"0\" data-nodeid='"  + item.node_id + "' data-categoryname='" + item.category_name + "' class=' typelist'>" + item.category + "</li>");
											});
										}

									}
								},'json');

							}
							//历史记录赋值
							function fuzhi(idss) {
								$.ajax({
									url:'<?php echo url('admin/Product/historyId'); ?>',
									data:{fid:idss},
									type:'post',
									dataType: 'json',
									success:function(result){
										if(result.msg == 'success'){
											$("#showNode").val(result.data.category);
											$("#categoryName").val(result.data.category_name);
											$("#nodeId").val(result.data.node_id);
										}

									}
								},'json');
							}
							//遍历展示一级分类
							function fenlei(obj) {



								$("#class1").nextAll().remove();

								$('#showNode').val('')

								$('#nodeId').val('')
								$.ajax({
									url:'<?php echo url('admin/Feed/firstClass'); ?>',
									data:{country:obj},
									type:'post',
									dataType: 'json',
									success:function(result){
										$("#class1").show();
										$("#class1-1").html("")
										if(result.msg == 'success'){
											$.each(result.data, function(i, item) {
												$("#class1-1").append("<li data-index=\"0\" data-nodeid='"  + item.cid + "' data-categoryname='" + item.categoryName + "' class=' typelist'>" + item.displayName + "/"+item.categoryName+ "</li>");
											});
										}

									}
								},'json');
							}
							$("#fenleiTankuang").on("click",".typelist",function(){
								$(this).addClass('active').siblings().removeClass('active')
								$(this).parent().parent().parent().parent().nextAll().remove();
								$('#confirmNodeid').attr("node-id",$(this).attr('data-nodeid'));
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
												html+= "<li data-index='0' data-nodeid='" + item.cid + "' data-categoryname='" + item.categoryName + "' class='typelist'>" + item.displayName + "/"+item.categoryName+"</li>"
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
								if(goodsCate == ''){
									alert('请选择授权店铺')
									return false;
								}
								var nodeId = $("#nodeId").val()
								var templateType = $("#templateType").val()
								var category = $('#showNode').val();
								if(templateType == ''){
									alert('请选择分类')
									return false;
								}
								var class1 = $('#type1').val()
								var class2 = $('#type2').val()
								var class3 = $('#type3').val()
								if(showNode == ''){
									alert('请选择分类')
									return false;
								}

								$.ajax({
									url:'<?php echo url('admin/Product/product_insertFeed'); ?>',
									data:{startId:startId,endId:endId,goodsCate:goodsCate,nodeId:nodeId,templateType:templateType,category:category,class1:class1,class2:class2,class3:class3,idText:idText,categoryName:categoryName},
									type:'post',
									dataType: 'json',
									success:function(result){
										// if(result.status=='error'){}
										alert(result.msg);
										if(result.status=='success'){
											window.location.href = "<?php echo url('admin/product/record_list'); ?>";

										}
										

									}
								},'json');
							})
							//删除图片
							$("#specif_content").on("click",".delete_img",function(){
								//当前图片路径
								var img = $(this).parent().children().children('img').attr('src')
								//原所有图片路径
								var imgPath = $(this).parent().parent().parent().parent().find(".imgAction").val()
								var imgArray = 	imgPath.split(',');
								var newPath = '';
								var last = imgArray.length-1
								//删除当前图片
								for(var i=0;i<imgArray.length;i++){
									if(imgArray[i]==img){
										continue;
									}else{
										if(i == last){
											break;
										}else{
											newPath+= imgArray[i]+","
										}
									}

								}
								$(this).parent().parent().parent().parent().find(".imgAction").val(newPath)
								$(this).parent().remove()
							})
						</script>

						<!-- *********************************************************************/ -->
						<div class="pro_inf">
                    <span>
                        <input type="text" placeholder="--请选择--" class="changeType" style="width: 350px;" onclick="xianshi()" id="showNode">


                    </span>
							<input type="text" placeholder="分类节点id" id="nodeId" name="itemType">
							<a class="btn btn-info" onclick="history()">历史选择</a>
							<p>
							</p>

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
									<option value="Home/BedAndBath">家--床和浴室</option>
									<option value="Home/FurnitureAndDecor">家--家具和装饰</option>
									<option value="Home/Kitchen">家--厨房</option>
									<option value="Home/OutdoorLiving">家--户外生活</option>
									<option value="Home/SeedsAndPlants">家--种子和植物</option>
									<option value="Home/Art">家--艺术</option>
									<option value="Home/Fabric">家--布</option>
									<option value="Home/VacuumCleaner">家--吸尘器</option>
									<option value="Home/Mattress">家--床垫</option>
									<option value="Home/Headboard">家--床头板</option>
									<option value="Home/Dresser">家--梳妆台</option>
									<option value="Home/Cabinet">家--内阁</option>
									<option value="Home/Chair">家--椅子</option>
									<option value="Home/Table">家--桌子</option>
									<option value="Home/Bench">家--板凳</option>
									<option value="Home/Sofa">家--沙发</option>
									<option value="Home/Desk">家--书桌</option>
									<option value="Home/FloorCover">家--地板盖</option>
									<option value="Home/Bakeware">家--烤盘</option>
									<option value="Home/Cookware">家--炊具</option>
									<option value="Home/Cutlery">家--刀具</option>
									<option value="Home/Dinnerware">家--餐具</option>
									<option value="Home/Serveware">家--Serveware</option>
									<option value="Home/KitchenTools">家--厨房用具</option>
									<option value="Home/SmallHomeAppliances">家--小型家电</option>
									<option value="Health/HealthMisc">健康--健康杂项</option>
									<option value="Health/PersonalCareAppliances">健康--个人护理用具</option>
									<option value="Health/MedicalSupplies">健康--医疗用品</option>
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

			</form>
			<!--<div id="lishi" style="display: none;">
				<h3>
					历史选择
				</h3>
				<div class="some-content-related-div" style="width: 100%; margin: 0px auto;">
					<div class="inner-content-div2">
						<ul id="histroy">
						</ul>
					</div>
				</div>
			</div>-->
				<style>
					#lishi h3{
						margin: 10px;
						color: #00a3e8;
						font-weight: bold;
					}
					#lishi ul{
						margin: 10px;
						padding: 10px;
						border:1px solid #ddd;
						border-radius: 3px;
						height: 255px;
					}
					#lishi ul li{
						padding: 5px;
						border-radius: 3px;
						cursor: pointer;
						list-style:none;
					}
					#lishi ul li:hover , #lishi ul li.active{
						background: #dbedf7;
					}

				</style>
			<div class="layui-layer layui-layer-page openClass layer-anim" id="layui-layer333" type="page" times="2" showtime="0" contype="object" style="z-index: 19891016; width: 800px; height: 400px; top: 32px; left: 441.5px;display: none;">
				<div id="" class="layui-layer-content" style="height: 347px;">
					<div id="lishi" style="" class="layui-layer-wrap">
						<h3>
							历史选择
						</h3>
						<div class="some-content-related-div" style="width: 100%; margin: 0px auto;">
							<div class="inner-content-div2">
								<ul id="histroy">

								</ul>
							</div>
						</div>
					</div>
				</div>
				<span class="layui-layer-setwin">
					<a class="layui-layer-ico layui-layer-close layui-layer-close2  layui-layer-btn222" href="javascript:;">
					</a>
				</span>
							<div class="layui-layer-btn layui-layer-btn-">
								<a class="layui-layer-btn111">
									确定
								</a>
								<a class="layui-layer-btn222">
									取消
								</a>
							</div>
							<span class="layui-layer-resize">
				</span>
			</div>




		</div>

	</div>

			<!---------------------------------------------------------亚马逊上传结束----------------------------------------------------------------->
		</div>
	</div>

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

<script>
	$(".layui-layer-btn111").click(function(){
		$("#layui-layer333").hide();
	});
	$(".layui-layer-btn222").click(function(){
		$("#layui-layer333").hide();
	});

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
		//alert(keyword);
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


                        $("#title_en").val(result.en);
                        $("#textCount_en").val(result.en.length);

                        $("#title_fra").val(result.fr);
                        $("#textCount_fra").val(result.fr.length);

                        $("#title_de").val(result.de);
                        $("#textCount_de").val(result.de.length);

                        $("#title_it").val(result.it);
                        $("#textCount_it").val(result.it.length);

                        $("#title_es").val(result.es);
                        $("#textCount_es").val(result.es.length);

                        $("#title_jp").val(result.ja);
                        $("#textCount_jp").val(result.ja.length);
                    }
                    if (result.lx == 2) {


                        $("#keyword_en").val(result.en);
                        $("#textCount_gjc_en").val(result.en.length);

                        $("#keyword_fra").val(result.fr);
                        $("#textCount_gjc_fra").val(result.fr.length);

                        $("#keyword_de").val(result.de);
                        $("#textCount_gjc_de").val(result.de.length);

                        $("#keyword_it").val(result.it);
                        $("#textCount_gjc_it").val(result.it.length);

                        $("#keyword_es").val(result.es);
                        $("#textCount_gjc_es").val(result.es.length);

                        $("#keyword_jp").val(result.ja);
                        $("#textCount_gjc_jp").val(result.ja.length);
                    }
                    if (result.lx == 3) {
                        $("#keypotins_en").val(result.en);
                        $("#keypotins_fra").val(result.fr);
                        $("#keypotins_de").val(result.de);
                        $("#keypotins_it").val(result.it);
                        $("#keypotins_es").val(result.es);
                        $("#keypotins_jp").val(result.ja);
                    }
                    if (result.lx == 4) {
                        $("#description_en").val(result.en);
                        $("#description_fra").val(result.fr);
                        $("#description_de").val(result.de);
                        $("#description_it").val(result.it);
                        $("#description_es").val(result.es);
                        $("#description_jp").val(result.ja);
                    }


				}

			}

		},"josn")
	}

</script>

<script>

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
<script type="text/javascript">
	$(function(){
		$.ajax({
			url: "<?php echo url('admin/Product/productImage'); ?>",
			type: 'POST',
			data: {"goodsId":$('#goodsId').val()},
			success: function (responseStr) {
				console.log(responseStr.data)
				if(responseStr.msg=="success"){
					var array = responseStr.data.split(",")
					var html = "";
					for(var i=0; i<array.length;i++){
						var aa = array[i];
						//alert(array[i]);
						html +=  "<li id='duotu' data-md5='"+array[i]+"'>"+
								"<img src="+array[i]+" class='fangda' onclick='showImg()'>"+
								"<div class='file-tit'>"+
								"<div>图片"+(i+1)+"</div>"+
								"<div></div>"+
								"</div>"+
								'<div class="file-footer-buttons">'+
								"<span class='icon-success' title='上传完成'></span>"+
								"<span class='iconfont icon-delete' title='删除文件'>"+
								'</div>'+
								'</li>';
					}
					$('#view_ul').append(html)
				}
			},
			error : function (responseStr) {
				console.log(234)
			}
		},"json");


	});
	$("#duotu").on("click",".fangda",function(){
		console.log($(this).attr("src"));
	})

</script>
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
		/*height: 270px;*/
		overflow-y: scroll;
	}

</style>



<!-- 与此页相关的js -->
</body>
</html>
