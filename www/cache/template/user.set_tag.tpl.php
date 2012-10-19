<?php include template('header'); ?>

<!--main-->
<div class="midder">
<div class="mc">
<?php include template('set_menu'); ?>

<div>
<div class="tags">
<?php foreach((array)$arrTag as $key=>$item) {?>
<a rel="tag" title="" class="post-tag" href=""><?php echo $item['tagname'];?></a>
<?php }?>

<a rel="tag"  href="javascript:void('0');" onclick="showTagFrom()">+添加个人标签</a>
</div>

<p id="tagFrom" style="display:none">
<input style="width:250px;padding:3px 2px;" type="text" name="tags" id="tags" /> <button type="submit" class="submit" onClick="savaTag(<?php echo $userid;?>)">添加</button> <a href="javascript:void(0);" onClick="showTagFrom()">取消</a>
</p>


</div>



</div>
</div>
<script>

/*显示标签界面*/
function showTagFrom(){	$('#tagFrom').toggle('fast');}
/*提交标签*/
function savaTag(userid)
{
	var tag = $('#tags').val();
		if(tag ==''){ alert('请输入标签哟^_^');$('#tagFrom').show('fast');}else{
			var url = siteUrl+'index.php?app=tag&ac=add_ajax&ts=do';
			$.post(url,{objname:'user',idname:'userid',tags:tag,objid:userid},function(rs){  window.location.reload()   })
		}
	
}
</script>
<?php include template('footer'); ?>