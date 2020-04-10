<?php

// +----------------------------------------------------------------------


namespace app\admin\controller;





use think\Db;
use app\admin\model\Goods as GoodsModel;
use app\admin\model\Xml as XmlModel;
use app\admin\model\Submit as SubmitModel;

class Product extends Base


{

    /**
     * 产品列表
     */
    public function product_list()


    {

        
        $nid=input('nid','');


        $sku=input('sku','');


        $goodsTitle=input('goodsTitle','');


        $goodsStaus=input('goodsStaus','');


        $class1=input('class1','');


        $class2=input('class2','');


        $class3=input('class3','');


        $key=input('key');


        //查询：时间格式过滤 获取格式 2015-11-12 - 2015-11-18


        $sldate=input('reservation','');


        $arr = explode(" - ",$sldate);


        $map = array();


        if(count($arr)==2){


            $arrdateone=strtotime($arr[0]);


            $arrdatetwo=strtotime($arr[1].' 23:55:55');


            $map['add_time'] = array(array('egt',$arrdateone),array('elt',$arrdatetwo),'AND');


        }





        if(!empty($key)){

            $map['goodsTitle']= array('like',"%".$key."%");

        }

        if ($nid!=''){

            $map['goodsId']= array('eq',$nid);

        }

        if ($sku!=''){

            //$map['goodsSku']= array('eq',$sku);

            $map['goodsSku']= array('like',"%".$sku."%");

        }

        if ($goodsTitle!=''){

            $map['goodsTitle']= array('eq',$goodsTitle);

        }

        if ($goodsStaus!=''){

            $map['goodsStaus']= array('eq',$goodsStaus);

        }

        if ($class1!=''){

            $map['class1']= array('eq',$class1);

        }

        if ($class2!=''){

            $map['class2']= array('eq',$class2);

        }

        if ($class3!=''){

            $map['class3']= array('eq',$class3);

        }

        //当前账号父级id
        $product=Db::name('goods')->alias('a')
            ->join(config('database.prefix').'admin b','a.uid=b.admin_id')
            ->join(config('database.prefix').'goods_language c','a.goodsId=c.goods_id')
            ->where('c.language = 1')
            ->where($map)
            ->where('product_back = 0 and uid='.session('admin_auth.aid'))
            ->order('goodsId desc')
            ->paginate(18,false,['query'=>get_query()]);

        $show = $product->render();

        $show=preg_replace("(<a[^>]*page[=|/](\d+).+?>(.+?)<\/a>)","<a href='javascript:ajax_page($1);'>$2</a>",$show);

        $this->assign('page',$show);

        //栏目数据

        $menu_text=menu_text($this->lang);


        $this->assign('menu',$menu_text);

        $this->assign('product',$product);

        $list_fenlei =$this->db2->table('ProductCategories')->order('px desc')->select();

        $list_fenlei = $this->tree($list_fenlei,0,"",0);


        $this->assign('list_fenlei',$list_fenlei);


        if(request()->isAjax()){


            return $this->fetch('ajax_product_list');


        }else{


            return $this->fetch();


        }


    }


    /**


     * 添加显示


     */


    public function product_add()


    {


        header("Content-type: text/html; charset=utf-8");


        //当前登陆账号id


        $uid = session('admin_auth.aid');


        //厂商名称和品牌


        $admin_list=Db::name('admin')->where('admin_id = '.$uid)->field('admin_id,en_name,en_brand')->select();


        $this->assign('admin_list',$admin_list);


        $admin_username = session('admin_auth.admin_username');


        //随机数sku,后期加厂商名称-品牌名称-随机数sku 完整的SKU模板


        $rand = time();


        $sku =$admin_list[0]['en_brand'].'-'.$admin_list[0]['admin_id'].$rand;


        $this->assign('sku',$sku);





        //库存数量随机数


        $kucun = rand(10,200);


        $this->assign('kucun',$kucun);





        $news_columnid="";


        $menu_text=menu_text($this->lang);


        $this->assign('menu',$menu_text);


        $diyflag=Db::name('diyflag')->select();


        $source=Db::name('source')->select();


        $this->assign('news_columnid',$news_columnid);


        $this->assign('source',$source);


        $this->assign('diyflag',$diyflag);





        $list_fenlei =$this->db2->table('ProductCategories')->order('px desc')->select();


        $list_fenlei = $this->tree($list_fenlei,0,"",0);


        $this->assign('list_fenlei',$list_fenlei);


        return $this->fetch();


    }





    /**


     * 价格计算


     */


    public function product_price()


    {


        // dump($_POST);die;


        $goodsBuyingPrice = $_POST['goodsBuyingPrice'];//采购价


        $goodsWeight = $_POST['goodsWeight'];//毛重


        $goodsSizec = $_POST['goodsSizec'];//长


        $goodsSizek = $_POST['goodsSizek'];//宽


        $goodsSizeg = $_POST['goodsSizeg'];//高


        //检测提交数据是否合法


        if(is_numeric($goodsBuyingPrice) && is_numeric($goodsWeight) && is_numeric($goodsSizec) && is_numeric($goodsSizek) && is_numeric($goodsSizeg)) {


            //判断该物品是按实重还是走计抛重


            if ($goodsSizec > 60 || $goodsSizek > 35 || $goodsSizeg > 40) {


                //$goodsWeight = ($goodsSizec*$goodsSizek*$goodsSizeg)/8000;//毛重


                $yunfei = (45*$goodsWeight)+110;


                //计算运费


                //设置这个国家基准价和加价


                $usjz = 75;


                $usjj = 8;//美国


                $cajz = 80;


                $cajj = 8;//加拿大


                $mxjz = 100;


                $mxjj = 8;//墨西哥





                $goodslist['Freight']['us_Freight'] = $usjj + ($goodsWeight * $usjz); //美国


                $goodslist['Freight']['ca_Freight'] = $cajj + ($goodsWeight * $cajz); //加拿大


                $goodslist['Freight']['mx_Freight'] = $mxjj + ($goodsWeight * $mxjz); //墨西哥


                $goodslist['Freight']['uk_Freight'] = $yunfei; //英国


                $goodslist['Freight']['fr_Freight'] = $yunfei; //法国


                $goodslist['Freight']['de_Freight'] = $yunfei; //德国


                $goodslist['Freight']['it_Freight'] = $yunfei; //意大利


                $goodslist['Freight']['es_Freight'] = $yunfei; //西班牙


                $goodslist['Freight']['jp_Freight'] = $yunfei; //日本


                $goodslist['Freight']['au_Freight'] = $yunfei; //澳大利亚





            }else{


                //设置这个国家基准价和加价


                $usjz = 75;


                $usjj = 8;//美国


                $cajz = 80;


                $cajj = 8;//加拿大


                $mxjz = 100;


                $mxjj = 8;//墨西哥


                $ukjz = 45;


                $ukjj = 18;//英国


                $frjz = 52;


                $frjj = 25;//法国


                $dejz = 55;


                $dejj = 20;//德国


                $itjz = 60;


                $itjj = 25;//意大利


                $esjz = 60;


                $esjj = 16;//西班牙


                $jpjz = 45;


                $jpjj = 35;//日本


                $aujz = 80;


                $aujj = 8;//澳大利亚


                //计算运费


                $goodslist['Freight']['us_Freight'] = $usjj + ($goodsWeight * $usjz); //美国


                $goodslist['Freight']['ca_Freight'] = $cajj + ($goodsWeight * $cajz); //加拿大


                $goodslist['Freight']['mx_Freight'] = $mxjj + ($goodsWeight * $mxjz); //墨西哥


                $goodslist['Freight']['uk_Freight'] = $ukjj + ($goodsWeight * $ukjz); //英国


                $goodslist['Freight']['fr_Freight'] = $frjj + ($goodsWeight * $frjz); //法国


                $goodslist['Freight']['de_Freight'] = $dejj + ($goodsWeight * $dejz); //德国


                $goodslist['Freight']['it_Freight'] = $itjj + ($goodsWeight * $itjz); //意大利


                $goodslist['Freight']['es_Freight'] = $esjj + ($goodsWeight * $esjz); //西班牙


                $goodslist['Freight']['jp_Freight'] = $jpjj + ($goodsWeight * $jpjz); //日本


                $goodslist['Freight']['au_Freight'] = $aujj + ($goodsWeight * $aujz); //澳大利亚


            }





            //计算售价(人名币)


            $goodslist['Price']['us_Price'] = ($goodslist['Freight']['us_Freight'] + $goodsBuyingPrice)*2.5; //美国


            $goodslist['Price']['ca_Price'] = ($goodslist['Freight']['ca_Freight'] + $goodsBuyingPrice)*2.5 ; //加拿大


            $goodslist['Price']['mx_Price'] = ($goodslist['Freight']['mx_Freight'] + $goodsBuyingPrice)*2.5; //墨西哥


            $goodslist['Price']['uk_Price'] = ($goodslist['Freight']['uk_Freight'] + $goodsBuyingPrice)*2.5; //英国


            $goodslist['Price']['fr_Price'] = ($goodslist['Freight']['fr_Freight'] + $goodsBuyingPrice)*2.5;//法国


            $goodslist['Price']['de_Price'] = ($goodslist['Freight']['de_Freight'] + $goodsBuyingPrice)*2.5; //德国


            $goodslist['Price']['it_Price'] = ($goodslist['Freight']['it_Freight'] + $goodsBuyingPrice)*2.5; //意大利


            $goodslist['Price']['es_Price'] = ($goodslist['Freight']['es_Freight'] + $goodsBuyingPrice)*2.5;//西班牙


            $goodslist['Price']['jp_Price'] = ($goodslist['Freight']['jp_Freight'] + $goodsBuyingPrice)*2.5; //日本


            $goodslist['Price']['au_Price'] = ($goodslist['Freight']['au_Freight'] + $goodsBuyingPrice)*2.5; //澳大利亚


            //计算售价(外币)

            //汇率计算
            $huilv=Db::name('currency')->select();
            $goodslist['Foreign']['us_Price'] =  round(($goodslist['Price']['us_Price']/$huilv[3]['exchange_rate']),2); //美国


            $goodslist['Foreign']['ca_Price'] = round(($goodslist['Price']['ca_Price']/$huilv[4]['exchange_rate']),2); //加拿大


            $goodslist['Foreign']['mx_Price'] = round(($goodslist['Price']['mx_Price']/$huilv[7]['exchange_rate']),2); //墨西哥


            $goodslist['Foreign']['uk_Price'] = round(($goodslist['Price']['uk_Price']/$huilv[0]['exchange_rate']),2); //英国


            $goodslist['Foreign']['fr_Price'] = round(($goodslist['Price']['fr_Price']/$huilv[1]['exchange_rate']),2);//法国


            $goodslist['Foreign']['de_Price'] = round(($goodslist['Price']['de_Price']/$huilv[1]['exchange_rate']),2); //德国


            $goodslist['Foreign']['it_Price'] = round(($goodslist['Price']['it_Price']/$huilv[1]['exchange_rate']),2); //意大利


            $goodslist['Foreign']['es_Price'] = round(($goodslist['Price']['es_Price']/$huilv[1]['exchange_rate']),2);//西班牙


            $goodslist['Foreign']['jp_Price'] = round(($goodslist['Price']['jp_Price']/$huilv[2]['exchange_rate']),2); //日本


            $goodslist['Foreign']['au_Price'] = round(($goodslist['Price']['au_Price']/$huilv[6]['exchange_rate']),2);//澳大利亚


            //计算利润金额


            $goodslist['Profit']['us_Price'] = round($goodslist['Price']['us_Price'] - $goodslist['Freight']['us_Freight'] - $goodsBuyingPrice -(($goodslist['Foreign']['us_Price']*0.15)*$huilv[3]['exchange_rate']),2); //美国


            $goodslist['Profit']['ca_Price'] = round($goodslist['Price']['ca_Price'] - $goodslist['Freight']['ca_Freight'] - $goodsBuyingPrice-(($goodslist['Foreign']['ca_Price']*0.15)*$huilv[4]['exchange_rate']),2);//加拿大


            $goodslist['Profit']['mx_Price'] = round($goodslist['Price']['mx_Price'] - $goodslist['Freight']['mx_Freight'] - $goodsBuyingPrice-(($goodslist['Foreign']['mx_Price']*0.15)*$huilv[7]['exchange_rate']),2); //墨西哥


            $goodslist['Profit']['uk_Price'] = round($goodslist['Price']['uk_Price'] - $goodslist['Freight']['uk_Freight'] - $goodsBuyingPrice-(($goodslist['Foreign']['uk_Price']*0.15)*$huilv[0]['exchange_rate']),2); //英国


            $goodslist['Profit']['fr_Price'] = round($goodslist['Price']['fr_Price'] - $goodslist['Freight']['fr_Freight'] - $goodsBuyingPrice-(($goodslist['Foreign']['fr_Price']*0.15)*$huilv[1]['exchange_rate']),2);//法国


            $goodslist['Profit']['de_Price'] = round($goodslist['Price']['de_Price'] - $goodslist['Freight']['de_Freight'] - $goodsBuyingPrice-(($goodslist['Foreign']['de_Price']*0.15)*$huilv[1]['exchange_rate']),2); //德国


            $goodslist['Profit']['it_Price'] = round($goodslist['Price']['it_Price'] - $goodslist['Freight']['it_Freight'] - $goodsBuyingPrice-(($goodslist['Foreign']['it_Price']*0.15)*$huilv[1]['exchange_rate']),2); //意大利


            $goodslist['Profit']['es_Price'] = round($goodslist['Price']['es_Price'] - $goodslist['Freight']['es_Freight'] - $goodsBuyingPrice-(($goodslist['Foreign']['es_Price']*0.15)*$huilv[1]['exchange_rate']),2);//西班牙


            $goodslist['Profit']['jp_Price'] = round($goodslist['Price']['jp_Price'] - $goodslist['Freight']['jp_Freight'] - $goodsBuyingPrice-(($goodslist['Foreign']['jp_Price']*0.15)*$huilv[2]['exchange_rate']),2); //日本


            $goodslist['Profit']['au_Price'] = round($goodslist['Price']['au_Price'] - $goodslist['Freight']['au_Freight'] - $goodsBuyingPrice-(($goodslist['Foreign']['au_Price']*0.15)*$huilv[6]['exchange_rate']),2); //澳大利亚





            $goodslist['Profit']['us_Price'] = $goodslist['Profit']['us_Price'] . "(".round(($goodslist['Profit']['us_Price']/$goodslist['Price']['us_Price'])*100).'%'.")"; //美国


            $goodslist['Profit']['ca_Price'] = $goodslist['Profit']['ca_Price'] . "(".round(($goodslist['Profit']['ca_Price']/$goodslist['Price']['ca_Price'])*100).'%'.")";//加拿大


            $goodslist['Profit']['mx_Price'] = $goodslist['Profit']['mx_Price'] . "(".round(($goodslist['Profit']['mx_Price']/$goodslist['Price']['mx_Price'])*100).'%'.")"; //墨西哥


            $goodslist['Profit']['uk_Price'] = $goodslist['Profit']['uk_Price'] . "(".round(($goodslist['Profit']['uk_Price']/$goodslist['Price']['uk_Price'])*100).'%'.")"; //英国


            $goodslist['Profit']['fr_Price'] = $goodslist['Profit']['fr_Price'] . "(".round(($goodslist['Profit']['fr_Price']/$goodslist['Price']['fr_Price'])*100).'%'.")";//法国


            $goodslist['Profit']['de_Price'] = $goodslist['Profit']['de_Price'] . "(".round(($goodslist['Profit']['de_Price']/$goodslist['Price']['de_Price'])*100).'%'.")"; //德国


            $goodslist['Profit']['it_Price'] = $goodslist['Profit']['it_Price'] . "(".round(($goodslist['Profit']['it_Price']/$goodslist['Price']['it_Price'])*100).'%'.")"; //意大利


            $goodslist['Profit']['es_Price'] = $goodslist['Profit']['es_Price'] . "(".round(($goodslist['Profit']['es_Price']/$goodslist['Price']['es_Price'])*100).'%'.")";//西班牙


            $goodslist['Profit']['jp_Price'] = $goodslist['Profit']['jp_Price'] . "(".round(($goodslist['Profit']['jp_Price']/$goodslist['Price']['jp_Price'])*100).'%'.")"; //日本


            $goodslist['Profit']['au_Price'] = $goodslist['Profit']['au_Price'] . "(".round(($goodslist['Profit']['au_Price']/$goodslist['Price']['au_Price'])*100).'%'.")"; //澳大利亚





            return json($goodslist );


        }else{


            echo "数据输入有误!";


        }





    }


