<style>
.article{}
.article ul{}
.article ul li{border-bottom-color:#DDDDDD;border-bottom-style:dashed;border-bottom-width:1px;height:30px;line-height:30px;}
</style>
<div class="article">
<h2>最新文章</h2>
<ul>
<?php foreach((array)$arrArticle as $key=>$item) {?>
<li><a href="<?php echo SITE_URL;?><?php echo tsurl('article','show',array('id'=>$item['articleid']))?>"><?php echo $item['title'];?></a></li>
<?php }?>
</ul>
</div>