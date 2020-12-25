<?php //By WMProject1217
include('../config.php');
echo "<head>";
include('../pattern/autoexec.php');
echo "<title>考试_" . $wmsys_name . "</title>";
echo "</head>";
echo "<body>";
include('../pattern/topline.php');
echo "<table class=maindataindex>";
echo "<tr>";
echo "<td>";

echo "<table>";
echo "<tr>";
echo "<td>";
echo "<a href='exam000.php'>";
echo "<input name='入站考试' type='button' class='exam_000' title='入站考试' value='入站考试'>";
echo "</a>";
echo "</td>";
echo "</tr>";
echo "</table>";

echo "</td>";
echo "</tr>";
echo "</table>";
echo "</body>";
?>