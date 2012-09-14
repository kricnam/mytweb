<?php
defined('IN_TS') or die('Access Denied.');

//列表 
$page = isset($_GET['page']) ? intval($_GET['page']) : 1;
$url = SITE_URL.tsUrl('article','index',array('page'=>''));
$lstart = $page*10-10;

$arrArticles = $db->fetch_all_assoc("select * from ".dbprefix."article where `isaudit`='0' order by addtime desc limit $lstart, 10");

$articleNum = $db->once_fetch_assoc("select count(*) from ".dbprefix."article where `isaudit`='0'");

$pageUrl = pagination($articleNum['count(*)'], 10, $page, $url);

foreach($arrArticles as $key=>$item){
	$arrArticle[] = $item;
	$arrArticle[$key]['content'] = getsubstrutf8(t($item['content']),0,100);
	$arrArticle[$key]['user'] = aac('user')->getOneUser($item['userid']);
	$arrArticle[$key]['cate'] = $new['article']->getOneCate($item['cateid']);
}

//分类 
$arrCate = $new['article']->getArrCate();

$title = '文章';

include template('index');