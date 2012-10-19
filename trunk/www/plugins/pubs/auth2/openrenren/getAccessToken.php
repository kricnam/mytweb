<?php

/**
 * @brief 获取Access Token
 * @param $code  上一步返回的authorization code
 * @return 返回字符串格式为：
 */
function getAccessToken($code){
    $url = "https://graph.renren.com/oauth/token" ;

    //传入参数
    $params = array() ;
    $params["grant_type"] = "authorization_code" ;
    $params["code"] = $code ;
    $params["client_id"] = $_SESSION["renren_appkey"] ;
    $params["client_secret"] = $_SESSION["renren_secretkey"] ;
    $params["redirect_uri"] = $_SESSION["renren_callback"] ;

    $url .= "?".http_build_query($params) ;
    return file_get_contents($url) ;
}
?>
