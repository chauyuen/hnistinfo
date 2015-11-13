<?php
header("Content-type: text/html; charset=gb1312"); 
require_once("../source/piwik.html");
require_once("../source/version.php");
if(isset($_GET['method'])&& isset($_SERVER['HTTP_REFERER'])){
if($_GET['method']=='bb'){
?>
<html>
<head>
<title>忘记学号结果页 BETA</title>
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1.0, minimum-scale=1.0, maximum-scale=1.0, user-scalable=no">
<meta name="renderer" content="webkit">
<link rel="stylesheet" href="http://cdn.amazeui.org/amazeui/2.4.1/css/amazeui.min.css"/>
</head>
<div class="am-g">
      <div class="am-u-sm-12">
        <form class="am-form">
          <table class="am-table am-table-striped am-table-hover table-main">
          <thead>
              <tr>
               <th>学号</th><th>姓名</th><th>班级代码</th><th>班级名称</th><th>银行帐号</th>
              </tr>
<?php 
$data=http_build_query($_POST);
$ch = curl_init();
curl_setopt($ch, CURLOPT_URL, "http://61.187.92.238:8888/cwcx/sf/Axhfind.asp");
curl_setopt($ch, CURLOPT_HEADER,0);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
curl_setopt($ch, CURLOPT_POST, true);  
curl_setopt($ch, CURLOPT_POSTFIELDS, $data); 
$ret = curl_exec($ch);
curl_close($ch);
$res = stristr($ret,'</thead>');
$ret = str_replace('版权所有2008&copy;，翻版必究！技术支持：<a href="Http://www.wangcai.cc" target="New" title="长沙网财信息技术服务有限公司">长沙网财信息技术服务有限公司</a>　'," ",$res);
echo $ret;
require_once("../source/footer-gb1312.html");
?>
<hr />
<div class="am-cf" align="center">
<a href="http://hnist.ayumi.pw/fid" class="am-btn am-btn-primary am-btn-sm am-fl">返回上一页</a>
<br>
<br>
<a href="http://hnist.ayumi.pw" class="am-btn am-btn-primary am-btn-sm am-fl">返回信息服务查询</a>

</div>
<?php
require_once("../source/kf5-gb1312.html");
}else if($_GET['method']=='nh'){
?>
<html>
<head>
<title>忘记学号结果页(南湖学院)</title>
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1.0, minimum-scale=1.0, maximum-scale=1.0, user-scalable=no">
<meta name="renderer" content="webkit">
<link rel="stylesheet" href="http://cdn.amazeui.org/amazeui/2.4.1/css/amazeui.min.css"/>
</head>
<div class="am-g">
      <div class="am-u-sm-12">
        <form class="am-form">
          <table class="am-table am-table-striped am-table-hover table-main">
          <thead>
              <tr>
               <th>学号</th><th>姓名</th><th>班级代码</th><th>班级名称</th><th>银行帐号</th>
              </tr>
<?php 
$data=http_build_query($_POST);
$ch = curl_init();
curl_setopt($ch, CURLOPT_URL, "http://61.187.92.238:8888/cwcxnh/sf/Axhfind.asp");
curl_setopt($ch, CURLOPT_HEADER,0);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
curl_setopt($ch, CURLOPT_POST, true);  
curl_setopt($ch, CURLOPT_POSTFIELDS, $data); 
$ret = curl_exec($ch);
curl_close($ch);
$res = stristr($ret,'</thead>');
$ret = str_replace('版权所有2008&copy;，翻版必究！技术支持：<a href="Http://www.wangcai.cc" target="New" title="长沙网财信息技术服务有限公司">长沙网财信息技术服务有限公司</a>　'," ",$res);
echo $ret;
require_once("../source/footer-gb1312.html");
?>
<hr />
<div class="am-cf" align="center">
<a href="http://hnist.ayumi.pw/fid/index_nh.php" class="am-btn am-btn-primary am-btn-sm am-fl">返回上一页</a>
<br>
<br>
<a href="http://hnist.ayumi.pw" class="am-btn am-btn-primary am-btn-sm am-fl">返回信息服务查询</a>
</div>
<?php
require_once("../source/kf5-gb1312.html");
}else{
	  header("Location: index.php?action=illegal");}
	  }else{
	  header("Location: index.php?action=illegal");}
?>
