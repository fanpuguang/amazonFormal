<?php if (!defined('THINK_PATH')) exit(); /*a:1:{s:85:"/www/wwwroot/www.ldkjmy.com/aaaa/yamaxun/app/admin/view/web_log/ajax_weblog_list.html";i:1578553893;}*/ ?>
<form name="admin_list_sea" class="form-search form-horizontal" id="list-filter" method="post" action="<?php echo url('admin/WebLog/weblog_list'); ?>">
	<div class="row maintop">
		<div class="col-xs-8 margintop5">
			<select name="request_module" class="ajax_change">
				<option value="">按模块</option>
				<option value="admin" <?php if($request_module == 'admin'): ?>selected<?php endif; ?>>admin</option>
				<option value="home" <?php if($request_module == 'home'): ?>selected<?php endif; ?>>home</option>
			</select>
			<select name="request_controller" class="ajax_change">
				<option value="">按控制器</option>
				<?php if(is_array($controllers) || $controllers instanceof \think\Collection || $controllers instanceof \think\Paginator): if( count($controllers)==0 ) : echo "" ;else: foreach($controllers as $key=>$vo): ?>
				<option value="<?php echo $vo; ?>" <?php if($request_controller == $vo): ?>selected<?php endif; ?>><?php echo $vo; ?></option>
				<?php endforeach; endif; else: echo "" ;endif; ?>
			</select>
			<select name="request_action" class="ajax_change">
				<option value="">按操作方法</option>
				<?php if(is_array($actions) || $actions instanceof \think\Collection || $actions instanceof \think\Paginator): if( count($actions)==0 ) : echo "" ;else: foreach($actions as $key=>$vo): ?>
				<option value="<?php echo $vo; ?>" <?php if($request_action == $vo): ?>selected<?php endif; ?>><?php echo $vo; ?></option>
				<?php endforeach; endif; else: echo "" ;endif; ?>
			</select>
			<select name="request_method" class="ajax_change">
				<option value="">按请求类型</option>
				<?php if(is_array($methods) || $methods instanceof \think\Collection || $methods instanceof \think\Paginator): if( count($methods)==0 ) : echo "" ;else: foreach($methods as $key=>$vo): ?>
				<option value="<?php echo $vo; ?>" <?php if($request_method == $vo): ?>selected<?php endif; ?>><?php echo $vo; ?></option>
				<?php endforeach; endif; else: echo "" ;endif; ?>				
			</select>
		</div>
		<div class="col-xs-2">
			<div class="input-group-btn">
				<a href="<?php echo url('admin/WebLog/weblog_list'); ?>">
					<button type="button" class="btn btn-xs all-btn btn-purple ajax-display-all">
						<span class="ace-icon fa fa-globe icon-on-right bigger-110"></span>
						显示全部
					</button>
				</a>
			</div>
			<div class="input-group-btn">
				<a href="<?php echo url('admin/WebLog/weblog_drop'); ?>">
					<button type="button" class="btn btn-xs all-btn btn-danger ajax-drop">
						<span class="ace-icon fa fa-trash-o icon-on-right bigger-110"></span>
						清空
					</button>
				</a>
			</div>
		</div>
	</div>	
</form>
<div class="row">
	<div class="col-xs-12">
		<div>
			<form id="alldel" name="alldel" method="post" action="<?php echo url('admin/WebLog/weblog_alldel'); ?>" >
				<input name="p" id="p" value="" type="hidden" />
				<div class="table-responsive">
					<table class="table table-striped table-bordered table-hover" id="dynamic-table">
						<thead>
						<tr>
							<th class="hidden-xs center">
								<label class="pos-rel">
									<input type="checkbox" class="ace"  id='chkAll' onclick='CheckAll(this.form)' value="全选"/>
									<span class="lbl"></span>										
								</label>											
							</th>
							<th>详情</th>
							<th>ID</th>
							<th>模块</th>
							<th>请求类型</th>
							<th>操作地址</th>
							<th class="hidden-xs">操作时间</th>
							<th style="border-right:#CCC solid 1px;">操作</th>
						</tr>
						</thead>

						<tbody>
						<?php if(is_array($weblog_list) || $weblog_list instanceof \think\Collection || $weblog_list instanceof \think\Paginator): if( count($weblog_list)==0 ) : echo "" ;else: foreach($weblog_list as $key=>$v): ?>
							<tr>
								<td class="hidden-xs" align="center">
									<label class="pos-rel">
										<input name='id[]' id="navid" class="ace"  type='checkbox' value='<?php echo $v['id']; ?>'>
										<span class="lbl"></span>
									</label>
								</td>
								<td class="center">
									<div class="action-buttons">
										<a href="#" class="green bigger-140 show-details-btn" title="Show Details">
											<i class="ace-icon fa fa-angle-double-down"></i>
											<span class="sr-only">Details</span>
										</a>
									</div>
								</td>
								<td><?php echo $v['id']; ?></td>
								<td><?php echo $v['module']; ?></td>
								<td><?php echo $v['method']; ?></td>
								<td><?php echo $v['url']; ?></td>
								<td class="hidden-xs"><?php echo date('Y-m-d H:i:s',$v['otime']); ?></td>
								<td>
									<div class="">
										<a class="red confirm-rst-url-btn" data-info="你确定要删除到回收站吗？" href="<?php echo url('admin/WebLog/weblog_del',['id'=>$v['id']]); ?>" title="回收站" data-rel="tooltip" data-original-title="回收站">
											<i class="ace-icon fa fa-trash-o bigger-130"></i>
										</a>
									</div>
								</td>
							</tr>
							<tr class="detail-row">
								<td colspan="8">
									<div class="row">
										<label class="form-label col-xs-3 text-right">用户：</label>
										<div class="formControls col-xs-8">
											<?php echo $v['member_list_username']; ?> （ID：<?php echo $v['member_list_id']; ?>）
										</div>
									</div>
									<div class="row">
										<label class="form-label col-xs-3 text-right">操作IP：</label>
										<div class="formControls col-xs-8">
											<?php echo $v['ip']; ?>
										</div>
									</div>
									<div class="row">
										<label class="form-label col-xs-3 text-right">操作地点：</label>
										<div class="formControls col-xs-8">
											<?php echo $v['location']; ?>
										</div>
									</div>
									<div class="row">
										<label class="form-label col-xs-3 text-right">操作系统：</label>
										<div class="formControls col-xs-8">
											<?php echo $v['os']; ?>
										</div>
									</div>
									<div class="row">
										<label class="form-label col-xs-3 text-right">操作浏览器：</label>
										<div class="formControls col-xs-8">
											<?php echo $v['browser']; ?>
										</div>
									</div>
									<div class="row">
										<label class="form-label col-xs-3 text-right">操作URL：</label>
										<div class="formControls col-xs-8">
											<?php echo $v['url']; ?>
										</div>
									</div>
									<div class="row">
										<label class="form-label col-xs-3 text-right">操作数据：</label>
										<div class="formControls col-xs-8">
											<textarea  name="" readonly="readonly" cols="" rows="3" class="col-xs-12"   id="form-field-9"  maxlength=""><?php echo var_export(unserialize($v['data'])); ?></textarea>
										</div>
									</div>
								</td>
							</tr>
						<?php endforeach; endif; else: echo "" ;endif; ?>
						<tr>
							<td align="left" class="hidden-xs"><button id="btnsubmit" class="btn btn-white btn-yellow btn-sm hidden-xs">删</button> </td>
							<td colspan="7" align="right"><?php echo $page; ?></td>
						</tr>
						</tbody>
					</table>
				</div>
			</form>
		</div>
	</div>
</div>