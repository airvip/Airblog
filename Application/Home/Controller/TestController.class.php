<?php
namespace Home\Controller;
use Think\Controller;
class TestController extends Controller {


    public function index(){




        $arr    = array(
            0 => array(
                "id" => "1",
                "comment_auther" =>"路人甲",
                "content" =>  "1@###333333333333",
                "create_time" =>  "1461482411",
                "blog_id" =>  "10",
                "p_id" =>  "0"
            ),
            1   => array (
                "id" => "2",
                "comment_auther" => "路人丁",
                "content" => "3@1111111111111111",
                "create_time" => "1461482412",
                "blog_id" => "10",
                "p_id" =>"1"
            ),
            2   => array (
                "id" => "3",
                "comment_auther" => "路人丁",
                "content" => "3@1111111111111111",
                "create_time" => "1461482413",
                "blog_id" => "10",
                "p_id" =>"1"
            )
        );
        foreach($arr as $k=>&$v){
            if($v['p_id'] != 0){
                $new_arr[$v['p_id']]['childrens'][]    = $v;
            }else{
                $new_arr[$v['id']]    = $v;
            }

        }

        p($arr);
        p($new_arr);



















        
    }






}