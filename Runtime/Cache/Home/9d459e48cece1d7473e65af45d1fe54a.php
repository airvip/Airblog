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
				<h1>那些年走过的旅程</h1>
				<h4>每一步的成长源于大家最初的知识积累...</h4>
			</hgroup>
		</div>
	</div>






	<div id="case">
		<div class="container">
			<div class="row">
				<?php if(is_array($list)): $i = 0; $__LIST__ = $list;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><div class="col-lg-3 col-md-4 col-sm-6 col-xs-12 col">
						<div class="thumbnail">
							<a href="<?php echo ($vo['url']); ?>" target="_blank">
								<?php if(!empty($vo['thumb']) && file_exists($vo['thumb'])): ?><img  src="/Airblog/<?php echo ($vo['thumb']); ?>">
								<?php else: ?>
									<img  src="/Airblog/Public/img/no-pic.png"><?php endif; ?>
								<div class="caption">
									<h4><?php echo empty($vo['name']) ? '保密内容' : $vo['name'];?></h4>
									<p><?php echo empty($vo['info']) ? '保密内容' : $vo['info'];?></p>
								</div>
							</a>
						</div>
					</div><?php endforeach; endif; else: echo "" ;endif; ?>
				<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12"><?php echo ($page); ?></div>
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




</body>
</html>