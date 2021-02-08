<?php //By WMProject1217
echo "<html>";
echo "<head>";
include('./config.php');
$wmui_classnow = "video";
$wmui_title = "视频列表 - $wmsys_name";
$wmui_backpath = "../";
$wmui_jumpoffheadbar = "1";
echo "<title>$wmui_title</title>";
echo "</head>";
include("$wmsys_assetsr\wmui\wmuifirload.php");
echo "<h3>视频列表</h3>";
echo "<pre>";
readfile("$wmsys_dbrootw\wmst" . '\videolist.wmst');
echo "</pre>";
include("$wmsys_assetsr\wmui\wmuilasload.php");
?>