<?php include template('header'); ?>

<!--main-->
<div class="midder">
<?php include template('anti_menu'); ?>


<div>
<form method="post" action="<?php echo SITE_URL;?>index.php?app=system&ac=anti&ts=ipdo">
IP：<input name="ip" /><input type="submit" value="添加" />
</form>
</div>


<div>
<table>

<tr class="old"><td>IP</td><td>添加时间</td><td>操作</td></tr>

<?php foreach((array)$arrIp as $key=>$item) {?>
<tr class="odd"><td><?php echo $item['ip'];?></td><td><?php echo $item['addtime'];?></td><td><a href="<?php echo SITE_URL;?>index.php?app=system&ac=anti&ts=ipdel&id=<?php echo $item['id'];?>">删除</a></td></tr>
<?php }?>

</table>

</div>


</div>

<?php include template('footer'); ?>