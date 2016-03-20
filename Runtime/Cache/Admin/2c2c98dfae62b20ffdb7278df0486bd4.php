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

</head>
<body>
<div>

	<a id="totop" href="#"><i class="fa fa-angle-up"></i></a>
<!--END BACK TO TOP-->

<!--BEGIN TOPBAR-->
	<div id="header-topbar-option-demo" class="page-header-topbar">
		<nav id="topbar" role="navigation" style="margin-bottom: 0;" data-step="3" class="navbar navbar-default navbar-static-top">
			<div class="navbar-header">
				<button type="button" data-toggle="collapse" data-target=".sidebar-collapse" class="navbar-toggle">
					<span class="sr-only">Toggle navigation</span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
				</button>
				<a id="logo" href="index.html" class="navbar-brand">
					<span class="fa fa-rocket"></span>
					<span class="logo-text">Air</span>
					<span style="display: none" class="logo-text-icon">µ</span>
				</a>
			</div>
			<div class="topbar-main">
				<a id="menu-toggle" href="#" class="hidden-xs">
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
							<img src="<?php if($admin["u_avatar"]): ?>/Airblog/Uploads/Face/<?php echo ($admin["u_avatar"]); else: ?>/Airblog/Public/images/avatar/a1.jpg<?php endif; ?>" alt="" class="img-responsive img-circle"/>&nbsp;
							<span class="hidden-xs">阿尔维奇</span>&nbsp;
							<span class="caret"></span>
						</a>
						<ul class="dropdown-menu dropdown-user pull-right">
							<li><a href="#"><i class="fa fa-user"></i>我的主页</a></li>
							<li class="divider"></li>
							<li><a href="#"><i class="fa fa-lock"></i>Lock Screen</a></li>
							<li><a href="<?php echo U('Login/logout');?>"><i class="fa fa-key"></i>退出登录</a></li>
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
					<span class="menu-title">会员管理</span>
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
						<a href="###" type="button" title="新增" class="btn btn-blue" >
							<i class="fa fa-plus-square"></i>
						</a>
						
					</div>
				</div>
				<ol class="breadcrumb page-breadcrumb pull-left">					
					<li>
						<a href="<?php echo U('System/index');?>">系统管理</a>/
					</li>
					<li>网站配置 </li>
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
								
								<div class="portlet-body">
									<form action="<?php echo U('System/indexRun');?>" method="post" class="form-horizontal">
										<h3>网站配置</h3>
										<div class="form-group">
											<label class="col-sm-3 control-label">网站名称</label>
											<div class="col-sm-9 controls">
												<div class="row">
													<div class="col-xs-6">
														<input type="text" name="web_name" required value="<?php echo ($config["WEB_NAME"]); ?>" class="form-control"/>
													</div>
												</div>
											</div>
										</div>
										<div class="form-group">
											<label class="col-sm-3 control-label">网站根目录</label>
											<div class="col-sm-9 controls">
												<div class="row">
													<div class="col-xs-6">
														<input type="text" name="web_url" required value="<?php echo ($config["WEB_URL"]); ?>" class="form-control"/>
													</div>
												</div>
											</div>
										</div>
										<div class="form-group"><label class="col-sm-3 control-label">版权信息</label>
											<div class="col-sm-9 controls">
												<div class="row">
													<div class="col-xs-6">
														<input type="text" name="copy" required value="<?php echo ($config["COPY"]); ?>" class="form-control"/>
													</div>
												</div>
											</div>
										</div>
										<div class="form-group">
											<label class="col-sm-3 control-label">是否开启注册</label>
											<div class="col-sm-9 controls">
												<div class="row">
													<div class="col-xs-6 line-34">
														<?php if($config["REGIS_ON"] == 0): ?><label >
																<input type="radio" value="0" name="regis_on" checked="checked"/>
																允许注册
															</label>
															<label >
																<input type="radio" value="1" name="regis_on"/>
																不允许注册
															</label>
														<?php else: ?>
															<label >
																<input type="radio" value="0" name="regis_on" />
																允许注册
															</label>
															<label >
																<input type="radio" value="1" name="regis_on" checked="checked" />
																不允许注册
															</label><?php endif; ?>
															
													</div>
												</div>
											</div>
										</div>
										<div class="form-group">
											<label class="col-sm-3 control-label">后台每页数量</label>
											<div class="col-sm-9 controls">
												<div class="row">
													<div class="col-xs-6 line-34">
														<?php switch($config["ADMIN_PAGE"]): case "10": ?><label >
																	<input type="radio" value="10" name="admin_page" checked="checked"/>
																	10
																</label>
																<label >
																	<input type="radio" value="15" name="admin_page"/>
																	15
																</label>
																<label >
																	<input type="radio" value="20" name="admin_page"/>
																	20
																</label><?php break;?>
														    <?php case "15": ?><label >
																	<input type="radio" value="10" name="admin_page"/>
																	10
																</label>
																<label >
																	<input type="radio" value="15" name="admin_page"  checked="checked"/>
																	15
																</label>
																<label >
																	<input type="radio" value="20" name="admin_page"/>
																	20
																</label><?php break;?>
														    <?php default: ?>
																<label >
																	<input type="radio" value="10" name="admin_page"/>
																	10
																</label>
																<label >
																	<input type="radio" value="15" name="admin_page"  />
																	15
																</label>
																<label >
																	<input type="radio" value="20" name="admin_page" checked="checked"/>
																	20
																</label><?php endswitch;?>
													
													</div>
												</div>
											</div>
										</div>
										
										<hr/>
										<h3>SEO优化</h3>
										<div class="form-group"><label class="col-sm-3 control-label">关键词</label>
											<div class="col-sm-9 controls">
												<div class="row">
													<div class="col-xs-9">
														<input type="text" name="key_word" required value="<?php echo ($config["KEY_WORD"]); ?>" class="form-control"/>
													</div>
												</div>
											</div>
										</div>
										<div class="form-group">
											<label class="col-sm-3 control-label">内容描述</label>
											<div class="col-sm-9 controls">
												<div class="row">
													<div class="col-xs-9">
														<textarea class="form-control" name="description" required rows="3"><?php echo ($config["DESCRIPTION"]); ?></textarea>
													</div>
												</div>
											</div>
										</div>
										
										<hr/>
										<button type="submit" class="btn btn-green btn-block">创建</button>
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
<script src="/Airblog/Application/Admin/View/Public/js/bootstrap-hover-dropdown.js"></script>
	               	<!--END FOOTER-->
        </div>
        <!--END PAGE WRAPPER-->
	</div>
</div>

	
	<script>
		$('#side-menu>li').removeClass('active');
		$('#admin-system').addClass('active');
		
		
	</script>

</body>
</html>