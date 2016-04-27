<?php
namespace Home\Controller;
use Think\Controller;
class TestController extends Controller {


    public function index()
    {
        'owqvhpfyhghfbdjd';

//        $content    =  '<p>尊敬的用户，您好：</p>';
//        $content    += '<p>您使用了邮箱注册成为【AirBlog】的会员。请点击以下链接，确认您在AirBlog的注册：</p>';
//        $content    += '<p><a href="" target="_blank"></a></p>';
//        $content    += '<p>如果以上链接不能点击，你可以复制网址URL，然后粘贴到浏览器地址栏打开，完成确认。</p>';
//        $content    += '<p>阿尔维奇</p>';
//        $content    += '<p>（这是一封自动发送的邮件，请不要直接回复）</p>';
        $content    = '<p>说明</p>';
        $content    .= '<p>如果你没有注册过AirBlog，可能是有人尝试使用你的邮件来注册，请忽略本邮件。</p>';
        $content    .= '<p>没有激活的账号会为你保留24个小时, 请尽快激活。</p>';
        $content    .= '<p>24个小时以后, 没有被激活的注册会自动失效，你需要重新填写并注册。</p>';

        p( A('Common/Email')->send_mail('1546571372@qq.com','nihao','sdfsdfdsds'));
    }




}