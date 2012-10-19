<?php include template('header'); ?>

<div class="midder">

<div class="mc">
<h1><?php echo $strUser['username'];?> </h1>
<div class="cleft">

<?php include template('menu'); ?>

<div class="clear"></div>

<ul>
<?php foreach((array)$arrFeed as $key=>$item) {?>
<?php if(date('Y-m-d',$item['addtime']) !=date('Y-m-d',$arrFeed[$key-1][addtime])) { ?>
<li style="margin-top:10px;border-bottom:1px solid #ddd;"><h2><?php echo date('Y-m-d',$item['addtime'])?></h2></li>
<?php } ?>
<li class="mbtl">
<?php if($item['user'][userid] !=$arrFeed[$key-1][user][userid]) { ?>
<a href="<?php echo SITE_URL;?><?php echo tsurl('user','space',array('id'=>$item['user'][userid]))?>"><img title="<?php echo $item['user'][username];?>" alt="<?php echo $item['user'][username];?>" src="<?php echo $item['user'][face];?>"></a>
<?php } ?>
</li>
<li class="mbtr">
<a href="<?php echo SITE_URL;?><?php echo tsurl('user','space',array('id'=>$item['user'][userid]))?>"><?php echo $item['user'][username];?></a> 
<?php echo $item['content'];?>
</li>
<div class="clear"></div>
<?php }?>
</ul>

<div class="clear"></div>
<div class="page"><?php echo $pageUrl;?></div>


</div>

<div class="cright">
<?php include template('userinfo'); ?>
</div>

</div>
</div>
<?php include template('footer'); ?>