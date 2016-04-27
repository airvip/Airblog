<?php
namespace Common\Controller;
use Think\Controller;

class EmailController extends Controller{
    public function _initialize(){
        header("Content-Type:text/html; charset=utf-8");
    }

    //利用phpmail发送邮件
    public function send_mail($to, $title, $content) {
        Vendor('PHPMailer.PHPMailerAutoload');
        $mail           = new \PHPMailer();         //实例化
        $mail->IsSMTP(); // 启用SMTP
        $mail->Host     = C('MAIL_HOST');       //smtp服务器的名称（这里以QQ邮箱为例）
        $mail->Port     = C('MAIL_PORT');       //smtp服务器的名称（这里以QQ邮箱为例）
        $mail->Timeout  = 20;       //smtp服务器的名称（这里以QQ邮箱为例）
        $mail->SMTPDebug  = 0;       //smtp服务器的名称（这里以QQ邮箱为例）测试3商用0
        $mail->SMTPAuth = C('MAIL_SMTPAUTH');   //启用smtp认证
        $mail->Username = C('MAIL_FROM'); //你的邮箱名
        $mail->From     = C('MAIL_FROM'); //发件人地址（也就是你的邮箱地址）
        $mail->FromName = C('MAIL_FROMNAME'); //发件人姓名
        $mail->Password = C('MAIL_PASSWORD') ; //邮箱密码
        $mail->addAddress($to, C('MAIL_FROMNAME'));
        $mail->WordWrap = 500; //设置每行字符长度
        $mail->isHTML(true); // 是否HTML格式邮件
        $mail->CharSet  = 'UTF-8'; //设置邮件编码
        $mail->Subject  = $title; //邮件主题
        $mail->Body     = $content; //邮件内容
        $mail->AltBody  = "这是一封来自Airblog的慰问邮件"; //Message body does not support HTML standby display.
        return($mail->Send());
    }


}

?>