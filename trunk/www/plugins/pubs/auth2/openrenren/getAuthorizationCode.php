<?php
require_once("config.inc.php") ;
function getAuthorizationCode($appkey , $redirect_uri){
    $url = "https://graph.renren.com/oauth/authorize" ;
    //传入参数
    $params = array() ;
    $params["response_type"] = "code" ;
    $params["client_id"] = $appkey ;
    $params["redirect_uri"] = $redirect_uri ;
    $params["scope"] = "publish_feed publish_share send_invitation operate_like" ;
    $params["display"] = "page" ;    
    $url .= "?".http_build_query($params) ;
    header("Location:$url");
}
getAuthorizationCode(23, 12) ;

?>
