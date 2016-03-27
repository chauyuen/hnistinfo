<?php
use \Psr\Http\Message\ServerRequestInterface as Request;
use \Psr\Http\Message\ResponseInterface as Response;

require 'vendor/autoload.php';

$app = new \Slim\App;

$app->post('/v1', function (Request $request, Response $response) {
	//获取信息
	$post = $request->getBody();
	$post = json_decode($post,true);
	$usr = $post['username'];
	$pwd = $post['password'];
	//是否需要真实姓名（获取真实姓名需要许多额外的时间）
	$needname = $post['needname'];
	//模拟登陆（61.187.92.235）
	$ch = curl_init();
	curl_setopt($ch, CURLOPT_URL, "http://61.187.92.235/loginAction.do?userName=$usr&userPass=$pwd");
	curl_setopt($ch, CURLOPT_HEADER, 1);
	curl_setopt($ch, CURLOPT_RETURNTRANSFER, true); 
	$ret = curl_exec($ch);
	preg_match('/Set-Cookie:(.*);/iU',$ret,$str); //正则匹配
	$cookie = $str[1]; //获得COOKIE（SESSIONID）
	$cookie = trim($cookie);
	curl_close($ch);
	//报错判断
	$pwc = stristr($ret,"window.alert");
	if (!$pwc)
	{
		$status='1';
		$msg="Login Success!";
		//获取真实姓名
		if($needname ==1)
		{		

			$ch = curl_init();
			curl_setopt($ch, CURLOPT_URL, "http://61.187.92.235/roamingAction.do?appId=BKS_CJCX");
			curl_setopt($ch, CURLOPT_VERBOSE, 0); 
			curl_setopt($ch, CURLOPT_HEADER, true);
			curl_setopt($ch, CURLOPT_NOBODY, true);
			curl_setopt($ch, CURLOPT_CUSTOMREQUEST, 'GET');
			curl_setopt($ch, CURLOPT_RETURNTRANSFER, true); 
			curl_setopt($ch, CURLOPT_AUTOREFERER, true); 
			curl_setopt($ch,CURLOPT_COOKIE,$cookie);
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
			curl_setopt($ch,CURLOPT_COOKIE,$cookie);
			$ret = curl_exec($ch);
			curl_close($ch);
			$nullc = stristr($ret,"Set-Cookie");
			//获取不到Cookies则重试
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
			curl_setopt($ch,CURLOPT_COOKIE,$cookie);
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
			curl_setopt($ch,CURLOPT_COOKIE,$cookie);
			$ret = curl_exec($ch);
			curl_close($ch);
			}
			
			
			
			
			preg_match('/Set-Cookie:(.*);/iU',$ret,$str); //正则匹配
			$cookie = $str[1]; //获得COOKIE（SESSIONID）
			$cookie = trim($cookie);
			
			
			
			$ch = curl_init();
			curl_setopt($ch, CURLOPT_URL, "http://61.187.92.238:7778/pls/wwwbks/bks_xj.xjcx");
			curl_setopt($ch, CURLOPT_HEADER, 0);
			curl_setopt($ch, CURLOPT_RETURNTRANSFER, true); 
			curl_setopt($ch,CURLOPT_COOKIE,$cookie);
			$ret = curl_exec($ch);
			curl_close($ch);
			$nullc = stristr($ret,"目前库中");
			
			//获取不到则重试
			if (!$nullc)
			{
				$ch = curl_init();
				curl_setopt($ch, CURLOPT_URL, "http://61.187.92.238:7778/pls/wwwbks/bks_xj.xjcx");
				curl_setopt($ch, CURLOPT_HEADER, 0);
				curl_setopt($ch, CURLOPT_RETURNTRANSFER, true); 
				curl_setopt($ch,CURLOPT_COOKIE,$cookie);
				$ret = curl_exec($ch);
				curl_close($ch);
			}
			
			//姓名截取
			$ret = mb_convert_encoding($ret,'UTF-8','GBK');
			$st = -1;
			$n = 0;
			do{
				$st = strpos($ret, 'center', $st+1);
				$n++;
				if($n==8){
					break;
					}
			}while($st!==false);
			$st=$st+7;
			
			$ed = -1;
			$n = 0;
			do{
				$ed = strpos($ret, '</p></td>', $ed+1);
				$n++;
				if($n==4){
					break;
					}
			}while($ed!==false);
			if(($st==false||$ed==false)||$st>=$ed)
			{$realneme = 0;}else{
			$realname=substr($ret,($st+1),($ed-$st-1));}
		
		}
		
	}else{
	$status='-1';
	$msg="Username OR Password Error!";
	$realname="NULL";
	}
	//Json返回
	$response->withHeader('Content-type', 'application/json');
	$body = $response->getBody();
	$return=array ('status'=>$status,'msg'=>$msg,'username'=>$usr,'realname'=>$realname);
	$return=json_encode($return);
	$body->write($return);
	return $response;
});

$app->run();