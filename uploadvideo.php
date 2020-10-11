<?php //By WMProject1217
$filepath = "http://" . $_SERVER['HTTP_HOST'] . "/settings.wmst";
$websitesettings = fopen($filepath, "r") or die("<title>Error 0x00000001</title>Error 0x00000001<br>Website info load unsuccessful.");
$websitename = fgets($websitesettings);
$websiteaddress = fgets($websitesettings);
fclose($websitesettings);
?>
<!DOCTYPE html>
<html>
<?php
echo "<head>";
echo "<title>投稿视频_" . $websitename . "</title>";
include('./main/patterns/autoexec.php');
echo "</head>";
echo "<body>";
include('./main/patterns/topline.php');
echo "<table border='1' id=maindataindex>";
echo "<tr>";
echo "<td class='maindata'>";
?>

<body>

<form action="postuploadvideo.php" method="post"
enctype="multipart/form-data">
<label for="file">选择视频文件:</label>
<input type="file" name="file" id="file"> 
<br>
<label for="file">输入视频名称:</label>
<input type='text' name='title' value=''>
<br>
<input type="submit" name="submit" value="确定">
</form>

<br>
<div>视频文件要求</div>
<div>编码类型:avc1</div>
<div>最大时长:10小时</div>
<div>建议帧率:30FPS</div>
<div>建议分辨率:1280x720</div>
<div>最高平均码率:40000kbps</div>
<br>
<div></div>
<br>
<?php
echo "</td>";
echo "</tr>";
echo "</table>";
echo "</body>";
?>
</html>