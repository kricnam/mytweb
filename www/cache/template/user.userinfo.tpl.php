<a style="float:left; margin-left: 10px;" href="<?php echo SITE_URL;?><?php echo tsurl('user','space',array('id'=>$strUser['userid']))?>" rel="face" uid="<?php echo $strUser['userid'];?>"><img src="<?php echo $strUser['face_120'];?>" title="<?php echo $strUser['username'];?>的空间" alt="<?php echo $strUser['username'];?>的空间" /></a>

<div style="float:left;margin-left:10px;line-height:25px;">
<?php echo $strUser['username'];?> 
<br> <?php echo date('Y-m-d',$strUser['addtime'])?> 加入
<br />
性别：<?php if($strUser['sex']=='0') { ?>保密<?php } elseif ($strUser['sex']=='1') { ?>男<?php } else { ?>女<?php } ?><br />
<?php if($strUser['blog']) { ?>博客：<?php echo $strUser['blog'];?><br /><?php } ?>
<?php if($strUser['userid'] == $TS_USER['user'][userid]) { ?>[<a href="<?php echo SITE_URL;?><?php echo tsurl('user','set',array(ts=>base))?>">修改基本信息</a>]<?php } ?>
</div>
<div class="clear"></div>
<div class="clear"></div>
<?php if($strUser['userid'] != $TS_USER['user'][userid]) { ?>
<div style="padding:10px;">
<?php if($strUser['isfollow']) { ?>
已关注
<a href="javascript:void('0');" onclick="unfollow('<?php echo $strUser['userid'];?>');">取消关注</a>
<?php } else { ?>
<a class="a-btn" href="javascript:void('0')" onclick="follow('<?php echo $strUser['userid'];?>');">关注+1</a>
<?php } ?>
<a href="<?php echo SITE_URL;?><?php echo tsurl('user','message',array(ts=>message_add,touserid=>$strUser['userid']))?>" rel="nofollow" class="a-btn mr5">发消息</a>
</div>
<?php } ?>
<div style="float:left;margin-left:10px;line-height:25px;">
<tr>
<td>课程统计：&nbsp;&nbsp;</td>
<td>共发布<?php echo $Fclassnum;?>个课程&nbsp;&nbsp;</td>
<td>共参加<?php echo $Jclassnum;?>个课程&nbsp;&nbsp;</td>
</tr>
</div>
<div id="friend" style='float:left;margin-left:10px;'">
<h2>关注的用户<span class="pl">&nbsp;(
<a href="<?php echo SITE_URL;?><?php echo tsurl('user','follow',array('id'=>$strUser['userid']))?>">全部</a>
) </span>
</h2>

<?php foreach((array)$arrFollowUser as $key=>$item) {?>
<dl class="obu"><dt><a class="nbg" href="<?php echo SITE_URL;?><?php echo tsurl('user','space',array('id'=>$item['userid']))?>" rel="face" uid="<?php echo $item['userid'];?>"><img alt="<?php echo $item['username'];?>" class="m_sub_img" src="<?php echo $item['face'];?>"></a></dt>
<dd><a href="<?php echo SITE_URL;?><?php echo tsurl('user','space',array('id'=>$item['userid']))?>"><?php echo $item['username'];?></a></dd>
</dl>
<?php }?>

</div>

<div class="clear"></div>
