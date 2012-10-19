<h2>小组管理</h2>
<div class="tabnav">
<ul>
<li <?php if($mg=='options') { ?>class="select"<?php } ?>><a href="<?php echo SITE_URL;?>index.php?app=group&ac=admin&mg=options">小组配置</a></li>
<li <?php if($mg=='group' && $ts=='list') { ?>class="select"<?php } ?>><a href="<?php echo SITE_URL;?>index.php?app=group&ac=admin&mg=group&ts=list">全部小组</a></li>

<li <?php if($mg=='cate' && $ts=='list') { ?>class="select"<?php } ?>><a href="<?php echo SITE_URL;?>index.php?app=group&ac=admin&mg=cate&ts=list">小组分类</a></li>

<li <?php if($mg=='cate' && $ts=='add') { ?>class="select"<?php } ?>><a href="<?php echo SITE_URL;?>index.php?app=group&ac=admin&mg=cate&ts=add">添加分类</a></li>

</ul>
</div>