<?php include template('header'); ?>
<link type="text/css" rel="stylesheet" href="<?php echo SITE_URL;?>app/<?php echo $app;?>/skins/<?php echo $skin;?>/index.css" />
<div class="midder">

<div class="mc">

<div class="navs">
<div class="block_menu">
<em class="ft"></em><b class="ft"></b>
<ul>
<li class="clearfix" id="event_home"><a href="<?php echo SITE_URL;?><?php echo tsurl('event')?>"><span>课程首页</span></a></li>


<div class="line"></div>

<li class="clearfix"><a href="<?php echo SITE_URL;?><?php echo tsurl('event','type',array(typeid=>0))?>"><span>所有类型(<?php echo $arrEventType['count'];?>)</span></a></li>
<?php foreach((array)$arrEventType['list'] as $key=>$item) {?>
<li class="clearfix"><a href="<?php echo SITE_URL;?><?php echo tsurl('event','type',array(typeid=>$item['typeid']))?>"><span><?php echo $item['typename'];?>(<?php echo $item['count_event'];?>)</span></a></li>
<?php }?>
</ul>
<em class="fb"></em><b class="fb"></b>
</div>
<div id="calendarDiv"></div>
</div>


<div class="article">
<h2 class="green_tab clearfix" id="week_tab">
<div class="ll">一周热门 &nbsp; ·&nbsp;·&nbsp;·&nbsp;·&nbsp;·&nbsp;·&nbsp;
</div>
<a onclick="return switch_tab('t_0')" id="t_0" class="on" href="">
<span>所有类型</span></a>
<div id="more_event_tab"><a id="tongcheng_tab" href=""><span>更多</span></a><div id="tongcheng_tab_block"></div>
</div></h2>
<div id="wt_0">

<div class="block_headerline"><div class="nof clearfix"><div class="evtlstimg">
<a href="<?php echo SITE_URL;?><?php echo tsurl('event','show',array(eventid=>$arrEvent[0][eventid]))?>" class="phs_link">
<img src="<?php if($arrEvent[0][poster]) { ?><?php echo SITE_URL;?><?php echo tsXimg($arrEvent[0][poster],'event',100,100,$arrEvent[0][path],1)?><?php } else { ?><?php echo SITE_URL;?>public/images/event_dft.jpg<?php } ?>"></a>
</div><h2><a  href="<?php echo SITE_URL;?><?php echo tsurl('event','show',array(eventid=>$arrEvent[0][eventid]))?>"><?php echo $arrEvent[0][title];?></a> <span class="pl2">[<?php echo $arrEvent[0][type][typename];?>]</span></h2>
<div class="pl intro">
时间：<?php echo $arrEvent[0][time_start];?> - <?php echo $arrEvent[0][time_end];?><br>
地点：<?php echo $arrEvent[0][city][cityname];?> <?php echo $arrEvent[0][area][areaname];?> <?php echo $arrEvent[0][address];?><br>
发起人：<a href="<?php echo SITE_URL;?><?php echo tsurl('user','space',array('id'=>$arrEvent[0][user][userid]))?>"><?php echo $arrEvent[0][user][username];?></a> <br>

<?php echo $arrEvent[0][count_userdo];?>人参加 &nbsp; <?php echo $arrEvent[0][count_userwish];?>人感兴趣<br><br>
</div></div></div>


<div style="margin-bottom:0;overflow: hidden;" class="block1"><div class="content">
<ul class="clearbox">

<?php foreach((array)$arrEvent as $key=>$item) {?>
<?php if($key > 0) { ?>
<li class="block clearfix">
<div class="title">
<a href="<?php echo SITE_URL;?><?php echo tsurl('event','show',array(eventid=>$item['eventid']))?>"><?php echo $item['title'];?></a>
</div><a href="<?php echo SITE_URL;?><?php echo tsurl('event','show',array(eventid=>$item['eventid']))?>">
<img class="actimgs" src="<?php if($item['poster']) { ?><?php echo SITE_URL;?><?php echo tsXimg($item['poster'],'event',48,48,$item['path'],1)?><?php } else { ?><?php echo SITE_URL;?>public/images/event_dft.jpg<?php } ?>" width="48"></a>
<div class="evtdesc">
<?php echo $item['time_start'];?> - <?php echo $item['time_end'];?><br><a href="<?php echo SITE_URL;?><?php echo tsurl('user','space',array('id'=>$item['user'][userid]))?>"><?php echo $item['user'][username];?></a><br><?php echo $item['count_userdo'];?>人参加 &nbsp; <?php echo $item['count_userwish'];?>人感兴趣<br>
</div></li>
<?php } ?>
<?php }?>

<li class="clear"></li></ul></div></div>

<span class="pl rr">&gt; <a href="<?php echo SITE_URL;?><?php echo tsurl('event','type')?>">更多活动</a></span>


</div>


</div>

<div class="aside">

<div class="create-events">
<a href="<?php echo SITE_URL;?>index.php?app=event&ac=add" class="bn-post">
<span>创建同城活动</span>
</a>
</div>

<!--
<h2>主办支持小组 &nbsp; ·&nbsp;·&nbsp;·&nbsp;·&nbsp;·&nbsp;·&nbsp;
</h2>
<?php foreach((array)$arrGroup as $key=>$item) {?>
<dl class="obu"><dt><a class="nbg" href="<?php echo SITE_URL;?>index.php/group/group/groupid-<?php echo $item['groupid'];?>"><img alt="<?php echo SITE_URL;?><?php echo $item['groupname'];?>" class="m_sub_img" src="<?php echo $item['icon_48'];?>"></a></dt>
<dd><a href="<?php echo SITE_URL;?>index.php/group/group/groupid-<?php echo $item['groupid'];?>"><?php echo $item['groupname'];?></a></dd></dl>
<?php }?>
<br clear="all">
<br>
-->
</div>

</div>
</div>
<?php include template('footer'); ?>