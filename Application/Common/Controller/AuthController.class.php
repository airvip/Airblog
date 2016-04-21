<?php
namespace Common\Controller;
use Think\controller;
use Think\Auth;

class AuthController extends Controller{
    protected function _initialize(){
        $auth   = new Auth();
        if( !$auth -> check()){
            $this->error('您没有权限!');
        }


    }
}

?>