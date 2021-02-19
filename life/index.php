<?php //By WMProject1217
include('./config.php');
$wmui_classnow = "life";
$wmui_title = "生活 - $wmsys_name";
$wmui_backpath = "../";
echo "<title>$wmui_title</title>";
echo "</head>";
include("$wmsys_assetsr\wmui\wmuifirload.php");
?>
<h3>生活</h3>
[狗头]
<a href='./yuzu/'>合成大柚子</a><br>
[狗头]
<a href='./wm00/'>[WM00] Retworld for PHP</a><br>
<?php
include("$wmsys_assetsr\wmui\wmuilasload.php");
echo "<script>window.onload=function(){";
echo "WMUIHeadbarNowTimeSC();";
echo "setInterval('WMUIHeadbarNowTimeSC()',256);";
echo "}</script>";
?>