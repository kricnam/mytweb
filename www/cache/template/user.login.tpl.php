<?php include template('header'); ?>
<!--main-->
<div class="midder">
<div class="mc">
<h1><?php echo L::login_userlogin?></h1>
<p><?php echo L::login_loginnotice?></p>

<div style="float:left;padding: 20px 0 0 100px;">
<form method="POST" action="<?php echo SITE_URL;?>index.php?app=user&ac=login&ts=do">
<table>
<tr><td>Email：<br /><input class="uinput" type="text" name="email" /></td></tr>
<tr><td><?php echo L::login_password?><br /><input class="uinput" type="password" name="pwd" /></td></tr>

<tr>
<td>
<?php echo L::login_cookievalidity?><br />
<select name="cktime">
		<option value="31536000"><?php echo L::login_oneyear?></option>
		<option value="2592000"><?php echo L::login_onemonth?></option>
		<option value="86400"><?php echo L::login_oneday?></option>
		<option value="3600"><?php echo L::login_onehour?></option>
		<option value="0"><?php echo L::login_intime?></option>
	</select>
</td></tr>

<tr><td>
<input type="hidden" name="jump" value="<?php echo $jump;?>" />
<input class="submit" type="submit" value="<?php echo L::login_login?>" /> 
<br />
<a href="<?php echo SITE_URL;?><?php echo tsurl('user','register')?>"><?php echo L::login_noregister?></a> | <a href="<?php echo SITE_URL;?><?php echo tsurl('user','forgetpwd')?>"><?php echo L::login_forgetpassword?></a></td></tr>
</table>
</form>
</div>


<div style="margin-left: 300px;padding: 40px 35px;">
<?php doAction('user_login_footer')?>
</div>

</div>
</div>
<?php include template('footer'); ?>