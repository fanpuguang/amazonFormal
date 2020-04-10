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



use think\cache\driver\Redis;



vendor("MarketplaceWebService.Client");



vendor("MarketplaceWebService.Model.StatusList");



vendor("MarketplaceWebService.Model.IdList");



vendor("MarketplaceWebService.Model.GetFeedSubmissionResultRequest");



vendor("MarketplaceWebService.Model.GetFeedSubmissionListRequest");



vendor("MarketplaceWebService.Model.SubmitFeedRequest");



header("Content-type: text/html; charset=utf-8");



class Productupload extends Base



{











    /*



     * 产品上传列表



     * @author liujie



     */



    public function myupload()



    {



        $record=$this->db2->table('add_record')->order('id desc')->where('UID',session('admin_auth.aid'))->paginate(config('paginate.list_rows'));



        $plug_dpbm = Db::name('plug_sug')->where('plug_uid',session('admin_auth.aid'))->find();



        $name = $plug_dpbm['plug_dpbm'];



        // dump($order);die;



        $page = $record->render();



        $this->assign('record',$record);



        $this->assign('page',$page);



        $this->assign('name',$name);



        return $this->fetch();



    }











    /*



     * 所有上传



     * @author liujie



     */



    public function alluploads()



    {



        $order=Db::name('orderdetails')->order('orderId desc')->paginate(config('paginate.list_rows'));



        $page = $order->render();



        $this->assign('order',$order);



        $this->assign('page',$page);



        return $this->fetch();



    }







    /*



     * 添加上传



     * @author liujie



     */



    public function new_upload()



    {



        header("Content-Type:text/html;charset=utf-8");



        //dump($_SESSION);die;



        //授权店铺admin_realname



        $dianpu =Db::name('plug_sug')->where('plug_uid='.session('admin_auth.aid'))->order('plug_sug_id asc')->select();



        //分类模板



        $class_templet =Db::name('class_templet')->order('id asc')->select();



        //分类



        $class =Db::name('class')->where('parentId = 0')->order('id asc')->select();











        $this->assign('class',$class);



        $this->assign('class_templet',$class_templet);



        $this->assign('dianpu',$dianpu);



        $this->assign('admin_realname',session('admin_auth.admin_realname'));







       // dump($dianpu);die;



        return $this->fetch();



    }



    /*



     * 一级分类



     * @author liujie



     */



    public function class1()



    {



        header("Content-Type:text/html;charset=utf-8");



        $qy = $_POST['obj'];



        //dump($qy);die;



        //国家简称



        $gj = "IT";



        //顶级分类



        $class =Db::name('class')->where('parentId = 0 and countryCode ="IT"')->order('id asc')->select();







        echo  json_encode($class);



    }



    /*



     * 二级分类



     * @author liujie



     */



    public function class2()



    {



        header("Content-Type:text/html;charset=utf-8");



        $pid = $_POST['class2'];



        //二级分类



        $class2 =Db::name('class')->where('parentId = '.$pid)->order('id asc')->select();







        echo  json_encode($class2);



    }



    /*



    *三级分类



    * @author liujie



    */



    public function class3()



    {



        header("Content-Type:text/html;charset=utf-8");



        $pid = $_POST['class3'];



        //二级分类



        $class3 =Db::name('class')->where('parentId = '.$pid)->order('id asc')->select();







        echo  json_encode($class3);



    }







    /*



           * 采集列表



           * @author liujie



           */



    public function smartuploads()



    {



        $list_fenlei =$this->db2->table('ProductCategories')->order('px desc')->select();



        $list_fenlei = $this->tree($list_fenlei,0,"",0);



        $this->assign('list_fenlei',$list_fenlei);



        //当前登陆账号id



        $uid = session('admin_auth.aid');



        //dump($_SESSION);



        $cjlb = $this->db2->table('add_url')->where('is_delete = 0  and  uid ='.$uid)->order('id desc')->paginate(config('paginate.list_rows'));



        $page = $cjlb->render();







        $this->assign('adminname',session('admin_auth.admin_realname'));



        $this->assign('money',session('admin_auth.money'));



        $this->assign('cjlb',$cjlb);



        $this->assign('page',$page);



        



        return $this->fetch();







    }



    /*



          * 所有用户采集列表



          * @author liujie



          */



    public function uploadslist()



    {



        $list_fenlei =$this->db2->table('ProductCategories')->order('px desc')->select();



        $list_fenlei = $this->tree($list_fenlei,0,"",0);



        $this->assign('list_fenlei',$list_fenlei);



        //当前登陆账号id



        $uid = session('admin_auth.aid');



        //查询当前用户的下级



        $yonghulist =  Db::name('admin')->field('admin_id,admin_realname')->select();



        $xiaji_uid =  Db::name('admin')->where('fj_id = '.$uid)->field('admin_id,admin_realname')->select();



        foreach ($xiaji_uid as $val) {



            $val = join(",", $val);



            $temp_array[] = $val;



        }



        $xj_uid =  implode(',',$temp_array);



        $map['uid'] = array('in',$xj_uid);







        if($uid = 1){



            $cjlb = $this->db2->table('add_url')->order('id desc')->paginate(config('paginate.list_rows'));



        }else{



            $cjlb = $this->db2->table('add_url')->where($map)->order('id desc')->paginate(config('paginate.list_rows'));



        }



        //dump($cjlb);die;



        $page = $cjlb->render();







        $this->assign('adminname',session('admin_auth.admin_realname'));



        $this->assign('money',session('admin_auth.money'));



        $this->assign('cjlb',$cjlb);



        $this->assign('yonghulist',$yonghulist);



        $this->assign('page',$page);







        return $this->fetch();







    }
    /**
     * 批量修正ean
     */
    public function batch_edit_ean(){
        $ids = input('ids');
        $ids = rtrim($ids,",");
        $idsArray = explode(',',$ids);
        $res = $this->getid($idsArray);
        //取出新ean
        $ean = Db::name('ean')->limit($res['count'])->order('id')->select();
        //删除ean
        Db::name('ean')->where('id',"<",$ean[$res['count']-1]['id'])->delete();
        $number = 0;
        foreach ($res['data'] as $k=>$v) {
            foreach($v['variant'] as $key=>$value){
                //修改ean
                $this->db2->table('amazon_commodity')->where('id',$value['id'])->update(['UPC'=>$ean[$number]['bianma']]);
                $number++;
            }
        }
    }
    /**
     * 批量修正sku
     */
    public function batch_edit_sku(){
        //修正sku
        $correctSku = input('correctSku');
        //产品id
        $ids = input('ids');
        $ids = rtrim($ids,",");
        $idsArray = explode(',',$ids);
        //获取变体id
        $res=$this->getid($idsArray);
//        dump($res);die;
        foreach ($res['data'] as $k=>$v) {
            foreach($v['variant'] as $key=>$value){
                $FSKU = $value['FSKU']."-".$correctSku;
                $CSKU = $value['CSKU']."-".$correctSku;
                //修改FSKU CSKU
                $this->db2->table('amazon_commodity')->where('id',$value['id'])->update(['FSKU'=>$FSKU,'CSKU'=>$CSKU]);
            }
            foreach($v['country'] as $keys=>$values){
                $FSKU = $values['FSKU']."-".$correctSku;
                $this->db2->table('amazon_commodity_country')->where('id',$values['id'])->update(['FSKU'=>$FSKU]);
            }
        }

    }
    /**
     * 根据产品id获取变体id sku
     */
    public function getid($data){
        $uid = session('admin_auth.aid');
        $return = [];
        $count = 0;
//        dump($data);die;
        foreach ($data as $k=>$v){
//            $FSKU = $this->db2->table('amazon_commodity')->where('id',$v)->field('FSKU')->find();
            $FSKU = $this->db2->table('amazon_commodity')->where('id',$v)->where('UID',$uid)->field('FSKU')->find();
            if($FSKU){
                //变体
                $idArray = $this->db2->table('amazon_commodity')->where('FSKU',$FSKU['FSKU'])->field('id,FSKU,CSKU,UPC')->select();
                //翻译
                $country = $this->db2->table('amazon_commodity_country')->where('FSKU',$FSKU['FSKU'])->field('id,FSKU')->select();
                if($idArray){
                    $return[$k]['variant'] = $idArray;
                    $count += count($idArray);
                }
                $return[$k]['country'] = $country;
            }

        }
        $returnData['count'] = $count;
        $returnData['data'] = $return;
        return $returnData;
    }


    /*



        * 智能上传



        * @author liujie



        */



    public function smartupload()
    {
        //当前登陆账号id
        $ID = input('Id');
        $name = input('name');
        $uid = session('admin_auth.aid');
        if($uid == 1){

            $map['ADD_ID'] = $ID;

        }else{
           $map['UID'] = $uid;

           $map['ADD_ID'] = $ID;

        }
        $maps['DC_STATUS'] = 0;
        $xlsData = $this->db2->table('amazon_commodity')->where($map)->where($maps)->field('FSKU')->select();
        if(!empty($xlsData)){
            foreach ($xlsData as $val) {
                $val = join(",", $val);
                $temp_array[] = $val;
            }
            $sku =  implode(',',$temp_array);
            $aaaa = array_count_values($temp_array);
            $i = 0;
            foreach ($aaaa as $val) {
                if($val < 10){
                    $i++;
                }
                if($val > 10){
                    $aa = ceil($val/10);
                    $i= $i+$aa;
                }
            }
            //查询用户余额
            $admin1=Db::name('admin')->where("admin_id =".session('admin_auth.aid'))->field('money')->find();
            $xy_money= 0.5*$i;
            /*开启事务*/
            Db::startTrans();
            try{
                //执行总账号修改金额
                $sldata1=array(
                    'admin_id'=>session('admin_auth.aid'),
                    'money'=>($admin1['money']-$xy_money),
                );


                Db::name('admin')->update($sldata1);

                //添加采集消费记录表

                $data['add_time']=time();
                $data['cz_uid']=session('admin_auth.aid');
                $data['shuliang']=$i;
                $data['goods_sku']=$sku;
                $data['money']=$xy_money;
                Db::name('money_sjdcjl')->insert($data);
                //修改采集状态
                $tiaojian = array('DC_STATUS'=> 1);
                $this->db2->table('amazon_commodity')->where($map)->update($tiaojian);
                Db::commit();
            }catch (\Exception $e){
                Db::rollback();
            }
        }

        $goods = $this->db2->table('amazon_commodity')->where($map)->order('id desc')->group('FSKU')->paginate(config('paginate.list_rows'));
        $page = $goods->render();
        $this->assign('addid',$ID);
        $this->assign('goods',$goods);
        $this->assign('page',$page);

        $this->assign('name',$name);
        return $this->fetch();

    }



    //采集栏目删除



    public function smartupload_del()



