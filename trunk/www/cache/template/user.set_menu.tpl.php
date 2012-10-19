<h1><?php echo L::setmenu_userinfomanage?></h1>
<div class="tabnav">
<ul>
<li <?php if($ts=="base") { ?>class="select"<?php } ?>><a href="<?php echo SITE_URL;?><?php echo tsurl('user','set',array(ts=>base))?>"><?php echo L::setmenu_base?></a></li>
<li <?php if($ts=="face") { ?>class="select"<?php } ?>><a href="<?php echo SITE_URL;?><?php echo tsurl('user','set',array(ts=>face))?>"><?php echo L::setmenu_face?></a></li>
<li <?php if($ts=="pwd") { ?>class="select"<?php } ?>><a href="<?php echo SITE_URL;?><?php echo tsurl('user','set',array(ts=>pwd))?>"><?php echo L::setmenu_password?></a></li>

<li <?php if($ts=="email") { ?>class="select"<?php } ?>><a href="<?php echo SITE_URL;?><?php echo tsurl('user','set',array(ts=>email))?>"><?php echo L::setmenu_account?></a></li>

<li <?php if($ts=="city") { ?>class="select"<?php } ?>><a href="<?php echo SITE_URL;?><?php echo tsurl('user','set',array(ts=>city))?>">常居地</a></li>

<li <?php if($ac=='verify') { ?>class="select"<?php } ?>><a href="<?php echo SITE_URL;?><?php echo tsurl('user','verify')?>"><?php echo L::setmenu_verify?><a/></li>

<li <?php if($ts=="tag") { ?>class="select"<?php } ?>><a href="<?php echo SITE_URL;?><?php echo tsurl('user','set',array(ts=>tag))?>"><?php echo L::setmenu_tags?></a></li>
</ul>
</div>