<?php
namespace Admin\Controller;
use Think\Controller;
class SystemController extends CommonController {
    public function index(){
        $conf   = include './Application/Common/Conf/system.php';
        $this->assign('item',$conf);
        $this->display();
    }
    //
    public function index_run(){
        $path   = './Application/Common/Conf/system.php';
        $config = include $path;
        $temp   = I('post.');
        $config['WEB_NAME']     = $temp['web_name'];
        $config['WEB_URL']      = $temp['web_url'];
        $config['COPY']          = $temp['copy'];
        $config['REGIS_ON']     = $temp['regis_on'];
        $config['ADMIN_PAGE']   = $temp['admin_page'];
        $config['KEY_WORD']      = $temp['key_word'];
        $config['DESCRIPTION']  = $temp['description'];
        $data="<?php\r\n return ".var_export($config,true).";\r\n?>";
        if (file_put_contents($path, $data)){
            $this->success('修改成功',U('Admin/System/index'));
        }else{
            $this->error('修改失败，请修改'.$path.'的写入权限');
        }
    }

    //db
    public function db(){
        $conf   = include './Application/Common/Conf/config.php';
        $this->assign('item',$conf);
        $this->display();
    }
    //db_run
    public function db_run(){
        $path   = './Application/Common/Conf/config.php';
        $config = include $path;
        $temp   = I('post.');
        $config['DB_HOST']     = $temp['db_host'];
        $config['DB_NAME']     = $temp['db_name'];
        $config['DB_USER']     = $temp['db_user'];
        $config['DB_PWD']      = $temp['db_pwd'];
        $config['DB_PORT']     = $temp['db_port'];
        $data="<?php\r\n return ".var_export($config,true).";\r\n?>";
        if (file_put_contents($path, $data)){
            $this->success('修改成功',U('Admin/System/db'));
        }else{
            $this->error('修改失败，请修改'.$path.'的写入权限');
        }
    }
    public function email(){
        $conf   = include './Application/Common/Conf/system.php';
        $this->assign('item',$conf);
        $this->display();
    }
    //
    public function email_run(){
        $path   = './Application/Common/Conf/system.php';
        $config = include $path;
        $temp   = I('post.');
        $config['MAIL_HOST']            = $temp['mail_host'];
        $config['MAIL_FROM']            = $temp['mail_from'];
        $config['MAIL_PASSWORD']       = $temp['mail_password'];
        $config['MAIL_FROMNAME']       = $temp['mail_fromname'];
        $config['MAIL_USERNAME']       = $temp['mail_username'];
        $config['MAIL_SMTPAUTH']       = $temp['mail_smtpauth'];
        $data="<?php\r\n return ".var_export($config,true).";\r\n?>";
        if (file_put_contents($path, $data)){
            $this->success('修改成功',U('Admin/System/email'));
        }else{
            $this->error('修改失败，请修改'.$path.'的写入权限');
        }
    }

}