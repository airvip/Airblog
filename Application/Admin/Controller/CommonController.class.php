<?php
namespace Admin\Controller;
use Think\Controller;
class CommonController extends Controller {
    public function _initialize(){
         header("Content-Type:text/html; charset=utf-8");
         if(!isset($_SESSION['user']['id'])){
             $this->redirect('Admin/Login/index');
         }
        $admin  = M('User')->where(array('id'=>$_SESSION['user']['id'],'user_type'=>0))->find();
        if(null == $admin) $this->redirect('Admin/Login/index');
        $this->assign('admin',$admin);
    }

    public function _empty(){
        $this->error('非法操作');
    }
    //图片上传方法
    protected function upload($Files,$path='Avatar',$type=array('jpg','png','jpeg')){
        $upload = new \Think\Upload();                              // upload class
        $upload->maxSize   = 2097152;                               // file size 8M is 8388608 ,default(2m)
        $upload->exts      = $type;//array('jpg', 'png', 'jpeg');       // what is type
        $upload->rootPath  = './Uploads/';
        $upload->savePath  = $path.'/';                             // children file
        $upload->autoSub   = true;
        //$upload->subName   = array('date','Y/m/d');
        $upload->subName   = date('Y/m_d',time());
        $info   =   $upload->upload($Files);
        if(!$info) {
            $this->error($upload->getError());return false;exit;
        }
        return $info;
    }
    //生成缩略图的方法
    protected function thumb($data,$scale_width = '500',$scale_height = '500'){
        $source = './Uploads/'.$data['savepath'].$data['savename'];
        $thumb = './Uploads/'.$data['savepath'].'thumb_'.$data['savename'];
        $temp = new \Think\Image();
        $size = getimagesize($source);
        $width  = $size[0];
        $height = $size[1];
        $temp->open($source);
        if($width>$height){
            $temp_width  = ($width/$height)*$scale_height;
            $temp_height = $scale_height;
        }
        if($width<$height){
            $temp_width  = $scale_width;
            $temp_height = ($height/$width)*$scale_width;
        }
        $temp->thumb($temp_width, $temp_height, \Think\Image::IMAGE_THUMB_FIXED)->save($thumb);
        $temp->open($thumb);
        $temp->thumb($scale_width, $scale_height, \Think\Image::IMAGE_THUMB_CENTER)->save($thumb);
        return $thumb;
    }


    /**
     * @param $obj 分页方法
     * @return mixed
     */
    protected function page($obj, $size =25, $where = '', $order = '', $field = true, $join = '')
    {
        $count = $obj->where($where)->join($join)->count();
        $Page = new \Think\Page($count, $size);
        //$Page->setConfig('theme','%FIRST% %UP_PAGE% %LINK_PAGE% %DOWN_PAGE% %END% 全 %TOTAL_ROW% 件');
        $Page->setConfig('theme','%UP_PAGE% %LINK_PAGE% %DOWN_PAGE%  全 %TOTAL_ROW% 件');
        $show = $Page->show();
        $list = $obj->field($field)->where($where)->order($order)->join($join)->limit($Page->firstRow . ',' . $Page->listRows)->select();
        $this->assign('page', $show);
        $this->assign('count',$count);
        return $list;
    }




}