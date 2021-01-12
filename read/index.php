<?php //By WMProject1217
include('../config.php');
$wmui_classnow = "read";
$wmui_title = $wmsys_name;
$wmui_jumpoffheadbar=1;
echo "<head>";
echo "<script src='$wmsys_sysroot/main/js/jquery-3.4.1.min.js'></script>";
echo "<script src='$wmsys_sysroot/main/js/wmui.js'></script>";
echo "<title>专栏列表_" . $wmsys_name . "</title>";
echo "</head>";
echo "<body>";
echo "<table class='maindataindex'>";
echo "<tr>";
echo "<td>";
echo "<h3>专栏列表</h3>";
echo "<pre>";
readfile('../main/wmst/readlist.wmst');
echo "</pre>";
echo "</td>";
echo "</tr>";
echo "</table>";
echo "</body>";
include('../wmui/wmui.php');
?>