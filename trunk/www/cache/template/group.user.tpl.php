<?php include template('header'); ?>

<style>
.mygroup{}
.mygroup ul{}
.mygroup ul li{font-size:14px;padding:5px 0}
</style>

<div class="midder">


<div class="mc">

<?php include template('menu'); ?>

<div class="cleft">

<div id="append">
<div class="topic_list">
<ul> 

<?php foreach((array)$arrTopic as $key=>$item) {?>
   
<li>
<div class="userimg">
<?php if($item['user'][userid] !=$arrTopic[$key-1][user][userid]) { ?>
<a href="<?php echo SITE_URL;?><?php echo tsurl('group','user',array('id'=>$item['user'][userid]))?>"><img src="<?php echo $item['user'][face_32];?>" width="32"></a>
<?php } else { ?>
&nbsp;
<?php } ?>
</div>

<div class="topic_title">
<div class="title">


<?php if($item['appkey'] != 'group' && $item['appkey']!='') { ?>
<a target="_blank" style="color:#999999;font-size: 12px;margin-right: 5px;" class="titles-type" href="<?php echo SITE_URL;?><?php echo tsUrl($item['appkey'])?>">[<?php echo $item['appname'];?>]</a>
<a title="<?php echo $item['title'];?>" href="<?php echo SITE_URL;?><?php echo tsUrl($item['appkey'],$item['appaction'],array('id'=>$item['appid']))?>"><?php echo $item['title'];?></a>
<?php } else { ?>
<a title="<?php echo $item['title'];?>" href="<?php echo SITE_URL;?><?php echo tsurl('group','topic',array('id'=>$item['topicid']))?>"  style="color:<?php echo color($item['color'])?>"><?php echo $item['title'];?></a>
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
<?php if($item['attach']) { ?>
<img src="<?php echo SITE_URL;?>app/<?php echo $app;?>/skins/<?php echo $skin;?>/attach.gif" align="absmiddle" title="[附件]" alt="[附件]" />
<?php } ?> 
<?php if($item['music']) { ?>
<img src="<?php echo SITE_URL;?>public/images/music.gif" align="absmiddle" title="[音乐]" alt="[音乐]" />
<?php } ?> 
<?php if($item['video']) { ?>
<img src="<?php echo SITE_URL;?>public/images/video.gif" align="absmiddle" title="[视频]" alt="[视频]" />
<?php } ?>
<?php if($item['isposts'] == '1') { ?>
<img src="<?php echo SITE_URL;?>public/images/posts.gif" align="absmiddle" title="[精华]" alt="[精华]" />
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
<a href="<?php echo SITE_URL;?><?php echo tsurl('group','show',array('id'=>$item['groupid']))?>"><?php echo $item['group'][groupname];?></a>
</span>

<span style="float:right;">
<?php echo getTime($item['uptime'],time())?>

<a href="<?php echo SITE_URL;?><?php echo tsurl('group','user',array('id'=>$item['userid']))?>" rel="face" uid="<?php echo $item['userid'];?>"><?php echo $item['user'][username];?></a>

<?php if($item['count_comment']>0) { ?><a class="rank" style="color:#FFFFFF;" href="<?php echo SITE_URL;?><?php echo tsurl('group','topic',array('id'=>$item['topicid']))?>"><?php echo $item['count_comment'];?></a><?php } ?>
</span>
</div>
</div>
<div class="clear"></div>
</li>
<?php }?>
</ul>
</div>

<div class="clear"></div>

</div>
</div>

<div class="cright" id="cright">

<a style="float:left;" href="<?php echo SITE_URL;?><?php echo tsurl('user','space',array('id'=>$strUser['userid']))?>"><img src="<?php echo $strUser['face_120'];?>" title="<?php echo $strUser['username'];?>的空间" alt="<?php echo $strUser['username'];?>的空间" width="100" /></a>

<div style="float:left;margin-left:10px;line-height:25px;">
<a href="<?php echo SITE_URL;?><?php echo tsurl('user','space',array('id'=>$strUser['userid']))?>"  rel="face" uid="<?php echo $strUser['userid'];?>"><?php echo $strUser['username'];?></a>
<br />
<?php echo L::user_role?>：<a href="<?php echo SITE_URL;?><?php echo tsurl('user','role')?>"><?php echo $strUser['rolename'];?></a>
<br />
<?php echo L::user_score?>：<?php echo $strUser['count_score'];?>
<br />
<?php if($strUser['isverify']==1) { ?>
<img src="<?php echo SITE_URL;?>public/images/rz1.gif" alt="认证用户" title="认证用户" align="absmiddle" /> 认证用户
<?php } else { ?>
<img src="<?php echo SITE_URL;?>public/images/rz2.gif" alt="未认证用户" title="未认证用户" align="absmiddle" /> <a href="<?php echo SITE_URL;?><?php echo tsurl('user','verify')?>">未认证用户</a>
<?php } ?>
</div>
<style type="text/css">

</style>
<div class="clear"></div>
<h2><?php echo $strUser['username'];?><?php echo L::user_sgroup?><span>(<?php echo $myGroupNum;?>)</span><span style="float:right;" id="loader"></span></h2>
<div class="mygroup">
<div id="loader"></div>
<ul id="module_list">
<input id="orderlist" type="hidden" value="<?php echo $oldordr;?>"/>
<?php foreach((array)$arrMyGroup as $key=>$item) {?>
  <div class="modules" title="<?php echo $item['groupid'];?>">
<li style="position: relative;" class="m_title">

<a href="<?php echo SITE_URL;?><?php echo tsurl('group','show',array('id'=>$item['groupid']))?>"><img alt="<?php echo $item['groupname'];?>" class="m_sub_img" src="<?php echo $item['icon_16'];?>" width="16" align="absmiddle" /></a> <a href="<?php echo SITE_URL;?><?php echo tsurl('group','show',array('id'=>$item['groupid']))?>"><?php echo $item['groupname'];?></a> <span>(<?php echo $item['count_user'];?><?php if($item['uptime']>strtotime(date('Y-m-d 00:00:00'))) { ?>/<font color="orange"><?php echo $item['count_topic_today'];?></font><?php } else { ?><?php } ?>)</span>

<?php if($item['userid']==$TS_USER['user']['userid']) { ?>
<a style=" position: absolute;right: 0;font-size:12px;color:#666666;" href="<?php echo SITE_URL;?><?php echo tsurl('group','edit',array('ts'=>'base','groupid'=>$item['groupid']))?>"><?php echo L::user_edit?></a>
<?php } ?>
</div>
</li>
<?php }?>	
</ul>
</div>

<div class="clear"></div>

<?php if($TS_APP['options'][iscreate]==0 || $TS_USER['user'][isadmin]==1) { ?>
<p class="pl2">&gt; <a href="<?php echo SITE_URL;?><?php echo tsurl('group','create')?>"><?php echo L::user_creategroup?></a></p>
<?php } ?>

<?php doAction('group_my_right_footer',null,'300')?>
</div>
</div>
</div>
<?php include template('footer'); ?>
