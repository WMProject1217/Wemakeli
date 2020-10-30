<?php  //By WMProject1217
$filepath = "http://" . $_SERVER['HTTP_HOST'] . "/settings.wmst";
$websitesettings = fopen($filepath, "r") or die("<title>Error 0x00000001</title>Error 0x00000001<br>Website info load unsuccessful.");
$websitename = fgets($websitesettings);
$websiteaddress = fgets($websitesettings);
fclose($websitesettings);
header ("content-type: text/html; charset=utf-8");
$file=$_FILES["file"]["tmp_name"];
$filename=$_FILES["file"]["name"];
$path="../temp/video/";
$res=move_uploaded_file($file, $path.$filename);
if($res){
echo "文件上传成功:" . $path . $filename;
$title = $_POST['title'];
$timenowh=date("H");
$timenowm=date("i");
$timenows=date("s");
$username = $_COOKIE["username"];
$text=$title . "\n" . date("Y-m-d") . "   " .  $timenowh . ":" .  $timenowm . ":" .  $timenows . "\n" . $username ;
$filename = fopen("$path" . "$filename.wmst", "w");
fwrite($filename, $text);
echo "<br>";
echo "<a href='" . $websiteaddress . "'>";
echo "<input name='返回主页' type='button' id='topline_websitename' title='返回主页' value='返回主页'>";
echo "</a>";
}else{
echo "上传文件失败";
echo "<br>";
echo "<a href='" . $websiteaddress . "'>";
echo "<input name='返回主页' type='button' id='topline_websitename' title='返回主页' value='返回主页'>";
echo "</a>";
}
?>