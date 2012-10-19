<?php
function getProfileInfo($accessToken,$fields,$uid,$secretkey){
    $method = "users.getProfileInfo" ;
    $sig = md5(
        'access_token='.$accessToken.
        'fields='.$fields.
        'format=JSON'.
        'method='.$method.
        'uid='.$uid.
        'v=1.0'.
        $secretkey
    );

    $params = array() ;
    $params["access_token"] = $accessToken ;
    $params["fields"] = $fields ;
    $params["format"] = "JSON" ;
    $params["method"] = $method ;
    $params["uid"] = $uid ;
    $params["v"] = "1.0" ;
    $params["sig"] = $sig ;

    $url = "http://api.renren.com/restserver.do" ;
    $url .= "?".http_build_query($params) ;
    return json_decode(http_post_contents($url)) ;
}
?>
