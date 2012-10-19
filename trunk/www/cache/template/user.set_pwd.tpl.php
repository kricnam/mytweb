<?php include template('header'); ?>

<!--main-->
<div class="midder">
<div class="mc">
<?php include template('set_menu'); ?>

<div class="utable">
<form method="POST" action="<?php echo SITE_URL;?>index.php?app=user&ac=do&ts=setpwd">
<table cellpadding="5" cellspacing="5">
<tr>
<th><?php echo L::setpwd_oldpassword?>：</th><td><input class="uinput" name="oldpwd" value="" type="password" /></td>
</tr>
<tr>
<th><?php echo L::setpwd_newpassword?>：</th><td><input class="uinput" name="newpwd" value="" type="password" /></td>
</tr>
<tr>
<th><?php echo L::setpwd_renewpassword?>：</th><td><input class="uinput" name="renewpwd" value="" type="password" /></td>
</tr>

<tr><th></th><td><input class="submit" type="submit" value="<?php echo L::setpwd_submit?>"  /></td></tr>

</table>
</form>
</div>


</div>
</div>

<?php include template('footer'); ?>