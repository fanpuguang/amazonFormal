<?php
// +----------------------------------------------------------------------
// | YFCMF [ WE CAN DO IT MORE SIMPLE ]
// +----------------------------------------------------------------------
namespace app\admin\controller;

use think\Db;
use app\admin\model\News as NewsModel;

class News extends Base
{
    /**
     * 产品列表
     */
	public function news_list()
	{
		$keytype=input('keytype','news_title');
		$key=input('key');
		$news_l=input('news_l');
		$opentype_check=input('opentype_check','');
		$news_columnid=input('news_columnid','');
		$diyflag=input('diyflag','');
		//查询：时间格式过滤 获取格式 2015-11-12 - 2015-11-18
		$sldate=input('reservation','');
		$arr = explode(" - ",$sldate);
        if(count($arr)==2){
            $arrdateone=strtotime($arr[0]);
            $arrdatetwo=strtotime($arr[1].' 23:55:55');
            $map['news_time'] = array(array('egt',$arrdateone),array('elt',$arrdatetwo),'AND');
        }
		//map架构查询条件数组
		$map['news_back']= 0;
		if(!empty($key)){
			if($keytype=='news_title'){
				$map[$keytype]= array('like',"%".$key."%");
			}elseif($keytype=='news_author'){
				$map['member_list_username']= array('like',"%".$key."%");
			}else{
				$map[$keytype]= $key;
			}
		}
		if ($opentype_check!=''){
			$map['news_open']= array('eq',$opentype_check);
		}
		if (!empty($news_l)){
			$map['news_l']= array('eq',$news_l);
		}
        if(!config('lang_switch_on')){
            $map['news_l']=  $this->lang;
        }
		if ($news_columnid!=''){
			$ids=get_menu_byid($news_columnid,1,2);
			$map['news_columnid']= array('in',implode(",", $ids));
		}
		$where=$diyflag?"FIND_IN_SET('$diyflag',news_flag)":'';
		$news_model=new NewsModel;
		$news=$news_model->alias("a")->field('a.*,b.*,c.menu_name')
				->join(config('database.prefix').'member_list b','a.news_auto =b.member_list_id')
				->join(config('database.prefix').'menu c','a.news_columnid =c.id')
				->where($map)->where($where)->order('news_time desc')->paginate(config('paginate.list_rows'),false,['query'=>get_query()]);
		$show = $news->render();
		$show=preg_replace("(<a[^>]*page[=|/](\d+).+?>(.+?)<\/a>)","<a href='javascript:ajax_page($1);'>$2</a>",$show);
		$this->assign('page',$show);
		//产品属性数据
		$diyflag_list=Db::name('diyflag')->select();
		$this->assign('diyflag',$diyflag_list);
		//栏目数据
		$menu_text=menu_text($this->lang);
		$this->assign('menu',$menu_text);
		$this->assign('opentype_check',$opentype_check);
		$this->assign('news_columnid',$news_columnid);
		$this->assign('keytype',$keytype);
		$this->assign('keyy',$key);
		$this->assign('news_l',$news_l);
		$this->assign('sldate',$sldate);
		$this->assign('diyflag_check',$diyflag);
//dump($news);die;
		$this->assign('news',$news);
		if(request()->isAjax()){
			return $this->fetch('ajax_news_list');
		}else{
			return $this->fetch();
		}		
	}
    /**
     * 添加显示
     */
	public function news_add()
	{
		$news_columnid=input('news_columnid',0,'intval');
	    $menu_text=menu_text($this->lang);
		$this->assign('menu',$menu_text);
		$diyflag=Db::name('diyflag')->select();
		$source=Db::name('source')->select();
		$this->assign('news_columnid',$news_columnid);
        $this->assign('source',$source);
		$this->assign('diyflag',$diyflag);
		return $this->fetch();
	}
    /**
     * 添加操作
     */
	public function news_runadd()
	{
		if (!request()->isAjax()){
			$this->error('提交方式不正确',url('admin/News/news_list'));
		}
		//上传图片部分
		$img_one='';
		$picall_url='';
		$file = request()->file('pic_one');
		$files = request()->file('pic_all');
		if($file || $files) {
			if(config('storage.storage_open')){
				//七牛
				$upload = \Qiniu::instance();
				$info = $upload->upload();
				$error = $upload->getError();
				if ($info) {
					if($file && $files){
						//有单图、多图
						if(!empty($info['pic_one'])) $img_one= config('storage.domain').$info['pic_one'][0]['key'];
						if(!empty($info['pic_all'])) {
							foreach ($info['pic_all'] as $file) {
								$img_url=config('storage.domain').$file['key'];
								$picall_url = $img_url . ',' . $picall_url;
							}
						}
					}elseif($file){
						//单图
						$img_one= config('storage.domain').$info[0]['key'];
					}else{
						//多图
						foreach ($info as $file) {
							$img_url=config('storage.domain').$file['key'];
							$picall_url = $img_url . ',' . $picall_url;
						}
					}
				}else{
					$this->error($error,url('admin/News/news_list'));//否则就是上传错误，显示错误原因
				}
			}else{
				$validate = config('upload_validate');
				//单图
				if ($file) {
					$info = $file[0]->validate($validate)->rule('uniqid')->move(ROOT_PATH . config('upload_path') . DS . date('Y-m-d'));
					if ($info) {
						$img_url = config('upload_path'). '/' . date('Y-m-d') . '/' . $info->getFilename();
						//写入数据库
						$data['uptime'] = time();
						$data['filesize'] = $info->getSize();
						$data['path'] = $img_url;
						Db::name('plug_files')->insert($data);
						$img_one = $img_url;
					} else {
						$this->error($file->getError(), url('admin/News/news_list'));//否则就是上传错误，显示错误原因
					}
				}
				//多图
				if ($files) {
					foreach ($files as $file) {
						$info = $file->validate($validate)->rule('uniqid')->move(ROOT_PATH . config('upload_path') . DS . date('Y-m-d'));
						if ($info) {
							$img_url = config('upload_path'). '/' . date('Y-m-d') . '/' . $info->getFilename();
							//写入数据库
							$data['uptime'] = time();
							$data['filesize'] = $info->getSize();
							$data['path'] = $img_url;
							Db::name('plug_files')->insert($data);
							$picall_url = $img_url . ',' . $picall_url;
						} else {
							$this->error($file->getError(), url('admin/News/news_list'));//否则就是上传错误，显示错误原因
						}
					}
				}
			}
		}
		//获取产品属性
		$news_flag=input('post.news_flag/a');
		$flag=array();
		if(!empty($news_flag)){
			foreach ($news_flag as $v){
				$flag[]=$v;
			}
		}
		$flagdata=implode(',',$flag);
		$sl_data=array(
			'news_title'=>input('news_title'),
			'news_titleshort'=>input('news_titleshort',''),
			'news_columnid'=>input('news_columnid'),
			'news_flag'=>$flagdata,
			'news_zaddress'=>input('news_zaddress',''),
			'news_key'=>input('news_key',''),
			'news_tag'=>input('news_tag',''),
			'news_source'=>input('news_source',''),
			'news_pic_type'=>input('news_pic_type'),
			'news_pic_content'=>input('news_pic_content',''),
			'news_pic_allurl'=>$picall_url,//多图路径
			'news_img'=>$img_one,//封面图片路径
			'news_open'=>input('news_open',0),
			'news_scontent'=>input('news_scontent',''),
			'news_content'=>htmlspecialchars_decode(input('news_content')),
			'news_auto'=>session('admin_auth.member_id'),
			'news_time'=>time(),
			'listorder'=>input('listorder',50,'intval'),
		);
		//根据栏目id,获取语言
		$news_l=Db::name('menu')->where('id',input('news_columnid'))->value('menu_l');
		$sl_data['news_l']=$news_l;
		//附加字段
		$showtime=input('showdate','');
		$news_extra['showdate']=($showtime=='')?time():strtotime($showtime);
		$sl_data['news_extra']=json_encode($news_extra);
		NewsModel::create($sl_data);
		$continue=input('continue',0,'intval');
		if($continue){
            $this->success('产品添加成功,继续发布',url('admin/News/news_add',['news_columnid'=>input('news_columnid')]));
        }else{
            $this->success('产品添加成功,返回列表页',url('admin/News/news_list'));
        }
	}
	/********************************************************************************************************************************/

