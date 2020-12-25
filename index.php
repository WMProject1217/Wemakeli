<?php //By WMProject1217
include('./config.php');
echo "<head>";
include('./pattern/autoexec.php');
echo "<title>" . $wmsys_name . "</title>";
echo "</head>";
echo "<body>";
include('./pattern/topline.php');
include('./pattern/leftline.php');
echo "<table>";
echo "<tr>";
echo "<td class='maindata'>";
echo "<br>";

echo "<table border='1'>";
echo "<tr>";
echo "<td >";
echo "<h3>投稿推送</h3>";
include('./main/push/push.php');
echo "</td>";
echo "</tr>";
echo "</table>";

echo "<table border='1'>";
echo "<tr>";
echo "<td>";
?>
<p>
    <style>
        @keyframes noise-anim {
            0% {
                clip: rect(27px, 9999px, 90px, 0);
            }

            5% {
                clip: rect(8px, 9999px, 70px, 0);
            }

            10% {
                clip: rect(63px, 9999px, 90px, 0);
            }

            15% {
                clip: rect(59px, 9999px, 75px, 0);
            }

            20% {
                clip: rect(43px, 9999px, 46px, 0);
            }

            25% {
                clip: rect(97px, 9999px, 16px, 0);
            }

            30% {
                clip: rect(12px, 9999px, 93px, 0);
            }

            35% {
                clip: rect(38px, 9999px, 92px, 0);
            }

            40% {
                clip: rect(97px, 9999px, 63px, 0);
            }

            45% {
                clip: rect(60px, 9999px, 23px, 0);
            }

            50% {
                clip: rect(4px, 9999px, 32px, 0);
            }

            55% {
                clip: rect(100px, 9999px, 46px, 0);
            }

            60% {
                clip: rect(87px, 9999px, 13px, 0);
            }

            65% {
                clip: rect(74px, 9999px, 30px, 0);
            }

            70% {
                clip: rect(69px, 9999px, 71px, 0);
            }

            75% {
                clip: rect(11px, 9999px, 18px, 0);
            }

            80% {
                clip: rect(21px, 9999px, 50px, 0);
            }

            85% {
                clip: rect(95px, 9999px, 3px, 0);
            }

            90% {
                clip: rect(92px, 9999px, 53px, 0);
            }

            95% {
                clip: rect(83px, 9999px, 94px, 0);
            }

            100% {
                clip: rect(1px, 9999px, 92px, 0);
            }
        }

        .glitch:after {
            content: attr(data-text);
            position: absolute;
            left: 2px;
            text-shadow: -1px 0 red;
            top: 0;
            color: white;
            background: black;
            overflow: hidden;
            clip: rect(0, 900px, 0, 0);
            animation: noise-anim 2s infinite linear alternate-reverse;
        }

        @keyframes noise-anim-2 {
            0% {
                clip: rect(25px, 9999px, 73px, 0);
            }

            5% {
                clip: rect(32px, 9999px, 62px, 0);
            }

            10% {
                clip: rect(31px, 9999px, 47px, 0);
            }

            15% {
                clip: rect(8px, 9999px, 65px, 0);
            }

            20% {
                clip: rect(30px, 9999px, 9px, 0);
            }

            25% {
                clip: rect(5px, 9999px, 95px, 0);
            }

            30% {
                clip: rect(80px, 9999px, 51px, 0);
            }

            35% {
                clip: rect(88px, 9999px, 89px, 0);
            }

            40% {
                clip: rect(44px, 9999px, 84px, 0);
            }

            45% {
                clip: rect(10px, 9999px, 6px, 0);
            }

            50% {
                clip: rect(25px, 9999px, 60px, 0);
            }

            55% {
                clip: rect(38px, 9999px, 67px, 0);
            }

            60% {
                clip: rect(62px, 9999px, 10px, 0);
            }

            65% {
                clip: rect(17px, 9999px, 34px, 0);
            }

            70% {
                clip: rect(50px, 9999px, 76px, 0);
            }

            75% {
                clip: rect(85px, 9999px, 44px, 0);
            }

            80% {
                clip: rect(12px, 9999px, 41px, 0);
            }

            85% {
                clip: rect(100px, 9999px, 80px, 0);
            }

            90% {
                clip: rect(41px, 9999px, 14px, 0);
            }

            95% {
                clip: rect(75px, 9999px, 95px, 0);
            }

            100% {
                clip: rect(82px, 9999px, 28px, 0);
            }
        }

        .glitch:before {
            content: attr(data-text);
            position: absolute;
            left: -2px;
            text-shadow: 1px 0 blue;
            top: 0;
            color: white;
            background: transparent;
            overflow: hidden;
            clip: rect(0, 900px, 0, 0);
            animation: noise-anim-2 5s infinite linear alternate-reverse;
        }

        .glitch_p {
            color: black;
            font: bold 16px Arial;
            text-transform: uppercase;
            text-align: center;
            animation: glitch2 4s steps(100) infinite;
        }

        @keyframes glitch2 {
            0% {
                text-shadow: 1px 0 0 red, -1px 0 0 blue;
            }

            1% {
                text-shadow: 1px 0 0 red, -1px 0 0 blue;
            }

            2% {
                text-shadow: 1px 0 0 red, -1px 0 0 blue;
            }

            3% {
                text-shadow: 1px 0 0 red, -1px 0 0 blue;
            }

            4% {
                text-shadow: 1px 0 0 red, -1px 0 0 blue;
            }

            5% {
                text-shadow: -1px 0 0 red, 1px 0 0 blue;
            }

            6% {
                text-shadow: -1px 0 0 red, 1px 0 0 blue;
            }

            7% {
                text-shadow: -1px 0 0 red, 1px 0 0 blue;
            }

            8% {
                text-shadow: -1px 0 0 red, 1px 0 0 blue;
            }

            9% {
                text-shadow: -1px 0 0 red, 1px 0 0 blue;
            }

            10% {
                text-shadow: -1px 0 0 red, 1px 0 0 blue;
            }

            11% {
                text-shadow: 0.5px 0 0 red, -0.5px 0 0 lime;
            }

            12% {
                text-shadow: 0.5px 0 0 red, -0.5px 0 0 lime;
            }

            13% {
                text-shadow: 0.5px 0 0 red, -0.5px 0 0 lime;
            }

            14% {
                text-shadow: 0.5px 0 0 red, -0.5px 0 0 lime;
            }

            15% {
                text-shadow: 0.5px 0 0 red, -0.5px 0 0 lime;
            }

            16% {
                text-shadow: -1px 0 0 red, 1px 0 0 lime;
            }

            17% {
                text-shadow: -1px 0 0 red, 1px 0 0 lime;
            }

            18% {
                text-shadow: -1px 0 0 red, 1px 0 0 lime;
            }

            19% {
                text-shadow: -1px 0 0 red, 1px 0 0 lime;
            }

            20% {
                text-shadow: -1px 0 0 red, 1px 0 0 lime;
            }

            21% {
                text-shadow: 0.7px 0 0 blue, -0.7px 0 0 lime;
            }

            22% {
                text-shadow: 0.7px 0 0 blue, -0.7px 0 0 lime;
            }

            23% {
                text-shadow: 0.7px 0 0 blue, -0.7px 0 0 lime;
            }

            24% {
                text-shadow: 0.7px 0 0 blue, -0.7px 0 0 lime;
            }

            25% {
                text-shadow: 0.7px 0 0 blue, -0.7px 0 0 lime;
            }

            26% {
                text-shadow: 0.7px 0 0 blue, -0.7px 0 0 lime;
            }

            27% {
                text-shadow: 0.7px 0 0 blue, -0.7px 0 0 lime;
            }

            28% {
                text-shadow: 0.7px 0 0 blue, -0.7px 0 0 lime;
            }

            29% {
                text-shadow: 0.7px 0 0 blue, -0.7px 0 0 lime;
            }

            30% {
                text-shadow: 0.7px 0 0 blue, -0.7px 0 0 lime;
            }

            31% {
                text-shadow: -1px 0 0 blue, 1px 0 0 lime;
            }

            32% {
                text-shadow: -1px 0 0 blue, 1px 0 0 lime;
            }

            33% {
                text-shadow: -1px 0 0 blue, 1px 0 0 lime;
            }

            34% {
                text-shadow: -1px 0 0 blue, 1px 0 0 lime;
            }

            35% {
                text-shadow: -1px 0 0 blue, 1px 0 0 lime;
            }

            36% {
                text-shadow: -1px 0 0 blue, 1px 0 0 lime;
            }

            37% {
                text-shadow: -1px 0 0 blue, 1px 0 0 lime;
            }

            38% {
                text-shadow: -1px 0 0 blue, 1px 0 0 lime;
            }

            39% {
                text-shadow: -1px 0 0 blue, 1px 0 0 lime;
            }

            40% {
                text-shadow: -1px 0 0 blue, 1px 0 0 lime;
            }

            41% {
                text-shadow: 50px 0 0 blue, -50px 0 0 lime;
            }

            42% {
                text-shadow: 0 0 0 blue, 0 0 0 lime;
            }

            43% {
                text-shadow: 0.5px 0 0 red, -0.5px 0 0 lime;
            }

            44% {
                text-shadow: 0.5px 0 0 red, -0.5px 0 0 lime;
            }

            45% {
                text-shadow: 0.5px 0 0 red, -0.5px 0 0 lime;
            }

            46% {
                text-shadow: 0.5px 0 0 red, -0.5px 0 0 lime;
            }

            47% {
                text-shadow: -1px 0 0 red, 1px 0 0 lime;
            }

            48% {
                text-shadow: -1px 0 0 red, 1px 0 0 lime;
            }

            49% {
                text-shadow: -1px 0 0 red, 1px 0 0 lime;
            }

            50% {
                text-shadow: -1px 0 0 red, 1px 0 0 lime;
            }

            51% {
                text-shadow: 1px 0 0 red, -1px 0 0 blue;
            }

            52% {
                text-shadow: 1px 0 0 red, -1px 0 0 blue;
            }

            53% {
                text-shadow: 1px 0 0 red, -1px 0 0 blue;
            }

            54% {
                text-shadow: 1px 0 0 red, -1px 0 0 blue;
            }

            55% {
                text-shadow: 1px 0 0 red, -1px 0 0 blue;
            }

            56% {
                text-shadow: -1px 0 0 red, 1px 0 0 blue;
            }

            57% {
                text-shadow: -1px 0 0 red, 1px 0 0 blue;
            }

            58% {
                text-shadow: -1px 0 0 red, 1px 0 0 blue;
            }

            59% {
                text-shadow: -1px 0 0 red, 1px 0 0 blue;
            }

            60% {
                text-shadow: -1px 0 0 red, 1px 0 0 blue;
            }

            61% {
                text-shadow: 30px 0 0 red, -30px 0 0 lime;
            }

            62% {
                text-shadow: 0 0 0 red, 0 0 0 lime;
            }

            63% {
                text-shadow: 0.5px 0 0 red, -0.5px 0 0 blue;
            }

            64% {
                text-shadow: 0.5px 0 0 red, -0.5px 0 0 blue;
            }

            65% {
                text-shadow: 0.5px 0 0 red, -0.5px 0 0 blue;
            }

            66% {
                text-shadow: 0.5px 0 0 red, -0.5px 0 0 blue;
            }

            67% {
                text-shadow: -1px 0 0 red, 1px 0 0 blue;
            }

            68% {
                text-shadow: -1px 0 0 red, 1px 0 0 blue;
            }

            69% {
                text-shadow: -1px 0 0 red, 1px 0 0 blue;
            }

            70% {
                text-shadow: -1px 0 0 red, 1px 0 0 blue;
            }

            71% {
                text-shadow: 70px 0 0 red, -70px 0 0 blue;
            }

            72% {
                text-shadow: 0 0 0 red, 0 0 0 blue;
            }

            73% {
                text-shadow: 1px 0 0 red, -1px 0 0 blue;
            }

            74% {
                text-shadow: 1px 0 0 red, -1px 0 0 blue;
            }

            75% {
                text-shadow: 1px 0 0 red, -1px 0 0 blue;
            }

            76% {
                text-shadow: 1px 0 0 red, -1px 0 0 blue;
            }

            77% {
                text-shadow: -1px 0 0 red, 1px 0 0 blue;
            }

            78% {
                text-shadow: -1px 0 0 red, 1px 0 0 blue;
            }

            79% {
                text-shadow: -1px 0 0 red, 1px 0 0 blue;
            }

            80% {
                text-shadow: -1px 0 0 red, 1px 0 0 blue;
            }

            81% {
                text-shadow: 0.5px 0 0 red, -0.5px 0 0 lime;
            }

            82% {
                text-shadow: 0.5px 0 0 red, -0.5px 0 0 lime;
            }

            83% {
                text-shadow: 0.5px 0 0 red, -0.5px 0 0 lime;
            }

            84% {
                text-shadow: 0.5px 0 0 red, -0.5px 0 0 lime;
            }

            85% {
                text-shadow: 0.5px 0 0 red, -0.5px 0 0 lime;
            }

            86% {
                text-shadow: -1px 0 0 red, 1px 0 0 lime;
            }

            87% {
                text-shadow: -1px 0 0 red, 1px 0 0 lime;
            }

            88% {
                text-shadow: -1px 0 0 red, 1px 0 0 lime;
            }

            89% {
                text-shadow: -1px 0 0 red, 1px 0 0 lime;
            }

            90% {
                text-shadow: -1px 0 0 red, 1px 0 0 lime;
            }

            91% {
                text-shadow: 60px 0 0 lime, -60px 0 0 blue;
            }

            92% {
                text-shadow: 0 0 0 lime, 0 0 0 blue;
            }

            92% {
                text-shadow: 0.7px 0 0 blue, -0.7px 0 0 lime;
            }

            93% {
                text-shadow: 0.7px 0 0 blue, -0.7px 0 0 lime;
            }

            94% {
                text-shadow: 0.7px 0 0 blue, -0.7px 0 0 lime;
            }

            95% {
                text-shadow: 0.7px 0 0 blue, -0.7px 0 0 lime;
            }

            96% {
                text-shadow: -1px 0 0 blue, 1px 0 0 lime;
            }

            97% {
                text-shadow: -1px 0 0 blue, 1px 0 0 lime;
            }

            98% {
                text-shadow: -1px 0 0 blue, 1px 0 0 lime;
            }

            99% {
                text-shadow: -1px 0 0 blue, 1px 0 0 lime;
            }

            100% {
                text-shadow: -1px 0 0 blue, 1px 0 0 lime;
            }
        }
    </style>
    <span style="background-color: #faf20b;" class="glitch_p">「<span class="glitch">赛博朋克2077</span>」</span> 
    </p>
