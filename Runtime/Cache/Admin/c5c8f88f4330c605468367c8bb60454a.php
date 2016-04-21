<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html lang="zh-CN">
<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="shortcut icon" href="/Airblog/Public/img/ico_48.ico">
	<meta name="keywords" content="<?php echo (C("KEY_WORD")); ?>" />
	<meta name="description" content="<?php echo (C("DESCRIPTION")); ?>"/>
	<title><?php echo (C("WEB_NAME")); ?></title>

	<!--[if lt IE 9]>
	<script src="//cdn.bootcss.com/html5shiv/3.7.2/html5shiv.min.js"></script>
	<script src="//cdn.bootcss.com/respond.js/1.4.2/respond.min.js"></script>
	<![endif]-->

	<link type="text/css" rel="stylesheet" href="/Airblog/Application/Admin/View/Public/styles/bootstrap.min.css">
	<link type="text/css" rel="stylesheet" href="/Airblog/Application/Admin/View/Public/styles/font-awesome.min.css">
	<link type="text/css" rel="stylesheet" href="/Airblog/Application/Admin/View/Public/styles/main.css">
	<link type="text/css" rel="stylesheet" href="/Airblog/Application/Admin/View/Public/styles/airadmin.css">

</head>
<body>
<div>

	<a id="totop" href="#"><i class="fa fa-angle-up"></i></a>
<!--END BACK TO TOP-->

<!--BEGIN TOPBAR-->
	<div id="header-topbar-option-demo" class="page-header-topbar">
		<nav id="topbar" role="navigation" style="margin-bottom: 0;" data-step="3" class="navbar navbar-default navbar-static-top">
			<div class="navbar-header">
				<a id="logo" href="<?php echo U('Home/Index/index');?>" class="navbar-brand">
					<span class="logo-text" title="前台首页">Air</span>
				</a>
			</div>
			<div class="topbar-main">
				<a id="menu-toggle" class="hidden-xs">
					<i class="fa fa-bars"></i>
				</a>

				<form id="topbar-search" action="" method="" class="hidden-sm hidden-xs">
					<div class="input-icon right text-white">
						<a href="#">
							<i class="fa fa-search"></i>
						</a>
						<input type="text" placeholder="Cantn't Search" class="form-control text-white"/>	
					</div>
				</form>

				<ul class="nav navbar navbar-top-links navbar-right mbn">

					<li class="dropdown topbar-user">
						<a data-hover="dropdown" href="#" class="dropdown-toggle">
							<?php if(!empty($admin['avatar']) && file_exists($admin['avatar'])): ?><img class="img-responsive img-circle" src="/Airblog/Uploads/<?php echo ($admin['avatar']); ?>">
							<?php else: ?>
								<img class="img-responsive img-circle" src="/Airblog/Public/img/default_avatar.jpg"><?php endif; ?>
							<span class="hidden-xs">阿尔维奇</span>
							<span class="caret"></span>
						</a>
						<ul class="dropdown-menu dropdown-user pull-right">
							<li><a href="#"><i class="fa fa-user"></i>我的主页</a></li>
							<li class="divider"></li>
							<li><a href="#"><i class="fa fa-lock"></i>Lock Screen</a></li>
							<li><a href="<?php echo U('Admin/Common/logout');?>"><i class="fa fa-key"></i>退出登录</a></li>
						</ul>
					</li>

				</ul>
			</div>
		</nav>
	</div>
	<!--END TOPBAR-->



	<div id="wrapper">
		<!--BEGIN SIDEBAR MENU-->
		<!--BEGIN SIDEBAR MENU-->
