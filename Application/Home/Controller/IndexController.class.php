<?php
namespace Home\Controller;
use Think\Controller;
class IndexController extends CommonController {
    //初始化
    public function _initialize(){
        parent::_initialize();
        $this->blog = M('Blog');
    }
    //显示列表
    public function index(){
        $map    = array( 'status'   => array('eq',1));
        $order  = 'recommend DESC,id DESC';
        $field  = 'id,title,thumb,blog_info,create_time,edit_time,auther';
        $list   = $this->page($this->blog,C('ADMIN_PAGE'),$map,$order,$field);
        if(false === $list)$this->error('系统出现了不可预知的问题...');
        $this->assign('list',$list);
        //$demo = A('Blog');
        $this->display();
    }
}