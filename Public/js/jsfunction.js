/*!
 * function
 */
/**
 * 统计字数
 * @param  字符串
 * @return 数组[当前字数, 最大字数]
 */
function check (str) {
    var num = [0, 140];
    for (var i=0; i<str.length; i++) {
        //字符串不是中文时
        if (str.charCodeAt(i) >= 0 && str.charCodeAt(i) <= 255){
            num[0] = num[0] + 0.5;//当前字数增加0.5个
            num[1] = num[1] + 0.5;//最大输入字数增加0.5个
        }else{
            //字符串是中文时
            num[0]++;//当前字数增加1个
        }
    }
    return num;
}

//时间戳转换成时间
function timeStamp2String(unixTime) {

    var time = new Date(unixTime * 1000);
    //年
    Y	= time.getUTCFullYear();
    //月
    if((time.getUTCMonth()+1)<10){
        m	= '0'+(time.getUTCMonth()+1);
    }else{
        m	= time.getUTCMonth()+1;
    }
    //日
    if(time.getUTCDate()<10){
        d	= '0'+(time.getUTCDate()+1);
    }else{
        d	= time.getUTCDate()+1;
    }
    //时
    if(time.getUTCHours()<10){
        H	= "0" + (time.getUTCHours()+1);
    }else{
        H	= time.getUTCHours()+1;
    }
    //分
    if(time.getUTCMinutes()<10){
        i	= "0"+(time.getUTCMinutes()+1);
    }else{
        i	= time.getUTCMinutes()+1;
    }
    //秒
    if(time.getUTCSeconds()<10){
        s	= "0"+time.getUTCSeconds();
    }else{
        s	= time.getUTCSeconds();
    }

    return d+'/'+m+'/'+Y+' '+H+':'+i;
}