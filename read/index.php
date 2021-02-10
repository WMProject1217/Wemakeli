<?php //By WMProject1217
echo "<html>";
echo "<head>";
include('./config.php');
$wmui_classnow = "read";
$wmui_title = "专栏列表 - $wmsys_name";
$wmui_backpath = "../";
$wmui_jumpoffheadbar = "1";
echo "<title>$wmui_title</title>";
echo "</head>";
include("$wmsys_assetsr\wmui\wmuifirload.php");
echo "<h3>专栏列表</h3>";
echo "<pre>";
$readread = -1;
$readendfile = @ fopen("./readend.wmst", "r") or die("<title>Error 0x00000007</title>Error 0x00000007<br>Page data load unsuccessful.");
$readendun = fgets($readendfile);
fclose($readendfile);
$readendsplit = explode(';',$readendun);
$readend = $readendsplit[0];
while ($readread<>$readend) {
    $readinfofile = @ fopen("./wr$readread/info.wmst", "r");
    $title = @ fgets($readinfofile);
    $outputtime = @ fgets($readinfofile);
    $uploadmaster = @ fgets($readinfofile);
    $readnumber= @ fgets($readinfofile);
    @ fclose($readinfofile);
    $readnumber = str_replace(array("\r\n", "\r", "\n"), "", $readnumber);
    $title = str_replace(array("\r\n", "\r", "\n"), "", $title);  
    $outputtime = str_replace(array("\r\n", "\r", "\n"), "", $outputtime);  
    $uploadmaster = str_replace(array("\r\n", "\r", "\n"), "", $uploadmaster);  
    if ($outputtime=="") {
        goto offechooutline;
    }
    echo "<a href='/read/$readnumber/'>[wr$readread]    $title [$outputtime][$uploadmaster]</a><br>";
    offechooutline:
    $readread = $readread + 1;
}
echo "</pre>";
include("$wmsys_assetsr\wmui\wmuilasload.php");
?>