<?php
namespace Admin\Controller;
use Think\Controller;
class LoginController extends Controller {
    public function _initialize(){
        $this->user = M('User');
    }

    public function index(){
       $this->display('Admin@Login/login');
    }

    public function login_run(){
        if(!IS_POST)$this->error('非法请求...');
        $temp   = I('post.');
        if(empty($temp['nickname']) || empty($temp['user_pass']))$this->error('登录账户与密码不能为空');
        $map    = array(
            'nickname'  => $temp['nickname'],
            'user_pass' => md5($temp['user_pass']),
            'user_type' => 0
        );
        $admin  = $this->user->where($map)->find();
        if($admin === false)$this->error('系统出现了不可预知的问题...');
        if($admin['id'] === null)$this->error('账户或密码错误...');
        $_SESSION['user']['id'] = $admin['id'];
        $this->redirect('Admin/Index/index');
    }


}