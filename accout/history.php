<?php //By WMProject1217
$filepath = "http://" . $_SERVER['HTTP_HOST'] . "/settings.wmst";
$websitesettings = fopen($filepath, "r") or die("<title>Error 0x00000001</title>Error 0x00000001<br>Website info load unsuccessful.");
$websitename = fgets($websitesettings);
$websiteaddress = fgets($websitesettings);
fclose($websitesettings);
echo "<head>";
echo "<title>历史_" . $websitename . "</title>";
include('../main/patterns/autoexec.php');
echo "</head>";
echo "<body>";
include('../main/patterns/topline.php');
echo "<table class=maindataindex>";
echo "<tr>";
echo "<td>";

echo "<table>";
echo "<tr>";
echo "<td>";
echo "On writing codes";
echo "</td>";
echo "</tr>";
echo "</table>";

echo "</td>";
echo "</tr>";
echo "</table>";
echo "</body>";
?>