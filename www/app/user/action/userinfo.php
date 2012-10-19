<?php 

$userid = intval($_GET['id']);
$strUser = $new['user']->getOneUser($userid);;

//是否关注
if($TS_USER['user']['userid'] != '' && $TS_USER['user']['userid'] != $strUser['userid']){
	$followNum = $db->once_num_rows("select * from ".dbprefix."user_follow where userid='".$TS_USER['user']['userid']."' and userid_follow='$userid'");
	if($followNum > '0'){
		$strUser['isfollow'] = true;
	}else{
		$strUser['isfollow'] = false;
	}
}else{
	$strUser['isfollow'] = false;
}

//他关注的用户
$followUsers = $db->fetch_all_assoc("select userid_follow from ".dbprefix."user_follow where userid='$userid' order by addtime desc limit 12");
if(is_array($followUsers)){
	foreach($followUsers as $item){
		$arrFollowUser[] =  $new['user']->getOneUser($item['userid_follow']);
	}
}
//本人发布课程数
$Fclassnum = $db->once_num_rows("select * from ".dbprefix."study where userid='".$userid."'");

//本人参加课程数
$Jclassnum = $db->once_num_rows("select * from ".dbprefix."study_users where status=0 and userid='".$userid."'");
