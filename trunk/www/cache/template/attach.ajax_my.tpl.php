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

.alist{}
.alist ul{}
.alist ul li{text-align:left;}
</style>

<link type="text/css" rel="stylesheet" href="<?php echo SITE_URL;?>app/<?php echo $app;?>/skins/default/ajax.css" />

</head>
<body>
<div style="text-align:center;padding:10px 0;">

<?php include template('ajax_menu'); ?>

<div class="alist">
<ul>
<?php foreach((array)$arrAttach as $key=>$item) {?>
<li><?php echo $item['attachname'];?> <a href="javascript:void('0');" onclick="insertEdit('[attach=<?php echo $item['attachid'];?>]');">[插入]</a></li>
<?php }?>
</ul>
</div>

</div>

</body>
</html>