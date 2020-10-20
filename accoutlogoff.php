<?php
echo setcookie("username", "", time()-3600);
echo setcookie("useraccout","",time()-3600,'/');
echo setcookie("useruid","",time()-3600,'/');
echo setcookie("userpassword","",time()-3600,'/');
echo "已注销账号，如果浏览器未响应，请<a href='./index.php'>单击此处</a>";
echo "<meta http-equiv='refresh' content=1;url='index.php'>";
?>
