<?php
function hex2rgb($hexColor){
 $color=str_replace('#','',$hexColor);
 if (strlen($color)> 3){
 $rgb=array(
  'r'=>hexdec(substr($color,0,2)),
  'g'=>hexdec(substr($color,2,2)),
  'b'=>hexdec(substr($color,4,2))
 );
 }else{
 $r=substr($color,0,1). substr($color,0,1);
 $g=substr($color,1,1). substr($color,1,1);
 $b=substr($color,2,1). substr($color,2,1);
 $rgb=array( 
  'r'=>hexdec($r),
  'g'=>hexdec($g),
  'b'=>hexdec($b)
 );
 }
 return $rgb;
}
$hexcolor = "#66CCFF";
$image = imagecreatetruecolor(512,512); 
$white = imagecolorallocate($image, 255, 255, 255); 
imagefill($image, 0, 0, $white);
$loopnum = 0;

$rgb = hex2rgb($hexcolor);
echo $rgb;
$colorf = imagecolorallocate($image, $rgb[0],$rgb[1] , $rgb[2]); 
imagesetpixel ( $image, $drwplsx,$drwplsy, $color);
if ($loopnum=="17") {
goto endloop;
}
$loopnum = loopnum + 1;
$drwplsx = $drwplsx + 1;

endloop:
header('Content-type:image/png');
imagedestroy($image);
?>