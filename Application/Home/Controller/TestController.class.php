<?php
namespace Home\Controller;
use Think\Controller;
class TestController extends Controller {


    public function index()
    {
        $str            = '阿尔维奇&sdqhwzb@163.com&'.time();
        p($str);

        $key1           = authcode($str,'ENCODE','iloveyou',0);
        p($key1);


        $key            = authcode($key1,'DECODE','iloveyou',0);
        p($key);

    }




}