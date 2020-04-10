<?php if (!defined('THINK_PATH')) exit(); /*a:1:{s:70:"D:\php\PHPTutorial\WWW\qiyetp5/app/admin\view\news\ajax_news_list.html";i:1554624759;}*/ ?>
<?php if(is_array($news) || $news instanceof \think\Collection || $news instanceof \think\Paginator): if( count($news)==0 ) : echo "" ;else: foreach($news as $key=>$v): ?>
	<tr>
		<td class="hidden-xs" align="center">
			<label class="pos-rel">
				<input name='n_id[]' id="navid" class="ace"  type='checkbox' value='<?php echo $v['n_id']; ?>'>
				<span class="lbl"></span>
			</label>
		</td>
		<!--<td class="hidden-xs center"><input name="<?php echo $v['n_id']; ?>" value="<?php echo (isset($v['listorder']) && ($v['listorder'] !== '')?$v['listorder']:50); ?>" class="list_order news_order"/></td>-->
		<td class="hidden-xs" align="center"><?php echo $v['n_id']; ?></td>
		<td class="hidden-xs" align="center">
			<img style="width:50px;hieght:50px;" src="<?php foreach (explode(',',$v['news_pic_allurl']) as $k1=>$v1){
				if($k1 == 1){
					echo $v1;
				}
			} ?>"/>
		</td>
		<td class="hidden-sm hidden-xs" style="color:green;">
			【<?php echo $v['news_titleshort']; ?>】
		</td>
		<td><?php echo $v['news_source']; ?></td>
		<!--<td><a href="<?php echo url('admin/News/news_edit',array('n_id'=>$v['n_id'])); ?>" title="<?php echo $v['news_title']; ?>"><?php echo $v['n_id']; ?><?php echo $v['news_pic_allurl']; ?></a>【<?php echo (isset($v['member_list_nickname']) && ($v['member_list_nickname'] !== '')?$v['member_list_nickname']:$v['member_list_username']); ?>】</td>-->
		<td class="hidden-xs hidden-sm">
			<?php echo $v['sku']; ?>
		</td>

		<td class="hidden-xs">
			<?php if($v['news_open'] == 1): ?>
				<a class="red state-btn" href="<?php echo url('admin/News/news_state'); ?>" data-id="<?php echo $v['n_id']; ?>" title="已审">
					<div><button class="btn btn-minier btn-yellow">已审</button></div>
				</a>
				<?php else: ?>
				<a class="red state-btn" href="<?php echo url('admin/News/news_state'); ?>" data-id="<?php echo $v['n_id']; ?>" title="未审">
					<div><button class="btn btn-minier btn-danger">未审</button></div>
				</a>
			<?php endif; ?>
		</td>
		<td class="hidden-xs">[<?php echo $v['news_auto']; ?>]【<?php echo $v['member_list_username']; ?>】【<?php echo $v['member_list_nickname']; ?>】</td>
		<td class="hidden-xs"><?php echo date('Y-m-d',$v['news_time']); ?></td>
		<td class="hidden-xs"><?php echo date('Y-m-d',$v['news_edittime']); ?></td>
		<td>
			<div class="hidden-sm hidden-xs action-buttons">
				<a class="green" href="<?php echo url('admin/News/news_edit',array('n_id'=>$v['n_id'])); ?>" data-toggle="tooltip" title="修改">
					<i class="ace-icon fa fa-pencil bigger-130"></i>
				</a>
				<a class="red confirm-rst-url-btn" data-info="你确定要删除到回收站吗？" href="<?php echo url('admin/News/news_del',array('n_id'=>$v['n_id'],'p'=>input('p',1))); ?>" title="回收站" data-toggle="tooltip">
					<i class="ace-icon fa fa-trash-o bigger-130"></i>
				</a>
			</div>
			<div class="hidden-md hidden-lg">
				<div class="inline position-relative">
					<button class="btn btn-minier btn-primary dropdown-toggle" data-toggle="dropdown" data-position="auto">
						<i class="ace-icon fa fa-cog icon-only bigger-110"></i>
					</button>
					<ul class="dropdown-menu dropdown-only-icon dropdown-yellow dropdown-menu-right dropdown-caret dropdown-close">
						<li>
							<a href="<?php echo url('admin/News/news_edit',array('n_id'=>$v['n_id'])); ?>" class="tooltip-success" data-rel="tooltip" title="" data-original-title="修改">
											<span class="green">
												<i class="ace-icon fa fa-pencil-square-o bigger-120"></i>
											</span>
							</a>
						</li>

						<li>
							<a href="<?php echo url('admin/News/news_del',array('n_id'=>$v['n_id'],'p'=>input('p',1))); ?>" data-info="你确定要删除到回收站吗？" class="tooltip-error confirm-rst-url-btn" data-rel="tooltip" title="回收站" data-original-title="回收站">
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
<tr>
	<td align="left" class="hidden-xs center"><button id="btnsubmit" class="btn btn-white btn-yellow btn-sm hidden-xs">删</button> </td>
	<td colspan="2" align="left"class="hidden-lg hidden-md hidden-sm"><?php echo $page; ?></td>
	<td align="left" class="hidden-xs center"><button  id="btnorder" href="<?php echo url('admin/News/news_order'); ?>" class="btn btn-white btn-yellow btn-sm">排序</button></td>
	<td colspan="9" align="right" class="hidden-xs"><?php echo $page; ?></td>
</tr>
