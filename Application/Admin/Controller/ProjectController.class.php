<?php
namespace Admin\Controller;
use Think\Controller;
class ProjectController extends CommonController {
    //初始化
    public function _initialize(){
        parent::_initialize();
        $this->project = M('Project');
    }

    //显示列表
    public function index(){
        $map    = array('status'=>array('neq',2));
        $order  = 'sort ASC,create_time DESC';
        $list   = $this->page($this->project,C('ADMIN_PAGE'),$map,$order);
        if(false === $list)$this->error('系统出现了不可预知的问题...');
        $this->assign('list',$list);
        $this->display();
    }

    //显示添加
    public function add(){
        $this->display();
    }
    //添加操作
    public function add_run(){
        if(!IS_POST)$this->error('非法操作');
        $temp   = I('post.');
        if(empty($_FILES['thumb']['name']))$this->error('图片不能为空');
        $img    = $this->upload($_FILES,'Project');
        $thumb  = $this->thumb($img['thumb'],700,438);
        $data   = array(
            'thumb'          => $thumb,
            'name'           => $temp['name'],
            'info'           => $temp['info'],
            'url'            => $temp['url'],
            'sort'           => $temp['sort'],
            'status'         => $temp['status'],
            'create_time'   => time()
        );
        $rs = $this->project->add($data);
        if(!$rs)$this->error('操作失败');
        $this->redirect('Admin/Project/index');
    }
    //显示编辑
    public function edit(){
        if(!IS_GET)$this->error('非法操作');
        $temp   = I('id');
        $map    = array('id' => $temp,'status'=>array('neq',2));
        $item   = $this->project -> where($map)-> find();
        if(false === $item)$this->error('系统出现了不可预知的问题...');
        if(null === $item)$this->error('该对象不存在...');
        $this->assign('item',$item);
        $this->display();
    }
    //编辑处理
    public function edit_run(){
        if(!IS_POST)$this->error('非法操作');
        $temp   = I('post.');
        $data   = array(
            'id'     => $temp['id'],
            'name'   => $temp['name'],
            'info'   => $temp['info'],
            'url'    => $temp['url'],
            'sort'   => $temp['sort'],
            'status' => $temp['status'],
        );
        if(!empty($_FILES['thumb']['name'])){
            $img            = $this->upload($_FILES,'Project');
            $thumb          = $this->thumb($img['thumb'],700,438);
            $data['thumb'] = $thumb;
            $old_thumb_temp = I('old_thumb');
            if(!empty($old_thumb_temp))@unlink(I('old_thumb'));
        }
        $rs     = $this->project->save($data);
        if(false === $rs)$this->error('编辑失败');
        $this->redirect('Admin/Project/index');
    }
    //删除（真删除）
    public function delete(){
        if(!IS_AJAX) $this->error('非法操作');
        $item   = $this->project->field('thumb')->find(intval(I('id')));
        if(!empty($item['thumb']))@unlink($item['thumb']);
        $rs     = $this->project->delete(intval(I('id')));
        if(false === $rs)ajax_return(0,'','删除失败');
        ajax_return(1,'','删除成功');
    }



    //查找
    public function search(){
        if(!IS_POST)$this->error('非法操作');
        $temp   = I('post.');
        if(empty($temp['search']))$this->error('搜索内容不能为空');
        $map    = array($temp['name']=>array('like','%'.$temp['search'].'%'));
        $list   = $this->page($this->project,C('ADMIN_PAGE'),$map,'id DESC');
        if(false === $list)$this->error('系统出现了不可预知的问题...');
        $this->assign('list',$list);
        $this->display('Admin@Project/index');
    }

    //修改排序
    public function order(){
        if(!IS_AJAX)$this->error('非法操作');
        $temp   = I('post.');
        $data   = array(
            'id'     => $temp['id'],
            'sort'   => $temp['sort']
        );
        $rs=$this->project->save($data);
        if(false === $rs)ajax_return(0,'','排序调整失败');
        ajax_return(1,'','');
    }


}