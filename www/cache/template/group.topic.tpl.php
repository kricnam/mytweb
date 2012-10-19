<?php include template('header'); ?>
<?php doAction('xheditor')?>
<div class="midder">
<div class="mc">

<?php include template('menu'); ?>

<div class="cleft">

<h1><?php if($strTopic['typeid'] !='0') { ?><a href="<?php echo SITE_URL;?><?php echo tsurl('group','show',array('id'=>$strTopic['groupid'],typeid=>$strTopic['typeid']))?>">[<?php echo $strTopic['type'][typename];?>]</a><?php } ?><a href="<?php echo SITE_URL;?><?php echo tsurl('group','topic',array('id'=>$strTopic['topicid']))?>"><?php echo $strTopic['title'];?></a></h1>

<?php if($page == '1') { ?>

<div class="topic-content">
<div class="user-face">
<a href="<?php echo SITE_URL;?><?php echo tsurl('group','user',array('id'=>$strTopic['user'][userid]))?>" rel="face" uid="<?php echo $strTopic['user'][userid];?>"><img title="<?php echo $strTopic['user'][username];?>" alt="<?php echo $strTopic['user'][username];?>" src="<?php echo $strTopic['user'][face];?>" width="48"></a>
<br />
<?php doAction('topic_face_footer',$strTopic)?>
</div>
<div class="topic-doc">
<h3>
<span class="color-green"><?php echo date('Y-m-d H:i:s',$strTopic['addtime'])?></span>
<span class="pl20"><?php echo L::topic_from?>：<a href="<?php echo SITE_URL;?><?php echo tsurl('group','user',array('id'=>$strTopic['userid']))?>" rel="face" uid="<?php echo $strTopic['userid'];?>"><?php echo $strTopic['user'][username];?></a></span>
</h3>

<div class="clear"></div>

<div class="topic-view">

<?php if($strTopic['after']) { ?>
<ul class="title2">
<?php foreach((array)$strTopic['after'] as $key=>$item) {?>
<?php if($item['title']) { ?>
<li><a href="#title<?php echo $item['id'];?>"><?php echo $item['title'];?></a></li>
<?php } ?>
<?php }?>
</ul>
<?php } ?>

<?php if($strTopic['photo']) { ?>
<?php if($strTopic['photoshow'] == 1 && $isComment == 0 && $strTopic['userid'] !=$TS_USER['user']['userid']) { ?>
<div class="notice"><?php echo L::topic_displayphoto?></div>
<?php } else { ?>
<a target="_blank" href="<?php echo SITE_URL;?>uploadfile/topic/<?php echo $strTopic['photo'];?>" title="<?php echo $strTopic['title'];?>" alt="<?php echo $strTopic['title'];?>"><img src="<?php echo SITE_URL;?><?php echo tsXimg($strTopic['photo'],'topic',500,'',$strTopic['path'])?>" alt="<?php echo $strTopic['title'];?>" title="<?php echo $strTopic['title'];?>" /></a>
<?php } ?>
<br />
<?php } ?>

<?php if($strTopic['attach']) { ?>
<?php if($strTopic['attachshow'] == 1 && $isComment == 0  && $strTopic['userid'] !=$TS_USER['user']['userid']) { ?>
<div class="notice"><?php echo L::topic_displayattach?></div>
<?php } else { ?>
<div class="attach">
<?php echo L::topic_downattach?>：<a href="<?php echo SITE_URL;?><?php echo tsurl('group','attach',array('ts'=>'down','topicid'=>$strTopic['topicid']))?>"><?php echo $strTopic['attachname'];?>
</a> 
<?php if($TS_USER['user']['userid'] == $strTopic['userid'] || $TS_USER['user']['isadmin']==1) { ?>
<a class="delete" title="删除" alt="删除" href="<?php echo SITE_URL;?>index.php?app=" onclick="return confirm('确定删除吗？')">X</a>
<?php } ?>
</div>
<?php if($strTopic['attachscore']) { ?>[-<?php echo $strTopic['attachscore'];?><?php echo L::topic_score?>]<?php } ?>
<?php } ?>
<br />
<?php } ?>
<?php if($strTopic['music']) { ?>

<p id="audioplayer_1">Alternative content</p>
<script type="text/javascript">  
AudioPlayer.embed("audioplayer_1", {soundFile: "<?php echo $strTopic['music'];?>"});   
</script>
<br />
<?php } ?>

<?php if($strTopic['video']) { ?>

<embed src="<?php echo $strTopic['video'];?>" quality="high" width="480" height="400" align="middle" allowScriptAccess="always" allowFullScreen="true" mode="transparent" type="application/x-shockwave-flash"></embed>
<br />
<?php } ?>

<?php echo $strTopic['content'];?>

</div>

<?php if($TS_USER['user'][userid] == $strTopic['userid'] || $TS_USER['user'][userid]==$strGroup['userid'] ||$strGroupUser['isadmin']=="1" || $TS_USER['user'][isadmin]=="1") { ?>
<p class="btool">
<?php if($TS_USER['user'][userid]==$strGroup['userid'] ||$strGroupUser['isadmin']=="1" || $TS_USER['user'][isadmin]=="1") { ?>
<a href="<?php echo SITE_URL;?>index.php?app=group&ac=do&ts=topic_isclose&topicid=<?php echo $strTopic['topicid'];?>"><?php if($strTopic['isclose']=='0') { ?><?php echo L::topic_close?><?php } else { ?><?php echo L::topic_open?><?php } ?></a> 

<a href="<?php echo SITE_URL;?>index.php?app=group&ac=do&ts=topic_istop&topicid=<?php echo $strTopic['topicid'];?>"><?php if($strTopic['istop']=='0') { ?><?php echo L::topic_top?><?php } else { ?><?php echo L::topic_canceltop?><?php } ?></a> 

<a href="<?php echo SITE_URL;?>index.php?app=group&ac=do&ts=isposts&topicid=<?php echo $strTopic['topicid'];?>"><?php if($strTopic['isposts']==0) { ?><?php echo L::topic_posts?><?php } else { ?><?php echo L::topic_cancelposts?><?php } ?></a>

<a href="<?php echo SITE_URL;?>index.php?app=group&ac=do&ts=topic_isshow&topicid=<?php echo $strTopic['topicid'];?>"><?php if($strTopic['isshow']=='0') { ?><?php echo L::topic_hide?><?php } else { ?><?php echo L::topic_show?><?php } ?></a>

<a href="<?php echo SITE_URL;?>index.php?app=group&ac=topicmove&topicid=<?php echo $strTopic['topicid'];?>"><?php echo L::topic_move?></a>

<?php } ?>
<a href="<?php echo SITE_URL;?>index.php?app=group&ac=topicedit&topicid=<?php echo $strTopic['topicid'];?>"><?php echo L::topic_edit?></a> 
<a href="<?php echo SITE_URL;?>index.php?app=group&ac=do&ts=deltopic&topicid=<?php echo $strTopic['topicid'];?>" onClick="return confirm('<?php echo L::topic_oktodelete?>?')"><?php echo L::topic_delete?></a>

</p>

<div class="clear"></div>

<div class="cmen" style="position:absolute; margin: 10px 230px;display:none;">
<?php foreach((array)$color as $i=>$val) {?>
<a href="<?php echo SITE_URL;?>index.php?app=group&ac=do&&ts=topic_color&topicid=<?php echo $strTopic['topicid'];?>&color=<?php echo $i+1;?>" style="background-color:<?php echo $val;?>"></a>
<?php }?>
</div>
<?php } ?>


<?php foreach((array)$strTopic['after'] as $key=>$item) {?>
<?php if($item['title']) { ?>
<h4><a name="title<?php echo $item['id'];?>"></a><?php echo $item['title'];?></h4>
<?php } ?>
<div class="after-view">
<?php if($item['photo']) { ?>
<a target="_blank" href="<?php echo SITE_URL;?>uploadfile/after/<?php echo $item['photo'];?>" title="<?php echo $strTopic['title'];?>" alt="<?php echo $strTopic['title'];?>">
<img src="<?php echo SITE_URL;?><?php echo tsXimg($item['photo'],'after',500,'',$item['path'])?>" alt="<?php echo $item['title'];?>" title="<?php echo $item['title'];?>" />
</a>
<br />
<?php } ?>

<?php if($item['attach']) { ?>
附件下载：<a href="<?php echo SITE_URL;?>uploadfile/after/<?php echo $item['attach'];?>"><?php echo $item['attachname'];?></a>
<br />
<?php } ?>

<?php echo $item['content'];?>
<?php if($item['userid'] == $TS_USER['user']['userid'] || $TS_USER['user']['isadmin']==1) { ?>
<br />
<p class="btool">
<a href="<?php echo SITE_URL;?><?php echo tsurl('group','after',array('ts'=>'edit','aid'=>$item['id']))?>"><?php echo L::topic_edit?></a>
<a href="<?php echo SITE_URL;?><?php echo tsurl('group','after',array('ts'=>'delete','aid'=>$item['id']))?>" onClick="return confirm('<?php echo L::topic_oktodelete?>?')"><?php echo L::topic_delete?></a>
 <a href="<?php echo SITE_URL;?><?php echo tsurl('group','after',array('ts'=>'up','id'=>$item['id']))?>" onClick="return confirm('确定上移?')">上移</a>
<a href="<?php echo SITE_URL;?><?php echo tsurl('group','after',array('ts'=>'down','id'=>$item['id']))?>" onClick="return confirm('确定下移?')">下移</a> 
</p>
<?php } ?>
</div>
<?php }?>
<div class="clear"></div>
<?php if($strTopic['userid'] == $TS_USER['user']['userid'] || $TS_USER['user']['isadmin']==1) { ?>
<p class="bltool">
<a href="<?php echo SITE_URL;?><?php echo tsurl('group','after',array('topicid'=>$strTopic['topicid']))?>"><?php echo L::topic_afteradd?></a>
</p>
<?php } ?>
</div>
</div>
<div class="clear"></div>

<div style="text-align:right;">
<a id="topiclove" class="bottomA" href="javascript:void('0');" onclick="loveTopic('<?php echo $strTopic['topicid'];?>')"><?php echo $strTopic['count_love'];?>人喜欢</a>
</div>

<div class="clear"></div>


<div class="tags">
<?php foreach((array)$strTopic['tags'] as $key=>$item) {?>
<a rel="tag" title="" class="post-tag" href="<?php echo SITE_URL;?><?php echo tsurl('group','tag',array('name'=>urlencode($item['tagname'])))?>"><?php echo $item['tagname'];?></a>
<?php }?>
<?php if($isGroupUser) { ?>
<a rel="tag" href="javascript:void(0);" onClick="showTagFrom()"><?php echo L::topic_addtag?></a>
<?php } ?>

<p id="tagFrom" style="display:none">
<input style="width:250px;padding:3px 2px;" type="text" name="tags" id="tags" /> <button type="submit" class="subab" onClick="savaTag(<?php echo $topicid;?>)"><?php echo L::topic_add?></button> <a href="javascript:void(0);" onClick="showTagFrom()"><?php echo L::topic_cancel?></a>
</p>
</div>
<div class="clear"></div>

<div>
<?php if($upTopic) { ?><?php echo L::topic_previous?>：<a href="<?php echo SITE_URL;?><?php echo tsurl('group','topic',array('id'=>$upTopic['topicid']))?>"><?php echo $upTopic['title'];?></a><?php } ?>

<?php if($downTopic) { ?><br /><?php echo L::topic_next?>：<a href="<?php echo SITE_URL;?><?php echo tsurl('group','topic',array('id'=>$downTopic['topicid']))?>"><?php echo $downTopic['title'];?></a><?php } ?>
</div>

<div class="clear"></div>

<?php doAction('topic_footer',$strTopic,'468')?>

<?php } ?>