    {



        $p=input('p');



        $id = input('Id');



        //查询该产品是否是该用户、



        $uid=$this->db2->table('add_url')->where(array('id'=>input('Id')))->field('uid')->find();



        if($uid['uid'] != session('admin_auth.aid')){



            $this->success('禁止非法操作!');



        }







        $rst=$this->db2->table('add_url')->where(array('id'=>input('Id')))->setField('is_delete',1);//转入回收站



        if($rst!==false){



            $this->success('已删除',url('admin/Productupload/smartuploads',array('p' => $p)));



        }else{



            $this -> error("删除失败！",url('admin/Productupload/smartuploads',array('p'=>$p)));



        }



    }



    /*



    * 产品采集



    * @author liujie



    */



    public function product_caiji()



    {



        // dump($_POST);die;



       if (!request()->isAjax()){



            $this->error('提交方式不正确',url('admin/Productupload/smartuploads'));



        }



        //当前登陆账号id



        $uid = session('admin_auth.aid');



        $money =  Db::name('admin')->where('admin_id='.$uid)->field('money')->find();







        if($money["money"] < 100){



            $this->error('您的账户余额不足一百，请充值后在采集!',url('admin/Productupload/smartupload'));die;



        }



        $class1 = input('class1');



        $class2 = input('class2');



        $class3 = input('class3');



        $pic_num = input('pic_num');



        $e_page = input('e_page');



        $s_page = input('s_page');



        if(empty($class1)){$class1 = 0;}



        if(empty($class2)){$class2 = 0;}



        if(empty($class3)){$class3 = 0;}



        if(empty($pic_num)){$pic_num = 1;}



        if(empty($e_page)){$e_page = 1;}



        if(empty($s_page)){$s_page = 1;}







        if(!empty($uid)){

            $k_url = input('k_url').'?k_url='.time();

            $sl_data1=array(



                'url'=>input('url'),



                'k_url'=>$k_url,



                'c_abbreviation'=>input('abbreviation'),



                'e_abbreviation'=>input('e_abbreviation'),



                'keyword'=>input('keyword'),



                'my_keyword'=>input('my_keyword'),



                'my_keyword2'=>input('my_keyword2'),



                's_page'=>$s_page,



                'e_page'=>$e_page,



                'classify'=>input('classify'),



                'pic_num'=> $pic_num,



                'class1'=>$class1,



                'class2'=>$class2,



                'class3'=>$class3,



                'is_system'=>input('is_system'),



                'uid'=>$uid,



                'country'=>input('country'),



                'price_parameter'=>input('price_parameter'),



                'price_multiple'=>input('price_multiple'),



                'time'=>time(),



            );



            $urls = input('url');



            $where=array(



                'url'=>$urls,



            );



            $url=$this->db2->table('add_url')->where($where)->select();



            $url1 = count($url);



           // dump($url1);die;







           if($url1 == 0){


               //提交采集列表



               $result=$this->db2->table('add_url')->insert($sl_data1);



               //添加7条关键词







               $where1=array(



                   'classify'=>input('e_abbreviation'),



               );



               $keywords =  $this->db2->table('amazon_keywords')->where($where1)->count();



               // dump($keywords);die;



               if($keywords == 0){



                   for ($x=1; $x<=7; $x++) {



                       //循环添加amazon_keywords7条空数据



                       $dat = array('language'=>$x,'classify'=>input('e_abbreviation'));



                       $result1=$this->db2->table('amazon_keywords')->insert($dat);



                   }



               }







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
               if($result!==''){
                  $Redis=new Redis($config);
                  $Redis->lPush('AmazonSpider', input('url'));
                  $Redis->lPush('K-AmazonSpider', $k_url);
                   $this->success('数据采集中，稍后刷新页面查看');
               }else{
                   $this->error('数据采集失败');



               }



                //echo 2222;die;



            }else{


               $this->error('该链接已经提交过了!请更换要采集的产品链接!');



              // echo 1111;die;



           }















        }











    }

    /*****
     *
     *
     * 付费
     */
    public function fufei(){

    }
    /**



     * 导出数据到表格



     */



    public function daochu()
    {
        $p = input('p');

        $addid =input('addid');

        if($addid ==''){
            $ids = input('n_id/a');

            //$ids = 19949;

            if(empty($ids)){

                $this -> error("请选择要导出的产品");

            }

            if(is_array($ids)){//判断获取产品ID的形式是否数组

                $where = 'id in('.implode(',',$ids).')';

            }else{

                $where = 'id='.$ids;
            }

        }else{

            if(session('admin_auth.aid') == 1){

                $where['ADD_ID'] = $addid;

            }else{

                $where['UID'] = session('admin_auth.aid');

                $where['ADD_ID'] = $addid;

            }

        }

        $xlsData = $this->db2->table('amazon_commodity')->where($where)->field('FSKU')->select();
        $goods_fl_count = $this->db2->table('amazon_commodity')->where($where)->where("DC_STATUS = 0")->count();

        foreach ($xlsData as $val) {

            $val = join(",", $val);

            $temp_array[] = $val;
        }

        $sku =  implode(',',$temp_array);
        $map['FSKU'] = array('in',$sku);

        $xlsData = $this->db2->table('amazon_commodity')
            ->alias("a")
            ->join('amazon_keywords b', 'a.CATEGORY=b.classify')
            ->where('b.language =1')
            ->where($map)
            ->select();

        //查询用户余额
        $admin1=Db::name('admin')->where("admin_id =".session('admin_auth.aid'))->field('money')->find();
        $xy_money= 0.5*$goods_fl_count;
        if((float)$admin1['money']< $xy_money){
            $this -> error("抱歉您的账户余额不足请先充值!");
        }else if($xy_money > 0){

            /*开启事务*/
            Db::startTrans();
                try{
                //执行总账号修改金额
                $sldata1=array(
                    'admin_id'=>session('admin_auth.aid'),
                    'money'=>($admin1['money']-$xy_money),
                );


                Db::name('admin')->update($sldata1);

                //添加采集消费记录表

                $data['add_time']=time();
                $data['cz_uid']=session('admin_auth.aid');
                $data['shuliang']=$goods_fl_count;
                $data['goods_sku']=$sku;
                $data['money']=$xy_money;
                Db::name('money_sjdcjl')->insert($data);
                //修改采集状态
                    $tiaojian = array('DC_STATUS'=> 1);
                     $this->db2->table('amazon_commodity')->where($map)->update($tiaojian);
                Db::commit();
            }catch (\Exception $e){
                Db::rollback();
            }
        }







        Vendor('PHPExcel.PHPExcel');//调用类库,路径是基于vendor文件夹的



        Vendor('PHPExcel.PHPExcel.Worksheet.Drawing');



        Vendor('PHPExcel.PHPExcel.Writer.Excel2007');



        $objExcel = new \PHPExcel();



        //set document Property



        $objWriter = \PHPExcel_IOFactory::createWriter($objExcel, 'Excel2007');







        $objActSheet = $objExcel->getActiveSheet();



        $key = ord("A");



        $letter =explode(',',"A,B,C,D,E,F,G,H,I,J,K,L,M,N,O,P,Q,R,S,T,U,V,W,X,Y,Z,AA,AB,AC,AD,AE,AF,AG,AH,AI");



        $arrHeader = array('父SKU','sku','ASIN','颜色','尺码','Brand','分类','中文简称','英文简称','BuyBox价格','成本价','分销价','毛重(克)','包装尺寸','适用人群','材料','标题','关键字','要点1','要点2','要点3','要点4','要点5','简介','产品图','运费','操作','库存','币种','挂号模板','包装材料','金属','珠宝','语言','参考网址');



        //填充表头信息



        $lenth =  count($arrHeader);



        for($i = 0;$i < $lenth;$i++) {



            $objActSheet->setCellValue("$letter[$i]1","$arrHeader[$i]");



        };



        //dump($xlsData);die;



        //填充表格信息



        foreach($xlsData as $k=>$v){



            $CLASS1 =$this->leimu($v['CLASS1']);



            $CLASS2 =$this->leimu($v['CLASS2']);



            $CLASS3 =$this->leimu($v['CLASS3']);



            $CLASS = $CLASS1.'/'.$CLASS2.'/'.$CLASS3;



            $k +=2;



            $objActSheet->setCellValue('A'.$k,$v['FSKU']);



            $objActSheet->setCellValue('B'.$k, $v['CSKU']);



            $objActSheet->setCellValue('C'.$k, $v['ASIN']);



            $objActSheet->setCellValue('D'.$k, $v['COLOR']);



            $objActSheet->setCellValue('E'.$k, $v['SIZE']);



            $objActSheet->setCellValue('F'.$k, $v['BRAND']);



            $objActSheet->setCellValue('G'.$k, $CLASS);



            $objActSheet->setCellValue('H'.$k, '');



            $objActSheet->setCellValue('I'.$k, $v['CATEGORY']);



            $objActSheet->setCellValue('J'.$k, $v['BUY_PRICE']);



            $objActSheet->setCellValue('K'.$k, $v['COST_PRICE']);



            $objActSheet->setCellValue('L'.$k, $v['DISTRIBUTION_PRICE']);



            $objActSheet->setCellValue('M'.$k, $v['GROSS_WEIGHT']);



            $objActSheet->setCellValue('N'.$k, $v['Package_Dimensions']);



            $objActSheet->setCellValue('O'.$k, '');



            $objActSheet->setCellValue('P'.$k, $v['MATERIAL']);



            $objActSheet->setCellValue('Q'.$k, $v['NEW_TITLE']);



            $objActSheet->setCellValue('R'.$k, $v['keyword']);



            $objActSheet->setCellValue('S'.$k, $v['MAIN_POINTS_1']);



            $objActSheet->setCellValue('T'.$k, $v['MAIN_POINTS_2']);



            $objActSheet->setCellValue('U'.$k, $v['MAIN_POINTS_3']);



            $objActSheet->setCellValue('V'.$k, $v['MAIN_POINTS_4']);



            $objActSheet->setCellValue('W'.$k, $v['MAIN_POINTS_5']);



            $objActSheet->setCellValue('X'.$k, $v['DESCRIPTION']);



            $objActSheet->setCellValue('Y'.$k, $v['PICTURE']);



            $objActSheet->setCellValue('Z'.$k, 1);



            $objActSheet->setCellValue('AA'.$k, 'insert');



            $objActSheet->setCellValue('AB'.$k, 50);



            $objActSheet->setCellValue('AC'.$k, 'CNY');



            $objActSheet->setCellValue('AD'.$k, '');



            $objActSheet->setCellValue('AE'.$k, '');



            $objActSheet->setCellValue('AF'.$k, '');



            $objActSheet->setCellValue('AG'.$k, '');



            $objActSheet->setCellValue('AH'.$k, '英语');



            $objActSheet->setCellValue('AI'.$k, $v['URL']);







           // $objActSheet->setCellValue('I'.$k, $v['active'] == 1?'是':'否');



            // 表格高度



            $objActSheet->getRowDimension($k)->setRowHeight(20);



        }







        $width = array(10,15,20,25,30);



        //设置表格的宽度



        $objActSheet->getColumnDimension('A')->setWidth($width[1]);



        $objActSheet->getColumnDimension('B')->setWidth($width[1]);



        $objActSheet->getColumnDimension('C')->setWidth($width[1]);



        $objActSheet->getColumnDimension('D')->setWidth($width[1]);



        $objActSheet->getColumnDimension('E')->setWidth($width[1]);



        $objActSheet->getColumnDimension('F')->setWidth($width[1]);



        $objActSheet->getColumnDimension('G')->setWidth($width[1]);



        $objActSheet->getColumnDimension('H')->setWidth($width[1]);



        $objActSheet->getColumnDimension('I')->setWidth($width[1]);











        $outfile = time().".xlsx";



        ob_end_clean();



        header("Pragma: public");



        header("Expires: 0");



        header("Cache-Control:must-revalidate, post-check=0, pre-check=0");



        header("Content-Type:application/force-download");



        header("Content-Type:application/vnd.ms-execl");



        header("Content-Type:application/octet-stream");



        header("Content-Type:application/download");



        header('Content-Disposition:attachment;filename="'.$outfile.'.xlsx"');



        header("Content-Transfer-Encoding:binary");



        $objWriter->save('php://output');



        echo $objActSheet;die;











    }



