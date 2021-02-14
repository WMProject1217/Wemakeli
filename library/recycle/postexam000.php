<?php //By WMProject1217

echo "<head>";

echo "<title>入站考试结果_" . $wmsys_name . "</title>";
echo "</head>";
echo "<body>";

echo "<table class=maindataindex>";
echo "<tr>";
echo "<td>";
if($_POST['aq0']=="8"){
    $aq0='TRUE';
}else{
    $aq0='FLASE';
}
if($_POST['aq1']=="Minecraft"){
    $aq1='TRUE';
}else{
    $aq1='FLASE';
}
if($_POST['aq2']=="CLANNED"){
    $aq2='TRUE';
}else{
    $aq2='FLASE';
}
if($_POST['aq3']=="东方Project"){
    $aq3='TRUE';
}else{
    $aq3='FLASE';
}
if($_POST['aq4']=="Minecraft"){
    $aq4='TRUE';
}else{
    $aq4='FLASE';
}
if($_POST['aq5']=="电脑模拟器"){
    $aq5='TRUE';
}else{
    $aq5='FLASE';
}
if($_POST['aq6']=="抬棺"){
    $aq6='TRUE';
}else{
    $aq6='FLASE';
}
if($_POST['aq7']=="POWERSW"){
    $aq7='TRUE';
}else{
    $aq7='FLASE';
}
if($_POST['aq8']=="WIN+SHIFT+S"){
    $aq8='TRUE';
}else{
    $aq8='FLASE';
}
if($_POST['aq9']=="LBW"){
    $aq9='TRUE';
}else{
    $aq9='FLASE';
}

echo "<table>";
echo "<tr>";
echo "<td>";
echo $_POST['aq0'] . " 得分$aq0<br>";
echo $_POST['aq1'] . " 得分$aq1<br>";
echo $_POST['aq2'] . " 得分$aq2<br>";
echo $_POST['aq3'] . " 得分$aq3<br>";
echo $_POST['aq4'] . " 得分$aq4<br>";
echo $_POST['aq5'] . " 得分$aq5<br>";
echo $_POST['aq6'] . " 得分$aq6<br>";
echo $_POST['aq7'] . " 得分$aq7<br>";
echo $_POST['aq8'] . " 得分$aq8<br>";
echo $_POST['aq9'] . " 得分$aq9<br>";
echo "</td>";
echo "</tr>";
echo "</table>";

echo "</td>";
echo "</tr>";
echo "</table>";
echo "</body>";
?>