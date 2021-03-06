<?php
namespace Home\Controller;
use Think\Controller;
class BlogController extends CommonController {
    //初始化
    public function _initialize(){
        parent::_initialize();
        $this->blog = M('Blog');
    }
    //博客内容
    public function index(){
        if(!IS_GET)$this->error('非法操作');
        $temp   = I('id',0,'int');
        $rs     = $this->blog->where(array('id' => $temp,'status'=>1))->setInc('view_count',1);
        if(false === $rs)$this->error('找不到该请求...');
        $field  = 'a.*,b.avatar,b.user_email,c.province';
        $join   = array('a left join __USER__ b on a.user_id = b.id','left join __USER_INFO__ c on a.user_id = c.user_id');
        $item   = $this->blog->field($field)-> join($join)->where(array('a.id' => $temp,'a.status'=>1))->find();
        if(null == $item)$this->error('找不到该请求...');
        if(false == $item)$this->error('系统未知错误...');
        $item['content']   = htmlspecialchars_decode($item['content']);
        $item['tags']       = explode(',',$item['tags']);
        $this->assign('item',$item);
        //诸如评论
        $this->get_comment($temp);
        $this->display();
    }

    //该id为博客的id主键
    public function get_comment($id){
        if(empty($id))$this->error('非法获得评论');
        $field      = 'id,comment_auther,content,create_time,blog_id,p_id';
        $map        = array('blog_id'   => $id,'status'=>1);
        $list       = M('Comment')->field($field)->where($map)->page('1,5')->order('create_time ASC')->select();
        $list       = arr1_arr2($list);
        $this->assign('comment_list',$list);
    }




}