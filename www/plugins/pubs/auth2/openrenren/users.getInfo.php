<?php
/*
Array ( 
    [0] => stdClass Object ( 
        [uid] => XXX 
        [birthday] => XXX
        [tinyurl] => XXX
        [sex] => XXX 
        [university_history] => Array ( 
            [0] => stdClass Object ( 
                [department] => XXX
                [name] => XXX
                [year] => XXX
            ) 
        ) 
        [work_history] => Array ( ) 
        [star] => XXX
        [mainurl] => XXX
        [headurl] => XXX 
        [vip] => XXX 
        [hometown_location] => stdClass Object ( 
            [province] => XXX
            [city] => XXX
        ) 
        [name] => XXX
        [email_hash] => [zidou] => XXX 
    ) 
)
 
*/
function getInfo($accessToken,$fields,$uid,$secretkey){
    $method = "users.getInfo" ;
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

