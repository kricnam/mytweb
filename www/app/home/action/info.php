<?php 
defined('IN_TS') or die('Access Denied.');

$key = trim($_GET['key']);

$strInfo = $new['home']->find('home_info',array(
	'infokey'=>$key,
));

$arrInfo = $new['home']->findAll('home_info');

$title = $strInfo['title'];
include template('info');