<?php
namespace Home\Controller;
use Think\Controller;
class CommonController extends Controller {
    public function _initialize(){
        header("Content-Type:text/html; charset=utf-8");
       /* if(!isset($_SESSION['user']['id'])){
            $this->redirect('Home/Public/login');
        }*/
    }

    public function index(){
        $this->display();
    }
    //ͼƬ�ϴ�����
    protected function upload($Files,$path='Avatar',$type=array('jpg','png','jpeg')){
        $upload = new \Think\Upload();                              // upload class
        $upload->maxSize   = 2097152;                               // file size 8M is 8388608 ,default(2m)
        $upload->exts      = $type;//array('jpg', 'png', 'jpeg');       // what is type
        $upload->rootPath  = './Uploads/';
        $upload->savePath  = '$path/';                             // children file
        $upload->autoSub   = true;
        $upload->subName   = array('date','Y/m/d');
        $info   =   $upload->upload($Files);
        if(!$info) {
            $this->error($upload->getError());
            exit;
        }
        return $info;
    }
    //��������ͼ�ķ���
    protected function thumb($data,$scale_width = '500',$scale_height = '500'){
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
     * @param $obj ��ҳ����
     * @return mixed
     */
    protected function page($obj, $size =25, $where = '', $order = '', $field = true, $join = '')
    {
        $count = $obj->where($where)->join($join)->count();
        $Page = new \Think\Page($count, $size);
        //$Page->setConfig('theme','%FIRST% %UP_PAGE% %LINK_PAGE% %DOWN_PAGE% %END% ȫ %TOTAL_ROW% ��');
        $Page->setConfig('theme','%UP_PAGE% %LINK_PAGE% %DOWN_PAGE%  ȫ %TOTAL_ROW% ��');
        $show = $Page->show();
        $list = $obj->field($field)->where($where)->order($order)->join($join)->limit($Page->firstRow . ',' . $Page->listRows)->select();
        $this->assign('page', $show);
        $this->assign('count',$count);
        return $list;
    }

    //����phpmail�����ʼ�
    protected function send_mail($to, $title, $content) {
        Vendor('PHPMailer.PHPMailerAutoload');
        $mail           = new \PHPMailer();         //ʵ����
        $mail->IsSMTP(); // ����SMTP
        $mail->Host     = C('MAIL_HOST');       //smtp�����������ƣ�������QQ����Ϊ����
        $mail->SMTPAuth = C('MAIL_SMTPAUTH');   //����smtp��֤
        $mail->Username = C('MAIL_USERNAME'); //���������
        $mail->Password = C('MAIL_PASSWORD') ; //��������
        $mail->From     = C('MAIL_FROM'); //�����˵�ַ��Ҳ������������ַ��
        $mail->FromName = C('MAIL_FROMNAME'); //����������
        $mail->AddAddress($to,C('MAIL_FROMNAME'));
        $mail->WordWrap = 50; //����ÿ���ַ�����
        $mail->IsHTML(C('MAIL_ISHTML')); // �Ƿ�HTML��ʽ�ʼ�
        $mail->CharSet  = C('MAIL_CHARSET'); //�����ʼ�����
        $mail->Subject  = $title; //�ʼ�����
        $mail->Body     = $content; //�ʼ�����
        $mail->AltBody  = "����һ������Airblog��ο���ʼ�"; //Message body does not support HTML standby display.
        return($mail->Send());
    }

}