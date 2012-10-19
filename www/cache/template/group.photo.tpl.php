<?php include template('header'); ?>
<script src="<?php echo SITE_URL;?>public/js/jquery.masonry.min.js"></script>
<script src="<?php echo SITE_URL;?>public/js/jquery.infinitescroll.min.js"></script>

<script>
	$.get(siteUrl+'index.php?app=group&ac=photo&ts=ajax', function(data){
		$("#container").html(data);
		$('#container').masonry({
			itemSelector: '.card-item',
			columnWidth: 0
		})
		
	})
</script>

<script src="<?php echo SITE_URL;?>app/<?php echo $app;?>/js/photo.js"></script>
<!--[if lt IE 9]><script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script><![endif]-->
<style>
@import url(<?php echo SITE_URL;?>app/<?php echo $app;?>/skins/<?php echo $skin;?>/pinte.css);
#infscr-loading {
    background: none repeat scroll 0 0 #000000;
    border-radius: 10px 10px 10px 10px;
    bottom: 40px;
    color: #FFFFFF;
    left: 45%;
    opacity: 0.8;
    padding: 10px;
    position: fixed;
    text-align: center;
    width: 200px;
    z-index: 100;
}
</style>

<div class="midder">
<div class="mc">

<?php include template('menu'); ?>

<div id="container">

</div>


<a id="page-nav" href="<?php echo SITE_URL;?>index.php?app=group&ac=photo&ts=ajax&page=2"></a>


</div>
</div>
<?php include template('footer'); ?>