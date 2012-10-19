<?php include template('header'); ?>
<script>
	$(document).ready(function(){
		$("#province").change(function(){
			var provinceid=$(this).val();
			$("#citySpan").load("<?php echo SITE_URL;?>index.php?app=user&ac=city&provinceid="+provinceid);
			$("#areaSpan").html("<select id=\"area\" name=\"area\"><option value=\"0\">请选则区</option></select>");
		});
	})
	function selectArea(){
		var cityid=$("#city").val();
		$("#areaSpan").load("<?php echo SITE_URL;?>index.php?app=user&ac=area&cityid="+cityid);
	}
</script>

<!--main-->
<div class="midder">
<div class="mc">
<?php include template('set_menu'); ?>

<div class="utable">
<table cellpadding="5" cellspacing="5">
<tr>
<th>常居地：</th>
<td>

<?php if($strUser['province']) { ?>
省份：<?php echo $strProvince['province'];?><br />
<?php } ?>

<?php if($strUser['city']) { ?>
城市：<?php echo $strCity['city'];?><br />
<?php } ?>

<?php if($strUser['area']) { ?>
区域：<?php echo $strArea['area'];?><br />
<?php } ?>

</td>
</tr>

<tr>
<th valign="top">修改常居地：</th>
<td>
<form method="POST" action="<?php echo SITE_URL;?>index.php?app=user&ac=do&ts=setcity">

<select id="province" name="province">
<option value='0' >请选则省</option>
<?php foreach((array)$province as $k=>$v) {?>
<option value="<?php echo $v['provinceid'];?>"><?php echo $v['province'];?></option>
<?php }?>
</select>
<span id="citySpan">
	<select id="city" name="city">
		<option value="0">请选则市</option>
	</select>
</span>
<span id="areaSpan">
	<select id="area" name="area">
		<option value="0">请选则区</option>
	</select>
</span>


<input class="submit" type="submit" value="修改"  />
</form>
</td>
</tr>

</table>
</div>
</div>
</div>
<?php include template('footer'); ?>