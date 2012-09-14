<?php 
defined('IN_TS') or die('Access Denied.');
$page = isset($_GET['page']) ? $_GET['page'] : '1';

$url = SITE_URL.tsUrl('photo','index',array('page'=>''));

$lstart = $page*30-30;

$arrPhoto = $new['photo']->findAll('photo',array(
	'isrecommend'=>'1',
),'photoid desc',null,$lstart.',30');

$photoNum = $new['photo']->findCount('photo',array(
	'isrecommend'=>'1',
));

$pageUrl = pagination($photoNum, 30, $page, $url);

$title = '推荐图片';
include template("index");