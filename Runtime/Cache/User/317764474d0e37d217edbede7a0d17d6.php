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

				<div class="col-sm-9 col-md-9 about">
					
<h3 class="">
	<div class="btn-group" role="group" >
		<a class="btn btn-sm btn-default" href="<?php echo U('User/Person/index');?>">我的资料</a>
		<a class="btn btn-sm btn-default" href="<?php echo U('User/Person/edit');?>">修改资料</a>
		<a class="btn btn-sm btn-default" href="<?php echo U('User/Person/avatar');?>">更换头像</a>
	</div>
</h3>


					<table class="table table-striped table-hover " id="user-content-table">
						<tbody>
						<?php if(!empty($user['last_ip']) &&$user['last_ip'] != $user['login_ip']): ?><tr>
								<td colspan="2"><b class="text-danger">您本次的登录IP与上一次不一致</b></td>
							</tr><?php endif; ?>
						<tr>
							<td>用户昵称</td>
							<td><?php echo ($user['nickname']); ?></td>
						</tr>
						<tr>
							<td>电子邮箱</td>
							<td><?php echo empty($user['user_email']) ? '未知' : $user['user_email'];?></td>
						</tr>
						<tr>
							<td>用户类型</td>
							<td>
								<?php echo $user['user_type'] == 1 ? '用户':'管理员';?>
							</td>
						</tr>
						<tr>
							<td>性别</td>
							<td>
								<?php switch($user['sex']): case "1": ?>男<?php break;?>
									<?php case "2": ?>女<?php break;?>
									<?php default: ?>保密<?php endswitch;?>
							</td>
						</tr>
						<tr>
							<td>所在国家</td>
							<td>
								<?php echo empty($user['country']) ? '未知' : $user['country'];?>
							</td>
						</tr>
						<tr>
							<td>所在省</td>
							<td>
								<?php echo empty($user['province']) ? '未知' : $user['province'];?>
							</td>
						</tr>
						<tr>
							<td>所在城市</td>
							<td>
								<?php echo empty($user['city']) ? '未知' : $user['city'];?>
							</td>
						</tr>
						<tr>
							<td>详细地址</td>
							<td>
								<?php echo empty($user['address']) ? '未知' : $user['address'];?>
							</td>
						</tr>


						</tbody>
					</table>

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