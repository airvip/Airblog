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

						<!--<a type="button" href="<?php echo U('User/index',array('user_type'=>1));?>" title="" class="btn btn-success" >
							会员管理
						</a>
						<a type="button" href="<?php echo U('User/index',array('user_type'=>0));?>" title="" class="btn btn-success" >
							管理员管理
						</a>-->
					</div>
				</div>
				<ol class="breadcrumb page-breadcrumb pull-left">					
					<li>
						<a href="<?php echo U('Admin/Project/index');?>">案例管理</a>/
					</li>
					<li>列表 </li>
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

									<div class="row">
										<div class="col-xs-5">
											<form class="navbar-form " action="<?php echo U('Admin/Project/search');?>" method="post" role="search" >
												<div class="input-group">
													<div class="input-group-btn">
														<select class="form-control btn" name="name">
															<option value="name">案例名称</option>
															<option value="info">简要说明</option>

														</select>
													</div>
													<input type="text" name="search" class="form-control" placeholder="Search for you!">
													<div class="input-group-btn">
														<button type="submit" class="btn btn-green"><i class="fa fa-search"></i></button>
													</div>
												</div>
											</form>
										</div>
										<div class="col-xs-7">
											<div class="navbar-form text-right">
												<a href="<?php echo U('Admin/Project/add');?>" type="button" title="新增案例" class="btn btn-success" >
													<i class="fa fa-plus-square"></i> 新增案例
												</a>
											</div>
										</div>
									</div>
								
								</div>
								<div class="portlet-body">
									<table class="table table-hover table-striped user-table">
										<colgroup>
											<col/>
											<col/>
					                        <col width="200"/>
					                    </colgroup>
										<thead>
											<tr>
												<th>#</th>
												<th>案例名称</th>
												<th>简要说明</th>
												<th>是否显示</th>
												<th>排序</th>
												<th>创建时间</th>
												<th>操作</th>
											</tr>
										</thead>
										<tbody>
											
											<?php if(is_array($list)): $i = 0; $__LIST__ = $list;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><tr>
													<td attr="<?php echo ($vo['id']); ?>"><?php echo ($key+1); ?></td>
													<td><?php echo ($vo['name']); ?></td>
													<td>
														<div class="content-hidden" title="<?php echo ($vo['info']); ?>">
															<?php echo ($vo['info']); ?>
														</div>
													</td>
													<td>
														<?php echo $vo['status'] == 1 ? '显示':'不显示';?>
													</td>
													<td>
														<input type="text"  class=" table-input-order tag-order" attr="<?php echo ($vo['id']); ?>" value="<?php echo ($vo['sort']); ?>">
													</td>
													<td>
														<?php echo date('Y-m-d H:i:s',$vo['create_time']);?>
													</td>
													<td id="user-fa">
														<a class="btn btn-warning btn-xs" href="<?php echo U('Admin/Project/edit',array('id'=>$vo['id']));?>">
															<i class="fa fa-pencil-square-o" title="编辑"></i>
														</a> 
														<a class="btn btn-danger btn-xs">
															<i class="fa fa-trash-o item-delete" attr="<?php echo ($vo['id']); ?>" title="删除"></i>
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
			$('#side-menu>li').removeClass('active');
			$('#admin-project').addClass('active');



			//排序修改
			$('.tag-order').blur(function(){
				var id		= $(this).attr('attr');
				var sort	= parseInt($(this).val());
				if(!(sort >= 0 && sort <= 10)){
					alert('排序值必须在0-10之间');
					$(this).focus();
					return;
				}
				//发送ajax请求
				$.ajax({
					type:'post',
					url:"<?php echo U('Admin/Project/order');?>",
					//data:'u_state='+id,
					data:{
						'id':id,
						'sort':sort,
					},
					dataType:"json",
					success:function(data){
						if(data.code){
							location.reload();return;
						}else{
							alert(data.mess);return;
						}
					},
				});
			});



			//删除
			$(".item-delete").click(function(){
				var rs		    = confirm('你确定删除该记录吗?');
				var id 	= $(this).attr('attr');
				//console.log(rs);
				if( false == rs)return;
				$.ajax({
					type:'post',
					url:'<?php echo U("Admin/Project/delete");?>',
					data:{
						'id':id,
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