<?php
namespace User\Controller;
use Think\Controller;
class CommonController extends Controller {
    public function _initialize(){
        header("Content-Type:text/html; charset=utf-8");
        if(!isset($_SESSION['user']['id']))$this->redirect('Home/Login/index');

        $user    = M('User')->find(array('id'=>$_SESSION['user']['id']));
        $this->assign('user',$user);

        $common  = A('Home/Common');
        $common->link();
    }

    public function _empty(){
        $this->error('非法操作');
    }

    protected function page($obj, $size =25, $where = '', $order = '', $field = true, $join = ''){
        return A('Home/Common')->page($obj, $size =$size, $where =$where, $order =$order, $field = $field, $join = $join);
    }
}