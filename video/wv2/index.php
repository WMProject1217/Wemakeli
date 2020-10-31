<?php //by WMProject1217
echo "<!DOCTYPE html>";
echo "<html>";
$websiteroot = rtrim(str_replace('\\','/', $_SERVER['DOCUMENT_ROOT']), '/');
$filepath = "$websiteroot/settings.wmst";
$websitesettings = @ fopen($filepath, "r") or die("<title>Error 0x00000001</title>Error 0x00000001<br>Website info load unsuccessful.");
$websitename = fgets($websitesettings);
$websiteaddress = fgets($websitesettings);
fclose($websitesettings);
$videoinfofile = @ fopen("./info.wmst", "r") or die("<title>Error 0x00000002</title>Error 0x00000002<br>Video info load unsuccessful.");
$title = fgets($videoinfofile);
$outputtime = fgets($videoinfofile);
$uploadmaster = fgets($videoinfofile);
$videonumber= fgets($videoinfofile);
fclose($videoinfofile);
$countfile = @ fopen("./$videolabel/count.wmst", "r");
$playnumber=fgets($countfile);
$playnumber = $playnumber + 1;
fclose($countfile);
$countfile = @ fopen("./$videolabel/count.wmst", "w");
fwrite($countfile,$playnumber);
fclose($countfile);
$danmakufile =@ fopen("./$videolabel/danmaku.wml", "r");
$danmakudata=@ fread($danmakufile,filesize("./$videolabel/danmaku.wml"));
$danmakunumber=substr_count($danmakudata,"\n");
fclose($danmakufile);
echo "<head>";
echo "<title>" . $title . "_" . $websitename . "</title>";
include('../patterns/autoexec.php');
echo "<link href='$websiteaddress/main/css/scojs.css' rel='stylesheet'>";
echo "<link href='$websiteaddress/main/css/colpick.css' rel='stylesheet'>";
echo "<link href='$websiteaddress/main/css/bootstrap.css' rel='stylesheet'>";
echo "<link rel='stylesheet' href='$websiteaddress/main/css/main.css'>";
echo "</head>";
echo "<body>";
include('../patterns/topline.php');
echo "<table class='maindataindex'>";
echo "<tr>";
echo "<td>";
echo "<h3>" . $title . "</h3>";
echo "<div>" . $outputtime . " , " . $videonumber . " , 播放 " . $playnumber . " , 弹幕 " . $danmakunumber . " , UP : " . $uploadmaster . "</div>";
?>
<div id="danmup" style="left: 50%;margin-left:-400px;top:100px">


</div>
<div style="display: none">
  <span class="glyphicon" aria-hidden="true">&#xe072</span>
  <span class="glyphicon" aria-hidden="true">&#xe073</span>
  <span class="glyphicon" aria-hidden="true">&#xe242</span>
  <span class="glyphicon" aria-hidden="true">&#xe115</span>
  <span class="glyphicon" aria-hidden="true">&#xe111</span>
  <span class="glyphicon" aria-hidden="true">&#xe096</span>
  <span class="glyphicon" aria-hidden="true">&#xe097</span>
</div>
<?php
echo "<br>";
echo "<br>";
echo "<br>";
echo "<br>";
echo "<br>";
//td.talk
if (isset($_COOKIE["username"])){
  echo "<table>";
  echo "<tr>";
  echo "<td class='talk'>";
  echo "<div>评论区</div>";
  echo "<form action='posttalk.php' method='POST'>";
  echo "<textarea style='OVERFLOW:  Visble' name='usertalk' value='' id='talkboxinput'></textarea>";
  echo "<input type='submit' value='提交'>";
  echo "</form>";
  @ include('talk.php');
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
  @ include('talk.php');
  echo "</td>";
  echo "</tr>";
  echo "</table>";
  echo "</td>";
  echo "</tr>";
  echo "</table>";
  echo "</body>";
}
?>
<script src="<?php echo $websiteaddress?>/main/js/jquery-2.1.4.min.js"></script>
<script src="<?php echo $websiteaddress?>/main/js/jquery.shCircleLoader.js"></script>
<script src="<?php echo $websiteaddress?>/main/js/sco.tooltip.js"></script>
<script src="<?php echo $websiteaddress?>/main/js/colpick.js"></script>
<script src="<?php echo $websiteaddress?>/main/js/jquery.danmu.js"></script>
<script src="<?php echo $websiteaddress?>/main/js/main.js"></script>
<script>

$("#danmup").DanmuPlayer({
    src:"video.mp4",
    height: "480px", //区域的高度
    width: "800px" //区域的宽度
    ,urlToGetDanmu:"<?php echo $websiteaddress?>/video/<?php echo $videonumber?>/query.php"
    ,urlToPostDanmu:"<?php echo $websiteaddress?>/video/<?php echo $videonumber?>/stone.php"
  });

  $("#danmup .danmu-div").danmu("addDanmu",[
    <?php
    $danmakufile = @ fopen("danmaku.wml", "r") or die("])");
    echo ",";
    while(!feof($danmakufile)) {
    print fgets($danmakufile) . ",";
  
}
fclose($danmakufile);
    ?>
  ])
</script>
</html>