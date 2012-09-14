<?php 
defined('IN_TS') or die('Access Denied.'); 
//首页搜索框
function hottopic(){
	
	$arrHotTopics = aac('group')->hotTopics(1);
	
	echo '<h2>热门话题</h2>';
	echo '<div class="hottopic">';
	echo '<ul>';
	
	foreach($arrHotTopics as $key=>$item){
	
	echo '<li><a href="'.SITE_URL.tsUrl('group','topic',array('id'=>$item['topicid'])).'">'.getsubstrutf8($item['title'],0,20,false).'</a> ('.$item['count_comment'].')</li>';
	
	}
	
	
	echo '</ul>';
	echo '</div>';
	
}

function hottopic_css(){

	echo '<link href="'.SITE_URL.'plugins/home/hottopic/images/style.css" rel="stylesheet" type="text/css" />';

}

addAction('home_index_right','hottopic');
addAction('home_index_css','hottopic_css');