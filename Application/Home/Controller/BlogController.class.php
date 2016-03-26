<?php
namespace Home\Controller;
use Think\Controller;
class BlogController extends CommonController {
    //初始化
    public function _initialize(){
        parent::_initialize();
        $this->blog = M('Blog');
    }
    //显示列表
    public function index(){
        $map    = array( 'status'   => array('eq',1));
        $order  = 'recommend DESC,id DESC';
        $list   = $this->page($this->blog,C('ADMIN_PAGE'),$map,$order);
        if(false === $list)$this->error('系统出现了不可预知的问题...');
        $this->assign('list',$list);
        $this->display();
    }

    //详情页
    public function blog(){
        if(!IS_GET)$this->error('非法操作');
        $temp               = I('id',0,'int');
        $item               = $this->blog->where(array('id' => $temp))->find();
        if(null == $item)$this->error('找不到该请求...');
        if(false == $item)$this->error('系统未知错误...');
        $item['content']   = htmlspecialchars_decode($item['content']);
        $this->assign('item',$item);
        $this->display();
    }

}