    /**


     * 添加操作


     */


    public function product_runadd()
    {

        header("Content-type: text/html; charset=utf-8");

//dump($_POST);
     /*   if (!request()->isAjax()){

            $this->error('提交方式不正确',url('admin/Product/product_list'));

        }*/
        //当前登陆账号id
        $uid = session('admin_auth.aid');
        $fj_id = session('admin_auth.fj_id');

        //产品尺寸

        $goodsSize['goodsSizec'] = input('goodsSizec','');
        $goodsSize['goodsSizek'] = input('goodsSizek','');
        $goodsSize['goodsSizeg'] = input('goodsSizeg','');
        $goodsSize =json_encode($goodsSize,true);
       // dump($_POST);die;
        $sl_data=array(
            'goodsTitle'=>input('goodsTitle'),
            'goodsUrl'=>input('goodsUrl'),
            'caijiUrl'=>input('caijiUrl'),
            'bezhu'=>input('bezhu'),
			'manufacturernumber'=>input('manufacturernumber'),
            'material'=>input('material'),
            'class1'=>input('class1'),

            'class2'=>input('class2'),

            'class3'=>input('class3'),
            'goodsEnglishabbreviation'=>input('goodsEnglishabbreviation',''),

            'goodsTradeNames'=>input('goodsTradeNames',''),
            'goodsBrandName'=>input('goodsBrandName',''),
            'goodsSku'=>input('goodsSku',''),
            'goodsSize'=>$goodsSize,

            'goodsStaus'=>input('goodsStaus',''),

            'goodsBuyingPrice'=>input('goodsBuyingPrice',''),

            'goodsFreight'=>input('goodsFreight',''),
            'goodsInventory'=>input('goodsInventory',''),

            'goodsWeight'=>input('goodsWeight',''),
            'britain_price'=>input('goodsPrice_yg',''),

            'usa_price'=>input('goodsPrice_en',''),
            'canada_price'=>input('goodsPrice_jnd',''),
            'mexico_price'=>input('goodsPrice_mxg',''),
            'france_price'=>input('goodsPrice_fg',''),

            'germany_price'=>input('goodsPrice_dg',''),

            'italy_price'=>input('goodsPrice_ydl',''),
            'spain_price'=>input('goodsPrice_xby',''),
            'japan_price'=>input('goodsPrice_rb',''),
            'australia_price'=>input('goodsPrice_adly',''),

            'childType'=>input('childType'),
            'goodsImages'=>input('goodsImages',''),//多图路径

            'uid'=>$uid,
            'fj_uid'=>$fj_id,
            'add_time'=>time(),

            'goodsSize'=>$goodsSize,

        );

        //变体
        //父类EAN码
        $ean_list=Db::name('ean')->order('id','asc')->limit(1)->find();

        Db::name('ean')->where('id','=',$ean_list['id'])->delete();

        // 删除父类ean编码
        $sl_data['upc'] = $ean_list['bianma'];

        // $res = GoodsModel::create($sl_data);
        $goodsId = Db::name('goods')->insertGetId($sl_data);

        if(isset($_POST['sku'])){

            $currency = Db::name('currency')->order('id','asc')->select();

            $count = count($_POST['variant_combination']);
            $ean_list=Db::name('ean')->limit($count)->select();

            // dump($_POST['variant_combination']);die;


            $ean_count = 0;

            foreach ($_POST['variant_combination'] as $key => $value) {

                if($_POST['childType']==3){
                    $variantArray= explode("-",$value);

                    $variantData['color'] = $variantArray[0];


                    $variantData['size'] = $variantArray[1];

                }elseif ($_POST['childType']==1) {
                    $variantData['color'] = $value;


                }elseif ($_POST['childType']==2) {

                    $variantData['size'] = $value;


                }

                $variantData['type'] =  $_POST['childType'];
                $variantData['goods_id'] =  $goodsId;

                $variantData['SKU'] =  $_POST['sku'][$key];
                $variantData['stock'] =  $_POST['stock'][$key];
                $variantData['imgs'] =  $_POST['imgs'][$key];

                $variantData['markup'] =  $_POST['markup'][$key];
                $variantData['usa_price'] = $_POST['goodsPrice_en'] + $_POST['markup'][$key]/$currency[3]['exchange_rate'];
                $variantData['canada_price'] = $_POST['goodsPrice_jnd'] + $_POST['markup'][$key]/$currency[4]['exchange_rate'];

                $variantData['mexico_price'] = $_POST['goodsPrice_mxg'] + $_POST['markup'][$key]/$currency[7]['exchange_rate'];

                $variantData['britain_price'] = $_POST['goodsPrice_yg'] + $_POST['markup'][$key]/$currency[0]['exchange_rate'];

                $variantData['france_price'] = $_POST['goodsPrice_fg'] + $_POST['markup'][$key]/$currency[1]['exchange_rate'];
                $variantData['germany_price'] = $_POST['goodsPrice_dg'] + $_POST['markup'][$key]/$currency[1]['exchange_rate'];

                $variantData['italy_price'] = $_POST['goodsPrice_ydl'] + $_POST['markup'][$key]/$currency[1]['exchange_rate'];
                $variantData['spain_price'] = $_POST['goodsPrice_xby'] + $_POST['markup'][$key]/$currency[1]['exchange_rate'];
                $variantData['japan_price'] = $_POST['goodsPrice_rb'] + $_POST['markup'][$key]/$currency[2]['exchange_rate'];

                $variantData['australia_price'] = $_POST['goodsPrice_adly'] + $_POST['markup'][$key]/$currency[6]['exchange_rate'];

                $variantData['UPC'] =  $ean_list[$ean_count]['bianma'];

                // dump($variantData);die;

                Db::name('goods_variant')->insert($variantData);
                $ean_count++;

            }
            //删除已经写入的ean码
            $eanKey = $count-1;
            $lastEan =  $ean_list[$eanKey]['id'];

            Db::name('ean')->where('id','<=',$lastEan)->delete();

        }

        //英语
        $languageData['1']['TITLE'] = input('title_en','');

        // $languageData['1']['DESCRIPTION'] = input('description_en','');

        $desAry = explode("\n", $_POST['description_en']);
        $str = "";
        foreach($desAry as $k=>$v){
            $str .= $v."<br/>";
        }
        $languageData['1']['DESCRIPTION'] =  rtrim($str,'<br/>');


        $keypotins_en=explode("\n",$_POST['keypotins_en']);
        $languageData['1']['MAIN_POINTS_1'] = isset($keypotins_en[0])?$keypotins_en[0]:'';
        $languageData['1']['MAIN_POINTS_2'] = isset($keypotins_en[1])?$keypotins_en[1]:'';
        $languageData['1']['MAIN_POINTS_3'] = isset($keypotins_en[2])?$keypotins_en[2]:'';
        $languageData['1']['MAIN_POINTS_4'] = isset($keypotins_en[3])?$keypotins_en[3]:'';
        $languageData['1']['MAIN_POINTS_5'] = isset($keypotins_en[4])?$keypotins_en[4]:'';
        $languageData['1']['key_words'] = input('keyword_en','');

        $languageData['1']['language'] = 1;
        $languageData['1']['goods_id'] = $goodsId;

        //中文
        $languageData['7']['TITLE'] = input('title_zh','');
        // $languageData['7']['DESCRIPTION'] = input('description_zh','');
        $desAry = explode("\n", $_POST['description_zh']);
        $str = "";
        foreach($desAry as $k=>$v){
            $str .= $v."<br/>";
        }
        $languageData['7']['DESCRIPTION'] =  rtrim($str,'<br/>');
        $keypotins_zh=explode("\n",$_POST['keypotins_zh']);
        $languageData['7']['MAIN_POINTS_1'] = isset($keypotins_zh[0])?$keypotins_zh[0]:'';
        $languageData['7']['MAIN_POINTS_2'] = isset($keypotins_zh[1])?$keypotins_zh[1]:'';
        $languageData['7']['MAIN_POINTS_3'] = isset($keypotins_zh[2])?$keypotins_zh[2]:'';
        $languageData['7']['MAIN_POINTS_4'] = isset($keypotins_zh[3])?$keypotins_zh[3]:'';
        $languageData['7']['MAIN_POINTS_5'] = isset($keypotins_zh[4])?$keypotins_zh[4]:'';
        $languageData['7']['key_words'] = input('keyword_zh','');
        $languageData['7']['language'] = 7;
        $languageData['7']['goods_id'] = $goodsId;
        //法语
        $languageData['2']['TITLE'] = input('title_fra','');
        // $languageData['2']['DESCRIPTION'] = input('description_fra','');
        $desAry = explode("\n", $_POST['description_fra']);
        $str = "";
        foreach($desAry as $k=>$v){
            $str .= $v."<br/>";
        }
        $languageData['2']['DESCRIPTION'] =  rtrim($str,'<br/>');
        $keypotins_fra=explode("\n",$_POST['keypotins_fra']);
        $languageData['2']['MAIN_POINTS_1'] = isset($keypotins_fra[0])?$keypotins_fra[0]:'';
        $languageData['2']['MAIN_POINTS_2'] = isset($keypotins_fra[1])?$keypotins_fra[1]:'';
        $languageData['2']['MAIN_POINTS_3'] = isset($keypotins_fra[2])?$keypotins_fra[2]:'';
        $languageData['2']['MAIN_POINTS_4'] = isset($keypotins_fra[3])?$keypotins_fra[3]:'';
        $languageData['2']['MAIN_POINTS_5'] = isset($keypotins_fra[4])?$keypotins_fra[4]:'';
        $languageData['2']['key_words'] = input('keyword_fra','');
        $languageData['2']['language'] = 2;
        $languageData['2']['goods_id'] =$goodsId;


        //德语

        $languageData['3']['TITLE'] = input('title_de','');
        // $languageData['3']['DESCRIPTION'] = input('description_de','');
        $desAry = explode("\n", $_POST['description_de']);
        $str = "";
        foreach($desAry as $k=>$v){
            $str .= $v."<br/>";
        }
        $languageData['3']['DESCRIPTION'] =  rtrim($str,'<br/>');
        $keypotins_de=explode("\n",$_POST['keypotins_de']);
        $languageData['3']['MAIN_POINTS_1'] = isset($keypotins_de[0])?$keypotins_de[0]:'';
        $languageData['3']['MAIN_POINTS_2'] = isset($keypotins_de[1])?$keypotins_de[1]:'';
        $languageData['3']['MAIN_POINTS_3'] = isset($keypotins_de[2])?$keypotins_de[2]:'';
        $languageData['3']['MAIN_POINTS_4'] = isset($keypotins_de[3])?$keypotins_de[3]:'';
        $languageData['3']['MAIN_POINTS_5'] = isset($keypotins_de[4])?$keypotins_de[4]:'';
        $languageData['3']['key_words'] = input('keyword_de','');
        $languageData['3']['language'] = 3;
        $languageData['3']['goods_id'] = $goodsId;

        //意大利语

        $languageData['5']['TITLE'] = input('title_it','');
        // $languageData['5']['DESCRIPTION'] = input('description_it','');
        $desAry = explode("\n", $_POST['description_it']);
        $str = "";
        foreach($desAry as $k=>$v){
            $str .= $v."<br/>";
        }
        $languageData['5']['DESCRIPTION'] =  rtrim($str,'<br/>');
        $keypotins_it=explode("\n",$_POST['keypotins_it']);
        $languageData['5']['MAIN_POINTS_1'] = isset($keypotins_it[0])?$keypotins_it[0]:'';
        $languageData['5']['MAIN_POINTS_2'] = isset($keypotins_it[1])?$keypotins_it[1]:'';
        $languageData['5']['MAIN_POINTS_3'] = isset($keypotins_it[2])?$keypotins_it[2]:'';
        $languageData['5']['MAIN_POINTS_4'] = isset($keypotins_it[3])?$keypotins_it[3]:'';
        $languageData['5']['MAIN_POINTS_5'] = isset($keypotins_it[4])?$keypotins_it[4]:'';
        $languageData['5']['key_words'] = input('keyword_it','');
        $languageData['5']['language'] = 5;
        $languageData['5']['goods_id'] = $goodsId;
        //西班牙语
        $languageData['4']['TITLE'] = input('title_es','');
        // $languageData['4']['DESCRIPTION'] = input('description_es','');
        $desAry = explode("\n", $_POST['description_es']);
        $str = "";
        foreach($desAry as $k=>$v){
            $str .= $v."<br/>";
        }
        $languageData['4']['DESCRIPTION'] =  rtrim($str,'<br/>');
        $keypotins_es=explode("\n",$_POST['keypotins_es']);
        $languageData['4']['MAIN_POINTS_1'] = isset($keypotins_es[0])?$keypotins_es[0]:'';
        $languageData['4']['MAIN_POINTS_2'] = isset($keypotins_es[1])?$keypotins_es[1]:'';
        $languageData['4']['MAIN_POINTS_3'] = isset($keypotins_es[2])?$keypotins_es[2]:'';
        $languageData['4']['MAIN_POINTS_4'] = isset($keypotins_es[3])?$keypotins_es[3]:'';
        $languageData['4']['MAIN_POINTS_5'] = isset($keypotins_es[4])?$keypotins_es[4]:'';
        $languageData['4']['key_words'] = input('keyword_es','');
        $languageData['4']['language'] = 4;
        $languageData['4']['goods_id'] = $goodsId;

        // 日语
        $languageData['6']['TITLE'] = input('title_jp','');
        // $languageData['6']['DESCRIPTION'] = input('description_jp','');
        $desAry = explode("\n", $_POST['description_jp']);
        $str = "";
        foreach($desAry as $k=>$v){
            $str .= $v."<br/>";
        }
        $languageData['6']['DESCRIPTION'] =  rtrim($str,'<br/>');
        $keypotins_jp=explode("\n",$_POST['keypotins_jp']);
        $languageData['6']['MAIN_POINTS_1'] = isset($keypotins_jp[0])?$keypotins_jp[0]:'';
        $languageData['6']['MAIN_POINTS_2'] = isset($keypotins_jp[1])?$keypotins_jp[1]:'';
        $languageData['6']['MAIN_POINTS_3'] = isset($keypotins_jp[2])?$keypotins_jp[2]:'';
        $languageData['6']['MAIN_POINTS_4'] = isset($keypotins_jp[3])?$keypotins_jp[3]:'';
        $languageData['6']['MAIN_POINTS_5'] = isset($keypotins_jp[4])?$keypotins_jp[4]:'';
        $languageData['6']['key_words'] = input('keyword_jp','');
        $languageData['6']['language'] = 6;
        $languageData['6']['goods_id'] = $goodsId;
        foreach ($languageData as $key => $value) {

            $res = Db::name('goods_language')->insert($value);

        }

        $continue=input('continue',0,'intval');

        $goodsd=Db::name('goods')->where('uid ='.$uid)->order('goodsId desc')->field('goodsId')->find();
        if($continue){

            $this->success('产品添加成功,继续发布',url('admin/Product/product_add'));

        }else{
            $this->success('产品添加成功',url('admin/Product/product_edit',array('goodsId'=>$goodsd['goodsId'])));



        }

    }



