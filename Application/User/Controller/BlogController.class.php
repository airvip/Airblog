<?php
namespace User\Controller;
use Think\Controller;
class BlogController extends CommonController {
    //初始化
    public function _initialize(){
        parent::_initialize();
        $this->blog = M('Blog');
    }
    //博客内容
    public function index(){

        $this->display();
    }


}