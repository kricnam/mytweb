<?php
/*
stdClass Object ( 
    [renren_token] => stdClass Object ( 
            [session_secret] => 12f6a22234af423d316b5f8def8d58ff 
            [expires_in] => 2592939 
            [session_key] => 6.d2947e83b0c9a26c6f430d938c1d1cf2.2592000.1323014400-305862733 
    ) 
    [oauth_token] => 167314|6.d2947e83b0c9a26c6f430d938c1d1cf2.2592000.1323014400-305862733 
    [user] => stdClass Object ( 
        [id] => 305862733 
    ) 
)
*/
function getSessionKey($accessToken){
    $url = "https://graph.renren.com/renren_api/session_key" ;
    $url .= "?oauth_token=".$accessToken ;
    return file_get_contents($url) ;
}
?>
