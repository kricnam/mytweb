<?php include template('header'); ?>
<!--main-->
<div class="midder">
<div><a href="<?php echo SITE_URL;?>index.php?app=message&ac=my"><img src="<?php echo SITE_URL;?>app/<?php echo $app;?>/skins/<?php echo $skin;?>/imbox.gif" alt="消息盒子" /></a></div>

<div class="imbox">
<table width="100%">
<tr>
<td valign="top">
<div id="msgbox" style="background:#fafbfb; height:250px; overflow:auto">

    <div class="boxabout">
    中文名称：消息盒子
    <br />
    英文名称：ImBox
    <br />
    盒子作者：ThinkSAAS QiuJun
    <br />
    当前版本：v.0.1
    <br />
    使用说明：当有消息提醒时，点击左侧一排用户头像和系统消息，如果是用户发来的消息，点击之后会进入版面右侧消息互动阶段，及时的发送消息和及时的收取消息；如果是系统消息，只会显示类似系统通知的一些内容，只能查看，不具有可操作性。
    <br />
    目标展望：集消息，交友，聊天，客服于一体的消息盒子
    </div>

</div>
<div id="sendbox"></div>
</td>
<td valign="top" width="200" style="background:#eaf5f9;">

<div class="leftbar" style="max-height:400px; overflow:auto">
<div class="bartitle">系统消息</div>
<ul>
	<li><a href="javascript:void(0);" onclick="systembox('<?php echo $TS_USER['user'][userid];?>');"><img src="<?php echo SITE_URL;?>app/<?php echo $app;?>/skins/<?php echo $skin;?>/system.gif" align="absmiddle" />系统消息</a>
	<?php if($systemNum > '0') { ?>(<?php echo $systemNum;?>)<?php } ?></li>
</ul>
    
<div class="bartitle">好友消息</div>
<ul>
<?php foreach((array)$arrToUser as $key=>$item) {?>
<li>
<a href="javascript:void(0);" onclick="sendbox('<?php echo $item['userid'];?>');"><img alt="<?php echo $item['user'][username];?>" class="m_sub_img" width="16" src="<?php echo $item['user'][face];?>" align="absmiddle" /> <?php echo $item['user'][username];?> </a><?php if($item['count'] > 0) { ?>(<?php echo $item['count'];?>)<?php } ?>
</li>
<?php }?>

</ul>
</div>&nbsp;</td>

</tr>
</table>
</div>

</div>

<?php include template('footer'); ?>