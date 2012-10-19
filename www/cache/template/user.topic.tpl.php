<?php include template('header'); ?>

<div class="midder">

<div class="mc">
<h1><?php echo $strUser['username'];?> </h1>
<div class="cleft">

<?php include template('menu'); ?>

<div class="clear"></div>


<ul class="topic">
<?php foreach((array)$arrTopic as $key=>$item) {?>
<li>

<?php if($item['appkey'] != 'group' && $item['appkey']!='') { ?>
<a target="_blank" style="color:#999999;font-size: 12px;margin-right: 5px;" class="titles-type" href="<?php echo SITE_URL;?><?php echo tsUrl($item['appkey'])?>">[<?php echo $item['appname'];?>]</a>
<a title="<?php echo $item['title'];?>" href="<?php echo SITE_URL;?><?php echo tsUrl($item['appkey'],$item['appaction'],array('id'=>$item['appid']))?>"><?php echo $item['title'];?></a>
<?php } else { ?>
<a href="<?php echo SITE_URL;?><?php echo tsurl('group','topic',array('id'=>$item['topicid']))?>"><?php echo htmlspecialchars($item['title'])?></a> <i><?php echo $item['count_comment'];?></i>
<?php } ?>

</li>
<?php }?>
</ul>

<div class="clear"></div>
<div class="page"><?php echo $pageUrl;?></div>

</div>

<div class="cright">
<?php include template('userinfo'); ?>
</div>

</div>
</div>
<?php include template('footer'); ?>