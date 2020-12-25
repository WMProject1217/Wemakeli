<?php //By WMProject1217
include('./patterns/autoexec.php');
echo "<head>";
echo "<title>注册_" . $websitename . "</title>";
echo "</head>";
include('./patterns/topline.php');
echo "<table class=maindataindex>";
echo "<tr>";
echo "<td>";
echo "<a href='" . $websiteaddress . "/accout/accoutlogin.php'>";
echo "<input name='登录已有用户' type='button' id='accout_login' title='登录已有用户' value='登录已有用户'>";
echo "</a>";
echo "<br>";
echo "<form action='postnewuser.php' method='POST'>";
echo "<label for='file'>账号:</label>";
echo "<input type='text' name='username' value=''>";
echo "<br>";
echo "<label for='file'>密码:</label>";
echo "<input type='text' name='password' value=''>";
echo "<br>";
echo "<input type='submit' value='提交'>";
echo "</form>";
echo "</td>";
echo "</tr>";
echo "</table>";
echo "</body>";
?>