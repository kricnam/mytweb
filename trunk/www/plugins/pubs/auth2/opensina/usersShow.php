<?php
/**
 * @brief 获取用户在新浪微博的个人资料
 * @param $accessToken  获取的Access Token
 * @return 返回json格式
 */
function usersShow($accessToken){
    $url = "https://api.weibo.com/2/users/show.json" ;
    $url .= $accessToken ;
    return https_get_contents($url) ;
}
?>
