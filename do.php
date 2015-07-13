<html>
<?php
header("Content-type: text/html; charset=gb2312"); 
require_once("source/version.php");
require_once("source/piwik.html");
define('SYSTEM_ROOT',dirname(__FILE__));
if(isset($_GET['action']) && isset($_COOKIE["ACCOUNTID"])){
$cookie_file = constant("SYSTEM_ROOT").'/tmp/'.$_COOKIE["ACCOUNTID"].'.tmp';
if($_GET['action']=='Curscopre'){
?>
<head>
<title>成绩查询结果页</title>
<meta http-equiv="Content-Type" content="text/html; charset=gb1312" /> 
<meta name="renderer" content="webkit">
<link rel="stylesheet" href="http://cdn.amazeui.org/amazeui/2.4.1/css/amazeui.min.css"/>
</head>
<div class="am-g">
      <div class="am-u-sm-12">
        <form class="am-form" action="do.php?action=Cursco" method="POST">
          <table class="am-table am-table-striped am-table-hover table-main">
		    <p class="am-alert am-alert-warning">现在您可以通过点击显示排名获取排名信息。</p>
            <thead>
              <tr>
               <th></th><th>课程号</th><th>课程名</th><th>课序号</th><th>学分</th><th>考试时间</th><th>成绩</th><th>课程属性</th>
              </tr>
          </thead>
          <tbody>
<?php
$ch = curl_init();
curl_setopt($ch, CURLOPT_URL, "http://61.187.92.238:7778/pls/wwwbks/bkscjcx.curscopre");
curl_setopt($ch, CURLOPT_HEADER, 0);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true); 
curl_setopt($ch, CURLOPT_COOKIEFILE, $cookie_file); 
$ret = curl_exec($ch);
curl_close($ch);
$nullc = stristr($ret,"TABLE");
if ($nullc)
{
$res = str_replace("checkbox","hidden",$ret);
$ret = str_replace("p_pm","p_pm[]",$res);
$res = strstr($ret,"<TR>");
$ret = str_replace("center","justify",$res);
$res = str_replace("<INPUT","<INPUT class='am-btn am-btn-primary am-radius'",$ret);
echo $res;
echo '<p class="am-alert am-alert-success">操作成功完成！</p>';
?>               
                 </div>
                </div>
              </td>
            </tr>
		</tbody>
    </table>

<?php
}else{ 
$ch = curl_init();
curl_setopt($ch, CURLOPT_URL, "http://61.187.92.238:7778/pls/wwwbks/bkscjcx.curscopre");
curl_setopt($ch, CURLOPT_HEADER, 0);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true); 
curl_setopt($ch, CURLOPT_COOKIEFILE, $cookie_file); 
$ret = curl_exec($ch);
curl_close($ch);
$nullc = stristr($ret,"TABLE");
if ($nullc)
{
$res = str_replace("checkbox","hidden",$ret);
$ret = str_replace("p_pm","p_pm[]",$res);
$res = strstr($ret,"<TR>");
$ret = str_replace("center","justify",$res);
$res = str_replace("<INPUT","<INPUT class='am-btn am-btn-primary am-radius'",$ret);
echo $res;
echo '<p class="am-alert am-alert-success">操作成功完成！</p>';
?>               
                 </div>
                </div>
              </td>
            </tr>
		</tbody>
    </table>
<?php
}else{echo '<p class="am-alert am-alert-danger">似乎信息服务没有反馈任何信息，这一情况可能是由于信息服务服务器过于忙碌或者登陆已经失效，您可以返回菜单页重试或者<a href="do.php?action=Relogin">点击这里重新登录</a></p>';}}
require_once("source/footer-gb1312.html");
require_once("source/kf5-gb1312.html");
}elseif ($_GET['action']=='CourseView'){
?>
<head>
<title>课表查询结果页</title>
<meta http-equiv="Content-Type" content="text/html; charset=gb1312" /> 
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="renderer" content="webkit">
<meta http-equiv="Cache-Control" content="no-siteapp" />
<meta http-equiv="Content-Type" content="text/html; charset=GBK">
<link rel="stylesheet" href="http://cdn.amazeui.org/amazeui/2.4.1/css/amazeui.min.css"/>
</head>
<div class="am-g">
      <div class="am-u-sm-12">
        <form class="am-form" action="cursco.php" method="POST" onsubmit="addJYM(this,2)">
          <table class="am-table am-table-striped am-table-hover table-main">
          <tbody>
<?php
$ch = curl_init();
curl_setopt($ch, CURLOPT_URL, "http://61.187.92.238:7778/pls/wwwbks/xk.CourseView");
curl_setopt($ch, CURLOPT_HEADER, 0);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true); 
curl_setopt($ch, CURLOPT_COOKIEFILE, $cookie_file); 
$ret = curl_exec($ch);
curl_close($ch);
$nullc = stristr($ret,"操作成功!");
if ($nullc)
{
$res = strstr($ret,"<TR>");
echo $res;
?>
                 </div>
                </div>
              </td>
            </tr>
		</tbody>
    </table>
<?php
echo '<p class="am-alert am-alert-success">操作成功完成！</p>';
}else{
	$ch = curl_init();
curl_setopt($ch, CURLOPT_URL, "http://61.187.92.238:7778/pls/wwwbks/xk.CourseView");
curl_setopt($ch, CURLOPT_HEADER, 0);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true); 
curl_setopt($ch, CURLOPT_COOKIEFILE, $cookie_file); 
$ret = curl_exec($ch);
curl_close($ch);
$nullc = stristr($ret,"操作成功!");
if ($nullc)
{
$res = strstr($ret,"<TR>");
echo $res;
?>
                 </div>
                </div>
              </td>
            </tr>
		</tbody>
    </table>
<?php
echo '<p class="am-alert am-alert-success">操作成功完成！</p>';
}else{echo '<p class="am-alert am-alert-danger">似乎信息服务没有反馈任何信息，这一情况可能是由于信息服务服务器过于忙碌或者登陆已经失效，您可以返回菜单页重试或者<a href="do.php?action=Relogin">点击这里重新登录</a></p>';}}
require_once("source/footer-gb1312.html");
require_once("source/kf5-gb1312.html");
}elseif ($_GET['action']=='Xjcx'){
?>
<head>
<title>个人信息结果页</title>
<meta http-equiv="Content-Type" content="text/html; charset=gb1312" /> 
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1.0, minimum-scale=1.0, maximum-scale=1.0, user-scalable=no">
<meta name="format-detection" content="telephone=no">
<meta name="renderer" content="webkit">
<meta http-equiv="Cache-Control" content="no-siteapp" />
<meta http-equiv="Content-Type" content="text/html; charset=GBK">
<link rel="stylesheet" href="http://cdn.amazeui.org/amazeui/2.4.1/css/amazeui.min.css"/>
</head>
<?php
$ch = curl_init();
curl_setopt($ch, CURLOPT_URL, "http://61.187.92.238:7778/pls/wwwbks/bks_xj.xjcx");
curl_setopt($ch, CURLOPT_HEADER, 0);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true); 
curl_setopt($ch, CURLOPT_COOKIEFILE, $cookie_file); 
$ret = curl_exec($ch);
curl_close($ch);
$nullc = stristr($ret,"目前库中");
if ($nullc)
{
$res = strstr($ret,"<strong><font");
$ret = str_replace("img","b",$res);
$res = str_replace("说明:目前库中只有部分系学生的照片，其余系的学生照片会陆续转入。"," ",$ret);
$p=substr($_COOKIE["ACCOUNTID"],0,11);
$d_e=strstr($res, '199');
$d=substr($d_e,0,8);
echo "<p class='am-alert am-alert-warning'><a href='/iphoto/index.php?p=$p&d=$d'>想要获取你一卡通上的照片吗？点我点我点我</a></p><br>";
echo $res;
echo '</table><p class="am-alert am-alert-success">操作成功完成！</p>';
}else{
$ch = curl_init();
curl_setopt($ch, CURLOPT_URL, "http://61.187.92.238:7778/pls/wwwbks/bks_xj.xjcx");
curl_setopt($ch, CURLOPT_HEADER, 0);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true); 
curl_setopt($ch, CURLOPT_COOKIEFILE, $cookie_file); 
$ret = curl_exec($ch);
curl_close($ch);
$nullc = stristr($ret,"目前库中");
if ($nullc)
{
$res = strstr($ret,"<strong><font");
$ret = str_replace("img","b",$res);
$res = str_replace("说明:目前库中只有部分系学生的照片，其余系的学生照片会陆续转入。"," ",$ret);
$p=substr($_COOKIE["ACCOUNTID"],0,11);
$d_e=strstr($res, '199');
$d=substr($d_e,0,8);
echo "<p class='am-alert am-alert-warning'><a href='/iphoto/index.php?p=$p&d=$d'>想要获取你一卡通上的照片吗？点我点我点我</a></p><br>";
echo $res;
echo '</table><p class="am-alert am-alert-success">操作成功完成！</p>';
}else{
echo '<p class="am-alert am-alert-danger">似乎信息服务没有反馈任何信息，这一情况可能是由于信息服务服务器过于忙碌或者登陆已经失效，您可以返回菜单页重试或者<a href="do.php?action=Relogin">点击这里重新登录</a></p>';}}
require_once("source/footer-gb1312.html");
require_once("source/kf5-gb1312.html");
}elseif ($_GET['action']=='Cursco'){
?>
<head> 
<title>排名结果页 BETA</title> 
<meta http-equiv="Content-Type" content="text/html; charset=gb1312" /> 
<meta http-equiv="Content-Type" content="text/html" /> 
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1.0, minimum-scale=1.0, maximum-scale=1.0, user-scalable=no">
<meta name="renderer" content="webkit">
<meta http-equiv="Content-Type" content="text/html; charset=GBK">
<link rel="stylesheet" href="http://cdn.amazeui.org/amazeui/2.4.1/css/amazeui.min.css"/>
</head>
<body>
<?php
$str = $_POST["p_pm"];
$n = count($str);	
?>
<div class="am-g">
      <div class="am-u-sm-12">
        <form class="am-form">
          <table class="am-table am-table-striped am-table-hover table-main">
		  <p class="am-alert am-alert-warning">可参加排名的科目有：<?php echo $n;?>门</p>
          <thead>
              <tr>
               <th>课程号</th><th>课程名</th><th>成绩</th><th>选课人数</th><th>最高分</th><th>最低分</th><th>排名</th>
              </tr>
          </thead>
          <tbody>
<?php
for($i=0;$i<$n;$i++)
{
$data['p_pm'] = $str[$i];
$ch = curl_init();
curl_setopt($ch, CURLOPT_URL, "http://61.187.92.238:7778/pls/wwwbks/bkscjcx.cursco");
curl_setopt($ch, CURLOPT_HEADER, 0);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
curl_setopt($ch, CURLOPT_POST, true);  
curl_setopt($ch, CURLOPT_POSTFIELDS, $data); 
curl_setopt($ch, CURLOPT_COOKIEFILE, $cookie_file); 
$ret = curl_exec($ch);
curl_close($ch);
$nullc=stristr($ret,"</tr>
</table>
</td>
</tr>
</body>
</html>");
if($nullc)
{
$res = stristr($ret,"</strong></p></td>
</tr>");
$ret = str_replace("center","justify",$res);
$res = str_replace("
</table>
</td>
</tr>
</body>
</html>
"," ",$ret);
echo $res;
}else{
$ch = curl_init();
curl_setopt($ch, CURLOPT_URL, "http://61.187.92.238:7778/pls/wwwbks/bkscjcx.cursco");
curl_setopt($ch, CURLOPT_HEADER, 0);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
curl_setopt($ch, CURLOPT_POST, true);  
curl_setopt($ch, CURLOPT_POSTFIELDS, $data); 
curl_setopt($ch, CURLOPT_COOKIEFILE, $cookie_file); 
$ret = curl_exec($ch);
curl_close($ch);
$res = stristr($ret,"</strong></p></td>
</tr>");
$ret = str_replace("center","justify",$res);
$res = str_replace("
</table>
</td>
</tr>
</body>
</html>
"," ",$ret);
echo $res;
}
}
echo '</table><p class="am-alert am-alert-success">操作成功完成，如无内容，请重试！</p>';
?>
                 </div>
                </div>
              </td>
            </tr>
		</tbody>
    </table>
<?php
require_once("source/footer-gb1312.html");
require_once("source/kf5-gb1312.html");
}elseif ($_GET['action']=='Bkscjcx'){
?>
<title>不及格科目查询结果页</title>
<meta http-equiv="Content-Type" content="text/html; charset=gb1312" /> 
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1.0, minimum-scale=1.0, maximum-scale=1.0, user-scalable=no">
<meta name="renderer" content="webkit">
<meta http-equiv="Content-Type" content="text/html; charset=GBK">
<link rel="stylesheet" href="http://cdn.amazeui.org/amazeui/2.4.1/css/amazeui.min.css"/>
</head>
<body>
<div class="am-g">
      <div class="am-u-sm-12">
        <form class="am-form" action="do.php?action=Cursco" method="POST">
          <table class="am-table am-table-striped am-table-hover table-main">
		  <p class="am-alert am-alert-warning">（BETA）说明：以下查询结果包括重修后及格的课程。</p>
            <thead>
              <tr>
               <th>课程号</th><th>课程名</th><th>课程类型</th><th>学分</th><th>考试时间</th><th>成绩</th>
              </tr>
          </thead>
          <tbody>
<?php
$ch = curl_init();
curl_setopt($ch, CURLOPT_URL, "http://61.187.92.238:7778/pls/wwwbks/bkscjcx.bjgkc");
curl_setopt($ch, CURLOPT_HEADER, 0);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true); 
curl_setopt($ch, CURLOPT_COOKIEFILE, $cookie_file); 
$ret = curl_exec($ch);
curl_close($ch);
$nullc = stristr($ret,"说明：上述查询结果包括重修后及格的课程。");
if ($nullc)
{
$res = strstr($ret,'<td bgcolor="#EAE2F3"><p align="center">');
$ret = str_replace("center","justify",$res);
$res = str_replace("</CENTER>
<P>
说明：上述查询结果包括重修后及格的课程。
</BODY>
</HTML>"," ",$ret);
echo $res;
echo '<p class="am-alert am-alert-success">操作成功完成！</p>';
?>               
                 </div>
                </div>
              </td>
            </tr>
		</tbody>
    </table>

<?php
}else{ 
$ch = curl_init();
curl_setopt($ch, CURLOPT_URL, "http://61.187.92.238:7778/pls/wwwbks/bkscjcx.bjgkc");
curl_setopt($ch, CURLOPT_HEADER, 0);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true); 
curl_setopt($ch, CURLOPT_COOKIEFILE, $cookie_file); 
$ret = curl_exec($ch);
curl_close($ch);
$nullc = stristr($ret,"说明：上述查询结果包括重修后及格的课程。");
if ($nullc)
{
$res = strstr($ret,'<td bgcolor="#EAE2F3"><p align="center">');
$ret = str_replace("center","justify",$res);
$res = str_replace("</CENTER>
<P>
说明：上述查询结果包括重修后及格的课程。
</BODY>
</HTML>"," ",$ret);
echo $res;
echo '<p class="am-alert am-alert-success">操作成功完成！</p>';
?>               
                 </div>
                </div>
              </td>
            </tr>
		</tbody>
    </table>

<?php
}else{
echo '<p class="am-alert am-alert-danger">似乎信息服务没有反馈任何信息，这一情况可能是由于信息服务服务器过于忙碌或者登陆已经失效，您可以返回菜单页重试或者<a href="do.php?action=Relogin">点击这里重新登录</a></p>';}}
require_once("source/footer-gb1312.html");
require_once("source/kf5-gb1312.html");
}elseif ($_GET['action']=='Exit'){
 header("Location: index.php?action=Exit");
 setcookie ("SESSIONID", "", time() - 3600);
 if(isset($_COOKIE["ACCOUNTID"])){
 $cookie_file = constant("SYSTEM_ROOT").'/tmp/'.$_COOKIE["ACCOUNTID"].'.tmp';
 $result = @unlink ($cookie_file);
 setcookie ("ACCOUNTID", "", time() - 3600);}
}elseif ($_GET['action']=='Relogin'){
 header("Location: index.php?action=Relogin");
 setcookie ("SESSIONID", "", time() - 3600);
 if(isset($_COOKIE["ACCOUNTID"])){
 $cookie_file = constant("SYSTEM_ROOT").'/tmp/'.$_COOKIE["ACCOUNTID"].'.tmp';
 $result = @unlink ($cookie_file);
 setcookie ("ACCOUNTID", "", time() - 3600);}
}else{
  header("Location: index.php?action=illegal");}
}else{
  header("Location: index.php?action=illegal");}
?>
</body>
</html>