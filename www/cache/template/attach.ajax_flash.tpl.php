<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title></title>

<style>

body{ font-size:12px;font-family:Arial;margin:0 auto;color:#434343;background#FFFFFF;}
p,form{margin:0;padding:0;}
a{color:#66873E;text-decoration:none;}
/*链接按钮*/
.subab{
background: #EBF5EB;
    border: 1px solid #B8CACB;
    border-radius: 12px 12px 12px 12px;
    color: #333333;
    cursor: pointer;
    font-weight: bold;
    padding: 4px 10px;
    text-shadow: 0 1px 0 #FFFFFF;
}

ul,li{padding:0;margin:0;list-style:none;}

</style>

<link type="text/css" rel="stylesheet" href="<?php echo SITE_URL;?>app/<?php echo $app;?>/skins/default/ajax.css" />

<script src="<?php echo SITE_URL;?>public/js/jquery-1.7.1.min.js" type="text/javascript"></script>
<script src="<?php echo SITE_URL;?>public/js/uploadify/jquery.uploadify.v2.1.4.js" type="text/javascript"></script>
<script src="<?php echo SITE_URL;?>public/js/uploadify/swfobject.js" type="text/javascript"></script>
<link type="text/css" rel="stylesheet" href="<?php echo SITE_URL;?>public/js/uploadify/uploadify.css" />
<script type="text/javascript">

$(document).ready(function()
{
	
	$("#uploadify").uploadify({
		'uploader': '<?php echo SITE_URL;?>public/js/uploadify/uploadify.swf',
		'script': '<?php echo SITE_URL;?>index.php',
		'scriptData':{'app':'attach','ac':'ajax','ts':'flash_do','userid':'<?php echo $TS_USER['user'][userid];?>'},
		'method':'GET', 
		'cancelImg': '<?php echo SITE_URL;?>public/js/uploadify/cancel.png',
		'folder': 'UploadFile',
		'queueID': 'fileQueue',
		'auto': false,
		'multi': true,
		'fileDesc':'rar,zip,doc,ppt,txt等格式',
		'fileExt':'*.rar;*.zip;*.doc;*ppt;*txt;*jpg;*png;*gif;',
		'onAllComplete' : function(event,data) {
			window.location = "<?php echo SITE_URL;?>index.php?app=attach&ac=ajax&ts=my";
		}

	});

})

</script>

</head>
<body>
<div style="padding:10px 0;">

<?php include template('ajax_menu'); ?>


<p>上传文件只支持：rar,zip,doc,ppt,txt,jpg,png,gif格式；上传最大支持1M的文件</p>

<div id="fileQueue"></div>
<input type="file" id="uploadify" />
<p>
<a href="javascript:$('#uploadify').uploadifyUpload()">上传</a>| 
<a href="javascript:$('#uploadify').uploadifyClearQueue()">取消上传</a>
| <a href="<?php echo SITE_URL;?>index.php?app=attach&ac=ajax&ts=my">返回我的附件</a>
</p>

</div>

</body>
</html>