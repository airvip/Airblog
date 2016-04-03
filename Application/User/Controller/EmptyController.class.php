<?php
namespace User\Controller;
use Think\Controller;
class EmptyController extends Controller {
    function index(){
        $user_controller = CONTROLLER_NAME;
        $this->user_err($user_controller);
    }

    protected function user_err($name){
        $this->error("您请求的 $name 系统无能为力...");
    }
}