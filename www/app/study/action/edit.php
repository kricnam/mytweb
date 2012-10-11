<?php
	 defined('IN_TS') or die('Access Denied.');
	$studyid = intval($_GET['studyid']);
	
	$userid = intval($TS_USER['user']['userid']);
	
	//课程信息
	$strStudy = $new['study']->getSimpleStudy($studyid);
	
	switch($ts){
		//基本信息
		case "base":
			//课程类型
			$arrType = $db->fetch_all_assoc("select * from ".dbprefix."study_type");
			$title = '编辑课程信息';
			include template("edit_base");
			break;
		
		//课程封面 
		case "poster":
			$title = '编辑课程封面';
			include template("edit_poster");		
			break;
			
	}
	

	