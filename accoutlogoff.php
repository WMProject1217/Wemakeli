<?php
$username = $_POST['username'];
setcookie("username", $username, time()-3600);
?>
<meta http-equiv='refresh' content=1;url='index.php'>