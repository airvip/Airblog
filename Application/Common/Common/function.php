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
/**
 * @param unknown $value[需要加密或解密的字符串]
 * @param number $type [加密解密（0：加密，1：解密）]
 * @return [加密或解密后的字符串]
 *  */
function token_pass($value,$type=0){
    if(0 == $type)return str_replace('/','@',base64_encode($value));
    return base64_decode(str_replace('@','/',$value));
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





function authcode($string, $operation = 'DECODE', $key = 'iloveyou', $expiry = 0) {
    // 动态密匙长度，相同的明文会生成不同密文就是依靠动态密匙
    $ckey_length = 4;

    // 密匙
    $key = md5($key);

    // 密匙a会参与加解密
    $keya = md5(substr($key, 0, 16));
    // 密匙b会用来做数据完整性验证
    $keyb = md5(substr($key, 16, 16));
    // 密匙c用于变化生成的密文
    $keyc = $ckey_length ? ($operation == 'DECODE' ? substr($string, 0, $ckey_length):
        substr(md5(microtime()), -$ckey_length)) : '';
    // 参与运算的密匙
    $cryptkey = $keya.md5($keya.$keyc);
    $key_length = strlen($cryptkey);
    // 明文，前10位用来保存时间戳，解密时验证数据有效性，10到26位用来保存$keyb(密匙b)，
//解密时会通过这个密匙验证数据完整性
    // 如果是解码的话，会从第$ckey_length位开始，因为密文前$ckey_length位保存 动态密匙，以保证解密正确
    $string = $operation == 'DECODE' ? base64_decode(substr($string, $ckey_length)) :
        sprintf('%010d', $expiry ? $expiry + time() : 0).substr(md5($string.$keyb), 0, 16).$string;
    $string_length = strlen($string);
    $result = '';
    $box = range(0, 255);
    $rndkey = array();
    // 产生密匙簿
    for($i = 0; $i <= 255; $i++) {
        $rndkey[$i] = ord($cryptkey[$i % $key_length]);
    }
    // 用固定的算法，打乱密匙簿，增加随机性，好像很复杂，实际上对并不会增加密文的强度
    for($j = $i = 0; $i < 256; $i++) {
        $j = ($j + $box[$i] + $rndkey[$i]) % 256;
        $tmp = $box[$i];
        $box[$i] = $box[$j];
        $box[$j] = $tmp;
    }
    // 核心加解密部分
    for($a = $j = $i = 0; $i < $string_length; $i++) {
        $a = ($a + 1) % 256;
        $j = ($j + $box[$a]) % 256;
        $tmp = $box[$a];
        $box[$a] = $box[$j];
        $box[$j] = $tmp;
        // 从密匙簿得出密匙进行异或，再转成字符
        $result .= chr(ord($string[$i]) ^ ($box[($box[$a] + $box[$j]) % 256]));
    }
    if($operation == 'DECODE') {
        // 验证数据有效性，请看未加密明文的格式
        if((substr($result, 0, 10) == 0 || substr($result, 0, 10) - time() > 0) &&
            substr($result, 10, 16) == substr(md5(substr($result, 26).$keyb), 0, 16)) {
            return substr($result, 26);
        } else {
            return '';
        }
    } else {
        // 把动态密匙保存在密文里，这也是为什么同样的明文，生产不同密文后能解密的原因
        // 因为加密后的密文可能是一些特殊字符，复制过程可能会丢失，所以用base64编码
        return $keyc.str_replace('=', '', base64_encode($result));
    }
}


