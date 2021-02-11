<?php //By WMProject1217
echo "<html>";
echo "<head>";
include('./config.php');
$wmui_classnow = "audio";
$wmui_title = "音频列表 - $wmsys_name";
$wmui_backpath = "../";
$wmui_jumpoffheadbar = "1";
echo "<title>$wmui_title</title>";
echo "</head>";
include("$wmsys_assetsr\wmui\wmuifirload.php");
echo "<h3>音频列表</h3>";
echo "<pre>";
$audioread = -1;
$audioendfile = @ fopen("./audioend.wmst", "r") or die("<title>Error 0x00000007</title>Error 0x00000007<br>Page data load unsuccessful.");
$audioendun = @ fgets($audioendfile);
@ fclose($audioendfile);
$audioendsplit = explode(';',$audioendun);
$audioend = $audioendsplit[0];
while ($audioread<>$audioend) {
    $audioinfofile = @ fopen("./wa$audioread/info.wmst", "r");
    $title = @ fgets($audioinfofile);
    $outputtime = @ fgets($audioinfofile);
    $uploadmaster = @ fgets($audioinfofile);
    $audionumber= @ fgets($audioinfofile);
    @ fclose($audioinfofile);
    $audionumber = str_replace(array("\r\n", "\r", "\n"), "", $audionumber);
    $title = str_replace(array("\r\n", "\r", "\n"), "", $title);  
    $outputtime = str_replace(array("\r\n", "\r", "\n"), "", $outputtime);  
    $uploadmaster = str_replace(array("\r\n", "\r", "\n"), "", $uploadmaster);  
    if ($outputtime=="") {
        goto offechooutline;
    }
    echo "<a href='/audio/$audionumber/'>[wa$audioread]    $title [$outputtime][$uploadmaster]</a><br>";
    offechooutline:
    $audioread = $audioread + 1;
}
echo "</pre>";
include("$wmsys_assetsr\wmui\wmuilasload.php");
?>