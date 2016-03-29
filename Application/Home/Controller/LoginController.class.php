<?php
namespace Home\Controller;
use Think\Controller;
class LoginController extends Controller {
    //初始化
    public function _initialize(){
        $this->user          = M('User');
        $this->user_info    = M('User_info');
    }
    //登录
    public function index(){
        $this->display();
    }

    //登录操作
    public function login_run(){
        if(!IS_POST)$this->error('非法请求...');
        $temp   = I('post.');
        if(empty($temp['nickname']) || empty($temp['user_pass']))$this->error('登录账户与密码不能为空');
        $map    = array(
            'nickname'  => $temp['nickname'],
            'user_pass' => md5($temp['user_pass']),
            'user_type' => 1
        );
        $admin  = $this->user->where($map)->find();
        if(false === $admin)$this->error('系统出现了不可预知的问题...');
        if(null === $admin)$this->error('账户或密码错误...');
        $_SESSION['user']['id'] = $admin['id'];

        //获取上一次登录ip,写入本次登录ip与时间
        $ip     = get_client_ip(1);
        $last   = $this->user_info->field('login_time,login_ip')->where(array('user_id'=>$admin['id']))->find();
        $data   = array(
            'login_time'    => time(),
            'login_ip'      => $ip,
            'last_time'     => $last['login_time'],
            'last_ip'       => $last['login_ip'],
        );
        $this->user_info->where(array('user_id'=>$admin['id']))->save($data);
        $this->redirect('Home/Index/index');
    }


    //注册
    public function reg(){
        $this->display();
    }
    //退出登录
    public function logout(){
        unset($_SESSION['user']);
        redirect(U('Home/Login/index'));
    }

}