<nav id="sidebar" role="navigation" data-step="2" data-intro="Template has &lt;b&gt;many navigation styles&lt;/b&gt;" data-position="right" class="navbar-default navbar-static-side">
	<div class="sidebar-collapse menu-scroll">
		<ul id="side-menu" class="nav">
			<div class="clearfix"></div>
			<li class="active" id="admin-index">
				<a href="<?php echo U('Admin/Index/index');?>">
					<i class="fa fa-home fa-fw">
						<div class="icon-bg bg-orange"></div>
					</i>
					<span class="menu-title">欢迎向导</span>
				</a>
			</li>
			<li id="admin-user">
				<a href="<?php echo U('Admin/User/index');?>">
					<i class="fa fa-group fa-fw">
						<div class="icon-bg bg-orange"></div>
					</i>
					<span class="menu-title">用户管理</span>
				</a>
			</li>
			<li id="admin-blog">
				<a href="<?php echo U('Admin/Blog/index');?>">
					<i class="fa fa-file-text-o fa-fw">
						<div class="icon-bg bg-pink"></div>
					</i>
					<span class="menu-title">博客管理</span>
				</a>
			</li>
			<li id="admin-project">
				<a href="<?php echo U('Admin/Project/index');?>">
					<i class="fa fa-tasks">
						<div class="icon-bg bg-pink"></div>
					</i>
					<span class="menu-title">案例管理</span>
				</a>
			</li>
			<li id="admin-system">
				<a href="<?php echo U('Admin/System/index');?>">
					<i class="fa fa-desktop fa-fw">
						<div class="icon-bg bg-pink"></div>
					</i>
					<span class="menu-title">系统配置</span>
				</a>
			</li>
			<li id="admin-link">
				<a href="<?php echo U('Admin/Link/index');?>">
					<i class="fa fa-chain fa-fw">
						<div class="icon-bg bg-pink"></div>
					</i>
					<span class="menu-title">友情链接</span>
				</a>
			</li>
			<li id="admin-page">
				<a href="<?php echo U('Admin/Page/index');?>">
					<i class="fa fa-file">
						<div class="icon-bg bg-pink"></div>
					</i>
					<span class="menu-title">单页管理</span>
				</a>
			</li>
		</ul>
	</div>
