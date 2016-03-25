<?php
namespace Admin\Controller;
use Think\Controller;
class BlogController extends CommonController {
    //初始化
    public function _initialize(){
        parent::_initialize();
        $this->blog = M('Blog');
    }
    //显示列表
    public function index(){
       $this->display();
    }
    //添加
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
        $text   = strip_tags(htmlspecialchars_decode($temp['content']));
        if(empty($temp['info']))$temp['info']   = cut_str($text,75);
        $data   = array(
            'title'         => $temp['title'],
            'thumb'         => $thumb,
            'blog_info'    => $temp['blog_info'],
            'content'      => $temp['content'],
            'tags'          => $temp['tags'],
            'create_time'  => time(),
            'edit_time'    => time(),
            'status'        => $temp['status'],
            'auther'        => $temp['auther'],
            'view_count'   => 0,
            'comment_count'=> 0,
            'recommend'     => $temp['recommend'],
            'user_id'       => $temp['user_id']
        );
        $rs = $this->blog->add($data);
        if(!$rs)$this->error('操作失败');
        $this->success('操作成功');
    }

    //查看
    public function see(){
        if(!IS_GET)$this->error('非法操作');
        $temp   = I('id');
        $map    = array('id' => $temp);
        $item   = $this->blog->where($map)->find();
        $this->assign('item',$item);
        $this->display();
    }


    //上传
    public function img_up_blog(){
        $info   = $this->upload($_FILES,'Blog');
        if(false == $info){
            $return = array('success'=> false,'msg'=> '上传失败','file_path'=> null);
        }else{
            $return = array('success'=> true,'msg'=> '上传成功','file_path'=> '/Uploads/'.$info['blog_img'].'/'.$info['savepath'].'/'.$info['savename']);
        }
        return json_encode($return);
    }



}