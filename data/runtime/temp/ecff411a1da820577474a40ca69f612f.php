<?php if (!defined('THINK_PATH')) exit(); /*a:1:{s:86:"/www/wwwroot/www.ldkjmy.com/aaaa/yamaxun/app/admin/view/product/ajax_product_back.html";i:1574320338;}*/ ?>
<?php if(is_array($product) || $product instanceof \think\Collection || $product instanceof \think\Paginator): if( count($product)==0 ) : echo "" ;else: foreach($product as $key=>$v): ?>
<tr>
	<td class="hidden-xs" align="center">
		<label class="pos-rel">
			<input name='goodsId[]' id="navid" class="ace"  type='checkbox' value='<?php echo $v['goodsId']; ?>'>
			<span class="lbl"></span>
		</label>
	</td>

	<td class="hidden-xs" align="center"><?php echo $v['goodsId']; ?></td>
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
	<td><a href="<?php echo $v['goodsUrl']; ?>" target="_blank"><?php echo $v['goodsUrl']; ?></a></td>

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

			<a href="<?php echo url('admin/Product/product_back_open',array('goodsId'=>$v['goodsId'],'p'=>input('p',1))); ?>" class="tooltip-success confirm-rst-url-btn" data-info="你确定要还原产品到产品列表吗？" data-rel="tooltip" title="" data-original-title="还原">
				<span class="green">
					<i class="ace-icon fa fa-check bigger-120"></i>
				</span>
			</a>
		</div>

	</td>
</tr>
<?php endforeach; endif; else: echo "" ;endif; ?>
<tr>
	<!--<td align="left"><button id="btnsubmit" class="btn btn-white btn-yellow btn-sm">删</button> </td>-->
	<td colspan="11" align="right"><?php echo $page; ?></td>
</tr>