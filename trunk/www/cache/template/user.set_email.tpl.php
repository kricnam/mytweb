<?php include template('header'); ?>

<!--main-->
<div class="midder">
<div class="mc">
<?php include template('set_menu'); ?>

<div class="utable">
<form method="POST" action="<?php echo SITE_URL;?>index.php?app=user&ac=do&ts=setemail">
<table cellpadding="5" cellspacing="5">
<tr>
<th><?php echo L::setemail_accountnow?>：</th><td><?php echo $strUser['email'];?></td>
</tr>
<tr>
<th><?php echo L::setemail_newaccount?>：</th><td><input class="uinput" name="email" type="email" /></td>
</tr>

<tr><th></th><td><input class="submit" type="submit" value="<?php echo L::setemail_submit?>"  />（<?php echo L::setemail_submittip?>）</td></tr>

</table>
</form>
</div>



</div>
</div>

<?php include template('footer'); ?>