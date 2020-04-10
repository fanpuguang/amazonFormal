<?php

namespace app\admin\controller;

use app\admin\model\AuthRule;
use app\admin\model\Options;
use think\Db;
use think\Cache;

class Sell extends Base
{

    /*
     * 跟卖列表
     * @author liujie
     */
    public function sell_list()
    {
        $fwq=Db::name('fwq')->order('fwq_id desc')->paginate(config('paginate.list_rows'));
        $page = $fwq->render();
        $this->assign('fwq',$fwq);
        $this->assign('page',$page);
        return $this->fetch();
    }
    
   
   
}