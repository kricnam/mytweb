<?php include template('header'); ?>
<script src="public/js/jquery-1.7.1.min.js" type="text/javascript"></script>

<style>
.fbox{float:left;width:45%;margin-right:10px;}
</style>

<div class="midder" >

<div class="fbox" >
<h2>目录权限</h2>
<table>
<tr><td width="100">cache目录</td><td><?php if(iswriteable('cache')==0) { ?><font color="red">不可写</font>(请设置为可写777权限)<?php } else { ?>可写<?php } ?></td></tr>
<tr><td>data目录</td><td><?php if(iswriteable('data')==0) { ?><font color="red">不可写</font>(请设置为可写777权限)<?php } else { ?>可写<?php } ?></td></tr>
<tr><td>plugins目录</td><td><?php if(iswriteable('plugins')==0) { ?><font color="red">不可写</font>(请设置为可写777权限)<?php } else { ?>可写<?php } ?></td></tr>
<tr><td>uploadfile目录</td><td><?php if(iswriteable('uploadfile')==0) { ?><font color="red">不可写</font>(请设置为可写777权限)<?php } else { ?>可写<?php } ?></td></tr>
</table>
</div>


<div class="fbox"> 
<h2>服务器信息</h2>
<table>
    <tr><td width="100">服务器软件：</td><td><?php echo $systemInfo['server'];?></td></tr>
    <tr><td>操作系统：</td><td><?php echo $systemInfo['phpos'];?></td></tr>
    <tr><td>PHP版本：</td><td><?php echo $systemInfo['phpversion'];?></td></tr>
    <tr><td>MySQL版本：</td><td><?php echo $systemInfo['mysql'];?></td></tr>
    <tr><td>物理路径：</td><td><?php echo $_SERVER['DOCUMENT_ROOT'];?></td></tr>
	 <tr><td>附件上传限制：</td><td><?php echo $systemInfo['upload'];?></td></tr>
    <tr><td>图像处理：</td><td><?php echo $systemInfo['gd'];?> </td></tr>
    <tr><td>语言：</td><td><?php echo $_SERVER['HTTP_ACCEPT_LANGUAGE'];?></td></tr>
    <tr><td>gzip压缩：</td><td><?php echo $_SERVER['HTTP_ACCEPT_ENCODING'];?></td></tr>
</table>
</div>



</div>
<?php include template('footer'); ?>