<?php include template('header'); ?>

<div class="midder">
<div class="mc">

<?php include template('menu'); ?>

<div class="cleft">




<div class="catelist">
<ul>
<?php foreach((array)$arrCate as $key=>$item) {?>
<li><a href="<?php echo SITE_URL;?><?php echo tsurl('group','cate',array('ts'=>'2','cateid'=>$item['cateid']))?>"><?php echo $item['catename'];?></a>(<?php echo $item['count_group'];?>)</li>
<?php }?>
</ul>
</div>


<div class="clear"></div>


<div class="categroup">
<ul>
<?php foreach((array)$arrGroup as $key=>$item) {?>
<li>
<a href="<?php echo SITE_URL;?><?php echo tsurl('group','show',array('id'=>$item['groupid']))?>">

<?php if($item['groupicon']) { ?>
<img src="<?php echo SITE_URL;?><?php echo tsXimg($item['groupicon'],'group','48','48',$item['path'],'1')?>" />
<?php } else { ?>
<img src="<?php echo SITE_URL;?>public/images/group.jpg" width="48" />
<?php } ?>

</a>

<a href="<?php echo SITE_URL;?><?php echo tsurl('group','show',array('id'=>$item['groupid']))?>">
<?php echo $item['groupname'];?>
</a>
<br />
<?php echo getsubstrutf8($item['groupdesc'],0,40)?>
</li>
<?php }?>
</ul>
</div>


<div class="page"><?php echo $pageUrl;?></div>

</div>

<div class="cright">


</div>
</div>
</div>
<?php include template('footer'); ?>