<div class="clear"></div>

<h2><?php echo L::topic_usercomment?><i>(<?php echo $strTopic['count_comment'];?>)</i></h2>

<?php if($page == '1') { ?>
<div style="text-align:right;">
<?php if($sc=='asc') { ?>
<a href="<?php echo SITE_URL;?><?php echo tsurl('group','topic',array('id'=>$topicid,'sc'=>'desc'))?>" rel="nofollow"><?php echo L::topic_desc?></a>
<?php } else { ?>
<a href="<?php echo SITE_URL;?><?php echo tsurl('group','topic',array('id'=>$topicid))?>"><?php echo L::topic_asc?></a>
<?php } ?>
</div>

<?php } ?>

<ul class="comment">
<?php if(is_array($arrTopicComment)) { ?>
<?php foreach((array)$arrTopicComment as $key=>$item) {?>
<li class="clearfix" id="l_<?php echo $item['commentid'];?>">
<div class="user-face">
<a href="<?php echo SITE_URL;?><?php echo tsurl('group','user',array('id'=>$item['user'][userid]))?>" rel="face" uid="<?php echo $item['user'][userid];?>"><img title="<?php echo $item['user'][username];?>" alt="<?php echo $item['user'][username];?>" src="<?php echo $item['user'][face];?>" width="48" /></a>
</div>
<div class="reply-doc">
<h4><?php echo date('Y-m-d H:i:s',$item['addtime'])?>
	<a href="<?php echo SITE_URL;?><?php echo tsurl('group','user',array('id'=>$item['user'][userid]))?>" rel="face" uid="<?php echo $item['user'][userid];?>" style="margin-left:5px; margin-right:5px;"><?php echo $item['user'][username];?></a>
    <i><?php echo $item[l];?>#</i>
</h4>


<?php if($item['referid'] !='0') { ?>
<div class="recomment"><a href="<?php echo SITE_URL;?><?php echo tsurl('group','user',array('id'=>$item['recomment'][user][userid]))?>"><img src="<?php echo $item['recomment'][user][face];?>" width="24" align="absmiddle"></a> <strong><a href="<?php echo SITE_URL;?><?php echo tsurl('group','user',array('id'=>$item['recomment'][user][userid]))?>" rel="face" uid="<?php echo $item['recomment'][user][userid];?>"><?php echo $item['recomment'][user][username];?></a></strong>：<?php echo $item['recomment'][content];?></div>
<?php } ?>
<p>
<?php if($item['photo']) { ?>
<a target="_blank" href="<?php echo SITE_URL;?>uploadfile/comment/<?php echo $item['photo'];?>" title="<?php echo $strTopic['title'];?>" alt="<?php echo $strTopic['title'];?>">
<img src="<?php echo SITE_URL;?><?php echo tsXimg($item['photo'],'comment',500,'',$item['path'])?>" alt="<?php echo $strTopic['title'];?>" title="<?php echo $strTopic['title'];?>" />
</a>
<br />
<?php } ?>

<?php if($item['attach']) { ?>
<?php echo L::topic_downattach?>：<a href="<?php echo SITE_URL;?>uploadfile/comment/<?php echo $item['attach'];?>"><?php echo $item['attachname'];?></a>
<br />
<?php } ?>

<?php echo $item['content'];?>
</p>

<p class="btool">
<?php if($isGroupUser != '0') { ?>
<span><a href="javascript:void(0)"  onclick="commentOpen(<?php echo $item['commentid'];?>,<?php echo $item['topicid'];?>)"><?php echo L::topic_reply?></a></span>
<?php } ?>

<?php if($TS_USER['user'][userid] == $strGroup['userid'] || $TS_USER['user'][userid] == $item['userid'] || $strGroupUser['isadmin']==1 || $TS_USER['user'][isadmin]==1) { ?>
<span><a class="j a_confirm_link" href="<?php echo SITE_URL;?>index.php?app=group&ac=comment&ts=delete&commentid=<?php echo $item['commentid'];?>" rel="nofollow" onClick="return confirm('<?php echo L::topic_oktodelete?>?')"><?php echo L::topic_delete?></a>
</span>
<?php } ?>
</p>


<div id="rcomment_<?php echo $item['commentid'];?>" style="display:none">
<textarea style="width:90%;height:60px;font-size:14px;" id="recontent_<?php echo $item['commentid'];?>" type="text" onKeyDown="keyRecomment(<?php echo $item['commentid'];?>,<?php echo $item['topicid'];?>,event)"></textarea>
<p><a class="submit" href="javascript:void(0);" onClick="recomment(<?php echo $item['commentid'];?>,<?php echo $item['topicid'];?>)" id="recomm_btn_<?php echo $item['commentid'];?>"><?php echo L::topic_submit?></a> <a href="javascript:void('0');" onclick="commentOpen(<?php echo $item['commentid'];?>,<?php echo $item['topicid'];?>)">取消</a></p>
</div>
</div>
<div class="clear"></div>
</li>
<?php }?>
<?php } ?>
</ul>

