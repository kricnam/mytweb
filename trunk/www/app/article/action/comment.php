<?php 
defined('IN_TS') or die('Access Denied.');

//用户是否登录
$userid = aac('user')->isLogin();

switch($ts){

	case "do":
		$articleid = $_POST['articleid'];
		$content = trim($_POST['content']);
		if($content == '') qiMsg("内容不能为空！");
		
		$addtime = time();
		
		$db->query("insert into ".dbprefix."article_comment (`articleid`,`userid`,`content`,`addtime`) values ('$articleid','$userid','$content','$addtime')");
		
		$strArticle = $db->once_fetch_assoc("select userid,title from ".dbprefix."article where `articleid`='$articleid'");
		
		//发消息
		//msg start
		$msg_userid = '0';
		$msg_touserid = $strArticle['userid'];
		$msg_content = '你的文章：《'.$strArticle['title'].'》有人评论啦，快去看看吧^_^ <br />'.SITE_URL.tsUrl('article','show',array('id'=>$articleid));
		aac('message')->sendmsg($msg_userid,$msg_touserid,$msg_content);
		//msg end
		
		header("Location: ".SITE_URL.tsUrl('article','show',array('id'=>$articleid)));
		
		break;
}