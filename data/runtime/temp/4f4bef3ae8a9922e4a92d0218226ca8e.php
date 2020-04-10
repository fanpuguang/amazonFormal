<?php if (!defined('THINK_PATH')) exit(); /*a:1:{s:79:"/www/wwwroot/www.ldkjmy.com/aaaa/yamaxun/app/admin/view/sys/ajax_eansetsys.html";i:1578553892;}*/ ?>
<?php if(is_array($ean_list) || $ean_list instanceof \think\Collection || $ean_list instanceof \think\Paginator): if( count($ean_list)==0 ) : echo "" ;else: foreach($ean_list as $key=>$v): ?>
	<tr>
		<td height="28" ><?php echo $v['id']; ?></td>
		<td>
			<?php if($v['type'] == 1): ?>
			<span style="color:red;">EAN</span>
			<?php else: ?>
			<span style="color:green;">UPC</span>
			<?php endif; ?>
		</td>
		<td><?php echo $v['bianma']; ?></td>
		<td class="hidden-xs">
			<?php if($v['status'] == 1): ?>
			<span style="color:red;">已使用</span>
				<?php else: ?>
			<span style="color:green;">未使用</span>
			<?php endif; ?>
		</td>

		<td>
			<div class="hidden-sm hidden-xs action-buttons">

				<a class="red confirm-rst-url-btn" data-info="你确定要删除吗？" href="<?php echo url('admin/Sys/bianma_del',array('id'=>$v['id'])); ?>" title="删除">
					<i class="ace-icon fa fa-trash-o bigger-130"></i>
				</a>
			</div>

		</td>
	</tr>
<?php endforeach; endif; else: echo "" ;endif; ?>
<tr>
	<td height="50" align="left">
		<a class="red confirm-rst-url-btn" data-info="你确定要清空所有数据吗？" href="<?php echo url('admin/Sys/bianma_dels'); ?>" title="删除">
			清空数据
		</a>
	</td>
	<td height="50" colspan="12" align="right"><?php echo $page; ?></td>
</tr>