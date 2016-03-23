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
//时间推算函数
function postTime($date) {
    $str = '';
    $diff = time() - $date;
    $day = floor($diff / 86400);
    $free = $diff % 86400;
    if($day > 0) {
        return $day."日前";
    }else{
        if($free>0){
            $hour = floor($free / 3600);
            $free = $free % 3600;
            if($hour>0){
                return $hour."時間前";
            }else{
                if($free>0){
                    $min = floor($free / 60);
                    $free = $free % 60;
                    if($min>0){
                        return $min."分前";
                    }else{
                        if($free>0){
                            return $free."秒前";
                        }else{
                            return 'さきほど';
                        }
                    }
                }else{
                    return 'さきほど';
                }
            }
        }else{
            return 'さきほど';
        }
    }
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
