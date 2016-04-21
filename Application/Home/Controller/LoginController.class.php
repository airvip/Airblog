<?php
namespace Home\Controller;
use Think\Controller;
class LoginController extends Controller {
    //初始化
    public function _initialize(){
        $this->user          = M('User');
        $this->user_info    = M('User_info');
        if(isset($_SESSION['user']))$this->redirect('Home/Index/index');
    }
    //登录
    public function index(){
        $this->display('Home@Login/login');
    }

    //登录操作
    public function login_run(){
        if(!IS_POST)$this->error('非法请求...');
        $temp   = I('post.');
        if(empty($temp['nickname']) || empty($temp['user_pass']))$this->error('登录账户与密码不能为空');
        $map    = array(
            'nickname'      => $temp['nickname'],
            'user_pass'     => md5($temp['user_pass']),
            'user_status'   => 1
        );
        $admin  = $this->user->where($map)->find();
        if(false === $admin)$this->error('系统出现了不可预知的问题...');
        if(null === $admin)$this->error('账户或密码错误...');
        $_SESSION['user']['id']         = $admin['id'];
        $_SESSION['user']['user_type'] = $admin['user_type'];
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
        $this->redirect('User/Index/index');
    }


    //注册
    public function reg(){
        if(C('REGIS_ON') == 0)$this->error('站长已经关闭注册功能');
        $this->display();
    }
    //注册操作
    public function reg_run(){
        if(!IS_POST)$this->error('非法请求...');
        $temp   = I('post.');
        if(empty($temp['nickname']) || empty($temp['user_pass']) || empty($temp['user_email']))$this->error('登录账户与密码不能为空');
        $map    = array(
            'nickname'   => $temp['nickname'],
            'user_email' => $temp['user_email'],
            '_logic'      => 'OR'
        );
        $user   = $this->user->where($map)->find();
        if(null != $user)$this->error('昵称或邮箱已经被占用');
        $data   = array(
            'nickname'      => $temp['nickname'],
            'user_pass'     => md5($temp['user_pass']),
            'user_email'    => $temp['user_email'],
            'user_status'   => 1,
            'user_type'     => 1,
        );
        $user_id    = $this->user->add($data);
        $ip     = get_client_ip(1);
        $data_user_info = array(
            'login_time'    => time(),
            'login_ip'      => $ip,
            'user_id'       => $user_id,
            'create_time'   => time()
        );
        $rs = $this->user_info->add($data_user_info);
        if(false === $user_id || false === $rs)$this->error('系统发生错误...');
        $_SESSION['user']['id'] = $user_id;
        $this->redirect('Home/Index/index');
    }


}