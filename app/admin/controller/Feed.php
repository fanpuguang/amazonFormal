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

use app\admin\model\News as NewsModel;

use app\admin\model\Xml as XmlModel;

use app\admin\model\Submit as SubmitModel;

use think\Db;

use think\Cache;

vendor("MarketplaceWebService.Client");

vendor("MarketplaceWebService.Model.StatusList");

vendor("MarketplaceWebService.Model.IdList");

vendor("MarketplaceWebService.Model.GetFeedSubmissionResultRequest");

vendor("MarketplaceWebService.Model.GetFeedSubmissionListRequest");

vendor("MarketplaceWebService.Model.SubmitFeedRequest");



class Feed extends Base

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

    public function test(){

       $res =  $this->db2->table('chuangxin')->group('countryCode')->select();

       dump($res);

    }

    /**

     *添加上传

     *

     */

    public function addSubmit(){

        $template = $_POST['templateType'];

        $startId = $_POST['startId'];

        $endId = $_POST['endId'];

        $nodeId = $_POST['nodeId'];

       // dump($_POST);die;

        $chuangxin = $this->db2->table('chuangxin')->where('cid',$nodeId)->find();

        $ItemType = $chuangxin['categoryName'];

        $countryArray = [2=>'japan',4=>'germany',5=>'britain',6=>'italy',7=>'france',8=>'spain',9=>'usa',10=>'mexico',11=>'canada'];

        $country = $countryArray[$_POST['goodsCate']];

        $countrylanguageArray = ['britain'=>1,'usa'=>1,'canada'=>1,'japan'=>6,'germany'=>3,'italy'=>5,'france'=>2,'spain'=>4,'mexico'=>4];

//        $countrylanguageArray = ['britain'=>1,'japan'=>6,'australia'=>1,'germany'=>3,'britain'=>1,'italy'=>5,'france'=>2,'spain'=>4];

        $countryPriceArray = ['britain'=>1,'germany'=>2,'italy'=>2,'france'=>2,'spain'=>2,'usa'=>4,'australia'=>7,'japan'=>3,'mexico'=>8,'canada'=>5];

         $parentData = $this->db2->table('amazon_commodity')

                ->alias("a")

                ->join('amazon_keywords b', 'a.ADD_ID = b.add_id')

                ->join('amazon_commodity_country c', 'a.FSKU=c.FSKU')

                ->join('amazon_commodity_price d', 'a.id=d.commodity_id')

                ->where('b.language',$countrylanguageArray[$country])

                ->where('c.language',$countrylanguageArray[$country])

                ->where('d.country',$countryPriceArray[$country])

                ->where('a.id','>=',$startId)

                ->where('a.id','<=',$endId)

                ->where('a.UID',session('admin_auth.aid'))

                ->group('a.FSKU')

                ->order('a.id')

                ->select();



        if(count($parentData)<1){

            $return = ['status'=>'error','msg'=>'没有可添加的产品'];

            return json($return);

        }

        // 添加记录

        $data['UID'] = session('admin_auth.aid');

        $data['store_id'] = $_POST['goodsCate'];

        $data['node_id'] = $_POST['nodeId'];

        $data['category'] = $_POST['category'];

        $data['template'] = $_POST['templateType'];

        $data['add_time'] = date("Y-m-d H:i:s",time());

        $data['commodity_id'] = $_POST['startId']."-".$_POST['endId'];

        $data['category_name'] = $_POST['categoryName'];

        $data['category_detail'] = $_POST['categoryDetail'];

        $productId = $_POST['startId']."-".$_POST['endId'];

        $record = $this->db2->table('add_record')->insertGetId($data);

        if($record){

             $return = ['status'=>'success','msg'=>'添加成功'];

            return json($return);

        }

    }

    public function createXml(){



       

        $model = new XmlModel();

        ini_set ('memory_limit', '128M');

        //记录id

        $recordId = $_POST['recordId'];

        $record = $this->db2->table('add_record')->where('id',$recordId)->find();

        $addId = explode("-",$record['commodity_id']);

        $startId = $addId[0];

        $endId = $addId[1];

        $template = explode('/',$record['template']);

//        $chuangxin = $this->db2->table('chuangxin')->where('cid',$record['node_id'])->find();

//        $ItemType = $chuangxin['categoryName'];

        $countryArray = [2=>'japan',4=>'germany',5=>'britain',6=>'italy',7=>'france',8=>'spain',9=>'usa',10=>'mexico',11=>'canada'];

        $country = $countryArray[$record['store_id']];

        $countrylanguageArray = ['britain'=>1,'japan'=>6,'australia'=>1,'germany'=>3,'britain'=>1,'italy'=>5,'france'=>2,'spain'=>4,'usa'=>1,'mexico'=>4,'canada'=>1];

        // $countryPriceArray = ['britain'=>1,'germany'=>2,'italy'=>3,'france'=>4,'spain'=>5,'usa'=>6,'australia'=>7];

        $countryPriceArray = ['britain'=>1,'germany'=>2,'italy'=>2,'france'=>2,'spain'=>2,'usa'=>4,'australia'=>7,'japan'=>3,'mexico'=>8,'canada'=>5];

        //父类

         $parentData = $this->db2->table('amazon_commodity')

                ->alias("a")

                ->join('amazon_keywords b', 'a.ADD_ID = b.add_id')

                ->join('amazon_commodity_country c', 'a.FSKU=c.FSKU')

                ->join('amazon_commodity_price d', 'a.id=d.commodity_id')

                ->where('b.language',$countrylanguageArray[$country])

                ->where('c.language',$countrylanguageArray[$country])

                ->where('d.country',$countryPriceArray[$country])

                ->where('a.id','>=',$startId)

                ->where('a.id','<=',$endId)

                ->where('a.UID',session('admin_auth.aid'))

                ->group('a.FSKU')

                ->order('a.id')

                ->select();

        if(count($parentData)<1){

            $return = ['status'=>'error','msg'=>'没有可添加的产品'];

            return json($return);

        }

         $fsku = '';

         foreach($parentData as $k=>$v){

            $countFsku = $this->db2->table('amazon_commodity')

                            ->alias("a")

                            ->join('amazon_keywords b', 'a.ADD_ID = b.add_id')

                            ->join('amazon_commodity_country c', 'a.FSKU=c.FSKU')

                            ->join('amazon_commodity_price d', 'a.id=d.commodity_id')

                            ->where('b.language',$countrylanguageArray[$country])

                            ->where('c.language',$countrylanguageArray[$country])

                            ->where('d.country',$countryPriceArray[$country])

                            ->where('a.FSKU',$v['FSKU'])

                            ->where('a.UID',session('admin_auth.aid'))

                            ->select();

             $count = count($countFsku);

             $parentData[$k]['count'] = $count;

             if($count<2){

                 continue;

             }else{

                 $fsku.=$v['FSKU'].",";

             }

         }

         //子类

         $childData = $this->db2->table('amazon_commodity')

                ->alias("a")

                ->join('amazon_keywords b', 'a.ADD_ID = b.add_id')

                ->join('amazon_commodity_country c','a.FSKU=c.FSKU')

                ->join('amazon_commodity_price d','a.id=d.commodity_id')

                ->where('b.language',$countrylanguageArray[$country])

                ->where('c.language',$countrylanguageArray[$country])

                ->where('d.country',$countryPriceArray[$country])

                ->where('a.FSKU','IN',$fsku)

                ->where('a.UID',session('admin_auth.aid'))

                ->order('a.id')

                ->select();

        $count = count($parentData)+count($childData);

        //brand

        $brand =Db::name('admin')->where('admin_id='.session('admin_auth.aid'))->find();

        if($record['store_id']==4 || $record['store_id']==5 || $record['store_id']==6 || $record['store_id']==7 || $record['store_id']==8){

            $khqy = 1;

        }elseif($record['store_id']==9 || $record['store_id']==10 || $record['store_id']==11 ){

            $khqy = 0;

        }elseif($record['store_id']==2 ){

            $khqy = 2;

        }

        $plug_sug = Db::name('plug_sug')->where('plug_uid',session('admin_auth.aid'))->where('plug_khqy',$khqy)->find();

        $inventoryArray = [];

        // $ean_k = 0;

        foreach ($parentData as $k=>$v){

            // $parentData[$k]['EAN'] = $ean[$ean_k]['bianma'];

            // $ean_k++;



            $SIZE = 0;

            $COLOR = 0;

            if($v['count']>1){

                $parentData[$k]['Parentage'] = "parent";

                $childSku = [];

                foreach ($childData as $key=>$value){

                    if($value['FSKU'] == $v['FSKU']){

                        $childSku[$key] = $value['CSKU'];

                    }else{

                        continue;

                    }

                    if($value['SIZE']!==""){

                        $SIZE = 1;

                    }

                    if($value['COLOR']!==""){

                        $COLOR = 1;

                    }

                }

                if($SIZE == 1 & $COLOR == 0){

                    $parentData[$k]['VariationTheme'] = "Size";

                }

                if($SIZE == 0 & $COLOR== 1){

                    $parentData[$k]['VariationTheme'] = "Color";

                }

                if($SIZE == 1 & $COLOR == 1 ){

                    $parentData[$k]['VariationTheme'] = "Size-Color";

                }

                $parentData[$k]['childSku'] = $childSku;

            }



        }

        foreach ($childData as $k=>$v){

            $childData[$k]['Parentage'] = "child";

            // $childData[$k]['EAN'] = $ean[$ean_k]['bianma'];

            // $ean_k++;

        }

        $userData = [];

        $userData['Manufacturer'] = $brand['en_name'];

        $userData['BRAND'] = $brand['en_brand'];

        $userData['ItemType'] = $record['category_name'];

        $userData['RecommendedBrowseNode'] = $record['node_id'];

        $userData['MerchantIdentifier'] = $plug_sug['plug_merchant_id'];

        $data = array_merge($childData,$parentData);

        $res = [];  

        if($_POST['type'] =='product'){

            if($template[0] == 'Home'){

                $res['product'] = $model->homeXml($data,$template,$userData);

            }elseif($template[0] == 'Health'){

                $res['product'] = $model->type1Xml($data,$template,$userData);

            }

        }

        if($_POST['type'] =='img'){

            $res['img'] = $model->imgXml($data,$userData);

        }

        if($_POST['type'] =='price'){

            $res['price'] = $model->priceXml($data,$country,$userData);

        }

        if($_POST['type'] =='inventory'){

            $res['inventory'] = $model->inventoryXml($data,$userData);

        }

        if($_POST['type'] =='relationships'){

            $res['relationships'] = $model->RelationshipsXml($parentData,$userData);

        }



        // if($_POST['type'] =='all'){

        //     $res['product'] = $model->homeXml($data,$template);

        //     $res['img'] = $model->imgXml($childData);

        //     $res['price'] = $model->priceXml($childData,$country);

        //     $res['inventory'] = $model->inventoryXml($childData);

        //     $res['relationships'] = $model->RelationshipsXml($parentData);

        // }

        // dump($res);die;

      $res = $this->feed($res,$record);

      return $res;

    }

    /**

     *添加产品

     *

     */

    public function feed($data,$record){

        $feedHandle = [];

        foreach ($data as $key => $value) {

            $feedHandle[$key] = @fopen($value,'rw+');

        }

        $FeedType['product'] = "_POST_PRODUCT_DATA_";

        $FeedType['img'] = "_POST_PRODUCT_IMAGE_DATA_";

        $FeedType['price'] = "_POST_PRODUCT_PRICING_DATA_";

        $FeedType['inventory'] = "_POST_INVENTORY_AVAILABILITY_DATA_";

        $FeedType['relationships'] = "_POST_PRODUCT_RELATIONSHIP_DATA_";

        $turnCountry = ['4'=>'de','5'=>'uk','6'=>'it','7'=>'fr','8'=>'es',9=>'usa',10=>'mexico',11=>'canada',2=>'jp'];

        $marketplaceIdArray['fr'] = "A13V1IB3VIYZZH";

        $marketplaceIdArray['uk'] = "A1F83G8C2ARO7P";

        $marketplaceIdArray['de'] = "A1PA6795UKMFR9";

        $marketplaceIdArray['es'] = "A1RKKUPIHCS9HS";

        $marketplaceIdArray['it'] = "APJ6JRA9NG5V4";

        $marketplaceIdArray['usa'] = "ATVPDKIKX0DER";

        $marketplaceIdArray['mexico'] = "A1AM78C64UM0Y8";

        $marketplaceIdArray['canada'] = "A2EUQ1WTGCTBG2";

        $marketplaceIdArray['jp'] = "A1VC38T7YXB528";

        $url['usa'] = "https://mws.amazonservices.com";

        $url['mexico'] = "https://mws.amazonservices.com.mx";

        $url['canada'] = "https://mws.amazonservices.ca";

        $url['jp'] = "https://mws.amazonservices.jp";

        $url['fr'] = "https://mws.amazonservices.fr";

        $url['uk'] = "https://mws.amazonservices.co.uk";

        $url['de'] = "https://mws.amazonservices.de";

        $url['es'] = "https://mws.amazonservices.es";

        $url['it'] = "https://mws.amazonservices.it";

        if($record['store_id']==4 || $record['store_id']==5 || $record['store_id']==6 || $record['store_id']==7 || $record['store_id']==8){

            $country = 1;

            //欧洲开发者

            $request['area'] = "eu";

        }elseif($record['store_id']==9 || $record['store_id']==10 || $record['store_id']==11){

            $country = 0;

            //美洲开发者

            $request['area'] = "na";

        }elseif($record['store_id']==2){

            $country = $record['store_id'];

            $request['area'] = "jp";

        }

        $account = Db::name('plug_sug')->where('plug_uid',session('admin_auth.aid'))->where('plug_khqy',$country)->find();

        if(!$account){

            $return = ['status'=>'error','msg'=>'没有查询到用户信息'];

            return json($return);

        }

        $request['MWSAuthToken'] = $account['plug_lingpai'];

        $request['Merchant'] = $account['plug_merchant_id'];

        $request['serviceUrl'] = $url[$turnCountry[$record['store_id']]];

        $request['marketplaceIdArray'] = array(

            'Id'=>$marketplaceIdArray[$turnCountry[$record['store_id']]],

        );

        foreach ($feedHandle as $key => $value) {

            $request['feedHandle'] = $value;

            $request['FeedType'] = $FeedType[$key];

            $model = new SubmitModel();

            $res = $model->addProduct($request);

            if($res->FeedSubmissionId){

                $filed = $key."_submission";

                $recordData[$filed] = $res->FeedSubmissionId;

                $filed = $key."_status";

                $recordData[$filed] = 1;

                $recordData['time'] = date("Y-m-d H:i:s",time());

                $this->db2->table('add_record')->where('id',$record['id'])->update($recordData);

            }else{

                $filed = $key."_status";

                $recordData[$filed] = 4;

                $recordData['time'] = date("Y-m-d H:i:s",time());

                $this->db2->table('add_record')->where('id',$record['id'])->update($recordData);

                $return = ['status'=>'error','msg'=>'出错了,请重新添加'];

                return json($return);

            }

        }

        $return = ['status'=>'success','msg'=>'已上传,请稍后刷新查询状态'];

        return json($return);

    }



    public function getFeedSubmissionList($recordId,$type){

        $record = $this->db2->table('add_record')->where('id',$recordId)->find();

        $FeedType['product'] = "_POST_PRODUCT_DATA_";

        $FeedType['img'] = "_POST_PRODUCT_IMAGE_DATA_";

        $FeedType['price'] = "_POST_PRODUCT_PRICING_DATA_";

        $FeedType['inventory'] = "_POST_INVENTORY_AVAILABILITY_DATA_";

        $FeedType['relationships'] = "_POST_PRODUCT_RELATIONSHIP_DATA_";

        $turnCountry = ['4'=>'de','5'=>'uk','6'=>'it','7'=>'fr','8'=>'es',9=>'usa',10=>'mexico',11=>'canada',2=>'jp'];

        $marketplaceIdArray['fr'] = "A13V1IB3VIYZZH";

        $marketplaceIdArray['uk'] = "A1F83G8C2ARO7P";

        $marketplaceIdArray['de'] = "A1PA6795UKMFR9";

        $marketplaceIdArray['es'] = "A1RKKUPIHCS9HS";

        $marketplaceIdArray['it'] = "APJ6JRA9NG5V4";

        $marketplaceIdArray['usa'] = "ATVPDKIKX0DER";

        $marketplaceIdArray['mexico'] = "A1AM78C64UM0Y8";

        $marketplaceIdArray['canada'] = "A2EUQ1WTGCTBG2";

        $marketplaceIdArray['jp'] = "A1VC38T7YXB528";

        $url['usa'] = "https://mws.amazonservices.com";

        $url['mexico'] = "https://mws.amazonservices.com.mx";

        $url['canada'] = "https://mws.amazonservices.ca";

        $url['jp'] = "https://mws.amazonservices.jp";

        $url['fr'] = "https://mws.amazonservices.fr";

        $url['uk'] = "https://mws.amazonservices.co.uk";

        $url['de'] = "https://mws.amazonservices.de";

        $url['es'] = "https://mws.amazonservices.es";

        $url['it'] = "https://mws.amazonservices.it";

        if($record['store_id']==4 || $record['store_id']==5 || $record['store_id']==6 || $record['store_id']==7 || $record['store_id']==8){

            $country = 1;

            //欧洲开发者

            $request['area'] = "eu";

        }elseif($record['store_id']==9 || $record['store_id']==10 || $record['store_id']==11){

            $country = 0;

            //美洲开发者

            $request['area'] = "na";

        }elseif($record['store_id']==2){

            $country = $record['store_id'];

            $request['area'] = "jp";

        }

        $account = Db::name('plug_sug')->where('plug_uid',session('admin_auth.aid'))->where('plug_khqy',$country)->find();

        if(!$account){

            $return = ['status'=>'error','msg'=>'没有查询到用户信息'];

            return json($return);

        }

        $request['MWSAuthToken'] = $account['plug_lingpai'];

        $request['Merchant'] = $account['plug_merchant_id'];

        $request['serviceUrl'] = $url[$turnCountry[$record['store_id']]];

        $request['marketplaceIdArray'] = array(

            'Id'=>$marketplaceIdArray[$turnCountry[$record['store_id']]],

        );

        $data = [];

        if($type!=='all'){

            $field = $type."_submission";

            $data[$type] = $record[$field];

        }else{

            $data['product'] = $record['product_submission'];

            $data['price'] = $record['price_submission'];

            $data['inventory'] = $record['inventory_submission'];

            $data['img'] = $record['img_submission'];

            $data['relationships'] = $record['relationships_submission'];

        }

        $model = new SubmitModel();

//        ---------------------------------------------------------------------

//        $left = [];

//        foreach ($data as $key => $value) {

//            $request['FeedSubmissionId'] = $value;

//            $res = $model->getFeedSubmissionList($request);

//            if($res == "_DONE_"){

//                $filed = $key."_status";

//                $recordData[$filed] = 2;

//                $recordData['time'] = date("Y-m-d H:i:s",time());

//            }elseif($res == "_IN_PROGRESS_" || $res == "_SUBMITTED_"){

//                $left[$key] = $value;

//                continue;

//            }else{

//                $filed = $key."_status";

//                $recordData[$filed] = 4;

//                $recordData['time'] = date("Y-m-d H:i:s",time());

//            }

//            $this->db2->table('add_record')->where('id',$record['id'])->update($recordData);

//            if($recordData[$filed] == 4){

//                return 1;

//            }

//        }

//        if(count($left)>0){

//            $request['FeedSubmissionId'] = $left;

//            // dump($request);die;

//            $count = 0;

//            $left = $this->getLeft($request,$count,$record);

//            if($left<1){

//                $return = ['status'=>'success','msg'=>'更新成功'];

//            }else{

//                $return = ['status'=>'error','msg'=>'更新失败,请稍后重新更新'];

//            }

//        }else{

//            $return = ['status'=>'success','msg'=>'更新成功'];

//        }

//        return json($return);

//        ---------------------------------------------------------------------

        foreach ($data as $key => $value) {

            $request['FeedSubmissionId'] = $value;

            $res = $model->getFeedSubmissionList($request);

            if($res == "_DONE_"){

                $filed = $key."_status";

                $recordData[$filed] = 2;

                $recordData['time'] = date("Y-m-d H:i:s",time());

                $return = ['status'=>'success','msg'=>'更新成功'];

//                Db::name('goods_record')->where('id',$record['id'])->update($recordData);

                $this->db2->table('add_record')->where('id',$record['id'])->update($recordData);

            }elseif($res == "_IN_PROGRESS_" || $res == "_SUBMITTED_"){

                $return = ['status'=>'success','msg'=>'上传中请稍后再次尝试'];

            }else{

                $filed = $key."_status";

                $recordData[$filed] = 4;

                $recordData['time'] = date("Y-m-d H:i:s",time());

                $return = ['status'=>'error','msg'=>'更新失败'];

                $this->db2->table('add_record')->where('id',$record['id'])->update($recordData);

            }

            return json($return);

        }

    }

    public function getLeft($request,$count,$record){

        $count++;

        if($count>5){

            return 1;

        }

        $model = new SubmitModel();

        $left = [];

        foreach($request['FeedSubmissionId'] as $k=>$v){

            $request['FeedSubmissionId'] = $v;

            $res = $model->getFeedSubmissionList($request);

            if($res == "_DONE_"){

                $filed = $k."_status";

                $recordData[$filed] = 2;

                $recordData['time'] = date("Y-m-d H:i:s",time());

            }elseif($res == "_IN_PROGRESS_" || $res == "_SUBMITTED_"){

                $left[$k] = $v;

                continue;

            }else{

                $filed = $k."_status";

                $recordData[$filed] = 4;

                $recordData['time'] = date("Y-m-d H:i:s",time());

            }

            $this->db2->table('add_record')->where('id',$record['id'])->update($recordData);

            if($recordData[$filed] == 4){

                return 1;

            }

        }

        if(count($left)>0){

            $request['FeedSubmissionId'] = $left;

            sleep(20);

            $this->getLeft($request,$count,$record);

        }else{

            return count($left);

        }

    }

    //

    public function GetFeedSubmissionResult($recordId,$type){

        $record = $this->db2->table('add_record')->where('id',$recordId)->find();

        $FeedType['product'] = "_POST_PRODUCT_DATA_";

        $FeedType['img'] = "_POST_PRODUCT_IMAGE_DATA_";

        $FeedType['price'] = "_POST_PRODUCT_PRICING_DATA_";

        $FeedType['inventory'] = "_POST_INVENTORY_AVAILABILITY_DATA_";

        $FeedType['relationships'] = "_POST_PRODUCT_RELATIONSHIP_DATA_";

        $turnCountry = ['4'=>'de','5'=>'uk','6'=>'it','7'=>'fr','8'=>'es',9=>'usa',10=>'mexico',11=>'canada',2=>'jp'];

        $marketplaceIdArray['fr'] = "A13V1IB3VIYZZH";

        $marketplaceIdArray['uk'] = "A1F83G8C2ARO7P";

        $marketplaceIdArray['de'] = "A1PA6795UKMFR9";

        $marketplaceIdArray['es'] = "A1RKKUPIHCS9HS";

        $marketplaceIdArray['it'] = "APJ6JRA9NG5V4";

        $marketplaceIdArray['usa'] = "ATVPDKIKX0DER";

        $marketplaceIdArray['mexico'] = "A1AM78C64UM0Y8";

        $marketplaceIdArray['canada'] = "A2EUQ1WTGCTBG2";

        $marketplaceIdArray['jp'] = "A1VC38T7YXB528";

        $url['usa'] = "https://mws.amazonservices.com";

        $url['mexico'] = "https://mws.amazonservices.com.mx";

        $url['canada'] = "https://mws.amazonservices.ca";

        $url['jp'] = "https://mws.amazonservices.jp";

        $url['fr'] = "https://mws.amazonservices.fr";

        $url['uk'] = "https://mws.amazonservices.co.uk";

        $url['de'] = "https://mws.amazonservices.de";

        $url['es'] = "https://mws.amazonservices.es";

        $url['it'] = "https://mws.amazonservices.it";

        if($record['store_id']==4 || $record['store_id']==5 || $record['store_id']==6 || $record['store_id']==7 || $record['store_id']==8){

            $country = 1;

            //欧洲开发者

            $request['area'] = "eu";

        }elseif($record['store_id']==9 || $record['store_id']==10 || $record['store_id']==11){

            $country = 0;

            //美洲开发者

            $request['area'] = "na";

        }elseif($record['store_id']==2){

            $country = $record['store_id'];

            $request['area'] = "jp";

        }

        $account = Db::name('plug_sug')->where('plug_uid',session('admin_auth.aid'))->where('plug_khqy',$country)->find();

        if(!$account){

            $return = ['status'=>'error','msg'=>'没有查询到用户信息'];

            return json($return);

        }

        $request['MWSAuthToken'] = $account['plug_lingpai'];

        $request['Merchant'] = $account['plug_merchant_id'];

        $request['serviceUrl'] = $url[$turnCountry[$record['store_id']]];

        $request['marketplaceIdArray'] = $marketplaceIdArray[$turnCountry[$record['store_id']]];

        $data = [];

        if($type!=='all'){

            $field = $type."_submission";

            $data[$type] = $record[$field];

        }else{

            $data['product'] = $record['product_submission'];

            $data['price'] = $record['price_submission'];

            $data['inventory'] = $record['inventory_submission'];

            $data['img'] = $record['img_submission'];

            $data['relationships'] = $record['relationships_submission'];

        }

        $model = new SubmitModel();

        $res= [];

        foreach ($data as $key => $value) {

           $request['FeedSubmissionId'] = $value;

           $request['type'] = $key;

           $model->GetFeedSubmissionResult($request);

        }

        return $res;

    }

    //查看错误

    public function GetError(){

        $TransactionID = $_POST['TransactionID'];

        $error = $this->db2->table('feed_errors')->where('TransactionID',$TransactionID)->select();

        if($error){

            $return = ['msg'=>'success','data'=>$error];

        }else{

            $return = ['msg'=>'error'];

        }

        return json($return);

    }

    //错误原因解决方案

    public function errorReason(){

        $errorId = $_POST['errorId'];

        $error = $this->db2->table('error_reason')->where('code',$errorId)->find();

         if($error){

            $return = ['msg'=>'success','data'=>$error];

        }else{

            $return = ['msg'=>'error'];

        }

        return json($return);

    }



    public function uploadCollect(){

        $storeList = Db::name('plug_sug')->where('plug_uid',session('admin_auth.aid'))->order('plug_sug_id asc')->select();

        $this->assign('admin_realname',session('admin_auth.admin_realname'));

        $this->assign('storeList',$storeList);

        return $this->fetch('upload_collect');

    }

    public function firstClass(){

        // $country = [0=>'GB',2=>'JP',3=>'AS',4=>'DE',5=>'IT',6=>'IT',7=>'FR',8=>'ES'];

//        $country = [2=>'JP',3=>'AS',4=>'de',5=>'uk',6=>'it',7=>'fr',8=>'es',9=>'us',11=>'ca'];

        $country = [2=>'jp',3=>'AS',4=>'de',5=>'uk',6=>'it',7=>'fr',8=>'es',9=>'us',10=>'mx',11=>'ca'];



        // $country = [0=>'GB',2=>'JP',3=>'AS',4=>'DE',5=>'GB',6=>'IT',7=>'FR',8=>'ES'];

        $key = $_POST['country'];

        $list = $this->db2->table('chuangxin')->where('countryCode',$country[$key])->where('parentId',0)->order('id')->select();

        if($list){

            $data = ['msg'=>'success','data'=>$list];

        }else{

            $data = ['msg'=>'error'];

        }

        $return = json($data);

        return $return;

    }

    public function childClass(){

        // $country = [0=>'GB',2=>'JP',3=>'AS',4=>'DE',5=>'IT',6=>'IT',7=>'FR',8=>'ES'];

        // $country = [0=>'GB',2=>'JP',3=>'AS',4=>'DE',5=>'GB',6=>'IT',7=>'FR',8=>'ES'];



        $country = [2=>'jp',3=>'AS',4=>'de',5=>'uk',6=>'it',7=>'fr',8=>'es',9=>'us',10=>'mx',11=>'ca'];

        $parentId = $_POST['parent'];

        $key = $_POST['country'];

        $list = $this->db2->table('chuangxin')->where('countryCode',$country[$key])->where('parentId',$parentId)->order('id')->select();

        if($list){

            $data = ['msg'=>'success','data'=>$list];

        }else{

            $data = ['msg'=>'error'];

        }

        return json($data);

    }

    public function product_upload(){

        $storeList = Db::name('plug_sug')->where('plug_uid',session('admin_auth.aid'))->order('plug_sug_id asc')->select();

        $this->assign('admin_realname',session('admin_auth.admin_realname'));

        $this->assign('storeList',$storeList);

        return $this->fetch('/product/product_upload');

    }

    //添加本地产品xml

    public function createLcoalXml(){

       

        $model = new XmlModel();

        ini_set ('memory_limit', '128M');

        //记录id

        // $recordId = $_POST['recordId'];

        $recordId =1;

        $record = Db::name('goods_record')->where('id',$recordId)->find();

        $addId = explode("-",$record['commodity_id']);

        $startId = $addId[0];

        $endId = $addId[1];

        $template = $record['template'];

        $countryArray = [0=>'GB',2=>'JP',3=>'AS',4=>'de',5=>'uk',6=>'it',7=>'fr',8=>'es'];

        $country = $countryArray[$record['store_id']];

        $countrylanguageArray = ['GB'=>1,'JP'=>6,'AS'=>1,'de'=>3,'uk'=>1,'it'=>5,'fr'=>2,'es'=>4];

        $language =$countrylanguageArray[$country];



        $parentData =  Db::view('goods')

            ->view('goods_language', '*','goods.goodsId=goods_language.goods_id')

            ->view('goods_variant', '*','goods.goodsId=goods_variant.goods_id')

            ->where('goods.goodsId','>=',$startId)

            ->where('goods.goodsId','<=',$endId)

            ->where('goods.UID',session('admin_auth.aid'))

            ->where('goods_language.language',$language)

            ->order('goods.goodsId')

            ->select();

        //dump($parentData);die;

        if(count($parentData)<1){

            $return = ['status'=>'error','msg'=>'没有可添加的产品'];

            return json($return);

        }

         $fsku = '';

         foreach($parentData as $k=>$v){

             $countFsku = $this->db2->table('amazon_commodity')->where('FSKU',$v['FSKU'])->select();

             $count = count($countFsku);

             $parentData[$k]['count'] = $count;

             $parentData[$k]['RecommendedBrowseNode'] = $record['node_id'];

             if($count<2){

                 continue;

             }else{

                 $fsku.=$v['FSKU'].",";

             }

         }

         //子类

         $childData = $this->db2->table('amazon_commodity')

                 ->alias("a")

                 ->join('amazon_keywords b', 'a.CATEGORY=b.classify')

                 ->where('a.FSKU','IN',$fsku)

                 ->select();

        $count = count($parentData)+count($childData);

        //brand

        $brand =Db::name('admin')->where('admin_id='.session('admin_auth.aid'))->find();

        //ean码

        $ean  = Db::name('ean')->order('id')->limit($count)->select();

        $eanCount = $count-1;

        $lastId = $ean[$eanCount]['id'];

        Db::name('ean')->where('id','<=',$lastId)->delete();

        $inventoryArray = [];

        $ean_k = 0;

        foreach ($parentData as $k=>$v){

            $parentData[$k]['EAN'] = $ean[$ean_k]['bianma'];

            $parentData[$k]['Manufacturer'] = $brand['en_name'];

            $parentData[$k]['Brand'] = $brand['en_brand'];

            $parentData[$k]['ItemType'] = $ItemType;

            $ean_k++;

            if($v['count']>1){

                $parentData[$k]['Parentage'] = "parent";

                $childSku = [];

                $SIZE = 0;

                $COLOR = 0;

                foreach ($childData as $key=>$value){

                    if($value['FSKU'] == $v['FSKU']){

                        $childSku[$key] = $value['CSKU'];

                    }

                    if($value['SIZE']){

                        $SIZE = 1;

                    }

                    if($value['COLOR']){

                        $COLOR = 1;

                    }

                }

                if($SIZE ==1 & $COLOR==0){

                    $parentData[$k]['VariationTheme'] = "Size";

                }

                if($SIZE ==0 & $COLOR==1){

                    $parentData[$k]['VariationTheme'] = "Color";

                }

                if($SIZE ==1 & $COLOR==1){

                    $parentData[$k]['VariationTheme'] = "Size-Color";

                }

                $parentData[$k]['childSku'] = $childSku;

            }



        }

        foreach ($childData as $k=>$v){

            $childData[$k]['Parentage'] = "child";

            $childData[$k]['EAN'] = $ean[$ean_k]['bianma'];

            $childData[$k]['Brand'] = $brand['en_brand'];

            $childData[$k]['Manufacturer'] = $brand['en_name'];

            $childData[$k]['ItemType'] = $ItemType;

            $childData[$k]['RecommendedBrowseNode'] = $record['node_id'];

            $ean_k++;

        }

        $data = array_merge($childData,$parentData);

        $res = [];

        if($_POST['type'] =='product'){

            $res['product'] = $model->homeXml($data,$template);

        }

        if($_POST['type'] =='img'){

            $res['img'] = $model->imgXml($childData);

        }

        if($_POST['type'] =='price'){

            $res['price'] = $model->priceXml($childData,$country);

        }

        if($_POST['type'] =='inventory'){

            $res['inventory'] = $model->inventoryXml($childData);

        }

        if($_POST['type'] =='relationships'){

            $res['relationships'] = $model->RelationshipsXml($parentData);

        }

        if($_POST['type'] =='all'){

            $res['product'] = $model->homeXml($data,$template);

            $res['img'] = $model->imgXml($childData);

            $res['price'] = $model->priceXml($childData,$country);

            $res['inventory'] = $model->inventoryXml($childData);

            $res['relationships'] = $model->RelationshipsXml($parentData);

        }

        

      $res = $this->feed($res,$record);

      return $res;

    }

}