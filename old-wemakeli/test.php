<?php
define($WWWROOT,str_ireplace(str_replace("/","＼＼",$_SERVER['PHP_SELF']),'',__FILE__)."＼＼");
echo $WWWROOT ;
define($WWW_PATH,str_replace('＼＼','/',realpath(dirname(__FILE__).'/../')));  //定义站点目录
echo $WWW_PATH ;
echo $_SERVER['DOCUMENT_ROOT'] ;
$WebsiteRoot = rtrim(str_replace('\\','/', $_SERVER['DOCUMENT_ROOT']), '/');
include($WebsiteRoot . '/main/patterns/autoexec.php');
include($WebsiteRoot . '/main/patterns/topline.php');
include($WebsiteRoot . '/main/patterns/leftline.php');
?>