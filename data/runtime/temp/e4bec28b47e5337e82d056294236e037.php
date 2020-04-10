<?php if (!defined('THINK_PATH')) exit(); /*a:6:{s:80:"/www/wwwroot/www.ldkjmy.com/aaaa/yamaxun/app/admin/view/product/product_add.html";i:1586252978;s:72:"/www/wwwroot/www.ldkjmy.com/aaaa/yamaxun/app/admin/view/public/base.html";i:1578553890;s:74:"/www/wwwroot/www.ldkjmy.com/aaaa/yamaxun/app/admin/view/public/header.html";i:1586171204;s:76:"/www/wwwroot/www.ldkjmy.com/aaaa/yamaxun/app/admin/view/public/left_nav.html";i:1578553891;s:76:"/www/wwwroot/www.ldkjmy.com/aaaa/yamaxun/app/admin/view/public/head_nav.html";i:1578553891;s:74:"/www/wwwroot/www.ldkjmy.com/aaaa/yamaxun/app/admin/view/public/footer.html";i:1578970335;}*/ ?>
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
			
<style type="text/css" xmlns="http://www.w3.org/1999/html">
    .string {
        color: green;
    }

    .number {
        color: darkorange;
    }

    .boolean {
        color: blue;
    }

    .null {
        color: magenta;
    }

    .key {
        color: red;
    }

    body {
        padding: 1rem;
    }

    pre {
        background-color: #f7f7f9;
        border: 1px solid #e1e1e8;
        padding: 5px 10px;
        margin: 0;
        border-radius: 8px;
        min-height: 20px;
    }

    xmp {
        margin: 0;
        padding: 0;
    }

    #upload_duixiang {
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

    ul li img:hover {
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
    window.onload = function () {
        var elements = document.querySelectorAll('.demo-image');
        Intense(elements);
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
                添加产品
            </small>

        </h1>
    </div>
    <div class="row">
        <div class="col-xs-12">
            <form class="form-horizontal ajaxForm2" name="form0" method="post"
                  action="<?php echo url('admin/Product/product_runadd'); ?>" enctype="multipart/form-data" >
                <div style="margin-left: 1380px;float: right;margin-top: -90px;position: fixed;">
                <button class="btn btn-info" type="submit" >
                    <i class="ace-icon fa fa-check bigger-110"></i>
                    保存
                </button>
                </div>
                <input type="hidden" name="childType" id="childType" value="0">
                <input type="hidden" id="imagepath" name="goodsImages">  <!-- 保存的图片id 用于表单提交 -->
                <span id="upload_duixiang">上传产品图片</span><!-- 上传按钮 -->
                <div class="show" id="showdiv"></div> <!-- 输出图片 -->

                <link rel="stylesheet" type="text/css" href="__PUBLIC__/ace/dtsc/FraUpload.css">
                <!--<script src="__PUBLIC__/ace/dtsc/jquery.min.js?v=2.1.4"></script>-->
                <!-- 图片排序 -->
                <script src="__PUBLIC__/ace/dtsc/Sortable/Sortable.js"></script>
                <script type="text/javascript" src="__PUBLIC__/ace/dtsc/MD5.js"></script>
                <script type="text/javascript" src="__PUBLIC__/ace/dtsc/FraUpload.js"></script>

                <script type="text/javascript">

                    // 商品图片上传
                    a = $("#upload_duixiang").FraUpload({
                        view: ".show",      // 视图输出位置
                        url: "<?php echo url('admin/Product/fileupload'); ?>", // 上传接口
                        fetch: "img",   // 视图现在只支持img
                        debug: false,    // 是否开启调试模式
                        /* 外部获得的回调接口 */
                        onLoad: function (e) {                    // 选择文件的回调方法

                            console.log("外部: 初始化完成...");
                        },
                        breforePort: function (e) {         // 发送前触发
                            console.log("文件发送之前触发");
                        },
                        successPort: function (e) {         // 发送成功触发
                            console.log("文件发送成功");
                            onload_image()
                        },
                        errorPort: function (e) {       // 发送失败触发
                            console.log("文件发送失败");
                            onload_image()
                        },
                        deletePost: function (e) {    // 删除文件触发
                            console.log("删除文件");
                            console.log(e);
                            alert('删除了' + e.filename)
                            onload_image()
                        },
                        sort: function (e) {      // 排序触发
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
                    function onload_image() {
                        var res = a.FraUpload.show();
                        var ids = [];
                        for (let k in res) {
                            this_val = res[k]
                            if (!empty(res[k]['is_upload']) && !empty(res[k]['ajax'])) {
                                ajax_value = res[k]['ajax'];
                                ids.push(ajax_value);
                            }
                        }
                       //
                        //
                        var ids1 = ids.toString();
                        ids = ids1.replace(/\ +/g,"");
                        ids = ids.replace(/[\r\n]/g,"");
                        ids = ids.replace('fromquery', '');
                        var ids = removeChars(ids,'fromquery');
                        //console.log(ids)
                      
                        $("#imagepath").val(ids);
                    }



                    /**
                     * 判断变量是否为空
                     */
                    function empty(value) {
                        if (value == "" || value == undefined || value == null || value == false || value == [] || value == {}) {
                            return true;
                        } else {
                            return false;
                        }
                    }
                </script>
                <div class="form-group">
                    <label class="col-sm-2 control-label no-padding-right" for="form-field-1"> 所属分类：</label>
                    <div class="col-sm-6">
                        <span>
                            <select name="class1" onchange="showclass2()" id="class1">
                                <option>请选择一级分类</option>

                                    <?php if(is_array($list_fenlei) || $list_fenlei instanceof \think\Collection || $list_fenlei instanceof \think\Paginator): if( count($list_fenlei)==0 ) : echo "" ;else: foreach($list_fenlei as $key=>$vo): if($vo['parentId'] == 0): ?>

                                            <option value="<?php echo $vo['categoryId']; ?>"><?php echo $vo['categoryName']; ?></option>

                                    <?php endif; endforeach; endif; else: echo "" ;endif; ?>
                            </select>
                            <select name="class2" onchange="showclass3()" id="class2" style="display:none;"></select>
                            <select name="class3"  id="class3" style="display:none;"></select>

                        </span>
                    </div>
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
                <div class="space-4"></div>
                <div class="form-group">
                    <label class="col-sm-2 control-label no-padding-right" for="form-field-1"> 产品简称： </label>
                    <div class="col-sm-10">

                        <input type="text" name="goodsTitle" id="goodsTitle" placeholder="产品简称，建议1~12字数"
                               class="col-xs-10 col-sm-4" style="margin-left:10px;"  required/>
                        <span class="help-inline col-xs-12 col-sm-7">
                                                <span class="middle" id="resone"></span>
                                            </span>
                    </div>
                </div>
                <div class="space-4"></div>
                <div class="form-group">
                    <label class="col-sm-2 control-label no-padding-right" for="form-field-1"> 英文简称： </label>
                    <div class="col-sm-10">

                        <input type="text" name="goodsEnglishabbreviation" id="goodsEnglishabbreviation"
                               placeholder="产品简称，建议1~12字数" class="col-xs-10 col-sm-4" style="margin-left:10px;"  required/>
                        <span class="help-inline col-xs-12 col-sm-7">
                                                <span class="middle" id="resone"></span>
                                            </span>
                    </div>
                </div>
                <div class="space-4"></div>

                <div class="form-group">
                    <label class="col-sm-2 control-label no-padding-right" for="form-field-1"> 厂商名称： </label>
                    <div class="col-sm-10">

                        <input type="text" name="goodsTradeNames" id="goodsTradeNames" placeholder="厂商名称"
                               class="col-xs-10 col-sm-4" style="margin-left:10px;" value="<?php echo $admin_list['0']['en_name']; ?>"/>
                        <span class="help-inline col-xs-12 col-sm-7">
                                                <span class="middle" id="resone"></span>
                                            </span>
                    </div>
                </div>
                <div class="space-4"></div>

                <div class="form-group" style="">
                    <label class="col-sm-2 control-label no-padding-right" for="form-field-1"> 品牌名称： </label>
                    <div class="col-sm-10">

                        <input type="text" name="goodsBrandName" id="goodsBrandName" placeholder="品牌名称"
                               class="col-xs-10 col-sm-4 input-icon-right" style="margin-left:10px;"  value="<?php echo $admin_list['0']['en_brand']; ?>"/>
                        <span class="help-inline col-xs-12 col-sm-7">
                                                <span class="middle" id="resone"></span>
                                            </span>
                    </div>
                </div>
                <div class="space-4"></div>

                <div class="form-group">
                    <label class="col-sm-2 control-label no-padding-right" for="form-field-1"> SKU： </label>
                    <div class="col-sm-10">

                        <input type="text" name="goodsSku" id="goodsSku" placeholder="SKU编码" value="<?php echo $sku; ?>"
                               class="col-xs-10 col-sm-2" style="margin-left:10px;"/>
                        <span class="help-inline col-xs-12 col-sm-7">
                                                <span class="middle" id="resone"></span>
                                            </span>
                    </div>
                </div>
                <div class="space-4"></div>


                <div class="space-4"></div>
                <div class="form-group">
                    <label class="col-sm-2 control-label no-padding-right" for="form-field-1"> 是否审核： </label>
                    <div class="col-sm-10" style="padding-top:5px;">
                        <input name="goodsStaus" id="goodsStaus" value="1" class="ace ace-switch ace-switch-4 btn-flat"
                               type="checkbox"/>
                        <span class="lbl">&nbsp;&nbsp;默认关闭</span>
                    </div>
                </div>
                <div class="space-4"></div>

                <div class="form-group">
                    <label class="col-sm-2 control-label no-padding-right" for="form-field-1"> 产品来源： </label>
                    <div class="col-sm-10">
                        <input type="text" name="goodsUrl" id="goodsUrl" placeholder="来源URL"
                               class="col-xs-10 col-sm-6"/>

                        <span class="help-inline col-xs-12 col-sm-6">
                                <span class="middle">正确格式：http:// 开头</span>
                            </span>
                    </div>
                </div>
                <div class="space-4"></div>
                
                
                <input type="hidden" id="color1" name="color1">
                <input type="hidden" id="size1" name="size1">
                 <script>
                		//采集
						function caiji() {
							
							urls = $('#caijiUrl').val();
						
							if(urls!=''){
							var index1 = layer.load(1, {
								shade: [0.1,'#fff'] //0.1透明度的白色背景
							});
								$.ajax({
							            url: "<?php echo url('admin/Product/dancaiji'); ?>",
							            type: 'post',
							            data: {
							                urls: urls
							                
							            },
							            dataType: 'json',
							            beforeSend: function (XMLHttpRequest) {
							
							            },
							            success: function (result) {
							
							                if (result) {
							                  console.log(result);
							                  layer.close(index1);
							                    layer.msg('采集成功');
							  
							                      
													$.each(result,function(i,n){
														
															$("#title_en").html(result[i].TITLE);
															var description1 = result[i].DESCRIPTION;
															var description11 =description1.replace(/<br>/g, "\n");
															var description22 =description11.replace(/<br\/>/g, "\n");
															$("#description_en").html(description22);
															$("#keyword_en").html(result[i].SHOP_KEYWORDS);
															var keypotins1 = result[i].MAIN_POINTS_1+'<br/>'+result[i].MAIN_POINTS_2+'<br/>'+result[i].MAIN_POINTS_3+'<br/>'+result[i].MAIN_POINTS_4+'<br/>'+result[i].MAIN_POINTS_1+result[i].MAIN_POINTS_5;
															var keypotins1 = result[i].MAIN_POINTS_1+'<br/>';
															var keypotins11 =keypotins1.replace('<br/>','\n');
															
															var keypotins2 = result[i].MAIN_POINTS_2+'<br/>';
															var keypotins22 =keypotins2.replace('<br/>','\n');
															
															var keypotins3 = result[i].MAIN_POINTS_3+'<br/>';
															var keypotins33=keypotins3.replace('<br/>','\n');
															
															var keypotins4 = result[i].MAIN_POINTS_4+'<br/>';
															var keypotins44 =keypotins4.replace('<br/>','\n');
															
															var keypotins5 = result[i].MAIN_POINTS_5+'<br/>';
															var keypotins55 =keypotins5.replace('<br/>','\n');
															$("#keypotins_en").html(keypotins11+keypotins22+keypotins33+keypotins44+keypotins55);
													
															//所有图片
															var imgaa = $("#imagepath").val();
															
															if(imgaa != ''){
																aa = imgaa+","+result[i].PIC_LIST;
															}else{
																aa = result[i].PIC_LIST;
															}
															$("#imagepath").val(aa);
														
													
															
															//图片模块
																var array = result[i].PIC_LIST.split(",")
																
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
																$('.FraUpload_imglist').append(html)
																
														
														});
							
							                }
							
							            }
							
							        },"josn")
							}

						}
                 </script>
				<div class="form-group">
                    <label class="col-sm-2 control-label no-padding-right" for="form-field-1"> 亚马逊产品地址： </label>
                    <div class="col-sm-10">
                        <input type="url" name="caijiUrl" id="caijiUrl" placeholder="亚马逊产品地址" class="col-xs-10 col-sm-6"/>

                        <span class="btn btn-info" onclick="caiji()">
		                  采集
		                </span>
                    </div>
                </div>
                
                <div class="form-group">
                    <label class="col-sm-2 control-label no-padding-right" for="form-field-1"> 产品备注： </label>
                    <div class="col-sm-8">
                        <textarea type="text" name="bezhu" id="bezhu" class="col-xs-10 col-sm-6"/> </textarea>
                    </div>
                </div>

                <!--运费模块开始-->

                <script>

                    $(function () {
                        //售价、运费计算
                        $('.input').blur(function () {
                            goodsBuyingPrice = $('#goodsBuyingPrice').val();
                            goodsWeight = $('#goodsWeight').val();
                            goodsSizec = $('#goodsSizec').val();
                            goodsSizek = $('#goodsSizek').val();
                            goodsSizeg = $('#goodsSizeg').val();
                            if (goodsBuyingPrice != 0 && goodsWeight != '' && goodsSizec != '' && goodsSizek != '' && goodsSizeg != '') {
                                //alert(goodsSizeg);
                                $.post('<?php echo url('admin/Product/product_price'); ?>', {
                                    goodsBuyingPrice: goodsBuyingPrice,
                                    goodsWeight: goodsWeight,
                                    goodsSizec: goodsSizec,
                                    goodsSizek: goodsSizek,
                                    goodsSizeg: goodsSizeg
                                }, function (data) {
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
                        })


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
                <input type="text" placeholder="采购价格(￥)" name="goodsBuyingPrice" id="goodsBuyingPrice"
                       onkeyup="this.value=this.value.replace(/[^\d.]/g,'');" class="input">
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
                <input type="text" placeholder="包装毛重(kg)" name="goodsWeight" id="goodsWeight"
                       onkeyup="this.value=this.value.replace(/[^\d.]/g,'');" class="input">
            </span>
                            <br>
                            <span>
                <label for="">
                    包装尺寸(cm)：
                </label>
                <input type="text" placeholder="长" name="goodsSizec" id="goodsSizec"
                       onkeyup="this.value=this.value.replace(/[^\d.]/g,'');"
                       class="input">
                *
                <input type="text" placeholder="宽" name="goodsSizek" id="goodsSizek"
                       onkeyup="this.value=this.value.replace(/[^\d.]/g,'');"
                        class="input">
                *
                <input type="text" placeholder="高" name="goodsSizeg" id="goodsSizeg"
                       onkeyup="this.value=this.value.replace(/[^\d.]/g,'');"
                        class="input">
            </span>
                            <span>
                <label for="">
                    库存数量：
                </label>
                <input type="text" placeholder="库存数量" name="goodsInventory" id="goodsInventory"
                       onkeyup="this.value=this.value.replace(/[^\d.]/g,'');" value="<?php echo $kucun; ?>" >
                       
            </span>
                          <span>
                <label for="">
                    厂商编号：
                </label>
                <input type="text" placeholder="厂商编号" name="manufacturernumber" id="manufacturernumber"
                       onkeyup="this.value=this.value.replace(/[^\d.]/g,'');" value="" >

            </span>
                            <span>
                <label for="">
                    材质：
                </label>
                <input type="text" placeholder="材质" name="material" id="material" value="">

            </span>
                            <table class="tableY">
                                <tbody>
                                <tr>
                                    <th style="color: rgb(243, 125, 13); font-size: 14px; font-weight: bold; cursor: pointer;">
                                        <i class="layui-icon layui-icon-refresh"
                                           style="font-size: 10px; cursor: pointer;">
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
                                    <td id="ussj">
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
                                    <td id="uswb" >
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
                                        <input name="goodsPrice_en" id="uszzsj" type="text"
                                               onkeyup="this.value=this.value.replace(/[^\d.]/g,'');"
                                               style="width: 90%;">
                                    </td>
                                    <td>
                                        <input name="goodsPrice_jnd" id="cazzsj" type="text"
                                               onkeyup="this.value=this.value.replace(/[^\d.]/g,'');"
                                               style="width: 90%;">
                                    </td>
                                    <td>
                                        <input name="goodsPrice_mxg" id="mxzzsj" type="text"
                                               onkeyup="this.value=this.value.replace(/[^\d.]/g,'');"
                                               style="width: 90%;">
                                    </td>
                                    <td>
                                        <input name="goodsPrice_yg" id="ukzzsj" type="text"
                                               onkeyup="this.value=this.value.replace(/[^\d.]/g,'');"
                                               style="width: 90%;">
                                    </td>
                                    <td>
                                        <input name="goodsPrice_fg" id="frzzsj" type="text"
                                               onkeyup="this.value=this.value.replace(/[^\d.]/g,'');"
                                               style="width: 90%;">
                                    </td>
                                    <td>
                                        <input name="goodsPrice_dg" id="dezzsj" type="text"
                                               onkeyup="this.value=this.value.replace(/[^\d.]/g,'');"
                                               style="width: 90%;">
                                    </td>
                                    <td>
                                        <input name="goodsPrice_ydl" id="itzzsj" type="text"
                                               onkeyup="this.value=this.value.replace(/[^\d.]/g,'');"
                                               style="width: 90%;">
                                    </td>
                                    <td>
                                        <input name="goodsPrice_xby" id="eszzsj" type="text"
                                               onkeyup="this.value=this.value.replace(/[^\d.]/g,'');"
                                               style="width: 90%;">
                                    </td>
                                    <td>
                                        <input name="goodsPrice_rb" id="jpzzsj" type="text"
                                               onkeyup="this.value=this.value.replace(/[^\d.]/g,'');"
                                               style="width: 90%;">
                                    </td>
                                    <td>
                                        <input name="goodsPrice_adly" id="auzzsj" type="text"
                                               onkeyup="this.value=this.value.replace(/[^\d.]/g,'');"
                                               style="width: 90%;">
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
                <!--运费模块结尾-->
                <!--变体模块开始-->


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
                            <table class="tableY" style="display: none" id="specifica">
                                <tbody id="specif_content">
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

                                </tbody>
                            </table>
                            <!---->
                        </div>
                    </div>
                </div>
                <div class="layui-layer layui-layer-page openClass layer-anim" id="imgAdd" type="page" times="9" showtime="0" contype="object" style="z-index: 19891023; width: 800px; height: 500px; top: 23.5px; left: 450px;display:none">
                    <div id="" class="layui-layer-content" style="height: 447px;">
                    <div id="selImg" class="tankuang layui-layer-wrap" style="">
                        <h3>产品回收站</h3> <div class="some-content-related-div" style="width: 100%; margin: 0px auto;">
                        <div class="slimScrollDiv" style="position: relative; overflow: hidden; width: auto; ">
                            <div class="inner-content-div2" style="overflow: hidden; width: auto;">
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
                        <a class="layui-layer-btn1" id="selectCancle">取消</a>
                    </div>
                    <span class="layui-layer-resize"></span>
                </div>
                <div class="layui-layer layui-layer-page openClass layer-anim" id="imgShow" type="page" times="9" showtime="0" contype="object" style="z-index: 19891023; width: 800px; height: 500px; top: 23.5px; left: 450px;display:none">
                    <img src="" id="imgDetail" style="width: 100%">
                    <span class="layui-layer-resize"></span>
                </div>
                <script>
                    $("#showdiv").on("click","ul>li>img",function(){
                        var src = $(this).attr('src')
                        $('#imgShow').show()
                        $('#bg').show()
                        $('#imgDetail').attr('src',src)
                    })
                    $('#bg').click(function(){
                        $('#imgShow').hide()
                        $('#bg').hide()
                    })
                    function showClose(id) {
                        $(id).css('visibility', 'visible');
                    }

                    function hiddenClose(id) {
                        $(id).css('visibility', 'hidden');
                    }

                    function changeVarType() {
                      $aa = $("#variantType").val();
                      return $aa;
                    }
                    $("#specif_content").on("click",".del",function(){
                       $(this).parents('tr').remove();
                       var left = $('#specif_content').children('tr').length;
                       if(left == 1){
                        $('#childType').val('0')
                       }
                    })
                    //默认选择颜色状态
                    var selectType = 1;
                    $('#addVariant').on('click', function () {
                        var size = $("#size").val(1);
                        layer.open({
                            type: 1,
                            area: ['700px', '500px'],
                            shadeClose: true, //点击遮罩关闭
                            btn: ['添加', '取消']
                            , yes: function (index, layero) {

                                var appendHtml = '';
                               // var textArr = [];
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
                                if(textArr.length>0 && textArr1.length<1){
                                    $('#childType').val(1)
                                    for(var i=0;i<textArr.length;i++){
                                        appendHtml += "<tr>"
                                        appendHtml += "<th>"+textArr[i]+"</th> <input type='hidden' value='"+textArr[i]+"' name='variant_combination["+i+"] '>"
                                        appendHtml +="<td>";
                                        appendHtml +="   <input name='sku["+i+"]' type='text' style='width: 90%;' value='<?php echo $sku; ?>-"+i+"'>"
                                        appendHtml +="  </td>"
                                        appendHtml +=" <td>"
                                        appendHtml +=" <input name='markup["+i+"]'  type='text'  style='width: 90%;'>"
                                        appendHtml +=" </td>"
                                        appendHtml +=" <td >"
                                        appendHtml +="  <input name='stock["+i+"]' type='text'  style='width: 90%;' value="+Math.round(Math.random()*150+50) +">"
                                        appendHtml +=" </td>"
                                        appendHtml +=" <td>"
                                        appendHtml +="<input name='upc["+i+"]'  type='text'  style='width: 90%;'>"
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
                                    for(var i=0;i<textArr1.length;i++){
                                        appendHtml += "<tr>"
                                        appendHtml += "<th>"+textArr1[i]+"</th><input type='hidden' value='"+textArr1[i]+"' name='variant_combination["+i+"] '>"
                                        appendHtml +="<td>";
                                        appendHtml +="   <input name='sku["+i+"]' type='text' style='width: 90%;' value='<?php echo $sku; ?>-"+i+"'>"
                                        appendHtml +="  </td>"
                                        appendHtml +=" <td>"
                                        appendHtml +=" <input name='markup["+i+"]'  type='text'  style='width: 90%;'>"
                                        appendHtml +=" </td>"
                                        appendHtml +=" <td >"
                                        appendHtml +="   <input name='stock["+i+"]' type='text'  style='width: 90%;' value="+Math.round(Math.random()*150+50)+">"
                                        appendHtml +=" </td>"
                                        appendHtml +=" <td>"
                                        appendHtml +=" <input name='upc["+i+"]' type='text'  style='width: 90%;'>"
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
                                            appendHtml += "<th>"+textArr[i]+"-"+textArr1[j]+"</th><input type='hidden' value='"+textArr[i]+"-"+textArr1[j]+"' name='variant_combination["+count+"] '>"
                                            appendHtml +="<td>";
                                            appendHtml +="   <input name='sku["+count+"]' type='text' style='width: 90%;' value='<?php echo $sku; ?>-"+count+"'>"
                                            appendHtml +="  </td>"
                                            appendHtml +=" <td>"
                                            appendHtml +=" <input name='markup["+count+"]'  type='text'  style='width: 90%;'>"
                                            appendHtml +=" </td>"
                                            appendHtml +=" <td >"
                                            appendHtml +="   <input name='stock["+count+"]' type='text'  style='width: 90%;' value="+Math.round(Math.random()*150+50) +">"
                                            appendHtml +=" </td>"
                                            appendHtml +=" <td>"
                                            appendHtml +=" <input name='upc["+count+"]' type='text'  style='width: 90%;'>"
                                            appendHtml +=" </td>"
                                            appendHtml +=" <td>"
                                            appendHtml +=" <input type='button' data-index='0' value='删除' class='del' name='del' style='outline: none'>"
                                            appendHtml +=" </td>"
                                            appendHtml +=" <td >"
                                            appendHtml +=" <input type='button' value='选择图片' class='chan'>"
                                            appendHtml +=" <input type='button' value='一键添加' class='all'>"
                                            appendHtml +=" <input type='hidden' value='' class='imgAction' name='imgs["+count+"]'>"
                                            appendHtml +=" </td>"
                                            appendHtml +="<td ><ul class='ul'></ul>"
                                            appendHtml +=" </td>"
                                            appendHtml +=" </tr>"

                                            count++;
                                        }

                                    }
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

                            }
                            , cancel: function () {
                                //右上角关闭回调

                                //return false 开启该代码可禁止点击该按钮关闭
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

                    $(function () {
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
                        if($('#variantType').val()!=""){
                            var text = ","+value;
                        }else{
                            var text = value;
                        }

                       $('#variantType').append(text);



                    }



                    $('#tihuan').on('click', function () {
                        // console.log($(event.target).text());

                        var _text = $('textarea.variantType').eq(1).val();
                        if (_text != '') {
                            _text += ',' + $(event.target).attr('data-val');
                        } else {
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
                                // imgUl+="<i class='layui-icon layui-icon-close-fill'></i>"
                                imgUl+="<span class='delete_img'>x</span>"
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
                                imgAction+=imgArray[i]+",";
                                imgUl+="<li data-url="+imgArray[i]+" data-index='0' style='list-style: none;float: left'>"
                                imgUl+="<img src="+imgArray[i]+" data-url="+imgArray[i]+" style='width: 50px;height: 50px'>"
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
                    //删除图片
                    $("#specif_content").on("click",".delete_img",function(){
                        var index =  $('.ul>li').index($(this).parent())
                        var imgPath = $(this).parent().parent().parent().parent().find(".imgAction").val()
                        var imgArray = 	imgPath.split(',');
                        imgArray.splice(index-1,1)
                        var newPath = '';
                        var last = imgArray.length-1
                        for(var i=0;i<imgArray.length;i++){
                            if(i == last){
                                break;
                            }else{
                                newPath+= imgArray[i]+","
                            }
                        }
                        $(this).parent().parent().parent().parent().find(".imgAction").val(newPath)
                        $(this).parent().remove()
                    })
                </script>

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

                    .ul1 li img {
                        width: 100%;
                        max-height: 100%;
                        box-shadow: 0 0 10px #ddd;
                    }

                    .ul1 li i {
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

                    form .item div:nth-child(2) .imgDiv > div:hover {
                        /*border: 2px solid #00a3e8;*/
                        box-shadow: 0 0 10px #888;
                    }

                    form .item div:nth-child(2) .imgDiv > div.active {
                        border: 2px solid #00a3e8;
                        box-shadow: 0 0 10px #888;
                    }

                    #demo > form:nth-child(2) {
                        display: none;
                    }

                    #moveSelected1 {
                        position: absolute;
                        background-color: #89d2ff;
                        opacity: 0.3;
                        border: 1px dashed #d9d9d9;
                        top: 0;
                        left: 0;
                    }

                </style>
                <!--变体模块结尾-->

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
                    <li>
                        <a data-toggle="tab" href="#zh">
                            中文
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


                    }

                </script>

                <!---英文内容-->
                <div id="en" class="tab-pane fade in active">
                    <div class="form-group">
                        <label class="col-sm-2 control-label no-padding-right" for="form-field-1"> </label>
                        <div class="col-sm-10"> 标题：(<span id="textCount_en">0</span>/<span style="color:red;">200</span>)
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-2 control-label no-padding-right" for="form-field-1">
                            <button class="btn btn-info" type="button" style="margin-left:20px;margin-bottom: 20px;"
                                    onclick="fanyi('entitle')">一键翻译
                            </button>
                        </label>
                        <div class="col-sm-10">

                            <textarea name="title_en" cols="20" rows="2" class="col-xs-10 col-sm-8 limitedone"
                                      id="title_en" style="margin: 0px; height: 80px; width: 800px;"
                                     ></textarea>
                        </div>
                    </div>
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
                    <div class="space-4"></div>
                    <div class="form-group">
                        <label class="col-sm-2 control-label no-padding-right" for="form-field-1"> </label>
                        <div class="col-sm-10"> 要点：</div>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-2 control-label no-padding-right" for="form-field-1">
                            <button class="btn btn-info" type="button" style="margin-left:20px;margin-bottom: 20px;"
                                    onclick="fanyi('enpot')">一键翻译
                            </button>
                        </label>
                        <div class="col-sm-10">

                            <textarea name="keypotins_en" cols="20" rows="2" class="col-xs-10 col-sm-8 limitedone"
                                      id="keypotins_en"  style="margin: 0px; height: 200px; width: 800px;"
                                      placeholder="要点说明不超过5行"></textarea>
                        </div>
                    </div>
                    <div class="space-4"></div>
                    <div class="form-group">
                        <label class="col-sm-2 control-label no-padding-right" for="form-field-1"> </label>
                        <div class="col-sm-10">描述：</div>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-2 control-label no-padding-right" for="form-field-1">
                            <button class="btn btn-info" type="button" style="margin-left:20px;margin-bottom: 20px;"
                                    onclick="fanyi('endes')">一键翻译
                            </button>
                        </label>
                        <div class="col-sm-10">

                            <textarea name="description_en" cols="20" rows="2" class="col-xs-10 col-sm-8 limitedone"
                                      id="description_en"  style="margin: 0px; height: 200px; width: 800px;"
                                      placeholder="描述"></textarea>
                        </div>
                    </div>
                    <div class="space-4"></div>
                </div>


                <div id="fr" class="tab-pane fade">
                    <div class="form-group">
                        <label class="col-sm-2 control-label no-padding-right" for="form-field-1"> </label>
                        <div class="col-sm-10"> 标题：(<span id="textCount_fra">0</span>/<span
                                style="color:red;">200</span>)
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-2 control-label no-padding-right" for="form-field-1"> </label>
                        <div class="col-sm-10">

                            <textarea name="title_fra" cols="20" rows="2" class="col-xs-10 col-sm-8 limitedone"
                                      id="title_fra" style="margin: 0px; height: 80px; width: 800px;"
                                      placeholder="标题"></textarea>
                        </div>
                    </div>
                    <div class="space-4"></div>
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
                    <div class="space-4"></div>
                    <div class="form-group">
                        <label class="col-sm-2 control-label no-padding-right" for="form-field-1"> </label>
                        <div class="col-sm-10"> 要点：</div>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-2 control-label no-padding-right" for="form-field-1"> </label>
                        <div class="col-sm-10">

                            <textarea name="keypotins_fra" cols="20" rows="2" class="col-xs-10 col-sm-8 limitedone"
                                      id="keypotins_fra"  style="margin: 0px; height: 200px; width: 800px;"
                                      placeholder="要点说明不超过5行"></textarea>
                        </div>
                    </div>
                    <div class="space-4"></div>
                    <div class="form-group">
                        <label class="col-sm-2 control-label no-padding-right" for="form-field-1"> </label>
                        <div class="col-sm-10">描述：</div>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-2 control-label no-padding-right" for="form-field-1"> </label>
                        <div class="col-sm-10">

                            <textarea name="description_fra" cols="20" rows="2" class="col-xs-10 col-sm-8 limitedone"
                                      id="description_fra"  style="margin: 0px; height: 200px; width: 800px;"
                                      placeholder="描述"></textarea>
                        </div>
                    </div>
                    <div class="space-4"></div>
                </div>


                <div id="dy" class="tab-pane fade">
                    <div class="form-group">
                        <label class="col-sm-2 control-label no-padding-right" for="form-field-1"> </label>
                        <div class="col-sm-10"> 标题：(<span id="textCount_de">0</span>/<span style="color:red;">200</span>)
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-2 control-label no-padding-right" for="form-field-1"> </label>
                        <div class="col-sm-10">

                            <textarea name="title_de" id="title_de" cols="20" rows="2"
                                      class="col-xs-10 col-sm-8 limitedone"
                                      style="margin: 0px; height: 80px; width: 800px;" placeholder="标题"></textarea>
                        </div>
                    </div>
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
                    <div class="space-4"></div>
                    <div class="form-group">
                        <label class="col-sm-2 control-label no-padding-right" for="form-field-1"> </label>
                        <div class="col-sm-10"> 要点：</div>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-2 control-label no-padding-right" for="form-field-1"> </label>
                        <div class="col-sm-10">

                            <textarea name="keypotins_de" cols="20" rows="2" class="col-xs-10 col-sm-8 limitedone"
                                      id="keypotins_de"  style="margin: 0px; height: 200px; width: 800px;"
                                      placeholder="要点说明不超过5行"></textarea>
                        </div>
                    </div>
                    <div class="space-4"></div>
                    <div class="form-group">
                        <label class="col-sm-2 control-label no-padding-right" for="form-field-1"> </label>
                        <div class="col-sm-10">描述：</div>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-2 control-label no-padding-right" for="form-field-1"> </label>
                        <div class="col-sm-10">

                            <textarea name="description_de" cols="20" rows="2" class="col-xs-10 col-sm-8 limitedone"
                                      id="description_de"  style="margin: 0px; height: 200px; width: 800px;"
                                      placeholder="描述"></textarea>
                        </div>
                    </div>
                    <div class="space-4"></div>
                </div>

                <div id="ydl" class="tab-pane fade">
                    <div class="form-group">
                        <label class="col-sm-2 control-label no-padding-right" for="form-field-1"> </label>
                        <div class="col-sm-10"> 标题：(<span id="textCount_it">0</span>/<span style="color:red;">200</span>)
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-2 control-label no-padding-right" for="form-field-1"> </label>
                        <div class="col-sm-10">

                            <textarea name="title_it" cols="20" rows="2" class="col-xs-10 col-sm-8 limitedone"
                                      id="title_it" style="margin: 0px; height: 80px; width: 800px;"
                                      placeholder="标题"></textarea>
                        </div>
                    </div>
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
                    <div class="space-4"></div>
                    <div class="form-group">
                        <label class="col-sm-2 control-label no-padding-right" for="form-field-1"> </label>
                        <div class="col-sm-10"> 要点：</div>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-2 control-label no-padding-right" for="form-field-1"> </label>
                        <div class="col-sm-10">

                            <textarea name="keypotins_it" cols="20" rows="2" class="col-xs-10 col-sm-8 limitedone"
                                      id="keypotins_it"  style="margin: 0px; height: 200px; width: 800px;"
                                      placeholder="要点说明不超过5行"></textarea>
                        </div>
                    </div>
                    <div class="space-4"></div>
                    <div class="form-group">
                        <label class="col-sm-2 control-label no-padding-right" for="form-field-1"> </label>
                        <div class="col-sm-10">描述：</div>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-2 control-label no-padding-right" for="form-field-1"> </label>
                        <div class="col-sm-10">

                            <textarea name="description_it" cols="20" rows="2" class="col-xs-10 col-sm-8 limitedone"
                                      id="description_it"  style="margin: 0px; height: 200px; width: 800px;"
                                      placeholder="描述"></textarea>
                        </div>
                    </div>
                    <div class="space-4"></div>
                </div>


                <div id="xby" class="tab-pane fade">
                    <div class="form-group">
                        <label class="col-sm-2 control-label no-padding-right" for="form-field-1"> </label>
                        <div class="col-sm-10"> 标题：(<span id="textCount_es">0</span>/<span style="color:red;">200</span>)
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-2 control-label no-padding-right" for="form-field-1"> </label>
                        <div class="col-sm-10">

                            <textarea name="title_es" cols="20" rows="2" class="col-xs-10 col-sm-8 limitedone"
                                      id="title_es" style="margin: 0px; height: 80px; width: 800px;"
                                      placeholder="标题"></textarea>
                        </div>
                    </div>
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
                    <div class="space-4"></div>
                    <div class="form-group">
                        <label class="col-sm-2 control-label no-padding-right" for="form-field-1"> </label>
                        <div class="col-sm-10"> 要点：</div>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-2 control-label no-padding-right" for="form-field-1"> </label>
                        <div class="col-sm-10">

                            <textarea name="keypotins_es" cols="20" rows="2" class="col-xs-10 col-sm-8 limitedone"
                                      id="keypotins_es"  style="margin: 0px; height: 200px; width: 800px;"
                                      placeholder="要点说明不超过5行"></textarea>
                        </div>
                    </div>
                    <div class="space-4"></div>
                    <div class="form-group">
                        <label class="col-sm-2 control-label no-padding-right" for="form-field-1"> </label>
                        <div class="col-sm-10">描述：</div>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-2 control-label no-padding-right" for="form-field-1"> </label>
                        <div class="col-sm-10">

                            <textarea name="description_es" cols="20" rows="2" class="col-xs-10 col-sm-8 limitedone"
                                      id="description_es"  style="margin: 0px; height: 200px; width: 800px;"
                                      placeholder="描述"></textarea>
                        </div>
                    </div>
                    <div class="space-4"></div>
                </div>


                <div id="ry" class="tab-pane fade">
                    <div class="form-group">
                        <label class="col-sm-2 control-label no-padding-right" for="form-field-1"> </label>
                        <div class="col-sm-10"> 标题：(<span id="textCount_jp">0</span>/<span style="color:red;">100</span>)
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-2 control-label no-padding-right" for="form-field-1"> </label>
                        <div class="col-sm-10">

                            <textarea name="title_jp" cols="20" rows="2" class="col-xs-10 col-sm-8 limitedone"
                                      id="title_jp" style="margin: 0px; height: 80px; width: 800px;"
                                      placeholder="标题"></textarea>
                        </div>
                    </div>
                    <div class="space-4"></div>
                    <div class="form-group">
                        <label class="col-sm-2 control-label no-padding-right" for="form-field-1"> </label>
                        <div class="col-sm-10"> 关键字：(<span id="textCount_gjc_jp">0</span>/<span
                                style="color:red;">80</span>)
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
                    <div class="space-4"></div>
                    <div class="form-group">
                        <label class="col-sm-2 control-label no-padding-right" for="form-field-1"> </label>
                        <div class="col-sm-10"> 要点：</div>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-2 control-label no-padding-right" for="form-field-1"> </label>
                        <div class="col-sm-10">

                            <textarea name="keypotins_jp" cols="20" rows="2" class="col-xs-10 col-sm-8 limitedone"
                                      id="keypotins_jp"  style="margin: 0px; height: 200px; width: 800px;"
                                      placeholder="要点说明不超过5行"></textarea>
                        </div>
                    </div>
                    <div class="space-4"></div>
                    <div class="form-group">
                        <label class="col-sm-2 control-label no-padding-right" for="form-field-1"> </label>
                        <div class="col-sm-10">描述：</div>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-2 control-label no-padding-right" for="form-field-1"> </label>
                        <div class="col-sm-10">

                            <textarea name="description_jp" cols="20" rows="2" class="col-xs-10 col-sm-8 limitedone"
                                      id="description_jp"  style="margin: 0px; height: 200px; width: 800px;"
                                      placeholder="描述"></textarea>
                        </div>
                    </div>
                    <div class="space-4"></div>
                </div>

                <div id="zh" class="tab-pane fade">
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
                    <div class="form-group">
                        <label class="col-sm-2 control-label no-padding-right" for="form-field-1"> </label>
                        <div class="col-sm-10"> 标题：(<span id="textCount">0</span>/<span style="color:red;">200</span>)
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="col-sm-2 control-label no-padding-right" for="form-field-1">
                            <button class="btn btn-info" type="button" style="margin-left:20px;margin-bottom: 20px;"
                                    onclick="fanyi('zhtitle')">一键翻译
                            </button>
                        </label>
                        <div class="col-sm-10">

                            <textarea name="title_zh" cols="20" rows="2" maxlength="200o"
                                      class="col-xs-10 col-sm-8 limitedone" id="title_zh"
                                      style="margin: 0px; height: 80px; width: 800px;" placeholder="标题"></textarea>
                        </div>
                    </div>
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
                    <div class="space-4"></div>
                    <div class="form-group">
                        <label class="col-sm-2 control-label no-padding-right" for="form-field-1"> </label>
                        <div class="col-sm-10"> 要点：</div>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-2 control-label no-padding-right" for="form-field-1">
                            <button class="btn btn-info" type="button" style="margin-left:20px;margin-bottom: 20px;"
                                    onclick="fanyi('zhpot')">一键翻译
                            </button>
                        </label>
                        <div class="col-sm-10">

                            <textarea name="keypotins_zh" cols="20" rows="2" class="col-xs-10 col-sm-8 limitedone"
                                      id="keypotins_zh"  style="margin: 0px; height: 200px; width: 800px;"
                                      placeholder="要点说明不超过5行"></textarea>
                        </div>
                    </div>
                    <div class="space-4"></div>
                    <div class="form-group">
                        <label class="col-sm-2 control-label no-padding-right" for="form-field-1"> </label>
                        <div class="col-sm-10">描述：</div>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-2 control-label no-padding-right" for="form-field-1">
                            <button class="btn btn-info" type="button" style="margin-left:20px;margin-bottom: 20px;"
                                    onclick="fanyi('zhdes')">一键翻译
                            </button>
                        </label>
                        <div class="col-sm-10">

                            <textarea name="description_zh" cols="20" rows="2" class="col-xs-10 col-sm-8 limitedone"
                                      id="description_zh"  style="margin: 0px; height: 200px; width: 800px;"
                                      placeholder="描述"></textarea>
                        </div>
                    </div>
                    <div class="space-4"></div>
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
    //多图设置
    //$("#pic_list").hide();
    $("#news_pic_list").click(function () {
        $("#pic_list").hide();
    });
    $("#news_pic_qqlist").click(function () {
        $("#pic_list").show();
    });
    //跳转额外属性
    $("#pptaddress").hide();
    $("#news_flag_vaj").click(function () {
        $("#pptaddress").toggle(400);
    });
    $("#cpprice").hide();
    $("#news_flag_vacp").click(function () {
        $("#cpprice").toggle(400);
    });
    $('.date-picker').datepicker({
        autoclose: true,
        todayHighlight: true,
        language: 'zh-CN',
    })


    //鼠标的移入移出
    $(".header").mouseover(function () {
        $(".content").show();
    }).mouseout(function () {
        $(".content").hide();
    });
</script>

<!-- 与此页相关的js -->
</body>
</html>
