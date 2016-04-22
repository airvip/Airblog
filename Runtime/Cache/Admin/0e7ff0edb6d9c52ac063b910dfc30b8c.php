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
						<a type="button" href="<?php echo U('Admin/Blog/index');?>" title="" class="btn btn-success" >
							博客管理
						</a>
						<a type="button" href="<?php echo U('Admin/Bgtag/index');?>" title="" class="btn btn-success" >
							博客标签管理
						</a>
					</div>
				</div>
				<ol class="breadcrumb page-breadcrumb pull-left">					
					<li>
						<a href="<?php echo U('Admin/Blog/index');?>">博客管理</a>/
					</li>
					<li>新增博客 </li>
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
								
									<form action="<?php echo U('Admin/Blog/add_run');?>" method="post" class="form-horizontal" enctype="multipart/form-data">
										<h3>博客发布</h3><hr/>
										<div class="form-group">
											<label class="col-sm-3 control-label">博客标题</label>
											<div class="col-sm-9 controls">
												<div class="row">
													<div class="col-xs-9">
														<input type="text" name="title" required placeholder="博客标题" class="form-control"/>
														<div class="text-red">标题少于30字</div>
													</div>
												</div>
											</div>
										</div>
										<div class="form-group"><label class="col-sm-3 control-label">缩略图片</label>
											<div class="col-sm-9 controls">
												<div class="row">
													<div class="col-xs-9">
														<input type="file" name="thumb" required  class="form-control"/>
														<div class="text-red">缩略图为350*220的等比大图</div>
													</div>
												</div>
											</div>
											
										</div>
										<div class="form-group"><label class="col-sm-3 control-label">简要说明</label>
											<div class="col-sm-9 controls">
												<textarea class="form-control" name="blog_info"  rows="3"></textarea>
												<div class="text-red">简要说明请少于75个字，不填默认去博客前75个字</div>
											</div>
										</div>
										<div class="form-group">
											<label class="col-sm-3 control-label">博客内容</label>
											<div class="col-sm-9 controls">
												<textarea id="editor" name="content" placeholder="博客内容" required autofocus></textarea>
												<div class="text-red">图片尺寸为800*600的等比大图,博客内容请大于200字</div>
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
											</div>
										</div>
										<div class="form-group"><label class="col-sm-3 control-label">是否推荐</label>
											<div class="col-sm-9 controls">
												<div class="info-radio">
													<label >
														<input type="radio" value="0" name="recommend" checked="checked"/>不推荐
													</label>
													<label >
														<input type="radio" value="1" name="recommend" />推荐
													</label>
												</div>
											</div>
										</div>
										<div class="form-group"><label class="col-sm-3 control-label">是否显示</label>
											<div class="col-sm-9 controls">
												<div class="info-radio">
													<label >
														<input type="radio" value="0" name="status" />不显示
													</label>
													<label >
														<input type="radio" value="1" name="status" checked="checked"/>显示
													</label>
												</div>
											</div>
										</div>
										<hr/>
										<div class="form-group">
											<div class="col-sm-6 col-sm-offset-3">
												<input type="hidden" name="auther" required  value="<?php echo ($admin['nickname']); ?>" class="form-control"/>
												<input type="hidden" name="user_id" required  value="<?php echo ($admin['id']); ?>" class="form-control"/>
												<button type="submit" class="btn btn-green btn-block">确认</button>
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




<div class="modal fade post-now"  tabindex="-1" role="dialog" aria-labelledby="notice-now">
		<div class="modal-dialog" role="document">
			<div class="modal-content my-modal-content">
				
				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
						<span aria-hidden="true">&times;</span>
					</button>
					<h4 class="modal-title text-center" id="myTou">
						添加新博客标签
					</h4>
				</div>
				<form class="form-horizontal" method="post">
					<div class="modal-body">
						
	            		<p class="text-left" for="post-title">分享标题<span class="text-danger">(*标签名称请在2-20位之间)</span></p>
	            		<input type="text" class="form-control my-model-input" name="ta_name" id="post-title">
					     

					</div>
				</form>
				<div class="modal-footer">
					<button class="btn btn-success btn-block my-modal-btn send-tag">
						确定发布
					</button>
				</div>
				
			</div>
		</div>
	</div>

	<link type="text/css" rel="stylesheet" href="/Airblog/Public/pluge/simditor-2.3.6/styles/simditor.css">
	<script src="/Airblog/Public/pluge/simditor-2.3.6/scripts/module.js"></script>
	<script src="/Airblog/Public/pluge/simditor-2.3.6/scripts/hotkeys.js"></script>
	<script src="/Airblog/Public/pluge/simditor-2.3.6/scripts/uploader.js"></script>
	<script src="/Airblog/Public/pluge/simditor-2.3.6/scripts/simditor.js"></script>
	<script>
		$(function(){
			$('#side-menu>li').removeClass('active');
			$('#admin-blog').addClass('active');

			var toolbar =['title','bold','italic','underline','strikethrough',
				'fontScale','color','ol','ul','blockquote','code','table','link','image',
			    'hr','indent','outdent','alignment'];
			var editor = new Simditor({
				textarea: $('#editor'),
				placeholder		: "博客生涯从此开始...",
				toolbar			: true,
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

<!--
	<script src="/Airblog/Public/pluge/simditor-2.3.6/Face/scripts/jquery-2.1.1.min.js"></script>
	<script src="/Airblog/Public/pluge/simditor-2.3.6/Face/scripts/bootstrap.min.js"></script>
	
	<script>
		$('#add-tag').click(function(){
			$('.post-now').modal('show');
		});
		
		$('.send-tag').click(function(){
			var ta_name=$.trim($('input[name="ta_name"]').val());
			if(ta_name.length>1 && ta_name.length<=20){
				
				$.ajax({
					type:'post',
					url:"<?php echo U('Bgtag/ajaxAddRun');?>",
					data:{
						'ta_name':ta_name,
					},
					dataType:"json",
					success:function(data){
						if(data.code){
							$('.post-now').modal('hide');
//							alert(data.mess);
							
							$('#b_tag').append(ta_name+',');
							
							return;
						}else{
							alert(data.mess);
							return;
						}
					},
				});
			}else{
				alert('标签名必须在2-20位之间');
			}
		});
		
		$('.use-tag').click(function(){
			var ta_name=$.trim($(this).html());
			var ta_id=parseInt($(this).attr('attr'));
			$.ajax({
				type:'post',
				url:"<?php echo U('Bgtag/ajaxSaveRun');?>",
				data:{
					'ta_id':ta_id,
				},
				dataType:"json",
				success:function(data){
					if(data.code){
						alert(data.mess);
						$('span[attr='+ta_id+']').hide();
						$('#b_tag').append(ta_name+',');
						return;
					}else{
						alert(data.mess);
						return;
					}
				},
			});
		});
		
	</script>
	-->
	
</body>
</html>