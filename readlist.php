<?php //By WMProject1217
$filepath = "http://" . $_SERVER['HTTP_HOST'] . "/settings.wmst";
$websitesettings = fopen($filepath, "r") or die("<title>Error 0x00000001</title>Error 0x00000001<br>Website info load unsuccessful.");
$websitename = fgets($websitesettings);
$websiteaddress = fgets($websitesettings);
fclose($websitesettings);
echo "<head>";
echo "<title>专栏列表_" . $websitename . "</title>";
include('./main/patterns/autoexec.php');
echo "</head>";
echo "<body>";
include('./main/patterns/topline.php');
echo "<table border='1' id=maindataindex>";
echo "<tr>";
echo "<td class='maindata'>";
echo "<h3>专栏列表</h3>";
echo "<pre>";
readfile('./main/wmst/readlist.wmst');
echo "</pre>";
echo "</td>";
echo "</tr>";
echo "</table>";
echo "</body>";
?>