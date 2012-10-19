<?php
defined('IN_TS') or die('Access Denied.');
$studyid = intval($_GET['studyid']);

//课程信息
$strStudy = $new['study']->getStudyByStudyid($studyid);
$strStudy['user'] = simpleUser($strStudy['userid']);
$strStudy['content'] = BBCode2Html($strStudy['content']);
$strStudy['teachercontent'] = BBCode2Html($strStudy['teachercontent']);
$nowtime = date("Y-m-d H:i");

//标签
$tag = $new['study']->getObjTagByObjid('study','studyid',$studyid);

//wishdo
if($TS_USER['user']['userid'] != ''){
	$isStudyUser = $db->once_num_rows("select * from ".dbprefix."study_users where studyid='".$strStudy['studyid']."' and userid='".$TS_USER['user']['userid']."'");
	$strStudyUser = $db->once_fetch_assoc("select * from ".dbprefix."study_users where studyid='".$strStudy['studyid']."' and userid='".$TS_USER['user']['userid']."'");
}

//组织者
$arrOrganizers= $db->fetch_all_assoc("select userid from ".dbprefix."study_users where studyid='".$strStudy['studyid']."' and isorganizer='1'");
if(is_array($arrOrganizers)){
	foreach($arrOrganizers as $item){
		$arrOrganizer[] = simpleUser($item['userid']);
	}
}

//参加这个课程的成员
$arrDoUsers = $db->fetch_all_assoc("select userid from ".dbprefix."study_users where studyid='".$strStudy['studyid']."' and status='0' order by addtime");
if(is_array($arrDoUsers)){
	foreach($arrDoUsers as $item){
		$arrDoUser[] = aac('user')->getOneUser($item['userid']);
	}
}

//对这个活动感兴趣的人
$arrWishUsers = $db->fetch_all_assoc("select userid from ".dbprefix."study_users where studyid='".$strStudy['studyid']."' and status='1' order by addtime");
if(is_array($arrWishUsers)){
	foreach($arrWishUsers as $item){
		$arrWishUser[] = aac('user')->getOneUser($item['userid']);
	}
}

//哪些小组正在分享这个活动
$arrGroups = $db->fetch_all_assoc("select groupid from ".dbprefix."study_group_index where studyid='$studyid'");
if(is_array($arrGroups)){
	foreach($arrGroups as $item){
		$arrGroup[] = aac('group')->getOneGroup($item['groupid']);
	}
}

//本人发布课程数 
$classnum = $db->once_num_rows("select * from ".dbprefix."study where userid='".$strStudy['userid']."'");


//评论
$page = isset($_GET['page']) ? intval($_GET['page']) : 1;
$url = "index.php?app=study&ac=show&studyid=".$strStudy['studyid']."&page=";
$arrContentComment = $new['study']->getStudyComment($page,15,$studyid);
if(is_array($arrContentComment)){
	foreach($arrContentComment as $key=>$item){
		$arrStudyComment[] = $item;		
		$arrStudyComment[$key]['content'] =  editor2html($item['content']);
	}
}
$studyCommentNum = $new['study']->getStudyCommentNum('studyid',$studyid);
$pageUrl = pagination($studyCommentNum, 15, $page, $url);

$title = $strStudy['title'];
include template("show");

function simpleUser($userid){
	global $db;
	$userData = $db->once_fetch_assoc("select userid,username from ".dbprefix."user_info where userid='$userid'");
	return $userData;
}
function getPhotoById($photoid){
	global $db;
	$strPhoto = $db->once_fetch_assoc("select * from ".dbprefix."app_photo where photoid='$photoid'");
	
	return $strPhoto['photourl'];
}