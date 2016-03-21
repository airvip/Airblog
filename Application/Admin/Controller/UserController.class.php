<?php
namespace Admin\Controller;
use Think\Controller;
class UserController extends CommonController {
    //初始化
    public function _initialize(){
        parent::_initialize();
        $this->user = M('User');
    }
    //用户列表
    public function index(){
        $user_type  = empty(I('user_type')) ? 1 : 0;
        $map    = array(
            'user_type' => $user_type
        );
        $list   = $this->user->where($map)->order('id DESC')->select();
        if(false === $list)$this->error('系统出现了不可预知的问题...');
        if(null === $list)$this->error('账户或密码错误...');
        $this->assign('list',$list);
        $this->display();
    }

}