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

<style>

</style>
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
				<form action="<?php echo U('Home/Search/index');?>" method="post" class=" navbar-form navbar-left" role="search">
					<div class="input-group">
						<input type="text" name="key_word" required class="form-control" placeholder="KeyWords">
						<span class="input-group-btn">
        					<button class="btn btn-default" type="submit"><span class="glyphicon glyphicon-search"></span></button>
        				</span>
					</div>
				</form>
				<ul class="nav navbar-nav navbar-right">
					<li>
						<a href="<?php echo U('Home/Index/index');?>">
							<span class="glyphicon glyphicon-home"></span>
							首页
						</a>
					</li>
					<li>
						<a href="<?php echo U('Home/Project/index');?>">
							<span class="glyphicon glyphicon-fire"></span>
							案例
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


<div id="information">
	<div class="container">
		<div class="row">
			<div class="col-md-8 info-left">
				<div id="article">

					<p class="title"><?php echo ($item['title']); ?></p>
					<p class="time">
						<?php echo $item['create_time'] == $item['edit_time'] ? date('Y-m-d H:i:s',$item['create_time']) : '修改:'.date('Y-m-d H:i:s',$item['edit_time']);?>

					</p>
					<blockquote>
						<?php echo ($item['blog_info']); ?>
					</blockquote>
					<article>
						<?php echo ($item['content']); ?>
					</article>
					<p class="tags">
						<?php if(is_array($item['tags'])): $i = 0; $__LIST__ = $item['tags'];if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><label style="margin-right: 5px;">
								<span class="glyphicon glyphicon-tag"></span> <?php echo ($vo); ?>
							</label><?php endforeach; endif; else: echo "" ;endif; ?>
					</p>
					<div class="share">
						<div class="bdsharebuttonbox">
							<a href="#" class="bds_more" data-cmd="more"></a>
							<a href="#" class="bds_qzone" data-cmd="qzone" title="分享到QQ空间"></a>
							<a href="#" class="bds_sqq" data-cmd="sqq" title="分享到QQ好友"></a>
							<a href="#" class="bds_tsina" data-cmd="tsina" title="分享到新浪微博"></a>
							<a href="#" class="bds_tqq" data-cmd="tqq" title="分享到腾讯微博"></a>
							<a href="#" class="bds_weixin" data-cmd="weixin" title="分享到微信"></a>
						</div>
					</div>
				</div>
				<div id="article-auther">
					<div class="auther-avatar">
						<?php if(!empty($item['avatar']) && file_exists($item['avatar'])): ?><img src="/Airblog/<?php echo ($vo['avatar']); ?>">
							<?php else: ?>
							<img src="/Airblog/Public/img/default_avatar.jpg"><?php endif; ?>
					</div>
					<div class="auther-info">
						<div class="name">
							关于作者 <b><?php echo ($item['auther']); ?></b>
						</div>
						<div class="meta">
							<span class="hidden-xs loaction"><span class="glyphicon glyphicon-map-marker"></span> <?php echo empty($item['province']) ? '未知' :$item['province'] ;?></span>
							<span class="hidden-xs website"><span class="glyphicon glyphicon-globe"></span> <?php echo empty($item['user_email']) ? '未知' :$item['user_email'] ;?></span>
							<span class="phone"><span class="glyphicon glyphicon-phone"></span> <?php echo empty($item['iphone']) ? '未知' :$item['iphone'] ;?></span>
						</div>
					</div>
					<div class="clearfix">
					</div>
				</div>
			</div>
			<div class="col-md-4 info-right hidden-xs hidden-sm">
				<blockquote>
	<h2>热门BG</h2>
</blockquote>
<div class="container-fluid">
	<?php if(is_array($list_bar)): $i = 0; $__LIST__ = $list_bar;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i; if($key < 3): ?><a href="<?php echo U('Home/Blog/index',array('id'=>$vo['id']));?>" class="">
				<div class="row">
					<div class="col-md-5" style="margin:12px 0;padding:0;">
						<?php if(!empty($vo['thumb']) && file_exists($vo['thumb'])): ?><img class="img-responsive img-thumbnail"  src="/Airblog/<?php echo ($vo['thumb']); ?>">
							<?php else: ?>
							<img class="img-responsive img-thumbnail"  src="/Airblog/Public/img/no-pic.png"><?php endif; ?>
					</div>
					<div class="col-md-7 " style="padding-right:0">
						<h4><?php echo ($vo['title']); ?></h4>
						<p><?php echo date('Y-m-d H:i:s',$vo['create_time']);?></p>
					</div>
				</div>
			</a><?php endif; endforeach; endif; else: echo "" ;endif; ?>
	<div class="row">
		<ul class="list-unstyled list-title">
			<?php if(is_array($list_bar)): $i = 0; $__LIST__ = $list_bar;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i; if($key > 2): ?><li>
						<b><?php echo ($key+1); ?></b><a href="<?php echo U('Home/Blog/index',array('id'=>$vo['id']));?>"><?php echo ($vo['title']); ?></a>
					</li><?php endif; endforeach; endif; else: echo "" ;endif; ?>
		</ul>
	</div>
</div>
<blockquote>
	<h2>云TAG</h2>
</blockquote>
<div class="cloud-tags">
	<?php if(is_array($list_tag)): $i = 0; $__LIST__ = $list_tag;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><a href="<?php echo U('Home/Search/index',array('tags_name'=>$vo['name']));?>"><?php echo ($vo['name']); ?></a><?php endforeach; endif; else: echo "" ;endif; ?>
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



<script>

	window._bd_share_config={"common":{"bdSnsKey":{},"bdText":"","bdMini":"2","bdMiniList":false,"bdPic":"","bdStyle":"1","bdSize":"24"},"share":{},"selectShare":{"bdContainerClass":null,"bdSelectMiniList":["qzone","sqq","tsina","tqq","weixin"]}};with(document)0[(getElementsByTagName('head')[0]||body).appendChild(createElement('script')).src='http://bdimg.share.baidu.com/static/api/js/share.js?v=89860593.js?cdnversion='+~(-new Date()/36e5)];
</script>
</body>
</html>