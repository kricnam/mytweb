<?php
defined('IN_TS') or die('Access Denied.');
$userid = intval($_GET['id']);
//用户空间
include 'userinfo.php';

//课程信息
$arrStudys = $db->fetch_all_assoc("select studyid from ".dbprefix."study where userid=".$userid." limit 0,6");
//var_export($arrStudys);
foreach($arrStudys as $item){
	$arrStudy[] = $new['user']->getStudyByStudyid($item['studyid']);
}

$arrStudysJ = $db->fetch_all_assoc("select studyid  from ".dbprefix."study_users where status=0 and userid='".$userid."' limit 0,6");
//var_export($arrStudys);
foreach($arrStudysJ as $item){
	$arrStudyJ[] = $new['user']->getStudyByStudyid($item['studyid']);
}

$title = $strUser['username'].'的个人主页';
include template("space");
