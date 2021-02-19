<?php
include('../config.php');
if ($_POST['active']=="sha1") {
    goto sha1gre;
}
?>
<script>
function create(){
var params = {
    "active": "sha1",
    "sha1": $('#sha1').val()
};
    WMUIHTTPPost("./sha1.php", params);
}
</script>
<input id="sha1" type="text" title="">
<button class="wmuibutton" onclick="create();">生成SHA1</button>
<?php
goto ends;
sha1gre:
echo sha1($_POST['sha1']);
?>
<script>
function creatoge(){
var params = {
    "active": "null"
};
    WMUIHTTPPost("./sha1.php", params);
}
</script>
<button class="wmuibutton" onclick="creatoge();">再来一遍</button>
<?php
ends:
?>