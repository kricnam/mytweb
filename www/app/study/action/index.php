<?php 
defined('IN_TS') or die('Access Denied.');
date_default_timezone_set('PRC');
//调出课程类型
$arrStudyType = fileRead('data/study_types.php');
//时间类型
$_SCONFIG['date_range'] = array(
		array('d_min'=>date(), 'd_max'=>date(),'price_desc'=>'今天'),
		array('d_min'=>10, 'd_max'=>15,'price_desc'=>'周末'),
		array('d_min'=>date('Y-m-d',date()-7), 'd_max'=>date(),'price_desc'=>'最近一周'),
);

$typeid = isset($_GET['typeid'])?$_GET['typeid']:'-1';
if($typeid == -1){
	//课程首页
	$page = isset($_GET['page']) ? intval($_GET['page']) : 1;
	$url = "index.php?app=study&page=";
	$arrStudys = $new['study']->getStudys($page,6);
	foreach($arrStudys as $item){
		$arrStudy[] = $new['study']->getStudyByStudyid($item['studyid']);
	}
	$arrStudystNum = $new['study']->getStudysNum($typeid);
	$pageUrl = pagination($arrStudystNum, 6, $page, $url);
		
	//活动小组
	$arrStudyGroup = $db->fetch_all_assoc("select groupid from ".dbprefix."study_group_index group by groupid");
	if(is_array($arrStudyGroup)){
		foreach($arrStudyGroup as $item){
			$arrGroup[] = aac('group')->getOneGroup($item['groupid']);
		}
	}	
	$title = '课程';		
}else if($typeid == 0){
	$page = isset($_GET['page']) ? intval($_GET['page']) : 1;
	$url = "index.php?app=study&ac=index&typeid=".$typeid."&page=";
	$arrStudys = $new['study']->getStudys($page,6);
	foreach($arrStudys as $item){
		$arrStudy[] = $new['study']->getStudyByStudyid($item['studyid']);
	}
	$arrStudystNum = $new['study']->getStudysNum($typeid);
	$pageUrl = pagination($arrStudystNum, 6, $page, $url);
	$title = '所有类型';
}else{
	$strType = $db->once_fetch_assoc("select * from ".dbprefix."study_type where typeid='$typeid'");
	//调出类型下面的课程
	$page = isset($_GET['page']) ? intval($_GET['page']) : 1;
	$url = "index.php?app=study&ac=index&typeid=".$typeid."&page=";
	$arrStudys = $new['study']->getStudys($page,6,$typeid);
	foreach($arrStudys as $item){
		$arrStudy[] = $new['study']->getStudyByStudyid($item['studyid']);
	}
	$arrStudystNum = $new['study']->getStudysNum($typeid);
	$pageUrl = pagination($arrStudystNum, 6, $page, $url);	
	$title = $strType['typename'];
}
include template("index");