<?php include pubTemplate("header");?>

<?php if($isAutoGo) { ?>
<meta http-equiv="refresh" content="2;url=<?php echo $url;?>" />
<?php } ?>

<div class="midder">
<div class="mc">

<div style="font-size:14px;text-align:center;padding-top:100px;">
<p><?php echo $notice;?></p>
<p><a href="<?php echo $url;?>"><?php echo $button;?></a></p>
</div>

</div>
</div>

<?php include pubTemplate("footer");?>