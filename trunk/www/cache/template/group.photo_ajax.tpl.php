<?php foreach((array)$arrTopic as $key=>$item) {?>
<div class="card-item">
<div class="head-box">
<a style="width:200px;" href="<?php echo SITE_URL;?><?php echo tsurl('group','topic',array('id'=>$item['topicid']))?>" class="large-box">
<img width="200px" height="<?php echo $item['photoinfo']['1'];?>" src="<?php echo SITE_URL;?><?php echo tsXimg($item['photo'],'topic',200,'',$item['path'])?>" class="cover" />
<span style="visibility: hidden; opacity: 0;" class="album-photo-number" title="<?php echo $item['title'];?>"><?php echo $item['title'];?></span>
</a>
</div>
<div class="details clearfix">
<div class="post-by">
<a href="<?php echo SITE_URL;?><?php echo tsurl('group','user',array('id'=>$item['user'][userid]))?>"><img height="48" width="48" alt="<?php echo $item['user'][username];?>" title="<?php echo $item['user'][username];?>" src="<?php echo $item['user'][face];?>" class="buddyicon"></a>
<div class="info">
<span class="author"><a href="<?php echo SITE_URL;?><?php echo tsurl('group','user',array('id'=>$item['user'][userid]))?>"><?php echo $item['user'][username];?></a>上传</span>
<div class="time">
<?php echo getTime($item['addtime'],time())?>
</div>
</div>
<div class="description"><?php echo $item['title'];?></div>
</div>
</div>
<div class="status-bar clearfix">
<div class="button-item">
<span class="button-collect guest">评论</span><span class="button-number"><?php echo $item['count_comment'];?></span>
</div>
</div>
<div class="shadow"></div>
</div>
<?php }?>