    /**


     * 编辑显示

     */

    public function product_edit()

    {
        header("Content-type: text/html; charset=utf-8");
        //当前登陆账号id
        $uid = session('admin_auth.aid');
        $fj_id = session('admin_auth.fj_id');
        $n_id = input('goodsId');
        $this->assign('n_id', $n_id);
        if (empty($n_id)){
            $this->error('参数错误',url('admin/Product/product_list'));
        }
        //厂商名称和品牌
        $admin_list=Db::name('admin')->where('admin_id = '.$uid)->field('admin_id,en_name,en_brand')->select();
        $this->assign('admin_list',$admin_list);
        $admin_username = session('admin_auth.admin_username');
        //随机数sku,后期加厂商名称-品牌名称-随机数sku 完整的SKU模板
        /*$rand = rand(10000,99999);
        $sku =$admin_list[0]['en_name'].'-'.$admin_list[0]['en_brand'].'-'.$rand.$admin_list[0]['admin_id'];
        $this->assign('sku',$sku);*/
        //查询变体

        $variant = Db::name('goods_variant')->where('goods_id',$n_id)->select();

        foreach ($variant as $k => $v) {
            // dump($v);die;

            if($v['imgs']){
                $imgs = rtrim($v['imgs'],',');

                $variant[$k]['imgarray'] = explode(",", $imgs);


            }

        }



        $goods_list=GoodsModel::get($n_id);

        $list_fenlei =$this->db2->table('ProductCategories')->order('px desc')->select();

        $list_fenlei = $this->tree($list_fenlei,0,"",0);
        $this->assign('list_fenlei',$list_fenlei);

        /***********新增上传开始***************/
        $storeList = Db::name('plug_sug')->where('plug_uid',session('admin_auth.aid'))->order('plug_sug_id asc')->select();
        $list_fenlei =$this->db2->table('ProductCategories')->order('px desc')->select();
        $list_fenlei = $this->tree($list_fenlei,0,"",0);
        $this->assign('list_fenlei',$list_fenlei);
        $this->assign('admin_realname',session('admin_auth.admin_realname'));
        $this->assign('storeList',$storeList);
        /*************新增上传结束*************/
        //产品描述

        $goods_extra=json_decode($goods_list,true);

        if($goods_extra['uid'] == $uid || $goods_extra['fj_uid'] == $uid || $fj_id == 0) {
            $goods_extra['goods_title'] = json_decode($goods_extra['goods_title'], true);

            $goods_extra['goods_keys'] = json_decode($goods_extra['goods_keys'], true);
            $goods_extra['goods_desc'] = json_decode($goods_extra['goods_desc'], true);
            $goods_extra['goods_poti'] = json_decode($goods_extra['goods_poti'], true);
            //产品尺寸
            $goods_extra['goodsSize'] = json_decode($goods_extra['goodsSize'], true);
            //图片信息

            $goods_extra['goods_Images'] = $goods_extra['goodsImages'];
            $goods_extra['goodsImages'] = explode(",", $goods_extra['goodsImages']);



            $language = Db::name('goods_language')->where('goods_id',$n_id)->order('language')->select();

            foreach ($language as $key => $value) {

                $language[$key]['MAIN_POINTS'] = $value['MAIN_POINTS_1']."\n".$value['MAIN_POINTS_2']."\n".$value['MAIN_POINTS_3']."\n".$value['MAIN_POINTS_4']."\n".$value['MAIN_POINTS_5'];
                // $value['DESCRIPTION']
                $language[$key]['DESCRIPTION'] =  str_replace("<br/>","\n",$value['DESCRIPTION']);
                // $language[$key]['DESCRIPTION'] =
            }

            // dump($language);die;

            $this->assign('language', $language);

            $this->assign('goods_extra', $goods_extra);
            $this->assign('variant', $variant);

            //dump($goods_extra);die;

            return $this->fetch();

        }else{
            $this->error('参数错误');
        }




    }


    /**

     *返回产品图片


     **/



    public function productImage(){


        if (!request()->isAjax()){


            $this->error('提交方式不正确',url('admin/Product/product_list'));


        }


        $n_id = input('goodsId');


//        $n_id = 82;


        $goods_list=GoodsModel::get($n_id);


        $goods_extra=json_decode($goods_list,true);


        //dump($goods_list);die;


        if($goods_extra['goodsImages']){


            $res = ['msg'=>"success","data"=>$goods_extra['goodsImages']];


        }else{


            $res = ['msg'=>"error"];


        }


        //dump($goods_list);die;


        return json($res);


    }


    /**


     *产品图片上传


     *


     */


    public function fileupload()


    {


        //当前登陆账号id


        $uid = session('admin_auth.aid');


        $file = $_FILES;


        //上传图片部分


        if(config('storage.storage_open')){


            //七牛





            $upload = \Qiniu::instance();





            $info = $upload->upload();


            //dump($info);die;


            $error = $upload->getError();


            if ($info) {


                if($file){


                    //单图


                    $img_one= config('storage.domain').$info[0]['key'];


                    $img_one1 = $img_one;


                    echo $img_one1;


                }


            }


        }


        exit;


    }


    /**


     *产品谷歌翻译


     *


     */


    public function product_translationguge()


    {

        header("content-type:text/html;charset=utf-8");
        //接收值
        $zhi = $_POST['zhi'];//标题关键词标识
        $language = $_POST['language'];

        if($zhi == 1){ $query = $_POST['title']; }

        if($zhi == 2){ $query = $_POST['keyword']; }

        if($zhi == 3){ $query = $_POST['keypotins']; }

        if($zhi == 4){ $query = $_POST['description']; }

        $url = 'http://49.232.164.248:5000/translate';

        $sl_datas=array(

            'content'=>$query,
            'language'=>$language

        );
        $sl_data = json_encode($sl_datas);

       // echo $sl_data;die;


        $ch = curl_init();


        curl_setopt($ch, CURLOPT_URL, $url);//要访问的地址


        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);//执行结果是否被返回，0是返回，1是不返回


        curl_setopt($ch, CURLOPT_POST, 0);// 发送一个常规的POST请求


        curl_setopt($ch, CURLOPT_POSTFIELDS, $sl_data);


        $result = curl_exec($ch);//执行并获取数据





        curl_close($ch);





        $result1 = json_decode($result,true);


        if(empty($result1)){


            //$result1['lx'] = 0;


        }else{


            $result1['lx'] = $zhi;


        }





        $result = json($result1);


