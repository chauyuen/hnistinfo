<html>
<head>
<title>下载照片BETA</title>
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1.0, minimum-scale=1.0, maximum-scale=1.0, user-scalable=no">
<meta name="renderer" content="webkit">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<link rel="stylesheet" href="http://cdn.amazeui.org/amazeui/2.4.1/css/amazeui.min.css"/>
</head>
<?php 
require_once("../source/piwik.html");
require_once("../source/version.php");
?>

<body>
<?php
if(isset($_POST["tid"])&& isset($_SERVER['HTTP_REFERER'])){
$id=$_POST["personalid"];
$cookie_file = '../tmp/'.$id.$_POST["tid"].'.tmp';
$data=http_build_query($_POST);
$ch = curl_init();
curl_setopt($ch, CURLOPT_URL, "http://ecard.hnist.cn/Login");
curl_setopt($ch, CURLOPT_HEADER,0);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
curl_setopt($ch, CURLOPT_POST, true);  
curl_setopt($ch, CURLOPT_POSTFIELDS, $data); 
curl_setopt($ch, CURLOPT_COOKIEFILE, $cookie_file); 
curl_setopt($ch, CURLOPT_COOKIEJAR,  $cookie_file); 
$ret = curl_exec($ch);
curl_close($ch);
$nullc = stristr($ret,"ok");
if($nullc)
{
$have=file_exists("Olympians/$id/");
if($have!=1){
mkdir("Olympians/$id/");
$mtrand=mt_rand();
$file = fopen("Olympians/$id/$mtrand.jpg","wb");
$ch = curl_init(); 
curl_setopt($ch, CURLOPT_URL, "http://ecard.hnist.cn/uzone/myprofile.do?t=$id");
curl_setopt($ch, CURLOPT_HEADER,0);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
curl_setopt($ch, CURLOPT_COOKIEFILE, $cookie_file); 
$ret = curl_exec($ch);
curl_close($ch);
fwrite($file,$ret);
fclose($file);
}
$have=file_exists("Olympians/$id/");
if($have!=1){
mkdir("Olympians/$id/");
$mtrand=mt_rand();
$file = fopen("Olympians/$id/$mtrand.jpg","wb");
$ch = curl_init(); 
curl_setopt($ch, CURLOPT_URL, "http://ecard.hnist.cn/uzone/myprofile.do?t=$id");
curl_setopt($ch, CURLOPT_HEADER,0);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
curl_setopt($ch, CURLOPT_COOKIEFILE, $cookie_file); 
$ret = curl_exec($ch);
curl_close($ch);
fwrite($file,$ret);
fclose($file);
}
$colon=scandir("Olympians/$id/");
$colon_mid = implode(",",$colon);
$colon_separated=substr($colon_mid,5,20);
?> 
<p class="am-alert am-alert-warning">使用电脑，请在图片上点击，鼠标右键--另存为。手机用户请您长按图片并选择保存。</p><br>
<center><img src="/iphoto/Olympians/<?php echo $id;?>/<?php echo $colon_separated;?>"></center>
<br><p class="am-alert am-alert-success">操作成功完成！</p>
<center>
<?php require_once("../source/footer.html"); ?>
</center>
</body>
<?php 
}else{
$ch = curl_init();
curl_setopt($ch, CURLOPT_URL, "http://ecard.hnist.cn/Login");
curl_setopt($ch, CURLOPT_HEADER,0);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
curl_setopt($ch, CURLOPT_POST, true);  
curl_setopt($ch, CURLOPT_POSTFIELDS, $data); 
curl_setopt($ch, CURLOPT_COOKIEFILE, $cookie_file); 
curl_setopt($ch, CURLOPT_COOKIEJAR,  $cookie_file); 
$ret = curl_exec($ch);
curl_close($ch);
$nullc = stristr($ret,"ok");
if($nullc)
{
$have=file_exists("Olympians/$id/");
if($have!=1){
mkdir("Olympians/$id/");
$mtrand=mt_rand();
$file = fopen("Olympians/$id/$mtrand.jpg","wb");
$ch = curl_init(); 
curl_setopt($ch, CURLOPT_URL, "http://ecard.hnist.cn/uzone/myprofile.do?t=$id");
curl_setopt($ch, CURLOPT_HEADER,0);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
curl_setopt($ch, CURLOPT_COOKIEFILE, $cookie_file); 
$ret = curl_exec($ch);
curl_close($ch);
fwrite($file,$ret);
fclose($file);
$have=file_exists("Olympians/$id/");
if($have!=1){
mkdir("Olympians/$id/");
$mtrand=mt_rand();
$file = fopen("Olympians/$id/$mtrand.jpg","wb");
$ch = curl_init(); 
curl_setopt($ch, CURLOPT_URL, "http://ecard.hnist.cn/uzone/myprofile.do?t=$id");
curl_setopt($ch, CURLOPT_HEADER,0);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
curl_setopt($ch, CURLOPT_COOKIEFILE, $cookie_file); 
$ret = curl_exec($ch);
curl_close($ch);
fwrite($file,$ret);
fclose($file);
}
}
$colon=scandir("Olympians/$id/");
$colon_mid = implode(",",$colon);
$colon_separated=substr($colon_mid,5,20);
?> 
<p class="am-alert am-alert-warning">使用电脑，请在图片上点击，鼠标右键--另存为。手机用户请您长按图片并选择保存。</p><br>
<center><img src="/iphoto/Olympians/<?php echo $id;?>/<?php echo $colon_separated;?>"></center>
<br><p class="am-alert am-alert-success">操作成功完成！</p>
<center>
<?php require_once("../source/footer.html"); ?>
</center>
</body>
<?php
}else{
      header("Location: index.php?action=error");}}
}else{
	  header("Location: index.php?action=illegal");}
require_once("../source/kf5.html");
?>
</html>