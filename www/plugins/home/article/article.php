<?php 
defined('IN_TS') or die('Access Denied.'); 
//首页登录框
function article(){
	
	$arrArticle = aac('article')->findAll('article',array('isaudit'=>0),'addtime desc',null,10);
	
	include template('article','article');
	
}



addAction('home_index_right','article');