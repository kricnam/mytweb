<?php 
defined('IN_TS') or die('Access Denied.'); 
//首页登录框
function activeusers(){
	
	$arractiveusers = aac('user')->getHotUser('12');
	
	echo '<div class="side-title">
	      <h2>活跃用户</h2>';
	echo '</div>
	<div class="indent obssin"><ul>';
	foreach($arractiveusers as $key=>$item){
	
		//echo '<li><a href="'.SITE_URL.tsUrl('user','space',array('id'=>$item['userid'])).'">'.$item['username'].'</a><img src="'.$item['face'].'" /></li>';
	echo '<dl class="pack_u"><dt><a href="'.SITE_URL.tsUrl('user','space',array('id'=>$item['userid'])).'"><img alt="'.$item['username'].'" class="m_sub_img" src="'.$item['face'].'" width="48" /></a></dt>
<dd><a href="'.SITE_URL.tsUrl('user','space',array('id'=>$item['userid'])).'">'.$item['username'].'</a>
</dd>
</dl>';
	}
	
	echo '</ul></div>';

	
	
	
}

function activeusers_css(){

	echo '';

}

addAction('home_index_right','activeusers');
addAction('home_index_css','activeusers_css');