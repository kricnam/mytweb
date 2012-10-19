<?php
$userid = intval($_GET['id']);
$kind = intval($_GET['kind']);
$arrStudystNum = intval($_GET['num']);
$page = isset($_GET['page']) ? intval($_GET['page']) : 1;
//用户空间
include 'userinfo.php';

//课程信息
if($kind==2)
{
	$arrStudys = $new['user']->getStudysByUserid($page,6,$userid);
}else if($kind==1)
{	
	$arrStudys = $new['user']->getStudysByUseridJ($page,6,$userid);
}
//课程总数
foreach($arrStudys as $item){
	$arrStudy[] = $new['user']->getStudyByStudyid($item['studyid']);
}

//分页
$url = tsUrl('user','detail')."&id=".$userid."&kind=".$kind."&num=".$arrStudystNum ."&page=";
$pageUrl = pagination($arrStudystNum, 6, $page, $url);

$title = $strUser['username'].'的个人主页';
include template("detail");
