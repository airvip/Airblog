<?php
namespace Home\Controller;
use Think\Controller;
class ProjectController extends CommonController {
    //初始化
    public function _initialize(){
        parent::_initialize();
        $this->project = M('Project');
    }
    //列表
    public function index(){
        $map    = array('status'=>array('eq',1));
        $field  = 'thumb,name,info,url';
        $order  = 'sort ASC,create_time DESC';
        $list   = $this->page($this->project,12,$map,$order,$field);
        if(false === $list)$this->error('系统出现了不可预知的问题...');
        $this->assign('list',$list);
        $this->display();
    }
}