</nav>
<!--END SIDEBAR MENU-->

	


		<!--END SIDEBAR MENU-->
          
        <!--BEGIN PAGE WRAPPER-->
        <div id="page-wrapper">

			<!--BEGIN TITLE & BREADCRUMB PAGE-->

			<div class="page-title-breadcrumb option-demo">
				<div class="page-header pull-right">
					<div class="page-toolbar">

						<a type="button" href="<?php echo U('User/index',array('user_type'=>1));?>" title="" class="btn btn-success" >
							会员管理
						</a>
						<a type="button" href="<?php echo U('User/index',array('user_type'=>0));?>" title="" class="btn btn-success" >
							管理员管理
						</a>
					</div>
				</div>
				<ol class="breadcrumb page-breadcrumb pull-left">
					<li>
						<a href="<?php echo U('Admin/User/index');?>">用户管理</a>/
					</li>
					<li>信息编辑</li>
				</ol>
				<div class="clearfix">
				</div>
			</div>

			<!--END TITLE & BREADCRUMB PAGE-->


            <!--BEGIN CONTENT-->
            <div class="page-content">
         		<div id="tab-general">
					<div class="row">
						<div class="col-lg-12">
							<div class="portlet box">
								<div class="portlet-body" id="user-edit-information">
									<h3>基本信息</h3><hr>
									<form action="<?php echo U('Admin/User/edit_run');?>" method="post" class="form-horizontal">
										<div class="form-group">
											<label class="col-sm-3 control-label">用户昵称</label>
											<div class="col-sm-9 controls">
												<div class="row">
													<div class="col-xs-6">
														<p class="form-control-static"><?php echo empty($user['nickname']) ? '未知' : $user['nickname'];?></p>
													</div>
												</div>
											</div>
										</div>
										<div class="form-group">
											<label class="col-sm-3 control-label">电子邮箱</label>
											<div class="col-sm-9 controls">
												<div class="row">
													<div class="col-xs-6">
														<p class="form-control-static"><?php echo empty($user['user_email']) ? '未知' : $user['user_email'];?></p>
													</div>
												</div>
											</div>
										</div>
										<div class="form-group">
											<label class="col-sm-3 control-label">用户状态</label>
											<div class="col-sm-9 controls">
												<div class="row">
													<div class="col-xs-12 info-radio">
														<label >
															<input type="radio" value="0" name="user_status" <?php if($user['user_status'] == 0): ?>checked="checked"<?php endif; ?> />冻结
														</label>
														<label >
															<input type="radio" value="1" name="user_status" <?php if($user['user_status'] == 1): ?>checked="checked"<?php endif; ?>/>正常
														</label>
													</div>
												</div>
											</div>
										</div>
										<div class="form-group">
											<label class="col-sm-3 control-label">用户类型</label>
											<div class="col-sm-9 controls">
												<div class="row">
													<div class="col-xs-12 info-radio">
															<label >
																<input type="radio" value="0" name="user_type" <?php if($user['user_type'] == 0): ?>checked="checked"<?php endif; ?> />管理员
															</label>
															<label >
																<input type="radio" value="1" name="user_type" <?php if($user['user_type'] == 1): ?>checked="checked"<?php endif; ?>/>普通用户
															</label>
													</div>
												</div>
											</div>
										</div>
										<div class="form-group">
											<label class="col-sm-3 control-label">性别</label>
											<div class="col-sm-9 controls">
												<div class="row">
													<div class="col-xs-12 info-radio">
														<label >
															<input type="radio" value="0" name="sex" <?php if($user['sex'] == 0): ?>checked="checked"<?php endif; ?>/>保密
														</label>
														<label >
															<input type="radio" value="1" name="sex" <?php if($user['sex'] == 1): ?>checked="checked"<?php endif; ?>/>男
														</label>
														<label >
															<input type="radio" value="2" name="sex"  <?php if($user['sex'] == 2): ?>checked="checked"<?php endif; ?>"/>女
														</label>
													</div>
												</div>
											</div>
										</div>
										<div class="form-group">
											<label class="col-sm-3 control-label">所在国家</label>
											<div class="col-sm-9 controls">
												<div class="row">
													<div class="col-xs-6">
														<input type="text" name="country" required value="<?php echo ($user['country']); ?>" class="form-control"/>
													</div>
												</div>
											</div>
										</div>
										<div class="form-group">
											<label class="col-sm-3 control-label">所在省</label>
											<div class="col-sm-9 controls">
												<div class="row">
													<div class="col-xs-6">
														<input type="text" name="province" required value="<?php echo ($user['province']); ?>" class="form-control"/>
													</div>
												</div>
											</div>
										</div>
										<div class="form-group">
											<label class="col-sm-3 control-label">所在城市</label>
											<div class="col-sm-9 controls">
												<div class="row">
													<div class="col-xs-6">
														<input type="text" name="city" required value="<?php echo ($user['city']); ?>" class="form-control"/>
													</div>
												</div>
											</div>
										</div>
										<div class="form-group">
											<label class="col-sm-3 control-label">详细地址</label>
											<div class="col-sm-9 controls">
												<div class="row">
													<div class="col-xs-6">
														<input type="text" name="address" required value="<?php echo ($user['address']); ?>" class="form-control"/>
													</div>
												</div>
											</div>
										</div>

										<hr/>
										<div class="form-group">
											<div class="col-sm-6 col-sm-offset-3">
												<input type="hidden" name="id" value="<?php echo ($user['id']); ?>">
												<button type="submit" class="btn btn-green">确认编辑</button>
											</div>
										</div>
									</form>
	
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
	                	<!--END CONTENT-->


	                	<!--BEGIN FOOTER-->
			<!--BEGIN FOOTER-->
<div id="footer">
	<div class="copyright">
		<a href="<?php echo U('Home/Index/index');?>" target="_blank">
			<?php echo (C("COPY")); ?>
		</a>
	</div>
</div>
<!--END FOOTER-->

<script src="/Airblog/Application/Admin/View/Public/js/jquery-1.10.2.min.js"></script>
<script src="/Airblog/Application/Admin/View/Public/js/jquery-migrate-1.2.1.min.js"></script>
<script src="/Airblog/Application/Admin/View/Public/js/bootstrap.min.js"></script>
<script src="/Airblog/Application/Admin/View/Public/js/bootstrap-hover-dropdown.js"></script>
	               	<!--END FOOTER-->
        </div>
        <!--END PAGE WRAPPER-->
	</div>
</div>


	<script>
		$(function(){
			$('#side-menu>li').removeClass('active');
			$('#admin-user').addClass('active');
		});
	</script>

</body>
</html>