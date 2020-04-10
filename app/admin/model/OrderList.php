<?php
namespace app\admin\model;
use think\Model;
use think\Db;
vendor("MarketplaceWebServiceOrders.Client");
vendor("MarketplaceWebServiceOrders.Model.GetOrderRequest");
vendor("MarketplaceWebServiceOrders.Model.ListOrdersRequest");
vendor("MarketplaceWebServiceOrders.Model.ListOrderItemsRequest");
vendor("MarketplaceWebServiceOrders.Model.ListOrdersByNextTokenRequest");
class OrderList extends Model

{
    public $config;
    public $service;
    public $marketplaceIdArray;
    public function __construct()
    {
        //美洲
        $this->config['na'] = array (
            'ServiceURL' => "https://mws.amazonservices.com/Orders/2013-09-01",
            'ProxyHost' => null,
            'ProxyPort' => -1,
            'MaxErrorRetry' => 3
        );
        $this->service['na'] = new \MarketplaceWebServiceOrders_Client(
            'AKIAIZY6DECYVIDLD3WQ',//AWSAccessKeyId 薛锦涛
            '/LaN5wRa+clZDsXqXFw2GUk6/ZEcrlkV8JxZE2OH', //Secret Key 薛艳红 欧洲站
            'LDKJMY',
            '2013-09-01',
            $this->config['na']
        );
        $this->marketplaceIdArray['na']=array(
            'A1AM78C64UM0Y8', //mx
            'A2EUQ1WTGCTBG2', //ca
            'ATVPDKIKX0DER' //usa
        );
        //欧洲
        $this->config['eu'] = array (
            'ServiceURL' => "https://mws-eu.amazonservices.com/Orders/2013-09-01",
            'ProxyHost' => null,
            'ProxyPort' => -1,
            'MaxErrorRetry' => 3
        );
        $this->service['eu'] = new \MarketplaceWebServiceOrders_Client(
            'AKIAJZHK4YO7XDLGI2OA',//AWSAccessKeyId 薛艳红
            'd5qdRlmdEmJAWbcUGQEJbCQeVpT/E4eFPD1b1Ar1', //Secret Key 薛艳红 欧洲站
            'LIUJIELD',
            '2013-09-01',
            $this->config['eu']
        );
        $this->marketplaceIdArray['eu']=array(
            'A13V1IB3VIYZZH', //fr
            'A1F83G8C2ARO7P', //uk
            'A1PA6795UKMFR9', //de
            'A1RKKUPIHCS9HS', //es
            'APJ6JRA9NG5V4' //it
        );
        $this->ListOrdersRequest = new \MarketplaceWebServiceOrders_Model_ListOrdersRequest();
        $this->GetOrderRequest = new \MarketplaceWebServiceOrders_Model_GetOrderRequest();
        $this->ListOrdersItemsRequest = new \MarketplaceWebServiceOrders_Model_ListOrderItemsRequest();
        $this->ListOrdersByNextTokenRequest = new \MarketplaceWebServiceOrders_Model_ListOrdersByNextTokenRequest();
        $this->dom = new \DOMDocument();
    }
    /**
     * createdAfter
     * 指定时间之后创建
     * @param $data['area'] 地区 eu欧洲 na美洲
     * @param $data['SellerId'] 卖家id
     * @param $data['MWSAuthToken']
     * @param $data['createdAfter'] 创建于时间之后
     * @return 订单列表
     */
    public function createdAfter($data){
//      $data['area'] = "eu";
//      $data['SellerId'] = "A22MV3GXUGEVAL";
//      $data['MWSAuthToken'] = "amzn.mws.04b67143-0702-7741-85a3-54fa7fd629e4";
//      $data['createdAfter'] = "2019-07-01";
      $request = $this->ListOrdersRequest;
      $createdAfter = $data['createdAfter'];
      $SellerId = $data['SellerId'];
      $MWSAuthToken = $data['MWSAuthToken'];
      $area = $data['area'];
      $marketplaceIdArray = $this->marketplaceIdArray[$area];
      $request->setSellerId($SellerId);
      $request->setMWSAuthToken($MWSAuthToken);
      $request->setCreatedAfter($createdAfter);
      // $request->setMaxResultsPerPage(4);
      $request->setMarketplaceId($this->marketplaceIdArray[$area]);
      $response = $this->service[$area]->ListOrders($request);
      $this->dom->loadXML($response);
      $zarr=$this->getArray($this->dom->documentElement);
      $orders = $zarr['ListOrdersResult'][0]['Orders'];
      //如果有分页 递归执行分页
      if(isset($zarr['ListOrdersResult'][0]['NextToken'])){
        $data['orders'] = $orders;
        $data['NextToken'] = $zarr['ListOrdersResult'][0]['NextToken'][0]['#text'];
        $this->ListOrderItemsByNextToken($data);
      }else {
       return $orders;
      }
    }
    /**
     * LastUpdatedAfter
     * 指定时间之后更新
     * @param $data['area'] 地区 eu欧洲 na美洲
     * @param $data['SellerId'] 卖家id
     * @param $data['MWSAuthToken']
     * @param $data['createdAfter'] 创建于时间之后
     * @return 订单列表
     */
    public function LastUpdatedAfter($data){
      $request = $this->ListOrdersRequest;
      $LastUpdatedAfter = $data['LastUpdatedAfter'];
      $SellerId = $data['SellerId'];
      $MWSAuthToken = $data['MWSAuthToken'];
      $area = $data['area'];
      $marketplaceIdArray = $this->marketplaceIdArray[$area];
      $request->setSellerId($SellerId);
      $request->setMWSAuthToken($MWSAuthToken);
      $request->setLastUpdatedAfter($LastUpdatedAfter);
      $request->setMarketplaceId($this->marketplaceIdArray[$area]);
      $response = $this->service[$area]->ListOrders($request);
      $this->dom->loadXML($response);
      $zarr=$this->getArray($this->dom->documentElement);
      $orders = $zarr['ListOrdersResult'][0]['Orders'];
      //如果有分页 递归执行分页
      if(isset($zarr['ListOrdersResult'][0]['NextToken'])){
        $data['orders'] = $orders;
        $data['NextToken'] = $zarr['ListOrdersResult'][0]['NextToken'][0]['#text'];
        $this->ListOrderItemsByNextToken($data);
      }else {
       return $orders;
      }
    }
    /**
     * listOrderItems
     * 根据您指定的 AmazonOrderId 返回订单商品。
     * @param $data['AmazonOrderId'] 亚马逊订单号
     * @param $data['SellerId'] 卖家id
     * @param $data['MWSAuthToken']
     * @return 订单详情
     */
    public function listOrderItems($data){
        $request = $this->ListOrdersItemsRequest;
        $AmazonOrderId = $data['AmazonOrderId'];
        $SellerId = $data['SellerId'];
        $MWSAuthToken = $data['MWSAuthToken'];
        $request->setSellerId($SellerId);
        $request->setAmazonOrderId($AmazonOrderId);
        $request->setMWSAuthToken($MWSAuthToken);
        $response = $this->service[$data['area']]->listOrderItems($request);
        $this->dom->loadXML($response);
        $zarr=$this->getArray($this->dom->documentElement);
        if(isset($zarr['ListOrderItemsResult'][0]['OrderItems'][0]['OrderItem'][0])){
          $return = ['status'=>'success','data'=>$zarr['ListOrderItemsResult'][0]['OrderItems'][0]['OrderItem'][0]];
        }else{
          $return = ['status'=>'error'];
        }
        return $return;
    }
    /**
     * getOrders
     * 根据您指定的 AmazonOrderId 值返回订单。
     * @param $data['AmazonOrderId'] 亚马逊订单号
     * @param $data['SellerId'] 卖家id
     * @param $data['MWSAuthToken']
     * @return 订单详情
     */
    public function getOrders($data){
        $request = $this->GetOrderRequest;
        $AmazonOrderId = $data['AmazonOrderId'];
        $SellerId = $data['SellerId'];
        $MWSAuthToken = $data['MWSAuthToken'];
        $request->setSellerId($SellerId);
        $request->setAmazonOrderId($AmazonOrderId);
        $request->setMWSAuthToken($MWSAuthToken);
        $response = $this->service->getOrder($request);
        $this->dom->loadXML($response);
        $zarr=$this->getArray($dom->documentElement);
        dump($zarr['GetOrderResult']);die;
    }
     /**
     * ListOrderItemsByNextToken
     * 根据您指定的 NextToken 值返回订单。
     * @param $data['NextToken'] 返回的NextToken
     * @param $data['SellerId'] 卖家id
     * @param $data['area'] 地区
     * @param $data['MWSAuthToken']
     * @return 订单详情
     */
    public function ListOrderItemsByNextToken($data){
      sleep(10);
      $request = $this->ListOrdersByNextTokenRequest;
      $area = $data['area'];
      $NextToken = $data['NextToken'];
      $SellerId = $data['SellerId'];
      $MWSAuthToken = $data['MWSAuthToken'];
      $request->setNextToken($NextToken);
      $request->setSellerId($SellerId);
      $request->setMWSAuthToken($MWSAuthToken);
      $response = $this->service[$area]->listOrdersByNextToken($request);
      $this->dom->loadXML($response);
      $zarr=$this->getArray($this->dom->documentElement);
      //将返回本页订单与之前订单合并
      $orders = array_merge($data['orders'],$zarr['ListOrdersByNextTokenResult'][0]['Orders']);
      if(isset($zarr['ListOrdersByNextTokenResult'][0]['NextToken'])){
        $data['orders'] = $orders;
        $data['NextToken'] = $zarr['ListOrdersByNextTokenResult'][0]['NextToken'][0]['#text'];
        $this->ListOrderItemsByNextToken($data);
      }else {
        return $orders;
      }
    }

    /**
     * 对象转换成数组
     */
    public function getArray($node) {
        $array = false;
        if ($node->hasAttributes()) {
            foreach ($node->attributes as $attr) {
                $array[$attr->nodeName] = $attr->nodeValue;
            }
        }
        if ($node->hasChildNodes()) {
            if ($node->childNodes->length == 1) {
                $array[$node->firstChild->nodeName] = $this->getArray($node->firstChild);
            } else {
                foreach ($node->childNodes as $childNode) {
                    if ($childNode->nodeType != XML_TEXT_NODE) {
                        $array[$childNode->nodeName][] = $this->getArray($childNode);
                    }
                }
            }
        } else {
            return $node->nodeValue;
        }
        return $array;
    } 
}