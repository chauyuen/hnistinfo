<?php
////////////////////////////////////////
// 单词库类
////////////////////////////////////////
$img_width = 400;
//输出图片寛(px)
$img_height = 100;
//输出图片高(px)
$img_padding = 45;
//输出字体距离(px)
$t_fontsize = 20;
//输出字体大小(px)
$fontfamily = 'BOOKOS.TTF';
//输出的字体名
$img_pct = 40;
//色彩鲜艳

$cookie_name = 'SESSIONID';
$s_img_text = '';
$s = array('Canon','MP288','Pelikan','LAMY','SAFARI','Huawei','HG255D','F516','Zigzag','Twitter','Facebook','Virtual','Server','HongKong','Dillydally','YEPCDN','VPS5C');
//单词库
$string_array = array_merge($s);
shuffle($string_array);
$img_text = $string_array;
$img_text_len = '1';

$img_width_i = (int)($img_width - $img_padding*4)/$img_text_len;

$img_paddingx = $img_padding;
$img_paddingy = $img_height-$img_padding;

$im = imagecreatetruecolor($img_width,$img_height);
$im1 = imagecreatetruecolor($img_width,$img_height);

$c_white = imagecolorallocate($im, 255, 255, 255);
$c1_white = imagecolorallocate($im1, 255, 255, 255);

$rand_r = mt_rand(0,255);
$rand_g = mt_rand(0,255);
$rand_b = mt_rand(0,255);
$c_rand = imagecolorallocate($im1,$rand_r,$rand_g,$rand_b);
imagefilledrectangle($im,0,0,$img_width,$img_height,$c_white);
imagefilledrectangle($im1,0,0,$img_width,$img_height,$c_rand);

for($img_i=0;$img_i<$img_text_len;$img_i++){

        $rand_r = mt_rand(0,255);
        $rand_g = mt_rand(0,255);
        $rand_b = mt_rand(0,255);
        $c_rand = imagecolorallocate($im,$rand_r,$rand_g,$rand_b);

        $rand_angle = mt_rand(345,370);
        imagettftext($im, $t_fontsize, $rand_angle, $img_paddingx+($img_width_i*$img_i), $img_paddingy, $c_rand, $fontfamily, $img_text[$img_i]);

        $rand_r = mt_rand(0,255);
        $rand_g = mt_rand(0,255);
        $rand_b = mt_rand(0,255);
        $c_rand = imagecolorallocate($im1, $rand_r, $rand_g, $rand_b);

        $im1_i = (int)$img_height/$img_text_len;

        imagefilledrectangle($im1,0,mt_rand($im1_i*$img_i,$im1_i*($img_i+1)),$img_width,$img_height,$c_rand);

        $s_img_text .= $img_text[$img_i];

}

imagecopymerge($im,$im1,0,0,0,0,$img_width,$img_height,$img_pct);

header("Expires: Sat, 1 Jan 2000 08:00:00 GMT");
header("Cache-Control: no-store, no-cache, must-revalidate");   // HTTP/1.1
header("Cache-Control: post-check=0, pre-check=0", false);      // HTTP/1.0
header("Pragma: no-cache");
header("Content-type: image/png");

imagepng($im);
imagedestroy($im);
imagedestroy($im1);


setcookie($cookie_name,md5(strtolower($s_img_text)),time()+3600,"/");
?>
