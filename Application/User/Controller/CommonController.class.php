<?php
namespace User\Controller;
use Think\Controller;
class CommonController extends Controller {
    public function _initialize(){
        header("Content-Type:text/html; charset=utf-8");
        if(!isset($_SESSION['user']))$this->redirect('Home/Login/index');
        //$common  = A('Home/Common');
        //$common->link();
        //$common->hot_blog();
        //$common->cloud_tag();
    }
    public function _empty(){
        $this->error('非法操作');
    }
}