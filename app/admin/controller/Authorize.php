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
use app\admin\model\Options;
use think\Db;
use think\Cache;

class Authorize extends Base
{

    /*
     * 服务器列表
     * @author liujie
     */
    public function fwq_list()
    {
        $fwq=Db::name('fwq')->order('fwq_id desc')->paginate(config('paginate.list_rows'));
        $page = $fwq->render();
        $this->assign('fwq',$fwq);
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
    /*
     * 修改排序
     * @author liujie
     */
    public function fwq_order()
    {
        if (!request()->isAjax()){
            $this->error('提交方式不正确',url('admin/Sys/source_list'));
        }else{
            foreach (input('post.') as $source_id => $source_order){
                Db::name('source')->where(array('source_id' => $source_id ))->setField('source_order' , $source_order);
            }
            $this->success('排序更新成功',url('admin/Sys/source_list'));
        }
    }
    /**
     * 权限(后台菜单)列表
     */
    public function admin_rule_list()
    {
        $pid=input('pid',0);
        $level=input('level',0);
        $id_str=input('id','pid');
        $admin_rule=Db::name('auth_rule')->where('pid',$pid)->order('sort')->select();
        $admin_rule_all=Db::name('auth_rule')->order('sort')->select();
        $arr = menu_left($admin_rule,'id','pid','─',$pid,$level,$level*20);
        $arr_all = menu_left($admin_rule_all,'id','pid','─',0,$level,$level*20);
        $this->assign('admin_rule',$arr);
        $this->assign('admin_rule_all',$arr_all);
        $this->assign('pid',$id_str);
        if(request()->isAjax()){
            return $this->fetch('ajax_admin_rule_list');
        }else{
            return $this->fetch();
        }
    }
    /**
     * 权限(后台菜单)添加
     */
    public function admin_rule_add()
    {
        $pid=input('pid',0);
        //全部规则
        $admin_rule_all=Db::name('auth_rule')->order('sort')->select();
        $arr = menu_left($admin_rule_all);
        $this->assign('admin_rule',$arr);
        $this->assign('pid',$pid);
        return $this->fetch();
    }
    /**
     * 权限(后台菜单)添加操作
     */
    public function admin_rule_runadd()
    {
        if(!request()->isAjax()){
            $this->error('提交方式不正确',url('admin/Sys/admin_rule_list'));
        }else{
            $pid=Db::name('auth_rule')->where(array('id'=>input('pid')))->field('level')->find();
            $level=$pid['level']+1;
            $name=input('name');
            $name=AuthRule::check_name($name,$level);
            if($name){
                $sldata=array(
                    'name'=>$name,
                    'title'=>input('title'),
                    'status'=>input('status',0,'intval'),
                    'sort'=>input('sort',50,'intval'),
                    'pid'=>input('pid'),
                    'notcheck'=>input('notcheck',0,'intval'),
                    'addtime'=>time(),
                    'css'=>input('css',''),
                    'level'=>$level,
                );
                Db::name('auth_rule')->insert($sldata);
                Cache::clear();
                $this->success('权限添加成功',url('admin/Sys/admin_rule_list'),1);
            }else{
                $this->error('控制器或方法不存在,或提交格式不规范',url('admin/Sys/admin_rule_list'));
            }
        }
    }
    /**
     * 权限(后台菜单)显示/隐藏
     */
    public function admin_rule_state()
    {
        $id=input('x');
        $statusone=Db::name('auth_rule')->where(array('id'=>$id))->value('status');//判断当前状态情况
        if($statusone==1){
            $statedata = array('status'=>0);
            Db::name('auth_rule')->where(array('id'=>$id))->setField($statedata);
            Cache::clear();
            $this->success('状态禁止');
        }else{
            $statedata = array('status'=>1);
            Db::name('auth_rule')->where(array('id'=>$id))->setField($statedata);
            Cache::clear();
            $this->success('状态开启');
        }
    }
    /**
     * 权限(后台菜单)检测/不检测
     */
    public function admin_rule_notcheck()
    {
        $id=input('x');
        $statusone=Db::name('auth_rule')->where(array('id'=>$id))->value('notcheck');//判断当前状态情况
        if($statusone==1){
            $statedata = array('notcheck'=>0);
            Db::name('auth_rule')->where(array('id'=>$id))->setField($statedata);
            Cache::clear();
            $this->success('检测');
        }else{
            $statedata = array('notcheck'=>1);
            Db::name('auth_rule')->where(array('id'=>$id))->setField($statedata);
            Cache::clear();
            $this->success('不检测');
        }
    }
    /**
     * 权限(后台菜单)排序
     */
    public function admin_rule_order()
    {
        if (!request()->isAjax()){
            $this->error('提交方式不正确',url('admin/Sys/admin_rule_list'));
        }else{
            foreach ($_POST as $id => $sort){
                Db::name('auth_rule')->where(array('id' => $id ))->setField('sort' , $sort);
            }
            Cache::clear();
            $this->success('排序更新成功',url('admin/Sys/admin_rule_list'));
        }
    }
    /**
     * 权限(后台菜单)编辑
     */
    public function admin_rule_edit()
    {
        //全部规则
        $admin_rule_all=Db::name('auth_rule')->order('sort')->select();
        $arr = menu_left($admin_rule_all);
        $this->assign('admin_rule',$arr);
        //待编辑规则
        $admin_rule=Db::name('auth_rule')->where(array('id'=>input('id')))->find();
        $this->assign('rule',$admin_rule);
        return $this->fetch();
    }
    /**
     * 权限(后台菜单)通过复制添加
     */
    public function admin_rule_copy()
    {
        //全部规则
        $admin_rule_all=Db::name('auth_rule')->order('sort')->select();
        $arr = menu_left($admin_rule_all);
        $this->assign('admin_rule',$arr);
        //待编辑规则
        $admin_rule=Db::name('auth_rule')->where(array('id'=>input('id')))->find();
        $this->assign('rule',$admin_rule);
        return $this->fetch();
    }
    /**
     * 权限(后台菜单)编辑操作
     */
    public function admin_rule_runedit()
    {
        if(!request()->isAjax()){
            $this->error('提交方式不正确',url('admin/Sys/admin_rule_list'));
        }else{
            $name=input('name');
            $old_pid=input('old_pid');
            $old_level=input('old_level',0,'intval');
            $pid=input('pid');
            $level_diff=0;
            //判断是否更改了pid
            if($pid!=$old_pid){
                $level=Db::name('auth_rule')->where('id',$pid)->value('level')+1;
                $level_diff=($level>$old_level)?($level-$old_level):($old_level-$level);
            }else{
                $level=$old_level;
            }
            $name=AuthRule::check_name($name,$level);
            if($name){
                $sldata=array(
                    'id'=>input('id',1,'intval'),
                    'name'=>$name,
                    'title'=>input('title'),
                    'status'=>input('status',0,'intval'),
                    'notcheck'=>input('notcheck',0,'intval'),
                    'pid'=>input('pid',0,'intval'),
                    'css'=>input('css'),
                    'sort'=>input('sort'),
                    'level'=>$level
                );
                $rst=Db::name('auth_rule')->update($sldata);
                if($rst!==false){
                    if($pid!=$old_pid){
                        //更新子孙级菜单的level
                        $auth_rule=Db::name('auth_rule')->order('sort')->select();
                        $tree=new \Tree();
                        $tree->init($auth_rule,['parentid'=>'pid']);
                        $ids=$tree->get_childs($auth_rule,$sldata['id'],true,false);
                        if($ids){
                            if($level>$old_level){
                                Db::name('auth_rule')->where('id','in',$ids)->setInc('level',$level_diff);
                            }else{
                                Db::name('auth_rule')->where('id','in',$ids)->setDec('level',$level_diff);
                            }
                        }
                    }
                    Cache::clear();
                    $this->success('权限修改成功',url('admin/Sys/admin_rule_list'));
                }else{
                    $this->error('权限修改失败',url('admin/Sys/admin_rule_list'));
                }
            }else{
                $this->error('控制器或方法不存在,或提交格式不规范',url('admin/Sys/admin_rule_list'));
            }
        }
    }
    /**
     * 权限(后台菜单)删除
     */
    public function admin_rule_del()
    {
        $pid=input('id');
        $arr=Db::name('auth_rule')->select();
        $tree=new \Tree();
        $tree->init($arr,['parentid'=>'pid']);
        $arrTree=$tree->get_childs($arr,$pid,true,true);
        if($arrTree){
            $rst=Db::name('auth_rule')->where('id','in',$arrTree)->delete();
            if($rst!==false){
                Cache::clear();
                $this->success('权限删除成功',url('admin/Sys/admin_rule_list'));
            }else{
                $this->error('权限删除失败',url('admin/Sys/admin_rule_list'));
            }
        }else{
            $this->error('权限删除失败',url('admin/Sys/admin_rule_list'));
        }
    }
    /*
     * 数据备份显示
     */
    public function database($type = null)
    {
        if(empty($type)){
            $type='export';
        }
        $title='';
        $list=array();
        switch ($type) {
            /* 数据还原 */
            case 'import':
                //列出备份文件列表
                $path=config('db_path');
                if (!is_dir($path)) {
                    mkdir($path, 0755, true);
                }
                $path = realpath($path);
                $flag = \FilesystemIterator::KEY_AS_FILENAME;
                $glob = new \FilesystemIterator($path,  $flag);

                $list = array();
                foreach ($glob as $name => $file) {
                    if(preg_match('/^\d{8,8}-\d{6,6}-\d+\.sql(?:\.gz)?$/', $name)){
                        $name = sscanf($name, '%4s%2s%2s-%2s%2s%2s-%d');

                        $date = "{$name[0]}-{$name[1]}-{$name[2]}";
                        $time = "{$name[3]}:{$name[4]}:{$name[5]}";
                        $part = $name[6];

                        if(isset($list["{$date} {$time}"])){
                            $info = $list["{$date} {$time}"];
                            $info['part'] = max($info['part'], $part);
                            $info['size'] = $info['size'] + $file->getSize();
                        } else {
                            $info['part'] = $part;
                            $info['size'] = $file->getSize();
                        }
                        $extension        = strtoupper(pathinfo($file->getFilename(), PATHINFO_EXTENSION));
                        $info['compress'] = ($extension === 'SQL') ? '-' : $extension;
                        $info['time']     = strtotime("{$date} {$time}");
                        $list["{$date} {$time}"] = $info;
                    }
                }
                $title = '数据还原';
                break;

            /* 数据备份 */
            case 'export':
                $list  = Db::query('SHOW TABLE STATUS FROM '.config('database.database'));
                $list  = array_map('array_change_key_case', $list);
                //过滤非本项目前缀的表
                foreach($list as $k=>$v){
                    if(stripos($v['name'],strtolower(config('database.prefix')))!==0){
                        unset($list[$k]);
                    }
                }
                $title = '数据备份';
                break;

            default:
                $this->error('参数错误！');
        }

        //渲染模板
        $this->assign('meta_title', $title);
        $this->assign('data_list', $list);
        return $this->fetch($type);
    }
    /*
     * 数据还原显示
     */
    public function import()
    {
        $path=config('db_path');
        if (!is_dir($path)) {
            mkdir($path, 0755, true);
        }
        $path = realpath($path);
        $flag = \FilesystemIterator::KEY_AS_FILENAME;
        $glob = new \FilesystemIterator($path,$flag);

        $list = array();
        foreach ($glob as $name => $file) {
            if(preg_match('/^\d{8,8}-\d{6,6}-\d+\.sql(?:\.gz)?$/', $name)){
                $name = sscanf($name, '%4s%2s%2s-%2s%2s%2s-%d');

                $date = "{$name[0]}-{$name[1]}-{$name[2]}";
                $time = "{$name[3]}:{$name[4]}:{$name[5]}";
                $part = $name[6];

                if(isset($list["{$date} {$time}"])){
                    $info = $list["{$date} {$time}"];
                    $info['part'] = max($info['part'], $part);
                    $info['size'] = $info['size'] + $file->getSize();
                } else {
                    $info['part'] = $part;
                    $info['size'] = $file->getSize();
                }
                $extension        = strtoupper(pathinfo($file->getFilename(), PATHINFO_EXTENSION));
                $info['compress'] = ($extension === 'SQL') ? '-' : $extension;
                $info['time']     = strtotime("{$date} {$time}");

                $list["{$date} {$time}"] = $info;
            }
        }
        //渲染模板
        $this->assign('data_list', $list);
        return $this->fetch();
    }
    /**
     * 优化表
     * @param  String $tables 表名
     * @author rainfer <81818832@qq.com>
     */
    public function optimize($tables = null)
    {
        if($tables) {
            if(is_array($tables)){
                $tables = implode('`,`', $tables);
                $list = Db::query("OPTIMIZE TABLE `{$tables}`");
                if($list){
                    $this->success("数据表优化完成！");
                } else {
                    $this->error("数据表优化出错请重试！");
                }
            } else {
                $list = Db::query("OPTIMIZE TABLE `{$tables}`");
                if($list){
                    $this->success("数据表'{$tables}'优化完成！");
                } else {
                    $this->error("数据表'{$tables}'优化出错请重试！");
                }
            }
        } else {
            $this->error("请指定要优化的表！");
        }
    }
    /**
     * 修复表
     * @param  String $tables 表名
     * @author rainfer <81818832@qq.com>
     */
    public function repair($tables = null)
    {
        if($tables) {
            if(is_array($tables)){
                $tables = implode('`,`', $tables);
                $list = Db::query("REPAIR TABLE `{$tables}`");
                if($list){
                    $this->success("数据表修复完成！");
                } else {
                    $this->error("数据表修复出错请重试！");
                }
            } else {
                $list = Db::query("REPAIR TABLE `{$tables}`");
                if($list){
                    $this->success("数据表'{$tables}'修复完成！");
                } else {
                    $this->error("数据表'{$tables}'修复出错请重试！");
                }
            }
        } else {
            $this->error("请指定要修复的表！");
        }
    }
    /**
     * 备份单表
     * @param  String $table 不含前缀表名
     * @author rainfer <81818832@qq.com>
     */
    public function exportsql($table = null)
    {
        if($table){
            if(stripos($table,config('database.prefix'))==0){
                //含前缀的表,去除表前缀
                $table=str_replace(config('database.prefix'),"",$table);
            }
            if (!db_is_valid_table_name($table)) {
                $this->error("不存在表" . ' ' . $table);
            }
            force_download_content(date('Ymd') . '_' . config('database.prefix') . $table . '.sql', db_get_insert_sqls($table));
        }else{
            $this->error('未指定需备份的表');
        }
    }
    /**
     * 删除备份文件
     * @param  Integer $time 备份时间
     * @author rainfer <81818832@qq.com>
     */
    public function del($time = 0)
    {
        if($time){
            $name  = date('Ymd-His', $time) . '-*.sql*';
            $path  = realpath(config('db_path')) . DS . $name;
            array_map("unlink", glob($path));
            if(count(glob($path))){
                $this->error('备份文件删除失败，请检查权限！',url('admin/Sys/import'));
            } else {
                $this->success('备份文件删除成功！',url('admin/Sys/import'));
            }
        } else {
            $this->error('参数错误！',url('admin/Sys/import'));
        }
    }
    /*
     * 数据还原
     */
    public function restore($time = 0, $part = null, $start = null)
    {
        //读取备份配置
        $config = array(
            'path'     => realpath(config('db_path')) . DS,
            'part'     => config('db_part'),
            'compress' => config('db_compress'),
            'level'    => config('db_level'),
        );
        if(is_numeric($time) && is_null($part) && is_null($start)){ //初始化
            //获取备份文件信息
            $name  = date('Ymd-His', $time) . '-*.sql*';
            $path  = realpath(config('db_path')) . DS . $name;
            $files = glob($path);
            $list  = array();
            foreach($files as $name){
                $basename = basename($name);
                $match    = sscanf($basename, '%4s%2s%2s-%2s%2s%2s-%d');
                $gz       = preg_match('/^\d{8,8}-\d{6,6}-\d+\.sql.gz$/', $basename);
                $list[$match[6]] = array($match[6], $name, $gz);
            }
            ksort($list);
            //检测文件正确性
            $last = end($list);
            if(count($list) === $last[0]){
                session('backup_list', $list); //缓存备份列表
                $this->restore(0,1,0);
            } else {
                $this->error('备份文件可能已经损坏，请检查！');
            }
        } elseif(is_numeric($part) && is_numeric($start)) {
            $list  = session('backup_list');
            $db = new \Database($list[$part],$config);
            $start = $db->import($start);
            if(false === $start){
                $this->error('还原数据出错！');
            } elseif(0 === $start) { //下一卷
                if(isset($list[++$part])){
                    //$data = array('part' => $part, 'start' => 0);
                    $this->restore(0,$part,0);
                } else {
                    session('backup_list', null);
                    $this->success('还原完成！',url('admin/Sys/import'));
                }
            } else {
                $data = array('part' => $part, 'start' => $start[0]);
                if($start[1]){
                    $this->restore(0,$part, $start[0]);
                } else {
                    $data['gz'] = 1;
                    $this->restore(0,$part, $start[0]);
                }
            }
        } else {
            $this->error('参数错误！');
        }
    }
    /*
     * 数据备份
     */
    public function export($tables = null, $id = null, $start = null)
    {
        if(request()->isPost() && !empty($tables) && is_array($tables)){ //初始化
            //读取备份配置
            $config = array(
                'path'     => realpath(config('db_path')) . DS,
                'part'     => config('db_part'),
                'compress' => config('db_compress'),
                'level'    => config('db_level'),
            );
            //检查是否有正在执行的任务
            $lock = "{$config['path']}backup.lock";
            if(is_file($lock)){
                $this->error('检测到有一个备份任务正在执行，请稍后再试！');
            } else {
                //创建锁文件
                file_put_contents($lock, time());
            }
            //检查备份目录是否可写
            is_writeable($config['path']) || $this->error('备份目录不存在或不可写，请检查后重试！');
            session('backup_config', $config);
            //生成备份文件信息
            $file = array(
                'name' => date('Ymd-His', time()),
                'part' => 1,
            );
            session('backup_file', $file);
            //缓存要备份的表
            session('backup_tables', $tables);
            //创建备份文件
            $Database = new \Database($file, $config);
            if(false !== $Database->create()){
                $tab = array('id' => 0, 'start' => 0);
                return json(array('code'=>1,'tab' => $tab,'tables' => $tables,'msg'=>'初始化成功！'));
            } else {
                $this->error('初始化失败，备份文件创建失败！');
            }
        } elseif (request()->isGet() && is_numeric($id) && is_numeric($start)) { //备份数据
            $tables = session('backup_tables');
            //备份指定表
            $Database = new \Database(session('backup_file'), session('backup_config'));
            $start  = $Database->backup($tables[$id], $start);
            if(false === $start){ //出错
                $this->error('备份出错！');
            } elseif (0 === $start) { //下一表
                if(isset($tables[++$id])){
                    $tab = array('id' => $id, 'start' => 0);
                    return json(array('code'=>1,'tab' => $tab,'msg'=>'备份完成！'));
                } else { //备份完成，清空缓存
                    unlink(session('backup_config.path') . 'backup.lock');
                    session('backup_tables', null);
                    session('backup_file', null);
                    session('backup_config', null);
                    return json(array('code'=>1,'msg'=>'备份完成！'));
                }
            } else {
                $tab  = array('id' => $id, 'start' => $start[0]);
                $rate = floor(100 * ($start[0] / $start[1]));
                return json(array('code'=>1,'tab' => $tab,'msg'=>"正在备份...({$rate}%)"));
            }
        } else { //出错
            $this->error('参数错误！');
        }
    }
    /*
     * Excel导入
     */
    public function excel_import()
    {
        return $this->fetch();
    }
    /*
     * Excel导出
     */
    public function excel_export()
    {
        $list  = Db::query('SHOW TABLE STATUS FROM '.config('database.database'));
        $list  = array_map('array_change_key_case', $list);
        //过滤非本项目前缀的表
        foreach($list as $k=>$v){
            if(stripos($v['name'],strtolower(config('database.prefix')))!==0){
                unset($list[$k]);
            }
        }
        $this->assign('data_list', $list);
        return $this->fetch();
    }
    /*
     * 表格导入
     * @author rainfer <81818832@qq.com>
     */
    public function excel_runimport()
    {
        if (! empty ( $_FILES ['file_stu'] ['name'] )){
            $tmp_file = $_FILES ['file_stu'] ['tmp_name'];
            $file_types = explode ( ".", $_FILES ['file_stu'] ['name'] );
            $file_type = $file_types [count ( $file_types ) - 1];
            /*判别是不是.xls文件，判别是不是excel文件*/
            if (strtolower ( $file_type ) != "xls"){
                $this->error ( '不是Excel文件，重新上传',url('admin/Sys/excel_import'));
            }
            /*设置上传路径*/
            $savePath =ROOT_PATH. 'public/excel/';
            /*以时间来命名上传的文件*/
            $str = time ();
            $file_name = $str . "." . $file_type;
            if (! copy ( $tmp_file, $savePath . $file_name )){
                $this->error ('上传失败',url('admin/Sys/excel_import'));
            }
            $res = read ( $savePath . $file_name );
            if (!$res){
                $this->error ('数据处理失败',url('admin/Sys/excel_import'));
            }
            $titles=array();
            foreach ( $res as $k => $v ){
                if ($k != 1){
                    $data=array();
                    foreach($titles as $ColumnIndex=>$title){
                        //排除主键
                        if($title!='n_id'){
                            $data[$title]=$v[$ColumnIndex];
                        }
                    }
                    $result = Db::name ('news')->insert($data);
                    if (!$result){
                        $this->error ('导入数据库失败',url('admin/Sys/excel_import'));
                    }
                }else{
                    $titles=$v;
                }
            }
            $this->success ('导入数据库成功',url('admin/Sys/excel_import'));
        }
    }
    /*
     * 数据导出功能
     * @author rainfer <81818832@qq.com>
     */
    public function excel_runexport($table)
    {
        export2excel($table);
    }
    /*
     * 清理缓存
     */
    public function clear()
    {
        Cache::clear();
        $this->success ('清理缓存成功');
    }
}