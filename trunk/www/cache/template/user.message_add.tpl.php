<?php include template('header'); ?>

<!--main-->
<div class="midder">

<div class="mc">
<h1>发送短消息</h1>

<form method="POST" action="<?php echo SITE_URL;?>index.php?app=user&ac=message&ts=message_add_do">
<table>
<tr><td>收件人：</td><td><img alt="<?php echo $strTouser['username'];?>" class="m_sub_img" src="<?php echo $strTouser['face'];?>" /><br /><?php echo $strTouser['username'];?></td></tr>
<tr><td>内容：</td><td><textarea class="utext" name="content"></textarea></td></tr>
<tr><td></td><td>

<input type="hidden" name="userid" value="<?php echo $strUser['userid'];?>" />
<input type="hidden" name="touserid" value="<?php echo $strTouser['userid'];?>" />
<input type="submit" value="发送" class="submit" />

</td></tr>
</table>
</form>

</div>
</div>

<?php include template('footer'); ?>
