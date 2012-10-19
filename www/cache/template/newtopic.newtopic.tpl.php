<h2>最新图文话题</h2>
<?php foreach((array)$arrNewTopic as $key=>$item) {?>
<div class="mainlist">
<div class="mainlist_img"><a target="_blank" href="<?php echo SITE_URL;?><?php echo tsurl('group','topic',array('id'=>$item['topicid']))?>"><img alt="点击进入[<?php echo $item['title'];?>]" src="<?php echo SITE_URL;?><?php echo tsXimg($item['photo'],'topic','110','',$item['path'])?>"></a></div>
<div class="mainlist_content">
<h1><a target="_blank" href="<?php echo SITE_URL;?><?php echo tsurl('group','show',array('id'=>$item['groupid']))?>" class="link1">[<?php echo $item['group']['groupname'];?>]</a> <a target="_blank" href="<?php echo SITE_URL;?><?php echo tsurl('group','topic',array('id'=>$item['topicid']))?>"><?php echo getsubstrutf8($item['title'],0,20,false)?></a></h1>
<div class="summary">
<a target="_blank" href="<?php echo SITE_URL;?><?php echo tsurl('user','space',array('id'=>$item['user']['userid']))?>"><?php echo $item['user']['username'];?></a> 
<span>发布于<?php echo date('Y-m-d',$item['addtime'])?></span>&#12288;
<span></span>
<div class="height1"></div><?php echo getsubstrutf8(t($item['content']),0,20)?>( <span class="comments"></span><a target="_blank" href="<?php echo SITE_URL;?><?php echo tsurl('group','topic',array('id'=>$item['topicid']))?>"><?php echo $item['count_comment'];?> 评论</a> )
</div>
</div>
<div class="view">
<div class="viewnum"><?php echo $item['count_view'];?></div>
<div class="viewed">飘过</div>
<div class="toview"><a target="_blank" href="<?php echo SITE_URL;?><?php echo tsurl('group','topic',array('id'=>$item['topicid']))?>">瞟一眼</a></div>
</div>
</div>
<?php }?>