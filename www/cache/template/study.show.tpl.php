<?php include template('header'); ?>
<?php doAction('xheditor')?>
<style>
.Administration_right_ps{
	float:left;
	width:100%;
}
.Administration_tab{
	width:100%;
    
}
.red{
	color:#A30A0F;
}
.obu {
    display: inline;
    float: left;
    margin: 0 0 10px;
    width: 76px;
}
.obu dt {
    height: 50px;
    line-height: 16px;
    margin: 0;
    overflow: hidden;
    text-align: center;
}
.obu dd {
    height: 30px;
    margin: 0;
    overflow: hidden;
    text-align: center;
}
</style>
<script>
//参加或者感感兴趣
function userDoWish(studyid,status){
	$.ajax({
		type: "POST",
		url: siteUrl+"index.php?app=study&ac=do&ts=dowish",
		data: "studyid="+studyid+"&status="+status,
		beforeSend:function(){
		},
		success:function(result){
			if(result == '0'){
				art.dialog({
					icon: 'warning',
					content: '请登录后再参与课程^_^'
				});
			}else if(result == '1'){
				art.dialog({
					icon: 'warning',
					content: '你已经参加了该课程^_^'
				});
			}else if(result == '2'){
				art.dialog({
					time: 3,
					icon: 'succeed',
					content: '参加课程成功^_^'
				});
				window.location.reload(); 
			}else{				
				window.location.reload(); 
			}
		}
	});
}

//取消参加课程
function cancelStudy(studyid,userid){
	art.dialog.confirm('确定不参加了吗？', function(){
	$.ajax({
		type: "POST",
		url: siteUrl+"index.php?app=study&ac=do&ts=cancel",
		data: "studyid="+studyid+"&userid="+userid,
		beforeSend:function(){
		},
		success:function(result){
			if(result == '1'){
				art.dialog({
					time: 3,
					icon: 'succeed',
					content: '取消参加课程^_^'
				});
				window.location.reload(); 
			}
		}
	});
	});
}

//参加课程
function doStudy(studyid,userid){
	$.ajax({
		type: "POST",
		url: siteUrl+"index.php?app=study&ac=do&ts=do",
		data: "studyid="+studyid+"&userid="+userid,
		beforeSend:function(){
		},
		success:function(result){
			if(result == '1'){
				art.dialog({
					time: 3,
					icon: 'succeed',
					content: '参加课程成功^_^'
				});
				window.location.reload(); 
			}
		}
	});
}
</script>
<div class="midder">

