<?php include template('header'); ?>
<div class="midder">

<div class="mc">

<?php include template('menu'); ?>

<div class="cleft" style="position: relative;">
<h1><a href="<?php echo SITE_URL;?><?php echo tsurl('group','show',array('id'=>$strGroup['groupid']))?>"><?php echo $strGroup['groupname'];?></a> </h1>
<div class="clear"></div>
<div class="box">

<div class="box_content">

<!--帖子分类-->
<div class="topictype">
<ul>
<li <?php if($typeid=="0") { ?>class="on"<?php } ?>><a href="<?php echo SITE_URL;?><?php echo tsurl('group','show',array('id'=>$strGroup['groupid']))?>"><span><?php echo L::show_all?></span></a></li>
<?php foreach((array)$arrTopicType as $key=>$item) {?>
<li <?php if($typeid==$item['typeid']) { ?>class="on"<?php } ?>><a href="<?php echo SITE_URL;?><?php echo tsurl('group','show',array('id'=>$strGroup['groupid'],typeid=>$item['typeid']))?>"><span><?php echo $item['typename'];?></span></a></li>
<?php }?>
</ul>
</div>
<div class="clear"></div>



<div class="topic_list">
<ul>

<?php foreach((array)$arrTopic as $key=>$item) {?>
<li>
<div class="userimg">
<?php if($item['user'][userid] !=$arrTopic[$key-1][user][userid]) { ?>
<a href="<?php echo SITE_URL;?><?php echo tsurl('group','user',array('id'=>$item['user'][userid]))?>" rel="face" uid="<?php echo $item['user']['userid'];?>"><img src="<?php echo $item['user'][face_32];?>" width="32" /></a>
<?php } else { ?>
&nbsp;
<?php } ?>
</div>

<div class="topic_title">
<div class="title">
<?php if($item['typeid'] != 0) { ?><a href="<?php echo SITE_URL;?><?php echo tsurl('group','show',array('id'=>$item['groupid'],typeid=>$item['typeid']))?>">[<?php echo $item['typename'];?>]</a><?php } ?>

<?php if($item['appkey'] != 'group' && $item['appkey']!='') { ?>
<a target="_blank" style="color:#999999;font-size: 12px;margin-right: 5px;" class="titles-type" href="<?php echo SITE_URL;?><?php echo tsUrl($item['appkey'])?>">[<?php echo $item['appname'];?>]</a>
<a title="<?php echo $item['title'];?>" href="<?php echo SITE_URL;?><?php echo tsUrl($item['appkey'],$item['appaction'],array('id'=>$item['appid']))?>"><?php echo $item['title'];?></a>
<?php } else { ?>
<a title="<?php echo $item['title'];?>" href="<?php echo SITE_URL;?><?php echo tsurl('group','topic',array('id'=>$item['topicid']))?>"><?php echo $item['title'];?></a>
<?php } ?>

<?php if($item['istop']=='1') { ?>
<img src="<?php echo SITE_URL;?>app/<?php echo $app;?>/skins/<?php echo $skin;?>/headtopic_1.gif" title="[置顶]" alt="[置顶]" /> 
<?php } ?>
<?php if($item['addtime']>strtotime(date('Y-m-d 00:00:00'))) { ?>
<img src="<?php echo SITE_URL;?>app/<?php echo $app;?>/skins/<?php echo $skin;?>/topic_new.gif" align="absmiddle"  title="[新帖]" alt="[新帖]" />
<?php } ?> 

<?php if($item['photo']) { ?>
<img src="<?php echo SITE_URL;?>app/<?php echo $app;?>/skins/<?php echo $skin;?>/image_s.gif" title="[图片]" alt="[图片]" align="absmiddle" />
<?php } ?> 

<?php if($item['attach']) { ?><img src="<?php echo SITE_URL;?>app/<?php echo $app;?>/skins/<?php echo $skin;?>/attach.gif" title="[附件]" alt="[附件]" />
<?php } ?>

<?php if($item['isposts'] == '1') { ?>
<img src="<?php echo SITE_URL;?>public/images/posts.gif" title="[精华]" alt="[精华]" />
<?php } ?>

<?php if($item['thread_type']=='music') { ?>
<img src="<?php echo SITE_URL;?>public/images/music.gif" align="absmiddle"  title="[音乐]" alt="[音乐]" />
<?php } ?>
<?php if($item['thread_type']=='vote') { ?>
<img src="<?php echo SITE_URL;?>public/images/vote.gif" align="absmiddle"  title="[投票]" alt="[投票]" />
<?php } ?>

</div>
<div class="topic_info">
<span style="float:left;">
<?php echo getTime($item['uptime'],time())?>
</span>

<span style="float:right;">
<a href="<?php echo SITE_URL;?><?php echo tsurl('group','user',array('id'=>$item['userid']))?>"  rel="face" uid="<?php echo $item['user']['userid'];?>"><?php echo $item['user'][username];?></a>

<?php if($item['count_comment']>0) { ?><a class="rank" style="color:#FFFFFF;" href="<?php echo SITE_URL;?><?php echo tsurl('group','topic',array('id'=>$item['topicid']))?>"><?php echo $item['count_comment'];?></a><?php } ?>
</span>
</div>
</div>
<div class="clear"></div>
</li>	
<?php }?>

