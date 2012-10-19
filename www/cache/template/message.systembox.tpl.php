<div class="msgbox">
<ul>
<?php foreach((array)$arrMessage as $key=>$item) {?>
<li>
<span style="color:#42b475;"><?php echo $item['user'][username];?> <?php echo date('H:i:s',$item['addtime'])?></span>
<br />
<?php echo $item['content'];?>
</li>
<?php }?>
</ul>
</div>