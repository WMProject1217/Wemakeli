<?php //By WMProject1217
$filepath = "http://" . $_SERVER['HTTP_HOST'] . "/settings.wmst";
$websitesettings = fopen($filepath, "r") or die("<title>Error 0x00000001</title>Error 0x00000001<br>Website info load unsuccessful.");
$websitename = fgets($websitesettings);
$websiteaddress = fgets($websitesettings);
fclose($websitesettings);
echo "<head>";
echo "<title>注册_" . $websitename . "</title>";
include('./main/patterns/autoexec.php');
echo "</head>";
include('./main/patterns/topline.php');
echo "<table border='1' id=maindataindex>";
echo "<tr>";
echo "<td class='MESSAGE'>";
echo "<a href='" . $websiteaddress . "/accoutlogin.php'>";
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