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

</head>
<body>
		<!--nav start-->
	<nav class="navbar navbar-default navbar-fixed-top">
		<div class="container">
			<div class="navbar-header">
				<a href="<?php echo U('Home/Index/index');?>" class="navbar-brand logo"><b>AirBlog</b></a>
				<button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
					<span class="sr-only">&nbsp;</span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
				</button>

			</div>
			<div class="collapse navbar-collapse" id="navbar">
				<form action="<?php echo U('Home/Search/index');?>" method="post" class=" navbar-form navbar-left" role="search">
					<div class="input-group">
						<input type="text" name="key_word" required class="form-control" placeholder="KeyWords">
						<span class="input-group-btn">
        					<button class="btn btn-default" type="submit"><span class="glyphicon glyphicon-search"></span></button>
        				</span>
					</div>
				</form>
				<ul class="nav navbar-nav navbar-right">
					<li>
						<a href="<?php echo U('Home/Index/index');?>">
							<span class="glyphicon glyphicon-home"></span>
							首页
						</a>
					</li>
					<li>
						<a href="<?php echo U('Home/Project/index');?>">
							<span class="glyphicon glyphicon-fire"></span>
							案例
						</a>
					</li>
					<li class="dropdown" id="web-user">
						<a href="###" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">
							<span class="glyphicon glyphicon-user"></span>
							会员
							<span class="caret"></span>
						</a>
						<ul class="dropdown-menu">
							<?php if(empty($_SESSION['user']['id'])): ?><li>
									<a href="<?php echo U('Home/Login/index');?>">
										登录
									</a>
								</li>
								<li class="divider"></li>
								<li>
									<a href="<?php echo U('Home/Login/reg');?>">
										注册
									</a>
								</li>
							<?php else: ?>
								<li>
									<a href="<?php echo U('User/Index/index');?>">
										用户中心
									</a>
								</li>
								<?php if($_SESSION['user']['user_type'] == 0): ?><li>
										<a href="<?php echo U('Admin/Index/index');?>">
											后台管理
										</a>
									</li><?php endif; ?>
								<li class="divider"></li>
								<li>
									<a href="<?php echo U('Home/Common/logout');?>">
										退出登录
									</a>
								</li><?php endif; ?>

						</ul>
					</li>
				</ul>
			</div>
		</div>
	</nav>
	<!--nav end-->

	<div class="jumbotron">
		<div class="container">
			<hgroup>
				<h1>那些年走过的坑</h1>
				<h4>Airblog是一款基于Bootstrap&Tp的免费博客系统...</h4>
				<h5>
					<a href="http://wpa.qq.com/msgrd?v=3&uin=980062449&site=qq&menu=yes" target="_blank" title="技术支持">
						阿尔维奇
						<span class="text-error" title="私人QQ">980062449</span>
					</a>
				</h5>
			</hgroup>
		</div>
	</div>








	<div id="about">
		<div class="container">
			<div class="row">
				<div class="col-md-3 hidden-sm hidden-xs">
					<div class="list-group">
	<a class="list-group-item" href="<?php echo U('User/Index/index');?>">个人主页</a>
	<a class="list-group-item" href="<?php echo U('User/Blog/index');?>">我的博客</a>
	<a class="list-group-item" href="<?php echo U('User/Person/index');?>">个人信息</a>
</div>
				</div>
				<div class="col-md-9 about">

					<h3>
						<a class="btn btn-sm btn-default" href="<?php echo U('User/Blog/add');?>">新增博客</a>
					</h3>
					
				</div>
			</div>
		</div>
	</div>










		<!--footer Start-->
	<footer id="footer" class="text-muted">
		<div class="container">
			<p>
				<?php if(is_array($list_link)): $i = 0; $__LIST__ = $list_link;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i; if($key != 0): ?>|<?php endif; ?><a href="<?php echo ($vo['link_url']); ?>"><?php echo ($vo['name']); ?></a><?php endforeach; endif; else: echo "" ;endif; ?>
			</p>
			<p><?php echo C('COPY');?> Powered by Bootstrap & Thinkphp.</p>
		</div>
	</footer>
	

	
	<script src="/Airblog/Public/js/jquery-2.1.1.min.js"></script>
	<script src="/Airblog/Public/js/bootstrap.min.js"></script>
	<!--footer End-->



	<script>
		
	</script>
</body>
</html>