<?php //by WMProject1217
echo "<!DOCTYPE html>";
echo "<html>";
$videolabel=$_GET['video'];
$websiteroot = rtrim(str_replace('\\','/', $_SERVER['DOCUMENT_ROOT']), '/');
$filepath = "$websiteroot/settings.wmst";
$websitesettings = @ fopen($filepath, "r") or die("<title>Error 0x00000001</title>Error 0x00000001<br>Website info load unsuccessful.");
$websitename = fgets($websitesettings);
$websiteaddress = fgets($websitesettings);
fclose($websitesettings);
$videoinfofile = @ fopen("./$videolabel/info.wmst", "r") or die("<title>Error 0x00000002</title>Error 0x00000002<br>Video info load unsuccessful.");
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
include('./patterns/autoexec.php');
echo "<link href='$websiteaddress/main/css/scojs.css' rel='stylesheet'>";
echo "<link href='$websiteaddress/main/css/colpick.css' rel='stylesheet'>";
echo "<link href='$websiteaddress/main/css/bootstrap.css' rel='stylesheet'>";
echo "<link rel='stylesheet' href='$websiteaddress/main/css/main.css'>";
echo "</head>";
echo "<body>";
include('./patterns/topline.php');
echo "<table id='maindataindex'>";
echo "<tr>";
echo "<td class='maindataindex'>";
echo "<h3>" . $title . "</h3>";
echo "<div>" . $outputtime . " , " . $videonumber . " , 播放 " . $playnumber . " , 弹幕 " . $danmakunumber . " , UP : " . $uploadmaster . "</div>";
echo "<div id='danmup' style='left: 50%;margin-left:-400px;top:100px'>";
echo "";
echo "";
echo "</div>";
echo "<div style='display: none'>";
echo "  <span class='glyphicon' aria-hidden='true'>&#xe072</span>";
echo "  <span class='glyphicon' aria-hidden='true'>&#xe073</span>";
echo "  <span class='glyphicon' aria-hidden='true'>&#xe242</span>";
echo "  <span class='glyphicon' aria-hidden='true'>&#xe115</span>";
echo "  <span class='glyphicon' aria-hidden='true'>&#xe111</span>";
echo "  <span class='glyphicon' aria-hidden='true'>&#xe096</span>";
echo "  <span class='glyphicon' aria-hidden='true'>&#xe097</span>";
echo "</div>";
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
  echo "<form action='./$videolabel/posttalk.php?video=$videolabel' method='POST'>";
  echo "<textarea style='OVERFLOW:  Visble' name='usertalk' value='' id='talkboxinput'></textarea>";
  echo "<input type='submit' value='提交'>";
  echo "</form>";
  echo "<pre>";
  @ readfile("./$videolabel/talk.json");
  echo "</pre>";
  echo "</td>";
  echo "</tr>";
  echo "</table>";
  echo "</td>";
  goto endtalk;
}else{
  echo "<table>";
  echo "<tr>";
  echo "<td class='talk'>";
  echo "<div>评论区</div>";
  echo "你必须登录才能发表评论。";
  echo "<pre>";
  @ readfile("./$videolabel/talk.json");
  echo "</pre>";
  echo "</td>";
  echo "</tr>";
  echo "</table>";
  goto endtalk;
}
endtalk:
echo "</td>";
echo "</tr>";
echo "</table>";
echo "</body>";
/*
echo "<script src='$websiteaddress/main/js/jquery-2.1.4.min.js'></script>";
echo "<script src='$websiteaddress/main/js/jquery.shCircleLoader.js'></script>";
echo "<script src='$websiteaddress/main/js/sco.tooltip.js'></script>";
echo "<script src='$websiteaddress/main/js/colpick.js'></script>";
echo "<script src='$websiteaddress/main/js/jquery.danmu.js'></script>";
echo "<script src='$websiteaddress/main/js/main.js'></script>";
echo "<script>";
echo "$('#danmup').DanmuPlayer({";
echo "    src:'$websiteaddress/video/$videolabel/video.mp4',\n";
echo "    height: '480px',\n";
echo "    width: '800px' \n";
echo "   ,urlToGetDanmu:'$websiteaddress/video/$videonumber/query.php'\n";
echo "   ,urlToPostDanmu:'$websiteaddress/video/$videonumber/stone.php'\n";
echo "  });\n";
echo "\n";
echo "  $('#danmup .danmu-div').danmu('addDanmu',[\n";
$danmakufile = @ fopen("danmaku.wml", "r") or die("])");
echo ",";
while(!feof($danmakufile)) {
print fgets($danmakufile) . ",";
}
fclose($danmakufile);
echo "  ])";
echo "</script>";
echo "</html>";
*/
?>
<script src="<?php echo $websiteaddress?>/main/js/jquery-2.1.4.min.js"></script>
<script src="<?php echo $websiteaddress?>/main/js/jquery.shCircleLoader.js"></script>
<script src="<?php echo $websiteaddress?>/main/js/sco.tooltip.js"></script>
<script src="<?php echo $websiteaddress?>/main/js/colpick.js"></script>
<script src="<?php echo $websiteaddress?>/main/js/jquery.danmu.js"></script>
<script src="<?php echo $websiteaddress?>/main/js/main.js"></script>
<script>

$("#danmup").DanmuPlayer({
    src:"<?php echo $websiteaddress?>/video/<?php echo $videonumber?>/video.mp4",
    height: "480px", //区域的高度
    width: "800px" //区域的宽度
    ,urlToGetDanmu:"<?php echo $websiteaddress?>/video/<?php echo $videonumber?>/query.php"
    ,urlToPostDanmu:"<?php echo $websiteaddress?>/video/<?php echo $videonumber?>/stone.php"
  });

  $("#danmup .danmu-div").danmu("addDanmu",[
    <?php
    $danmakufile = @ fopen("$websiteaddress/video/$videonumber/danmaku.wml", "r") or die("])");
    echo ",";
    while(!feof($danmakufile)) {
    print fgets($danmakufile) . ",";
  
}
fclose($danmakufile);
    ?>
  ])
</script>
</html>