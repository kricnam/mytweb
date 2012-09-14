<?php 
defined('IN_TS') or die('Access Denied.'); 
//推荐小组
function recommendgroup(){
	
	$arrRecommendGroup = aac('group')->getRecommendGroup('12');
	
	echo '<h2>推荐小组</h2>';
	
	foreach($arrRecommendGroup as $key=>$item){
	echo '<div class="sub-item">
	<div class="pic">
	<a href="'.SITE_URL.tsUrl('group','show',array('id'=>$item[groupid])).'">
	<img src="'.$item['icon_48'].'" alt="'.$item['groupname'].'">
	</a>
	</div>
	<div class="info">
	<a href="'.SITE_URL.tsUrl('group','show',array('id'=>$item[groupid])).'">'.$item['groupname'].'</a> ('.$item['count_user'].')             
	<p>'.getsubstrutf8(t($item['groupdesc']),0,50).'</p>
	</div>
	</div>';
	}

	
	
}

function recommendgroup_css(){

	echo '<link href="'.SITE_URL.'plugins/home/recommendgroup/images/style.css" rel="stylesheet" type="text/css" />';

}

addAction('home_index_left','recommendgroup');
addAction('home_index_css','recommendgroup_css');