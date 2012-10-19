<?php
defined('IN_TS') or die('Access Denied.');  

class home extends tsApp{
	
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
			foreach($time as $key=>$item){
				;
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
	function getOneTagName($tagid){
		$tagData = $this->db->once_fetch_assoc("select * from ".dbprefix."tag where tagid='$tagid'");
		return $tagData['tagname'];
	}
	
}
