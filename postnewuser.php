<?php
$username = $_POST['username'];
setcookie("username", $username, time()+16777215);
?>
<meta http-equiv='refresh' content=1;url='index.php'>