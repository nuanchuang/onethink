<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html lang="zh-CN">
<head>
    
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
        <!-- 上述3个meta标签*必须*放在最前面，任何其他内容都*必须*跟随其后！ -->
        <title>微信物业管理系统</title>

        <!-- Bootstrap -->
        <link href="/Public/Home/bootstrap/css/bootstrap.min.css" rel="stylesheet">
        <link href="/Public/Home/css/style.css" rel="stylesheet">

        <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
        <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
        <!--[if lt IE 9]>
        <script src="//cdn.bootcss.com/html5shiv/3.7.2/html5shiv.min.js"></script>
        <script src="//cdn.bootcss.com/respond.js/1.4.2/respond.min.js"></script>
    
    <![endif]-->
    
        <style>
            .main{margin-bottom: 60px;}
            .indexLabel{padding: 10px 0; margin: 10px 0 0; color: #fff;}
        </style>
    
</head>
<body>
<div class="main">
<!--导航部分-->
    
        <nav class="navbar navbar-default navbar-fixed-bottom">
            <div class="container-fluid text-center">
                <div class="col-xs-3">
                    <p class="navbar-text"><a href="<?php echo U('index/index');?>" class="navbar-link">首页</a></p>
                </div>
                <div class="col-xs-3">
                    <p class="navbar-text"><a href="<?php echo U('index/fuwu');?>" class="navbar-link">服务</a></p>
                </div>
                <div class="col-xs-3">
                    <p class="navbar-text"><a href="<?php echo U('index/faxian');?>" class="navbar-link">发现</a></p>
                </div>
                <div class="col-xs-3">
                    <p class="navbar-text"><a href="<?php echo U('index/my');?>" class="navbar-link">我的</a></p>
                </div>
            </div>
        </nav>
    
<!--导航结束-->

<div class="container-fluid">
    
    <!--<div class="container-fluid" id="content_list">-->
        <?php if(is_array($baoxiues)): $i = 0; $__LIST__ = $baoxiues;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$baoxiu): $mod = ($i % 2 );++$i;?><div class="row noticeList">
            <a href="/Repair/detail/id/33.html">
                <div class="col-xs-3">
                    <p class="title text-info ">报修人：<?php echo ($baoxiu["name"]); ?></p>
                </div>
                <div class="col-xs-6">
                    <p class="title">报修标题：<?php echo ($baoxiu["title"]); ?></p>
                </div>
                <div class="col-xs-push-3">
                    <p class="title text-danger"><?php echo ($baoxiu["status"]); ?></p>
                </div>
            </a>
        </div><?php endforeach; endif; else: echo "" ;endif; ?>
    <!--</div>-->
    <div class="text-center">
        <button type="button" class="btn btn-info ajax-page">获取跟多~~~</button>
    </div>

</div>
</div>
    
        <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
        <script src="/Public/Home/css/jquery-1.11.2.min.js"></script>
        <!-- Include all compiled plugins (below), or include individual files as needed -->
        <script src="/Public/Home/bootstrap/js/bootstrap.min.js"></script>
    




</body>
</html>