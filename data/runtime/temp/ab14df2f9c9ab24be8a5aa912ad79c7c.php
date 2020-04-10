<?php if (!defined('THINK_PATH')) exit(); /*a:1:{s:86:"/www/wwwroot/www.ldkjmy.com/aaaa/yamaxun/app/admin/view/product/ajax_product_list.html";i:1578904659;}*/ ?>
<?php if(is_array($product) || $product instanceof \think\Collection || $product instanceof \think\Paginator): if( count($product)==0 ) : echo "" ;else: foreach($product as $key=>$v): ?>
<div class="col-xs-6 col-sm-4 col-md-3" style="width: 16%;">
	<div class="thumbnail search-thumbnail">
		<span class="search-promotion label label-success arrowed-in arrowed-in-right"></span>
		<div style="height:300px;">
		<a href="<?php echo url('admin/Product/product_edit',array('goodsId'=>$v['goodsId'])); ?>" ><img class="media-object" data-src="holder.js/100px200?theme=gray"  style=" width: 100%; display: block;" src="<?php foreach (explode(',',$v['goodsImages']) as $k1=>$v1){
				if($k1 == 0){
					if($v1 == ''){
					echo '/timg.jpg';
					}else{
					echo $v1;
					}
				}
			} ?>" data-holder-rendered="true"/></a>
			
		</div>
		<div class="caption"  style="height:200px;">
			<div class="clearfix">
				<!--	<span class="pull-right label label-grey info-label"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;"><?php echo $v['goodsSku']; ?></font></font></span>-->

				<div class="pull-left bigger-110">
					<label class="pos-rel">
						<input name='goodsId[]' id="navid" class="ace"  type='checkbox' value='<?php echo $v['goodsId']; ?>'>
						<span class="lbl"></span>
					</label>产品编号：<?php echo $v['goodsId']; ?>
				</div>
			</div>
			SKU:<font style="vertical-align: inherit;"><font style="vertical-align: inherit;"><?php echo $v['goodsSku']; ?></font></font>
			<h3 class="search-title">
				<a href="#" class="blue"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">￥<?php echo $v['goodsBuyingPrice']; ?></font></font></a>

			</h3>
			<p style="text-overflow :ellipsis;"><font style="vertical-align: inherit;text-overflow :ellipsis;"><font style="vertical-align: inherit;text-overflow :ellipsis;"></font >标题：<?php echo mb_substr($v['TITLE'],0,50,'utf-8'); ?>...</font></p>
			<a href="#" class="blue"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">添加时间：<?php echo date("Y-m-d H:i:s",$v['add_time']); ?></font></font></a>
		</div>
	</div>
</div>
<?php endforeach; endif; else: echo "" ;endif; ?>
<style>
	.col-md-3 {
		width: 20%;

	}

</style>
<div style="clear: both;"></div>
<?php echo $page; ?>


