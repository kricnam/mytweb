<?php include template('header'); ?>

<!--main-->
<div class="midder">
<?php include template('anti_menu'); ?>


<div>

<h2>远程提交垃圾词语</h2>
<p>如果你发现有垃圾词语，请通过下面输入远程提交给ThinkSAAS，我们将建立强大的垃圾词云存储库。</p>
<table>
<tr>
<td width="100">垃圾词：</td><td>

<input id="spamword" type="text" name="word" /> 
<input type="button" value="提交" onclick="postword();" />

</td>
</tr>

<tr><td>其他操作：</td><td><a href="<?php echo SITE_URL;?>index.php?app=system&ac=spam&ts=get">一键更新云垃圾词库到本地>></a></td></tr>

</table>

</div>


</div>
<script>var siteUrl = '<?php echo SITE_URL;?>';</script>
<script src="<?php echo SITE_URL;?>public/js/jquery-1.7.1.min.js" type="text/javascript"></script>
<script>
function postword(){
	var word = $("#spamword").val();
	if(word==''){
		alert('垃圾词不能为空！');return false;
	}else{
		$.post("http://www.thinksaas.cn/index.php?app=service&ac=spam", { 'word': word},
		function(rs){			
			alert('添加成功！感谢您的提供！');
			$("#spamword").val('');
			return false;
		})
	}
}
</script>
<?php include template('footer'); ?>