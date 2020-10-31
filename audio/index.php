<?php //By WMProject1217
$audiolabel=$_GET['audio'];
$filepath = "../settings.wmst";
$websitesettings = @ fopen($filepath, "r") or die("<title>Error 0x00000001</title>Error 0x00000001<br>Website info load unsuccessful.");
$websitename = fgets($websitesettings);
$websiteaddress = fgets($websitesettings);
fclose($websitesettings);
$audioinfofile = @ fopen("./$audiolabel/info.wmst", "r") or die("<title>Error 0x00000002</title>Error 0x00000002<br>Audio info load unsuccessful.");
$title = fgets($audioinfofile);
$outputtime = fgets($audioinfofile);
$uploadmaster = fgets($audioinfofile);
$audionumber= fgets($audioinfofile);
fclose($audioinfofile);
$countfile = @ fopen("./$audiolabel/count.wmst", "r");
$playnumber=fgets($countfile);
$playnumber = $playnumber + 1;
fclose($countfile);
$countfile = @ fopen("./$audiolabel/count.wmst", "w");
fwrite($countfile,$playnumber);
fclose($countfile);
echo "<head>";
echo "<title>" . $title . "_" . $websitename . "</title>";
include('./patterns/autoexec.php');
echo "</head>";
echo "<body>";
include('./patterns/topline.php');
echo "<table class='maindataindex'>";
echo "<tr>";
echo "<td>";
echo "<h3>" . $title . "</h3>";
echo "<div>" . $outputtime . " , " . $audionumber . " , 播放 " . $playnumber . " , UP : " . $uploadmaster . "</div>";
echo "<audio controls>";
echo "<source src='./$audiolabel/audio.wav' />";
echo "</audio>";
//td.talk
if (isset($_COOKIE["username"])){
    echo "<table>";
    echo "<tr>";
    echo "<td class='talk'>";
    echo "<div>评论区</div>";
    echo "<form action='./$audiolabel/posttalk.php' method='POST'>";
    echo "<textarea style='OVERFLOW:  Visble' name='usertalk' value='' class='talkboxinput'></textarea>";
    echo "<input type='submit' value='提交'>";
    echo "</form>";
    @ include("./$audiolabel/talk.php");
    echo "</td>";
    echo "</tr>";
    echo "</table>";
    echo "</td>";
    echo "</tr>";
    echo "</table>";
    echo "</body>";
  }else{
    echo "<table>";
    echo "<tr>";
    echo "<td class='talk'>";
    echo "<div>评论区</div>";
    echo "你必须登录才能发表评论。";
    @ include("./$audiolabel/talk.php");
    echo "</td>";
    echo "</tr>";
    echo "</table>";
    echo "</td>";
    echo "</tr>";
    echo "</table>";
    echo "</body>";
  }
?>
