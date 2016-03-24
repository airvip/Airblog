<?php
namespace Admin\Controller;
use Think\Controller;
class BgtagController extends CommonController {
    //初始化
    public function _initialize(){
        parent::_initialize();
        $this->tag = M('Tag');
    }

    //显示列表
    public function index(){
        $order  = 'sort ASC,create_time DESC';
        $list   = $this->page($this->tag,C('ADMIN_PAGE'),'',$order);
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
            'name'           => $temp['name'],
            'sort'           => $temp['sort'],
            'info'           => $temp['info'],
            'status'         => $temp['status'],
            'create_time'   => time()
        );
        $rs = $this->tag->add($data);
        if(!$rs)$this->error('操作失败');
        $this->success('操作成功');
    }

}