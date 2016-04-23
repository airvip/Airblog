<?php
namespace Home\Controller;
use Think\Controller;
class CommonController extends Controller {
    public function _initialize(){
        header("Content-Type:text/html; charset=utf-8");
       /* if(!isset($_SESSION['user']['id'])){
            $this->redirect('Home/Public/login');
        }*/
        $this->link();
        $this->hot_blog();
        $this->cloud_tag();
    }
    public function _empty(){
        $this->error('非法操作');
    }

    //底部友情连接
    public function link(){
        $field      = 'name,link_url';
        $map        = array('status'=>array('eq',1));
        $list       = M('Link')->field($field)->where($map)->select();
        $this->assign('list_link',$list);
    }

    //侧栏云标签
    public function cloud_tag(){
        $field  = 'id,name';
        $map    = array('status'=>array('eq',1));
        $order  = 'sort ASC,create_time DESC';
        $list   = M('Tag')->field($field)->where($map)->order($order)->limit(20)->select();
        $this->assign('list_tag',$list);
    }

    //侧栏热门博客
    public function hot_blog(){
        $field  = 'id,title,thumb,create_time';
        $map    = array( 'status'   => array('eq',1));
        $order  = 'view_count DESC';
        $list   = M('Blog')->field($field)->where($map)->order($order)->limit(10)->select();
        $this->assign('list_bar',$list);
    }

    //图片上传方法
    public function upload($Files,$path='Avatar',$type=array('jpg','png','jpeg')){
        $upload = new \Think\Upload();                              // upload class
        $upload->maxSize   = 2097152;                               // file size 8M is 8388608 ,default(2m)
        $upload->exts      = $type;//array('jpg', 'png', 'jpeg');       // what is type
        $upload->rootPath  = './Uploads/';
        $upload->savePath  = $path.'/';                             // children file
        $upload->autoSub   = true;
        $upload->subName   = array('date','Y/m/d');
        $info   =   $upload->upload($Files);
        if(!$info) {
            $this->error($upload->getError());
            exit;
        }
        return $info;
    }
    //生成缩略图的方法
    public function thumb($data,$scale_width = '500',$scale_height = '500'){
        $source = './Uploads/'.$data['savepath'].$data['savename'];
        $thumb = './Uploads/'.$data['savepath'].'thumb_'.$data['savename'];
        $temp = new \Think\Image();
        $size = getimagesize($source);
        $width  = $size[0];
        $height = $size[1];
        $temp->open($source);
        if($width>$height){
            $temp_width  = ($width/$height)*$scale_height;
            $temp_height = $scale_height;
        }
        if($width<$height){
            $temp_width  = $scale_width;
            $temp_height = ($height/$width)*$scale_width;
        }
        $temp->thumb($temp_width, $temp_height, \Think\Image::IMAGE_THUMB_FIXED)->save($thumb);
        $temp->open($thumb);
        $temp->thumb($scale_width, $scale_height, \Think\Image::IMAGE_THUMB_CENTER)->save($thumb);
        return $thumb;
    }


    /**
     * @param $obj 分页方法
     * @return mixed
     */
    public function page($obj, $size =25, $where = '', $order = '', $field = true, $join = '')
    {
        $count = $obj->where($where)->join($join)->count();
        $Page = new \Think\Page($count, $size);
        //$Page->setConfig('theme','%FIRST% %UP_PAGE% %LINK_PAGE% %DOWN_PAGE% %END% 全 %TOTAL_ROW% 件');
        //$Page->setConfig('theme','%UP_PAGE% %LINK_PAGE% %DOWN_PAGE%');
        $Page->setConfig('theme','%UP_PAGE% %NOW_PAGE% %TOTAL_PAGE% %DOWN_PAGE% ');
        $show = $Page->show();
        $list = $obj->field($field)->where($where)->order($order)->join($join)->limit($Page->firstRow . ',' . $Page->listRows)->select();
        $this->assign('page', $show);
        $this->assign('count',$count);
        return $list;
    }

    //利用phpmail发送邮件
    protected function send_mail($to, $title, $content) {
        Vendor('PHPMailer.PHPMailerAutoload');
        $mail           = new \PHPMailer();         //实例化
        $mail->IsSMTP(); // 启用SMTP
        $mail->Host     = C('MAIL_HOST');       //smtp服务器的名称（这里以QQ邮箱为例）
        $mail->SMTPAuth = C('MAIL_SMTPAUTH');   //启用smtp认证
        $mail->Username = C('MAIL_USERNAME'); //你的邮箱名
        $mail->Password = C('MAIL_PASSWORD') ; //邮箱密码
        $mail->From     = C('MAIL_FROM'); //发件人地址（也就是你的邮箱地址）
        $mail->FromName = C('MAIL_FROMNAME'); //发件人姓名
        $mail->AddAddress($to,C('MAIL_FROMNAME'));
        $mail->WordWrap = 50; //设置每行字符长度
        $mail->IsHTML(C('MAIL_ISHTML')); // 是否HTML格式邮件
        $mail->CharSet  = C('MAIL_CHARSET'); //设置邮件编码
        $mail->Subject  = $title; //邮件主题
        $mail->Body     = $content; //邮件内容
        $mail->AltBody  = "这是一封来自Airblog的慰问邮件"; //Message body does not support HTML standby display.
        return($mail->Send());
    }

    //退出登录
    public function logout(){
        unset($_SESSION['user']);
        redirect(U('Home/Login/index'));
    }

}