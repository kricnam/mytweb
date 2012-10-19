<?php include template('header'); ?>
<link type="text/css" rel="stylesheet" href="<?php echo SITE_URL;?>app/<?php echo $app;?>/skins/<?php echo $skin;?>/index.css" />
<script language="javascript" type="text/javascript" src="<?php echo SITE_URL;?>public/js/date/WdatePicker.js?4.72"></script>
<script>
var p ="<?php echo SITE_URL;?><?php echo tsurl('study','index',get_url_query($url_args, array('provinceid','cityid','areaid','page')))?>";
$(document).ready(function(){
	$("#province").change(function(){
		var provinceid=$(this).val();
		window.location.href= p+"&provinceid="+provinceid;		
	});	
})
 function selectArea(){
	var cityid=$("#city").val();
	var c ="<?php echo SITE_URL;?><?php echo tsurl('study','index',get_url_query($url_args, array('cityid','areaid','page')))?>";
	window.location.href= c+"&cityid="+cityid;		
}
 function selectP(){
	var areaid=$("#area").val();
	var a ="<?php echo SITE_URL;?><?php echo tsurl('study','index',get_url_query($url_args, array('areaid','page')))?>";
	window.location.href= a+"&areaid="+areaid;		
}
 function submit(){
	 var date= $('#date').val();
	 var dateurl ="<?php echo SITE_URL;?><?php echo tsurl('study','index',get_url_query($url_args, array('page','dateid','date')))?>";
	 window.location.href= dateurl+"&date="+date;		 
 }

</script>
<style>
.zoom {
    overflow: hidden;
}
.choosedCon span {
    background: none repeat scroll 0 0 #CC0000;
    color: white;
    cursor: pointer;
    margin: 0 0 0 6px;
    padding: 0 2px;
    float: left;
}
.font14 {
    font-size: 14px;
}
.fl {
    display: inline;
    float: left;
}
.choosedCon span a {
    background-position: 0 -36px;
    margin-left: 7px;
    width: 11px;
}
.icon_form {
    background: url("<?php echo SITE_URL;?>app/<?php echo $app;?>/skins/<?php echo $skin;?>/icon_form.gif") no-repeat scroll 0 0 transparent;
    display: inline-block;
}
.tags{padding-top:30px;padding-right:2px;height:180px;}
.tags ul{}
.tags ul li{float:left;}
.u17_container {
    height: 60px;
    position: absolute;
    top: 335px;
    width: 250px;
}
.u17_normal {
    background-image: url("<?php echo SITE_URL;?>app/<?php echo $app;?>/skins/<?php echo $skin;?>/u17_normal.png");
}
#u17_img {
    height: 26px;
    position: absolute;
    top: -3px;
    width: 222px;
    padding:20px;
}
</style>
<div class="midder">
<div class="mc">
<div class="navs" style="width: 180px;">
	<div class="block_menu">
	<em class="ft"></em><b class="ft"></b>
	<ul>	
	<li class="clearfix" id="event_home"><a href="<?php echo SITE_URL;?><?php echo tsurl('study')?>"><span>课程首页</span></a></li>
	<div class="line"></div>
	<li class="clearfix" id="event_home"><span style="font-size:14px; ">课程地点</span>  </li>
	<li class="clearfix">
	<select id="province" name="province">
	<option value='0' >请选则省</option>
	<?php foreach((array)$province as $k=>$v) {?>
	<option value="<?php echo $v['provinceid'];?>"><?php echo $v['province'];?></option>
	<?php }?>
	</select>
	</li>
	<li class="clearfix">
		<span id="citySpan">
			<select id="city" name="city" onchange="selectArea()">
				<option value="0">请选则市</option>
				    <?php if($provinceid!=0) { ?>
					<?php foreach((array)$city as $k=>$v) {?>
					<option value="<?php echo $v['cityid'];?>"><?php echo $v['city'];?></option>
					<?php }?>
					<?php } ?>
			</select>
		</span>
	</li>
	<li class="clearfix">
		<span id="areaSpan">
			<select id="area" name="area" onchange="selectP()">
				<option value="0">请选则区</option>
					<?php if($cityid!=0) { ?>
					<?php foreach((array)$area as $k=>$v) {?>
					<option value="<?php echo $v['areaid'];?>"><?php echo $v['area'];?></option>
					<?php }?>
					<?php } ?>
			</select>
		</span>
	</li>
	<div class="line"></div>
	<li class="clearfix" id="event_home"><span style="font-size:14px; ">类型</span>  </li>
    <?php  $Type_filter = get_url_query($url_args, array('page','typeid'));
    ?>		
	<li class="clearfix <?php if($typeid==0) { ?>on<?php } ?>"><a href="<?php echo SITE_URL;?><?php echo tsurl('study','index',$Type_filter)?>"><span>全部类型(<?php echo $arrStudyType['count'];?>)</span></a></li>
	<?php foreach((array)$arrStudyType['list'] as $key=>$item) {?>
	<?php  $Type_url = array_merge($Type_filter,array(typeid=>$item['typeid']));
          //echo var_export($Type_url);
    ?>	
	<li class="clearfix <?php if($typeid==$item['typeid']) { ?>on<?php } ?>"><a href="<?php echo SITE_URL;?><?php echo tsurl('study','index',$Type_url)?>"><span><?php echo $item['typename'];?>(<?php echo $item['count_study'];?>)</span></a></li>
	<?php }?>
	<div class="line"></div>
	
		
	<li class="clearfix" id="event_home"><span style="font-size:14px; ">时间</span>  </li>
	<?php  $Date_filter = get_url_query($url_args, array('page','dateid','date'));
    ?>	
	<li class="clearfix <?php if($dateid==0) { ?>on<?php } ?>"><a href="<?php echo SITE_URL;?><?php echo tsurl('study','index',$Date_filter)?>"><span>全部时间</span></a></li>
	<?php foreach((array)$_SCONFIG['date_range'] as $key=>$item) {?>
	<?php  $Date_url = array_merge($Date_filter,array(dateid=>$key));
    ?>
	<li class="clearfix <?php if($dateid==$key ) { ?>on<?php } ?>"><a href="<?php echo SITE_URL;?><?php echo tsurl('study','index',$Date_url)?>"><span><?php echo $item['date_desc'];?></span></a></li>
	<?php }?>
	<li>
	<table style="padding:0px;">
	<tr>

	<td style="padding:0px;">
	<input id="date" name="date"  style="width:100px;height:18px" class="Wdate" readonly value="" onClick="WdatePicker({dateFmt:'yyyy-MM-dd'})" />
	</td>
	<td style="padding:0px;"><a href="javascript:submit();"><img style="padding-top:8px;  width="25" height="24"  src="<?php echo SITE_URL;?>app/<?php echo $app;?>/skins/<?php echo $skin;?>/search.jpg" /></a>
	</td>
	</tr>
	</table>
	</li>
	</ul>
	<em class="fb"></em><b class="fb"></b>
	</div>
	<div id="calendarDiv">
	
	
	</div>
