<?php include template('header'); ?>

<div class="midder">

<div class="mc">
<h1><?php echo $strUser['username'];?> </h1>
<div class="cleft">

<?php include template('menu'); ?>

<div class="clear"></div>

<?php if(intval($TS_USER['user']['userid']) >0 && intval($TS_USER['user']['userid']) != $strUser['userid']) { ?>
<div class="guest">
<img src="<?php echo SITE_URL;?>public/images/user_normal.jpg" />
<form method="post" action="<?php echo SITE_URL;?>index.php?app=user&ac=guestbook&ts=do">
<textarea style="width:100%;" name="content"></textarea>
<br />
<input type="hidden" name="touserid" value="<?php echo $strUser['userid'];?>" />
<input class="submit" type="submit" value="添加留言" />
</form>
</div>
<?php } ?>
<div class="clear"></div>

<!--回复-->
<div id="reguest" style="display:none;">
<form method="post" action="<?php echo SITE_URL;?>index.php?app=user&ac=guestbook&ts=redo">
<textarea style="width:100%" name="content"></textarea>
<br />
<input id="touserid" type="hidden" name="touserid" value="0" />
<input id="reid" type="hidden" name="reid" value="0" />
<input class="submit" type="submit" value="回复" />
</form>
</div>

<div class="glist">
<ul>

<?php foreach((array)$arrGuestList as $key=>$item) {?>
<li>
<a href="<?php echo SITE_URL;?><?php echo tsurl('user','space',array('id'=>$item['userid']))?>" rel="face" uid="<?php echo $item['user']['userid'];?>"><img src="<?php echo $item['user']['face'];?>" /></a>
<div style="width:520px;">
<p><a href="<?php echo SITE_URL;?><?php echo tsurl('user','space',array('id'=>$item['userid']))?>"  rel="face" uid="<?php echo $item['user']['userid'];?>"><?php echo $item['user']['username'];?></a> <?php echo $item['addtime'];?></p>
<?php echo nl2br(htmlspecialchars($item['content']))?>
<p style="text-align:right">
<?php if(intval($TS_USER['user']['userid'] == $strUser['userid'])) { ?>
<a href="#reguest" onclick="reguest('<?php echo $item['userid'];?>','<?php echo $item['id'];?>')">回复</a> <a href="<?php echo SITE_URL;?>index.php?app=user&ac=guestbook&ts=del&id=<?php echo $item['id'];?>" onclick="return confirm('确定删除?')">删除</a>
<?php } ?>
</p>
<!--回复留言-->

</div>
</li>
<?php }?>
</ul>
</div>

<div class="clear"></div>
<div class="page"><?php echo $pageUrl;?></div>


</div>

<div class="cright">
<?php include template('userinfo'); ?>
</div>

</div>
</div>
<?php include template('footer'); ?>