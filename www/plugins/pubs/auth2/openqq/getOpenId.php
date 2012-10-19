<?php
function getOpenId($accessToken){
    $url = "https://graph.qq.com/oauth2.0/me?access_token=".$accessToken ;
    return https_get_contents($url) ;
}
?>
