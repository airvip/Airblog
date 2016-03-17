<?php
namespace Admin\Controller;
use Think\Controller;
class CommonController extends Controller {
    public function _initialize(){
         header("Content-Type:text/html; charset=utf-8");
         if(!isset($_SESSION['user']['id'])){
             $this->redirect('Admin/Login/index');
         }
        $admin  = M('User')->where(array('id'=>$_SESSION['user']['id']))->find();
        $this->assign('admin',$admin);
    }
    public function index(){
       $this->display();
    }
}