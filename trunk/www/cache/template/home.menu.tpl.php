<div class="infomenu">
<ul>

<?php foreach((array)$arrInfo as $k=>$v) {?>
<li><a <?php if($key==$v['infokey']) { ?>class="select"<?php } ?> href="<?php echo SITE_URL;?><?php echo tsurl('home','info',array('key'=>$v['infokey']))?>"><?php echo $v['title'];?></a></li>
<?php }?>

</ul>
</div>