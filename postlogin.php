<?php
$password = $_POST['userpassword'];
echo $password;
echo "<meta http-equiv='refresh' content=1;url='./database/login/" . $_POST['username'] . ".php?password=" . $password ."'>";
?>
