<?php 
header('Content-type:text/html;charset=utf8');
$danmu=$_POST['danmu'];
$danmakufile = fopen("danmaku.wml", "a") or die("Can not write to danmaku database!");
$danmuline = $danmu . "\n";
fwrite($danmakufile, $danmuline);
fclose($danmakufile);
?>