<div class="page"><?php echo $pageUrl;?></div>

<h2><?php echo L::topic_addcomment?></h2>
<div style="background:#f4f4ec;padding:10px;">
<?php if(intval($TS_USER['user'][userid])==0) { ?>
<div style="border:solid 1px #DDDDDD; text-align:center;padding:20px 0"><a href="<?php echo SITE_URL;?><?php echo tsurl('user','login')?>"><?php echo L::public_login?></a> | <a href="<?php echo SITE_URL;?><?php echo tsurl('user','register')?>"><?php echo L::public_register?></a></div>
<?php } elseif ($isGroupUser == 0) { ?>
不是本组成员不能回应此贴哦
<?php } elseif ($strTopic['iscomment'] == 1 && $strTopic['userid'] != $TS_USER['user'][userid]) { ?>
本帖除作者外不允许任何人评论
<?php } elseif ($strTopic['isclose']=='1') { ?>
该帖子已被关闭，无法评论
<?php } else { ?>

<form method="POST" action="<?php echo SITE_URL;?>index.php?app=group&ac=comment&ts=do" onSubmit="return submitonce(this)" enctype="multipart/form-data">

<table width="100%">
<tr><td width="40" valign="top">内容*</td><td><textarea style="width:96%;height:100px;font-size:14px;" id="bbcodem" name="content"></textarea></td></tr>
<tr><td></td><td><input type="hidden" name="topicid" value="<?php echo $strTopic['topicid'];?>" />
<input class="submit" type="submit" value="提交评论" style="margin:10px 0px" /></td></tr>
</table>
</form>
<?php } ?>