<?php
echo "<h3>正在建设 " . $wmsys_name. " ...</h3>";
print "Build on Wemakeli Danmaku Video Website System [Version 0.8.4 Build 622]<br>By WMProject1217<br>";
print "已进入第 2 开发阶段,在此阶段主要将修复特性以及修复样式<br>";
//print "奥利给!淦就完了!<br>我们遇到什么困难,也不要怕!微笑着面对它!消除恐惧的最好办法就是面对恐惧!坚持,才是胜利!加油,奥利给!<br>";
//print "AMD YES<br>LBWNB LBWNB LBWNB LBWNB LBWNB LBWNB LBWNB LBWNB LBWNB LBWNB LBWNB LBWNB LBWNB LBWNB<br>";
echo "<a href='https://github.com/wmproject1217/wemakeli' target='_blank'>当前项目的Github地址</a><br>";
echo "使用了以下Github项目的一部分<br>";
echo "<a href='https://github.com/stevenjoezhang/live2d-widget' target='_blank'>https://github.com/stevenjoezhang/live2d-widget</a><br>";
echo "<a href='https://github.com/chiruom/DanmuPlayer' target='_blank'>https://github.com/chiruom/DanmuPlayer</a><br>";
echo "<a href='https://github.com/DIYgod/APlayer' target='_blank'>https://github.com/DIYgod/APlayer</a><br>";
echo "</td>";
echo "</tr>";
echo "</table>";

echo "<table border='1'>";
echo "<tr>";
echo "<td class='log'>";
echo "<h3>开发日志</h3>";
readfile("./main/txt/mainmsg.txt");
echo "</td>";
echo "</tr>";
echo "</table>";

echo "<table border='1'>";
echo "<tr>";
echo "<td class='talk'>";
echo "<a href='./talk/0/'>进入评论区</a>";
echo "<pre>";
readfile("./talk/0/talk.json");
echo "</pre>";
echo "</td>";
echo "</tr>";
echo "</table>";

echo "</td>";
echo "</tr>";
echo "</table>";
echo "</body>";
?>