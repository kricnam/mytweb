<h2>课程管理</h2>
<div class="tabnav">
<ul>
<li <?php if($mg=='options') { ?>class="select"<?php } ?>><a href="<?php echo SITE_URL;?>index.php?app=study&ac=admin&mg=options">课程类型配置</a></li>
<li <?php if($mg=='study' && $ts=='list') { ?>class="select"<?php } ?>><a href="<?php echo SITE_URL;?>index.php?app=study&ac=admin&mg=study&ts=list">全部申请课程</a></li>
</ul>
</div>