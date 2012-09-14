<?php 
defined('IN_TS') or die('Access Denied.'); 
//首页登录框
function newgroup(){
	
	$arrNewGroup = aac('group')->getNewGroup('10');
	
	echo '<h2>最新创建小组</h2>';
	echo '<div class="newgroup"><ul>';
	foreach($arrNewGroup as $key=>$item){
	
		echo '<li><a href="'.SITE_URL.tsUrl('group','show',array('id'=>$item['groupid'])).'">'.$item['groupname'].'</a></li>';
	
	}
	
	echo '</ul></div>';
	
}

function newgroup_css(){

	echo '<link href="'.SITE_URL.'plugins/home/newgroup/images/style.css" rel="stylesheet" type="text/css" />';

}

addAction('home_index_right','newgroup');
addAction('home_index_css','newgroup_css');