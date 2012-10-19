<div style="position: relative;">
<div class="top-wp">
<ul class="tabs">
<li><a <?php if($ac=='topic' && $ts=='list') { ?>class="current"<?php } ?> href="<?php echo SITE_URL;?><?php echo tsurl('group','topic',array('ts'=>'list'))?>"><span>帖子</span></a></li>

<?php if($TS_USER['user']['userid']) { ?>
<li><a <?php if($ac=='user' && $strUser['userid']==$TS_USER['user']['userid']) { ?>class="current"<?php } ?> href="<?php echo SITE_URL;?><?php echo tsurl('group','user',array('id'=>$TS_USER['user']['userid']))?>">我的</a></li>
<?php } ?>
<li><a <?php if($ac=='index') { ?>class="current"<?php } ?> href="<?php echo SITE_URL;?><?php echo tsurl('group')?>">小组</a></li>
<li><a <?php if($ac=='photo') { ?>class="current"<?php } ?> href="<?php echo SITE_URL;?><?php echo tsurl('group','photo')?>"><span>图片</span></a></li>
<li><a <?php if($ac=='tag') { ?>class="current"<?php } ?> href="<?php echo SITE_URL;?><?php echo tsurl('group','tag',array('ts'=>'list'))?>"><span>标签</span></a></li>


<li><a <?php if($ac=='cate') { ?>class="current"<?php } ?> href="<?php echo SITE_URL;?><?php echo tsurl('group','cate')?>"><span>分类</span></a></li>

<li style="float:right;"><a style="margin-right:0px;background:#336699;color:#FFFFFF;" href="<?php echo SITE_URL;?><?php echo tsurl('group','add',array('ts'=>'speed'))?>">快速发帖</a></li>

</ul>
</div>


</div>
<div class="clear"></div>