    /**
     * 上传图片操作2019/5/10
     */
    public function fileupload()
    {

        //var_dump($_FILES);die;
      /*  if (!request()->isAjax()){
            $this->error('提交方式不正确',url('admin/News/news_list'));
        }
        //上传图片部分
        $img_one='';
        $picall_url='';

        $files = request()->file('pic_all');*/
        $files = $_FILES;
        //var_dump($files);die;
        $file = request()->file('pic_one');
        if($file || $files) {
            if(config('storage.storage_open')){
                //七牛
                $upload = \Qiniu::instance();
                $info = $upload->upload();
                $error = $upload->getError();
                if ($info) {
                    if($file && $files){
                        //有单图、多图
                        if(!empty($info['pic_one'])) $img_one= config('storage.domain').$info['pic_one'][0]['key'];
                        if(!empty($info['pic_all'])) {
                            foreach ($info['pic_all'] as $file) {
                                $img_url=config('storage.domain').$file['key'];
                                $picall_url = $img_url . ',' . $picall_url;
                            }
                        }
                    }elseif($file){
                        //单图
                        $img_one= config('storage.domain').$info[0]['key'];
                    }else{
                        //多图
                        foreach ($info as $file) {
                            $img_url=config('storage.domain').$file['key'];
                            $picall_url = $img_url . ',' . $picall_url;
                        }
                    }
                }else{
                    $this->error($error,url('admin/News/news_list'));//否则就是上传错误，显示错误原因
                }
            }else{
                $validate = config('upload_validate');

                //单图
                if ($file) {
                    $info = $file[0]->validate($validate)->rule('uniqid')->move(ROOT_PATH . config('upload_path') . DS . date('Y-m-d'));
                    if ($info) {
                        $img_url = config('upload_path'). '/' . date('Y-m-d') . '/' . $info->getFilename();
                        //写入数据库
                        $data['uptime'] = time();
                        $data['filesize'] = $info->getSize();
                        $data['path'] = $img_url;
                        Db::name('plug_files')->insert($data);
                        $img_one = $img_url;
                    } else {
                        $this->error($file->getError(), url('admin/News/news_list'));//否则就是上传错误，显示错误原因
                    }
                }
                //多图
                if ($files) {

                    foreach ($files as $file) {
                        $info = $file->validate($validate)->rule('uniqid')->move(ROOT_PATH . config('upload_path') . DS . date('Y-m-d'));

                        if ($info) {
                            $img_url = config('upload_path'). '/' . date('Y-m-d') . '/' . $info->getFilename();
                            var_dump($img_url);die;
                            //写入数据库
                            $data['uptime'] = time();
                            $data['filesize'] = $info->getSize();
                            $data['path'] = $img_url;
                            Db::name('plug_files')->insert($data);
                            $picall_url = $img_url . ',' . $picall_url;
                        } else {

                            $this->error($file->getError(), url('admin/News/news_list'));//否则就是上传错误，显示错误原因
                        }
                    }
                }
            }
        }
        //获取产品属性
        $news_flag=input('post.news_flag/a');
        $flag=array();
        if(!empty($news_flag)){
            foreach ($news_flag as $v){
                $flag[]=$v;
            }
        }
        $flagdata=implode(',',$flag);
        $sl_data=array(
            'news_title'=>input('news_title'),
            'news_titleshort'=>input('news_titleshort',''),
            'news_columnid'=>input('news_columnid'),
            'news_flag'=>$flagdata,
            'news_zaddress'=>input('news_zaddress',''),
            'news_key'=>input('news_key',''),
            'news_tag'=>input('news_tag',''),
            'news_source'=>input('news_source',''),
            'news_pic_type'=>input('news_pic_type'),
            'news_pic_content'=>input('news_pic_content',''),
            'news_pic_allurl'=>$picall_url,//多图路径
            'news_img'=>$img_one,//封面图片路径
            'news_open'=>input('news_open',0),
            'news_scontent'=>input('news_scontent',''),
            'news_content'=>htmlspecialchars_decode(input('news_content')),
            'news_auto'=>session('admin_auth.member_id'),
            'news_time'=>time(),
            'listorder'=>input('listorder',50,'intval'),
        );
        //根据栏目id,获取语言
        $news_l=Db::name('menu')->where('id',input('news_columnid'))->value('menu_l');
        $sl_data['news_l']=$news_l;
        //附加字段
        $showtime=input('showdate','');
        $news_extra['showdate']=($showtime=='')?time():strtotime($showtime);
        $sl_data['news_extra']=json_encode($news_extra);
        NewsModel::create($sl_data);
        $continue=input('continue',0,'intval');
        if($continue){
            $this->success('产品添加成功,继续发布',url('admin/News/news_add',['news_columnid'=>input('news_columnid')]));
        }else{
            $this->success('产品添加成功,返回列表页',url('admin/News/news_list'));
        }
    }
	/********************************************************************************************************************************/
    /**
     * 编辑显示
     */
	public function news_edit()
	{
		$n_id = input('n_id');
		if (empty($n_id)){
			$this->error('参数错误',url('admin/News/news_list'));
		}
		$news_list=NewsModel::get($n_id);
		$news_extra=json_decode($news_list['news_extra'],true);
		$news_extra['showdate']=($news_extra['showdate']=='')?$news_list['news_time']:$news_extra['showdate'];
		//多图字符串转换成数组
		$text = $news_list['news_pic_allurl'];
		$pic_list = array_filter(explode(",", $text));
		$this->assign('pic_list',$pic_list);
		//栏目数据
		$menu_text=menu_text($this->lang);
		$this->assign('menu',$menu_text);
		$diyflag=Db::name('diyflag')->select();
		$source=Db::name('source')->select();//来源
		$this->assign('source',$source);
		$this->assign('news_extra',$news_extra);
		$this->assign('diyflag',$diyflag);
		$this->assign('news_list',$news_list);
		return $this->fetch();
	}
    /**
     * 编辑操作
     */
	public function news_runedit()
	{
		if (!request()->isAjax()){
			$this->error('提交方式不正确',url('admin/News/news_list'));
		}
		//获取图片上传后路径
		$pic_oldlist=input('pic_oldlist');//老多图字符串
		$img_one='';
		$picall_url='';
		$file = request()->file('pic_one');
		$files = request()->file('pic_all');
		//上传处理
		if($file || $files) {
			if(config('storage.storage_open')){
				//七牛
				$upload = \Qiniu::instance();
				$info = $upload->upload();
				$error = $upload->getError();
				if ($info) {
					if($file && $files){
						//有单图、多图
						if(!empty($info['pic_one'])) $img_one= config('storage.domain').$info['pic_one'][0]['key'];
						if(!empty($info['pic_all'])) {
							foreach ($info['pic_all'] as $file) {
								$img_url=config('storage.domain').$file['key'];
								$picall_url = $img_url . ',' . $picall_url;
							}
						}
					}elseif($file){
						//单图
						$img_one= config('storage.domain').$info[0]['key'];
					}else{
						//多图
						foreach ($info as $file) {
							$img_url=config('storage.domain').$file['key'];
							$picall_url = $img_url . ',' . $picall_url;
						}
					}
				}else{
					$this->error($error,url('admin/News/news_list'));//否则就是上传错误，显示错误原因
				}
			}else{
				$validate = config('upload_validate');
				//单图
				if (!empty($file)) {
					$info = $file[0]->validate($validate)->rule('uniqid')->move(ROOT_PATH . config('upload_path') . DS . date('Y-m-d'));
					if ($info) {
						$img_url = config('upload_path'). '/' . date('Y-m-d') . '/' . $info->getFilename();
						//写入数据库
						$data['uptime'] = time();
						$data['filesize'] = $info->getSize();
						$data['path'] = $img_url;
						Db::name('plug_files')->insert($data);
						$img_one = $img_url;
					} else {
						$this->error($file->getError(), url('admin/News/news_list'));//否则就是上传错误，显示错误原因
					}
				}
				//多图
				if (!empty($files)) {
					foreach ($files as $file) {
						$info = $file->validate($validate)->rule('uniqid')->move(ROOT_PATH . config('upload_path') . DS . date('Y-m-d'));
						if ($info) {
							$img_url = config('upload_path'). '/' . date('Y-m-d') . '/' . $info->getFilename();
							//写入数据库
							$data['uptime'] = time();
							$data['filesize'] = $info->getSize();
							$data['path'] = $img_url;
							Db::name('plug_files')->insert($data);
							$picall_url = $img_url . ',' . $picall_url;
						} else {
							$this->error($file->getError(), url('admin/News/news_list'));//否则就是上传错误，显示错误原因
						}
					}
				}
			}
		}
		//获取产品属性
		$news_flag=input('post.news_flag/a');
		$flag=array();
		if(!empty($news_flag)){
			foreach ($news_flag as $v){
				$flag[]=$v;
			}
		}
		$flagdata=implode(',',$flag);
		$sl_data=array(
			'n_id'=>input('n_id'),
			'news_title'=>input('news_title'),
			'news_titleshort'=>input('news_titleshort',''),
			'news_columnid'=>input('news_columnid'),
			'news_flag'=>$flagdata,
			'news_zaddress'=>input('news_zaddress',''),
			'news_key'=>input('news_key',''),
			'news_tag'=>input('news_tag',''),
			'news_source'=>input('news_source',''),
			'news_pic_type'=>input('news_pic_type'),
			'news_pic_content'=>input('news_pic_content',''),
			'news_open'=>input('news_open',0),
			'news_scontent'=>input('news_scontent',''),
			'news_content'=>htmlspecialchars_decode(input('news_content')),
			'listorder'=>input('listorder',50,'intval'),
		);
		//图片字段处理
		if(!empty($img_one)){
			$sl_data['news_img']=$img_one;
		}
		$sl_data['news_pic_allurl']=$pic_oldlist.$picall_url;
		//根据栏目id,获取语言
		$news_l=Db::name('menu')->where('id',input('news_columnid'))->value('menu_l');
		$sl_data['news_l']=$news_l;
		//附加字段
		$showtime=input('showdate','');
		$news_extra['showdate']=($showtime=='')?time():strtotime($showtime);
		$sl_data['news_extra']=json_encode($news_extra);
		$rst=NewsModel::update($sl_data);
		if($rst!==false){
			$this->success('产品修改成功,返回列表页',url('admin/News/news_list'));
		}else{
			$this->error('产品修改失败',url('admin/News/news_list'));
		}
	}
    /**
     * 产品排序
     */
	public function news_order()
	{
		if (!request()->isAjax()){
			$this->error('提交方式不正确',url('admin/News/news_list'));
		}else{
			$list=[];
			foreach (input('post.') as $n_id => $news_order){
				$list[]=['n_id'=>$n_id,'listorder'=>$news_order];
			}
			$news_model=new NewsModel;
			$news_model->saveAll($list);
			$this->success('排序更新成功',url('admin/News/news_list'));
		}
	}
    /**
     * 删除至回收站(单个)
     */
	public function news_del()
	{
		$p=input('p');
		$news_model=new NewsModel;
		$rst=$news_model->where(array('n_id'=>input('n_id')))->setField('news_back',1);//转入回收站
		if($rst!==false){
			$this->success('产品已转入回收站',url('admin/News/news_list',array('p' => $p)));
		}else{
			$this -> error("删除产品失败！",url('admin/News/news_list',array('p'=>$p)));
		}
	}
    /**
     * 删除至回收站(全选)
     */
	public function news_alldel()
	{
		$p = input('p');
		$ids = input('n_id/a');
		if(empty($ids)){
			$this -> error("请选择删除产品",url('admin/News/news_list',array('p'=>$p)));//判断是否选择了产品ID
		}
		if(is_array($ids)){//判断获取产品ID的形式是否数组
			$where = 'n_id in('.implode(',',$ids).')';
		}else{
			$where = 'n_id='.$ids;
		}
		$news_model=new NewsModel;
		$rst=$news_model->where($where)->setField('news_back',1);//转入回收站
		if($rst!==false){
			$this->success("成功把产品移至回收站！",url('admin/News/news_list',array('p'=>$p)));
		}else{
			$this -> error("删除产品失败！",url('admin/News/news_list',array('p'=>$p)));
		}
	}
    /**
     * 产品审核/取消审核
     */
	public function news_state()
	{
		$id=input('x');
		$news_model=new NewsModel;
		$status=$news_model->where(array('n_id'=>$id))->value('news_open');
		if($status==1){
			$statedata = array('news_open'=>0);
			$news_model->where(array('n_id'=>$id))->setField($statedata);
			$this->success('未审');
		}else{
			$statedata = array('news_open'=>1);
			$news_model->where(array('n_id'=>$id))->setField($statedata);
			$this->success('已审');
		}
	}
    /**
     * 产品修改栏目
     */
    public function news_columnid()
    {
        $news_columnid=input('news_columnid');
        $n_id=input('n_id');
        $news_model=new NewsModel;
        $data=$news_model->find($n_id);
        if($data){
            $rst=$news_model->where('n_id',$n_id)->update(['news_columnid'=>$news_columnid]);
            if($rst!==false){
                $this->success('更新栏目成功');
            }else{
                $this->error('更新栏目失败');
            }
        }else{
            $this->error('产品不存在');
        }
    }
    /**
     * 回收站列表
     */
	public function news_back()
	{
		$keytype=input('keytype','news_title');
		$key=input('key');
		$news_l=input('news_l');
		$opentype_check=input('opentype_check','');
		$diyflag=input('diyflag','');
		//查询：时间格式过滤 格式 2015-11-12 - 2015-11-18
		$sldate=input('reservation','');
		$arr = explode(" - ",$sldate);
		if(count($arr)==2){
			$arrdateone=strtotime($arr[0]);
			$arrdatetwo=strtotime($arr[1].' 23:55:55');
			$map['news_time'] = array(array('egt',$arrdateone),array('elt',$arrdatetwo),'AND');
		}
		//map架构查询条件数组
		$map['news_back']= 1;
		if(!empty($key)){
			$map[$keytype]= array('like',"%".$key."%");
		}
		if ($opentype_check!=''){
			$map['news_open']= array('eq',$opentype_check);
		}
		if (!empty($news_l)){
			$map['news_l']= array('eq',$news_l);
		}
        if(!config('lang_switch_on')){
            $map['news_l']=  $this->lang;
        }
		$where=$diyflag?"FIND_IN_SET('$diyflag',news_flag)":'';
		$news_model=new NewsModel;
		$news=$news_model->alias("a")->field('a.*,b.*,c.menu_name')
				->join(config('database.prefix').'member_list b','a.news_auto =b.member_list_id')
				->join(config('database.prefix').'menu c','a.news_columnid =c.id')->where($map)
				->where($where)->order('news_time desc')->paginate(config('paginate.list_rows'),false,['query'=>get_query()]);
		$show = $news->render();
		$show=preg_replace("(<a[^>]*page[=|/](\d+).+?>(.+?)<\/a>)","<a href='javascript:ajax_page($1);'>$2</a>",$show);
		$this->assign('page',$show);
		//产品属性数据
		$diyflag_list=Db::name('diyflag')->select();
		$this->assign('diyflag',$diyflag_list);
		$this->assign('opentype_check',$opentype_check);
		$this->assign('keytype',$keytype);
		$this->assign('keyy',$key);
		$this->assign('news_l',$news_l);
		$this->assign('sldate',$sldate);
		$this->assign('diyflag_check',$diyflag);
		$this->assign('news',$news);
		if(request()->isAjax()){
			return $this->fetch('ajax_news_back');
		}else{
			return $this->fetch();
		}	
	}
    /**
     * 还原产品
     */
	public function news_back_open()
	{
		$p=input('p');
		$news_model=new NewsModel;
		$rst=$news_model->where('n_id',input('n_id'))->setField('news_back',0);//转入正常
		if($rst!==false){
			$this->success('产品还原成功',url('admin/News/news_back',array('p' => $p)));
		}else{
			$this -> error("产品还原失败！",url('admin/News/news_back',array('p' => $p)));
		}
	}
    /**
     * 彻底删除(单个)
     */
	public function news_back_del()
	{
		$n_id=input('n_id');
		$p = input('p');
		$news_model=new NewsModel;
		if (empty($n_id)){
			$this->error('参数错误',url('admin/News/news_back',array('p' => $p)));
		}else{
			$rst=$news_model->where('n_id',input('n_id'))->delete();
			if($rst!==false){
				$this->success('产品彻底删除成功',url('admin/News/news_back',array('p' => $p)));
			}else{
				$this -> error("产品彻底删除失败！",url('admin/News/news_back',array('p' => $p)));
			}
		}
	}
    /**
     * 彻底删除(全选)
     */
	public function news_back_alldel()
	{
		$p = input('p');
		$ids = input('n_id/a');
		if(empty($ids)){
			$this -> error("请选择删除产品",url('admin/News/news_back',array('p'=>$p)));//判断是否选择了产品ID
		}
		if(is_array($ids)){//判断获取产品ID的形式是否数组
			$where = 'n_id in('.implode(',',$ids).')';
		}else{
			$where = 'n_id='.$ids;
		}
		$news_model=new NewsModel;
		$rst=$news_model->where($where)->delete();
		if($rst!==false){
			$this->success("成功把产品删除，不可还原！",url('admin/News/news_back',array('p'=>$p)));
		}else{
			$this -> error("产品彻底删除失败！",url('admin/News/news_back',array('p' => $p)));
		}
	}

