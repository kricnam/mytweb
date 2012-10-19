<?php include template('header'); ?>

<div class="midder">

<div class="mc">
<div class="cleft">

<div id="db-usr-profile">
<div class="pic">
<a href="<?php echo SITE_URL;?><?php echo tsurl('user','space',array('id'=>$strUser['userid']))?>">
<img alt="<?php echo $strUser['username'];?>" src="<?php echo $strUser['face'];?>">
</a>
</div>
<div class="info">
<h1>
<?php echo $strUser['username'];?>关注的人
</h1>

<!-- <ul>
<li><a href="">小组</a></li>
</ul> -->

</div>
</div>
<div class="clear"></div>


<div class="obss">

<?php foreach((array)$arrFollowUser as $key=>$item) {?>
<dl class="obu"><dt><a class="nbg" href="<?php echo SITE_URL;?><?php echo tsurl('user','space',array('id'=>$item['userid']))?>"><img alt="<?php echo $item['username'];?>" class="m_sub_img" src="<?php echo $item['face'];?>"></a></dt>
<dd><a href="<?php echo SITE_URL;?><?php echo tsurl('user','space',array('id'=>$item['userid']))?>"><?php echo $item['username'];?></a></dd></dl>
<?php }?>
<br clear="all">
</div>



</div>

<div class="cright">

</div>


</div>
</div>
<?php include template('footer'); ?>