    //单条分类查询



    function leimu($fid){



        if($fid == ''){



            return '';



        }



        //分类查询



        $fenlei_name =$this->db2->table('ProductCategories')->where('categoryId ='.$fid)->field('categoryName')->find();



        return $fenlei_name['categoryName'];



    }



    /**



     * 编辑显示



     */



    public function product_edit()
    {
        header("Content-type: text/html; charset=utf-8");
        //当前登陆账号id
        $uid = session('admin_auth.aid');
        $n_id = input('goodsId');
        if (empty($n_id)){
            $this->error('参数错误',url('admin/Productupload/smartupload'));
        }
        //产品基本信息
        $goods_list=$this->db2->table('amazon_commodity')->where('id ='.$n_id)->select();
        //价格展示
        $goods_list_price=$this->db2->table('amazon_commodity_price')->where('commodity_id ='.$n_id)->select();
        //产品描述标题5行信息
        $fsku = array('FSKU' =>$goods_list[0]['FSKU']);
        $goods_fanyi=$this->db2->table('amazon_commodity_country')->where($fsku)->order('language asc')->select();
        //产品英镑价格信息
        $jiage = array('commodity_id' =>$n_id,'country'=>1);
        $GBP_price=$this->db2->table('amazon_commodity_price')->where($jiage)->field('price')->find();

        //产品关键词
        $gjc = array('add_id' =>$goods_list[0]['ADD_ID']);
        $goods_gjc=$this->db2->table('amazon_keywords')->where($gjc)->order('language asc')->select();
        $goods_list = $goods_list[0];
        $goods_extra['goodsId'] = $goods_list['id'];
        $goods_extra['uid'] = $goods_list['UID'];
        $goods_extra['goodsTitle'] = $goods_list['CATEGORY'];

       // $goods_extra['goods_Images'] =str_replace("|",",",$goods_list['PICTURE']);
        $goods_extra['goods_Images'] =str_replace("|",",",$goods_list['PRICE_LIST']);

        $goods_extra['goods_Images'] =preg_replace('# #','',$goods_extra['goods_Images']);
        $goods_extra['goodsImages'] = explode(",", $goods_extra['goods_Images']);
       // dump( $goods_extra['goodsImages']);die;
        $goods_extra['goodsEnglishabbreviation'] = $goods_list['CATEGORY'];
        $goods_extra['goodsCate'] = $goods_list['CLASSIFY'];
        $goods_extra['goodsStaus'] = 0;
        $goods_extra['goodsUpc'] = $goods_list['UPC'];
        $goods_extra['goodsZt'] = 0;
        $goods_extra['goodsUrl'] = $goods_list['URL'];
        //厂商名称和品牌
        $admin_list=Db::name('admin')->where('admin_id = '.$uid)->field('admin_id,en_name,en_brand')->select();
        //dump($admin_list);die;
        $goods_extra['goodsTradeNames'] = $admin_list[0]['en_name'];
        $goods_extra['goodsBrandName'] = $admin_list[0]['en_brand'];
        $goods_extra['goodsSku'] = $goods_list['FSKU'];
        $goods_extra['goodsPrice'] = $GBP_price['price']; //产品价格
        //产品标题、描述、五行要点，关键词
        if(!empty($goods_fanyi)) {
            $goods_extra['goods_title'] = array(
                'zh' => $goods_fanyi[6]["TITLE"],
                'zh_count' => strlen($goods_fanyi[6]["TITLE"]),
                'en' => $goods_fanyi[0]["TITLE"],
                'en_count' => strlen($goods_fanyi[0]["TITLE"]),
                'fra' => $goods_fanyi[1]["TITLE"],
                'fra_count' => strlen($goods_fanyi[1]["TITLE"]),
                'de' => $goods_fanyi[2]["TITLE"],
                'de_count' => strlen($goods_fanyi[2]["TITLE"]),
                'it' => $goods_fanyi[4]["TITLE"],
                'it_count' => strlen($goods_fanyi[4]["TITLE"]),
                'es' => $goods_fanyi[3]["TITLE"],

                'es_count' => strlen($goods_fanyi[3]["TITLE"]),

                'jp' => $goods_fanyi[5]["TITLE"],



                'jp_count' => strlen($goods_fanyi[5]["TITLE"]),



            );



        }else{



            $goods_extra['goods_title'] = array(



                'zh' => '',



                'zh_count' => 0,







                'en' => $goods_list['NEW_TITLE'],



                'en_count' => strlen($goods_list['NEW_TITLE']),







                'fra' => '',



                'fra_count' => 0,







                'de' => '',



                'de_count' => 0,







                'it' => '',



                'it_count' => 0,







                'es' => '',



                'es_count' => 0,







                'jp' => '',



                'jp_count' => 0,



            );



        }



        if(!empty($goods_gjc)) {



            $goods_extra['goods_keys'] = array(



                'zh' => $goods_gjc[6]["keyword"],



                'zh_count' => strlen($goods_gjc[6]["keyword"]),







                'en' => $goods_gjc[0]["keyword"],



                'en_count' => strlen($goods_gjc[0]["keyword"]),







                'fra' => $goods_gjc[1]["keyword"],



                'fra_count' => strlen($goods_gjc[1]["keyword"]),







                'de' => $goods_gjc[2]["keyword"],



                'de_count' => strlen($goods_gjc[2]["keyword"]),







                'it' => $goods_gjc[4]["keyword"],



                'it_count' => strlen($goods_gjc[4]["keyword"]),







                'es' => $goods_gjc[3]["keyword"],



                'es_count' => strlen($goods_gjc[3]["keyword"]),







                'jp' => $goods_gjc[5]["keyword"],



                'jp_count' => strlen($goods_gjc[5]["keyword"]),



            );



        }else{



            $goods_extra['goods_keys'] = array(



                'zh' => '',



                'zh_count' => 0,







                'en' => $goods_list['SHOP_KEYWORDS'],



                'en_count' => strlen($goods_list['SHOP_KEYWORDS']),







                'fra' => '',



                'fra_count' => 0,







                'de' => '',



                'de_count' => 0,







                'it' => '',



                'it_count' => 0,







                'es' => '',



                'es_count' => 0,







                'jp' => '',



                'jp_count' => 0,



            );



        }



        if(!empty($goods_fanyi)) {



            $goods_extra['goods_desc'] = array(



                'zh' => $goods_fanyi[6]["DESCRIPTION"],



                'en' => $goods_fanyi[0]["DESCRIPTION"],



                'fra' => $goods_fanyi[1]["DESCRIPTION"],



                'de' => $goods_fanyi[2]["DESCRIPTION"],



                'it' => $goods_fanyi[4]["DESCRIPTION"],



                'es' => $goods_fanyi[3]["DESCRIPTION"],



                'jp' => $goods_fanyi[5]["DESCRIPTION"]



            );



        }else{



            $goods_extra['goods_desc'] = array(



                'zh' =>'',



                'en' => $goods_list['DESCRIPTION'],



                'fra' => '',



                'de' => '',



                'it' => '',



                'es' => '',



                'jp' => ''



            );



        }



        if(!empty($goods_fanyi)) {



            $goods_extra['goods_poti'] = array(



                'zh' => $goods_fanyi[6]["MAIN_POINTS_1"] . "\n" . $goods_fanyi[6]["MAIN_POINTS_2"] . "\n" . $goods_fanyi[6]["MAIN_POINTS_3"] . "\n" . $goods_fanyi[6]["MAIN_POINTS_4"] . "\n" . $goods_fanyi[6]["MAIN_POINTS_5"],



                'en' => $goods_fanyi[0]["MAIN_POINTS_1"] . "\n" . $goods_fanyi[0]["MAIN_POINTS_2"] . "\n" . $goods_fanyi[0]["MAIN_POINTS_3"] . "\n" . $goods_fanyi[0]["MAIN_POINTS_4"] . "\n" . $goods_fanyi[0]["MAIN_POINTS_5"],



                'fra' => $goods_fanyi[1]["MAIN_POINTS_1"] . "\n" . $goods_fanyi[1]["MAIN_POINTS_2"] . "\n" . $goods_fanyi[1]["MAIN_POINTS_3"] . "\n" . $goods_fanyi[1]["MAIN_POINTS_4"] . "\n" . $goods_fanyi[1]["MAIN_POINTS_5"],



                'de' => $goods_fanyi[2]["MAIN_POINTS_1"] . "\n" . $goods_fanyi[2]["MAIN_POINTS_2"] . "\n" . $goods_fanyi[2]["MAIN_POINTS_3"] . "\n" . $goods_fanyi[2]["MAIN_POINTS_4"] . "\n" . $goods_fanyi[2]["MAIN_POINTS_5"],



                'it' => $goods_fanyi[4]["MAIN_POINTS_1"] . "\n" . $goods_fanyi[4]["MAIN_POINTS_2"] . "\n" . $goods_fanyi[4]["MAIN_POINTS_3"] . "\n" . $goods_fanyi[4]["MAIN_POINTS_4"] . "\n" . $goods_fanyi[4]["MAIN_POINTS_5"],



                'es' => $goods_fanyi[3]["MAIN_POINTS_1"] . "\n" . $goods_fanyi[3]["MAIN_POINTS_2"] . "\n" . $goods_fanyi[3]["MAIN_POINTS_3"] . "\n" . $goods_fanyi[3]["MAIN_POINTS_4"] . "\n" . $goods_fanyi[3]["MAIN_POINTS_5"],



                'jp' => $goods_fanyi[5]["MAIN_POINTS_1"] . "\n" . $goods_fanyi[5]["MAIN_POINTS_2"] . "\n" . $goods_fanyi[5]["MAIN_POINTS_3"] . "\n" . $goods_fanyi[5]["MAIN_POINTS_4"] . "\n" . $goods_fanyi[5]["MAIN_POINTS_5"]



            );



        }else{



            $goods_extra['goods_poti'] = array(



                'zh' => '',



                'en' => $goods_list["MAIN_POINTS_1"] . "\n" . $goods_list["MAIN_POINTS_2"] . "\n" . $goods_list["MAIN_POINTS_3"] . "\n" . $goods_list["MAIN_POINTS_4"] . "\n" . $goods_list["MAIN_POINTS_5"],



                'fra' => '',



                'de' => '',



                'it' => '',



                'es' => '',



                'jp' => ''



            );



        }







        //变体产品
        $where= array('FSKU'=>$goods_extra['goodsSku']);
        $goods_list1=$this->db2->table('amazon_commodity')->alias('a')
            ->join('amazon_commodity_price c','a.id=c.commodity_id')
            ->where('c.country = 1')
            ->where($where)->select();
        //dump($goods_list1);die;
        $goods_list1count =count($goods_list1);
        //dump($goods_list1count);die;
        foreach($goods_list1 as $k=>$v){
            if($v['COLOR'] && $v['SIZE']){ $a = $v['COLOR'].'-'.$v['SIZE'];}else
            if(empty($v['COLOR']) && empty($v['SIZE'])){ $a = '';}else
            if($v['COLOR']){ $a = $v['COLOR'];}else
            if($v['SIZE']){ $a = $v['SIZE'];}
            $goods_extra['variant']['variant_combination'][$k] = $a;//变体名称
            $goods_extra['variant']['sku'][$k] = $v['CSKU'];//子sku
            $goods_extra['variant']['markup'][$k] = '';
            $goods_extra['variant']['upc'][$k] = $v['UPC'];
            $goods_extra['variant']['imgs'][$k] = $variant_imgs =explode("|",$v['PICTURE']);
            $goods_extra['variant']['stock'][$k] = '';//库存
            $goods_extra['variant']['price'][$k] = $v['price'];//英国价格

        }
        $this->assign('goods_list1count',$goods_list1count);
        $this->assign('goods_extra',$goods_extra);
        return $this->fetch();
    }



