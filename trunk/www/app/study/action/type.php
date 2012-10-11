<?php 
defined('IN_TS') or die('Access Denied.');
//活动类型

$typeid = $_GET['typeid'];
//调出活动类型
$arrStudyType = fileRead('data/study_types.php');


if($typeid == 0){
	$arrStudy = $db->fetch_all_assoc("select studyid from ".dbprefix."study order by addtime desc");
	if(is_array($arrStudy)){
		foreach($arrStudy as $item){
			$arrstudy[] = $new['study']->getStudyByStudyid($item['studyid']);
		}
	}
	$title = '所有类型';
}else{
	$strType = $db->once_fetch_assoc("select * from ".dbprefix."study_type where typeid='$typeid'");
	//调出类型下面的课程
	$arrStudy = $db->fetch_all_assoc("select studyid from ".dbprefix."study where typeid='$typeid' order by addtime desc");
	if(is_array($arrStudy)){
		foreach($arrStudy as $item){
			$arrstudy[] = $new['study']->getStudyByStudyid($item['studyid']);
		}
	}
	
	$title = $strType['typename'];
}

include template("type");