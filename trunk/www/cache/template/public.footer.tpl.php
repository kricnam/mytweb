<div class="footer">
<div>
<a href="<?php echo SITE_URL;?><?php echo tsurl('home','info',array('key'=>'about'))?>"><?php echo L::public_aboutus?></a>
 | <a href="<?php echo SITE_URL;?><?php echo tsurl('home','info',array('key'=>'contact'))?>"><?php echo L::public_contactus?></a> 
 | <a href="<?php echo SITE_URL;?><?php echo tsurl('home','info',array('key'=>'agreement'))?>"><?php echo L::public_agreement?></a> | <a href="<?php echo SITE_URL;?><?php echo tsurl('home','info',array('key'=>'privacy'))?>"><?php echo L::public_privacy?></a>
 | <a href="<?php echo SITE_URL;?><?php echo tsurl('home','info',array('key'=>'job'))?>">加入我们</a>
</div>

Copyright TLaoShi. All Rights Reserved  <?php echo $TS_SITE['base'][site_icp];?>
<br /><span style="font-size:0.83em;">Processed in <?php echo $runTime;?> second(s)</span></div>

<?php if($TS_USER['user']['userid']) { ?>
<script src="<?php echo SITE_URL;?>public/js/imbox/imbox.js" type="text/javascript"></script>
<script>
var userid=<?php echo intval($TS_USER['user']['userid'])?>;
evdata(userid);
</script>
<?php } ?>
<link href="<?php echo SITE_URL;?>public/js/artDialog/skins/simple.css" rel="stylesheet" />
<script src="<?php echo SITE_URL;?>public/js/artDialog/artDialog.min.js"></script>
<script src="<?php echo SITE_URL;?>public/js/artDialog/artDialog.plugins.min.js"></script>
<script src="<?php echo SITE_URL;?>public/js/common.js" type="text/javascript"></script>
<?php doAction('pub_footer')?>
</body>
</html>
<?php if($TS_SITE['base'][isgzip]==1) { ?><?php ob_end_flush();?><?php } ?>