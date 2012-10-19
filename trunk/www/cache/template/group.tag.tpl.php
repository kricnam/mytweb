<?php include template('header'); ?>

<div class="midder">

<div class="mc">
<h1><a href="<?php echo SITE_URL;?><?php echo tsurl('group','tag',array(name=>$strTag['tagname']))?>"><?php echo $strTag['tagname'];?></a></h1>
<div class="cleft">

<div class="clear"></div>

<div class="topic_list">
<ul>
<?php if($arrTopic) { ?>
<?php foreach((array)$arrTopic as $key=>$item) {?>
<li>
<div class="userimg"><a href="<?php echo SITE_URL;?><?php echo tsurl('group','user',array('id'=>$item['user'][userid]))?>"><img src="<?php echo $item['user'][face_32];?>" width="32"></a></div>

<div class="topic_title">
<div class="title"><a title="<?php echo $item['title'];?>" href="<?php echo SITE_URL;?><?php echo tsurl('group','topic',array('id'=>$item['topicid']))?>"><?php echo $item['title'];?></a>
<?php if($item['istop']=='1') { ?><img src="<?php echo SITE_URL;?>app/<?php echo $app;?>/skins/<?php echo $skin;?>/headtopic_1.gif" title="[置顶]" alt="[置顶]" /> <?php } elseif ($item['addtime']>strtotime(date('Y-m-d 00:00:00'))) { ?><img src="<?php echo SITE_URL;?>app/<?php echo $app;?>/skins/<?php echo $skin;?>/topic_new.gif" align="absmiddle"  title="[新帖]" alt="[新帖]" /><?php } else { ?><img src="<?php echo SITE_URL;?>app/<?php echo $app;?>/skins/<?php echo $skin;?>/topic.gif" align="absmiddle"  title="[帖子]" alt="[帖子]" /><?php } ?> <?php if($item['isphoto']=='1') { ?><img src="<?php echo SITE_URL;?>app/<?php echo $app;?>/skins/<?php echo $skin;?>/image_s.gif" title="[图片]" alt="[图片]" align="absmiddle" /><?php } ?> <?php if($item['isattach'] == '1') { ?><img src="<?php echo SITE_URL;?>app/<?php echo $app;?>/skins/<?php echo $skin;?>/attach.gif" title="[附件]" alt="[附件]" /><?php } ?>
</div>

<div class="topic_info">
<span style="float:left;">
<a href="<?php echo SITE_URL;?><?php echo tsurl('group','show',array('id'=>$item['groupid']))?>"><?php echo $item['group'][groupname];?></a>
</span>

<span style="float:right;">
<?php echo getTime($item['uptime'],time())?>

<a href="<?php echo SITE_URL;?><?php echo tsurl('group','user',array('id'=>$item['userid']))?>"><?php echo $item['user'][username];?></a>

<?php if($item['count_comment']>0) { ?><a class="rank" style="color:#FFFFFF;" href="<?php echo SITE_URL;?><?php echo tsurl('group','topic',array('id'=>$item['topicid']))?>"><?php echo $item['count_comment'];?></a><?php } ?>
</span>
</div>
</div>
<div class="clear"></div>
</li>	
<?php }?>
<?php } ?>
</ul>
</div>

<div class="page"><?php echo $pageUrl;?></div>

<div class="clear"></div>

</div>

<div class="cright">

<div class="tags">
<h2>热门标签</h2>
<ul>
<?php foreach((array)$arrTag as $key=>$item) {?>
<li><a class="post-tag" href="<?php echo SITE_URL;?><?php echo tsurl('group','tag',array('name'=>urlencode($item['tagname'])))?>"><?php echo $item['tagname'];?></a>×<?php echo $item['count_topic'];?></li>
<?php }?>
</ul>
</div>

</div>
</div>
</div>


<?php include template('footer'); ?>