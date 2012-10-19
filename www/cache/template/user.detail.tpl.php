<?php include template('header'); ?>

<link type="text/css" rel="stylesheet" href="<?php echo SITE_URL;?>app/study/skins/default/index.css" />
<div class="midder">

<div class="mc">  
<div class="cleft">
    <h1><?php echo $strUser['username'];?>的主页<a style="float:right;color: #336699; text-decoration: line;" href="<?php echo SITE_URL;?><?php echo tsurl('user','space',array(id=>$userid))?>" >去<?php echo $strUser['username'];?>的同城首页</a></h1>
	<div class="block_headerline" style=" border-bottom: 0 dashed #DDDDDD;">	                                    
	    <?php foreach((array)$arrStudy as $key=>$item) {?>
		<div class="nof clearfix" style="padding-top:5px;padding-bottom:10px;">
			<div class="evtlstimg">
			<a href="<?php echo SITE_URL;?><?php echo tsurl('study','show',array(studyid=>$item['studyid']))?>" class="phs_link">
			<img src="<?php if($item['poster']) { ?><?php echo SITE_URL;?><?php echo tsXimg($item['poster'],'study',100,100,$item['path'],1)?><?php } else { ?><?php echo SITE_URL;?>public/images/event_dft.jpg<?php } ?>"></a>
			</div>
		    <h2 style="margin-top:0px;margin-bottom:5px;"><a  href="<?php echo SITE_URL;?><?php echo tsurl('study','show',array(studyid=>$item['studyid']))?>"><?php echo $item['title'];?></a></h2>
			<div class="intro">
			<table style="margin-left:-5px">
			<tr><td valign="top" style="padding-left: 5px;padding-right:0px;"><?php echo $item['time'];?></td></tr>
			</table>
			<?php echo $item['address'];?><br>
			<?php echo $item['count_userdo'];?>人参加 &nbsp; <?php echo $item['count_userwish'];?>人感兴趣<br><br>
			</div>
		</div>
		<?php }?>
	</div>	
	<div class="page"><?php echo $pageUrl;?></div>
</div>
<div class="cright" style="vertical-align: top;">
<?php include template('userinfo'); ?>
</div>
</div>
</div>
<?php include template('footer'); ?>