<div  class="mc">
<h1 id="headermc"><?php echo $strStudy['title'];?></h1>
<div class="cleft">
<link type="text/css" rel="stylesheet" href="<?php echo SITE_URL;?>app/<?php echo $app;?>/skins/<?php echo $skin;?>/topic_event.css" id="skin" />
<!--class top part-->
<div class="subjectwrap">
    <!--cangyu-->
	<div id="actchoice">
	    <?php if($nowtime>$strStudy['class_end_time']) { ?>	
		<?php } elseif ($TS_USER['user'][userid] == $strStudy['user']['userid']||$strStudy['isaudit']==0) { ?>
		<?php } elseif ($TS_USER['user'][userid] == ''|| $isStudyUser=='') { ?>
		<a href="javascript:void('0');" onclick="userDoWish('<?php echo $strStudy['studyid'];?>','1');" class="redbutt  "><span>我感兴趣</span></a><br class="clear">
		<a href="javascript:void('0');" onclick="userDoWish('<?php echo $strStudy['studyid'];?>','0');" class="redbutt  "><span>我要参加</span></a><br class="clear">
		<br><br>
		<?php } else { ?>
		<a href="javascript:void('0');" onclick="userDoWish('<?php echo $strStudy['studyid'];?>','1');" class="redbutt  "><span>我感兴趣</span></a><br class="clear">
		<a href="javascript:void('0');" onclick="userDoWish('<?php echo $strStudy['studyid'];?>','0');" class="redbutt  "><span>我要参加</span></a><br class="clear">
		<br><br>
		<?php if($strStudyUser['status']=='1') { ?>
		<div class="m">我对这个课程感兴趣</div>
		<span class="gact">&gt; <a href="javascript:void('0');" onclick="doStudy('<?php echo $strStudy['studyid'];?>','<?php echo $TS_USER['user'][userid];?>');">我要参加</a></span>
		<?php } elseif ($strStudyUser['status']=='0') { ?>
		<div class="m">我会参加这个课程</div>
		<?php } ?>
		<span class="gact">&gt;
		<a class="j a_confirm_link" href="javascript:void('0');" onclick="cancelStudy('<?php echo $strStudy['studyid'];?>','<?php echo $TS_USER['user'][userid];?>');">
		我不去了</a></span>	
		<?php } ?>	
	</div>
	<!--cangyu end -->
	<div class="fil">
	<a  target="_blank" href="<?php echo SITE_URL;?>uploadfile/study/<?php echo $strStudy['poster'];?>"><img title="点击看大图"    src="<?php if($strStudy['poster']) { ?><?php echo SITE_URL;?><?php echo tsXimg($strStudy['poster'],'study',100,100,$strStudy['path'],1)?><?php } else { ?><?php echo SITE_URL;?>public/images/event_dft.jpg<?php } ?>"></a>
	<br>
	</div>
	<div style="width:350px;" id="info">
	<div class="obmo">
		<table style="margin-left:-5px">
		<tr><td valign="top"><span class="pl" >时间: </span></td><td valign="top"><?php echo $strStudy['time'];?></td></tr>
		</table>
		<span class="pl">截止时间： </span><?php echo $strStudy['class_end_time'];?><br>
	    <span class="pl">地点: </span>&nbsp;&nbsp;&nbsp;<?php echo $strStudy['address'];?> 
		<br>
		<span class="pl">费用: </span>&nbsp;&nbsp;&nbsp;<?php echo $strStudy['avgprice'];?>元 
		<br>
		<span class="pl">类型: </span>&nbsp;&nbsp;&nbsp;<?php echo $strStudy['type'][typename];?><br>
		<span class="pl">讲师: </span> &nbsp;&nbsp;&nbsp;<a href="<?php echo SITE_URL;?><?php echo tsurl('user','space',array('id'=>$strStudy['user'][userid]))?>"><?php echo $strStudy['user'][username];?></a> 
		<br>
		<span class="pl">标签: </span>&nbsp;&nbsp;&nbsp;
		<?php foreach((array)$tag as $key=>$item) {?>
		<?php echo $item['tagname'];?>     
		<?php }?>
		<br>
		<?php if($arrOrganizer) { ?>
		<span class="pl">组织者: </span>&nbsp;&nbsp;&nbsp;
		<?php foreach((array)$arrOrganizer as $key=>$item) {?>
		<a href="#"><?php echo $item['username'];?></a> &nbsp;
		<?php }?>
		<br>
		<?php } ?>
		<span><?php echo $strStudy['count_userwish'];?>人感兴趣 &nbsp;  <?php echo $strStudy['count_userdo'];?>人参加</span><br>
		<span style="font-style: normal; font-family: Arial; color: #ff0000; font-size: 13px; font-weight: normal; text-decoration: none;">
		<?php if($nowtime>$strStudy['class_end_time']) { ?>
		<span style="color: red;"> 课程报名已经截止</span>
		<?php } elseif (($TS_USER['user'][userid] == $strStudy['user']['userid']||$TS_USER['user'][isadmin]=='1')&&$strStudy['isaudit']==0) { ?>
		<span style="color: red;"> 课程已创建，等待审核中。。。审核通过后会通知您</span>
		<?php } elseif ($TS_USER['user'][userid] == $strStudy['user']['userid']&&$strStudy['isaudit']==1) { ?>
		<a href="<?php echo SITE_URL;?>index.php?app=study&ac=do&ts=del&studyid=<?php echo $strStudy['studyid'];?>">删除</a>
		<?php } else { ?>
        <?php } ?>
		</span>
		<!-- JiaThis Button BEGIN -->
		<div class="jiathis_style_32x32">
			<a class="jiathis_button_qzone"></a>
			<a class="jiathis_button_tsina"></a>
			<a class="jiathis_button_tqq"></a>
			<a class="jiathis_button_renren"></a>
			<a class="jiathis_button_kaixin001"></a>
			<a href="http://www.jiathis.com/share" class="jiathis jiathis_txt jtico jtico_jiathis" target="_blank"></a>
			<a class="jiathis_counter_style"></a>
		</div>
		</div><br clear="all">
	</div>
