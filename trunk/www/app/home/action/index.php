<?php
defined('IN_TS') or die('Access Denied.');

//首页

if($TS_USER['user'] == ''){

	if($_GET){
		header('Location: '.SITE_URL);
	}
	
	$title = $TS_SITE['base']['site_subtitle'];

	include template("index");
	
}else{
 
	include template("index");
	
}