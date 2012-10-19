<?php include template('header'); ?>

<div class="midder">
<?php include template('menu'); ?>
<div style="padding:0 0 20px 0;">ThinkSAAS只提供对数据库的优化，数据库备份和恢复建议用phpMyAdmin或者Navicat for MySQL管理</div>
<div class="clear"></div>
<table>
<tr class="old"><td>数据库表</td><td>操作</td></tr>

<?php foreach((array)$arrTable as $key=>$item) {?>
<tr><td><?php echo $item;?></td><td><a href="<?php echo SITE_URL;?>index.php?app=system&ac=sql&ts=optimize&table=<?php echo $item;?>">优化</a></td></tr>
<?php }?>
</table>

</div>
<?php include template('footer'); ?>