</div>

</div>

<div class="cright">
<p class="pl2"><a href="<?php echo SITE_URL;?><?php echo tsurl('group','show',array('id'=>$strGroup['groupid']))?>"><?php echo L::topic_return?><?php echo $strGroup['groupname'];?></a></p>
<p>
<a class="submit" href="<?php echo SITE_URL;?><?php echo tsurl('group','add',array('id'=>$strGroup['groupid']))?>">
<?php echo L::topic_addpost?>
</a>
</p>

<div>
<h2><?php echo L::topic_wholikethispost?></h2>
<script>topic_collect_user('<?php echo $strTopic['topicid'];?>')</script>
<div id="collects">
<div style="padding:10px;text-align:center;"><img src="<?php echo SITE_URL;?>public/images/loading.gif" /><?php echo L::topic_loading?>......</div>
</div>
</div>

<h2 class="usf"><?php echo L::topic_newtopic?></h2>
<div class="indent newtopic">
<ul>
<?php foreach((array)$newTopic as $key=>$item) {?>
<li>
<?php if($item['appkey'] != 'group' && $item['appkey']!='') { ?>
<a target="_blank" style="color:#999999;font-size: 12px;margin-right: 5px;" class="titles-type" href="<?php echo SITE_URL;?><?php echo tsUrl($item['appkey'])?>">[<?php echo $item['appname'];?>]</a>
<a title="<?php echo $item['title'];?>" href="<?php echo SITE_URL;?><?php echo tsUrl($item['appkey'],$item['appaction'],array('id'=>$item['askid']))?>"><?php echo $item['title'];?></a>
<?php } else { ?>
<a title="<?php echo $item['title'];?>" href="<?php echo SITE_URL;?><?php echo tsurl('group','topic',array('id'=>$item['topicid']))?>"><?php echo getsubstrutf8($item['title'],0,25)?></a> 
<?php } ?>

</li>
<?php }?>
</ul>
</div>

<div class="clear"></div>
<?php doAction('group_topic_right_footer',$strTopic,'300')?>
</div>

</div>
</div>
<?php doAction('group_topic_footer')?>
<?php include template('footer'); ?>