<?php include template('header'); ?>

<style>
.mbtl {
    float: left;
    margin: 8px 7px 0 0;
    padding: 0;
    width: 55px;
}
.mbtr {
    border-bottom: 1px solid #EEEEEE;
    margin: 0px 0 20px 0;
    min-height: 55px;
    overflow: hidden;
    padding: 10px;;
	background:#f8f8f8;
}
.mbtr .author{}
.mbtr .author a{color:#8f8f8f;}
.mbtr .title{margin-top:10px;}
.mbtr .title a{color: #444444;font-size:22px;}
.mbtr .content{line-height:30px;font-size:14px;}
</style>

<div class="midder">
<div class="mc">

<?php include template('menu'); ?>
<div class="cleft">

<ul>
<?php foreach((array)$arrTopic as $key=>$item) {?>
<?php if(date('Y-m-d',$item['addtime']) !=date('Y-m-d',$arrTopic[$key-1][addtime])) { ?>
<li style="margin-top:10px;border-bottom:1px solid #ddd;"><h2><?php echo date('Y-m-d',$item['addtime'])?></h2></li>
<?php } ?>
<li class="mbtl">
<?php if($item['user'][userid] !=$arrTopic[$key-1][user][userid]) { ?>
<a href="<?php echo SITE_URL;?><?php echo tsurl('group','user',array('id'=>$item['user'][userid]))?>"><img title="<?php echo $item['user'][username];?>" alt="<?php echo $item['user'][username];?>" src="<?php echo $item['user'][face];?>" width="48" /></a>
<?php } ?>
</li>
<li class="mbtr">
<div class="author"><a href="<?php echo SITE_URL;?><?php echo tsurl('group','user',array('id'=>$item['user'][userid]))?>"><?php echo $item['user'][username];?></a></div>
<div class="title"><a href="<?php echo SITE_URL;?><?php echo tsurl('group','topic',array('id'=>$item['topicid']))?>"><?php echo $item['title'];?></a></div>
<div class="content">
<?php if($item['photo']) { ?>
<img src="<?php echo SITE_URL;?><?php echo tsXimg($item['photo'],'topic',500,'',$item['path'])?>" alt="<?php echo $item['title'];?>" title="<?php echo $item['title'];?>" />
<br />
<?php } ?>
<?php echo $item['content'];?>
</div>
<p style="text-align:right;">

<a href="<?php echo SITE_URL;?><?php echo tsurl('group','show',array('id'=>$item['groupid']))?>"><?php echo $item['group']['groupname'];?></a>

<a href="<?php echo SITE_URL;?><?php echo tsurl('group','topic',array('id'=>$item['topicid']))?>"><?php echo L::topiclist_reply?><?php if($item['count_comment']) { ?>(<?php echo $item['count_comment'];?>)<?php } ?></a>
</p>
</li>
<div class="clear"></div>
<?php }?>
</ul>

<div class="clear"></div>
<div class="page"><?php echo $pageUrl;?></div>

</div>


<div class="cright">

<div class="clear"></div>
<h2><?php echo L::topiclist_hottopic?></h2>
<ul class="titles">
<?php foreach((array)$arrHotTopic as $key=>$item) {?>
<li>
<h3><a href="<?php echo SITE_URL;?><?php echo tsurl('group','topic',array('id'=>$item['topicid']))?>" target="_blank"><?php echo $item['title'];?></a></h3>
<span class="titles-r-grey"><?php echo $item['count_comment'];?></span>
<p class="titles-b">
<span class="titles-b-l"><?php echo L::topiclist_from?>：<a title="<?php echo $item['group']['groupname'];?>" target="_blank" href="<?php echo SITE_URL;?><?php echo tsurl('group','show',array('id'=>$item['groupid']))?>"><?php echo $item['group']['groupname'];?></a>&nbsp;<?php echo L::topiclist_group?>
</span>
</p>
</li>
<?php }?>
</ul>

<div class="clear"></div>
<?php doAction('group_topic_right_footer',$strTopic,'300')?>
</div>

</div>
</div>

<?php include template('footer'); ?>