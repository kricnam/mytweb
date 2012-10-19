<?php include template('header'); ?>

<div class="midder">

<div class="mc">
<h1><?php echo $strUser['username'];?> </h1>
<div class="cleft">

<?php include template('menu'); ?>

<div class="clear"></div>

<?php foreach((array)$arrGroupList as $key=>$item) {?>
<div class="sub-item">
<div class="pic">
<a href="<?php echo SITE_URL;?><?php echo tsurl('group','show',array('id'=>$item['groupid']))?>">
<img src="<?php echo $item['icon_48'];?>" alt="<?php echo $item['groupname'];?>" />
</a>



</div>
<div class="info">
<a href="<?php echo SITE_URL;?><?php echo tsurl('group','show',array('id'=>$item['groupid']))?>"><?php echo $item['groupname'];?></a>  <font color="#999999"><?php echo $item['count_user'];?>人加入</font>             
<p><?php echo $item['groupdesc'];?></p>
</div>
</div>
<?php }?>


</div>

<div class="cright">
<?php include template('userinfo'); ?>
</div>

</div>
</div>
<?php include template('footer'); ?>