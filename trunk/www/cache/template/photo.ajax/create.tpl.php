<?php include template("ajax/header");?>
<div style="padding:10px;">
<form method="POST" action="<?php echo SITE_URL;?>index.php?app=photo&ac=ajax&ts=create_do">
相册名称（必填）
<br>
<input name="albumname" maxlength="90" size="47" />
<br>
相册介绍：
<br>
<textarea name="albumdesc"  cols="49" rows="12"></textarea>
<br>
<br>
<input type="submit" value="创建相册" />  <a href="<?php echo SITE_URL;?>index.php?app=photo&ac=ajax&ts=album">返回我的相册</a>
</form>
</div>

</body>
</html>