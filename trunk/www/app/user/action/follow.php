<?php
defined('IN_TS') or die('Access Denied.');
/* 
 * 用户被跟随
 */

switch($ts){
	
	//关注
	case "":
	
		$userid = intval($_GET['id']);

		if($new['user']->isUser($userid)==false){

			header("HTTP/1.1 404 Not Found");
			header("Status: 404 Not Found");
			$title = '404';
			include pubTemplate("404");
			exit;

		}

		$strUser = $new['user']->getOneUser($userid);

		if($strUser == '') header("Location: ".SITE_URL."index.php");

		//他跟随的用户
		$followUsers = $db->fetch_all_assoc("select userid_follow from ".dbprefix."user_follow where userid='$userid'");

		if(is_array($followUsers)){
			foreach($followUsers as $item){
				$arrFollowUser[] =  $new['user']->getOneUser($item['userid_follow']);
			}
		}

		$title = $strUser['username'].'关注的人';
		include template("follow");
	
		break;
		
	//关注执行 
	case "do":
	
		$userid = intval($TS_USER['user']['userid']);
		$userid_follow = $_GET['userid'];
		
		if($userid == 0){
			echo json_encode(array(
				'status'=>0,
				'msg'=>'你还没有登录！',
			));
			exit;
		}
		
		if($userid == $userid_follow){
			echo json_encode(array(
				'status'=>0,
				'msg'=>'自己不能关注自己哦',
			));
			exit;
		}
		
		$isFollow = $new['user']->findCount('user_follow',array(
			'userid'=>$userid,
			'userid_follow'=>$userid_follow,
		));
		
		if($isFollow>0){
		
			echo json_encode(array(
				'status'=>1,
				'msg'=>'你已经关注此用户！',
			));
			exit;
		
		}
		
		$new['user']->create('user_follow',array(
			'userid'=>$userid,
			'userid_follow'=>$userid_follow,
		));
		
		echo json_encode(array(
			'status'=>2,
			'msg'=>'关注成功！',
		));
		exit;
	
		break;
		
	//取消关注
	case "un":
	
		$userid = intval($TS_USER['user']['userid']);
		$userid_follow = $_GET['userid'];
		
		if($userid == 0){
			echo json_encode(array(
				'status'=>0,
				'msg'=>'你还没有登录！',
			));
			exit;
		}
		
		$new['user']->delete('user_follow',array(
			'userid'=>$userid,
			'userid_follow'=>$userid_follow,
		));
		
		echo json_encode(array(
			'status'=>1,
			'msg'=>'解除关注成功',
		));
		exit;
		
		break;
	
}