<?php include template('header'); ?>
<style>

.newBtn:hover {
    color: #FF6600;
}
.u17_container {
    height: 60px;
    position: absolute;
    top: 195px;
    width: 256px;
}
.u17_normal {
    background-image: url("<?php echo SITE_URL;?>app/<?php echo $app;?>/skins/<?php echo $skin;?>/u17_normal.png");
}
#u17_img {
    height: 26px;
    left: 20px;
    position: absolute;
    top: -3px;
    width: 222px;
    padding:20px;
}
.u60_container {
	float:left;
    height: 360px;
    position: absolute;
    top: 265px;
    width: 262px;
}
.u60_normal {
    background-image: url("<?php echo SITE_URL;?>app/<?php echo $app;?>/skins/<?php echo $skin;?>/u60_normal.png");
}
#u60_img {
    height: 326px;
    left: 20px;
    position: absolute;
    top: -3px;
    width: 216px;
    padding:20px;
}
#u20_img {
    height: 23px;
    left: 0;
    position: absolute;
    top: 0;
    width: 27px;
}

</style>
<link type="text/css" rel="stylesheet" href="<?php echo SITE_URL;?>app/<?php echo $app;?>/skins/<?php echo $skin;?>/editor.css" />
<script language="javascript" type="text/javascript" src="<?php echo SITE_URL;?>public/js/date/WdatePicker.js?4.72"></script>
<script language="javascript" src="<?php echo SITE_URL;?>app/<?php echo $app;?>/js/formValidator-4.1.1.js" type="text/javascript" charset="UTF-8"></script>
<script language="javascript" src="<?php echo SITE_URL;?>app/<?php echo $app;?>/js/formValidatorRegex.js" type="text/javascript" charset="UTF-8"></script>
<script>
$(document).ready(function(){
      //form 验证开始
      $.formValidator.initConfig({formID:"form4",theme:"ArrowSolidBox",mode:'AutoTip', onError:function(msg,obj,errorlist){$("#errorlist").empty();$.map(errorlist,function(msg){$("#errorlist").append("<li>" + msg + "</li>")});}});
     // $("#bbcode").formValidator({onShow:"请输入你的描述",onFocus:"描述至少要输入10个汉字或20个字符",onCorrect:"恭喜你,你输对了"}).inputValidator({min:20,onError:"你输入的描述长度不正确,请确认"});
      $("#title").formValidator({onShow:"请输入课程名称",onFocus:"课程名称至少要输入5个汉字或10个字符",onCorrect:"恭喜你,你输对了"}).inputValidator({min:10,onError:"你输入的课程名称长度不正确,请确认"});
      $("#avgprice").formValidator({onShow:"请输入人均费用",onFocus:"人均费用为空",onCorrect:"恭喜你,你输对了"}).inputValidator({min:1,onError:"人均费用不能为空,请确认"});
      $("#class_end_time").formValidator({onShow:"请输入截止时间",onFocus:"截止时间不能为空",onCorrect:"恭喜你,你输对了"}).inputValidator({min:1,onError:"截止时间不能为空,请确认"});
      $("#pnum").formValidator({onShow:"请输入可容纳最多人数",onFocus:"可容纳最多人数不能为空",onCorrect:"恭喜你,你输对了"}).inputValidator({min:1,onError:"可容纳最多人数不能为空,请确认"});
      $.formValidator.reloadAutoTip();
  
})
</script>
<div class="midder">
<div class="mc">
<h1>编辑课程：<?php echo $strStudy['title'];?></h1>
<div class="tabnav">
<ul>
<li class="select"><a href="<?php echo SITE_URL;?>index.php?app=study&ac=edit&ts=base&studyid=<?php echo $strStudy['studyid'];?>">修改信息</a></li>
</ul>
</div>

<div class="cleft">
<h1>
    <span style="color:#49A5DE;">课程信息：  </span>
</h1>

<form id="form4" method="POST" action="<?php echo SITE_URL;?>index.php?app=study&ac=do&ts=edit" enctype="multipart/form-data">
<table width="800">
<tbody>
<tr>
    <td width="100px">*课程名称 </td>
	<td><input style="padding:0px 0px;width:250px;" value="<?php echo $strStudy['title'];?>" type="text" value="" id="title" name="title" ></td>  
</tr>

<tr>
	<td>&nbsp;课程类型</td>
	<td>
	<select name="typeid">
	<?php foreach((array)$arrType as $key=>$item) {?>
	<option <?php if($item['typeid']==$strStudy['typeid']) { ?>selected="select"<?php } ?> value="<?php echo $item['typeid'];?>"><?php echo $item['typename'];?></option>
	<?php }?>
	</select>
	</td>
</tr>


<tr><td valign="top">&nbsp;内容</td><td><textarea style="width:515px;height:300px;" id="bbcodem"  name="content"><?php echo $strStudy['content'];?></textarea></td></tr>
<tr><td>&nbsp;课程海报</td><td><input id="photo" type="file" name="photo" />  (仅支持jpg,gif,png;不修改请留空)</td></tr>
<tr><td>*人均费用</td><td><input style="padding:0;width:70px;" value="<?php echo $strStudy['avgprice'];?>" id="avgprice" name="avgprice"  onKeyup="this.value=this.value.replace(/[^\d\>\<]/g,'');" /> 元</td></tr>
<tr><td>*截止时间	</td><td><input id="class_end_time" style="width:150px;height:18px"  value="<?php echo $strStudy['class_end_time'];?>"  name="class_end_time" readonly value="" onClick="WdatePicker({dateFmt:'yyyy-MM-dd HH:mm',minDate:'<?php echo date('Y-m-d')?> 00:00'})" /> </td></tr>
<tr><td>*可容纳最多人数</td><td><input id="pnum" style="padding:0;width:70px;" value="<?php echo $strStudy['pnum'];?>"  name="pnum"  onKeyup="this.value=this.value.replace(/[^\d]/g,'');" /> 人</td></tr>

<tr><td></td><td>
<input type="hidden" name="studyid" value="<?php echo $strStudy['studyid'];?>" />
<input class="submit" type="submit" value="好了，提交修改"> 
<a href="<?php echo SITE_URL;?><?php echo tsurl('study','show',array(estudyid=>$strStudy['studyid']))?>">返回</a>
</td></tr></tbody></table>
</form>
</div>

<div class="cright" id="cright" >
	<div class="u17_container" id="u17">
	<div class="u17_normal" id="u17_img">
               如需帮助，请随时给我们留言：
      support@tlaoshi.com
    </div>
	</div>
	<div class="u60_container" id="u60">
	<div class="u60_normal" id="u60_img">
	<span style="font-style: normal; font-family: 宋体; color: #00cc00; font-size: 13px; font-weight: normal; text-decoration: none;">如何才能让你的课程吸引人？</span><br><br>
         １.题目简单明了<br>
         ２.课程内容和特点介绍详细<br>
         ３.价格定位合理<br><br>
          更重要的是，邀请好友们都来参与	
	</div>
	</div>
</div>
</div>
</div>

<!--加载编辑器-->
<?php doAction('xheditor')?>
<?php include template('footer'); ?>