<?php
defined('IN_TS') or die('Access Denied.');

$userid = intval($TS_USER['user']['userid']);

if($userid == '0'){


	$areaid = '0';
	
}else{
	
	$areaid = intval($TS_USER['user']['areaid']);
	
}

header("Location: ".SITE_URL.tsUrl('location','area',array('areaid'=>$areaid)));