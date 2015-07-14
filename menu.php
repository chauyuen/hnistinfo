<html>
<?php
header("Content-type: text/html; charset=utf-8");
require_once("source/version.php");
?>
<head>
<title>Menu <?php echo $version ?></title>
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1.0, minimum-scale=1.0, maximum-scale=1.0, user-scalable=no">
<meta name="renderer" content="webkit">
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
<?php
require_once("source/piwik.html");
define('SYSTEM_ROOT',dirname(__FILE__));
//简单的安全判断，阻止低级的非法访问（验证码部分已经去除）
if(isset($_SERVER['HTTP_REFERER'])){
$usr=$_POST['username'];
$pas=$_POST['password'];
//定义Cookies临时文件位置
$cookie_show = $_POST['username'].date('YmdHis');
$cookie_file = constant("SYSTEM_ROOT").'/tmp/'.$cookie_show.'.tmp';
//首次模拟登陆（61.187.92.235）,保存cookies
$ch = curl_init();
curl_setopt($ch, CURLOPT_URL, "http://61.187.92.235/loginAction.do?userName=$usr&userPass=$pas");
curl_setopt($ch, CURLOPT_HEADER, 0);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true); 
curl_setopt($ch, CURLOPT_COOKIEJAR,  $cookie_file); 
$ret = curl_exec($ch);
curl_close($ch);
//密码错误判断
$pwc = stristr($ret,"window.alert");
if (!$pwc)
{
//设定Cookies传递Cookies文件名
setcookie("ACCOUNTID",$cookie_show,time()+3600);
//发起跳转请求
$ch = curl_init();
curl_setopt($ch, CURLOPT_URL, "http://61.187.92.235/roamingAction.do?appId=BKS_CJCX");
curl_setopt($ch, CURLOPT_VERBOSE, 0); 
curl_setopt($ch, CURLOPT_HEADER, true);
curl_setopt($ch, CURLOPT_NOBODY, true);
curl_setopt($ch, CURLOPT_CUSTOMREQUEST, 'GET');
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true); 
curl_setopt($ch, CURLOPT_AUTOREFERER, true); 
curl_setopt($ch, CURLOPT_COOKIEFILE, $cookie_file); 
curl_setopt($ch, CURLOPT_COOKIEJAR,  $cookie_file); 
$ret = curl_exec($ch); 
curl_close($ch);
//截取头部跳转Token
$ret = substr($ret,239,36);
//人工构造正确访问地址，模拟访问，保存cookies
$ch = curl_init();
curl_setopt($ch, CURLOPT_URL, "http://61.187.92.238:7778/pls/wwwbks/bks_login2.loginbill?nAppType=3&p_bill=$ret");
curl_setopt($ch, CURLOPT_HEADER, 1);
curl_setopt($ch, CURLOPT_NOBODY, 1);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true); 
curl_setopt($ch, CURLOPT_COOKIEFILE, $cookie_file); 
curl_setopt($ch, CURLOPT_COOKIEJAR,  $cookie_file); 
$ret = curl_exec($ch);
curl_close($ch);
$nullc = stristr($ret,"Set-Cookie");
//失败再循环
if (!$nullc)
{
$ch = curl_init();
curl_setopt($ch, CURLOPT_URL, "http://61.187.92.235/roamingAction.do?appId=BKS_CJCX");
curl_setopt($ch, CURLOPT_VERBOSE, 0); 
curl_setopt($ch, CURLOPT_HEADER, true);
curl_setopt($ch, CURLOPT_NOBODY, true);
curl_setopt($ch, CURLOPT_CUSTOMREQUEST, 'GET');
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true); 
curl_setopt($ch, CURLOPT_AUTOREFERER, true); 
curl_setopt($ch, CURLOPT_COOKIEFILE, $cookie_file); 
curl_setopt($ch, CURLOPT_COOKIEJAR,  $cookie_file); 
$ret = curl_exec($ch); 
curl_close($ch);
$ret = substr($ret,239,36);
$ch = curl_init();
curl_setopt($ch, CURLOPT_URL, "http://61.187.92.238:7778/pls/wwwbks/bks_login2.loginbill?nAppType=3&p_bill=$ret");
curl_setopt($ch, CURLOPT_HEADER, 1);
curl_setopt($ch, CURLOPT_NOBODY, 1);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true); 
curl_setopt($ch, CURLOPT_COOKIEFILE, $cookie_file); 
curl_setopt($ch, CURLOPT_COOKIEJAR,  $cookie_file); 
$ret = curl_exec($ch);
curl_close($ch);
$nullc = stristr($ret,"Set-Cookie");
if (!$nullc)
{
$ch = curl_init();
curl_setopt($ch, CURLOPT_URL, "http://61.187.92.235/roamingAction.do?appId=BKS_CJCX");
curl_setopt($ch, CURLOPT_VERBOSE, 0); 
curl_setopt($ch, CURLOPT_HEADER, true);
curl_setopt($ch, CURLOPT_NOBODY, true);
curl_setopt($ch, CURLOPT_CUSTOMREQUEST, 'GET');
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true); 
curl_setopt($ch, CURLOPT_AUTOREFERER, true); 
curl_setopt($ch, CURLOPT_COOKIEFILE, $cookie_file); 
curl_setopt($ch, CURLOPT_COOKIEJAR,  $cookie_file); 
$ret = curl_exec($ch); 
curl_close($ch);
$ret = substr($ret,239,36);
$ch = curl_init();
curl_setopt($ch, CURLOPT_URL, "http://61.187.92.238:7778/pls/wwwbks/bks_login2.loginbill?nAppType=3&p_bill=$ret");
curl_setopt($ch, CURLOPT_HEADER, 1);
curl_setopt($ch, CURLOPT_NOBODY, 1);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true); 
curl_setopt($ch, CURLOPT_COOKIEFILE, $cookie_file); 
curl_setopt($ch, CURLOPT_COOKIEJAR,  $cookie_file); 
$ret = curl_exec($ch);
curl_close($ch);
$nullc = stristr($ret,"Set-Cookie");
if (!$nullc)
{
	header("Location: do.php?action=Relogin");	
}
}
}
?>
<div class="header">
<div class="am-g">
<h1>菜单</h1>
<p>请根据页面提示选择您需要查询的内容。</p>
</div>
<hr />
</div>
<div class="am-g">
<div class="am-u-lg-6 am-u-md-8 am-u-sm-centered">
<?php
//简单地根据时间出现问候语
$h=date('G');
if ($h<11) echo '早上好,';
else if ($h<17) echo '下午好,';
else echo '晚上好,';
echo $usr;
echo "<br><br>";
echo "您可以进行以下操作,请选择。";
?>
<hr />
<center>
<div class="am-g">
<div class="am-u-sm-2">
<a href="do.php?action=Xjcx" target="_blank"><h3><img src="/source/icon/xjcx.png" class="icon am-radius"><br/>查学籍</h3></a>
</div>
<?php
//自动隐藏成绩查询入口在不恰当的时候
if(date("m")=="01"
   ||date("m")=="02"
   ||date("m")=="06"
   ||date("m")=="07"
   ||date("m")=="08")
{
echo '<div class="am-u-sm-2"><a href="do.php?action=Curscopre" target="_blank"><h3><img src="/source/icon/curscopre.png" class="icon am-radius"><br/>查成绩</h3></a></div>';
}
?>
<div class="am-u-sm-2">
<a href="do.php?action=CourseView" target="_blank"><h3><img src="/source/icon/CourseView.png" class="icon am-radius"><br/>查课表</h3></a>
</div>
<div class="am-u-sm-2">
<a href="do.php?action=Bkscjcx" target="_blank"><h3><img src="/source/icon/Bkscjcx.png" class="icon am-radius"><br/>不及格</h3></a>
</div>
<div class="am-u-sm-2">
<a href="do.php?action=Exit"><h3><img src="/source/icon/Exit.png" class="icon am-radius"><br/>安全退出</h3></a>
</div>
</div>
</center>
<?php require_once("source/footer.html"); ?>
</div>
</div>
<?php
}else{
	$u = urlencode($_POST['username']);
	header("Location: index.php?action=pwerror&u=".$u);
	$result = @unlink ($cookie_file);
	}
		}else{
			header("Location: index.php?action=illegal");}
require_once("source/kf5.html");
?>
</body>
</html>