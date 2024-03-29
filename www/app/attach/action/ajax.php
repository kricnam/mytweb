<?php 
defined('IN_TS') or die('Access Denied.');
switch($ts){
	
	//添加附件
	case "add":
		
		include template("ajax_add");
		break;
	
	//执行添加
	case "add_do":
	
		$userid = intval($TS_USER['user']['userid']);
		if($userid == '0') qiMsg("非法操作！");
	
		if($_FILES['attach']['name'][0] == '') qiMsg("上传文件不能为空！");
		
		$uptypes = array('gif','jpg','png','bmp','rar','zip','doc','pdf','txt');
		
		//处理目录存储方式
		$menu = substr($userid,0,1);
		
		$date = date('Ymd');
		
		$dest_dir='uploadfile/attach/'.$menu.'/'.$date.'/'.$userid;
		createFolders($dest_dir);
		
		if(isset($_FILES['attach'])){
			$arrFileName = $_FILES['attach']['name'];
			foreach($arrFileName as $key=>$item){
				if($item != ''){
				
					$attachname = trim($item);
					
					$arrAttach = explode('.',$attachname);
					
					$attachtype = $arrAttach[1];
					
					$attachsize = $_FILES['attach']['size'][$key];
					
					if (!in_array($attachtype,$uptypes)) {
						qiMsg("附件只支持gif，jpg,png等图片格式和zip,rar,doc,pdf,txt格式！");
					}
					
					if($attachsize>1024000){
						qiMsg("最大只支持1M的附件！");
					}
					
					//换个名称
					$newname = date("YmdHis").mt_rand(10000,99999).'.'.$attachtype;
					
					$dest=$dest_dir.'/'.$newname;
					move_uploaded_file($_FILES['attach']['tmp_name'][$key], mb_convert_encoding($dest,"gb2312","UTF-8"));
					chmod($dest, 0755);
					
					$attachurl = $date.'/'.$userid.'/'.$newname;
					
					$arrData = array(
						'userid'	=> $userid,
						'attachname'	=> $attachname,
						'attachtype'	=> $attachtype,
						'attachurl'		=> $attachurl,
						'attachsize'		=> $attachsize,
						'addtime'	=> time(),
					);
					
					$attachid = $db->insertArr($arrData,dbprefix.'attach');
					
				}
				
			}
		}
		
		header("Location: ".SITE_URL."index.php?app=attach&ac=ajax&ts=my");
	
		break;
		
	case "flash":
		
		include template("ajax_flash");
		break;
	
	//Flash上传
	case "flash_do":
	
		$userid = intval($_GET['userid']);
		if($userid=='0'){
			echo '00000';
			exit;
		}
		
		$arrData = array(
			'userid'	=> $userid,
			'addtime'	=> time(),
		);
		
		$attachid = $db->insertArr($arrData,dbprefix.'attach');
		
		//上传
		$arrUpload = tsUpload($_FILES['Filedata'],$attachid,'attach',array('jpg','gif','png','rar','zip','doc','ppt','txt'));
		
		if($arrUpload){

			$new['attach']->update('attach',array(
				'attachid'=>$attachid,
			),array(
				'attachname'=>$arrUpload['name'],
				'attachtype'=>$arrUpload['type'],
				'attachurl'=>$arrUpload['url'],
				'attachsize'=>$arrUpload['size'],
			));
			
		}
		
		echo $attachid;
	
		break;
	
	//我的附件列表
	case "my":
		$userid = intval($TS_USER['user']['userid']);
		if($userid==0){
			echo 'sorry:非法操作！';exit;
		}
		$arrAttach = $new['attach']->findAll('attach',array(
			'userid'=>$userid,
		));
		
		include template("ajax_my");
		break;
	
	//下载 
	case "down":
		$attachid = $_GET['attachid'];
		
		//登录
		//if(intval($TS_USER['user']['userid']) == 0) qiMsg("请登录后下载此文件！");
		//积分
		
		$strAttach = $db->once_fetch_assoc("select * from ".dbprefix."attach where attachid='$attachid'");
		
		$menu = substr($strAttach['userid'],0,1);

		$strAttach['attachurl'] = 'uploadfile/attach/'.$strAttach['attachurl'];
		
		header("Location: ".SITE_URL.$strAttach['attachurl']);
		
		break;
}