    /**
     * 翻译
     */
    public function news_translation()
    {



        if (!request()->isAjax()){
            $this->error('提交方式不正确',url('admin/News/news_list'));
        }else{
            $list=input('post.');

            //var_dump($list);die;
            $title1 = $list['title'];
            $url = 'https://translation.googleapis.com/language/translate/v2?key=API_KEY';
            $headers = array();
            $headers[]='Content-Type: application/json';
            $data = [
                'q'=>'我最喜欢的城市是堪培拉',
                    'source'=>'zh-CN',
                    'target'=>'en',
                    'format'=>'text',
                    'model'=>''
                ];
                $data = json_encode($data);
            $res = curl($url,'post',$data,$headers);
            return $res;


            /*foreach (input('post.') as $n_id => $news_order){
                $list[]=['n_id'=>$n_id,'listorder'=>$news_order];
            }
            $news_model=new NewsModel;
            $news_model->saveAll($list);
            $this->success('排序更新成功',url('admin/News/news_list'));*/
        }
    }

    //接口
    function postcurls($urls,$signstring){

        $ch =  curl_init();
        $headers = array(

            "Content-type: application/json;charset='utf-8'",

        );
        curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
        curl_setopt($ch, CURLOPT_URL, $urls);

        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);

        // post数据

        curl_setopt($ch, CURLOPT_POST, 1);

        curl_setopt($ch, CURLOPT_HEADER, 0);

        curl_setopt($ch, CURLOPT_TIMEOUT_MS, 30000);

        // post的变量

        curl_setopt($ch, CURLOPT_POSTFIELDS, $signstring);

        $output = curl_exec($ch);

        curl_close($ch);

        return ($output);

    }
}