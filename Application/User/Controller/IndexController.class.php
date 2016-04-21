<?php
namespace User\Controller;
use Think\Controller;
class IndexController extends CommonController {
    //初始化
    public function _initialize(){
        parent::_initialize();
    }
    //博客内容
    public function index(){

        $this->display();
    }


}