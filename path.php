<?php
echo "<br>当前文件目录绝对路径" . dirname(__FILE__);
echo "<br>当前文件目录绝对路径" . getcwd();
echo "<br>当前文件目录绝对路径" . __DIR__;
echo "<br>当前执行文件绝对路径" . __FILE__;
echo "<br>当前文件上一层文件目录路径" . dirname(dirname(__FILE__));
echo "<br>当前服务器文件目录路径" . $_SERVER["DOCUMENT_ROOT"];
echo "<br>当前执行文件目录绝对路径" . $_SERVER["SCRIPT_FILENAME"];
echo "<br>当前执行文件目录服务器下绝对路径" . $_SERVER["PHP_SELF"];
?>