<?php
/*
*程序技术支持QQ：878816630
*/
session_start();//开启session
$randval;
for($i = 0; $i<4; $i++){
    //产生A-Z之间的ASCII随机数
    $randstr = mt_rand(ord('A'), ord('Z'));//ord($str)返回字符的ASCII
    $randv = mt_rand(0, 10);//包括0和10
    global $randval;
    //产生0-9之间的随机数
    if($randv % 2 == 0){//如果是偶数,连接数字
        $randval .= mt_rand(0, 9);
    }else{//否则奇数连接字符,用chr获取
        $randval .= chr($randstr);//chr()返回相对应于 ascii 所指定的单个字符。 
    }
}
$_SESSION["randval"] = $randval;
$intheight = 18;//验证码背景图的高
$intwidth = 51;//验证码背景图的宽,可相应修改
$img = imagecreatetruecolor($intwidth, $intheight);
$fontcolor = imagecolorallocate($img, 255, 0, 0);
$backcolor = imagecolorallocate($img, 255, 255, 255);
imagefill($img, 0, 0, $backcolor);
//画线
//imageline($img, mt_rand(0,$intwidth/3), mt_rand(0,$intheight/3), mt_rand($intwidth/3,$intwidth), mt_rand($intheight/3,$intheight), $fontcolor);
//imageline($img, mt_rand($intwidth/3, $intwidth), mt_rand(0, $intheight/3), mt_rand(0, $intwidth/3), mt_rand(0, $intheight/3), $fontcolor);
//添加img里边的文字信息
imagestring($img, 10, mt_rand(0, $intwidth - strlen($randval) * 10), mt_rand(0, $intheight-15), $randval, $fontcolor);
imagegif($img);
imagedestroy($img);
?>



