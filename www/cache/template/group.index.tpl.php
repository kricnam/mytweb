<?php include template('header'); ?>
<div class="midder">
<div class="mc">

<?php include template('menu'); ?>

<div class="cleft">

<h2><?php echo L::index_allgroup?></h2>

<div>
<div id="group_content">

<?php foreach((array)$arrRecommendGroup as $key=>$item) {?>
<div class="sub-item">
<div class="pic">
<a href="<?php echo SITE_URL;?><?php echo tsurl('group','show',array('id'=>$item['groupid']))?>">
<img src="<?php echo $item['icon_48'];?>" alt="<?php echo $item['groupname'];?>" />
</a>
<div style="background:#F0F0F0;text-align:center;padding:3px 0;">

<?php if(in_array($item['groupid'],$myGroup)) { ?>
<?php echo L::index_joined?>
<?php } else { ?>
<a href="<?php echo SITE_URL;?><?php echo tsurl('group','do',array('ts'=>'join','groupid'=>$item['groupid']))?>">+<?php echo L::index_join?></a>
<?php } ?>

</div>
</div>
<div class="info">
<a href="<?php echo SITE_URL;?><?php echo tsurl('group','show',array('id'=>$item['groupid']))?>"><?php echo $item['groupname'];?></a>  <font color="#999999"><?php echo $item['count_user'];?>人加入</font>             
<p><?php echo $item['groupdesc'];?></p>
</div>
</div>
<?php }?>



<div class="clear"></div>
<div class="page"><?php echo $pageUrl;?></div>
</div>
</div>
</div>

<div class="cright">


<?php if($TS_APP['options'][iscreate]==0 || $TS_USER['user'][isadmin]==1) { ?>
<p class="pl2">&gt; <a href="<?php echo SITE_URL;?><?php echo tsurl('group','create')?>"><?php echo L::index_creategroup?></a></p>
<?php } ?>

<div class="clear"></div>
<h2><?php echo L::index_hottopic?></h2>
<ul class="titles">
<?php foreach((array)$arrTopic as $key=>$item) {?>
<li>
<h3><a href="<?php echo SITE_URL;?><?php echo tsurl('group','topic',array('id'=>$item['topicid']))?>" target="_blank"><?php echo $item['title'];?></a></h3>
<span class="titles-r-grey"><?php echo $item['count_comment'];?></span>
<p class="titles-b">
<span class="titles-b-l"><?php echo L::index_from?>：<a title="<?php echo $item['group']['groupname'];?>" target="_blank" href="<?php echo SITE_URL;?><?php echo tsurl('group','show',array('id'=>$item['groupid']))?>"><?php echo $item['group']['groupname'];?></a>&nbsp;<?php echo L::index_group?>
</span>
</p>
</li>
<?php }?>
</ul>


<div class="clear"></div>

<h2><?php echo L::index_newgroup?></h2>

<div class="line23">
<?php if($arrNewGroup) { ?>
<?php foreach((array)$arrNewGroup as $key=>$item) {?>
<a href="<?php echo SITE_URL;?><?php echo tsurl('group','show',array('id'=>$item['groupid']))?>"><?php echo $item['groupname'];?></a> (<?php echo $item['count_user'];?><?php if($item['uptime']>strtotime(date('Y-m-d 00:00:00'))) { ?>/<font color="orange"><?php echo $item['count_topic_today'];?></font><?php } else { ?><?php } ?>)<br>
<?php }?>
<?php } ?>
</div>

<div class="clear"></div>

<?php doAction('group_index_right_footer',null,'300')?>

</div>
</div>
</div>
<?php include template('footer'); ?>