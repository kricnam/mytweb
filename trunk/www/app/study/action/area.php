<?php 
defined('IN_TS') or die('Access Denied.');

$cityid = $_GET['cityid'];

$city = $new['study']->findAll('area',array(

	'fatherid'=>$cityid,

));

echo '<select id="area" name="area" >
	  <option value="0">请选则区</option>';
		foreach($city as $k=>$v){
		echo '<option value="'.$v['areaid'].'">'.$v['area'].'</option>';
		}
echo '</select>';