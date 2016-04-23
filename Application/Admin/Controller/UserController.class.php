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
        $temp_user_type  = I('user_type');
        $user_type  = empty($temp_user_type) ? '' : I('user_type');
        $map    = array(
            'user_type'     => $user_type,
            'user_status'   => array('neq',2)
        );
        $list   = $this->page($this->user,C('ADMIN_PAGE'),$map,'id DESC');
        if(false === $list)$this->error('系统出现了不可预知的问题...');
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

    //显示编辑页面
    public function edit(){
        if(!IS_GET)$this->error('非法操作');
        $temp   = I('user_id');
        $map    = array('id' => $temp);
        $field  = 'a.id,a.nickname,a.user_email,a.avatar,a.user_status,
                a.user_type,b.sex,b.country,b.province,b.city,b.address,b.create_time';
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
        $data_user  = array(
            'user_status'   => $temp['user_status'],
            'user_type'     => $temp['user_type'],
            'id'             => $temp['id']
        );
        $map_user   = $this->user->save($data_user);
        $data_user_info = array(
            'sex'            => $temp['sex'],
            'country'        => $temp['country'],
            'province'       => $temp['province'],
            'city'            => $temp['city'],
            'address'         => $temp['address'],
        );
        $map_user_info  = array('user_id'=>$temp['id']);
        $rs_user_info   = M('User_info')->where($map_user_info)->save($data_user_info);
        if(false === $map_user && false === $rs_user_info)$this->error('更新失败');
        //$this->success('更新成功');
        $this->redirect('Admin/User/index');
    }

    //删除用户（假删除user_status=2）
    public function delete(){
        if(!IS_AJAX) $this->error('非法操作');
        $temp   = I('post.');
        $data   = array(
            'id'            => $temp['user_id'],
            'user_status' => 2
        );
        $rs = $this->user->save($data);
        if(false === $rs)ajax_return(0,'','删除用户失败');
        ajax_return(1,'','删除用户成功');
    }

    //查找
    public function search(){
        if(!IS_POST)$this->error('非法操作');
        $temp   = I('post.');
        if(empty($temp['search']))$this->error('搜索内容不能为空');
        $map    = array($temp['name']=>array('like','%'.$temp['search'].'%'));
        $list   = $this->page($this->user,C('ADMIN_PAGE'),$map,'id DESC');
        if(false === $list)$this->error('系统出现了不可预知的问题...');
        $this->assign('list',$list);
        $this->display('Admin@User/index');
    }



    //ajax修改用户状态
    public function free(){
        if(!IS_AJAX) $this->error('非法操作');
        $temp   = I('post.');
        $data   = array(
            'id'               => $temp['id'],
            'user_status'     => $temp['user_status']
        );
        $rs = $this->user->save($data);
        if(false === $rs)ajax_return(0,'','修改失败');
        ajax_return(1,'','修改成功');
    }

    //初始化用户密码
    public function user_pass(){
        if(!IS_AJAX) $this->error('非法操作');
        $temp   = I('post.');
        $data   = array(
            'id'            => $temp['user_id'],
            'user_pass'    => md5(123456)
        );
        $rs = $this->user->save($data);
        if(false === $rs)ajax_return(0,'','初始化失败');
        ajax_return(1,'','初始化成功');
    }





}