</div>
<!--class top part end -->

<!--class bottom part -->
<div class="topic-content clearfix">
<h2>课程详情</h2>
<div class="topic-doc">
<p><?php echo $strStudy['content'];?></p>

<!--签名-->
<?php if($strStudy['user'][signed] != '') { ?>
<div class="signed"><?php echo $strStudy['user'][signed];?></div>
<?php } ?>


<div style="text-align:right;">	
<?php if($TS_USER['user'][isadmin]=='1') { ?>
<a href="<?php echo SITE_URL;?>index.php?app=study&ac=do&ts=isaudit&studyid=<?php echo $strStudy['studyid'];?>"> <?php if($strStudy['isaudit'] == 0) { ?><font color="red">审核</font><?php } else { ?>[撤销审核]<?php } ?></a>
<a href="<?php echo SITE_URL;?>index.php?app=study&ac=do&ts=isrecommend&studyid=<?php echo $strStudy['studyid'];?>"><?php if($strStudy['isrecommend']==0) { ?><font color="red">推荐</font><?php } else { ?>取消推荐<?php } ?></a>
<a href="<?php echo SITE_URL;?>index.php?app=study&ac=do&record=1&ts=del&studyid=<?php echo $strStudy['studyid'];?>">删除</a>
<?php } ?>
</div>

</div>
</div>
<!--class bottom part end -->

<h2>你的回应</h2>
<ul class="comment">
<?php foreach((array)$arrStudyComment as $key=>$item) {?>
<li class="clearfix">
    <div class="user-face">
        <a href="<?php echo SITE_URL;?><?php echo tsurl('user','space',array('id'=>$item['user'][userid]))?>"><img title="<?php echo $item['user'][username];?>" alt="<?php echo $item['user'][username];?>" src="<?php echo $item['user'][face];?>" class="pil"></a>
    </div>
    <div class="reply-doc">
            <h4><?php echo date('Y-m-d H:i:s',$item['addtime'])?>
                <a href="<?php echo SITE_URL;?><?php echo tsurl('user','space',array('id'=>$item['userid']))?>"><?php echo $item['user'][username];?></a>
            </h4>
        <p><?php echo $item['content'];?></p>		
		<!--签名-->
		<?php if($item['user'][signed] != '') { ?>
		<div class="signed"><?php echo $item['user'][signed];?></div>
		<?php } ?>
	
	   <?php if($TS_USER['user'][userid] == $strStudy['userid']) { ?>
        <div class="group_banned">
		<span><a href="">回复</a></span>
            <span><a class="j a_confirm_link" href="javascript:void('0');" onclick="comment_del('<?php echo $item['topicid'];?>','<?php echo $item['commentid'];?>');" rel="nofollow">删除</a>
            </span>
        </div>
	<?php } ?>
	<!--回复评论-->
	<div></div>	
    </div>
</li>
<?php }?>
</ul>

