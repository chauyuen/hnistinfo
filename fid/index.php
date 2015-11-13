<?php 
header("Content-type: text/html; charset=gb1312"); 
require_once("../source/version.php");
?>
<html>
<head>
<title>忘记学号 BETA</title>
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1.0, minimum-scale=1.0, maximum-scale=1.0, user-scalable=no">
<meta name="format-detection" content="telephone=no">
<meta name="renderer" content="webkit">
<meta http-equiv="Cache-Control" content="no-siteapp" />
<link rel="stylesheet" href="http://cdn.amazeui.org/amazeui/2.4.1/css/amazeui.min.css"/>
<style>
.header {
	text-align: center;
}
	.header h1 {
		font-size: 150%;
        color: #333;
        margin-top: 15px;
	}
		.header p {
			font-size: 14px;
		}
</style>
</head>
<?php require_once("../source/piwik.html"); ?>
<body>
<div class="header">
<div class="am-g">
<h1>忘记学号</h1>
<p>您的登录信息将被同步到计财处平台，请您放心，我们将不会保存您的信息。下面二选一就可以了。</p>
</div>
<hr />
</div>
<div class="am-g">
<div class="am-u-lg-6 am-u-md-8 am-u-sm-centered">
<?php error_reporting(E_ALL & ~E_NOTICE); if($_GET['action']=='illegal'){echo '<p class="am-alert am-alert-danger">非法访问,请重试!</p>'; } ?>
<form method="post" action="do.php?method=bb" class="am-form">
<label for="TXTXH">学号:</label>
<input name="TXTXH" type="text">
<br/>
<label for="TXTXM">姓名:</label>
<input name="TXTXM" type="text">
<br/>
<input type="hidden" name="TXTZH">
<div class="am-cf">
<input type="submit" name="CmdFind" value="查 询(Q)" class="am-btn am-btn-primary am-btn-sm am-fl">
</div>
</form>
<?php require_once("../source/footer-gb1312.html"); ?>
</div>
</div>
<?php require_once("../source/kf5-gb1312.html"); ?>
</body>
</html>