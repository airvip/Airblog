/*!
 * function
 */
/**
 * ͳ������
 * @param  �ַ���
 * @return ����[��ǰ����, �������]
 */
function check (str) {
    var num = [0, 140];
    for (var i=0; i<str.length; i++) {
        //�ַ�����������ʱ
        if (str.charCodeAt(i) >= 0 && str.charCodeAt(i) <= 255){
            num[0] = num[0] + 0.5;//��ǰ��������0.5��
            num[1] = num[1] + 0.5;//���������������0.5��
        }else{
            //�ַ���������ʱ
            num[0]++;//��ǰ��������1��
        }
    }
    return num;
}

//ʱ���ת����ʱ��
function timeStamp2String(unixTime) {

    var time = new Date(unixTime * 1000);
    //��
    Y	= time.getUTCFullYear();
    //��
    if((time.getUTCMonth()+1)<10){
        m	= '0'+(time.getUTCMonth()+1);
    }else{
        m	= time.getUTCMonth()+1;
    }
    //��
    if(time.getUTCDate()<10){
        d	= '0'+(time.getUTCDate()+1);
    }else{
        d	= time.getUTCDate()+1;
    }
    //ʱ
    if(time.getUTCHours()<10){
        H	= "0" + (time.getUTCHours()+1);
    }else{
        H	= time.getUTCHours()+1;
    }
    //��
    if(time.getUTCMinutes()<10){
        i	= "0"+(time.getUTCMinutes()+1);
    }else{
        i	= time.getUTCMinutes()+1;
    }
    //��
    if(time.getUTCSeconds()<10){
        s	= "0"+time.getUTCSeconds();
    }else{
        s	= time.getUTCSeconds();
    }

    return d+'/'+m+'/'+Y+' '+H+':'+i;
}