<?php 
defined('IN_TS') or die('Access Denied.');
date_default_timezone_set('PRC');
$HotTagName = $new['study']->getHotTag();
//调出课程类型
$arrStudyType = fileRead('data/study_types.php');
$arrProvince = fileRead('data/province.php');
$arrArea = fileRead('data/area.php');
$arrCity = fileRead('data/city.php');
$nowtime = date("Y-m-d H:i");
//时间类型
//date("w",strtotime(date("Y-m-d")));
$_SCONFIG['date_range'] = array(
		1=>array('date_desc'=>'今天'),
		2=>array('date_desc'=>'周末'),
		3=>array('date_desc'=>'最近一周'),
);
//调出省份数据
$province = $new['study']->findAll('area_province');
$tagid = isset($_GET['tagid'])&&is_numeric($_GET['tagid'])?$_GET['tagid']:'';
$page = isset($_GET['page']) ? intval($_GET['page']) : 1;

if(!empty($tagid))
{
	$arrStudys = $new['study']->getStudysByTag($page,6,$tagid);
	//var_export($arrStudys);
	foreach($arrStudys as $item){
		$arrStudy[] = $new['study']->getStudyByStudyid($item['studyid']);
	}	
	//课程总数
	$arrStudystNum = count($arrStudys);	
	//分页
	$url = tsUrl('study','index')."&page=";
	$pageUrl = pagination($arrStudystNum, 6, $page, $url);
}else{	
//调出热门标签
$provinceid = isset($_GET['provinceid'])&&is_numeric($_GET['provinceid'])?$_GET['provinceid']:0;
$cityid = isset($_GET['cityid'])&&is_numeric($_GET['cityid'])?$_GET['cityid']:0;
$areaid = isset($_GET['areaid'])&&is_numeric($_GET['areaid'])?$_GET['areaid']:0;
$typeid = isset($_GET['typeid'])&&is_numeric($_GET['typeid'])?$_GET['typeid']:0;
$dateid = isset($_GET['dateid'])&&is_numeric($_GET['dateid'])?$_GET['dateid']:0;
$date   = isset($_GET['date'])?$_GET['date']:0;
$orderby = isset($_GET['orderby'])?$_GET['orderby']:'order by addtime';
$order = isset($_GET['order'])?$_GET['order']:'desc';
$url_args = array('typeid'=>$typeid,'page'=>$page,'dateid'=>$dateid,'provinceid'=>$provinceid,'cityid'=>$cityid,'areaid'=>$areaid,'date'=>$date,'orderby'=>$orderby,'order'=>$order);

if($provinceid!=0)
{
$city = $new['study']->findAll('area_city',array(
		'fatherid'=>$provinceid,
));
}
if($cityid!=0)
{
$area = $new['study']->findAll('area',array(
        'fatherid'=>$cityid,

));
}
//拼接where
//类型
if($typeid==0&&is_numeric($typeid))
	 $where_str = " typeid>0 "; 
else $where_str = " typeid=".$typeid ;
//地点
if($provinceid!=0&&is_numeric($provinceid))
	$where_str .= " AND provinceid=".$provinceid;
if($cityid!=0&&is_numeric($cityid))
	$where_str .= " AND cityid =".$cityid;
if($areaid!=0&&is_numeric($areaid ))
	$where_str .= " AND areaid =".$areaid;
//时间
if($dateid==1)
    $where_str .= " AND s_date='".date("Y-m-d")."'";
else if($dateid==2)
	$where_str .= " AND DAYOFWEEK(s_date)=1"; 
else if($dateid==3)
	$where_str .= " AND s_date>'".date('Y-m-d',date()-7)."' and s_date<'".date("Y-m-d")."'";
if($date!=0)	
	$where_str .= " AND s_date='".$date."'";
    //保证课程尚未截止
$where_str .= " AND class_end_time>'".$nowtime."'";
//课程具体内容
$arrStudys = $new['study']->getStudys($page,6,$where_str,$orderby,$order);
//var_export($arrStudys);
foreach($arrStudys as $item){
	$arrStudy[] = $new['study']->getStudyByStudyid($item['studyid']);
}

//课程总数
$arrStudystNum = $new['study']->getStudysNum($where_str);

//分页
$page_fliter = get_url_query($url_args, array('page'));
$url = tsUrl('study','index',$page_fliter)."&page=";	
$pageUrl = pagination($arrStudystNum, 6, $page, $url);	
}
$title = "同城课程";
include template("index");
