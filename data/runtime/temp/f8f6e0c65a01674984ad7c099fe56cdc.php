<?php if (!defined('THINK_PATH')) exit(); /*a:1:{s:55:"D:\php\PHPTutorial\WWW\qiyetp5\addons\info\sysinfo.html";i:1503645978;}*/ ?>
<div class="widget-box sl-indextop10 text-left">
	<div class="widget-header">
		<h5 class="widget-title"><span style="font-size:14px; font-family:Microsoft YaHei">框架&系统信息</span></h5>

	</div>
	<div class="widget-body">
		<div class="widget-main">
			<p class="alert alert-danger sl-line-height25">
				YFCMF版本：<?php echo \think\Config::get('yfcmf_version'); ?> &nbsp;
				<?php if(!empty($update_check)): if(empty($ver_last)): ?>
					<button class="btn btn-xs btn-success"><i class="ace-icon fa fa-check"></i><?php echo $ver_str; ?></button>
				<?php else: ?>
					<a href="<?php echo url('admin/Update/index'); ?>" title="在线更新"><button class="btn btn-xs btn-danger"><i class="ace-icon fa fa-bolt bigger-110"></i><?php echo $ver_str; ?></button></a>
				<?php endif; endif; ?>
				<br />
				框架版本：ThinkPHP<?php echo $info['ThinkPHPTYE']; ?>&nbsp;&nbsp;上传附件限制：<?php echo $info['ONLOAD']; ?><br />
				系统版本：<?php echo $info['RUNTYPE']; ?><br />
			</p>
		</div>
	</div>
</div>