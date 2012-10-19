<?php include template('header'); ?>
<link type="text/css" rel="stylesheet" href="<?php echo SITE_URL;?>app/<?php echo $app;?>/skins/<?php echo $skin;?>/index.css" />
<div class="midder">

<div class="mc">
<h1>活动- <?php echo $title;?></h1>
<div class="navs">
<div class="block_menu">
<em class="ft"></em><b class="ft"></b>
<ul>
<li class="clearfix" id="event_home"><a href="<?php echo SITE_URL;?><?php echo tsurl('event')?>"><span>活动首页</span></a></li>

<div class="line"></div>

<li class="clearfix <?php if($typeid==0) { ?>on<?php } ?>"><a href="<?php echo SITE_URL;?><?php echo tsurl('event','type',array(typeid=>0))?>"><span>所有类型(<?php echo $arrEventType['count'];?>)</span></a></li>
<?php foreach((array)$arrEventType['list'] as $key=>$item) {?>
<li class="clearfix <?php if($typeid==$item['typeid']) { ?>on<?php } ?>"><a href="<?php echo SITE_URL;?><?php echo tsurl('event','type',array(typeid=>$item['typeid']))?>"><span><?php echo $item['typename'];?>(<?php echo $item['count_event'];?>)</span></a></li>
<?php }?>
</ul>
<em class="fb"></em><b class="fb"></b>
</div><div id="calendarDiv"></div>

</div>


<div class="article">
<?php foreach((array)$arrEvent as $key=>$item) {?>
<div class="nof clearfix"><div class="evtlstimg">
<a href="" class="phs_link">
<img src="<?php if($item['poster']) { ?><?php echo SITE_URL;?><?php echo tsXimg($item['poster'],'event',100,100,$item['path'],1)?><?php } else { ?><?php echo SITE_URL;?>public/images/event_dft.jpg<?php } ?>"></a>
</div><h2><a href="<?php echo SITE_URL;?><?php echo tsurl('event','show',array('eventid'=>$item['eventid']))?>"><?php echo $item['title'];?></a> <span class="pl2">[<?php echo $item['type'][typename];?>]</span></h2>
<div class="pl intro">
时间：<?php echo $item['time_start'];?> - <?php echo $item['time_end'];?><br>
地点：<?php echo $item['city'][cityname];?> <?php echo $item['area'][areaname];?> <?php echo $item['address'];?><br>
发起人：<a href="<?php echo SITE_URL;?><?php echo tsurl('user','space',array('id'=>$item['user'][userid]))?>"><?php echo $item['user'][username];?></a> 
<br>
<?php echo $item['count_userdo'];?>人参加 &nbsp; <?php echo $item['count_userwish'];?>人感兴趣<br><br>
</div></div>
<?php }?>
</div>

<div class="aside">
<!--
<h2>主办支持小组 &nbsp; ·&nbsp;·&nbsp;·&nbsp;·&nbsp;·&nbsp;·&nbsp;
</h2>
<dl class="obu"><dt><a class="nbg" href=""><img alt="传统文化" class="m_sub_img" src="http://img3.douban.com/bpic/e459350.jpg"></a></dt>
<dd><a href="">传统文化</a></dd></dl>
<br clear="all">
<br>-->
</div>

</div>
</div>
<?php include template('footer'); ?>