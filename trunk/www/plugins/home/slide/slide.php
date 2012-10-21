<?php 
defined('IN_TS') or die('Access Denied.'); 
//首页幻灯片插件
function slide(){
	
echo '<!--开始-->
<div id="ind_focus" class="ind_focus">
<div class="slides_container">

<div class="slide">
<a href="'.SITE_URL.tsUrl('user','register').'"><img width="581" height="333" src="'.SITE_URL.'plugins/home/slide/images/banner0.png" alt="开源社区" /></a>
<div class="caption" style="bottom:0">
<p>欢迎加入</p>
</div>
</div>

<div class="slide">
<a href="'.SITE_URL.tsUrl('user','register').'"><img width="581" height="333" src="'.SITE_URL.'plugins/home/slide/images/banner1.gif"  alt="论坛" /></a>
<div class="caption" style="bottom:0">
<p>欢迎加入</p>
</div>
</div>

<div class="slide">
<a href="'.SITE_URL.tsUrl('user','register').'"><img width="581" height="333" src="'.SITE_URL.'plugins/home/slide/images/banner2.gif"  alt="bbs" /></a>
<div class="caption" style="bottom:0">
<p>欢迎加入</p>
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
