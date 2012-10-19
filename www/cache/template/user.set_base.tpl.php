<?php include template('header'); ?>

<!--main-->
<div class="midder">
<div class="mc">
<?php include template('set_menu'); ?>

<div class="utable">
<form method="POST" action="<?php echo SITE_URL;?>index.php?app=user&ac=do&ts=setbase">
<table cellpadding="5" cellspacing="5">
<tr><th><?php echo L::setbase_username?>：</th><td><input class="uinput" name="username" value="<?php echo $strUser['username'];?>"  /></td></tr>

<tr><th><?php echo L::setbase_gender?>：</th><td>

<input <?php if($strUser['sex']=='0') { ?>checked="select"<?php } ?> name="sex" type="radio" value="0" /><?php echo L::setbase_secrecy?> 
<input <?php if($strUser['sex']=='1') { ?>checked="select"<?php } ?> name="sex" type="radio" value="1" /><?php echo L::setbase_male?> 
<input <?php if($strUser['sex']=='2') { ?>checked="select"<?php } ?> name="sex" type="radio" value="2" /><?php echo L::setbase_female?>

</td></tr>

<tr><th><?php echo L::setbase_phone?>：</th><td><input class="uinput" name="phone" value="<?php echo $strUser['phone'];?>"  /></td></tr>

<tr><th><?php echo L::setbase_blog?>：</th><td><input class="uinput" name="blog" value="<?php echo $strUser['blog'];?>"  /></td></tr>

<tr><th valign="top"><?php echo L::setbase_introduction?>：</th><td><textarea class="utext" name="about"><?php echo $strUser['about'];?></textarea></td></tr>

<tr><th valign="top"><?php echo L::setbase_signature?>：</th><td>
<textarea class="utext" name="signed"><?php echo $strUser['signed'];?></textarea>
</td></tr>

<tr><th></th><td><input class="submit" type="submit" value="<?php echo L::setbase_submit?>"  /></td></tr>

</table>
</div>
</div>
</div>
<?php include template('footer'); ?>