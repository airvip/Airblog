<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html lang="zh-CN">
<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="shortcut icon" href="/Airblog/Public/img/ico_48.ico">
	<meta name="keywords" content="<?php echo (C("KEY_WORD")); ?>" />
	<meta name="description" content="<?php echo (C("DESCRIPTION")); ?>"/>
	<title><?php echo (C("WEB_NAME")); if(!empty($item['title'])): ?>|<?php echo ($item['title']); endif; ?></title>

	<link rel="stylesheet" type="text/css" href="/Airblog/Public/css/bootstrap.min.css">

	<!--[if lt IE 9]>
	<script src="//cdn.bootcss.com/html5shiv/3.7.2/html5shiv.min.js"></script>
	<script src="//cdn.bootcss.com/respond.js/1.4.2/respond.min.js"></script>
	<![endif]-->
	<link rel="stylesheet" type="text/css" href="/Airblog/Public/css/style.css">

<link rel="stylesheet" type="text/css" href="/Airblog/Public/css/login.css">
</head>
<body>

    <div class="container">
      <div class="wid-330">

        <div class="login-width">
            <a href="<?php echo U('Home/Index/index');?>">
                <img src="/Airblog/Public/img/logo.png" alt="" class="img-responsive center-block">
            </a>
        </div>
        <form class="form-signin" method="post" action="<?php echo U('Home/Login/login_run');?>">
          <div class="form-group  has-feedback">
              <div class="input-group">
                  <span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
                  <input type="text" placeholder="ninkname" class="form-control" name="nickname" >
              </div>
              <span class="glyphicon glyphicon-ok form-control-feedback hide" aria-hidden="true"></span>
          </div>

          <div class="form-group  has-feedback">
              <div class="input-group">
                  <span class="input-group-addon"><i class="glyphicon glyphicon-asterisk"></i></span>
                  <input type="password" placeholder="password" class="form-control" name="user_pass" >
              </div>
              <span class="glyphicon glyphicon-ok form-control-feedback hide" aria-hidden="true"></span>
          </div>

         <div class="checkbox">
           <label>
              <input type="checkbox" value="remember-me"> Remember me
           </label>
          </div>
          <button class="btn btn-default btn-success btn-block" type="submit">Sign in</button>
        </form>
        <div class="login-width">
            <div class="form-group">
                还没有账户 ? <a class="pull-right" href="<?php echo U('Home/Index/index');?>">返回首页</a>
                <div class="clearfix"></div>
            </div>
            <div class="form-group">
                <a class="btn btn-default btn-warning btn-block" href="<?php echo U('Home/Login/reg');?>">立即注册 </a>
            </div>
            <p>
                忘记密码 ? <a class="pull-right" href="<?php echo U('Home/Login/for_pass');?>">找回密码</a>
            <div class="clearfix"></div>
            </p>
        </div>

      </div>
    </div> <!-- /container -->



    <script>
    </script>
</body>
</html>