</ul>
</div>


<div class="page"><?php echo $pageUrl;?></div>

</div>
</div>


<!--发布帖子-->
<div style="position: absolute;right: 40px;;top: 10px;"><a class="submit" href="<?php echo SITE_URL;?><?php echo tsurl('group','add',array('id'=>$strGroup['groupid']))?>"><?php echo L::show_addpost?></a></div>
</div>


<div class="cright">


<div class="infobox">

<div class="bd">
<img align="left" alt="<?php echo $strGroup['groupname'];?>" src="<?php echo $strGroup['icon_48'];?>" class="pil mr5 groupicon" valign="top" />
<div>
<?php echo $strGroup['groupname'];?>
<br />
<?php echo L::show_foundedin?><?php echo date('Y-m-d',$strGroup['addtime'])?>
<br />
<?php echo L::show_leader?>：<a href="<?php echo SITE_URL;?><?php echo tsurl('group','user',array('id'=>$strLeader['userid']))?>"  rel="face" uid="<?php echo $strLeader['userid'];?>"><?php echo $strLeader['username'];?></a>
</div>
<div class="clear"></div>

<div style="line-height: 23px;">
<?php echo $strGroup['groupdesc'];?>
</div>

<div class="clearfix" style="margin-top: 10px;">
<?php if($isGroupUser > 0 && $TS_USER['user'][userid] != $strGroup['userid']) { ?>
<span class="fleft mr5 color-gray"><?php echo L::show_Imthegroup?><?php echo $strGroup['role_user'];?> <a class="j a_confirm_link" href="<?php echo SITE_URL;?><?php echo tsurl('group','do',array('ts'=>'exit','groupid'=>$strGroup['groupid']))?>" style="margin-left: 6px;">&gt;<?php echo L::show_exitgroup?></a></span>
<?php } elseif ($isGroupUser > 0 && $TS_USER['user'][userid] == $strGroup['userid']) { ?>
<span class="fleft mr5 color-gray"><?php echo L::show_Imthegroup?><?php echo $strGroup['role_leader'];?></span>
<?php } elseif ($strGroup['joinway'] == '0') { ?>
<span><a class="submit" href="<?php echo SITE_URL;?><?php echo tsurl('group','do',array('ts'=>'join','groupid'=>$strGroup['groupid']))?>"><?php echo L::show_join?></a></span>

<?php } else { ?>
<span class="fright"><?php echo L::show_groupbarred?></span>
<?php } ?>


</div>
</div>

</div>



<div>
<h2><?php echo L::show_newmembers?></h2>

<?php foreach((array)$arrGroupUser as $key=>$item) {?>
<dl class="obu">
<dt><a href="<?php echo SITE_URL;?><?php echo tsurl('group','user',array('id'=>$item['userid']))?>" rel="face" uid="<?php echo $item['userid'];?>"><img alt="<?php echo $item['username'];?>" class="m_sub_img" src="<?php echo $item['face'];?>" width="48" /></a></dt>
<dd><?php echo $item['username'];?></dd></dl>
<?php }?>
<br clear="all">

<?php if($strGroup['joinway']==1 && $strGroup['userid'] == $TS_USER['user']['userid']) { ?>
<p>
<form method="post" action="<?php echo SITE_URL;?><?php echo tsurl('group','do',array('ts'=>'invite'))?>">
<input type="text" name="userid" value="" /> 
<input type="hidden" name="groupid" value="<?php echo $strGroup['groupid'];?>" />
<input class="submit" type="submit" value="<?php echo L::show_invite?>" /></p>
</form>
<?php } ?>

<?php if($TS_USER['user'][userid] == $strGroup['userid'] || $TS_USER['user']['isadmin']=='1') { ?>
<p class="pl2">&gt; <a href="<?php echo SITE_URL;?><?php echo tsurl('group','edit',array(groupid=>$strGroup['groupid'],ts=>base))?>"><?php echo L::show_groupsetting?> </a></p>

<p class="pl2">&gt; <a href="<?php echo SITE_URL;?><?php echo tsurl('group','audit',array('groupid'=>$strGroup['groupid']))?>">帖子审核</a>(<?php echo $strGroup['count_topic_audit'];?>)</p>

<p class="pl2">&gt; <a href="<?php echo SITE_URL;?><?php echo tsurl('group','show',array('id'=>$strGroup['groupid'],'isshow'=>'1'))?>"><?php echo L::show_recovery?> </a>(<?php echo $strGroup['recoverynum'];?>)</p>

<?php } ?>

<p class="pl2">&gt; <a href="<?php echo SITE_URL;?><?php echo tsurl('group','guser',array(groupid=>$strGroup['groupid']))?>"><?php echo L::show_groupmembers?>  </a>(<?php echo $strGroup['count_user'];?>)</p>

<div class="clear"></div>
</div>

<p class="pl"><span class="feed"><a href="<?php echo SITE_URL;?><?php echo tsurl('group','rss',array(groupid=>$strGroup['groupid']))?>">feed: rss 2.0</a></span></p>

<div class="clear"></div>
<?php doAction('group_group_right_footer',$strTopic,'300')?>

</div>
</div>
</div>

<?php include template('footer'); ?>