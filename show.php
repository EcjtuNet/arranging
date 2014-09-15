<!DOCTYPE html>
<html lang="zh-cn">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>日新网面试排号系统</title>

    <!-- Bootstrap -->
    <link href="/css/bootstrap.min.css" rel="stylesheet">
    <script src="/js/jquery-1.11.0.min.js"></script>
    <style type="text/css">
    	p.lead em{
    		font-size: 72px;
    	}
		.nav-div{
			margin-top: 20px;
			font-family: "微软雅黑";
			display: none;
		}
		.show{
			display: block;
		}
		.nav-div p em b{
			color: red;
		}
		ol li{
			padding: 5px;
		}
    </style>
	<script>
		$(document).ready(function(){
			$('.nav li.in').click(function(ev){
				ev.preventDefault();
				var ind = $(this).index();
				$(this).siblings('.active').removeClass('active')
				.end().addClass('active');
				$('.nav-div').eq(ind).addClass('show')
					.siblings('.show').removeClass('show');
			});
		});
	</script>
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
				<li class="in active">
					<a href="#">排号</a>
				</li>
				<li class="in">
					<a href="#">面试流程</a>
				</li>
				<li class="in">
					<a href="#">部门介绍</a>
				</li>
				<li>
					<a href="http://www.ecjtu.net/about/m/" target="_blank">关于日新</a>
				</li>
			</ul>
			<div class="nav-div show">
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
					<em>*预计在<b><?php echo $time; ?></b>面试，请做好准备。</em>
				</p>
			</div>
			<div class="nav-div">
				<ol>
					<li>刷取二维码签到</li>
					<li>排队候场</li>
					<li>分组填表</li>
					<li>按序入场面试</li>
					<li>面试ing</li>
					<li>面试结束</li>
					<li>面试结果将在两天内以短信的形式通知 :) </li>
				</ol> 
			</div>
			<div class="nav-div">
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
</div>
</body>
</html>