<?php include template('header'); ?>
<?php if($TS_APP['options'][isregister]=='2') { ?>
<?php } else { ?>
<link type="text/css" rel="stylesheet" href="<?php echo SITE_URL;?>app/<?php echo $app;?>/skins/<?php echo $skin;?>/validate.css" id="skin" />
<script src="<?php echo SITE_URL;?>public/js/validate/jquery.validateid.js" type="text/javascript"></script>

<script type="text/javascript">
$(document).ready(function() {
	
	var validator = $("#signupform").validate({
		onkeyup: false,
		rules:{
		<?php if($TS_SITE['base']['isinvite']=='1') { ?>
			invitecode:{
				required:true,
				remote:"<?php echo SITE_URL;?>index.php?app=user&ac=check&ts=isinvitecode"
			},
		<?php } ?>
			email: {
				required: true,
				email: true,
				remote: "<?php echo SITE_URL;?>index.php?app=user&ac=check&ts=inemail"
			},
			pwd: {
				required: true,
				minlength: 5
			},
			repwd: {
				required: true,
				minlength: 5,
				equalTo: "#pwd"
			},
			username:{
				required: true,
				minlength: 2,
				maxlength: 12,
				remote:"<?php echo SITE_URL;?>index.php?app=user&ac=check&ts=isusername"
			},
			authcode:{
				required: true
			}
		},
		messages: {
		<?php if($TS_SITE['base']['isinvite']=='1') { ?>
			invitecode:{
				required:"请输入邀请码",
				remote:jQuery.format("邀请码无效，请寻找新的邀请码！")
			},
		<?php } ?>
			email: {
					required: "请输入Email地址",
					email: "请输入一个正确的Email地址",
					remote:jQuery.format("Email已经存在，请更换其他Email")
			},
			pwd: {
				required: "请输入密码",
				minlength: jQuery.format("至少输入5个字符")
			},
			repwd: {
				required: "请重复输入密码",
				minlength: jQuery.format("至少输入5个字符"),
				equalTo: "两次输入密码不一致"
			},
			username:{
				required:"请输入用户名",
				minlength: jQuery.format("至少输入2个字符"),
				maxlength: jQuery.format("最多输入12个字符"),
				remote:jQuery.format("用户名已经存在，请更换其他用户名")
			},
			authcode:{
				required:"验证码不能为空"
			}
		},

		
		errorPlacement: function(error, element) {
			if ( element.is(":radio") )
				error.appendTo( element.parent().next().next() );
			else if ( element.is(":checkbox") )
				error.appendTo ( element.next() );
			else
				error.appendTo( element.parent().next() );
		},

		success: function(label) {
			// set &nbsp; as text for IE
			label.html("&nbsp;").addClass("checked");
		}
	});

});
</script>

<script language="javascript">
function newgdcode(obj,url) {
obj.src = url+ '&nowtime=' + new Date().getTime();
//后面传递一个随机参数，否则在IE7和火狐下，不刷新图片
}
</script>

<?php } ?>

<!--main-->
<div class="midder">
<div class="mc">
<h1><?php echo L::register_userregister?></h1>
<?php if($TS_APP['options'][isregister]=='2') { ?>
<p><?php echo L::register_registernotice?></p>
<p><a href="<?php echo SITE_URL;?>"><?php echo L::register_returnhome?></a></p>
<?php } else { ?>
<p></p>
<form  id="signupform" method="POST" action="<?php echo SITE_URL;?><?php echo tsurl('user','register',array('ts'=>'do'))?>">

<table width="100%" border="0" cellspacing="0" cellpadding="0"  class="Tabletext">

<?php if($TS_SITE['base']['isinvite']=='1') { ?>
<tr>
<td class="label"><label id="invitecode" for="invitecode">
<font color="red"><?php echo L::register_invitecode?>:</font></label></td>
<td class="field" width="300"><input class="uinput" id="invitecode" name="invitecode" type="text" value="" /></td>
<td class="status"></td>
</tr>
<?php } ?>


<tr>
<td class="label"><label id="email" for="email">Email：</label></td>
<td class="field" width="300"><input class="uinput" id="email" name="email" type="text" value="" /></td>
<td class="status"></td>
</tr>
<tr>
<td class="label"><label><?php echo L::register_password?>：</label></td>
<td class="field"><input class="uinput" type="password" id="pwd" name="pwd"  /></td>
<td class="status"></td>
</tr>
<tr>
<td class="label"><label><?php echo L::register_repassword?>：</label></td>
<td class="field"><input class="uinput" type="password" id="repwd" name="repwd"  /></td>
<td class="status"></td>
</tr>

<tr>
<td class="label"><label><?php echo L::register_username?>：</label></td>
<td class="field"><input class="uinput" type="text" id="username" name="username" /></td>
<td class="status"></td>
</tr>

<tr><td class="label"><?php echo L::register_verifycode?>：</td><td class="field"><input name="authcode" id="authcode" />
 <img src="<?php echo SITE_URL;?>index.php?app=user&ac=checkcode" onclick="javascript:newgdcode(this,this.src);" alt="点击刷新验证码" style="cursor:pointer;"/></td>
<td class="status"></td></tr>

<tr>
<td class="label"></td>
<td class="field">
<input type="hidden" name="fuserid" value="<?php echo $fuserid;?>" />
<input class="submit" type="submit" value="<?php echo L::register_register?>" /> 

<a href="<?php echo SITE_URL;?><?php echo tsurl('user','login')?>"><?php echo L::register_login?></a></td>
<td class="status"></td>
</tr>

<tr>
<td class="label"><br /></td>
<td class="field"><br /><?php doAction('user_register_footer')?></td>
<td class="status"></td>
</tr>

</table>
</form>
<?php } ?>

</div>
</div>
<?php include template('footer'); ?>