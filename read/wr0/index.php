<?php //By WMProject1217
$filepath = "http://" . $_SERVER['HTTP_HOST'] . "/settings.wmst";
$websitesettings = @ fopen($filepath, "r") or die("<title>Error 0x00000001</title>Error 0x00000001<br>Website info load unsuccessful.");
$websitename = fgets($websitesettings);
$websiteaddress = fgets($websitesettings);
fclose($websitesettings);
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
echo "<title>" . $title . "_" . $websitename . "</title>";
echo "<link href='" . $websiteaddress . "/webicon.ico' rel='icon' type='image/ico'>";
echo "<link rel='stylesheet' href='" . $websiteaddress . "/autoexec.css'>";
echo "<script src='" . $websiteaddress . "/autoexec.js'></script>";
echo "<style>";
echo "pre { white-space: pre-wrap; word-wrap: break-word; }";
echo "</style>";
echo "</head>";
echo "<body>";
echo "</head>";
echo "<body>";
include('../patterns/topline.php');
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
    echo "<input type='text' name='usertalk' value=''>";
    echo "<input type='submit' value='提交'>";
    echo "</form>";
    @ include('talk.php');
    echo "</td>";
    echo "</tr>";
    echo "</table>";
    echo "</body>";
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
    echo "</body>";
  }
?>