<?php 
header('Content-type:text/html;charset=utf8');
$danmakufile = @ fopen("danmaku.wml", "r") or die("");
while(!feof($danmakufile)) {
  $danmakuline = fgets($danmakufile);
  echo "'".[$danmakuline]."'";
  echo ",";
}
fclose($danmakufile);
?>
