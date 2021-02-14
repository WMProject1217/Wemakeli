<?php //By WMProject1217
echo "<html>";
echo "<head>";
include('../config.php');
$wmui_classnow = "logon";
$wmui_title = "登录 - $wmsys_name";
$wmui_backpath = "../";
//$wmui_opacityui = 1;
echo "<title>$wmui_title</title>";
echo "</head>";
include("$wmsys_assetsr\wmui\wmuifirload.php");
/*
echo "肥肠抱歉，此页面暂时遇到鸡术问题，请稍后再藏试访问<br><h3>调试信息</h3>";
echo "页面Tag : 登录 - Wemakeli<br>";
echo "POST 数据<br>";
echo "username : " . $_POST['username'] . "<br>";
echo "password : " . $_POST['password'] . "<br>";
echo "backpath : " . $_POST['backpath'] . "<br>";
echo "用户数据<br>";
echo "用户端应用程序 : " . $_SERVER['HTTP_USER_AGENT'] . "<br>";
echo "用户访问时 IP : " .  $_SERVER['REMOTE_ADDR'] . "<br>";
echo "用户访问时端口 : " .  $_SERVER['REMOTE_PORT'] . "<br>";
echo "用户页面跳转 : " .  $_SERVER['HTTP_REFERER'] . "<br>";
echo "错误代码<br>";
echo "<b>Fatal error</b>:  Uncaught Error: Call to undefined function logonofuser() in C:\Wemakeli\account\postlogon.php:14
Stack trace:
#0 {main}
  thrown in <b>C:\Wemakeli\account\postlogon.php</b> on line <b>114514</b><br>";
  */
echo "肥肠抱歉，此页面暂时遇到鸡术问题，密码校验舞法执行，蒸菜修复此页面，在此之前将会纸接登录<br>";
setcookie("username",$_POST['username'],time()+16777215,'/');
setcookie("useraccout",$_POST['username'],time()+16777215,'/');
setcookie("useruid","-1",time()+16777215,'/');
echo "<a href='" . $_POST['backpath'] . "'>如果浏览器未响应，请单击此处</a>";
//echo "<meta http-equiv='refresh' content=0;url='" . $_POST['backpath'] . "'>";
include("$wmsys_assetsr\wmui\wmuilasload.php");
//echo "<div class='wmuibackgrounda'></div>";
echo "<script>window.onload=function(){";
echo "WMUIHeadbarNowTimeSC();";
echo "setInterval('WMUIHeadbarNowTimeSC()',256);";
echo "}</script>";
?>