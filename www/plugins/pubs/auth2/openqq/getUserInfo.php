<?php
/**
 * @brief 获取用户在QQ空间的个人资料
 * @param $accessToken  获取的Access Token
 * @param $appid  申请QQ登录成功后，分配给网站的appid
 * @param $openid  获取的用户的OpenID
 * @return 返回json格式
 */
function getUserInfo($accessToken , $appid , $openid){
    $url = "https://graph.qq.com/user/get_user_info" ;
    $params = array() ;
    $params["access_token"] = $accessToken ;
    $params["oauth_consumer_key"] = $appid ;
    $params["openid"] = $openid ;
    $url .= "?".http_build_query($params) ;
    return https_get_contents($url) ;
}
?>
