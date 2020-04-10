<?php
namespace app\admin\model;
use think\Model;
use think\Db;
vendor("MarketplaceWebService.Client");
vendor("MarketplaceWebService.Model.StatusList");
vendor("MarketplaceWebService.Model.IdList");
vendor("MarketplaceWebService.Model.GetFeedSubmissionResultRequest");
vendor("MarketplaceWebService.Model.GetFeedSubmissionListRequest");
vendor("MarketplaceWebService.Model.SubmitFeedRequest");
class Submit extends Model

{
    public $db2;
    public function __construct()
    {
        parent::__construct();
        //方法一:表前缀没有用
         $this->db2 = Db::connect([
             // 数据库类型
             'type' => 'mysql',
             // 数据库连接DSN配置
             'dsn' => '',
             // 服务器地址
             'hostname' => '49.232.164.248',
             // 数据库名
             'database' => 'amazon',
             // 数据库用户名
             'username' => 'root',
             // 数据库密码
             'password' => '510efb9e78b483b5',
             // 数据库连接端口
             'hostport' => '3306',
             // 数据库连接参数
            'params' => [],
             // 数据库编码默认采用utf8
             'charset' => 'utf8',
             // 数据库表前缀
             'prefix' => '',
         ]);
    }
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
     //查询本地产品上传结果
    public function GetLocalFeedSubmissionResult($data){
        $config = array (
            'ServiceURL' => $data['serviceUrl'],
            'ProxyHost' => null,
            'ProxyPort' => -1,
            'MaxErrorRetry' => 3,
        );
        $awsAccessKeyId['eu'] = "AKIAJZHK4YO7XDLGI2OA";
        $awsAccessKeyId['na'] = "AKIAIZY6DECYVIDLD3WQ";
        $awsAccessKeyId['jp'] = "AKIAISBICS6HTSKCMC5Q";
        $awsSecretAccessKey['eu']= "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";
        $awsSecretAccessKey['na']= "/LaN5wRa+clZDsXqXFw2GUk6/ZEcrlkV8JxZE2OH";
        $awsSecretAccessKey['jp']= "52GgrWL+/z6f4VGXDg3gaI4cstBcNFzn+gEw6v2F";
        $applicationName['eu'] = "LIUJIELD";
        $applicationName['na'] = "LDKJMY";
        $applicationName['jp'] = "LIUJIELD";
        $service = new \MarketplaceWebService_Client(
            $awsAccessKeyId[$data['area']],
            $awsSecretAccessKey[$data['area']],
            $config,
            $applicationName[$data['area']],
            '2009-01-01');
        $request = new \MarketplaceWebService_Model_GetFeedSubmissionResultRequest();
        $request->setMerchant($data['Merchant']);
        $request->setMWSAuthToken($data['MWSAuthToken']);
        $request->setFeedSubmissionId($data['FeedSubmissionId']);
        $request->setMarketplace($data['marketplaceIdArray']);
        $sessionId = session('admin_auth.aid');
        $time = time();
        $xmlName ="./public/xml/".$sessionId.time().".xml";
        $feedHandle = @fopen($xmlName,'a+');
        $request->setFeedSubmissionResult($feedHandle);
        $service->GetFeedSubmissionResult($request);
        //记录返回信息
        //将XML中的数据,读取到数组对象中
        $xml_object=simplexml_load_file($xmlName); 
        $xml_json=json_encode($xml_object);//对象转成json 
        $xml_arr=json_decode($xml_json,true);//json再转成数组
        $TransactionID = $xml_arr['Message']['ProcessingReport']['DocumentTransactionID'];
        $Processed = $xml_arr['Message']['ProcessingReport']['ProcessingSummary']['MessagesProcessed'];
        $Successful = $xml_arr['Message']['ProcessingReport']['ProcessingSummary']['MessagesSuccessful'];

        //全部上传成功

        $filedName = $data['type']."_submission";
        $fileStatus = $data['type']."_status";
        if($Processed == $Successful){
            $updateData[$fileStatus] = 3;
        }else{
            $updateData[$fileStatus] = 4;
            $errorArray = [];
            if(!isset($xml_arr['Message']['ProcessingReport']['Result'][0])){
                $errorArray[0] = $xml_arr['Message']['ProcessingReport']['Result'];
            }else{
                $errorArray = $xml_arr['Message']['ProcessingReport']['Result'];
            }
            foreach ($errorArray as $key => $value) {
                $errorData['time'] = date("Y-m-d H:i:s",time());
                $errorData['ResultCode'] = $value['ResultCode'];
                $errorData['ResultMessageCode'] = $value['ResultMessageCode'];
                $errorData['ResultDescription'] = $value['ResultDescription'];
                $errorData['TransactionID'] = $TransactionID;
                if(isset($value['AdditionalInfo'])){
                    $errorData['SKU'] = $value['AdditionalInfo']['SKU'];
                }
                Db::name('feed_errors')->insert($errorData);
            }
        }

        Db::name('goods_record')->where($filedName,$TransactionID)->update($updateData);
    }
    //查询结果
    public function GetFeedSubmissionResult($data){
        $config = array (
            'ServiceURL' => $data['serviceUrl'],
            'ProxyHost' => null,
            'ProxyPort' => -1,
            'MaxErrorRetry' => 3,
        );
        $awsAccessKeyId['eu'] = "AKIAJZHK4YO7XDLGI2OA";
        $awsAccessKeyId['na'] = "AKIAIZY6DECYVIDLD3WQ";
        $awsAccessKeyId['jp'] = "AKIAISBICS6HTSKCMC5Q";
        $awsSecretAccessKey['eu']= "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";
        $awsSecretAccessKey['na']= "/LaN5wRa+clZDsXqXFw2GUk6/ZEcrlkV8JxZE2OH";
        $awsSecretAccessKey['jp']= "52GgrWL+/z6f4VGXDg3gaI4cstBcNFzn+gEw6v2F";
        $applicationName['eu'] = "LIUJIELD";
        $applicationName['na'] = "LDKJMY";
        $applicationName['jp'] = "LIUJIELD";
        $service = new \MarketplaceWebService_Client(
            $awsAccessKeyId[$data['area']],
            $awsSecretAccessKey[$data['area']],
            $config,
            $applicationName[$data['area']],
            '2009-01-01');
        $request = new \MarketplaceWebService_Model_GetFeedSubmissionResultRequest();
        $request->setMerchant($data['Merchant']);
        $request->setMWSAuthToken($data['MWSAuthToken']);
        $request->setFeedSubmissionId($data['FeedSubmissionId']);
        $request->setMarketplace($data['marketplaceIdArray']);
        $sessionId = session('admin_auth.aid');
        $time = time();
        $xmlName ="./public/xml/".$sessionId.time().".xml";
        $feedHandle = @fopen($xmlName,'a+');
        $request->setFeedSubmissionResult($feedHandle);
        $service->GetFeedSubmissionResult($request);
        //记录返回信息
        //将XML中的数据,读取到数组对象中
        $xml_object=simplexml_load_file($xmlName); 
        $xml_json=json_encode($xml_object);//对象转成json 
        $xml_arr=json_decode($xml_json,true);//json再转成数组
        $TransactionID = $xml_arr['Message']['ProcessingReport']['DocumentTransactionID'];
        $Processed = $xml_arr['Message']['ProcessingReport']['ProcessingSummary']['MessagesProcessed'];
        $Successful = $xml_arr['Message']['ProcessingReport']['ProcessingSummary']['MessagesSuccessful'];

        //全部上传成功

        $filedName = $data['type']."_submission";
        $fileStatus = $data['type']."_status";
        if($Processed == $Successful){
            $updateData[$fileStatus] = 3;
        }else{
            $updateData[$fileStatus] = 4;
            $errorArray = [];
            if(!isset($xml_arr['Message']['ProcessingReport']['Result'][0])){
                $errorArray[0] = $xml_arr['Message']['ProcessingReport']['Result'];
            }else{
                $errorArray = $xml_arr['Message']['ProcessingReport']['Result'];
            }
            foreach ($errorArray as $key => $value) {
                $errorData['time'] = date("Y-m-d H:i:s",time());
                $errorData['ResultCode'] = $value['ResultCode'];
                $errorData['ResultMessageCode'] = $value['ResultMessageCode'];
                $errorData['ResultDescription'] = $value['ResultDescription'];
                $errorData['TransactionID'] = $TransactionID;
                if(isset($value['AdditionalInfo'])){
                    $errorData['SKU'] = $value['AdditionalInfo']['SKU'];
                }
                $this->db2->table('feed_errors')->insert($errorData);
            }
        }

        $this->db2->table('add_record')->where($filedName,$TransactionID)->update($updateData);
    }
    //上传列表
    public function getFeedSubmissionList($data){
        $config = array (
            'ServiceURL' => $data['serviceUrl'],
            'ProxyHost' => null,
            'ProxyPort' => -1,
            'MaxErrorRetry' => 3,
        );
        $awsAccessKeyId['eu'] = "AKIAJZHK4YO7XDLGI2OA";
        $awsAccessKeyId['na'] = "AKIAIZY6DECYVIDLD3WQ";
        $awsAccessKeyId['jp'] = "AKIAISBICS6HTSKCMC5Q";
        $awsSecretAccessKey['eu']= "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";
        $awsSecretAccessKey['na']= "/LaN5wRa+clZDsXqXFw2GUk6/ZEcrlkV8JxZE2OH";
        $awsSecretAccessKey['jp']= "52GgrWL+/z6f4VGXDg3gaI4cstBcNFzn+gEw6v2F";
        $applicationName['eu'] = "LIUJIELD";
        $applicationName['na'] = "LDKJMY";
        $applicationName['jp'] = "LIUJIELD";
        $service = new \MarketplaceWebService_Client(
            $awsAccessKeyId[$data['area']],
            $awsSecretAccessKey[$data['area']],
            $config,
            $applicationName[$data['area']],
            '2009-01-01');
        $request = new \MarketplaceWebService_Model_GetFeedSubmissionListRequest();
        $request->setMerchant($data['Merchant']);
        $request->setMWSAuthToken($data['MWSAuthToken']);
        $statusList = new \MarketplaceWebService_Model_StatusList();
        $request->setFeedProcessingStatusList($statusList->withStatus('_SUBMITTED_'));
        $request->FeedSubmissionIdList = new \MarketplaceWebService_Model_IdList();
        $request->FeedSubmissionIdList->Id  = $data['FeedSubmissionId'];
        $res = $service->getFeedSubmissionList($request);
        $dom = new \DOMDocument();
        $dom->loadXML($res);
        $zarr=$this->getArray($dom->documentElement);
        $result = $zarr['GetFeedSubmissionListResult'][0]['FeedSubmissionInfo'][0]['FeedProcessingStatus'][0]['#text'];
        return $result;
    }
    public function addProduct($data){
        $config = array (
            'ServiceURL' => $data['serviceUrl'],
            'ProxyHost' => null,
            'ProxyPort' => -1,
            'MaxErrorRetry' => 3,
        );
        $awsAccessKeyId['eu'] = "AKIAJZHK4YO7XDLGI2OA";
        $awsAccessKeyId['na'] = "AKIAIZY6DECYVIDLD3WQ";
        $awsAccessKeyId['jp'] = "AKIAISBICS6HTSKCMC5Q";
        $awsSecretAccessKey['eu']= "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";
        $awsSecretAccessKey['na']= "/LaN5wRa+clZDsXqXFw2GUk6/ZEcrlkV8JxZE2OH";
        $awsSecretAccessKey['jp']= "52GgrWL+/z6f4VGXDg3gaI4cstBcNFzn+gEw6v2F";
        $applicationName['eu'] = "LIUJIELD";
        $applicationName['na'] = "LDKJMY";
        $applicationName['jp'] = "LIUJIELD";
        $service = new \MarketplaceWebService_Client(
            $awsAccessKeyId[$data['area']],
            $awsSecretAccessKey[$data['area']],
            $config,
            $applicationName[$data['area']],
            '2009-01-01');
        $feedHandle = $data['feedHandle'];
        $request = new \MarketplaceWebService_Model_SubmitFeedRequest();
        $request->setMarketplaceIdList($data['marketplaceIdArray']);
        $request->setFeedType($data['FeedType']);
        $request->setContentMd5(base64_encode(md5(stream_get_contents($feedHandle), true)));
        $request->setPurgeAndReplace(false);
        $request->setFeedContent($feedHandle);
        $request->setMerchant($data['Merchant']);
        $request->setMWSAuthToken($data['MWSAuthToken']);
        $response = $service->submitFeed($request);
        return $response->SubmitFeedResult->FeedSubmissionInfo;
    }
}