<?php
defined('IN_TS') or die('Access Denied.');
class study extends tsApp{

	//构造函数
	public function __construct($db){
		parent::__construct($db);
	}
	
	//通过topicid获取课程基本信息
	function getStudyByStudyid($studyid){
		$strStudy = $this->db->once_fetch_assoc("select * from ".dbprefix."study where studyid='$studyid'");
		
		//用户 
		$strStudy['user'] = $this->db->once_fetch_assoc("select * from ".dbprefix."user_info where userid='".$strStudy['userid']."'");
		
		//时间
		$weekarray=array("周日","周一","周二","周三","周四","周五","周六");
		$time = $this->db->fetch_all_assoc("select * from ".dbprefix."study_time where studyid='".$studyid."' order by s_date asc,s_time asc");
		if(is_array($time)){
			foreach($time as $key=>$item){;
				$a = date('Y',strtotime($item['s_date'])).'年'.date('m',strtotime($item['s_date'])).'月'.date('d',strtotime($item['s_date'])).'日 '.$weekarray[date("w",strtotime($item['s_date']))].' '.date('H:i',strtotime($item['s_time'])).'-'.date('H:i',strtotime($item['e_time']));
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
	
	//
	function getSimpleStudy($studyid){
		$strStudy = $this->db->once_fetch_assoc("select * from ".dbprefix."study where studyid='$studyid'");
		
		//地点
		$strStudy['area'] = aac('location')->getAreaForApp($strStudy['areaid']);
		
		//用户 
		$strStudy['user'] = $this->db->once_fetch_assoc("select * from ".dbprefix."user_info where userid='".$strStudy['userid']."'");
		
		return $strStudy;
	}

	
	/*
	 *获取内容评论列表
	 */
	
	function getStudyComment($page = 1, $prePageNum,$studyid){
		$start_limit = !empty($page) ? ($page - 1) * $prePageNum : 0;
		$limit = $prePageNum ? "LIMIT $start_limit, $prePageNum" : '';
		$arrGroupContentComment	= $this->db->fetch_all_assoc("select * from ".dbprefix."study_comment where Studyid='$studyid' order by addtime desc $limit");
		
		if(is_array($arrGroupContentComment)){
			foreach($arrGroupContentComment as $key=>$item){
				//$arrGroupContentComment[$key]['user'] = $this->getUserData($item['userid']);
				$arrGroupContentComment[$key]['user'] = aac('user')->getOneUser($item['userid']);
				$arrGroupContentComment[$key]['content'] = hview($item['content']);
			}
		}
		
		return $arrGroupContentComment;
	}
	
	/*
	 *获取内容评论列表数
	 */
	
	function getStudyCommentNum($virtue, $setvirtue){
		$where = 'where '.$virtue.'='.$setvirtue.'';
		$res = "SELECT * FROM ".dbprefix."study_comment $where";
		$groupContentCommentNum = $this->db->once_num_rows($res);
		return $groupContentCommentNum;
	}
	
	/*
	 *获取课程内容列表
	*/
	
	function getStudys($page = 1, $prePageNum, $where, $orderby ='', $order = ''){
		$start_limit = !empty($page) ? ($page - 1) * $prePageNum : 0;
		$limit = $prePageNum ? "LIMIT $start_limit, $prePageNum" : '';
		$arrStudyContentComment	= 
		$this->db->fetch_all_assoc("select distinct ".dbprefix."study.studyid from ".dbprefix."study,".dbprefix."study_time 
	    where ".dbprefix."study.studyid=".dbprefix."study_time.studyid and".$where." ".$orderby." ". $order." ". $limit);
		return $arrStudyContentComment;
	}
	/*
	 *获取课程列表数
	*/
	
	function getStudysNum($where){;
		$res = "SELECT  distinct ".dbprefix."study.studyid From ".dbprefix."study,".dbprefix."study_time 
	    where ".dbprefix."study.studyid=".dbprefix."study_time.studyid and".$where;
		$StudysNum = $this->db->once_num_rows($res);
		return $StudysNum;
	}
	/*
	 *获取课程内容列表BYTAG
	*/
	
	function getStudysByTag($page = 1, $prePageNum,$tagid){
		$start_limit = !empty($page) ? ($page - 1) * $prePageNum : 0;
		$limit = $prePageNum ? "LIMIT $start_limit, $prePageNum" : '';
		$arrStudyContentComment	=
		$this->db->fetch_all_assoc("select distinct studyid from ".dbprefix."tag_study_index where tagid=".$tagid." ".$limit);
		return $arrStudyContentComment;
	}
	
	//获取活动小组
	function getGroup($groupid){
		$strGroup = $this->db->once_fetch_assoc("select * from ".dbprefix."app_group where groupid='$groupid'");
		if($strGroup['groupicon'] == ''){
			$strGroup['groupicon'] = 'uploadfile/group/default/default.gif';
		}
		return $strGroup;
	}
	
	//通过topic获取tag
	function getObjTagByObjid($objname,$idname,$objid){
		$arrTagIndex = $this->db->fetch_all_assoc("select * from ".dbprefix."tag_".$objname."_index where ".$idname."='$objid'");
		if(is_array($arrTagIndex)){
			foreach($arrTagIndex as $item){
				$arrTag[] = $this->getOneTag($item['tagid']);
			}
		}
	
		return $arrTag;
	
	}
	//获取课程热门标签
	function getHotTag(){
		$HotTagid = $this->db->fetch_all_assoc("select tagid, count(tagid) as sum from ".dbprefix."tag_study_index group by tagid order by sum desc limit 0,25");
		if(is_array($HotTagid )){
			foreach($HotTagid as $key=>$item){
				$arrHotTag[$key]['tagid'] = $item['tagid'];
				$arrHotTag[$key]['tagname'] = $this->getOneTagName($item['tagid']);
				$arrHotTag[$key]['sum'] = $item['sum'];
			}
		}
		return $arrHotTag;
	}
	//通过tagid获得tagname
	function getOneTag($tagid){
		$tagData = $this->db->once_fetch_assoc("select * from ".dbprefix."tag where tagid='$tagid'");	
		return $tagData;
	}
	function getOneTagName($tagid){
		$tagData = $this->db->once_fetch_assoc("select * from ".dbprefix."tag where tagid='$tagid'");
		return $tagData['tagname'];
	}
	

	
	
}