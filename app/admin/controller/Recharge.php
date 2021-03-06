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

class Recharge extends Base
{
    /***
     **充值列表
     ***/
    public function chongzhilist()
    {
        $pid = session('admin_auth.aid');
        //查询用户余额
        $admin1=Db::name('admin')->where("admin_id =".session('admin_auth.aid'))->field('money,admin_realname')->find();

        $money_list=Db::name('money_czjl')->where('cz_uid ='.$pid)->order('add_time desc')->paginate(config('paginate.list_rows'),false,['query'=>get_query()]);
        $page = $money_list->render();
        
        $this->assign('money',$admin1['money']);
        $this->assign('admin_realname',$admin1['admin_realname']);
        $this->assign('money_list',$money_list);
        $this->assign('page',$page);

        return $this->fetch();
    }
    /***
     **所有充值列表
     ***/
    public function chongzhilists()
    {
        $pid = session('admin_auth.aid');
        //查询用户余额
        $admin1=Db::name('admin')->field('admin_id,admin_realname')->select();

        $money_list=Db::name('money_czjl')->order('add_time desc')->paginate(config('paginate.list_rows'),false,['query'=>get_query()]);
        $page = $money_list->render();

        $this->assign('admin1',$admin1);
        $this->assign('money_list',$money_list);
        $this->assign('page',$page);
        return $this->fetch();
    }





}