<?php
defined('IN_TS') or die('Access Denied.'); 

//用户是否登录
$userid = aac('user')->isLogin();

switch($ts){
	case "":
		
		$articleid = intval($_GET['articleid']);
		
		$cateid = intval($_GET['cateid']);
		
		$strArticle = $new['article']->find('article',array(
			'articleid'=>$articleid,
		));
		
		$strArticle['title'] = htmlspecialchars($strArticle['title']);
		
		$arrCate = $new['article']->getArrCate();
		
		$title = '修改文章';
		include template('edit');
		break;
		
	case "do":
		
		$articleid = $_POST['articleid'];
		$cateid = $_POST['cateid'];
		$title	= trim($_POST['title']);
		$content = trim($_POST['content']);
		$addtime = time();
		
		//过滤内容开始
		textfilter($title);
		textfilter($content);
		//过滤内容结束
		
		if($title=='' || $content=='') qiMsg("标题和内容都不能为空！");
		
		
		$db->query("update ".dbprefix."article set `cateid`='$cateid',`title`='$title',`content`='$content' where `articleid`='$articleid'");
		
		// 上传帖子图片开始
		$arrUpload = tsUpload($_FILES['picfile'], $articleid, 'article', array('jpg', 'gif', 'png','jpeg'));
		if ($arrUpload) {
			$new['article'] -> update('article', array(
				'articleid' => $articleid,
			), array(
				'path' => $arrUpload['path'],
				'photo' => $arrUpload['url'],
			));
		} 
		// 上传帖子图片结束
		
		header("Location: ".SITE_URL.tsUrl('article','show',array('id'=>$articleid)));
		
		break;
}