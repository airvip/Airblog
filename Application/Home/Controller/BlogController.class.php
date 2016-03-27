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
        $field  = 'a.id,a.content,a.title,a.blog_info,a.tags,a.create_time,a.edit_time,a.auther,b.avatar,b.user_email,c.province';
        $join   = array('a left join __USER__ b on a.user_id = b.id','left join __USER_INFO__ c on a.user_id = c.user_id');
        $item   = $this->blog->field($field)-> join($join)->where(array('a.id' => $temp,'status'=>1))->find();
        if(null == $item)$this->error('找不到该请求...');
        if(false == $item)$this->error('系统未知错误...');
        $item['content']   = htmlspecialchars_decode($item['content']);
        $this->assign('item',$item);

        $tag_map['id']  = array('in',$item['tags']);
        $tag_field       = 'id,name';
        $tag_list   = M('Tag')->field($tag_field)->where($tag_map)->select();
        $this->assign('tag_list',$tag_list);
        $this->display();
    }


}