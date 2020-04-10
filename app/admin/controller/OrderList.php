<?php
// +----------------------------------------------------------------------
// | YFCMF [ WE CAN DO IT MORE SIMPLE ]
// +----------------------------------------------------------------------
// | Copyright (c) 2015-2016 http://www.rainfer.cn All rights reserved.
// +----------------------------------------------------------------------
// | Author: rainfer <81818832@qq.com>
// +----------------------------------------------------------------------
namespace app\admin\controller;

use app\admin\model\OrderList as OrderListModel;
use think\Db;
use think\Cache;
use think\cache\driver\Redis;
class OrderList extends Base
{

    public function listOrders(){
//         echo 11;die;
      // $plug = Db::name('plug_sug')->order('plug_uid')->select();
      //   dump($plug[0]);die;
       // $list = new OrderListModel();
       // $res = $list->listOrders(1);
       // dump($res);
      $OrderListModel = new OrderListModel();
      $request['area'] = "eu";
      $request['SellerId'] = "A22MV3GXUGEVAL";
      $request['MWSAuthToken'] = "amzn.mws.04b67143-0702-7741-85a3-54fa7fd629e4";
      $request['createdAfter'] = "2019-07-01";
      $res = $OrderListModel->createdAfter($request);
      dump($res);die;
    }
    public function test(){
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
        $Redis=new Redis($config);
//        $data = ['type'=>1,'ta'=>'asdf','asdga'=>'asdfasdadsasd'];

//       echo  $Redis->LPush('ks',123);
//        $Redis->rm('k');
//        $Redis->set('k',$data);
//        $res = $Redis->get('k');
        $r = $Redis->rpush('st_info',['v8','v9']);
        $res = $Redis->lranges('st_info',1,10);
//        dump($Redis->get('st_info'));
            dump($res);
    }
}