<?php 
$nowtime = date("Y-m-d H:i");
//更新统计课程分类缓存
$arrTypess = $db->fetch_all_assoc("select * from ".dbprefix."study_type");
foreach($arrTypess as $key=>$item){
	$study = $db->once_fetch_assoc("select count(studyid) from ".dbprefix."study where isaudit=1 AND class_end_time>'".$nowtime."' and typeid='".$item['typeid']."'");
	$arrTypes['list'][] = array(
			'typeid'	=> $item['typeid'],
			'typename'	=> $item['typename'],
			'count_study'	=> $study['count(studyid)'],
	);
}
$studyNum = $db->once_fetch_assoc("select count(studyid) from ".dbprefix."study  where isaudit=1 AND class_end_time>'".$nowtime."'");
$arrTypes['count'] = $studyNum['count(studyid)'];
//生成缓存文件
fileWrite('study_types.php','data',$arrTypes);

qiMsg("更新成功！");