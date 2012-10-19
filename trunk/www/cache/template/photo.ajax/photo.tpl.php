<?php include template("ajax/header");?>
<h2><?php echo $strAlbum['albumname'];?>  <a href="<?php echo SITE_URL;?>index.php?app=photo&ac=ajax&ts=flash&albumid=<?php echo $strAlbum['albumid'];?>">上传照片>></a></h2>
<div class="photolist">
<ul>
<?php foreach((array)$arrPhoto as $key=>$item) {?>
<li>
<div class="simg">
<a href="javascript:void(0)" onclick="insertEdit('[photo=<?php echo $item['photoid'];?>]');"><img src="<?php echo SITE_URL;?><?php echo tsXimg($item['photourl'],'photo',100,100,$item['path'])?>" title="点击插入"/></a></div>
</li>
<?php }?>
</ul>
</div>
<div class="page"><?php echo $pageUrl;?></div>
</body>
</html>