<html>
<?php
require_once("../source/version.php");
header("Content-type: text/html; charset=utf-8"); 
if(isset($_GET["p"])&& isset($_GET["d"])) 
{
$sub="都准备好了，点这里继续吧！";
}
else
{
$sub="提交";
}
?>
<head>
<title>获取照片 V<?php echo $version; ?></title>
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
<h1>获取照片</h1>
<p>您的登录信息将被同步到一卡通平台，请您放心，我们将不会保存您的账户及密码信息。</p>
</div>
<hr />
</div>
<div class="am-g">
<div class="am-u-lg-6 am-u-md-8 am-u-sm-centered">
<?php error_reporting(E_ALL & ~E_NOTICE); if($_GET['action']=='error'){echo '<p class="am-alert am-alert-danger">错误，请重试!</p>'; } ?>
<?php error_reporting(E_ALL & ~E_NOTICE); if($_GET['action']=='illegal'){echo '<p class="am-alert am-alert-danger">非法访问,请重试!</p>'; } ?>
<form method="post" action="do.php" class="am-form">
<label for="personalid">学号:<?php if(isset($_GET["p"])){echo "已获取";} ?></label>
<input name="personalid" type="<?php if(isset($_GET["p"])){echo "hidden";}else{echo "text";}?>" value="<?php echo $_GET['p'];?>">
<br/>
<label for="dob">出生年月日（格式：19800101）:<?php if(isset($_GET["d"])){echo "已获取";} ?></label>
<input name="dob" type="<?php if(isset($_GET["d"])){echo "hidden";}else{echo "password";}?>" value="<?php echo $_GET['d'];?>">
<br/>
<input type="hidden" name="fromWhere" value="login">
<input type="hidden" name="tid" value="<?php echo mt_rand();echo date('YmdHis');?>">
<div class="am-cf">
<input type="submit" name="" value="<?php echo $sub;?>" class="am-btn am-btn-primary am-btn-sm am-fl">
</div>
</form>
<?php require_once("../source/footer.html"); ?>
</div>
</div>
<?php require_once("../source/kf5.html"); ?>
</body>
</html>