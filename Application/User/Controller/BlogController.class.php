<?php
namespace User\Controller;
use Think\Controller;
class BlogController extends CommonController {
    //初始化
    public function _initialize(){
        parent::_initialize();
        $this->blog = M('Blog');
    }
    //博客内容
    public function index(){
        $map    = array(
            'status'   => array('neq',2),
            'user_id'   => $_SESSION['user']['id']
        );
        $order  = 'recommend DESC,id DESC';
        $list   = $this->page($this->blog,15,$map,$order);
        if(false === $list)$this->error('系统出现了不可预知的问题...');
        $this->assign('list',$list);
        $this->display();
    }

    //显示添加页面
    public function add(){
        $map    = array('status'=>1);
        $order  = 'sort ASC,create_time DESC';
        $tags   = M('Tag')->field('id,name')->where($map)->order($order)->select();
        $this->assign('list',$tags);
        $this->display();
    }
    //添加处理
    public function add_run(){
        if(!IS_POST)$this->error('非法操作');
        $temp   = I('post.');
        //图像处理
        if(empty($_FILES['thumb']['name']))$this->error('缩略图不能为空');
        $img    = $this->upload($_FILES,'Blog');
        $thumb  = $this->thumb($img['thumb'],350,220);
        //数据组合
        $temp['tags']   = implode(',',$temp['tags']);
        if(empty($temp['blog_info']))$temp['blog_info']   = cut_str(strip_tags(htmlspecialchars_decode($temp['content'])),75);
        $data   = array(
            'title'         => $temp['title'],
            'thumb'         => $thumb,
            'blog_info'    => $temp['blog_info'],
            'content'      => $temp['content'],
            'tags'          => $temp['tags'],
            'create_time'  => time(),
            'edit_time'    => time(),
            'status'        => 1,
            'auther'        => $temp['auther'],
            'view_count'   => 0,
            'comment_count'=> 0,
            'recommend'     => 0,
            'user_id'       => $temp['user_id']
        );
        $rs = $this->blog->add($data);
        if(!$rs)$this->error('操作失败');
        //$this->success('操作成功',U('Admin/Blog/index'));
        $this->redirect('User/Blog/index');
    }


}