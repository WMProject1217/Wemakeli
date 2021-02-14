<?php //By WMProject1217

echo "<head>";

echo "<title>入站考试_" . $wmsys_name . "</title>";
echo "</head>";
echo "<body>";

echo "<table class=maindataindex>";
echo "<tr>";
echo "<td>";

echo "<table>";
echo "<tr>";
echo "<td>";
echo "<h3>入站考试</h3>";
echo "</td>";
echo "</tr>";
echo "</table>";
echo "<form action='postexam000.php' method='POST'>";
echo "<div>1. 7+3=</div>";
echo "<input type='text' name='aq0' value=''><br>";
echo "<div>2. 输入世界上第一款沙盒游戏的名称</div>";
echo "<input type='text' name='aq1' value=''><br>";
echo "<div>3. 输入可被读作人生译作经典的番的名称</div>";
echo "<input type='text' name='aq2' value=''><br>";
echo "<div>4. Bad Apple是哪个Project的同人作品</div>";
echo "<input type='text' name='aq3' value=''><br>";
echo "<div>5. 你可以在哪个游戏中运行Windows</div>";
echo "<input type='text' name='aq4' value=''><br>";
echo "<div>6. 哪个游戏被称为扔电脑模拟器</div>";
echo "<input type='text' name='aq5' value=''><br>";
echo "<div>7. 黑人抬棺中黑人干了什么</div>";
echo "<input type='text' name='aq6' value=''><br>";
echo "<div>8. 短接主板上的哪个针脚可以发出ACPI电源键信号</div>";
echo "<input type='text' name='aq7' value=''><br>";
echo "<div>9. Windows Build17763中高级截图按钮组合是</div>";
echo "<input type='text' name='aq8' value=''><br>";
echo "<div>10. 请写出还没吃电脑屏幕并被17张牌秒杀的人的首字母</div>";
echo "<input type='text' name='aq9' value=''><br>";
echo "<input type='submit' name='submit' value='确定'>";

echo "</td>";
echo "</tr>";
echo "</table>";
echo "</body>";
?>