<?php include template('header'); ?>
<style>
.dface{overflow: hidden;}
.dface li{float:left;}
.dface li img{border:solid 1px #999999;margin-right:10px;}

</style>

<!--main-->
<div class="midder">
<div class="mc">
<?php include template('set_menu'); ?>


<?php if($TS_SITE['base']['isface']=='1' && $strUser['face'] == SITE_URL.'public/images/user_normal.jpg') { ?>
<p class="notice"><?php echo L::setface_notice?></p>
<?php } ?>

<h2><?php echo L::setface_avatarnow?></h2>
<div>
<img alt="<?php echo $TS_USER['uname'];?>" src="<?php echo $strUser['face'];?>?v=<?php echo rand();?>" width="60" />
</div>

<h2><?php echo L::setface_selectlocalpicture?></h2>

<div>
<form method="POST" action="<?php echo SITE_URL;?>index.php?app=user&ac=do&ts=setface" enctype="multipart/form-data" >

<div class="m">从你的电脑上选择图像文件：(仅支持jpg，gif，png格式的图片)</div><br>

<input type="file" name="picfile" />
<input class="submit" type="submit" value="<?php echo L::setface_uploadphoto?>" />

<br>
<br>

</form>
</div>

<h2><?php echo L::setface_selectpresetpicture?></h2>
<div>
<form method="post" action="<?php echo SITE_URL;?>index.php?app=user&ac=do&ts=face">
<ul class="dface">
<?php foreach((array)$arrFace as $key=>$item) {?>
<li>
<img src="<?php echo SITE_URL;?>uploadfile/user/face/<?php echo $item;?>" width="60" />
<br />
<input type="radio" name="face" value="<?php echo $item;?>" />
</li>
<?php }?>
</ul>
<input class="submit" type="submit" value="<?php echo L::setface_useavatar?>" />
</form>
</div>

</div>
</div>

<?php include template('footer'); ?>