<?php //By WMProject1217
include('./config.php');
echo "<head>";
echo "<title>专栏列表_" . $wmsys_name . "</title>";
include('../pattern/autoexec.php');
echo "</head>";
echo "<body>";
include('../pattern/topline.php');
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
?>