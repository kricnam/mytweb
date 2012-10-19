<?php include template("admin/header");?>

<!--main-->
<div class="midder">

<?php include template("admin/menu");?>

<div class="page"><?php echo $pageUrl;?></div>

<table>
<tr class="old"><td width="100">ID</td><td>课程标题</td><td>课程报名状态</td><td>操作</td></tr>

<?php foreach((array)$arrStudy as $key=>$item) {?>
<tr>
   <td><?php echo $item['studyid'];?></td><td><a target="_blank" href="<?php echo SITE_URL;?>index.php?app=study&ac=show&studyid=<?php echo $item['studyid'];?>"><?php echo $item['title'];?></a></td>
   <td>	   
      <?php if($item['class_end_time']>=$nowtime) { ?>
                     尚未截止
	   <?php } else { ?>
                     已截止
	   <?php } ?>
   </td>
   <td>
      <?php if($item['class_end_time']>=$nowtime) { ?>
   	   <a href="<?php echo SITE_URL;?>index.php?app=study&ac=admin&mg=study&ts=isaudit&studyid=<?php echo $item['studyid'];?>">
	   <?php if($item['isaudit'] == 0) { ?>
       <font color="red">[审核]</font>
	   <?php } else { ?>[撤销审核]
	   <?php } ?>
	   </a>
	   
	   <a href="<?php echo SITE_URL;?>index.php?app=study&ac=admin&mg=study&ts=isrecommend&studyid=<?php echo $item['studyid'];?>">
	   <?php if($item['isrecommend']=='0') { ?>
	   <font color="red">[推荐]</font>
	   <?php } else { ?>[取消推荐]
	   <?php } ?>
	   </a>
	    <a href="<?php echo SITE_URL;?>index.php?app=study&ac=edit&ts=base&studyid=<?php echo $item['studyid'];?>">[修改]</a> 
	    <?php } ?>
	    <a href="<?php echo SITE_URL;?>index.php?app=study&ac=admin&mg=study&ts=del&studyid=<?php echo $item['studyid'];?>">[删除]</a>
   </td>
</tr>
<?php }?>

</table>

</div>

<?php include template("admin/footer");?>