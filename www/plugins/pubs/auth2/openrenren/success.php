<?php
header("Content-Type: text/html; charset=utf-8");

require_once("getAccessToken.php") ;
require_once("getSessionKey.php") ;
require_once("http_post_contents.php") ;
require_once("config.inc.php") ;
require_once("users.getProfileInfo.php") ;
require_once("users.getInfo.php") ;
session_destroy() ;
if(isset($_GET['code'])){
    $code = $_GET['code'] ;
    $accessToken = getAccessToken($code) ;
    $result = json_decode($accessToken) ;
    //print_r($result) ;

/*
Format

stdClass Object ( 
    [scope] => operate_like publish_share publish_feed send_invitation 
    [expires_in] => xxx
    [refresh_token] => xxx
    [user] => stdClass Object ( 
        [id] => xxx 
        [name] => xxx
        [avatar] => Array ( 
            [0] => stdClass Object ( 
                [type] => avatar 
                [url] => xxx 
            ) 
            [1] => stdClass Object ( 
                [type] => tiny 
                [url] => xxx
            ) 
            [2] => stdClass Object ( 
                [type] => main 
                [url] => xxx
            ) 
            [3] => stdClass Object ( 
                [type] => large 
                [url] => xxx
            ) 
        ) 
    ) 
    [access_token] => xxx
)
 */ 
    $uid = $result->user->id ;
    $accessToken = $result->access_token ;

    $sessionKey = json_decode(getSessionKey($accessToken)) ;

    $session_key = $sessionKey->renren_token->session_key ;

    $url = "success.php?access_token={$accessToken}&uid={$uid}&session_key={$session_key}" ;
    header("Location:$url") ;
}

if(isset($_GET['access_token'])&&isset($_GET['uid'])&&isset($_GET['session_key'])){
    $accessToken = $_GET['access_token'] ;
    $uid = $_GET['uid'] ;
    $session_key = $_GET['session_key'] ;

    $fields="uid,name,sex,star,zidou,vip,birthday,email_hash,tinyurl,headurl,mainurl,hometown_location,work_history,university_history";

    $pro1 = getInfo($accessToken,$fields,$uid,$_SESSION['renren_secretkey']) ;

    echo "Welcome , {$pro1[0]->name} , id : {$pro1[0]->uid}<br/>" ;

    echo "<img src = '{$pro1[0]->headurl}'></img><br/>" ;
    $pro2 = getProfileInfo($accessToken,$fields,$uid,$_SESSION['renren_secretkey']) ;
}
?>
