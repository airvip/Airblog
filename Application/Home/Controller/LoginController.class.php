<?php
namespace Home\Controller;
use Think\Controller;
class LoginController extends Controller {
    //初始化
    public function _initialize(){
        $this->user          = M('User');
        $this->user_info    = M('User_info');
        if(isset($_SESSION['user']))$this->redirect('Home/Index/index');
    }
    //登录
    public function index(){
        $this->display('Home@Login/login');
    }

    //登录操作
    public function login_run(){
        if(!IS_POST)$this->error('非法请求...');
        $temp   = I('post.');
        if(empty($temp['nickname']) || empty($temp['user_pass']))$this->error('登录账户与密码不能为空');
        $map    = array(
            'nickname'      => $temp['nickname'],
            'user_pass'     => md5($temp['user_pass']),
            'user_status'   => 1
        );
        $admin  = $this->user->where($map)->find();
        if(false === $admin)$this->error('系统出现了不可预知的问题...');
        if(null === $admin)$this->error('账户或密码错误...');
        $_SESSION['user']['id']         = $admin['id'];
        $_SESSION['user']['user_type'] = $admin['user_type'];
        //获取上一次登录ip,写入本次登录ip与时间
        $ip     = get_client_ip(1);
        $last   = $this->user_info->field('login_time,login_ip')->where(array('user_id'=>$admin['id']))->find();
        $data   = array(
            'login_time'    => time(),
            'login_ip'      => $ip,
            'last_time'     => $last['login_time'],
            'last_ip'       => $last['login_ip'],
        );
        $this->user_info->where(array('user_id'=>$admin['id']))->save($data);
        $this->redirect('User/Index/index');
    }


    //注册
    public function reg(){
        if(C('REGIS_ON') == 0)$this->error('站长已经关闭注册功能');
        $this->display();
    }
    //注册操作
    public function reg_run(){
        if(!IS_POST)$this->error('非法请求...');
        $temp   = I('post.');
        if(empty($temp['nickname']) || empty($temp['user_pass']) || empty($temp['user_email']))$this->error('登录账户与密码不能为空');
        $user   = $this->user->where(array('nickname'   => $temp['nickname']))->find();
        if(null != $user)$this->error('昵称已经被占用...');
        $user   = $this->user->where(array('user_email' => $temp['user_email']))->find();
        if(null != $user)$this->error('或邮箱已注册...');
        $cheack_time    = time()+3600*24;
        $key            = encryption($temp['nickname']&$temp['user_email']&$cheack_time);
        $data   = array(
            'nickname'      => $temp['nickname'],
            'user_pass'     => md5($temp['user_pass']),
            'user_email'    => $temp['user_email'],
            'reg_token'     => $key,
            'user_status'   => 0,
            'user_type'     => 1,
        );
        $user_id    = $this->user->add($data);
        $ip     = get_client_ip(1);
        $data_user_info = array(
            'login_time'    => time(),
            'login_ip'      => $ip,
            'user_id'       => $user_id,
            'create_time'   => time()
        );
        $rs = $this->user_info->add($data_user_info);
        if(false === $user_id || false === $rs)$this->error('系统发生错误...');
        //发送邮件
        $to         = $data['user_email'];
        $title      = '感谢您注册Air个人博客';

        $url        = C('DOMAIN_NAME').'/Home/Login/active/token/'.$key;
        $content    =  '<p>尊敬的用户 '.$to.'，您好：</p>';
        $content    .= '<p>您使用了邮箱 '.$to.'注册成为【AirBlog】的会员。请点击以下链接，确认您在AirBlog的注册。</p>';
        $content    .= '<p><a href="'.$url.'" target="_blank">'.$url.'</a></p>';
        $content    .= '<p>如果以上链接不能点击，你可以复制网址URL，然后粘贴到浏览器地址栏打开，完成确认。</p>';
        $content    .= '<p>阿尔维奇</p>';
        $content    .= '<p>（这是一封自动发送的邮件，请不要直接回复）</p>';
        $content    .= '<p>说明</p>';
        $content    .= '<p>如果你没有注册过AirBlog，可能是有人尝试使用你的邮件来注册，请忽略本邮件。</p>';
        $content    .= '<p>没有激活的账号会为你保留24个小时, 请尽快激活。</p>';
        $content    .= '<p>24个小时以后, 没有被激活的注册会自动失效，你需要重新填写并注册。</p>';
        $email_rs   = A('Common/Email')->send_mail($to,$title,$content);
        if(false == $email_rs)$this->error('激活邮件发送失败...');
        $this->assign('user',$data);
        $this->display();
    }

    public function active(){
        if(!IS_GET)$this->error('非法操作');
        $temp   = I('token');
        if(empty($temp))$this->error('非法操作');
        $user   = exp('&',encryption($temp,1));
        if($user[2] < time())$this->error('您的激活信息已失效，请重新注册！');//最好配合contab执行
        $map    = array('nickname'=>$user[0],'user_email'=>$user[1],'token'=>$temp);
        $user   = $this->user->where($map)->find();
        if( 0 == $user['user_token'] )$this->error('您已经激活,何须重复检验？？？');
        $rs     = $this->user->where($map)->save(array('user_token'=>0,'user_status'=>1));
        if(false == $rs)$this->error('Sorry!激活失败...');
        $this->success('激活成功,正在跳转到登录页面',U('Home/Login/index'));
    }




}