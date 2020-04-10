<?php if (!defined('THINK_PATH')) exit(); /*a:1:{s:60:"D:\php\PHPTutorial\WWW\qiyetp5\addons\maintain\maintain.html";i:1503645978;}*/ ?>
<!-- 安全检测开始 -->
<div class="panel <?php if($system_safe): ?>panel-default<?php else: ?>panel-danger<?php endif; ?>">
	<div class="panel-heading">
		<i class="ace-icon fa fa-bolt"></i>
		<span class="icon-dashboard"></span> 系统安全检测
	</div>
	<div class="panel-body">
		<?php if($system_safe): ?>
			<p class="text-success"><span class="glyphicon glyphicon-ok-sign"></span> 当前系统安全！</p>
		<?php endif; if($weak_setting_db_password): ?>
			<p class="text-danger"><span class="glyphicon glyphicon-info-sign"></span> 数据库连接密码为弱密码，安全起见，增强密码！</p>
		<?php endif; if($danger_mode_debug): ?>
			<p class="text-warning"><span class="glyphicon glyphicon-info-sign"></span> 当前系统运行在调试模式，可能会影响运行性能及安全！</p>
		<?php endif; if($system_pageshow): ?>
			<p class="text-warning"><span class="glyphicon glyphicon-info-sign"></span>  当前系统已开SHOW_PAGE_TRACE</p>
		<?php endif; if($weak_setting_admin_last_change_password): ?>
			<p class="text-warning"><span class="glyphicon glyphicon-info-sign"></span>  您太久没有更换登陆密码了，请定期更换后台登陆密码！</p>
		<?php endif; ?>
		<!--[if lte IE 8]>
		<p class="text-warning">
			<span class="glyphicon glyphicon-info-sign"></span> 浏览器版本过低！
		</p>
		<![endif]-->
	</div>
</div>
<!-- 安全检测结束 -->
<div class="panel panel-default">
	<div class="panel-heading">
		<i class="ace-icon fa fa-wrench"></i>
		<span class="icon-desktop"></span> 日常维护
	</div>
	<table class="table">
		<tbody>
		<tr>
			<td colspan="2">
				<a href="<?php echo addon_url('maintain://Action/maintain',array('action'=>'download_log')); ?>" target="_blank" class="btn btn-default maintain">下载日志</a>
				<a href="<?php echo addon_url('maintain://Action/maintain',array('action'=>'view_log')); ?>" target="_blank" class="btn btn-default maintain">查看日志</a>
				<a href="<?php echo addon_url('maintain://Action/maintain',array('action'=>'clear_log')); ?>" class="btn btn-default rst-url-btn maintain">清除日志</a>
				<?php if($danger_mode_debug): ?>
					<a href="<?php echo addon_url('maintain://Action/maintain',array('action'=>'debug_off')); ?>" class="btn btn-default rst-url-btn maintain">关闭调试</a>
					<?php else: ?>
					<a href="<?php echo addon_url('maintain://Action/maintain',array('action'=>'debug_on')); ?>" class="btn btn-default rst-url-btn maintain">打开调试</a>
				<?php endif; if($system_pageshow): ?>
					<a href="<?php echo addon_url('maintain://Action/maintain',array('action'=>'trace_off')); ?>" class="btn btn-default rst-url-btn maintain">关闭Trace</a>
					<?php else: ?>
					<a href="<?php echo addon_url('maintain://Action/maintain',array('action'=>'trace_on')); ?>" class="btn btn-default rst-url-btn maintain">打开Trace</a>
				<?php endif; ?>
			</td>
		</tr>
		<tr>
			<td>日志大小 : <?php echo format_bytes($log_size); ?></td>
			<td>日志数 : <?php echo $log_file_cnt; ?></td>
		</tr>
		</tbody>
	</table>
</div>