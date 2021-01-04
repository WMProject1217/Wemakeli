<?php //By WMProject1217
include('./config.php');
$wmui_classnow = "mainpage";
$wmui_title = $wmsys_name;
$wmui_jumpoffheadbar = 1;
echo "<head>";
echo "<title>" . $wmsys_name . "</title>";
echo "</head>";
echo "<body>";
echo "<table class='pagedatamainl'>";
echo "<tr>";
echo "<td>";
?>
<p>
    <span style="background-color: #faf20b;" class="glitch_p">「<span class="glitch">Welcome to Wemakeli</span>」</span> 
</p>
<p>
    <span style="background-color: #faf20b;" class="glitch_p">「<span class="glitch">赛博朋克2077</span>」</span> 
</p>
<?php
echo "<br>";
echo "<table border='1'>";
echo "<tr>";
echo "<td>";
echo "<h3>投稿推送</h3>";
include('./main/push/push.php');
echo "</td>";
echo "</tr>";
echo "</table>";
include('./wmui/wmui.php');
echo "</td>";
echo "</tr>";
echo "</table>";
echo "</body>";
?>