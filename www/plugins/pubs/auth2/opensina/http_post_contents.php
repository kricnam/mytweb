<?php
function http_post_contents($url){
    $url_arr = parse_url($url) ;
    $page="{$url_arr['scheme']}://{$url_arr['host']}{$url_arr['path']}";
    $ch = curl_init() ;
    curl_setopt($ch , CURLOPT_URL , $page) ;
    curl_setopt($ch, CURLOPT_POSTFIELDS, $url_arr['query']); 
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true); 
    $result = curl_exec($ch); 
    curl_close($ch); 
    return $result; 
}
?>
