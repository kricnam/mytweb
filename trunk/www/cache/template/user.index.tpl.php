<?php include template('header'); ?>
<!--main-->
<div class="midder">

<div class="mc">

<div class="top10">
<dl>
<dd>
<h3><?php echo L::index_userscore?><span><?php echo L::index_score?></span></h3>
<ul>
<?php foreach((array)$arrScoreUser as $key=>$item) {?>
<?php if($key<='2') { ?>
<li><div class="avatar"><a href="<?php echo SITE_URL;?><?php echo tsurl('user','space',array('id'=>$item['userid']))?>"><img src="<?php echo $item['face'];?>" /></a></div>
<p><em><?php echo $item['count_score'];?></em><a href="<?php echo SITE_URL;?><?php echo tsurl('user','space',array('id'=>$item['userid']))?>"><?php echo $item['username'];?></a></p></li>
<?php } elseif ($key >= '3') { ?>
<li><span><?php echo $key+1?></span><em><?php echo $item['count_score'];?></em><a href="<?php echo SITE_URL;?><?php echo tsurl('user','space',array('id'=>$item['userid']))?>"><?php echo $item['username'];?></a></li>
<?php } ?>
<?php }?>
</ul>
</dd>

<dd>
<h3><?php echo L::index_userfollow?><span><?php echo L::index_follow?></span></h3>
<ul>
<?php foreach((array)$arrFollowUser as $key=>$item) {?>
<?php if($key<='2') { ?>
<li><div class="avatar"><a href="<?php echo SITE_URL;?><?php echo tsurl('user','space',array('id'=>$item['userid']))?>"><img src="<?php echo $item['face'];?>" /></a></div>
<p><em><?php echo $item['count_followed'];?></em><a href="<?php echo SITE_URL;?><?php echo tsurl('user','space',array('id'=>$item['userid']))?>"><?php echo $item['username'];?></a></p></li>
<?php } elseif ($key >= '3') { ?>
<li><span><?php echo $key+1?></span><em><?php echo $item['count_followed'];?></em><a href="<?php echo SITE_URL;?><?php echo tsurl('user','space',array('id'=>$item['userid']))?>"><?php echo $item['username'];?></a></li>
<?php } ?>
<?php }?>
</ul>
</dd>

<dd>
<h3><?php echo L::index_activeusers?><span><?php echo L::index_time?></span></h3>
<ul>
<?php foreach((array)$arrHotUser as $key=>$item) {?>
<?php if($key<='2') { ?>
<li><div class="avatar"><a href="<?php echo SITE_URL;?><?php echo tsurl('user','space',array('id'=>$item['userid']))?>"><img src="<?php echo $item['face'];?>" /></a></div>
<p><em><?php echo getTime($item['uptime'],time())?></em><a href="<?php echo SITE_URL;?><?php echo tsurl('user','space',array('id'=>$item['userid']))?>"><?php echo $item['username'];?></a></p></li>
<?php } elseif ($key >= '3') { ?>
<li><span><?php echo $key+1?></span><em><?php echo getTime($item['uptime'],time())?></em><a href="<?php echo SITE_URL;?><?php echo tsurl('user','space',array('id'=>$item['userid']))?>"><?php echo $item['username'];?></a></li>
<?php } ?>
<?php }?>
</ul>
</dd>

<dd>
<h3><?php echo L::index_newuser?><span><?php echo L::index_time?></span></h3>
<ul>
<?php foreach((array)$arrNewUser as $key=>$item) {?>
<?php if($key<='2') { ?>
<li><div class="avatar"><a href="<?php echo SITE_URL;?><?php echo tsurl('user','space',array('id'=>$item['userid']))?>"><img src="<?php echo $item['face'];?>" /></a></div>
<p><em><?php echo getTime($item['addtime'],time())?></em><a href="<?php echo SITE_URL;?><?php echo tsurl('user','space',array('id'=>$item['userid']))?>"><?php echo $item['username'];?></a></p></li>
<?php } elseif ($key >= '3') { ?>
<li><span><?php echo $key+1?></span><em><?php echo getTime($item['addtime'],time())?></em><a href="<?php echo SITE_URL;?><?php echo tsurl('user','space',array('id'=>$item['userid']))?>"><?php echo $item['username'];?></a></li>
<?php } ?>
<?php }?>
</ul>
</dd>

</dl>
</div>

</div>
</div>

<?php include template('footer'); ?>
