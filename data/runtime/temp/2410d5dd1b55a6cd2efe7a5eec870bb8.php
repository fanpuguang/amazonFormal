<?php if (!defined('THINK_PATH')) exit(); /*a:1:{s:82:"/www/wwwroot/www.ldkjmy.com/aaaa/yamaxun/app/admin/view/order/ajax_order_list.html";i:1579057266;}*/ ?>
<?php if(is_array($orderList) || $orderList instanceof \think\Collection || $orderList instanceof \think\Paginator): if( count($orderList)==0 ) : echo "" ;else: foreach($orderList as $key=>$v): ?>

<tr class="">
	<td class="orderchenc">
		<input type="checkbox" value="">
	</td>
	<td>
		<?php echo $v['OrderId']; ?>
		<br>
		<span class="brSpan">
			<span>
				<?php if($v['MarketplaceId'] == "A1F83G8C2ARO7P"): ?>
				<img src="/public/img/yingg.jpg" alt="">
				英国
				<?php elseif($v['MarketplaceId'] == "A13V1IB3VIYZZH"): ?>
				<img src="/public/img/faguo.jpg" alt="">
				法国
				<?php elseif($v['MarketplaceId'] == "A1PA6795UKMFR9"): ?>
				<img src="/public/img/deguo.jpg" alt="">
				德国
				<?php elseif($v['MarketplaceId'] == "A1RKKUPIHCS9HS"): ?>
				<img src="/public/img/xibanya.jpg" alt="">
				西班牙
				<?php elseif($v['MarketplaceId'] == "APJ6JRA9NG5V4"): ?>
				<img src="/public/img/yidali.jpg" alt="">
				意大利
				<?php elseif($v['MarketplaceId'] == "ATVPDKIKX0DER"): ?>
				<img src="/public/img/american.png" alt="">
				美国
				<?php elseif($v['MarketplaceId'] == "A1AM78C64UM0Y8"): ?>
				<img src="/public/img/moxige.jpg" alt="">
				墨西哥
				<?php elseif($v['MarketplaceId'] == "A2EUQ1WTGCTBG2"): ?>
				<img src="/public/img/jianada.jpg" alt="">
				加拿大
				<?php elseif($v['MarketplaceId'] == "A1VC38T7YXB528"): ?>
				<img src="/public/img/riben.jpg" alt="">
				日本
				<?php endif; ?>
			</span>

		</span>
	</td>
	<td style="width: 100px; color: rgb(153, 153, 153);">
		<?php echo $v['PurchaseDate']; ?>
	</td>
	<td style="width: 130px;">
		<span style="font-size: 13px; color: rgb(102, 102, 102);">
			<?php echo get_dingjiname($v['UserId']); ?>
		</span>
		<br>
		<span style="font-size: 13px; color: rgb(102, 102, 102);">
			操作人:<?php echo get_name($v['UserId']); ?>
		</span>
	</td>
	<td class="imgtd">
		<img src="<?php echo $v['smallImage']; ?>"
			 alt="" width="50">

	</td>
	<!---->
	<td>
		<!---->
		<!---->
		<a href="<?php echo url('order/orderdetail',['id'=>$v['OrderId']]); ?>"
		   layadmin-event="message" lay-text="121917" style="cursor: pointer;">
			<?php echo $v['AmazonOrderId']; ?>
		</a>
		<br>
		<span class="brSpan">
			<img src="/cross_border/statics/kuajing/img/yamaxun.jpg" alt="">
			<!-- LZF(英国) -->
			<?php if(isset($v['MarketplaceId'])): ?>
			<?php echo $store[$v['MarketplaceId']]; endif; ?>
			<span>
				<?php if($v['MarketplaceId'] == "A1F83G8C2ARO7P"): ?>

				英国
				<?php elseif($v['MarketplaceId'] == "A13V1IB3VIYZZH"): ?>

				法国
				<?php elseif($v['MarketplaceId'] == "A1PA6795UKMFR9"): ?>

				德国
				<?php elseif($v['MarketplaceId'] == "A1RKKUPIHCS9HS"): ?>

				西班牙
				<?php elseif($v['MarketplaceId'] == "APJ6JRA9NG5V4"): ?>

				意大利
				<?php elseif($v['MarketplaceId'] == "ATVPDKIKX0DER"): ?>

				美国
				<?php elseif($v['MarketplaceId'] == "A1AM78C64UM0Y8"): ?>

				墨西哥
				<?php elseif($v['MarketplaceId'] == "A2EUQ1WTGCTBG2"): ?>

				加拿大
				<?php elseif($v['MarketplaceId'] == "A1VC38T7YXB528"): ?>

				日本
				<?php endif; ?>
			</span>

		</span>
	</td>
	<td>
		<?php echo $v['Amount']; ?>
	</td>
	<td>
		39.09
		<span>
			(GBP)
		</span>
		<br>
		<span style="color: rgb(153, 153, 153);">
			¥ 333.22
		</span>
	</td>
	<td>
		5.86
		<span>
			(GBP)
		</span>
		<br>
		<span style="color: rgb(153, 153, 153);">
			¥ 49.98
		</span>
	</td>
	<td>
		<?php echo $v['currency']; ?>
		<span>
			(<?php echo $v['CurrencyCode']; ?>)	
		</span>
		<br>
		<span style="color: rgb(153, 153, 153);">
			¥ 283.24
		</span>
	</td>
	<td>
		8.5244
	</td>
	<td>
		76
	</td>
	<td>
	</td>
	<td>
	</td>
	<td>
	</td>
	<td>
	</td>
	<td>
		<?php if($v['OrderStatus'] ==1): ?>
		待付款
		<?php elseif($v['OrderStatus'] ==2): ?>
		已付款
		<?php elseif($v['OrderStatus'] ==3): ?>
		已发货
		<?php elseif($v['OrderStatus'] ==4): ?>
		已取消
		<?php endif; ?>
	</td>
	<td>
		<span class="bule2" >
			<?php if($v['abnormalStatus'] ==1): ?>
			缺货
			<?php endif; ?>
		</span>
	</td>
	<td>
		<span>
			<?php echo date('Y-m-d H:i:s',$v['OrderAddtime']); ?>
		</span>
	</td>
	<td>
		<span style="color: rgb(0, 182, 229); font-size: 13px; cursor: pointer;">
			退款
		</span>
	</td>
</tr>
<?php endforeach; endif; else: echo "" ;endif; ?>
<tr>
	<td>
	</td>
	<td>
	</td>
	<td>
	</td>
	<td>
	</td>
	<td>
	</td>
	<td>
	</td>
	<td>
	</td>
	<td>
	</td>
	<td>
	</td>
	<td>
	</td>
	<td colspan="2" align="left"class="hidden-lg hidden-md hidden-sm"><?php echo $page; ?></td>
	<td align="left" class="hidden-xs center"><!--<button  id="btnorder" href="<?php echo url('admin/Product/product_order'); ?>" class="btn btn-white btn-yellow btn-sm">排序</button>--></td>
	<td colspan="9" align="right" class="hidden-xs"><?php echo $page; ?></td>
</tr>
