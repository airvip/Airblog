<?php
namespace Home\Controller;
use Think\Controller;
class CommentController extends CommonController {
    //初始化
    public function _initialize(){
        parent::_initialize();
        $this->comment = M('Comment');
    }

    public function get_comment_more(){
        if(!IS_AJAX)$this->error('非法获得评论');
        $page_id     = I('page_id');
        $blog_id     = I('blog_id');
        $field      = 'id,comment_auther,content,create_time,blog_id,p_id';
        $map        = array('blog_id'   => $blog_id,'status'=>1);
        $list       = M('Comment')->field($field)->where($map)->page($page_id.',5')->order('create_time ASC')->select();
        if(false    === $list)ajax_return(0,'','系统发生了未知错误');
        if(null    == $list)ajax_return(0,'','没有更多了');
        $list       = arr1_arr2($list);
        ajax_return(1,$list,'');
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
            'content'            => nl2br($temp['content']),
            'user_id'            => $user_id,
            'comment_auther'    => $comment_auther,
            'create_time'       => time(),
            'status'             => 1,
            'blog_id'            => $temp['blog_id'],
            'p_id'               => $temp['p_id']
        );
        $rs     = $this->comment->add($data);
        if(false === $rs)ajax_return(0,'','');
        M('Blog')->where(array('id'=>$temp['blog_id']))->setInc('comment_count',1);
        $temp['p_id']   == 0 ? $id_tag  = $rs : $temp['p_id'];
        $return_data    = array(
            'comment_auther'=>$comment_auther,
            'id'=>$rs,
            'create_time'=>$data['create_time'],
            'p_id'=>$temp['p_id']
            );
        ajax_return(1,$return_data,'');
    }


}