<?php include template('header'); ?>
<link type="text/css" rel="stylesheet" href="<?php echo SITE_URL;?>app/<?php echo $app;?>/skins/<?php echo $skin;?>/editor.css" />
<style>
.u17_container {
    height: 60px;
    position: absolute;
    top: 155px;
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
</style>
<div class="midder">
<div class="mc">
<h1>
<div class="nav-step">
    <span class="pl">1、填写课程信息  </span>
    <span class="pl">&gt;</span>
    <span class="pl">2、填写教师简介  </span>
    <span class="pl">&gt;</span>
    <span style="color:#49A5DE;">3、发布</span>
</div>
</h1>
<form  method="POST" action="<?php echo SITE_URL;?>index.php?app=study&ac=show&studyid=<?php echo $studyid;?>" enctype="multipart/form-data">
<table width="800">
<tbody>
	课程内容已提交，正在审核中。。。。。。<br><br>
	淘老师管理员会在2个工作日审核您的课程内容，并将审核结果通过邮件发给您。<br>
	如需帮助，请给我们发邮件到Support@tlaoshi.com。或者通过新浪微博@淘老师教育网给我们留言。
	<br><br>
	谢谢。
	<tr>
		<td></td>
		<td>
		<input class="submit" type="submit" value="完成课程发布">
    </tr>
</tbody>
</table>
</form>
<!--right part-->
<div class="cright" id="cright">
	<div class="u17_container" id="u17">
	<div class="u17_normal" id="u17_img">
               如需帮助，请随时给我们留言：
      support@tlaoshi.com
    </div>
	</div>
</div>
</div>
</div>

<!--加载编辑器-->
<?php include template('footer'); ?>