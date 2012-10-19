<?php if($TS_SITE['base'][isgzip]==1) { ?><?php ob_start('ob_gzip');?><?php } ?>
<!DOCTYPE HTML>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="robots" content="all" />
<meta name="author" content="<?php echo $TS_CF['info'][email];?>" />
<meta name="Copyright" content="<?php echo $TS_CF['info'][name];?>" />
<title><?php if($ac=='index') { ?><?php echo $TS_SITE['base'][site_title];?> - <?php echo $title;?><?php } else { ?><?php echo $title;?> - <?php echo $TS_APP['options'][appname];?> - <?php echo $TS_SITE['base'][site_title];?><?php } ?>
</title>
<?php if($app=='home' && $ac=='index') { ?>
<meta name="keywords" content="<?php echo $TS_SITE['base'][site_key];?>" /> 
<meta name="description" content="<?php echo $TS_SITE['base'][site_desc];?>" /> 
<?php } else { ?>
<meta name="keywords" content="<?php if($sitekey) { ?><?php echo $sitekey;?><?php } else { ?><?php echo $title;?><?php } ?>" /> 
<meta name="description" content="<?php if($sitedesc) { ?><?php echo $sitedesc;?><?php } else { ?><?php echo $title;?><?php } ?>" /> 
<?php } ?>
<link rel="shortcut icon" href="<?php echo SITE_URL;?>favicon.ico" />
<?php if(is_file('theme/'.$site_theme.'/base.css')) { ?>
<link rel="stylesheet" type="text/css" href="<?php echo SITE_URL;?>theme/<?php echo $site_theme;?>/base.css" id="thems">
<?php } ?>
<?php if(is_file('app/'.$app.'/skins/'.$skin.'/style.css')) { ?>
<link rel="stylesheet" type="text/css" href="<?php echo SITE_URL;?>app/<?php echo $app;?>/skins/<?php echo $skin;?>/style.css">
<?php } ?>
<script>var siteUrl = '<?php echo SITE_URL;?>';</script>
<script src="<?php echo SITE_URL;?>public/js/jquery-1.7.1.min.js" type="text/javascript"></script>
<?php if(is_file('app/'.$app.'/js/extend.func.js')) { ?>
<script src="<?php echo SITE_URL;?>app/<?php echo $app;?>/js/extend.func.js" type="text/javascript"></script>
<?php } ?>
<?php doAction('pub_header_top')?>
</head>
<body>
<div class="header">
<div class="hc">
<div class="left">
<a class="logo" href="<?php echo SITE_URL;?>" title="<?php echo $TS_SITE['base'][site_title];?>"></a></div>
<div class="nav">
<ul>
</ul>
</div>

<div class="right">
<?php if($TS_USER['user'] == '') { ?>
<a href="<?php echo SITE_URL;?><?php echo tsurl('user','register')?>"><img class="fimg" src="<?php echo SITE_URL;?>public/images/user_normal.jpg" width="24" align="absmiddle" alt="<?php echo L::public_welcome?>" /></a> <?php echo L::public_welcome?>
<br />
<a href="<?php echo SITE_URL;?><?php echo tsurl('user','login')?>"><?php echo L::public_login?></a> | <a href="<?php echo SITE_URL;?><?php echo tsurl('user','register')?>"><?php echo L::public_register?></a>
<?php } else { ?>
<a href="<?php echo SITE_URL;?><?php echo tsurl('user','space',array('id'=>$TS_USER['user'][userid]))?>">
<img class="fimg" src="<?php if($TS_USER['user'][face]=="") { ?><?php echo SITE_URL;?>public/images/user_normal.jpg<?php } else { ?><?php echo SITE_URL;?><?php echo tsXimg($TS_USER['user'][face],'user','24','24',$TS_USER['user'][path],'1')?><?php } ?>" width="24" align="absmiddle" alt="<?php echo $TS_USER['user']['username'];?>" /> 
</a>
<a href="<?php echo SITE_URL;?><?php echo tsurl('user','space',array('id'=>$TS_USER['user'][userid]))?>"><?php echo $TS_USER['user'][username];?></a>   |  <a href="<?php echo SITE_URL;?><?php echo tsurl('user','set',array(ts=>base))?>" ><?php echo L::public_set?></a> | <span id="newmsg"></span> <a href="<?php echo SITE_URL;?><?php echo tsurl('message','my')?>"><?php echo L::public_message?></a>
<br>


<?php if($TS_SITE['base']['isinvite']=='1') { ?>
  <a href="<?php echo SITE_URL;?><?php echo tsurl('user','invite')?>"><?php echo L::public_invite?></a> |   
<?php } ?>
 
  <a href="<?php echo SITE_URL;?><?php echo tsurl('user','login',array(ts=>out))?>"><?php echo L::public_logout?></a>
<?php } ?>

<?php if($TS_USER['user']['isadmin']=='1') { ?>
|  <a target="_blank" href="<?php echo SITE_URL;?>index.php?app=system"><?php echo L::public_manage?></a>
<?php } ?>

</div>
<div class="search">
<form method="GET" action="index.php">
<input type="hidden" name="app" value="search" />
<input type="hidden" name="ac" value="s" />
<div class="search_input">
<input id="searchkw" name="kw" value="课程、小组、用户" />
</div>
<a onclick="searchon()" style="background-position: -157px 0px;">搜索</a>
<span style="display:none;"><input id="searchto" type="submit" value="搜索" /></span>
</form>
</div>

</div>
</div>
<?php if(is_array($TS_SITE['appnav'])) { ?>
<div class="appnav">
<ul>
<?php foreach((array)$TS_SITE['appnav'] as $key=>$item) {?>
<?php if($key=='message') { ?>
<?php } elseif ($key=='home' ) { ?>
<li <?php if($app==$key) { ?>class="select"<?php } ?>>
<a href="<?php echo SITE_URL;?>"><?php echo $item;?></a>
<?php } else { ?>
<li <?php if($app==$key) { ?>class="select"<?php } ?>>
<a href="<?php echo SITE_URL;?><?php echo tsurl($key)?>"><?php echo $item;?></a>
<?php if($key=='study' && $app!=$key) { ?><span class="hot"></span><?php } ?></li>
<?php } ?>
<?php }?>
</ul>
</div>
<?php } ?>