<?php include template('header'); ?>
<!--加载编辑器-->
<?php doAction('xheditor')?>

<div class="midder">
<div class="mc">
<h1>
[<?php echo $strGroup['groupname'];?>]<?php echo L::add_post?>
</h1>

<?php if($isGroupUser == '0') { ?>
<div style="font-size:14px;padding-top:50px;text-align:center;">不好意思，你不是本组成员不能发表帖子，请加入后再发帖</div>
<?php } else { ?>
<form method="POST" action="<?php echo SITE_URL;?>index.php?app=group&ac=add&ts=do" onsubmit="return newTopicFrom(this)"  enctype="multipart/form-data">


<table width="100%">
<tbody>
<tr><td width="50"><?php echo L::add_title?>:</td>
<td><input style="padding:3px 0;width:600px;" type="text" name="title" /></td></tr>	

<?php if($arrGroupType) { ?>
<tr><td height="30"><?php echo L::add_type?>:</td><td>
<select name="typeid">
<option value="0"><?php echo L::add_selecttype?></option>
<?php foreach((array)$arrGroupType as $key=>$item) {?>
<option value="<?php echo $item['typeid'];?>"><?php echo $item['typename'];?></option>
<?php }?>
</select></td></tr>
<?php } ?>


<tr>
<td valign="top">
<?php echo L::add_content?>:
</td><td><textarea style="width:600px;height:200px;font-size:14px;" id="bbcode" name="content"></textarea></td></tr>

<tr><td><?php echo L::add_photo?>:</td><td><input type="file" name="picfile" /> (仅支持jpg,gif,png格式图片) <input type="checkbox" name="photoshow" value="1" />回复显示</td></tr>
<tr><td><?php echo L::add_attach?>:</td><td><input type="file" name="attfile" />  (仅支持zip,rar,dic,txt,pdf,ppt,docx,xls,xlsx格式附件) 下载需要<input style="width:30px;" type="text" name="attachscore" value="0" />积分 <input type="checkbox" name="attachshow" value="1" />回复显示</td></tr>

<tr><td><?php echo L::add_tag?>:</td><td><input style="width:250px;" type="text" name="tag" /> (多个标签请用,号分割)</td></tr>

<tr><td><?php echo L::add_comment?>:</td><td><input type="radio" checked="select" name="iscomment" value="0" />允许 <input type="radio" name="iscomment" value="1" />不允许</td>
</tr>

<tr><td></td><td>
<input type="hidden" name="groupid" value="<?php echo $strGroup['groupid'];?>" />
<input class="submit" type="submit" value="<?php echo L::add_submit?>" /> 
<a href="<?php echo SITE_URL;?><?php echo tsurl('group','show',array('id'=>$strGroup['groupid']))?>" id="back"><?php echo L::add_return?></a>
</td></tr>

</tbody>
</table>	

</form>
<?php } ?>


</div>
</div>

<?php doAction('group_add_footer')?>
<?php include template('footer'); ?>