<?php
namespace User\Controller;
use Think\Controller;
class PersonController extends CommonController {
    //初始化
    public function _initialize(){
        parent::_initialize();
        $this->user     = M('User');
    }
    //博客内容
    public function index(){
        $map    = array('id'=>$_SESSION['user']['id']);
        $field  = 'a.nickname,a.user_email,a.avatar,a.user_status,
                a.user_type,b.sex,b.country,b.province,b.city,b.address';
        $join   = array('a left join __USER_INFO__ b on a.id=b.user_id');
        $user   = $this->user ->field($field)->join($join)->where($map)->find();
        $this->assign('user',$user);
        $this->display();
    }

    //显示编辑页面
    public function edit(){
        if(!IS_GET)$this->error('非法操作');
        $map    = array('id' => $_SESSION['user']['id']);
        $field  = 'a.id,a.nickname,a.user_email,a.avatar,a.user_status,
                a.user_type,b.sex,b.country,b.province,b.city,b.address';
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

    //编辑处理
    public function edit_run(){
        if(!IS_POST)$this->error('非法操作');
        $temp   = I('post.');
        $data_user_info = array(
            'sex'            => $temp['sex'],
            'country'        => $temp['country'],
            'province'       => $temp['province'],
            'city'            => $temp['city'],
            'address'         => $temp['address'],
        );
        $map_user_info  = array('user_id'=>$_SESSION['user']['id']);
        $rs_user_info   = M('User_info')->where($map_user_info)->save($data_user_info);
        if(false === $rs_user_info)$this->error('更新失败');
        $this->redirect('User/Person/index');
    }

    //先显示修改头像页面
    public function avatar(){
        $this->user   = $this->user->field('avatar,nickname')->where(array('id'=>$_SESSION['user']['id']))->find();
        dump($this->user);
        $this->display();
    }

    public function avatar_run(){
        if(!IS_POST)$this->error('非法操作');
        if(empty($_FILES['avatar']['name']))$this->error('缩略图不能为空');
        $img    = $this->upload($_FILES,'Avatar');
        $thumb  = $this->thumb($img['avatar'],150,150);
        $rs = $this->user->where(array('id'=>$_SESSION['user']['id']))->save(array('avatar'=>$thumb));
        if(false === $rs)$this->error('更新失败');
        $this->redirect('User/Person/avatar');
    }

}