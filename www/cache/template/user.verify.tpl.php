<?php include template('header'); ?>

<!--main-->
<div class="midder">

<div class="mc">

<?php include template('set_menu'); ?>

<h2>Email验证</h2>
<?php if(intval($strUser['isverify'])==0 && intval($TS_SITE['base']['isverify'])==1) { ?>
<p class="notice">提示：你必须通过Email验证才可以正常使用本社区</p>
<?php } ?>
<?php if($strUser['isverify']==1) { ?>
您已经通过Email验证！
<?php } else { ?>
<input type="email" disabled value="<?php echo $strUser['email'];?>" /> <a class="submit" href="<?php echo SITE_URL;?><?php echo tsurl('user','verify',array(ts=>post))?>">开始认证</a>  <a href="<?php echo SITE_URL;?><?php echo tsurl('user','set',array('ts'=>'email'))?>">Email不对吗？去更换帐号</a>
<?php } ?>

</div>
</div>

<?php include template('footer'); ?>
