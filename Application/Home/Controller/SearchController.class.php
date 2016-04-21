<?php
namespace Home\Controller;
use Think\Controller;
class SearchController extends CommonController {
    //初始化
    public function _initialize(){
        parent::_initialize();
        $this->blog = M('Blog');
    }
    //博客内容
    public function index(){
        if(!(IS_GET || IS_POST)) $this->error('非法操作');
        $temp   = I();
        $key    = array_keys($temp);
        if(empty($key[0]))$this->error('非法操作');
        switch($key[0]){
            case 'key_word' :
                 $map['title|content|blog_info'] = array('like','%'.$temp['key_word'].'%');break;
            case 'tags_name' :
                $map['tags']    = array('like','%'.$temp['tags_name'].'%');break;
            default :
                $this->error('非法操作');
        }
        $map['status']  = array('eq',1);
        $order  = 'recommend DESC,id DESC';
        $field  = 'title,thumb,blog_info,create_time,edit_time,auther';
        $list   = $this->page($this->blog,C('ADMIN_PAGE'),$map,$order);
        if(false === $list)$this->error('系统出现了不可预知的问题...');
        $this->assign('list',$list);
        $this->display('Home@Index/index');
    }


}