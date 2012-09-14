<?php 
defined('IN_TS') or die('Access Denied.'); 
//首页登录框
function login(){
	
	echo '<div class="login">
<form action="'.SITE_URL.tsUrl('user','login',array('ts'=>'do')).'" method="post">
<fieldset>
<legend>登录</legend>
<div class="item">
<label>Email:</label>
<br />
<input type="email" name="email">
</div>
<div class="item">
<label>密码：</label>
<br />
<input type="password" class="text" name="pwd">
</div>

<div class="item1">
<input type="hidden" name="cktime" value="2592000" />
<input type="submit" class="submit" value="登录"> <a href="'.SITE_URL.'index.php?app=user&ac=forgetpwd">忘记密码</a>
</div>
</fieldset>
</form>
</div>';
	
}

function login_css(){

	echo '<link href="'.SITE_URL.'plugins/home/login/images/style.css" rel="stylesheet" type="text/css" />';

}

addAction('home_index_right','login');
addAction('home_index_css','login_css');