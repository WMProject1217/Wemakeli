<?php 
header('Content-type:text/html;charset=utf8');
$conn =  mysqli_connect("localhost", "root", "123456" , "danmaku") or die("datebase can`t been connected");
//mysql_query(); 
mysqli_real_query ( mysqli , string )
// function htmtocode($content) {
// 	$content = str_replace("\n", "<br>", str_replace(" ", "&nbsp;", $content));
// 	return $content;
// }

// // $c=$_GET['c'];
// if($c =="insert"){




// }
// elseif($c=="query") {

// $P="SELECT * FROM `danmu` ";
// $queryp=mysql_query($P);
// }
// else {


// }

$danmu=$_POST['danmu'];
//$sql="INSERT INTO `danmu` VALUES ('".$danmu."')";
$sql="INSERT INTO `danmu`(`id`,`danmu`) VALUES ('','".$danmu."')";
echo $sql;
//$query=mysql_query($sql); 
mysqli_query ( $sql )
//echo $danmu;
echo $danmu;

?>