<div class="page"><?php echo $pageUrl;?></div>
<?php if($TS_USER['user'][userid] == '') { ?>
<div style="font-size:14px;padding:40px 0;text-align:center;">请登录后回应本课程^_^</div>
<?php } else { ?>
<div>
<form method="POST" action="<?php echo SITE_URL;?>index.php?app=study&ac=do&ts=comment">
<textarea id="bbcodem" style="width:100%;height:100px;" name="content"></textarea><br>
<input type="hidden" name="studyid" value="<?php echo $strStudy['studyid'];?>" />
<input class="submit" type="submit" value="加上去">
</form>
</div>
<?php } ?>
</div>
<!-- right part -->
<div class="cright">
	<div class="more_event"><a href="<?php echo SITE_URL;?><?php echo tsurl('study','type',array(typeid=>$strStudy['type'][typeid]))?>">更多<?php echo $strStudy['type'][typename];?>课程</a></div>
	<!-- 老师简介 -->
	<h2>教师</h2>
	<tr>		   
	<div class="Administration_right_ps">
	     <table class="Administration_tab" cellpadding="0" cellspacing="0" border="0">
	       	<tr>
	           	<td width="35%" valign="top">
	           	<img width="99" height="79"  src="<?php if($strStudy['poster_s']) { ?><?php echo SITE_URL;?><?php echo tsXimg($strStudy['poster_s'],'teacher',99,79,$strStudy['path_s'])?><?php } else { ?><?php echo SITE_URL;?>app/<?php echo $app;?>/skins/<?php echo $skin;?>/Administration_default.jpg<?php } ?>">
	           	</td>
	            <td width="65%" valign="top"><?php echo $strStudy['teachercontent'];?></td>
	        </tr>
	           <tr>
	           	
	           </tr>
	       </table>
	</div>
	</tr>
	
	<tr>
	<td>课程统计：&nbsp;&nbsp;</td>
	<td>共发布<?php echo $classnum;?>个课程&nbsp;&nbsp;</td>
	</tr>
	<br><br>
	<div class="clear"></div>
</div>

<!-- right part end -->
<div class="cright" id="cright" >
<!--happyed person-->
<h2>对这个课程感兴趣的成员 
 <span class="pl">( <a href="">全部<?php echo $strStudy['count_userwish'];?>人</a> )</span></h2>
<div class="obss name">
<?php foreach((array)$arrWishUser as $key=>$item) {?>
<dl class="obu">
<dt><a class="nbg" href="<?php echo SITE_URL;?><?php echo tsurl('user','space',array('id'=>$item['userid']))?>"><img alt="<?php echo $item['username'];?>" class="m_sub_img" src="<?php echo $item['face'];?>" alt="<?php echo $item['username'];?>"><font style=" padding-top:2px"></a></dt>
<dd><?php echo $item['username'];?></dd>
</dl>
<?php }?>
<br clear="all">
</div>
<div class="clear"></div>
<!--happyed person end-->

<!--study person-->
<h2>参加这个课程的成员
<span class="pl">( <a href="">全部<?php echo $strStudy['count_userdo'];?>人</a> )</span></h2>		
<div class="obss name">
<?php foreach((array)$arrDoUser as $key=>$item) {?>
<dl class="obu">
<dt><a class="nbg" href="<?php echo SITE_URL;?><?php echo tsurl('user','space',array('id'=>$item['userid']))?>"><img  class="m_sub_img" src="<?php echo $item['face'];?>" alt="<?php echo $item['username'];?>" /></a></dt>
<dd><?php echo $item['username'];?></dd>
</dl>
<?php }?>
<br clear="all">
</div>
<!--study person end -->
<div class="clear"></div>

<h2>课程支持小组</h2>
<?php foreach((array)$arrGroup as $key=>$item) {?>
<dl class="obu"><dt><a class="nbg" href="<?php echo SITE_URL;?><?php echo tsurl('group','show',array('id'=>$item['groupid']))?>"><img alt="<?php echo $item['groupname'];?>" class="m_sub_img" src="<?php echo $item['icon_48'];?>"></a></dt>
<dd><a href="<?php echo SITE_URL;?><?php echo tsurl('group','show',array('id'=>$item['groupid']))?>"><?php echo $item['groupname'];?></a></dd></dl>
<?php }?>
<div class="clear"></div>
</div>
 
</div>
</div>
<script type="text/javascript" src="http://v3.jiathis.com/code/jia.js?uid=1334588685772498" charset="utf-8"></script>
<!-- JiaThis Button END -->
<script type="text/javascript">
var title = $("#headermc").html();
var jiathis_config={
sm:"tsina,tqq,renren,ishare",
   url:window.location.href,
   summary:"我刚刚用#陶老师#报名了"+title+"课程，果然很给力，感叹学海无涯啊。推荐给大家！（分享自 @陶老师 ）",
   title:"#陶老师#",
   pic:"",
   ralateuid:{
       "tsina":"tLaoshi"
   },
hideMore:false
}
</script>
<?php include template('footer'); ?>