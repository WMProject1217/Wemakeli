<?php
function send_post($url) {
    $postdata = http_build_query($post_data);
    $options = array(
    'http' => array(
        'method' => 'POST',
        /*'header' => 'Content-type:application/x-www-form-urlencoded',*/
        'authkey' => "WMinitKey1217",
        'timeout' => 15 * 60 // 超时时间（单位:s）
    )
  );
    $context = stream_context_create($options);
    $result = file_get_contents($url, true, $context);
    return $result;
}
echo send_post("http://wemakeli.net.wm:12181/auth");
?>