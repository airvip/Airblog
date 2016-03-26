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
        $map    = array(
            'status'   => array('neq',2)
        );
        $order  = 'recommend DESC,id DESC';
        $list   = $this->page($this->blog,C('ADMIN_PAGE'),$map,$order);
        if(false === $list)$this->error('系统出现了不可预知的问题...');
        $this->assign('list',$list);
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
        if(empty($temp['blog_info']))$temp['blog_info']   = cut_str(strip_tags(htmlspecialchars_decode($temp['content'])),75);
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
        $temp               = I('id');
        $map                = array('id' => $temp);
        $item               = $this->blog->where($map)->find();
        if(null == $item)$this->error('找不到该请求...');
        if(false == $item)$this->error('系统未知错误...');
        $item['content']   = htmlspecialchars_decode($item['content']);
        $this->assign('item',$item);
        $this->display();
    }
    //显示编辑页面
    public function edit(){
        if(!IS_GET)$this->error('非法操作');
        $item   = $this->blog->where(array('id' => I('id')))->find();
        if(false === $item)$this->error('系统出现了不可预知的问题...');
        if(null === $item)$this->error('该博客不存在...');
        $item['tags']   = explode(',',$item['tags']);
        $this->assign('item',$item);
        //注入标签
        $tags   = M('Tag')->field('id,name')->where(array('status'=>1))->order('sort ASC,create_time DESC')->select();
        $this->assign('list',$tags);
        $this->display();
    }
    //编辑处理
    public function edit_run(){
        if(!IS_POST)$this->error('非法操作');
        $temp   = I('post.');
        //数据组合
        $temp['tags']   = implode(',',$temp['tags']);
        if(empty($temp['blog_info']))$temp['blog_info']   = cut_str(strip_tags(htmlspecialchars_decode($temp['content'])),75);
        $data   = array(
            'title'         => $temp['title'],
            'blog_info'    => $temp['blog_info'],
            'content'      => $temp['content'],
            'tags'          => $temp['tags'],
            'edit_time'    => time(),
            'status'        => $temp['status'],
            'recommend'     => $temp['recommend'],
        );
        //图像处理
        if(!empty($_FILES['thumb']['name'])){
            $img            = $this->upload($_FILES,'Blog');
            $thumb          = $this->thumb($img['thumb'],350,220);
            $data['thumb'] = $thumb;
        }
        $map    = array('id'=>$temp['id']);
        $rs = $this->blog->where($map)->save($data);
        if(!$rs)$this->error('操作失败');
        $this->success('操作成功');
    }

    //删除（假删除status=2）
    public function delete(){
        if(!IS_AJAX)$this->error('非法操作');
        $temp   = I('post.');
        $data   = array(
            'id'            => $temp['id'],
            'status'       => 2
        );
        $rs = $this->blog->save($data);
        if(false === $rs)ajax_return(0,'','删除失败');
        ajax_return(1,'','删除成功');
    }

    //查找
    public function search(){
        if(!IS_POST)$this->error('非法操作');
        $temp   = I('post.');
        if(empty($temp['search']))$this->error('搜索内容不能为空');
        $map    = array($temp['name']=>array('like','%'.$temp['search'].'%'));
        $list   = $this->page($this->blog,C('ADMIN_PAGE'),$map,'id DESC');
        if(false === $list)$this->error('系统出现了不可预知的问题...');
        $this->assign('list',$list);
        $this->display('Admin@Blog/index');
    }



    //上传
    public function img_up_blog(){
        $info   = $this->upload($_FILES,'Blog');
        if(false == $info){
            $return = array('success'=> false,'msg'=> '上传失败','file_path'=> null);
        }else{
            $return = array('success'=> true,'msg'=> '上传成功','file_path'=> '/'.C('WEB_URL').'/Uploads/'.$info['blog_img']['savepath'].$info['blog_img']['savename']);
        }
        echo json_encode($return);
    }



}