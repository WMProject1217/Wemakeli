<?php 
$first=0;

header('Content-type:text/html;charset=utf8');
$conn =  mysqli_connect("localhost", "root", "123456" , "danmaku") or die("datebase can`t been connected");
//mysql_select_db("danmaku", $conn);
//mysql_query("set names 'utf8'");
$sql = "SELECT `danmu` FROM `danmu`" ;
$query=mysqli_query( $conn , $sql ); 
$amd = true
//echo $danmu;
//echo "[";

while($row=mysqli_fetch_array( $amd , $query)){
	if ($first) {
		echo ",";
		
	}
$first=1;
echo "'".$row['danmu']."'";
}
	echo "]";



?>
