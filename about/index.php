<?php //By WMProject1217
include('../config.php');
$wmui_classnow = "about";
$wmui_title = "关于 - " . $wmsys_name;
$wmui_backpath = "../";
echo "<table class='pagedatamain'>";
echo "<tr>";
echo "<td>";
echo "<h3>$wmsys_name</h3>";
echo "<pre>";
readfile('./about.wmexsr');
echo "</pre>";
echo "<h3>开发日志</h3>";
readfile("../main/txt/mainmsg.txt");
include('../wmui/wmui.php');
echo "</td>";
echo "</tr>";
echo "</table>";

?>