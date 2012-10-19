<?php

/**
 * @brief 获取Access Token
 * @param $code  上一步返回的authorization code
 * @return 返回字符串格式为：
 */
function getAccessToken($code){
    $url = "https://graph.qq.com/oauth2.0/token" ;

    //传入参数
    $params = array() ;
    $params["grant_type"] = "authorization_code" ;
    $params["client_id"] = $_SESSION["qq_appid"] ;
    $params["client_secret"] = $_SESSION["qq_appkey"] ;
    $params["code"] = $code ;
    $params["state"] = "ebangke-qq-login" ;
    $params["redirect_uri"] = $_SESSION["qq_callback"] ;

    $url .= "?".http_build_query($params) ;
    return https_get_contents($url) ;
}
?>
