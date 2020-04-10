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
use think\Validate;

class Dianpu extends Base
{
	protected $files_res_exists;
	protected $files_res_used;
	protected $files_unused;


	/*
     * 亚马逊店铺管理
	 * @author liujie
     */
	public function dianpu_ad_list()
	{

		$dianpu_ad_list=Db::name('dianpu')->order('dianpu_id desc')->paginate(config('paginate.list_rows'),false,['query'=>get_query()]);
		$show = $dianpu_ad_list->render();
		$show=preg_replace("(<a[^>]*page[=|/](\d+).+?>(.+?)<\/a>)","<a href='javascript:ajax_page($1);'>$2</a>",$show);
		$this->assign('dianpu_ad_list',$dianpu_ad_list);
		$this->assign('page',$show);
		//dump($dianpu_ad_list);die;
		if(request()->isAjax()){
			return $this->fetch('ajax_dianpu_ad_list');
		}else{
			return $this->fetch();
		}	
	}
	/*
     * 添加店铺操作
	 * @author liujie
     */
	public function dianpu_ad_runadd()
	{
		if (!request()->isAjax()){
			$this->error('提交方式不正确',url('admin/dianpu/dianpu_ad_list'));
		}else{

			//构建数组
			$sl_data=array(
                'yyzzfr'=>input('yyzzfr'),
                'zc_time'=>input('zc_time'),
                'dianpu_name'=>input('dianpu_name'),
                'dianpu_password'=>input('dianpu_password'),
                'dianpu_email'=>input('dianpu_email'),
                'dianpu_emailpassword'=>input('dianpu_emailpassword'),
                'zhandian'=>input('zhandian'),
                'dianpu_jizhu'=>input('dianpu_jizhu'),
                'dianpu_phone'=>input('dianpu_phone'),
                'dianpu_yhkhjz'=>input('dianpu_yhkhjz'),
                'dianpu_yhkh'=>input('dianpu_yhkh'),
                'dianpu_yhmc'=>input('dianpu_yhmc'),
                'dianpu_yhkhkr'=>input('dianpu_yhkhkr'),
			);
			$rst=Db::name('dianpu')->insert($sl_data);
			if($rst!==false){
				$this->success('亚马逊店铺添加成功',url('admin/dianpu/dianpu_ad_list'));
			}else{
				$this->error('亚马逊店铺添加失败',url('admin/dianpu/dianpu_ad_list'));
			}
		}
	}





	/*
     * 店铺状态
	 * @author liujie
     */
	public function dianpu_ad_state()
	{
		$id=input('x');
		$status=Db::name('dianpu')->where(array('dianpu_id'=>$id))->value('dianpu_zt');//判断当前状态情况
		if($status==1){
			$statedata = array('dianpu_zt'=>0);
			Db::name('dianpu')->where(array('dianpu_id'=>$id))->setField($statedata);
			$this->success('状态禁止');
		}else{
			$statedata = array('dianpu_zt'=>1);
			Db::name('dianpu')->where(array('dianpu_id'=>$id))->setField($statedata);
			$this->success('状态开启');
		}
	}

	/*
     * 店铺修改操作
	 * @author liujie
     */
	public function dianpu_ad_edit()
	{
        $dianpu_id=input('dianpu_id');
		$dianpu=Db::name('dianpu')->where(array('dianpu_id'=>$dianpu_id))->find();
		$this->assign('dianpu_id',$dianpu_id);
		$this->assign('dianpu',$dianpu);
		//dump($dianpu);die;
		return $this->fetch();

	}

	/*
     * 修改店铺操作
	 * @author liujie
     */
	public function dianpu_ad_runedit()
	{
		if (!request()->isAjax()){
			$this->error('提交方式不正确',url('admin/dianpu/dianpu_ad_list'));
		}else{

			$sl_data=array(
				'dianpu_id'=>input('dianpu_id'),
				'yyzzfr'=>input('yyzzfr'),
				'zc_time'=>input('zc_time'),
				'dianpu_name'=>input('dianpu_name'),
				'dianpu_password'=>input('dianpu_password'),
				'dianpu_email'=>input('dianpu_email'),
				'dianpu_emailpassword'=>input('dianpu_emailpassword'),
                'zhandian'=>input('zhandian'),
				'dianpu_jizhu'=>input('dianpu_jizhu'),
				'dianpu_phone'=>input('dianpu_phone'),
				'dianpu_yhkhjz'=>input('dianpu_yhkhjz'),
				'dianpu_yhkh'=>input('dianpu_yhkh'),
				'dianpu_yhmc'=>input('dianpu_yhmc'),
				'dianpu_yhkhkr'=>input('dianpu_yhkhkr'),
			);

			$rst=Db::name('dianpu')->update($sl_data);
			if($rst!==false){
				$this->success('亚马逊店铺修改成功',url('admin/dianpu/dianpu_ad_list'));
			}else{
				$this->error('亚马逊店铺修改失败',url('admin/dianpu/dianpu_ad_list'));
			}
		}
	}

    /*
     * 店铺删除
     * @author liujie
     */
    public function dianpu_ad_del()
    {
        $dianpu_id=input('dianpu_id');
        $rst=Db::name('dianpu')->where(array('dianpu_id'=>$dianpu_id))->delete();
        if($rst!==false){
            $this->success('店铺删除成功',url('admin/dianpu/dianpu_ad_list'));
        }else{
            $this->error('店铺删除失败',url('admin/dianpu/dianpu_ad_list'));
        }
    }


}