<?php if (!defined('THINK_PATH')) exit(); /*a:1:{s:86:"/www/wwwroot/www.ldkjmy.com/aaaa/yamaxun/app/admin/view/product/ajax_productclass.html";i:1568269807;}*/ ?>
<?php if(is_array($productclass) || $productclass instanceof \think\Collection || $productclass instanceof \think\Paginator): if( count($productclass)==0 ) : echo "" ;else: foreach($productclass as $key=>$v): ?>
	<tr>
		<!--<td class="hidden-xs" align="center">
			<label class="pos-rel">
				<input name='id[]' id="navid" class="ace"  type='checkbox' value='<?php echo $v['id']; ?>'>
				<span class="lbl"></span>
			</label>
		</td>-->

		<td class="hidden-xs"><?php echo $v['id']; ?></td>
		<td class="hidden-xs"><?php echo $v['name']; ?></td>
		<td>
			<div class="hidden-sm hidden-xs action-buttons">
				<a class="green" href="<?php echo url('admin/Product/productclass_edit',array('id'=>$v['id'])); ?>" data-toggle="tooltip" title="修改">
					<i class="ace-icon fa fa-pencil bigger-130"></i>
				</a>
				<a class="red confirm-rst-url-btn" data-info="你确定要删除到回收站吗？" href="<?php echo url('admin/Product/productclass_del',array('id'=>$v['id'],'p'=>input('p',1))); ?>" title="回收站" data-toggle="tooltip">
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
							<a href="<?php echo url('admin/Productclass/product_edit',array('id'=>$v['id'])); ?>" class="tooltip-success" data-rel="tooltip" title="" data-original-title="修改">
											<span class="green">
												<i class="ace-icon fa fa-pencil-square-o bigger-120"></i>
											</span>
							</a>
						</li>

						<li>
							<a href="<?php echo url('admin/Productclass/product_del',array('id'=>$v['id'],'p'=>input('p',1))); ?>" data-info="你确定要删除到回收站吗？" class="tooltip-error confirm-rst-url-btn" data-rel="tooltip" title="回收站" data-original-title="回收站">
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

