<?php 
session_start();
defined('IN_TS') or die('Access Denied.');
include_once('opensina/config.php');
include_once('opensina/saetv2.ex.class.php');
//登录
function qq_login_html(){
   $o = new SaeTOAuthV2( WB_AKEY , WB_SKEY );
   $code_url = $o->getAuthorizeURL( WB_CALLBACK_URL );
   echo '其它账号登陆：<a href="'.$code_url.'" ><img src="'.SITE_URL.'plugins/pubs/auth2/img/sina_login.png"/></a>&nbsp;&nbsp;';
   echo '<a href="'.SITE_URL.'index.php?app=pubs&ac=plugin&plugin=auth2&in=/openrenren/getAuthorizationCode"><img src="'.SITE_URL.'plugins/pubs/auth2/img/renren_login.png"/></a>&nbsp;&nbsp;';
   echo '<a href="'.SITE_URL.'index.php?app=pubs&ac=plugin&plugin=auth2&in=/openqq/getAuthorizationCode" ><img src="'.SITE_URL.'plugins/pubs/auth2/img/qq_login.png"/></a>';
}
addAction('user_login_footer', 'qq_login_html');
?>