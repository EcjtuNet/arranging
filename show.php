<!DOCTYPE html>
<html lang="zh-cn">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>日新网面试排号系统</title>

    <!-- Bootstrap -->
    <link href="/css/bootstrap.min.css" rel="stylesheet">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
      <script src="http://cdn.bootcss.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="http://cdn.bootcss.com/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->
  </head>
<body>
<div class="container-fluid">
	<div class="row-fluid">
		<div class="span12">
			<h1>
				日新网面试排号系统
			</h1>
			<ul class="nav nav-pills">
				<li class="active">
					<a href="#">排号</a>
				</li>
				<li>
					<a href="#">面试流程</a>
				</li>
				<li>
					<a href="#">部门介绍</a>
				</li>
				<li>
					<a href="http://www.ecjtu.net/about/m/" target="_blank">关于日新</a>
				</li>
			</ul>
			<div class="alert alert-success">
				请牢记您的号码，预计时间仅供参考
			</div>
			<p>
				您的号码是：
			</p>
			<p class="lead text-success text-center">
				<em><?php echo $id; ?></em>
			</p>
			<p>
				<em>*预计在<b><?php echo $time; ?></b>面试，请做好准备</em>
			</p>
			<dl class="dl-horizontal">
				<dt>
					网站建设部
				</dt>
				<dd>
					负责日新网主页和各WEB产品等的开发与维护，旗下分前后端手机端程序员，
				</dd>
				<dd>
					需要掌握HTML/CSS、Javascript、Web后端开发语言（如PHP）。
				</dd>
				<dt>
					体验设计部
				</dt>
				<dd>
					负责日新网主页和各产品等的设计与出图，旗下分体验设计师和交互设计师，
				</dd>
				<dd>
					需要掌握PS以及拥有良好的审美观。
				</dd>
				<dt>
					安全运维部
				</dt>
				<dd>
					负责开发维护日新网服务器，保证全站的正常运行以及性能优化，
				</dd>
				<dd>
					需要熟练掌握Linux以及数据库等软件的安装调试维护优化。
				</dd>
			</dl>
		</div>
	</div>
</div>
</body>
</html>