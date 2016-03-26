<?php
namespace Admin\Controller;
use Think\Controller;
class LinkController extends CommonController {
    //初始化
    public function _initialize(){
        parent::_initialize();
        $this->link = M('Link');
    }

    //显示列表
    public function index(){
        $map    = array('status'=>array('neq',2));
        $order  = 'sort ASC,create_time DESC';
        $list   = $this->page($this->link,C('ADMIN_PAGE'),$map,$order);
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
        $data   = array(
            'link_url'      => $temp['link_url'],
            'name'           => $temp['name'],
            'sort'           => $temp['sort'],
            'status'         => $temp['status'],
            'create_time'   => time()
        );
        $rs = $this->link->add($data);
        if(!$rs)$this->error('操作失败');
        $this->redirect('Admin/Link/index');
    }
    //显示编辑
    public function edit(){
        if(!IS_GET)$this->error('非法操作');
        $temp   = I('id');
        $map    = array('id' => $temp,'status'=>array('neq',2));
        $item   = $this->link -> where($map)-> find();
        if(false === $item)$this->error('系统出现了不可预知的问题...');
        if(null === $item)$this->error('该标签不存在...');
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
            'sort'   => $temp['sort'],
            'link_url'   => $temp['link_url'],
            'status' => $temp['status'],
        );
        $rs     = $this->link->save($data);
        if(false === $rs)$this->error('编辑失败');
        $this->redirect('Admin/Link/index');
    }
    //删除（真删除）
    public function delete(){
        if(!IS_AJAX) $this->error('非法操作');
        $rs = $this->link->delete(intval(I('id')));
        if(false === $rs)ajax_return(0,'','删除失败');
        ajax_return(1,'','删除成功');
    }








    //查找
    public function search(){
        if(!IS_POST)$this->error('非法操作');
        $temp   = I('post.');
        if(empty($temp['search']))$this->error('搜索内容不能为空');
        $map    = array($temp['name']=>array('like','%'.$temp['search'].'%'));
        $list   = $this->page($this->link,C('ADMIN_PAGE'),$map,'id DESC');
        if(false === $list)$this->error('系统出现了不可预知的问题...');
        $this->assign('list',$list);
        $this->display('Admin@Link/index');
    }


}