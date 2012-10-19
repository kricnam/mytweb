<?php include template('header'); ?>

<script src="public/js/jquery-1.7.1.min.js" type="text/javascript"></script>
<script>
//安装卸载组件
function isinstall(appname){
	$('#isinstall_'+appname).html('<img src="public/images/loading.gif">');
	$.ajax({
		type: "GET",
		url:  "index.php?app=system&ac=apps&ts=install&appname="+appname,
		success: function(result){
			if(result=='1'){
				window.location.reload(true); 
			}else if(result=='2'){
				window.location.reload(true); 
			}else{
				alert("非法操作！");
			}
		}
	});
}

//升级
function isupdate(appkey,version){
	$.getJSON("http://www.thinksaas.cn/index.php?app="+appkey+"&ac=update&old="+version+"&callback=?", function(response){
		if(response != ''){
			$('#'+appkey).html('发现新版本：'+response.newv+'<a target="_blank" href="http://www.thinksaas.cn/"><font color="red">[升级]</font></a>');
		}
		
	});   
}

//设为导航
function isappnav(appkey,appname){
	$.ajax({
		type:"POST",
		url:"index.php?app=system&ac=apps&ts=appnav",
		data:"&appkey="+appkey+"&appname="+appname,
		beforeSend:function(){},
		success:function(result){
			if(result == '1'){
				window.location.reload(true); 
			}
		}
	})
}

//取消导航
function unisappnav(appkey){
	$.ajax({
		type:"POST",
		url:"index.php?app=system&ac=apps&ts=unappnav",
		data:"&appkey="+appkey,
		beforeSend:function(){},
		success:function(result){
			if(result == '1'){
				window.location.reload(true); 
			}
		}
	})
}

</script>

<!--main-->
<div class="midder">

<h2>组件管理</h2>

<div class="tabnav">
<ul>
<li class="select"><a href="index.php?app=system&ac=apps&ts=list">组件列表</a></li>
</ul>
</div>

<table width="100%" cellpadding="0" cellspacing="0">
<tr class="old">
<td width="150">组件名称</td>
<td>介绍</td>
<td>管理</td>
<td>操作</td>
</tr>
<?php foreach((array)$arrApp as $keys=>$item) {?>
<tr class="odd">
<td><img src="app/<?php echo $item['name'];?>/icon.png" title="<?php echo $item;?>" align="absmiddle" />
<?php echo $item['about'][name];?>(<?php echo $item['name'];?>)</td>
<td><?php echo $item['about'][desc];?></td>
<td>
<?php if($item['about'][isoption] == '1' && $item['about'][isinstall]=='1') { ?><a href="index.php?app=<?php echo $item['name'];?>&ac=admin&mg=options">[管理]</a><?php } ?> 
</td>
<td>
<?php if($item['about'][isappnav] == '1' && $TS_SITE['appnav'][$item['name']] == '') { ?><a href="javascript:void('0');" onclick="isappnav('<?php echo $item['name'];?>','<?php echo $item['about'][name];?>');">[导航]</a><?php } ?>

<?php if($item['about'][isappnav] == '1' && $TS_SITE['appnav'][$item['name']] != '') { ?><a href="javascript:void('0');" onclick="unisappnav('<?php echo $item['name'];?>');">[取消导航]</a><?php } ?>
</td>

</tr>
<?php }?>
</table>

</div>

<?php include template('footer'); ?>