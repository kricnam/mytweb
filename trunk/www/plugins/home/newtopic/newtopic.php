<?php 
defined('IN_TS') or die('Access Denied.'); 
//首页幻灯片插件
function newtopic(){

	$arrTopicId = fileRead('plugins/home/newtopic/data.php');
	
	if($arrTopicId){
	
		foreach($arrTopicId as $key=>$item){
			$arrNewTopics[] = aac('group')->find('group_topics',array(
				'topicid'=>$item,
			));
		}
	
	}else{
	
		$arrNewTopics = aac('group')->findAll('group_topics',"`photo`!='' and `isshow`='0' and `isaudit`='0'",'addtime desc',null,8);
	
	}


	foreach($arrNewTopics as $key=>$item){
	
		$arrNewTopic[] = $item;
		$arrNewTopic[$key]['group']=aac('group')->getOneGroup($item['groupid']);
		$arrNewTopic[$key]['user']=aac('user')->getOneUser($item['userid']);
	
	}
	
	include template('newtopic','newtopic');
	
}

function newtopic_css(){

	echo '<link href="'.SITE_URL.'plugins/home/newtopic/images/style.css" rel="stylesheet" type="text/css" />';

}

addAction('home_index_left','newtopic');
addAction('home_index_css','newtopic_css');