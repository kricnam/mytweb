<?php
require_once 'config.inc.php';

/**
 * @brief 获取Authorization Code
 * @param $appid  申请QQ登录成功后，分配给网站的appid
 * @param $redirect_uri  成功授权后的回调地址
 * @return none 跳转到授权页面
  */
function getAuthorizationCode($appid , $redirect_uri){
    $url = "https://graph.qq.com/oauth2.0/authorize" ;
    //传入参数
    $params = array() ;
    $params["response_type"] = "code" ;
    $params["client_id"] = $appid ;
    $params["redirect_uri"] = $redirect_uri ;
    $url .= "?".http_build_query($params) ;
    header("Location:$url") ;
}

getAuthorizationCode($_SESSION["qq_appid"],$_SESSION["qq_callback"]) ;

?>
