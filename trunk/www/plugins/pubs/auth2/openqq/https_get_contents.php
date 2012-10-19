<?php
/**
 * @brief 读取https网页内容
 *
 * @param $url 待解析的网址
 *
 * @return 返回字符串格式为：access_token=XXX&expires_in=XXX
 */
function https_get_contents($url){
    $ch = curl_init() ;
    curl_setopt($ch , CURLOPT_URL , $url) ;
    curl_setopt($ch , CURLOPT_SSL_VERIFYPEER , false) ;
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1) ;  //设置返回内容不回显
    curl_setopt($ch , CURLOPT_SSL_VERIFYHOST , false) ;
    $result = curl_exec($ch) ;
    curl_close($ch) ;
    return $result ;
}
?>

