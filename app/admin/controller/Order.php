<?php
// +----------------------------------------------------------------------
// | YFCMF [ WE CAN DO IT MORE SIMPLE ]
// +----------------------------------------------------------------------
// | Copyright (c) 2015-2016 http://www.rainfer.cn All rights reserved.
// +----------------------------------------------------------------------
// | Author: rainfer <81818832@qq.com>
// +----------------------------------------------------------------------
namespace app\admin\controller;

use app\admin\model\AuthRule;
use app\admin\model\OrderList as OrderListModel;
use app\admin\model\GetProduct as GetProductModel;
use think\Db;
use think\Cache;

class Order extends Base
{

    /*
     * 订单列表
     * @author liujie
     */
    public function orderlist()
    {
        //店铺名称
        $userInfo = Db::name('plug_sug')->where('plug_uid',session('admin_auth.aid'))->select();
        $store = [];
        foreach ($userInfo as $key => $value) {
            if($value['plug_khqy']==1){
                $store['A13V1IB3VIYZZH'] = $value['plug_dpbm'];
                $store['A1F83G8C2ARO7P'] = $value['plug_dpbm'];
                $store['A1PA6795UKMFR9'] = $value['plug_dpbm'];
                $store['A1RKKUPIHCS9HS'] = $value['plug_dpbm'];
                $store['APJ6JRA9NG5V4'] = $value['plug_dpbm'];
            }elseif($value['plug_khqy']==0){
                $store['A2EUQ1WTGCTBG2'] = $value['plug_dpbm'];
                $store['A1AM78C64UM0Y8'] = $value['plug_dpbm'];
                $store['ATVPDKIKX0DER'] = $value['plug_dpbm'];
            }elseif($value['plug_khqy']==2){
                $store['A1VC38T7YXB528'] = $value['plug_dpbm'];
            }
        }
        //搜索条件
        $search = array();
        $OrderId = input('OrderId','');
        $AmazonOrderId = input('AmazonOrderId','');
        $GoodsSku = input('GoodsSku','');
        $ASIN = input('ASIN','');
        $shipment_number = input('shipment_number','');
        $startTime = input('startTime','');
        $endTime = input('endTime','');
        // dump($startTime);die;
        $OrderStatus = input('order_status','');
        $abnormal_status = input('abnormal_status','');
        if($OrderId!==""){
            $search['OrderId'] = array('eq',$OrderId);
        }
        if($AmazonOrderId!==""){
            $search['AmazonOrderId']= array('like',"%".$AmazonOrderId."%");
        }
        if($ASIN!==""){
            $search['ASIN'] = array('eq',$ASIN);
        }
        if($shipment_number!==""){
            $search['shipment_number'] = array('eq',$shipment_number);
        }
        if($startTime!==""){
            $time = strtotime($startTime);
            $search['OrderAddtime'] = array('>',$time);
        }
        if($endTime!==""){
            $time = strtotime($endTime);
            $search['OrderAddtime'] = array('<',$time);
        }
        if($OrderStatus!==""){
            $search['OrderStatus'] = array('eq',$OrderStatus);
        }
        if($abnormal_status!==""){
            $search['abnormal_status'] = array('eq',$abnormal_status);
        }
        //订单列表
        $orderList = Db::name('order')->where($search)->where('UserId',session('admin_auth.aid'))->order('OrderAddtime')->paginate(config('paginate.list_rows'));
        $page = $orderList->render();
        //统计
        $orderCount = Db::name('order')->where('UserId',session('admin_auth.aid'))->select();
        // dump($orderCount);die;
        $count = [];
        $count['total'] = count($orderCount);
        $count['Pending'] = 0;
        $count['Unshipped'] = 0;
        $count['Shipped'] = 0;
        $count['Canceled'] = 0;
        foreach ($orderCount as $key => $value) {
            //待付款
            if($value['OrderStatus']==1){
                $count['Pending']++;
            }elseif($value['OrderStatus']==2){
                //已付款
                $count['Unshipped']++;
            }elseif($value['OrderStatus']==3){
                //已发货
                $count['Shipped']++;
            }elseif($value['OrderStatus']==4){
                //已取消
                $count['Canceled']++;
            }
        }
        // dump($count);die;
        $this->assign('count',$count);
        $this->assign('orderList',$orderList);
        $this->assign('store',$store);
        $this->assign('page',$page);
        // dump($page);die;
        if(request()->isAjax()){
            return $this->fetch('ajax_order_list');
        }else{
            return $this->fetch();
        }
    }
    /*
     * 订单详情
     * @author 
     */
    public function orderdetail(){
        $id = input('id');
        $detail = Db::view('order')
                    ->view('ordergoods','*','order.OrderId=ordergoods.OrderId')
                    ->where('order.UserId',session('admin_auth.aid'))
                    ->where('order.OrderId',$id)
                    ->find();
        //国内物流
        $DomesticLogistics = Db::name('domestic_logistics')->where('OrderId',$id)->find();
        //国际物流
        $international = Db::name('internation_logistics')->where('OrderId',$id)->find();
        $this->assign('DomesticLogistics',$DomesticLogistics);
        $this->assign('international',$international);
        $this->assign('detail',$detail);
        return $this->fetch();
    }
    /*
     * 修改国内物流
     * @author 
     */
    public function updateDomestic(){
        $OrderId = input('OrderId');
        $data['purchase_price'] = input('purchase_price');
        $data['shipment_company'] = input('shipment_company');
        $data['shipment_number'] = input('shipment_number');
        $data['shipping_date'] = input('shipping_date');
        $check = Db::name('domestic_logistics')->where('OrderId',$OrderId)->find();
        if($check){
            $res = Db::name('domestic_logistics')->where('OrderId',$OrderId)->update($data);
        }else{
            $data['buyer'] = session('admin_auth.aid');
            $data['OrderId'] = $OrderId;
            $res = Db::name('domestic_logistics')->insert($data);
        }
        if($res){
            Db::name('order')->where('OrderId',$OrderId)->update(['OrderStatus'=>5]);
            $return = ['status'=>'success','msg'=>'修改成功'];
        }else{
            $return = ['status'=>'error','msg'=>'修改失败'];
        }
        return json($return);
    }
    /*
     * 修改国际物流
     * @author 
     */
    public function updateInternation(){
        $OrderId = input('OrderId');
        $data['international_no'] = input('international_no');
        $data['tracking_number'] = input('tracking_number');
        $data['freight'] = input('freight');
        $data['line'] = input('line');
        $data['weight'] = input('weight');
        $data['shipping_date'] = input('shipping_date');
        $check = Db::name('internation_logistics')->where('OrderId',$OrderId)->find();
        if($check){
            $res = Db::name('internation_logistics')->where('OrderId',$OrderId)->update($data);
        }else{
            $data['buyer'] = session('admin_auth.aid');
            $data['OrderId'] = $OrderId;
            $res = Db::name('internation_logistics')->insert($data);
        }
        if($res){
            $return = ['status'=>'success','msg'=>'修改成功'];
        }else{
            $return = ['status'=>'error','msg'=>'修改失败'];
        }
        return json($return);
    }
    /*
     * 我的订单列表
     * @author liujie
     */
    public function myorderlist()
    {
        $order=Db::name('orderdetails')->order('orderId desc')->where('uid =1')->paginate(config('paginate.list_rows'));
        $page = $order->render();
        $this->assign('order',$order);
        $this->assign('page',$page);
        return $this->fetch();
    }

