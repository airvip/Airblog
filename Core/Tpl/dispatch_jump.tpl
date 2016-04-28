<?php
    if(C('LAYOUT_ON')) {
        echo '{__NOLAYOUT__}';
    }
?>
<!DOCTYPE html>
<html lang="zh-CN">
<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="shortcut icon" href="__PUBLIC__/img/ico_48.ico">
	<meta name="keywords" content="{$Think.config.KEY_WORD}" />
	<meta name="description" content="{$Think.config.DESCRIPTION}"/>
	<title>{$Think.config.WEB_NAME}</title>
<style type="text/css">
*{ padding: 0; margin: 0; }
body{ background: #EFDBCD url('/Public/img/error_bg.png') repeat-x; font-family:'Constantia,Georgia,微软雅黑'; color: #333; font-size: 16px; }
.system-message{ padding: 24px 48px; }
.system-message h1{font-size: 100px; font-weight: normal; line-height: 120px; margin-bottom: 12px; }
.system-message .jump{ padding-top: 10px}
.system-message .jump a{ color: #FFF;background-color:#94431A;border:1px solid #94431A;padding: 5px;text-decoration: none; }
.system-message .success,.system-message .error{ line-height: 1.8em; font-size: 36px }
.system-message .detail{ font-size: 12px; line-height: 20px; margin-top: 12px; display:none}
</style>
</head>
<body>


<div class="system-message">

	<?php if(isset($message)) {?>
		<h1>OK<img src="__PUBLIC__/img/err_img.gif" alt=""></h1>
	<p class="success"><?php echo($message); ?></p>
	<?php }else{?>
	<h1>ERROR<img src="__PUBLIC__/img/err_img.gif" alt=""></h1>
	<p class="error"><?php echo($error); ?></p>
	<?php }?>
	<p class="detail"></p>
	<p class="jump">
		<b id="wait"><?php echo($waitSecond); ?> </b>秒后页面自动跳转...
		<a id="href" href="<?php echo($jumpUrl); ?>">直接跳转</a>
	</p>
</div>












<script type="text/javascript">
(function(){
var wait = document.getElementById('wait'),href = document.getElementById('href').href;
var interval = setInterval(function(){
	var time = --wait.innerHTML;
	if(time <= 0) {
		location.href = href;
		clearInterval(interval);
	};
}, 1000);
})();
</script>
</body>
</html>
