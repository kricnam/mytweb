<?php include template('header'); ?>
<?php doAction('home_index_js')?>
<?php doAction('home_index_css')?>
<style>
.mainlist {
	margin: 0 auto 25px;
	overflow: hidden;
	width: 600px;
    height: 170px;
	float: left;
}
.mainlist_img {
	float: left;
	height: 120px;
	position: relative;
    margin-left:10px;
	width: 187px;
	border:1px solid #DDDDDD;
}
.tags{padding-top:0px;  height: 150px;}
.tags ul{}
.tags ul li{float:left;}

.login {
    background: #E9EEF2;
    font-size: 14px;
	height:210px;
}
.login form {
    padding: 23px 0 0 50px;
    position: relative;
}
legend {
    display: none;
}
fieldset {
    border: 0 none;
    margin: 0;
    padding: 0;
	margin-bottom: 15px;
}
fieldset legend {
    color: #666666;
    padding: 0 5px;
}
.login .item {
    margin-bottom: 10px;
}
.item label {
    width: 4em;
}
label {
    font-family: Tahoma;
    vertical-align: middle;
}
.item input {
    padding: 3px 2px;
    width: 200px;
	height:25px;
	border:solid 1px #999999;
}
.login .item a {
    font-size: 12px;
}
.login .item1 {
    color: #666666;
    float: left;
    font-size: 12px;
    margin: 0 2px 10px 0;
}
.login .item1 label {
    display: inline-block;
    margin-left: 4.5em;
    margin-top: 4px;
}
.bn-submit {
    background: url("ui_nav_logo_4.png") no-repeat scroll -23px -48px transparent;
    border: medium none;
    color: #FFFFFF;
    cursor: pointer;
    font-size: 14px;
    height: 28px;
    line-height: 28px;
    padding-bottom: 3px;
    width: 80px;
}
</style>

<div class="midder">
<?php doAction('home_index_header')?>
<div class="clear"></div>

<div class="mc">
<div class="cleft">
<?php doAction('home_index_left')?>
<h2 style="float:left;">推荐课程</h2>   <h2 style="float:right;"><a href="<?php echo SITE_URL;?><?php echo tsurl('study','index')?>" class="phs_link"> 查看更多</a></h2>
<div class="mainlist">
   <?php foreach((array)$arrStudy as $key=>$item) {?>
   <div class="mainlist_img">
   <a href="<?php echo SITE_URL;?><?php echo tsurl('study','show',array(studyid=>$item['studyid']))?>" class="phs_link">
   <img src="<?php if($item['poster']) { ?><?php echo SITE_URL;?><?php echo tsXimg($item['poster'],'study',187,120,$item['path'],1)?><?php } ?>"></a>
   </a>
    <a  href="<?php echo SITE_URL;?><?php echo tsurl('study','show',array(studyid=>$item['studyid']))?>"><?php echo $item['title'];?></a><br>
	<span class="pl">分类：</span><?php echo $item['type'][typename];?><br>
	<span class="pl">老师： </span><?php echo $item['teachername'];?><br>
	<span class="pl">价格： </span><a href="<?php echo SITE_URL;?><?php echo tsurl('user','space',array('id'=>$item['user'][userid]))?>"><?php echo $item['avgprice'];?>元</a> 
   </div>
   <?php }?>
</div>

<h2 style="float:left;">热门课程</h2>   <h2 style="float:right;"><a href="<?php echo SITE_URL;?><?php echo tsurl('study','index')?>" class="phs_link"> 查看更多</a></h2>
<div class="mainlist">
   <?php foreach((array)$arrStudyHot as $key=>$item) {?>
   <div class="mainlist_img">
   <a href="<?php echo SITE_URL;?><?php echo tsurl('study','show',array(studyid=>$item['studyid']))?>" class="phs_link">
   <img src="<?php if($item['poster']) { ?><?php echo SITE_URL;?><?php echo tsXimg($item['poster'],'study',187,120,$item['path'],1)?><?php } ?>"></a>
   </a>
    <a  href="<?php echo SITE_URL;?><?php echo tsurl('study','show',array(studyid=>$item['studyid']))?>"><?php echo $item['title'];?></a><br>
	<span class="pl">分类：</span><?php echo $item['type'][typename];?><br>
	<span class="pl">老师： </span><?php echo $item['teachername'];?><br>
	<span class="pl">价格： </span><a href="<?php echo SITE_URL;?><?php echo tsurl('user','space',array('id'=>$item['user'][userid]))?>"><?php echo $item['avgprice'];?>元</a> 
   </div>
   <?php }?>
</div>
</div>

<div class="cright">
<?php if($TS_USER['user'] == '') { ?>
<div class="login">
<form action="<?php echo SITE_URL;?><?php echo tsurl('user','login',array(ts=>'do'))?>" method="post">
 <fieldset>
	<legend>登录</legend>
	<div class="item">
	<label>Email:</label>
	<br />
	<input type="email" name="email">
	</div>
	<div class="item">
	<label>密码：</label>
	<br />
	<input type="password" class="text" name="pwd">
	</div>
	
	<div class="item1">
	<input type="hidden" name="cktime" value="2592000" />
	<input type="submit" class="submit" value="登录"> <a href="'.SITE_URL.'index.php?app=user&ac=forgetpwd">忘记密码</a>
	</div>
</fieldset>
</form>
</div>
<?php } else { ?>
<div class="login">
<div style="color: #434343;font-family: '微软雅黑',Arial,Helvetica,sans-serif;font-size: 14px; text-align:'center';">
<li>
<a href="http://127.0.0.1/www/index.php?app=study&ac=add">创建同城课程</a>
</li>
</div>
</div>
<?php } ?>
<div style='height:180px;'>
<div class='tags'>
<h2>热门标签</h2>
<ul>
<?php foreach((array)$HotTagName as $key=>$item) {?>
<li><a class="post-tag" href="<?php echo SITE_URL;?><?php echo tsurl('study','index',array('tagid'=>$item['tagid']))?>"><?php echo $item['tagname'];?></a>×<?php echo $item['sum'];?></li>
<?php }?>
</ul>
</div>
</div>
<?php doAction('home_index_right_part2')?>
</div>

<div class="clear"></div>
<?php doAction('home_index_footer')?>

</div>

</div>
<?php include template('footer'); ?>