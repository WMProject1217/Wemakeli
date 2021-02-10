<?php //By WMProject1217
//Main Page
echo "<html>";
echo "<head>";
include('../config.php');
$wmui_classnow = "logon";
$wmui_title = "登录 - $wmsys_name";
$wmui_backpath = "../";
echo "<title>$wmui_title</title>";
echo "</head>";
include("$wmsys_assetsr\wmui\wmuifirload.php");
echo "<div class='wmuibackgrounda'></div>";
echo "<script>window.onload=function(){";
echo "WMUIHeadbarNowTimeSC();";
echo "setInterval('WMUIHeadbarNowTimeSC()',256);";
echo "}</script>";
?>
<script>
x = NowTimeSC();
console.log('Load Time : '+x);
</script>
<?php
include("$wmsys_assetsr\wmui\wmuilasload.php");
?>