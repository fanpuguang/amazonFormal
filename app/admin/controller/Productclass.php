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
use think\Db;
use think\Cache;

class Productclass extends Base
{

    /*
     * 产品列表
     * @author liujie
     */
    public function productclasslist()
    {


        $list=$this->db2->table('ProductCategories')->order('parentId asc')->select();
        $list = $this->tree($list,0,"",0);
        $this->assign('list',$list);

        return $this->fetch();

    }
    //添加分类 addclassify
    public function addclassify(){
        $id = input('categoryId','');

        if (!empty($id)){

            $list = $this->db2->table('ProductCategories')->where('categoryId='.$id)->find();
            $this->assign('list',$list);
           // dump($list);die;
        }

        $all_fl = $this->db2->table('ProductCategories')->order('px desc')->select();
        $all_fl = $this->tree($all_fl,0,"",0);
        $this->assign('all_fl',$all_fl);
        return $this->fetch();
    }
    //添加分类到数据库 addclassifydata
    public function addclassifydata(){
        $data = input();
        if ($this->db2->table('ProductCategories')->insert($data)){
            $this->success('添加成功');
        }else{
            $this->error('添加失败');
        }
    }
    //修改分类 editclassify
public function editclassify(){

        $id =input('categoryId','');
        $list = $this->db2->table('ProductCategories')->where('categoryId='.$id)->find();
        $this->assign('list',$list);

        $all_fl = $this->db2->table('ProductCategories')->order('px desc')->select();
        $all_fl = $this->tree($all_fl,0,"",0);
        $this->assign('all_fl',$all_fl);

        return $this->fetch();
    }
    //修改分类到数据库 editclassifydata
    public  function editclassifydata(){
        $data = $_POST;
       // dump($data);die;
        if ($this->db2->table('ProductCategories')->where('categoryId='.$_POST['categoryId'])->update($data)){
            $this->success('产品分类修改成功',url('admin/Productclass/productclasslist'));
        }else{
            $this->success('产品分类修改失败');
        }
    }
    //删除分类 delclassify
    public function delclassify(){
        $id = $_GET['categoryId'] + 0;
        if (!$id){
            return '请按正常流程操作';
        }

        if ($this->db2->table('ProductCategories')->where('categoryId='.$id)->delete()){
            $this->db2->table('ProductCategories')->where('parentId='.$id)->delete();
            $this->success('删除成功');
        }else{
            $this->error('删除失败');
        }
    }

    //显示二级栏目
    public function showclass22(){

        $id =input('id');

        $address =$this->db2->table('ProductCategories')->where('parentId='.$id)->select();

        $str = "<option value=\"\">二级分类</option>";
        foreach($address as $k=>$v){
            $str .="<option value=".$v['categoryId'].">".$v['categoryName']."</option>";
        }
        echo $str;
    }
    //显示三级栏目
   public function showclass33(){
        $id = $_POST['id'];
        $address =$this->db2->table('ProductCategories')->where('parentId='.$id)->select();
        $str = "<option value=\"\">三级分类</option>";
        foreach($address as $k=>$v){
            $str .="<option value=".$v['categoryId'].">".$v['categoryName']."</option>";
        }
        echo $str;
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


}