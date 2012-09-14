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
	
	header("Location: ".SITE_URL.tsUrl('group','user',array('id'=>$TS_USER['user']['userid'])));
	
}