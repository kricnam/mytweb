
<div class="top-wp">
<ul class="tabs">
<li><a <?php if($ac=='space') { ?>class="current brT5"<?php } ?> href="<?php echo SITE_URL;?><?php echo tsurl('user','space',array('id'=>$strUser['userid']))?>">首页</a></li>
<li><a <?php if($ac=='feed') { ?>class="current brT5"<?php } ?> href="<?php echo SITE_URL;?><?php echo tsurl('user','feed',array('id'=>$strUser['userid']))?>">动态</a></li>
<li><a <?php if($ac=='topic') { ?>class="current brT5"<?php } ?> href="<?php echo SITE_URL;?><?php echo tsurl('user','topic',array('id'=>$strUser['userid']))?>">帖子</a></li>
<li><a <?php if($ac=='group') { ?>class="current brT5"<?php } ?> href="<?php echo SITE_URL;?><?php echo tsurl('user','group',array('id'=>$strUser['userid']))?>">小组</a></li>
<li><a <?php if($ac=='collect') { ?>class="current brT5"<?php } ?> href="<?php echo SITE_URL;?><?php echo tsurl('user','collect',array('id'=>$strUser['userid']))?>">喜欢</a></li>
<li><a <?php if($ac=='comment') { ?>class="current brT5"<?php } ?> href="<?php echo SITE_URL;?><?php echo tsurl('user','comment',array('id'=>$strUser['userid']))?>">评论</a></li>
<li><a <?php if($ac=='guestbook') { ?>class="current brT5"<?php } ?> href="<?php echo SITE_URL;?><?php echo tsurl('user','guestbook',array('id'=>$strUser['userid']))?>">留言</a></li>
</ul>
</div>
