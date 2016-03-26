<?php
namespace Admin\Controller;
use Think\Controller;
class PageController extends CommonController {
    //初始化
    public function _initialize(){
        parent::_initialize();
    }

    //显示列表
    public function index(){

        $this->display();
    }


}