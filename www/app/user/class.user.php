<?php
defined('IN_TS') or die('Access Denied.');

class user extends tsApp{

	//构造函数
	public function __construct($db){
		parent::__construct($db);
	}
	
	//获取最新会员
	function getNewUser($num){
		$arrNewUserId = $this->db->fetch_all_assoc("select userid from ".dbprefix."user_info order by addtime desc limit $num");
		foreach($arrNewUserId as $item){
			$arrNewUser[] = $this->getOneUser($item['userid']);
		}
		return $arrNewUser;
	}
	
	//获取活跃会员
	function getHotUser($num){
		$arrNewUserId = $this->db->fetch_all_assoc("select userid from ".dbprefix."user_info order by uptime desc limit $num");
		foreach($arrNewUserId as $item){
			$arrHotUser[] = $this->getOneUser($item['userid']);
		}
		return $arrHotUser;
	}
	
	//最多关注的用户
	public function getFollowUser($num){
		$arrUserId = $this->findAll('user_info',null,'count_followed desc','userid',$num);
		foreach($arrUserId as $item){
			$arrFollowUser[] = $this->getOneUser($item['userid']);
		}
		return $arrFollowUser;
	}
	
	//最多积分的用户
	public function getScoreUser($num){
		$arrUserId = $this->findAll('user_info',null,'count_score desc','userid',$num);
		foreach($arrUserId as $item){
			$arrScoreUser[] = $this->getOneUser($item['userid']);
		}
		return $arrScoreUser;
	}
	
	//获取一个用户的信息
	function getOneUser($userid){
			
			$strUser = $this->find('user_info',array(
				'userid'=>$userid,
			));
			
			if($strUser['face']){
				//上传的头像
				$strUser['face_120'] = SITE_URL.tsXimg($strUser['face'],'user',120,120,$strUser['path']);
				$strUser['face_32'] = SITE_URL.tsXimg($strUser['face'],'user',32,32,$strUser['path'],1);
				$strUser['face'] = SITE_URL.tsXimg($strUser['face'],'user',48,48,$strUser['path'],1);
			}else{
				//没有头像
				$strUser['face_120'] = SITE_URL.'public/images/user_large.jpg';
				$strUser['face_32'] = SITE_URL.'public/images/user_normal.jpg';
				$strUser['face']	= SITE_URL.'public/images/user_normal.jpg';
			}
			
			return $strUser;
	}
	
	//用户是否存在
	public function isUser($userid){
		
		$isUser = $this->findCount('user',array('userid'=>$userid));
		
		if($isUser == 0){
			return false;
		}else{
			return true;
		}
		
	}
	
	//是否登录 
	public function isLogin(){
	
		$userid = intval($_SESSION['tsuser']['userid']);
		
		if($userid>0){
			if($this->isUser($userid)){
				return $userid;
			}else{
				header("Location: ".SITE_URL.tsUrl('user','login',array('ts'=>'out')));
				exit;
			}
		}else{
			header("Location: ".SITE_URL.tsUrl('user','login',array('ts'=>'out')));
			exit;
		}
	}
	
	public function getOneArea($areaid){
	
		$strArea = $this->find('area',array('areaid'=>$areaid));
		return $strArea;
	
	}
	
	//根据用户积分获取用户角色
	public function getRole($score){
		$arrRole = fileRead('data/user_role.php');
		foreach($arrRole as $key=>$item){
			if($score > $item['score_start'] && $score <= $item['score_end'] || $score > $item['score_start'] && $item['score_end']==0 || $score >=0 && $score <= $item['score_end']){
				return $item['rolename'];
			}
		}
	}
	//通过topicid获取课程基本信息
	function getStudyByStudyid($studyid){
		$strStudy = $this->db->once_fetch_assoc("select * from ".dbprefix."study where studyid='$studyid'  order by addtime desc");
	
		//用户
		$strStudy['user'] = $this->db->once_fetch_assoc("select * from ".dbprefix."user_info where userid='".$strStudy['userid']."'");
	
		//时间
		$weekarray=array("周日","周一","周二","周三","周四","周五","周六");
		$time = $this->db->fetch_all_assoc("select * from ".dbprefix."study_time where studyid='".$studyid."' order by s_date asc,s_time asc limit 0,1");
		if(is_array($time)){
			foreach($time as $key=>$item){
				$a = date('m',strtotime($item['s_date'])).'月'.date('d',strtotime($item['s_date'])).'日 '.$weekarray[date("w",strtotime($item['s_date']))].' '.date('H:i',strtotime($item['s_time'])).'-'.date('H:i',strtotime($item['e_time']));
				$b.= $a."<br>";
			}
		}
	
		$strStudy['time']=$b;
	
		//地点
		$province= $this->db->once_fetch_assoc("select * from ".dbprefix."area_province where provinceid='".$strStudy['provinceid']."'");
		$city = $this->db->once_fetch_assoc("select * from ".dbprefix."area_city  where cityid='".$strStudy['cityid']."'");
		$area = $this->db->once_fetch_assoc("select * from ".dbprefix."area where areaid='".$strStudy['areaid']."'");
		$strStudy['address']=$province['province']."&nbsp;".$city['city']."&nbsp;".$area['area']."&nbsp;".$strStudy['address'];
	
		//活动类型
		$strStudy['type'] = $this->db->once_fetch_assoc("select * from ".dbprefix."study_type where typeid='".$strStudy['typeid']."'");
	
		return $strStudy;
	}
	function getStudysByUserid($page = 1, $prePageNum,$userid){
		$start_limit = !empty($page) ? ($page - 1) * $prePageNum : 0;
		$limit = $prePageNum ? "LIMIT $start_limit, $prePageNum" : '';
		$arrStudyContentComment	=
		$this->db->fetch_all_assoc("select distinct studyid from ".dbprefix."study where userid=".$userid." ".$limit);
		return $arrStudyContentComment;
	}
	function getStudysByUseridJ($page = 1, $prePageNum,$userid){
		$start_limit = !empty($page) ? ($page - 1) * $prePageNum : 0;
		$limit = $prePageNum ? "LIMIT $start_limit, $prePageNum" : '';
		$arrStudyContentComment	=
		$this->db->fetch_all_assoc("select distinct studyid from ".dbprefix."study_users where status=0 and userid=".$userid." ".$limit);
		return $arrStudyContentComment;
	}
	//析构函数
	public function __destruct(){
		
	}
					
}