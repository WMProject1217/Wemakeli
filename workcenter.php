<?php //By WMProject1217
$filepath = "http://" . $_SERVER['HTTP_HOST'] . "/settings.wmst";
$websitesettings = fopen($filepath, "r") or die("<title>Error 0x00000001</title>Error 0x00000001<br>Website info load unsuccessful.");
$websitename = fgets($websitesettings);
$websiteaddress = fgets($websitesettings);
fclose($websitesettings);
echo "<head>";
echo "<title>创作中心_" . $websitename . "</title>";
echo "<link href='" . $websiteaddress . "/webicon.ico' rel='icon' type='image/ico'>";
echo "<link rel='stylesheet' href='" . $websiteaddress . "/autoexec.css'>";
echo "<script src='" . $websiteaddress . "/autoexec.js'></script>"; 
echo "<style>";
echo "pre { white-space: pre-wrap; word-wrap: break-word; }";
echo "</style>";
echo "</head>";
echo "<body>";
include('./main/patterns/topline.php');
