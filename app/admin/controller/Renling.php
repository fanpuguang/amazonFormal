<?php
// +----------------------------------------------------------------------
// 
// +----------------------------------------------------------------------
namespace app\admin\controller;
use think\Db;
use app\admin\controller\Database;
use app\admin\model\Goods as GoodsModel;

class Renling extends Base
{
    /***
     **产品认领
     ***/
    public function productrenling()
    {

        //下级员工
        $pid = session('admin_auth.aid');
        $admin=Db::name('admin')->where('fj_id ='.$pid)->field('admin_id,admin_realname')->select();
        $this->assign('admin',$admin);
        //产品分类
        $aa = new Database();
        $list_fenlei =$aa->db2->table('ProductCategories')->order('px desc')->select();
        $list_fenlei = $this->tree($list_fenlei,0,"",0);
        $this->assign('list_fenlei',$list_fenlei);

        $nid=input('nid','');
        $sku=input('sku','');
        $goodsTitle=input('goodsTitle','');
        $yuangong_id=input('zhanghao','');
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


        $fid = session('admin_auth.fj_id');

        $maps = array();
        if ($yuangong_id!='') {

            $maps['fj_uid'] =array('eq',$yuangong_id,'OR');
            $maps['uid']= array('eq',$yuangong_id);
            $maps['product_back']= array('eq',0);

            dump($maps);
            $product = Db::name('goods')->alias('a')->join(config('database.prefix') . 'admin b', 'a.uid=b.admin_id')->where($map)->where($maps)->order('goodsId desc')->paginate(config('paginate.list_rows'), false, ['query' => get_query()]);
            echo  Db::name('goods')->getLastSql();
        }else if($fid == 0){
            $product=Db::name('goods')->alias('a')->join(config('database.prefix').'admin b','a.uid=b.admin_id')->where($map)->where('product_back = 0 ')->order('goodsId desc')->paginate(config('paginate.list_rows'),false,['query'=>get_query()]);

        }else{
            $product = Db::name('goods')->alias('a')->join(config('database.prefix') . 'admin b', 'a.uid=b.admin_id')->where($map)->where('product_back = 0 and fj_uid = ' . $uid)->order('goodsId desc')->paginate(config('paginate.list_rows'), false, ['query' => get_query()]);
        }

        $show = $product->render();
        $show=preg_replace("(<a[^>]*page[=|/](\d+).+?>(.+?)<\/a>)","<a href='javascript:ajax_page($1);'>$2</a>",$show);
        $this->assign('page',$show);
        //dump($product);die;



        $this->assign('product',$product);
        if(request()->isAjax()){
            return $this->fetch('ajax_product_list');
        }else{
            return $this->fetch();
        }
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

}