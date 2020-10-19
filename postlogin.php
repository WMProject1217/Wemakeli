<?php
$password = $_POST['userpassword'];
echo $password;
echo "<meta http-equiv='refresh' content=1;url='./user/login/" . $_POST['username'] . ".php?password=" . $password ."'>";
?>
