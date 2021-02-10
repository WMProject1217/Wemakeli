<?php //By WMProject1217
echo "<html>";
include('../config.php');
$wmui_backpath='../';
$wmui_classnow='read';
$wmui_jumpoffheadbar='1';
$readinfofile = @ fopen("info.wmst", "r") or die("<title>Error 0x00000002</title>Error 0x00000002<br>Read info load unsuccessful.");
$title = fgets($readinfofile);
$outputtime = fgets($readinfofile);
$uploadmaster = fgets($readinfofile);
$readnumber= fgets($readinfofile);
fclose($readinfofile);
$countfile = @ fopen("count.wmst", "r");
$playnumber=fgets($countfile);
$playnumber = $playnumber + 1;
fclose($countfile);
$countfile = @ fopen("count.wmst", "w");
fwrite($countfile,$playnumber);
fclose($countfile);
echo "<head>";
echo "<script src='$wmsys_sysroot/main/js/wmui.js'></script>";
echo "<title>$title - $wmsys_name</title>";
echo "</head>";
include("$wmsys_assetsr\wmui\wmuifirload.php");
echo "<h3>" . $title . "</h3>";
echo "<div>" . $outputtime . " , " . $readnumber . " , 阅读 " . $playnumber . " , UP : " . $uploadmaster . "</div>";
echo "<pre>";
readfile("text.txt");
echo "</pre>";
//td.talk
if (isset($_COOKIE["username"])){
    echo "<table border='1'>";
    echo "<tr>";
    echo "<td class='talk'>";
    echo "<div>评论区</div>";
    echo "<form action='posttalk.php' method='POST'>";
    echo "<textarea style='OVERFLOW:  Visble' name='usertalk' value='' class='talkboxinput'></textarea>";
    echo "<input type='submit' value='提交'>";
    echo "</form>";
    @ include('talk.php');
    echo "</td>";
    echo "</tr>";
    echo "</table>";
    include("$wmsys_assetsr\wmui\wmuilasload.php");
  }else{
    echo "<table border='1'>";
    echo "<tr>";
    echo "<td class='talk'>";
    echo "<div>评论区</div>";
    echo "你必须登录才能发表评论。";
    @ include('talk.php');
    echo "</td>";
    echo "</tr>";
    echo "</table>";
    include("$wmsys_assetsr\wmui\wmuilasload.php");
  }
?>