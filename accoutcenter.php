<?php //By WMProject1217
$filepath = "http://" . $_SERVER['HTTP_HOST'] . "/settings.wmst";
$websitesettings = fopen($filepath, "r") or die("<title>Error 0x00000001</title>Error 0x00000001<br>Website info load unsuccessful.");
$websitename = fgets($websitesettings);
$websiteaddress = fgets($websitesettings);
fclose($websitesettings);
echo "<head>";
echo "<title>用户中心_" . $websitename . "</title>";
echo "<link href='" . $websiteaddress . "/webicon.ico' rel='icon' type='image/ico'>";
echo "<link rel='stylesheet' href='" . $websiteaddress . "/autoexec.css'>";
echo "<script src='" . $websiteaddress . "/autoexec.js'></script>"; 
echo "<style>";
echo "pre { white-space: pre-wrap; word-wrap: break-word; }";
echo "</style>";
echo "</head>";
echo "<body>";
include('./main/patterns/topline.php');

//td.warning
echo "<table border='1'>";
echo "<tr>";
echo "<td class='MESSAGE'>";
echo "<h3>Warning</h3>";
echo "当前网站无法保留用户数据<br>";
echo "当前网站无法加密任何数据<br>";
echo "当前网站无法自动设置权限<br>";
echo "当前无法使用此页面<br>";
echo "Error 0x00000027<br>";
echo "</td>";
echo "</tr>";
echo "</table>";