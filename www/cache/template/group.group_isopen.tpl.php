<?php include template('header'); ?>
<div class="midder">
<div class="mc">
<h1><?php echo $strGroup['groupname'];?></h1>
<div class="cleft">
<div class="infobox">

<div class="bd"><img align="left" alt="<?php echo $strGroup['groupname'];?>" src="<?php echo $strGroup['icon_48'];?>" class="pil groupicon" valign="top" />
<p>创建于：<?php echo date('Y-m-d',$strGroup['addtime'])?>&nbsp; &nbsp; 组长：<a href="<?php echo SITE_URL;?><?php echo tsurl('group','user',array('id'=>$strLeader['userid']))?>"><?php echo $strLeader['username'];?></a><br></p>
<?php echo $strGroup['groupdesc'];?>
<div class="clearfix" style="margin-top: 10px;">

<?php if($strGroup['joinway']==0) { ?>
<span class="fright mr5 color-gray"><a rel="nofollow" class="submit" href="<?php echo SITE_URL;?><?php echo tsurl('group','do',array('ts'=>'join','groupid'=>$strGroup['groupid']))?>">加入小组</a></span>
<?php } ?>

</div>
</div>

</div>

<div>
<p>加入方式: <?php if($strGroup['joinway']==0) { ?>自由加入<?php } elseif ($strGroup['joinway']==1) { ?>邀请加入<?php } else { ?>不允许加入<?php } ?> 

浏览权限: 
<?php if($strGroup['isopen']==0) { ?>
完全开放
<?php } else { ?>
仅组员
<?php } ?>

</p>
<p>成员：<?php echo $strGroup['count_user'];?>  帖子：<?php echo $strGroup['count_topic'];?></p>
</div>

</div>


<div class="cright">

<p class="pl">本页永久链接：<br />
<a href="<?php echo SITE_URL;?><?php echo tsurl('group','show',array('id'=>$strGroup['groupid']))?>"><?php echo $TS_SITE['base'][site_url];?><?php echo tsurl('group','show',array('id'=>$strGroup['groupid']))?></a></p>

</div>
</div>
</div>

<?php include template('footer'); ?>