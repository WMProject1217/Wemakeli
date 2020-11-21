<?php //By WMProject1217
$filepath = "http://" . $_SERVER['HTTP_HOST'] . "/settings.wmst";
$websitesettings = fopen($filepath, "r") or die("<title>Error 0x00000001</title>Error 0x00000001<br>Website info load unsuccessful.");
$websitename = fgets($websitesettings);
$websiteaddress = fgets($websitesettings);
fclose($websitesettings);


echo "<link rel='stylesheet' href='" . $websiteaddress . "/main/live2d-widget/font-awesome.min.css'>";
echo "<script src='" . $websiteaddress . "/main/js/autoexec.js'></script>"; 
echo "<link rel='stylesheet' href='" . $websiteaddress . "/main/css/autoexec.css'>";
echo "<script src='" . $websiteaddress . "/main/live2d-widget/autoload.js'></script>";
echo "<link href='" . $websiteaddress . "/webicon.ico' rel='icon' type='image/ico'>";
echo "<style>";
echo "pre { white-space: pre-wrap; word-wrap: break-word; }";
echo "</style>";
?>