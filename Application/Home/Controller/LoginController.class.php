<?php
namespace Home\Controller;
use Think\Controller;
class LoginController extends Controller {
    //初始化
    public function _initialize(){
        parent::_initialize();
        $this->user = M('User');
    }
    //登录
    public function index(){

        $this->display();
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