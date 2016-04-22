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

				<ul class="nav navbar-nav navbar-right visible-xs">
					<li>
						<a href="<?php echo U('User/Index/index');?>">
							<span class="glyphicon glyphicon-home"></span>
							我的主页
						</a>
					</li>
					<li>
						<a href="<?php echo U('User/Blog/index');?>">
							<span class="glyphicon glyphicon-list-alt"></span>
							我的博客
						</a>
					</li>
					<li>
						<a href="<?php echo U('User/Person/index');?>">
							<span class="glyphicon glyphicon-user"></span>
							我的资料
						</a>
					</li>
					<?php if($_SESSION['user']['user_type'] == 0): ?><li>
							<a href="<?php echo U('Admin/Index/index');?>">
								<span class="glyphicon glyphicon-folder-open"></span>
								后台管理
							</a>
						</li><?php endif; ?>
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
				<!--sidebar START-->
				<div class="col-md-3 col-sm-3 hidden-xs">
<div class="list-group">
	<a class="list-group-item" href="<?php echo U('User/Index/index');?>">
		<span class="glyphicon glyphicon-home"></span>
		我的主页
	</a>
	<a class="list-group-item" href="<?php echo U('User/Blog/index');?>">
		<span class="glyphicon glyphicon-list-alt"></span>
		我的博客
	</a>
	<a class="list-group-item" href="<?php echo U('User/Person/index');?>">
		<span class="glyphicon glyphicon-user"></span>
		我的资料
	</a>
	<?php if($_SESSION['user']['user_type'] == 0): ?><a class="list-group-item" href="<?php echo U('Admin/Index/index');?>">
			<span class="glyphicon glyphicon-folder-open"></span>
			后台管理
		</a><?php endif; ?>
</div>
</div>
				<!--sidebar END-->

				<div class="col-md-9 about">
					<h3>
						<a href="<?php echo U('User/Blog/add');?>">新增博客</a>
					</h3>
					<p>瓢城企业培训有限公司是一家专业以智能化弱电工程为主的高科技民营企业，公司自创立以来一直专业致力于智能化弱电工程；始终坚持发扬"诚信、创新、沟通"为企业宗旨，以"技术、服务"为立业之本的团体精神，并形成一套完整的设计、安装、调试、培训、维护一站式服务体系。</p>
					<a name="2"></a>
					<h3>加入我们</h3>
					<p>网络已深刻改变着人们的生活，本地化生活服务市场前景巨大，生活半径团队坚信本地化生活服务与互联网的结合将会成就一家梦幻的公司，我们脚踏实地的相信梦想，我们相信你的加入会让生活半径更可能成为那家梦幻公司！生活半径人有梦想，有魄力，强执行力，但是要实现这个伟大的梦想，需要更多的有创业精神的你一路前行。公司将提供有竞争力的薪酬、完善的福利（五险一金）、期权、广阔的上升空间。只要你有能力、有激情、有梦想，愿意付出，愿意与公司共同成长，请加入我们！</p>
					<p>请发送您的简历到：hr@xxx.com，我们会在第一时间联系您！</p>
					<a name="3"></a>
					<h3>联系方式</h3>
					<p>地址：江苏省盐城市亭湖区大庆中路1234号</p>
					<p>邮编：1234567</p>
					<p>电话：010-88888888</p>
					<p>传真：010-88666666</p>
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