<?php include template('header'); ?>

<div class="midder">

<div class="mc">

<?php include template('menu'); ?>

<style>
.tags{}
.tags ul{}
.tags ul li{float:left;width:200px;}
</style>

<div class="tags">
<ul>
<?php foreach((array)$arrTag as $key=>$item) {?>
<li><a class="post-tag" href="<?php echo SITE_URL;?><?php echo tsurl('group','tag',array('name'=>urlencode($item['tagname'])))?>"><?php echo $item['tagname'];?></a>×<?php echo $item['count_topic'];?></li>
<?php }?>
</ul>
</div>

<div class="clear"></div>
<div class="page"><?php echo $pageUrl;?></div>


</div>
</div>


<?php include template('footer'); ?>