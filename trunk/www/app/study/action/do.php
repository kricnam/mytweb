<?php
defined('IN_TS') or die('Access Denied.');
	switch($ts){
		//上传教师图片
		case "pic":
			$userid = intval($TS_USER['user']['userid']);
			$studyid = $_POST['studyid'];	
			//上传图片
			$arrUpload = tsUpload($_FILES['photo'],$studyid,'teacher',array('jpg','gif','png'));
			if($arrUpload){
				$new['study']->update('study',array(
						'studyid'=>$studyid,
				),array(
						'path_s'=>$arrUpload['path'],
						'poster_s'=>$arrUpload['url'],
				));
			}
			header("Location: ".SITE_URL.tsUrl('study','add_1',array('studyid'=>$studyid)));
			break;
	
		//发布课程第一步
		case "add":
			$userid = intval($TS_USER['user']['userid']);
			$title = h($_POST['title']);
			$typeid = $_POST['typeid'];	
			$province = $_POST['province'];
			$city = $_POST['city'];
			$area = $_POST['area'];
			$address = $_POST['address'];
			$content = trim($_POST['content']);
			textfilter($_POST['tag']);
			$avgprice = $_POST['avgprice'];
			$class_end_time = $_POST['class_end_time'];
			$pnum = $_POST['pnum'];
			$date_start = $_POST['date_start'];
			$avgprice = $_POST['time_start'];
			$time_end = $_POST['time_end'];
			$Arrtime = array();
// 			if($title==''||$class_end_time=='' || $content==''||$avgprice==''||$pnum==''){
// 				qiMsg("课程信息填写不完全！");
// 			}		
			$studyData = array(
					'userid' => $userid,
					'title'	=> $title,
					'typeid' => $typeid,
					'provinceid' => $province,
					'cityid' => $city,
					'areaid' => $area,
					'address'=> $address,
					'content'=> $content,
					'avgprice'=> $avgprice,
					'class_end_time'=> $class_end_time,
					'pnum'=> $pnum,
					'content' => $content,
					'addtime' => time(),
			);			
			$studyid = $db->insertArr($studyData,dbprefix.'study');
			
			//时间表插入
			foreach ($date_start as $k => $r) {
				$Arrtime = array(
						'userid' => $userid,
						'studyid'=> $studyid,
						's_date' => $date_start[$k],
						's_time' => $time_start[$k],
						'e_time' => $time_end[$k]
				);
				$db->insertArr($Arrtime,dbprefix.'study_time');
			}		
			
			//上传图片
			$arrUpload = tsUpload($_FILES['photo'],$studyid,'study',array('jpg','gif','png'));			
			if($arrUpload){
				$new['study']->update('study',array(
					'studyid'=>$studyid,
				),array(
					'path'=>$arrUpload['path'],
					'poster'=>$arrUpload['url'],
				));

			}
			//处理标签
			aac('tag')->addTag('study','studyid',$studyid ,$_POST['tag']);
			
			header("Location: ".SITE_URL.tsUrl('study','add_1',array('studyid'=>$studyid)));
			
			break;
		//发布课程第二步 教师资料接收
	     case "add_1":
				$userid = intval($TS_USER['user']['userid']);
				$studyid = $_POST['studyid1'];
				$teachername  = h($_POST['teachername']);	
				$teachercontent = trim($_POST['teachercontent']);
                $db->query("update ".dbprefix."study set `teachername`='$teachername',`teachercontent`='$teachercontent' where studyid='$studyid'");			
                //更新统计课程分类缓存
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
                
                header("Location: ".SITE_URL.tsUrl('study','add_2',array('studyid'=>$studyid)));		
		 break;
			
		//参加或者感兴趣活动
		case "dowish":
			$userid = $TS_USER['user']['userid'];
			$studyid = $_POST['studyid'];
			
			//0加入1感兴趣
			$status = intval($_POST['status']);			
			$userNum = $db->once_num_rows("select * from ".dbprefix."study_users where studyid='$studyid' and userid='$userid'");
			
			if($userid == ''){
				echo '0';
			}elseif($userNum > '0'){
				echo '1';
			}else{
				$db->query("insert into ".dbprefix."study_users (`studyid`,`userid`,`status`,`addtime`) values ('$studyid','$userid','$status','".time()."')");
				//统计一下参加的
				$userDoNum = $db->once_num_rows("select * from ".dbprefix."study_users where studyid='$studyid' and status='0'");
				//统计感兴趣的
				$userWishNum = $db->once_num_rows("select * from ".dbprefix."study_users where studyid='$studyid' and status='1'");
				
				$db->query("update ".dbprefix."study set `count_userdo`='$userDoNum',`count_userwish`='$userWishNum' where studyid='$studyid'");
				
				//study
				$strStudy = $db->once_fetch_assoc("select title,time_start,path,poster,address,count_userdo from ".dbprefix."study where `studyid`='$studyid'");
				
				//feed开始
				if($status == 1){
					$feed_template = '<a href="{link}" title=""><img alt="{title}" src="{photo}" class="broadimg"></a><span class="pl">对<a  href="{link}">《{title}》</a>活动感兴趣</span><div class="broadsmr">{content}</div>';
				}else{
					$feed_template = '<a href="{link}" title="{title}"><img alt="{title}" src="{photo}" class="broadimg"></a><span class="pl">要参加<a  href="{link}">《{title}》</a>活动</span><div class="broadsmr">{content}</div>';
				}
				
				$feed_data = array(
					'link'	=> SITE_URL.tsUrl('study','show',array('studyid'=>$studyid)),
					'title'	=> $strStudy['title'],
					'content'	=> '开始时间：'.$strStudy['time_start'].' / 地点：'.$strStudy['address'].' / 参加人数：'.$strStudy['count_userdo'],
				);
				
				if($strStudy['poster'] != ''){
					$feed_data['photo']	= SITE_URL.tsXimg($strStudy['poster'],'study',85,85,$strStudy['path']);
				}else{
					$feed_data['photo']	= SITE_URL.'public/images/event_dft.jpg';
				}
				
				aac('feed')->addFeed($userid,$feed_template,serialize($feed_data));
				//feed结束
				
				echo '2';
			}
			
			break;
			
		//取消参加活动
		case "cancel":
			
			$studyid = $_POST['studyid'];
			$userid	= $_POST['userid'];
			
			$db->query("delete from ".dbprefix."study_users where studyid='$studyid' and userid='$userid'");
			//统计一下参加的
			$userDoNum = $db->once_num_rows("select * from ".dbprefix."study_users where studyid='$studyid' and status='0'");
			//统计感兴趣的
			$userWishNum = $db->once_num_rows("select * from ".dbprefix."study_users where studyid='$studyid' and status='1'");
			
			$db->query("update ".dbprefix."study set `count_userdo`='$userDoNum',`count_userwish`='$userWishNum' where studyid='$studyid'");
			
			echo '1';
			
			break;
			
		//参加活动
		case "do":
			$studyid = $_POST['studyid'];
			$userid	= $_POST['userid'];
			$db->query("update ".dbprefix."study_users set `status`='0' where studyid='$studyid' and userid='$userid'");
			
			//统计一下参加的
			$userDoNum = $db->once_num_rows("select * from ".dbprefix."study_users where studyid='$studyid' and status='0'");
			//统计感兴趣的
			$userWishNum = $db->once_num_rows("select * from ".dbprefix."study_users where studyid='$studyid' and status='1'");
			
			$db->query("update ".dbprefix."study set `count_userdo`='$userDoNum',`count_userwish`='$userWishNum' where studyid='$studyid'");
			
			echo '1';
			
			break;
			
		//编辑执行
		case "edit":
			//发布
			$studyid = $_POST['studyid'];
			$title = $_POST['title'];
			$typeid = $_POST['typeid'];
			$content = trim($_POST['content']);
			$avgprice = $_POST['avgprice'];
			$class_end_time = $_POST['class_end_time'];
			$pnum = $_POST['pnum'];
			//更新数据
			$new['study']->update('study',array(
				'studyid'=>$studyid,
			),array(
				'typeid' => $typeid,
				'title'	=> $title,
				'avgprice'	=> $avgprice,
				'class_end_time'	=> $class_end_time,
				'pnum'	=> $pnum,
				'content'	=> $content,
			));
			
			//上传
			$arrUpload = tsUpload($_FILES['photo'],$studyid,'study',array('jpg','gif','png'));
			if($arrUpload){
				$new['study']->update('study',array(
					'studyid'=>$studyid,
				),array(
					'path'=>$arrUpload['path'],
					'poster'=>$arrUpload['url'],
				));

			}
			header("Location: ".SITE_URL."index.php?app=study&ac=show&studyid=".$studyid);
			
			break;
			
		//添加评论 
		case "comment":
			$studyid	= intval($_POST['studyid']);
			$content	= trim($_POST['content']);
			$content    = BBCode2Html($content);
			if($TS_USER['user'] == ''){
				qiMsg('请登陆后再发表内容^_^','点击登陆','index.php/user/login');
			}elseif(empty($content)){
				qiMsg('没有任何内容是不允许你通过滴^_^');
			}else{
				$arrData	= array(
					'studyid'			=> $studyid,
					'userid'			=> $TS_USER['user']['userid'],
					'content'	=> $content,
					'addtime'		=> time()
				);
				
				$commentid = $db->insertArr($arrData,dbprefix.'study_comment');
				
				
				//发送系统消息(通知活动组织者有人回复他的活动啦)
				$strStudy = $db->once_fetch_assoc("select * from ".dbprefix."study where studyid='$studyid'");
				if($strStudy['userid'] != $TS_USER['user']['userid']){

					$msg_userid = '0';
					$msg_touserid = $strStudy['userid'];
					$msg_content = '你的活动：《'.$strStudy['title'].'》新增一条评论，快去看看给个回复吧^_^ <br />'
												.SITE_URL.'index.php/study/show/studyid-'.$studyid;
					aac('message')->sendmsg($msg_userid,$msg_touserid,$msg_content);
				
				}
				
				header("Location: ".SITE_URL."index.php/study/show/studyid-".$studyid);
				
			}	
			break;
			
		//推荐活动,取消推荐 
		case "recommend":
			$studyid = intval($_GET['studyid']);
			$isrecommend = intval($_GET['isrecommend']);
			
			$db->query("update ".dbprefix."study set `isrecommend`='$isrecommend' where `studyid`='$studyid'");
			
			qiMsg("操作成功！");
			
			break;
			
	}
