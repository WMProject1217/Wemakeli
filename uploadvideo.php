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
echo "<title>上传视频_" . $websitename . "</title>";
echo "<link href='" . $websiteaddress . "/webicon.ico' rel='icon' type='image/ico'>";
echo "<script src='" . $websiteaddress . "/autoexec.js'></script>"; 
echo "<link rel='stylesheet' href='" . $websiteaddress . "/autoexec.css'>";
echo "<meta charset='UTF-8'>";
echo "<style>";
echo "pre { white-space: pre-wrap; word-wrap: break-word; }";
echo "</style>";
echo "</head>";

include('./main/patterns/topline.php');
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
</body>
</html>