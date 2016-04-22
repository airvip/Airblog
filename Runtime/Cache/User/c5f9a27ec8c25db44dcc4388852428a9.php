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


				<div class="col-md-9 col-sm-9 hidden-xs about" id="user-content">

					<h3 class="hidden-xs">
						<div class="btn-group" role="group" >
							<a class="btn btn-sm btn-default" href="<?php echo U('User/Blog/index');?>">我的博客</a>
							<a class="btn btn-sm btn-default" href="<?php echo U('User/Blog/add');?>">新增博客</a>
						</div>
					</h3>

					<div class="row">
						<div class="col-lg-12 col-sm-12 col-md-12">

							<form action="<?php echo U('User/Blog/add_run');?>" method="post" class="form-horizontal" enctype="multipart/form-data">
								<div class="form-group">
									<label class="col-sm-3 control-label">博客标题</label>
									<div class="col-sm-9 controls">
										<div class="row">
											<div class="col-xs-9">
												<input type="text" name="title" required placeholder="博客标题" class="form-control" autofocus/>
												<div class="text-danger">标题少于30字</div>
											</div>
										</div>
									</div>
								</div>
								<div class="form-group"><label class="col-sm-3 control-label">缩略图片</label>
									<div class="col-sm-9 controls">
										<div class="row">
											<div class="col-xs-9">
												<input type="file" name="thumb" required  class="form-control"/>
												<div class="text-danger">缩略图为350*220|500*315的等比大图</div>
											</div>
										</div>
									</div>

								</div>
								<div class="form-group"><label class="col-sm-3 control-label">简要说明</label>
									<div class="col-sm-9 controls">
										<textarea class="form-control" name="blog_info"  rows="3"></textarea>
										<div class="text-danger">简要说明请少于75个字，不填默认去博客前75个字</div>
									</div>
								</div>
								<div class="form-group">
									<label class="col-sm-3 control-label">博客内容</label>
									<div class="col-sm-9 controls">
										<textarea id="editor" name="content" placeholder="博客内容" required ></textarea>
										<div class="text-danger">图片尺寸为500*315|800*600的等比大图,博客内容请大于200字</div>
									</div>
								</div>
								<div class="form-group">
									<label class="col-sm-3 control-label">标签选择</label>

									<div class="col-sm-9 controls">
										<div class=" info-checkbox">
											<?php if(is_array($list)): $i = 0; $__LIST__ = $list;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><label >
													<input type="checkbox" value="<?php echo ($vo['name']); ?>" name="tags[]" /> <?php echo ($vo['name']); ?>
												</label><?php endforeach; endif; else: echo "" ;endif; ?>
										</div>
										<div class="text-danger">标签必选，如若没有适合您的，请联系管理员QQ:980062449</div>
									</div>
								</div>

								<hr/>
								<div class="form-group">
									<div class="col-sm-6 col-sm-offset-3">
										<input type="hidden" name="auther" required  value="<?php echo ($user['nickname']); ?>" class="form-control"/>
										<input type="hidden" name="user_id" required  value="<?php echo ($user['id']); ?>" class="form-control"/>
										<button type="submit" class="btn btn-success btn-block">确认</button>
									</div>
								</div>
							</form>


						</div>
					</div>

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



	<link type="text/css" rel="stylesheet" href="/Airblog/Public/pluge/simditor-2.3.6/styles/simditor.css">
	<script src="/Airblog/Public/pluge/simditor-2.3.6/scripts/module.js"></script>
	<script src="/Airblog/Public/pluge/simditor-2.3.6/scripts/hotkeys.js"></script>
	<script src="/Airblog/Public/pluge/simditor-2.3.6/scripts/uploader.js"></script>
	<script src="/Airblog/Public/pluge/simditor-2.3.6/scripts/simditor.js"></script>
	<script>
		$(function(){
			$('#side-menu>li').removeClass('active');
			$('#admin-blog').addClass('active');

			var toolbar =['bold','italic','underline',
				'color','ol','ul','blockquote','code','table','link','image',
				'indent','alignment'];
			var editor = new Simditor({
				textarea: $('#editor'),
				placeholder		: "博客生涯从此开始...",
				toolbar			: toolbar,
				toolbarFloat		: true,
				toolbarFloatOffset: 0,
				toolbarHidden		: false,
				defaultImage		: 'images/image.png',
				tabIndent			: true,
				params				: {},/*Insert a hidden input in textarea to store params (key-value pairs). Usually used as the default params of the form. It will generate：<input type="hidden" name="key" value="val" />*/
				upload:{
					url					: "<?php echo U('Admin/Blog/img_up_blog');?>",
					params				: null,
					fileKey			: 'blog_img',
					connectionCount	: 3,
					leaveConfirm		: '图片正在上传,真要离开吗?',
				},
				pasteImage 		: true,
				//optional options
			});


		});
	</script>
</body>
</html>