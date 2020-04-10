<?php

namespace app\admin\controller;

use app\admin\model\AuthRule;
use app\admin\controller\Database;
use app\admin\model\Options;
use app\admin\model\Xml as XmlModel;
use app\admin\model\Submit as SubmitModel;
use think\Db;
use think\Cache;
use think\cache\driver\Redis;

class Batchdeletion extends Base
{

    /*
     * 批量删除产品
     * @author liujie
     */
    public function deletion_list()
    {

        //当前登陆账号id
        $uid = session('admin_auth.aid');
        $aa = new Database();
        $cjlb = $aa->db2->table('add_url')->where('is_shop = 1  and  uid ='.$uid)->order('id desc')->paginate(20);
        $page = $cjlb->render();

        $this->assign('cjlb',$cjlb);
        $this->assign('page',$page);
        return $this->fetch();
    }
    
      /*

    * 产品采集
    * @author liujie
    */
    public function product_caiji() {

       if (!request()->isAjax()){

            $this->error('提交方式不正确',url('admin/Batchdeletion/deletion_list'));

        }

        //当前登陆账号id
        $uid = session('admin_auth.aid');
        $e_page = input('e_page');
        $s_page = input('s_page');

        if(empty($e_page)){$e_page = 1;}
        if(empty($s_page)){$s_page = 1;}

        if(!empty($uid)){
           
            $sl_data1=array(
                'url'=>input('url'),
                's_page'=>$s_page,
                'e_page'=>$e_page,
                'uid'=>$uid,
                'is_shop'=>1,
                'country'=>input('country'),
                'time'=>time(),

            );
             $aa = new Database();
            $result=$aa->db2->table('add_url')->insert($sl_data1);

               $config = [
                   'host' => '49.232.164.248',
                   'port' => 6379,
                   'password' => '510efb9e78b483b5',
                   'select' => 0,
                   'timeout' => 0,
                   'expire' => 0,
                   'persistent' => false,
                   'prefix' => '',
               ];
               $url = input('url');
               if($result!==''){
                  $Redis=new Redis($config);
                  $Redis->lPush('AmazonShop', $url);

                   $this->success('店铺数据采集中，稍后刷新页面查看');
               }else{
                   $this->error('店铺数据采集失败');

               }

           
        }

    }

    /*采集店铺产品*/
    public function deletion_lists()
    {
        //当前登陆账号id
        $ID = input('Id');
        $map['ADD_ID'] = $ID;
        if(input('STATUS')){
            $map['STATUS'] = input('STATUS');
        }
        if(input('RANK')){
            $map['RANK'] = input('RANK');
        }
        $aa = new Database();
        $goods = $aa->db2->table('amaz_shop')->where($map)->order('id desc')->paginate(20);
        $page = $goods->render();
        $this->assign('addid',$ID);
        $this->assign('goods',$goods);
        $this->assign('page',$page);
        if(request()->isAjax()){
            return $this->fetch('ajax_deletion_list');
        }else{
            return $this->fetch();
        }

    }
    public function sys(){
        return $this->fetch();
    }