</div>

<!--content-->
<div class="article">
<!-- menu -->
<div style="position: relative;">
<div class="top-wp">
<ul class="tabs">
<?php   $Order_filter_a = get_url_query($url_args, array('page','orderby','order'));
       $Order_url_1 = array_merge($Order_filter_a,array(orderby=>'order by class_end_time',order=>'asc'));
       $Order_url_2 = array_merge($Order_filter_a,array(orderby=>'order by count_userdo desc,',order=>'count_userwish desc'));
       $Order_url_3 = array_merge($Order_filter_a,array(orderby=>'order by avgprice',order=>'asc'));
       $Order_url_4 = array_merge($Order_filter_a,array(orderby=>'order by addtime',order=>'desc'));
?>
<li><a <?php if($orderby=='order by class_end_time') { ?>class="current"<?php } ?> href="<?php echo SITE_URL;?><?php echo tsurl('study','index',$Order_url_1)?>"><span>即将截止</span></a></li>
<li><a <?php if($orderby=='order by count_userdo desc,') { ?>class="current"<?php } ?> href="<?php echo SITE_URL;?><?php echo tsurl('study','index',$Order_url_2)?>">热度</a></li>
<li><a <?php if($orderby=='order by avgprice') { ?>class="current"<?php } ?> href="<?php echo SITE_URL;?><?php echo tsurl('study','index',$Order_url_3)?>"><span>价格</span></a></li>
<li><a <?php if($orderby=='order by addtime') { ?>class="current"<?php } ?> href="<?php echo SITE_URL;?><?php echo tsurl('study','index',$Order_url_4)?>"><span>最新发布</span></a></li>
<li style="float:right;"><a href="<?php echo SITE_URL;?>index.php?app=study&ac=add" >创建同城课程</a></li>
</ul>
</div>
</div>
<!-- menu end-->
<div class="clear"></div>
	<div id="wt_0">
	<div class="zoom choosedCon">
		<?php   $Type_filter_a = get_url_query($url_args, array('page','typeid'));
		       $Date_filter_a = get_url_query($url_args, array('page','dateid','date'));
		       $province_filter_a = get_url_query($url_args, array('page','provinceid','cityid','areaid'));
		       $city_filter_a = get_url_query($url_args, array('page','cityid','areaid'));
		       $area_filter_a = get_url_query($url_args, array('page','areaid'));
	    ?>
	    <?php if($typeid!=0||$dateid!=0||$provinceid!=0||$cityid!=0||$areaid!=0||$date!=0) { ?>
	    <b class="font14 fl">已选条件</b>
	    <div>	    
	    <?php if($provinceid!=0||$cityid!=0||$areaid!=0) { ?>
	    <span>地点：
		<?php foreach((array)$arrProvince as $key=>$item) {?>		
		 <?php if($item[$provinceid]!='') { ?>
		 <?php echo $item[$provinceid]?><a class="icon_form" href="<?php echo SITE_URL;?><?php echo tsurl('study','index',$province_filter_a)?>">&nbsp;</a>
		<?php } ?>
		<?php }?>
		<?php foreach((array)$arrCity as $key=>$item) {?>
		 <?php if($item[$cityid]!='') { ?>
		 <?php echo $item[$cityid]?><a class="icon_form" href="<?php echo SITE_URL;?><?php echo tsurl('study','index',$city_filter_a)?>">&nbsp;</a>
		<?php } ?>
		<?php }?>	
		<?php foreach((array)$arrArea as $key=>$item) {?>
		 <?php if($item[$areaid]!='') { ?>
		 <?php echo $item[$areaid]?><a class="icon_form" href="<?php echo SITE_URL;?><?php echo tsurl('study','index',$area_filter_a)?>">&nbsp;</a>		 
		<?php } ?>
		<?php }?>
		</span>
	    <?php } ?>
	    
        <?php if($typeid!=0) { ?>
		<span>类型：<?php echo $arrStudyType['list'][($typeid-1)][typename];?><a class="icon_form" href="<?php echo SITE_URL;?><?php echo tsurl('study','index',$Type_filter_a)?>">&nbsp;</a></span>
	    <?php } ?>
	    <?php if($dateid!=0||$date!=0) { ?>
		<span>时间：<?php if($date!=0) { ?><?php echo $date;?><?php } else { ?><?php echo $_SCONFIG['date_range'][$dateid][date_desc];?><?php } ?><a class="icon_form" href="<?php echo SITE_URL;?><?php echo tsurl('study','index',$Date_filter_a)?>">&nbsp;</a></span>
	    <?php } ?>
	     </div>
        <?php } ?>
	</div>    
	<?php if($arrStudy) { ?>
	<div class="block_headerline">	                                               
	    <?php foreach((array)$arrStudy as $key=>$item) {?>
	    <?php if($item['isaudit']==1||$TS_USER['user'][userid] == $item['user']['userid']||$TS_USER['user'][isadmin]=='1') { ?>
		<div class="nof clearfix">
			<div class="evtlstimg">
			<a href="<?php echo SITE_URL;?><?php echo tsurl('study','show',array(studyid=>$item['studyid']))?>" class="phs_link">
			<img src="<?php if($item['poster']) { ?><?php echo SITE_URL;?><?php echo tsXimg($item['poster'],'study',100,100,$item['path'],1)?><?php } else { ?><?php echo SITE_URL;?>public/images/event_dft.jpg<?php } ?>"></a>
			</div>
		    <h2 style="margin-bottom:0px;"><a  href="<?php echo SITE_URL;?><?php echo tsurl('study','show',array(studyid=>$item['studyid']))?>"><?php echo $item['title'];?></a> <span class="pl2">[<?php echo $item['type'][typename];?>]</span></h2>
			<div class="intro">
			<table style="margin-left:-5px">
			<tr><td valign="top" style="padding-left: 5px;padding-right:0px;"><span class="pl">时间：</span></td><td valign="top"><?php echo $item['time'];?></td></tr>
			</table>
			<span class="pl">地点： </span><?php echo $item['address'];?><br>
			<span class="pl">讲师： </span><a href="<?php echo SITE_URL;?><?php echo tsurl('user','space',array('id'=>$item['user'][userid]))?>"><?php echo $item['user'][username];?></a> <br>
			<?php echo $item['count_userdo'];?>人参加 &nbsp; <?php echo $item['count_userwish'];?>人感兴趣<br><br>
			</div>
		</div>
		<?php } else { ?>
		<?php } ?>
		<?php }?>
		<div class="page"><?php echo $pageUrl;?></div>
	</div>
	<?php } else { ?>
	 <div class="nof clearfix"><p align="center" style="color: red; font-size: 16px; line-height: 24px;">亲，找不到满足条件的课程，试试其他筛选条件吧</p></div>
	<?php } ?>
	</div>
</div>
<!--content end-->
<div class="aside">
	<div class="tags">
	<ul>
	<?php foreach((array)$HotTagName as $key=>$item) {?>
	<li><a class="post-tag" href="<?php echo SITE_URL;?><?php echo tsurl('study','index',array('tagid'=>$item['tagid']))?>"><?php echo $item['tagname'];?></a>×<?php echo $item['sum'];?></li>
	<?php }?>
	</ul>
	</div>
    <div class="u17_container" id="u17">
	<div class="u17_normal" id="u17_img">
               如需帮助，请随时给我们留言：
      support@tlaoshi.com
    </div>
	</div>
</div>

</div>
</div>
<script>
var p_id ="<?php echo $provinceid;?>";
if(p_id!=0)	
{	
$("#province").val(p_id);
}	
var c_id ="<?php echo $cityid;?>";	
if(c_id!=0)	
{	
$("#city").val(c_id);
}
var a_id ="<?php echo $areaid;?>";
if(a_id!=0)	
{	
$("#area").val(a_id);
}
</script>
<?php include template('footer'); ?>