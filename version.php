<?php header("Content-type: text/html; charset=utf-8"); ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" " http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd"> 
<html xmlns=" http://www.w3.org/1999/xhtml"> 
<head> 
<meta http-equiv="expires" content="0" /> 
<title>版本信息</title> 
<link href="source/common.css" rel="stylesheet" type="text/css">
</head>
<?php require_once("source/version.php"); ?>
<?php require_once("source/piwik.html"); ?>
<body>
<div class="Version"> 
<div style="padding-top:10px;">
<img src="source/i.jpg"><img>
<h3>V3.0F2(Final)</h3>
SSL SPDY支持（前端）(已放弃)<br>
优化的移动体验<br>
终结版本
<h3>V2.2</h3>
新增菜单页
<h3>V2.0</h3>
新增密码错误判断机制<br>
取消白名单机制
<h3>V1.2</h3>
查看排名BETA<br>
自助添加新用户（已放弃）
<h3>V1.1</h3>
白名单机制（已放弃）
<h3>V1.0</h3>
一个全新的登陆界面<br>
验证码支持<br>
同时禁止了非法访问接口文件，减少了不必要临时文件的生成<br>
感谢Sang提供验证码模块
<h3>V0.5</h3>
相对不那么丑陋的登陆界面<br>
<h3>V0.1</h3>
单用户 To 多用户支持<br>
丑陋的登陆界面
<h3>V0.0</h3>
单用户技术验证版<br>
未对外发布<br>
感谢Macro，Sang，KIMI在这一版中提供的支持
</div>
</div>
<div class="Versionfooter">
<?php require_once("source/footer.html"); ?>
</div>
<?php require_once("source/kf5.html"); ?>
</body>
</html>