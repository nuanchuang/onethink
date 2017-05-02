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
    
    <div class="container-fluid">
        <div class="blank"></div>
        <h3 class="noticeDetailTitle"><strong>关于我们</strong></h3>
        <div class="noticeDetailContent">
            开发周期：2013-06~2013-08<br/>
            参与人员：z<br/>
            主要功能：<br/>
            01）微信的自动回复（文本，图文，音频），<br/>
            02）微信自定义菜单，<br/>
            03）微视频，疯狂猜单词，疯狂听单词，账号绑定CRM，启德名师，高分学员，院校库等模块上线，<br/>
            04）手机通过微信绑定后，将微信账号反推至CRM，<br/>
            05）教务系统调课，根据调课事件推送微信消息至相关人员。<br/>
        </div>
    </div>
</div>

</div>
</div>
    
        <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
        <script src="/Public/Home/css/jquery-1.11.2.min.js"></script>
        <!-- Include all compiled plugins (below), or include individual files as needed -->
        <script src="/Public/Home/bootstrap/js/bootstrap.min.js"></script>
    




</body>
</html>