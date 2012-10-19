<?php

@session_start();

/**
 * 正式运营环境请关闭错误信息
 * ini_set("error_reporting", E_ALL);
 * ini_set("display_errors", TRUE);
 * QQDEBUG = true  开启错误提示
 * QQDEBUG = false 禁止错误提示
 * 默认禁止错误信息
 */
define("QQDEBUG", false);
if (defined("QQDEBUG") && QQDEBUG)
{
    @ini_set("error_reporting", E_ALL);
    @ini_set("display_errors", True);
}

//申请到的appid
$_SESSION["qq_appid"]    = "123456"; 

//申请到的appkey
$_SESSION["qq_appkey"]   = "123456";

//QQ登录成功后的跳转地址 
$_SESSION["qq_callback"] = SITE_URL."index.php?app=pubs&ac=plugin&plugin=qq&in=/openqq/success";

//print_r($_SESSION) ;
?>
