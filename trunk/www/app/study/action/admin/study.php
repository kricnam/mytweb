<?php 

switch($ts){
	case "list":		
		$page = isset($_GET['page']) ? intval($_GET['page']) : 1;
		$url = 'index.php?app=study&ac=admin&mg=study&ts=list&page=';
		$lstart = $page*10-10;
		$arrStudy = $db->fetch_all_assoc("select * from ".dbprefix."study order by addtime desc limit $lstart,10");
		$studyNum = $db->once_num_rows("select * from ".dbprefix."study");
		$pageUrl = pagination($studyNum, 10, $page, $url);

		include template("admin/study_list");
		
		break;
	//课程删除
	case "del":
		$record= intval($_GET['record']);   
		$studyid = intval($_GET['studyid']);
		$db->query("DELETE FROM ".dbprefix."study WHERE studyid = '$studyid'");
		$db->query("DELETE FROM ".dbprefix."study_time WHERE studyid = '$studyid'");
		$db->query("DELETE FROM ".dbprefix."study_users WHERE studyid = '$studyid'");
		$db->query("DELETE FROM ".dbprefix."study_comment WHERE studyid = '$studyid'");
		$db->query("DELETE FROM ".dbprefix."study_group_index WHERE studyid = '$studyid'");
		$db->query("DELETE FROM ".dbprefix."tag_study_index WHERE studyid = '$studyid'");
		$arrTypess = $db->fetch_all_assoc("select * from ".dbprefix."study_type");
		foreach($arrTypess as $key=>$item){
			$study = $db->once_fetch_assoc("select count(studyid) from ".dbprefix."study where typeid='".$item['typeid']."'");
			$arrTypes['list'][] = array(
					'typeid'	=> $item['typeid'],
					'typename'	=> $item['typename'],
					'count_study'	=> $study['count(studyid)'],
			);
		}
		
		$studyNum = $db->once_fetch_assoc("select count(studyid) from ".dbprefix."study");
		$arrTypes['count'] = $studyNum['count(studyid)'];
		
		//生成缓存文件
		fileWrite('study_types.php','data',$arrTypes);
		if($record==1)
		  header("Location: ".SITE_URL."index.php?app=study");
		else
		  qiMsg("课程删除成功！");
	
		break;
		
    //审核课程
	case "isaudit":
		$studyid = $_GET['studyid'];
		
		$strStudy = $db->once_fetch_assoc("select studyid,userid,title,isaudit from ".dbprefix."study where studyid='$studyid'");
		
		if($strStudy['isaudit'] == 0){
		$db->query("update ".dbprefix."study set `isaudit`='1' where studyid='$studyid'");
		//发送系统消息(审核通过)
		$msg_userid = '0';
		$msg_touserid = $strStudy['userid'];
		$msg_content = '恭喜你，你申请的课程《'.$strStudy['title'].'》审核通过！快去看看吧<br />'.SITE_URL.tsUrl('study','show',array('studyid'=>$studyid));
		aac('message')->sendmsg($msg_userid,$msg_touserid,$msg_content);
		}else{
			
			$db->query("update ".dbprefix."study set `isaudit`='0' where studyid='$studyid'");
			
		}
		qiMsg("操作成功！");	
		break;
				
	//推荐课程
	case "isrecommend":
		$studyid = $_GET['studyid'];
	
		$strStudy = $db->once_fetch_assoc("select studyid,userid,title,isrecommend from ".dbprefix."study where studyid='$studyid'");
	
		if($strStudy['isrecommend'] == 0){
			$db->query("update ".dbprefix."study set `isrecommend`='1' where studyid='$studyid'");
			//发送系统消息(推荐通过)
			$msg_userid = '0';
			$msg_touserid = $strStudy['userid'];
			$msg_content = '恭喜你，你的课程《'.$strStudy['title'].'》被推荐啦！快去看看吧<br />'.SITE_URL.tsUrl('study','show',array('studyid'=>$studyid));
			aac('message')->sendmsg($msg_userid,$msg_touserid,$msg_content);
	
		}else{
	
			$db->query("update ".dbprefix."study set `isrecommend`='0' where studyid='$studyid'");
	
		}	
		qiMsg("操作成功！");
		break;
}