     /**



     * 编辑操作



     */



    public function product_runedit()



    {


        //var_dump($_POST);DIE;
        if (!request()->isAjax()){



            $this->error('提交方式不正确',url('admin/Productupload/product_list'));



        }



        $goods_id = input('goodsId');



        //变体遍历



        $bianti = $_POST['sku'];



        //变体upc



        $biantiupc = $_POST['upc'];







        //查询父类sku



        $goods_fsku=$this->db2->table('amazon_commodity')->where("id=".$goods_id)->field('FSKU')->find();



        $where= array('FSKU'=>$goods_fsku['FSKU']);



        $goods_idlist=$this->db2->table('amazon_commodity')->where($where)->field('id')->select();







        $imgurl =str_replace(","," | ",input('goodsImages'));//图片路径替换







        //dump($_POST);die;







        $sl_data=array(



            'PICTURE'=>$imgurl,



            'TITLE'=>input('goodsTitle'),



            'CATEGORY'=>input('goodsEnglishabbreviation'),



            'FSKU'=>input('goodsSku'),



            'SHOP'=>input('goodsUrl'),



            'UPC'=>input('goodsUpc'),



        );



        //循环修改子产品的父sku和子sku



        foreach ($goods_idlist as $k=>$v){



            if(!empty($bianti)){



                $data['CSKU'] = $bianti[$k];



                $data['UPC'] = $biantiupc[$k];



            }







            $data['FSKU'] = input('goodsSku');



            $this->db2->table('amazon_commodity')->where('id='.$v['id'])->update($data);



        }



        $rst= $this->db2->table('amazon_commodity')->where('id='.$goods_id)->update($sl_data);







        //修改标题五行描述7中语言,7条数据1英语2法语3德语4西班牙5意大利语6日语7中文



        $languageArray = [1=>'en',2=>'fra',3=>'de',4=>'es',5=>'it',6=>'jp',7=>'zh'];



        foreach ($languageArray as $k=>$v){



            $keypotins_en  =explode("\n",input('keypotins_'.$v));//五行要点分割数组



            $where_en= array('FSKU'=>$goods_fsku['FSKU'],'language'=>$k);



            $en_data=array(



                'TITLE'=>input('title_'.$v),



                'MAIN_POINTS_1'=>isset($keypotins_en[0])?$keypotins_en[0]:'',



                'MAIN_POINTS_2'=>isset($keypotins_en[1])?$keypotins_en[1]:'',



                'MAIN_POINTS_3'=>isset($keypotins_en[2])?$keypotins_en[2]:'',



                'MAIN_POINTS_4'=>isset($keypotins_en[3])?$keypotins_en[3]:'',



                'MAIN_POINTS_5'=>isset($keypotins_en[4])?$keypotins_en[4]:'',



                'DESCRIPTION'=>input('description_'.$v),



                'FSKU'=>input('goodsSku'),



            );



            $potion= $this->db2->table('amazon_commodity_country')->where($where_en)->update($en_data);



        }















        if($rst!==false){



            $this->success('产品修改成功',url('admin/Productupload/product_edit',array('goodsId' => input('goodsId'))));



        }else{



            $this->error('产品修改失败',url('admin/Productupload/product_list'));



        }



    }



    /**



     *返回产品图片



     *



     */



    public function productImage(){







       if (!request()->isAjax()){



            $this->error('提交方式不正确',url('admin/Productupload/smartupload'));



        }



      $n_id = input('goodsId');



        //



        $goods_list=$this->db2->table('amazon_commodity')->where('id ='.$n_id)->field('FSKU,PRICE_LIST')->find();







        $where= array('FSKU'=>$goods_list['FSKU']);



        $goods_list2=$this->db2->table('amazon_commodity')->where($where)->field('FSKU,PRICE_LIST')->select();







        $goods_list = explode("|", $goods_list['PRICE_LIST']);



        $goods_list3 = array();



        foreach($goods_list2 as $k=>$v){



            $goods_list3[] = $v['PRICE_LIST'];







        }



        $goods_list3 =array_unique($goods_list3);



        $goods_list4 = implode("|", $goods_list3);



        $goods_list4 = explode("|", $goods_list4);







        $goods_list= array_merge($goods_list,$goods_list4);



        //dump($goods_list);die;



        $goods_lista =array_unique($goods_list);



        $goods_list =array_values($goods_lista);



       // dump($goods_list);die;







        if($goods_list){



            $res = ['msg'=>"success","data"=>$goods_list];



        }else{



            $res = ['msg'=>"error"];



        }



        return json($res);



    }







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



    //分类树



    function tree($arr,$pid,$tmp,$flag){



        $tmp = $tmp."&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;";



        $flag = $flag+1;



        static $result;



        foreach($arr as $key=>$value){



            if($arr[$key]["parentId"]==$pid){



                $arr[$key]["tmp"] = $tmp;



                $arr[$key]["flags"] = $flag;



                $result[] = $arr[$key];



                $this->tree($arr,$arr[$key]["categoryId"],$tmp,$flag);



            }



        }



        return $result;



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



        $chuangxin = $this->db2->table('chuangxin')->where('cid',$nodeId)->find();



        $ItemType = $chuangxin['categoryName'];



        $parentData = $this->db2->table('amazon_commodity1')



                  ->alias("a")



                  ->join('amazon_keywords b', 'a.CATEGORY=b.classify')



                  ->group('a.FSKU')



                  ->where('id','>=',$startId)



                  ->where('id','<=',$endId)



                  ->where('UID',session('admin_auth.aid'))



                  ->order('id')



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



        $data['time'] = date("Y-m-d H:i:s",time());



        $data['commodity_id'] = $_POST['startId']."-".$_POST['endId'];



        $productId = $_POST['startId']."-".$_POST['endId'];



        $record = $this->db2->table('add_record')->insertGetId($data);



        if($record){



             $return = ['status'=>'success','msg'=>'修改成功'];



            return json($return);



        }



    }



     /**



     *修改上传



     *



     */



    public function editRecord(){



        $storeList = Db::name('plug_sug')->where('plug_uid',session('admin_auth.aid'))->order('plug_sug_id asc')->select();



        $this->assign('admin_realname',session('admin_auth.admin_realname'));



        $this->assign('storeList',$storeList);



        $id = input('id');



        $record = $this->db2->table('add_record')->where('id',$id)->where('UID',session('admin_auth.aid'))->find();



        if($record == ''){



            echo "<script language=\"JavaScript\">\r\n";







                echo " alert(\"未找到数据\");\r\n";







                echo " history.back();\r\n";







                echo "</script>";







                die;



        }



        $commodity_id = explode("-", $record['commodity_id']);



        $record['startId'] = $commodity_id[0];



         $record['endId'] = $commodity_id[1];



        $this->assign('record',$record);



        return $this->fetch('edit_collect');



     }



     public function updateRecord(){



        $id = input('id');



        $nodeId = $_POST['nodeId'];



        $chuangxin = $this->db2->table('chuangxin')->where('cid',$nodeId)->find();



        $ItemType = $chuangxin['categoryName'];



        $parentData = $this->db2->table('amazon_commodity')



                  ->alias("a")
                  ->join('amazon_keywords b', 'a.ADD_ID = b.add_id')
                  ->group('a.FSKU')
                  ->where('id','>=',$_POST['startId'])
                  ->where('id','<=',$_POST['endId'])
                  ->where('UID',session('admin_auth.aid'))
                  ->order('id')
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



        $data['time'] = date("Y-m-d H:i:s",time());



        $data['commodity_id'] = $_POST['startId']."-".$_POST['endId'];



        $data['product_submission'] = '';



        $data['price_submission'] = '';



        $data['inventory_submission'] = '';



        $data['img_submission'] = '';



        $data['relationships_submission'] = '';



        $data['product_status'] = 0;



        $data['price_status'] = 0;



        $data['inventory_status'] = 0;



        $data['img_status'] = 0;



        $data['relationships_status'] = 0;
        $data['category_name'] = $_POST['categoryName'];
        $data['category_detail'] = $_POST['categoryDetail'];

//        dump($data);die;

        $productId = $_POST['startId']."-".$_POST['endId'];



        $record = $this->db2->table('add_record')->where('id',$id)->update($data);



        if($record){



             $return = ['status'=>'success','msg'=>'添加成功'];



            return json($return);



        }



     }

     public function deleteRecord(){
        $id = input('id');
        $res = $this->db2->table('add_record')->where('id',$id)->where('UID',session('admin_auth.aid'))->delete();
        if($res){

            $this->success('删除成功',url('admin/Productupload/myupload'));
        }else{
            $this->error('删除失败');
        }
     }

    public function updateData(){



       $data['UID'] = 1;



       $data['ADD_ID'] = 18;



       $this->db2->table('amazon_commodity1')->where('id','>',0)->update($data);



       die;



    }



