<?php if (!defined('THINK_PATH')) exit(); /*a:1:{s:75:"D:\php\PHPTutorial\WWW\qiyetp5/app/admin\view\sys\ajax_admin_rule_list.html";i:1503645978;}*/ ?>
<?php if(is_array($admin_rule) || $admin_rule instanceof \think\Collection || $admin_rule instanceof \think\Paginator): if( count($admin_rule)==0 ) : echo "" ;else: foreach($admin_rule as $key=>$v): ?>
	<tr id="<?php echo $pid; ?>-<?php echo $v['id']; ?>">
		<td height="28"><?php echo $v['id']; ?></td>
		<td><a data-id="<?php echo $v['id']; ?>" data-level="<?php echo $v['level']; ?>" href="<?php echo url('admin/Sys/admin_rule_list',['pid'=>$v['id']]); ?>" style="cursor:pointer;" class="rule-list"><span class="fa <?php if($v['level'] >= 4): ?>fa-minus<?php else: ?>fa-plus<?php endif; ?> blue"></span></a></td>
		<td class="hidden-xs" style='padding-left:<?php if($v['leftpin'] != 0): ?><?php echo $v['leftpin']; ?>px<?php endif; ?>' ><?php echo $v['lefthtml']; ?><?php echo $v['title']; ?></td>
		<td><?php echo $v['name']; ?></td>
		<td>
			<?php if($v['notcheck'] == 1): ?>
			<a class="red notcheck-btn" href="<?php echo url('admin/Sys/admin_rule_notcheck'); ?>" data-id="<?php echo $v['id']; ?>" title="不检测">
				<div id="zt<?php echo $v['id']; ?>"><button class="btn btn-minier btn-danger">不检测</button></div>
			</a>
			<?php else: ?>
			<a class="red notcheck-btn" href="<?php echo url('admin/Sys/admin_rule_notcheck'); ?>" data-id="<?php echo $v['id']; ?>" title="检测">
				<div id="zt<?php echo $v['id']; ?>"><button class="btn btn-minier btn-yellow">检测</button></div>
			</a>
			<?php endif; ?>
		</td>
		<td>
			<?php if($v['status'] == 1): ?>
				<a class="red display-btn" href="<?php echo url('admin/Sys/admin_rule_state'); ?>" data-id="<?php echo $v['id']; ?>" title="已显示">
					<div id="zt<?php echo $v['id']; ?>"><button class="btn btn-minier btn-yellow">显示</button></div>
				</a>
				<?php else: ?>
				<a class="red display-btn" href="<?php echo url('admin/Sys/admin_rule_state'); ?>" data-id="<?php echo $v['id']; ?>" title="已隐藏">
					<div id="zt<?php echo $v['id']; ?>"><button class="btn btn-minier btn-danger">隐藏</button></div>
				</a>
			<?php endif; ?>
		</td>
		<td class="hidden-sm hidden-xs"><?php echo $v['level']; ?>级</td>
		<td class="hidden-sm hidden-xs"><?php echo date('Y-m-d',$v['addtime']); ?></td>
		<td class="hidden-sm hidden-xs"><input name="<?php echo $v['id']; ?>" value="<?php echo $v['sort']; ?>" class="list_order center"/></td>
		<td>
			<div class="hidden-sm hidden-xs action-buttons">
				<a class="blue" href="<?php echo url('admin/Sys/admin_rule_add',array('pid'=>$v['id'])); ?>"  title="添加子类">
					<i class="ace-icon fa fa-plus-circle bigger-130"></i>
				</a>
				<a class="green" href="<?php echo url('admin/Sys/admin_rule_edit',array('id'=>$v['id'])); ?>" title="修改">
					<i class="ace-icon fa fa-pencil bigger-130"></i>
				</a>
				<a class="green" href="<?php echo url('admin/Sys/admin_rule_copy',array('id'=>$v['id'])); ?>" title="复制">
					<i class="ace-icon fa fa-exchange bigger-130"></i>
				</a>
				<a class="red confirm-rst-url-btn" href="<?php echo url('admin/Sys/admin_rule_del',array('id'=>$v['id'])); ?>" data-info="你确定要删除吗？" title="删除">
					<i class="ace-icon fa fa-trash-o bigger-130"></i>							</a>
			</div>
			<div class="hidden-md hidden-lg">
				<div class="inline position-relative">
					<button class="btn btn-minier btn-primary dropdown-toggle" data-toggle="dropdown" data-position="auto">
						<i class="ace-icon fa fa-cog icon-only bigger-110"></i>
					</button>
					<ul class="dropdown-menu dropdown-only-icon dropdown-yellow dropdown-menu-right dropdown-caret dropdown-close">
						<li>	
							<a href="<?php echo url('admin/Sys/admin_rule_add',array('pid'=>$v['id'])); ?>"  class="tooltip-success" data-rel="tooltip" title="" data-original-title="添加子类">
										<span class="green">
											<i class="ace-icon fa fa-plus-circle bigger-120"></i>
										</span>
							</a>						
						</li>
						<li>
							<a href="<?php echo url('admin/Sys/admin_rule_edit',array('id'=>$v['id'])); ?>" class="tooltip-success" data-rel="tooltip" title="" data-original-title="修改">
											<span class="green">
												<i class="ace-icon fa fa-pencil-square-o bigger-120"></i>
											</span>
							</a>
						</li>
						<li>
							<a href="<?php echo url('admin/Sys/admin_rule_copy',array('id'=>$v['id'])); ?>" class="tooltip-success" data-rel="tooltip" title="" data-original-title="复制">
											<span class="green">
												<i class="ace-icon fa fa-exchange bigger-120"></i>
											</span>
							</a>
						</li>
						<li>
							<a href="<?php echo url('admin/Sys/admin_rule_del',array('id'=>$v['id'])); ?>"  data-info="你确定要删除吗？" class="tooltip-error confirm-rst-url-btn" data-rel="tooltip" title="" data-original-title="删除">
											<span class="red">
												<i class="ace-icon fa fa-trash-o bigger-120"></i>
											</span>
							</a>
						</li>
					</ul>
				</div>
			</div>
		</td>
	</tr>
<?php endforeach; endif; else: echo "" ;endif; ?>