    public function insert_data()
    {
        ini_set("memory_limit", "1024M");
        set_time_limit(0);
        $addId = input('add_id');
        $aa = new Database();
        if (! empty ( $_FILES ['file_stu'] ['name'] )){
            $tmp_file = $_FILES ['file_stu'] ['tmp_name'];
            $file_types = explode ( ".", $_FILES ['file_stu'] ['name'] );
            $file_type = $file_types [count ( $file_types ) - 1];
            /*判别是不是.xls文件，判别是不是excel文件*/
            if (strtolower ( $file_type ) != "xls"){
                $this->error ( '不是Excel文件，重新上传',url('admin/Sys/excel_import'));
            }
            /*设置上传路径*/
            $savePath =ROOT_PATH. 'public/excel/';
            /*以时间来命名上传的文件*/
            $str = time ();
            $file_name = $str . "." . $file_type;
            if (! copy ( $tmp_file, $savePath . $file_name )){
                $this->error ('上传失败',url('admin/Sys/excel_import'));
            }
//            dump($file_name);die;
            $res = read ( $savePath . $file_name );
//            dump($res);die;
            if (!$res){
                $this->error ('数据处理失败',url('admin/Batchdeletion/excel_import'));
            }
            foreach($res as $k=>$v){
                if ($k != 1){
                    $asinData['sku'] = $v[0];
                    $asinData['asin'] = $v[1];
                    $asinData['add_id'] = $addId;
                    $aa->db2->table('shop_data')->insert($asinData);
                }else{
                    continue;
                }
            }
        }else{
            echo 33;die;
        }
    }
    public function lotsDelte(){
        $aa = new Database();
        $ids = input('ids');
//        $ids = "243,244,";
        $ids = rtrim($ids,',');
        $idArray = explode(',',$ids);
        $data = [];
        $country = $aa->db2->table('amaz_shop')->where('id',$idArray[0])->field('COUNTRY')->find();
//        dump($country);die;
        foreach ($idArray as $k=>$v){
            $res = $aa->db2->table('amaz_shop')
                ->alias('a')
                ->join('shop_data b','a.ASIN=b.asin and a.ADD_ID=b.add_id')
                ->where('a.id',$v)
                ->field('a.id,b.sku')
                ->find();
            if($res){
                $data[$k]['SKU'] = $res['sku'];
                $data[$k]['id'] = $res['id'];
            }else{
                continue;
            }
        }
//        dump($data);die;
        $res = $this->delete_product($data,$country['COUNTRY']);
        if($res==1){
            $return =['status'=>'success','msg'=>"下架成功"];
        }else{
            $return =['status'=>'error','msg'=>"下架失败"];
        }
        return json($return);

    }
    //下架产品
    public function delete_product($data,$store_id){
        $aa = new Database();
        $MerchantIdentifier = Db::name('plug_sug')->where('plug_uid',session('admin_auth.aid'))->field('plug_merchant_id')->find();
        $userInfo['uid'] =  session('admin_auth.aid');
        $userInfo['identifier'] =  $MerchantIdentifier['plug_merchant_id'];
        $model = new XmlModel();
        $res =  $model->deleteXml($data,$userInfo);
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
        if($store_id==4 || $store_id==5 || $store_id==6 || $store_id==7 || $store_id==8){
            $country = 1;
            //欧洲开发者
            $request['area'] = "eu";
        }elseif($store_id==9 || $store_id==10 || $store_id==11){
            $country = 0;
            //美洲开发者
            $request['area'] = "na";
        }elseif($store_id==2){
            $country = $store_id;
            $request['area'] = "jp";
        }
        $account = Db::name('plug_sug')->where('plug_uid',session('admin_auth.aid'))->where('plug_khqy',$country)->find();
        if(!$account){
            $return = ['status'=>'error','msg'=>'没有查询到用户信息'];
            return json($return);
        }
        $request['MWSAuthToken'] = $account['plug_lingpai'];
        $request['Merchant'] = $account['plug_merchant_id'];
        $request['serviceUrl'] = $url[$turnCountry[$store_id]];
        $request['marketplaceIdArray'] = array(
            'Id'=>$marketplaceIdArray[$turnCountry[$store_id]],
        );
        $request['feedHandle'] = @fopen($res,'rw+');
        $request['FeedType'] = '_POST_PRODUCT_DATA_';
//        dump($request);die;
        $model = new SubmitModel();
        $res = $model->addProduct($request);
//        dump($res);
        if($res->FeedSubmissionId){
            $request['FeedSubmissionId'] = $res->FeedSubmissionId;
            $request['type'] = "_POST_PRODUCT_DATA_";
            $res =$model->getFeedSubmissionList($request);
            if($res == "_DONE_" || $res == "_SUBMITTED_" || $res == "_IN_PROGRESS_"){
                //修改记录为下架
                foreach ($data as $k=>$v){
                     $aa->db2->table('amaz_shop')->where('id',$v['id'])->update(['STATUS'=>1]);
                }

            }
            return 1;
        }else{
            return  0;
        }
    }
}