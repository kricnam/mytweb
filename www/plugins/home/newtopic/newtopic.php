<?php 
defined('IN_TS') or die('Access Denied.'); 
//首页幻灯片插件
function newtopic(){

	$arrNewTopics = aac('group')->findAll('group_topics',"`photo`!='' and `isshow`='0' and `isaudit`='0'",'addtime desc',null,8);
	foreach($arrNewTopics as $key=>$item){
	
		$arrNewTopic[] = $item;
		$arrNewTopic[$key]['group']=aac('group')->getOneGroup($item['groupid']);
		$arrNewTopic[$key]['user']=aac('user')->getOneUser($item['userid']);
	
	}

	echo '<h2>最新帖子</h2>';
	
	foreach($arrNewTopic as $key=>$item){
	
	echo '<div class="mainlist">
			<div class="mainlist_img"><a target="_blank" href="'.SITE_URL.tsUrl('group','topic',array('id'=>$item['topicid'])).'"><img alt="点击进入['.$item['title'].']" src="'.SITE_URL.tsXimg($item['photo'],'topic','110','120',$item['path'],'1').'"></a></div>
			<div class="mainlist_content">
				<h1><a target="_blank" href="'.SITE_URL.tsUrl('group','show',array('id'=>$item['groupid'])).'" class="link1">['.$item['group']['groupname'].']</a> <a target="_blank" href="'.SITE_URL.tsUrl('group','topic',array('id'=>$item['topicid'])).'">'.getsubstrutf8($item['title'],0,20,false).'</a></h1>
				<div class="summary">
					<a target="_blank" href="'.SITE_URL.tsUrl('user','space',array('id'=>$item['user']['userid'])).'">'.$item['user']['username'].'</a> 
					<span>发布于'.date('Y-m-d',$item['addtime']).'</span>&#12288;
					<span class="star level4"></span>
					<div class="height1"></div>'.getsubstrutf8(t($item['content']),0,20).'( <span class="comments"></span><a target="_blank" href="'.SITE_URL.tsUrl('group','topic',array('id'=>$item['topicid'])).'">'.$item['count_comment'].' 评论</a> )
				</div>
			</div>
			<div class="view">
				<div class="viewnum">'.$item['count_view'].'</div>
				<div class="viewed">飘过</div>
				<div class="toview"><a target="_blank" href="'.SITE_URL.tsUrl('group','topic',array('id'=>$item['topicid'])).'">瞟一眼</a></div>
			</div>
		</div>';
	}
	
}

function newtopic_css(){

	echo '<link href="'.SITE_URL.'plugins/home/newtopic/images/style.css" rel="stylesheet" type="text/css" />';

}

addAction('home_index_left','newtopic');
addAction('home_index_css','newtopic_css');