        return $result;








    }


    /**


     *产品百度翻译


     *


     */


    public function product_translation()


    {


        header("content-type:text/html;charset=utf-8");


        define("CURL_TIMEOUT",   10);


        define("URL",            "http://api.fanyi.baidu.com/api/trans/vip/translate");


        define("APP_ID",         "20191017000342168"); //替换为您的APPID


        define("SEC_KEY",        "b29N5UYwr3xMokatw3qY");//替换为您的密钥





        $zhi = $_POST['zhi'];//标题关键词标识


        if($zhi == 1){ $query = $_POST['title']; }


        if($zhi == 2){ $query = $_POST['keyword']; }


        if($zhi == 3){ $query = $_POST['keypotins']; }


        if($zhi == 4){ $query = $_POST['description']; }


        $from = $_POST['yuzhong'];





        // $from='zh';//中文


        $toen='en';//英文


        $tofra='fra';//法文


        $tode='de';//德语


        $toit='it';//意大利语


        $toes='spa';//西班牙语


        $tojp='jp';//日语





        if($from != 'en'){ $resen =   $this->translate($query, $from, $toen);//英文


            sleep(1);


            //usleep(200);


        }


        //var_dump($resen);die;


        $resfra =   $this->translate($query, $from, $tofra);//法文


        sleep(1);


        $resde =   $this->translate($query, $from, $tode);//德语


        sleep(1);


        $resit =   $this->translate($query, $from, $toit);//意大利语


        sleep(1);


        $resxby =   $this->translate($query, $from, $toes);//西班牙语


        sleep(1);


        $resjp =   $this->translate($query, $from, $tojp);//日语





        if($from == 'en'){


            $title['resen'] = $query;


        }else{


            $title['resen'] = $resen['trans_result'][0]['dst'];


        }


        //var_dump($title['resen']);die;


        $title['resfra'] =  $resfra["trans_result"][0]['dst'];


        $title['resit'] = $resit["trans_result"][0]['dst'];


        $title['resde'] = $resde["trans_result"][0]['dst'];


        $title['reses'] = $resxby["trans_result"][0]['dst'];


        $title['resjp'] = $resjp["trans_result"][0]['dst'];


        if($zhi == 1){ $title['lx'] =1;}


        if($zhi == 2){$title['lx'] =2;}


        if($zhi == 3){$title['lx'] =3;}


        if($zhi == 4){$title['lx'] =4;}


        $titles = json($title);


        return $titles;


        // dump($titles);





    }





    /**


     * 编辑操作


     */


    public function product_runedit()



    {
        if (!request()->isAjax()){
            $this->error('提交方式不正确',url('admin/Product/product_list'));
        }


        //获取图片上传后路径
        $pic_oldlist=input('pic_oldlist');//老多图字符串

        $fj_id = session('admin_auth.fj_id');

        //产品尺寸
        $goodsSize['goodsSizec'] = input('goodsSizec','');
        $goodsSize['goodsSizek'] = input('goodsSizek','');
        $goodsSize['goodsSizeg'] = input('goodsSizeg','');
        $goodsSize =json_encode($goodsSize,true);
        $sl_data=array(
            'goodsId'=>input('goodsId'),
            'goodsTitle'=>input('goodsTitle'),
            'bezhu'=>input('bezhu'),
            'manufacturernumber'=>input('manufacturernumber'),
            'material'=>input('material'),
            'goodsUrl'=>input('goodsUrl'),
            'caijiUrl'=>input('caijiUrl'),
            'class1'=>input('class1'),
            'class2'=>input('class2'),
            'class3'=>input('class3'),
            'childType'=>input('childType'),
            'goodsEnglishabbreviation'=>input('goodsEnglishabbreviation',''),
            'goodsTradeNames'=>input('goodsTradeNames',''),
            'goodsBrandName'=>input('goodsBrandName',''),
            'goodsSku'=>input('goodsSku',''),
            'goodsSize'=>$goodsSize,
            'goodsStaus'=>input('goodsStaus',''),
            'goodsBuyingPrice'=>input('goodsBuyingPrice',''),
            'goodsFreight'=>input('goodsFreight',''),
            'goodsInventory'=>input('goodsInventory',''),
            'goodsWeight'=>input('goodsWeight',''),
            'goodsImages'=>input('goodsImages',''),//多图路径
            'britain_price'=>input('goodsPrice_yg',''),
            'usa_price'=>input('goodsPrice_en',''),
            'canada_price'=>input('goodsPrice_jnd',''),
            'mexico_price'=>input('goodsPrice_mxg',''),
            'france_price'=>input('goodsPrice_fg',''),
            'germany_price'=>input('goodsPrice_dg',''),
            'italy_price'=>input('goodsPrice_ydl',''),
            'spain_price'=>input('goodsPrice_xby',''),
            'japan_price'=>input('goodsPrice_rb',''),
            'australia_price'=>input('goodsPrice_adly',''),
            'upc'=>input('goodsEan',''),
            //'uid'=>session('admin_auth.aid'),
            //'fj_uid'=>$fj_id,
            //'add_time'=>time(),
            'goodsSize'=>$goodsSize,
        );
        // dump($sl_data);die;
        //图片字段处理
        if(!empty($img_one)){
            $sl_data['news_img']=$img_one;
        }
        $rst=GoodsModel::update($sl_data);
        //修改变体
        if(isset($_POST['variant_id'])){
            $currency = Db::name('currency')->order('id','asc')->select();
            foreach ($_POST['variant_combination'] as $key => $value) {
                if($_POST['childType']==3){
                    $variantArray= explode("-",$value);
                    $variantData['color'] = $variantArray[0];
                    $variantData['size'] = $variantArray[1];
                }elseif ($_POST['childType']==1) {
                    $variantData['color'] = $value;
                }elseif ($_POST['childType']==2) {
                    $variantData['size'] = $value;
                }
                $variantData['type'] =  $_POST['childType'];
                $variantData['goods_id'] =  input('goodsId');
                $variantData['SKU'] =  $_POST['sku'][$key];
                $variantData['stock'] =  $_POST['stock'][$key];
                $variantData['imgs'] =  $_POST['imgs'][$key];
                $variantData['markup'] =  $_POST['markup'][$key];
                $variantData['UPC'] =  $_POST['upc'][$key];
                $variantData['usa_price'] = $_POST['goodsPrice_en'] + $_POST['markup'][$key]/$currency[3]['exchange_rate'];
                $variantData['canada_price'] = $_POST['goodsPrice_jnd'] + $_POST['markup'][$key]/$currency[4]['exchange_rate'];
                $variantData['mexico_price'] = $_POST['goodsPrice_mxg'] + $_POST['markup'][$key]/$currency[7]['exchange_rate'];
                $variantData['britain_price'] = $_POST['goodsPrice_yg'] + $_POST['markup'][$key]/$currency[0]['exchange_rate'];
                $variantData['france_price'] = $_POST['goodsPrice_fg'] + $_POST['markup'][$key]/$currency[1]['exchange_rate'];
                $variantData['germany_price'] = $_POST['goodsPrice_dg'] + $_POST['markup'][$key]/$currency[1]['exchange_rate'];
                $variantData['italy_price'] = $_POST['goodsPrice_ydl'] + $_POST['markup'][$key]/$currency[1]['exchange_rate'];
                $variantData['spain_price'] = $_POST['goodsPrice_xby'] + $_POST['markup'][$key]/$currency[1]['exchange_rate'];
                $variantData['japan_price'] = $_POST['goodsPrice_rb'] + $_POST['markup'][$key]/$currency[2]['exchange_rate'];
                $variantData['australia_price'] = $_POST['goodsPrice_adly'] + $_POST['markup'][$key]/$currency[6]['exchange_rate'];
                //dump($variantData);die;
                Db::name('goods_variant')->where('id',$_POST['variant_id'][$key])->update($variantData);
            }
        }else{
            if(isset($_POST['variant_combination'])){
                $currency = Db::name('currency')->order('id','asc')->select();

                $count = count($_POST['variant_combination']);
                $ean_list=Db::name('ean')->limit($count)->select();
                $ean_count = 0;
                foreach ($_POST['variant_combination'] as $key => $value) {

                    if($_POST['childType']==3){
                        $variantArray= explode("-",$value);
                        $variantData['color'] = $variantArray[0];
                        $variantData['size'] = $variantArray[1];
                    }elseif ($_POST['childType']==1) {
                        $variantData['color'] = $value;
                    }elseif ($_POST['childType']==2) {
                        $variantData['size'] = $value;
                    }
                    $variantData['type'] =  $_POST['childType'];
                    $variantData['goods_id'] =  input('goodsId');
                    $variantData['SKU'] =  $_POST['sku'][$key];
                    $variantData['stock'] =  $_POST['stock'][$key];
                    $variantData['imgs'] =  $_POST['imgs'][$key];
                    $variantData['markup'] =  $_POST['markup'][$key];
                    $variantData['usa_price'] = $_POST['goodsPrice_en'] + $_POST['markup'][$key]/$currency[3]['exchange_rate'];
                    $variantData['canada_price'] = $_POST['goodsPrice_jnd'] + $_POST['markup'][$key]/$currency[4]['exchange_rate'];
                    $variantData['mexico_price'] = $_POST['goodsPrice_mxg'] + $_POST['markup'][$key]/$currency[7]['exchange_rate'];
                    $variantData['britain_price'] = $_POST['goodsPrice_yg'] + $_POST['markup'][$key]/$currency[0]['exchange_rate'];
                    $variantData['france_price'] = $_POST['goodsPrice_fg'] + $_POST['markup'][$key]/$currency[1]['exchange_rate'];
                    $variantData['germany_price'] = $_POST['goodsPrice_dg'] + $_POST['markup'][$key]/$currency[1]['exchange_rate'];
                    $variantData['italy_price'] = $_POST['goodsPrice_ydl'] + $_POST['markup'][$key]/$currency[1]['exchange_rate'];
                    $variantData['spain_price'] = $_POST['goodsPrice_xby'] + $_POST['markup'][$key]/$currency[1]['exchange_rate'];
                    $variantData['japan_price'] = $_POST['goodsPrice_rb'] + $_POST['markup'][$key]/$currency[2]['exchange_rate'];
                    $variantData['australia_price'] = $_POST['goodsPrice_adly'] + $_POST['markup'][$key]/$currency[6]['exchange_rate'];
                    $variantData['UPC'] =  $ean_list[$ean_count]['bianma'];
                    // dump($variantData);die;
                    Db::name('goods_variant')->insert($variantData);
                    $ean_count++;
                }
                //删除已经写入的ean码
                $eanKey = $count-1;
                $lastEan =  $ean_list[$eanKey]['id'];
                Db::name('ean')->where('id','<=',$lastEan)->delete();
            }
        }
        //修改language
        //英语
        $languageData['1']['TITLE'] = input('title_en','');
        // $languageData['1']['DESCRIPTION'] = input('description_en','');$_POST['description_en']
        $desAry = explode("\n",  input('description_en',''));
        $str = "";
        foreach($desAry as $k=>$v){
            $str .= $v."<br/>";
        }
        $languageData['1']['DESCRIPTION'] =  rtrim($str,'<br/>');

        $keypotins_en=explode("\n",input('keypotins_en',''));
        $languageData['1']['MAIN_POINTS_1'] = isset($keypotins_en[0])?$keypotins_en[0]:'';
        $languageData['1']['MAIN_POINTS_2'] = isset($keypotins_en[1])?$keypotins_en[1]:'';
        $languageData['1']['MAIN_POINTS_3'] = isset($keypotins_en[2])?$keypotins_en[2]:'';
        $languageData['1']['MAIN_POINTS_4'] = isset($keypotins_en[3])?$keypotins_en[3]:'';
        $languageData['1']['MAIN_POINTS_5'] = isset($keypotins_en[4])?$keypotins_en[4]:'';
        $languageData['1']['key_words'] = input('keyword_en','');
        $languageData['1']['id'] = input('id_en','');

        $languageData['7']['TITLE'] = input('title_zh','');

        // $languageData['7']['DESCRIPTION'] = input('description_zh','');
        $desAry = explode("\n",input('description_zh',''));
        $str = "";
        foreach($desAry as $k=>$v){
            $str .= $v."<br/>";
        }
        $languageData['7']['DESCRIPTION'] =  rtrim($str,'<br/>');


        $keypotins_zh=explode("\n",input('keypotins_zh',''));

        $languageData['7']['MAIN_POINTS_1'] = isset($keypotins_zh[0])?$keypotins_zh[0]:'';
        $languageData['7']['MAIN_POINTS_2'] = isset($keypotins_zh[1])?$keypotins_zh[1]:'';
        $languageData['7']['MAIN_POINTS_3'] = isset($keypotins_zh[2])?$keypotins_zh[2]:'';
        $languageData['7']['MAIN_POINTS_4'] = isset($keypotins_zh[3])?$keypotins_zh[3]:'';
        $languageData['7']['MAIN_POINTS_5'] = isset($keypotins_zh[4])?$keypotins_zh[4]:'';

        $languageData['7']['key_words'] = input('keyword_zh','');
        $languageData['7']['id'] = input('id_zh','');

        //法语
        $languageData['2']['TITLE'] = input('title_fra','');
        // $languageData['2']['DESCRIPTION'] = input('description_fra','');
        $desAry = explode("\n", input('description_fra',''));
        $str = "";
        foreach($desAry as $k=>$v){
            $str .= $v."<br/>";
        }
        $languageData['2']['DESCRIPTION'] =  rtrim($str,'<br/>');
        $keypotins_fra=explode("\n",input('keypotins_fra',''));
        $languageData['2']['MAIN_POINTS_1'] = isset($keypotins_fra[0])?$keypotins_fra[0]:'';
        $languageData['2']['MAIN_POINTS_2'] = isset($keypotins_fra[1])?$keypotins_fra[1]:'';
        $languageData['2']['MAIN_POINTS_3'] = isset($keypotins_fra[2])?$keypotins_fra[2]:'';
        $languageData['2']['MAIN_POINTS_4'] = isset($keypotins_fra[3])?$keypotins_fra[3]:'';
        $languageData['2']['MAIN_POINTS_5'] = isset($keypotins_fra[4])?$keypotins_fra[4]:'';
        $languageData['2']['key_words'] = input('keyword_fra','');
        $languageData['2']['id'] = input('id_fra','');

        //德语
        $languageData['3']['TITLE'] = input('title_de','');
        // $languageData['3']['DESCRIPTION'] = input('description_de','');
        $desAry = explode("\n", input('description_de',''));
        $str = "";
        foreach($desAry as $k=>$v){
            $str .= $v."<br/>";
        }
        $languageData['3']['DESCRIPTION'] =  rtrim($str,'<br/>');
        $keypotins_de=explode("\n",input('keypotins_de',''));
        $languageData['3']['MAIN_POINTS_1'] = isset($keypotins_de[0])?$keypotins_de[0]:'';
        $languageData['3']['MAIN_POINTS_2'] = isset($keypotins_de[1])?$keypotins_de[1]:'';
        $languageData['3']['MAIN_POINTS_3'] = isset($keypotins_de[2])?$keypotins_de[2]:'';
        $languageData['3']['MAIN_POINTS_4'] = isset($keypotins_de[3])?$keypotins_de[3]:'';
        $languageData['3']['MAIN_POINTS_5'] = isset($keypotins_de[4])?$keypotins_de[4]:'';
        $languageData['3']['key_words'] = input('keyword_de','');
        $languageData['3']['id'] = input('id_de','');
        //意大利语
        $languageData['5']['TITLE'] = input('title_it','');
        // $languageData['5']['DESCRIPTION'] = input('description_it','');
        $desAry = explode("\n",input('description_it',''));
        $str = "";
        foreach($desAry as $k=>$v){
            $str .= $v."<br/>";
        }
        $languageData['5']['DESCRIPTION'] =  rtrim($str,'<br/>');
        $keypotins_it=explode("\n",input('keypotins_it',''));
        $languageData['5']['MAIN_POINTS_1'] = isset($keypotins_it[0])?$keypotins_it[0]:'';
        $languageData['5']['MAIN_POINTS_2'] = isset($keypotins_it[1])?$keypotins_it[1]:'';
        $languageData['5']['MAIN_POINTS_3'] = isset($keypotins_it[2])?$keypotins_it[2]:'';
        $languageData['5']['MAIN_POINTS_4'] = isset($keypotins_it[3])?$keypotins_it[3]:'';
        $languageData['5']['MAIN_POINTS_5'] = isset($keypotins_it[4])?$keypotins_it[4]:'';
        $languageData['5']['key_words'] = input('keyword_it','');

        $languageData['5']['id'] = input('id_it','');
        //西班牙语

        $languageData['4']['TITLE'] = input('title_es','');

        // $languageData['4']['DESCRIPTION'] = input('description_es','');
        $desAry = explode("\n",input('description_es',''));
        $str = "";
        foreach($desAry as $k=>$v){
            $str .= $v."<br/>";
        }
        $languageData['4']['DESCRIPTION'] =  rtrim($str,'<br/>');
        $keypotins_es=explode("\n",input('keypotins_es',''));
        $languageData['4']['MAIN_POINTS_1'] = isset($keypotins_es[0])?$keypotins_es[0]:'';
        $languageData['4']['MAIN_POINTS_2'] = isset($keypotins_es[1])?$keypotins_es[1]:'';
        $languageData['4']['MAIN_POINTS_3'] = isset($keypotins_es[2])?$keypotins_es[2]:'';
        $languageData['4']['MAIN_POINTS_4'] = isset($keypotins_es[3])?$keypotins_es[3]:'';
        $languageData['4']['MAIN_POINTS_5'] = isset($keypotins_es[4])?$keypotins_es[4]:'';
        $languageData['4']['key_words'] = input('keyword_es','');
        $languageData['4']['id'] = input('id_es','');
        // 日语
        $languageData['6']['TITLE'] = input('title_jp','');
        // $languageData['6']['DESCRIPTION'] = input('description_jp','');
        $desAry = explode("\n",input('description_jp',''));
        $str = "";
        foreach($desAry as $k=>$v){
            $str .= $v."<br/>";
        }
        $languageData['6']['DESCRIPTION'] =  rtrim($str,'<br/>');
        $keypotins_jp=explode("\n",input('keypotins_jp',''));
        $languageData['6']['MAIN_POINTS_1'] = isset($keypotins_jp[0])?$keypotins_jp[0]:'';
        $languageData['6']['MAIN_POINTS_2'] = isset($keypotins_jp[1])?$keypotins_jp[1]:'';
        $languageData['6']['MAIN_POINTS_3'] = isset($keypotins_jp[2])?$keypotins_jp[2]:'';
        $languageData['6']['MAIN_POINTS_4'] = isset($keypotins_jp[3])?$keypotins_jp[3]:'';
        $languageData['6']['MAIN_POINTS_5'] = isset($keypotins_jp[4])?$keypotins_jp[4]:'';
        $languageData['6']['key_words'] = input('keyword_jp','');


        $languageData['6']['id'] = input('id_jp','');
        foreach ($languageData as $key => $value) {

            $res = Db::name('goods_language')->where('id',$value['id'])->update($value);



        }


        if($rst!==false){
            $this->success('产品修改成功',url('admin/Product/product_edit',array('goodsId' => input('goodsId'))));





        }else{
            $this->error('产品修改失败',url('admin/Product/product_list'));
        }




    }

    /**
     * 批量编辑
     */
    public function product_batch_edit(){

        //产品id
//        $ids = "182,";
        $ids = input('ids');
        $ids = rtrim($ids,",");
        $idsArray = explode(',',$ids);
        //过滤非本用户产品id
        $idsArray = $this->filter($idsArray);
        //厂商名称
        if(input('goodsTradeNames')!=""){
            $data['goodsTradeNames'] = input('goodsTradeNames');
        }
        //品牌名称
        if(input('goodsBrandName')!=""){
            $data['goodsBrandName'] = input('goodsBrandName');
        }
        //修改厂商 品牌名称
        if(isset($data)){
            foreach($idsArray as $k=>$v){
                Db::name('goods')->where('goodsId',$v['goodsId'])->update($data);
            }
        }
        //查询语言id
        foreach($idsArray as $k=>$v){
            $res = Db::name('goods_language')->where('goods_id',$v['goodsId'])->order('language')->column('language,id');
            $idsArray[$k]['language'] = $res;
        }
        //修改language
        if(input('keyword_en')!=""){
            $languageData['1']['key_words'] = input('keyword_en','');
        }
        if(input('keyword_zh')!=""){
            $languageData['7']['key_words'] = input('keyword_zh','');
        }
        if(input('keyword_fra')!=""){
            $languageData['2']['key_words'] = input('keyword_fra','');
        }
        if(input('keyword_de')!=""){
            $languageData['3']['key_words'] = input('keyword_de','');
        }
        if(input('keyword_it')!=""){
            $languageData['5']['key_words'] = input('keyword_it','');
        }
        if(input('keyword_es')!=""){
            $languageData['4']['key_words'] = input('keyword_es','');
        }
        if(input('keyword_jp')!=""){
            $languageData['6']['key_words'] = input('keyword_jp','');
        }
//        dump($languageData);die;
        foreach($idsArray as $k=>$v){
            foreach($v['language'] as $key=>$value){
                if(isset($languageData[$key])){
                    $res = Db::name('goods_language')->where('id',$value)->update($languageData[$key]);
                }else{
                    continue;
                }
            }
        }
        if($res){
            $this->success('修改成功');
        }else{
            $this->error("修改失败");
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
        //过滤非本用户产品id
        $idsArray = $this->filter($idsArray);
        //获取变体id
        $res=$this->getid($idsArray);
        foreach ($res['id'] as $k=>$v) {
            $newSku = $v['id']['goodsSku']."-".$correctSku;
            Db::name('goods')->where('goodsId',$v['id']['goodsId'])->update(['goodsSku'=>$newSku]);
            if(isset($v['variant_id'])){
                foreach($v['variant_id'] as $key=>$value){
                    //修改变体ean
                    $newSku = $value."-".$correctSku;
                    Db::name('goods_variant')->where('id',$key)->update(['SKU'=>$newSku]);

                }
            }
        }
    }
    /**
     * 批量修正ean
     */
    public function batch_edit_ean(){
        //产品id
        $ids = input('ids');
        $ids = rtrim($ids,",");
        $idsArray = explode(',',$ids);
        //过滤非本用户产品id
        $idsArray = $this->filter($idsArray);
        //获取变体id
        $res=$this->getid($idsArray);
        //取出新ean
        $ean = Db::name('ean')->limit($res['count'])->order('id')->select();
        //删除ean
        Db::name('ean')->where('id',"<",$ean[$res['count']-1]['id'])->delete();
        $number = 0;
        foreach ($res['id'] as $k=>$v) {
            //修改主体ean
            Db::name('goods')->where('goodsId',$v['id']['goodsId'])->update(['upc'=>$ean[$number]['bianma']]);
            $number++;
            if(isset($v['variant_id'])){
                foreach($v['variant_id'] as $key=>$value){
                    //修改变体ean
                    Db::name('goods_variant')->where('id',$key)->update(['UPC'=>$ean[$number]['bianma']]);
                    $number++;
                }
            }
        }
    }
    /**
     * 过滤不是本用户的产品并返回sku
     */
    public function filter($data){
        $uid = session('admin_auth.aid');
        foreach ($data as $k=>$v){
            $res = Db::name('goods')->where('goodsId',$v)->field('uid,goodsSku,goodsId')->find();
            if($res['uid']!=$uid){
                continue;
            }
            $return[$k] = $res;
        }
        return $return;
    }

    /**
     * 根据产品id获取变体id sku
     */
    public function getid($data){
        $return = [];
        $count = 0;
        foreach ($data as $k=>$v){
            $idArray = Db::name('goods_variant')->where('goods_id',$v['goodsId'])->column('id,SKU');
            if($idArray){
                $return[$k]['variant_id'] = $idArray;
            }
            $return[$k]['id'] = $v;
            $count += count($idArray)+1;
        }
        $returnData['count'] = $count;
        $returnData['id'] = $return;
        return $returnData;
    }
    /**

     * 删除变体


     */

    public function variant_del(){

        $idString =  rtrim(input('variant_id'),',');

        $idArray = explode(',', $idString);


        foreach ($idArray as $key => $value) {


            Db::name('goods_variant')->where('id',$value)->delete();


        }



    }


    /**


     * 删除至回收站(单个)


     */


    public function product_del()


    {


        $p=input('p');


        $goods_model=new GoodsModel;


        $rst=$goods_model->where(array('goodsId'=>input('goodsId')))->setField('product_back',1);//转入回收站


        if($rst!==false){


            $this->success('产品已转入回收站',url('admin/Product/product_list',array('p' => $p)));


        }else{


            $this -> error("删除产品失败！",url('admin/Product/product_list',array('p'=>$p)));


        }


    }


    /**


     * 删除至回收站(全选)


     */


    public function product_alldel()


    {


        $p = input('p');


        $ids = input('goodsId/a');


        //var_dump($ids);die;


        if(empty($ids)){


            $this -> error("请选择删除产品",url('admin/Product/product_list',array('p'=>$p)));//判断是否选择了产品ID


        }


        if(is_array($ids)){//判断获取产品ID的形式是否数组


            $where = 'goodsId in('.implode(',',$ids).')';


        }else{


            $where = 'goodsId='.$ids;


        }


        $goods_model=new GoodsModel;


        $rst=$goods_model->where($where)->setField('product_back',1);//转入回收站


        if($rst!==false){


            $this->success("成功把产品移至回收站！",url('admin/Product/product_list',array('p'=>$p)));


        }else{


            $this -> error("删除产品失败！",url('admin/Product/product_list',array('p'=>$p)));


        }


    }


    /**


     * 产品审核/取消审核


     */


    public function product_state()


    {


        $id=input('x');


        $goods_model=new GoodsModel;


        $status=$goods_model->where(array('goodsId'=>$id))->value('goodsStaus');


        if($status==1){


            $statedata = array('goodsStaus'=>0);


            $goods_model->where(array('goodsId'=>$id))->setField($statedata);


            $this->success('未审');


        }else{


            $statedata = array('goodsStaus'=>1);


            $goods_model->where(array('goodsId'=>$id))->setField($statedata);


            $this->success('已审');


        }


    }





    /**


     * 回收站列表


     */


    public function product_back()


    {








        $product_model=new GoodsModel;


        $uid = session('admin_auth.aid');


        if($uid == 1){


            $product=$product_model->alias('a')->join(config('database.prefix').'admin b','a.uid=b.admin_id')->where('product_back = 1')->order('goodsId desc')->paginate(config('paginate.list_rows'),false,['query'=>get_query()]);


        }else{


            $product=$product_model->alias('a')->join(config('database.prefix').'admin b','a.uid=b.admin_id')->where('product_back = 1 and uid='.session('admin_auth.aid'))->order('goodsId desc')->paginate(config('paginate.list_rows'),false,['query'=>get_query()]);


        }








        $show = $product->render();


        $show=preg_replace("(<a[^>]*page[=|/](\d+).+?>(.+?)<\/a>)","<a href='javascript:ajax_page($1);'>$2</a>",$show);


        $this->assign('page',$show);


        $this->assign('product',$product);


        //dump($product);die;


        if(request()->isAjax()){


            return $this->fetch('ajax_product_back');


        }else{


            return $this->fetch();


        }


    }


    /**


     * 还原产品


     */


    public function product_back_open()


    {


        $p=input('p');


        $goods_model=new GoodsModel;


        $rst=$goods_model->where('goodsId',input('goodsId'))->setField('product_back',0);//转入正常


        if($rst!==false){


            $this->success('产品还原成功',url('admin/Product/product_back',array('p' => $p)));


        }else{


            $this -> error("产品还原失败！",url('admin/Product/product_back',array('p' => $p)));


        }


    }


    /**


     * 彻底删除(单个)


     */


    public function product_back_del()


    {


        $n_id=input('n_id');


        $p = input('p');


        $goods_model=new GoodsModel;


        if (empty($n_id)){


            $this->error('参数错误',url('admin/Product/product_back',array('p' => $p)));


        }else{


            $rst=$goods_model->where('goodsId',input('goodsId'))->delete();


            if($rst!==false){


                $this->success('产品彻底删除成功',url('admin/Product/product_back',array('p' => $p)));


            }else{


                $this -> error("产品彻底删除失败！",url('admin/Product/product_back',array('p' => $p)));


            }


        }


    }


    /**


     * 彻底删除(全选)


     */


    public function product_back_alldel()


    {


        $p = input('p');


        $ids = input('goodsId');


        //var_dump($ids);die;


        if(empty($ids)){


            $this -> error("请选择删除产品",url('admin/Product/product_back',array('p'=>$p)));//判断是否选择了产品ID


        }


        if(is_array($ids)){//判断获取产品ID的形式是否数组


            $where = 'n_id in('.implode(',',$ids).')';


        }else{


            $where = 'n_id='.$ids;


        }


        $goods_model=new GoodsModel;


        $rst=$goods_model->where($where)->delete();


        if($rst!==false){


            $this->success("成功把产品删除，不可还原！",url('admin/Product/product_back',array('p'=>$p)));


        }else{


            $this -> error("产品彻底删除失败！",url('admin/Product/product_back',array('p' => $p)));


        }


    }








    /***************************产品翻译接口***************************************/


    //翻译入口


//     function translate($query, $from, $to)


//     {


//         $args = array(


//             'q' => $query,


//             'appid' => APP_ID,


//             'salt' => rand(10000,99999),


//             'from' => $from,


//             'to' => $to,





//         );


//         $args['sign'] = $this->buildSign($query, APP_ID, $args['salt'], SEC_KEY);


//         $ret = $this->call(URL, $args);


//         $ret = json_decode($ret, true);


//         return $ret;


//     }





// //加密


//     function buildSign($query, $appID, $salt, $secKey)


//     {/*{{{*/


//         $str = $appID . $query . $salt . $secKey;


//         $ret = md5($str);


//         return $ret;


//     }/*}}}*/





// //发起网络请求


//     function call($url, $args=null, $method="post", $testflag = 0, $timeout = CURL_TIMEOUT, $headers=array())


//     {/*{{{*/


//         $ret = false;


//         $i = 0;


//         while($ret === false)


//         {


//             if($i > 1)


//                 break;


//             if($i > 0)


//             {


//                 sleep(1);


//             }


//             $ret = $this->callOnce($url, $args, $method, false, $timeout, $headers);


//             $i++;


//         }


//         return $ret;


//     }/*}}}*/





//     function callOnce($url, $args=null, $method="post", $withCookie = false, $timeout = CURL_TIMEOUT, $headers=array())


//     {/*{{{*/


//         $ch = curl_init();


//         if($method == "post")


//         {


//             $data = $this->convert($args);


//             curl_setopt($ch, CURLOPT_POSTFIELDS, $data);


//             curl_setopt($ch, CURLOPT_POST, 1);


//         }


//         else


//         {


//             $data = $this->convert($args);


//             if($data)


//             {


//                 if(stripos($url, "?") > 0)


//                 {


//                     $url .= "&$data";


//                 }


//                 else


//                 {


//                     $url .= "?$data";


//                 }


//             }


//         }


//         curl_setopt($ch, CURLOPT_URL, $url);


//         curl_setopt($ch, CURLOPT_TIMEOUT, $timeout);


//         curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);


//         if(!empty($headers))


//         {


//             curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);


//         }


//         if($withCookie)


//         {


//             curl_setopt($ch, CURLOPT_COOKIEJAR, $_COOKIE);


//         }


//         $r = curl_exec($ch);


//         curl_close($ch);


//         return $r;


//     }/*}}}*/





//     function convert(&$args)


//     {/*{{{*/


//         $data = '';


//         if (is_array($args))


//         {


//             foreach ($args as $key=>$val)


//             {


//                 if (is_array($val))


//                 {


//                     foreach ($val as $k=>$v)


//                     {


//                         $data .= $key.'['.$k.']='.rawurlencode($v).'&';


//                     }


//                 }


//                 else


//                 {


//                     $data .="$key=".rawurlencode($val)."&";


//                 }


//             }


//             return trim($data, "&");


//         }


//         return $args;


//     }/*}}}*/


    /******************************************************************/





    /**


     * 所有产品列表


     */


    public function product_lists()


    {


        $nid=input('nid','');


        $sku=input('sku','');


        $goodsTitle=input('goodsTitle','');


        $goodsStaus=input('goodsStaus','');


        $yuangong_id=input('yuangong','');


        $key=input('key');


        //查询：时间格式过滤 获取格式 2015-11-12 - 2015-11-18


        $sldate=input('reservation','');


        $arr = explode(" - ",$sldate);


        $map = array();


        if(count($arr)==2){


            $arrdateone=strtotime($arr[0]);


            $arrdatetwo=strtotime($arr[1].' 23:55:55');


            $map['add_time'] = array(array('egt',$arrdateone),array('elt',$arrdatetwo),'AND');


        }





        if(!empty($key)){


            $map['goods_title']= array('like',"%".$key."%");


        }


        if ($nid!=''){


            $map['goodsId']= array('eq',$nid);


        }


        if ($sku!=''){


            //$map['goodsSku']= array('eq',$sku);


            $map['goodsSku']= array('like',"%".$sku."%");


        }


        if ($goodsTitle!=''){


            $map['goodsTitle']= array('eq',$goodsTitle);


        }


        if ($goodsStaus!=''){


            $map['goodsStaus']= array('eq',$goodsStaus);


        }








        //当前登陆账号id


        $uid = session('admin_auth.aid');


        //查询当前用户的员工


        $yuangong=Db::name('admin')->where('fj_id ='.$uid)->field('admin_id,admin_realname')->select();


        $this->assign('yuangong',$yuangong);


        //查询所有用户的员工


        $yuangonglist=Db::name('admin')->field('admin_id,admin_realname')->select();





        $this->assign('yuangonglist',$yuangonglist);


        //当前账号父级id


        $fid = session('admin_auth.fj_id');








        if ($yuangong_id!='') {


            $product = Db::name('goods')->alias('a')->join(config('database.prefix') . 'admin b', 'a.uid=b.admin_id')->where($map)->where('product_back = 0 and uid = '.$yuangong_id)->order('goodsId desc')->paginate(config('paginate.list_rows'), false, ['query' => get_query()]);





        }else if($fid == 0){


            $product=Db::name('goods')->alias('a')->join(config('database.prefix').'admin b','a.uid=b.admin_id')->where($map)->where('product_back = 0 ')->order('goodsId desc')->paginate(config('paginate.list_rows'),false,['query'=>get_query()]);





        }else{


            $product = Db::name('goods')->alias('a')->join(config('database.prefix') . 'admin b', 'a.uid=b.admin_id')->where($map)->where('product_back = 0 and fj_uid = ' . $uid)->order('goodsId desc')->paginate(config('paginate.list_rows'), false, ['query' => get_query()]);


        }





        $show = $product->render();


        $show=preg_replace("(<a[^>]*page[=|/](\d+).+?>(.+?)<\/a>)","<a href='javascript:ajax_page($1);'>$2</a>",$show);


        $this->assign('page',$show);


        //dump($product);die;


        //栏目数据


        $menu_text=menu_text($this->lang);


        $this->assign('menu',$menu_text);








        $this->assign('product',$product);


        if(request()->isAjax()){


            return $this->fetch('ajax_product_lists');


        }else{


            return $this->fetch();


        }


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
    public function product_addFeed(){
        $storeList = Db::name('plug_sug')->where('plug_uid',session('admin_auth.aid'))->order('plug_sug_id asc')->select();
        $list_fenlei =$this->db2->table('ProductCategories')->order('px desc')->select();
        $list_fenlei = $this->tree($list_fenlei,0,"",0);
        $this->assign('list_fenlei',$list_fenlei);
        $this->assign('admin_realname',session('admin_auth.admin_realname'));
        $this->assign('storeList',$storeList);
        return $this->fetch('product_feed');
    }
    //分类历史记录
    public function historyClass(){
        $key = $_POST['country'];
        $list1 =Db::name('goods_record')->where('store_id',$key)->where('UID',session('admin_auth.aid'))->field('id,category,category_name,node_id')->order('id desc')->buildSql();
      $list =  Db::table($list1."a")
            ->field('a.id,a.category,a.category_name,a.node_id')
            ->group('category_name')
            ->limit(4)
            ->order('id desc')
            ->select();
        //echo Db::name('goods_record')->getLastSql();
        //dump($list);die;
        if($list){
            $data = ['msg'=>'success','data'=>$list];
        }else{
            $data = ['msg'=>'error'];
        }
        $return = json($data);
        return $return;
    }
    //获取单条历史记录
    public function historyId(){
        $idss = $_POST['fid'];
        $list =Db::name('goods_record')->where('id',$idss)->field('id,category,category_name,node_id')->find();
        //echo Db::name('goods_record')->getLastSql();
        //dump($list);die;
        if($list){
            $data = ['msg'=>'success','data'=>$list];
        }else{
            $data = ['msg'=>'error'];
        }
        $return = json($data);
        return $return;
    }
    public function product_insertFeed(){
        $template = $_POST['templateType'];
        $startId = $_POST['startId'];
        $endId = $_POST['endId'];
        $nodeId = $_POST['nodeId'];
       // dump($_POST);die;
        $countryArray = [2=>'japan',4=>'germany',5=>'britain',6=>'italy',7=>'france',8=>'spain',9=>'usa',10=>'mexico',11=>'canada'];
        $country = $countryArray[$_POST['goodsCate']];
        $countrylanguageArray = ['britain'=>1,'usa'=>1,'canada'=>1,'japan'=>6,'germany'=>3,'italy'=>5,'france'=>2,'spain'=>4,'mexico'=>4];
        $language = $countrylanguageArray[$country];
        if($_POST['idText']){
            $idText = explode(',',$_POST['idText']);
             foreach ($idText as $key => $value) {
                if(!is_numeric($value)){
                    $return = ['status'=>'error','msg'=>'产品id类型不对'];
                    return json($return);
                }
            }
            if($_POST['class3']!=""){
                $parentData =  Db::view('goods')
                    ->view('goods_language', '*','goods.goodsId=goods_language.goods_id')
                    ->where('goods.goodsId','in',$_POST['idText'])
                    ->where('goods.UID',session('admin_auth.aid'))
                    ->where('goods.product_back',0)
                    ->where('goods_language.language',$language)
                    ->where('goods.class3',$_POST['class3'])
                    ->select();
            }elseif($_POST['class3']=="" && $_POST['class2']!=""){

                $parentData =  Db::view('goods')
                    ->view('goods_language', '*','goods.goodsId=goods_language.goods_id')
                    ->where('goods.goodsId','in',$_POST['idText'])
                    ->where('goods.UID',session('admin_auth.aid'))
                    ->where('goods.product_back',0)
                    ->where('goods_language.language',$language)
                    ->where('goods.class2',$_POST['class2'])
                    ->select();

            }elseif($_POST['class3']=="" && $_POST['class2']=="" && $_POST['class1']!=""){
                $parentData =  Db::view('goods')
                    ->view('goods_language', '*','goods.goodsId=goods_language.goods_id')
                    ->where('goods.goodsId','in',$_POST['idText'])
                    ->where('goods.UID',session('admin_auth.aid'))
                    ->where('goods.product_back',0)
                    ->where('goods_language.language',$language)
                    ->where('goods.class1',$_POST['class1'])
                    ->select();
            }elseif($_POST['class3']=="" && $_POST['class2']=="" && $_POST['class1']==""){
                $parentData =  Db::view('goods')
                    ->view('goods_language', '*','goods.goodsId=goods_language.goods_id')
                    ->where('goods.goodsId','in',$_POST['idText'])
                    ->where('goods.UID',session('admin_auth.aid'))
                    ->where('goods.product_back',0)
                    ->where('goods_language.language',$language)
                    ->select();
            }
        }else{
            if($_POST['class3']!=""){
                $parentData =  Db::view('goods')
                    ->view('goods_language', '*','goods.goodsId=goods_language.goods_id')
                    ->where('goodsId','>=',$startId)
                    ->where('goodsId','<=',$endId)
                    ->where('goods.UID',session('admin_auth.aid'))
                    ->where('goods.product_back',0)
                    ->where('goods_language.language',$language)
                    ->where('goods.class3',$_POST['class3'])
                    ->select();
            }elseif($_POST['class3']=="" && $_POST['class2']!=""){
                $parentData =  Db::view('goods')
                    ->view('goods_language', '*','goods.goodsId=goods_language.goods_id')
                    ->where('goodsId','>=',$startId)
                    ->where('goodsId','<=',$endId)
                    ->where('goods.UID',session('admin_auth.aid'))
                    ->where('goods.product_back',0)
                    ->where('goods_language.language',$language)
                    ->where('goods.class2',$_POST['class2'])
                    ->select();

            }elseif($_POST['class3']=="" && $_POST['class2']=="" && $_POST['class1']!=""){
                $parentData =  Db::view('goods')
                    ->view('goods_language', '*','goods.goodsId=goods_language.goods_id')
                    ->where('goodsId','>=',$startId)
                    ->where('goodsId','<=',$endId)
                    ->where('goods.UID',session('admin_auth.aid'))
                    ->where('goods.product_back',0)
                    ->where('goods_language.language',$language)
                    ->where('goods.class1',$_POST['class1'])
                    ->select();
            }elseif($_POST['class3']=="" && $_POST['class2']=="" && $_POST['class1']==""){
                $parentData =  Db::view('goods')
                    ->view('goods_language', '*','goods.goodsId=goods_language.goods_id')
                    ->where('goodsId','>=',$startId)
                    ->where('goodsId','<=',$endId)
                    ->where('goods.UID',session('admin_auth.aid'))
                    ->where('goods.product_back',0)
                    ->where('goods_language.language',$language)
                    ->select();
            }
        }
        if(count($parentData)<1){
            $return = ['status'=>'error','msg'=>'没有可添加的产品'];
            return json($return);
        }
        // 添加记录
        $data['UID'] = session('admin_auth.aid');
        $data['store_id'] = $_POST['goodsCate'];
        
        
        
        if(!empty($_POST['categoryDetail'])){$data['category_detail'] = $_POST['categoryDetail'];}
        
        
        $data['node_id'] = $_POST['nodeId'];
        $data['category'] = $_POST['category'];
        $data['template'] = $_POST['templateType'];
        $data['class1'] = isset($_POST['class1'])?$_POST['class1']:"";
        $data['class2'] = isset($_POST['class2'])?$_POST['class2']:"";
        $data['class3'] = isset($_POST['class3'])?$_POST['class3']:"";
        $data['add_time'] = date("Y-m-d H:i:s",time());
        $data['category_name'] = $_POST['categoryName'];
        if($_POST['idText']){
            $data['commodity_id'] = $_POST['idText'];
        }else{
            $data['commodity_id'] = $_POST['startId']."-".$_POST['endId'];
        }
        $record = Db::name('goods_record')->insertGetId($data);
        if($record){
            $return = ['status'=>'success','msg'=>'添加成功'];
            return json($return);
        }
    }
    /**
     *上传列表
     *
     */
    public function record_list(){
        $record=Db::name('goods_record')->order('id desc')->where('UID',session('admin_auth.aid'))->paginate(config('paginate.list_rows'));
        $plug_dpbm = Db::name('plug_sug')->where('plug_uid',session('admin_auth.aid'))->find();
        $name = $plug_dpbm['plug_dpbm'];
        $page = $record->render();
        $this->assign('record',$record);
        $this->assign('page',$page);
        $this->assign('name',$name);
        return $this->fetch('record_list');

    }
    
    /**
     *所有上传列表
     *
     */
    public function record_lists(){
        $record=Db::name('goods_record')->order('id desc')->paginate(config('paginate.list_rows'));

        $page = $record->render();
        $this->assign('record',$record);
        $this->assign('page',$page);

        return $this->fetch('record_lists');

    }

    /**
     *修改上传
     *
     */
    public function editRecord(){
        $list_fenlei =$this->db2->table('ProductCategories')->order('px desc')->select();
        $list_fenlei = $this->tree($list_fenlei,0,"",0);
        $this->assign('list_fenlei',$list_fenlei);
        $this->assign('admin_realname',session('admin_auth.admin_realname'));
        $storeList = Db::name('plug_sug')->where('plug_uid',session('admin_auth.aid'))->order('plug_sug_id asc')->select();
        $this->assign('admin_realname',session('admin_auth.admin_realname'));
        $this->assign('storeList',$storeList);
        $id = input('id');
        $record = Db::name('goods_record')->where('id',$id)->where('UID',session('admin_auth.aid'))->find();
        if($record == ''){
            echo "<script language=\"JavaScript\">\r\n";
            echo " alert(\"未找到数据\");\r\n";
            echo " history.back();\r\n";
            echo "</script>";
            die;
        }
        $commodity_id = explode("-", $record['commodity_id']);
        if(count($commodity_id)>1){
            $record['startId'] = $commodity_id[0];
            $record['endId'] = $commodity_id[1];
        }else{
            $record['textId'] = $record['commodity_id'];
        }
        $this->assign('record',$record);
        return $this->fetch('edit_collect');
    }

    //修改上传记录
    public function updateRecord(){
        $id = input('id');
        $template = $_POST['templateType'];
        $startId = $_POST['startId'];
        $endId = $_POST['endId'];
        $nodeId = $_POST['nodeId'];
        $countryArray = [2=>'japan',4=>'germany',5=>'britain',6=>'italy',7=>'france',8=>'spain',9=>'usa',10=>'mexico',11=>'canada'];
        $country = $countryArray[$_POST['goodsCate']];
        $countrylanguageArray = ['britain'=>1,'usa'=>1,'canada'=>1,'japan'=>6,'germany'=>3,'italy'=>5,'france'=>2,'spain'=>4,'mexico'=>4];
        $language = $countrylanguageArray[$country];
        if($_POST['idText']){
//            echo 22;die;
            $idText = explode(',',$_POST['idText']);
             foreach ($idText as $key => $value) {
                if(!is_numeric($value)){
                    $return = ['status'=>'error','msg'=>'产品id类型不对'];
                    return json($return);
                }
            }
            if($_POST['class3']!=""){
                $parentData =  Db::view('goods')
                    ->view('goods_language', '*','goods.goodsId=goods_language.goods_id')
                    ->where('goods.goodsId','in',$_POST['idText'])
                    ->where('goods.UID',session('admin_auth.aid'))
                    ->where('goods.product_back',0)
                    ->where('goods_language.language',$language)
                    ->where('goods.class3',$_POST['class3'])
                    ->select();
            }elseif($_POST['class3']=="" && $_POST['class2']!=""){

                $parentData =  Db::view('goods')
                    ->view('goods_language', '*','goods.goodsId=goods_language.goods_id')
                    ->where('goods.goodsId','in',$_POST['idText'])
                    ->where('goods.UID',session('admin_auth.aid'))
                    ->where('goods.product_back',0)
                    ->where('goods_language.language',$language)
                    ->where('goods.class2',$_POST['class2'])
                    ->select();

            }elseif($_POST['class3']=="" && $_POST['class2']=="" && $_POST['class1']!=""){
                $parentData =  Db::view('goods')
                    ->view('goods_language', '*','goods.goodsId=goods_language.goods_id')
                    ->where('goods.goodsId','in',$_POST['idText'])
                    ->where('goods.UID',session('admin_auth.aid'))
                    ->where('goods.product_back',0)
                    ->where('goods_language.language',$language)
                    ->where('goods.class1',$_POST['class1'])
                    ->select();
            }elseif($_POST['class3']=="" && $_POST['class2']=="" && $_POST['class1']==""){
                $parentData =  Db::view('goods')
                    ->view('goods_language', '*','goods.goodsId=goods_language.goods_id')
                    ->where('goods.goodsId','in',$_POST['idText'])
                    ->where('goods.UID',session('admin_auth.aid'))
                    ->where('goods.product_back',0)
                    ->where('goods_language.language',$language)
                    ->select();
            }
        }else{
            if($_POST['class3']!=""){
                $parentData =  Db::view('goods')
                    ->view('goods_language', '*','goods.goodsId=goods_language.goods_id')
                    ->where('goodsId','>=',$startId)
                    ->where('goodsId','<=',$endId)
                    ->where('goods.UID',session('admin_auth.aid'))
                    ->where('goods.product_back',0)
                    ->where('goods_language.language',$language)
                    ->where('goods.class3',$_POST['class3'])
                    ->select();
            }elseif($_POST['class3']=="" && $_POST['class2']!=""){
                $parentData =  Db::view('goods')
                    ->view('goods_language', '*','goods.goodsId=goods_language.goods_id')
                    ->where('goodsId','>=',$startId)
                    ->where('goodsId','<=',$endId)
                    ->where('goods.UID',session('admin_auth.aid'))
                    ->where('goods.product_back',0)
                    ->where('goods_language.language',$language)
                    ->where('goods.class2',$_POST['class2'])
                    ->select();

            }elseif($_POST['class3']=="" && $_POST['class2']=="" && $_POST['class1']!=""){
                $parentData =  Db::view('goods')
                    ->view('goods_language', '*','goods.goodsId=goods_language.goods_id')
                    ->where('goodsId','>=',$startId)
                    ->where('goodsId','<=',$endId)
                    ->where('goods.UID',session('admin_auth.aid'))
                    ->where('goods.product_back',0)
                    ->where('goods_language.language',$language)
                    ->where('goods.class1',$_POST['class1'])
                    ->select();
            }elseif($_POST['class3']=="" && $_POST['class2']=="" && $_POST['class1']==""){
                $parentData =  Db::view('goods')
                    ->view('goods_language', '*','goods.goodsId=goods_language.goods_id')
                    ->where('goodsId','>=',$startId)
                    ->where('goodsId','<=',$endId)
                    ->where('goods.UID',session('admin_auth.aid'))
                    ->where('goods.product_back',0)
                    ->where('goods_language.language',$language)
                    ->select();
            }
        }
        if(count($parentData)<1){
            $return = ['status'=>'error','msg'=>'没有可添加的产品'];
            return json($return);
        }
        // 添加记录
        $data['UID'] = session('admin_auth.aid');
        $data['store_id'] = $_POST['goodsCate'];
        $data['class1'] = $_POST['class1'];
        $data['class2'] = $_POST['class2'];
        $data['class3'] = $_POST['class3'];
        $data['node_id'] = $_POST['nodeId'];
        $data['category'] = $_POST['category'];
        $data['template'] = $_POST['templateType'];
        $data['add_time'] = date("Y-m-d H:i:s",time());
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
        if($_POST['idText']){
            $data['commodity_id'] = $_POST['idText'];
        }else{
            $data['commodity_id'] = $_POST['startId']."-".$_POST['endId'];
        }
        $record = Db::name('goods_record')->where('id',$id)->update($data);
        if($record){
            $return = ['status'=>'success','msg'=>'修改成功'];
            return json($return);
        }
    }
    //删除上传记录
    public function deleteReocrd(){
        $id = input('id');
        $res = Db::name('goods_record')->where('id',$id)->where('UID',session('admin_auth.aid'))->delete();
        if($res){

            $this->success('删除成功',url('admin/Product/record_list'));
        }else{
            $this->error('删除失败');
        }
    }
    //添加本地产品xml
    public function createLcoalXml(){
        $model = new XmlModel();
        ini_set ('memory_limit', '128M');
        //记录id
        $recordId = $_POST['recordId'];
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

        $data = array_merge($childData,$parentData);
//        $chuangxin = $this->db2->table('chuangxin')->where('cid',$record['node_id'])->find();
//        $ItemType = $chuangxin['categoryName'];
        $MerchantIdentifier = Db::name('plug_sug')->where('plug_uid',session('admin_auth.aid'))->field('plug_merchant_id')->find();
        foreach ($parentData as $key => $value) {
            if($value['childType']>0){
                $parentData[$key]['childSku'] = [];
                foreach ($childData as $k => $v) {
                    if($v['goodsSku'] == $value['goodsSku']){
                        $parentData[$key]['childSku'][] = $v['SKU'];
                    }else{
                        continue;
                    }
                }
            }else{
                continue;

            }
        }

        $res = [];
        if($_POST['type'] =='product'){
            if($template[0] == 'Home'){
                $res['product'] = $model->homeLocalXml($data,$record['category_name'],$record['node_id'],$template[1],$MerchantIdentifier['plug_merchant_id']);
            }elseif($template[0] == 'Health'){
                $res['product'] = $model->type1LocalXml($data,$record['category_name'],$record['node_id'],$template,$MerchantIdentifier['plug_merchant_id']);
            }
        }
        if($_POST['type'] =='img'){
            $res['img'] = $model->imgLocalXml($data,$MerchantIdentifier['plug_merchant_id']);
        }
        if($_POST['type'] =='price'){
            $res['price'] = $model->priceLocalXml($data,$country,$MerchantIdentifier['plug_merchant_id']);
        }
        if($_POST['type'] =='inventory'){
            $res['inventory'] = $model->inventoryLocalXml($data,$MerchantIdentifier['plug_merchant_id']);
        }
        if($_POST['type'] =='relationships'){
            $res['relationships'] = $model->RelationshipsLocalXml($parentData,$MerchantIdentifier['plug_merchant_id']);
        }
        // if($_POST['type'] =='all'){
        //     $res['product'] = $model->homeLocalXml($data,$ItemType,$record['node_id'],$template,$MerchantIdentifier['plug_merchant_id']);
        //     $res['img'] = $model->imgLocalXml($data);
        //     $res['price'] = $model->priceLocalXml($data,$country);
        //     $res['inventory'] = $model->inventoryLocalXml($data);
        //     $res['relationships'] = $model->RelationshipsLocalXml($parentData);
        // }
        $res = $this->feed($res,$record);
        return $res;
    }



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
                Db::name('goods_record')->where('id',$record['id'])->update($recordData);
                
            }else{
                $filed = $key."_status";
                $recordData[$filed] = 4;
                $recordData['time'] = date("Y-m-d H:i:s",time());
                Db::name('goods_record')->where('id',$record['id'])->update($recordData);
                $return = ['status'=>'error','msg'=>'出错了,请重新添加'];
                return json($return);
            }

        }
        $return = ['status'=>'success','msg'=>'已上传,请稍后刷新查询状态'];
        return json($return);
    }
    public function getFeedSubmissionList($recordId,$type){
        $record = Db::name('goods_record')->where('id',$recordId)->find();
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
        // ------------------------------------------------------------------
        // $left = [];
        // foreach ($data as $key => $value) {
        //     $request['FeedSubmissionId'] = $value;
        //     $res = $model->getFeedSubmissionList($request);
        //     if($res == "_DONE_"){
        //         $filed = $key."_status";
        //         $recordData[$filed] = 2;
        //         $recordData['time'] = date("Y-m-d H:i:s",time());
        //     }elseif($res == "_IN_PROGRESS_" || $res == "_SUBMITTED_"){
        //         $left[$key] = $value;
        //         continue;
        //     }else{
        //         $filed = $key."_status";
        //         $recordData[$filed] = 4;
        //         $recordData['time'] = date("Y-m-d H:i:s",time());
        //     }
        //     Db::name('goods_record')->where('id',$record['id'])->update($recordData);
        //     if($recordData[$filed] == 4){
        //         return 1;
        //     }
        // }
        // if(count($left)>0){
        //     $request['FeedSubmissionId'] = $left;
        //     $count = 0;
        //     $left = $this->getLeft($request,$count,$record);
        //     if($left<1){
        //         $return = ['status'=>'success','msg'=>'更新成功'];
        //     }else{
        //         $return = ['status'=>'error','msg'=>'更新失败,请稍后重新更新'];
        //     }
        // }else{
        //     $return = ['status'=>'success','msg'=>'更新成功'];
        // }
        // return json($return);

        // ------------------------------------------------------------------
        foreach ($data as $key => $value) {
            $request['FeedSubmissionId'] = $value;
            $res = $model->getFeedSubmissionList($request);
            // dump($res);die;
            if($res == "_DONE_"){
                $filed = $key."_status";
                $recordData[$filed] = 2;
                $recordData['time'] = date("Y-m-d H:i:s",time());
                $return = ['status'=>'success','msg'=>'更新成功'];
                Db::name('goods_record')->where('id',$record['id'])->update($recordData);
            }elseif($res == "_IN_PROGRESS_" || $res == "_SUBMITTED_"){
                $return = ['status'=>'success','msg'=>'上传中请稍后再次尝试'];
            }else{
                $filed = $key."_status";
                $recordData[$filed] = 4;
                $recordData['time'] = date("Y-m-d H:i:s",time());
                $return = ['status'=>'error','msg'=>'更新失败'];
                Db::name('goods_record')->where('id',$record['id'])->update($recordData);
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
            Db::name('goods_record')->where('id',$record['id'])->update($recordData);
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
    public function GetFeedSubmissionResult($recordId,$type){
        $record =  Db::name('goods_record')->where('id',$recordId)->find();
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
            $model->GetLocalFeedSubmissionResult($request);
        }
        return $res;
    }



    //查看错误
    public function GetError(){
        $TransactionID = $_POST['TransactionID'];
        $error = Db::name('feed_errors')->where('TransactionID',$TransactionID)->select();
        if($error){
            $return = ['msg'=>'success','data'=>$error];
        }else{
            $return = ['msg'=>'error'];
        }
        return json($return);
    }


//报错跳转编辑
    public function skuGetGoods(){
        $goods = Db::name('goods')->where('goodsSku',$_GET['sku'])->where('product_back',0)->find();
        if($goods){
            $n_id = $goods['goodsId'];
            $url = "product_edit/goodsId/".$n_id;
            echo "<script language='javascript'>window.location.href='$url';</script>";
            die;
        }else{
            $variant = Db::name('goods_variant')->where('SKU',$_GET['sku'])->find();

            if($variant){
                $n_id = $variant['goods_id'];
                $url = "product_edit/goodsId/".$n_id;
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
//更换ean
    public function reloadEan(){
        $length = input('length');
         $length = $length+1;
        //dump($length);die;
        $ean = Db::name('ean')->limit($length)->order('id')->select();
        if($ean){
            $id = $ean[$length-1]['id'];
            Db::name('ean')->where('id','<=',$id)->delete();
            $return = ['status'=>'success','data'=>$ean];
        }else{
            $return = ['status'=>'error'];
        }
        return json($return);
    }
    //更换sku
    public function reloadSku(){
        $length = input('length');
        $admin_list=Db::name('admin')->where('admin_id = '.session('admin_auth.aid'))->field('admin_id,en_name,en_brand')->select();
        for($i=0;$i<$length;$i++){
            $rand = time();
            $sku[$i]['sku'] =$admin_list[0]['en_brand'].'-'.$admin_list[0]['admin_id'].$rand.'-'.$i;
            
        }

        if($sku){
            $return = ['status'=>'success','data'=>$sku];
        }else{
            $return = ['status'=>'error'];
        }
        return json($return);
    }
    //类目搜索
    public function searchCategory(){
        $search = input('search');
        $store = input('store');
        $country = [2=>'jp',3=>'AS',4=>'de',5=>'uk',6=>'it',7=>'fr',8=>'es',9=>'us',10=>'mx',11=>'ca'];
        $res = $this->db2->table('chuangxin')->where('countryCode',$country[$store])->where('displayName','like',"%".$search."%")->select();
        if($res){
            $return = ['msg'=>'success','data'=>$res];
        }else{
            $return = ['msg'=>'error'];
        }
        return json($return);
    }
     /**


     * 复制产品操作


     */


    public function product_fuzhi()
    {

        header("Content-type: text/html; charset=utf-8");

      //  dump($_POST);die;
        //当前登陆账号id
        $uid = session('admin_auth.aid');
        $fj_id = session('admin_auth.fj_id');
        //产品尺寸
        $goodsSize['goodsSizec'] = input('goodsSizec','');
        $goodsSize['goodsSizek'] = input('goodsSizek','');
        $goodsSize['goodsSizeg'] = input('goodsSizeg','');
        $goodsSize =json_encode($goodsSize,true);
        // dump($_POST);die;
        $rand = time();
        $sku =input('goodsBrandName','').'-'.$uid.$rand;
        $sl_data=array(
            'class1'=>input('class1'),
            'class2'=>input('class2'),
            'class3'=>input('class3'),
            'goodsEnglishabbreviation'=>input('goodsEnglishabbreviation',''),
            'goodsTradeNames'=>input('goodsTradeNames',''),
            'goodsBrandName'=>input('goodsBrandName',''),
            'goodsSize'=>$goodsSize,
            'uid'=>$uid,
            'fj_uid'=>$fj_id,
            'goodsSku'=>$sku,
            'add_time'=>time(),
        );

        //父类EAN码
        $ean_list=Db::name('ean')->order('id','asc')->limit(1)->find();
        Db::name('ean')->where('id','=',$ean_list['id'])->delete();
        // 删除父类ean编码
        $sl_data['upc'] = $ean_list['bianma'];
        $goodsId = Db::name('goods')->insertGetId($sl_data);

        //英语
        $languageData['1']['key_words'] = input('keyword_en','');
        $languageData['1']['language'] = 1;
        $languageData['1']['goods_id'] = $goodsId;
        //中文
        $languageData['7']['key_words'] = input('keyword_zh','');
        $languageData['7']['language'] = 7;
        $languageData['7']['goods_id'] = $goodsId;
        //法语
        $languageData['2']['key_words'] = input('keyword_fra','');
        $languageData['2']['language'] = 2;
        $languageData['2']['goods_id'] =$goodsId;
        //德语
        $languageData['3']['key_words'] = input('keyword_de','');
        $languageData['3']['language'] = 3;
        $languageData['3']['goods_id'] = $goodsId;
        //意大利语
        $languageData['5']['key_words'] = input('keyword_it','');
        $languageData['5']['language'] = 5;
        $languageData['5']['goods_id'] = $goodsId;
        //西班牙语
        $languageData['4']['key_words'] = input('keyword_es','');
        $languageData['4']['language'] = 4;
        $languageData['4']['goods_id'] = $goodsId;
        // 日语
        $languageData['6']['key_words'] = input('keyword_jp','');
        $languageData['6']['language'] = 6;
        $languageData['6']['goods_id'] = $goodsId;
        foreach ($languageData as $key => $value) {

            $res = Db::name('goods_language')->insert($value);

        }

        $continue=input('continue',0,'intval');

        $goodsd=Db::name('goods')->where('uid ='.$uid)->order('goodsId desc')->field('goodsId')->find();
        if($continue){


        }else{
            return $goodsd['goodsId'];
           // $this->success('产品复制成功',url('admin/Product/product_edit',array('goodsId'=>$goodsd['goodsId'])));

        }

    }
    
    /**
     *单产品采集
     *
     */
    public function dancaiji()
    {

        header("content-type:text/html;charset=utf-8");
        //接收值
        $urls = $_POST['urls'];//亚马逊产品路径
      
        $url = 'http://49.232.164.248:5001/detail';

        $sl_datas=array(

            'url'=>$urls
        );
        $sl_data = json_encode($sl_datas);

      // echo $sl_data;die;

        $ch = curl_init();


        curl_setopt($ch, CURLOPT_URL, $url);//要访问的地址


        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);//执行结果是否被返回，0是返回，1是不返回


        curl_setopt($ch, CURLOPT_POST, 0);// 发送一个常规的POST请求


        curl_setopt($ch, CURLOPT_POSTFIELDS, $sl_data);


        $result = curl_exec($ch);//执行并获取数据


        curl_close($ch);
		
		

        $result1 = json_decode($result,true);


        $result = json($result1);

//dump($result);

        return $result;








    }
}