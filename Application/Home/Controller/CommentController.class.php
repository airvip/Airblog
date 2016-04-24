<?php
namespace Home\Controller;
use Think\Controller;
class CommentController extends CommonController {
    //初始化
    public function _initialize(){
        parent::_initialize();
        $this->comment = M('Comment');
    }

    //发布评论
    public function add(){
        if(!IS_AJAX)$this->error('非法操作');
        $temp   = I('post.');
        if(!empty($_SESSION['user']['id'])){
            $user   = M('User')->field('nickname')->where(array('id'=>$_SESSION['user']['id']))->find();
            $comment_auther = $user['nickname'];
            $user_id        = $_SESSION['user']['id'];
        }else{
            $name   = ['甲','乙','丙','丁'];
            $comment_auther = '路人'.$name[rand(0,3)];
            $user_id        = 0;
        }
        $data   = array(
            'content'            => $temp['content'],
            'user_id'            => $user_id,
            'comment_auther'    => $comment_auther,
            'create_time'       => time(),
            'status'             => 1,
            'blog_id'            => $temp['blog_id'],
            'p_id'               => $temp['p_id']
        );
        $rs     = $this->comment->add($data);
        if(false === $rs)ajax_return(0,'','');
        $temp['p_id']   == 0 ? $id_tag  = $rs : $temp['p_id'];
        $return_data    = array(
            'comment_auther'=>$comment_auther,
            'id'=>$rs,
            'create_time'=>date('d/M/Y H:i',$data['create_time']),
            'p_id'=>$temp['p_id']
            );
        ajax_return(1,$return_data,'');
    }


}