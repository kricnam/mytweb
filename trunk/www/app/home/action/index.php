<?php
defined('IN_TS') or die('Access Denied.');
$nowtime = date("Y-m-d H:i");
//首页
$title = "首页";
//推荐课程
$arrStudys = $db->fetch_all_assoc("select studyid from ".dbprefix."study where `isrecommend`='1' and `isaudit`='1'  AND class_end_time>'".$nowtime."'  order by addtime desc limit 3");
foreach($arrStudys as $item){
	$arrStudy[] = $new['home']->getStudyByStudyid($item['studyid']);
}
//热门课程
$arrStudysHot = $db->fetch_all_assoc("select studyid from ".dbprefix."study where `isrecommend`='1' and `isaudit`='1'  AND class_end_time>'".$nowtime."' order by count_userdo desc,count_userwish desc limit 3");
foreach($arrStudysHot as $item){
	$arrStudyHot[] = $new['home']->getStudyByStudyid($item['studyid']);
}

//热门标签
$HotTagName = $new['home']->getHotTag();

if($TS_USER['user'] == ''){

	if($_GET){
		header('Location: '.SITE_URL);
	}
	
	$title = $TS_SITE['base']['site_subtitle'];

	include template("index");
	
}else{
 
	include template("index");
	
}
