<?php
// +----------------------------------------------------------------------

// +----------------------------------------------------------------------
namespace app\admin\controller;

use app\admin\model\AuthRule;
use app\admin\model\Options;
use think\Db;
use app\admin\controller\Database;
use think\Cache;

class Dataanalysis extends Base
{

    /*
     * 大数据列表
     * @author liujie
     */
    public function dataanalysis_list()
    {
        //榜单产品列表
        $aa = new Database();
        $dataanalysis =$aa->db2->table('amaz_raking')->order('id desc')->paginate(config('paginate.list_rows'));
        $page = $dataanalysis->render();
        $this->assign('dataanalysis',$dataanalysis);
        //dump($dataanalysis);die;
        $this->assign('page',$page);
        return $this->fetch();
    }




























    /*
     * 添加服务器操作
     * @author liujie
     */
    public function fwq_runadd()
    {
        if (!request()->isAjax()){
            $this->error('提交方式不正确',url('admin/Fwq/fwq_list'));
        }else{
            $data=input('post.');
            Db::name('fwq')->insert($data);
            $this->success('服务器添加成功',url('admin/Fwq/fwq_list'));
        }
    }
    /*
     * 服务器删除操作
     * @author liujie
     */
    public function fwq_del()
    {
        $p=input('p');
        $rst=Db::name('fwq')->where(array('fwq_id'=>input('fwq_id')))->delete();
        if($rst!==false){
            $this->success('服务器删除成功',url('admin/Fwq/fwq_list',array('p' => $p)));
        }else{
            $this->error('服务器删除失败',url('admin/Fwq/fwq_list',array('p' => $p)));
        }
    }
    /*
     * 服务器修改返回值操作
     * @author liujie
     */
    public function fwq_edit()
    {
        $fwq_id=input('fwq_id');
        //var_dump($fwq_id);die;
        $fwq=Db::name('fwq')->where(array('fwq_id'=>$fwq_id))->find();
        $sl_data['fwq_id']=$fwq['fwq_id'];
        $sl_data['fwq_name']=$fwq['fwq_name'];
        $sl_data['fwq_ip']=$fwq['fwq_ip'];
        $sl_data['yyzzfr']=$fwq['yyzzfr'];

        $sl_data['fwq_password']=$fwq['fwq_password'];
        $sl_data['gm_time']=$fwq['gm_time'];
        $sl_data['dq_time']=$fwq['dq_time'];

        $sl_data['fwq_gys']=$fwq['fwq_gys'];
        $sl_data['fwq_glz']=$fwq['fwq_glz'];
        $sl_data['fwq_dyctzh']=$fwq['fwq_dyctzh'];

        $sl_data['code']=1;

        return json($sl_data);
    }
    /*
     * 修改服务器操作
     * @author liujie
     */
    public function fwq_runedit()
    {
        if (!request()->isAjax()){
            $this->error('提交方式不正确',url('admin/Fwq/fwq_list'));
        }else{
            $sl_data=array(
                'fwq_id'=>input('fwq_id'),
                'fwq_name'=>input('fwq_name'),
                'fwq_ip'=>input('fwq_ip'),
                'yyzzfr'=>input('yyzzfr'),
                'fwq_password'=>input('fwq_password'),
                'gm_time'=>input('gm_time'),
                'dq_time'=>input('dq_time'),
                'fwq_gys'=>input('fwq_gys'),
                'fwq_glz'=>input('fwq_glz'),
                'fwq_dyctzh'=>input('fwq_dyctzh'),

            );
            $rst=Db::name('fwq')->update($sl_data);
            if($rst!==false){
                $this->success('服务器修改成功',url('admin/Fwq/fwq_list'));
            }else{
                $this->error('服务器修改失败',url('admin/Fwq/fwq_list'));
            }
        }
    }

}