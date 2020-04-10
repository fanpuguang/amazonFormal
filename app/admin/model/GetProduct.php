<?php
namespace app\admin\model;
use think\Model;
use think\Db;
vendor("MarketplaceWebServiceProducts.Client");
vendor("MarketplaceWebServiceProducts.Model.GetMatchingProductForIdRequest");
vendor("MarketplaceWebServiceProducts.Model.IdListType");
class GetProduct extends Model

{
    public $config;
    public $service;
    public $marketplaceIdArray;
    public function __construct()
    {
        //美洲
        $this->config['na'] = array (
          'ServiceURL' => "https://mws.amazonservices.com/Products/2011-10-01",
           'ProxyHost' => null,
           'ProxyPort' => -1,
           'ProxyUsername' => null,
           'ProxyPassword' => null,
           'MaxErrorRetry' => 3,
        );
        $this->service['na'] = new \MarketplaceWebServiceProducts_Client(
         'AKIAIZY6DECYVIDLD3WQ',//AWSAccessKeyId 薛锦涛
         '/LaN5wRa+clZDsXqXFw2GUk6/ZEcrlkV8JxZE2OH', //Secret Key 薛艳红 欧洲站
         'LIUJIELD',
         '2011-10-01',
         $this->config['na']
        );
        $this->marketplaceIdArray['na']=array(
              'A1AM78C64UM0Y8', //mx
              'A2EUQ1WTGCTBG2', //ca
              'ATVPDKIKX0DER' //usa
          ); 
        //欧洲
        $this->config['eu'] = array (
          'ServiceURL' => "https://mws-eu.amazonservices.com/Products/2011-10-01",
          'ProxyHost' => null,
          'ProxyPort' => -1,
          'ProxyUsername' => null,
          'ProxyPassword' => null,
          'MaxErrorRetry' => 3,
        );
        $this->service['eu'] = new \MarketplaceWebServiceProducts_Client(
         'AKIAJZHK4YO7XDLGI2OA',//AWSAccessKeyId 薛艳红
         'd5qdRlmdEmJAWbcUGQEJbCQeVpT/E4eFPD1b1Ar1', //Secret Key 薛艳红 欧洲站
         'LIUJIELD',
         '2011-10-01',
         $this->config['eu']
        );
        $this->marketplaceIdArray['eu']=array(
              'A13V1IB3VIYZZH', //fr
              'A1F83G8C2ARO7P', //uk
              'A1PA6795UKMFR9', //de
              'A1RKKUPIHCS9HS', //es
              'APJ6JRA9NG5V4' //it
        ); 
        $this->GetMatchingProductForIdRequest = new \MarketplaceWebServiceProducts_Model_GetMatchingProductForIdRequest();
        $this->IdListType = new \MarketplaceWebServiceProducts_Model_IdListType();
        $this->dom = new \DOMDocument();
    }
    /**
     * GetMatchingProductForId
     * 根据指定条件获取商品
     * @param $data['area'] 地区 eu欧洲 na美洲
     * @param $data['SellerId'] 卖家id
     * @param $data['MWSAuthToken']
     * @param $data['MarketplaceId'] 国家id
     * @param $data['IdType'] Id类型
     * @param $data['id'] Id值
     * @return 商品数组
     */
    public function GetMatchingProductForId($data){
      // $data['area'] = "eu";
      // $data['SellerId'] = "A22MV3GXUGEVAL";
      // $data['MWSAuthToken'] = "amzn.mws.04b67143-0702-7741-85a3-54fa7fd629e4";
      // $data['id'] = "B07VD8C42Z";
      // $data['IdType'] = "ASIN";
      // $data['MarketplaceId'] = "A13V1IB3VIYZZH";

      $MarketplaceId = $data['MarketplaceId'];
      $IdType = $data["IdType"];
      $SellerId = $data['SellerId'];
      $MWSAuthToken = $data['MWSAuthToken'];
      $area = $data['area'];
      $id = $data['id'];

      $request = $this->GetMatchingProductForIdRequest;
      $this->IdListType->setId($id);   
      $request->setSellerId($SellerId);
      $request->setMWSAuthToken($MWSAuthToken);
      $request->setMarketplaceId($MarketplaceId);
      $request->setIdType($IdType);
      $request->setIdList($this->IdListType);
      $response = $this->service[$area]->getMatchingProductForId($request);
      $this->dom->loadXML($response);
      $zarr=$this->getArray($this->dom->documentElement);
      // dump($zarr['GetMatchingProductForIdResult'][0]['Products']['Product']['AttributeSets'][0]['ns2:ItemAttributes']['ns2:SmallImage'][0]['ns2:URL'][0]['#text']);die;
      //返回缩略图
      return $zarr['GetMatchingProductForIdResult'][0]['Products']['Product']['AttributeSets'][0]['ns2:ItemAttributes']['ns2:SmallImage'][0]['ns2:URL'][0]['#text'];
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