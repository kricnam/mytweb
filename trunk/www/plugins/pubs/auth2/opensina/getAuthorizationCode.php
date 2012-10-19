<?php

require_once("config.inc.php") ;

/**
 * @brief 获取Authorization Code
 * @param $appid  分配给网站的appid
 * @param $redirect_uri  成功授权后的回调地址
 * @return none 跳转到授权页面
  */
function getAuthorizationCode($appkey , $redirect_uri){
    $url = "https://api.weibo.com/oauth2/authorize" ;

    //传入参数
    $params = array() ;
    $params["client_id"] = $appkey ;
    $params["response_type"] = "code" ;
    $params["redirect_uri"] = $redirect_uri ;

    $url .= "?".http_build_query($params) ;
    header("Location:$url") ;
}

getAuthorizationCode($_SESSION["appkey"], $_SESSION["callback"]) ;

?>
