<script>function insertEdit(x){callback(x);}</script>
<div class="tabnav">
<ul>
<li <?php if($ts=='my') { ?>class="select"<?php } ?>><a href="<?php echo SITE_URL;?>index.php?app=attach&ac=ajax&ts=my">我的附件</a></li>
<!-- <li><a href="<?php echo SITE_URL;?>index.php?app=attach&ac=ajax&ts=add">普通上传</a></li> -->
<li  <?php if($ts=='flash') { ?>class="select"<?php } ?>><a href="<?php echo SITE_URL;?>index.php?app=attach&ac=ajax&ts=flash">Flash上传</a></li>

</ul>
</div>