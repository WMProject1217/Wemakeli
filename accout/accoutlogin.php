<?php //By WMProject1217
$filepath = "http://" . $_SERVER['HTTP_HOST'] . "/settings.wmst";
$websitesettings = fopen($filepath, "r") or die("<title>Error 0x00000001</title>Error 0x00000001<br>Website info load unsuccessful.");
$websitename = fgets($websitesettings);
$websiteaddress = fgets($websitesettings);
fclose($websitesettings);
echo "<head>";
echo "<title>登录_" . $websitename . "</title>";
include('../main/patterns/autoexec.php');
echo "</head>";
echo "<body>";
include('../main/patterns/topline.php');
echo "<table class=maindataindex>";
echo "<tr>";
echo "<td>";
echo "<a href='" . $websiteaddress . "/accoutcreate.php'>";
echo "<input name='注册新用户' type='button' class='accout_create' title='注册新用户' value='注册新用户'>";
echo "</a>";
echo "<br>";
echo "<form action='postlogin.php' method='POST'>";
echo "<label for='file'>账号:</label>";
echo "<input type='text' name='username' value=''>";
echo "<br>";
echo "<label for='file'>密码:</label>";
echo "<input type='text' name='userpassword' value=''>";
echo "<br>";
echo "<input type='submit' value='提交'>";
echo "</form>";
echo "</td>";
echo "</tr>";
echo "</table>";
echo "</body>";
?>