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
							<li><a href="<?php echo U('User/Index/index');?>"><i class="fa fa-user"></i>我的主页</a></li>
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
					<li>
						<?php switch($_GET['user_type']): case "0": ?>管理员列表<?php break;?>
							<?php case "1": ?>会员列表<?php break;?>
							<?php default: ?>用户列表<?php endswitch;?>
					</li>
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
									<!--search start-->
									<div class="row">
										<div class="col-xs-5">
											<form class="navbar-form " action="<?php echo U('Admin/User/search');?>" method="post" role="search" >
												<div class="input-group">
													<div class="input-group-btn">
														<select class="form-control btn" name="name">
															<option value="nickname">用户昵称</option>
															<option value="email">电子邮箱</option>

														</select>
													</div>
													<input type="text" name="search" class="form-control" placeholder="Search for you!">
													<div class="input-group-btn">
														<button type="submit" class="btn btn-green"><i class="fa fa-search"></i></button>
													</div>
												</div>
											</form>
										</div>
									</div>
									<!--search end-->
								</div>
								<div class="portlet-body">
									<table class="table table-hover table-striped user-table">
										<thead>
											<tr>
												<th>#</th>
												<th>会员头像</th>
												<th>会员昵称</th>
												<th>会员类型</th>
												<th>电子邮箱</th>
												<th>是否禁用</th>
												<th>操作</th>
											</tr>
										</thead>
										<tbody>
											
											<?php if(is_array($list)): $i = 0; $__LIST__ = $list;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><tr>
													<td attr="<?php echo ($vo['id']); ?>"><?php echo ($key+1); ?></td>
													<td>
														<?php if(!empty($vo['avatar']) && file_exists($vo['avatar'])): ?><img class="img-responsive img-circle" width="20" src="/Airblog/Uploads/<?php echo ($vo['avatar']); ?>">
														<?php else: ?>
															<img class="img-responsive img-circle" width="20" src="/Airblog/Public/img/default_avatar.jpg"><?php endif; ?>
													</td>
													<td><?php echo empty($vo['nickname']) ? '未知': $vo['nickname'] ;?></td>
													<td>
														<?php echo $vo['user_type'] == 1 ? '用户':'管理员';?>
													</td>
													<td>
														<?php echo empty($vo['user_email']) ? '未知' : $vo['user_email'] ;?>
													</td>
													<td>
														<?php if($vo['user_status'] == 1): ?>正常
															<a class="btn btn-warning btn-xs" >
																<i class="fa fa-frown-o user-free"  user_id="<?php echo ($vo['id']); ?>" user_status="0" title="点击禁用"></i>
															</a>
														<?php else: ?>
															已禁用
															<a class="btn btn-success btn-xs" >
																<i class="fa fa-smile-o user-free" user_id="<?php echo ($vo['id']); ?>" user_status="1" title="点击恢复"></i>
															</a><?php endif; ?>
													</td>
													<td id="user-fa">
														<a class="btn btn-pink btn-xs">
															<i class="fa fa-key item-pass " user_id="<?php echo ($vo['id']); ?>" title="初始化密码"></i>
														</a>
														<a class="btn btn-primary btn-xs" href="<?php echo U('Admin/User/see',array('user_id'=>$vo['id']));?>">
															<i class="fa  fa-eye" title="查看详情"></i>
														</a>
														<a class="btn btn-warning btn-xs" href="<?php echo U('Admin/User/edit',array('user_id'=>$vo['id']));?>">
															<i class="fa fa-pencil-square-o" title="编辑"></i>
														</a> 
														<a class="btn btn-danger btn-xs" >
															<i class="fa fa-trash-o item-delete" user_id="<?php echo ($vo['id']); ?>" title="删除"></i>
														</a>
													</td>
												</tr><?php endforeach; endif; else: echo "" ;endif; ?>
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
<script src="/Airblog/Application/Admin/View/Public/js/bootstrap.min.js"></script>
<script src="/Airblog/Application/Admin/View/Public/js/bootstrap-hover-dropdown.js"></script>
	               	<!--END FOOTER-->
        </div>
        <!--END PAGE WRAPPER-->
	</div>
</div>


	<script>
		$(function(){
			//改变侧边栏选中状态
			$('#side-menu>li').removeClass('active');
			$('#admin-user').addClass('active');

			//用该用户禁用状态
			$('.user-free').click(function(){
				var id		= $(this).attr('user_id');
				var user_status	= $(this).attr('user_status');
				$.ajax({
					type:'post',
					url:'<?php echo U("Admin/User/free");?>',
					//data:'u_state='+id,
					data:{
						'id'			: id,
						'user_status'	: user_status,
					},
					dataType:"json",
					success:function(data){
						if(1 == data.code){
							alert(data.mess);location.reload();/*self.location='<?php echo U("Admin/User/index",array("user_type"=>1));?>';*/return;
						}else{
							alert(data.mess);return;
						}
					},
				});
			});

			//初始化用户密码为123456
			$(".item-pass").click(function(){
				var rs		    = confirm('你确定把密码初始化为123456吗?');
				var user_id 	= $(this).attr('user_id');
				//console.log(rs);
				if( false == rs)return;
				$.ajax({
					type:'post',
					url:'<?php echo U("Admin/User/user_pass");?>',
					data:{
						'user_id':user_id,
					},
					dataType:"json",
					success:function(data){
						if(1 == data.code){
							alert(data.mess);return;
						}else{
							alert(data.mess);return;
						}
					},
				});
			});

			//删除用户
			$(".item-delete").click(function(){
				var rs		    = confirm('你确定删除该用户的所有信息吗?');
				var user_id 	= $(this).attr('user_id');
				//console.log(rs);
				if( false == rs)return;
				$.ajax({
					type:'post',
					url:'<?php echo U("Admin/User/delete");?>',
					data:{
						'user_id':user_id,
					},
					dataType:"json",
					success:function(data){
						if(1 == data.code){
							alert(data.mess);location.reload();return;
						}else{
							alert(data.mess);return;
						}
					},
				});
			});



		});
	</script>

</body>
</html>