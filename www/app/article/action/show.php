<?php 
defined('IN_TS') or die('Access Denied.');
$articleid = intval($_GET['id']);

$strArticle = $db->once_fetch_assoc("select * from ".dbprefix."article where articleid='$articleid'");

$strArticle['tags'] = aac('tag')->getObjTagByObjid('article','articleid',$articleid);
$strArticle['content'] = BBCode2Html($strArticle['content']);
$strArticle['user']	= aac('user')->getOneUser($strArticle['userid']);
$strArticle['cate'] = $new['article']->getOneCate($strArticle['cateid']);

//获取评论
$page = isset($_GET['page']) ? intval($_GET['page']) : 1;
$url = SITE_URL.tsUrl('article','show',array('id'=>$articleid,'page'=>''));
$lstart = $page*10-10;
$arrComments = $db->fetch_all_assoc("select * from ".dbprefix."article_comment where `articleid`='$articleid' order by addtime desc limit $lstart,10");
foreach($arrComments as $key=>$item){
	$arrComment[] = $item;
	$arrComment[$key]['user'] = aac('user')->getOneUser($item['userid']);
	$arrComment[$key]['content']=BBCode2Html($item['content']);
}
$commentNum = $db->once_fetch_assoc("select count(*) from ".dbprefix."article_comment where `articleid`='$articleid'");
$pageUrl = pagination($commentNum['count(*)'], 10, $page, $url);

if($page > 1){
	$title = $strArticle['title'].' - 第'.$page.'页 - '.$strArticle['cate']['catename'];
}else{
	$title = $strArticle['title'].' - '.$strArticle['cate']['catename'];
}

include template('show');