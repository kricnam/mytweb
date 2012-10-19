<?php
include_once("session.php") ;

$_SESSION["appkey"]    = "123456";

$_SESSION["appsecret"] = "123456";

$_SESSION["callback"] = SITE_URL."index.php?app=pubs&ac=plugin&plugin=qq&in=/opensina/callback";

//print_r($_SESSION) ;
?>
