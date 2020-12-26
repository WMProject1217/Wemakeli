<?php //By WMProject1217
include('../config.php');
$wmui_classnow = "audio";
$wmui_title = $wmsys_name;
$wmui_jumpoffheadbar=1;
echo "<head>";
echo "<title>音频列表_" . $wmsys_name . "</title>";
include('../pattern/autoexec.php');
echo "</head>";
echo "<body>";
include('../pattern/topline.php');
echo "<table class='maindataindex'>";
echo "<tr>";
echo "<td>";
echo "<h3>音频列表</h3>";
echo "<pre>";
readfile('../main/wmst/audiolist.wmst');
echo "</pre>";
echo "</td>";
echo "</tr>";
echo "</table>";
echo "</body>";
include('../wmui/wmui.php');
?>