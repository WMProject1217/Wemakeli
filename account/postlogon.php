<?php
echo "肥肠抱歉，此页面暂时遇到鸡术问题，请稍后再藏试访问<br><h3>调试信息</h3>";
echo "页面Tag : 登录 - Wemakeli<br>";
echo "POST 数据<br>";
echo "username : " . $_POST['username'] . "<br>";
echo "password : " . $_POST['password'] . "<br>";
echo "用户数据<br>";
echo "用户端应用程序 : " . $_SERVER['HTTP_USER_AGENT'] . "<br>";
echo "用户访问时 IP : " .  $_SERVER['REMOTE_ADDR'] . "<br>";
echo "用户访问时端口 : " .  $_SERVER['REMOTE_PORT'] . "<br>";
echo "用户页面跳转 : " .  $_SERVER['HTTP_REFERER'] . "<br>";
?>