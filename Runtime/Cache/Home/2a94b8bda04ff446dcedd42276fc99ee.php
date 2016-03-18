<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html lang="zh-CN">
<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="shortcut icon" href="/Airblog/Public/img/ico_48.ico">
	<meta name="keywords" content="个人博客，技术博客，内涵段子，告白墙，百度云下载，资源下载，bt下载，360云下载" />
	<meta name="description" content="阿尔维奇的技术博客，搞笑图片，内涵段子，云资源下载，告白墙，恋爱告白，php,phper,技术交流，资源提供,bt下载,爱分享，爱编程，php难题解决,php技术分享,软件共享,云视频下载"/>
	<title>Bootstrap</title>

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
				<ul class="nav navbar-nav navbar-right">
					<li><a href="<?php echo U('Home/Index/index');?>"><span class="glyphicon glyphicon-home"></span>&nbsp;首页</a></li>
					<li><a href="<?php echo U('Home/Blog/index');?>"><span class="glyphicon glyphicon-list"></span>&nbsp;博客</a></li>
					<li><a href="<?php echo U('Home/Project/index');?>"><span class="glyphicon glyphicon-fire"></span>&nbsp;案例</a></li>
					<li><a href="<?php echo U('Home/About/index');?>"><span class="glyphicon glyphicon-question-sign"></span>&nbsp;关于</a></li>
				</ul>
			</div>
		</div>
	</nav>
	<!--nav end-->






	<div id="myCarousel" class="carousel slide">
		
		<ol class="carousel-indicators">
			<li data-target="#myCarousel" data-slide-to="0" class="active"></li>
			<li data-target="#myCarousel" data-slide-to="1"></li>
			<li data-target="#myCarousel" data-slide-to="2"></li>
		</ol>
		<div class="carousel-inner" role="listbox">
			<div class="item active" style="background: #f60;">
				<img src="/Airblog/Public/img/1.png" alt="第一张">
			</div>
			<div class="item">
				<img src="/Airblog/Public/img/2.png" alt="第一张">
			</div>
			<div class="item">
				<img src="/Airblog/Public/img/3.png" alt="第一张">
			</div>
		</div>
		<a class="left carousel-control" href="#myCarousel" role="button" data-slide="prev">
			<span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
			<span class="sr-only">Previous</span>
		</a>
		<a class="right carousel-control" href="#myCarousel" role="button" data-slide="next">
			<span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
			<span class="sr-only">Next</span>
		</a>
	</div>




	<div class="tab1">
		<div class="container">
			<h2 class="tab-h2">『Bootstrap 教程』</h2>
			<p class="tab-p">Bootstrap 教程 Bootstrap,来自 Twitter,是目前最受欢迎的前端框架。</p>
			<div class="row">
				<div class="col-md-6 col">
					<div class="media">
						<div class="media-left media-middle">
							<a href="#">
								<img class="media-object" src="/Airblog/Public/img/tab1-1.png" alt="...">
							</a>
						</div>
						<div class="media-body">
							<h4 class="media-heading">课程内容</h4>
							<p class="text-muted">其他：高校不知名的讲师编写，没有任何实战价值的教材！</p>
							<p>其他：知名企业家、管理学大师联合编写的具有实现性教材！</p>
						</div>
					</div>
				</div>
				<div class="col-md-6 col">
					<div class="media">
						<div class="media-left media-middle">
							<a href="#">
								<img class="media-object" src="/Airblog/Public/img/tab1-2.png" alt="...">
							</a>
						</div>
						<div class="media-body">
							<h4 class="media-heading">课程内容</h4>
							<p class="text-muted">其他：高校不知名的讲师编写，没有任何实战价值的教材！</p>
							<p>其他：知名企业家、管理学大师联合编写的具有实现性教材！</p>
						</div>
					</div>
				</div>
				<div class="col-md-6 col">
					<div class="media">
						<div class="media-left media-middle">
							<a href="#">
								<img class="media-object" src="/Airblog/Public/img/tab1-3.png" alt="...">
							</a>
						</div>
						<div class="media-body">
							<h4 class="media-heading">课程内容</h4>
							<p class="text-muted">其他：高校不知名的讲师编写，没有任何实战价值的教材！</p>
							<p>其他：知名企业家、管理学大师联合编写的具有实现性教材！</p>
						</div>
					</div>
				</div>
				<div class="col-md-6 col">
					<div class="media">
						<div class="media-left media-middle">
							<a href="#">
								<img class="media-object" src="/Airblog/Public/img/tab1-4.png" alt="...">
							</a>
						</div>
						<div class="media-body">
							<h4 class="media-heading">课程内容</h4>
							<p class="text-muted">其他：高校不知名的讲师编写，没有任何实战价值的教材！</p>
							<p>其他：知名企业家、管理学大师联合编写的具有实现性教材！</p>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>



	<div class="tab2">
		<div class="container">
			<div class="row">
				<div class="col-md-6 col-sm-6 tab2-img">
					<img src="/Airblog/Public/img/tab2.png" alt="" class="auto img-responsive center-block">
				</div>
				<div class="text col-md-6 col-sm-6 tab2-text">
					<h3>强大的学习体系</h3>
					<p>经过管理学大师层层把关、让您的企业突飞猛进。</p>
				</div>
			</div>
		</div>
	</div>

	<div class="tab3">
		<div class="container">
			<div class="row">
				<div class="col-md-6 col-sm-6">
					<img src="/Airblog/Public/img/tab3.png" alt="" class="auto img-responsive center-block">
				</div>
				<div class="text col-md-6 col-sm-6">
					<h3>完美的管理方式</h3>
					<p>最新的管理培训方案，让您的企业赶超同行。</p>
				</div>
			</div>
		</div>
	</div>










		<!--footer Start-->
	<footer id="footer" class="text-muted">
		<div class="container">
			<p>企业培训 | 合作事宜 | 版权投诉</p>
			<p>陕ICP备12345678. © 2009-2016 AirBlog官方平台. Powered by Bootstrap & Thinkphp.</p>
		</div>
	</footer>
	

	
	<script src="/Airblog/Public/js/jquery-2.1.1.min.js"></script>
	<script src="/Airblog/Public/js/bootstrap.min.js"></script>
	<!--footer End-->



	<script src="/Airblog/Public/js/"></script>
	<script>

	</script>
</body>
</html>