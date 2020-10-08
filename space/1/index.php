<?php
$userinfofile = @ fopen("userinfo.wmst", "r") or die("<title>Error 0x00000002</title>Error 0x00000002<br>Video info load unsuccessful.");
$useraccout = fgets($userinfofile);
$username = fgets($userinfofile);
$addintime = fgets($userinfofile);
$userid= fgets($userinfofile);
fclose($userinfofile);
$userspacesettings = @ fopen("space.wmst", "r") or die("<title>Error 0x00000002</title>Error 0x00000002<br>Video info load unsuccessful.");
$visitcontrol = fgets($userspacesettings);
$indexwords = fgets($userspacesettings);
$userimage = fgets($userspacesettings);
fclose($userspacesettings);

echo "<head>";
include('../patterns/autoexec.php');

echo "<title>" . $username . "_" . $websitename . "</title>";
echo "</head>";
echo "<body>";
include('../patterns/topline.php');
echo "<table border='1' id='maindataindex'>";
echo "<tr>";
echo "<td class='maindata'>";
echo "";
echo "<img src='$userimage' id='userimage'></img>";
echo "<h3>$username</h3>";
echo "<div>入站时间 : $addintime , uid : $userid</div>";
echo "<div>$indexwords</div>";
echo "<pre>";
readfile('output.wmst');
echo "</pre>";
echo "</td>";
echo "</tr>";
echo "</table>";
echo "</body>";
?>