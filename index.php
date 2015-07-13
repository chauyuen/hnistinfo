<html>
<?php 
require_once("source/version.php");
if(isset($_COOKIE["ACCOUNTID"])){
setcookie ("SESSIONID", "", time() - 3600);
}
header("Content-type: text/html; charset=utf-8");
?>
<head>
<title>OAuth <?php echo $version ?></title>
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
<?php require_once("source/piwik.html"); ?>
<body>
<div class="header">
<div class="am-g">
<h1>授权登录</h1>
<p>您的登录信息将被同步到信息服务，请您放心，我们将不会保存您的账户及密码信息。</p>
</div>
<hr />
</div>
<div class="am-g">
<div class="am-u-lg-6 am-u-md-8 am-u-sm-centered">
<?php error_reporting(E_ALL & ~E_NOTICE); if($_GET['action']=='Exit'){echo '<p class="am-alert am-alert-success">您已成功退出，感谢您的使用！</p>'; } ?>
<?php error_reporting(E_ALL & ~E_NOTICE); if($_GET['action']=='Relogin'){echo '<p class="am-alert am-alert-warning">很抱歉给您带来了不便，辛苦您重新登陆尝试一下。</p>'; } ?>
<?php error_reporting(E_ALL & ~E_NOTICE); if($_GET['action']=='error'){echo '<p class="am-alert am-alert-danger">很抱歉,验证码不正确!</p>'; } ?>
<?php error_reporting(E_ALL & ~E_NOTICE); if($_GET['action']=='illegal'){echo '<p class="am-alert am-alert-danger">非法访问,请重试!</p>'; } ?>
<?php error_reporting(E_ALL & ~E_NOTICE); if($_GET['action']=='pwerror'){echo '<p class="am-alert am-alert-danger">学号或者密码错误，请重试！<a href="http://hnist.ayumi.pw/fid" target="_blank">忘记学号？</a>&nbsp;&nbsp;or&nbsp;&nbsp;<a href="http://info.hnist.cn/userInfo2.html" target="_blank">点此找回密码?</a></p>'; } ?>
<form method="post" action="menu.php" class="am-form">
<label for="username">学号:</label>
<input name="username" type="text" id="username" placeholder="" required="" value="<?php echo $_GET['u']; ?>">
<br />
<label for="password">密码:</label>
<input name="password" type="password" id="password" placeholder="·················" required="">
<br />
<!--
<label for="captcha">验证码:</label><br/>
<img src="images/z_imgcode.php" onclick="this.src=&quot;images/z_imgcode.php?&quot;+Math.random();">
<input type="text" name="captcha" required>
<br />
-->
<div class="am-cf">
<input type="submit" name="" value="登 录" class="am-btn am-btn-primary am-btn-sm am-fl">
<a href="http://info.hnist.cn/userInfo2.html" target="_blank" name="" class="am-btn am-btn-default am-btn-sm am-fr">忘记密码 ^_^? </a>
</div>
</form>
<?php require_once("source/footer.html"); ?>
</div>
</div>
<?php require_once("source/kf5.html"); ?>
</body>
</html>
