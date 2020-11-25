<?php //By WMProject1217
$audioinfofile = @ fopen("info.wmst", "r") or die("<title>Error 0x00000002</title>Error 0x00000002<br>Audio info load unsuccessful.");
$title = fgets($audioinfofile);
$outputtime = fgets($audioinfofile);
$uploadmaster = fgets($audioinfofile);
$audionumber= fgets($audioinfofile);
fclose($audioinfofile);
$countfile = @ fopen("count.wmst", "r");
$playnumber=fgets($countfile);
$playnumber = $playnumber + 1;
fclose($countfile);
$countfile = @ fopen("count.wmst", "w");
fwrite($countfile,$playnumber);
fclose($countfile);
include('../config.php');
echo "<head>";
echo "<title>" . $title . "_" . $wmsys_name . "</title>";
include('../pattern/autoexec.php');
echo "</head>";
echo "<body>";
include('../pattern/topline.php');
echo "<table class='maindataindex'>";
echo "<tr>";
echo "<td>";
echo "<h3>" . $title . "</h3>";
echo "<div>" . $outputtime . " , " . $audionumber . " , 播放 " . $playnumber . " , UP : " . $uploadmaster . "</div>";
echo "<div id='player'>";
echo "<pre class='aplayer-lrc-content'>";
echo "";
echo "</pre>";
echo "</div>";
?>
<script>
var ap = new APlayer
        ({
            element: document.getElementById('player'),
            narrow: false,
            autoplay: true,
            showlrc: false,
            music: {
                    title: 'Music0 00003',
                    author: "?",
                    url: './audio.wav',
                    pic: './logo.png'
                    }
        });
ap.init();
</script>
<?php
//td.talk
if (isset($_COOKIE["username"])){
    echo "<table>";
    echo "<tr>";
    echo "<td class='talk'>";
    echo "<div>评论区</div>";
    echo "<form action='posttalk.php' method='POST'>";
    echo "<textarea style='OVERFLOW:  Visble' name='usertalk' value='' class='talkboxinput'></textarea>";
    echo "<input type='submit' value='提交'>";
    echo "</form>";
    @ include('talk.php');
    echo "</td>";
    echo "</tr>";
    echo "</table>";
    echo "</td>";
    echo "</tr>";
    echo "</table>";
    echo "</body>";
  }else{
    echo "<table>";
    echo "<tr>";
    echo "<td class='talk'>";
    echo "<div>评论区</div>";
    echo "你必须登录才能发表评论。";
    @ include('talk.php');
    echo "</td>";
    echo "</tr>";
    echo "</table>";
    echo "</td>";
    echo "</tr>";
    echo "</table>";
    echo "</body>";
  }
?>
