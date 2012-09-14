<?php 
defined('IN_TS') or die('Access Denied.'); 
//首页幻灯片插件
function slide(){
	
echo '<!--开始-->
<div id="ind_focus" class="ind_focus">
<div class="slides_container">

<div class="slide">
<a href="'.SITE_URL.tsUrl('user','register').'"><img width="600" height="210" src="'.SITE_URL.'plugins/home/slide/images/2.png" /></a>
<div class="caption" style="bottom:0">
<p>欢迎使用ThinkSAAS社区系统</p>
</div>
</div>

<div class="slide">
<a href="'.SITE_URL.tsUrl('user','register').'"><img width="600" height="210" src="'.SITE_URL.'plugins/home/slide/images/demo.png" /></a>
<div class="caption" style="bottom:0">
<p>欢迎使用ThinkSAAS社区系统</p>
</div>
</div>

<div class="slide">
<a href="'.SITE_URL.tsUrl('user','register').'"><img width="600" height="210" src="'.SITE_URL.'plugins/home/slide/images/zp.png" /></a>
<div class="caption" style="bottom:0">
<p>欢迎使用ThinkSAAS社区系统</p>
</div>
</div>

</div>
</div>
<!--结束-->';
}

function slide_css(){
	echo '<link href="'.SITE_URL.'plugins/home/slide/images/style.css" rel="stylesheet" type="text/css" />';
}

function slide_js(){
	echo '<script src="'.SITE_URL.'plugins/home/slide/images/slides.min.jquery.js" type="text/javascript"></script>';
	echo '<script>
$(function(){
  $("#ind_focus").slides({
	preload: true,
	preloadImage: "'.SITE_URL.'public/images/loading.gif",
    play: 5000,
    pause: 2500,
    hoverPause: true,
	animationStart: function(current){
		$(".caption").animate({
			bottom:-35
		},100);
		if (window.console && console.log) {
			// example return of current slide number
			console.log("animationStart on slide: ", current);
		};
	},
	animationComplete: function(current){
		$(".caption").animate({
			bottom:0
		},200);
		if (window.console && console.log) {
			// example return of current slide number
			console.log("animationComplete on slide: ", current);
		};
	},
	slidesLoaded: function() {
		$(".caption").animate({
			bottom:0
		},200);
	}
  });
});
</script>';
}

addAction('home_index_left','slide');
addAction('home_index_css','slide_css');
addAction('home_index_js','slide_js');