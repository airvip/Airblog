<?php

/**
 * 格式化打印数组
 * @param unknown $arr
 */
function p($var=null) {
    if(empty($var)){
        echo 'null<br>';
    }elseif(is_array($var)||is_object($var)){
        //array,object
        echo '<pre>';
        print_r($var);
        echo '</pre>';
    }else{
        //string,int,float...
        echo $var.'<br>';
    }
}

/**
 * 异位或加密字符串
 * @param unknown $value[需要加密的字符串]
 * @param number $type [加密解密（0：加密，1：解密）]
 * @return [加密或解密后的字符串]
 *  */
function encryption($value,$type=0){
    $key= md5(C('ENCTYPTION_KEY'));
    if(!$type){
        return str_replace('=', '', base64_encode($value^$key));
    }
    $value=base64_decode($value);
    return $value^$key;
}

//评论一维数组转二维
function arr1_arr2($arr=array()){
    if(empty($arr))return $arr;
    foreach($arr as $k=>&$v){
        if($v['p_id'] != 0){
            $new_arr[$v['p_id']]['childrens'][]    = $v;
        }else{
            $new_arr[$v['id']]    = $v;
        }
    }
    unset($v);
    return $new_arr;
}

//ajax返回的数据
function ajax_return($code = 0,$data = '',$mess = ''){
    $temp   = array(
        'code'  => $code,
        'data'  => $data,
        'mess'  => $mess
    );
    echo json_encode($temp);exit;
};

//获取真实IP（discuz）
function getIp(){
    $onlineip='';
    if(getenv('HTTP_CLIENT_IP')&&strcasecmp(getenv('HTTP_CLIENT_IP'),'unknown')){
        $onlineip=getenv('HTTP_CLIENT_IP');
    } elseif(getenv('HTTP_X_FORWARDED_FOR')&&strcasecmp(getenv('HTTP_X_FORWARDED_FOR'),'unknown')){
        $onlineip=getenv('HTTP_X_FORWARDED_FOR');
    } elseif(getenv('REMOTE_ADDR')&&strcasecmp(getenv('REMOTE_ADDR'),'unknown')){
        $onlineip=getenv('REMOTE_ADDR');
    } elseif(isset($_SERVER['REMOTE_ADDR'])&&$_SERVER['REMOTE_ADDR']&&strcasecmp($_SERVER['REMOTE_ADDR'],'unknown')){
        $onlineip=$_SERVER['REMOTE_ADDR'];
    }
    return $onlineip;
}

//字符串截取函数
function cut_str($string, $sublen, $start = 0, $code = 'UTF-8') {
    if($code == 'UTF-8') {
        $pa ="/[\x01-\x7f]|[\xc2-\xdf][\x80-\xbf]|\xe0[\xa0-\xbf][\x80-\xbf]|[\xe1-\xef][\x80-\xbf][\x80-\xbf]|\xf0[\x90-\xbf][\x80-\xbf][\x80-\xbf]|[\xf1-\xf7][\x80-\xbf][\x80-\xbf][\x80-\xbf]/";
        preg_match_all($pa, $string, $t_string); if(count($t_string[0]) - $start > $sublen) return join('', array_slice($t_string[0], $start, $sublen))."...";
        return join('', array_slice($t_string[0], $start, $sublen));
    }else {
        $start = $start*2;
        $sublen = $sublen*2;
        $strlen = strlen($string);
        $tmpstr = ''; for($i=0; $i<$strlen; $i++){
            if($i>=$start && $i<($start+$sublen)){
                if(ord(substr($string, $i, 1))>129){
                    $tmpstr.= substr($string, $i, 2);
                } else {
                    $tmpstr.= substr($string, $i, 1);
                }
            }
            if(ord(substr($string, $i, 1))>129) $i++;
        }
        if(strlen($tmpstr)<$strlen ) $tmpstr.= "...";
        return $tmpstr;
    }
}
/* 格式化时间戳 */
function time_format($time){
    //当前时间戳
    $now=time();
    //今天0时0分0秒
    $today=strtotime(date('y-m-d',$now));
    //传递时间与当前时间相差的秒数
    $diff=$now - $time;
    $str='';
    switch ($diff){
        case $diff<60:
            $str= $diff.'&nbsp;秒前';
            break;
        case $diff<3600:
            $str=floor($diff/60).'&nbsp;分钟前';
            break;
        case $diff<(3600*8):
            $str=floor($diff/3600).'&nbsp;小时前';
            break;
        case $time>$today:
            $str='今天&nbsp;'.date('H:i',$time);
            break;
        default:
            $str=date('d/M/Y',$time);
    }
    return $str;
}

//compute product tax
/*
 * $price @int          price number
 * $sign  @string
 */
function formatPrice($price=0,$addTax=0,$sign = ''){
    $tax    = C('TAX');
    if($addTax == 1){
        $tempPrice  = round($price*(1+$tax));
        return '￥'.number_format($tempPrice,0,'.',',').$sign;
    }else{
        return '￥'.number_format(round($price),0,'.',',').$sign;
    }
}
function br2nl($text){
    return preg_replace('/<br\\s*?\/??>/i','',$text);
}


function is_mobile()
{
    $user_agent = $_SERVER['HTTP_USER_AGENT'];
    $mobile_browser = Array(
        "mqqbrowser", //手机QQ浏览器
        "opera mobi", //手机opera
        "juc", "iuc",//uc浏览器
        "fennec", "ios", "applewebKit/420", "applewebkit/525", "applewebkit/532", "ipad", "iphone", "ipaq", "ipod",
        "iemobile", "windows ce",//windows phone
        "240×320", "480×640", "acer", "android", "anywhereyougo.com", "asus", "audio", "blackberry", "blazer", "coolpad", "dopod", "etouch", "hitachi", "htc", "huawei", "jbrowser", "lenovo", "lg", "lg-", "lge-", "lge", "mobi", "moto", "nokia", "phone", "samsung", "sony", "symbian", "tablet", "tianyu", "wap", "xda", "xde", "zte"
    );
    $is_mobile = false;
    foreach ($mobile_browser as $device) {
        if (stristr($user_agent, $device)) {
            $is_mobile = true;
            break;
        }
    }
    return $is_mobile;
}

