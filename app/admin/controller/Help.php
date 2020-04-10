<?php
// +----------------------------------------------------------------------
// | YFCMF [ WE CAN DO IT MORE SIMPLE ]
// +----------------------------------------------------------------------
// | Copyright (c) 2015-2016 http://www.rainfer.cn All rights reserved.
// +----------------------------------------------------------------------
// | Author: rainfer <81818832@qq.com>
// +----------------------------------------------------------------------
namespace app\admin\controller;

use think\Db;
class Help extends Base
{
    public function soft()
	{
        return $this->fetch();
    }
    public function test(){
    	$goods = Db::name('goods')->field('upc')->select();
    	$variant = Db::name('goods_variant')->field('UPC')->select();
    	foreach ($goods as $key => $value) {
    		foreach ($variant as $k => $v) {
    			if($value['upc'] == $v['UPC']){
    				echo $value['upc'];
    				echo "<br/>";
    			}
    		}
    	}
    }
}