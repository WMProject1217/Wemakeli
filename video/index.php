<?php //By WMProject1217
include('../config.php');
$wmui_classnow = "video";
$wmui_title = $wmsys_name;
$wmui_jumpoffheadbar=1;
echo "<head>";
echo "<title>视频列表_" . $wmsys_name . "</title>";
echo "</head>";
echo "<body>";
echo "<table class='maindataindex'>";
echo "<tr>";
echo "<td>";
echo "<h3>视频列表</h3>";
echo "<pre>";
readfile('../main/wmst/videolist.wmst');
echo "</pre>";
echo "</td>";
echo "</tr>";
echo "</table>";
echo "</body>";
include('../wmui/wmui.php');
?>