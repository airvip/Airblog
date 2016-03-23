<?php
namespace Admin\Controller;
use Think\Controller;
class UserController extends CommonController {
    //初始化
    public function _initialize(){
        parent::_initialize();
        $this->user = M('User');
    }
    //用户列表
    public function index(){
        $user_type  = empty(I('user_type')) ? 1 : 0;
        $map    = array(
            'user_type' => $user_type
        );
        $list   = $this->page($this->user,C('ADMIN_PAGE'),$map,'id DESC');
        if(false === $list)$this->error('系统出现了不可预知的问题...');
        if(null === $list)$this->error('账户或密码错误...');
        $this->assign('list',$list);
        $this->display();
    }

    //显示查看详情页面
    public function see(){
        if(!IS_GET)$this->error('非法操作');
        $temp   = I('user_id');
        $map    = array('id' => $temp);
        $field  = 'a.id,a.nickname,a.user_email,a.avatar,a.user_status,
                a.user_type,b.sex,b.country,b.province,b.city,b.address,
                b.login_time,b.login_ip,b.last_ip,b.last_time,b.create_time';
        $user   = $this->user
            -> field($field)
            -> join(array('a left join __USER_INFO__ b on a.id=b.user_id'))
            -> where($map)
            -> find();
        if(false === $user)$this->error('系统出现了不可预知的问题...');
        if(null === $user)$this->error('该用户不存在...');
        $this->assign('user',$user);
        $this->display();
    }





    //ajax修改用户状态
    public function free(){
        if(!IS_AJAX) ajax_return(0,'','非法操作');
        $temp   = I('post.');
        $data   = array(
            'id'               => $temp['id'],
            'user_status'     => $temp['user_status']
        );
        $rs=$this->user->save($data);
        if(!$rs)ajax_return(0,'','修改失败');
        ajax_return(1,'','修改成功');
    }

    //初始化用户密码
    public function userPass(){
        if(!IS_AJAX) ajax_return(0,'','非法操作');
        $temp   = I('post.');
        $data   = array(
            'id'            => $temp['user_id'],
            'user_pass'    => 123456
        );
        $rs=$this->user->save($data);
        if(!$rs)ajax_return(0,'','初始化失败或原值为123456');
        ajax_return(1,'','初始化成功');
    }





}