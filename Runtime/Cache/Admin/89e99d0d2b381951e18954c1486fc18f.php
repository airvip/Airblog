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
						<a href="<?php echo U('Blog/add');?>" type="button" title="新增博客" class="btn btn-blue" >
							<i class="fa fa-plus-square"></i>
						</a>
						<a type="button" href="<?php echo U('Blog/index');?>" title="" class="btn btn-blue" >
							博客管理
						</a>&nbsp;
						<a href="<?php echo U('Bgtag/add');?>" type="button" title="新增博客标签" class="btn btn-success" >
							<i class="fa fa-plus-square"></i>
						</a>
						<a type="button" href="<?php echo U('Bgtag/index');?>" title="" class="btn btn-success" >
							博客标签管理
						</a>
					</div>
				</div>
				<ol class="breadcrumb page-breadcrumb pull-left">					
					<li>
						<a href="<?php echo U('Blog/index');?>">博客管理</a>/
					</li>
					<li>博客列表 </li>
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
								<div class="panel-heading">
								
									<form class="navbar-form navbar-right" action="<?php echo U('Blog/search');?>" method="post" role="search" >
                                        <div class="form-group">
                                        	<input type="text" name="search" class="form-control" placeholder="博客内容或标题">
										</div>
                                        <button class="btn btn-green" type="submit">
											<i class="fa fa-search"></i>
										</button>
                                    </form>
									<div class="clearfix"></div>
								
								</div>
								<div class="portlet-body">
									<table class="table table-hover table-striped user-table">
										<thead>
											<tr>
												<th>#</th>
												<th>缩略图</th>
												<th>博客标题</th>
												<th>博客作者</th>
												<th>博客标签</th>
												<th>浏览数量</th>
												<th>发布时间</th>
												<th>操作</th>
											</tr>
										</thead>
										<tbody>
											
											<?php if(is_array($list)): $i = 0; $__LIST__ = $list;if( count($__LIST__)==0 ) : echo "暂时没有数据" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><tr>
													<td><?php echo ($vo["b_id"]); ?></td>
													<td>
														<?php if($vo['b_img']): ?><img class="img-responsive " width="30" src="<?php echo ($vo["b_img"]); ?>">
														<?php else: ?>
															<img class="img-responsive " width="30" src="/Airblog/Public/images/blogs/default_blog.jpg"><?php endif; ?>
													</td>
													<td>
														<div class="content-hidden" title="<?php echo ($vo["b_title"]); ?>">
															<?php echo ($vo["b_title"]); ?>
														</div>
													<td>
														<?php echo ($vo["b_auther"]); ?>
													</td>
													<td>
														<div class="content-hidden" title="<?php echo ($vo["b_tag"]); ?>">
															<?php echo ($vo["b_tag"]); ?>
														</div>
													</td>
													<td>
														<?php echo ($vo["b_view"]); ?>
													</td>
													<td>
														<?php echo (date("Y-m-d H:i",$vo["b_time"])); ?>
													</td>
													<td id="user-fa">
														<a class="btn btn-primary" href="<?php echo U('Blog/see',array('b_id'=>$vo[b_id]));?>">
															<i class="fa  fa-eye" title="查看详情"></i>
														</a> 
														 
														<a class="btn btn-warning" href="<?php echo U('Blog/edit',array('b_id'=>$vo[b_id]));?>">
															<i class="fa fa-pencil-square-o" title="编辑"></i>
														</a> 
														<a class="btn btn-danger" href="<?php echo U('Blog/delete',array('b_id'=>$vo[b_id]));?>">
															<i class="fa fa-trash-o" attr="<?php echo ($vo[b_id]); ?>" title="删除"></i>
														</a> 
													</td>
												</tr><?php endforeach; endif; else: echo "暂时没有数据" ;endif; ?>
										</tbody>
									</table>
								</div>
								<div class="panel-heading">
									<div id="page">
										<?php echo ($page); ?>
									</div>
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
		$('#admin-blog').addClass('active');
		
		
		
		
		
		
		
	</script>

</body>
</html>