    /*
     * 所有订单采购列表
     * @author liujie
     */
    public function orderpurchase()
    {
        $order=Db::name('orderdetails')->order('orderId desc')->paginate(config('paginate.list_rows'));
        $page = $order->render();
        $this->assign('order',$order);
        $this->assign('page',$page);
        return $this->fetch();
    }
    /*
     * 获取订单
     */
    public function getListOrder(){
        $date = date("Y-m-d",strtotime('-100 day'));   
        $currency = Db::name('currency')->select();
        $OrderListModel = new OrderListModel();
        $BaseCurrency = ['JPY'=>2,'EUR'=>1,'GBP'=>0,'USD'=>3,'MXN'=>7,'CAD'=>4];
        //地区1欧洲0美洲
        $area['1'] = 'eu';
        $area['0'] = 'na';
        //用户id
        // $userId = 1;
        $userId = session('admin_auth.aid');
        $user = Db::name('plug_sug')->where('plug_uid',$userId)->where('plug_khqy','<',2)->select();
        // dump($user);die;
        // $user = Db::name('plug_sug')->where('plug_khqy','<',2)->select();
        foreach ($user as $key => $value) {
            //地区
            $data['area'] = $area[$value['plug_khqy']];
            //卖家id
            $data['SellerId'] = $value['plug_merchant_id'];
            //卖家token
            $data['MWSAuthToken'] = $value['plug_lingpai'];
            //创建日期
            $data['createdAfter'] = $date;

            // echo 11;die;
            $orderlist = $OrderListModel->createdAfter($data);
            if(isset($orderlist[0]['Order'])){
                foreach ($orderlist[0]['Order'] as $k => $v) {
                    $orderData['UserId'] = $value['plug_uid'];
                    $orderData['LatestShipDate'] = isset($v['LatestShipDate'][0]['#text'])?$v['LatestShipDate'][0]['#text']:"";
                    $orderData['OrderType'] = isset($v['OrderType'][0]['#text'])?$v['OrderType'][0]['#text']:"";
                    $orderData['AmazonOrderId'] = isset($v['AmazonOrderId'][0]['#text'])?$v['AmazonOrderId'][0]['#text']:"";
                    $orderData['PurchaseDate'] = isset($v['PurchaseDate'][0]['#text'])?$v['PurchaseDate'][0]['#text']:"";
                    $orderData['BuyerEmail'] = isset($v['BuyerEmail'][0]['#text'])?$v['BuyerEmail'][0]['#text']:"";
                    $orderData['LastUpdateDate'] = isset($v['LastUpdateDate'][0]['#text'])?$v['LastUpdateDate'][0]['#text']:"";
                    $orderData['NumberOfItemsShipped'] = isset($v['NumberOfItemsShipped'][0]['#text'])?$v['NumberOfItemsShipped'][0]['#text']:"";
                    $orderData['ShipServiceLevel'] = isset($v['ShipServiceLevel'][0]['#text'])?$v['ShipServiceLevel'][0]['#text']:"";
                    if(isset($v['OrderStatus'][0]['#text'])){
                        if($v['OrderStatus'][0]['#text']=="Pending"){
                            //待付款
                            $orderData['OrderStatus'] = 1;
                        }elseif($v['OrderStatus'][0]['#text']=="Unshipped"){
                            //已付款
                            $orderData['OrderStatus'] = 2;
                        }elseif($v['OrderStatus'][0]['#text']=="Shipped"){
                            //已发货
                            $orderData['OrderStatus'] = 3;
                        }elseif($v['OrderStatus'][0]['#text']=="Canceled"){
                            //取消
                            $orderData['OrderStatus'] = 4;
                        }

                    }
                    // $orderData['OrderStatus'] = isset($v['OrderStatus'][0]['#text'])?$v['OrderStatus'][0]['#text']:"";
                    

                    $orderData['SalesChannel'] = isset($v['SalesChannel'][0]['#text'])?$v['SalesChannel'][0]['#text']:"";
                    $orderData['NumberOfItemsUnshipped'] = isset($v['NumberOfItemsUnshipped'][0]['#text'])?$v['NumberOfItemsUnshipped'][0]['#text']:"";
                    $orderData['PaymentMethodDetails'] = isset($v['PaymentMethodDetails'][0]['PaymentMethodDetail'][0]['#text'])?$v['PaymentMethodDetails'][0]['PaymentMethodDetail'][0]['#text']:"";
                    $orderData['LatestDeliveryDate'] = isset($v['LatestDeliveryDate'][0]['#text'])?$v['LatestDeliveryDate'][0]['#text']:"";
                    $orderData['EarliestDeliveryDate'] = isset($v['EarliestDeliveryDate'][0]['#text'])?$v['EarliestDeliveryDate'][0]['#text']:"";
                    $orderData['Amount'] = isset($v['OrderTotal'][0]['Amount'][0]['#text'])?$v['OrderTotal'][0]['Amount'][0]['#text']:"";
                    $orderData['CurrencyCode'] = isset($v['OrderTotal'][0]['CurrencyCode'][0]['#text'])?$v['OrderTotal'][0]['CurrencyCode'][0]['#text']:"";
                    if(isset($v['OrderTotal'][0]['CurrencyCode'][0]['#text'])){
                         $orderData['currency'] = isset($currency[$BaseCurrency[$orderData['CurrencyCode']]]['exchange_rate'])?$currency[$BaseCurrency[$orderData['CurrencyCode']]]['exchange_rate']:"";
                    }
                    $orderData['EarliestShipDate'] = isset($v['EarliestShipDate'][0]['#text'])?$v['EarliestShipDate'][0]['#text']:"";
                    $orderData['MarketplaceId'] = isset($v['MarketplaceId'][0]['#text'])?$v['MarketplaceId'][0]['#text']:"";
                    $orderData['FulfillmentChannel'] = isset($v['FulfillmentChannel'][0]['#text'])?$v['FulfillmentChannel'][0]['#text']:"";
                    $orderData['PaymentMethod'] = isset($v['LatestShipDate'][0]['#text'])?$v['LatestShipDate'][0]['#text']:"";
                    $orderData['City'] = isset($v['ShippingAddress'][0]['City'][0]['#text'])?$v['ShippingAddress'][0]['City'][0]['#text']:"";
                    $orderData['PostalCode'] = isset($v['ShippingAddress'][0]['PostalCode'][0]['#text'])?$v['ShippingAddress'][0]['PostalCode'][0]['#text']:"";
                    $orderData['StateOrRegion'] = isset($v['ShippingAddress'][0]['StateOrRegion'][0]['#text'])?$v['ShippingAddress'][0]['StateOrRegion'][0]['#text']:"";
                    $orderData['CountryCode'] = isset($v['ShippingAddress'][0]['CountryCode'][0]['#text'])?$v['ShippingAddress'][0]['CountryCode'][0]['#text']:"";
                    $orderData['OrderAddtime'] = time();
                    //添加订单记录
                    $OrderId = Db::name('order')->insertGetId($orderData);
                    $data['AmazonOrderId'] = $orderData['AmazonOrderId'];
                    //根据订单id查询订单详情
                    $ItemsReturn = $OrderListModel->listOrderItems($data);
                    if($ItemsReturn['status']=="success"){
                        $ItemsData['OrderId'] = $OrderId;
                        $ItemsData['GoodsTitle'] = isset($ItemsReturn['data']['Title'][0]['#text'])?$ItemsReturn['data']['Title'][0]['#text']:"";
                        $ItemsData['GoodsSku'] = isset($ItemsReturn['data']['SellerSKU'][0]['#text'])?$ItemsReturn['data']['SellerSKU'][0]['#text']:"";
                        $ItemsData['ASIN'] = isset($ItemsReturn['data']['ASIN'][0]['#text'])?$ItemsReturn['data']['ASIN'][0]['#text']:"";
                        $ItemsData['GoodsNumber'] = isset($ItemsReturn['data']['ProductInfo'][0]['NumberOfItems'][0]['#text'])?$ItemsReturn['data']['ProductInfo'][0]['NumberOfItems'][0]['#text']:"";
                        $ItemsData['GoodAmount'] = isset($ItemsReturn['data']['ItemPrice'][0]['Amount'][0]['#text'])?$ItemsReturn['data']['ItemPrice'][0]['Amount'][0]['#text']:"";
                        $ItemsData['Currency'] = isset($orderData['currency'])?$orderData['currency']:"";
                        //添加订单详情
                        Db::name('ordergoods')->insert($ItemsData);
                        $productData['area'] = $area[$value['plug_khqy']];
                        $productData['SellerId'] = $value['plug_merchant_id'];
                        $productData['MWSAuthToken'] = $value['plug_lingpai'];
                        $productData['id'] = $ItemsData['ASIN'];
                        $productData['IdType'] = "ASIN";
                        $productData['MarketplaceId'] = $orderData['MarketplaceId'];
                        $model = new GetProductModel();
                        $smallImage = $model->GetMatchingProductForId($productData);
                        Db::name('order')->where('OrderId',$OrderId)->update(['smallImage'=>$smallImage,'ASIN'=>$ItemsData['ASIN']]);
                    }
                    sleep(10);
                }
            }
        }
    }
    public function getUpdate(){
        $date = date("Y-m-d",strtotime('-100 day'));   
        $currency = Db::name('currency')->select();
        $OrderListModel = new OrderListModel();
        $BaseCurrency = ['JPY'=>2,'EUR'=>1,'GBP'=>0,'USD'=>3,'MXN'=>7,'CAD'=>4];
        //地区1欧洲0美洲
        $area['1'] = 'eu';
        $area['0'] = 'na';
        //用户id
        $userId = session('admin_auth.aid');
        $user = Db::name('plug_sug')->where('plug_uid',$userId)->where('plug_khqy','<',2)->select();
        // dump($user);die;
        // $user = Db::name('plug_sug')->where('plug_khqy','<',2)->select();
        foreach ($user as $key => $value) {
            //地区
            $data['area'] = $area[$value['plug_khqy']];
            //卖家id
            $data['SellerId'] = $value['plug_merchant_id'];
            //卖家token
            $data['MWSAuthToken'] = $value['plug_lingpai'];
            //创建日期
            $data['LastUpdatedAfter'] = $date;
            
            $updateList = $OrderListModel->LastUpdatedAfter($data);
            if(isset($updateList[0]['Order'])){
                foreach ($updateList[0]['Order'] as $updatekey => $updatevalue) {
                    $updateData['LatestShipDate'] = isset($updatevalue['LatestShipDate'][0]['#text'])?$updatevalue['LatestShipDate'][0]['#text']:"";
                    $updateData['OrderType'] = isset($updatevalue['OrderType'][0]['#text'])?$updatevalue['OrderType'][0]['#text']:"";
                    $updateData['AmazonOrderId'] = isset($updatevalue['AmazonOrderId'][0]['#text'])?$updatevalue['AmazonOrderId'][0]['#text']:"";
                    $updateData['PurchaseDate'] = isset($updatevalue['PurchaseDate'][0]['#text'])?$updatevalue['PurchaseDate'][0]['#text']:"";
                    $updateData['BuyerEmail'] = isset($updatevalue['BuyerEmail'][0]['#text'])?$updatevalue['BuyerEmail'][0]['#text']:"";
                    $updateData['LastUpdateDate'] = isset($updatevalue['LastUpdateDate'][0]['#text'])?$updatevalue['LastUpdateDate'][0]['#text']:"";
                    $updateData['NumberOfItemsShipped'] = isset($updatevalue['NumberOfItemsShipped'][0]['#text'])?$updatevalue['NumberOfItemsShipped'][0]['#text']:"";
                    $updateData['ShipServiceLevel'] = isset($updatevalue['ShipServiceLevel'][0]['#text'])?$updatevalue['ShipServiceLevel'][0]['#text']:"";
                    if(isset($v['OrderStatus'][0]['#text'])){
                        if($v['OrderStatus'][0]['#text']=="Pending"){
                            //待付款
                            $orderData['OrderStatus'] = 1;
                        }elseif($v['OrderStatus'][0]['#text']=="Unshipped"){
                            //已付款
                            $orderData['OrderStatus'] = 2;
                        }elseif($v['OrderStatus'][0]['#text']=="Shipped"){
                            //已发货
                            $orderData['OrderStatus'] = 3;
                        }elseif($v['OrderStatus'][0]['#text']=="Canceled"){
                            //取消
                            $orderData['OrderStatus'] = 4;
                        }

                    }
                    $updateData['SalesChannel'] = isset($updatevalue['SalesChannel'][0]['#text'])?$updatevalue['SalesChannel'][0]['#text']:"";
                    $updateData['NumberOfItemsUnshipped'] = isset($updatevalue['NumberOfItemsUnshipped'][0]['#text'])?$updatevalue['NumberOfItemsUnshipped'][0]['#text']:"";
                    $updateData['PaymentMethodDetails'] = isset($updatevalue['PaymentMethodDetails'][0]['PaymentMethodDetail'][0]['#text'])?$updatevalue['PaymentMethodDetails'][0]['PaymentMethodDetail'][0]['#text']:"";
                    $updateData['LatestDeliveryDate'] = isset($updatevalue['LatestDeliveryDate'][0]['#text'])?$updatevalue['LatestDeliveryDate'][0]['#text']:"";
                    $updateData['EarliestDeliveryDate'] = isset($updatevalue['EarliestDeliveryDate'][0]['#text'])?$updatevalue['EarliestDeliveryDate'][0]['#text']:"";
                    $updateData['Amount'] = isset($updatevalue['OrderTotal'][0]['Amount'][0]['#text'])?$updatevalue['OrderTotal'][0]['Amount'][0]['#text']:"";
                    $updateData['CurrencyCode'] = isset($updatevalue['OrderTotal'][0]['CurrencyCode'][0]['#text'])?$updatevalue['OrderTotal'][0]['CurrencyCode'][0]['#text']:"";
                    if(isset($updatevalue['OrderTotal'][0]['CurrencyCode'][0]['#text'])){
                         $updateData['currency'] = isset($currency[$BaseCurrency[$updateData['CurrencyCode']]]['exchange_rate'])?$currency[$BaseCurrency[$updateData['CurrencyCode']]]['exchange_rate']:"";
                    }
                    $updateData['EarliestShipDate'] = isset($updatevalue['EarliestShipDate'][0]['#text'])?$updatevalue['EarliestShipDate'][0]['#text']:"";
                    $updateData['MarketplaceId'] = isset($updatevalue['MarketplaceId'][0]['#text'])?$updatevalue['MarketplaceId'][0]['#text']:"";
                    $updateData['FulfillmentChannel'] = isset($updatevalue['FulfillmentChannel'][0]['#text'])?$updatevalue['FulfillmentChannel'][0]['#text']:"";
                    $updateData['PaymentMethod'] = isset($updatevalue['LatestShipDate'][0]['#text'])?$updatevalue['LatestShipDate'][0]['#text']:"";
                    $updateData['City'] = isset($updatevalue['ShippingAddress'][0]['City'][0]['#text'])?$updatevalue['ShippingAddress'][0]['City'][0]['#text']:"";
                    $updateData['PostalCode'] = isset($updatevalue['ShippingAddress'][0]['PostalCode'][0]['#text'])?$updatevalue['ShippingAddress'][0]['PostalCode'][0]['#text']:"";
                    $updateData['StateOrRegion'] = isset($updatevalue['ShippingAddress'][0]['StateOrRegion'][0]['#text'])?$updatevalue['ShippingAddress'][0]['StateOrRegion'][0]['#text']:"";
                    $updateData['CountryCode'] = isset($updatevalue['ShippingAddress'][0]['CountryCode'][0]['#text'])?$updatevalue['ShippingAddress'][0]['CountryCode'][0]['#text']:"";
                    $updateData['updateTime'] = time();
                    //添加订单记录
                    $res = Db::name('order')->where('AmazonOrderId',$updateData['AmazonOrderId'])->update($updateData);
                }   
            }
        }
    }
}