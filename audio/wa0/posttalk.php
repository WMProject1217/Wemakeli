<?php
$username = $_POST['username'];
$usertalk = $_POST['usertalk'];
$timenowh=date("H");
$timenowm=date("i");
$timenows=date("s");
print date("Y-m-d") . "   " .  $timenowh . ":" .  $timenowm . ":" .  $timenows . "" . "<br>" . $username . "<br>" . $usertalk ;
$text=date("Y-m-d") . "   " .  $timenowh . ":" .  $timenowm . ":" .  $timenows . "" . "<br>" . $username . "<br>" . $usertalk . "<br>" ;
$filename = fopen("talk.json", "a");
fwrite($filename, $text);
end:
?>
<meta http-equiv='refresh' content=1;url='index.php'>