    public function createXml(){



       



        $model = new XmlModel();



        ini_set ('memory_limit', '128M');



        //记录id



        $recordId = $_POST['recordId'];



        $record = $this->db2->table('add_record')->where('id',$recordId)->find();



        $addId = explode("-",$record['commodity_id']);



        // dump($addId);die;



        $startId = $addId[0];



        $endId = $addId[1];



        $template = $record['template'];



        $chuangxin = $this->db2->table('chuangxin')->where('cid',$record['node_id'])->find();



        $ItemType = $chuangxin['categoryName'];



        $countryArray = [0=>'GB',2=>'JP',3=>'AS',4=>'de',5=>'uk',6=>'it',7=>'fr',8=>'es'];



        $country = $countryArray[$record['store_id']];



         //父类



        $parentData = $this->db2->table('amazon_commodity1')



                  ->alias("a")



                  ->join('amazon_keywords b', 'a.CATEGORY=b.classify')



                  ->group('a.FSKU')



                  ->where('id','>=',$startId)



                  ->where('id','<=',$endId)



                  ->where('UID',session('admin_auth.aid'))



                  ->order('id')



                  ->select();



        if(count($parentData)<1){



            $return = ['status'=>'error','msg'=>'没有可添加的产品'];



            return json($return);



        }



         $fsku = '';



         foreach($parentData as $k=>$v){



             $countFsku = $this->db2->table('amazon_commodity1')->where('FSKU',$v['FSKU'])->select();



             $count = count($countFsku);



             $parentData[$k]['count'] = $count;



             if($count<2){



                 continue;



             }else{



                 $fsku.=$v['FSKU'].",";



             }



         }



         //子类



         $childData = $this->db2->table('amazon_commodity1')



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



            $ean_k++;



        }



        $data = array_merge($childData,$parentData);



        dump($data);die;



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



        



      $this->feed($res,$record);



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



        $turnCountry = ['4'=>'de','5'=>'uk','6'=>'id','7'=>'fr','8'=>'es'];



        $marketplaceIdArray['fr'] = "A13V1IB3VIYZZH";



        $marketplaceIdArray['uk'] = "A1F83G8C2ARO7P";



        $marketplaceIdArray['de'] = "A1PA6795UKMFR9";



        $marketplaceIdArray['es'] = "A1RKKUPIHCS9HS";



        $marketplaceIdArray['it'] = "APJ6JRA9NG5V4";



        $url['fr'] = "https://mws.amazonservices.fr";



        $url['uk'] = "https://mws.amazonservices.co.uk";



        $url['de'] = "https://mws.amazonservices.de";



        $url['es'] = "https://mws.amazonservices.es";



        $url['it'] = "https://mws.amazonservices.it";







        if($record['store_id']==4 || $record['store_id']==5 || $record['store_id']==6 || $record['store_id']==7 || $record['store_id']==8){



            $country = 1;



        }else{



            $country = $record['store_id'];



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



    }







