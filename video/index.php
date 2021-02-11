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
$videoread = -1;
$videoendfile = @ fopen("./videoend.wmst", "r") or die("<title>Error 0x00000007</title>Error 0x00000007<br>Page data load unsuccessful.");
$videoendun = @ fgets($videoendfile);
@ fclose($videoendfile);
$videoendsplit = explode(';',$videoendun);
$videoend = $videoendsplit[0];
while ($videoread<>$videoend) {
    $videoinfofile = @ fopen("./wv$videoread/info.wmst", "r");
    $title = @ fgets($videoinfofile);
    $outputtime = @ fgets($videoinfofile);
    $uploadmaster = @ fgets($videoinfofile);
    $videonumber= @ fgets($videoinfofile);
    @ fclose($videoinfofile);
    $videonumber = str_replace(array("\r\n", "\r", "\n"), "", $videonumber);
    $title = str_replace(array("\r\n", "\r", "\n"), "", $title);  
    $outputtime = str_replace(array("\r\n", "\r", "\n"), "", $outputtime);  
    $uploadmaster = str_replace(array("\r\n", "\r", "\n"), "", $uploadmaster);  
    if ($outputtime=="") {
        goto offechooutline;
    }
    echo "<a href='/video/$videonumber/'>[wv$videoread]    $title [$outputtime][$uploadmaster]</a><br>";
    offechooutline:
    $videoread = $videoread + 1;
}
echo "</pre>";
include("$wmsys_assetsr\wmui\wmuilasload.php");
?>