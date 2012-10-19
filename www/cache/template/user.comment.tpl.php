<?php include template('header'); ?>

<div class="midder">

<div class="mc">
<h1><?php echo $strUser['username'];?> </h1>
<div class="cleft">

<?php include template('menu'); ?>

<div class="clear"></div>

<ul class="topic">
<?php foreach((array)$arrComment as $key=>$item) {?>
<li><a href="<?php echo SITE_URL;?><?php echo tsurl('group','topic',array('id'=>$item['topicid']))?>"><?php echo htmlspecialchars($item['topic']['title'])?></a> <i><?php echo $item['topic']['count_comment'];?></i>
<br />
<i>“<?php echo nl2br(htmlspecialchars($item['content']))?>”</i>
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