    public function getFeedSubmissionList($recordId,$type){



        $record = $this->db2->table('add_record')->where('id',$recordId)->find();



        $FeedType['product'] = "_POST_PRODUCT_DATA_";



        $FeedType['img'] = "_POST_PRODUCT_IMAGE_DATA_";



        $FeedType['price'] = "_POST_PRODUCT_PRICING_DATA_";



        $FeedType['inventory'] = "_POST_INVENTORY_AVAILABILITY_DATA_";



        $FeedType['relationships'] = "_POST_PRODUCT_RELATIONSHIP_DATA_";



        $turnCountry = ['4'=>'de','5'=>'uk','6'=>'id','7'=>'fr','8'=>'es'];



        $marketplaceIdArray['fr'] = "A13V1IB3VIYZZH";



        $marketplaceIdArray['uk'] = "A1F83G8C2ARO7P";



        $marketplaceIdArray['de'] = "A1PA6795UKMFR9";



        $marketplaceIdArray['es'] = "A1RKKUPIHCS9HS";



        $marketplaceIdArray['it'] = "APJ6JRA9NG5V4";



        $url['fr'] = "https://mws.amazonservices.fr";



        $url['uk'] = "https://mws.amazonservices.co.uk";



        $url['de'] = "https://mws.amazonservices.de";



        $url['es'] = "https://mws.amazonservices.es";



        $url['it'] = "https://mws.amazonservices.it";



        if($record['store_id']==4 || $record['store_id']==5 || $record['store_id']==6 || $record['store_id']==7 || $record['store_id']==8){



            $country = 1;



        }else{



            $country = $record['store_id'];



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



        foreach ($data as $key => $value) {



            $request['FeedSubmissionId'] = $value;



            $res = $model->getFeedSubmissionList($request);



            if($res == "_DONE_"){



                $filed = $key."_status";



                $recordData[$filed] = 2;



                $recordData['time'] = date("Y-m-d H:i:s",time());



            }elseif($res == "_IN_PROGRESS_" || $res == "_SUBMITTED_"){



                continue;



            }else{



                $filed = $key."_status";



                $recordData[$filed] = 4;



                $recordData['time'] = date("Y-m-d H:i:s",time());



            }



            $this->db2->table('add_record')->where('id',$record['id'])->update($recordData);



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



        $turnCountry = ['4'=>'de','5'=>'uk','6'=>'id','7'=>'fr','8'=>'es'];



        $marketplaceIdArray['fr'] = "A13V1IB3VIYZZH";



        $marketplaceIdArray['uk'] = "A1F83G8C2ARO7P";



        $marketplaceIdArray['de'] = "A1PA6795UKMFR9";



        $marketplaceIdArray['es'] = "A1RKKUPIHCS9HS";



        $marketplaceIdArray['it'] = "APJ6JRA9NG5V4";



        $url['fr'] = "https://mws.amazonservices.fr";



        $url['uk'] = "https://mws.amazonservices.co.uk";



        $url['de'] = "https://mws.amazonservices.de";



        $url['es'] = "https://mws.amazonservices.es";



        $url['it'] = "https://mws.amazonservices.it";



        if($record['store_id']==4 || $record['store_id']==5 || $record['store_id']==6 || $record['store_id']==7 || $record['store_id']==8){



            $country = 1;



        }else{



            $country = $record['store_id'];



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



           $request['type'] = $type;



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











    public function uploadCollect(){



        $storeList = Db::name('plug_sug')->where('plug_uid',session('admin_auth.aid'))->order('plug_sug_id asc')->select();



        $this->assign('admin_realname',session('admin_auth.admin_realname'));



        $this->assign('storeList',$storeList);



        return $this->fetch('upload_collect');



    }



    public function firstClass(){



        $country = [0=>'GB',2=>'JP',3=>'AS',4=>'DE',5=>'IT',6=>'IT',7=>'FR',8=>'ES'];



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



        $country = [0=>'GB',2=>'JP',3=>'AS',4=>'DE',5=>'IT',6=>'IT',7=>'FR',8=>'ES'];



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



      public function skuGetGoods(){







        // dump($_GET['sku']);die;







         header("Content-type: text/html; charset=utf-8");







        $commodity = $this->db2->table('amazon_commodity')->where('CSKU',$_GET['sku'])->find();



        // dump($commodity);die;



        if($commodity){



             $commodityId = $commodity['id'];



            $url = "product_edit/goodsId/".$commodityId;



            echo "<script language='javascript'>window.location.href='$url';</script>";



            die;







        }else{







            $commodity = $this->db2->table('amazon_commodity')->where('FSKU',$_GET['sku'])->find();







            if($commodity){



                $commodityId = $commodity['id'];



                $url = "product_edit/goodsId/".$commodityId;



                echo "<script language='javascript'>window.location.href='$url';</script>";



                die;







            }else{







                echo "<script language=\"JavaScript\">\r\n";







                echo " alert(\"未找到数据\");\r\n";







                echo " history.back();\r\n";







                echo "</script>";







                die;







            }







        }



    }



    //亚马逊模板导出
    public function ymxdc()
    {
        //查询上传记录表，获得产品id,和分类模板和分类，国家、
       /*************************************/
        //记录id
        $recordId =input('recordId');
        $record = Db::name('goods_record')->where('id',$recordId)->find();
        $template = explode('/',$record['template']);
        $countryArray = [2=>'japan',4=>'germany',5=>'britain',6=>'italy',7=>'france',8=>'spain',9=>'usa',10=>'mexico',11=>'canada'];
        $country = $countryArray[$record['store_id']];
        $countrylanguageArray = ['britain'=>1,'usa'=>1,'canada'=>1,'japan'=>6,'germany'=>3,'italy'=>5,'france'=>2,'spain'=>4,'mexico'=>4];
        $language =$countrylanguageArray[$country];
        $addId = explode("-",$record['commodity_id']);
        if(count($addId)<2){
            $addId = explode(",",$record['commodity_id']);
            if($record['class3']!=""){
                $parentData =  Db::view('goods')
                    ->view('goods_language', '*','goods.goodsId=goods_language.goods_id')
                    ->where('goods.goodsId','in',$addId)
                    ->where('goods.UID',session('admin_auth.aid'))
                    ->where('goods.product_back',0)
                    ->where('goods_language.language',$language)
                    ->where('goods.class3',$record['class3'])
                    ->order('goods.goodsId')
                    ->select();
            }elseif($record['class3']=="" && $record['class2']!=""){
                $parentData =  Db::view('goods')
                    ->view('goods_language', '*','goods.goodsId=goods_language.goods_id')
                    ->where('goods.goodsId','in',$addId)
                    ->where('goods.product_back',0)
                    ->where('goods.UID',session('admin_auth.aid'))
                    ->where('goods_language.language',$language)
                    ->where('goods.class2',$record['class2'])
                    ->order('goods.goodsId')
                    ->select();

            }elseif($record['class3']=="" && $record['class2']=="" && $record['class1']!=""){
                $parentData =  Db::view('goods')
                    ->view('goods_language', '*','goods.goodsId=goods_language.goods_id')
                    ->where('goods.goodsId','in',$addId)
                    ->where('goods.product_back',0)
                    ->where('goods.UID',session('admin_auth.aid'))
                    ->where('goods_language.language',$language)
                    ->where('goods.class1',$record['class1'])
                    ->order('goods.goodsId')
                    ->select();
            }elseif($record['class3']=="" && $record['class2']=="" && $record['class1']==""){
                $parentData =  Db::view('goods')
                    ->view('goods_language', '*','goods.goodsId=goods_language.goods_id')
                    ->where('goods.goodsId','in',$addId)
                    ->where('goods.product_back',0)
                    ->where('goods.UID',session('admin_auth.aid'))
                    ->where('goods_language.language',$language)
                    ->order('goods.goodsId')
                    ->select();
            }
            $childData =  Db::view('goods')
                ->view('goods_language', '*','goods.goodsId=goods_language.goods_id')
                ->view('goods_variant', '*','goods.goodsId=goods_variant.goods_id')
                ->where('goods.product_back',0)
                ->where('goods.goodsId','in',$addId)
                ->where('goods.UID',session('admin_auth.aid'))
                ->where('goods_language.language',$language)
                ->order('goods.goodsId')
                ->select();

        }else{
            $startId = $addId[0];
            $endId = $addId[1];
            if($record['class3']!=""){
                $parentData =  Db::view('goods')
                    ->view('goods_language', '*','goods.goodsId=goods_language.goods_id')
                    ->where('goods.goodsId','>=',$startId)
                    ->where('goods.goodsId','<=',$endId)
                    ->where('goods.product_back',0)
                    ->where('goods.UID',session('admin_auth.aid'))
                    ->where('goods_language.language',$language)
                    ->where('goods.class3',$record['class3'])
                    ->order('goods.goodsId')
                    ->select();
            }elseif($record['class3']=="" && $record['class2']!=""){
                $parentData =  Db::view('goods')
                    ->view('goods_language', '*','goods.goodsId=goods_language.goods_id')
                    ->where('goods.goodsId','>=',$startId)
                    ->where('goods.product_back',0)
                    ->where('goods.goodsId','<=',$endId)
                    ->where('goods.UID',session('admin_auth.aid'))
                    ->where('goods_language.language',$language)
                    ->where('goods.class2',$record['class2'])
                    ->order('goods.goodsId')
                    ->select();
            }elseif($record['class3']=="" && $record['class2']=="" && $record['class1']!=""){
                $parentData =  Db::view('goods')
                    ->view('goods_language', '*','goods.goodsId=goods_language.goods_id')
                    ->where('goods.goodsId','>=',$startId)
                    ->where('goods.product_back',0)
                    ->where('goods.goodsId','<=',$endId)
                    ->where('goods.UID',session('admin_auth.aid'))
                    ->where('goods_language.language',$language)
                    ->where('goods.class1',$record['class1'])
                    ->order('goods.goodsId')
                    ->select();
            }elseif($record['class3']=="" && $record['class2']=="" && $record['class1']==""){
                $parentData =  Db::view('goods')
                    ->view('goods_language', '*','goods.goodsId=goods_language.goods_id')
                    ->where('goods.goodsId','>=',$startId)
                    ->where('goods.product_back',0)
                    ->where('goods.goodsId','<=',$endId)
                    ->where('goods.UID',session('admin_auth.aid'))
                    ->where('goods_language.language',$language)
                    ->order('goods.goodsId')
                    ->select();

            }
            $childData =  Db::view('goods')
                ->view('goods_language', '*','goods.goodsId=goods_language.goods_id')
                ->view('goods_variant', '*','goods.goodsId=goods_variant.goods_id')
                ->where('goods.goodsId','>=',$startId)
                ->where('goods.product_back',0)
                ->where('goods.goodsId','<=',$endId)
                ->where('goods.UID',session('admin_auth.aid'))
                ->where('goods_language.language',$language)
                ->order('goods.goodsId')
                ->select();
        }
        if(count($parentData)<1){
            $return = ['status'=>'error','msg'=>'没有可添加的产品'];
            return json($return);
        }

        $xlsData = array_merge($childData,$parentData);


       /*************************************/

        Vendor('PHPExcel.PHPExcel');//调用类库,路径是基于vendor文件夹的
        Vendor('PHPExcel.PHPExcel.Worksheet.Drawing');
        Vendor('PHPExcel.PHPExcel.Writer.Excel2007');
        $objExcel = new \PHPExcel();
        //set document Property
        $objWriter = \PHPExcel_IOFactory::createWriter($objExcel, 'Excel2007');
        $objActSheet = $objExcel->getActiveSheet();
        $key = ord("A");
        $letter =explode(',',"A,B,C,D,E,F,G,H,I,J,K,L,M,N,O,P,Q,R,S,T,U,V,W,X,Y,Z,AA,AB,AC,AD,AE,AF,AG,AH,AI,AJ,AK,AL,AM,AN,AO,AP,AQ,AR,AS,AT,AU,AV,AW,AX,AY,AZ,BA,BB,BC,BD,BE,BF,BG,BH,BI,BJ,BK,BL,BM,BN,BO,BP,BQ,BR,BS,BT,BU,BV,BW,BX,BY,BZ,CA,CB,CC,CD,CE,CF,CG,CH,CI,CJ,CK,CL,CM,CN,CO,CP,CQ,CR,CS,CT,CU,CV,CW,CX,CY,CZ,DA,DB,DC,DD,DE,DF,DG,DH,DI,DJ,DK,DL,DK,DL,DM,DN,DO,DP,DQ,DR,DS,DT,DU,DV,DW,DX,DY,DZ,EA,EB,EC,ED,EE,EF,EG,EH,EI,EJ,EK,EL,EM,EN,EO,EP,EQ,ER,ES,ET,EU,EV,EW,EX,EY,EZ,FA,FB,FC,FD,FE,FF,FG,FH,FI,FJ,FK,FL,FM,FN,FO,FP,FQ,FR,FS,FT,FU,FV,FW,FX,FY,FZ,GA,GB,GC,GD,GE,GF,GG,GH,GI,GJ,GK,GL,GM,GN,GO,GP,GQ,GR,GS,GT,GU,GV,GW,GX,GY,GZ,HA,HB,HC,HD,HE,HF,HG,HH,HI,HJ,HK,HL,HM,HN,HO,HP,HQ,HR,HS,HT,HU,HV,HW,HX,HY,HZ,IA,IB,IC,ID,IE,IF,IG,IH,II,IJ,IK,IL,IM,IN,IO,IP,IQ,IR,IS,IT,IU,IV,IW,IX,IY,IZ,JA,JB,JC,JD,JE,JF,JG,JH,JI,JJ,JK,JL,JM");
        $arrHeader = array('TemplateType=fptcustom','Version=2019.1209','Category=health','TemplateSignature=Q09OVEFDVF9MRU5TRVMsUFJFU0NSSVBUSU9OX0RSVUcsU0tJTl9CTEVNSVNIX1JFTU9WQUxfVE9PTCxOSUNPVElORV9SRVBMQUNFTUVOVCxTRVhVQUxfV0VMTE5FU1MsT1JBTF9JUlJJR0FUT1IsSEVBTFRIX1BFUlNPTkFMX0NBUkUsT1RDX01FRElDQVRJT04sUFJFU0NSSVBUSU9OX0VZRVdFQVIsSU5DT05USU5FTkNFX1BST1RFQ1RPUixUT1BJQ0FMUyxNRU5TVFJVQUxfQ1VQLE1FRElDQUxfU1VQUExJRVMsRElFVEFSWV9TVVBQTEVNRU5UUyxUT09USEJSVVNILFBFUlNPTkFMX0NBUkVfQVBQTElBTkNFLEhFQUxUSF9GT09ELFNBTklUQVJZX05BUEtJTixWSVRBTUlOLERBSUxZX0xJVklOR19BSURT
','The top 3 rows are for Amazon.com use only. Do not modify or delete the top 3 rows.','','','','','','','','','','','','','','','','','','','','','','','','','','Images','','','','','','','','','Variation','','','','Basic','','','','','','','','','','','Discovery','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','Product Enrichment','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','Dimensions','','','','','','','','','','','','','','','','','','','','','','','','Fulfillment','','','','','','','','','Compliance','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','Offer','','','','','','','','','','','','','','','','','','','','','','','','');
        //填充表头信息
        $lenth =  count($arrHeader);
        for($i = 0;$i < $lenth;$i++) {
            $objActSheet->setCellValue("$letter[$i]1","$arrHeader[$i]");
        };
        //第二行
        $arrHeaders = array('Product Type','Seller SKU','Brand Name','Product ID','Product ID Type','Item Name (aka Title)','Manufacturer','Manufacturer Part Number','Recommended Browse Nodes','Directions','Unit of measure for the duration of use of the contact lense','Axis','Lens Addition Power','Optical Power','Base Curve Radius','Lens Type','Cylinder Correction','Duration of use of the contact lense','Base Curve Radius Unit Of Measure','optical_power_unit_of_measure','Outside Diameter','Item Diameter Unit Of Measure','Ingredients','Ingredients','Ingredients','legal_compliance_certification_metadata','Ministry of Health registration number','Standard Price','Quantity','Main Image URL','Other Image Url1','Other Image Url2','Other Image Url3','Other Image Url4','Other Image Url5','Other Image Url6','Other Image Url7','Other Image Url8','Swatch Image URL','Parentage','Parent SKU','Relationship Type','Variation Theme','Update Delete','Target Gender','Product Description','Outer Material Type','model','Language','Language','Language','Language','Language','Model Year','Special Features','Special Features','Special Features','Special Features','Special Features','Target audience','Target Audience','Target Audience','Target Audience','Target Audience','Target Audience','Flavour','Key Product Features','Key Product Features','Key Product Features','Key Product Features','Key Product Features','Power Source','Material','Material','Material','Material','Material','Platinum Keywords','Platinum Keywords','Platinum Keywords','Platinum Keywords','Platinum Keywords','Search Terms','Indications','Colour','Scent','Colour','Natural Products Specialty','Natural Products Specialty','Natural Products Specialty','Natural Products Specialty','Natural Products Specialty','Manufacturer contact information','Size','Catalog Number','Shaft Style Type','Item gender','Includes AC Adapter','Additives','Primary ingredient country of origin','Primary ingredient location produced','Serving Size','Serving Size Unit of Measure','Energy Content','Fat','Saturated Fat','Monounsaturated Fat','Polyunsaturated Fat','Carbohydrates','Sugars','Polyols','Starch','Dietary Fiber','Protein','Salt per serving','Vitamin A','Vitamin D','Vitamin E','Vitamin K','Vitamin C','Thiamin','Riboflavin','Niacin','Vitamine B6','Folic Acid','Vitamin b12','Biotin','Pantothenic Acid','Potassium','Chloride','Calcium','Phosphorus','Magnesium','Iron','Zinc','Copper','Manganese','Fluoride','Selen','Chromium','Molybdenum','Iodine','Cholesterol','Sodium','Material Composition','Power Plug Type','Is Adult Product','Water Content Percentage','Definition of the eye in scope (Right, left or both eyes)','Wig Length','Minimum Weight Recommendation','Maximum Weight Recommendation','Weight Recommendation Unit Of Measure','Format','Item Display Weight Unit Of Measure','Display Weight','Item Display Volume Unit Of Measure','Display Volume','Item Display Length Unit Of Measure','Display Length','Item Length Unit Of Measure','Item Length','Item Width','Item Height','Website Shipping Weight Unit Of Measure','Shipping Weight','Unit Count (Per Unit Pricing)','Unit of Measure (Per Unit Pricing)','Bra band size','Bra band size unit','Bra cup size','Item Dimensions Unit Of Measure','Display Dimensions Unit Of Measure','Contains Food or Beverage','Fulfillment Centre ID','Package Length','Package Width','Package Height','Package Length Unit Of Measure','Package Weight','Package Weight Unit Of Measure','Package Dimensions Unit Of Measure','Specific Uses for Product','Specific Uses for Product','Specific Uses for Product','Specific Uses for Product','Specific Uses for Product','Legal Disclaimer Description','alcohol_content','Batteries are Included','Is this product a battery or does it utilise batteries?','Battery type/size','Battery type/size','Battery type/size','Number of batteries','Number of batteries','Number of batteries','EU Toys Safety Directive Age-specific warning','EU Toys Safety Directive Non-Age-specific warning','EU Toys Safety Directive Non-Age-specific warning','EU Toys Safety Directive Non-Age-specific warning','EU Toys Safety Directive Non-Age-specific warning','EU Toys Safety Directive Non-Age-specific warning','EU Toys Safety Directive language warning','EU Toys Safety Directive language warning','EU Toys Safety Directive language warning','EU Toys Safety Directive language warning','EU Toys Safety Directive language warning','Allergen Information','Allergen Information','Allergen Information','Allergen Information','Allergen Information','Storage Instructions','Safety Warning','Use By Recommendation','item_weight_unit_of_measure','Item Weight','Country/Region of declaration','Country/Region Of Origin','Medicine Classification','Customer Restriction (E-cigarette Products)','Battery composition','Battery weight (grams)','battery_weight_unit_of_measure','Number of Lithium Metal Cells','Number of Lithium-ion Cells','Lithium Battery Packaging','Watt hours per battery','lithium_battery_energy_content_unit_of_measure','Lithium content (grams)','lithium_battery_weight_unit_of_measure','Applicable Dangerous Goods Regulations','Applicable Dangerous Goods Regulations','Applicable Dangerous Goods Regulations','Applicable Dangerous Goods Regulations','Applicable Dangerous Goods Regulations','UN number','Safety Data Sheet (SDS) URL','Volume','item_volume_unit_of_measure','Flash point (°C)?','external_testing_certification','Warranty Description','Categorization/GHS pictograms (select all that apply)','Categorization/GHS pictograms (select all that apply)','Categorization/GHS pictograms (select all that apply)','Expiration Dated Product','fc_shelf_life','Sale Price','Sale From Date','Sale End Date','Restock Date','Launch Date','Package Quantity','Product Tax Code','Release Date','Max Order Quantity','Handling Time','Max Aggregate Ship Quantity','Can Be Gift Messaged','Is Gift Wrap Available?','Is Discontinued by Manufacturer','Number of Items','Merchant Shipping Group','Recommended Retail Price','Stop Selling Date','Offering Release Date','Scheduled Delivery SKU List','RRP','Condition Type','Item Condition Note'
        );
        //填充表头信息
        $lenths =  count($arrHeaders);
        for($i = 0;$i < $lenths;$i++) {
            $objActSheet->setCellValue("$letter[$i]2","$arrHeaders[$i]");
        };
        //第三行
        $arrHeaders3 = array('feed_product_type','item_sku','brand_name','external_product_id','external_product_id_type','item_name','manufacturer','part_number','recommended_browse_nodes','directions','life_expectancy_unit_of_measure','cylinder_axis','lens_addition_power','optical_power','base_curve_radius','lens_type','cylinder_correction','life_expectancy','base_curve_radius_unit_of_measure','optical_power_unit_of_measure','item_diameter_string','item_diameter_unit_of_measure','ingredients1','ingredients2','ingredients3','legal_compliance_certification_metadata','external_product_information','standard_price','quantity','main_image_url','other_image_url1','other_image_url2','other_image_url3','other_image_url4','other_image_url5','other_image_url6','other_image_url7','other_image_url8','swatch_image_url','parent_child','parent_sku','relationship_type','variation_theme','update_delete','target_gender','product_description','outer_material_type','model','language_value1','language_value2','language_value3','language_value4','language_value5','model_year','special_features1','special_features2','special_features3','special_features4','special_features5','target_audience_base','target_audience_keywords1','target_audience_keywords2','target_audience_keywords3','target_audience_keywords4','target_audience_keywords5','flavor_name','bullet_point1','bullet_point2','bullet_point3','bullet_point4','bullet_point5','power_source_type','material_type1','material_type2','material_type3','material_type4','material_type5','platinum_keywords1','platinum_keywords2','platinum_keywords3','platinum_keywords4','platinum_keywords5','generic_keywords','indications','color_name','scent_name','color_map','specialty1','specialty2','specialty3','specialty4','specialty5','manufacturer_contact_information','size_name','catalog_number','shaft_style_type','item_gender','includes_ac_adapter','special_ingredients','primary_ingredient_country_of_origin','primary_ingredient_location_produced','serving_size','serving_size_unit_of_measure','energy_content_per_serving_string','total_fat_per_serving_string','saturated_fat_per_serving_string','monounsaturated_fat_per_serving_string','polyunsaturated_fat_per_serving_string','total_carbohydrate_per_serving_string','sugars_per_serving_string','sugar_alcohols_per_serving_string','starch_per_serving_string','dietary_fiber_per_serving_string','protein_per_serving_string','salt_per_serving_string','vitamin_a_per_serving_string','vitamin_d_per_serving_string','vitamin_e_per_serving_string','vitamin_k_per_serving_string','vitamin_c_per_serving_string','thiamin_per_serving_string','vitamin_b2_per_serving_string','niacin_per_serving_string','vitamin_b6_per_serving_string','folic_acid_per_serving_string','vitamin_b12_per_serving_string','biotin_per_serving_string','pantothenic_acid_per_serving_string','potassium_per_serving_string','chloride_per_serving_string','calcium_per_serving_string','phosphorus_per_serving_string','magnesium_per_serving_string','iron_per_serving_string','zinc_per_serving_string','copper_per_serving_string','manganese_per_serving_string','fluoride_per_serving_string','selenium_per_serving_string','chromium_per_serving_string','molybdenum_per_serving_string','iodine_per_serving_string','cholesterol_per_serving_string','sodium_per_serving_string','material_composition','power_plug_type','is_adult_product','water_content_percentage','orientation','size_map','minimum_weight_recommendation','maximum_weight_recommendation','weight_recommendation_unit_of_measure','item_form','item_display_weight_unit_of_measure','item_display_weight','item_display_volume_unit_of_measure','item_display_volume','item_display_length_unit_of_measure','item_display_length','item_length_unit_of_measure','item_length','item_width','item_height','website_shipping_weight_unit_of_measure','website_shipping_weight','unit_count','unit_count_type','band_size_num','band_size_num_unit_of_measure','cup_size','item_dimensions_unit_of_measure','display_dimensions_unit_of_measure','contains_food_or_beverage','fulfillment_center_id','package_length','package_width','package_height','package_length_unit_of_measure','package_weight','package_weight_unit_of_measure','package_dimensions_unit_of_measure','specific_uses_for_product1','specific_uses_for_product2','specific_uses_for_product3','specific_uses_for_product4','specific_uses_for_product5','legal_disclaimer_description','alcohol_content','are_batteries_included','batteries_required','battery_type1','battery_type2','battery_type3','number_of_batteries1','number_of_batteries2','number_of_batteries3','eu_toys_safety_directive_age_warning','eu_toys_safety_directive_warning1','eu_toys_safety_directive_warning2','eu_toys_safety_directive_warning3','eu_toys_safety_directive_warning4','eu_toys_safety_directive_warning5','eu_toys_safety_directive_language1','eu_toys_safety_directive_language2','eu_toys_safety_directive_language3','eu_toys_safety_directive_language4','eu_toys_safety_directive_language5','allergen_information1','allergen_information2','allergen_information3','allergen_information4','allergen_information5','storage_instructions','safety_warning','use_by_recommendation','item_weight_unit_of_measure','item_weight','country_string','country_of_origin','medicine_classification','customer_restriction_type','battery_cell_composition','battery_weight','battery_weight_unit_of_measure','number_of_lithium_metal_cells','number_of_lithium_ion_cells','lithium_battery_packaging','lithium_battery_energy_content','lithium_battery_energy_content_unit_of_measure','lithium_battery_weight','lithium_battery_weight_unit_of_measure','supplier_declared_dg_hz_regulation1','supplier_declared_dg_hz_regulation2','supplier_declared_dg_hz_regulation3','supplier_declared_dg_hz_regulation4','supplier_declared_dg_hz_regulation5','hazmat_united_nations_regulatory_id','safety_data_sheet_url','item_volume','item_volume_unit_of_measure','flash_point','external_testing_certification','warranty_description','ghs_classification_class1','ghs_classification_class2','ghs_classification_class3','is_expiration_dated_product','fc_shelf_life','sale_price','sale_from_date','sale_end_date','restock_date','product_site_launch_date','item_package_quantity','product_tax_code','merchant_release_date','max_order_quantity','fulfillment_latency','max_aggregate_ship_quantity','offering_can_be_gift_messaged','offering_can_be_giftwrapped','is_discontinued_by_manufacturer','number_of_items','merchant_shipping_group_name','list_price','offering_end_date','offering_start_date','delivery_schedule_group_id','uvp_list_price','condition_type','condition_note'
        );
        //填充表头信息
        $lenths3 =  count($arrHeaders3);
        for($i = 0;$i < $lenths3;$i++) {
            $objActSheet->setCellValue("$letter[$i]3","$arrHeaders3[$i]");
        };
        //设置样式
        $objExcel->getActiveSheet()->getStyle('1')->getFont()->setBold(true);      //第一行是否加粗
        //设置第一行背景色为FFFF00
        $objExcel->getActiveSheet()->getStyle('A1:AD1')->getFill()->setFillType(\PHPExcel_Style_Fill::FILL_SOLID)->getStartColor()->setRGB('FCD5B5');
        $objExcel->getActiveSheet()->getStyle('A2:AD2')->getFill()->setFillType(\PHPExcel_Style_Fill::FILL_SOLID)->getStartColor()->setRGB('FCD5B5');
        $objExcel->getActiveSheet()->getStyle('A3:AD3')->getFill()->setFillType(\PHPExcel_Style_Fill::FILL_SOLID)->getStartColor()->setRGB('FCD5B5');
        //Images
        $objExcel->getActiveSheet()->getStyle('AE1:AM1')->getFill()->setFillType(\PHPExcel_Style_Fill::FILL_SOLID)->getStartColor()->setRGB('FFFF00');
        $objExcel->getActiveSheet()->getStyle('AE2:AM2')->getFill()->setFillType(\PHPExcel_Style_Fill::FILL_SOLID)->getStartColor()->setRGB('FFFF00');
        $objExcel->getActiveSheet()->getStyle('AE3:AM3')->getFill()->setFillType(\PHPExcel_Style_Fill::FILL_SOLID)->getStartColor()->setRGB('FFFF00');
        //Variation
        $objExcel->getActiveSheet()->getStyle('AN1:AQ1')->getFill()->setFillType(\PHPExcel_Style_Fill::FILL_SOLID)->getStartColor()->setRGB('FF8080');
        $objExcel->getActiveSheet()->getStyle('AN2:AQ2')->getFill()->setFillType(\PHPExcel_Style_Fill::FILL_SOLID)->getStartColor()->setRGB('FF8080');
        $objExcel->getActiveSheet()->getStyle('AN3:AQ3')->getFill()->setFillType(\PHPExcel_Style_Fill::FILL_SOLID)->getStartColor()->setRGB('FF8080');
        //Basic
        $objExcel->getActiveSheet()->getStyle('AR1:BB1')->getFill()->setFillType(\PHPExcel_Style_Fill::FILL_SOLID)->getStartColor()->setRGB('F8A45E');
        $objExcel->getActiveSheet()->getStyle('AR2:BB2')->getFill()->setFillType(\PHPExcel_Style_Fill::FILL_SOLID)->getStartColor()->setRGB('F8A45E');
        $objExcel->getActiveSheet()->getStyle('AR3:BB3')->getFill()->setFillType(\PHPExcel_Style_Fill::FILL_SOLID)->getStartColor()->setRGB('F8A45E');
        //Discovery
        $objExcel->getActiveSheet()->getStyle('BC1:CR1')->getFill()->setFillType(\PHPExcel_Style_Fill::FILL_SOLID)->getStartColor()->setRGB('92D050');
        $objExcel->getActiveSheet()->getStyle('BC2:CR2')->getFill()->setFillType(\PHPExcel_Style_Fill::FILL_SOLID)->getStartColor()->setRGB('92D050');
        $objExcel->getActiveSheet()->getStyle('BC3:CR3')->getFill()->setFillType(\PHPExcel_Style_Fill::FILL_SOLID)->getStartColor()->setRGB('92D050');
        //Product Enrichment
        $objExcel->getActiveSheet()->getStyle('CS1:ES1')->getFill()->setFillType(\PHPExcel_Style_Fill::FILL_SOLID)->getStartColor()->setRGB('BBA680');
        $objExcel->getActiveSheet()->getStyle('CS2:ES2')->getFill()->setFillType(\PHPExcel_Style_Fill::FILL_SOLID)->getStartColor()->setRGB('BBA680');
        $objExcel->getActiveSheet()->getStyle('CS3:ES3')->getFill()->setFillType(\PHPExcel_Style_Fill::FILL_SOLID)->getStartColor()->setRGB('BBA680');
        //Dimensions
        $objExcel->getActiveSheet()->getStyle('ET1:FQ1')->getFill()->setFillType(\PHPExcel_Style_Fill::FILL_SOLID)->getStartColor()->setRGB('8DB4E2');
        $objExcel->getActiveSheet()->getStyle('ET2:FQ2')->getFill()->setFillType(\PHPExcel_Style_Fill::FILL_SOLID)->getStartColor()->setRGB('8DB4E2');
        $objExcel->getActiveSheet()->getStyle('ET3:FQ3')->getFill()->setFillType(\PHPExcel_Style_Fill::FILL_SOLID)->getStartColor()->setRGB('8DB4E2');
        //Fulfillment
        $objExcel->getActiveSheet()->getStyle('FR1:FZ1')->getFill()->setFillType(\PHPExcel_Style_Fill::FILL_SOLID)->getStartColor()->setRGB('B7DEE8');
        $objExcel->getActiveSheet()->getStyle('FR2:FZ2')->getFill()->setFillType(\PHPExcel_Style_Fill::FILL_SOLID)->getStartColor()->setRGB('B7DEE8');
        $objExcel->getActiveSheet()->getStyle('FR3:FZ3')->getFill()->setFillType(\PHPExcel_Style_Fill::FILL_SOLID)->getStartColor()->setRGB('B7DEE8');
        //Compliance
        $objExcel->getActiveSheet()->getStyle('GA1:IM1')->getFill()->setFillType(\PHPExcel_Style_Fill::FILL_SOLID)->getStartColor()->setRGB('CC9999');
        $objExcel->getActiveSheet()->getStyle('GA2:IM2')->getFill()->setFillType(\PHPExcel_Style_Fill::FILL_SOLID)->getStartColor()->setRGB('CC9999');
        $objExcel->getActiveSheet()->getStyle('GA3:IM3')->getFill()->setFillType(\PHPExcel_Style_Fill::FILL_SOLID)->getStartColor()->setRGB('CC9999');
        //Offer
        $objExcel->getActiveSheet()->getStyle('IN1:JL1')->getFill()->setFillType(\PHPExcel_Style_Fill::FILL_SOLID)->getStartColor()->setRGB('FF0000');
        $objExcel->getActiveSheet()->getStyle('IN2:JL2')->getFill()->setFillType(\PHPExcel_Style_Fill::FILL_SOLID)->getStartColor()->setRGB('FF0000');
        $objExcel->getActiveSheet()->getStyle('IN3:JL3')->getFill()->setFillType(\PHPExcel_Style_Fill::FILL_SOLID)->getStartColor()->setRGB('FF0000');
        //单元格样式设置
        $styleArray = array(
            'borders' => array(
                'allborders' => array(
                   // 'style' => PHPExcel_Style_Border::BORDER_THICK,//边框是粗的
                    'style' => \PHPExcel_Style_Border::BORDER_THIN,//细边框
                    'color' => array('argb' => '000000'),
                    ),
                ),
            );
        $activeSheet = $objExcel->getActiveSheet();
        $activeSheet->getStyle('A2:JL3')->applyFromArray($styleArray);

        $BaseCurrency = ['japan'=>'JPY','germany'=>'EUR','britain'=>'GBP','italy'=>'EUR','france'=>'EUR','spain'=>'EUR','usa'=>'USD','mexico'=>'MXN','canada'=>'CAD'];
        $currency = $BaseCurrency[$country];
        $countryPrice = $country."_price";
        //填充表格信息
//dump($xlsData);die;
        foreach($xlsData as $k=>$v){
            $k +=4;
            //$objActSheet->setCellValue('A'.$k,$record['template']);
            $objActSheet->setCellValue('A'.$k,'home');
            if(!empty($v['SKU'])){
                $objActSheet->setCellValue('B'.$k, $v['SKU']);
            }else{
                $objActSheet->setCellValue('B'.$k, $v['goodsSku']);
            }
            $objActSheet->setCellValue('C'.$k, $v['goodsBrandName']);
            if(!empty($v['SKU'])) {
            $objActSheet->setCellValue('D'.$k, $v['upc']);
            }
                $objActSheet->setCellValue('E' . $k, 'EAN');

            $objActSheet->setCellValue('F'.$k, $v['TITLE']);
            $objActSheet->setCellValue('G'.$k, $v['goodsTradeNames']);
            $objActSheet->setCellValue('H'.$k, $v['goodsId']);
            $objActSheet->setCellValue('I'.$k, $record['node_id']);
            $objActSheet->setCellValue('AB'.$k, round($v[$countryPrice],2));
            if(!empty($v['stock'])) {
                $objActSheet->setCellValue('AC' . $k, $v['stock']);
            }else{
                $objActSheet->setCellValue('AC'.$k, $v['goodsInventory']);
            }
            //图片
            $objActSheet->setCellValue('AD'.$k,substr($v['goodsImages'],0,strpos($v['goodsImages'], ',')));
            $img = explode(",", $v['goodsImages']);
            if(isset($img[0])){$objActSheet->setCellValue('AE'.$k, $img[0]);}
            if(isset($img[1])){$objActSheet->setCellValue('AF'.$k, $img[1]);}
            if(isset($img[2])){$objActSheet->setCellValue('AG'.$k, $img[2]);}
            if(isset($img[3])){$objActSheet->setCellValue('AH'.$k, $img[3]);}
            if(isset($img[4])){$objActSheet->setCellValue('AI'.$k, $img[4]);}
            if(isset($img[5])){$objActSheet->setCellValue('AJ'.$k, $img[5]);}
            if(isset($img[6])){$objActSheet->setCellValue('AK'.$k, $img[6]);}
            if(isset($img[7])){$objActSheet->setCellValue('AL'.$k, $img[7]);}
            $objActSheet->setCellValue('AM'.$k,substr($v['goodsImages'],0,strpos($v['goodsImages'], ',')));
            if(!empty($v['SKU'])){
                $objActSheet->setCellValue('AN'.$k, 'Child');
                $objActSheet->setCellValue('AO'.$k, $v['goodsSku']);
                $objActSheet->setCellValue('AP'.$k, 'Variation');
            }else{
                $objActSheet->setCellValue('AN'.$k, 'Parent');
            }
            if(!empty($v['size']) && !empty($v['color'])) {
                $objActSheet->setCellValue('AQ'.$k, 'Size-Color');
            }else if(!empty($v['size'])){
                $objActSheet->setCellValue('AQ'.$k, 'Size');
            }else if(!empty($v['color'])){
                $objActSheet->setCellValue('AQ'.$k, 'Color');
            }
            $objActSheet->setCellValue('AR'.$k, 'update');
            $objActSheet->setCellValue('AT'.$k, $v['DESCRIPTION']);
            $objActSheet->setCellValue('BO'.$k, $v['MAIN_POINTS_1']);
            $objActSheet->setCellValue('BP'.$k, $v['MAIN_POINTS_2']);
            $objActSheet->setCellValue('BQ'.$k, $v['MAIN_POINTS_3']);
            $objActSheet->setCellValue('BR'.$k, $v['MAIN_POINTS_4']);
            $objActSheet->setCellValue('BS'.$k, $v['MAIN_POINTS_5']);
            $objActSheet->setCellValue('JG'.$k, 'New');
            $objActSheet->setCellValue('JI'.$k, '2');

            // 表格高度
            $objActSheet->getRowDimension($k)->setRowHeight(20);
        }
        $width = array(10,15,20,25,30);
        //设置表格的宽度
        $objActSheet->getColumnDimension('A')->setWidth($width[1]);
        $objActSheet->getColumnDimension('B')->setWidth($width[1]);
        $objActSheet->getColumnDimension('C')->setWidth($width[1]);
        $objActSheet->getColumnDimension('D')->setWidth($width[1]);
        $objActSheet->getColumnDimension('E')->setWidth($width[1]);
        $objActSheet->getColumnDimension('F')->setWidth($width[1]);
        $objActSheet->getColumnDimension('G')->setWidth($width[1]);
        $objActSheet->getColumnDimension('H')->setWidth($width[1]);
        $objActSheet->getColumnDimension('I')->setWidth($width[1]);
        $outfile = $recordId.".xlsx";
        ob_end_clean();
        header("Pragma: public");
        header("Expires: 0");
        header("Cache-Control:must-revalidate, post-check=0, pre-check=0");
        header("Content-Type:application/force-download");
        header("Content-Type:application/vnd.ms-execl");
        header("Content-Type:application/octet-stream");
        header("Content-Type:application/download");
        header('Content-Disposition:attachment;filename="'.$outfile.'.xlsx"');
        header("Content-Transfer-Encoding:binary");

        $objWriter->save('php://output');

        echo $objActSheet;die;
    }



}