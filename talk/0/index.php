<?php
echo "<head>";
include("../config.php");
include("../pattern/autoexec.php");
echo "<title>Talk 0</title>";
echo "</head>";
echo "<body>";
include("../pattern/topline.php");
echo "<table class='maindataindex'>";
echo "<tr>";
echo "<td>";
echo "<pre>";
readfile("talk.json");
echo "</pre>";
echo "<form action='posttalk.php' method='POST'>";
echo "<textarea style='OVERFLOW:  Visble' name='usertalk' value='' class='talkboxinput'></textarea>";
echo "<input type='submit' value='提交'>";
echo "</form>";
echo "</body>";
?>