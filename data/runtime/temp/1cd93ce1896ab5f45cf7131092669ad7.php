<?php if (!defined('THINK_PATH')) exit(); /*a:1:{s:86:"/www/wwwroot/www.ldkjmy.com/aaaa/yamaxun/app/admin/view/renling/ajax_product_list.html";i:1578553891;}*/ ?>
<?php if(is_array($product) || $product instanceof \think\Collection || $product instanceof \think\Paginator): if( count($product)==0 ) : echo "" ;else: foreach($product as $key=>$v): ?>
	<tr>
		<td class="hidden-xs" align="center">
			<label class="pos-rel">
				<input name='goodsId[]' id="navid" class="ace"  type='checkbox' value='<?php echo $v['goodsId']; ?>'>
				<span class="lbl"></span>
			</label>
		</td>

		<td class="hidden-xs" align="center"><?php echo $v['goodsId']; ?>111</td>
		<td class="hidden-xs" align="center">
			<img style="width:50px;hieght:50px;" src="<?php foreach (explode(',',$v['goodsImages']) as $k1=>$v1){
				if($k1 == 0){
					echo $v1;
				}
			} ?>"/>
		</td>
		<td class="hidden-sm hidden-xs" style="color:green;">
			【<?php echo $v['goodsTitle']; ?>】
		</td>
		<!--<td><a href="<?php echo $v['goodsUrl']; ?>" target="_blank"><?php echo $v['goodsUrl']; ?></a></td>-->

		<td class="hidden-xs hidden-sm"><?php echo $v['goodsSku']; ?></td>

		<td class="hidden-xs">
			<?php if($v['goodsStaus'] == 1): ?>
				<a class="red state-btn" href="<?php echo url('admin/Product/product_state'); ?>" data-id="<?php echo $v['goodsId']; ?>" title="已审">
					<div><button class="btn btn-minier btn-yellow">已审</button></div>
				</a>
				<?php else: ?>
				<a class="red state-btn" href="<?php echo url('admin/Product/product_state'); ?>" data-id="<?php echo $v['goodsId']; ?>" title="未审">
					<div><button class="btn btn-minier btn-danger">未审</button></div>
				</a>
			<?php endif; ?>
		</td>
		<td class="hidden-xs"><?php echo $v['admin_realname']; ?></td>
		<td class="hidden-xs"><?php echo date("Y-m-d",$v['add_time']); ?></td>
		<td class="hidden-xs"><?php echo date("Y-m-d",$v['add_time']); ?></td>
		<td>
			<div class="hidden-sm hidden-xs action-buttons">
				<a class="green" href="<?php echo url('admin/Product/product_edit',array('goodsId'=>$v['goodsId'])); ?>" data-toggle="tooltip" title="修改">
					<i class="ace-icon fa fa-pencil bigger-130"></i>
				</a>
				<a class="red confirm-rst-url-btn" data-info="你确定要删除到回收站吗？" href="<?php echo url('admin/Product/product_del',array('goodsId'=>$v['goodsId'],'p'=>input('p',1))); ?>" title="回收站" data-toggle="tooltip">
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
							<a href="<?php echo url('admin/Product/product_edit',array('goodsId'=>$v['goodsId'])); ?>" class="tooltip-success" data-rel="tooltip" title="" data-original-title="修改">
											<span class="green">
												<i class="ace-icon fa fa-pencil-square-o bigger-120"></i>
											</span>
							</a>
						</li>

						<li>
							<a href="<?php echo url('admin/Product/product_del',array('goodsId'=>$v['goodsId'],'p'=>input('p',1))); ?>" data-info="你确定要删除到回收站吗？" class="tooltip-error confirm-rst-url-btn" data-rel="tooltip" title="回收站" data-original-title="回收站">
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
	<td align="left" class="hidden-xs center"><!--<button  id="btnorder" href="<?php echo url('admin/Product/product_order'); ?>" class="btn btn-white btn-yellow btn-sm">排序</button>--></td>
	<td colspan="9" align="right" class="hidden-xs"><?php echo $page; ?></td>
</tr>
